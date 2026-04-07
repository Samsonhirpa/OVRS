<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ElectorRegistration_model extends CI_Model {

    private $table = 'naannoo_elector_registrations';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getPartyList() {
        return array(
            'Paartii Badhaadhinaa' => 'Paartii Badhaadhinaa',
            'Paartii Haaromsaa' => 'Paartii Haaromsaa',
            'Tumsa Tokkummaa Itoophiyaatiif' => 'Tumsa Tokkummaa Itoophiyaatiif',
            'Paartii Bilisummaa fi Walqixxummaa' => 'Paartii Bilisummaa fi Walqixxummaa',
            'Paartii Dhaloota Haaraa' => 'Paartii Dhaloota Haaraa',
            'Izeemaa' => 'Izeemaa',
            'Adda Bilisummaa Oromoo (ABO)' => 'Adda Bilisummaa Oromoo (ABO)',
            'Other' => 'Other (Kan Biroo)'
        );
    }

    public function saveRegistration($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function updateRegistration($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows() > 0;
    }

    public function deleteRegistration($id, $deletedBy) {
        $this->db->where('id', $id);
        $this->db->update($this->table, array(
            'status' => 0,
            'updated_by' => $deletedBy,
            'updated_at' => date('Y-m-d H:i:s')
        ));
        return $this->db->affected_rows() > 0;
    }

    public function getById($id) {
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        return $this->db->get($this->table)->row();
    }

    public function getByRegion($naannoofil, $startDate, $endDate) {
        $this->db->where('naannoofil_id', $naannoofil);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);
        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function hasRegionRegistrationOnDate($naannoofil, $date) {
        $this->db->where('naannoofil_id', $naannoofil);
        $this->db->where('report_date', $date);
        $this->db->where('status', 1);
        return $this->db->count_all_results($this->table) > 0;
    }

    public function getDashboardSummary($naannoofil, $month) {
        $summary = new stdClass();

        // Monthly report count (how many submissions this month)
        $this->db->where('naannoofil_id', $naannoofil);
        $this->db->like('report_date', $month, 'after');
        $this->db->where('status', 1);
        $summary->total_reports = $this->db->count_all_results($this->table);

        // Region cumulative totals (all-time for this naannoo filannoo)
        $this->db->select('SUM(male_electors) as male_total, SUM(female_electors) as female_total, SUM(total_electors) as grand_total');
        $this->db->where('naannoofil_id', $naannoofil);
        $this->db->where('status', 1);
        $totals = $this->db->get($this->table)->row();

        $summary->male_total = (int)($totals->male_total ?: 0);
        $summary->female_total = (int)($totals->female_total ?: 0);
        $summary->grand_total = (int)($totals->grand_total ?: 0);

        // Latest security status for this region
        $summary->latest_security_status = $this->getLatestSecurityStatus($naannoofil);

        return $summary;
    }

    public function getLatestSecurityStatus($naannoofil) {
        $this->db->select('security_status');
        $this->db->where('naannoofil_id', $naannoofil);
        $this->db->where('status', 1);
        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        $latest = $this->db->get($this->table, 1)->row();

        return $latest ? $latest->security_status : 'unknown';
    }

    public function getRecentByRegion($naannoofil, $limit = 10) {
        $this->db->where('naannoofil_id', $naannoofil);
        $this->db->where('status', 1);
        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result();
    }

    public function getAdminList($startDate, $endDate, $region = 'all', $security = 'all') {
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->where('status', 1);

        if ($region !== 'all') {
            $this->db->where('naannoofil_id', $region);
        }
        if ($security !== 'all') {
            $this->db->where('security_status', $security);
        }

        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function getAllRegions() {
        $this->db->select('DISTINCT naannoofil_id');
        $this->db->from($this->table);
        $this->db->where('status', 1);
        $this->db->order_by('naannoofil_id', 'ASC');
        return $this->db->get()->result();
    }
}
?>
