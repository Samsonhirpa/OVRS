
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usercontroller extends CI_Controller {

      public function __construct() {
            parent::__construct();

            $lang = ($this->session->userdata('lang')) ? $this->session->userdata('lang') : config_item('language');
            $this->lang->load('menu', $lang);
            $this->load->model('usermodel', 'm');
            $this->load->model('bddddomodel', 'b');
            $this->load->library('pdf_report');
            // $this->lang->load('auth');
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

      public function saveusercom() {
            $result = $this->m->saveusercom();
            if ($result) {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            } else {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            }
            redirect('usercontroller/orocontact');
      }

      public function dashboard() {
            // if ($this->ion_auth->logged_in()){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('OVCS/manage_ovcs');
            $this->load->view('layout/footer');
      }

      //      	else
      // {
      // 	redirect('auth/login');
      // }
// 	else{
// 		redirect('auth/login');
// 	}
// }


      public function login() {
            $this->load->view('layout/header');
            // $this->load->view('layout/topindex');
            // $this->load->view('layout/login');
            $this->load->view('iplogin');
            //redirect('usercontroller/dashboard');
      }

      public function getworeda() {
            $result = $this->m->getworeda();
            if ($result) {
                  echo json_encode($result);
            } else {
                  return false;
            }
      }

      public function getzone() {
            $result = $this->m->getzone();
            if ($result) {
                  echo json_encode($result);
            } else {
                  return false;
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
                  $this->session->set_userdata('woreda', $row->woreda_id);
                  $this->session->set_userdata('zone', $row->zone_id);
                  $this->session->set_userdata('region', $row->region_id);
                  $this->session->set_userdata('email', $row->email);
                  $this->session->set_userdata('phone', $row->phoneno);
                  $this->session->set_userdata('full_name', $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name);
                  // $this->session->set_userdata('site_id',$row->site_id);

                  if ($this->session->userdata('role') == 1) {
                        redirect('BDDDDOcontroller/dashboard');
                  } elseif ($this->session->userdata('role') == 3) {
                        redirect('BDDDDOcontroller/dashboard');
                  } elseif ($this->session->userdata('role') == 2) {
                        redirect('BDDDDOcontroller/dashboard');
                  }
            } else {
                  redirect('usercontroller/login');
            }
      }

      public function admindashboard() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('maindashboard.php');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function empdashboard() {
            if ($this->session->userdata('username')) {

                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/empsidemenu');
                  $this->load->view('userdashboard.php');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function manage_employee() {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('employee/manage_employee');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function add_employee() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('employee/add_employee');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function adddrug() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('drug/drug');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function addschedule() {
            // 	if($this->session->userdata('username'))
            // {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('checkups/schedule');
            $this->load->view('layout/footer');
            // }
            // else
            // {
            // 	redirect('usercontroller');
            // }
      }

      public function managepatient() {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('employee/manage_employee');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function manage_schedule() {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('checkups/manage_schedule');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function add_zone() {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('sites/zone');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function add_woreda() {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('sites/woreda');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function add_user() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('user/add_user');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function saveUser() {
            if ($this->session->userdata('username')) {
                  $result = $this->m->saveUser();
                  if ($result) {
                        $this->session->set_flashdata('error_msg', 'Failled to  registered item try again');
                        redirect('usercontroller/manage_user');
                  } else {
                        $this->session->set_flashdata('success_msg', 'Successfully Registered item');
                        redirect('usercontroller/manage_user');
                  }
            } else {
                  redirect('usercontroller');
            }
      }

// public function updateuser($id)
// {if($this->sessi
// 	on->userdata('username'))
// 	{
// 	$result=$this->m->updateuser($id);
// 	if($result)
// 	{
// 		$this->session->set_flashdata('msg_error','success fully updated !!!');
// 	}
// 	else
// 	{
// 		$this->session->set_flashdata('msg_success','failed to update');
// 	}
// 	redirect('usercontroller/manage_user');
// 	}
// 	else
// 	{
// 		redirect('usercontroller');
// 	}
// 	}

      public function updateprofile($id) {
            if ($this->session->userdata('username')) {
                  $result = $this->m->updateprofile($id);
                  if ($result) {
                        $this->session->set_flashdata('msg_error', 'success fully updated !!!');
                  } else {
                        $this->session->set_flashdata('msg_success', 'failed to update');
                  }
                  redirect('usercontroller/admindashboard');
            } else {
                  redirect('usercontroller');
            }
      }

      public function updatepatient($id) {
            $result = $this->m->updatepatient($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('usercontroller/manage_employee');
      }

      public function updateschedule($id) {
            $result = $this->m->updateschedule($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('usercontroller/manage_schedule');
      }

      public function savepatient() {
            $result = $this->m->savepatient();
            if ($result) {
                  $this->session->set_flashdata('error_msg', 'Failed to Register Please try again');
            } else {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            }
            redirect('usercontroller/managepatient');
      }

      public function saveschedule() {
            $result = $this->m->saveschedule();
            if ($result) {
                  $this->session->set_flashdata('error_msg', 'Failed to Register Please try again');
            } else {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            }
            redirect('usercontroller/manage_schedule');
      }

      public function savezone() {
            $result = $this->m->savezone();
            if ($result) {

                  $this->session->set_flashdata('error_msg', 'Failled to  registered item try again');
                  redirect('usercontroller/managezone');
            } else {
                  $this->session->set_flashdata('success_msg', 'Successfully Registered item');
                  redirect('usercontroller/managezone');
            }
      }

      public function saveworeda() {
            $result = $this->m->saveworeda();
            if ($result) {

                  $this->session->set_flashdata('error_msg', 'Failled to  registered  try again');
                  redirect('usercontroller/manageworeda');
            } else {
                  $this->session->set_flashdata('success_msg', 'Successfully Registered');
                  redirect('usercontroller/manageworeda');
            }
      }

      public function showemployee($id) {
            if ($this->session->userdata('username')) {
                  $data['employee'] = $this->m->showemployee($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('employee/show_employee', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function managezone() {
            if ($this->session->userdata('username')) {
                  //$data['region']=$this->m->showregion($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('Medicine/manage_zone');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function manageworeda() {
            if ($this->session->userdata('username')) {
                  //$data['region']=$this->m->showregion($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('sites/manage_woreda');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function showzone($id) {
            if ($this->session->userdata('username')) {
                  $data['zone'] = $this->m->showzone($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('sites/show_zone', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function showworeda($id) {
            if ($this->session->userdata('username')) {
                  $data['woreda'] = $this->m->showworeda($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('sites/show_woreda', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function showuser($username) {
            if ($this->session->userdata('username')) {
                  $data['useraccount'] = $this->m->getuser($username);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('user/show_user', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function showusers($id) {
            if ($this->session->userdata('username')) {
                  $data['useraccount'] = $this->m->showusers($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('user/show_users', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function manage_user() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('user/manage_user');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function deleteuser($id) {
            $result = $this->m->deleteuser($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('usercontroller/manage_user');
      }

      public function deletepatient($id) {
            $result = $this->m->deletepatient($id);
            if ($result) {
                  $this->session->set_flashdata('error_msg', 'Failed To delete info ');
            } else {
                  $this->session->set_flashdata('success_msg', 'Successfully deleted');
            }
            redirect('usercontroller/manage_employee');
      }

      public function deletezone($id) {
            $result = $this->m->deletezone($id);
            if ($result) {
                  $this->session->set_flashdata('error_msg', 'Failed To delete info ');
            } else {
                  $this->session->set_flashdata('success_msg', 'Successfully deleted');
            }
            redirect('usercontroller/managezone');
      }

      public function deleteworeda($w_id) {
            $result = $this->m->deleteworeda($w_id);
            if ($result) {
                  $this->session->set_flashdata('error_msg', 'Failed To delete info ');
            } else {
                  $this->session->set_flashdata('success_msg', 'Successfully deleted');
            }
            redirect('usercontroller/manageworeda');
      }

      public function editpatient($id) {
            if ($this->session->userdata('username')) {
                  $data['patientinfo'] = $this->m->editpatient($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('employee/edit_employee', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function deleteregion($id) {
            $result = $this->m->deleteregion($id);
            if ($result) {
                  $this->session->set_flashdata('error_msg', 'Failed To delete info ');
            } else {
                  $this->session->set_flashdata('success_msg', 'Successfully deleted');
            }
            redirect('usercontroller/manageregion');
      }

      public function add_region() {
            if ($this->session->userdata('username')) {
                  //$data['short']=$this->m->getSetting();
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('Medicine/region');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function saveregion() {
            $result = $this->m->saveregion();
            if ($result) {
                  $this->session->set_flashdata('error_msg', 'Failled to  registered item try again');
                  redirect('usercontroller/manageregion');
            } else {


                  $this->session->set_flashdata('success_msg', 'Successfully Registered item');
                  redirect('usercontroller/manageregion');
            }
      }

      public function savedrug() {
            $result = $this->m->savedrug();
            if ($result) {
                  $this->session->set_flashdata('error_msg', 'Failled to  registered item try again');
                  redirect('usercontroller/adddrug');
            } else {


                  $this->session->set_flashdata('success_msg', 'Successfully Registered item');
                  redirect('usercontroller/adddrug');
            }
      }

      public function edit_schedule($id) {
            if ($this->session->userdata('username')) {
                  $data['schedule'] = $this->m->edit_schedule($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('checkups/edit_schedule', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('marketcontroller/');
            }
      }

      public function editdrug($id) {
            if ($this->session->userdata('username')) {
                  $data['drugstore'] = $this->m->editdrug($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('drug/editdrug', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function editregion($id) {
            if ($this->session->userdata('username')) {
                  $data['region'] = $this->m->editregion($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('Medicine/edit_region', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function updateregion($id) {
            $result = $this->m->updateregion($id);
            if ($result) {

                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            } else {

                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            }
            redirect('usercontroller/manageregion');
      }

      public function updatedrug($id) {
            $result = $this->m->updatedrug($id);
            if ($result) {

                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            } else {

                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            }
            redirect('usercontroller/adddrug');
      }

      public function manageregion() {
            if ($this->session->userdata('username')) {
                  //$data['region']=$this->m->showregion($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('Medicine/manage_region');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function showregion($id) {
            if ($this->session->userdata('username')) {
                  $data['region'] = $this->m->showregion($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('Medicine/show_region', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function editzone($id) {
            if ($this->session->userdata('username')) {
                  $data['drugstore'] = $this->m->editzone($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('drug/editdrug', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function editworeda($w_id) {
            if ($this->session->userdata('username')) {
                  $data['woreda'] = $this->m->editworeda($w_id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('sites/edit_woreda', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function updatezone($id) {
            $result = $this->m->updatezone($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('usercontroller/adddrug');
      }

      public function updateworeda($id) {
            $result = $this->m->updateworeda($id);
            if ($result) {
                  $this->session->set_flashdata('msg_success', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('msg_error', 'Failed to  Delete try agian !!!');
            }
            redirect('usercontroller/manageworeda');
      }

      public function editUser($id) {
            if ($this->session->userdata('username')) {
                  $data['useraccount'] = $this->m->edituser($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('user/edit_user', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function editprofile($id) {
            if ($this->session->userdata('username')) {
                  $data['useraccount'] = $this->m->editprofile($id);
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('user/editprofile', $data);
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function report() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  // $data['id'] = $this->m->itme_report();
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('report/item_report');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller/');
            }
      }

      public function logout() {

            $this->session->unset_userdata('username');
            redirect('usercontroller/login');
      }

      public function employee_report() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  // $this->load->view('layout/topmenu');
                  // $this->load->view('layout/empsidemenu');
                  $this->load->view('report/employee_report');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

      public function user_report() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  // $this->load->view('layout/topmenu');
                  // $this->load->view('layout/empsidemenu');
                  $this->load->view('report/user_report');
                  $this->load->view('layout/footer');
            } else {
                  redirect('usercontroller');
            }
      }

}
