<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visit_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
    function get_vital($id)
    
	{
        $this->db->where('appid',$id);
		$query=$this->db->get('visit_files');
		return $query->result_array();
	}
	

    function save_visit($data)
	{
        if($this->db->insert('visit_files', $data)){
            return true;
        }
        else{return false;}
    }
	
	
}


