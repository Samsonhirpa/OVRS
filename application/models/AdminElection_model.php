<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminElection_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
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
     * Get all unique locations (Zones and Cities) from user accounts that have reports
     */
    public function getAllLocations() {
        $sql = "SELECT DISTINCT 
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN CONCAT('city_', u.magala_id)
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN CONCAT('zone_', u.zone_id)
                ELSE NULL
            END as location_key,
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN (SELECT cname FROM city WHERE cid = u.magala_id)
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN (SELECT zname FROM zone WHERE zid = u.zone_id)
                ELSE NULL
            END as location_name,
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN 'city'
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN 'zone'
                ELSE NULL
            END as location_type,
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN u.magala_id
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN u.zone_id
                ELSE NULL
            END as location_id
        FROM election_reports er
        LEFT JOIN useraccount u ON er.created_by = u.id
        WHERE er.status = 1 
        AND (u.magala_id IS NOT NULL OR u.zone_id IS NOT NULL)
        GROUP BY location_key
        ORDER BY location_name ASC";
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /**
     * Get all election reports with filters including user location
     */
    public function getAllReports($startDate = null, $endDate = null, $party = 'all', $region = 'all', $location = 'all', $locationType = null, $locationId = null) {
        if(!$startDate) $startDate = date('Y-m-d', strtotime('-30 days'));
        if(!$endDate) $endDate = date('Y-m-d');
        
        $sql = "SELECT er.*, 
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN (SELECT cname FROM city WHERE cid = u.magala_id)
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN (SELECT zname FROM zone WHERE zid = u.zone_id)
                ELSE NULL
            END as location_name,
            u.zone_id, u.magala_id,
            (SELECT zname FROM zone WHERE zid = u.zone_id) as zone_name,
            (SELECT cname FROM city WHERE cid = u.magala_id) as city_name
        FROM election_reports er
        LEFT JOIN useraccount u ON er.created_by = u.id
        WHERE er.report_date >= ? 
        AND er.report_date <= ?
        AND er.status = 1";
        
        $params = [$startDate, $endDate];
        
        if($party != 'all') {
            $sql .= " AND er.party_name = ?";
            $params[] = $party;
        }
        
        if($region != 'all') {
            $sql .= " AND er.naannoofil_id = ?";
            $params[] = $region;
        }
        
        if($location != 'all' && $locationId) {
            if($locationType == 'zone') {
                $sql .= " AND u.zone_id = ?";
                $params[] = $locationId;
            } elseif($locationType == 'city') {
                $sql .= " AND u.magala_id = ?";
                $params[] = $locationId;
            }
        }
        
        $sql .= " ORDER BY er.report_date DESC, er.created_at DESC";
        
        $query = $this->db->query($sql, $params);
        return $query->result();
    }
    
    /**
     * Get all reports with teessoo (Zone/Magalaa) names
     */
    public function getAllReportsWithTeessoo($startDate = null, $endDate = null, $party = 'all', $region = 'all', $teessooType = 'all') {
        if(!$startDate) $startDate = date('Y-m-d', strtotime('-30 days'));
        if(!$endDate) $endDate = date('Y-m-d');
        
        $sql = "SELECT 
            er.*,
            u.zone_id,
            u.magala_id,
            (SELECT zname FROM zone WHERE zid = u.zone_id) as zone_name,
            (SELECT cname FROM city WHERE cid = u.magala_id) as city_name,
            CONCAT(u.first_name, ' ', u.last_name) as reporter_name
        FROM election_reports er
        LEFT JOIN useraccount u ON er.created_by = u.id
        WHERE er.report_date >= ? 
        AND er.report_date <= ?
        AND er.status = 1";
        
        $params = [$startDate, $endDate];
        
        if($party != 'all') {
            $sql .= " AND er.party_name = ?";
            $params[] = $party;
        }
        
        if($region != 'all') {
            $sql .= " AND er.naannoofil_id = ?";
            $params[] = $region;
        }
        
        if($teessooType != 'all') {
            if($teessooType == 'zone') {
                $sql .= " AND u.zone_id IS NOT NULL AND u.zone_id > 0";
            } elseif($teessooType == 'magalaa') {
                $sql .= " AND u.magala_id IS NOT NULL AND u.magala_id > 0";
            }
        }
        
        $sql .= " ORDER BY er.report_date DESC, er.created_at DESC";
        
        $query = $this->db->query($sql, $params);
        return $query->result();
    }
    
    /**
     * Get single report by ID with location
     */
    public function getReportById($id) {
        $sql = "SELECT er.*, 
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN (SELECT cname FROM city WHERE cid = u.magala_id)
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN (SELECT zname FROM zone WHERE zid = u.zone_id)
                ELSE NULL
            END as location_name,
            u.first_name, u.middle_name, u.last_name, u.zone_id, u.magala_id
        FROM election_reports er
        LEFT JOIN useraccount u ON er.created_by = u.id
        WHERE er.id = ? 
        AND er.status = 1";
        
        $query = $this->db->query($sql, [$id]);
        return $query->row();
    }
    
    /**
     * Get all parties with their total votes
     */
    public function getAllPartiesWithTotals($startDate = null, $endDate = null, $party = 'all', $region = 'all', $teessooType = 'all') {
        if(!$startDate) $startDate = date('Y-m-d', strtotime('-30 days'));
        if(!$endDate) $endDate = date('Y-m-d');
        
        $sql = "SELECT 
            er.party_name,
            COUNT(*) as total_reports,
            SUM(er.male_voters) as total_male_voters,
            SUM(er.female_voters) as total_female_voters,
            SUM(er.grand_total) as total_voters,
            MAX(er.report_date) as last_report_date
        FROM election_reports er
        LEFT JOIN useraccount u ON er.created_by = u.id
        WHERE er.report_date >= ?
        AND er.report_date <= ?
        AND er.status = 1";
        
        $params = [$startDate, $endDate];
        
        if($party != 'all') {
            $sql .= " AND er.party_name = ?";
            $params[] = $party;
        }
        
        if($region != 'all') {
            $sql .= " AND er.naannoofil_id = ?";
            $params[] = $region;
        }
        
        if($teessooType != 'all') {
            if($teessooType == 'zone') {
                $sql .= " AND u.zone_id IS NOT NULL AND u.zone_id > 0";
            } elseif($teessooType == 'magalaa') {
                $sql .= " AND u.magala_id IS NOT NULL AND u.magala_id > 0";
            }
        }
        
        $sql .= " GROUP BY er.party_name
                  ORDER BY total_voters DESC";
        
        $query = $this->db->query($sql, $params);
        return $query->result();
    }
    
    /**
     * Get all parties (simple list)
     */
    public function getAllParties() {
        $this->db->distinct();
        $this->db->select('party_name');
        $this->db->from('election_reports');
        $this->db->where('status', 1);
        $this->db->order_by('party_name', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Get all regions (naannoofil_id)
     */
    public function getAllRegions() {
        $this->db->distinct();
        $this->db->select('naannoofil_id');
        $this->db->from('election_reports');
        $this->db->where('status', 1);
        $this->db->where('naannoofil_id IS NOT NULL');
        $this->db->order_by('naannoofil_id', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Get last day reports (today or most recent date)
     */
    public function getLastDayReports() {
        // Get the most recent report date
        $this->db->select_max('report_date');
        $query = $this->db->get('election_reports');
        $lastDate = $query->row()->report_date;
        
        if(!$lastDate) return [];
        
        $sql = "SELECT er.*, 
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN (SELECT cname FROM city WHERE cid = u.magala_id)
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN (SELECT zname FROM zone WHERE zid = u.zone_id)
                ELSE NULL
            END as location_name
        FROM election_reports er
        LEFT JOIN useraccount u ON er.created_by = u.id
        WHERE er.report_date = ? 
        AND er.status = 1
        ORDER BY er.party_name ASC";
        
        $query = $this->db->query($sql, [$lastDate]);
        return $query->result();
    }
    
    /**
     * Get today's reports with location
     */
    public function getTodayReports() {
        $today = date('Y-m-d');
        
        $sql = "SELECT er.*, 
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN (SELECT cname FROM city WHERE cid = u.magala_id)
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN (SELECT zname FROM zone WHERE zid = u.zone_id)
                ELSE NULL
            END as location_name
        FROM election_reports er
        LEFT JOIN useraccount u ON er.created_by = u.id
        WHERE er.report_date = ? 
        AND er.status = 1
        ORDER BY er.party_name ASC";
        
        $query = $this->db->query($sql, [$today]);
        return $query->result();
    }
    
    /**
     * Get dashboard statistics
     */
    public function getDashboardStats() {
        $today = date('Y-m-d');
        $currentMonth = date('Y-m-01');
        $currentMonthEnd = date('Y-m-t');
        
        // Overall totals (all time)
        $overallStats = $this->db->select('
                COUNT(*) as total_reports,
                SUM(grand_total) as total_voters,
                SUM(male_voters) as total_male_voters,
                SUM(female_voters) as total_female_voters,
                COUNT(DISTINCT party_name) as total_parties,
                COUNT(DISTINCT naannoofil_id) as total_regions
            ')
            ->from('election_reports')
            ->where('status', 1)
            ->get()
            ->row();
        
        // Today's statistics
        $todayStats = $this->db->select('
                COUNT(*) as total_reports,
                SUM(grand_total) as total_voters,
                SUM(male_voters) as total_male_voters,
                SUM(female_voters) as total_female_voters,
                COUNT(DISTINCT party_name) as active_parties,
                COUNT(DISTINCT naannoofil_id) as active_regions
            ')
            ->from('election_reports')
            ->where('report_date', $today)
            ->where('status', 1)
            ->get()
            ->row();
        
        // Current month statistics
        $monthlyStats = $this->db->select('
                COUNT(*) as total_reports,
                SUM(grand_total) as total_voters,
                SUM(male_voters) as total_male_voters,
                SUM(female_voters) as total_female_voters
            ')
            ->from('election_reports')
            ->where('report_date >=', $currentMonth)
            ->where('report_date <=', $currentMonthEnd)
            ->where('status', 1)
            ->get()
            ->row();
        
        // Party-wise statistics
        $partyStats = $this->db->select('
                party_name,
                COUNT(*) as report_count,
                SUM(grand_total) as total_voters,
                SUM(male_voters) as total_male_voters,
                SUM(female_voters) as total_female_voters
            ')
            ->from('election_reports')
            ->where('status', 1)
            ->group_by('party_name')
            ->order_by('total_voters', 'DESC')
            ->get()
            ->result();
        
        // Region-wise statistics
        $regionStats = $this->db->select('
                naannoofil_id,
                COUNT(*) as report_count,
                SUM(grand_total) as total_voters,
                SUM(male_voters) as total_male_voters,
                SUM(female_voters) as total_female_voters
            ')
            ->from('election_reports')
            ->where('status', 1)
            ->group_by('naannoofil_id')
            ->order_by('total_voters', 'DESC')
            ->limit(10)
            ->get()
            ->result();
        
        // Last 7 days trend
        $weeklyTrend = [];
        for($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $dayStats = $this->db->select('SUM(grand_total) as total_voters, COUNT(*) as report_count')
                ->from('election_reports')
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
        
        // Gender statistics
        $genderStats = $this->db->select('
                SUM(male_voters) as total_male,
                SUM(female_voters) as total_female
            ')
            ->from('election_reports')
            ->where('status', 1)
            ->get()
            ->row();
        
        return [
            'overall' => $overallStats,
            'today' => $todayStats,
            'monthly' => $monthlyStats,
            'parties' => $partyStats,
            'regions' => $regionStats,
            'weekly_trend' => $weeklyTrend,
            'gender' => $genderStats
        ];
    }
    
    /**
     * Get total elected voters by party
     */
    public function getElectedVotersByParty() {
        $this->db->select('
            party_name,
            SUM(grand_total) as total_elected_voters,
            SUM(male_voters) as total_male_voters,
            SUM(female_voters) as total_female_voters,
            COUNT(*) as total_reports
        ');
        $this->db->from('election_reports');
        $this->db->where('status', 1);
        $this->db->group_by('party_name');
        $this->db->order_by('total_elected_voters', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Get daily summary for chart
     */
    public function getDailySummary($days = 30) {
        $startDate = date('Y-m-d', strtotime("-$days days"));
        
        $this->db->select('
            report_date,
            SUM(grand_total) as total_voters,
            COUNT(*) as total_reports,
            COUNT(DISTINCT party_name) as active_parties
        ');
        $this->db->from('election_reports');
        $this->db->where('report_date >=', $startDate);
        $this->db->where('status', 1);
        $this->db->group_by('report_date');
        $this->db->order_by('report_date', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Get party performance over time
     */
    public function getPartyPerformance($partyName, $days = 30) {
        $startDate = date('Y-m-d', strtotime("-$days days"));
        
        $this->db->select('
            report_date,
            SUM(grand_total) as daily_voters,
            COUNT(*) as report_count
        ');
        $this->db->from('election_reports');
        $this->db->where('party_name', $partyName);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('status', 1);
        $this->db->group_by('report_date');
        $this->db->order_by('report_date', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Export reports to CSV with location
     */
    public function getExportData($startDate, $endDate, $party = 'all', $region = 'all', $location = 'all', $locationType = null, $locationId = null) {
        $sql = "SELECT 
            er.report_date,
            er.report_session,
            er.serial_number,
            er.naannoofil_id,
            er.party_name,
            er.reporter_name,
            er.male_voters,
            er.female_voters,
            er.grand_total,
            er.remarks,
            er.created_at,
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN (SELECT cname FROM city WHERE cid = u.magala_id)
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN (SELECT zname FROM zone WHERE zid = u.zone_id)
                ELSE NULL
            END as location_name
        FROM election_reports er
        LEFT JOIN useraccount u ON er.created_by = u.id
        WHERE er.report_date >= ? 
        AND er.report_date <= ?
        AND er.status = 1";
        
        $params = [$startDate, $endDate];
        
        if($party != 'all') {
            $sql .= " AND er.party_name = ?";
            $params[] = $party;
        }
        
        if($region != 'all') {
            $sql .= " AND er.naannoofil_id = ?";
            $params[] = $region;
        }
        
        if($location != 'all' && $locationId) {
            if($locationType == 'zone') {
                $sql .= " AND u.zone_id = ?";
                $params[] = $locationId;
            } elseif($locationType == 'city') {
                $sql .= " AND u.magala_id = ?";
                $params[] = $locationId;
            }
        }
        
        $sql .= " ORDER BY er.report_date DESC, er.party_name ASC";
        
        $query = $this->db->query($sql, $params);
        return $query->result();
    }
    
    /**
     * Get region-wise summary for dashboard
     */
    public function getRegionSummary() {
        $this->db->select('
            naannoofil_id,
            COUNT(*) as total_reports,
            SUM(grand_total) as total_voters,
            SUM(male_voters) as total_male_voters,
            SUM(female_voters) as total_female_voters,
            MAX(report_date) as last_report_date
        ');
        $this->db->from('election_reports');
        $this->db->where('status', 1);
        $this->db->group_by('naannoofil_id');
        $this->db->order_by('total_voters', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Get location-wise summary (Zone/City)
     */
    public function getLocationSummary() {
        $sql = "SELECT 
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN 'city'
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN 'zone'
                ELSE NULL
            END as location_type,
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN u.magala_id
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN u.zone_id
                ELSE NULL
            END as location_id,
            CASE 
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN (SELECT cname FROM city WHERE cid = u.magala_id)
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN (SELECT zname FROM zone WHERE zid = u.zone_id)
                ELSE NULL
            END as location_name,
            COUNT(*) as total_reports,
            SUM(er.grand_total) as total_voters,
            SUM(er.male_voters) as total_male_voters,
            SUM(er.female_voters) as total_female_voters,
            MAX(er.report_date) as last_report_date
        FROM election_reports er
        LEFT JOIN useraccount u ON er.created_by = u.id
        WHERE er.status = 1 
        AND (u.magala_id IS NOT NULL OR u.zone_id IS NOT NULL)
        GROUP BY location_name, location_type, location_id
        ORDER BY total_voters DESC";
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /**
     * Get Naannoo Filannoo summary with teessoo (Zone/Magalaa) names
     */
    public function getNaannooFilannooSummary($startDate = null, $endDate = null, $party = 'all', $teessooType = 'all') {
        if(!$startDate) $startDate = date('Y-m-d', strtotime('-30 days'));
        if(!$endDate) $endDate = date('Y-m-d');
        
        $sql = "SELECT 
            er.naannoofil_id,
            CASE 
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN 'zone'
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN 'magalaa'
                ELSE NULL
            END as teessoo_type,
            CASE 
                WHEN u.zone_id IS NOT NULL AND u.zone_id > 0 THEN u.zone_id
                WHEN u.magala_id IS NOT NULL AND u.magala_id > 0 THEN u.magala_id
                ELSE NULL
            END as teessoo_id,
            (SELECT zname FROM zone WHERE zid = u.zone_id) as zone_name,
            (SELECT cname FROM city WHERE cid = u.magala_id) as city_name,
            COUNT(*) as total_reports,
            SUM(er.male_voters) as total_male_voters,
            SUM(er.female_voters) as total_female_voters,
            SUM(er.grand_total) as total_voters,
            MAX(er.report_date) as last_report_date
        FROM election_reports er
        LEFT JOIN useraccount u ON er.created_by = u.id
        WHERE er.report_date >= ?
        AND er.report_date <= ?
        AND er.status = 1";
        
        $params = [$startDate, $endDate];
        
        if($party != 'all') {
            $sql .= " AND er.party_name = ?";
            $params[] = $party;
        }
        
        if($teessooType != 'all') {
            if($teessooType == 'zone') {
                $sql .= " AND u.zone_id IS NOT NULL AND u.zone_id > 0";
            } elseif($teessooType == 'magalaa') {
                $sql .= " AND u.magala_id IS NOT NULL AND u.magala_id > 0";
            }
        }
        
        $sql .= " GROUP BY er.naannoofil_id, teessoo_type, teessoo_id, zone_name, city_name
                  ORDER BY total_voters DESC";
        
        $query = $this->db->query($sql, $params);
        return $query->result();
    }
}
?>