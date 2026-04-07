<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ElectorRegistration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ElectorRegistration_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');

        if (!$this->session->userdata('username')) {
            redirect('Structure/login');
        }
    }

    private function roleText($role) {
        if ($role == 1) return 'Admin';
        if ($role == 2) return 'PBO';
        if ($role == 3) return 'Naannoo Filannoo';
        return 'Fayyadamaa';
    }

    private function baseData($title, $activeMenu) {
        return array(
            'pageTitle' => $title,
            'name' => $this->session->userdata('full_name'),
            'role' => $this->session->userdata('role'),
            'role_text' => $this->roleText($this->session->userdata('role')),
            'profile_image' => $this->session->userdata('profile_image'),
            'last_login' => $this->session->userdata('last_login'),
            'activeMenu' => $activeMenu
        );
    }

    public function register() {
        $naannoofil = $this->session->userdata('naannoofil');
        if (!$naannoofil) {
            $this->session->set_flashdata('error', 'Naannoo filannoo kee hin argamne.');
            redirect('dashboard');
        }

        $data = $this->baseData('Galmee Lakkoofsa Filattootaa', 'electorRegister');
        $data['naannoofil'] = $naannoofil;
        $data['today'] = date('Y-m-d');

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topmenu', $data);
        $this->load->view('layout/sidemenu', $data);
        $this->load->view('elector/register', $data);
        $this->load->view('layout/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('male_electors', 'Dhiira', 'required|integer|greater_than_equal_to[0]');
        $this->form_validation->set_rules('female_electors', 'Dubartii', 'required|integer|greater_than_equal_to[0]');
        $this->form_validation->set_rules('security_status', 'Situation', 'required|in_list[green,yellow,red]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('ElectorRegistration/register');
        }

        $male = (int)$this->input->post('male_electors');
        $female = (int)$this->input->post('female_electors');

        $data = array(
            'naannoofil_id' => $this->session->userdata('naannoofil'),
            'report_date' => $this->input->post('report_date') ?: date('Y-m-d'),
            'male_electors' => $male,
            'female_electors' => $female,
            'total_electors' => $male + $female,
            'security_status' => $this->input->post('security_status', TRUE),
            'remarks' => $this->input->post('remarks', TRUE),
            'reporter_id' => $this->session->userdata('id'),
            'reporter_name' => $this->session->userdata('full_name'),
            'created_by' => $this->session->userdata('id'),
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1
        );

        $saved = $this->ElectorRegistration_model->saveRegistration($data);

        if ($saved) {
            $this->session->set_flashdata('success', 'Lakkoofsi filattootaa milkaa\'inaan galmaa\'eera.');
        } else {
            $this->session->set_flashdata('error', 'Galmeen hin milkoofne.');
        }

        redirect('ElectorRegistration/listRecords');
    }

    public function listRecords() {
        $naannoofil = $this->session->userdata('naannoofil');
        $start = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
        $end = $this->input->get('end_date') ?: date('Y-m-d');

        $data = $this->baseData('Tarree Lakkoofsa Filattootaa', 'electorList');
        $data['start_date'] = $start;
        $data['end_date'] = $end;
        $data['reports'] = $this->ElectorRegistration_model->getByRegion($naannoofil, $start, $end);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topmenu', $data);
        $this->load->view('layout/sidemenu', $data);
        $this->load->view('elector/list', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit($id) {
        $record = $this->ElectorRegistration_model->getById($id);
        if (!$record || $record->naannoofil_id !== $this->session->userdata('naannoofil')) {
            $this->session->set_flashdata('error', 'Galmeen hin argamne.');
            redirect('ElectorRegistration/listRecords');
        }

        $data = $this->baseData('Fooyyessi Lakkoofsa Filattootaa', 'electorList');
        $data['record'] = $record;

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topmenu', $data);
        $this->load->view('layout/sidemenu', $data);
        $this->load->view('elector/edit', $data);
        $this->load->view('layout/footer', $data);
    }

    public function update($id) {
        $record = $this->ElectorRegistration_model->getById($id);
        if (!$record || $record->naannoofil_id !== $this->session->userdata('naannoofil')) {
            $this->session->set_flashdata('error', 'Galmeen hin argamne.');
            redirect('ElectorRegistration/listRecords');
        }

        $male = (int)$this->input->post('male_electors');
        $female = (int)$this->input->post('female_electors');

        $data = array(
            'male_electors' => $male,
            'female_electors' => $female,
            'total_electors' => $male + $female,
            'security_status' => $this->input->post('security_status', TRUE),
            'remarks' => $this->input->post('remarks', TRUE),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('id')
        );

        $updated = $this->ElectorRegistration_model->updateRegistration($id, $data);
        $this->session->set_flashdata($updated ? 'success' : 'error', $updated ? 'Fooyya\'eera.' : 'Fooyyessuun hin milkoofne.');

        redirect('ElectorRegistration/listRecords');
    }

    public function delete($id) {
        $record = $this->ElectorRegistration_model->getById($id);
        if (!$record || $record->naannoofil_id !== $this->session->userdata('naannoofil')) {
            $this->session->set_flashdata('error', 'Galmeen hin argamne.');
            redirect('ElectorRegistration/listRecords');
        }

        $deleted = $this->ElectorRegistration_model->deleteRegistration($id, $this->session->userdata('id'));
        $this->session->set_flashdata($deleted ? 'success' : 'error', $deleted ? 'Galmeen haqameera.' : 'Haqamuun hin milkoofne.');
        redirect('ElectorRegistration/listRecords');
    }

    public function dashboard() {
        $naannoofil = $this->session->userdata('naannoofil');
        $month = date('Y-m');

        $data = $this->baseData('Daashboordii Lakkoofsa Filattootaa', 'electorDashboard');
        $data['summary'] = $this->ElectorRegistration_model->getDashboardSummary($naannoofil, $month);
        $data['recent_reports'] = $this->ElectorRegistration_model->getRecentByRegion($naannoofil, 10);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topmenu', $data);
        $this->load->view('layout/sidemenu', $data);
        $this->load->view('elector/dashboard', $data);
        $this->load->view('layout/footer', $data);
    }

    public function adminReport() {
        if ($this->session->userdata('role') != 1) {
            redirect('dashboard');
        }

        $start = $this->input->get('start_date') ?: date('Y-m-d', strtotime('-30 days'));
        $end = $this->input->get('end_date') ?: date('Y-m-d');
        $region = $this->input->get('region') ?: 'all';
        $security = $this->input->get('security') ?: 'all';

        $reports = $this->ElectorRegistration_model->getAdminList($start, $end, $region, $security);

        $summary = (object) array(
            'total_reports' => count($reports),
            'male_total' => 0,
            'female_total' => 0,
            'grand_total' => 0,
            'green_count' => 0,
            'yellow_count' => 0,
            'red_count' => 0
        );

        foreach ($reports as $row) {
            $summary->male_total += (int)$row->male_electors;
            $summary->female_total += (int)$row->female_electors;
            $summary->grand_total += (int)$row->total_electors;
            if ($row->security_status === 'green') $summary->green_count++;
            if ($row->security_status === 'yellow') $summary->yellow_count++;
            if ($row->security_status === 'red') $summary->red_count++;
        }

        $data = $this->baseData('Admin - Gabaasa Haala Naannoo fi Filattoota', 'electorAdminReport');
        $data['reports'] = $reports;
        $data['summary'] = $summary;
        $data['regions'] = $this->ElectorRegistration_model->getAllRegions();
        $data['start_date'] = $start;
        $data['end_date'] = $end;
        $data['selected_region'] = $region;
        $data['selected_security'] = $security;

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topmenu', $data);
        $this->load->view('layout/sidemenu', $data);
        $this->load->view('elector/admin_report', $data);
        $this->load->view('layout/footer', $data);
    }
}
?>
