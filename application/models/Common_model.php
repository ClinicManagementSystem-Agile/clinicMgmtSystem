<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function gettodayappointment()
	{
		$this->db->where('appointment_book_date',date('Y-m-d'));
		$this->db->select('appointment.*,doctor.*,doctor.first_name as dfname,doctor.last_name as dlname,doctor.email as demail,patient.*,patient.*,patient.first_name as pfname,patient.last_name as plname,patient.email as pemail');
	    $this->db->from('appointment');
	    $this->db->join('doctor','appointment.doctor_id=doctor.id','left');
	    $this->db->join('patient','appointment.patient_id=patient.id','left');
		$query=$this->db->get('');
		return $name=$query->result_array();


	}

}