<?php
class MY_Controller extends CI_Controller {
    public $data = array();
    function __construct(){
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('vital_model', 'vital');
        $this->load->model('patient_model', 'patient');
        $this->data['patients'] = $this->home_model->get_patients();
        $this->data['bills'] = $this->home_model->get_bills();
        $this->data['appointments'] = $this->home_model->get_appointments();
		$this->data['title'] = 'Clinic';
                
        
    }
    function get_total_amt($ledger_id)
    {
        $total_amt = $this->home_model->get_total_amountByledgerId($ledger_id)->total_amt;
        if($total_amt<0)
        {
            return '0';
            
        }
 else {
     return $total_amt;
 }
    }

}