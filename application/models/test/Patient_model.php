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
<<<<<<< HEAD
    }

    function del_patient($id)
=======
	}
	function show_patient($id)
	{
	$this->db->where('id',$id);
	$this->db->limit(1);
	$this->db->show('patient');
	return true;
	}

	function del_patient($id)
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
	{
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->delete('patient');
		return true;
	}
<<<<<<< HEAD
=======
	
    }
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
}