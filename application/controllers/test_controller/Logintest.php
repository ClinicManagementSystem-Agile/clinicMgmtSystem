<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logintest extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            $this->load->library('unit_test');
            //load model
            
            $this->load->library('cart');
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->model('test/User_model','login');

        } 
        
        public function verify(){
            echo" Login Test1<br/>";
<<<<<<< HEAD
            $username="srzal";
=======
            $username="s2018cherry";
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
            echo "username:'$username'<br/>";
            $password= md5("admin");
            echo "Password:'$password'";
            $cond = array(
                'username'=>$username,
                'password'=>$password
                );

            $test=$this->login->login($cond);
            $expected_result=true;
           
            $test_name="Login Test 1";
          
            echo $this->unit->run($test,$expected_result,$test_name);

            echo" Login Test2<br/>";
<<<<<<< HEAD
            $username="kfkkfkd";
=======
            $username="s2018cherry";
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
            echo "username:'$username'<br/>";
            $password= "admin";
            echo "Password:'$password'";
            $cond = array(
                'username'=>$username,
                'password'=>$password
                );

            $test=$this->login->login($cond);
            $expected_result=true;
           
            $test_name="Login Test 2";
          
            echo $this->unit->run($test,$expected_result,$test_name);
        }
        
}



