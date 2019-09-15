<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->library('upload');
    }
<<<<<<< HEAD
=======

>>>>>>> master
    function save_patient($data)
	{
        $this->db->insert('patient', $data);
        return true;
    }
    function update_patient($data,$id)
	{
        $this->db->where('id',$id);
        $this->db->update('patient', $data);
        return true;
<<<<<<< HEAD
	}
	function show_patient($id)
	{
	$this->db->where('id',$id);
	$this->db->limit(1);
	$this->db->show('patient');
	return true;
	}
=======
    }
>>>>>>> master
}