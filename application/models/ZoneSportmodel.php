<?php

class ZoneSportmodel extends CI_Model
{

 function fetch_sporttype()
 {
  $this->db->order_by("spt_name", "ASC");
  $query = $this->db->get("sporttype");
  return $query->result();
 }

 function fetch_position($spt_id)
 {
  $this->db->where('sporttype_id ', $spt_id);
  $this->db->order_by('p_name', 'ASC');
  $query = $this->db->get('positiontap');
  $output = '<option value="">Bakka Fili</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->pos_id.'">'.$row->p_name.'</option>';
  }
  return $output;
 }
 
  function fetch_clubtype($spt_id)
 {
  $this->db->where('sporttype_id ', $spt_id);
  $this->db->order_by('ct_name', 'ASC');
  $query = $this->db->get('clubtype');
  $output = '<option value="">Gosa Kilabii</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->ct_id.'">'.$row->ct_name.'</option>';
  }
  return $output;
 }
  function fetch_country()
 {
  $this->db->order_by("zname", "ASC");
  $query = $this->db->get("zone");
  return $query->result();
 }
 function fetch_state($zid)
 {
  $this->db->where('zone_id_woreda', $zid);
  $this->db->order_by('woreda_name', 'ASC');
  $query = $this->db->get('woreda');
  $output = '<option value="">Aanaa fili</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->woreda_id.'">'.$row->woreda_name.'</option>';
  }
  return $output;
 }

 function fetch_city($woreda_id)
 {
  $this->db->where('wid', $woreda_id);
  $this->db->order_by('kname', 'ASC');
  $query = $this->db->get('kebele');
  $output = '<option value="">Ganda Fili</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->kid.'">'.$row->kname.'</option>';
  }
  return $output;
 }

  function fetch_cityy()
 {
  $this->db->order_by("cname", "ASC");
  $query = $this->db->get("city");
  return $query->result();
 }

 function fetch_subcity($cid)
 {
  $this->db->where('city_id', $cid);
  $this->db->order_by('subcity_name', 'ASC');
  $query = $this->db->get('subcity');
  $output = '<option value="">Kutaa Magaalaa Fili</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->subcity_id.'">'.$row->subcity_name.'</option>';
  }
  return $output;
 }

 function fetch_subcitywd($subcity_id)
 {
  $this->db->where('sbcity_id', $subcity_id);
  $this->db->order_by('sbw_name', 'ASC');
  $query = $this->db->get('subcity_woreda');
  $output = '<option value="">Aanaa fili</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->sbw_id.'">'.$row->sbw_name.'</option>';
  }
  return $output;
 }



 public function downloadfile($ins_id){
                        $query = $this->db->get_where('inisheetivii',array('ins_id'=>$ins_id));
                        return $query->row_array();
                }

 public function downloadkarta($ol_id){
                        $query = $this->db->get_where('olmaisporti',array('ol_id'=>$ol_id));
                        return $query->row_array();
                }
public function CertificateLenji($lenji_id){

    $this->db->where('lenji_id',$lenji_id);
   
      $query=$this->db->get('lenji');
      if($query)
      {
        return $query->row();
      }
      else
      {
        return false;
      }

  }


public function getmadali() {
            $this->db->select('*');
            $this->db->from('madali');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      } 
