<?php
defined('BASEPATH') OR exit('No direct script access allowed');
<<<<<<< HEAD

class Patienttest extends CI_Controller {

=======
class Patienttest extends CI_Controller {
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
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
            $this->load->model('test/Patient_model','patient');
<<<<<<< HEAD

        } public function add(){
            echo" Patient Add<br/>";
            $register_date = date('Y-m-d');

=======
        } public function add(){
            echo" Patient Add<br/>";
            $register_date = date('Y-m-d');
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
           $data = array(
                'id'=>'1584552',
		'first_name'=>'Srijal',
		'last_name'=>'Nepal',
		'dob'=>'1998-02-21',
                'age'=>'22',
		'gender'=>'M',
		'phone'=>'93939',
		'email'=>'a@test.com',
		'address'=>'Ktm',
		'spouse_name'=>'',
		'spouse_phone'=>'',
                'spouse_age'=>'',
		'allergy'=>'',
		'remark'=>'desc',
		'register_date'=> $register_date,
		'status'=>'1',
		'photo' => isset($photo)? $photo:'',
		'spouse_photo' => isset($spouse_photo)? $spouse_photo:'',
		);
<<<<<<< HEAD

=======
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
           $test= $this->patient->save_patient($data);
            $expected_result=true;
           
            $test_name="Add Patient Test Case";
          
            echo $this->unit->run($test,$expected_result,$test_name);
<<<<<<< HEAD

          
        }
        
=======
          
        }
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
        public function update(){
                echo" Patient Update<br/>";
                $register_date = date('Y-m-d');
    
               $data = array(
                 
                    'first_name'=>'Srijal',
                    'last_name'=>'Nepal',
                    'dob'=>'1998-02-21',
                    'age'=>'22',
                    'gender'=>'M',
                    'phone'=>'93939',
                    'email'=>'a@test.com',
                    'address'=>'Ktm',
                    'spouse_name'=>'',
                    'spouse_phone'=>'',
                    'spouse_age'=>'',
                    'allergy'=>'',
                    'remark'=>'desc',
                    'register_date'=> $register_date,
                    'status'=>'1',
                    'photo' => isset($photo)? $photo:'',
                    'spouse_photo' => isset($spouse_photo)? $spouse_photo:'',
                    );
    
               $test= $this->patient->update_patient($data,'1584552');
                $expected_result=true;
               
                $test_name="Update Patient Test Case";
              
<<<<<<< HEAD
                echo $this->unit->run($test,$expected_result,$test_name);
    
              
            }

            public function delete()
=======
                echo $this->unit->run($test,$expected_result,$test_name);  
            }

            public function show()
            {
                echo" View patient<br/>";
                $test= $this->patient->show_patient('1584552');
                $expected_result=true;
               
                $test_name="View Patient Test Case";
                echo $this->unit->run($test,$expected_result,$test_name);

            }
	     public function delete()
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
            {
                echo" Delete patient<br/>";
                $test= $this->patient->del_patient('1584552');
                $expected_result=true;
               
                $test_name="Delete Patient Test Case";
                echo $this->unit->run($test,$expected_result,$test_name);

<<<<<<< HEAD
            }
            
}



=======
            }	
        
}
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
