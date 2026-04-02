
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MSport extends CI_Controller {

      public function __construct() {
            parent::__construct();

            $lang = ($this->session->userdata('lang')) ? $this->session->userdata('lang') : config_item('language');
            $this->lang->load('menu', $lang);
            $this->load->model('usermodel', 'm');
            $this->load->model('bddddomodel', 'b');
            $this->load->model('Structure_model', 'str');
            
            $this->load->model('Sportmodel', 'k');
            $this->load->model('ZoneSportmodel', 'zk');
            $this->load->model('MSportmodel', 'mk');
  
        }
 function fetch_position()
 {
  if($this->input->post('spt_id'))
  {
   echo $this->k->fetch_position($this->input->post('spt_id'));
  }
 }
 
  function fetch_clubtype()
 {
  if($this->input->post('spt_id'))
  {
   echo $this->k->fetch_clubtype($this->input->post('spt_id'));
  }
 }

 function fetch_state()
 {
  if($this->input->post('zid'))
  {
   echo $this->k->fetch_state($this->input->post('zid'));
  }
 }

 function fetch_city()
 {
  if($this->input->post('woreda_id'))
  {
   echo $this->k->fetch_city($this->input->post('woreda_id'));
  }
 }
  
 function fetch_subcity()
 {
  if($this->input->post('cid'))
  {
   echo $this->k->fetch_subcity($this->input->post('cid'));
  }
 }

 function fetch_subcitywd()
 {
  if($this->input->post('subcity_id'))
  {
   echo $this->k->fetch_subcitywd($this->input->post('subcity_id'));
  }
 }
  


  
public function Madaallii() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('sport/madalli');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('Sport/');
      }
}
public function MadaalliiLenjitootaa() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('sport/madallilist');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('Sport/');
      }
}
public function save_Madalli() {
            $result = $this->k->save_Madalli();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('Sport/Madaallii');
      }

public function save_Guddattoota() {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx|doc',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('file_name')),
            );
            $username= $this->session->userdata('username');
           
            $this->load->library('upload', $config);
            if($this->upload->do_upload('file_name'))
        {
            $this->db->insert('guddattoota',array('file_name'=>$this->upload->file_name,
              'gu_name' => $this->input->post('gu_name'),
                'saala' => $this->input->post('saala'),
                'bara' => $this->input->post('bara'),
                'illitoota' => $this->input->post('illitoota'),
                'sport_type' => $this->input->post('sport_type'),
                'bslg_id' => $this->input->post('bslg_id'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $username,
               
                                   ));

  $this->session->set_flashdata('msg',"success");

        }
         
        redirect('MSport/Guddattoota');
      }

public function Edit_Guddattoota($gu_id) {
            $result = $this->mk->Edit_wirtu($gu_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/Guddattoota');
      }
  

public function Delete_Guddattoota($gu_id) {
            $result = $this->mk->Delete_Guddattoota($gu_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/Guddattoota');
      }

public function deletedoc($id) {
            $result = $this->k->deletedoc($id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('Structure/ReserchDocument');
      }
 public function getclubtype() {
            $result = $this->k->getsclubtype();
            if ($result) {
                  echo json_encode($result);
            } else {
                  return false;
            }
      }
 public function getpositiontap() {
            $result = $this->k->getpositiontap();
            if ($result) {
                  echo json_encode($result);
            } else {
                  return false;
            }
      }

public function GabasaGGL() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MKilaboota/gabasaggl');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('Sport/');
      }
}
public function GabasaSLG() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MKilaboota/gabasaslg');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function Gabasakilabi() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MKilaboota/gabasakilabi');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function GabasaTapattoota() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MKilaboota/gabasataphata');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function downloadkarta($ol_id){
        $this->load->helper('download');
        $fileinfo = $this->k->downloadkarta($ol_id);
        $file = 'upload/'.$fileinfo['attachment'];
        force_download($file, NULL);
        }
