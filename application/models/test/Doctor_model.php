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

    function show_doctor($id)
	{
	$this->db->where('id',$id);
	$this->db->limit(1);
	$this->db->show('doctor');
	return true;
	}

<<<<<<< HEAD
=======
    function update_doctor($data,$id)
	{
        $this->db->where('id',$id);
        if($this->db->update('doctor', $data)){
            return true;
        }
        else{return false;}
    }
>>>>>>> deb06d06a442f46e6092915c5e6aabc296435eac
}
