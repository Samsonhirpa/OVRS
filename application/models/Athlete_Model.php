<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Athlete_Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    // Get all athletes
    public function get_all_athletes() {
        $query = $this->db->get('athletes');
        return $query->result_array();
    }
    // In Athlete_model.php
public function get_total_count() {
    return $this->db->count_all('athletes');
}

public function get_count_by_gender($gender) {
    return $this->db->where('sex', $gender)->count_all_results('athletes');
}

public function get_average_age() {
    $this->db->select_avg('age');
    $result = $this->db->get('athletes')->row_array();
    return round($result['age'], 1);
}

public function get_top_sport() {
    $this->db->select('sport, COUNT(*) as count');
    $this->db->group_by('sport');
    $this->db->order_by('count', 'DESC');
    $this->db->limit(1);
    $result = $this->db->get('athletes')->row_array();
    
    return [
        'name' => $result['sport'] ?? 'None',
        'count' => $result['count'] ?? 0
    ];
}

public function get_new_this_month() {
    $this->db->where('MONTH(created_at)', date('m'));
    $this->db->where('YEAR(created_at)', date('Y'));
    return $this->db->count_all_results('athletes');
}

public function get_distinct_sports_count() {
    $this->db->distinct();
    $this->db->select('sport');
    return $this->db->count_all_results('athletes');
}

public function get_last_registration_date() {
    $this->db->select('created_at');
    $this->db->order_by('created_at', 'DESC');
    $this->db->limit(1);
    $result = $this->db->get('athletes')->row_array();
    return $result ? date('d M Y', strtotime($result['created_at'])) : 'Never';
}

public function get_recent($limit = 5) {
    $this->db->order_by('created_at', 'DESC');
    $this->db->limit($limit);
    return $this->db->get('athletes')->result_array();
}




    // Get single athlete by ID
    public function get_athlete($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('athletes');
        return $query->row_array();
    }
    
    // Insert new athlete
    public function insert_athlete($data) {
        return $this->db->insert('athletes', $data);
    }
    
    // Update athlete
    public function update_athlete($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('athletes', $data);
    }
    
    // Delete athlete
    public function delete_athlete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('athletes');
    }
    
    // Count total athletes
    public function count_athletes() {
        return $this->db->count_all('athletes');
    }
    
    // Search athletes
    public function search_athletes($search_term) {
        $this->db->like('full_name', $search_term);
        $this->db->or_like('region', $search_term);
        $this->db->or_like('sport', $search_term);
        $query = $this->db->get('athletes');
        return $query->result_array();
    }
    
    // Get athletes by region
    public function get_by_region($region) {
        $this->db->where('region', $region);
        $query = $this->db->get('athletes');
        return $query->result_array();
    }
    
    // Get athletes by sport
    public function get_by_sport($sport) {
        $this->db->where('sport', $sport);
        $query = $this->db->get('athletes');
        return $query->result_array();
    }
    
    // Get latest athletes (for dashboard)
    public function get_latest_athletes($limit = 5) {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('athletes');
        return $query->result_array();
    }
}