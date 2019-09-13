<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->library('upload');
    }

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
    }
}