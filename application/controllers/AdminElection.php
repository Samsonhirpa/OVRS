<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminElection extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        // Check if user is logged in and is admin
        if(!$this->session->userdata('username')) {
            redirect('login');
        }
        
        $userRole = $this->session->userdata('role');
        if($userRole != 1) {
            redirect('dashboard');
        }
        
        $this->load->model('AdminElection_model');
        $this->load->helper('url');
        $this->load->helper('form');
    }
    
  /**
 * Main Dashboard - Complete with all required data
 */
public function dashboard() {
    $data['pageTitle'] = 'Election Dashboard - Admin';
    $data['name'] = $this->session->userdata('full_name');
    $data['role'] = $this->session->userdata('role');
    $data['role_text'] = 'Admin';
    $data['profile_image'] = $this->session->userdata('profile_image');
    $data['last_login'] = $this->session->userdata('last_login');
    $data['activeMenu'] = 'adminElectionDashboard';
    
    // Get filter parameters from URL
    $start_date = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
    $end_date = $this->input->get('end_date') ?: date('Y-m-d');
    $selected_region = $this->input->get('region_id') ?: 'all';
    
    // Get all reports based on filters
    $reports = $this->AdminElection_model->getAllReports($start_date, $end_date, 'all', $selected_region);
    
    // Calculate summary data
    $summary = new stdClass();
    $summary->total_reports = count($reports);
    $summary->total_voters = 0;
    $summary->total_male_voters = 0;
    $summary->total_female_voters = 0;
    $summary->total_regions = 0;
    
    $party_breakdown = [];
    $region_data = [];
    $gender_breakdown = new stdClass();
    $gender_breakdown->male_voters = 0;
    $gender_breakdown->female_voters = 0;
    
    // Process reports data
    foreach($reports as $report) {
        // Total voters
        $summary->total_voters += $report->grand_total;
        $summary->total_male_voters += $report->male_voters;
        $summary->total_female_voters += $report->female_voters;
        
        // Party breakdown
        if(!isset($party_breakdown[$report->party_name])) {
            $party_breakdown[$report->party_name] = (object)[
                'party_name' => $report->party_name,
                'report_count' => 0,
                'total_male_voters' => 0,
                'total_female_voters' => 0,
                'total_voters' => 0
            ];
        }
        $party_breakdown[$report->party_name]->report_count++;
        $party_breakdown[$report->party_name]->total_male_voters += $report->male_voters;
        $party_breakdown[$report->party_name]->total_female_voters += $report->female_voters;
        $party_breakdown[$report->party_name]->total_voters += $report->grand_total;
        
        // Gender breakdown
        $gender_breakdown->male_voters += $report->male_voters;
        $gender_breakdown->female_voters += $report->female_voters;
        
        // Region data for top regions
        $region_key = $report->naannoofil_id;
        if(!isset($region_data[$region_key])) {
            $region_data[$region_key] = (object)[
                'naannoofil_id' => $report->naannoofil_id,
                'report_count' => 0,
                'total_voters' => 0
            ];
        }
        $region_data[$region_key]->report_count++;
        $region_data[$region_key]->total_voters += $report->grand_total;
    }
    
    // Get unique regions count
    $regions_list = $this->AdminElection_model->getAllRegions();
    $summary->total_regions = count($regions_list);
    
    // Convert party breakdown to array and sort by total voters
    $party_breakdown = array_values($party_breakdown);
    usort($party_breakdown, function($a, $b) {
        return $b->total_voters - $a->total_voters;
    });
    
    // Get top 10 regions
    $top_regions = array_values($region_data);
    usort($top_regions, function($a, $b) {
        return $b->total_voters - $a->total_voters;
    });
    $top_regions = array_slice($top_regions, 0, 10);
    
    // Get daily data for chart (last 30 days)
    $daily_data_array = [];
    $daily_labels = [];
    for($i = 29; $i >= 0; $i--) {
        $date = date('Y-m-d', strtotime("-$i days"));
        $daily_labels[] = date('d M', strtotime($date));
        
        $daily_total = 0;
        foreach($reports as $report) {
            if($report->report_date == $date) {
                $daily_total += $report->grand_total;
            }
        }
        $daily_data_array[] = $daily_total;
    }
    
    // Get monthly data for chart (current year)
    $monthly_labels = ['Amajjii', 'Gura', 'Bit', 'Ebla', 'Caamsa', 'Wax', 'Adool', 'Hagay', 'Ful', 'Onk', 'Sada', 'Mud'];
    $monthly_data_array = [];
    $current_year = date('Y');
    
    for($month = 1; $month <= 12; $month++) {
        $month_start = date('Y-m-01', strtotime("$current_year-$month-01"));
        $month_end = date('Y-m-t', strtotime("$current_year-$month-01"));
        
        $month_total = 0;
        foreach($reports as $report) {
            if($report->report_date >= $month_start && $report->report_date <= $month_end) {
                $month_total += $report->grand_total;
            }
        }
        $monthly_data_array[] = $month_total;
    }
    
    // Get regions for filter dropdown
    $regions = $this->AdminElection_model->getAllRegions();
    
    // Prepare data for view
    $data['summary'] = $summary;
    $data['party_breakdown'] = $party_breakdown;
    $data['top_regions'] = $top_regions;
    $data['gender_breakdown'] = $gender_breakdown;
    $data['daily_labels'] = json_encode($daily_labels);
    $data['daily_data'] = json_encode($daily_data_array);
    $data['monthly_labels'] = json_encode($monthly_labels);
    $data['monthly_data'] = json_encode($monthly_data_array);
    $data['start_date'] = $start_date;
    $data['end_date'] = $end_date;
    $data['selected_region'] = $selected_region;
    $data['regions'] = $regions;
    
    $this->load->view('layout/header', $data);
    $this->load->view('layout/topmenu', $data);
    $this->load->view('layout/sidemenu', $data);
    $this->load->view('admin_election/dashboard', $data);
    $this->load->view('layout/footer', $data);
}
   /**
 * Party-wise reports
 */
