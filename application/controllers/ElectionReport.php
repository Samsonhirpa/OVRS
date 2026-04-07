<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ElectionReport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load necessary libraries and models
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        
        $this->load->model('ElectionReport_model');
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
            
            // Get next serial number
            $serialNumber = $this->ElectionReport_model->getNextSerialNumber($votingRegionCode, $today);
            
            // Get list of parties for dropdown
            $parties = $this->getPartyList();
            
            $data = array(
                'pageTitle' => 'Galmee Filannoo - Filannoo Paartii',
                'naannoofil' => $votingRegionCode,
                'voting_region_name' => $votingRegionCode,
                'reporter_id' => $userId,
                'reporter_name' => $userName,
                'today' => $today,
                'serial_number' => $serialNumber,
                'current_time' => date('H:i:s'),
                'parties' => $parties,
                'name' => $userName,
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'activeMenu' => 'electionRegister'
            );
            
            // Load layout with view
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('election/election_register', $data);
            $this->load->view('layout/footer');
            
        } else {
            redirect('Structure/login');
        }
    }
    
    /**
     * Get list of political parties
     */
    private function getPartyList() {
        return array(
            'Paartii Badhaadhinaa' => 'Paartii Badhaadhinaa',
            'Paartii Haaromsaa' => 'Paartii Haaromsaa',
            'Tumsa Tokkummaa Itoophiyaatiif' => 'Tumsa Tokkummaa Itoophiyaatiif',
            'Paartii Bilisummaa fi Walqixxummaa' => 'Paartii Bilisummaa fi Walqixxummaa',
            'Paartii Dimokraatawaa Itoophiyaa Tokkoo' => 'Paartii Dimokraatawaa Itoophiyaa Tokkoo',
            'Paartii Dhaloota Haaraa' => 'Paartii Dhaloota Haaraa',
            'Izeemaa' => 'Izeemaa',
            'Adda Bilisummaa Oromoo (ABO)' => 'Adda Bilisummaa Oromoo (ABO)',
            'Paartii Dimokraatawaa Ummata Walloo' => 'Paartii Dimokraatawaa Ummata Walloo',
            'Other' => 'Other (Kan Biroo)'
        );
    }
    
    /**
     * Save the election report
     */
    public function save() {
        // Check if it's POST request
        if(!$this->input->post()) {
            redirect('ElectionReport/register');
        }
        
        // Get user ID from the submitted form data
        $userId = $this->input->post('reporter_id');
        $votingRegionCode = $this->input->post('naannoofil_id');
        $reporterName = $this->input->post('reporter_name');
        
        // Validate required fields
        $this->form_validation->set_rules('party_name', 'Maqaa Paartii', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Maqaa paartii guutuu qaba!');
            redirect('ElectionReport/register');
        }
        
        // Check if we have all the necessary data
        if(!$votingRegionCode) {
            $this->session->set_flashdata('error', 'Odeeffannoo naannoo filannoo hin argamne!');
            redirect('ElectionReport/register');
        }
        
        // Get form data
        $reportDate = $this->input->post('report_date');
        $reportSession = $this->input->post('report_session');
        $reportTime = $this->input->post('report_time');
        $serialNumber = $this->input->post('serial_number');
        $partyName = $this->input->post('party_name');
        $remarks = $this->input->post('remarks');
        
        // Get male and female voters (simplified - no member/non-member)
        $maleVoters = (int)($this->input->post('male_voters') ?: 0);
        $femaleVoters = (int)($this->input->post('female_voters') ?: 0);
        $grandTotal = $maleVoters + $femaleVoters;
        
        // Prepare data array for new table structure
        $data = array(
            'naannoofil_id' => $votingRegionCode,
            'report_date' => $reportDate,
            'report_session' => $reportSession ?: 'afternoon',
            'report_time' => $reportTime,
            'serial_number' => $serialNumber,
            'reporter_id' => $userId,
            'reporter_name' => $reporterName ?: 'Unknown',
            'party_name' => $partyName,
            'male_voters' => $maleVoters,
            'female_voters' => $femaleVoters,
            'grand_total' => $grandTotal,
            'remarks' => $remarks,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $userId,
            'status' => 1
        );
        
        // Save to database
        $result = $this->ElectionReport_model->saveReport($data);
        
        if($result) {
            $this->session->set_flashdata('success', 'Gabaasni filannoo paartii milkaa\'inaan galmaa\'eera!');
        } else {
            $this->session->set_flashdata('error', 'Gabaasni galmaa\'uu hin dande\'ye. Yeroo biroo yaali!');
        }
        
        redirect('ElectionReport/listReports');
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
     * List all election reports
     */
    public function listReports() {
        if($this->session->userdata('username')) {
            
            $userName = $this->session->userdata('full_name');
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            $votingRegionName = $votingRegionCode;
            
            // Get filter parameters
            $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
            $endDate = $this->input->get('end_date') ?: date('Y-m-d');
            $party = $this->input->get('party') ?: 'all';
            
            // Get reports
            $reports = $this->ElectionReport_model->getReportsByDateRange($votingRegionCode, $startDate, $endDate, $party);
            
            // Get summary statistics
            $summary = $this->ElectionReport_model->getReportsSummary($votingRegionCode, $startDate, $endDate);
            
            // Get party list for filter
            $parties = $this->getPartyList();
            
            $data = array(
                'pageTitle' => 'Gabaasawwan Filannoo Paartii',
                'name' => $userName,
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'voting_region_code' => $votingRegionCode,
                'voting_region_name' => $votingRegionName,
                'reports' => $reports,
                'summary' => $summary,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'selected_party' => $party,
                'parties' => $parties,
                'activeMenu' => 'electionReports'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('election/election_list', $data);
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
            
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            // Get report
            $report = $this->ElectionReport_model->getReportById($id);
            
            // Check if report exists and belongs to this region
            if(!$report || $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('ElectionReport/listReports');
            }
            
            // Check if within 1 hour for editing
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            $report->can_edit = ($timeDiff <= 1);
            
            $data = array(
                'pageTitle' => 'Gabaasa Filannoo Paartii Ilaalchuu',
                'name' => $this->session->userdata('full_name'),
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'report' => $report,
                'voting_region_name' => $report->naannoofil_id,
                'activeMenu' => 'electionReports'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('election/election_view', $data);
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
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            // Get report
            $report = $this->ElectionReport_model->getReportById($id);
            
            // Check if report exists and belongs to this region
            if(!$report || $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('ElectionReport/listReports');
            }
            
            // Check if within 1 hour for editing
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            
            if($timeDiff > 1) {
                $this->session->set_flashdata('error', 'Gabaasa kana wayiruu sa\'aatii 1 darbeera. Fooyyessuu hin dandeessu!');
                redirect('ElectionReport/listReports');
            }
            
            // Get parties list
            $parties = $this->getPartyList();
            
            $data = array(
                'pageTitle' => 'Gabaasa Fooyyessuu - Filannoo Paartii',
                'name' => $this->session->userdata('full_name'),
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'report' => $report,
                'parties' => $parties,
                'voting_region_name' => $report->naannoofil_id,
                'activeMenu' => 'electionReports'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('election/election_edit', $data);
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
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            // Get report
            $report = $this->ElectionReport_model->getReportById($id);
            
            // Check if report exists and belongs to this region
            if(!$report || $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('ElectionReport/listReports');
            }
            
            // Check if within 1 hour for editing
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            
            if($timeDiff > 1) {
                $this->session->set_flashdata('error', 'Gabaasa kana wayiruu sa\'aatii 1 darbeera. Fooyyessuu hin dandeessu!');
                redirect('ElectionReport/listReports');
            }
            
            // Get male and female voters
            $maleVoters = (int)($this->input->post('male_voters') ?: 0);
            $femaleVoters = (int)($this->input->post('female_voters') ?: 0);
            $grandTotal = $maleVoters + $femaleVoters;
            
            // Prepare update data
            $updateData = array(
                'party_name' => $this->input->post('party_name'),
                'male_voters' => $maleVoters,
                'female_voters' => $femaleVoters,
                'grand_total' => $grandTotal,
                'remarks' => $this->input->post('remarks'),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $userId
            );
            
            $result = $this->ElectionReport_model->updateReport($id, $updateData);
            
            if($result) {
                $this->session->set_flashdata('success', 'Gabaasni milkaa\'inaan fooyya\'eera!');
            } else {
                $this->session->set_flashdata('error', 'Gabaasni fooyyessuu hin dande\'amne!');
            }
            
            redirect('ElectionReport/listReports');
        } else {
            redirect('Structure/login');
        }
    }
    
    /**
     * Delete report
     */
    public function deleteReport($id) {
        if($this->session->userdata('username')) {
            
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            // Get report
            $report = $this->ElectionReport_model->getReportById($id);
            
            if(!$report || $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('ElectionReport/listReports');
            }
            
            // Check if within 1 hour
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            
            if($timeDiff > 1) {
                $this->session->set_flashdata('error', 'Gabaasa kana wayiruu sa\'aatii 1 darbeera. Haquu hin dandeessu!');
                redirect('ElectionReport/listReports');
            }
            
            $result = $this->ElectionReport_model->deleteReport($id);
            
            if($result) {
                $this->session->set_flashdata('success', 'Gabaasni milkaa\'inaan haqameera!');
            } else {
                $this->session->set_flashdata('error', 'Gabaasni haquu hin dande\'amne!');
            }
            
            redirect('ElectionReport/listReports');
        } else {
            redirect('Structure/login');
        }
    }
    
    /**
     * Dashboard for election reports
     */
    public function dashboard() {
        if($this->session->userdata('username')) {
            
            $userName = $this->session->userdata('full_name');
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            $votingRegionName = $votingRegionCode;
            
            $currentMonth = date('Y-m');
            
            // Get summary statistics
            $summary = $this->ElectionReport_model->getDashboardSummary($votingRegionCode, $currentMonth);
            
            // Get party breakdown for current month
            $partyBreakdown = $this->ElectionReport_model->getPartyBreakdown($votingRegionCode, $currentMonth);
            
            // Get last 7 days data for chart
            $weekData = $this->ElectionReport_model->getLast7DaysData($votingRegionCode);
            
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
            $this->load->view('election/election_dashboard', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('Structure/login');
        }
    }
}
?>