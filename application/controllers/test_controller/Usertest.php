<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usertest extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            $this->load->library('unit_test');
            //load model
            
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->model('test/User_model','user');

        }
        public function index()
        {
            $this->add();
            $this->update();
            $this->delete();
            $this->list();
            $this->getById();
            //$this->change_password();

        }
        
        public function add(){
            echo" user Add<br/>";
            $register_date = date('Y-m-d');

            $data = array(
                'fname'=>'Asish ',
                'lname'=>'Ghimire',
                'dept_id'=>'1',
                'status'=>'1',
                'join_date'=>$register_date,
                'date'=>'2053-03-15',
                'email'=>'asish@doc.com',
                'username'=>'asish',
                'password'=>md5('admin'),
                'phone'=>'9805558458',
                'user_type'=>'1',
                'address'=>'Ktm'
                );
           $test= $this->user->save_user($data);
            $expected_result=true;
           
            $test_name="Add user Test Case";
          
            echo $this->unit->run($test,$expected_result,$test_name);

          
        }
        
        public function update(){
                echo" user Update<br/>";
                $register_date = date('Y-m-d');

    
                $data = array(
                    'fname'=>'Asish ',
                    'lname'=>'Ghimire',
                    'dept_id'=>'1',
                    'status'=>'1',
                    'join_date'=>$register_date,
                    'date'=>'2053-03-15',
                    'email'=>'asish@doc.com',
                    'username'=>'asish',
                    'password'=>md5('admin'),
                    'phone'=>'9805558458',
                    'user_type'=>'1',
                    'address'=>'Ktm'
                    );
    
               $test= $this->user->update_user($data,'2');
                $expected_result=true;
               
                $test_name="Update user Test Case";
              
                echo $this->unit->run($test,$expected_result,$test_name);
    
              
            }

            public function delete()
            {
                echo" Delete user<br/>";
                $test= $this->user->del_user('2');
                $expected_result=true;
               
                $test_name="Delete user Test Case";
                echo $this->unit->run($test,$expected_result,$test_name);

            }
            public function list()
            {
                echo" List user<br/>";
                $test= $this->user->get_user();
                
                $expected_result=true;
               
                $test_name="List user Test Case";
                echo $this->unit->run($test,$expected_result,$test_name);

            }
            public function getById()
            {
                echo" Individual user<br/>";
                $test= $this->user->get_user_byId('1');
                
                $expected_result=true;
               
                $test_name="Individual user Test Case";
                echo $this->unit->run($test,$expected_result,$test_name);

            }

            public function change_password(){
                echo" Password update<br/>";

    
                $data = array(
                  
                    'password'=>md5('admin')
                  
                    );
    
               $test= $this->user->update_user($data,'23');
                $expected_result=true;
               
                $test_name="Update Password Test Case";
              
                echo $this->unit->run($test,$expected_result,$test_name);
    
              
            }
            
}