public function partyReports($partyName = null) {
    $data['pageTitle'] = 'Gabaasa Paartii - Election Reports';
    $data['name'] = $this->session->userdata('full_name');
    $data['role'] = $this->session->userdata('role');
    $data['role_text'] = 'Admin';
    $data['profile_image'] = $this->session->userdata('profile_image');
    $data['last_login'] = $this->session->userdata('last_login');
    $data['activeMenu'] = 'adminElectionPartyReports';
    
    // Get filter parameters
    $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
    $endDate = $this->input->get('end_date') ?: date('Y-m-d');
    $selectedParty = $this->input->get('party') ?: ($partyName ?: 'all');
    $region = $this->input->get('region') ?: 'all';
    $teessooType = $this->input->get('teessoo_type') ?: 'all';
    
    // Get reports with teessoo filter
    $data['reports'] = $this->AdminElection_model->getAllReportsWithTeessoo($startDate, $endDate, $selectedParty, $region, $teessooType);
    
    // Get all parties, regions for filters
    $data['parties'] = $this->AdminElection_model->getAllParties();
    $data['regions'] = $this->AdminElection_model->getAllRegions();
    
    // Get party totals
    $data['partyTotals'] = $this->AdminElection_model->getAllPartiesWithTotals($startDate, $endDate, $selectedParty, $region, $teessooType);
    
    $data['start_date'] = $startDate;
    $data['end_date'] = $endDate;
    $data['selected_party'] = $selectedParty;
    $data['selected_region'] = $region;
    $data['selected_teessoo_type'] = $teessooType;
    
    $this->load->view('layout/header', $data);
    $this->load->view('layout/topmenu', $data);
    $this->load->view('layout/sidemenu', $data);
    $this->load->view('admin_election/party_reports', $data);
    $this->load->view('layout/footer', $data);
}
    
/**
 * Region Reports - Show Naannoo Filannoo summary
 */
public function regionReports() {
    $data['pageTitle'] = 'Gabaasa Naannoo Filannoo - Election Reports';
    $data['name'] = $this->session->userdata('full_name');
    $data['role'] = $this->session->userdata('role');
    $data['role_text'] = 'Admin';
    $data['profile_image'] = $this->session->userdata('profile_image');
    $data['last_login'] = $this->session->userdata('last_login');
    $data['activeMenu'] = 'adminElectionRegionReports';
    
    // Get filter parameters
    $start_date = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
    $end_date = $this->input->get('end_date') ?: date('Y-m-d');
    $selected_party = $this->input->get('party') ?: 'all';
    $selected_teessoo_type = $this->input->get('teessoo_type') ?: 'all';
    
    // Get Naannoo Filannoo summary
    $data['locationSummary'] = $this->AdminElection_model->getNaannooFilannooSummary($start_date, $end_date, $selected_party, $selected_teessoo_type);
    
    // Get all parties for filter
    $data['parties'] = $this->AdminElection_model->getAllParties();
    
    $data['start_date'] = $start_date;
    $data['end_date'] = $end_date;
    $data['selected_party'] = $selected_party;
    $data['selected_teessoo_type'] = $selected_teessoo_type;
    
    $this->load->view('layout/header', $data);
    $this->load->view('layout/topmenu', $data);
    $this->load->view('layout/sidemenu', $data);
    $this->load->view('admin_election/region_reports', $data);
    $this->load->view('layout/footer', $data);
}
/**
 * Get party details for a specific Naannoo Filannoo
 */
