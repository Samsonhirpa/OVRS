<?php  
 class Main_model extends CI_Model  
 { 
      function getfreeip(){

        echo $this->db->count_all('freeip');
      }


      function is_email_available($remaining)  
      {  
           $this->db->where('remaining', $remaining);  
           $query = $this->db->get("ntacustomers");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
       function is_lanip_available($lanip)  
      {  
           $this->db->where('lanip', $lanip);  
           $query = $this->db->get("freeip");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
 function is_email_available1($ipid)  
      {  
           $this->db->where('ipid', $ipid);  
           $query = $this->db->get("carboncopy");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
       function is_lanip_available1($lanip)  
      {  
           $this->db->where('lanip', $lanip);  
           $query = $this->db->get("carboncopy");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  

      function check_carbonid_avalibility($ipid)  
      {  
           $this->db->where('ipid', $ipid);  
           $query = $this->db->get("carboncopy");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
       function check_carbonlan_avalibility($lanip)  
      {  
           $this->db->where('lanip', $lanip);  
           $query = $this->db->get("carboncopy");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  

      function check_terminateid_avalibility($ipid)  
      {  
           $this->db->where('ipid', $ipid);  
           $query = $this->db->get("terminate_letter");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
       function check_terminatelan_avalibility($lanip)  
      {  
           $this->db->where('lanip', $lanip);  
           $query = $this->db->get("terminate_letter");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
 }  
 ?>