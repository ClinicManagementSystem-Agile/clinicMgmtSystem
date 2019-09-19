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
Chat Conversation End
Type a message...