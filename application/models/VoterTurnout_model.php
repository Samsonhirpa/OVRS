<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VoterTurnout_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Get next serial number for a region on a specific date
     */
    public function getNextSerialNumber($naannoofil_id, $date) {
        $this->db->select_max('serial_number');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date', $date);
        $max = $this->db->get('voter_turnout')->row();
        return ($max->serial_number ?? 0) + 1;
    }

    /**
     * Save voter turnout report
     */
    public function saveReport($data) {
        return $this->db->insert('voter_turnout', $data);
    }

    /**
     * Get report by ID
     */
    public function getReportById($id) {
        $this->db->where('id', $id);
        return $this->db->get('voter_turnout')->row();
    }

    /**
     * Update report
     */
    public function updateReport($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('voter_turnout', $data);
    }

    /**
     * Delete report
     */
    public function deleteReport($id) {
        $this->db->where('id', $id);
        return $this->db->delete('voter_turnout');
    }

    /**
     * Get reports for a specific region (Naannoo Filannoo user)
     */
    public function getRegionReports($naannoofil_id, $start_date, $end_date, $status_level = 'all') {
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $start_date);
        $this->db->where('report_date <=', $end_date);
        if($status_level != 'all') {
            $this->db->where('status_level', $status_level);
        }
        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('voter_turnout')->result();
    }

    /**
     * Get region total summary (SUM of all records)
     */
    public function getRegionTotalSummary($naannoofil_id, $start_date, $end_date) {
        $this->db->select_sum('male_voters');
        $this->db->select_sum('female_voters');
        $this->db->select_sum('total_voters');
        $this->db->select('COUNT(*) as total_reports');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $start_date);
        $this->db->where('report_date <=', $end_date);
        return $this->db->get('voter_turnout')->row();
    }

    /**
     * Get region dashboard summary with LAST security status
     */
    public function getRegionDashboardSummary($naannoofil_id, $start_date, $end_date) {
        // Get totals
        $totals = $this->getRegionTotalSummary($naannoofil_id, $start_date, $end_date);
        
        // Get latest report for status
        $this->db->select('status_level, status_reason, report_date, created_at');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        $latest = $this->db->get('voter_turnout')->row();
        
        $result = (object)[
            'total_reports' => $totals->total_reports ?? 0,
            'total_male_voters' => $totals->male_voters ?? 0,
            'total_female_voters' => $totals->female_voters ?? 0,
            'total_voters' => $totals->total_voters ?? 0,
            'current_status' => $latest->status_level ?? 'green',
            'current_status_reason' => $latest->status_reason ?? '',
            'last_report_date' => $latest->created_at ?? null
        ];
        
        return $result;
    }

    /**
     * Get weekly data for chart
     */
    public function getWeeklyData($naannoofil_id) {
        $labels = [];
        $data = [];
        
        for($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $labels[] = date('D', strtotime($date));
            
            $this->db->select_sum('total_voters');
            $this->db->where('naannoofil_id', $naannoofil_id);
            $this->db->where('report_date', $date);
            $result = $this->db->get('voter_turnout')->row();
            $data[] = (int)($result->total_voters ?? 0);
        }
        
        return ['labels' => $labels, 'data' => $data];
    }

    // ==================== ADMIN METHODS ====================

    /**
     * Get ALL 179 constituencies with their voter data (even if no reports exist)
     */
    public function getAllConstituenciesWithVoterData($start_date = null, $end_date = null, $status_filter = null, $zone_filter = null) {
        $allConstituencies = $this->getAllConstituenciesList();
        
        $result = [];
        foreach($allConstituencies as $constituency) {
            // Get aggregated voter data
            $this->db->select_sum('male_voters');
            $this->db->select_sum('female_voters');
            $this->db->select_sum('total_voters');
            $this->db->select('COUNT(*) as report_count');
            $this->db->where('naannoofil_id', $constituency['name']);
            if($start_date) $this->db->where('report_date >=', $start_date);
            if($end_date) $this->db->where('report_date <=', $end_date);
            $agg = $this->db->get('voter_turnout')->row();
            
            // Get latest report for status
            $this->db->select('status_level, status_reason, report_date');
            $this->db->where('naannoofil_id', $constituency['name']);
            $this->db->order_by('report_date', 'DESC');
            $this->db->limit(1);
            $latest = $this->db->get('voter_turnout')->row();
            
            $result[] = (object)[
                'naannoofil_id' => $constituency['name'],
                'zone' => $constituency['zone'],
                'male_voters' => (int)($agg->male_voters ?? 0),
                'female_voters' => (int)($agg->female_voters ?? 0),
                'total_voters' => (int)($agg->total_voters ?? 0),
                'total_reports' => (int)($agg->report_count ?? 0),
                'current_status' => $latest->status_level ?? 'green',
                'status_reason' => $latest->status_reason ?? '',
                'last_report_date' => $latest->report_date ?? null
            ];
        }
        
        // Apply filters
        if($zone_filter && $zone_filter != 'all') {
            $result = array_filter($result, function($item) use ($zone_filter) {
                return $item->zone == $zone_filter;
            });
        }
        if($status_filter && $status_filter != 'all') {
            $result = array_filter($result, function($item) use ($status_filter) {
                return $item->current_status == $status_filter;
            });
        }
        
        usort($result, function($a, $b) {
            return $b->total_voters - $a->total_voters;
        });
        
        return array_values($result);
    }

    /**
     * Get complete list of ALL 179 Naannoo Filannoo constituencies with zones
     */
    private function getAllConstituenciesList() {
        return [
            // Jimma Zone (18)
            ['name' => 'Dimtu', 'zone' => 'Jimma'], ['name' => 'Gatira', 'zone' => 'Jimma'],
            ['name' => 'Gera', 'zone' => 'Jimma'], ['name' => 'Sekoru', 'zone' => 'Jimma'],
            ['name' => 'Jimma Kersa', 'zone' => 'Jimma'], ['name' => 'Jimma Town', 'zone' => 'Jimma'],
            ['name' => 'Limu Seka', 'zone' => 'Jimma'], ['name' => 'Mana Woreda', 'zone' => 'Jimma'],
            ['name' => 'Limu Koso 1', 'zone' => 'Jimma'], ['name' => 'Seka Chekorsa 1', 'zone' => 'Jimma'],
            ['name' => 'Limu Koso 2', 'zone' => 'Jimma'], ['name' => 'Seka Chekorsa 2', 'zone' => 'Jimma'],
            ['name' => 'Dedo 1', 'zone' => 'Jimma'], ['name' => 'Gomma 1', 'zone' => 'Jimma'],
            ['name' => 'Omonada 1', 'zone' => 'Jimma'], ['name' => 'Dedo 2', 'zone' => 'Jimma'],
            ['name' => 'Gomma 2', 'zone' => 'Jimma'], ['name' => 'Omonada 2', 'zone' => 'Jimma'],
            // Eastern Wollega (10)
            ['name' => 'Ono', 'zone' => 'Eastern Wollega'], ['name' => 'Ayana', 'zone' => 'Eastern Wollega'],
            ['name' => 'Galo', 'zone' => 'Eastern Wollega'], ['name' => 'Gelila', 'zone' => 'Eastern Wollega'],
            ['name' => 'Gute', 'zone' => 'Eastern Wollega'], ['name' => 'Nekemte', 'zone' => 'Eastern Wollega'],
            ['name' => 'Nunu', 'zone' => 'Eastern Wollega'], ['name' => 'Diga Kolobo', 'zone' => 'Eastern Wollega'],
            ['name' => 'Jima Arjo', 'zone' => 'Eastern Wollega'], ['name' => 'Sibu Sire', 'zone' => 'Eastern Wollega'],
            // Western Wollega (11)
            ['name' => 'Begi', 'zone' => 'Western Wollega'], ['name' => 'Gimbi', 'zone' => 'Western Wollega'],
            ['name' => 'Mendi', 'zone' => 'Western Wollega'], ['name' => 'Nejo', 'zone' => 'Western Wollega'],
            ['name' => 'Yubdo', 'zone' => 'Western Wollega'], ['name' => 'Ayra Guliso', 'zone' => 'Western Wollega'],
            ['name' => 'Enango Bila', 'zone' => 'Western Wollega'], ['name' => 'Guy Genet', 'zone' => 'Western Wollega'],
            ['name' => 'Segno Gebeya', 'zone' => 'Western Wollega'], ['name' => 'Nole Kaba 1', 'zone' => 'Western Wollega'],
            ['name' => 'Nole Kaba 2', 'zone' => 'Western Wollega'],
            // Illubabur (6)
            ['name' => 'Bilonopa', 'zone' => 'Illubabur'], ['name' => 'Darimu', 'zone' => 'Illubabur'],
            ['name' => 'Gore', 'zone' => 'Illubabur'], ['name' => 'Metu', 'zone' => 'Illubabur'],
            ['name' => 'Uka', 'zone' => 'Illubabur'], ['name' => 'Yayo', 'zone' => 'Illubabur'],
            // Buno Bedele (5)
            ['name' => 'Bedele', 'zone' => 'Buno Bedele'], ['name' => 'Chora', 'zone' => 'Buno Bedele'],
            ['name' => 'Dembi', 'zone' => 'Buno Bedele'], ['name' => 'Meko', 'zone' => 'Buno Bedele'],
            ['name' => 'Gechi Borecha', 'zone' => 'Buno Bedele'],
            // Kelem Wollega (6)
            ['name' => 'Lalo', 'zone' => 'Kelem Wollega'], ['name' => 'Tejo', 'zone' => 'Kelem Wollega'],
            ['name' => 'Kake', 'zone' => 'Kelem Wollega'], ['name' => 'Gidami', 'zone' => 'Kelem Wollega'],
            ['name' => 'Kibe', 'zone' => 'Kelem Wollega'], ['name' => 'Dembi Dolo', 'zone' => 'Kelem Wollega'],
            // North Shewa (8)
            ['name' => 'Degem', 'zone' => 'North Shewa'], ['name' => 'Kembibit', 'zone' => 'North Shewa'],
            ['name' => 'Kuyo', 'zone' => 'North Shewa'], ['name' => 'Wrejarso', 'zone' => 'North Shewa'],
            ['name' => 'Grar Jarso', 'zone' => 'North Shewa'], ['name' => 'Abote Dera', 'zone' => 'North Shewa'],
            ['name' => 'Wuchale en Jida', 'zone' => 'North Shewa'], ['name' => 'Yaya Gulele', 'zone' => 'North Shewa'],
            // East Bale (2)
            ['name' => 'Ginir', 'zone' => 'East Bale'], ['name' => 'Jara', 'zone' => 'East Bale'],
            // Bale (5)
            ['name' => 'Goba', 'zone' => 'Bale'], ['name' => 'Goro', 'zone' => 'Bale'],
            ['name' => 'Mena', 'zone' => 'Bale'], ['name' => 'Sinana', 'zone' => 'Bale'],
            ['name' => 'Agarfa Gasera', 'zone' => 'Bale'],
            // South Western Shewa (7)
            ['name' => 'Becho', 'zone' => 'South Western Shewa'], ['name' => 'Lemen', 'zone' => 'South Western Shewa'],
            ['name' => 'Teji', 'zone' => 'South Western Shewa'], ['name' => 'Wenchi', 'zone' => 'South Western Shewa'],
            ['name' => 'Tikur Enchini (Ameya)', 'zone' => 'South Western Shewa'],
            ['name' => 'Woliso 1', 'zone' => 'South Western Shewa'], ['name' => 'Woliso 2', 'zone' => 'South Western Shewa'],
            // HGW (Shaambuu) (4)
            ['name' => 'Alibo', 'zone' => 'HGW (Shaambuu)'], ['name' => 'Fincha', 'zone' => 'HGW (Shaambuu)'],
            ['name' => 'Shambu', 'zone' => 'HGW (Shaambuu)'], ['name' => 'Kombolcha (Guduru)', 'zone' => 'HGW (Shaambuu)'],
            // Eastern Hararghe (16)
            ['name' => 'Bedeno', 'zone' => 'Eastern Hararghe'], ['name' => 'Beroda', 'zone' => 'Eastern Hararghe'],
            ['name' => 'Boko', 'zone' => 'Eastern Hararghe'], ['name' => 'Fuganbira', 'zone' => 'Eastern Hararghe'],
            ['name' => 'Grawa', 'zone' => 'Eastern Hararghe'], ['name' => 'Harewacha', 'zone' => 'Eastern Hararghe'],
            ['name' => 'Kombolcha', 'zone' => 'Eastern Hararghe'], ['name' => 'Kurfachele', 'zone' => 'Eastern Hararghe'],
            ['name' => 'Haremaya 1', 'zone' => 'Eastern Hararghe'], ['name' => 'Chelenko 1', 'zone' => 'Eastern Hararghe'],
            ['name' => 'Deder 1', 'zone' => 'Eastern Hararghe'], ['name' => 'Kersa 1', 'zone' => 'Eastern Hararghe'],
            ['name' => 'Haremaya 2', 'zone' => 'Eastern Hararghe'], ['name' => 'Chelenko 2', 'zone' => 'Eastern Hararghe'],
            ['name' => 'Deder 2', 'zone' => 'Eastern Hararghe'], ['name' => 'Kersa 2', 'zone' => 'Eastern Hararghe'],
            // Western Hararghe (12)
            ['name' => 'Bedessa', 'zone' => 'Western Hararghe'], ['name' => 'Doba', 'zone' => 'Western Hararghe'],
            ['name' => 'Hirna', 'zone' => 'Western Hararghe'], ['name' => 'Kemona', 'zone' => 'Western Hararghe'],
            ['name' => 'Mesela', 'zone' => 'Western Hararghe'], ['name' => 'Micheta', 'zone' => 'Western Hararghe'],
            ['name' => 'Mieso', 'zone' => 'Western Hararghe'], ['name' => 'Chiro 1', 'zone' => 'Western Hararghe'],
            ['name' => 'Habro 1', 'zone' => 'Western Hararghe'], ['name' => 'Chiro 2', 'zone' => 'Western Hararghe'],
            ['name' => 'Habro 2', 'zone' => 'Western Hararghe'], ['name' => 'Chiro 3', 'zone' => 'Western Hararghe'],
            // Guji (4)
            ['name' => 'Bore', 'zone' => 'Guji'], ['name' => 'Negele', 'zone' => 'Guji'],
            ['name' => 'Uraga', 'zone' => 'Guji'], ['name' => 'Kibre Mngist', 'zone' => 'Guji'],
            // Western Gujii (4)
            ['name' => 'Kercha', 'zone' => 'Western Gujii'], ['name' => 'Hageremariam', 'zone' => 'Western Gujii'],
            ['name' => 'Melka Soda', 'zone' => 'Western Gujii'], ['name' => 'Gelana Abaya', 'zone' => 'Western Gujii'],
            // Booranaa (2)
            ['name' => 'Moyale', 'zone' => 'Booranaa'], ['name' => 'Yabelo', 'zone' => 'Booranaa'],
            // Arsi (18)
            ['name' => 'Abomsa', 'zone' => 'Arsi'], ['name' => 'Ogolcho', 'zone' => 'Arsi'],
            ['name' => 'Arboye', 'zone' => 'Arsi'], ['name' => 'Asko', 'zone' => 'Arsi'],
            ['name' => 'Asela', 'zone' => 'Arsi'], ['name' => 'Bele', 'zone' => 'Arsi'],
            ['name' => 'Chole', 'zone' => 'Arsi'], ['name' => 'Dera', 'zone' => 'Arsi'],
            ['name' => 'Iteya', 'zone' => 'Arsi'], ['name' => 'Kersa', 'zone' => 'Arsi'],
            ['name' => 'Kula', 'zone' => 'Arsi'], ['name' => 'Robe', 'zone' => 'Arsi'],
            ['name' => 'Sagure', 'zone' => 'Arsi'], ['name' => 'Shirka', 'zone' => 'Arsi'],
            ['name' => 'Ticho', 'zone' => 'Arsi'], ['name' => 'Bekoji 1', 'zone' => 'Arsi'],
            ['name' => 'Bekoji 2', 'zone' => 'Arsi'], ['name' => 'Chancho (Gololcha)', 'zone' => 'Arsi'],
            // Western Shewa (14)
            ['name' => 'Dano', 'zone' => 'Western Shewa'], ['name' => 'Jeldu', 'zone' => 'Western Shewa'],
            ['name' => 'Gindeberet', 'zone' => 'Western Shewa'], ['name' => 'Nonno', 'zone' => 'Western Shewa'],
            ['name' => 'Addis Alem', 'zone' => 'Western Shewa'], ['name' => 'Adea Berga', 'zone' => 'Western Shewa'],
            ['name' => 'Bako Tibe', 'zone' => 'Western Shewa'], ['name' => 'Meta Robi', 'zone' => 'Western Shewa'],
            ['name' => 'Ambo 1', 'zone' => 'Western Shewa'], ['name' => 'Chelia 1', 'zone' => 'Western Shewa'],
            ['name' => 'Dandi 1', 'zone' => 'Western Shewa'], ['name' => 'Ambo 2', 'zone' => 'Western Shewa'],
            ['name' => 'Chelia 2', 'zone' => 'Western Shewa'], ['name' => 'Dandi 2', 'zone' => 'Western Shewa'],
            // Eastern Shewa (10)
            ['name' => 'Mojo', 'zone' => 'Eastern Shewa'], ['name' => 'Welenchiti', 'zone' => 'Eastern Shewa'],
            ['name' => 'Zeway', 'zone' => 'Eastern Shewa'], ['name' => 'AlemTena', 'zone' => 'Eastern Shewa'],
            ['name' => 'Dugda Meki', 'zone' => 'Eastern Shewa'], ['name' => 'Adama 1', 'zone' => 'Eastern Shewa'],
            ['name' => 'Adea 1', 'zone' => 'Eastern Shewa'], ['name' => 'Adama 2', 'zone' => 'Eastern Shewa'],
            ['name' => 'Adea 2', 'zone' => 'Eastern Shewa'], ['name' => 'Adama 3', 'zone' => 'Eastern Shewa'],
            // SHAGGAR (6)
            ['name' => 'Akaki/ ginbichu', 'zone' => 'SHAGGAR'], ['name' => 'Alem Gena 1', 'zone' => 'SHAGGAR'],
            ['name' => 'Alem Gena 2', 'zone' => 'SHAGGAR'], ['name' => 'Sululta ena Mulo', 'zone' => 'SHAGGAR'],
            ['name' => 'Bereh Aleltu', 'zone' => 'SHAGGAR'], ['name' => 'Welmera', 'zone' => 'SHAGGAR'],
            // West Arsi (11)
            ['name' => 'Kokosa', 'zone' => 'West Arsi'], ['name' => 'Dodola', 'zone' => 'West Arsi'],
            ['name' => 'Adaba', 'zone' => 'West Arsi'], ['name' => 'Asasa', 'zone' => 'West Arsi'],
            ['name' => 'Arsi Negele', 'zone' => 'West Arsi'], ['name' => 'Shashemene 1', 'zone' => 'West Arsi'],
            ['name' => 'Kefele 1', 'zone' => 'West Arsi'], ['name' => 'Siraro 1', 'zone' => 'West Arsi'],
            ['name' => 'Shashemene 2', 'zone' => 'West Arsi'], ['name' => 'Kefele 2', 'zone' => 'West Arsi'],
            ['name' => 'Siraro 2', 'zone' => 'West Arsi']
        ];
    }

    /**
     * Get all unique zones for filter
     */
    public function getAllZones() {
        $zones = [];
        foreach($this->getAllConstituenciesList() as $c) {
            if(!in_array($c['zone'], $zones)) {
                $zones[] = $c['zone'];
            }
        }
        sort($zones);
        return $zones;
    }

    /**
     * Get overall dashboard statistics for admin
     */
    public function getDashboardStats($start_date = null, $end_date = null) {
        $this->db->select_sum('male_voters');
        $this->db->select_sum('female_voters');
        $this->db->select_sum('total_voters');
        $this->db->select('COUNT(*) as total_reports');
        $this->db->select('COUNT(DISTINCT naannoofil_id) as total_constituencies');
        if($start_date) $this->db->where('report_date >=', $start_date);
        if($end_date) $this->db->where('report_date <=', $end_date);
        return $this->db->get('voter_turnout')->row();
    }

    /**
 * Get all reports for admin (all regions)
 */
public function getAllReports($start_date = null, $end_date = null, $status_level = 'all', $selected_region = 'all') {
    $this->db->select('*');
    $this->db->from('voter_turnout');
    
    if($start_date) {
        $this->db->where('report_date >=', $start_date);
    }
    if($end_date) {
        $this->db->where('report_date <=', $end_date);
    }
    if($status_level != 'all') {
        $this->db->where('status_level', $status_level);
    }
    if($selected_region != 'all') {
        $this->db->where('naannoofil_id', $selected_region);
    }
    
    $this->db->order_by('report_date', 'DESC');
    $this->db->order_by('created_at', 'DESC');
    
    return $this->db->get()->result();
}

/**
 * Get all distinct regions (naannoofil_id) for admin filter dropdown
 */
public function getAllRegions() {
    $this->db->distinct();
    $this->db->select('naannoofil_id');
    $this->db->where('naannoofil_id IS NOT NULL');
    $this->db->where('naannoofil_id !=', '');
    $this->db->order_by('naannoofil_id', 'ASC');
    return $this->db->get('voter_turnout')->result();
}
}
?>