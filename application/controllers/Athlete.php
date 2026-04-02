<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Athlete extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $lang = ($this->session->userdata('lang')) ? $this->session->userdata('lang') : config_item('language');
        $this->lang->load('menu', $lang);
        $this->load->model('usermodel', 'm');
        $this->load->model('bddddomodel', 'b');
        $this->load->model('Structure_model', 'str');
        $this->load->model('Athlete_Model', 'athlete');
        $this->load->model('Sportmodel', 'k');
        
        // Load libraries
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index() {
        $data['title'] = 'Athlete Management';
        
        // Get all athletes
        $data['athletes'] = $this->athlete->get_all_athletes();
        
        // Load views
        if($this->session->userdata('username')){
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('athlete/index', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('login');
        }
    }
    
    public function create() {
        $data['title'] = 'Register New Athlete';
        
        // Set validation rules
        $this->set_validation_rules();
        
        if ($this->form_validation->run() === FALSE) {
            // Load create form
            if($this->session->userdata('username')){
                $this->load->view('layout/header', $data);
                $this->load->view('layout/topmenu');
                $this->load->view('layout/sidemenu');
                $this->load->view('athlete/create', $data);
                $this->load->view('layout/footer');
            } else {
                redirect('login');
            }
        } else {
            // Process form submission
            $this->process_create();
        }
    }
    
    private function set_validation_rules() {
        // Remove xss_clean - it's not a valid validation rule in CI3
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|trim|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('sex', 'Sex', 'required|in_list[Male,Female,Other]');
        $this->form_validation->set_rules('age', 'Age', 'required|numeric|greater_than[12]|less_than[60]');
        $this->form_validation->set_rules('teessoo', 'Location Type', 'required|in_list[Magaaalaa,Godina]');
        $this->form_validation->set_rules('sport', 'Sport', 'required|trim|min_length[2]|max_length[50]');
        
        // Photo validation (optional)
        $this->form_validation->set_rules('photo', 'Photo', 'callback_validate_photo');
        
        // Dynamic validation for region based on location type
        $teessoo = $this->input->post('teessoo');
        if ($teessoo == 'Godina') {
            $this->form_validation->set_rules('zone_id', 'Zone', 'required');
        } elseif ($teessoo == 'Magaaalaa') {
            $this->form_validation->set_rules('city_id', 'City', 'required');
        }
    }
    
    public function validate_photo() {
        if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != '') {
            $config['upload_path'] = './uploads/athletes/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;
            
            $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('photo')) {
                $this->form_validation->set_message('validate_photo', $this->upload->display_errors());
                return FALSE;
            }
        }
        return TRUE;
    }
    
    private function process_create() {
        // Prepare uploads directory
        $this->prepare_uploads_directory();
        
        $photo_name = '';
        
        // Handle file upload
        if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != '') {
            if ($this->upload->do_upload('photo')) {
                $upload_data = $this->upload->data();
                $photo_name = $upload_data['file_name'];
            }
        }
        
        // Get region based on location type
        $region = '';
        $teessoo = $this->input->post('teessoo');
        
        if ($teessoo == 'Godina') {
            $region = $this->input->post('zone_id');
        } elseif ($teessoo == 'Magaaalaa') {
            $region = $this->input->post('city_id');
        }
        
        // XSS cleaning manually (since xss_clean is deprecated)
        $full_name = $this->security->xss_clean($this->input->post('full_name'));
        $sport = $this->security->xss_clean($this->input->post('sport'));
        
        // Prepare athlete data
        $athlete_data = [
            'full_name' => $full_name,
            'sex' => $this->input->post('sex'),
            'age' => $this->input->post('age'),
            'teessoo' => $teessoo, // Save location type
            'region' => $region,
            'sport' => $sport,
            'photo' => $photo_name,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('user_id') ?? 0 // Default to 0 if not set
        ];
        
        // Insert into database
        if ($this->athlete->insert_athlete($athlete_data)) {
            $this->session->set_flashdata('success', 'Athlete registered successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to register athlete. Please try again.');
        }
        
        redirect('athlete');
    }
    
    public function edit($id) {
        // Validate ID
        if (!is_numeric($id) || $id <= 0) {
            show_404();
        }
        
        $data['title'] = 'Edit Athlete';
        $data['athlete'] = $this->athlete->get_athlete($id);
        
        if (empty($data['athlete'])) {
            show_404();
        }
        
        if($this->session->userdata('username')){
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('athlete/edit', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('login');
        }
    }
    
    public function update($id) {
        // Validate ID
        if (!is_numeric($id) || $id <= 0) {
            show_404();
        }
        
        // Check if athlete exists
        $athlete = $this->athlete->get_athlete($id);
        if (empty($athlete)) {
            show_404();
        }
        
        // Set validation rules
        $this->set_validation_rules();
        
        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
        } else {
            $this->process_update($id, $athlete);
        }
    }
    
    private function process_update($id, $old_athlete) {
        // Prepare uploads directory
        $this->prepare_uploads_directory();
        
        $photo_name = $old_athlete['photo'];
        
        // Handle new file upload
        if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != '') {
            $config['upload_path'] = './uploads/athletes/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;
            
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload('photo')) {
                // Delete old photo if exists
                if (!empty($old_athlete['photo']) && file_exists('./uploads/athletes/' . $old_athlete['photo'])) {
                    unlink('./uploads/athletes/' . $old_athlete['photo']);
                }
                
                $upload_data = $this->upload->data();
                $photo_name = $upload_data['file_name'];
            }
        }
        
        // Get region based on location type
        $region = '';
        $teessoo = $this->input->post('teessoo');
        
        if ($teessoo == 'Godina') {
            $region = $this->input->post('zone_id');
        } elseif ($teessoo == 'Magaaalaa') {
            $region = $this->input->post('city_id');
        }
        
        // XSS cleaning manually
        $full_name = $this->security->xss_clean($this->input->post('full_name'));
        $sport = $this->security->xss_clean($this->input->post('sport'));
        
        // Prepare update data
        $athlete_data = [
            'full_name' => $full_name,
            'sex' => $this->input->post('sex'),
            'age' => $this->input->post('age'),
            'teessoo' => $teessoo,
            'region' => $region,
            'sport' => $sport,
            'photo' => $photo_name,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id') ?? 0
        ];
        
        // Update database
        if ($this->athlete->update_athlete($id, $athlete_data)) {
            $this->session->set_flashdata('success', 'Athlete updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to update athlete. Please try again.');
        }
        
        redirect('athlete');
    }
    
    public function delete($id) {
        // Validate ID
        if (!is_numeric($id) || $id <= 0) {
            show_404();
        }
        
        $athlete = $this->athlete->get_athlete($id);
        
        if (empty($athlete)) {
            show_404();
        }
        
        // Delete photo file
        if (!empty($athlete['photo']) && file_exists('./uploads/athletes/' . $athlete['photo'])) {
            unlink('./uploads/athletes/' . $athlete['photo']);
        }
        
        // Delete from database
        if ($this->athlete->delete_athlete($id)) {
            $this->session->set_flashdata('success', 'Athlete deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete athlete. Please try again.');
        }
        
        redirect('athlete');
    }
    
    private function prepare_uploads_directory() {
        $upload_path = './uploads/athletes/';
        
        // Create directory if it doesn't exist
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE);
        }
        
        // Create index.html to prevent directory listing
        $index_file = $upload_path . 'index.html';
        if (!file_exists($index_file)) {
            file_put_contents($index_file, '<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>');
        }
    }
}
?>