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
        // Check if user is logged in
        if($this->session->userdata('username')) {
            
            // Clear flashdata
            $this->session->set_flashdata('success', null);
            $this->session->set_flashdata('error', null);
            
            // Get user information from session
            $userId = $this->session->userdata('id');
            if(!$userId) {
                $userId = $this->session->userdata('userId');
            }
            
            $userName = $this->session->userdata('full_name');
            if(!$userName) {
                $userName = $this->session->userdata('name');
            }
            
            // Get naannoofil from session
            $votingRegionCode = $this->session->userdata('naannoofil');
            
            // If voting region not found in session, show error and redirect
            if(!$votingRegionCode) {
                $this->session->set_flashdata('error', 'Ati naannoo filannoo hin qabdu! Maalawiitti naannoo filannoo qindeessi.');
                redirect('dashboard');
            }
            
            // Get today's date
            $today = date('Y-m-d');
            $currentTime = date('H:i:s');
            
            // Determine session (morning or afternoon)
            $currentHour = date('H');
            $reportSession = ($currentHour < 12) ? 'morning' : 'afternoon';
            
            // Get next serial number
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
            
            // Load layout with view
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
        // Check if it's POST request
        if(!$this->input->post()) {
            redirect('VoterTurnout/register');
        }
        
        // Get user ID from the submitted form data
        $userId = $this->input->post('reporter_id');
        $votingRegionCode = $this->input->post('naannoofil_id');
        $reporterName = $this->input->post('reporter_name');
        
        // Validate required fields
        $this->form_validation->set_rules('status_level', 'Haala Naannoo', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Haala naannoo filachuu qaba!');
            redirect('VoterTurnout/register');
        }
        
        // Check if we have all the necessary data
        if(!$votingRegionCode) {
            $this->session->set_flashdata('error', 'Odeeffannoo naannoo filannoo hin argamne!');
            redirect('VoterTurnout/register');
        }
        
        // Get form data
        $reportDate = $this->input->post('report_date');
        $reportSession = $this->input->post('report_session');
        $reportTime = $this->input->post('report_time');
        $serialNumber = $this->input->post('serial_number');
        $statusLevel = $this->input->post('status_level');
        $statusReason = $this->input->post('status_reason');
        $remarks = $this->input->post('remarks');
        
        // Get male and female voters
        $maleVoters = (int)($this->input->post('male_voters') ?: 0);
        $femaleVoters = (int)($this->input->post('female_voters') ?: 0);
        $totalVoters = $maleVoters + $femaleVoters;
        
        // Prepare data array
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
        
        // Save to database
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
            
            // Get filter parameters
            $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
            $endDate = $this->input->get('end_date') ?: date('Y-m-d');
            $statusLevel = $this->input->get('status_level') ?: 'all';
            
            // Get reports for this specific region
            $reports = $this->VoterTurnout_model->getReportsWithLocation($votingRegionCode, $startDate, $endDate, $statusLevel);
            $summary = $this->VoterTurnout_model->getRegionSummary($votingRegionCode, $startDate, $endDate);
            
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
            
            // Get report
            $report = $this->VoterTurnout_model->getReportById($id);
            
            // Check if report exists
            if(!$report) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VoterTurnout/listReports');
            }
            
            // For non-admin, check if report belongs to their region
            if($role != 1 && $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasa kana ilaaluu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            // Check if within 1 hour for editing
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
            
            // Get report
            $report = $this->VoterTurnout_model->getReportById($id);
            
            // Check if report exists
            if(!$report) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VoterTurnout/listReports');
            }
            
            // For non-admin, check if report belongs to their region
            if($role != 1 && $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasa kana fooyyessuu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            // Check if within 1 hour for editing
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
            
            // Get report
            $report = $this->VoterTurnout_model->getReportById($id);
            
            // Check if report exists
            if(!$report) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VoterTurnout/listReports');
            }
            
            // For non-admin, check if report belongs to their region
            if($role != 1 && $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasa kana fooyyessuu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            // Check if within 1 hour for editing
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            
            if($timeDiff > 1) {
                $this->session->set_flashdata('error', 'Gabaasa kana wayiruu sa\'aatii 1 darbeera. Fooyyessuu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            // Get male and female voters
            $maleVoters = (int)($this->input->post('male_voters') ?: 0);
            $femaleVoters = (int)($this->input->post('female_voters') ?: 0);
            $totalVoters = $maleVoters + $femaleVoters;
            
            // Prepare update data
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
            
            // Get report
            $report = $this->VoterTurnout_model->getReportById($id);
            
            if(!$report) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VoterTurnout/listReports');
            }
            
            // For non-admin, check if report belongs to their region
            if($role != 1 && $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasa kana haquu hin dandeessu!');
                redirect('VoterTurnout/listReports');
            }
            
            // Check if within 1 hour
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
     * Dashboard for voter turnout (Admin) - Complete admin dashboard
     */
    public function adminDashboard() {
        if($this->session->userdata('username')) {
            
            // Check if user is admin
            if($this->session->userdata('role') != 1) {
                $this->session->set_flashdata('error', 'Daashboordii kana ilaaluuf admin qofa!');
                redirect('dashboard');
            }
            
            $userName = $this->session->userdata('full_name');
            
            // Get filter parameters
            $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
            $endDate = $this->input->get('end_date') ?: date('Y-m-d');
            $statusLevel = $this->input->get('status_level') ?: 'all';
            $selectedRegion = $this->input->get('region') ?: 'all';
            
            // Get dashboard statistics
            $stats = $this->VoterTurnout_model->getDashboardStats($startDate, $endDate);
            
            // Get all regions with totals
            $regionReports = $this->VoterTurnout_model->getAllRegionsWithTotals($startDate, $endDate, $statusLevel);
            
            // Get all reports for the table
            $reports = $this->VoterTurnout_model->getAllReports($startDate, $endDate, $statusLevel, $selectedRegion);
            
            // Get status breakdown by region
            $statusByRegion = $this->VoterTurnout_model->getStatusByRegion($startDate, $endDate);
            
            // Get list of all regions for filter
            $allRegions = $this->VoterTurnout_model->getAllRegions();
            
            $data = array(
                'pageTitle' => 'Daashboordii Baayyina Filattoota - Admin',
                'name' => $userName,
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'stats' => $stats,
                'region_reports' => $regionReports,
                'reports' => $reports,
                'status_by_region' => $statusByRegion,
                'all_regions' => $allRegions,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'selected_status' => $statusLevel,
                'selected_region' => $selectedRegion,
                'activeMenu' => 'voterTurnoutAdminDashboard'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('voter_turnout/voter_turnout_admin_dashboard', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('Structure/login');
        }
    }
    
    /**
     * Admin List Reports - All regions (Complete list for admin)
     */
    public function adminListReports() {
        if($this->session->userdata('username')) {
            
            // Check if user is admin
            if($this->session->userdata('role') != 1) {
                $this->session->set_flashdata('error', 'Gabaasa kana ilaaluuf admin qofa!');
                redirect('dashboard');
            }
            
            $userName = $this->session->userdata('full_name');
            
            // Get filter parameters
            $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
            $endDate = $this->input->get('end_date') ?: date('Y-m-d');
            $statusLevel = $this->input->get('status_level') ?: 'all';
            $selectedRegion = $this->input->get('region') ?: 'all';
            
            // Get all reports with filters
            $reports = $this->VoterTurnout_model->getAllReports($startDate, $endDate, $statusLevel, $selectedRegion);
            
            // Get summary statistics
            $stats = $this->VoterTurnout_model->getDashboardStats($startDate, $endDate);
            
            // Get all regions for filter dropdown
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

     public function dashboard() {
        if($this->session->userdata('username')) {
            
            $userName = $this->session->userdata('full_name');
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            $votingRegionName = $votingRegionCode;
            
            $currentMonth = date('Y-m');
            
            // Get summary statistics
            $summary = $this->ElectionReport_model->VoterTurnout_model($votingRegionCode, $currentMonth);
            
                        
            $data = array(
                'pageTitle' => 'Daashboordii Filannoo Paartii',
                'name' => $userName,
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'voting_region_code' => $votingRegionCode,
                'voting_region_name' => $votingRegionName,
                'summary' => $summary,
                'party_breakdown' => $partyBreakdown,
                'week_labels' => json_encode($weekData['labels']),
                'week_data' => json_encode($weekData['data']),
                'activeMenu' => 'electionDashboard'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('voter_turnout/nfdashboard', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('Structure/login');
        }
    }
}
?>