public function getNaannooFilannooPartyDetails() {
    $naannoofilId = $this->input->get('naannoofil_id');
    $teessooType = $this->input->get('teessoo_type');
    $teessooId = $this->input->get('teessoo_id');
    $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
    $endDate = $this->input->get('end_date') ?: date('Y-m-d');
    $party = $this->input->get('party') ?: 'all';
    
    // Get reports for this specific naannoofil_id
    $reports = $this->AdminElection_model->getAllReports($startDate, $endDate, $party, $naannoofilId);
    
    // Calculate party breakdown
    $partyBreakdown = [];
    $totalReports = 0;
    $totalMaleVoters = 0;
    $totalFemaleVoters = 0;
    $totalVoters = 0;
    
    foreach($reports as $report) {
        if(!isset($partyBreakdown[$report->party_name])) {
            $partyBreakdown[$report->party_name] = [
                'party_name' => $report->party_name,
                'report_count' => 0,
                'total_male_voters' => 0,
                'total_female_voters' => 0,
                'total_voters' => 0
            ];
        }
        $partyBreakdown[$report->party_name]['report_count']++;
        $partyBreakdown[$report->party_name]['total_male_voters'] += $report->male_voters;
        $partyBreakdown[$report->party_name]['total_female_voters'] += $report->female_voters;
        $partyBreakdown[$report->party_name]['total_voters'] += $report->grand_total;
        
        $totalReports++;
        $totalMaleVoters += $report->male_voters;
        $totalFemaleVoters += $report->female_voters;
        $totalVoters += $report->grand_total;
    }
    
    $parties = array_values($partyBreakdown);
    
    echo json_encode([
        'success' => true,
        'total_reports' => $totalReports,
        'total_male_voters' => $totalMaleVoters,
        'total_female_voters' => $totalFemaleVoters,
        'total_voters' => $totalVoters,
        'parties' => $parties
    ]);
}
    /**
     * View single report
     */
    public function viewReport($id) {
        $data['pageTitle'] = 'Ibsa Gabaasaa - Election Report';
        $data['name'] = $this->session->userdata('full_name');
        $data['role'] = $this->session->userdata('role');
        $data['role_text'] = 'Admin';
        $data['profile_image'] = $this->session->userdata('profile_image');
        $data['last_login'] = $this->session->userdata('last_login');
        $data['activeMenu'] = 'adminElectionPartyReports';
        
        $data['report'] = $this->AdminElection_model->getReportById($id);
        
        if(!$data['report']) {
            $this->session->set_flashdata('error', 'Gabaasni hin argamne!');
            redirect('AdminElection/partyReports');
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/topmenu', $data);
        $this->load->view('layout/sidemenu', $data);
        $this->load->view('admin_election/view_report', $data);
        $this->load->view('layout/footer', $data);
    }
    
    /**
     * Export reports to CSV
     */
    public function export() {
        $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
        $endDate = $this->input->get('end_date') ?: date('Y-m-d');
        $party = $this->input->get('party') ?: 'all';
        $region = $this->input->get('region') ?: 'all';
        $location = $this->input->get('location') ?: 'all';
        $locationType = $this->input->get('location_type');
        $locationId = $this->input->get('location_id');
        
        $reports = $this->AdminElection_model->getExportData($startDate, $endDate, $party, $region, $location, $locationType, $locationId);
        
        // Set CSV headers
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=election_reports_' . date('Y-m-d') . '.csv');
        
        $output = fopen('php://output', 'w');
        
        // Add UTF-8 BOM
        fputs($output, "\xEF\xBB\xBF");
        
        // Headers in Oromo
        fputcsv($output, [
            'Guyyaa', 'Yeroo', 'Lakk. Tarree', 'Naannoo', 'Zone/Magalaa', 'Paartii', 'Gabaasaa',
            'Dhiirii', 'Dubartii', 'Waliigala', 'Hubannoo', 'Yeroo Galmee'
        ]);
        
        // Data rows
        foreach($reports as $report) {
            fputcsv($output, [
                $report->report_date,
                $report->report_session == 'morning' ? 'Ganama' : 'Waaree',
                $report->serial_number,
                $report->naannoofil_id,
                $report->location_name ?? '-',
                $report->party_name,
                $report->reporter_name,
                $report->male_voters,
                $report->female_voters,
                $report->grand_total,
                $report->remarks,
                $report->created_at
            ]);
        }
        
        fclose($output);
    }
    
    /**
     * Get region details for AJAX modal
     */
    public function getRegionDetails() {
        $regionId = $this->input->get('region_id');
        $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
        $endDate = $this->input->get('end_date') ?: date('Y-m-d');
        
        // Get all reports for this region
        $reports = $this->AdminElection_model->getAllReports($startDate, $endDate, 'all', $regionId);
        
        // Calculate party breakdown
        $partyBreakdown = [];
        $totalReports = 0;
        $totalMaleVoters = 0;
        $totalFemaleVoters = 0;
        $totalVoters = 0;
        
        foreach($reports as $report) {
            if(!isset($partyBreakdown[$report->party_name])) {
                $partyBreakdown[$report->party_name] = [
                    'party_name' => $report->party_name,
                    'report_count' => 0,
                    'total_male_voters' => 0,
                    'total_female_voters' => 0,
                    'total_voters' => 0
                ];
            }
            $partyBreakdown[$report->party_name]['report_count']++;
            $partyBreakdown[$report->party_name]['total_male_voters'] += $report->male_voters;
            $partyBreakdown[$report->party_name]['total_female_voters'] += $report->female_voters;
            $partyBreakdown[$report->party_name]['total_voters'] += $report->grand_total;
            
            $totalReports++;
            $totalMaleVoters += $report->male_voters;
            $totalFemaleVoters += $report->female_voters;
            $totalVoters += $report->grand_total;
        }
        
        // Sort by total voters descending
        usort($partyBreakdown, function($a, $b) {
            return $b['total_voters'] - $a['total_voters'];
        });
        
        echo json_encode([
            'success' => true,
            'total_reports' => $totalReports,
            'total_male_voters' => $totalMaleVoters,
            'total_female_voters' => $totalFemaleVoters,
            'total_voters' => $totalVoters,
            'parties' => array_values($partyBreakdown)
        ]);
    }
    
    /**
     * Export region data to CSV
     */
    public function exportRegionData() {
        $regionId = $this->input->get('region_id');
        $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
        $endDate = $this->input->get('end_date') ?: date('Y-m-d');
        
        $reports = $this->AdminElection_model->getAllReports($startDate, $endDate, 'all', $regionId);
        
        // Set CSV headers
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=region_' . $regionId . '_reports_' . date('Y-m-d') . '.csv');
        
        $output = fopen('php://output', 'w');
        fputs($output, "\xEF\xBB\xBF");
        
        // Headers in Oromo
        fputcsv($output, [
            'Guyyaa', 'Paartii', 'Dhiirii', 'Dubartii', 'Waliigala',
            'Gabaasaa', 'Hubannoo'
        ]);
        
        // Data rows
        foreach($reports as $report) {
            fputcsv($output, [
                $report->report_date,
                $report->party_name,
                $report->male_voters,
                $report->female_voters,
                $report->grand_total,
                $report->reporter_name,
                $report->remarks
            ]);
        }
        
        fclose($output);
    }

 /**
 * Get location party details for AJAX modal
 */
public function getLocationPartyDetails() {
    $locationName = $this->input->get('location_name');
    $locationType = $this->input->get('location_type');
    $locationId = $this->input->get('location_id');
    $startDate = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
    $endDate = $this->input->get('end_date') ?: date('Y-m-d');
    $party = $this->input->get('party') ?: 'all';
    
    // Get reports for this specific location using naannoofil_id
    $reports = $this->AdminElection_model->getAllReports($startDate, $endDate, $party, 'all', $locationName, $locationType, $locationId);
    
    // Calculate party breakdown
    $partyBreakdown = [];
    $totalReports = 0;
    $totalMaleVoters = 0;
    $totalFemaleVoters = 0;
    $totalVoters = 0;
    
    foreach($reports as $report) {
        if(!isset($partyBreakdown[$report->party_name])) {
            $partyBreakdown[$report->party_name] = [
                'party_name' => $report->party_name,
                'report_count' => 0,
                'total_male_voters' => 0,
                'total_female_voters' => 0,
                'total_voters' => 0
            ];
        }
        $partyBreakdown[$report->party_name]['report_count']++;
        $partyBreakdown[$report->party_name]['total_male_voters'] += $report->male_voters;
        $partyBreakdown[$report->party_name]['total_female_voters'] += $report->female_voters;
        $partyBreakdown[$report->party_name]['total_voters'] += $report->grand_total;
        
        $totalReports++;
        $totalMaleVoters += $report->male_voters;
        $totalFemaleVoters += $report->female_voters;
        $totalVoters += $report->grand_total;
    }
    
    // Convert to array and sort by total voters (high to low)
    $parties = array_values($partyBreakdown);
    usort($parties, function($a, $b) {
        return $b['total_voters'] - $a['total_voters'];
    });
    
    echo json_encode([
        'success' => true,
        'total_reports' => $totalReports,
        'total_male_voters' => $totalMaleVoters,
        'total_female_voters' => $totalFemaleVoters,
        'total_voters' => $totalVoters,
        'parties' => $parties
    ]);
}
}