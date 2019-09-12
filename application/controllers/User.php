<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('user_model','user');

		if ($this->session->userdata('loggedin')) {
			$this->data['user'] = $this->session->userdata['loggedin'];
		}

    }

	public function user_login()
	{
		// Redirect a user if he's already logged in
        $dashboard = 'home/index';
		if ($this->session->userdata('loggedin')) {redirect($dashboard);}
		
		$this->form_validation->set_rules('username','UserName','required');
		$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run()==FALSE){
		$this->load->view('pages/login');
		}else {
			$result=$this->user->login();
			if ($result==true) {
			$username = $this->input->post('username');
			$userInfo=$this->user->user_info($username);
			$deparment = $this->user->get_dept_by_id($userInfo[0]->dept_id)->name;
			if ($userInfo !=false) {
				$session_data = array(
					'user_id'=>$userInfo[0]->id,
					'username'=>$userInfo[0]->username,
					'email' =>  $userInfo[0]->email,
					'name' => $userInfo[0]->fname,
					'user_type' => $userInfo[0]->user_type,
					'dept_id' => $userInfo[0]->dept_id,
                    'dept_name' => $deparment
				);
			$this->session->set_userdata('loggedin',$session_data);
			$this->session->set_flashdata('success', $session_data['name'].' Welcome to your dashboard');
			redirect('home');
			}
			} else {
                $this->session->set_flashdata('error', 'That Username/Password combination does not exist');
                //redirect('user/user_login', 'refresh');
				$this->load->view('pages/login');
            }
		}
	}
	
	public function logout()
    {        
        $this->session->unset_userdata('loggedin');        
        $this->session->set_flashdata('success','You have successfuly log out.');
        redirect('user/user_login'); 
    }
	


}
