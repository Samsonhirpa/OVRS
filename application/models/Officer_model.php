<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Officer_Model extends CI_Model {
    
    private $table = 'officers';
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get all officers
     */
    public function get_all_officers() {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    
    /**
     * Get single officer by ID
     */
    public function get_officer($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }
    
    /**
     * Insert new officer
     */
    public function insert_officer($data) {
        return $this->db->insert($this->table, $data);
    }
    
    /**
     * Update officer
     */
    public function update_officer($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    
    /**
     * Delete officer
     */
    public function delete_officer($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
    
    /**
     * Count total officers
     */
    public function count_officers() {
        return $this->db->count_all_results($this->table);
    }
    
    /**
     * Search officers
     */
    public function search_officers($keyword) {
        $this->db->like('full_name', $keyword);
        $this->db->or_like('position', $keyword);
        $this->db->or_like('region', $keyword);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
}
?>