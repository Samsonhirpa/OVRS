<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VotingReport_model extends CI_Model {
    
    private $table = 'voting_reports';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Save voting report
     */
    public function saveReport($data) {
        // Check if report for this session already exists
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
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
    }
    
    /**
     * Get today's report for a voting region
     */
    public function getTodayReport($naannoofil_id, $date) {
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date', $date);
        $this->db->where('status', 1);
        $this->db->order_by('report_session', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    /**
     * Get session report (morning/afternoon)
     */
    public function getSessionReport($naannoofil_id, $date, $session) {
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date', $date);
        $this->db->where('report_session', $session);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        return $query->row();
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
     * Get reports by date range
     */
    public function getReportsByDateRange($naannoofil_id, $startDate, $endDate, $session = 'all') {
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        
        if($session != 'all') {
            $this->db->where('report_session', $session);
        }
        
        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('report_session', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    /**
     * Get report by ID
     */
    public function getReportById($id) {
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        return $query->row();
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
     * Soft delete report
     */
    public function deleteReport($id) {
        $this->db->where('id', $id);
        $this->db->update($this->table, ['status' => 0, 'deleted_at' => date('Y-m-d H:i:s')]);
        return $this->db->affected_rows() > 0;
    }
    
    /**
     * Get reports by multiple regions (for PBO)
     */
    public function getReportsByRegions($regionIds, $startDate, $endDate, $session = 'all', $regionId = 'all') {
        if(!empty($regionIds)) {
            $this->db->where_in('naannoofil_id', $regionIds);
        }
        
        if($regionId != 'all') {
            $this->db->where('naannoofil_id', $regionId);
        }
        
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        
        if($session != 'all') {
            $this->db->where('report_session', $session);
        }
        
        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * Get all reports with detailed information for admin
     */
    public function getAllReportsDetailed($startDate, $endDate, $session = 'all', $regionId = 'all', $search = '') {
        $this->db->select('
            vr.*,
            u.first_name,
            u.middle_name,
            u.last_name,
            u.phoneno as reporter_phone,
            u.email as reporter_email,
            u.naannoofil as user_naannoofil,
            z.zname as zone_name,
            w.woreda_name,
            k.kname as kebele_name,
            c.cname as city_name,
            sc.subcity_name,
            scw.sbw_name as subcity_woreda_name
        ');
        $this->db->from('voting_reports vr');
        $this->db->join('useraccount u', 'vr.reporter_id = u.id', 'left');
        $this->db->join('zone z', 'u.zone_id = z.zid', 'left');
        $this->db->join('woreda w', 'u.woreda_id = w.woreda_id', 'left');
        $this->db->join('kebele k', 'u.kebele = k.kid', 'left');
        $this->db->join('city c', 'u.magala_id = c.cid', 'left');
        $this->db->join('subcity sc', 'u.kmagala_id = sc.subcity_id', 'left');
        $this->db->join('subcity_woreda scw', 'u.akmagala_id = scw.sbw_id', 'left');
        
        $this->db->where('vr.report_date >=', $startDate);
        $this->db->where('vr.report_date <=', $endDate);
        $this->db->where('vr.status', 1);
        
        if($session != 'all') {
            $this->db->where('vr.report_session', $session);
        }
        
        if($regionId != 'all') {
            $this->db->where('vr.naannoofil_id', $regionId);
        }
        
        if(!empty($search)) {
            $this->db->group_start();
            $this->db->like('vr.naannoofil_id', $search);
            $this->db->or_like('vr.reporter_name', $search);
            $this->db->or_like('u.first_name', $search);
            $this->db->or_like('u.last_name', $search);
            $this->db->or_like('u.phoneno', $search);
            $this->db->or_like('z.zname', $search);
            $this->db->or_like('w.woreda_name', $search);
            $this->db->or_like('c.cname', $search);
            $this->db->group_end();
        }
        
        $this->db->order_by('vr.report_date', 'DESC');
        $this->db->order_by('vr.created_at', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get report detail by ID with all information
     */
    public function getReportDetailById($id) {
        $this->db->select('
            vr.*,
            u.first_name,
            u.middle_name,
            u.last_name,
            u.phoneno as reporter_phone,
            u.email as reporter_email,
            u.naannoofil as user_naannoofil,
            u.dob as reporter_dob,
            u.gender_id,
            g.gender_name,
            z.zname as zone_name,
            w.woreda_name,
            k.kname as kebele_name,
            c.cname as city_name,
            sc.subcity_name,
            scw.sbw_name as subcity_woreda_name
        ');
        $this->db->from('voting_reports vr');
        $this->db->join('useraccount u', 'vr.reporter_id = u.id', 'left');
        $this->db->join('gender g', 'u.gender_id = g.gender_id', 'left');
        $this->db->join('zone z', 'u.zone_id = z.zid', 'left');
        $this->db->join('woreda w', 'u.woreda_id = w.woreda_id', 'left');
        $this->db->join('kebele k', 'u.kebele = k.kid', 'left');
        $this->db->join('city c', 'u.magala_id = c.cid', 'left');
        $this->db->join('subcity sc', 'u.kmagala_id = sc.subcity_id', 'left');
        $this->db->join('subcity_woreda scw', 'u.akmagala_id = scw.sbw_id', 'left');
        $this->db->where('vr.id', $id);
        $this->db->where('vr.status', 1);
        
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Get all regions for filter dropdown
     */
    public function getAllRegions() {
        $this->db->select('DISTINCT(naannoofil) as naannoofil, first_name, last_name');
        $this->db->from('useraccount');
        $this->db->where('role_id', 3);
        $this->db->where('naannoofil IS NOT NULL');
        $this->db->order_by('naannoofil', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get reports summary statistics
     */
    public function getReportsSummary($startDate, $endDate) {
        $summary = new stdClass();
        
        // Total reports
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $summary->total_reports = $this->db->count_all_results('voting_reports');
        
        // Morning reports
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('report_session', 'morning');
        $this->db->where('status', 1);
        $summary->morning_reports = $this->db->count_all_results('voting_reports');
        
        // Afternoon reports
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('report_session', 'afternoon');
        $this->db->where('status', 1);
        $summary->afternoon_reports = $this->db->count_all_results('voting_reports');
        
        // Total voters
        $this->db->select('SUM(actual_grand_total) as total_voters');
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $query = $this->db->get('voting_reports');
        $result = $query->row();
        $summary->total_voters = $result->total_voters ?: 0;
        
        // Total members
        $this->db->select('SUM(actual_member_total) as total_members');
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $query = $this->db->get('voting_reports');
        $result = $query->row();
        $summary->total_members = $result->total_members ?: 0;
        
        // Total non-members
        $this->db->select('SUM(actual_nonmember_total) as total_nonmembers');
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $query = $this->db->get('voting_reports');
        $result = $query->row();
        $summary->total_nonmembers = $result->total_nonmembers ?: 0;
        
        // Gender breakdown
        $this->db->select('
            SUM(actual_member_male) as member_male,
            SUM(actual_member_female) as member_female,
            SUM(actual_nonmember_male) as nonmember_male,
            SUM(actual_nonmember_female) as nonmember_female
        ');
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $query = $this->db->get('voting_reports');
        $result = $query->row();
        
        $summary->member_male = $result->member_male ?: 0;
        $summary->member_female = $result->member_female ?: 0;
        $summary->nonmember_male = $result->nonmember_male ?: 0;
        $summary->nonmember_female = $result->nonmember_female ?: 0;
        
        // Unique regions
        $this->db->distinct();
        $this->db->select('naannoofil_id');
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $query = $this->db->get('voting_reports');
        $summary->unique_regions = $query->num_rows();
        
        return $summary;
    }

    /**
     * Get report statistics by region
     */
    public function getReportsByRegion($startDate, $endDate) {
        $this->db->select('
            naannoofil_id,
            COUNT(*) as report_count,
            SUM(actual_grand_total) as total_voters,
            SUM(actual_member_total) as total_members,
            SUM(actual_nonmember_total) as total_nonmembers
        ');
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $this->db->group_by('naannoofil_id');
        $this->db->order_by('report_count', 'DESC');
        $query = $this->db->get('voting_reports');
        return $query->result();
    }
    
    // ========== ADDITIONAL METHODS FOR ENHANCED TOTALS ==========
    
    /**
     * Get total voters all time for a specific region
     */
    public function getTotalVotersAllTime($region_id) {
        $this->db->select_sum('actual_grand_total');
        $this->db->where('naannoofil_id', $region_id);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        return $query->row()->actual_grand_total ?? 0;
    }
    
    /**
     * Get total active regions for a given month
     */
    public function getTotalActiveRegions($month) {
        $this->db->distinct();
        $this->db->select('naannoofil_id');
        $this->db->where('DATE_FORMAT(report_date, "%Y-%m") =', $month);  // FIXED: Added = operator
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }
    
    /**
     * Get completion rate for a region in a given month
     */
    public function getCompletionRate($month, $region_id) {
        // Count working days (days with at least one report)
        $sql = "SELECT COUNT(DISTINCT report_date) as working_days
                FROM {$this->table}
                WHERE DATE_FORMAT(report_date, '%Y-%m') = ?
                AND naannoofil_id = ?
                AND status = 1";
        $query = $this->db->query($sql, array($month, $region_id));
        $working_days = $query->row()->working_days ?? 0;
        
        // Count total reports
        $this->db->where('DATE_FORMAT(report_date, "%Y-%m") =', $month);  // FIXED: Added = operator
        $this->db->where('naannoofil_id', $region_id);
        $this->db->where('status', 1);
        $total_reports = $this->db->count_all_results($this->table);
        
        // Each day should have 2 reports (morning and afternoon)
        $expected_reports = $working_days * 2;
        
        if($expected_reports > 0) {
            return round(($total_reports / $expected_reports) * 100);
        }
        return 0;
    }
    
    /**
     * Get monthly trend for a region (last 6 months)
     */
    public function getMonthlyTrend($region_id) {
        $sql = "SELECT 
                    DATE_FORMAT(report_date, '%b %Y') as month,
                    SUM(actual_grand_total) as total
                FROM {$this->table}
                WHERE report_date >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
                AND naannoofil_id = ?
                AND status = 1
                GROUP BY DATE_FORMAT(report_date, '%Y-%m')
                ORDER BY report_date ASC";
        $query = $this->db->query($sql, array($region_id));
        return $query->result();
    }
    
    /**
     * Get top regions for a given month
     */
    public function getTopRegions($month) {
        $sql = "SELECT 
                    naannoofil_id,
                    COUNT(*) as report_count,
                    SUM(actual_grand_total) as total_voters
                FROM {$this->table}
                WHERE DATE_FORMAT(report_date, '%Y-%m') = ?
                AND status = 1
                GROUP BY naannoofil_id
                ORDER BY total_voters DESC
                LIMIT 5";
        $query = $this->db->query($sql, array($month));
        return $query->result();
    }
}
?>