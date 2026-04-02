
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Structure_model
 *
 * @author HP
 */
class Structure_model extends CI_Model {

      //put your code here
 
  public function Add_scWoreda() {
            $data = array(
                'sbw_name' => $this->input->post('sbw_name'),
                'city_id' => $this->input->post('city_id'),
                'sbcity_id' => $this->input->post('sbcity_id'),
                
                
            );
            $query = $this->db->insert('subcity_woreda', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Delete_scWoreda($id) {
            $this->db->where('sbw_id', $id);
            $query = $this->db->delete('subcity_woreda');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }
 public function getSubcitywd()
      {
            $this->db->select('*');
            $this->db->order_by('sbw_id', 'DESC');
            $this->db->from('subcity_woreda');
            $this->db->join('city', 'city.cid = subcity_woreda.city_id', 'left');
            $this->db->join('subcity', 'subcity.subcity_id = subcity_woreda.sbcity_id', 'left');
           
         
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
 
  public function Add_subcity() {
            $data = array(
                'subcity_name' => $this->input->post('subcity_name'),
                'city_id' => $this->input->post('city_id'),
                'region_id' => 1,
                'citydescription ' => $this->input->post('city_description'),
               
            );
            $query = $this->db->insert('subcity', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Delete_subcity($id) {
            $this->db->where('subcity_id', $id);
            $query = $this->db->delete('subcity');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }
 public function getnewSubCity()
      {
            $this->db->select('*');
            $this->db->order_by('subcity_id', 'DESC');
            $this->db->from('subcity');
            $this->db->join('city', 'city.cid = subcity.city_id', 'left');
           
         
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

         public function getnewcity() {
            $this->db->select('*');
            $this->db->from('city');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
  
  public function Add_city() {
            $data = array(
                'cname' => $this->input->post('city_name'),
                'region_id' => 1,
                'citydescription ' => $this->input->post('city_description'),
               
            );
            $query = $this->db->insert('city', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Delete_city($id) {
            $this->db->where('cid', $id);
            $query = $this->db->delete('city');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }
 public function getcity()
      {
            $this->db->select('*');
            $this->db->order_by('cid', 'DESC');
            // $this->db->where('zone_id', $user);
            $this->db->from('city');
            // $this->db->join('zone', 'zone.zid = kebele.zone_id', 'left');
            // $this->db->join('woreda', 'woreda.woreda_id = kebele.wid', 'left');
         
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
  public function getKebelenew($user)
      {
            $this->db->select('*');
            $this->db->order_by('kid', 'DESC');
            $this->db->where('zone_id', $user);
            $this->db->from('kebele');
            $this->db->join('zone', 'zone.zid = kebele.zone_id', 'left');
            $this->db->join('woreda', 'woreda.woreda_id = kebele.wid', 'left');
         
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
public function Addkebele() {
            $data = array(
                'kname' => $this->input->post('kname'),
                'region_id' => 1,
                'zone_id' => $this->input->post('zone_id'),
                'kebele_code' => $this->input->post('kebele_code'),
                'wid' => $this->input->post('wid'),
                'Kebele_description' => $this->input->post('Kebele_description'),
            );
            $query = $this->db->insert('kebele', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Delete_kebele($id) {
            $this->db->where('kid', $id);
            $query = $this->db->delete('kebele');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function Edit_kebele($id) {

            $data = array(
               'kname' => $this->input->post('kname'),
                'region_id' => 1,
                'zone_id' => $this->input->post('zone_id'),
                'kebele_code' => $this->input->post('kebele_code'),
                'wid' => $this->input->post('wid'),
                'Kebele_description' => $this->input->post('Kebele_description'),
            );
            $this->db->where('kid', $id);
            $query = $this->db->update('kebele', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

 
 public function getdash()
  {
    $this->db->where('username',$this->session->userdata('username'));
    $this->db->join('zone', 'zone.zid = useraccount.zone_id', 'left');
    $this->db->join('city', 'city.cid = useraccount.magala_id', 'left');
   $this->db->join('woreda', 'woreda.woreda_id = useraccount.woreda_id', 'left');
  $this->db->join('role', 'role.role_id = useraccount.role_id', 'left');
  $this->db->join('gender','gender.gender_id = useraccount.gender_id','left');

    $this->db->from('useraccount');
     $query=$this->db->get();
    
    if($query)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
    
  }
public function Updateembacystatus($em_id) {
            $operator= $this->session->userdata('username');
           
            $data = array(
                // 'nt_id' => $nt_id,
                'embstatus' => $this->input->post('embstatus'),
                
            );


            $this->db->where('em_id', $em_id);
            $query = $this->db->update('embacyday', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }
 public function downloadSchedule($em_id){
                        $query = $this->db->get_where('embacyday',array('em_id'=>$em_id));
                        return $query->row_array();
                }
 
  public function Delete_Schedule($em_id) {
            $this->db->where('em_id', $em_id);
            $query = $this->db->delete('embacyday');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }
    public function getcustorschedule() {
            $this->db->select('*');
            $this->db->where('permitstatus ', 2);
            // $this->db->where('visastatus ', 0);

            $this->db->from('ntacustomers');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

       public function getschedule(){

   $this->db->join('ntacustomers', 'ntacustomers.id = embacyday.customer_id', 'left');
    $this->db->select('*');
    // $this->db->order_by('em_id' , 'DESC');
    $this->db->from('embacyday');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 















 public function flight_status($post)
  {
     $operator= $this->session->userdata('username');
         
    $data=array(

      
      'flightstatus'=>0,
      'flightstatus'=>1,
      'flightstatus'=>2,
      
    );
    $this->db->where('flt_id',$post);
    $query=$this->db->update('flightday',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  } 
public function downloadticket($flt_id){
                        $query = $this->db->get_where('flightday',array('flt_id'=>$flt_id));
                        return $query->row_array();
                }
 
  public function Delete_Flight($flt_id) {
            $this->db->where('flt_id', $flt_id);
            $query = $this->db->delete('flightday');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

       public function getcustomerticket(){
$todaydate =date('Y-m-d');
   $this->db->join('ntacustomers', 'ntacustomers.id = flightday.customer_id', 'left');
    $this->db->select('*');
    $this->db->where('flightdate >=' , $todaydate);

    $this->db->from('flightday');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
         public function getcustomerticketpass(){
$todaydate =date('Y-m-d');
   $this->db->join('ntacustomers', 'ntacustomers.id = flightday.customer_id', 'left');
    $this->db->select('*');
    $this->db->where('flightdate <=' , $todaydate );
    // $this->db->where('flightstatus >=' , 2);

    $this->db->from('flightday');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }









    public function getexpire($id = null)
    {
        if($id) {
            $sql = "SELECT * FROM ntacustomers where id = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }

        $sql = "SELECT * FROM ntacustomers";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 function checkpayment($remaining)  
      {  
           $this->db->where('finalpay', $remaining);  
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

  public function download($cf_id){
                        $query = $this->db->get_where('custfile',array('cf_id'=>$cf_id));
                        return $query->row_array();
                }
 
  public function Delete_Doc($cf_id) {
            $this->db->where('cf_id', $cf_id);
            $query = $this->db->delete('custfile');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }
    public function getcusto() {
            $this->db->select('*');
            $this->db->from('ntacustomers');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

       public function getcustomerfile(){

   $this->db->join('ntacustomers', 'ntacustomers.id = custfile.customer_id', 'left');
    $this->db->select('*');
    $this->db->order_by('cf_id' , 'DESC');
    $this->db->from('custfile');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
   public function getonprocesscustomers(){

   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
    $this->db->where('process_status ', 0);

    $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
public function update_enccustomer($id) {
            $operator= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');

            $data = array(
                // 'nt_id' => $nt_id,
                'fullname' => $this->input->post('fullname'),
                'sex' => $this->input->post('sex'),
                'mothername' => $this->input->post('mothername'),
                'phone' => $this->input->post('phone'),
                'phone2' => $this->input->post('phone2'),
                'notify' => $this->input->post('notify'),
               
                'profession' => $this->input->post('profession'),
                'agent_id' => $this->input->post('agent_id'),
                'company_id' => $this->input->post('company_id'),
                'xdateofcrime' => $this->input->post('xdateofcrime'),
                'totalpayment' => $this->input->post('totalpayment'),
                'downpayment' => $this->input->post('downpayment'),
                'remaining' => $this->input->post('remaining'),
                'refundammount' => $this->input->post('downpayment'),


               

                
            );
 $dtc= date_create($this->input->post('created_date'));
        date_add($dtc,date_interval_create_from_date_string("1 days"));
        $today= date_create(date('Y-m-d'));
        //if $datacreated = > to date
        if( $dtc >= $today){


            $this->db->where('id', $id);
            $query = $this->db->update('ntacustomers', $data);
            if($query)
                    {
                        return true;
                    }
                    else
                    {
                return false;
                    }
        }
        else{
        return false;
    }
      }
public function getmanagerefund(){

   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
    $this->db->where('refundstatus ', 0);
    $this->db->where('permitstatus ', 0);
    $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
  public function getrefunded(){

   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    // $this->db->order_by('id' , 'DESC');
    $this->db->where('refundstatus ', 2);
    $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
    public function refund_status($post)
  {
     $operator= $this->session->userdata('username');
         
    $data=array(

      
      'refundstatus'=>0,
      'refundstatus'=>1,
      'refundstatus'=>2,
      'refundedby' => $operator,
      
      'downpayment' => 0,
    );
    $this->db->where('id',$post);
    $query=$this->db->update('ntacustomers',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  } 
public function peyment_status($post)
  {
     $operator= $this->session->userdata('username');

    $data=array(

      
      'process_status'=>0,
      'process_status'=>1,
      'process_status'=>2,
      'paymentapprovedby' => $operator,
      'remaining' => 0,

     
      
      
    );
    $this->db->where('id',$post);
    $query=$this->db->update('ntacustomers',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  } 

 public function getntcustomervisa(){

   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
    $this->db->where('permitstatus ', 2);
    $this->db->where('visastatus ', 0);
    $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
 public function getsuccesscustomers(){

   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
    $this->db->where('permitstatus ', 2);
    $this->db->where('visastatus ', 2);
    $this->db->where('process_status ', 2);
    $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
   public function getpermitpeyment(){

   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
    $this->db->where('permitpay ', '');
    $this->db->where('refundstatus ', 0);

    $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
  //   public function getpermitpeyment(){

  //  $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
  //           $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
  //   $this->db->select('*');
  //   $this->db->order_by('id' , 'DESC');
  //   $this->db->from('ntacustomers');
  //   $query = $this->db->get();
  //   if($query)
  //   {
  //     return $query->result();
  //   }
  // }

   public function getcustomerpeyment(){

   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
    $this->db->where('permitstatus ', 2);
    $this->db->where('visastatus ', 2);
    $this->db->where('process_status ', 0);
    $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }



public function visa_status($post)
  {
     $operator= $this->session->userdata('username');

    $data=array(

      
      'visastatus'=>0,
      'visastatus'=>1,
      'visastatus'=>2,
      'visaapprovedby' => $operator,

     
      
      
    );
    $this->db->where('id',$post);
    $query=$this->db->update('ntacustomers',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  } 


 

  public function getntcustomerpermit(){
   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
    $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
    $this->db->where('permitstatus ', 0);
    $this->db->where('permitpay != ', '');
  $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
 public function getntcustomercrime(){
$todaydate =date('Y-m-d');
   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
    $this->db->where('visastatus ', 0);
    $this->db->where('refundstatus ', 0);
    $this->db->where('notify >=' , $todaydate);
    // $this->db->where('notify' >= GETDATE());

    $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
public function getntcustomerexcrime(){
$todaydate =date('Y-m-d');
   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
    $this->db->where('process_status ', 0);
    $this->db->where('refundstatus ', 0);
    $this->db->where('expire >=' , $todaydate);
    
    // $this->db->where('notify' >= GETDATE());

    $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }

public function permit_status($post)
  {
     $operator= $this->session->userdata('username');
         
    $data=array(

      
      'permitstatus'=>0,
      'permitstatus'=>1,
      'permitstatus'=>2,
      'permitapprovedby' => $operator,
     
      
      
    );
    $this->db->where('id',$post);
    $query=$this->db->update('ntacustomers',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  } 

   public function getntcustomers(){

   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
    $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }  
   public function getntcustomersenc($user){

   $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');        
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
    $this->db->where('operator',$user);
    $this->db->from('ntacustomers');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
public function save_customer() {
            $operator= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('username');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            // $nt_id = 'NTA-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
          
  
            $data = array(
                
                'fullname' => $this->input->post('fullname'),
                'sex' => $this->input->post('sex'),
                'mothername' => $this->input->post('mothername'),
                'phone' => $this->input->post('phone'),
                'phone2' => $this->input->post('phone2'),
                'notify' => $this->input->post('notify'),
               
                'profession' => $this->input->post('profession'),
                'agent_id' => $this->input->post('agent_id'),
                'company_id' => $this->input->post('company_id'),
                'xdateofcrime' => $this->input->post('xdateofcrime'),
                'totalpayment' => $this->input->post('totalpayment'),
                'downpayment' => $this->input->post('downpayment'),
                'refundammount' => $this->input->post('downpayment'),
                'remaining' => $this->input->post('remaining'),
                'operator' => $operator,

                
            );
            $query = $this->db->insert('ntacustomers', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }
public function update_customer($id) {
            $operator= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');

            $data = array(
                // 'nt_id' => $nt_id,
                'fullname' => $this->input->post('fullname'),
                'sex' => $this->input->post('sex'),
                'mothername' => $this->input->post('mothername'),
                'phone' => $this->input->post('phone'),
                'phone2' => $this->input->post('phone2'),
                'notify' => $this->input->post('notify'),
                'permitpay' => $this->input->post('permitpay'),
               
                'profession' => $this->input->post('profession'),
                'agent_id' => $this->input->post('agent_id'),
                'company_id' => $this->input->post('company_id'),
                'xdateofcrime' => $this->input->post('xdateofcrime'),
                'totalpayment' => $this->input->post('totalpayment'),
                'downpayment' => $this->input->post('downpayment'),
                'remaining' => $this->input->post('remaining'),
                'refundammount' => $this->input->post('downpayment'),


                
            );


            $this->db->where('id', $id);
            $query = $this->db->update('ntacustomers', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }
  public function edit_customer($id)
  {
    $this->db->where('id',$id);

           $this->db->join('customer', 'customer.c_id = ntacustomers.agent_id', 'left');
            $this->db->join('project', 'project.p_id = ntacustomers.company_id', 'left');
           
    $query=$this->db->get('ntacustomers');
    if($query)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
  } 

   public function Delete_customer($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('ntacustomers');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

public function saveemployee() {
            $data = array(
                'first_name' => $this->input->post('fname'),
               
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'gender_id' => $this->input->post('sex'),
                'phoneno' => $this->input->post('phoneno'),
                'dob' => $this->input->post('dob'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role'),
                
            );
            $query = $this->db->insert('useraccount', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }
      
  public function getencrent($user){
 $this->db->join('customer', 'customer.c_id = collection.customer_id', 'left');
            $this->db->join('project', 'project.p_id = collection.project_id', 'left');
            $this->db->join('type', 'type.t_id = collection.type_id', 'left');
            $this->db->join('vihcle', 'vihcle.v_id = collection.vehicle_id', 'left');
            $this->db->join('payment', 'payment.py_id = collection.payment_id', 'left');
          
    $this->db->select('*');
    $this->db->order_by('id' , 'DESC');
     $this->db->where('operator',$user);
    $this->db->from('collection');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
 public function vendor_status($post)
  {
    $data=array(

      
      'vendor_status'=>0,
      'vendor_status'=>1,
      'vendor_status'=>2,
     
      'netpayable'=>0.00,
      
    );
    $this->db->where('id',$post);
    $query=$this->db->update('collection',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  } 

  public function edit_rent($id)
  {
    $this->db->where('id',$id);

           $this->db->join('customer', 'customer.c_id = collection.customer_id', 'left');
            $this->db->join('project', 'project.p_id = collection.project_id', 'left');
            $this->db->join('type', 'type.t_id = collection.type_id', 'left');
            $this->db->join('vihcle', 'vihcle.v_id = collection.vehicle_id', 'left');
            $this->db->join('payment', 'payment.py_id = collection.payment_id', 'left');
            

    $query=$this->db->get('collection');
    if($query)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
  } 


  public function collection_status($post)
  {
    $data=array(

      
      'collection_status'=>0,
      'collection_status'=>1,
      'collection_status'=>2,
      'status'=>'Collected',
      'netpayable1'=>0.00,
      
    );
    $this->db->where('id',$post);
    $query=$this->db->update('collection',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }
public function getrent3() {

           $this->db->join('customer', 'customer.c_id = collection.customer_id', 'left');
            $this->db->join('project', 'project.p_id = collection.project_id', 'left');
            $this->db->join('type', 'type.t_id = collection.type_id', 'left');
            $this->db->join('vihcle', 'vihcle.v_id = collection.vehicle_id', 'left');
            $this->db->join('payment', 'payment.py_id = collection.payment_id', 'left');
            

            $this->db->select('*');
            // $this->db->where('statusv ', "Not Collected");
            $this->db->where('vendor_status ', 0);
            $this->db->order_by('id','desc');
            $this->db->from('collection');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }

public function getrent2() {

           $this->db->join('customer', 'customer.c_id = collection.customer_id', 'left');
            $this->db->join('project', 'project.p_id = collection.project_id', 'left');
            $this->db->join('type', 'type.t_id = collection.type_id', 'left');
            $this->db->join('vihcle', 'vihcle.v_id = collection.vehicle_id', 'left');
            $this->db->join('payment', 'payment.py_id = collection.payment_id', 'left');
            

            $this->db->select('*');
            $this->db->where('status ', "Not Collected");
            $this->db->where('collection_status ', 0);
            $this->db->order_by('id','desc');
            $this->db->from('collection');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }

public function getpayed() {

           $this->db->join('customer', 'customer.c_id = collection.customer_id', 'left');
            $this->db->join('project', 'project.p_id = collection.project_id', 'left');
            $this->db->join('type', 'type.t_id = collection.type_id', 'left');
            $this->db->join('vihcle', 'vihcle.v_id = collection.vehicle_id', 'left');
            $this->db->join('payment', 'payment.py_id = collection.payment_id', 'left');
          

            $this->db->select('*');
            $this->db->where('status ', "Collected");
            // $this->db->where('collection_status ', 2);
            // $this->db->where('status1 ', 2);
            $this->db->order_by('id','desc');
            $this->db->from('collection');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }
public function getcompletepayed() {

           $this->db->join('customer', 'customer.c_id = collection.customer_id', 'left');
            $this->db->join('project', 'project.p_id = collection.project_id', 'left');
            $this->db->join('type', 'type.t_id = collection.type_id', 'left');
            $this->db->join('vihcle', 'vihcle.v_id = collection.vehicle_id', 'left');
            $this->db->join('payment', 'payment.py_id = collection.payment_id', 'left');
          

            $this->db->select('*');
            $this->db->where('vendor_status ',2);
            // $this->db->where('collection_status ', 2);
            // $this->db->where('status1 ', 2);
            $this->db->order_by('id','desc');
            $this->db->from('collection');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }

public function getrent() {

            $this->db->join('customer', 'customer.c_id = collection.customer_id', 'left');
            $this->db->join('project', 'project.p_id = collection.project_id', 'left');
            $this->db->join('type', 'type.t_id = collection.type_id', 'left');
            $this->db->join('vihcle', 'vihcle.v_id = collection.vehicle_id', 'left');
            $this->db->join('payment', 'payment.py_id = collection.payment_id', 'left');
          

            $this->db->select('*');
            $this->db->order_by('id','desc');
            $this->db->from('collection');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }


public function save_rent() {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('username');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
            $ref_no = 'SOF-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));

            $data = array(
                'refno' => $ref_no,
                'customer_id' => $this->input->post('customer_id'),
                'type_id' => $this->input->post('type_id'),
                'vehicle_id' => $this->input->post('vehicle_id'),
                'payment_id' => $this->input->post('payment_id'),
                'project_id' => $this->input->post('project_id'),
                'vehicle_id' => $this->input->post('vehicle_id'),
                'plateno' => $this->input->post('plateno'),
                's_date' => $this->input->post('s_date'),
                'e_date' => $this->input->post('e_date'),
                't_date' => $this->input->post('t_date'),
                'payperday' => $this->input->post('payperday'),               
                'cost' => $this->input->post('cost'),
                'advance' => $this->input->post('advance'),
                'name' => $this->input->post('name'),
                'vatot' => $this->input->post('vatot'),
                'gross' => $this->input->post('gross'),
                'withhold' => $this->input->post('withhold'),
                'paid' => $this->input->post('paid'),
                'other' => $this->input->post('other'),
                'totalded' => $this->input->post('totalded'),
                'netpayable' => $this->input->post('netpayable'),
                's_date1' => $this->input->post('s_date1'),
                'e_date1' => $this->input->post('e_date1'),
                't_date1' => $this->input->post('t_date1'),
                'payperday1' => $this->input->post('payperday1'),               
                'cost1' => $this->input->post('cost1'),
                'advance1' => $this->input->post('advance1'),
                'name1' => $this->input->post('name1'),
                'vatot1' => $this->input->post('vatot1'),
                'gross1' => $this->input->post('gross1'),
                'withhold1' => $this->input->post('withhold1'),
                'paid1' => $this->input->post('paid1'),
                'other1' => $this->input->post('other1'),
                'totalded1' => $this->input->post('totalded1'),
                'netpayable1' => $this->input->post('netpayable1'),
                'status' => $this->input->post('status'),
                'operator' => $username,
                // 'created_by' => $username,
            );
            $query = $this->db->insert('collection', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
     

public function update_rent($id) {
            $data = array(
               
                'customer_id' => $this->input->post('customer_id'),
                'type_id' => $this->input->post('type_id'),
                'vehicle_id' => $this->input->post('vehicle_id'),
                'payment_id' => $this->input->post('payment_id'),
                'project_id' => $this->input->post('project_id'),
                'vehicle_id' => $this->input->post('vehicle_id'),
                'plateno' => $this->input->post('plateno'),
                's_date' => $this->input->post('s_date'),
                'e_date' => $this->input->post('e_date'),
                't_date' => $this->input->post('t_date'),
                'payperday' => $this->input->post('payperday'),               
                'cost' => $this->input->post('cost'),
                'advance' => $this->input->post('advance'),
                'name' => $this->input->post('name'),
                'vatot' => $this->input->post('vatot'),
                'gross' => $this->input->post('gross'),
                'withhold' => $this->input->post('withhold'),
                'paid' => $this->input->post('paid'),
                'other' => $this->input->post('other'),
                'totalded' => $this->input->post('totalded'),
                'netpayable' => $this->input->post('netpayable'),
                's_date1' => $this->input->post('s_date1'),
                'e_date1' => $this->input->post('e_date1'),
                't_date1' => $this->input->post('t_date1'),
                'payperday1' => $this->input->post('payperday1'),               
                'cost1' => $this->input->post('cost1'),
                'advance1' => $this->input->post('advance1'),
                'name1' => $this->input->post('name1'),
                'vatot1' => $this->input->post('vatot1'),
                'gross1' => $this->input->post('gross1'),
                'withhold1' => $this->input->post('withhold1'),
                'paid1' => $this->input->post('paid1'),
                'other1' => $this->input->post('other1'),
                'totalded1' => $this->input->post('totalded1'),
                'netpayable1' => $this->input->post('netpayable1'),
                'status' => $this->input->post('status'),
            );
            $this->db->where('id', $id);
            $query = $this->db->update('collection', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }


public function update_rent1($id) {
            $data = array(
               
                'customer_id' => $this->input->post('customer_id'),
                'type_id' => $this->input->post('type_id'),
                'vehicle_id' => $this->input->post('vehicle_id'),
                'payment_id' => $this->input->post('payment_id'),
                'project_id' => $this->input->post('project_id'),
                'vehicle_id' => $this->input->post('vehicle_id'),
                'plateno' => $this->input->post('plateno'),
                's_date' => $this->input->post('s_date'),
                'e_date' => $this->input->post('e_date'),
                't_date' => $this->input->post('t_date'),
                'payperday' => $this->input->post('payperday'),               
                'cost' => $this->input->post('cost'),
                'advance' => $this->input->post('advance'),
                'name' => $this->input->post('name'),
                'vatot' => $this->input->post('vatot'),
                'gross' => $this->input->post('gross'),
                'withhold' => $this->input->post('withhold'),
                'paid' => $this->input->post('paid'),
                'other' => $this->input->post('other'),
                'totalded' => $this->input->post('totalded'),
                'netpayable' => $this->input->post('netpayable'),
                's_date1' => $this->input->post('s_date1'),
                'e_date1' => $this->input->post('e_date1'),
                't_date1' => $this->input->post('t_date1'),
                'payperday1' => $this->input->post('payperday1'),               
                'cost1' => $this->input->post('cost1'),
                'advance1' => $this->input->post('advance1'),
                'name1' => $this->input->post('name1'),
                'vatot1' => $this->input->post('vatot1'),
                'gross1' => $this->input->post('gross1'),
                'withhold1' => $this->input->post('withhold1'),
                'paid1' => $this->input->post('paid1'),
                'other1' => $this->input->post('other1'),
                'totalded1' => $this->input->post('totalded1'),
                'netpayable1' => $this->input->post('netpayable1'),
                'status' => $this->input->post('status'),
            );


if( $collection_status = 0){
    $this->db->where('id',$id);
    $query=$this->db->update('collection',$data);
   
            $this->db->where('id', $id);
            $query = $this->db->update('collection', $data);
            
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }
      else {
                  return false;
            }

  }






// $dtc= date_create($this->input->post('datecreated'));
//     date_add($dtc,date_interval_create_from_date_string("1 days"));
//     $today= date_create(date('Y-m-d'));
//     //if $datacreated = > to date
//     if( $dtc >= $today){
//     $this->db->where('id',$id);
//     $query=$this->db->update('collection',$data);
//     if($query)
//     {
//       return true;
//     }
//     else
//     {
//       return false;
//     }
//     }
//     else
//     {
//       return false;
//     }

//   }




 function getcustomer() {
            $this->db->select('*');
            $this->db->from('customer');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }


 function getproject() {
            $this->db->select('*');
            $this->db->from('project');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }

function gettypev() {
            $this->db->select('*');
            $this->db->from('type');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }

function getpytype() {
            $this->db->select('*');
            $this->db->from('payment');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }


public function getvehicletype() {
            $sid = $this->input->post('sid');
            $this->db->where('type_id', $sid);

            $query = $this->db->get('vihcle');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }


public function Add_Vendor() {
            $data = array(
                'c_name' => $this->input->post('c_name'),
                'pphone' => $this->input->post('pphone'),
                'pemail' => $this->input->post('pemail'),
             
                'c_desc' => $this->input->post('c_desc'),
            );
            $query = $this->db->insert('customer', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Delete_rent($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('collection');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }   
public function Delete_Vendor($c_id) {
            $this->db->where('c_id', $c_id);
            $query = $this->db->delete('customer');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

 public function Edit_Vendor($c_id) {
            $data = array(
                'c_name' => $this->input->post('c_name'),
               'pphone' => $this->input->post('pphone'),
                'pemail' => $this->input->post('pemail'),
                'c_desc' => $this->input->post('c_desc'),
            
            );
            $this->db->where('c_id', $c_id);
            $query = $this->db->update('customer', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function Add_Project() {
            $data = array(
                'p_name' => $this->input->post('p_name'),
              'caddress' => $this->input->post('caddress'),
                'cemail' => $this->input->post('cemail'),
                'p_desc' => $this->input->post('p_desc'),
            );
            $query = $this->db->insert('project', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Delete_Project($p_id) {
            $this->db->where('p_id', $p_id);
            $query = $this->db->delete('project');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

 public function Edit_Project($c_id) {
            $data = array(
                'p_name' => $this->input->post('p_name'),
               'caddress' => $this->input->post('caddress'),
                'cemail' => $this->input->post('cemail'),
                'p_desc' => $this->input->post('p_desc'),
            
            );
            $this->db->where('p_id', $p_id);
            $query = $this->db->update('project', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }


 public function status($post)
  {
    $data=array(

      
     'status1'=>0,
      'status1'=>1,
      'status1'=>2,
      
    );
    $this->db->where('r_id',$post);
    $query=$this->db->update('rent2',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }
























































public function filter()
  {
    $this->db->where('sala_id','sala_id');
    $this->db->where('dhalotaG_id','dhalotaG_id');
     $this->db->join('woreda', 'woreda.woreda_id = cabine.woreda_id', 'left');
            $this->db->join('zone', 'zone.zid = cabine.zon_id', 'left');
            $this->db->join('gender', 'gender.gender_id = cabine.sala_id', 'left');
            $this->db->join('haalamaati', 'haalamaati.id = cabine.haalamaati', 'left');

    $query=$this->db->get('cabine');
    if($query)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
  }
   public function editcabine($id)
  {
    $this->db->where('cab_id',$id);
     $this->db->join('woreda', 'woreda.woreda_id = cabine.woreda_id', 'left');
            $this->db->join('zone', 'zone.zid = cabine.zon_id', 'left');
            $this->db->join('gender', 'gender.gender_id = cabine.sala_id', 'left');
            $this->db->join('haalamaati', 'haalamaati.id = cabine.haalamaati', 'left');

    $query=$this->db->get('cabine');
    if($query)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
  } 
public function editcabine2($id)
  {
    $this->db->where('c_id',$id);

            $this->db->join('cabine', 'cabine.cab_id = cabine2.maqa_id');
            $this->db->join('woreda', 'woreda.woreda_id = cabine2.woreda', 'left');
            $this->db->join('zone', 'zone.zid = cabine2.zone_id', 'left');
            // $this->db->join('haalamaati', 'haalamaati.id = cabine2.haalamaati', 'left');
            $this->db->join('gender', 'gender.gender_id = cabine.sala_id', 'left');
            $this->db->join('university', 'university.u_id = cabine2.university_id', 'left');
            $this->db->join('years', 'years.id = cabine2.muxannoo', 'left');
            $this->db->join('year', 'year.y_id = cabine2.muxano_hog', 'left');
            $this->db->join('sektera', 'sektera.s_id = cabine2.sector', 'left');
            $this->db->join('title', 'title.t_id = cabine2.mudama_amma', 'left');
            $this->db->join('sadarka', 'sadarka.sd_id = cabine2.sadarkaB', 'left');
            
            $this->db->join('level', 'level.l_id = cabine2.level', 'left');
            $this->db->join('qabxi', 'qabxi.q_id = cabine2.qabxi', 'left');
           


    $query=$this->db->get('cabine2');
    if($query)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
  } 

public function deletecabineprofile($id) {
            $this->db->where('cab_id', $id);
            $query = $this->db->delete('cabine');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }public function deletecomment($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('ipcomment');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }
public function deletecabineprofile2($id) {
            $this->db->where('c_id', $id);
            $query = $this->db->delete('cabine2');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }

 

public function getuniversity(){

    $this->db->select('*');
    $this->db->from('university');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
 public function getwored(){

    $this->db->select('*');
    $this->db->from('woreda');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
  public function getqabxi(){

    $this->db->select('*');
    $this->db->from('qabxi');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
  public function getlevel(){

    $this->db->select('*');
    $this->db->from('level');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
  public function getsector(){

    $this->db->select('*');
    $this->db->from('sektera');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
 public function getsadarka(){

    $this->db->select('*');
    $this->db->from('sadarka');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
 public function getmudama(){

    $this->db->select('*');
    $this->db->from('title');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
  public function getcabineprofile(){

    $this->db->select('*');
    $this->db->from('cabine');
    $this->db->join('woreda', 'woreda.woreda_id = cabine.woreda_id', 'left');
    $this->db->join('zone', 'zone.zid = cabine.zon_id', 'left');
    $this->db->join('gender', 'gender.gender_id = cabine.sala_id', 'left');
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 


 public function getempcabineprofile($user)
      {
            $this->db->select('*');
            $this->db->order_by('cab_id' , 'DESC');
            $this->db->from('cabine');
    $this->db->join('woreda', 'woreda.woreda_id = cabine.woreda_id', 'left');
    $this->db->join('zone', 'zone.zid = cabine.zon_id', 'left');
    $this->db->join('gender', 'gender.gender_id = cabine.sala_id', 'left');
 
            $this->db->where('created_by1',$user);
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }

public function gethogganaa_aanaa($ana)
      {
            $this->db->select('*');
             $this->db->where('requst_status',2);
              $this->db->order_by('c_id' , 'DESC');
             $this->db->from('cabine2');
    $this->db->join('cabine', 'cabine.cab_id = cabine2.maqa_id');
    $this->db->join('woreda', 'woreda.woreda_id = cabine2.woreda', 'left');
    $this->db->join('zone', 'zone.zid = cabine2.zone_id', 'left');
    $this->db->join('university', 'university.u_id = cabine2.university_id', 'left');
    $this->db->join('year', 'year.y_id = cabine2.muxano_hog', 'left');
     
     $this->db->join('years', 'years.id = cabine2.muxannoo', 'left');
   $this->db->join('gender', 'gender.gender_id = cabine.sala_id', 'left');
  $this->db->join('sektera', 'sektera.s_id = cabine2.sector', 'left');
     $this->db->join('title', 'title.t_id = cabine2.mudama_amma', 'left');
     $this->db->join('sadarka', 'sadarka.sd_id = cabine2.sadarkaB', 'left');
            $this->db->where('woreda',$ana);
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
           

            
      }
    public function gethogganaa_godina($god)
      {
            $this->db->select('*');
             $this->db->where('requst_status',2);
              $this->db->order_by('c_id' , 'DESC');
             $this->db->from('cabine2');
    $this->db->join('cabine', 'cabine.cab_id = cabine2.maqa_id');
    $this->db->join('woreda', 'woreda.woreda_id = cabine2.woreda', 'left');
    $this->db->join('zone', 'zone.zid = cabine2.zone_id', 'left');
    $this->db->join('university', 'university.u_id = cabine2.university_id', 'left');
     $this->db->join('years', 'years.id = cabine2.muxannoo', 'left');
            $this->db->join('year', 'year.y_id = cabine2.muxano_hog', 'left');

   $this->db->join('gender', 'gender.gender_id = cabine.sala_id', 'left');
  $this->db->join('sektera', 'sektera.s_id = cabine2.sector', 'left');
     $this->db->join('title', 'title.t_id = cabine2.mudama_amma', 'left');
     $this->db->join('sadarka', 'sadarka.sd_id = cabine2.sadarkaB', 'left');
            $this->db->where('zone_id',$god);
            $this->db->where('woreda_name', "Zone Admin");
            // $this->db->where('zname !=', 'Zone Admin');
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }
    public function getzonecabineprofile2($zon)
      {
            $this->db->select('*');
             // $this->db->where('requst_status',2);
              $this->db->order_by('c_id' , 'DESC');
             $this->db->from('cabine2');
    $this->db->join('cabine', 'cabine.cab_id = cabine2.maqa_id');
    $this->db->join('woreda', 'woreda.woreda_id = cabine2.woreda', 'left');
    $this->db->join('zone', 'zone.zid = cabine2.zone_id', 'left');
    $this->db->join('university', 'university.u_id = cabine2.university_id', 'left');
     $this->db->join('years', 'years.id = cabine2.muxannoo', 'left');
            $this->db->join('year', 'year.y_id = cabine2.muxano_hog', 'left');

   $this->db->join('gender', 'gender.gender_id = cabine.sala_id', 'left');
  $this->db->join('sektera', 'sektera.s_id = cabine2.sector', 'left');
     $this->db->join('title', 'title.t_id = cabine2.mudama_amma', 'left');
     $this->db->join('sadarka', 'sadarka.sd_id = cabine2.sadarkaB', 'left');
            $this->db->where('zone_id',$zon);
            $this->db->where('woreda_name !=',"Zone Admin");
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }
       public function getregioncabineprofile2($zon)
      {
            $this->db->select('*');
             // $this->db->where('requst_status',2);
              $this->db->order_by('c_id' , 'DESC');
             $this->db->from('cabine2');
    $this->db->join('cabine', 'cabine.cab_id = cabine2.maqa_id');
    $this->db->join('woreda', 'woreda.woreda_id = cabine2.woreda', 'left');
    $this->db->join('zone', 'zone.zid = cabine2.zone_id', 'left');
    $this->db->join('university', 'university.u_id = cabine2.university_id', 'left');
     $this->db->join('years', 'years.id = cabine2.muxannoo', 'left');
            $this->db->join('year', 'year.y_id = cabine2.muxano_hog', 'left');


   $this->db->join('gender', 'gender.gender_id = cabine.sala_id', 'left');
  $this->db->join('sektera', 'sektera.s_id = cabine2.sector', 'left');
     $this->db->join('title', 'title.t_id = cabine2.mudama_amma', 'left');
     $this->db->join('sadarka', 'sadarka.sd_id = cabine2.sadarkaB', 'left');
            // $this->db->where('zone_id',$zon);
            $this->db->where('woreda_name',"Zone Admin");
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }
      public function getempcabineprofile2($user)
      {
            $this->db->select('*');
            $this->db->order_by('c_id' , 'DESC');
             $this->db->from('cabine2');
    $this->db->join('cabine', 'cabine.cab_id = cabine2.maqa_id');
    $this->db->join('woreda', 'woreda.woreda_id = cabine2.woreda', 'left');
    $this->db->join('zone', 'zone.zid = cabine2.zone_id', 'left');
    $this->db->join('university', 'university.u_id = cabine2.university_id', 'left');
            $this->db->join('year', 'year.y_id = cabine2.muxano_hog', 'left');
     $this->db->join('years', 'years.id = cabine2.muxannoo', 'left');
     $this->db->join('sektera', 'sektera.s_id = cabine2.sector', 'left');
     $this->db->join('title', 'title.t_id = cabine2.mudama_amma', 'left');
     $this->db->join('sadarka', 'sadarka.sd_id = cabine2.sadarkaB', 'left');
 
            $this->db->where('created_by',$user);
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }

  public function getcabineprofile2(){

    $this->db->select('*');
    $this->db->from('cabine2');

    $this->db->join('cabine', 'cabine.cab_id = cabine2.maqa_id');
    $this->db->join('woreda', 'woreda.woreda_id = cabine2.woreda', 'left');
    $this->db->join('zone', 'zone.zid = cabine2.zone_id', 'left');
    $this->db->join('university', 'university.u_id = cabine2.university_id', 'left');
    $this->db->join('year', 'year.y_id = cabine2.muxano_hog', 'left');
    $this->db->join('years', 'years.id = cabine2.muxannoo', 'left');
    $this->db->join('sektera', 'sektera.s_id = cabine2.sector', 'left');
     $this->db->join('title', 'title.t_id = cabine2.mudama_amma', 'left');
     $this->db->join('sadarka', 'sadarka.sd_id = cabine2.sadarkaB', 'left');
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
public function getcab() {
            $this->db->select('*');
            $this->db->from('cabine2');
             $this->db->where('requst_status',2); 
            $this->db->join('cabine', 'cabine.cab_id = cabine2.maqa_id');
            $this->db->join('woreda', 'woreda.woreda_id = cabine2.woreda', 'left');
            $this->db->join('zone', 'zone.zid = cabine2.zone_id', 'left');
            $this->db->join('gender', 'gender.gender_id = cabine.sala_id', 'left');
           $this->db->join('year', 'year.y_id = cabine2.muxano_hog', 'left');
    $this->db->join('years', 'years.id = cabine2.muxannoo', 'left');
     $this->db->join('university', 'university.u_id = cabine2.university_id', 'left');
           $this->db->join('sektera', 'sektera.s_id = cabine2.sector', 'left');
     $this->db->join('title', 'title.t_id = cabine2.mudama_amma', 'left');
     $this->db->join('sadarka', 'sadarka.sd_id = cabine2.sadarkaB', 'left');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
  public function profileinfo($id){

    $this->db->where('c_id',$id);
    $this->db->join('cabine', 'cabine.cab_id = cabine2.maqa_id');
    $this->db->join('woreda', 'woreda.woreda_id = cabine2.woreda', 'left');
    $this->db->join('zone', 'zone.zid = cabine2.zone_id', 'left');
    $this->db->join('gender', 'gender.gender_id = cabine.sala_id', 'left');
    $this->db->join('haalamaati', 'haalamaati.id = cabine.haalamaati', 'left');
    $this->db->join('years', 'years.id = cabine2.muxannoo', 'left');
    $this->db->join('year', 'year.y_id = cabine2.muxano_hog', 'left');
    $this->db->join('university', 'university.u_id = cabine2.university_id', 'left');
    $this->db->join('sektera', 'sektera.s_id = cabine2.sector', 'left');
    $this->db->join('title', 'title.t_id = cabine2.mudama_amma', 'left');
    $this->db->join('sadarka', 'sadarka.sd_id = cabine2.sadarkaB', 'left');
    $this->db->join('level', 'level.l_id = cabine2.level', 'left');
    $this->db->join('qabxi', 'qabxi.q_id = cabine2.qabxi', 'left');
           
   
      $query=$this->db->get('cabine2');
      if($query)
      {
        return $query->row();
      }
      else
      {
        return false;
      }

  }
  public function getmaqa($user){

    $this->db->select('*');
    $this->db->order_by('cab_id' , 'DESC');
    $this->db->where('created_by1',$user);
    $this->db->from('cabine');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 

  public function getemp_maqa($user){

    $this->db->select('*');
    $this->db->order_by('cab_id' , 'DESC');
     $this->db->where('created_by1',$user);
    $this->db->from('cabine');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
public function getzone_maqa($user){

    $this->db->select('*');
    $this->db->order_by('cab_id' , 'DESC');
     $this->db->where('created_by1',$user);
    $this->db->from('cabine');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }


 public function getmuxano(){

    $this->db->select('*');
    // $this->db->order_by('id' , 'DESC');
    $this->db->from('years');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }

  public function getmuxano1(){

    $this->db->select('*');
    // $this->db->order_by('id' , 'DESC');
    $this->db->from('year');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }

 
  public function gets_barnoota(){

    $this->db->select('*');
    $this->db->from('education');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }
  public function gethaalamaati(){

    $this->db->select('*');
    $this->db->from('haalamaati');
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  }




public function Delete_request($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('user_request');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }
function downloadcc($params = array()){
        $this->db->select('*');
        $this->db->from('carboncopy');
        // $this->db->where('status','0');
        $this->db->order_by('id','desc');
        if(array_key_exists('id',$params) && !empty($params['id'])){
            $this->db->where('id',$params['id']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }

 public function Deletetl($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('terminate_letter');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

function downloadtl($params = array()){
        $this->db->select('*');
        $this->db->from('terminate_letter');
        // $this->db->where('status','0');
        $this->db->order_by('id','desc');
        if(array_key_exists('id',$params) && !empty($params['id'])){
            $this->db->where('id',$params['id']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }

function downloadus($params = array()){
        $this->db->select('*');
        $this->db->from('user_request');
        // $this->db->where('status','0');
        $this->db->order_by('id','desc');
        if(array_key_exists('id',$params) && !empty($params['id'])){
            $this->db->where('id',$params['id']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }




public function updateprofile($username)
      {
            $data=array(

            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
           
            
            
                  );
            $this->db->where('username',$this->session->userdata('username'));
      $query=$this->db->update('useraccount',$data);
      if($query)
      {
            return true;
      }
      else
      {
            return false;
      }
            }












    function login($user,$pass){

  $this->db->select('*');
  $this->db->from('useraccount');
  $this->db->where('username',$user); 
  $this->db->where('password',$pass);
  $this->db->limit(1);

  $query = $this->db->get();

  if($query->num_rows()==1){
    return $query->result();
  }
  else{
    return false;
  }
  }

public function showtletter($id)
  {
    $this->db->where('id',$id);
    
      $query=$this->db->get('terminate_show');
      if($query)
      {
        return $query->row();
      }
      else
      {
        return false;
      }
  }
  public function showmletter($id)
  {
    $this->db->where('id',$id);
    
      $query=$this->db->get('migrate_lshow');
      if($query)
      {
        return $query->row();
      }
      else
      {
        return false;
      }
  }
 
  
      public function getZone() {
            $this->db->select('*');
            $this->db->from('zone');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function Add_zone() {
            $data = array(
                'zname' => $this->input->post('zone_name'),
                'region_id' => 1,
                'zone_description' => $this->input->post('zone_description'),
                'zone_code' => $this->input->post('zone_code'),
            );
            $query = $this->db->insert('zone', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Delete_Zone($id) {
            $this->db->where('zid', $id);
            $query = $this->db->delete('zone');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }
  public function Delete_tletter($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('terminate_show');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }  public function Delete_mletter($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('migrate_lshow');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      } public function Delete_letter($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('osticaletters');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function Edit_zone($id) {
            $data = array(
                'zname' => $this->input->post('zone_name'),
                'region_id' => 1,
                'zone_description' => $this->input->post('zone_description'),
                'zone_code' => $this->input->post('zone_code'),
            );
            $this->db->where('zid', $id);
            $query = $this->db->update('zone', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function Edit_requestcomment($id) {
            $data = array(
                'directorcom' => $this->input->post('directorcom'),
                
            );
            $this->db->where('id', $id);
            $query = $this->db->update('user_request', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }
      public function getWoreda() {
            $this->db->select('*');
            $this->db->from('woreda');
            $this->db->join('zone', 'zone.zid = woreda.zone_id_woreda', 'left');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function Add_woreda() {
            $data = array(
                'woreda_name' => $this->input->post('woreda_name'),
                'region_id' => 1,
                'woreda_code' => $this->input->post('woreda_code'),
                'zone_id_woreda' => $this->input->post('zone_id'),
                'woreda_description' => $this->input->post('woreda_description'),
            );
            $query = $this->db->insert('woreda', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Delete_Woreda($id) {
            $this->db->where('woreda_id', $id);
            $query = $this->db->delete('woreda');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function Edit_Woreda($id) {

            $data = array(
                'woreda_name' => $this->input->post('woreda_name'),
                'region_id' => 1,
                'woreda_code' => $this->input->post('woreda_code'),
                'zone_id_woreda' => $this->input->post('zone_ids'),
                'woreda_description' => $this->input->post('woreda_description'),
            );
            $this->db->where('woreda_id', $id);
            $query = $this->db->update('woreda', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      function getRole() {
            $this->db->select('*');
            $this->db->from('role');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }

      public function Add_Role() {
            $data = array(
                'role_name' => $this->input->post('role_name'),
                'description' => $this->input->post('description'),
            );
            $query = $this->db->insert('role', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Edit_Role($id) {
            $data = array(
                'role_name' => $this->input->post('role_name'),
                'description' => $this->input->post('description'),
            );
            $this->db->where('role_id', $id);
            $query = $this->db->update('role', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Delete_Role($id) {
            $this->db->where('role_id', $id);
            $query = $this->db->delete('role');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }

      public function getUser() {

            $this->db->join('zone', 'zone.zid = useraccount.zone_id', 'left');
            $this->db->join('woreda', 'woreda.woreda_id = useraccount.woreda_id', 'left');
            $this->db->join('role', 'role.role_id = useraccount.role_id', 'left');

            $this->db->select('*');
            $this->db->from('useraccount');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }


      public function getprofile($username)
  {
    $this->db->where('username',$this->session->userdata('username'));
    $this->db->join('zone', 'zone.zid = useraccount.zone_id', 'left');
   $this->db->join('woreda', 'woreda.woreda_id = useraccount.woreda_id', 'left'); 
   $this->db->join('kebele', 'kebele.kid = useraccount.kebele', 'left'); 
   $this->db->join('city', 'city.cid = useraccount.magala_id', 'left');
   $this->db->join('subcity', 'subcity.subcity_id = useraccount.kmagala_id', 'left');
   $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = useraccount.akmagala_id', 'left');
  $this->db->join('role', 'role.role_id = useraccount.role_id', 'left');
  $this->db->join('gender','gender.gender_id = useraccount.gender_id','left');

    $this->db->from('useraccount');
     $query=$this->db->get();
    
    if($query)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
    
  }

      public function Acivate_user($id) {
//            echo $id;
//            die();
            $data = array(
                'status' => 1
            );
            $this->db->where('id', $id);
            $query = $this->db->update('useraccount', $data);
            if ($query) {
                  return true;
            } else {
                  return fasle;
                  ;
            }
      }

      public function Deacivate_user($id) {
            $data = array(
                'status' => 0
            );
            $this->db->where('id', $id);
            $query = $this->db->update('useraccount', $data);
            if ($query) {
                  return true;
            } else {
                  return fasle;
                  ;
            }
      }

      public function Delete_user($id) {

            $this->db->where('id', $id);
            $query = $this->db->delete('useraccount');
            if ($query) {
                  return true;
            } else {
                  return fasle;
                  ;
            }
      }

      public function getWoredaUser() {
            $this->db->select('*');
//            $this->db->where('zone_id',1);
            $query = $this->db->get('woreda');
            if ($query) {
                  return $query->result();
            }
      }

      public function getGender() {
            $this->db->select('*');
            $this->db->from('gender');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }

      public function Edit_User($id) {
            $data = array(
                'first_name' => $this->input->post('fname'),
                'last_name' => $this->input->post('lname'),
                'middle_name' => $this->input->post('middle_name'),
//                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'gender_id' => $this->input->post('sex'),
                'phoneno' => $this->input->post('phoneno'),
                'dob' => $this->input->post('dob'),
                'email' => $this->input->post('email'),
                'region_id' => 1,
                'woreda_id' => $this->input->post('woreda'),
                'zone_id' => $this->input->post('zone'),
                'role_id' => $this->input->post('role'),
//                
            );
            $this->db->where('id', $id);
            $query = $this->db->update('useraccount', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }


        function getRowssssss($params = array()){
        $this->db->select('*');
        $this->db->from('research');
        // $this->db->where('status','0');
        $this->db->order_by('created_at','desc');
        if(array_key_exists('id',$params) && !empty($params['id'])){
            $this->db->where('id',$params['id']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }

      // public function File_upload() {
      //       $data = array(
      //           'file_name' => $this->upload->file_name,
      //           'title' => $this->input->post('title'),
      //           'subject' => $this->input->post('subject'),
      //           'detail' => $this->input->post('detail'),
      //       );
      //       $query = $this->db->insert('research', $data);
      //       if ($query) {
      //             return TRUE;
      //       } else {
      //             return FALSE;
      //       }
      // }

      public function getResearchDocument() {
           $this->db->order_by('id' , 'DESC');
            
            $this->db->from('research');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }

      public function Save_Abuse_Cases() {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'abusetype_id' => $this->input->post('abusetype'),
                'sex' => $this->input->post('sex'),
                'date' => $this->input->post('date'),
                'age_id' => $this->input->post('age_id'),
                'low' => $this->input->post('low'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
            );
            $query = $this->db->insert('abuse_case', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
      public function getAbuseCases()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('abuse_case');
            $this->db->join('region','region.r_id = abuse_case.region_id','left');
            $this->db->join('zone','zone.zid = abuse_case.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = abuse_case.woreda','left');
            $this->db->join('abuse_type','abuse_type.ab_id = abuse_case.abusetype_id','left');
            $this->db->join('age','age.ag_id = abuse_case.age_id','left');
            $this->db->join('gender','gender.gender_id = abuse_case.sex','left');
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }
      
      public function Edit_Abuse_Cases($id) {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'abusetype_id' => $this->input->post('abusetype'),
                'sex' => $this->input->post('sex'),
                'date' => $this->input->post('date'),
                'age_id' => $this->input->post('age_id'),
                'low' => $this->input->post('low'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
            );
            $this->db->where('id',$id);
            $query = $this->db->update('abuse_case', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
      public function Delete_abusecase($id)
      {
            $this->db->where('id',$id);
            $query=$this->db->delete('abuse_case');
            if($query)
            {
                  return TRUE;
            }
            else{
                  return FALSE;
            }
      }
      public function getAbuseType()
      {
            $this->db->select('*');
            $this->db->from('abuse_type');
            $query=$this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
      }



     public function Save_htp() {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'htptype_id' => $this->input->post('htptype_id'),
                'sex' => $this->input->post('sex'),
                'date' => $this->input->post('date'),
                'age_id' => $this->input->post('age_id'),
                // 'low' => $this->input->post('low'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
            );
            $query = $this->db->insert('htp', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
      public function gethtp()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('htp');
            $this->db->join('region','region.r_id = htp.region_id','left');
            $this->db->join('zone','zone.zid = htp.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = htp.woreda','left');
            $this->db->join('htp_type','htp_type.htp_id = htp.htptype_id','left');
            $this->db->join('age','age.ag_id = htp.age_id','left');
            $this->db->join('gender','gender.gender_id = htp.sex','left');
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }

      public function Save_htp1() {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'htptype_id' => $this->input->post('htptype_id'),
                'sex' => $this->input->post('sex'),
                'date' => $this->input->post('date'),
                'age_id' => $this->input->post('age_id'),
                // 'low' => $this->input->post('low'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
            );
            $query = $this->db->insert('htp', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

      public function gethtp1($user)
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('htp');
            $this->db->join('region','region.r_id = htp.region_id','left');
            $this->db->join('zone','zone.zid = htp.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = htp.woreda','left');
            $this->db->join('htp_type','htp_type.htp_id = htp.htptype_id','left');
            $this->db->join('age','age.ag_id = htp.age_id','left');
            $this->db->join('gender','gender.gender_id = htp.sex','left');
            $this->db->where('created_by',$user);
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }
      
      public function Edit_htp($id) {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'htptype_id' => $this->input->post('htptype_id'),
                'sex' => $this->input->post('sex'),
                'date' => $this->input->post('date'),
                'age_id' => $this->input->post('age_id'),
                // 'low' => $this->input->post('low'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
            );
            $this->db->where('id',$id);
            $query = $this->db->update('htp', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
      public function Delete_htp($id)
      {
            $this->db->where('id',$id);
            $query=$this->db->delete('htp');
            if($query)
            {
                  return TRUE;
            }
            else{
                  return FALSE;
            }
      }
      public function gethtptype()
      {
            $this->db->select('*');
            $this->db->from('htp_type');
            $query=$this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
      }

      public function getAge()
      {
            $this->db->select('*');
            $this->db->from('age');
            $query=$this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
      }




      //child frendly info

      

      
      



      



      public function save_request() {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'torequest' => $this->input->post('torequest'),
                'reqdesc' => $this->input->post('reqdesc'),
                'date' => $this->input->post('date'),
                'orgname' => $this->input->post('orgname'),
                // 'age_id' => $this->input->post('age_id'),
                // 'low' => $this->input->post('low'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
            );
            $query = $this->db->insert('user_request', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
 public function save_terminateletter() {
           
            $data = array(
                
                'date' => $this->input->post('date'),
                'service_no' => $this->input->post('service_no'),
               
               
            );
            $query = $this->db->insert('terminate_show', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

      public function save_newrequest() {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                // 'orgname' => $this->input->post('orgname'),
                'reqdesc' => $this->input->post('reqdesc'),
                'date' => $this->input->post('date'),
                'age_id' => $this->input->post('age_id'),
                // 'low' => $this->input->post('low'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
                'post_status' => 1,
                
            );
            $query = $this->db->insert('user_request', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

      public function getuserrequest($user)
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('user_request');
            $this->db->join('region','region.r_id = user_request.region_id','left');
            $this->db->join('zone','zone.zid = user_request.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = user_request.woreda','left');
            // $this->db->join('htp_type','htp_type.htp_id = htp.htptype_id','left');
            // $this->db->join('age','age.ag_id = htp.age_id','left');
            // $this->db->join('gender','gender.gender_id = htp.sex','left');
            $this->db->where('created_by',$user);
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }
      // public function getuserrequest3($user)
      // {
      //        $this->db->select('*');
      //       $this->db->order_by('id' , 'DESC');
      //       $this->db->from('user_request');
      //       $this->db->join('region','region.r_id = user_request.region_id','left');
      //       $this->db->join('zone','zone.zid = user_request.zone_id','left');
      //       $this->db->join('woreda','woreda.woreda_id = user_request.woreda','left');
      //       $query= $this->db->get();
      //       if($query)
      //       {
      //             return $query->result();
      //       }
      //       else{
      //             return FALSE;
      //       }
            
            
      // }

      public function getuserrequest1()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('user_request');
            $this->db->where('requst_status3',2);
            $this->db->join('region','region.r_id = user_request.region_id','left');
            $this->db->join('zone','zone.zid = user_request.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = user_request.woreda','left');
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }
       public function getuserrequest3()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
             $zone = $this->session->userdata('zone');
             $this->db->where('zone_id', $zone);
            $this->db->from('user_request');
          
            $this->db->join('region','region.r_id = user_request.region_id','left');
            $this->db->join('zone','zone.zid = user_request.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = user_request.woreda','left');
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }

      public function save_carbonCopy() {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
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
            );
            $query = $this->db->insert('carboncopy', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

     

      public function Edit_carboncopy($id) {
            $data = array(
                'orgname' => $this->input->post('orgname'),
                'ipid' => $this->input->post('ipid'),

                'lanip' => $this->input->post('lanip'),
                'wanip' => $this->input->post('wanip'),
                'date' => $this->input->post('date'),
                'servicenumber' => $this->input->post('servicenumber'),
                'ethiocontact' => $this->input->post('ethiocontact'),
               
                'region_id' => 1,
                'kebele' => $this->input->post('kebele'),
//                
            );
            $this->db->where('id', $id);
            $query = $this->db->update('carboncopy', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function Delete_carboncopy($id)
      {
            $this->db->where('id',$id);
            $query=$this->db->delete('carboncopy');
            if($query)
            {
                  return TRUE;
            }
            else{
                  return FALSE;
            }
      }

       public function getcarboncopy($user)
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('carboncopy');
            $this->db->join('region','region.r_id = carboncopy.region_id','left');
            $this->db->join('zone','zone.zid = carboncopy.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = carboncopy.woreda','left');
            // $this->db->join('htp_type','htp_type.htp_id = htp.htptype_id','left');
            // $this->db->join('age','age.ag_id = htp.age_id','left');
            // $this->db->join('gender','gender.gender_id = htp.sex','left');
            $this->db->where('created_by',$user);
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
          }

            public function getcarboncopy1()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('carboncopy');
            $this->db->join('region','region.r_id = carboncopy.region_id','left');
            $this->db->join('zone','zone.zid = carboncopy.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = carboncopy.woreda','left');
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }
            
            



public function postcarbon($post)
  {
    $data=array(

      
      
      'post_status'=>1,

      
    );
    $this->db->where('id',$post);
    $query=$this->db->update('carboncopy',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }
 
public function requst_status1($post)
  {
    $data=array(

      
      'requst_status1'=>0,
      'requst_status1'=>1,
      'requst_status1'=>2,
      
    );
    $this->db->where('id',$post);
    $query=$this->db->update('user_request',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }
  public function requst_status3($post)
  {
    $data=array(

      
      'requst_status3'=>0,
      'requst_status3'=>1,
      'requst_status3'=>2,
      
    );
    $this->db->where('id',$post);
    $query=$this->db->update('user_request',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }
  public function post_status($post)
  {
    $data=array(

      
      'post_status'=>0,
      'post_status'=>1,
      'post_status'=>2,
      
    );
    $this->db->where('id',$post);
    $query=$this->db->update('migrate_letter',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }
 public function ip_status($post)
  {
    $data=array(

      
      'free_status'=>0,
      'free_status'=>1,
      'free_status'=>2,
      
    );
    $this->db->where('id',$post);
    $query=$this->db->update('freeip',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }

public function terminate_status($post)
  {
    $data=array(

      
      'terminate_status'=>0,
      'terminate_status'=>1,
      'terminate_status'=>2,
      
    );
    $this->db->where('id',$post);
    $query=$this->db->update('terminate_letter',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }



  

  public function getpostcarbon()
  {
             $this->db->select('*');
  
            $this->db->where('post_status',1);
            $this->db->order_by('id' , 'DESC');
            $this->db->from('carboncopy');
            $this->db->join('region','region.r_id = carboncopy.region_id','left');
            $this->db->join('zone','zone.zid = carboncopy.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = carboncopy.woreda','left');
           $qeury=$this->db->get();

    if($qeury)
    {
      return $qeury->result();
    }
    else
    {
      return false;
    }
  }


    public function save_terminate() {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'refno' => $this->input->post('refno'),
                'service_type' => $this->input->post('service_type'),
                'date' => $this->input->post('date'),
                'ipid' => $this->input->post('ipid'),

                'lanip' => $this->input->post('lanip'),
                'servicenumber' => $this->input->post('servicenumber'),
                'site_ict' => $this->input->post('site_ict'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                 'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
                // 'post_status' => 1,
                
            );
            $query = $this->db->insert('terminate_letter', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

      public function getterminate($user)
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('terminate_letter');
            $this->db->join('region','region.r_id = terminate_letter.region_id','left');
            $this->db->join('zone','zone.zid = terminate_letter.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = terminate_letter.woreda','left');
            // $this->db->join('htp_type','htp_type.htp_id = htp.htptype_id','left');
            // $this->db->join('age','age.ag_id = htp.age_id','left');
            // $this->db->join('gender','gender.gender_id = htp.sex','left');
            $this->db->where('created_by',$user);
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }

      public function getterminate1()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('terminate_letter');
            $this->db->join('region','region.r_id = terminate_letter.region_id','left');
            $this->db->join('zone','zone.zid = terminate_letter.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = terminate_letter.woreda','left');
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }

 public function getterminate2()
      {
            $this->db->select('*');
            $this->db->where('terminate_status',2);
            $this->db->order_by('id' , 'DESC');
            $this->db->from('terminate_letter');
            $this->db->join('region','region.r_id = terminate_letter.region_id','left');
            $this->db->join('zone','zone.zid = terminate_letter.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = terminate_letter.woreda','left');
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }

      public function getfreelanip()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('freeip');
            
           $this->db->where('free_status',0);
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }
 public function getfreeipreport()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('freeip');
            
           $this->db->where('free_status',0);
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }


      public function save_migrate() {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'refno' => $this->input->post('refno'),
                'service_type' => $this->input->post('service_type'),
                'date' => $this->input->post('date'),
                'ipid' => $this->input->post('ipid'),
                'lanip' => $this->input->post('lanip'),
                'sitecurrent' => $this->input->post('sitecurrent'),
                'sitetomove' => $this->input->post('sitetomove'),
                'servicenumber' => $this->input->post('servicenumber'),
                'site_ict' => $this->input->post('site_ict'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                // 'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
                'post_status' => 1,
                
            );
            $query = $this->db->insert('migrate_letter', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

      public function getmigrate($user)
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('migrate_letter');
            $this->db->join('region','region.r_id = migrate_letter.region_id','left');
            $this->db->join('zone','zone.zid = migrate_letter.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = migrate_letter.woreda','left');
            // $this->db->join('htp_type','htp_type.htp_id = htp.htptype_id','left');
            // $this->db->join('age','age.ag_id = htp.age_id','left');
            // $this->db->join('gender','gender.gender_id = htp.sex','left');
            $this->db->where('created_by',$user);
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }

      public function getmigrate1()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('migrate_letter');
            $this->db->join('region','region.r_id = migrate_letter.region_id','left');
            $this->db->join('zone','zone.zid = migrate_letter.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = migrate_letter.woreda','left');
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }

      public function save_freeip() {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'lanip' => $this->input->post('lanip'),
                'ipid' => $this->input->post('ipid'),
                'date' => $this->input->post('date'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                // 'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
            );
            $query = $this->db->insert('freeip', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
      public function getIpinfo(){
            $this->db->select('*');
            $this->db->from('carboncopy');
            $query = $this->db->get();
            if($query)
            {
                  return $query->row();
            }
            else{
                  return false;
            }
      }


public function free_status($post)
  {
   
   $data = array(
                'lanip' => $this->input->post('lanip'),
                'ipid' => $this->input->post('ipid'),
                'date' => $this->input->post('date'),
                
                'region_id' => 1,
                // 'kebele' => $this->input->post('kebele'),
//                
            );
            $this->db->where('id', $id);
            $query = $this->db->insert('freeip', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }


      public function Edit_freeip($id) {
            $data = array(
                'lanip' => $this->input->post('lanip'),
                'ipid' => $this->input->post('ipid'),
                'date' => $this->input->post('date'),
                
                'region_id' => 1,
                // 'kebele' => $this->input->post('kebele'),
//                
            );
            $this->db->where('id', $id);
            $query = $this->db->update('freeip', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }



      public function Delete_freeip($id)
      {
            $this->db->where('id',$id);
            $query=$this->db->delete('freeip');
            if($query)
            {
                  return TRUE;
            }
            else{
                  return FALSE;
            }
      }public function Delete_freeip1($ipid)
      {
            $this->db->where('ipid',$ipid);
            $query=$this->db->delete('freeip');
            if($query)
            {
                  return TRUE;
            }
            else{
                  return FALSE;
            }
      }

      public function getfreeip()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('freeip');
           $this->db->where('free_status',0);
            
            $this->db->join('region','region.r_id = freeip.region_id','left');
            $this->db->join('zone','zone.zid = freeip.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = freeip.woreda','left');
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }

public function showletter($id)
  {
    $this->db->where('osticaletters.id',$id);
      $this->db->from('osticaletters');
    $this->db->join('freeip','freeip.id = osticaletters.lanip');
    $query=$this->db->get();
    
    if($query)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
    
  }

      
      public function save_osticaletters() {
           
            $data = array(
                
                'service_type' => $this->input->post('service_type'),
                'date' => $this->input->post('date'),
                'lanip' => $this->input->post('lanip'),
                // 'ipid' => $this->input->post('ipid'),
                'band_width' => $this->input->post('band_width'),
                'site_ict' => $this->input->post('site_ict'),
                'sitephone' => $this->input->post('sitephone'),
                'organization' => $this->input->post('organization'),
                'osticafinance' => $this->input->post('osticafinance'),
                'osticaphone' => $this->input->post('osticaphone'),
               'zname' => $this->input->post('zname'),
                'wname' => $this->input->post('wname'),
                // 'region_id' => 1,
                 'kebele' => $this->input->post('kebele'),
                // 'operator' => $LoggedUser,
                // 'created_by' => $username,
                // 'post_status' => 1,
                
            );
            echo $this->input->post('lanip');

            $query = $this->db->insert('osticaletters', $data);
            if ($query) {
                  $letterip =  $this->input->post('lanip');

                   $data1 = array(
                    'free_status'=>2

                   );
                   $this->db->where('freeip.id',$letterip);

                    $query1 = $this->db->update('freeip',$data1);

                              if ($query1) {
                                  return TRUE;


                             } else {
                                   return FALSE;
                                 }

                  } else {
                        return FALSE;
                  }
                  return TRUE;

      } 
      public function save_mletter() {
           
            $data = array(
                
                'oldservice_type' => $this->input->post('oldservice_type'),
                'newservice_type' => $this->input->post('newservice_type'),
                'date' => $this->input->post('date'),
                'lanip' => $this->input->post('lanip'),
                'servicenumber' => $this->input->post('servicenumber'),
                'band_width' => $this->input->post('band_width'),
                'site_ict' => $this->input->post('site_ict'),
                'sitephone' => $this->input->post('sitephone'),
                'organization' => $this->input->post('organization'),
                'osticafinance' => $this->input->post('osticafinance'),
                'osticaphone' => $this->input->post('osticaphone'),
               'zname' => $this->input->post('zname'),
                'wname' => $this->input->post('wname'),
                // 'region_id' => 1,
                 // 'kebele' => $this->input->post('kebele'),
                // 'operator' => $LoggedUser,
                // 'created_by' => $username,
                // 'post_status' => 1,
                
            );
            $query = $this->db->insert('migrate_lshow', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

      public function getmletter()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');

            $this->db->from('migrate_lshow');
            $query=$this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
      }public function getnewletters()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('osticaletters');
            $query=$this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
      }
       public function getterminateletter()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('terminate_show');
            $query=$this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
      }

      public function save_ipcomment() {
            $username= $this->session->userdata('username');
            $LoggedUser = $this->session->userdata('full_name');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'fname' => $this->input->post('fname'),
                'email' => $this->input->post('email'),
                'date' => $this->input->post('date'),
                'subject' => $this->input->post('subject'),
                'text' => $this->input->post('text'),
                'zone_id' => $zone,
                'woreda' => $woreda,
                'region_id' => 1,
                // 'kebele' => $this->input->post('kebele'),
                'operator' => $LoggedUser,
                'created_by' => $username,
            );
            $query = $this->db->insert('ipcomment', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

           public function getipcomment()
      {
            $this->db->select('*');
            $this->db->order_by('id' , 'DESC');
            $this->db->from('ipcomment');
            $this->db->join('region','region.r_id = ipcomment.region_id','left');
            $this->db->join('zone','zone.zid = ipcomment.zone_id','left');
            $this->db->join('woreda','woreda.woreda_id = ipcomment.woreda','left');
            $query= $this->db->get();
            if($query)
            {
                  return $query->result();
            }
            else{
                  return FALSE;
            }
            
            
      }

}
