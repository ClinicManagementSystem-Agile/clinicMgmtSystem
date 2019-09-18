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
}