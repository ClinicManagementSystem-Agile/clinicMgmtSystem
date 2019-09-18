<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct()
	{
		parent::__construct();


        if (!$this->session->userdata('loggedin')) {redirect('user/user_login');}
        $this->data['user'] = $this->session->userdata['loggedin'];
      
        
    }
	
	public function index()
	{
          $this->data['subview']='pages/home';
		$this->load->view('frame', $this->data);
	}


	
}
