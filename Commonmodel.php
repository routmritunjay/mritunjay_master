<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commonmodel extends CI_Model {

	public function __construct(){
		parent :: __construct();
	}

	public function index(){
	}

	public function insert($table1,$data){
       $this->db->insert($table1,$data);
	}

public function select($table,$data,$whereclause=""){
	if($whereclause == ""){
		$this->db->select($data);
		$this->db->from($table);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select($data);
		$this->db->from($table);
		$this->db->where($whereclause);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}

public function single_select($table,$data,$whereclause=""){
	if($whereclause == ""){
		$this->db->select($data);
		$this->db->from($table);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}else{
	$this->db->select($data);
		$this->db->from($table);
		$this->db->where($whereclause);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
}
}

public function payslip_no_month($table,$data,$whereclause=""){
	if($whereclause == ""){
		$this->db->select($data);
		$this->db->from($table);
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}else{
	$this->db->select($data);
		$this->db->from($table);
		$this->db->where($whereclause);
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
}
}

public function policies_join($table1,$table2,$whereclause=""){
	if($whereclause == ""){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,"$table2.policy_name = $table1.policy_name", 'left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,"$table2.policy_name = $table1.policy_name", 'left');
		$this->db->where($whereclause);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}

public function resume_data($table1,$table2,$data,$whereclause=""){
	if($whereclause == ""){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,"$data.policy_name = $table1.policy_name", 'left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,"$table2.policy_name = $table1.policy_name", 'left');
		$this->db->where($whereclause);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}

public function leaves_join($table1,$table2,$data1,$whereclause=""){
	if($whereclause == ""){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,"$table2.email = $table1.applicant_email", 'left');
		$this->db->order_by($data1,"DESC");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,"$table2.email = $table1.applicant_email", 'left');
		$this->db->where($whereclause);
		$this->db->order_by($data1,"DESC");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}

public function join_clause($table1,$table2,$para1,$para2,$whereclause=""){
	if($whereclause == ""){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,"$table2.$para1 = $table1.$para2",'left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,"$table2.$para1 = $table1.$para2", 'left');
		$this->db->where($whereclause);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}


public function payslip_join_clause($table1,$table2,$para1,$para2,$whereclause=""){
	if($whereclause == ""){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,"$table2.$para1 = $table1.$para2",'left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,"$table2.$para1 = $table1.$para2",'left');
		$this->db->where($whereclause);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}


public function payroll_join_clause($table1,$table2,$para1,$para2,$whereclause=""){
	if($whereclause == ""){
	$this->db->select("".$table1.".uniqueid,".$table2.".first_name,".$table2.".last_name,".$table1.".id,".$table1.".attendence_date,".$table1.".login_time,".$table1.".logout_time,".$table1.".total_working_hrs,".$table1.".deficient_hrs,".$table1.".updated_on");
		$this->db->from($table1);
		$this->db->join($table2,"$table2.$para1 = $table1.$para2",'left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select("".$table1.".uniqueid,".$table2.".first_name,".$table2.".last_name,".$table1.".id,".$table1.".attendence_date,".$table1.".login_time,".$table1.".logout_time,".$table1.".total_working_hrs,".$table1.".deficient_hrs,".$table1.".updated_on");
		$this->db->from($table1);
		$this->db->join($table2,"$table2.$para1 = $table1.$para2", 'left');
		$this->db->where($whereclause);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}


public function timesheet_clause($table1,$table2,$para1,$para2,$whereclause=""){
	if($whereclause == ""){
		$this->db->select("".$table1.".task_id,".$table1.".task_date,".$table2.".project_name,".$table1.".task_description,".$table1.".start_date,".$table1.".end_date,".$table1.".status,".$table1.".comments,".$table1.".task_comments,".$table1.".updated_on,".$table1.".task_status");
		$this->db->from($table1);
		$this->db->join($table2,"$table2.$para1 = $table1.$para2",'left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select("".$table1.".task_id,".$table1.".task_date,".$table2.".project_name,".$table1.".task_description,".$table1.".start_date,".$table1.".end_date,".$table1.".status,".$table1.".comments,".$table1.".task_comments,".$table1.".updated_on,".$table1.".task_status");
		$this->db->from($table1);
		$this->db->join($table2,"$table2.$para1 = $table1.$para2", 'left');
		$this->db->where($whereclause);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}

public function count_rows($table,$data,$whereclause){
	$this->db->select($data);
	$this->db->from($table);
	$this->db->where($whereclause);
	$query = $this->db->get();
	$result = $query->num_rows();
	return $result;
}

public function employee_multiple_view_policies($table,$data,$whereclause){
	$this->db->select($data);
	$this->db->from($table);
	$query = $this->db->get();
	$result = $query->result();
	$result_ttl = array();
	foreach($result as $res){
        $policies_name = $res->policy_name;
        $policies_image = $res->image;
        $result_ttl[] =array(
        	'policy_name'=>$policies_name,
        	'policy_image'=>$policies_image,
        	'policy_status'=>$this->get_policies_status($policies_name,$whereclause)
        ); 
	}
	return $result_ttl;
}

public function get_policies_status($poname,$cond){
	$this->db->select('policy_status');
	$this->db->from('employee_policies_status');
	$this->db->where('policy_name',$poname);
	$this->db->where('employee_email',$cond);
	$query = $this->db->get();
	$result = $query->result_array();
	return $result;
}
public function resume_exp($table1,$data1,$whereclause=""){
	if($whereclause == ""){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->group_by($data1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select('*');
		$this->db->from($table1);
		$this->db->where($whereclause);
		$this->db->group_by($data1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}

public function last_record($table1,$data1,$whereclause=""){
	if($whereclause == ""){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->order_by($data1, "DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select('*');
		$this->db->from($table1);
		$this->db->where($whereclause);
		$this->db->order_by($data1, "DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}

public function des_select($table1,$data1,$whereclause=""){
	if($whereclause == ""){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->order_by($data1, "DESC");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select('*');
		$this->db->from($table1);
		$this->db->where($whereclause);
		$this->db->order_by($data1, "DESC");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}


public function single_emp_attendence($table1,$data1,$whereclause=""){
	if($whereclause == ""){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->limit(12);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select('*');
		$this->db->from($table1);
		$this->db->where($whereclause);
		$this->db->limit(12);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}


public function resume_unique($table1,$data,$whereclause=""){
	if($whereclause == ""){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->group_by($data);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}else{
	$this->db->select('*');
		$this->db->from($table1);
		$this->db->where($whereclause);
		$this->db->group_by($data);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
}
}
