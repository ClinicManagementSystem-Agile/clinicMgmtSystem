<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
	function __construct() {
	parent::__construct();
	}
	function get_department()
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get('department');
        $result = $query->result_array();
        return $result;
    }

	function get_users()
    {
		$this->db->order_by('id','desc');
        $query = $this->db->get('users');
        $result = $query->result_array();    
        return $result;
    }
	public function get_user_by_id($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('users');
        $result = $query->row();
        return $result;
	}
	function get_dept_by_id($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('department');
		$result = $query->row();
		return $result;
	}
	function users_dept_details()
	{
		//$this->db->select('*');
		$this->db->order_by('id','desc');
		
		$this->db->select('users.id,users.fname,users.lname,users.username,users.email,users.phone,users.user_type,department.name,department.access_level,department.position');
		$this->db->from('users');
		$this->db->join('department', 'users.dept_id = department.id','left');
		//$this->db->where('users.id', $id); 
		$query = $this->db->get();
		$result= $query->result_array();
		if($result) {
		return $result;} else {
			return false;
		}
	}
	function get_users_dept_details()
	{
		$query = $this->db->query('SELECT users.id, users.fname,users.lname,users.email,users.phone,users.user_type,department.name,department.access_level,department.position FROM users LEFT JOIN department ON users.dept_id = department.id ORDER BY users.id DESC');
		$result= $query->result_array();
		if($result) {
		return $result;} else {
			return false;
		}
	}
	public function login()
	{
		$cond = array(
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password'))
			);
		$this->db->where($cond);
		$query=$this->db->get('users');
		$result=$query->num_rows();
		if ($result==1) {
			return true;
		}else {
			return false;
		}
	}
	public function user_info($username)
	{
        $this->db->where('username',$username);
        //$this->db->limit(1);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
	}
	function save_user()
	{
		$date = date('Y-m-d');		
		$data = array(
		'fname' => $this->input->post('fname'),
		'lname' => $this->input->post('lname'),
		'dept_id' => $this->input->post('department'),
		'date' => $date,
		'status' => '1',
		'join_date' => $this->input->post('join_date'),
		'address' => $this->input->post('address'),
		'email' => $this->input->post('email'),
		'username' => $this->input->post('username'),
		'phone' => $this->input->post('phone'),
//		'user_type' => $this->input->post('user_type'),
		'password' => md5($this->input->post('password'))
		);
		if($this->db->insert('users', $data)){
		return $this->db->insert_id();
		} else {
		return false;		
		}
	}
	function update_user($id)
	{
		$date = date('Y-m-d');
		$data = array(
		'fname' => $this->input->post('fname'),
		'lname' => $this->input->post('lname'),
		'dept_id' => $this->input->post('department'),
		'date' => $date,
		'status' => '1',
		'join_date' => $this->input->post('join_date'),
		'address' => $this->input->post('address'),
		'email' => $this->input->post('email'),
		'phone' => $this->input->post('phone'),
			
//		'username' => $this->input->post('username'),		
//		'user_type' => $this->input->post('user_type'),
//		'password' => md5($this->input->post('password'))
		);
		if ($this->db->where('id',$id)){
		return $this->db->update('users', $data);
		} else {
		return false;		
		}
		
	}
	
	function delete_user($id)
	{
		$this->db->where('id',$id);
		$this->db->limit(1);
		if($this->db->delete('users')){
			return true;
		} else {
			return false;
		}
	}
	
	function change_password($id)
	{
		$data = array (
			'password' => md5($this->input->post('new_password'))
		);
		$this->db->where('id',$id);
		if ($this->db->update('users', $data)){
			return true;			
		} else { 
			return false;			
		}
		
	}

}
