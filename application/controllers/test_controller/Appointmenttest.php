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
	    $this->add();	
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
                    'status' => 'old',
                    'description' => 'Update Appointment'
                );
    
               $test= $this->appointment->update_appointment($data,'19');
                $expected_result=true;
               
                $test_name="Update appointment Test Case";
              
                echo $this->unit->run($test,$expected_result,$test_name);
    
              
            }

          
            
}