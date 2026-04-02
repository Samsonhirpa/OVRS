<?php

defined('BASEPATH') or exit('no direct access is allowed');

class BDDDDOcontroller extends CI_Controller {

      function __construct() {
            parent::__construct();
            $this->load->model('bddddomodel', 'b');
            $this->load->model('Structure_model', 'str');
            $this->load->library('Pdf_report');
            // $this->load->library(['ion_auth', 'form_validation']);
            //       $this->lang->load('auth');
      }

      public function custom_view() {
            $this->load->view('custom_view', array('error' => ' '));
      }

      public function do_upload() {
            $config = array(
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "768",
                'max_width' => "1024"
            );
            $this->load->library('upload', $config);
            if ($this->upload->do_upload()) {
                  $data = array('upload_data' => $this->upload->data());
                  $this->load->view('upload_success', $data);
            } else {
                  $error = array('error' => $this->upload->display_errors());
                  $this->load->view('custom_view', $error);
            }
      }

      public function checkuser() {


            $user = $this->input->post('username');
            $pass = $this->input->post('password');

            $ceklogin = $this->m->login($user, $pass);

            if ($ceklogin) {
                  foreach ($ceklogin as $row)
                        ;
                  $this->session->set_userdata('username', $row->username);
                  $this->session->set_userdata('level_id', $row->level);
                  $this->session->set_userdata('role', $row->role_id);
                  $this->session->set_userdata('full_name', $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name);
                  $this->session->set_userdata('zone', $row->zone_id);
                  $this->session->set_userdata('woreda', $row->woreda_id);
                  // $this->session->set_userdata('site_id',$row->site_id);
echo $this->session->userdata('role');
                  if ($this->session->userdata('role') == 1) {
                        redirect('BDDDDOcontroller/dashboard');
                  } elseif ($this->session->userdata('role') == 3) {
                        redirect('BDDDDOcontroller/dashboard');
                  } elseif ($this->session->userdata('role') == 2) {
                        redirect('BDDDDOcontroller/dashboard');
                  }
            } else {
                  redirect('BDDDDOcontroller/login');
            }
      }

      public function saveusercom() {
            $result = $this->m->saveusercom();
            if ($result) {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            } else {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            }
            redirect('BDDDDOcontroller/orocontact');
      }

      public function login() {
            $this->load->view('layout/header');
            // $this->load->view('layout/topindex');
            // $this->load->view('layout/login');
            $this->load->view('iplogin');
            //redirect('usercontroller/dashboard');
      }

      public function logout() {

            $this->session->unset_userdata('username');
            redirect('BDDDDOcontroller/login');
      }

      public function dashboard() {
            
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('dashboard.php');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function add_employee() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('add_employee/add_employee');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function saveemployee() {
            $result = $this->b->saveemployee();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('Structure/User_list');
      }

      public function add_population()
      {
            if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('population/add_population');
            $this->load->view('layout/footer');
            }
            else
      {
            redirect('BDDDDOcontroller');
      }
      }

      public function savepopulation()
      {
            $result = $this->b->savepopulation();
            if($result)
            {
                  $this->session->set_flashdata('success_msg','Successfully Registerd');
            }
            else
            {
                  $this->session->set_flashdata('error_msg','Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_population');

      }

      public function manage_population()
      {
            if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('population/manage_population');
            $this->load->view('layout/footer');
            }
            else
      {
            redirect('BDDDDOcontroller');
      }
      }

      public function edit_population($id)
      {
            if($this->session->userdata('username')){
            //$data['short']=$this->m->getSetting();
            $data['population']=$this->b->edit_population($id);
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('population/edit_population',$data);
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('BDDDDOcontroller');
      }
}
      public function updatepopulation($id)
      {
            $result=$this->b->updatepopulation($id);

            if($result)
            {
                  $this->session->set_flashdata('success_msg','Successfully Updated');
            }
            else
            {
                  $this->session->set_flashdata('erroe_msg','Failed To Update Please Try again later');
            }
            redirect('BDDDDOcontroller/manage_population');
      
      }
   
