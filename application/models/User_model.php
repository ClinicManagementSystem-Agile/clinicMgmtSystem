<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
	function __construct() {
	parent::__construct();
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
	function get_dept_by_id($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('department');
		$result = $query->row();
		return $result;
	}
	

}
