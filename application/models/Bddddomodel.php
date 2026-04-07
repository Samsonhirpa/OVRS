<?php

defined('BASEPATH') or exit('No direct access is Allowed');

class Bddddomodel extends CI_Model {

      function __construct() {
            $this->tableName = 'users1';
            $this->primaryKey = 'id';
      }

      public function insert($data = array()) {
            if (!array_key_exists("created", $data)) {
                  $data['created'] = date("Y-m-d H:i:s");
            }
            if (!array_key_exists("modified", $data)) {
                  $data['modified'] = date("Y-m-d H:i:s");
            }
            $insert = $this->db->insert($this->tableName, $data);
            if ($insert) {
                  return $this->db->insert_id();
            } else {
                  return false;
            }
      }

      public function getovcs() {
            $query = $this->db->get('ovcs');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function saveemployee() {
            $data = array(
                'first_name' => $this->input->post('fname'),
                'last_name' => $this->input->post('lname'),
                'middle_name' => $this->input->post('middle_name'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'gender_id' => $this->input->post('sex'),
                'phoneno' => $this->input->post('phoneno'),
                'dob' => $this->input->post('dob'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role'),
                'naannoofil' => $this->input->post('naannoofil'),

                'region_id' => 1,
                // 'woreda_id' => $this->input->post('woreda'),
                'zone_id' => $this->input->post('zone'),
                // 'kebele' => $this->input->post('kebele'),
                 'magala_id' => $this->input->post('magala_id'),
                // 'kmagala_id' => $this->input->post('kmagala_id'),
                // 'akmagala_id' => $this->input->post('akmagala_id'),
//                'position' => $this->input->post('position'),
            );
            $query = $this->db->insert('useraccount', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function savepopulation()
  {
    $data=array(
      'adultmale'=>$this->input->post('adultmale'),
      'adultfemale'=>$this->input->post('adultfemale'),
      'totadult'=>$this->input->post('totadult'),
      'childmale'=>$this->input->post('childmale'),
      'childfemale'=>$this->input->post('childfemale'),
      'totchild'=>$this->input->post('totchild'),
      'totpopulation'=>$this->input->post('totpopulation'),
      'data_officer'=>$this->input->post('data_officer'),
      'date'=>$this->input->post('date'),
      'year'=>$this->input->post('year'),
      'month'=>$this->input->post('month'),
      

);
    $query=$this->db->insert('population',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }


  public function edit_population($id)
  {
    $this->db->where('id',$id);
    $query=$this->db->get('population');
    if($query)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
  } 
   
   public function updatepopulation($id)
  {
    $data=array(
      'adultmale'=>$this->input->post('adultmale'),
      'adultfemale'=>$this->input->post('adultfemale'),
      'totadult'=>$this->input->post('totadult'),
       'childmale'=>$this->input->post('childmale'),
      'childfemale'=>$this->input->post('childfemale'),
      'totchild'=>$this->input->post('totchild'),
      'totpopulation'=>$this->input->post('totpopulation'),
      'data_officer'=>$this->input->post('data_officer'),
      'date'=>$this->input->post('date'),
    );
    $this->db->where('id',$id);
    $query=$this->db->update('population',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }
    // $this->db->where('id',$id);

  }

public function delete_population($id)
  {
    $this->db->where('id',$id);
    $query=$this->db->delete('population');
  }

  public function getpopulation()
  {
    $query=$this->db->get('population');
    if($query)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }



  public function savetrained()
  {
    $data=array(
      'tob'=>$this->input->post('tob'),
      'top'=>$this->input->post('top'),
      'type_training_id'=>$this->input->post('tot'),
      'male'=>$this->input->post('male'),
      'female'=>$this->input->post('female'),
      'total'=>$this->input->post('total'),
            'free_abusecase'=>$this->input->post('free_abusecase'),
      'tdot'=>$this->input->post('date'),

           
);
    $query=$this->db->insert('training',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }

  public function gettraining()
  {
    $query=$this->db->get('training');
    if($query)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

  public function gettyprtraining()
  {
    $query=$this->db->get('typetraining');
    if($query)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

      public function savenochildren() {
            $data = array(
                'male' => $this->input->post('male'),
                'female' => $this->input->post('female'),
                'tot' => $this->input->post('tot'),
                'age_id' => $this->input->post('age_id'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
            );
            $query = $this->db->insert('totchildren', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function edit_nochildren($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('totchildren');
            if ($query) {
                  return $query->row();
            } else {
                  return false;
            }
      }

      public function updatenochildren($id) {
            $data = array(
                'male' => $this->input->post('male'),
                'female' => $this->input->post('female'),
                'tot' => $this->input->post('tot'),
                'age_id' => $this->input->post('age_id'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
            );
            $this->db->where('id', $id);
            $query = $this->db->update('totchildren', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
            // $this->db->where('id',$id);
      }

      public function delete_nochildren($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('totchildren');
      }

      public function getnochildren()
  {
    $query=$this->db->get('population');
    if($query)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

      // public function getnochildren() {
      //       $this->db->select('*');
      //       $this->db->from('totchildren');
      //       $this->db->join('age', 'age.ag_id = totchildren.age_id');
      //       $this->db->join('zone', 'zone.zid = totchildren.zone_id');
      //       $this->db->join('town', 'town.tid = totchildren.town_id');
      //       $this->db->join('region', 'region.r_id = totchildren.region_id');
      //       $this->db->join('kebele', 'kebele.kid = totchildren.kebele');
      //       $qeury = $this->db->get();

      //       if ($qeury) {
      //             return $qeury->result();
      //       } else {
      //             return false;
      //       }
      // }

      public function saveOVCS() {
            $data = array(
                'ovcs_id' => $this->input->post('ovcs_id'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'district' => $this->input->post('region'),
                'zone' => $this->input->post('zone'),
                'town' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $query = $this->db->insert('ovcs1', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function getovcs1() {
            $this->db->select('*');
            $this->db->from('ovcs1');
            $this->db->join('ovcs', 'ovcs.id = ovcs1.ovcs_id');
            $this->db->join('age', 'age.ag_id = ovcs1.age_id');

            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function deleteovcs($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('ovcs1');
      }

      public function saveabuse_case() {
            $data = array(
                'abusetype_id' => $this->input->post('abusetype'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $query = $this->db->insert('abuse_case', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function edit_abusecase($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('abuse_case');
            if ($query) {
                  return $query->row();
            } else {
                  return false;
            }
      }

      public function updateabusecase($id) {
            $data = array(
                'abusetype_id' => $this->input->post('abusetype'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $this->db->where('id', $id);
            $query = $this->db->update('abuse_case', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
            // $this->db->where('id',$id);
      }

      public function delete_abusecase($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('abuse_case');
      }

      public function saveadisabledchildren() {
            $data = array(
                'disbledtype_id' => $this->input->post('disbled_type'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $query = $this->db->insert('disnled_children', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function edit_disabledchild($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('disnled_children');
            if ($query) {
                  return $query->row();
            } else {
                  return false;
            }
      }

      public function updatedisabledchild($id) {
            $data = array(
                'disbledtype_id' => $this->input->post('disbled_type'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $this->db->where('id', $id);
            $query = $this->db->update('disnled_children', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
            // $this->db->where('id',$id);
      }

      public function delete_disbledchilder($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('disnled_children');
      }

      public function savechildfriemdly() {
            $data = array(
                'childfriendlytype_id' => $this->input->post('childfriendly_type'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $query = $this->db->insert('child_friendly', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function edit_childfriendly($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('child_friendly');
            if ($query) {
                  return $query->row();
            } else {
                  return false;
            }
      }

      public function updatechildfriendly($id) {
            $data = array(
                'childfriendlytype_id' => $this->input->post('childfriendly_type'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $this->db->where('id', $id);
            $query = $this->db->update('child_friendly', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
            // $this->db->where('id',$id);
      }

      public function delete_childfriendly($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('child_friendly');
      }

      public function savechildcare() {
            $data = array(
                'childcare_type_id' => $this->input->post('childcare_type'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $query = $this->db->insert('child_care', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function edit_childcare($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('child_care');
            if ($query) {
                  return $query->row();
            } else {
                  return false;
            }
      }

      public function updatechildcare($id) {
            $data = array(
                'childcare_type_id' => $this->input->post('childcare_type'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $this->db->where('id', $id);
            $query = $this->db->update('child_care', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
            // $this->db->where('id',$id);
      }

      public function delete_childcare($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('child_care');
      }

      public function savecccservices() {
            $data = array(
                'ccc_services_type_id' => $this->input->post('ccc_services_type'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $query = $this->db->insert('ccc_services', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function edit_cccservices($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('ccc_services');
            if ($query) {
                  return $query->row();
            } else {
                  return false;
            }
      }

      public function updatecccservices($id) {
            $data = array(
                'ccc_services_type_id' => $this->input->post('ccc_services_type'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $this->db->where('id', $id);
            $query = $this->db->update('ccc_services', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
            // $this->db->where('id',$id);
      }

      public function delete_cccservices($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('ccc_services');
      }

      public function savepost_placement() {
            $data = array(
                'post_placementtype_id' => $this->input->post('post_placementtype'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $query = $this->db->insert('post_placement', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function edit_post_placement($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('post_placement');
            if ($query) {
                  return $query->row();
            } else {
                  return false;
            }
      }

      public function updatepost_placement($id) {
            $data = array(
                'post_placementtype_id' => $this->input->post('post_placementtype'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $this->db->where('id', $id);
            $query = $this->db->update('post_placement', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
            // $this->db->where('id',$id);
      }

      public function delete_post_placement($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('post_placement');
      }

      public function savecss() {
            $data = array(
                'careandsupporttype_id' => $this->input->post('careandsupporttype'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $query = $this->db->insert('careandsupport', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function edit_careandsupport($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('careandsupport');
            if ($query) {
                  return $query->row();
            } else {
                  return false;
            }
      }

      public function updatecareandsupport($id) {
            $data = array(
                'careandsupporttype_id' => $this->input->post('careandsupporttype'),
                'age_id' => $this->input->post('age_id'),
                'sex' => $this->input->post('sex'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'operator' => $this->input->post('operator'),
            );
            $this->db->where('id', $id);
            $query = $this->db->update('careandsupport', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
            // $this->db->where('id',$id);
      }

      public function delete_careandsupport($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('careandsupport');
      }

      public function saveevent() {
            $data = array(
                'male' => $this->input->post('male'),
                'female' => $this->input->post('female'),
                'typeofevent' => $this->input->post('typeofevent'),
                'event_organizingbody' => $this->input->post('event_organizingbody'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'slongofevent' => $this->input->post('slongofevent'),
                'activie_event' => $this->input->post('activie_event'),
            );
            $query = $this->db->insert('event', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function delete_event($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('event');
      }

      public function saveiga() {
            $data = array(
                'type_iga' => $this->input->post('type_iga'),
                'Skill_Training' => $this->input->post('Skill_Training'),
                'Financial_Support' => $this->input->post('Financial_Support'),
                'Material_Support' => $this->input->post('Material_Support'),
                'region_id' => $this->input->post('region'),
                'zone_id' => $this->input->post('zone'),
                'town_id' => $this->input->post('town'),
                'kebele' => $this->input->post('kebele'),
                'Technical_Support' => $this->input->post('Technical_Support'),
                'working_site' => $this->input->post('working_site'),
                'others' => $this->input->post('others'),
            );
            $query = $this->db->insert('iga', $data);
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function delete_IGA($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('iga');
      }

      public function getage() {
            $query = $this->db->get("age");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }




     public function savengo()
  {
    $data=array(
      'levelof_agreement'=>$this->input->post('levelof_agreement'),
      'budget'=>$this->input->post('budget'),
      'ngoname'=>$this->input->post('ngoname'),
      'Duration_project'=>$this->input->post('Duration_project'),
      'dirmale'=>$this->input->post('dirmale'),
      'dirfemale'=>$this->input->post('dirfemale'),
      'inmale'=>$this->input->post('inmale'),
      'infemale'=>$this->input->post('infemale'),
      'promale'=>$this->input->post('promale'),
      'profemale'=>$this->input->post('profemale'),
      'profmtotal'=>$this->input->post('profmtotal'),
      'susmale'=>$this->input->post('susmale'),
      'susfemale'=>$this->input->post('susfemale'),
      'susfmtotal'=>$this->input->post('susfmtotal'),
      'age_id'=>$this->input->post('age_id'),
      

);
    $query=$this->db->insert('No_ofngo',$data);
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }








      public function getcareandsupporttype() {
            $query = $this->db->get("careandsupporttype");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getevent() {
            $this->db->select('*');
            $this->db->from('event');
            $this->db->join('zone', 'zone.zid = event.zone_id');
            $this->db->join('town', 'town.tid = event.town_id');
            $this->db->join('region', 'region.r_id = event.region_id');
            $this->db->join('kebele', 'kebele.kid = event.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      public function getiga() {
            $this->db->select('*');
            $this->db->from('iga');
            $this->db->join('zone', 'zone.zid = iga.zone_id');
            $this->db->join('town', 'town.tid = iga.town_id');
            $this->db->join('region', 'region.r_id = iga.region_id');
            $this->db->join('kebele', 'kebele.kid = iga.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      public function getchildfriendlytype() {
            $query = $this->db->get("childfriendly_type");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getdisabledtype() {
            $query = $this->db->get("disbled_type");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getccc_servicestype() {
            $query = $this->db->get("ccc_servicestype");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getpost_placementtype() {
            $query = $this->db->get("post_placementtype");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getabusetype() {
            $query = $this->db->get("abuse_type");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getchildcaretype() {
            $query = $this->db->get("childcare_type");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getregion() {
            $query = $this->db->get("region");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getzone() {

            $query = $this->db->get("zone");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getcity() {

            $query = $this->db->get("city");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getzone1() {

            $query = $this->db->get("zonet");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
public function getzone11() {

            $query = $this->db->get("zone");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
      public function gettown() {
            $zid = $this->input->post('zid');
            $this->db->where('zone_id', $zid);

            $query = $this->db->get('town');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
      public function getWoreda() {
            $zid = $this->input->post('zid');
            $this->db->where('zone_id_woreda', $zid);

            $query = $this->db->get('woreda');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getsubcity() {
            $ctid = $this->input->post('ctid');
            $this->db->where('city_id', $ctid);

            $query = $this->db->get('subcity');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getWoredat() {
            $zid1 = $this->input->post('zid1');
            $this->db->where('zone_id_woreda1', $zid1);

            $query = $this->db->get('woredat');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
 public function getWoreda11() {
            $zid1 = $this->input->post('zid1');
            $this->db->where('zone_id_woreda1', $zid1);

            $query = $this->db->get('woreda');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getkebelet() {
            $tid1 = $this->input->post('tid1');
            $this->db->where('wid1', $tid1);

            $query = $this->db->get('kebelet');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getsubcitywrd() {
            $sbid = $this->input->post('sbid');
            $this->db->where('sbcity_id', $sbid);

            $query = $this->db->get('subcity_woreda');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
 public function getkebele11() {
            $tid1 = $this->input->post('tid1');
            $this->db->where('wid1', $tid1);

            $query = $this->db->get('kebele');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

            public function getschooletype() {
            $sid = $this->input->post('sid');
            $this->db->where('edu_id', $sid);

            $query = $this->db->get('schooletype');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }

      } 

      public function getschoolplace() {
            $pid = $this->input->post('pid');
            $this->db->where('st_id', $pid);

            $query = $this->db->get('placeofschoole');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }

      } 

      public function getedutype() {
            $eid = $this->input->post('eid');
            $this->db->where('edtype_id', $eid);

            $query = $this->db->get('university');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }

      } 
      public function getmudamaa() {
            $sid = $this->input->post('sid');
            $this->db->where('sector_id', $sid);

            $query = $this->db->get('title');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
       public function getipid() {
            $sid = $this->input->post('sid');
            $this->db->where('freeip.id', $sid);

            $query = $this->db->get('freeip');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getWoreda1() {
            $zid = $this->input->post('zid');
            $this->db->where('zone_id_woreda', $zid);

            $query = $this->db->get('woreda');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

       public function getWoreda2() {
            $zid = $this->input->post('zid');
            $this->db->where('zone_id_woreda', $zid);

            $query = $this->db->get('woreda');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getkebele() {
            $tid = $this->input->post('tid');
            $this->db->where('wid', $tid);

            $query = $this->db->get('kebele');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      // SELECT  sex, age  FROM `abuse_case`, age, abuse_type WHERE age.ag_id= abuse_case.age_id AND abusetype_id = abuse_case.abusetype_id
      //
 //SELECT sex, age, COUNT(*) FROM `abuse_case`, age, abuse_type WHERE age.ag_id= abuse_case.age_id AND abusetype_id = abuse_case.abusetype_id and abuse_case.age_id =1
      public function getabusecase1() {

            $query = $this->db->get("abuse_case");
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getfemale() {
            // $this->db->count_all_result('abuse_case');
            $this->db->select('sex, age,  COUNT(*) as total');
            $this->db->from('abuse_case');
            $this->db->where('age.ag_id= abuse_case.age_id AND abusetype_id = abuse_case.abusetype_id and abuse_case.age_id = 4');
            $this->db->join('age', 'age.ag_id = abuse_case.age_id');
            $this->db->join('abuse_type', 'abuse_type.ab_id = abuse_case.abusetype_id');

            $this->db->group_by('abuse_case.id');
            //$this->db->order_by('request.request_date', 'desc'); 
            $query = $this->db->get();
            // $query=$this->db->get('payroll');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

// $this->db->where('is_approved_by_finance = 0 and is_approved_by_director=  1  or is_approved_by_director = 0 and  is_rejected_by_director = 0 ');
//     $this->db->from('request');
// public function getabusecase()
// 	{
// 		$this->db->select('*');
// 		$this->db->from('abuse_case');
// 		$this->db->join('abuse_type','abuse_type.ab_id = abuse_case.abusetype_id');
// 		$this->db->join('age','age.ag_id = abuse_case.age_id');
// 		$this->db->join('zone','zone.zid = abuse_case.zone_id');
// 		$this->db->join('town','town.tid = abuse_case.town_id');
// 		$this->db->join('region','region.r_id = abuse_case.region_id');
// 		$this->db->join('kebele','kebele.kid = abuse_case.kebele');
// 		$qeury=$this->db->get();
// 		if($qeury)
// 		{
// 			return $qeury->result();
// 		}
// 		else
// 		{
// 			return false;
// 		}
// 	}
// SELECT COUNT(sex) as sex FROM `abuse_case` WHERE 1
      public function getabusecase() {
            $this->db->select('*, COUNT(sex) as sex,');
            $this->db->from('abuse_case');
            $this->db->join('abuse_type', 'abuse_type.ab_id = abuse_case.abusetype_id');
            $this->db->join('age', 'age.ag_id = abuse_case.age_id');
            $this->db->join('zone', 'zone.zid = abuse_case.zone_id');
            $this->db->join('town', 'town.tid = abuse_case.town_id');
            $this->db->join('region', 'region.r_id = abuse_case.region_id');
            $this->db->join('kebele', 'kebele.kid = abuse_case.kebele');

            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      // public function getsum()
      //   {
      //   	$sql = "SELECT sum(sex) as sex FROM disnled_children";
      //   	$result = $this->db->query($sql);
      //   	return $result->row()->sex;
      //   }

      public function gethtpabuse() {
            $this->db->select('*, sex, age,');
            $this->db->from('abuse_case');
            $this->db->where('age.ag_id= abuse_case.age_id AND abusetype_id = abuse_case.abusetype_id AND zone.zid = abuse_case.zone_id  and abuse_case.age_id = 1 and abuse_case.abusetype_id = 1 and abuse_case.zone_id');
            $this->db->join('abuse_type', 'abuse_type.ab_id = abuse_case.abusetype_id');
            $this->db->join('age', 'age.ag_id = abuse_case.age_id');
            $this->db->join('zone', 'zone.zid = abuse_case.zone_id');
            $this->db->join('town', 'town.tid = abuse_case.town_id');
            $this->db->join('region', 'region.r_id = abuse_case.region_id');
            $this->db->join('kebele', 'kebele.kid = abuse_case.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      public function get6_htpabuse() {
            $this->db->select('*, sex, age,');
            $this->db->from('abuse_case');
            $this->db->where('age.ag_id= abuse_case.age_id AND abusetype_id = abuse_case.abusetype_id AND zone.zid = abuse_case.zone_id  and abuse_case.age_id = 2 and abuse_case.abusetype_id = 1 and abuse_case.zone_id');
            $this->db->join('abuse_type', 'abuse_type.ab_id = abuse_case.abusetype_id');
            $this->db->join('age', 'age.ag_id = abuse_case.age_id');
            $this->db->join('zone', 'zone.zid = abuse_case.zone_id');
            $this->db->join('town', 'town.tid = abuse_case.town_id');
            $this->db->join('region', 'region.r_id = abuse_case.region_id');
            $this->db->join('kebele', 'kebele.kid = abuse_case.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      public function get11_15htpabuse() {
            $this->db->select('*, sex, age, COUNT(sex) as sex,');
            $this->db->from('abuse_case');
            $this->db->where('age.ag_id= abuse_case.age_id AND abusetype_id = abuse_case.abusetype_id AND zone.zid = abuse_case.zone_id  and abuse_case.age_id = 3 and abuse_case.abusetype_id = 1 and abuse_case.zone_id');
            $this->db->join('abuse_type', 'abuse_type.ab_id = abuse_case.abusetype_id');
            $this->db->join('age', 'age.ag_id = abuse_case.age_id');
            $this->db->join('zone', 'zone.zid = abuse_case.zone_id');
            $this->db->join('town', 'town.tid = abuse_case.town_id');
            $this->db->join('region', 'region.r_id = abuse_case.region_id');
            $this->db->join('kebele', 'kebele.kid = abuse_case.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      public function get16_18htpabuse() {
            $this->db->select('*, COUNT(*) as sex,');
            $this->db->from('abuse_case');
            $this->db->where('age.ag_id= abuse_case.age_id AND abusetype_id = abuse_case.abusetype_id AND zone.zid = abuse_case.zone_id  and abuse_case.age_id = 4 and abuse_case.abusetype_id = 1 and abuse_case.zone_id');
            $this->db->join('abuse_type', 'abuse_type.ab_id = abuse_case.abusetype_id');
            $this->db->join('age', 'age.ag_id = abuse_case.age_id');
            $this->db->join('zone', 'zone.zid = abuse_case.zone_id');
            $this->db->join('town', 'town.tid = abuse_case.town_id');
            $this->db->join('region', 'region.r_id = abuse_case.region_id');
            $this->db->join('kebele', 'kebele.kid = abuse_case.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      public function getsum() {
            $sql = "SELECT sum(sex) as sex FROM disnled_children";
            $result = $this->db->query($sql);
            return $result->row()->sex;
      }

      public function getdisabledchildern() {
            $this->db->select('*, COUNT(*) as sex,');
            $this->db->from('disnled_children');
            $this->db->join('disbled_type', 'disbled_type.d_id = disnled_children.disbledtype_id');
            $this->db->join('age', 'age.ag_id = disnled_children.age_id');
            $this->db->join('zone', 'zone.zid = disnled_children.zone_id');
            $this->db->join('town', 'town.tid = disnled_children.town_id');
            $this->db->join('region', 'region.r_id = disnled_children.region_id');
            $this->db->join('kebele', 'kebele.kid = disnled_children.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      public function getchildfriendly() {
            $this->db->select('*');
            $this->db->from('child_friendly');
            $this->db->join('childfriendly_type', 'childfriendly_type.cf_id = child_friendly.childfriendlytype_id');
            $this->db->join('age', 'age.ag_id = child_friendly.age_id');
            $this->db->join('zone', 'zone.zid = child_friendly.zone_id');
            $this->db->join('town', 'town.tid = child_friendly.town_id');
            $this->db->join('region', 'region.r_id = child_friendly.region_id');
            $this->db->join('kebele', 'kebele.kid = child_friendly.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      public function getchildcare() {
            $this->db->select('*');
            $this->db->from('child_care');
            $this->db->join('childcare_type', 'childcare_type.chc_id = child_care.childcare_type_id');
            $this->db->join('age', 'age.ag_id = child_care.age_id');
            $this->db->join('zone', 'zone.zid = child_care.zone_id');
            $this->db->join('town', 'town.tid = child_care.town_id');
            $this->db->join('region', 'region.r_id = child_care.region_id');
            $this->db->join('kebele', 'kebele.kid = child_care.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      public function getccc_services() {
            $this->db->select('*');
            $this->db->from('ccc_services');
            $this->db->join('ccc_servicestype', 'ccc_servicestype.ccc_id = ccc_services.ccc_services_type_id');
            $this->db->join('age', 'age.ag_id = ccc_services.age_id');
            $this->db->join('zone', 'zone.zid = ccc_services.zone_id');
            $this->db->join('town', 'town.tid = ccc_services.town_id');
            $this->db->join('region', 'region.r_id = ccc_services.region_id');
            $this->db->join('kebele', 'kebele.kid = ccc_services.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      public function getpost_placement() {
            $this->db->select('*');
            $this->db->from('post_placement');
            $this->db->join('post_placementtype', 'post_placementtype.pp_id = post_placement.post_placementtype_id');
            $this->db->join('age', 'age.ag_id = post_placement.age_id');
            $this->db->join('zone', 'zone.zid = post_placement.zone_id');
            $this->db->join('town', 'town.tid = post_placement.town_id');
            $this->db->join('region', 'region.r_id = post_placement.region_id');
            $this->db->join('kebele', 'kebele.kid = post_placement.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

      public function getcareandsupport() {
            $this->db->select('*');
            $this->db->from('careandsupport');
            $this->db->join('careandsupporttype', 'careandsupporttype.css_id = careandsupport.careandsupporttype_id');
            $this->db->join('age', 'age.ag_id = careandsupport.age_id');
            $this->db->join('zone', 'zone.zid = careandsupport.zone_id');
            $this->db->join('town', 'town.tid = careandsupport.town_id');
            $this->db->join('region', 'region.r_id = careandsupport.region_id');
            $this->db->join('kebele', 'kebele.kid = careandsupport.kebele');
            $qeury = $this->db->get();

            if ($qeury) {
                  return $qeury->result();
            } else {
                  return false;
            }
      }

// public function getAuthors()
//     {
//     	$query=$this->db->get('author');
//     	if($query)
//     	{
//     		return $query->result();
//     	}
//     	else
//     	{
//     		return false;
//     	}
//     }

      public function getbooks() {
            $aid = $this->input->post('aid');

            $this->db->where('auther_id', $aid);
            $query = $this->db->get('books');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      function getRows($params = array()) {
            $this->db->select('*');
            $this->db->from('research');
            // $this->db->where('status','0');
            $this->db->order_by('created_at', 'desc');
            if (array_key_exists('id', $params) && !empty($params['id'])) {
                  $this->db->where('id', $params['id']);
                  //get records
                  $query = $this->db->get();
                  $result = ($query->num_rows() > 0) ? $query->row_array() : FALSE;
            } else {
                  //set start and limit
                  if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                        $this->db->limit($params['limit'], $params['start']);
                  } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                        $this->db->limit($params['limit']);
                  }
                  //get records
                  $query = $this->db->get();
                  $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
            //return fetched data
            return $result;
      }

      public function listof_document() {
            $this->db->order_by('id', 'DESC');
            // $this->db->where('employee_id',$id);
            $query = $this->db->get('research');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      // public function listof_document2($user)
      // {
      // 	$this->db->select('*');
      // 	$this->db->from('research');
      // 	$this->db->join('sites','sites.sid = research.site_id');
      // 	$this->db->order_by('id' , 'DESC');
      // 	$this->db->where('created_by',$user);
      // 	$qeury=$this->db->get();
      // 	if($qeury)
      // 	{
      // 		return $qeury->result();
      // 	}
      // 	else
      // 	{
      // 		return false;
      // 	}
      // }
// public function listof_document2($user)
//     {
//     	$this->db->order_by('id' , 'DESC');
//     	$this->db->where('created_by',$user);
//     	 $this->db->where('employee_id',$id);
// 	$query=$this->db->get('research');
// 	if($query)
// 	{
// 		return $query->result();
// 	}
// 	else
// 	{
// 		return false;
// 	}
// }

      public function deleteresearch($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('research');
            if ($query) {
                  return true;
            } else {
                  return false;
            }
      }

      public function getApprovedCount() {
            $this->db->select('count(*) as no');
            $this->db->where('is_view_approved_request = 0 and is_approved_by_director =1 and is_approved_by_finance=1 and is_rejected_by_director =0 and is_rejected_by_finance =0');
            $this->db->from('request');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function getWaitingCount() {
            $this->db->select('count(*) as no');
            $this->db->where('is_approved_by_finance = 0 and is_approved_by_director=  1  or is_approved_by_director = 0 and  is_rejected_by_director = 0 ');
            $this->db->from('request');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

      public function RejectCount() {
            $this->db->select('count(*) as no');
            $this->db->where('is_rejected_by_director = 2  and is_approved_by_director = 0');

            $this->db->from('request');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

}
