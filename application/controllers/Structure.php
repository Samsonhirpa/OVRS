
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Structure
 *
 * @author HP
 */
class Structure extends CI_Controller {

      public function __construct() {
            parent::__construct();
            $this->load->model('Structure_model', 'str');
            $this->load->model('Bddddomodel', 'b');
             $this->load->model('Usermodel', 'm');
            // $this->load->model('dynamic_chart_model');

             // $this->load->library('Pdf_report');
      }

public function AKmagala() {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('structure/subcitywareda');
            $this->load->view('layout/footer');
      }

      public function Add_scWoreda() {
            $result = $this->str->Add_scWoreda();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registred');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Add try Again');
            }
            redirect('Structure/AKmagala');
      }

      public function Delete_scWoreda($id) {
            $result = $this->str->Delete_scWoreda($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Delete try Again');
            }
            redirect('Structure/AKmagala');
      }


public function Subcity() {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('structure/subcity');
            $this->load->view('layout/footer');
      }

      public function Add_subcity() {
            $result = $this->str->Add_subcity();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registred');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Add try Again');
            }
            redirect('Structure/Subcity');
      }

      public function Delete_subcity($id) {
            $result = $this->str->Delete_subcity($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Delete try Again');
            }
            redirect('Structure/Subcity');
      }


