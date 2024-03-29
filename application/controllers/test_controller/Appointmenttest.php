<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointmenttest extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            $this->load->library('unit_test');
            //load model
            
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->model('test/appointment_model','appointment');

        }
        public function index()
        {
            $this->update();
<<<<<<< HEAD
	    $this->add();	
=======
        $this->add();
        $this->list();
	$this->getById();	
>>>>>>> f07980f1acdd5fe584cf3ee7fa654cc9cbc7848a
        }

	public function add(){
            echo" appointment Add<br/>";
           
            $data = array(
                'patient_id' => 5,
                'doctor_id' => 7,
                'date' => date('Y-m-d'),
                'appointment_book_date' =>date('Y-m-d') ,
                'start_time' =>'07:00',
                'end_time' =>'08:00',
                'status' => 'new',
                'description' => 'New Appointment'
            );
           $test= $this->appointment->save_appointment($data);
            $expected_result=true;
           
            $test_name="Add appointment Test Case";
          
            echo $this->unit->run($test,$expected_result,$test_name);
   
        }

        
        
        public function update(){
                echo" appointment Update<br/>";
               
    
                $data = array(
                    'patient_id' => 5,
                    'doctor_id' => 7,
                    'date' => date('Y-m-d'),
                    'appointment_book_date' =>date('Y-m-d') ,
                    'start_time' =>'07:00',
                    'end_time' =>'08:00',
                    'status' => 'new',
                    'description' => 'Update Appointment'
                );
    
               $test= $this->appointment->update_appointment($data,'3');
                $expected_result=true;
               
                $test_name="Update appointment Test Case";
              
                echo $this->unit->run($test,$expected_result,$test_name);
    
              
            }
            public function list()
            {
                echo" List appointment<br/>";
                $test= $this->appointment->get_appointment();
                
                $expected_result=true;
               
                $test_name="List appointment Test Case";
                echo $this->unit->run($test,$expected_result,$test_name);

            }
	
		 public function getById()
            {
                echo" Individual appointment<br/>";
                $test= $this->appointment->get_appointment_byId('19');
                
                $expected_result=true;
               
                $test_name="Individual appointment Test Case";
                echo $this->unit->run($test,$expected_result,$test_name);

            }

          
            
}