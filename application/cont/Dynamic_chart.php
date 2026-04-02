<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dynamic_chart extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('dynamic_chart_model');
 }

 function index()
 {
  if($this->session->userdata('username')){
    $this->load->view('layout/header');
    $this->load->view('layout/topmenu');
    $this->load->view('layout/sidemenu');
  $data['year_list'] = $this->dynamic_chart_model->fetch_year();
  $this->load->view('dynamic_chart', $data);
  $this->load->view('layout/footer');

    }
        else
  {
    redirect('BDDDDOcontroller');
  }

 }

 function fetch_data()
 {
  if($this->input->post('year'))
  {
   $chart_data = $this->dynamic_chart_model->fetch_chart_data($this->input->post('year'));
   
   foreach($chart_data->result_array() as $row)
   {
    $output[] = array(
     'month'  => $row["month"],
     'totpopulation' => floatval($row["totpopulation"])
    );
   }
   echo json_encode($output);
  }
 }


 function totchild()
 {
  if($this->session->userdata('username')){
    $this->load->view('layout/header');
    $this->load->view('layout/topmenu');
    $this->load->view('layout/sidemenu');
  $data['year_list'] = $this->dynamic_chart_model->fetch_year2();
  $this->load->view('dynamic_chart2', $data);
  $this->load->view('layout/footer');

    }
        else
  {
    redirect('BDDDDOcontroller');
  }

 }

 function fetch_data2()
 {
  if($this->input->post('year'))
  {
   $chart_data = $this->dynamic_chart_model->fetch_chart_data2($this->input->post('year'));
   
   foreach($chart_data->result_array() as $row)
   {
    $output[] = array(
     'month'  => $row["month"],
     'totchild' => floatval($row["totchild"])
    );
   }
   echo json_encode($output);
  }
 }
 
}

?>


