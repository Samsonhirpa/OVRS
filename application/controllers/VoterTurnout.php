<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VoterTurnout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load necessary libraries and models
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        
        $this->load->model('VoterTurnout_model');
    }
    
    /**
     * Get role text in Afaan Oromo
     */
    private function getRoleText($role) {
        switch($role) {
            case 1:
                return 'Admin';
            case 2:
                return 'PBO';
            case 3:
                return 'Naannoo Filannoo';
            default:
                return 'Fayyadamaa';
        }
    }
    
    /**
     * Display the registration form
     */
    public function register() {
        if($this->session->userdata('username')) {
            
            $this->session->set_flashdata('success', null);
            $this->session->set_flashdata('error', null);
            
            $userId = $this->session->userdata('id');
            if(!$userId) {
                $userId = $this->session->userdata('userId');
            }
            
            $userName = $this->session->userdata('full_name');
            if(!$userName) {
                $userName = $this->session->userdata('name');
            }
            
            $votingRegionCode = $this->session->userdata('naannoofil');
            
            if(!$votingRegionCode) {
                $this->session->set_flashdata('error', 'Ati naannoo filannoo hin qabdu! Maalawiitti naannoo filannoo qindeessi.');
                redirect('dashboard');
            }
            
            $today = date('Y-m-d');
            $currentTime = date('H:i:s');
            $currentHour = date('H');
            $reportSession = ($currentHour < 12) ? 'morning' : 'afternoon';
            $serialNumber = $this->VoterTurnout_model->getNextSerialNumber($votingRegionCode, $today);
            
            $data = array(
                'pageTitle' => 'Galmee Baayyina Filattoota',
                'naannoofil' => $votingRegionCode,
                'voting_region_name' => $votingRegionCode,
                'reporter_id' => $userId,
                'reporter_name' => $userName,
                'today' => $today,
                'current_time' => $currentTime,
                'report_session' => $reportSession,
                'serial_number' => $serialNumber,
                'name' => $userName,
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'activeMenu' => 'voterTurnoutRegister'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('voter_turnout/voter_turnout_register', $data);
            $this->load->view('layout/footer');
            
        } else {
            redirect('Structure/login');
        }
    }
    
    /**
     * Save the voter turnout report
     */
    public function save() {
        if(!$this->input->post()) {
            redirect('VoterTurnout/register');
        }
        
        $userId = $this->input->post('reporter_id');
        $votingRegionCode = $this->input->post('naannoofil_id');
        $reporterName = $this->input->post('reporter_name');
        
        $this->form_validation->set_rules('status_level', 'Haala Naannoo', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Haala naannoo filachuu qaba!');
            redirect('VoterTurnout/register');
        }
        
        if(!$votingRegionCode) {
            $this->session->set_flashdata('error', 'Odeeffannoo naannoo filannoo hin argamne!');
            redirect('VoterTurnout/register');
        }
        
        $reportDate = $this->input->post('report_date');
        $reportSession = $this->input->post('report_session');
        $reportTime = $this->input->post('report_time');
        $serialNumber = $this->input->post('serial_number');
        $statusLevel = $this->input->post('status_level');
        $statusReason = $this->input->post('status_reason');
        $remarks = $this->input->post('remarks');
        
        $maleVoters = (int)($this->input->post('male_voters') ?: 0);
        $femaleVoters = (int)($this->input->post('female_voters') ?: 0);
        $totalVoters = $maleVoters + $femaleVoters;
        
        $data = array(
            'naannoofil_id' => $votingRegionCode,
            'report_date' => $reportDate,
            'report_session' => $reportSession,
            'report_time' => $reportTime,
            'serial_number' => $serialNumber,
            'reporter_id' => $userId,
            'reporter_name' => $reporterName ?: 'Unknown',
            'male_voters' => $maleVoters,
            'female_voters' => $femaleVoters,
            'total_voters' => $totalVoters,
            'status_level' => $statusLevel,
            'status_reason' => $statusReason,
            'remarks' => $remarks,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $userId,
            'status' => 1
        );
        
        $result = $this->VoterTurnout_model->saveReport($data);
        
        if($result) {
            $this->session->set_flashdata('success', 'Gabaasni baayyina filattoota milkaa\'inaan galmaa\'eera!');
        } else {
            $this->session->set_flashdata('error', 'Gabaasni galmaa\'uu hin dande\'ye. Yeroo biroo yaali!');
        }
        
        redirect('VoterTurnout/listReports');
    }
    
    /**
     * List all voter turnout reports (for Naannoo Filannoo user)
     */
    public function listReports() {
        if($this->session->userdata('username')) {
            
            $userName = $this->session->userdata('full_name');
            $role = $this->session->userdata('role');
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            $votingRegionName = $votingRegionCode;
            
            $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
            $endDate = $this->input->get('end_date') ?: date('Y-m-d');
            $statusLevel = $this->input->get('status_level') ?: 'all';
            
            $reports = $this->VoterTurnout_model->getRegionReports($votingRegionCode, $startDate, $endDate, $statusLevel);
            $summary = $this->VoterTurnout_model->getRegionTotalSummary($votingRegionCode, $startDate, $endDate);
            
            $data = array(
                'pageTitle' => 'Gabaasawwan Baayyina Filattoota',
                'name' => $userName,
                'role' => $role,
                'role_text' => $this->getRoleText($role),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'voting_region_code' => $votingRegionCode,
                'voting_region_name' => $votingRegionName,
                'reports' => $reports,
                'summary' => $summary,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'selected_status' => $statusLevel,
                'activeMenu' => 'voterTurnoutReports'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('voter_turnout/voter_turnout_list', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('Structure/login');
        }
    }
    
    /**
     * View single report
     */
    public function viewReport($id) {
        if($this->session->userdata('username')) {
            
            $role = $this->session->userdata('role');
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            $report = $this->VoterTurnout_model->getReportById($id);
            
            if(!$report) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VoterTurnout/listReports');
            }
            
            if($role != 1 && $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasa kana ilaaluu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            $report->can_edit = ($timeDiff <= 1);
            
            $data = array(
                'pageTitle' => 'Gabaasa Baayyina Filattoota Ilaalchuu',
                'name' => $this->session->userdata('full_name'),
                'role' => $role,
                'role_text' => $this->getRoleText($role),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'report' => $report,
                'voting_region_name' => $report->naannoofil_id,
                'activeMenu' => 'voterTurnoutReports'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('voter_turnout/voter_turnout_view', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('Structure/login');
        }
    }
    
    /**
     * Edit report
     */
    public function editReport($id) {
        if($this->session->userdata('username')) {
            
            $userId = $this->session->userdata('id');
            $role = $this->session->userdata('role');
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            $report = $this->VoterTurnout_model->getReportById($id);
            
            if(!$report) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VoterTurnout/listReports');
            }
            
            if($role != 1 && $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasa kana fooyyessuu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            
            if($timeDiff > 1) {
                $this->session->set_flashdata('error', 'Gabaasa kana wayiruu sa\'aatii 1 darbeera. Fooyyessuu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            $data = array(
                'pageTitle' => 'Gabaasa Fooyyessuu - Baayyina Filattoota',
                'name' => $this->session->userdata('full_name'),
                'role' => $role,
                'role_text' => $this->getRoleText($role),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'report' => $report,
                'voting_region_name' => $report->naannoofil_id,
                'activeMenu' => 'voterTurnoutReports'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('voter_turnout/voter_turnout_edit', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('Structure/login');
        }
    }
    
    /**
     * Update report
     */
    public function updateReport($id) {
        if($this->session->userdata('username')) {
            
            $userId = $this->session->userdata('id');
            $role = $this->session->userdata('role');
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            $report = $this->VoterTurnout_model->getReportById($id);
            
            if(!$report) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VoterTurnout/listReports');
            }
            
            if($role != 1 && $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasa kana fooyyessuu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            
            if($timeDiff > 1) {
                $this->session->set_flashdata('error', 'Gabaasa kana wayiruu sa\'aatii 1 darbeera. Fooyyessuu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            $maleVoters = (int)($this->input->post('male_voters') ?: 0);
            $femaleVoters = (int)($this->input->post('female_voters') ?: 0);
            $totalVoters = $maleVoters + $femaleVoters;
            
            $updateData = array(
                'male_voters' => $maleVoters,
                'female_voters' => $femaleVoters,
                'total_voters' => $totalVoters,
                'status_level' => $this->input->post('status_level'),
                'status_reason' => $this->input->post('status_reason'),
                'remarks' => $this->input->post('remarks'),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $userId
            );
            
            $result = $this->VoterTurnout_model->updateReport($id, $updateData);
            
            if($result) {
                $this->session->set_flashdata('success', 'Gabaasni milkaa\'inaan fooyya\'eera!');
            } else {
                $this->session->set_flashdata('error', 'Gabaasni fooyyessuu hin dande\'amne!');
            }
            
            redirect('VoterTurnout/listReports');
        } else {
            redirect('Structure/login');
        }
    }
    
    /**
     * Delete report
     */
    public function deleteReport($id) {
        if($this->session->userdata('username')) {
            
            $role = $this->session->userdata('role');
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            $report = $this->VoterTurnout_model->getReportById($id);
            
            if(!$report) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VoterTurnout/listReports');
            }
            
            if($role != 1 && $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasa kana haquu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            
            if($timeDiff > 1) {
                $this->session->set_flashdata('error', 'Gabaasa kana wayiruu sa\'aatii 1 darbeera. Haquu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            $result = $this->VoterTurnout_model->deleteReport($id);
            
            if($result) {
                $this->session->set_flashdata('success', 'Gabaasni milkaa\'inaan haqameera!');
            } else {
                $this->session->set_flashdata('error', 'Gabaasni haquu hin dande\'amne!');
            }
            
            redirect('VoterTurnout/listReports');
        } else {
            redirect('Structure/login');
        }
    }
    
    /**
     * Dashboard for Naannoo Filannoo user
     */
    public function dashboard() {
        if($this->session->userdata('username')) {
            
            $userName = $this->session->userdata('full_name');
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            $votingRegionName = $votingRegionCode;
            
            if(!$votingRegionCode) {
                $this->session->set_flashdata('error', 'Ati naannoo filannoo hin qabdu!');
                redirect('dashboard');
            }
            
            $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
            $endDate = $this->input->get('end_date') ?: date('Y-m-d');
            
            // Get dashboard summary with LAST security status
            $summary = $this->VoterTurnout_model->getRegionDashboardSummary($votingRegionCode, $startDate, $endDate);
            
            // Get weekly data for chart
            $weekData = $this->VoterTurnout_model->getWeeklyData($votingRegionCode);
            
            // Get recent reports (last 5)
            $this->db->select('*');
            $this->db->from('voter_turnout');
            $this->db->where('naannoofil_id', $votingRegionCode);
            $this->db->where('status', 1);
            $this->db->order_by('created_at', 'DESC');
            $this->db->limit(5);
            $recentReports = $this->db->get()->result();
            
            $data = array(
                'pageTitle' => 'Daashboordii Baayyina Filattoota',
                'name' => $userName,
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'voting_region_code' => $votingRegionCode,
                'voting_region_name' => $votingRegionName,
                'summary' => $summary,
                'recent_reports' => $recentReports,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'week_labels' => json_encode($weekData['labels']),
                'week_data' => json_encode($weekData['data']),
                'activeMenu' => 'voterTurnoutDashboard'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('voter_turnout/voter_turnout_dashboard', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('Structure/login');
        }
    }
    
public function adminDashboard() {
    if(!$this->session->userdata('username')) redirect('Structure/login');
    if($this->session->userdata('role') != 1) {
        $this->session->set_flashdata('error', 'Daashboordii kana ilaaluuf admin qofa!');
        redirect('dashboard');
    }
    
    $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
    $endDate   = $this->input->get('end_date') ?: date('Y-m-d');
    $zone      = $this->input->get('zone') ?: 'all';
    $status    = $this->input->get('status') ?: 'all';
    $constName = $this->input->get('constituency') ?: 'all';
    
    // Get all constituencies with aggregated data (including zero)
    $allData = $this->VoterTurnout_model->getAllConstituenciesWithVoterData($startDate, $endDate, $status, $zone);
    
    // Filter by specific constituency if selected
    if($constName != 'all') {
        $allData = array_filter($allData, fn($item) => $item->naannoofil_id == $constName);
        $allData = array_values($allData);
    }
    
    // Show only constituencies that have at least one report (total_voters > 0)
    $constituencyData = array_filter($allData, fn($item) => $item->total_voters > 0);
    $constituencyData = array_values($constituencyData);
    
    // Overall stats from voter_turnout table
    $stats = $this->VoterTurnout_model->getDashboardStats($startDate, $endDate);
    
    // All zones for filter
    $allZones = $this->VoterTurnout_model->getAllZones();
    
    // Distinct naannoofil_id from voter_turnout table (for dropdown)
    $constituencyOptions = $this->db->distinct()->select('naannoofil_id')
        ->where('naannoofil_id IS NOT NULL')->where('naannoofil_id !=', '')
        ->order_by('naannoofil_id')->get('voter_turnout')->result();
    
    // Status counts for displayed data
    $greenCount = count(array_filter($constituencyData, fn($c) => $c->current_status == 'green'));
    $yellowCount = count(array_filter($constituencyData, fn($c) => $c->current_status == 'yellow'));
    $redCount = count(array_filter($constituencyData, fn($c) => $c->current_status == 'red'));
    
    $data = [
        'pageTitle' => 'Daashboordii Baayyina Filattoota - Admin',
        'name' => $this->session->userdata('full_name'),
        'role' => $this->session->userdata('role'),
        'role_text' => $this->getRoleText($this->session->userdata('role')),
        'profile_image' => $this->session->userdata('profile_image'),
        'last_login' => $this->session->userdata('last_login'),
        'constituency_data' => $constituencyData,
        'stats' => $stats,
        'all_zones' => $allZones,
        'constituency_options' => $constituencyOptions,
        'green_count' => $greenCount,
        'yellow_count' => $yellowCount,
        'red_count' => $redCount,
        'total_constituencies_with_data' => count($constituencyData),
        'start_date' => $startDate,
        'end_date' => $endDate,
        'selected_zone' => $zone,
        'selected_status' => $status,
        'selected_constituency' => $constName,
        'activeMenu' => 'voterTurnoutAdminDashboard'
    ];
    
    $this->load->view('layout/header');
    $this->load->view('layout/topmenu');
    $this->load->view('layout/sidemenu', $data);
    $this->load->view('voter_turnout/voter_turnout_admin_dashboard', $data);
    $this->load->view('layout/footer');
}
    
    /**
     * Admin List Reports - All regions
     */
    public function adminListReports() {
        if($this->session->userdata('username')) {
            
            if($this->session->userdata('role') != 1) {
                $this->session->set_flashdata('error', 'Gabaasa kana ilaaluuf admin qofa!');
                redirect('dashboard');
            }
            
            $userName = $this->session->userdata('full_name');
            
            $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
            $endDate = $this->input->get('end_date') ?: date('Y-m-d');
            $statusLevel = $this->input->get('status_level') ?: 'all';
            $selectedRegion = $this->input->get('region') ?: 'all';
            
            $reports = $this->VoterTurnout_model->getAllReports($startDate, $endDate, $statusLevel, $selectedRegion);
            $stats = $this->VoterTurnout_model->getDashboardStats($startDate, $endDate);
            $allRegions = $this->VoterTurnout_model->getAllRegions();
            
            $data = array(
                'pageTitle' => 'Gabaasawwan Baayyina Filattoota - Admin',
                'name' => $userName,
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'reports' => $reports,
                'stats' => $stats,
                'all_regions' => $allRegions,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'selected_status' => $statusLevel,
                'selected_region' => $selectedRegion,
                'activeMenu' => 'voterTurnoutAdminList'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('voter_turnout/voter_turnout_admin_list', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('Structure/login');
        }
    }

/**
 * Admin view for single constituency details with all reports
 */
public function adminConstituencyDetail($constituency_name) {
    if($this->session->userdata('username') && $this->session->userdata('role') == 1) {
        
        $constituency_name = urldecode($constituency_name);
        
        // Get date filters from URL
        $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
        $endDate = $this->input->get('end_date') ?: date('Y-m-d');
        
        // Get ALL reports for this constituency
        $this->db->select('*');
        $this->db->from('voter_turnout');
        $this->db->where('naannoofil_id', $constituency_name);
        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        $allReports = $this->db->get()->result();
        
        // Get filtered reports by date
        $this->db->select('*');
        $this->db->from('voter_turnout');
        $this->db->where('naannoofil_id', $constituency_name);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        $filteredReports = $this->db->get()->result();
        
        // Get summary stats for filtered period
        $this->db->select_sum('male_voters');
        $this->db->select_sum('female_voters');
        $this->db->select_sum('total_voters');
        $this->db->select('COUNT(*) as total_reports');
        $this->db->where('naannoofil_id', $constituency_name);
        $this->db->where('report_date >=', $startDate);
        $this->db->where('report_date <=', $endDate);
        $summary = $this->db->get('voter_turnout')->row();
        
        // Get complete summary (all time)
        $this->db->select_sum('male_voters');
        $this->db->select_sum('female_voters');
        $this->db->select_sum('total_voters');
        $this->db->select('COUNT(*) as total_reports');
        $this->db->where('naannoofil_id', $constituency_name);
        $allTimeSummary = $this->db->get('voter_turnout')->row();
        
        // Get latest status (most recent report) - SAFE with null check
        $this->db->select('status_level, status_reason, report_date, created_at');
        $this->db->where('naannoofil_id', $constituency_name);
        $this->db->order_by('report_date', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        $latestResult = $this->db->get('voter_turnout')->row();
        
        // Create safe latest object with defaults
        $latest = new stdClass();
        $latest->status_level = $latestResult->status_level ?? 'green';
        $latest->status_reason = $latestResult->status_reason ?? '';
        $latest->report_date = $latestResult->report_date ?? null;
        $latest->created_at = $latestResult->created_at ?? null;
        
        // Get gender breakdown
        $this->db->select_sum('male_voters');
        $this->db->select_sum('female_voters');
        $this->db->where('naannoofil_id', $constituency_name);
        $genderStats = $this->db->get('voter_turnout')->row();
        
        $data = array(
            'pageTitle' => 'Naannoo Filannoo Detail - ' . $constituency_name,
            'name' => $this->session->userdata('full_name'),
            'role' => $this->session->userdata('role'),
            'role_text' => $this->getRoleText($this->session->userdata('role')),
            'profile_image' => $this->session->userdata('profile_image'),
            'last_login' => $this->session->userdata('last_login'),
            'constituency_name' => $constituency_name,
            'reports' => $filteredReports,
            'all_reports' => $allReports,
            'summary' => $summary,
            'all_time_summary' => $allTimeSummary,
            'latest_status' => $latest,
            'gender_stats' => $genderStats,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'activeMenu' => 'voterTurnoutAdminList'
        );
        
        $this->load->view('layout/header');
        $this->load->view('layout/topmenu');
        $this->load->view('layout/sidemenu', $data);
        $this->load->view('voter_turnout/voter_turnout_admin_constituency_detail', $data);
        $this->load->view('layout/footer');
    } else {
        redirect('Structure/login');
    }
}
}
?>