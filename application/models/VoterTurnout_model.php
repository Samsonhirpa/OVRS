<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VoterTurnout_model extends CI_Model {
    
    private $table = 'voter_turnout';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get location name from useraccount (Zone or City)
     */
    private function getLocationName($zoneId, $magalaId) {
        $location = '';
        if($magalaId && $magalaId > 0) {
            $this->db->select('cname as name');
            $this->db->from('city');
            $this->db->where('cid', $magalaId);
            $query = $this->db->get();
            $city = $query->row();
            $location = $city ? $city->name : '';
        } elseif($zoneId && $zoneId > 0) {
            $this->db->select('zname as name');
            $this->db->from('zone');
            $this->db->where('zid', $zoneId);
            $query = $this->db->get();
            $zone = $query->row();
            $location = $zone ? $zone->name : '';
        }
        return $location;
    }
    
    /**
     * Save voter turnout report
     */
    public function saveReport($data) {
        // Check if report for this date and session already exists
        $this->db->where('naannoofil_id', $data['naannoofil_id']);
        $this->db->where('report_date', $data['report_date']);
        $this->db->where('report_session', $data['report_session']);
        $query = $this->db->get($this->table);
        
        if($query->num_rows() > 0) {
            // Update existing report
            $this->db->where('naannoofil_id', $data['naannoofil_id']);
            $this->db->where('report_date', $data['report_date']);
            $this->db->where('report_session', $data['report_session']);
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->update($this->table, $data);
            return $this->db->affected_rows() > 0;
        } else {
            // Insert new report
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
    }
    
    /**
     * Update report
     */
    public function updateReport($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows() > 0;
    }
    
    /**
     * Get next serial number for today
     */
    public function getNextSerialNumber($naannoofil_id, $date) {
        $this->db->select('MAX(serial_number) as max_serial');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date', $date);
        $query = $this->db->get($this->table);
        $result = $query->row();
        return ($result->max_serial) ? $result->max_serial + 1 : 1;
    }
    
    /**
     * Get report by ID with location
     */
    public function getReportById($id) {
        $sql = "SELECT vt.*, 
            u.zone_id, u.magala_id,
            (SELECT zname FROM zone WHERE zid = u.zone_id) as zone_name,
            (SELECT cname FROM city WHERE cid = u.magala_id) as city_name
        FROM voter_turnout vt
        LEFT JOIN useraccount u ON vt.reporter_id = u.id
        WHERE vt.id = ? 
        AND vt.status = 1";
        
        $query = $this->db->query($sql, [$id]);
        return $query->row();
    }
    
    /**
     * Delete report
     */
    public function deleteReport($id) {
        $this->db->where('id', $id);
        $this->db->update($this->table, ['status' => 0]);
        return $this->db->affected_rows() > 0;
    }
    
    /**
     * Get reports by date range for a specific region
     */
    public function getReportsByDateRange($naannoofil_id, $startDate, $endDate, $statusLevel = 'all') {
        if($naannoofil_id) {
            $this->db->where('vt.naannoofil_id', $naannoofil_id);
        }
        $this->db->where('vt.report_date >=', $startDate);
        $this->db->where('vt.report_date <=', $endDate);
        $this->db->where('vt.status', 1);
        
        if($statusLevel != 'all' && !empty($statusLevel)) {
            $this->db->where('vt.status_level', $statusLevel);
        }
        
        $this->db->order_by('vt.report_date', 'DESC');
        $this->db->order_by('vt.created_at', 'DESC');
        $query = $this->db->get('voter_turnout vt');
        return $query->result();
    }
    
    /**
     * Get reports with location names for a specific region
     */
    public function getReportsWithLocation($naannoofil_id, $startDate, $endDate, $statusLevel = 'all') {
        $sql = "SELECT 
            vt.*,
            u.zone_id, u.magala_id,
            (SELECT zname FROM zone WHERE zid = u.zone_id) as zone_name,
            (SELECT cname FROM city WHERE cid = u.magala_id) as city_name
        FROM voter_turnout vt
        LEFT JOIN useraccount u ON vt.reporter_id = u.id
        WHERE vt.report_date >= ? 
        AND vt.report_date <= ?
        AND vt.status = 1";
        
        $params = [$startDate, $endDate];
        
        if($naannoofil_id) {
            $sql .= " AND vt.naannoofil_id = ?";
            $params[] = $naannoofil_id;
        }
        
        if($statusLevel != 'all' && !empty($statusLevel)) {
            $sql .= " AND vt.status_level = ?";
            $params[] = $statusLevel;
        }
        
        $sql .= " ORDER BY vt.report_date DESC, vt.created_at DESC";
        
        $query = $this->db->query($sql, $params);
        return $query->result();
    }
    
    /**
     * Get summary for a specific region
     */
    public function getRegionSummary($naannoofil_id, $startDate, $endDate) {
        $summary = new stdClass();
        
        // Total reports
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $summary->total_reports = $this->db->count_all_results($this->table);
        
        // Total male voters
        $this->db->select('SUM(male_voters) as total_male');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        $result = $query->row();
        $summary->total_male_voters = $result->total_male ?: 0;
        
        // Total female voters
        $this->db->select('SUM(female_voters) as total_female');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        $result = $query->row();
        $summary->total_female_voters = $result->total_female ?: 0;
        
        // Total voters
        $summary->total_voters = $summary->total_male_voters + $summary->total_female_voters;
        
        // Status level counts
        $this->db->select('status_level, COUNT(*) as count');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $this->db->group_by('status_level');
        $query = $this->db->get($this->table);
        $statusCounts = $query->result();
        
        $summary->green_count = 0;
        $summary->yellow_count = 0;
        $summary->red_count = 0;
        
        foreach($statusCounts as $sc) {
            if($sc->status_level == 'green') $summary->green_count = $sc->count;
            if($sc->status_level == 'yellow') $summary->yellow_count = $sc->count;
            if($sc->status_level == 'red') $summary->red_count = $sc->count;
        }
        
        return $summary;
    }
    
    /**
     * Get all unique naannoofil_id from useraccount that have reports
     */
    public function getAllRegions() {
        $sql = "SELECT DISTINCT vt.naannoofil_id
        FROM voter_turnout vt
        WHERE vt.status = 1 
        AND vt.naannoofil_id IS NOT NULL
        ORDER BY vt.naannoofil_id ASC";
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /**
     * Get all regions with their totals (for admin)
     */
    public function getAllRegionsWithTotals($startDate = null, $endDate = null, $statusLevel = 'all') {
        if(!$startDate) $startDate = date('Y-m-d', strtotime('-30 days'));
        if(!$endDate) $endDate = date('Y-m-d');
        
        $sql = "SELECT 
            vt.naannoofil_id,
            COUNT(*) as total_reports,
            SUM(vt.male_voters) as total_male_voters,
            SUM(vt.female_voters) as total_female_voters,
            SUM(vt.total_voters) as total_voters,
            MAX(vt.report_date) as last_report_date
        FROM voter_turnout vt
        WHERE vt.report_date >= ?
        AND vt.report_date <= ?
        AND vt.status = 1";
        
        $params = [$startDate, $endDate];
        
        if($statusLevel != 'all' && !empty($statusLevel)) {
            $sql .= " AND vt.status_level = ?";
            $params[] = $statusLevel;
        }
        
        $sql .= " GROUP BY vt.naannoofil_id
                  ORDER BY total_voters DESC";
        
        $query = $this->db->query($sql, $params);
        return $query->result();
    }
    
    /**
     * Get dashboard statistics for admin
     */
    public function getDashboardStats($startDate = null, $endDate = null) {
        if(!$startDate) $startDate = date('Y-m-d', strtotime('-30 days'));
        if(!$endDate) $endDate = date('Y-m-d');
        
        $today = date('Y-m-d');
        $currentMonth = date('Y-m-01');
        $currentMonthEnd = date('Y-m-t');
        
        // Overall totals (within date range)
        $overallStats = $this->db->select('
                COUNT(*) as total_reports,
                SUM(total_voters) as total_voters,
                SUM(male_voters) as total_male_voters,
                SUM(female_voters) as total_female_voters
            ')
            ->from($this->table)
            ->where('report_date >=', $startDate)
            ->where('report_date <=', $endDate)
            ->where('status', 1)
            ->get()
            ->row();
        
        // Status level counts
        $statusCounts = $this->db->select('status_level, COUNT(*) as count')
            ->from($this->table)
            ->where('report_date >=', $startDate)
            ->where('report_date <=', $endDate)
            ->where('status', 1)
            ->group_by('status_level')
            ->get()
            ->result();
        
        $greenCount = 0;
        $yellowCount = 0;
        $redCount = 0;
        foreach($statusCounts as $sc) {
            if($sc->status_level == 'green') $greenCount = $sc->count;
            if($sc->status_level == 'yellow') $yellowCount = $sc->count;
            if($sc->status_level == 'red') $redCount = $sc->count;
        }
        
        // Total regions
        $regionCount = $this->db->select('COUNT(DISTINCT naannoofil_id) as total')
            ->from($this->table)
            ->where('report_date >=', $startDate)
            ->where('report_date <=', $endDate)
            ->where('status', 1)
            ->get()
            ->row();
        
        // Top regions
        $topRegions = $this->db->select('
                naannoofil_id,
                COUNT(*) as report_count,
                SUM(total_voters) as total_voters
            ')
            ->from($this->table)
            ->where('report_date >=', $startDate)
            ->where('report_date <=', $endDate)
            ->where('status', 1)
            ->group_by('naannoofil_id')
            ->order_by('total_voters', 'DESC')
            ->limit(10)
            ->get()
            ->result();
        
        // Gender breakdown
        $genderBreakdown = $this->db->select('
                SUM(male_voters) as male_voters,
                SUM(female_voters) as female_voters
            ')
            ->from($this->table)
            ->where('report_date >=', $startDate)
            ->where('report_date <=', $endDate)
            ->where('status', 1)
            ->get()
            ->row();
        
        // Weekly trend data
        $weeklyTrend = [];
        for($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $dayStats = $this->db->select('SUM(total_voters) as total_voters, COUNT(*) as report_count')
                ->from($this->table)
                ->where('report_date', $date)
                ->where('status', 1)
                ->get()
                ->row();
            
            $weeklyTrend[] = [
                'date' => $date,
                'day' => date('D', strtotime($date)),
                'total_voters' => $dayStats->total_voters ?? 0,
                'report_count' => $dayStats->report_count ?? 0
            ];
        }
        
        return [
            'overall' => $overallStats,
            'green_count' => $greenCount,
            'yellow_count' => $yellowCount,
            'red_count' => $redCount,
            'total_regions' => $regionCount->total ?? 0,
            'top_regions' => $topRegions,
            'gender' => $genderBreakdown,
            'weekly_trend' => $weeklyTrend
        ];
    }
    
    /**
     * Get all reports for admin with filters
     */
    public function getAllReports($startDate = null, $endDate = null, $statusLevel = 'all', $region = 'all') {
        if(!$startDate) $startDate = date('Y-m-d', strtotime('-30 days'));
        if(!$endDate) $endDate = date('Y-m-d');
        
        $sql = "SELECT 
            vt.*,
            u.first_name, u.middle_name, u.last_name,
            u.zone_id, u.magala_id,
            (SELECT zname FROM zone WHERE zid = u.zone_id) as zone_name,
            (SELECT cname FROM city WHERE cid = u.magala_id) as city_name
        FROM voter_turnout vt
        LEFT JOIN useraccount u ON vt.reporter_id = u.id
        WHERE vt.report_date >= ? 
        AND vt.report_date <= ?
        AND vt.status = 1";
        
        $params = [$startDate, $endDate];
        
        if($statusLevel != 'all' && !empty($statusLevel)) {
            $sql .= " AND vt.status_level = ?";
            $params[] = $statusLevel;
        }
        
        if($region != 'all' && !empty($region)) {
            $sql .= " AND vt.naannoofil_id = ?";
            $params[] = $region;
        }
        
        $sql .= " ORDER BY vt.report_date DESC, vt.created_at DESC";
        
        $query = $this->db->query($sql, $params);
        return $query->result();
    }
    
    /**
     * Get status breakdown by region
     */
    public function getStatusByRegion($startDate = null, $endDate = null) {
        if(!$startDate) $startDate = date('Y-m-d', strtotime('-30 days'));
        if(!$endDate) $endDate = date('Y-m-d');
        
        $sql = "SELECT 
            naannoofil_id,
            SUM(CASE WHEN status_level = 'green' THEN 1 ELSE 0 END) as green_count,
            SUM(CASE WHEN status_level = 'yellow' THEN 1 ELSE 0 END) as yellow_count,
            SUM(CASE WHEN status_level = 'red' THEN 1 ELSE 0 END) as red_count,
            COUNT(*) as total_reports
        FROM voter_turnout
        WHERE report_date >= ?
        AND report_date <= ?
        AND status = 1
        GROUP BY naannoofil_id
        ORDER BY naannoofil_id ASC";
        
        $query = $this->db->query($sql, [$startDate, $endDate]);
        return $query->result();
    }

    
}
?>