<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visittest extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            $this->load->library('unit_test');
            //load model
            
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->model('test/visit_model','visit');

        }
        public function index()
        {
            $this->add();
           
            $this->list();
           
        }
        
        public function add(){
            echo" visit Add<br/>";
            $data = array(
                'appid'=>'1',
                'file_chosen' => 'abc.png'
            );
           

           $test= $this->visit->save_visit($data);
            $expected_result=true;
           
            $test_name="Add visit Test Case";
          
            echo $this->unit->run($test,$expected_result,$test_name);

          
        }
        
    

          
            public function list()
            {
                echo" List visit<br/>";
                $test= $this->visit->get_visit('1');
                
                $expected_result=true;
               
                $test_name="List visit Test Case";
                echo $this->unit->run($test,$expected_result,$test_name);

            }
      
            
}



