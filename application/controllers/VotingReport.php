<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VotingReport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load necessary libraries and models
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        
        $this->load->model('VotingReport_model');
        $this->load->model('usermodel', 'm');
        $this->load->model('bddddomodel', 'b');
        $this->load->model('Structure_model', 'str');
        $this->load->model('Athlete_Model', 'athlete');
        $this->load->model('Sportmodel', 'k');
        
        // Load libraries
        $this->load->library('form_validation');
        $this->load->library('upload');
    }
    
    /**
     * Display the registration form
     */
    public function index() {
        $this->register();
    }
    
    public function clear_session() {
        $this->session->set_flashdata('success', null);
        $this->session->set_flashdata('error', null);
        $this->session->set_flashdata('debug', null);
        echo "Session cleared. <a href='".base_url('VotingReport/register')."'>Go back</a>";
    }

    /**
     * Display the registration form
     */
    public function register() {
        // Check if user is logged in
        if($this->session->userdata('username')) {
            
            // Clear ALL flashdata to remove any old messages
            $this->session->set_flashdata('success', null);
            $this->session->set_flashdata('error', null);
            $this->session->set_flashdata('debug', null);
            
            // Get user information from session - try different keys
            $userId = $this->session->userdata('id');
            if(!$userId) {
                $userId = $this->session->userdata('userId');
            }
            
            $userName = $this->session->userdata('full_name');
            if(!$userName) {
                $userName = $this->session->userdata('name');
            }
            
            // Get naannoofil (VARCHAR) from session
            $votingRegionCode = $this->session->userdata('naannoofil');
            
            // If voting region not found in session, show error and redirect
            if(!$votingRegionCode) {
                $this->session->set_flashdata('error', 'Ati naannoo filannoo hin qabdu! Maalawiitti naannoo filannoo qindeessi.');
                redirect('dashboard');
            }
            
            // If user ID not found in session, show error and redirect
            if(!$userId) {
                $this->session->set_flashdata('error', 'Odeeffannoo fayyadamaa hin argamne! Id galmeessi.');
                redirect('Structure/login');
            }
            
            // Get today's date
            $today = date('Y-m-d');
            
            // Check if morning report already submitted for THIS specific naannoofil
            $morningReport = $this->VotingReport_model->getSessionReport($votingRegionCode, $today, 'morning');
            
            // Check if afternoon report already submitted for THIS specific naannoofil
            $afternoonReport = $this->VotingReport_model->getSessionReport($votingRegionCode, $today, 'afternoon');
            
            // Get next serial number for THIS specific naannoofil
            $serialNumber = $this->VotingReport_model->getNextSerialNumber($votingRegionCode, $today);
            
            $data = array(
                'pageTitle' => 'Galmee Ragaa Filannoo - Naannoo Filannoo',
                'naannoofil' => $votingRegionCode,
                'voting_region_name' => $votingRegionCode,
                'reporter_id' => $userId,
                'reporter_name' => $userName,
                'today' => $today,
                'serial_number' => $serialNumber,
                'morning_report' => $morningReport,
                'afternoon_report' => $afternoonReport,
                'current_time' => date('H:i:s'),
                'current_session' => $this->getCurrentSession(),
                'name' => $userName,
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'activeMenu' => 'register'  // FIX: Added activeMenu variable
            );
            
            // Load layout with view
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('votingRegion/voting_register', $data);
            $this->load->view('layout/footer');
            
        } else {
            // User not logged in, redirect to login
            redirect('Structure/login');
        }
    }

    /**
     * Save the report
     */
    public function save() {
        // Check if it's POST request
        if(!$this->input->post()) {
            redirect('VotingReport/register');
        }
        
        // Get user ID from the submitted form data
        $userId = $this->input->post('reporter_id');
        
        // Get naannoofil from submitted form data
        $votingRegionCode = $this->input->post('naannoofil_id');
        
        // Get reporter name from form
        $reporterName = $this->input->post('reporter_name');
        
        // Validate required fields
        $this->form_validation->set_rules('report_session', 'Yeroo Gabaasaa', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Yeroo gabaasaa guutuu qaba!');
            redirect('VotingReport/register');
        }
        
        // Check if we have all the necessary data
        if(!$votingRegionCode) {
            $this->session->set_flashdata('error', 'Odeeffannoo naannoo filannoo hin argamne!');
            redirect('VotingReport/register');
        }
        
        if(!$userId) {
            $this->session->set_flashdata('error', 'Odeeffannoo fayyadamaa hin argamne!');
            redirect('VotingReport/register');
        }
        
        // Get form data
        $reportDate = $this->input->post('report_date');
        $reportSession = $this->input->post('report_session');
        $reportTime = $this->input->post('report_time');
        $serialNumber = $this->input->post('serial_number');
        $remarks = $this->input->post('remarks');
        
        // Prepare data array
        $data = array(
            'naannoofil_id' => $votingRegionCode,
            'report_date' => $reportDate,
            'report_session' => $reportSession,
            'report_time' => $reportTime,
            'serial_number' => $serialNumber,
            'reporter_id' => $userId,
            'reporter_name' => $reporterName ?: 'Unknown',
            
            // Karoora (Plan) - Member
            'plan_member_male' => $this->input->post('plan_member_male') ?: 0,
            'plan_member_female' => $this->input->post('plan_member_female') ?: 0,
            'plan_member_total' => $this->input->post('plan_member_total') ?: 0,
            
            // Karoora (Plan) - Non-member
            'plan_nonmember_male' => $this->input->post('plan_nonmember_male') ?: 0,
            'plan_nonmember_female' => $this->input->post('plan_nonmember_female') ?: 0,
            'plan_nonmember_total' => $this->input->post('plan_nonmember_total') ?: 0,
            
            // Karoora (Plan) - Grand Total
            'plan_total_male' => $this->input->post('plan_total_male') ?: 0,
            'plan_total_female' => $this->input->post('plan_total_female') ?: 0,
            'plan_grand_total' => $this->input->post('plan_grand_total') ?: 0,
            
            // Hojiin Raawwatame (Actual) - Member
            'actual_member_male' => $this->input->post('actual_member_male') ?: 0,
            'actual_member_female' => $this->input->post('actual_member_female') ?: 0,
            'actual_member_total' => $this->input->post('actual_member_total') ?: 0,
            'actual_member_percent' => $this->input->post('actual_member_percent') ?: 0,
            
            // Hojiin Raawwatame (Actual) - Non-member
            'actual_nonmember_male' => $this->input->post('actual_nonmember_male') ?: 0,
            'actual_nonmember_female' => $this->input->post('actual_nonmember_female') ?: 0,
            'actual_nonmember_total' => $this->input->post('actual_nonmember_total') ?: 0,
            'actual_nonmember_percent' => $this->input->post('actual_nonmember_percent') ?: 0,
            
            // Hojiin Raawwatame (Actual) - Grand Total
            'actual_total_male' => $this->input->post('actual_total_male') ?: 0,
            'actual_total_female' => $this->input->post('actual_total_female') ?: 0,
            'actual_grand_total' => $this->input->post('actual_grand_total') ?: 0,
            'actual_total_percent' => $this->input->post('actual_total_percent') ?: 0,
            
            // Galmee Dabalataa (Additional Registration) - Member
            'additional_member_male' => $this->input->post('additional_member_male') ?: 0,
            'additional_member_female' => $this->input->post('additional_member_female') ?: 0,
            'additional_member_total' => $this->input->post('additional_member_total') ?: 0,
            
            // Galmee Dabalataa (Additional Registration) - Non-member
            'additional_nonmember_male' => $this->input->post('additional_nonmember_male') ?: 0,
            'additional_nonmember_female' => $this->input->post('additional_nonmember_female') ?: 0,
            'additional_nonmember_total' => $this->input->post('additional_nonmember_total') ?: 0,
            
            // Remarks
            'remarks' => $remarks,
            
            // System fields
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $userId,
            'status' => 1
        );
        
        // Save to database
        $result = $this->VotingReport_model->saveReport($data);
        
        // Clear any existing messages
        $this->session->set_flashdata('success', null);
        $this->session->set_flashdata('error', null);
        
        if($result) {
            $this->session->set_flashdata('success', 'Gabaasni milkaa\'inaan galmaa\'eera!');
        } else {
            $this->session->set_flashdata('error', 'Gabaasni galmaa\'uu hin dande\'ye. Yeroo biroo yaali!');
        }
        
        // Redirect to listReports
        redirect('VotingReport/listReports');
    }
    
    /**
     * Get current session based on time
     */
    private function getCurrentSession() {
        $currentHour = date('H');
        if($currentHour < 12) {
            return 'morning';
        } else {
            return 'afternoon';
        }
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
     * View submitted reports
     */
    public function viewReports() {
        if($this->session->userdata('username')) {
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            // Get date range (last 7 days by default)
            $endDate = date('Y-m-d');
            $startDate = date('Y-m-d', strtotime('-7 days'));
            
            $reports = $this->VotingReport_model->getReportsByDateRange($votingRegionCode, $startDate, $endDate);
            
            $data = array(
                'pageTitle' => 'Gabaasawwan Galmaa\'an',
                'reports' => $reports,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'name' => $this->session->userdata('full_name'),
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'activeMenu' => 'listReports'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('votingRegion/voting_reports_view', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('Structure/login');
        }
    }

    /**
     * Dashboard for Naannoo Filannoo - COMPLETE WITH ALL TOTALS
     */
    public function dashboard() {
        if($this->session->userdata('username')) {
            
            $userId = $this->session->userdata('id');
            $userName = $this->session->userdata('full_name');
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            $votingRegionName = $votingRegionCode;
            
            // Get today's date
            $today = date('Y-m-d');
            $currentMonth = date('Y-m');
            $currentYear = date('Y');
            $currentMonthNum = date('m');
            
            // ========== BASIC DASHBOARD DATA ==========
            
            // Get reports for today
            $todayReports = $this->VotingReport_model->getTodayReport($votingRegionCode, $today);
            
            // Get today's morning and afternoon reports
            $morningReport = $this->VotingReport_model->getSessionReport($votingRegionCode, $today, 'morning');
            $afternoonReport = $this->VotingReport_model->getSessionReport($votingRegionCode, $today, 'afternoon');
            
            // Get current month reports
            $monthStart = date('Y-m-01');
            $monthEnd = date('Y-m-t');
            $monthReports = $this->VotingReport_model->getReportsByDateRange($votingRegionCode, $monthStart, $monthEnd);
            
            // Calculate basic statistics
            $totalReports = count($monthReports);
            $morningCount = 0;
            $afternoonCount = 0;
            $totalVoters = 0;
            $totalMembers = 0;
            $totalNonMembers = 0;
            $totalMaleVoters = 0;
            $totalFemaleVoters = 0;
            
            foreach($monthReports as $report) {
                if($report->report_session == 'morning') $morningCount++;
                if($report->report_session == 'afternoon') $afternoonCount++;
                
                // Sum actual totals
                if(isset($report->actual_grand_total)) {
                    $totalVoters += $report->actual_grand_total;
                }
                if(isset($report->actual_member_total)) {
                    $totalMembers += $report->actual_member_total;
                }
                if(isset($report->actual_nonmember_total)) {
                    $totalNonMembers += $report->actual_nonmember_total;
                }
                if(isset($report->actual_total_male)) {
                    $totalMaleVoters += $report->actual_total_male;
                }
                if(isset($report->actual_total_female)) {
                    $totalFemaleVoters += $report->actual_total_female;
                }
            }
            
            // Get last 7 days reports for chart
            $weekStart = date('Y-m-d', strtotime('-6 days'));
            $weekReports = $this->VotingReport_model->getReportsByDateRange($votingRegionCode, $weekStart, $today);
            
            $chartData = [];
            $chartLabels = [];
            
            for($i = 6; $i >= 0; $i--) {
                $date = date('Y-m-d', strtotime("-$i days"));
                $chartLabels[] = date('d/m', strtotime($date));
                
                $dayTotal = 0;
                foreach($weekReports as $report) {
                    if($report->report_date == $date) {
                        $dayTotal += $report->actual_grand_total ?? 0;
                    }
                }
                $chartData[] = $dayTotal;
            }
            
            // ========== ADDITIONAL DATA FOR ENHANCED TOTALS ==========
            
            // 1. All-time total voters (all time)
            $allTimeVoters = $this->VotingReport_model->getTotalVotersAllTime($votingRegionCode);
            
            // 2. Total voters by region (same as all-time)
            $totalVotersByRegion = $allTimeVoters;
            
            // 3. Gender breakdown for current month
            $monthlyMaleVoters = $totalMaleVoters;
            $monthlyFemaleVoters = $totalFemaleVoters;
            
            // 4. Average voters per report
            $averageVotersPerReport = ($totalReports > 0) ? round($totalVoters / $totalReports) : 0;
            
            // 5. Total active regions (across whole system)
            $totalActiveRegions = $this->VotingReport_model->getTotalActiveRegions($currentMonth);
            
            // 6. Completion rate (percentage of days with both reports)
            $completionRate = $this->VotingReport_model->getCompletionRate($currentMonth, $votingRegionCode);
            
            // 7. Monthly trend data (last 6 months)
            $monthlyTrend = $this->VotingReport_model->getMonthlyTrend($votingRegionCode);
            $monthlyLabels = [];
            $monthlyData = [];
            foreach($monthlyTrend as $trend) {
                $monthlyLabels[] = $trend->month;
                $monthlyData[] = $trend->total;
            }
            
            // 8. Top regions (across whole system for current month)
            $topRegions = $this->VotingReport_model->getTopRegions($currentMonth);
            
            // 9. Daily average for current month
            $daysPassed = date('d');
            $dailyAverage = ($daysPassed > 0) ? round($totalVoters / $daysPassed) : 0;
            
            // 10. Projected month-end total
            $daysInMonth = date('t');
            $projectedTotal = $dailyAverage * $daysInMonth;
            
            // 11. Get plan vs actual comparison
            $planGrandTotal = 0;
            $actualGrandTotal = 0;
            $planAchievement = 0;
            
            foreach($monthReports as $report) {
                $planGrandTotal += $report->plan_grand_total ?? 0;
                $actualGrandTotal += $report->actual_grand_total ?? 0;
            }
            if($planGrandTotal > 0) {
                $planAchievement = round(($actualGrandTotal / $planGrandTotal) * 100);
            }
            
            // 12. Get additional registrations total
            $additionalRegistrations = 0;
            foreach($monthReports as $report) {
                $additionalRegistrations += ($report->additional_member_total ?? 0) + ($report->additional_nonmember_total ?? 0);
            }
            
            $data = array(
                // Basic page data
                'pageTitle' => 'Daashboordii Gabaasaa Filannoo',
                'name' => $userName,
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'voting_region_code' => $votingRegionCode,
                'voting_region_name' => $votingRegionName,
                'activeMenu' => 'dashboard',
                
                // Basic stats
                'today_reports' => $todayReports,
                'morning_report' => $morningReport,
                'afternoon_report' => $afternoonReport,
                'total_reports' => $totalReports,
                'morning_count' => $morningCount,
                'afternoon_count' => $afternoonCount,
                'total_voters' => $totalVoters,
                'chart_labels' => json_encode($chartLabels),
                'chart_data' => json_encode($chartData),
                
                // Enhanced totals
                'total_voters_all_time' => $allTimeVoters,
                'total_voters_by_region' => $totalVotersByRegion,
                'total_male_voters' => $monthlyMaleVoters,
                'total_female_voters' => $monthlyFemaleVoters,
                'average_voters_per_report' => $averageVotersPerReport,
                'total_active_regions' => $totalActiveRegions,
                'completion_rate' => $completionRate,
                'monthly_labels' => json_encode($monthlyLabels),
                'monthly_data' => json_encode($monthlyData),
                'top_regions' => $topRegions,
                'daily_average' => $dailyAverage,
                'projected_total' => $projectedTotal,
                'plan_grand_total' => $planGrandTotal,
                'actual_grand_total' => $actualGrandTotal,
                'plan_achievement' => $planAchievement,
                'additional_registrations' => $additionalRegistrations,
                'total_members' => $totalMembers,
                'total_nonmembers' => $totalNonMembers,
                'current_month' => date('F Y')
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('votingRegion/dashboard', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('Structure/login');
        }
    }

    /**
     * List all registered reports for this naannoo filannoo
     */
    public function listReports() {
        if($this->session->userdata('username')) {
            
            $userId = $this->session->userdata('id');
            $userName = $this->session->userdata('full_name');
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            // Get voting region name for display
            $votingRegionName = $votingRegionCode;
            
            // Get filter parameters
            $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
            $endDate = $this->input->get('end_date') ?: date('Y-m-d');
            $session = $this->input->get('session') ?: 'all';
            
            // Get reports
            $reports = $this->VotingReport_model->getReportsByDateRange($votingRegionCode, $startDate, $endDate, $session);
            
            // MANUAL FILTER: Double-check that only this region's reports are shown
            $filtered_reports = array();
            foreach($reports as $report) {
                if($report->naannoofil_id == $votingRegionCode) {
                    $filtered_reports[] = $report;
                }
            }
            
            // Add editable status (within 2 hours)
            $currentTime = time();
            foreach($filtered_reports as $report) {
                $reportTime = strtotime($report->created_at);
                $timeDiff = ($currentTime - $reportTime) / 3600;
                $report->can_edit = ($timeDiff <= 2);
            }
            
            $data = array(
                'pageTitle' => 'Gabaasawwan Naannoo Koo',
                'name' => $userName,
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'voting_region_code' => $votingRegionCode,
                'voting_region_name' => $votingRegionName,
                'reports' => $filtered_reports,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'session' => $session,
                'current_time' => date('Y-m-d H:i:s'),
                'activeMenu' => 'listReports'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('votingRegion/list_reports', $data);
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
            
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            // Get report
            $report = $this->VotingReport_model->getReportById($id);
            
            // Check if report exists and belongs to this region
            if(!$report || $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VotingReport/listReports');
            }
            
            // Check if within 2 hours
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            
            if($timeDiff > 2) {
                $this->session->set_flashdata('error', 'Gabaasa kana wayiruu sa\'aatii 2 darbeera. Fooyyessuu hin dandeessu!');
                redirect('VotingReport/listReports');
            }
            
            // Check if session already passed for today
            $today = date('Y-m-d');
            $currentHour = date('H');
            
            if($report->report_date == $today) {
                if($report->report_session == 'morning' && $currentHour >= 12) {
                    $this->session->set_flashdata('error', 'Yeroo ganamaa darbeera. Gabaasa kana fooyyessuu hin dandeessu!');
                    redirect('VotingReport/listReports');
                }
                if($report->report_session == 'afternoon' && $currentHour >= 17) {
                    $this->session->set_flashdata('error', 'Yeroo waaree boodaa darbeera. Gabaasa kana fooyyessuu hin dandeessu!');
                    redirect('VotingReport/listReports');
                }
            }
            
            $data = array(
                'pageTitle' => 'Gabaasa Fooyyessuu',
                'name' => $this->session->userdata('full_name'),
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'report' => $report,
                'voting_region_name' => $report->naannoofil_id,
                'today' => $report->report_date,
                'current_time' => date('H:i:s'),
                'activeMenu' => 'listReports'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('votingRegion/edit_report', $data);
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
            $report = $this->VotingReport_model->getReportById($id);
            
            // Check if report exists and belongs to this region
            if(!$report || $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VotingReport/listReports');
            }
            
            // Check if within 2 hours
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            
            if($timeDiff > 2) {
                $this->session->set_flashdata('error', 'Gabaasa kana wayiruu sa\'aatii 2 darbeera. Fooyyessuu hin dandeessu!');
                redirect('VotingReport/listReports');
            }
            
            // Prepare update data
            $updateData = array(
                'plan_member_male' => $this->input->post('plan_member_male') ?: 0,
                'plan_member_female' => $this->input->post('plan_member_female') ?: 0,
                'plan_member_total' => $this->input->post('plan_member_total') ?: 0,
                'plan_nonmember_male' => $this->input->post('plan_nonmember_male') ?: 0,
                'plan_nonmember_female' => $this->input->post('plan_nonmember_female') ?: 0,
                'plan_nonmember_total' => $this->input->post('plan_nonmember_total') ?: 0,
                'plan_total_male' => $this->input->post('plan_total_male') ?: 0,
                'plan_total_female' => $this->input->post('plan_total_female') ?: 0,
                'plan_grand_total' => $this->input->post('plan_grand_total') ?: 0,
                'actual_member_male' => $this->input->post('actual_member_male') ?: 0,
                'actual_member_female' => $this->input->post('actual_member_female') ?: 0,
                'actual_member_total' => $this->input->post('actual_member_total') ?: 0,
                'actual_member_percent' => $this->input->post('actual_member_percent') ?: 0,
                'actual_nonmember_male' => $this->input->post('actual_nonmember_male') ?: 0,
                'actual_nonmember_female' => $this->input->post('actual_nonmember_female') ?: 0,
                'actual_nonmember_total' => $this->input->post('actual_nonmember_total') ?: 0,
                'actual_nonmember_percent' => $this->input->post('actual_nonmember_percent') ?: 0,
                'actual_total_male' => $this->input->post('actual_total_male') ?: 0,
                'actual_total_female' => $this->input->post('actual_total_female') ?: 0,
                'actual_grand_total' => $this->input->post('actual_grand_total') ?: 0,
                'actual_total_percent' => $this->input->post('actual_total_percent') ?: 0,
                'additional_member_male' => $this->input->post('additional_member_male') ?: 0,
                'additional_member_female' => $this->input->post('additional_member_female') ?: 0,
                'additional_member_total' => $this->input->post('additional_member_total') ?: 0,
                'additional_nonmember_male' => $this->input->post('additional_nonmember_male') ?: 0,
                'additional_nonmember_female' => $this->input->post('additional_nonmember_female') ?: 0,
                'additional_nonmember_total' => $this->input->post('additional_nonmember_total') ?: 0,
                'remarks' => $this->input->post('remarks'),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $userId
            );
            
            $result = $this->VotingReport_model->updateReport($id, $updateData);
            
            if($result) {
                $this->session->set_flashdata('success', 'Gabaasni milkaa\'inaan fooyya\'eera!');
            } else {
                $this->session->set_flashdata('error', 'Gabaasni fooyyessuu hin dande\'amne!');
            }
            
            redirect('VotingReport/listReports');
        } else {
            redirect('Structure/login');
        }
    }

    /**
     * Delete report (soft delete)
     */
    public function deleteReport($id) {
        if($this->session->userdata('username')) {
            
            $votingRegionCode = $this->session->userdata('naannoofil') ?: '';
            
            // Get report
            $report = $this->VotingReport_model->getReportById($id);
            
            // Check if report exists and belongs to this region
            if(!$report || $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VotingReport/listReports');
            }
            
            // Check if within 2 hours
            $reportTime = strtotime($report->created_at);
            $currentTime = time();
            $timeDiff = ($currentTime - $reportTime) / 3600;
            
            if($timeDiff > 2) {
                $this->session->set_flashdata('error', 'Gabaasa kana wayiruu sa\'aatii 2 darbeera. Haquu hin dandeessu!');
                redirect('VotingReport/listReports');
            }
            
            // Soft delete (update status to 0)
            $result = $this->VotingReport_model->deleteReport($id);
            
            if($result) {
                $this->session->set_flashdata('success', 'Gabaasni milkaa\'inaan haqameera!');
            } else {
                $this->session->set_flashdata('error', 'Gabaasni haquu hin dande\'amne!');
            }
            
            redirect('VotingReport/listReports');
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
            $report = $this->VotingReport_model->getReportById($id);
            
            // Check if report exists and belongs to this region
            if(!$report || $report->naannoofil_id != $votingRegionCode) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VotingReport/listReports');
            }
            
            $data = array(
                'pageTitle' => 'Gabaasa Ilaalchuu',
                'name' => $this->session->userdata('full_name'),
                'role' => $this->session->userdata('role'),
                'role_text' => $this->getRoleText($this->session->userdata('role')),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'report' => $report,
                'voting_region_name' => $report->naannoofil_id,
                'activeMenu' => 'listReports'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('votingRegion/view_report', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('Structure/login');
        }
    }

    /**
     * List all reports for Admin - Complete overview with details
     */
    public function listReportAll() {
        // Check if user is logged in and is admin (role 1)
        if($this->session->userdata('username')) {
            
            // Check if user is admin (role 1)
            $userRole = $this->session->userdata('role');
            if($userRole != 1) {
                $this->session->set_flashdata('error', 'Ati hayyama admin hin qabdu!');
                redirect('dashboard');
            }
            
            // Load the admin report model
            $this->load->model('AdminReport_model');
            
            $userId = $this->session->userdata('id');
            $userName = $this->session->userdata('full_name');
            
            // Get filter parameters
            $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
            $endDate = $this->input->get('end_date') ?: date('Y-m-d');
            $session = $this->input->get('session') ?: 'all';
            $regionId = $this->input->get('region_id') ?: 'all';
            $search = $this->input->get('search') ?: '';
            
            // Get all reports with detailed information
            $reports = $this->AdminReport_model->getAllReportsDetailed($startDate, $endDate, $session, $regionId, $search);
            
            // Get all regions for filter dropdown
            $regions = $this->AdminReport_model->getAllRegions();
            
            // Calculate summary statistics
            $summary = $this->AdminReport_model->getReportsSummary($startDate, $endDate);
            
            $data = array(
                'pageTitle' => 'Gabaasa Filannoo Hunda - Admin',
                'name' => $userName,
                'role' => $userRole,
                'role_text' => $this->getRoleText($userRole),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'reports' => $reports,
                'regions' => $regions,
                'summary' => $summary,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'session' => $session,
                'selected_region' => $regionId,
                'search' => $search,
                'current_time' => date('Y-m-d H:i:s'),
                'activeMenu' => 'listReportAll'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('admin/list_report_all', $data);
            $this->load->view('layout/footer');
            
        } else {
            redirect('login');
        }
    }

    /**
     * View single report details for admin
     */
    public function viewReportDetail($id) {
        // Check if user is logged in
        if($this->session->userdata('username')) {
            
            // Check if user is admin (role 1)
            $userRole = $this->session->userdata('role');
            if($userRole != 1) {
                $this->session->set_flashdata('error', 'Ati hayyama admin hin qabdu!');
                redirect('dashboard');
            }
            
            // Load the admin report model
            $this->load->model('AdminReport_model');
            
            // Get report with all details
            $report = $this->AdminReport_model->getReportDetailById($id);
            
            if(!$report) {
                $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
                redirect('VotingReport/listReportAll');
            }
            
            // Get reporter info
            $reporter = $this->db->where('id', $report->reporter_id)->get('useraccount')->row();
            
            $data = array(
                'pageTitle' => 'Gabaasa Ilaalchuu - Admin',
                'name' => $this->session->userdata('full_name'),
                'role' => $userRole,
                'role_text' => $this->getRoleText($userRole),
                'profile_image' => $this->session->userdata('profile_image'),
                'last_login' => $this->session->userdata('last_login'),
                'report' => $report,
                'reporter' => $reporter,
                'activeMenu' => 'listReportAll'
            );
            
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu', $data);
            $this->load->view('admin/report_detail', $data);
            $this->load->view('layout/footer');
            
        } else {
            redirect('login');
        }
    }

    /**
     * Export reports to Excel/CSV
     */
    public function exportReports() {
        // Check if user is logged in and is admin
        if($this->session->userdata('username') && $this->session->userdata('role') == 1) {
            
            // Load the admin report model
            $this->load->model('AdminReport_model');
            
            $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
            $endDate = $this->input->get('end_date') ?: date('Y-m-d');
            $session = $this->input->get('session') ?: 'all';
            $regionId = $this->input->get('region_id') ?: 'all';
            
            // Get export data
            $reports = $this->AdminReport_model->getExportData($startDate, $endDate, $session, $regionId);
            
            // Load CSV helper
            $this->load->helper('csv');
            
            // Create CSV filename
            $filename = 'gabaasa_filannoo_' . date('Y-m-d_H-i-s') . '.csv';
            
            // Prepare CSV data
            $csv_data = array();
            
            // Add headers
            $headers = array(
                'Guyyaa', 'Yeroo', 'Lakk. Tarree', 'Naannoo Filannoo', 
                'Gabaasaa', 'Bilbila', 'Email', 'Godina/Magaalaa', 'Aanaa',
                'Karoora Miseensa Dhi', 'Karoora Miseensa Dub', 'Karoora Miseensa Ida\'ama',
                'Karoora Miseensa Hin Taane Dhi', 'Karoora Miseensa Hin Taane Dub', 'Karoora Miseensa Hin Taane Ida\'ama',
                'Karoora Waliigala', 'Raawwii Miseensa Dhi', 'Raawwii Miseensa Dub', 'Raawwii Miseensa Ida\'ama', 'Raawwii Miseensa %',
                'Raawwii Miseensa Hin Taane Dhi', 'Raawwii Miseensa Hin Taane Dub', 'Raawwii Miseensa Hin Taane Ida\'ama', 'Raawwii Miseensa Hin Taane %',
                'Raawwii Waliigala', 'Raawwii Waliigala %', 'Hubannoo', 'Yeroo Galmee'
            );
            $csv_data[] = $headers;
            
            // Add data rows
            foreach($reports as $report) {
                $row = array(
                    $report->report_date,
                    $report->report_session == 'morning' ? 'Ganama' : 'Waaree Booda',
                    $report->serial_number,
                    $report->naannoofil_id,
                    $report->reporter_name,
                    $report->reporter_phone,
                    $report->reporter_email,
                    $report->zone_name ?: $report->city_name,
                    $report->woreda_name,
                    $report->plan_member_male,
                    $report->plan_member_female,
                    $report->plan_member_total,
                    $report->plan_nonmember_male,
                    $report->plan_nonmember_female,
                    $report->plan_nonmember_total,
                    $report->plan_grand_total,
                    $report->actual_member_male,
                    $report->actual_member_female,
                    $report->actual_member_total,
                    $report->actual_member_percent,
                    $report->actual_nonmember_male,
                    $report->actual_nonmember_female,
                    $report->actual_nonmember_total,
                    $report->actual_nonmember_percent,
                    $report->actual_grand_total,
                    $report->actual_total_percent,
                    $report->remarks,
                    $report->created_at
                );
                $csv_data[] = $row;
            }
            
            // Generate CSV
            array_to_csv($csv_data, $filename);
            
        } else {
            redirect('login');
        }
    }

    /**
     * Get daily summary for dashboard
     */
    public function dailySummary() {
        // Check if user is logged in and is admin
        if($this->session->userdata('username') && $this->session->userdata('role') == 1) {
            
            $this->load->model('AdminReport_model');
            
            $date = $this->input->get('date') ?: date('Y-m-d');
            $daily_summary = $this->AdminReport_model->getDailySummary($date);
            
            echo json_encode($daily_summary);
            
        } else {
            echo json_encode(array('error' => 'Unauthorized'));
        }
    }

    /**
     * Get monthly summary for dashboard
     */
    public function monthlySummary() {
        // Check if user is logged in and is admin
        if($this->session->userdata('username') && $this->session->userdata('role') == 1) {
            
            $this->load->model('AdminReport_model');
            
            $year = $this->input->get('year') ?: date('Y');
            $month = $this->input->get('month') ?: date('m');
            $monthly_summary = $this->AdminReport_model->getMonthlySummary($year, $month);
            
            echo json_encode($monthly_summary);
            
        } else {
            echo json_encode(array('error' => 'Unauthorized'));
        }
    }
}
?>