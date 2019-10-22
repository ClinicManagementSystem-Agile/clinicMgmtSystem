<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vitaltest extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            $this->load->library('unit_test');
            //load model
            
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->model('test/vital_model','vital');

        }
        public function index()
        {
            $this->add();
           
            $this->list();
            $this->getById();
        }
        
        public function add(){
            echo" vital Add<br/>";
            $data1 = array(
                'remark'=>'test',
                'date'=> date('Y-m-d H:i:s'),
                'user_id' => '1',
                'patient_id'=>'20',
                'appid'=>'13',
                );
                $id =$this->vital->insert($data1);
        
        
                if ($id){
                            
                
                    $data = array(
                        'parent_vital_id'=>11,
                        'value' => 'k',
                        'vital_id'=>1,
                        );
                    
                
                   
                                
                }
           

           $test= $this->vital->save_vital($data);
            $expected_result=true;
           
            $test_name="Add vital Test Case";
          
            echo $this->unit->run($test,$expected_result,$test_name);

          
        }
        
    

          
            public function list()
            {
                echo" List vital<br/>";
                $test= $this->vital->get_vital();
                
                $expected_result=true;
               
                $test_name="List vital Test Case";
                echo $this->unit->run($test,$expected_result,$test_name);

            }
            public function getById()
            {
                echo" Individual vital<br/>";
                $test= $this->vital->get_vital_byId('1');
                
                $expected_result=true;
               
                $test_name="Individual vital Test Case";
                echo $this->unit->run($test,$expected_result,$test_name);

            }
            
}



