<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ElectionReport_model extends CI_Model {
    
    private $table = 'election_reports';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Save election report
     */
    public function saveReport($data) {
        // Check if report for this session already exists
        $this->db->where('naannoofil_id', $data['naannoofil_id']);
        $this->db->where('report_date', $data['report_date']);
        $this->db->where('report_session', $data['report_session']);
        $this->db->where('party_name', $data['party_name']);
        $query = $this->db->get($this->table);
        
        if($query->num_rows() > 0) {
            // Update existing report
            $this->db->where('naannoofil_id', $data['naannoofil_id']);
            $this->db->where('report_date', $data['report_date']);
            $this->db->where('report_session', $data['report_session']);
            $this->db->where('party_name', $data['party_name']);
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
     * Get session report
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
    public function getReportsByDateRange($naannoofil_id, $startDate, $endDate, $session = 'all', $party = 'all') {
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        
        if($session != 'all') {
            $this->db->where('report_session', $session);
        }
        
        if($party != 'all' && !empty($party)) {
            $this->db->where('party_name', $party);
        }
        
        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('created_at', 'DESC');
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
     * Delete report
     */
    public function deleteReport($id) {
        $this->db->where('id', $id);
        $this->db->update($this->table, ['status' => 0]);
        return $this->db->affected_rows() > 0;
    }
    
    /**
     * Get reports summary
     */
    public function getReportsSummary($naannoofil_id, $startDate, $endDate) {
        $summary = new stdClass();
        
        // Total reports
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $summary->total_reports = $this->db->count_all_results($this->table);
        
        // Total voters
        $this->db->select('SUM(grand_total) as total_voters');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        $result = $query->row();
        $summary->total_voters = $result->total_voters ?: 0;
        
        // Total members
        $this->db->select('SUM(member_total) as total_members');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        $result = $query->row();
        $summary->total_members = $result->total_members ?: 0;
        
        // Total non-members
        $this->db->select('SUM(nonmember_total) as total_nonmembers');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        $result = $query->row();
        $summary->total_nonmembers = $result->total_nonmembers ?: 0;
        
        return $summary;
    }
    
    /**
     * Get dashboard summary
     */
    public function getDashboardSummary($naannoofil_id, $month) {
        $summary = new stdClass();
        
        // Total reports this month
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('DATE_FORMAT(report_date, "%Y-%m") =', $month);
        $this->db->where('status', 1);
        $summary->total_reports = $this->db->count_all_results($this->table);
        
        // Total voters this month
        $this->db->select('SUM(grand_total) as total_voters');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('DATE_FORMAT(report_date, "%Y-%m") =', $month);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        $result = $query->row();
        $summary->total_voters = $result->total_voters ?: 0;
        
        // Today's reports
        $today = date('Y-m-d');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('report_date', $today);
        $this->db->where('status', 1);
        $summary->today_reports = $this->db->count_all_results($this->table);
        
        // Morning vs Afternoon counts
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('DATE_FORMAT(report_date, "%Y-%m") =', $month);
        $this->db->where('report_session', 'morning');
        $this->db->where('status', 1);
        $summary->morning_count = $this->db->count_all_results($this->table);
        
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('DATE_FORMAT(report_date, "%Y-%m") =', $month);
        $this->db->where('report_session', 'afternoon');
        $this->db->where('status', 1);
        $summary->afternoon_count = $this->db->count_all_results($this->table);
        
        return $summary;
    }
    
    /**
     * Get party breakdown for current month
     */
    public function getPartyBreakdown($naannoofil_id, $month) {
        $this->db->select('
            party_name,
            COUNT(*) as report_count,
            SUM(member_male) as member_male,
            SUM(member_female) as member_female,
            SUM(member_total) as member_total,
            SUM(nonmember_male) as nonmember_male,
            SUM(nonmember_female) as nonmember_female,
            SUM(nonmember_total) as nonmember_total,
            SUM(grand_total) as total_voters
        ');
        $this->db->where('naannoofil_id', $naannoofil_id);
        $this->db->where('DATE_FORMAT(report_date, "%Y-%m") =', $month);
        $this->db->where('status', 1);
        $this->db->group_by('party_name');
        $this->db->order_by('total_voters', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    /**
     * Get last 7 days data for chart
     */
    public function getLast7DaysData($naannoofil_id) {
        $labels = array();
        $data = array();
        
        for($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $labels[] = date('d/m', strtotime($date));
            
            $this->db->select('SUM(grand_total) as daily_total');
            $this->db->where('naannoofil_id', $naannoofil_id);
            $this->db->where('report_date', $date);
            $this->db->where('status', 1);
            $query = $this->db->get($this->table);
            $result = $query->row();
            $data[] = $result->daily_total ?: 0;
        }
        
        return array('labels' => $labels, 'data' => $data);
    }
}
?>