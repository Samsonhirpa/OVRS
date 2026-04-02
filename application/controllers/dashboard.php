<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        $this->load->model('Athlete_model', 'athlete');
    }
    
    public function index() {
        $data['title'] = 'Dashboard';
        
        // Get all stats
        $data['stats'] = $this->get_dashboard_stats();
        $data['recent_athletes'] = $this->get_recent_athletes();
        $data['recent_officers'] = $this->get_recent_officers();
        
        // Load views
        
        $this->load->view('layout/header', $data);
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('athlete/dashboard', $data);
            $this->load->view('layout/footer');
    }
    
    private function get_dashboard_stats() {
        $stats = [];
        
        // ========== ATHLETE STATS ==========
        $stats['total_athletes'] = $this->db->count_all('athletes');
        
        // Gender counts
        $stats['male_count'] = $this->db->where('sex', 'Male')->count_all_results('athletes');
        $stats['female_count'] = $this->db->where('sex', 'Female')->count_all_results('athletes');
        $stats['other_count'] = $this->db->where('sex', 'Other')->count_all_results('athletes');
        
        // Calculate percentages
        $total_athletes = $stats['total_athletes'];
        $stats['male_percentage'] = $total_athletes > 0 ? round(($stats['male_count'] / $total_athletes) * 100, 1) : 0;
        $stats['female_percentage'] = $total_athletes > 0 ? round(($stats['female_count'] / $total_athletes) * 100, 1) : 0;
        $stats['other_percentage'] = $total_athletes > 0 ? round(($stats['other_count'] / $total_athletes) * 100, 1) : 0;
        
        // Average age
        $this->db->select_avg('age');
        $result = $this->db->get('athletes')->row_array();
        $stats['avg_age'] = round($result['age'] ?? 0, 1);
        
        // Sports stats
        $this->db->distinct();
        $this->db->select('sport');
        $stats['active_sports'] = $this->db->count_all_results('athletes');
        
        // Top sport
        $this->db->select('sport, COUNT(*) as count');
        $this->db->group_by('sport');
        $this->db->order_by('count', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get('athletes')->row_array();
        $stats['top_sport'] = [
            'name' => $result['sport'] ?? 'None',
            'count' => $result['count'] ?? 0
        ];
        
        // New this month
        $this->db->where('MONTH(created_at)', date('m'));
        $this->db->where('YEAR(created_at)', date('Y'));
        $stats['new_athletes_month'] = $this->db->count_all_results('athletes');
        
        // Last registration date
        $this->db->select('created_at');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get('athletes')->row_array();
        $stats['last_registration'] = $result ? date('d M Y', strtotime($result['created_at'])) : 'Never';
        
        // ========== OFFICER STATS ==========
        $stats['total_officers'] = $this->db->count_all('officers');
        
        // Active officers (using status column)
        $stats['active_officers'] = $this->db->where('status', 'active')->count_all_results('officers');
        $stats['inactive_officers'] = $stats['total_officers'] - $stats['active_officers'];
        
        // Officer percentages
        $total_officers = $stats['total_officers'];
        $stats['active_officer_percentage'] = $total_officers > 0 ? round(($stats['active_officers'] / $total_officers) * 100, 1) : 0;
        $stats['inactive_officer_percentage'] = $total_officers > 0 ? round(($stats['inactive_officers'] / $total_officers) * 100, 1) : 0;
        
        // Average experience (if column exists)
        $stats['avg_experience'] = 0;
        if ($this->db->field_exists('experience_years', 'officers')) {
            $this->db->select_avg('experience_years');
            $result = $this->db->get('officers')->row_array();
            $stats['avg_experience'] = round($result['experience_years'] ?? 0, 1);
        } elseif ($this->db->field_exists('experience', 'officers')) {
            $this->db->select_avg('experience');
            $result = $this->db->get('officers')->row_array();
            $stats['avg_experience'] = round($result['experience'] ?? 0, 1);
        }
        
        // New officers this month
        $stats['new_officers_month'] = 0;
        if ($this->db->field_exists('created_at', 'officers')) {
            $this->db->where('MONTH(created_at)', date('m'));
            $this->db->where('YEAR(created_at)', date('Y'));
            $stats['new_officers_month'] = $this->db->count_all_results('officers');
        }
        
        // Last assignment
        $stats['last_assignment'] = 'Never';
        if ($this->db->field_exists('assigned_date', 'officers')) {
            $this->db->select('assigned_date');
            $this->db->order_by('assigned_date', 'DESC');
            $this->db->limit(1);
            $result = $this->db->get('officers')->row_array();
            if ($result && !empty($result['assigned_date'])) {
                $stats['last_assignment'] = date('d M Y', strtotime($result['assigned_date']));
            }
        } elseif ($this->db->field_exists('created_at', 'officers')) {
            $this->db->select('created_at');
            $this->db->order_by('created_at', 'DESC');
            $this->db->limit(1);
            $result = $this->db->get('officers')->row_array();
            if ($result && !empty($result['created_at'])) {
                $stats['last_assignment'] = date('d M Y', strtotime($result['created_at']));
            }
        }
        
        // Officer to athlete ratio
        $stats['officer_athlete_ratio'] = $stats['total_athletes'] > 0 && $stats['total_officers'] > 0 ? 
            round($stats['total_athletes'] / $stats['total_officers'], 1) : 0;
        
        // Combined new registrations
        $stats['new_this_month'] = $stats['new_athletes_month'] + $stats['new_officers_month'];
        
        return $stats;
    }
    
    private function get_recent_athletes($limit = 5) {
        $this->db->select('id, full_name, age, sex, sport, region, photo, created_at');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $results = $this->db->get('athletes')->result_array();
        
        // Format dates
        foreach ($results as &$row) {
            $row['created_at'] = $row['created_at'] ? date('d M', strtotime($row['created_at'])) : 'N/A';
        }
        
        return $results;
    }
    
    private function get_recent_officers($limit = 5) {
        // Check which columns exist
        $columns = ['id'];
        
        if ($this->db->field_exists('name', 'officers')) {
            $columns[] = 'name';
        } elseif ($this->db->field_exists('full_name', 'officers')) {
            $columns[] = 'full_name as name';
        }
        
        if ($this->db->field_exists('position', 'officers')) {
            $columns[] = 'position';
        }
        
        if ($this->db->field_exists('department', 'officers')) {
            $columns[] = 'department';
        }
        
        if ($this->db->field_exists('experience_years', 'officers')) {
            $columns[] = 'experience_years as experience';
        } elseif ($this->db->field_exists('experience', 'officers')) {
            $columns[] = 'experience';
        }
        
        if ($this->db->field_exists('photo', 'officers')) {
            $columns[] = 'photo';
        }
        
        if ($this->db->field_exists('status', 'officers')) {
            $columns[] = 'status';
        }
        
        $columns[] = 'created_at';
        
        $this->db->select(implode(', ', $columns));
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $results = $this->db->get('officers')->result_array();
        
        // Format data
        foreach ($results as &$row) {
            if (isset($row['created_at'])) {
                $row['assigned_at'] = date('d M', strtotime($row['created_at']));
            } else {
                $row['assigned_at'] = 'N/A';
            }
            
            // Set defaults
            if (!isset($row['name'])) $row['name'] = 'Unknown Officer';
            if (!isset($row['position'])) $row['position'] = 'Officer';
            if (!isset($row['department'])) $row['department'] = 'General';
            if (!isset($row['experience'])) $row['experience'] = 0;
            if (!isset($row['photo'])) $row['photo'] = '';
            if (!isset($row['status'])) $row['status'] = 'active';
        }
        
        return $results;
    }
    
    // AJAX endpoint for refreshing stats
    public function refresh() {
        $stats = $this->get_dashboard_stats();
        echo json_encode([
            'success' => true,
            'data' => [
                'total_athletes' => $stats['total_athletes'],
                'total_officers' => $stats['total_officers'],
                'active_sports' => $stats['active_sports'],
                'new_this_month' => $stats['new_this_month'],
                'active_officers' => $stats['active_officers']
            ]
        ]);
    }
}
?>