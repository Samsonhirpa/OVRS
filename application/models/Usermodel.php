<?php
defined('BASEPATH') or exit('No such direct script is allowed');
class Usermodel extends CI_Model
{
function __construct() {
        $this->tableName = 'users1';
        $this->primaryKey = 'id';
    }
    
    public function insert($data = array()){
        if(!array_key_exists("created",$data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified",$data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

/**
 * Get user's naannoofil from useraccount table
 */
public function getUserNaannooFil($userId) {
    $this->db->select('naannoofil');
    $this->db->from('useraccount');
    $this->db->where('id', $userId);
    $query = $this->db->get();
    
    if($query->num_rows() > 0) {
        return $query->row()->naannoofil;
    }
    return null;
}

/**
 * Get complete user info with naannoofil
 */
public function getUserWithNaannooFil($userId) {
    $this->db->select('u.*, ua.naannoofil, ua.zone_id, ua.woreda_id, ua.kebele');
    $this->db->from('users u');
    $this->db->join('useraccount ua', 'u.userId = ua.user_id', 'left');
    $this->db->where('u.userId', $userId);
    $query = $this->db->get();
    
    return $query->row();
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

	
public function saveusercom()
	{
		$data=array(
			'fir_name'=>$this->input->post('fname'),
			'lasname'=>$this->input->post('lname'),
			'useremail'=>$this->input->post('email'),

			'texttitle'=>$this->input->post('title'),
			'usermessage'=>$this->input->post('message'),
			
);
		$query=$this->db->insert('usercomment',$data);
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

public function getpatient()
{
	// $this->db->select('*');
	// $this->db->from('patientinfo');
	// $this->db->join('gender','gender.id = patientinfo.gender_id');
	
	$query = $this->db->get('patientinfo');
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}	

public function getschedule()
{
	
	$query = $this->db->get('schedule');
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}	

public function getemployee()
{
	$query = $this->db->get("employee");
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}
	
public function showemployee($id)
	{
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->join('region','region.id = employee.region_id');
		$this->db->join('zone','zone.id = employee.zone_id');
		$this->db->join('woreda','woreda.w_id = employee.woreda_id');
		$this->db->join('gender','gender.id = employee.gender_id');
		$this->db->where('employee.id',$id);
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


  public function getzon()
{
	$query = $this->db->get("zone");
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}
 public function getwored()
{
	$query = $this->db->get("woreda");
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}
   
public function getzone()
{
	$rid=$this->input->post('rid');
	$this->db->where('region_id',$rid);
	$query = $this->db->get("zone");
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}
public function getworeda()
{
	$zid=$this->input->post('zid');
	$this->db->where('zone_id',$zid);
	// $this->db->select('*');
	// $this->db->from('woreda');
	// $this->db->where('zone.id = woreda.zone_id');
	$query = $this->db->get('woreda');
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}
public function getgender()
{
	$query = $this->db->get("gender");
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}
public function getpatientname()
{
	$query = $this->db->get("patientinfo");
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}


public function saveUser(){
	$data=array(
		
		
		
		'username'=>$this->input->post('username'),
		'password'=>$this->input->post('password'),
		'repassword'=>$this->input->post('repassword'),
		'level'=>$this->input->post('level'),
		'employee_id'=>$this->input->post('employee'),
		'site_id'=>$this->input->post('site_name'),
	
			);
	$query=$this->db->insert('useraccount',$data);
	}
	public function savepatient(){
	$data=array(
		
		
		
		'dor'=>$this->input->post('dor'),
		'name'=>$this->input->post('name'),
		'gender_id'=>$this->input->post('gender'),
		'age'=>$this->input->post('age'),
		'relationship'=>$this->input->post('relationship'),
		'address'=>$this->input->post('address'),
		'compliant'=>$this->input->post('compliant'),
		'bp'=>$this->input->post('bp'),
		'temp'=>$this->input->post('temp'),
		'rr'=>$this->input->post('rr'),
		'pr'=>$this->input->post('pr'),
		'po'=>$this->input->post('po'),
		'plan'=>$this->input->post('plan'),
		'assesment'=>$this->input->post('assesment'),
		'rx'=>$this->input->post('rx'),
	
			);
	$query=$this->db->insert('region',$data);
	}

	public function saveschedule(){
	$data=array(
		
		
		
		
		'name'=>$this->input->post('name'),
		'age'=>$this->input->post('age'),
		'rx'=>$this->input->post('rx'),
		'total'=>$this->input->post('total'),
		'paid'=>$this->input->post('paid'),
		'credit'=>$this->input->post('credit'),
		
			);
	$query=$this->db->insert('schedule',$data);
	}



public function savezone(){
	$data=array(
		
		
		
		'name'=>$this->input->post('name'),
		'description'=>$this->input->post('description'),
		'region_id'=>$this->input->post('region'),
	
			);
	$query=$this->db->insert('zone',$data);
	}
			
	public function saveworeda(){
	$data=array(
		
		
		'w_name'=>$this->input->post('name'),
		'description'=>$this->input->post('description'),
		'zone_id'=>$this->input->post('zone'),
	
			);
	$query=$this->db->insert('woreda',$data);
	}
	public function getlistuser()
	{
    
      $query=$this->db->get('useraccount');//select * from user;
      if($query)
      {
      	return $query->result();
      }
      else
      {
      	return false;
      }
	}
	public function getlistemployee()
	{
    
      $query=$this->db->get('employee');//select * from employee;
      if($query)
      {
      	return $query->result();
      }
      else
      {
      	return false;
      }
	}
	public function getuser($username)
	{
		$this->db->where('username',$this->session->userdata('username'));
		$this->db->from('useraccount');
		$this->db->join('sites','sites.sid = useraccount.site_id');
		$this->db->join('employee','employee.id = useraccount.employee_id');
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
	
	
	
	public function showzone($id)
	{
		$this->db->where('id',$id);
    
      $query=$this->db->get('zone');
      if($query)
      {
      	return $query->row();
      }
      else
      {
      	return false;
      }
	}
	public function deletezone($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->delete('drugstore');
	}
	public function showworeda($w_id)
	{
		$this->db->where('w_id',$w_id);
    
      $query=$this->db->get('woreda');
      if($query)
      {
      	return $query->row();
      }
      else
      {
      	return false;
      }
	}
	public function deleteworeda($w_id)
	{
		$this->db->where('w_id',$w_id);
		$query=$this->db->delete('woreda');
	}
	public function showusers($id)
	{
		$this->db->where('useraccount.id',$id);
    	$this->db->from('useraccount');
		$this->db->join('sites','sites.sid = useraccount.site_id');
		$this->db->join('employee','employee.id = useraccount.employee_id');
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
	public function deleteuser($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->delete('useraccount');
	}

	public function deletepatient($id)
	{
		$this->db->where('id',$id);

		$query=$this->db->delete('patientinfo');
	}
	
	public function editprofile($username)
	{
		$this->db->where('username',$this->session->userdata('username'));
		$query=$this->db->get('useraccount');
		if($query)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function editpatient($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('patientinfo');
		if($query)
		{
			return $query->row();
		}
		else
		{
			return false;
		}

	}
	public function edit_schedule($id)
	
	{
		$this->db->where('id',$id);
		$query=$this->db->get('schedule');
		if($query)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}





		public function editzone($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('drugstore');
		if($query)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
		public function editworeda($w_id)
	{
		$this->db->where('w_id',$w_id);
		$query=$this->db->get('woreda');
		if($query)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

public function savedrug(){
	$data=array(
		
		
		
		'itemcode'=>$this->input->post('itemcode'),
		'itemdesc'=>$this->input->post('itemdesc'),
		'batchnumber'=>$this->input->post('batchnumber'),
		'expiredate'=>$this->input->post('expiredate'),
		'uom'=>$this->input->post('uom'),
		'quantity'=>$this->input->post('quantity'),
		'livestoke'=>$this->input->post('livestoke'),
		'totalstored'=>$this->input->post('totalstored'),
		'unitprice'=>$this->input->post('unitprice'),
		'totalprice'=>$this->input->post('totalprice'),
		
			);
	$query=$this->db->insert('drugstore',$data);
	}

	public function updatedrug($id)
	{
		$data=array(

		'itemcode'=>$this->input->post('itemcode'),
		'itemdesc'=>$this->input->post('itemdesc'),
		'batchnumber'=>$this->input->post('batchnumber'),
		'expiredate'=>$this->input->post('expiredate'),
		'uom'=>$this->input->post('uom'),
		'quantity'=>$this->input->post('quantity'),
		'livestoke'=>$this->input->post('livestoke'),
		'totalstored'=>$this->input->post('totalstored'),
		'unitprice'=>$this->input->post('unitprice'),
		'totalprice'=>$this->input->post('totalprice'),
		
			);
		$this->db->where('id',$id);
	$query=$this->db->update('drugstore',$data);
	if($query)
	{
		return true;
	}
	else
	{
		return false;
	}
	}
	public function getdrug()
{
	$query = $this->db->get("drugstore");
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}

public function editdrug()
{
	$query = $this->db->get("drugstore");
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}

	public function saveregion(){
	$data=array(	
		'dor'=>$this->input->post('dor'),
		'name'=>$this->input->post('name'),
		'gender_id'=>$this->input->post('gender'),
		'age'=>$this->input->post('age'),
		'relationship'=>$this->input->post('relationship'),
		'address'=>$this->input->post('address'),
		'compliant'=>$this->input->post('compliant'),
		'bp'=>$this->input->post('bp'),
		'temp'=>$this->input->post('temp'),
		'rr'=>$this->input->post('rr'),
		'pr'=>$this->input->post('pr'),
		'po'=>$this->input->post('po'),
		'plan'=>$this->input->post('plan'),
		'assesment'=>$this->input->post('assesment'),
		'rx'=>$this->input->post('rx'),
	
			);
	$query=$this->db->insert('region',$data);
	}
	public function updateregion($id)
	{
		$data=array(

		'dor'=>$this->input->post('dor'),
		'name'=>$this->input->post('name'),
		'gender_id'=>$this->input->post('gender'),
		'age'=>$this->input->post('age'),
		'relationship'=>$this->input->post('relationship'),
		'address'=>$this->input->post('address'),
		'compliant'=>$this->input->post('compliant'),
		'bp'=>$this->input->post('bp'),
		'temp'=>$this->input->post('temp'),
		'rr'=>$this->input->post('rr'),
		'pr'=>$this->input->post('pr'),
		'po'=>$this->input->post('po'),
		'plan'=>$this->input->post('plan'),
		'assesment'=>$this->input->post('assesment'),
		'rx'=>$this->input->post('rx'),
	
			);
		$this->db->where('id',$id);
	$query=$this->db->update('region',$data);
	if($query)
	{
		return true;
	}
	else
	{
		return false;
	}
	}
		public function editregion($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('region');
		if($query)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function getregion()
{
	$query = $this->db->get("region");
	if($query)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}
public function showregion($id)
	{
		$this->db->where('id',$id);
    
      $query=$this->db->get('region');
      if($query)
      {
      	return $query->row();
      }
      else
      {
      	return false;
      }
	}

public function deleteregion($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->delete('region');
	}
	public function updatezone($id)
	{
		$data=array(

		'itemcode'=>$this->input->post('itemcode'),
		'itemdesc'=>$this->input->post('itemdesc'),
		'batchnumber'=>$this->input->post('batchnumber'),
		'expiredate'=>$this->input->post('expiredate'),
		'uom'=>$this->input->post('uom'),
		'quantity'=>$this->input->post('quantity'),
		'livestoke'=>$this->input->post('livestoke'),
		'totalstored'=>$this->input->post('totalstored'),
		'unitprice'=>$this->input->post('unitprice'),
		'totalprice'=>$this->input->post('totalprice'),
		
		
			);
		$this->db->where('id',$id);
	$query=$this->db->update('drugstore',$data);
	if($query)
	{
		return true;
	}
	else
	{
		return false;
	}
	}
	public function updateworeda($w_id)
	{
		$data=array(

		'w_name'=>$this->input->post('name'),
		'description'=>$this->input->post('description'),
		
			);
		$this->db->where('w_id',$w_id);
	$query=$this->db->update('woreda',$data);
	if($query)
	{
		return true;
	}
	else
	{
		return false;
	}
	}
	
	public function updateuser($id)
	{
		$data=array(

		'username'=>$this->input->post('username'),
		'password'=>$this->input->post('password'),
		'repassword'=>$this->input->post('repassword'),
		'level'=>$this->input->post('level'),
		'employee_id'=>$this->input->post('employee'),
		
			);
		$this->db->where('id',$id);
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
public function updateprofile($username)
	{
		$data=array(

		'username'=>$this->input->post('username'),
		'password'=>$this->input->post('password'),
		'repassword'=>$this->input->post('repassword'),
		
		
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
public function updatepatient($id)
	{
		$data=array(
			'dor'=>$this->input->post('dor'),
		'name'=>$this->input->post('name'),
		'gender_id'=>$this->input->post('gender'),
		'age'=>$this->input->post('age'),
		'relationship'=>$this->input->post('relationship'),
		'address'=>$this->input->post('address'),
		'compliant'=>$this->input->post('compliant'),
		'bp'=>$this->input->post('bp'),
		'temp'=>$this->input->post('temp'),
		'rr'=>$this->input->post('rr'),
		'pr'=>$this->input->post('pr'),
		'po'=>$this->input->post('po'),
		'plan'=>$this->input->post('plan'),
		'assesment'=>$this->input->post('assesment'),
		'rx'=>$this->input->post('rx'),
	
			);
		$this->db->where('id',$id);
	$query=$this->db->update('patientinfo',$data);
	if($query)
	{
		return true;
	}
	else
	{
		return false;
	}
	}
public function updateschedule($id)
	{
		$data=array(
			
			'name'=>$this->input->post('name'),
		'age'=>$this->input->post('age'),
		'rx'=>$this->input->post('rx'),
		'total'=>$this->input->post('total'),
		'paid'=>$this->input->post('paid'),
		'credit'=>$this->input->post('credit'),
	
			);
		$this->db->where('id',$id);
	$query=$this->db->update('schedule',$data);
	if($query)
	{
		return true;
	}
	else
	{
		return false;
	}
	}

	
	public function getlevel(){
		$query=$this->db->get('level');
		if($query)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	public function getemployeereport()
	{
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->join('gender','gender.id = employee.gender_id');
		$this->db->join('region','region.id = employee.region_id');
		$this->db->join('zone','zone.id = employee.zone_id');
		$this->db->join('woreda','woreda.w_id = employee.woreda_id');

		$query=$this->db->get();
		if($query)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	public function getuserreport()
	{
		$this->db->select('*');
		$this->db->from('useraccount');
		$this->db->join('employee','employee.id = useraccount.employee_id');
		
		$query=$this->db->get();
		if($query)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	}
