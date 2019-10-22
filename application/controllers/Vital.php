<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vital extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('vital_model', 'vital');
		$this->load->model('patient_model', 'patient');
		if (!$this->session->userdata('loggedin')) {redirect('user/user_login');}
		$this->data['user'] = $this->session->userdata['loggedin'];
	}
	
	public function index()
	{
		$this->data['vitals']=$this->vital->get_vitals();
		$this->data['subview']='pages/vitals';
		$this->load->view('frame', $this->data);		
	}
	public function create_vital($pid,$appid=NULL)
	{
        $this->data['patient'] = $this->vital->get_patient_by_id($pid);

        $this->data['vitals']=$this->patient->get_patient_by_id($pid);
		$this->data['vitals']=$this->vital->parent_vital();

        $this->data['appid'] = $appid;

		$this->data['pid'] = $pid;
		$this->data['subview']='vital/create_vital';
		$this->load->view('frame', $this->data);		
	}
	public function edit_vital($pid,$appid=NULL)
	{
//		$this->data['vitals']=$this->vital->patient_vitals($pid);
        $this->data['appid'] = $appid;
        $this->data['vital'] = $this->vital->get_vital_by_patid($pid,$appid);
		$vid = $this->data['vital']->id;
                
		$this->data['vitals'] = $this->vital->get_vital_details_by_id($vid);
		$this->data['subview']='vital/update_vital';
		$this->load->view('frame', $this->data);		
	}
	public function save_vital()
	{
			if($this->vital->save_vital()){
					$this->session->set_flashdata('success','The vital has been saved');
                if ($this->session->userdata['loggedin']['dept_id'] == '3')
                {
                     redirect('appointment/list_today_appointments');
                    //redirect('patient/patient_nursing');
                }
                
                elseif ($this->session->userdata['loggedin']['dept_id'] == '1')
                {
                    redirect('appointment/view_all_appointment');
                }
                
                else{
                    redirect('appointment/list_today_appointments');
                }

				} else {
					$this->session->set_flashdata('error', 'There is error in saving vital');
					redirect($_SERVER['HTTP_REFERER']);
				}
			
	}
	
	function update_vital()
	{
		$this->form_validation->set_rules('remark','Other info', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$pid = $this->input->post('pid');
			$this->data['vital'] = $this->vital->get_vital_by_patid($pid);		
			$vid = $this->data['vital']->id;
			$this->data['vitals'] = $this->vital->get_vital_details_by_id($vid);

			$this->data['subview']='vital/update_vital';
			$this->load->view('frame', $this->data);
		}
		else
		{
			$pid = $this->input->post('pid');			
			$vid = $this->input->post('vid');			
			$pv_id = $this->input->post('pv_id');			
			$vd_id = $this->input->post('vd_id');			
			if($this->vital->update_vital($vid,$vd_id)){
				$this->session->set_flashdata('success','The vital has been updated');
                if ($this->session->userdata['loggedin']['dept_id'] == '3')
                {
                    redirect('patient/patient_nursing');
                }
                elseif ($this->session->userdata['loggedin']['dept_id'] == '1')
                {
                    redirect('appointment/view_all_appointment');
                }
                
                else{
                    redirect('appointment/list_today_appointments');
                }
				} else {
				$this->session->set_flashdata('error', 'There is error in updating vital');
				redirect($_SERVER['HTTP_REFERER']);
				}
		}
	}	
	function delete_vital($pid)
	{
		$this->data['vital'] = $this->vital->get_vital_by_patid($pid);		
		$vid = $this->data['vital']->id;
		if($this->vital->del_vital($vid)){
                    
            $this->session->set_flashdata('del', 'The selected vital has been deleted');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error occured during delete vital');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}


	function patient_vital_details()
    {
        $pid = $this->input->post('patient_id');

        $this->data['parent_vital']=$this->vital->parent_vital();
		
		$this->data['patient_vitals'] = $this->vital->patient_vitals($pid);
        $this->data['patient'] = $this->vital->get_patient_by_id($pid);
        $this->data['vital'] = $this->vital->get_vital_by_patid($pid);
        $vid = $this->data['vital']->id;
        $this->data['vitals'] = $this->vital->get_vital_details_by_id($vid);


        $this->load->view('vital/view_details',$this->data);
    }

    function patient_vital_details_appid()
    {
        $pid = $this->input->post('patient_id');
        $appid = $this->input->post('app_id');

        $this->data['parent_vital']=$this->vital->parent_vital();
		
		//$this->data['patient_vitals'] = $this->vital->patient_vitals($pid);
        $this->data['patient'] = $this->vital->get_patient_by_id($pid);
        $this->data['vital'] = $this->vital->get_vital_by_appid($appid);

        $vid = $this->data['vital']->id;
        //$this->data['vitals'] = $this->vital->get_vital_details_by_id($vid);
        $this->data['patient_vitals'] = $this->vital->get_vital_details_by_id($vid);


        $this->load->view('vital/view_details',$this->data);
    }
}