   public function delete_population($id)
{
      $result = $this->b->delete_population($id);
      if($result)
      {
            $this->session->set_flashdata('msg_success','Successfully Deleted');
      }
      else
      {
            $this->session->set_flashdata('msg_error','Failed to  Delete try agian !!!');

      }
      redirect('BDDDDOcontroller/manage_population');
}


public function add_training()
      {
            if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('training/add_training');
            $this->load->view('layout/footer');
            }
            else
      {
            redirect('BDDDDOcontroller');
      }
      }

      public function manage_training()
      {
            if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('population/manage_population');
            $this->load->view('layout/footer');
            }
            else
      {
            redirect('BDDDDOcontroller');
      }
      }

      public function savetrained()
      {
            $result = $this->b->savetrained();
            if($result)
            {
                  $this->session->set_flashdata('success_msg','Successfully Registerd');
            }
            else
            {
                  $this->session->set_flashdata('error_msg','Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_population');

      }
   
      public function add_nochildren() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('population/add_nochildren');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function savenochildren() {
            $result = $this->b->savenochildren();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_nochildren');
      }

      public function manage_nochildren() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('population/manage_nochildren');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function edit_nochildren($id) {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $data['totchildren'] = $this->b->edit_nochildren($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('population/edit_nochildren', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function updatenochildren($id) {
            $result = $this->b->updatenochildren($id);

            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('erroe_msg', 'Failed To Update Please Try again later');
            }
            redirect('BDDDDOcontroller/manage_nochildren');
      }

      public function delete_nochildren($id) {
            $result = $this->b->delete_nochildren($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('BDDDDOcontroller/manage_nochildren');
      }

      public function getkebele() {
            $result = $this->b->getkebele();
            if ($result) {
                  echo json_encode($result);
            } else {
                  return false;
            }
      }

      public function gettown() {
            $result = $this->b->gettown();
            if ($result) {
                  echo json_encode($result);
            } else {
                  return false;
            }
      }
      
      public function getWoreda() {
            $result = $this->b->getWoreda();
            if ($result) {
                  echo json_encode($result);
            } else {
                  return false;
            }
      }

      public function getWoreda1() {
            $result = $this->b->getWoreda1();
            if ($result) {
                  echo json_encode($result);
            } else {
                  return false;
            }
      }
      public function getWoreda2() {
            $result = $this->b->getWoreda2();
            if ($result) {
                  echo json_encode($result);
            } else {
                  return false;
            }
      }

      public function manageOVCS() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('OVCS/manage_ovcs');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function addOVCS() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('OVCS/add_ovcs');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function saveOVCS() {
            $result = $this->b->saveOVCS();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manageOVCS');
      }

      public function deleteovcs($id) {
            $result = $this->b->deleteovcs($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('BDDDDOcontroller/manageOVCS');
      }

      public function add_abusecase() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('abuse_case/add_abusecase');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function saveabuse_case() {
            $result = $this->b->saveabuse_case();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_abusecase');
      }

      public function manage_abusecase() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('abuse_case/manage_abusecase');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function edit_abusecase($id) {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $data['abuse_case'] = $this->b->edit_abusecase($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('abuse_case/edit_abusecase', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function updateabusecase($id) {
            $result = $this->b->updateabusecase($id);

            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('erroe_msg', 'Failed To Update Please Try again later');
            }
            redirect('BDDDDOcontroller/manage_abusecase');
      }

      public function manage_female() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('abuse_case/mange_female');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function manage_abusecase1() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('abuse_case/manage_abusecase1');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function manage_abusecase2() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('abuse_case/manage_abusecase2');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function manage_abusecase3() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('abuse_case/manage_abusecase3');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function manage_abusecase4() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('abuse_case/manage_abusecase4');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function allabusecase() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('layout/abusesearch');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function delete_abusecase($id) {
            $result = $this->b->delete_abusecase($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('BDDDDOcontroller/manage_abusecase');
      }

      public function add_disbledchildren() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('disabled_children/add_disabledchildren');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function saveadisabledchildren() {
            $result = $this->b->saveadisabledchildren();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_disbledchilder');
      }

      public function manage_disbledchilder() {
            if ($this->session->userdata('username')) {
                  // $data['sum'] = $this->b->getdisabledchildern();
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('disabled_children/manage_disabledchildren');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function manage_disbledchilder2() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $data['sum'] = $this->b->getsum();
                  $this->load->view('disabled_children/manage_disabledchildren2');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function edit_disabledchild($id) {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $data['disnled_children'] = $this->b->edit_disabledchild($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('disabled_children/edit_disabledchild', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function updatedisabledchild($id) {
            $result = $this->b->updatedisabledchild($id);

            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('erroe_msg', 'Failed To Update Please Try again later');
            }
            redirect('BDDDDOcontroller/manage_disbledchilder');
      }

      public function delete_disbledchilder($id) {
            $result = $this->b->delete_disbledchilder($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('BDDDDOcontroller/manage_disbledchilder');
      }

      public function add_childfriendly() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('child_friendly/add_childfriendly');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function savechildfriemdly() {
            $result = $this->b->savechildfriemdly();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_childfriendly');
      }

      public function manage_childfriendly() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('child_friendly/manage_childfriendly');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function edit_childfriendly($id) {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $data['child_friendly'] = $this->b->edit_childfriendly($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('child_friendly/edit_childfriendly', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function updatechildfriendly($id) {
            $result = $this->b->updatechildfriendly($id);

            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('erroe_msg', 'Failed To Update Please Try again later');
            }
            redirect('BDDDDOcontroller/manage_childfriendly');
      }

      public function delete_childfriendly($id) {
            $result = $this->b->delete_childfriendly($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('BDDDDOcontroller/manage_childfriendly');
      }

      public function add_event() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('event/add_event');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function saveevent() {
            $result = $this->b->saveevent();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_event');
      }

      public function manage_event() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('event/manage_event');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function delete_event($id) {
            $result = $this->b->delete_event($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('BDDDDOcontroller/manage_event');
      }

      public function add_childcare() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('child_care/add_childcare');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function savechildcare() {
            $result = $this->b->savechildcare();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_childcare');
      }

      public function manage_childcare() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('child_care/manage_childcare');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function edit_childcare($id) {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $data['child_care'] = $this->b->edit_childcare($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('child_care/edit_childcare', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function updatechildcare($id) {
            $result = $this->b->updatechildcare($id);

            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('erroe_msg', 'Failed To Update Please Try again later');
            }
            redirect('BDDDDOcontroller/manage_childcare');
      }

      public function delete_childcare($id) {
            $result = $this->b->delete_childcare($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('BDDDDOcontroller/manage_childcare');
      }

      public function add_ccc_services() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('ccc/add_ccc_services');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function savecccservices() {
            $result = $this->b->savecccservices();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_ccc_services');
      }

      public function manage_ccc_services() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('ccc/manage_ccc_services');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function edit_cccservices($id) {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $data['ccc_services'] = $this->b->edit_cccservices($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('ccc/edit_cccservices', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function updatecccservices($id) {
            $result = $this->b->updatecccservices($id);

            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('erroe_msg', 'Failed To Update Please Try again later');
            }
            redirect('BDDDDOcontroller/manage_ccc_services');
      }

      public function delete_cccservices($id) {
            $result = $this->b->delete_cccservices($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('BDDDDOcontroller/manage_ccc_services');
      }

      public function add_post_placement() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('post_placement/add_post_placement');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function savepost_placement() {
            $result = $this->b->savepost_placement();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_post_placement');
      }

      public function manage_post_placement() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('post_placement/manage_post_placement');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function edit_post_placement($id) {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $data['post_placement'] = $this->b->edit_post_placement($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('post_placement/edit_post_placement', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function updatepost_placement($id) {
            $result = $this->b->updatepost_placement($id);

            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('erroe_msg', 'Failed To Update Please Try again later');
            }
            redirect('BDDDDOcontroller/manage_post_placement');
      }

      public function delete_post_placement($id) {
            $result = $this->b->delete_post_placement($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('BDDDDOcontroller/manage_post_placement');
      }

      public function add_careandsupport() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('css/add_css');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function savecss() {
            $result = $this->b->savecss();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_careandsupport');
      }

      public function manage_careandsupport() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('css/manage_css');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function edit_careandsupport($id) {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $data['careandsupport'] = $this->b->edit_careandsupport($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('css/edit_css', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function updatecareandsupport($id) {
            $result = $this->b->updatecareandsupport($id);

            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('erroe_msg', 'Failed To Update Please Try again later');
            }
            redirect('BDDDDOcontroller/manage_careandsupport');
      }

      public function delete_careandsupport($id) {
            $result = $this->b->delete_careandsupport($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('BDDDDOcontroller/manage_careandsupport');
      }

      public function add_IGA() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('IGA/add_IGA');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function saveiga() {
            $result = $this->b->saveiga();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_IGA');
      }

      public function manage_IGA() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('IGA/manage_IGA');
                  $this->load->view('layout/footer');
            } else {
                  redirect('BDDDDOcontroller');
            }
      }

      public function delete_IGA($id) {
            $result = $this->b->delete_IGA($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('BDDDDOcontroller/manage_IGA');
      }

//       public function getbooks()
//     {
//     	$result=$this->m->getbooks();
//     	if($result){
//     	    	echo json_encode($result);
// }
// else
// {
// 	echo "falled";
// }
//     }

      public function uploadresearch() {
            //if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('research/uploadresearch');
            $this->load->view('layout/footer');
      }

      public function upload_file() {
            // 	 $data = $this->employee_model->array_from_post(array(

            $config = array(
                'upload_path' => 'uploads/',
                'allowed_types' => "doc|docx|pdf|png|jpg",
                'max_size' => 0,
                'file_name' => url_title($this->input->post('userfile'))
            );
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('userfile')) {
                  $this->db->insert('research', array('file_name' => $this->upload->file_name,
                      'description' => $this->input->post('description'),
                          //'created_by'=>$this->session->userdata('username'),
                  ));
                  $this->session->set_flashdata('msg', "success");
            }
            redirect('BDDDDOcontroller/manage_IGA');
      }

      public function download($id) {
            if (!empty($id)) {
                  //load download helper
                  $this->load->helper('download');

                  //get file info from database
                  $fileInfo = $this->m->getRows(array('id' => $id));

                  //file path
                  $file = 'uploads/' . $fileInfo['file_name'];

                  //download file from directory
                  force_download($file, NULL);
            }
      }

      public function add_NGO()
      {
            if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('NGO/add_NGO');
            $this->load->view('layout/footer');
            }
            else
      {
            redirect('BDDDDOcontroller');
      }
      }

      public function savengo()
      {
            $result = $this->b->savengo();
            if($result)
            {
                  $this->session->set_flashdata('success_msg','Successfully Registerd');
            }
            else
            {
                  $this->session->set_flashdata('error_msg','Failed to Registerd Please try again');
            }
            redirect('BDDDDOcontroller/manage_population');

      }

      public function manage_NGO()
      {
            if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('NGO/manage_NGO');
            $this->load->view('layout/footer');
            }
            else
      {
            redirect('BDDDDOcontroller');
      }
      }

}
