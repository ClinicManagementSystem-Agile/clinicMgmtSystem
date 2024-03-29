<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctortest extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            $this->load->library('unit_test');
            //load model
            
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->model('test/Doctor_model','doctor');

        }
        public function index()
        {
            $this->add();
            $this->update();
            $this->delete();
        }
        
        public function add(){
            echo" doctor Add<br/>";
            $register_date = date('Y-m-d');

            $data = array(
                'first_name'=>'Dr. Asish ',
                'last_name'=>'Ghimire',
                'dob'=>'1997-02-15',
                'gender'=>'Male',
                'speciality'=>'Surgeon',
                'phone'=>'9852566555',
                'email'=>'asish@doc.com',
                'address'=>'Kathmandu',
                'website'=>'www.asish.doc.com',
                'commission_service'=>'500',
                'commission_lab'=>'250',
                'commission_pharmacy'=>'250',
                'status'=>'1',
                'photo'=> 'abc.img'
                );
           $test= $this->doctor->save_doctor($data);
            $expected_result=true;
           
            $test_name="Add doctor Test Case";
          
            echo $this->unit->run($test,$expected_result,$test_name);          
        }

        public function update(){
            echo" doctor Update<br/>";
            $data = array(
                'first_name'=>'Dr. Asish ',
                'last_name'=>'Ghimire',
                'dob'=>'1997-02-15',
                'gender'=>'Male',
                'speciality'=>'Surgeon',
                'phone'=>'9852566555',
                'email'=>'asish@doc.com',
                'address'=>'Kathmandu',
                'website'=>'www.asish.doc.com',
                'commission_service'=>'500',
                'commission_lab'=>'250',
                'commission_pharmacy'=>'250',
                'status'=>'1',
                'photo'=> 'abc.img'
                );

           $test= $this->doctor->update_doctor($data,'3');
            $expected_result=true;
           
            $test_name="Update doctor Test Case";              
            echo $this->unit->run($test,$expected_result,$test_name);            
        }
        public function show()
        {
            echo" View Doctor<br/>";
            $test= $this->patient->show_doctor('1584552');
            $expected_result=true;
           
            $test_name="View Doctor Test Case";
            echo $this->unit->run($test,$expected_result,$test_name);
        }

       
//doctor controller for delete

        public function delete()
            {
                echo" Delete doctor<br/>";
                $test= $this->doctor->del_doctor('3');
                $expected_result=true;
               
                $test_name="Delete doctor Test Case";
                echo $this->unit->run($test,$expected_result,$test_name);

            }



    }