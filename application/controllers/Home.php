<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct()
	{
		parent::__construct();


        if (!$this->session->userdata('loggedin')) {redirect('user/user_login');}
		$this->data['user'] = $this->session->userdata['loggedin'];
		$this->load->model('home_model');

	
      
        
    }
	
	public function index()
	{
		$this->data['patients'] = $this->home_model->get_patients();
		$this->data['appointments'] = $this->home_model->get_appointments();

          $this->data['subview']='pages/home';
		$this->load->view('frame', $this->data);
	}


	
}
