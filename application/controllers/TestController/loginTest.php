<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logintest extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            $this->load->library('unit_test');
            //load model
            
          
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->model('Login_Model','login');

        } public function verify(){
            echo" Login Test1<br/>";
            $email="srijal.fantastic@gmail.com";
            echo "Email:'$email'<br/>";
            $password= md5("nepal");
            echo "Password:'$password'";

            $test=$this->login->verify($email,$password);
            $expected_result=true;
           
            $test_name="Login Test 1";
          
            echo $this->unit->run($test,$expected_result,$test_name);

            echo" Login Test2<br/>";
            $email="srijal.fantastic@gmail.com";
            echo "Email:'$email'<br/>";
            $password= "nepal";
            echo "Password:'$password'";

            $test=$this->login->verify($email,$password);
            $expected_result=true;
           
            $test_name="Login Test 2";
          
            echo $this->unit->run($test,$expected_result,$test_name);
        }
        
}



