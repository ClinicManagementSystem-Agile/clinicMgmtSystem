<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
	function __construct() {
	parent::__construct();
    }

    public function login($cond)
	{
		
		$this->db->where($cond);
		$query=$this->db->get('users');
		$result=$query->num_rows();
		if ($result==1) {
			return true;
		}else {
			return false;
		}
	}

	function get_user()
    {
        $res=$this->db->get('users');
        return $res->result() ? true :  false;
        
    }
    function get_user_byId($id)
    {
        $this->db->where('id',$id);
        $res=$this->db->get('users');
        return $res->result() ? true :  false;
        
    }
	
    function save_user($data)
	{
        if($this->db->insert('users', $data)){
            return true;
        }
        else{return false;}
    }
    function update_user($data,$id)
	{
        $this->db->where('id',$id);
        if($this->db->update('users', $data)){
            return true;
        }
        else{return false;}
    }

    function del_user($id)
	{
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->delete('users');
		return true;
	}
}