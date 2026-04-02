<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminReport_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
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

    /**
     * Export reports data for Excel/CSV
     */
    public function getExportData($startDate, $endDate, $session = 'all', $regionId = 'all') {
        $this->db->select('
            vr.report_date,
            vr.report_session,
            vr.serial_number,
            vr.naannoofil_id,
            vr.reporter_name,
            u.phoneno as reporter_phone,
            u.email as reporter_email,
            vr.plan_member_male,
            vr.plan_member_female,
            vr.plan_member_total,
            vr.plan_nonmember_male,
            vr.plan_nonmember_female,
            vr.plan_nonmember_total,
            vr.plan_grand_total,
            vr.actual_member_male,
            vr.actual_member_female,
            vr.actual_member_total,
            vr.actual_member_percent,
            vr.actual_nonmember_male,
            vr.actual_nonmember_female,
            vr.actual_nonmember_total,
            vr.actual_nonmember_percent,
            vr.actual_grand_total,
            vr.actual_total_percent,
            vr.additional_member_male,
            vr.additional_member_female,
            vr.additional_member_total,
            vr.additional_nonmember_male,
            vr.additional_nonmember_female,
            vr.additional_nonmember_total,
            vr.remarks,
            vr.created_at,
            z.zname as zone_name,
            w.woreda_name,
            c.cname as city_name
        ');
        $this->db->from('voting_reports vr');
        $this->db->join('useraccount u', 'vr.reporter_id = u.id', 'left');
        $this->db->join('zone z', 'u.zone_id = z.zid', 'left');
        $this->db->join('woreda w', 'u.woreda_id = w.woreda_id', 'left');
        $this->db->join('city c', 'u.magala_id = c.cid', 'left');
        
        $this->db->where('vr.report_date >=', $startDate);
        $this->db->where('vr.report_date <=', $endDate);
        $this->db->where('vr.status', 1);
        
        if($session != 'all') {
            $this->db->where('vr.report_session', $session);
        }
        
        if($regionId != 'all') {
            $this->db->where('vr.naannoofil_id', $regionId);
        }
        
        $this->db->order_by('vr.report_date', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get daily report summary
     */
    public function getDailySummary($date) {
        $this->db->select('
            COUNT(*) as total_reports,
            SUM(CASE WHEN report_session = "morning" THEN 1 ELSE 0 END) as morning_count,
            SUM(CASE WHEN report_session = "afternoon" THEN 1 ELSE 0 END) as afternoon_count,
            SUM(actual_grand_total) as total_voters,
            SUM(actual_member_total) as total_members,
            SUM(actual_nonmember_total) as total_nonmembers
        ');
        $this->db->where('report_date', $date);
        $this->db->where('status', 1);
        $query = $this->db->get('voting_reports');
        return $query->row();
    }

    /**
     * Get monthly report summary
     */
    public function getMonthlySummary($year, $month) {
        $startDate = $year . '-' . $month . '-01';
        $endDate = date('Y-m-t', strtotime($startDate));
        
        $this->db->select('
            COUNT(*) as total_reports,
            COUNT(DISTINCT naannoofil_id) as active_regions,
            SUM(actual_grand_total) as total_voters,
            SUM(actual_member_total) as total_members,
            SUM(actual_nonmember_total) as total_nonmembers,
            AVG(actual_total_percent) as avg_completion
        ');
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $query = $this->db->get('voting_reports');
        return $query->row();
    }
}