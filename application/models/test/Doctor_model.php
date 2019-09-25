<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Doctor_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	
    function save_doctor($data)
	{
        if($this->db->insert('doctor', $data)){
            return true;
        }
        else{return false;}
    }

    function update_doctor($data,$id)
	{
        $this->db->where('id',$id);
        if($this->db->update('doctor', $data)){
            return true;
        }
        else{return false;}
    }

    function del_doctor($id)
	{
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->delete('doctor');
		return true;
	}
}
