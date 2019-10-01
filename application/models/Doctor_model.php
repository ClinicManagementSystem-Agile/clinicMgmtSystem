<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Doctor_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function get_doctors()
	{
	    $this->db->order_by('id','desc');
		$query=$this->db->get('doctor');
		return $query->result_array();
	}
	function get_doctor_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('doctor');
		return $query->row();
	}
	
	
	function save_photo($filename=null)
	{
	$config['upload_path']          = './assets/upload/doctor_img/';
	$config['allowed_types']        = 'gif|jpg|png|jpeg|PNG|JPG|JPEG';
	$config['max_size']             = 2148;
	//$config['max_width']            = 1020;
	//$config['max_height']           = 1020;
	$config['overwrite']			= TRUE;

	$this->load->library('upload', $config);
	$this->upload->initialize($config);

	if ( ! $this->upload->do_upload($filename))
	{
		$error = array('error' => $this->upload->display_errors());
		return $error;
	}else{
		$data = $this->upload->data();
		return $data;
	}	
	}
	function save_doctor($id=null, $photo=null)
	{		
	$data = array(
		'first_name'=>$this->input->post('firstname'),
		'last_name'=>$this->input->post('lastname'),
		'dob'=>$this->input->post('dob'),
		'gender'=>$this->input->post('gender'),
		'speciality'=>$this->input->post('speciality'),
		'phone'=>$this->input->post('phone'),
		'email'=>$this->input->post('email'),
		'address'=>$this->input->post('address'),
		'website'=>$this->input->post('website'),
		'commission_service'=>$this->input->post('scr'),
		'commission_lab'=>$this->input->post('lcr'),
		'commission_pharmacy'=>$this->input->post('pcr'),
		'status'=>'1',
		'photo'=> isset($photo)? $photo:''
		);
	if ($id!=null) {
		$this->db->where('id',$id);
        $this->db->update('doctor',$data);
		
        $count = count($this->input->post('available_days'));
        for($i = 0; $i<$count; $i++){
            $entries[] = array(
                'available_days'=>$this->input->post('available_days')[$i],
                'from_time'=>isset($this->input->post('from_time')[$i])? $this->input->post('from_time')[$i] : NULL,
                'to_time'=>isset($this->input->post('to_time')[$i])? $this->input->post('to_time')[$i] : NULL,
                'doctor_id'=>$id,
				'id' => $this->input->post('av_id')[$i],
            );
        }
        $this->db->update_batch('doctor_availability', $entries,'id');
		return true;

    } else {

	    $this->db->insert('doctor', $data);
        $doctor_id = $this->db->insert_id();

        
        
        $staff_id =  $this->db->insert_id();

                         $data_ledger = array (
			'title' => $this->input->post('firstname').' '.$this->input->post('lastname'),
			'group_id' => 13,
                        'other_info' => 'doctor_id'.'-'.$doctor_id,
                        'opening_balance' => '0.00'    
		);
                
                 return ($this->db->insert('ledger', $data_ledger));
        
        

//        $doctor_id =5;
        $count = count($this->input->post('available_days'));

//		var_dump($this->input->post());
        for ($i = 0; $i < $count; $i++) {
            $entries[] = array(
                'available_days' => $this->input->post('available_days')[$i],
                'from_time' =>isset($this->input->post('from_time')[$i])? $this->input->post('from_time')[$i] : NULL,
                'to_time'=>isset($this->input->post('to_time')[$i])? $this->input->post('to_time')[$i] : NULL,
                'doctor_id' => $doctor_id,
            );
        }
    }


        $this->db->insert_batch('doctor_availability', $entries);
        if($this->db->affected_rows() > 0)
            return 1;
        else
            return 0;

	}
	
	function del_doctor($id)
	{
		$image = $this->get_doctor_by_id($id)->photo;
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->delete('doctor');
		$this->db->where('doctor_id',$id);
		$this->db->delete('doctor_availability');
		unlink('./assets/upload/doctor_img/'.$image);
		return true;
	}
	function delete_photo($id)
    {
		$data=array('photo'=>'');
		$image = $this->get_doctor_by_id($id)->photo;
		$this->db->where('id', $id);
		if($this->db->update('doctor', $data)):
		unlink('./assets/upload/doctor_img/'.$image);
		return true;
		else:
			return false;
		endif;
    }



	function get_days()
	{
		//$this->db->order_by('id','desc');
		$query=$this->db->get('available_days');
		return $query->result_array();
	}
 
	 function get_time($time)
	 {
		 $this->db->where('id', $time);
		 $query = $this->db->get('time_slots');
		 return $query->row();
	 }
 
	function get_times()
	{
		//$this->db->order_by('id','desc');
		$query=$this->db->get('time_slots');
		return $query->result_array();
 
	}
 
 //    function get_doctor_availability_by_id($id)
 //    {
 //        $this->db->where('doctor_id', $id);
 //        $query = $this->db->get('doctor_availability');
 //        return $query->result_array();
 //    }
 
	function get_availability_by_id($id)
	{
		$this->db->where('doctor_id',$id);
		$this->db->order_by('id','asc');
		$query=$this->db->get('doctor_availability');
		return $query->result_array();
	}
 
 
 
	function get_availability_det($id,$day)
	{
		$this->db->where('available_days',$day);
		$this->db->where('doctor_id',$id);
 //       $this->db->order_by('id','desc');
		$query=$this->db->get('doctor_availability');
 
		return $query->row();
	}

	
}
