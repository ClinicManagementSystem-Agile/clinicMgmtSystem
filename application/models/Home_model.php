<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

        
  


    function get_patients()
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get('patient');
        $result = $query->result_array();
        return $result;
    }

    

   


  
    
   

    
    function get_appointments()
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get('appointment');
        $result = $query->result_array();
        return $result;
    }
    
    
}