public function City() {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('structure/city');
            $this->load->view('layout/footer');
      }

      public function Add_city() {
            $result = $this->str->Add_city();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registred');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Add try Again');
            }
            redirect('Structure/City');
      }

      public function Delete_city($id) {
            $result = $this->str->Delete_city($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Delete try Again');
            }
            redirect('Structure/City');
      }
 public function updateempcabine($id) {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->where('cab_id', $id);
            $query = $this->db->update('cabine', array('file_name'=>$this->upload->file_name,
           
                'maqa' => $this->input->post('maqa'),
                'sala_id' => $this->input->post('sala_id'),
                'umuri' => $this->input->post('umuri'),
                'bilbila' => $this->input->post('bilbila'),
                'email' => $this->input->post('email'),
                'dhalotaG_id' => $this->input->post('dhalotaG_id'),
                'dhalotaA_id' => $this->input->post('dhalotaA_id'),
                'haalamaati' => $this->input->post('haalamaati'),
                'bayinaM' => $this->input->post('bayinaM'),
                'bayinaF' => $this->input->post('bayinaF'),
                                   ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('Structure/empmanagecabine');
      }

 public function updateempcabine2($id) {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('cv')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('cv'))
        {
            $this->db->where('c_id', $id);
            $query = $this->db->update('cabine2', array(
              'cv'=>$this->upload->file_name,
                'maqa_id' => $this->input->post('maqa_id'),
                'sector' => $this->input->post('sector'),
                'mudama_amma' => $this->input->post('mudama_amma'),
                'muxannoowan' => $this->input->post('muxannoowan'),
                'muxannoo' => $this->input->post('muxannoo'),
                'sadarkaB' => $this->input->post('sadarkaB'),
                'gosaB' => $this->input->post('gosaB'),
                'university_id' => $this->input->post('university_id'),
                'gpa' => $this->input->post('gpa'),
                'carrabarumsa' => $this->input->post('carrabarumsa'),
                'baraqabso' => $this->input->post('baraqabso'),
                'barabadhasa' => $this->input->post('barabadhasa'),
                'hojibadhasa' => $this->input->post('hojibadhasa'),
                'qamabadhase' => $this->input->post('qamabadhase'),
                'barakafama' => $this->input->post('barakafama'),
                'dhimakahef' => $this->input->post('dhimakahef'),
                'ciminaijo' => $this->input->post('ciminaijo'),
                'hanqinaijo' => $this->input->post('hanqinaijo'),
                'level' => $this->input->post('level'),
                'muxano_hog' => $this->input->post('muxano_hog'),
                'qabxi' => $this->input->post('qabxi'),
                'bakalenji' => $this->input->post('bakalenji'),
                'baralenji' => $this->input->post('baralenji'),
                'gosalenji' => $this->input->post('gosalenji'),
                'marsa' => $this->input->post('marsa'),
                'kaffalti' => $this->input->post('kaffalti'),
                
                                 ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('Structure/empmanage2');
      }

public function updatezonecabine($id) {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->where('cab_id', $id);
            $query = $this->db->update('cabine', array('file_name'=>$this->upload->file_name,
           
                'maqa' => $this->input->post('maqa'),
                'sala_id' => $this->input->post('sala_id'),
                'umuri' => $this->input->post('umuri'),
                'bilbila' => $this->input->post('bilbila'),
                'email' => $this->input->post('email'),
                'dhalotaG_id' => $this->input->post('dhalotaG_id'),
                'dhalotaA_id' => $this->input->post('dhalotaA_id'),
                'haalamaati' => $this->input->post('haalamaati'),
                'bayinaM' => $this->input->post('bayinaM'),
                'bayinaF' => $this->input->post('bayinaF'),
                                   ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('Structure/zonemanagecabine');
      }

 public function updatezonecabine2($id) {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('cv')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('cv'))
        {
            $this->db->where('c_id', $id);
            $query = $this->db->update('cabine2', array(
              'cv'=>$this->upload->file_name,
                'maqa_id' => $this->input->post('maqa_id'),
                'sector' => $this->input->post('sector'),
                'mudama_amma' => $this->input->post('mudama_amma'),
                'muxannoowan' => $this->input->post('muxannoowan'),
                'muxannoo' => $this->input->post('muxannoo'),
                'sadarkaB' => $this->input->post('sadarkaB'),
                'gosaB' => $this->input->post('gosaB'),
                'university_id' => $this->input->post('university_id'),
                'gpa' => $this->input->post('gpa'),
                'carrabarumsa' => $this->input->post('carrabarumsa'),
                'baraqabso' => $this->input->post('baraqabso'),
                'barabadhasa' => $this->input->post('barabadhasa'),
                'hojibadhasa' => $this->input->post('hojibadhasa'),
                'qamabadhase' => $this->input->post('qamabadhase'),
                'barakafama' => $this->input->post('barakafama'),
                'dhimakahef' => $this->input->post('dhimakahef'),
                'ciminaijo' => $this->input->post('ciminaijo'),
                'hanqinaijo' => $this->input->post('hanqinaijo'),
                'level' => $this->input->post('level'),
                'muxano_hog' => $this->input->post('muxano_hog'),
                'qabxi' => $this->input->post('qabxi'),
                'bakalenji' => $this->input->post('bakalenji'),
                'baralenji' => $this->input->post('baralenji'),
                'gosalenji' => $this->input->post('gosalenji'),
                'marsa' => $this->input->post('marsa'),
                'kaffalti' => $this->input->post('kaffalti'),
                
                                 ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('Structure/zonemanage2');
      }

public function updatecabine($id) {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->where('cab_id', $id);
            $query = $this->db->update('cabine', array('file_name'=>$this->upload->file_name,
           
                'maqa' => $this->input->post('maqa'),
                'sala_id' => $this->input->post('sala_id'),
                'umuri' => $this->input->post('umuri'),
                'bilbila' => $this->input->post('bilbila'),
                'email' => $this->input->post('email'),
                'dhalotaG_id' => $this->input->post('dhalotaG_id'),
                'dhalotaA_id' => $this->input->post('dhalotaA_id'),
                'haalamaati' => $this->input->post('haalamaati'),
                'bayinaM' => $this->input->post('bayinaM'),
                'bayinaF' => $this->input->post('bayinaF'),
                                   ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('Structure/managecabine');
      }

 public function updatecabine2($id) {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('cv')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('cv'))
        {
            $this->db->where('c_id', $id);
            $query = $this->db->update('cabine2', array(
              'cv'=>$this->upload->file_name,
                'maqa_id' => $this->input->post('maqa_id'),
                'sector' => $this->input->post('sector'),
                'mudama_amma' => $this->input->post('mudama_amma'),
                'muxannoowan' => $this->input->post('muxannoowan'),
                'muxannoo' => $this->input->post('muxannoo'),
                'sadarkaB' => $this->input->post('sadarkaB'),
                'gosaB' => $this->input->post('gosaB'),
                'university_id' => $this->input->post('university_id'),
                'gpa' => $this->input->post('gpa'),
                'carrabarumsa' => $this->input->post('carrabarumsa'),
                'baraqabso' => $this->input->post('baraqabso'),
                'barabadhasa' => $this->input->post('barabadhasa'),
                'hojibadhasa' => $this->input->post('hojibadhasa'),
                'qamabadhase' => $this->input->post('qamabadhase'),
                'barakafama' => $this->input->post('barakafama'),
                'dhimakahef' => $this->input->post('dhimakahef'),
                'ciminaijo' => $this->input->post('ciminaijo'),
                'hanqinaijo' => $this->input->post('hanqinaijo'),
                'level' => $this->input->post('level'),
                'muxano_hog' => $this->input->post('muxano_hog'),
                'qabxi' => $this->input->post('qabxi'),
                'bakalenji' => $this->input->post('bakalenji'),
                'baralenji' => $this->input->post('baralenji'),
                'gosalenji' => $this->input->post('gosalenji'),
                'marsa' => $this->input->post('marsa'),
                'kaffalti' => $this->input->post('kaffalti'),
                
                                 ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('Structure/managecabine2');
      }


public function deletecabineprofile($id) {
            $result = $this->str->deletecabineprofile($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('structure/managecabine');
      }public function deletecomment($id) {
            $result = $this->str->deletecomment($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('Structure/manage_ipcomment');
      }
public function deletecabineprofile2($id) {
            $result = $this->str->deletecabineprofile2($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('structure/managecabine');
      }


public function managecabine(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/managecabine');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
    public function empmanagecabine(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/empmanage1');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
     public function zonemanagecabine(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/zonemanage1');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
    public function editcabine($id){
      if ($this->session->userdata('username')) {
        $data['cabine']=$this->str->editcabine($id);
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/editcabine' ,$data);
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
     public function empeditcabine($id){
      if ($this->session->userdata('username')) {
        $data['cabine']=$this->str->editcabine($id);
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/empeditcabine' ,$data);
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    } public function zoneditcabine($id){
      if ($this->session->userdata('username')) {
        $data['cabine']=$this->str->editcabine($id);
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/zoneditcabine' ,$data);
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
     public function editcabine2($id){
      if ($this->session->userdata('username')) {
        $data['cabine2']=$this->str->editcabine2($id);
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/editcabine2' ,$data);
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
 public function empeditcabine2($id){
      if ($this->session->userdata('username')) {
        $data['cabine2']=$this->str->editcabine2($id);
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/empeditcabine2' ,$data);
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }public function zoneditcabine2($id){
      if ($this->session->userdata('username')) {
        $data['cabine2']=$this->str->editcabine2($id);
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/zoneditcabine2' ,$data);
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
public function manage_ramadi(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/zonemanagecabine2');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
    public function manage_ramadi1(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/regionmanagecabine2');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
    public function managecabine2(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/managecabine2');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
public function empmanage2(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/empmanage2');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
public function zonemanage2(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('cabine/zonemanage2');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }

    public function allinfo(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Gabaasa/hogganaa');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
 public function hoggantoota_aanaa(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Gabaasa/hoggana_aana');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
  public function hoggantoota_godina(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Gabaasa/hoggana_godina');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
    public function profileinfo($id)
{
  if($this->session->userdata('username')){
  $data['cabine2']=$this->str->profileinfo($id);
  $this->load->view('layout/header');
  $this->load->view('layout/topmenu');
  $this->load->view('layout/sidemenu');
  $this->load->view('Gabaasa/profile',$data);
  $this->load->view('layout/footer');
}
  else
  {
    redirect('marketcontroller/');
  }
}
    public function alluserinfo(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Gabaasa/user');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('Structure');
            }
    }
 public function addcabines() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('cabine/addcab');
                  $this->load->view('layout/footer');
            } else {
                  redirect('Structure');
            }
      }

public function addcabines2() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('cabine/addcabines');
                  $this->load->view('layout/footer');
            } else {
                  redirect('Structure');
            }
      }

      


 public function empaddcabines() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('cabine/empaddcab');
                  $this->load->view('layout/footer');
            } else {
                  redirect('Structure');
            }
      }

public function empaddcabines2() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('cabine/empaddcabines');
                  $this->load->view('layout/footer');
            } else {
                  redirect('Structure');
            }
      }


public function zoneaddcabines() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('cabine/zoneaddcab');
                  $this->load->view('layout/footer');
            } else {
                  redirect('Structure');
            }
      }

public function zoneaddcabines2() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('cabine/zoneaddcabines');
                  $this->load->view('layout/footer');
            } else {
                  redirect('Structure');
            }
      }






public function save_cc() {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->insert('carboncopy',array('file_name'=>$this->upload->file_name,

                               'refno' => $this->input->post('refno'),
            'orgname' => $this->input->post('orgname'),
                'ipid' => $this->input->post('ipid'),
                'lanip' => $this->input->post('lanip'),
                'wanip' => $this->input->post('wanip'),
                'date' => $this->input->post('date'),
                'servicenumber' => $this->input->post('servicenumber'),
                'ethiocontact' => $this->input->post('ethiocontact'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
                                   ));




            $this->session->set_flashdata('msg',"success");

        }
         echo $this->input->post('ipid');
        $result = $this->str->Delete_freeip1($ipid);
        redirect('Structure/manage_carbonCopy');
      }

 public function Edit_cc($id) {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->where('id', $id);
            $query = $this->db->update('carboncopy', array('file_name'=>$this->upload->file_name,
           
            'refno' => $this->input->post('refno'),
            'date' => $this->input->post('date'),
            'reason' => $this->input->post('reason'),
            'servicenumber' => $this->input->post('servicenumber'),
            'site_ict' => $this->input->post('site_ict'),
            'zone_id' => $zone,
            'woreda' => $woreda,
            'region_id' => 1,
            'kebele' => $this->input->post('kebele'),
            'operator' => $LoggedUser,
            'created_by' => $username,
                                   ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('Structure/manage_carbonCopy');
      }
       public function downloadcc($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->str->downloadtl(array('id' => $id));
            
            //file path
            $file = 'upload/'.$fileInfo['file_name'];
            
            //download file from directory
            force_download($file, NULL);
        }
    }




























public function Edit_request($id) {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->where('id', $id);
            $query = $this->db->update('user_request', array('file_name'=>$this->upload->file_name,
           
                               'date'=>$this->input->post('date'),
                               'orgname'=>$this->input->post('orgname'),
                               'torequest'=>$this->input->post('torequest'),
                               'reqdesc'=>$this->input->post('reqdesc'),
                               'kebele'=>$this->input->post('kebele'),
                              'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
                                   ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('Structure/manage_userrequest');
      }

    
   
public function save_tl() {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->insert('terminate_letter',array('file_name'=>$this->upload->file_name,

                               'refno' => $this->input->post('refno'),
            'date' => $this->input->post('date'),
            'reason' => $this->input->post('reason'),
            'servicenumber' => $this->input->post('servicenumber'),
            'site_ict' => $this->input->post('site_ict'),
            'zone_id' => $zone,
            'woreda' => $woreda,
            'region_id' => 1,
            'kebele' => $this->input->post('kebele'),
            'operator' => $LoggedUser,
            'created_by' => $username,
                                   ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('Structure/terminate_letter');
      }

 public function Edit_tl($id) {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->where('id', $id);
            $query = $this->db->update('terminate_letter', array('file_name'=>$this->upload->file_name,
           
            'refno' => $this->input->post('refno'),
            'date' => $this->input->post('date'),
            'reason' => $this->input->post('reason'),
            'servicenumber' => $this->input->post('servicenumber'),
            'site_ict' => $this->input->post('site_ict'),
            'zone_id' => $zone,
            'woreda' => $woreda,
            'region_id' => 1,
            'kebele' => $this->input->post('kebele'),
            'operator' => $LoggedUser,
            'created_by' => $username,
                                   ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('Structure/terminate_letter');
      }
       public function downloadtl($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->str->downloadtl(array('id' => $id));
            
            //file path
            $file = 'upload/'.$fileInfo['file_name'];
            
            //download file from directory
            force_download($file, NULL);
        }
    }
 public function Deletetl($id) {
            $result = $this->str->Deletetl($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('structure/terminate_letter');
      }




public function updateprofile($id)
{if($this->session->userdata('username'))
      {
      $result=$this->str->updateprofile($id);
      if($result)
      {
            $this->session->set_flashdata('msg_error','success fully updated !!!');

      }
      else
      {
            $this->session->set_flashdata('msg_success','failed to update');

      }
      redirect('Structure/dashboard');

      }
      else
      {
            redirect('Structure');
      }
      }















      
 public function login() {
            $this->load->view('layout/header');
            // $this->load->view('layout/topindex');
            // $this->load->view('layout/login');
            $this->load->view('login');
            //redirect('usercontroller/dashboard');
      }

      public function logout() {

            $this->session->unset_userdata('username');
            redirect('Structure/login');
      }

public function checkuser() {
    $user = $this->input->post('username');
    $pass = $this->input->post('password');

    $ceklogin = $this->str->login($user, $pass);

    if ($ceklogin) {
        foreach ($ceklogin as $row);
        
        // Set all session data
        $this->session->set_userdata('username', $row->username);
        $this->session->set_userdata('id', $row->id);
        $this->session->set_userdata('userId', $row->id);
        $this->session->set_userdata('level_id', $row->level);
        $this->session->set_userdata('role', $row->role_id);
        $this->session->set_userdata('woreda', $row->woreda_id);
        $this->session->set_userdata('kebele', $row->kebele);
        $this->session->set_userdata('zone', $row->zone_id);
        $this->session->set_userdata('city', $row->magala_id);
        $this->session->set_userdata('subcity', isset($row->kmagala_id) ? $row->kmagala_id : '');
        $this->session->set_userdata('subsubcity', isset($row->akmagala_id) ? $row->akmagala_id : '');
        $this->session->set_userdata('region', $row->region_id);
        $this->session->set_userdata('email', $row->email);
        $this->session->set_userdata('phone', $row->phoneno);
        $this->session->set_userdata('full_name', $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name);
        $this->session->set_userdata('name', $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name);
        $this->session->set_userdata('naannoofil', $row->naannoofil);

        if ($this->session->userdata('role') == 1) {
            redirect('Structure/dashboard');
        } elseif ($this->session->userdata('role') == 2) {
            redirect('Structure/dashboard');
        } elseif ($this->session->userdata('role') == 3) {
            redirect('VotingReport/dashboard');
        } else {
            redirect('dashboard');
        }
    } else {
        $this->session->set_flashdata('error', 'Username ykn password dogoggora!');
        redirect('Structure/login');
    }
}

  public function zdashboard()
{
      if($this->session->userdata('username')){
      $data['useraccount']=$this->str->getdash();
      $this->load->view('layout/header');
      $this->load->view('layout/topmenu');
      $this->load->view('layout/sidemenu');
      $this->load->view('dashboard2',$data);
      $this->load->view('layout/footer');
}
      else
      {
            redirect('structure/');
      }
}
  public function mdashboard()
{
      if($this->session->userdata('username')){
      $data['useraccount']=$this->str->getdash();
      $this->load->view('layout/header');
      $this->load->view('layout/topmenu');
      $this->load->view('layout/sidemenu');
      $this->load->view('dashboard1',$data);
      $this->load->view('layout/footer');
}
      else
      {
            redirect('structure/');
      }
}

  public function dashboard()
{
      if($this->session->userdata('username')){
      $data['useraccount']=$this->str->getdash();
      $this->load->view('layout/header');
      $this->load->view('layout/topmenu');
      $this->load->view('layout/sidemenu');
      $this->load->view('dashboard',$data);
      $this->load->view('layout/footer');
}
      else
      {
            redirect('structure/');
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
                  redirect('Structure');
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


public function showletter($id)
{
      if($this->session->userdata('username')){
      $data['osticaletters']=$this->str->showletter($id);
      $this->load->view('layout/header');
      $this->load->view('layout/topmenu');
      $this->load->view('layout/sidemenu');
      $this->load->view('ip_lattermange/lettershow',$data);
      $this->load->view('layout/footer');
}
      else
      {
            redirect('Structure/');
      }
}
public function showtletter($id)
{
      if($this->session->userdata('username')){
      $data['terminate_show']=$this->str->showtletter($id);
      $this->load->view('layout/header');
      $this->load->view('layout/topmenu');
      $this->load->view('layout/sidemenu');
      $this->load->view('ip_lattermange/terminateshow',$data);
      $this->load->view('layout/footer');
}
      else
      {
            redirect('Structure/');
      }
}public function showmletter($id)
{
      if($this->session->userdata('username')){
      $data['migrate_lshow']=$this->str->showmletter($id);
      $this->load->view('layout/header');
      $this->load->view('layout/topmenu');
      $this->load->view('layout/sidemenu');
      $this->load->view('ip_lattermange/migrateshow',$data);
      $this->load->view('layout/footer');
}
      else
      {
            redirect('Structure/');
      }
}

public function lettershow()
{
      if($this->session->userdata('username')){
      $this->load->view('layout/header');
      $this->load->view('layout/topmenu');
      $this->load->view('layout/sidemenu');
      $this->load->view('ip_lattermange/lettershow');
      $this->load->view('layout/footer');
}
      else
      {
            redirect('structure/');
      }
}


public function custom_view(){
$this->load->view('custom_view', array('error' => ' ' ));
}
public function do_upload(){
$config = array(
'upload_path' => "./uploads/",
'allowed_types' => "gif|jpg|png|jpeg|pdf",
'overwrite' => TRUE,
'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
'max_height' => "768",
'max_width' => "1024"
);
$this->load->library('upload', $config);
if($this->upload->do_upload())
{
$data = array('upload_data' => $this->upload->data());
$this->load->view('upload_success',$data);
}
else
{
$error = array('error' => $this->upload->display_errors());
$this->load->view('custom_view', $error);
}
}


      public function Role() {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('structure/role');
            $this->load->view('layout/footer');
      }

      public function Zone() {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('structure/zone');
            $this->load->view('layout/footer');
      }

      public function Add_zone() {
            $result = $this->str->Add_zone();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registred');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Add try Again');
            }
            redirect('Structure/Zone');
      }

      public function Delete_Zone($id) {
            $result = $this->str->Delete_Zone($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Delete try Again');
            }
            redirect('Structure/Zone');
      }
       public function Delete_letter($id) {
            $result = $this->str->Delete_letter($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Delete try Again');
            }
            redirect('Structure/newletters');
      } public function Delete_mletter($id) {
            $result = $this->str->Delete_mletter($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Delete try Again');
            }
            redirect('Structure/m_letter');
      }
public function Delete_tletter($id) {
            $result = $this->str->Delete_tletter($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Delete try Again');
            }
            redirect('Structure/t_letter');
      }


      public function Edit_zone($id) {
            $result = $this->str->Edit_zone($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Edited');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Edit try Again');
            }
            redirect('Structure/Zone');
      }

      public function Woreda() {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('structure/woreda');
            $this->load->view('layout/footer');
      }

      public function User_list() {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('structure/user_list');
            $this->load->view('layout/footer');
      }

      public function profile($username)
{
      if($this->session->userdata('username')){
      $data['useraccount']=$this->str->getprofile($username);
      $this->load->view('layout/header');
      $this->load->view('layout/topmenu');
      $this->load->view('layout/sidemenu');
      $this->load->view('structure/profile',$data);
      $this->load->view('layout/footer');
}
      else
      {
            redirect('structure/');
      }
}

      public function ReserchDocument() {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            
            $this->load->view('research/manage_research_document');
            $this->load->view('layout/footer');
      }

      public function Add_woreda() {
            $result = $this->str->Add_woreda();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Add try Again');
            }
            redirect('Structure/Woreda');
      }

      public function Delete_Woreda($id) {
            $result = $this->str->Delete_Woreda($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Delete try Again');
            }
            redirect('Structure/Woreda');
      }

      public function Edit_Woreda($id) {
            $result = $this->str->Edit_Woreda($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Edited');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Edit try Again');
            }
            redirect('Structure/Woreda');
      }

      public function Kebele() {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('structure/kebele');
            $this->load->view('layout/footer');
      }


      public function Addkebele() {
            $result = $this->str->Addkebele();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Add try Again');
            }
            redirect('Structure/Kebele');
      }

      public function Delete_kebele($id) {
            $result = $this->str->Delete_kebele($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Delete try Again');
            }
            redirect('Structure/Kebele');
      }

      public function Edit_kebele($id) {
            $result = $this->str->Edit_kebele($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Edited');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Edit try Again');
            }
            redirect('Structure/Kebele');
      }

 


      public function Acivate_user($id) {
            $result = $this->str->Acivate_user($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Activated Users');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Activate try Again');
            }
            redirect('Structure/User_list');
      }

      public function Deacivate_user($id) {
            $result = $this->str->Deacivate_user($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deactivated Users');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Deactivated try Again');
            }
            redirect('Structure/User_list');
      }

      public function Delete_user($id) {
            $result = $this->str->Delete_user($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted Users');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Delete try Again');
            }
            redirect('Structure/User_list');
      }

      public function Edit_User($id) {
            $result = $this->str->Edit_User($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated Users');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Updated try Again');
            }
            redirect('Structure/User_list');
      }

      public function Add_Role() {
            $result = $this->str->Add_Role();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added Users');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Add try Again');
            }
            redirect('Structure/Role');
      }

      public function Edit_Role($id) {
            $result = $this->str->Edit_Role($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated Users');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Update try Again');
            }
            redirect('Structure/Role');
      }

      public function Delete_Role($id) {
            $result = $this->str->Delete_Role($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted Users');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Delete try Again');
            }
            redirect('Structure/Role');
      }

     public function File_upload() {
            $config = array(
              'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx|doc',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('file_name')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('file_name'))
        {
            $this->db->insert('research',array('file_name'=>$this->upload->file_name,

                               'title'=>$this->input->post('title'),
                               'subject'=>$this->input->post('subject'),
                               'detail'=>$this->input->post('detail'),
                              
                               'created_by' => $username,
                                   ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('Structure/ReserchDocument');
      }

    
    public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->str->getRows(array('id' => $id));
            
            //file path
            $file = 'upload/'.$fileInfo['file_name'];
            
            //download file from directory
            force_download($file, NULL);
        }
    }




public function add_request() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_manage/add_request');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}

public function save_newrequest() {
            $result = $this->str->save_newrequest();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('structure/manage_userrequest1');
      }
  
 public function manage_userrequest() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_manage/manage_userrequest');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}

public function manage_userrequest1() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_manage/manage_userrequest1');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}
public function manage_request3() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_manage/manage_request3');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}

public function manage_userrequest2() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_manage/manage_userrequest2');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}


      public function save_request() {
            $result = $this->str->save_request();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('structure/manage_userrequest');
      }
      // public function Edit_request($id) {
      //       $result = $this->str->Edit_request($id);
      //       if ($result) {
      //             $this->session->set_flashdata('success_msg', 'Successfully Updated');
      //       } else {
      //             $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
      //       }
      //       redirect('structure/manage_userrequest');
      // }
      public function Delete_request($id) {
            $result = $this->str->Delete_request($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('structure/manage_userrequest');
      }

   
    public function manage_carbonCopy() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_manage/carbonCopy');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}

public function manage_carbonCopy1() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_manage/mange_carboncopy');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/manage_carbonCopy1');
      }
}


      public function save_carbonCopy() {
            $result = $this->str->save_carbonCopy();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('structure/manage_carbonCopy');
      }

      public function Edit_carboncopy($id) {
            $result = $this->str->Edit_carboncopy($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('structure/manage_carbonCopy1');
      }

      public function Delete_carboncop($id) {
            $result = $this->str->Delete_carboncopy($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('structure/manage_carbonCopy');
      }
       public function Delete_carboncopy($id) {
            $result = $this->str->Delete_carboncopy($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('structure/manage_carbonCopy1');
      }


      public function postcarbon($post)
      {
      $result =   $this->str->postcarbon($post);
      if($result)
      {
            redirect('structure/manage_carbonCopy1');
      }

      }

       public function requst_status($post)
      {
      $result =   $this->str->requst_status($post);
      if($result)
      {
            redirect('structure/manage_ramadi1');
      }

      }
      public function requst_status3($post)
      {
      $result =   $this->str->requst_status3($post);
      if($result)
      {
            redirect('structure/manage_request3');
      }

      }
       public function requst_status1($post)
      {
      $result =   $this->str->requst_status1($post);
      if($result)
      {
            redirect('structure/manage_userrequest1');
      }

      }

         public function post_status($post)
      {
      $result =   $this->str->post_status($post);
      if($result)
      {
            redirect('structure/manage_migrate');
      }

      }public function ip_status($post)
      {
      $result =   $this->str->ip_status($post);
      if($result)
      {
            redirect('structure/manage_freeip');
      }

      }

      public function terminate_status($post)
      {
      $result =   $this->str->terminate_status($post);
      if($result)
      {
            redirect('structure/manage_terminate');
      }

      }
       
   public function getcarboninfo()
   {
           $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('post/postcarbon');
            $this->load->view('layout/footer');
   }

   public function t_letter() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_lattermange/terminaterequest');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
} public function m_letter() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_lattermange/migraterequest');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}
public function terminate_letter() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_terminate/terminate_letter');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}
public function manage_terminate() {

           if($this->session->userdata('username')){
            $data['ipinfos']=$this->str->getIpinfo();
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_terminate/manage_terminate',$data);
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}

public function manage_terminate2() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_terminate/manage_terminate2');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}

   public function save_mletter() {
            $result = $this->str->save_mletter();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('structure/m_letter');
      }

      public function save_terminateletter() {
            $result = $this->str->save_terminateletter();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('structure/t_letter');
      }
// public function save_terminate() {
//             $result = $this->str->save_terminate();
//             if ($result) {
//                   $this->session->set_flashdata('success_msg', 'Successfully Added');
//             } else {
//                   $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
//             }
//             redirect('Structure/terminate_letter');
//       }

      public function migrate_letter() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_migrate/migrate_letter');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('Structure/');
      }
}

public function manage_migrate() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_migrate/manage_migrate');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}

   public function save_migrate() {
            $result = $this->str->save_migrate();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('structure/migrate_letter');
      }

      public function freeip_report() {

           if($this->session->userdata('username')){
          
            $this->load->view('allreport/freeip_report');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
      }  
public function terminate_report() {

           if($this->session->userdata('username')){
          
            $this->load->view('allreport/terminated_repots');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
      }  

      public function onservice_report() {

           if($this->session->userdata('username')){
          
            $this->load->view('allreport/onservice_report');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
} 

 public function migrate_report() {

           if($this->session->userdata('username')){
          
            $this->load->view('allreport/migrate_report');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
} 


public function manage_freeip() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('freeIp/addfree_ip');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}

   public function save_freeip() {
            $result = $this->str->save_freeip();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('structure/manage_freeip');
      }
public function free_status($id) {
            $result = $this->str->free_status($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Send Please Check Duplication and Try Again');
            }
            redirect('structure/manage_freeip');
      }
      public function Edit_freeip($id) {
            $result = $this->str->Edit_freeip($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('structure/manage_freeip');
      }
       public function Edit_requestcomment($id) {
            $result = $this->str->Edit_requestcomment($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully sent ');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To send Please Try Again');
            }
            redirect('structure/manage_userrequest2');
      }

      public function Delete_freeip($id) {
            $result = $this->str->Delete_freeip($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('structure/manage_freeip');
      }

      public function newletters() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_lattermange/newrequest_lettar');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}

   public function save_osticaletters() {
            $result = $this->str->save_osticaletters();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('structure/newletters');
      }

      public function ipcomment() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_manage/ipcomment');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}

public function manage_ipcomment() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_manage/manage_ipcomment');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}

public function save_ipcomment() {
            $result = $this->str->save_ipcomment();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('structure/ipcomment');
      }

      public function manage_carbon1() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ip_manage/manage_carbon1');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('structure/');
      }
}


//Youth Information

public function AddYouth() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('youth/AddYouth');
                  $this->load->view('layout/footer');
            } else {
                  redirect('Structure');
            }
      }

      public function saveYouth() {
            $result = $this->str->saveYouth();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('Structure/ManageYouth');
      }

      public function ManageYouth() {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('youth/ManageYouth');
            $this->load->view('layout/footer');
      }

      public function ManageAllYouthInfo() {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('youth/allyouthinfo');
            $this->load->view('layout/footer');
      }

      public function edityouth($id) {
            $result = $this->str->edityouth($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg','You are no longer allowed to update data after 5 days');
            }
            redirect('Structure/ManageYouth');
      }
      public function deleteyouth($id) {
            $result = $this->str->deleteyouth($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('Structure/ManageYouth');
      }

      public function AddMemeber() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('youth/AddMemeber');
                  $this->load->view('layout/footer');
            } else {
                  redirect('Structure');
            }
      }

      public function Save_newmember() {
            $result = $this->str->Save_newmember();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('Structure/AddMemeber');
      }

      public function Edit_memberinfo($id) {
            $result = $this->str->Edit_memberinfo($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg','You are no longer allowed to update data after 5 days');
            }
            redirect('Structure/AddMemeber');
      }
      public function Delete_memberinfo($id) {
            $result = $this->str->Delete_memberinfo($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('Structure/AddMemeber');
      }

      public function Add_GGBND() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('youth/Add_GGBND');
                  $this->load->view('layout/footer');
            } else {
                  redirect('Structure');
            }
      }

      public function Save_ggndb() {
            $result = $this->str->Save_ggndb();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('Structure/Add_GGBND');
      }

      public function Edit_ggndbinfo($id) {
            $result = $this->str->Edit_ggndbinfo($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg','You are no longer allowed to update data after 5 days');
            }
            redirect('Structure/Add_GGBND');
      }
      public function Delete_ggndbinfo($id) {
            $result = $this->str->Delete_ggndbinfo($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('Structure/Add_GGBND');
      }

      public function Add_ScienceCafe() {
            if ($this->session->userdata('username')) {
                  $this->load->view('layout/header');
                  $this->load->view('layout/topmenu');
                  $this->load->view('layout/sidemenu');
                  $this->load->view('youth/Add_ScienceCafe');
                  $this->load->view('layout/footer');
            } else {
                  redirect('Structure');
            }
      }

      public function Save_ScienceCafe() {
            $result = $this->str->Save_ScienceCafe();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('Structure/AddMemeber');
      }

      public function Edit_ScienceCafe($id) {
            $result = $this->str->Edit_ScienceCafe($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg','You are no longer allowed to update data after 5 days');
            }
            redirect('Structure/AddMemeber');
      }
      public function Delete_ScienceCafe($id) {
            $result = $this->str->Delete_ScienceCafe($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('Structure/AddMemeber');
      }


}
