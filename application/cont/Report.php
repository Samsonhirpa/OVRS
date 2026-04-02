<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report
 *
 * @author HP
 */
class Report extends CI_Controller {
      //put your code here
      public function __construct() {
            parent::__construct();
            $this->load->model('Report_model','rpt');
            $this->load->model('Structure_model','str');
      }
      public function AllReport()
      {
            if ($this->session->userdata('username')) {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('report/report');
            $this->load->view('layout/footer');
             }
            else
      {
            redirect('Report');
      }
      }

      public function AllReport_info()
      {
            if ($this->session->userdata('username')) {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('report/all_report');
            $this->load->view('layout/footer');
             }
            else
      {
            redirect('Report');
      }
      }
      public function Generate_report()
      {
            if ($this->session->userdata('username')) {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('report/regional_report');
            $this->load->view('layout/footer');
            }
            else
      {
            redirect('Report');
      }
      }

      public function ChildfrendReport()
      {
            if ($this->session->userdata('username')) {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('report/Childfrendreport');
            $this->load->view('layout/footer');
             }
            else
      {
            redirect('Report');
      }
      }

      public function childfriemdly_report()
      {
            if ($this->session->userdata('username')) {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('report/childfriemdly_report');
            $this->load->view('layout/footer');
            }
            else
      {
            redirect('Report');
      }
      }

      public function ovcs_report()
      {
            if ($this->session->userdata('username')) {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('report/ovcs_report');
            $this->load->view('layout/footer');
            }
            else
      {
            redirect('Report');
      }
      }

      public function disabled_report()
      {
            if ($this->session->userdata('username')) {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('report/disabled_report');
            $this->load->view('layout/footer');
            }
            else
      {
            redirect('Report');
      }
      }


      public function ipreport_info()
      {
            if ($this->session->userdata('username')) {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ipmanage_report/ip_report');
            $this->load->view('layout/footer');
             }
            else
      {
            redirect('Report');
      }
      }

      public function zone_report()
      {
            if ($this->session->userdata('username')) {
            $this->load->view('layout/header');
            $this->load->view('layout/topmenu');
            $this->load->view('layout/sidemenu');
            $this->load->view('ipmanage_report/zone_report');
            $this->load->view('layout/footer');
            }
            else
      {
            redirect('Report');
      }
      }
}
