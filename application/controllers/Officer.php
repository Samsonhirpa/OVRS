<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Officer extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $lang = ($this->session->userdata('lang')) ? $this->session->userdata('lang') : config_item('language');
        $this->lang->load('menu', $lang);
        $this->load->model('usermodel', 'm');
        $this->load->model('bddddomodel', 'b');
        $this->load->model('Structure_model', 'str');
        $this->load->model('Officer_Model', 'officer');
        
        // Load libraries
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index() {
        $data['title'] = 'Officer Management';
        
        // Get all officers
        $data['officers'] = $this->officer->get_all_officers();
        
        // Load views
        if($this->session->userdata('username')){
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('officer/index', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('login');
        }
    }
    
    public function create() {
        $data['title'] = 'Register New Officer';
        
        // Set validation rules
        $this->set_validation_rules();
        
        if ($this->form_validation->run() === FALSE) {
            // Load create form
            if($this->session->userdata('username')){
                $this->load->view('layout/header', $data);
                $this->load->view('layout/topmenu');
                $this->load->view('layout/sidemenu');
                $this->load->view('officer/create', $data);
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
        $this->form_validation->set_rules('position', 'Position', 'required|trim|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('teessoo', 'Location Type', 'required|in_list[Magaaalaa,Godina]');
        
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
            $config['upload_path'] = './uploads/officers/';
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
        $position = $this->security->xss_clean($this->input->post('position'));
        
        // Prepare officer data
        $officer_data = [
            'full_name' => $full_name,
            'sex' => $this->input->post('sex'),
            'position' => $position,
            'teessoo' => $teessoo, // Save location type
            'region' => $region,
            'photo' => $photo_name,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('user_id') ?? 0 // Default to 0 if not set
        ];
        
        // Insert into database
        if ($this->officer->insert_officer($officer_data)) {
            $this->session->set_flashdata('success', 'Officer registered successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to register officer. Please try again.');
        }
        
        redirect('officer');
    }
    
    public function edit($id) {
        // Validate ID
        if (!is_numeric($id) || $id <= 0) {
            show_404();
        }
        
        $data['title'] = 'Edit Officer';
        $data['officer'] = $this->officer->get_officer($id);
        
        if (empty($data['officer'])) {
            show_404();
        }
        
        if($this->session->userdata('username')){
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('officer/edit', $data);
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
        
        // Check if officer exists
        $officer = $this->officer->get_officer($id);
        if (empty($officer)) {
            show_404();
        }
        
        // Set validation rules
        $this->set_validation_rules();
        
        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
        } else {
            $this->process_update($id, $officer);
        }
    }
    
    private function process_update($id, $old_officer) {
        // Prepare uploads directory
        $this->prepare_uploads_directory();
        
        $photo_name = $old_officer['photo'];
        
        // Handle new file upload
        if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != '') {
            $config['upload_path'] = './uploads/officers/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;
            
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload('photo')) {
                // Delete old photo if exists
                if (!empty($old_officer['photo']) && file_exists('./uploads/officers/' . $old_officer['photo'])) {
                    unlink('./uploads/officers/' . $old_officer['photo']);
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
        $position = $this->security->xss_clean($this->input->post('position'));
        
        // Prepare update data
        $officer_data = [
            'full_name' => $full_name,
            'sex' => $this->input->post('sex'),
            'position' => $position,
            'teessoo' => $teessoo,
            'region' => $region,
            'photo' => $photo_name,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id') ?? 0
        ];
        
        // Update database
        if ($this->officer->update_officer($id, $officer_data)) {
            $this->session->set_flashdata('success', 'Officer updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to update officer. Please try again.');
        }
        
        redirect('officer');
    }
    
    public function delete($id) {
        // Validate ID
        if (!is_numeric($id) || $id <= 0) {
            show_404();
        }
        
        $officer = $this->officer->get_officer($id);
        
        if (empty($officer)) {
            show_404();
        }
        
        // Delete photo file
        if (!empty($officer['photo']) && file_exists('./uploads/officers/' . $officer['photo'])) {
            unlink('./uploads/officers/' . $officer['photo']);
        }
        
        // Delete from database
        if ($this->officer->delete_officer($id)) {
            $this->session->set_flashdata('success', 'Officer deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete officer. Please try again.');
        }
        
        redirect('officer');
    }
    
    private function prepare_uploads_directory() {
        $upload_path = './uploads/officers/';
        
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