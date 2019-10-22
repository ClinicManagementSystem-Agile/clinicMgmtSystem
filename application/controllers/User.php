<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {
	function __construct()
    {
        parent::__construct();
		$this->load->model('user_model','user');
		$this->load->model('home_model');

		if ($this->session->userdata('loggedin')) {
			$this->data['user'] = $this->session->userdata['loggedin'];
		}

    }
	public function index()
	{
		
		if (!$this->session->userdata('loggedin')) {redirect('user/user_login');
		} else {
			$this->data['patients'] = $this->home_model->get_patients();
		$this->data['appointments'] = $this->home_model->get_appointments();
		$this->data['user_data'] = $this->session->userdata('loggedin');

		$this->data['users'] = $this->user->users_dept_details();
		$this->data['subview']='users/view_users';
		$this->load->view('frame', $this->data);
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
	
	public function create_user()
	{
		if (!$this->session->userdata('loggedin')) {redirect('user/user_login');
		} else {
			$this->data['patients'] = $this->home_model->get_patients();
		$this->data['appointments'] = $this->home_model->get_appointments();
		$this->data['user_data'] = $this->session->userdata('loggedin');
		$this->data['departments'] = $this->user->get_department();
//		$this->data['users'] = $this->user->users_dept_details();
//		if ($uid !=null) {
//		$this->data['user']=$this->user->get_user_by_id($uid);
//		}
		$this->data['subview']='users/add-user';
		$this->load->view('frame', $this->data);
		}
	}
	function save_user()
	{
		if (!$this->session->userdata('loggedin')) {redirect('user/user_login');
		} else {
			$this->data['patients'] = $this->home_model->get_patients();
		$this->data['appointments'] = $this->home_model->get_appointments();
		$this->data['user_data'] = $this->session->userdata('loggedin');
		$this->form_validation->set_rules('fname','First Name', 'required');
		$this->form_validation->set_rules('lname','Last Name', 'required');
		$this->form_validation->set_rules('department','Department','required');

		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('phone','Phone No','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
		$this->form_validation->set_rules('password','password','required|min_length[5]');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');

		if ($this->form_validation->run()==false){
		    $this->create_user();
//			$this->data['subview']='users/add-user';
//			$this->load->view('frame', $this->data);
		} else {
		if ($this->user->save_user()) {
			$this->session->set_flashdata('success','New User has been added');
			redirect('user');
		} else {
			$this->session->set_flashdata('error','Error Occurred during adding user');
			redirect('user/create_user');
		}
		
		}
		}
	}
	function edit_user($id=null)
	{

		if (!$this->session->userdata('loggedin')) {redirect('user/user_login');}
		$this->data['patients'] = $this->home_model->get_patients();
		$this->data['appointments'] = $this->home_model->get_appointments();
		$this->data['user_data'] = $this->session->userdata('loggedin');
		$this->data['user']=$this->user->get_user_by_id($id);
		$this->data['subview']='users/update_user';
		$this->load->view('frame', $this->data);
	}
	function update_user()
	{		
		$this->data['patients'] = $this->home_model->get_patients();
		$this->data['appointments'] = $this->home_model->get_appointments();
		$this->data['user_data'] = $this->session->userdata('loggedin');
		$id = $this->input->post('id');
		$this->data['user']=$this->user->get_user_by_id($id);

		$this->form_validation->set_rules('fname','First Name', 'required');
		$this->form_validation->set_rules('lname','Last Name', 'required');
		$this->form_validation->set_rules('department','Department','required');
		
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('phone','Phone No','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		
//		$this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
//		$this->form_validation->set_rules('password','password','required|min_length[5]');
//		$this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');

		if ($this->form_validation->run()==false){
			redirect('user/edit_user');
//			$this->data['subview']='users/update_user';
//			$this->load->view('frame', $this->data);
		} else {
		if ($this->user->update_user($id)) {
			$this->session->set_flashdata('success','User details has been updated');
			redirect('user/');
		} else {
			$this->session->set_flashdata('error','Error Occurred during updating user');
			redirect('user/update_user($id)');
		}
		
		}
	}
	function delete_user($id)
	{
		if ($this->user->delete_user($id)){
			$this->session->set_flashdata('del','The user has been deleted.');
			redirect('user');
		} else {
			$this->session->set_flashdata('error','There is a error on deleting.');
			redirect('user');
		}
	}
	public function change_password()
	{

		if (!$this->session->userdata('loggedin')) {redirect('user/user_login');}
		$this->data['patients'] = $this->home_model->get_patients();
		$this->data['appointments'] = $this->home_model->get_appointments();
		$this->data['subview'] = 'users/change_password';
		$this->load->view('frame', $this->data);
	}
	
	function save_password()
	{
		$this->form_validation->set_rules('old_password', 'Old Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[new_password]');
		if($this->form_validation->run()==false){
			$this->data['patients'] = $this->home_model->get_patients();
		$this->data['appointments'] = $this->home_model->get_appointments();
			$this->data['subview'] = 'users/change_password';
			$this->load->view('frame', $this->data);
		} else {

		$user_id = $this->session->userdata['loggedin']['user_id'];
		$this->data['patients'] = $this->home_model->get_patients();
		$this->data['appointments'] = $this->home_model->get_appointments();
		$this->data['user'] = $this->user->get_user_by_id($user_id);

		if($this->data['user']->password !=  md5($this->input->post('old_password')))
		{
			$this->session->set_flashdata('error', 'Old password is not correct');
			redirect($_SERVER['HTTP_REFERER']);
		}
//		if ($this->input->post('new_password') != $this->input->post('cpassword'))
//		{
//			$this->session->set_flashdata('error', 'new password and confirm password is not correct');
//			redirect($_SERVER['HTTP_REFERER']);
//		}
		else if($this->user->change_password($user_id)) {
			$this->session->set_flashdata('success', 'Passsword has been updated Successfully');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'Error occured during changing password');
			redirect($_SERVER['HTTP_REFERER']);
		}

	}
	}

}