public function save_olmaisporti() {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx|doc',
                'max_size' => 0,
                'attachment' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
           
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->insert('olmaisporti',array('attachment'=>$this->upload->file_name,
             'type' => $this->input->post('type'),
                'maqaboi' => $this->input->post('maqaboi'),
                'gosaboi' => $this->input->post('gosaboi'),
                'standard' => $this->input->post('standard'),
                'qabenyuma' => $this->input->post('qabenyuma'),
                'hektar' => $this->input->post('hektar'),
                'tajaajila' => $this->input->post('tajaajila'),
                'ragaa' => $this->input->post('ragaa'),
                'bara' => $this->input->post('bara'),
                'iddoo' => $this->input->post('iddoo'),
                'ibsa' => $this->input->post('ibsa'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $username,
               
                                   ));

  $this->session->set_flashdata('msg',"success");

        }
         
        redirect('MSport/Oolmaisporti');
      }

// public function save_olmaisporti() {
//             $result = $this->k->save_olmaisporti();
//             if ($result) {
//                   $this->session->set_flashdata('success_msg', 'Successfully Added');
//             } else {
//                   $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
//             }
//             redirect('Sport/Oolmaisporti');
//       }

public function Edit_olmaisporti($ol_id) {
            $result = $this->mk->Edit_olmaisporti($ol_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/Oolmaisporti');
      }
  

public function Delete_olmaisporti($ol_id) {
            $result = $this->mk->Delete_olmaisporti($ol_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/Oolmaisporti');
      }

public function CertificateMurte($mur_id)
{
  if($this->session->userdata('username')){
  $data['murte']=$this->mk->CertificateMurte($mur_id);
  $this->load->view('layout/header');
  $this->load->view('layout/topmenu');
  $this->load->view('layout/sidemenu');
  $this->load->view('Msport/murtecertificate',$data);
  $this->load->view('layout/footer');
}
  else
  {
    redirect('MSport/');
  }
}
public function CertificateLenji($lenji_id)
{
  if($this->session->userdata('username')){
  $data['lenji']=$this->mk->CertificateLenji($lenji_id);
  $this->load->view('layout/header');
  $this->load->view('layout/topmenu');
  $this->load->view('layout/sidemenu');
  $this->load->view('Msport/lenjicertificate',$data);
  $this->load->view('layout/footer');
}
  else
  {
    redirect('MSport/');
  }
}
public function save_Giddugalaleenjii1() {
            $result = $this->mk->save_Giddugalaleenjii();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/Giddugalaleenjii');
      }

public function Edit_Giddugalaleenjii($gl_id) {
            $result = $this->mk->Edit_Giddugalaleenjii($gl_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/Giddugalaleenjii');
      }
  
public function save_Giddugalaleenjii() {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx|doc',
                'max_size' => 0,
                'attachment' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
           
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->insert('gidugala',array('attachment'=>$this->upload->file_name,
             'maqaa' => $this->input->post('maqaa'),
                'dob' => $this->input->post('dob'),
                'age' => $this->input->post('age'),
                'sadarka' => $this->input->post('sadarka'),
                'bara' => $this->input->post('bara'),
                'barabh' => $this->input->post('barabh'),
                'zone_id' => $this->input->post('zone_id'),
                'magala_id' => $this->input->post('magala_id'),
                'maqaisporti' => $this->input->post('maqaisporti'),
                'zone_id' => $this->input->post('zone_id'),
                'gosa' => $this->input->post('gosa'),
                'ggl' => $this->input->post('ggl'),
                'yada' => $this->input->post('yada'),
                
                'operator' => $username,
               
                                   ));

  $this->session->set_flashdata('msg',"success");

        }
         
        redirect('MSport/Giddugalaleenjii');
      }

public function downloadfile($ins_id){
        $this->load->helper('download');
        $fileinfo = $this->k->downloadfile($ins_id);
        $file = 'upload/'.$fileinfo['attachment'];
        force_download($file, NULL);
        }
public function save_inisheetivii() {
            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx|doc',
                'max_size' => 0,
                'attachment' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
           
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->insert('inisheetivii',array('attachment'=>$this->upload->file_name,
            'uni_name' => $this->input->post('uni_name'),
                'hektara' => $this->input->post('hektara'),
                'qabiyye' => $this->input->post('qabiyye'),
                'hala' => $this->input->post('hala'),
                'teessoo' => $this->input->post('teessoo'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'bara' => $this->input->post('bara'),
                'yada' => $this->input->post('yada'),
                
                'operator' => $username,
               
                                   ));

  $this->session->set_flashdata('msg',"success");

        }
         
        redirect('MSport/inisheetivii');
      }

// public function save_inisheetivii1() {
//             $result = $this->k->save_inisheetivii();
//             if ($result) {
//                   $this->session->set_flashdata('success_msg', 'Successfully Added');
//             } else {
//                   $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
//             }
//             redirect('Sport/inisheetivii');
//       }

public function Edit_inisheetivii($ins_id) {
            $result = $this->k->Edit_inisheetivii($ins_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/inisheetivii');
      }
  

public function Garee() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MKilaboota/gareeisp');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function addGaree() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MKilaboota/addgaree');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function save_garee() {
            $result = $this->mk->save_garee();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/Garee');
      }

public function Updategaree($gr_id) {
            $result = $this->mk->Updategaree($gr_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/Garee');
      }
  

public function Delete_garee($gr_id) {
            $result = $this->mk->Delete_garee($gr_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/Garee');
      }


public function profileGuddattootaSLG($gslg_id)
{
  if($this->session->userdata('username')){
  $data['gslg']=$this->mk->profileGuddattootaSLG($gslg_id);
  $this->load->view('layout/header');
  $this->load->view('layout/topmenu');
  $this->load->view('layout/sidemenu');
  $this->load->view('Msport/profileguddatoota',$data);
  $this->load->view('layout/footer');
}
  else
  {
    redirect('MSport/');
  }
}
public function GuddattootaSGL() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/guddattootasgl');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}

public function save_gudslg() {
  $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx|doc',
                'max_size' => 0,
                'file_name' => url_title($this->input->post('attachment')),
            );
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $this->load->library('upload', $config);
            if($this->upload->do_upload('attachment'))
        {
            $this->db->insert('gslg',array(
                'file_name'=>$this->upload->file_name,
                'gt_name' => $this->input->post('gt_name'),
                'umuri' => $this->input->post('umuri'),
                'bilbila' => $this->input->post('bilbila'),
                'haadha' => $this->input->post('haadha'),
                'bilbilamati' => $this->input->post('bilbilamati'),
                'bara' => $this->input->post('bara'),
                'sport_type' => $this->input->post('sport_type'),
                'bslg_id' => $this->input->post('bslg_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'zone_id' => $this->input->post('zone_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $LoggedUser,
                            ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('MSport/GuddattootaSGL');
      }

      

public function Delete_guddattootasgl($gslg_id) {
            $result = $this->mk->Delete_guddattootasgl($gslg_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/GuddattootaSGL');
      }

public function SGL() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/sgl');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function save_sgl() {
            $result = $this->mk->save_sgl();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/SGL');
      }

public function Edit_sgl($sgl_id) {
            $result = $this->mk->Edit_sgl($sgl_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/SGL');
      }
  

public function Delete_sgl($sgl_id) {
            $result = $this->mk->Delete_Guddattoota($gu_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/SGL');
      }

public function profiletaphata($tpt_id)
{
  if($this->session->userdata('username')){
  $data['taphata']=$this->mk->profiletaphata($tpt_id);
  $this->load->view('layout/header');
  $this->load->view('layout/topmenu');
  $this->load->view('layout/sidemenu');
  $this->load->view('MKilaboota/taphataprofile',$data);
  $this->load->view('layout/footer');
}
  else
  {
    redirect('MSport/');
  }
}
public function Taphattoota() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MKilaboota/taphata');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function save_taphata11() {
            $result = $this->mk->save_taphata();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/Taphattoota');
      }

public function Delete_Taphataa($tpt_id) {
            $result = $this->mk->Delete_Taphataa($tpt_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/Taphattoota');
      }
public function Waldaalee() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MMaarshal/waldaalee');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
   public function save_Waldaalee11() {
            $result = $this->mk->save_Waldaalee();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/Waldaalee');
      }

      public function Edit_Waldaalee($wl_id) {
            $result = $this->mk->Edit_Waldaalee($wl_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/Waldaalee');
      }
  
      public function Delete_Waldaalee($wl_id) {
            $result = $this->k->Delete_Waldaalee($wl_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/Waldaalee');
      }



public function save_waldaalee() {
  $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx|doc',
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
            $this->db->insert('waldale',array(
                'file_name'=>$this->upload->file_name,
               'maqa_w' => $this->input->post('maqa_w'),
                'w_qaba' => $this->input->post('w_qaba'),
                'phone_wq' => $this->input->post('phone_wq'),
                'wl_dob' => $this->input->post('wl_dob'),
                'type' => $this->input->post('type'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'b_harahe' => $this->input->post('b_harahe'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'bajata' => $this->input->post('bajata'), 
                'yahi' => $this->input->post('yahi'),
                'oditi' => $this->input->post('oditi'),
                'operator' => $LoggedUser,
                            ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('MSport/Waldaalee');
      }

      
public function save_taphata() {
  $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'pdf|jpg|png|docx|doc',
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
            $this->db->insert('taphata',array(
                'file_name'=>$this->upload->file_name,
                'tpt_name' => $this->input->post('tpt_name'),
                'minda' => $this->input->post('minda'),
                'gosasport' => $this->input->post('gosasport'),
                'positiontap' => $this->input->post('positiontap'),
                'tpt_phone' => $this->input->post('tpt_phone'),
                'agreement' => $this->input->post('agreement'),
                'kilabi_id' => $this->input->post('kilabi_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'zone_id' => $this->input->post('zone_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $LoggedUser,
                            ));
            $this->session->set_flashdata('msg',"success");
        }
        redirect('MSport/Taphattoota');
      }

      

public function gglenji() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/gglenji');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function save_ggl() {
            $result = $this->mk->save_ggl();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/gglenji');
      }

public function Edit_ggl($ggl_id) {
            $result = $this->mk->Edit_ggl($ggl_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/gglenji');
      }
  

public function Delete_ggl($ggl_id) {
            $result = $this->mk->Delete_ggl($ggl_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/gglenji');
      }

public function mbfibb() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/mbfibb');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function save_mbfibb() {
            $result = $this->mk->save_mbfibb();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/mbfibb');
      }

public function Edit_mbfibb($mb_id) {
            $result = $this->mk->Edit_mbfibb($mb_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/mbfibb');
      }
  

public function Delete_mbfibb($mb_id) {
            $result = $this->mk->Delete_mbfibb($mb_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/mbfibb');
      }


public function inisheetivii() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/inisheetivii');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}

public function Delete_inisheetivii($ins_id) {
            $result = $this->mk->Delete_inisheetivii($ins_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/inisheetivii');
      }


public function istediyemi() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/istediyemi');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function save_istediyemi() {
            $result = $this->mk->save_istediyemi();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/istediyemi');
      }

public function Edit_istediyemi($std_id) {
            $result = $this->mk->Edit_istediyemi($std_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/istediyemi');
      }
  

public function Delete_istediyemi($std_id) {
            $result = $this->mk->Delete_istediyemi($std_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/istediyemi');
      }
public function boimb() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/boimanabarumsaa');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function save_boimb() {
            $result = $this->mk->save_boimb();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/boimb');
      }

public function Edit_boimb($mb_id) {
            $result = $this->mk->Edit_boimb($mb_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/boimb');
      }
  

public function Delete_boimb($mb_id) {
            $result = $this->mk->Delete_boimb($mb_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/boimb');
      }

public function Giddugalaleenjii() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('sport/giddugalaleenjii');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}


public function Delete_Giddugalaleenjii($gl_id) {
            $result = $this->mk->Delete_Giddugalaleenjii($gl_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/Giddugalaleenjii');
      }
public function Oolmaisporti() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/olmaisporti');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}

public function Hirmaattoota() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/hirmaattoota');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function save_Hirmaattoota() {
            $result = $this->mk->save_Hirmaattoota();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/Hirmaattoota');
      }

public function Edit_Hirmaattoota($hir_id) {
            $result = $this->mk->Edit_Hirmaattoota($hir_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/Hirmaattoota');
      }
  

public function Delete_Hirmaattoota($hir_id) {
            $result = $this->mk->Delete_Hirmaattoota($hir_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/Hirmaattoota');
      }

public function Guddattoota() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/guddattoota');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}

public function Leenjisummaa() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/Leenjisummaa');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function Murteessummaa() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/murteessummaa');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function save_murteessummaa() {
            $result = $this->mk->save_murteessummaa();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/Murteessummaa');
      }

public function Delete_lenjim($mur_id) {
            $result = $this->mk->Delete_lenjim($mur_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/Murteessummaa');
      }

public function save_Leenjisummaa() {
            $result = $this->mk->save_Leenjisummaa();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/Leenjisummaa');
      }

public function Delete_lenji($lenji_id) {
            $result = $this->mk->Delete_lenji($lenji_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/Leenjisummaa');
      }

public function mmi() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('Msport/mmi');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
public function save_mmi() {
            $result = $this->mk->save_mmi();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/mmi');
      }

public function Delete_mmi($mmi_id) {
            $result = $this->mk->Delete_mmi($mmi_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/mmi');
      }

public function Marshal_arti() {

           if($this->session->userdata('username')){
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MMaarshal/wirtu');
            $this->load->view('layout/footer');
      }
      else
      {
            redirect('MSport/');
      }
}
   public function save_wirtu() {
            $result = $this->mk->save_wirtu();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Added');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Add Please Try Again');
            }
            redirect('MSport/Marshal_arti');
      }

      public function Edit_wirtu($w_id) {
            $result = $this->mk->Edit_wirtu($w_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Update Please Try Again');
            }
            redirect('MSport/Marshal_arti');
      }
  
      public function Delete_wirtu($w_id) {
            $result = $this->mk->Delete_wirtu($w_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/Marshal_arti');
      }
 





public function addclub(){
      if ($this->session->userdata('username')) {
           $data['sporttype'] = $this->mk->fetch_sporttype();
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MKilaboota/create' ,$data);
            $this->load->view('layout/footer.php');

            } else {
                  redirect('MSport');
            }
    }

public function editclub($k_id){
      if ($this->session->userdata('username')) {
        $data['kilabi']=$this->mk->editclub($k_id);
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MKilaboota/edit' ,$data);
            $this->load->view('layout/footer.php');

            } else {
                  redirect('MSport/');
            }
    }
public function manageclub(){
      if ($this->session->userdata('username')) {
       $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('MKilaboota/manage');
            $this->load->view('layout/footer.php');

            } else {
                  redirect('MSport');
            }
    }

public function saveclub() {
            $result = $this->mk->saveclub();
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Registerd');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Registerd Please try again');
            }
            redirect('MSport/manageclub');
      }
 public function Updateclub($k_id) {
            $result = $this->mk->Updateclub($k_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Updated Users');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed to Updated try Again');
            }
            redirect('MSport/manageclub');
      }


public function deleteclub($k_id) {
            $result = $this->mk->deleteclub($k_id);
            if ($result) {
                  $this->session->set_flashdata('success_msg', 'Successfully Deleted');
            } else {
                  $this->session->set_flashdata('error_msg', 'Failed To Deleted Please Try Again');
            }
            redirect('MSport/manageclub');
      }


  }