public function save_Madalli() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
           
            $data = array(
                
                'date' => $this->input->post('date'),
                'maqalenjia' => $this->input->post('maqalenjia'),
                'ggl_id' => $this->input->post('ggl_id'),
                'ramumuri' => $this->input->post('ramumuri'),
                'sex' => $this->input->post('sex'),
                'age' => $this->input->post('age'),
                'weight' => $this->input->post('weight'),
                'height' => $this->input->post('height'),
                'indexmass' => $this->input->post('indexmass'),
                'seattop' => $this->input->post('seattop'),
                'hiptoe' => $this->input->post('hiptoe'),
                'arm' => $this->input->post('arm'),
                'forarm' => $this->input->post('forarm'),
                'limbthigh' => $this->input->post('limbthigh'),
                'limbleg' => $this->input->post('limbleg'),
                'waist' => $this->input->post('waist'),
                'hip' => $this->input->post('hip'),
                'chest' => $this->input->post('chest'),
                'thigh' => $this->input->post('thigh'),
                'sitreach' => $this->input->post('sitreach'),
                'situp' => $this->input->post('situp'),
                'pushup' => $this->input->post('pushup'),
                'plank' => $this->input->post('plank'),
                'run' => $this->input->post('run'),
                'cooper' => $this->input->post('cooper'),
                'illinois' => $this->input->post('illinois'),
                'reaction' => $this->input->post('reaction'),
                'vjump' => $this->input->post('vjump'),
                'coordination' => $this->input->post('coordination'),
                'totalqama' => $this->input->post('totalqama'),
                'shooting' => $this->input->post('shooting'),
                'passing' => $this->input->post('passing'),
                'juggling' => $this->input->post('juggling'),
                'dribbling' => $this->input->post('dribbling'),
                'sprint' => $this->input->post('sprint'),
                'goalsave' => $this->input->post('goalsave'),
                'totaltekinika' => $this->input->post('totaltekinika'),
                'pressing' => $this->input->post('pressing'),
                'theoretical' => $this->input->post('theoretical'),
                'setpiece' => $this->input->post('setpiece'),
                'rondos' => $this->input->post('rondos'),
                'intelligence' => $this->input->post('intelligence'),
                'smallsided' => $this->input->post('smallsided'),
                'xinsamu' => $this->input->post('xinsamu'),
                'ttotal' => $this->input->post('ttotal'),
                'totalgaumsa' => $this->input->post('totalgaumsa'),
                'date' => $this->input->post('date'),
                                
                'operator' => $username,
            );
            $query = $this->db->insert('madali', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

  public function save_Guddattoota() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
           
            $data = array(
                'gu_name' => $this->input->post('gu_name'),
                'saala' => $this->input->post('saala'),
                'bara' => $this->input->post('bara'),
                'illitoota' => $this->input->post('illitoota'),
                'sport_type' => $this->input->post('sport_type'),
                  'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                
                'operator' => $username,
            );
            $query = $this->db->insert('guddattoota', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

public function Edit_Guddattoota($gu_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            
            $data = array(
              'gu_name' => $this->input->post('gu_name'),
                'saala' => $this->input->post('saala'),
                'bara' => $this->input->post('bara'),
                'illitoota' => $this->input->post('illitoota'),
                'sport_type' => $this->input->post('sport_type'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'operator' => $username,   );
            $this->db->where('gu_id', $gu_id);
            $query = $this->db->update('guddattoota', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function getGuddattoota(){
            $this->db->select('*');
    $this->db->from('guddattoota');
    $this->db->where('guddattoota.zone_id', $this->session->userdata('zone'));
    $this->db->join('woreda', 'woreda.woreda_id = guddattoota.woreda_id', 'left');
    $this->db->join('zone', 'zone.zid = guddattoota.zone_id', 'left');
     $this->db->join('kebele', 'kebele.kid = guddattoota.ganda_id', 'left');
     $this->db->join('city', 'city.cid = guddattoota.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = guddattoota.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = guddattoota.akmagala_id', 'left');
        
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
public function Delete_Guddattoota($gu_id) {
            $this->db->where('gu_id', $gu_id);
            $query = $this->db->delete('guddattoota');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }
public function deletedoc($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete('  research');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }

  public function getpositiontap() {
      $spt_id = $this->input->post('spt_id');
            $this->db->where('sporttype_id', $spt_id);

            $query = $this->db->get('positiontap');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }
  public function getsclubtype() {
            $spt_id = $this->input->post('spt_id');
            $this->db->where('sporttype_id', $spt_id);

            $query = $this->db->get('clubtype');
            if ($query) {
                  return $query->result();
            } else {
                  return false;
            }
      }

public function CertificateMurte($mur_id){

    $this->db->where('mur_id',$mur_id);
   
      $query=$this->db->get('murte');
      if($query)
      {
        return $query->row();
      }
      else
      {
        return false;
      }

  }
 
    public function save_garee() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'maqa_kilabi' => $this->input->post('maqa_kilabi'),
                'k_dob' => $this->input->post('k_dob'),
                'muuxannoo' => $this->input->post('muuxannoo'),
                'sport_type' => $this->input->post('sport_type'),
                'bajata' => $this->input->post('bajata'),
                'maqa_lenjisa' => $this->input->post('maqa_lenjisa'),
                's_barnota' => $this->input->post('s_barnota'),
                's_lenjisa' => $this->input->post('s_lenjisa'),
                'bara_bekamti' => $this->input->post('bara_bekamti'),
                'bara_harahe' => $this->input->post('bara_harahe'),
                'woreda_id' => $this->input->post('dhalotaA_id'),
                'zone_id' => $zone,
                'ganda_id' => $this->input->post('dhalotaK_id'),
                // 'magala_id' => $this->input->post('magala_id'),
                // 'kmagala_id' => $this->input->post('kmagala_id'),
                // 'akmagala_id' => $this->input->post('akmagala_id'),
                // 'userid' => $User,
                'created_by' => $username,
            );
            $query = $this->db->insert('garee', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

   public function Updategaree($gr_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'maqa_kilabi' => $this->input->post('maqa_kilabi'),
                'k_dob' => $this->input->post('k_dob'),
                'muuxannoo' => $this->input->post('muuxannoo'),
                'sport_type' => $this->input->post('sport_type'),
                'bajata' => $this->input->post('bajata'),
                'maqa_lenjisa' => $this->input->post('maqa_lenjisa'),
                's_barnota' => $this->input->post('s_barnota'),
                's_lenjisa' => $this->input->post('s_lenjisa'),
                'bara_bekamti' => $this->input->post('bara_bekamti'),
                'bara_harahe' => $this->input->post('bara_harahe'),
                'woreda_id' => $this->input->post('dhalotaA_id'),
                'zone_id' => $this->input->post('dhalotaG_id'),
                'ganda_id' => $this->input->post('dhalotaK_id'),
                //  'magala_id' => $this->input->post('magala_id'),
                // 'kmagala_id' => $this->input->post('kmagala_id'),
                // 'akmagala_id' => $this->input->post('akmagala_id'),
                // 'userid' => $User,
                'created_by' => $username,            );
            $this->db->where('gr_id', $gr_id);
            $query = $this->db->update('garee', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

 public function Delete_garee($gr_id) {
            $this->db->where('gr_id', $gr_id);
            $query = $this->db->delete('garee');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }


public function getgaree() {
    $this->db->select('*');
    $this->db->where('garee.zone_id', $this->session->userdata('zone'));
    $this->db->from('garee');
    $this->db->join('woreda', 'woreda.woreda_id = garee.woreda_id', 'left');
    $this->db->join('zone', 'zone.zid = garee.zone_id', 'left');
    $this->db->join('kebele', 'kebele.kid = garee.ganda_id', 'left');
    $this->db->join('city', 'city.cid = garee.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = garee.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = garee.akmagala_id', 'left');
    
    $query = $this->db->get();
    if ($query) {
        return $query->result();
    } else {
        // Handle the error case
        return false;
    }
}

   public function getbslg() {
            $this->db->select('*');
            $this->db->from('sgl');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }
  public function Delete_guddattootasgl($gslg_id) {
            $this->db->where('gslg_id', $gslg_id);
            $query = $this->db->delete('gslg');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }


public function getgslg(){
            $this->db->select('*');
    $this->db->from('gslg');
    $this->db->where('gslg.zone_id', $this->session->userdata('zone'));
          $this->db->order_by('gslg_id' , 'DESC');
   $this->db->join('sgl', 'sgl.sgl_id = gslg.bslg_id', 'left');
    
   $this->db->join('woreda', 'woreda.woreda_id = gslg.woreda_id', 'left');
    $this->db->join('zone', 'zone.zid = gslg.zone_id', 'left');
    $this->db->join('kebele', 'kebele.kid = gslg.ganda_id', 'left');
     $this->db->join('city', 'city.cid = gslg.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = gslg.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = gslg.akmagala_id', 'left'); 
    
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 


public function save_murteessummaa() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'maqalenjia' => $this->input->post('maqalenjia'),
                'umuri' => $this->input->post('umuri'),
                'saala' => $this->input->post('saala'),
                'len_phone' => $this->input->post('len_phone'),
                'len_dob' => $this->input->post('len_dob'),
                'sbarnota' => $this->input->post('sbarnota'),
                'type' => $this->input->post('type'),
                'slenji' => $this->input->post('slenji'),
                'haala' => $this->input->post('haala'),
                'len_zone' => $this->input->post('len_zone'),
                'len_woreda' => $this->input->post('len_woreda'),
                'len_ganda' => $this->input->post('len_ganda'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $username,
            );
            $query = $this->db->insert('murte', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
public function Edit_murteessummaa($mur_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
               'maqalenjia' => $this->input->post('maqalenjia'),
                'umuri' => $this->input->post('umuri'),
                'saala' => $this->input->post('saala'),
                'len_phone' => $this->input->post('len_phone'),
                'len_dob' => $this->input->post('len_dob'),
                'sbarnota' => $this->input->post('sbarnota'),
                'type' => $this->input->post('type'),
                'slenji' => $this->input->post('slenji'),
                'haala' => $this->input->post('haala'),
                'len_zone' => $this->input->post('len_zone'),
                'len_woreda' => $this->input->post('len_woreda'),
                'len_ganda' => $this->input->post('len_ganda'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $username,   );
            $this->db->where('mur_id', $mur_id);
            $query = $this->db->update('murte', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Delete_lenjim($mur_id) {
            $this->db->where('mur_id', $mur_id);
            $query = $this->db->delete('murte');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }

      public function Delete_lenji($lenji_id) {
            $this->db->where('lenji_id', $lenji_id);
            $query = $this->db->delete('lenji');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }

public function save_Leenjisummaa() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'maqalenjia' => $this->input->post('maqalenjia'),
                'umuri' => $this->input->post('umuri'),
                'saala' => $this->input->post('saala'),
                'len_phone' => $this->input->post('len_phone'),
                'len_dob' => $this->input->post('len_dob'),
                'sbarnota' => $this->input->post('sbarnota'),
                'type' => $this->input->post('type'),
                'slenji' => $this->input->post('slenji'),
                'haala' => $this->input->post('haala'),
                'len_zone' => $this->input->post('len_zone'),
                'len_woreda' => $this->input->post('len_woreda'),
                'len_ganda' => $this->input->post('len_ganda'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $username,
            );
            $query = $this->db->insert('lenji', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
public function Edit_Leenjisummaa($lenji_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
               'maqalenjia' => $this->input->post('maqalenjia'),
                'umuri' => $this->input->post('umuri'),
                'saala' => $this->input->post('saala'),
                'len_phone' => $this->input->post('len_phone'),
                'len_dob' => $this->input->post('len_dob'),
                'sbarnota' => $this->input->post('sbarnota'),
                'type' => $this->input->post('type'),
                'slenji' => $this->input->post('slenji'),
                'haala' => $this->input->post('haala'),
                'len_zone' => $this->input->post('len_zone'),
                'len_woreda' => $this->input->post('len_woreda'),
                'len_ganda' => $this->input->post('len_ganda'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $username,   );
            $this->db->where('lenji_id', $lenji_id);
            $query = $this->db->update('lenji', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }


public function getLeenjisummaa(){
            $this->db->select('*');
    $this->db->from('lenji');
    $this->db->where('lenji.len_zone', $this->session->userdata('zone'));
    $this->db->order_by('lenji_id' , 'DESC');

    $this->db->join('woreda', 'woreda.woreda_id = lenji.len_woreda', 'left');
    $this->db->join('zone', 'zone.zid = lenji.len_zone', 'left');
    $this->db->join('kebele', 'kebele.kid = lenji.len_ganda', 'left');
     $this->db->join('city', 'city.cid = lenji.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = lenji.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = lenji.akmagala_id', 'left'); 
    
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
public function getMurteessummaa(){
            $this->db->select('*');
    $this->db->from('murte');
    $this->db->where('murte.len_zone', $this->session->userdata('zone'));

      $this->db->order_by('mur_id' , 'DESC');

    $this->db->join('woreda', 'woreda.woreda_id = murte.len_woreda', 'left');
    $this->db->join('zone', 'zone.zid = murte.len_zone', 'left');
    $this->db->join('kebele', 'kebele.kid = murte.len_ganda', 'left');
     $this->db->join('city', 'city.cid = murte.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = murte.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = murte.akmagala_id', 'left'); 
    
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 

  public function save_sgl() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'maqasgl' => $this->input->post('maqasgl'),
                'uni_name' => $this->input->post('uni_name'),
                'barahun' => $this->input->post('barahun'),
                'degeraa' => $this->input->post('degeraa'),
                'sport_type' => $this->input->post('sport_type'),
                'len_name' => $this->input->post('len_name'),
                'bilbila' => $this->input->post('bilbila'),
                'szone_id' => $this->input->post('zone_id'),
                'sworeda_id' => $this->input->post('woreda_id'),
                'sganda_id' => $this->input->post('ganda_id'),
                'smagala_id' => $this->input->post('magala_id'),
                'skmagala_id' => $this->input->post('kmagala_id'),
                'sakmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $username,
            );
            $query = $this->db->insert('sgl', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
public function Edit_sgl($sgl_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
               'maqasgl' => $this->input->post('maqasgl'),
                'uni_name' => $this->input->post('uni_name'),
                'barahun' => $this->input->post('barahun'),
                'degeraa' => $this->input->post('degeraa'),
                'sport_type' => $this->input->post('sport_type'),
                'len_name' => $this->input->post('len_name'),
                'bilbila' => $this->input->post('bilbila'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $username,
                  );
            $this->db->where('sgl_id', $sgl_id);
            $query = $this->db->update('sgl', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function Delete_sgl($sgl_id) {
            $this->db->where('sgl_id', $sgl_id);
            $query = $this->db->delete('sgl');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }


public function getsgl(){
            $this->db->select('*');
    $this->db->from('sgl');
    $this->db->where('sgl.szone_id', $this->session->userdata('zone'));

    $this->db->join('woreda', 'woreda.woreda_id = sgl.sworeda_id', 'left');
    $this->db->join('zone', 'zone.zid = sgl.szone_id', 'left');
    $this->db->join('kebele', 'kebele.kid = sgl.sganda_id', 'left');
     $this->db->join('city', 'city.cid = sgl.smagala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = sgl.skmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = sgl.sakmagala_id', 'left'); 
    
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 

public function gettaphata(){
            $this->db->select('*');
    $this->db->from('taphata');
    $this->db->where('taphata.zone_id', $this->session->userdata('zone'));

      $this->db->order_by('tpt_id' , 'DESC');
      $this->db->join('sporttype', 'sporttype.spt_id = taphata.gosasport', 'left');
    $this->db->join('positiontap', 'positiontap.pos_id = taphata.positiontap', 'left');
           
    $this->db->join('kilabi', 'kilabi.k_id = taphata.kilabi_id', 'left');
    $this->db->join('zone', 'zone.zid = taphata.zone_id', 'left');
    $this->db->join('woreda', 'woreda.woreda_id = taphata.woreda_id', 'left');
    $this->db->join('kebele', 'kebele.kid = taphata.ganda_id', 'left');
    $this->db->join('city', 'city.cid = taphata.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = taphata.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = taphata.akmagala_id', 'left');       
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 

  public function profiletaphata($tpt_id){

    $this->db->where('tpt_id',$tpt_id);
    $this->db->join('kilabi', 'kilabi.k_id = taphata.kilabi_id', 'left');
    $this->db->join('zone', 'zone.zid = taphata.zone_id', 'left');
    $this->db->join('woreda', 'woreda.woreda_id = taphata.woreda_id', 'left');
    $this->db->join('kebele', 'kebele.kid = taphata.ganda_id', 'left');
    $this->db->join('city', 'city.cid = taphata.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = taphata.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = taphata.akmagala_id', 'left');       
           
   
      $query=$this->db->get('taphata');
      if($query)
      {
        return $query->row();
      }
      else
      {
        return false;
      }

  }

    public function profileGuddattootaSLG($gslg_id){

    $this->db->where('gslg_id',$gslg_id);
   $this->db->join('sgl', 'sgl.sgl_id = gslg.bslg_id', 'left');
   $this->db->join('woreda', 'woreda.woreda_id = gslg.woreda_id', 'left');
    $this->db->join('zone', 'zone.zid = gslg.zone_id', 'left');
    $this->db->join('kebele', 'kebele.kid = gslg.ganda_id', 'left');
     $this->db->join('city', 'city.cid = gslg.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = gslg.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = gslg.akmagala_id', 'left');
   
      $query=$this->db->get('gslg');
      if($query)
      {
        return $query->row();
      }
      else
      {
        return false;
      }

  }
public function getSporttype() {
            $this->db->select('*');
            $this->db->from('sporttype');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }  
public function getClubtype() {
            $this->db->select('*');
            $this->db->from('clubtype');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      } 
public function getKilabi() {
            $this->db->select('*');
            $this->db->from('kilabi');
            $query = $this->db->get();
            if ($query) {
                  return $query->result();
            } else {
                  return FALSE;
            }
      }


   


public function save_ggl() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
           
            $data = array(
                'uni_name' => $this->input->post('uni_name'),
                'maqaaggl' => $this->input->post('maqaaggl'),
                'abbumma' => $this->input->post('abbumma'),
                'sport_type' => $this->input->post('sport_type'),
                'teessoo' => $this->input->post('teessoo'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                
                'operator' => $username,
            );
            $query = $this->db->insert('gglenji', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

public function Edit_ggl($ggl_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            
            $data = array(
             'uni_name' => $this->input->post('uni_name'),
                'maqaaggl' => $this->input->post('maqaaggl'),
                'abbumma' => $this->input->post('abbumma'),
                'sport_type' => $this->input->post('sport_type'),
                'teessoo' => $this->input->post('teessoo'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $username,   );
            $this->db->where('ggl_id', $ggl_id);
            $query = $this->db->update('gglenji', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function getggl(){
            $this->db->select('*');
    $this->db->from('gglenji');
      $this->db->order_by('ggl_id' , 'DESC');
    $this->db->where('gglenji.zone_id', $this->session->userdata('zone'));

    $this->db->join('zone', 'zone.zid = gglenji.zone_id', 'left');
    $this->db->join('woreda', 'woreda.woreda_id = gglenji.woreda_id', 'left');
    $this->db->join('kebele', 'kebele.kid = gglenji.ganda_id', 'left');
    $this->db->join('city', 'city.cid = gglenji.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = gglenji.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = gglenji.akmagala_id', 'left');       
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 

public function Delete_ggl($ggl_id) {
            $this->db->where('ggl_id', $ggl_id);
            $query = $this->db->delete('gglenji');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      } 
 public function save_mbfibb() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
           
            $data = array(
                
                'teessoo' => $this->input->post('teessoo'),
                'zone_id' => $this->input->post('zone_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kg' => $this->input->post('kg'),

                'tokkofa' => $this->input->post('tokkofa'),
                'lammafa' => $this->input->post('lammafa'),
                'olana' => $this->input->post('olana'),
                'tk_dhi' => $this->input->post('tk_dhi'),
                'tk_dha' => $this->input->post('tk_dha'),
                'tk_ida' => $this->input->post('tk_ida'),
                'kg_dhi' => $this->input->post('kg_dhi'),
                'kg_dha' => $this->input->post('kg_dha'),
                'kg_ida' => $this->input->post('kg_ida'),
                 'lm_dhi' => $this->input->post('lm_dhi'),
                'lm_dha' => $this->input->post('lm_dha'),
                'lm_ida' => $this->input->post('lm_ida'),
                'ol_dhi' => $this->input->post('ol_dhi'),
                'ol_dha' => $this->input->post('ol_dha'),
                'ol_ida' => $this->input->post('ol_ida'),
                
                'operator' => $username,
            );
            $query = $this->db->insert('mbfibb', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

public function Edit_mbfibb($mb_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            
            $data = array(
             'teessoo' => $this->input->post('teessoo'),
                'zone_id' => $this->input->post('zone_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kg' => $this->input->post('kg'),
                'tokkofa' => $this->input->post('tokkofa'),
                'lammafa' => $this->input->post('lammafa'),
                'olana' => $this->input->post('olana'),
                'tk_dhi' => $this->input->post('tk_dhi'),
                'tk_dha' => $this->input->post('tk_dha'),
                'tk_ida' => $this->input->post('tk_ida'),
                'kg_dhi' => $this->input->post('kg_dhi'),
                'kg_dha' => $this->input->post('kg_dha'),
                'kg_ida' => $this->input->post('kg_ida'),
                 'lm_dhi' => $this->input->post('lm_dhi'),
                'lm_dha' => $this->input->post('lm_dha'),
                'lm_ida' => $this->input->post('lm_ida'),
                'ol_dhi' => $this->input->post('ol_dhi'),
                'ol_dha' => $this->input->post('ol_dha'),
                'ol_ida' => $this->input->post('ol_ida'),
                'operator' => $username,   );
            $this->db->where('mb_id', $mb_id);
            $query = $this->db->update('mbfibb', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function getmbfibb(){
            $this->db->select('*');
    $this->db->from('mbfibb');
    $this->db->join('zone', 'zone.zid = mbfibb.zone_id', 'left');
    $this->db->join('city', 'city.cid = mbfibb.magala_id', 'left');
    
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 

public function Delete_mbfibb($mb_id) {
            $this->db->where('mb_id', $mb_id);
            $query = $this->db->delete('mbfibb');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }
public function save_inisheetivii() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
           
            $data = array(
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
            );
            $query = $this->db->insert('inisheetivii', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

public function Edit_inisheetivii($ins_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            
            $data = array(
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
                'operator' => $username,   );
            $this->db->where('ins_id', $ins_id);
            $query = $this->db->update('inisheetivii', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function getinisheetivii(){
            $this->db->select('*');
    $this->db->from('inisheetivii');
    $this->db->join('zone', 'zone.zid = inisheetivii.zone_id', 'left');
    $this->db->join('woreda', 'woreda.woreda_id = inisheetivii.woreda_id', 'left');
    $this->db->join('kebele', 'kebele.kid = inisheetivii.ganda_id', 'left');
     $this->db->join('city', 'city.cid = inisheetivii.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = inisheetivii.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = inisheetivii.akmagala_id', 'left');
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 

public function Delete_inisheetivii($ins_id) {
            $this->db->where('ins_id', $ins_id);
            $query = $this->db->delete('inisheetivii');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }

public function save_istediyemi() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
           
            $data = array(
                 'std_name' => $this->input->post('std_name'),
                'hektara' => $this->input->post('hektara'),
                'tiribuni' => $this->input->post('tiribuni'),
                'std_level' => $this->input->post('std_level'),
                'type' => $this->input->post('type'),
                'bhojetame' => $this->input->post('bhojetame'),
                'qabiyye' => $this->input->post('qabiyye'),
                'haromee' => $this->input->post('haromee'),
                'teessoo' => $this->input->post('teessoo'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'yada' => $this->input->post('yada'),
                
                'operator' => $username,
            );
            $query = $this->db->insert('istediyemi', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

public function Edit_istediyemi($std_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            
            $data = array(
              'maqaa' => $this->input->post('maqaa'),
                'dob' => $this->input->post('dob'),
                'sadarka' => $this->input->post('sadarka'),
                'bara' => $this->input->post('bara'),
                'zone_id' => $this->input->post('zone_id'),
                'maqaisporti' => $this->input->post('maqaisporti'),
                'zone_id' => $this->input->post('zone_id'),
                'gosa' => $this->input->post('gosa'),
                'ggl' => $this->input->post('ggl'),
                'yada' => $this->input->post('yada'),
                'operator' => $username,   );
            $this->db->where('std_id', $mn_id);
            $query = $this->db->update('istediyemi', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function getistediyemi(){
            $this->db->select('*');
    $this->db->from('istediyemi');
     $this->db->where('istediyemi.zone_id', $this->session->userdata('zone'));
    $this->db->join('zone', 'zone.zid = istediyemi.zone_id', 'left');
    $this->db->join('woreda', 'woreda.woreda_id = istediyemi.woreda_id', 'left');
    $this->db->join('kebele', 'kebele.kid = istediyemi.ganda_id', 'left');
     $this->db->join('city', 'city.cid = istediyemi.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = istediyemi.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = istediyemi.akmagala_id', 'left');
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
public function Delete_istediyemi($std_id) {
            $this->db->where('std_id', $std_id);
            $query = $this->db->delete('istediyemi');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }
public function save_boimb() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
           
            $data = array(
                'mn_name' => $this->input->post('mn_name'),
                'qabeenya' => $this->input->post('qabeenya'),
                'sbarnota' => $this->input->post('sbarnota'),
                'type' => $this->input->post('type'),
                'hektara' => $this->input->post('hektara'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                 'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'iddoo' => $this->input->post('iddoo'),
                'bara' => $this->input->post('bara'),
                'yada' => $this->input->post('yada'),
                
                'operator' => $username,
            );
            $query = $this->db->insert('boimb', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

public function Edit_boimb($mb_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            
            $data = array(
               'mn_name' => $this->input->post('mn_name'),
                'qabeenya' => $this->input->post('qabeenya'),
                'sbarnota' => $this->input->post('sbarnota'),
                'type' => $this->input->post('type'),
                'hektara' => $this->input->post('hektara'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                 'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'iddoo' => $this->input->post('iddoo'),
                'bara' => $this->input->post('bara'),
                'yada' => $this->input->post('yada'),
                'operator' => $username,   );
            $this->db->where('mn_id', $mn_id);
            $query = $this->db->update('boimb', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function getboimn(){
            $this->db->select('*');
    $this->db->from('boimb');
     $this->db->where('boimb.zone_id', $this->session->userdata('zone'));
    $this->db->join('zone', 'zone.zid = boimb.zone_id', 'left');
    $this->db->join('woreda', 'woreda.woreda_id = boimb.woreda_id', 'left');
    $this->db->join('kebele', 'kebele.kid = boimb.ganda_id', 'left');
     $this->db->join('city', 'city.cid = boimb.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = boimb.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = boimb.akmagala_id', 'left');    
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
public function Delete_boimb($mb_id) {
            $this->db->where('mb_id', $mb_id);
            $query = $this->db->delete('boimb');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }

public function save_Giddugalaleenjii() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
           
            $data = array(
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
            );
            $query = $this->db->insert('gidugala', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

public function Edit_Giddugalaleenjii($gl_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            
            $data = array(
              'maqaa' => $this->input->post('maqaa'),
                'dob' => $this->input->post('dob'),
                'sadarka' => $this->input->post('sadarka'),
                'bara' => $this->input->post('bara'),
                'barabh' => $this->input->post('barabh'),
                'zone_id' => $this->input->post('zone_id'),
                'magala_id' => $this->input->post('magala_id'),
                'magala_id' => $this->input->post('magala_id'),
                'maqaisporti' => $this->input->post('maqaisporti'),
                'zone_id' => $this->input->post('zone_id'),
                'gosa' => $this->input->post('gosa'),
                'ggl' => $this->input->post('ggl'),
                'yada' => $this->input->post('yada'),
                'operator' => $username,   );
            $this->db->where('gl_id', $gl_id);
            $query = $this->db->update('gidugala', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function getGiddugalaleenjii(){
            $this->db->select('*');
    $this->db->from('gidugala');
    $this->db->where('gidugala.zone_id', $this->session->userdata('zone'));

    $this->db->join('positiontap', 'positiontap.pos_id = gidugala.gosa', 'left');
    $this->db->join('sporttype', 'sporttype.spt_id = gidugala.maqaisporti', 'left');
    $this->db->join('zone', 'zone.zid = gidugala.zone_id', 'left');
    $this->db->join('city', 'city.cid = gidugala.magala_id', 'left');
        
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
public function Delete_Giddugalaleenjii($gl_id) {
            $this->db->where('gl_id', $gl_id);
            $query = $this->db->delete('gidugala');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }
public function save_olmaisporti() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
           
            $data = array(
                'type' => $this->input->post('type'),
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
            );
            $query = $this->db->insert('olmaisporti', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

public function Edit_olmaisporti($ol_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            
            $data = array(
              'type' => $this->input->post('type'),
              'maqaboi' => $this->input->post('maqaboi'),
                'gosaboi' => $this->input->post('gosaboi'),
                'standard' => $this->input->post('standard'),
                'qabenyuma' => $this->input->post('qabenyuma'),
                'hektar' => $this->input->post('hektar'),
                'tajaajila' => $this->input->post('tajaajila'),
                'bara' => $this->input->post('bara'),
                'ragaa' => $this->input->post('ragaa'),
                'iddoo' => $this->input->post('iddoo'),
                'ibsa' => $this->input->post('ibsa'),
                // 'zone_id' => $this->input->post('zone_id'),
                // 'woreda_id' => $this->input->post('woreda_id'),
                // 'ganda_id' => $this->input->post('ganda_id'),
                // 'magala_id' => $this->input->post('magala_id'),
                // 'kmagala_id' => $this->input->post('kmagala_id'),
                // 'akmagala_id' => $this->input->post('akmagala_id'),
                'operator' => $username,   );
            $this->db->where('ol_id', $ol_id);
            $query = $this->db->update('olmaisporti', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function getolmaisporti(){
            $this->db->select('*');
    $this->db->from('olmaisporti');
     $this->db->where('olmaisporti.zone_id', $this->session->userdata('zone'));
    $this->db->join('woreda', 'woreda.woreda_id = olmaisporti.woreda_id', 'left');
    $this->db->join('zone', 'zone.zid = olmaisporti.zone_id', 'left');
    $this->db->join('kebele', 'kebele.kid = olmaisporti.ganda_id', 'left');
    $this->db->join('city', 'city.cid = olmaisporti.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = olmaisporti.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = olmaisporti.akmagala_id', 'left');    
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
public function Delete_olmaisporti($ol_id) {
            $this->db->where('ol_id', $ol_id);
            $query = $this->db->delete('olmaisporti');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }

 
public function save_Hirmaattoota() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
           
            $data = array(
                'dorgomi' => $this->input->post('dorgomi'),
                'sadarka' => $this->input->post('sadarka'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'number' => $this->input->post('number'),
                'isp_dhi' => $this->input->post('isp_dhi'),
                'isp_dha' => $this->input->post('isp_dha'),
                'isp_ida' => $this->input->post('isp_ida'),
                'len_dhi' => $this->input->post('len_dhi'),
                'len_dha' => $this->input->post('len_dha'),
                'len_ida' => $this->input->post('len_ida'),
                'dur_dhi' => $this->input->post('dur_dhi'),
                'dur_dha' => $this->input->post('dur_dha'),
                'dur_ida' => $this->input->post('dur_ida'),
                'bir_dhi' => $this->input->post('bir_dhi'),
                'bir_dha' => $this->input->post('bir_dha'),
                'bir_ida' => $this->input->post('bir_ida'),
                'id_dhi' => $this->input->post('id_dhi'),
                'id_dha' => $this->input->post('id_dha'),
                'id_ida' => $this->input->post('id_ida'),
               
                'operator' => $username,
            );
            $query = $this->db->insert('hirmaatota', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

public function Edit_Hirmaattoota($hir_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            
            $data = array(
               'dorgomi' => $this->input->post('dorgomi'),
                'sadarka' => $this->input->post('sadarka'),
                'zone_id' => $this->input->post('zone_id'),
                'woreda_id' => $this->input->post('woreda_id'),
                'ganda_id' => $this->input->post('ganda_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'number' => $this->input->post('number'),
                'isp_dhi' => $this->input->post('isp_dhi'),
                'isp_dha' => $this->input->post('isp_dha'),
                'isp_ida' => $this->input->post('isp_ida'),
                'len_dhi' => $this->input->post('len_dhi'),
                'len_dha' => $this->input->post('len_dha'),
                'len_ida' => $this->input->post('len_ida'),
                'dur_dhi' => $this->input->post('dur_dhi'),
                'dur_dha' => $this->input->post('dur_dha'),
                'dur_ida' => $this->input->post('dur_ida'),
                'bir_dhi' => $this->input->post('bir_dhi'),
                'bir_dha' => $this->input->post('bir_dha'),
                'bir_ida' => $this->input->post('bir_ida'),
                'id_dhi' => $this->input->post('id_dhi'),
                'id_dha' => $this->input->post('id_dha'),
                'id_ida' => $this->input->post('id_ida'),
                'operator' => $username,   );
            $this->db->where('hir_id', $hir_id);
            $query = $this->db->update('hirmaatota', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function getHirmaattoota(){
            $this->db->select('*');
    $this->db->from('hirmaatota');
    $this->db->where('hirmaatota.zone_id', $this->session->userdata('zone'));

    $this->db->join('zone', 'zone.zid = hirmaatota.zone_id', 'left');
    $this->db->join('woreda', 'woreda.woreda_id = hirmaatota.woreda_id', 'left');
    $this->db->join('kebele', 'kebele.kid = hirmaatota.ganda_id', 'left');
     $this->db->join('city', 'city.cid = hirmaatota.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = hirmaatota.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = hirmaatota.akmagala_id', 'left'); 
       
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
public function Delete_Hirmaattoota($hir_id) {
            $this->db->where('hir_id', $hir_id);
            $query = $this->db->delete('hirmaatota');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }
public function save_taphata() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
           
            $data = array(
                'tpt_name' => $this->input->post('tpt_name'),
                'minda' => $this->input->post('minda'),
                'tpt_phone' => $this->input->post('tpt_phone'),
                'agreement' => $this->input->post('agreement'),
                'kilabi_id' => $this->input->post('kilabi_id'),
                
                'operator' => $username,
            );
            $query = $this->db->insert('taphata', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
public function Delete_Taphataa($tpt_id) {
            $this->db->where('tpt_id', $tpt_id);
            $query = $this->db->delete('taphata');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }



  public function save_mmi() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'zone' => $this->input->post('zone'),
                'magala_id' => $this->input->post('magala_id'),
                'level' => $this->input->post('level'),
                'qaama' => $this->input->post('qaama'),
                'total' => $this->input->post('total'),
                'bara' => $this->input->post('bara'),
                'oditi' => $this->input->post('oditi'),
                'nagahe' => $this->input->post('nagahe'),
                'operator' => $username,
            );
            $query = $this->db->insert('mmi', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }
public function Edit_mmi($mmi_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'zone' => $this->input->post('zone'),
                'magala_id' => $this->input->post('magala_id'),
                'level' => $this->input->post('level'),
                'qaama' => $this->input->post('qaama'),
                'total' => $this->input->post('total'),
                'bara' => $this->input->post('bara'),
                'nagahe' => $this->input->post('nagahe'),
                'oditi' => $this->input->post('oditi'),
               
                'operator' => $username,   );
            $this->db->where('mmi_id', $mmi_id);
            $query = $this->db->update('mmi', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function getmmi(){
            $this->db->select('*');
    $this->db->from('mmi');
    // $this->db->join('woreda', 'woreda.woreda_id = wirtu.wworeda_id', 'left');
    // $this->db->join('zone', 'zone.zid = wirtu.wzone_id', 'left');
    // $this->db->join('kebele', 'kebele.kid = wirtu.wkebele_id', 'left');
          
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
  public function Delete_mmi($mmi_id) {
            $this->db->where('mmi_id', $mmi_id);
            $query = $this->db->delete('mmi');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }

public function save_wirtu() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'wirtuu' => $this->input->post('wirtuu'),
                'lenjisa' => $this->input->post('lenjisa'),
                'l_phone' => $this->input->post('l_phone'),
                'w_dob' => $this->input->post('w_dob'),
                'muuxanno' => $this->input->post('muuxanno'),
                'sport_type' => $this->input->post('sport_type'),
                'sadlenji' => $this->input->post('sadlenji'),
                // 'saqee' => $this->input->post('saqee'),
                'wzone_id' => $this->input->post('wzone_id'),
                'wworeda_id' => $this->input->post('wworeda_id'),
                'wkebele_id' => $this->input->post('wkebele_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                'licensereg' => $this->input->post('licensereg'),
                'licenserenew' => $this->input->post('licenserenew'),
                
                'operator' => $username,
            );
            $query = $this->db->insert('wirtu', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

       public function save_Waldaalee() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
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
                
                'operator' => $username,
            );
            $query = $this->db->insert('waldale', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

      public function getwaldale(){
            $this->db->select('*');
    $this->db->from('waldale');
    $this->db->where('waldale.zone_id', $this->session->userdata('zone'));

    $this->db->join('woreda', 'woreda.woreda_id = waldale.woreda_id', 'left');
    $this->db->join('zone', 'zone.zid = waldale.zone_id', 'left');
    $this->db->join('kebele', 'kebele.kid = waldale.ganda_id', 'left');
     $this->db->join('city', 'city.cid = waldale.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = waldale.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = waldale.akmagala_id', 'left'); 
         
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
public function Delete_Waldaalee($wl_id) {
            $this->db->where('wl_id', $wl_id);
            $query = $this->db->delete('waldale');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }
public function saveclub() {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'maqa_kilabi' => $this->input->post('maqa_kilabi'),
                'clubtype' => $this->input->post('clubtype'),
                'k_dob' => $this->input->post('k_dob'),
                'muuxannoo' => $this->input->post('muuxannoo'),
                'sport_type' => $this->input->post('sport_type'),
                'bajata' => $this->input->post('bajata'),
                'maqa_lenjisa' => $this->input->post('maqa_lenjisa'),
                's_barnota' => $this->input->post('s_barnota'),
                's_lenjisa' => $this->input->post('s_lenjisa'),
                'bara_bekamti' => $this->input->post('bara_bekamti'),
                'bara_harahe' => $this->input->post('bara_harahe'),
                'woreda_id' => $this->input->post('dhalotaA_id'),
                'zone_id' => $this->input->post('dhalotaG_id'),
                'ganda_id' => $this->input->post('dhalotaK_id'),
                'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                // 'userid' => $User,
                'created_by' => $username,
            );
            $query = $this->db->insert('kilabi', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return FALSE;
            }
      }

   public function Updateclub($k_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
                'maqa_kilabi' => $this->input->post('maqa_kilabi'),
                'k_dob' => $this->input->post('k_dob'),
                'clubtype' => $this->input->post('clubtype'),
                'muuxannoo' => $this->input->post('muuxannoo'),
                'sport_type' => $this->input->post('sport_type'),
                'bajata' => $this->input->post('bajata'),
                'maqa_lenjisa' => $this->input->post('maqa_lenjisa'),
                's_barnota' => $this->input->post('s_barnota'),
                's_lenjisa' => $this->input->post('s_lenjisa'),
                'bara_bekamti' => $this->input->post('bara_bekamti'),
                'bara_harahe' => $this->input->post('bara_harahe'),
                'woreda_id' => $this->input->post('dhalotaA_id'),
                'zone_id' => $this->input->post('dhalotaG_id'),
                'ganda_id' => $this->input->post('dhalotaK_id'),
                 'magala_id' => $this->input->post('magala_id'),
                'kmagala_id' => $this->input->post('kmagala_id'),
                'akmagala_id' => $this->input->post('akmagala_id'),
                // 'userid' => $User,
                'created_by' => $username,            );
            $this->db->where('k_id', $k_id);
            $query = $this->db->update('kilabi', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

public function Edit_wirtu($w_id) {
            $username= $this->session->userdata('full_name');
            $User = $this->session->userdata('id');
            $zone = $this->session->userdata('zone');
            $woreda = $this->session->userdata('woreda');
            $phone = $this->session->userdata('phone');
            $email = $this->session->userdata('email');
//            $woreda = $this->session->userdata('woreda');

            $data = array(
               'wirtuu' => $this->input->post('wirtuu'),
                'lenjisa' => $this->input->post('lenjisa'),
                'l_phone' => $this->input->post('l_phone'),
                'w_dob' => $this->input->post('w_dob'),
                'muuxanno' => $this->input->post('muuxanno'),
                'sport_type' => $this->input->post('sport_type'),
                'saqee' => $this->input->post('saqee'),
                'wzone_id' => $this->input->post('wzone_id'),
                'wworeda_id' => $this->input->post('wworeda_id'),
                'wkebele_id' => $this->input->post('wkebele_id'),
                'licensereg' => $this->input->post('licensereg'),
                'licenserenew' => $this->input->post('licenserenew'),
                
                'operator' => $username,   );
            $this->db->where('w_id', $w_id);
            $query = $this->db->update('wirtuu', $data);
            if ($query) {
                  return TRUE;
            } else {
                  return false;
            }
      }

      public function getclub(){
            $this->db->select('*');
    $this->db->from('kilabi');
    $this->db->where('kilabi.zone_id', $this->session->userdata('zone'));

    $this->db->join('clubtype', 'clubtype.ct_id = kilabi.clubtype', 'left');
    $this->db->join('sporttype', 'sporttype.spt_id = kilabi.sport_type', 'left');
    $this->db->join('woreda', 'woreda.woreda_id = kilabi.woreda_id', 'left');
    $this->db->join('zone', 'zone.zid = kilabi.zone_id', 'left');
    $this->db->join('kebele', 'kebele.kid = kilabi.ganda_id', 'left');
     $this->db->join('city', 'city.cid = kilabi.magala_id', 'left');
    $this->db->join('subcity', 'subcity.subcity_id = kilabi.kmagala_id', 'left');
    $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = kilabi.akmagala_id', 'left'); 
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 

   public function getwirtu(){
            $this->db->select('*');
    $this->db->from('wirtu');
    $this->db->where('wirtu.wzone_id', $this->session->userdata('zone'));

    // $this->db->join('woreda', 'woreda.woreda_id = wirtu.wworeda_id', 'left');
    // $this->db->join('zone', 'zone.zid = wirtu.wzone_id', 'left');
    // $this->db->join('kebele', 'kebele.kid = wirtu.wkebele_id', 'left');
    //  $this->db->join('city', 'city.cid = wirtu.magala_id', 'left');
    // $this->db->join('subcity', 'subcity.subcity_id = wirtu.kmagala_id', 'left');
    // $this->db->join('subcity_woreda', 'subcity_woreda.sbw_id = wirtu.akmagala_id', 'left'); 
           
    $query = $this->db->get();
    if($query)
    {
      return $query->result();
    }
  } 
public function Delete_wirtu($w_id) {
            $this->db->where('w_id', $w_id);
            $query = $this->db->delete('wirtu');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }

public function deleteclub($id) {
            $this->db->where('k_id', $id);
            $query = $this->db->delete('kilabi');
            if ($query) {
                  return true;
            } else {
                  return FALSE;
            }
      }

public function editclub($k_id)
  {
      $this->db->where('k_id',$k_id);
  // $this->db->join('woreda', 'woreda.woreda_id = kilabi.wworeda_id', 'left');
    // $this->db->join('zone', 'zone.zid = kilabi.wzone_id', 'left');
    // $this->db->join('kebele', 'kebele.kid = kilabi.wkebele_id', 'left');
    
      $query=$this->db->get('kilabi');
    if($query)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
  } 

   


}