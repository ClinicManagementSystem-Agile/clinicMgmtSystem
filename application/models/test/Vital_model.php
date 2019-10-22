<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vital_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function get_vital()
	{
		$query=$this->db->get('vitals');
		return $query->result_array();
	}
	


	function get_vital_byId($id)
	{
		$this->db->select('parent_vital.*,parent_vital.id as pv_id,vital_details.*,vital_details.id as vd_id');
		$this->db->where('vital_details.vital_id', $id);
		$this->db->join('parent_vital','parent_vital.id=vital_details.parent_vital_id');
		$query = $this->db->get('vital_details');
		return $query->result_array();
	}
  

    function insert($data)
	{
        if($this->db->insert('vitals', $data)){
            return $this->db->insert_id();
        }
        else{return false;}
    }
    function save_vital($data)
	{
        if($this->db->insert('vital_details', $data)){
            return true;
        }
        else{return false;}
    }
	
	
}


