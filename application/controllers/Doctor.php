<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('doctor_model');
		  $this->load->library('numbertowords');
		if (!$this->session->userdata('loggedin')) {redirect('user/user_login');}
		$this->data['user'] = $this->session->userdata['loggedin'];
	}

	public function index()
	{
		$this->data['doctors']=$this->doctor_model->get_doctors();
		$this->data['subview']='pages/doctors';
		$this->load->view('frame', $this->data);
	}
   
	public function add_doctor()
	{
	    $this->data['days'] = $this->doctor_model->get_days();
        $this->data['times'] = $this->doctor_model->get_times();

		$this->data['error']='';
		$this->data['subview']='pages/add-doctor';
		$this->load->view('frame', $this->data);
	}

	public function save_doctor()
	{
		$error = '';
		$this->form_validation->set_rules('firstname','First Name', 'required');
		$this->form_validation->set_rules('lastname','Last Name', 'required');
		$this->form_validation->set_rules('gender','Gender', 'required');
		$this->form_validation->set_rules('speciality','Speciality', 'required');
		$this->form_validation->set_rules('phone','Phone No', 'required');
		//$this->form_validation->set_rules('email','Email', 'required');
		//$this->form_validation->set_rules('address','Address', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->data['subview']='pages/add-doctor';
			$this->load->view('frame', $this->data);
		}
		else
		{
		if(!empty($_FILES['dr_photo']) && !empty($_FILES['dr_photo']['name']) ) {
			$image = $this->doctor_model->save_photo('dr_photo');
			if(!empty($image['error']))
			{
			$photo = null;
			$error = $image['error'];
			$this->session->set_flashdata('error', $error .'<br> Upload image max size 2mb, jpg, png again on edit doctor profile<br>');
			//redirect('doctor/add_doctor');
			//$this->data['subview']='pages/add-doctor';
			//$this->load->view('frame', $this->data);
			} else {
			$photo = $image['file_name']; }
		}else{
			$photo = '';
		}
		if($this->doctor_model->save_doctor($id=null,$photo))
		{

			$this->session->set_flashdata('success','Doctor profile has been added.');
			redirect('doctor/');
		}else{
			$this->session->set_flashdata('error','There is an error during adding doctor profile');
			redirect('doctor');
			//redirect($_SERVER['HTTP_REFERER']);
		}
		}
	}

	
	function delete_photo($id) {

        if ($this->doctor_model->delete_photo($id)) {
            $this->session->set_flashdata('success', 'Picture Has been deleted');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error occured during delete Image');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
	function delete_doctor($id)
	{
		if($this->doctor_model->del_doctor($id)){
            $this->session->set_flashdata('delete', 'The selected doctor\'s profile has been deleted');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error occured during delete doctor profile');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}



}
