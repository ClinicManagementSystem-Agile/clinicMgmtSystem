<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('patient_model', 'patient');
<<<<<<< HEAD
       
=======
      
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
        $this->load->library('numbertowords');

        //$this->load->model('vital_model', 'vital');
		if (!$this->session->userdata('loggedin')) {redirect('user/user_login');}
		$this->data['user'] = $this->session->userdata['loggedin'];
	}
<<<<<<< HEAD
	public function index()
	{
		$this->data['patients']=$this->patient->get_patients();
		//$patient_id = $this->data['patients']['id'];
		$this->data['vitals'] = $this->patient->get_vitals();
		$this->data['patient_ids'] = $this->patient->get_patient_ids_from_vital();
		$this->data['subview']='pages/patients';
		$this->load->view('frame', $this->data);		
	}
	public function deactivate_patient_list()
	{
		$this->data['patients']=$this->patient->get_patient_deactivated();
		//$patient_id = $this->data['patients']['id'];
		$this->data['vitals'] = $this->patient->get_vitals();
		$this->data['patient_ids'] = $this->patient->get_patient_ids_from_vital();
		$this->data['subview']='pages/deactivate_patient';
		$this->load->view('frame', $this->data);		
	}


	function save_visit()
    {
        if(!empty($_FILES['file']) && !empty($_FILES['file']['name']) ) {
            $file = $this->patient->save_historyimage('file');
                $file_name = $file['file_name'];
            }

        $this->session->set_flashdata('success','patient visiting history has been saved.');
        $this->patient->save_history($file_name);
    }



	function patient_nursing()
    {
        $this->data['patients']=$this->patient->get_patients_nursing();
        //$patient_id = $this->data['patients']['id'];
        $this->data['vitals'] = $this->patient->get_vitals();
        $this->data['patient_ids'] = $this->patient->get_patient_ids_from_vital();
        $this->data['subview']='pages/patients_nursing';
        $this->load->view('frame', $this->data);
    }

=======
	
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
	public function add_patient($id=NULL)
	{
		$this->data['error']='';
		if ($id !=NULL){
		$this->data['patient'] = $this->patient->get_patient_by_id($id);
		$this->data['patient_files'] = $this->patient->get_patient_files($id);
		}
		$this->data['subview']='pages/add-patient';
		$this->load->view('frame', $this->data);		
	}
	function upload_photo($patient_id=NULL)
{
   
$this->data['error'] = '';
    //$this->load->view('pages/upload_photo');
  $this->load->view('pages/take_photo');
//     $this->data['subview'] = 'pages/take_photo';
// $this->load->view('frame', $this->data);
}
function save_photo_patient($id){
    
    $filename =  time() . '.jpg';
$filepath = './assets/upload/patient_img/';


move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);
echo $filepath.$filename;
//$id=$_GET['id'];
echo $id;
$this->patient->upload_photo_patient($filename,$id);

}
<<<<<<< HEAD

	
function checknum()
    {
        $num = $this->input->post('num');
        // var_dump($med_name);
        // exit;
        if($num!='')
        {
        $numdetail = $this->patient->num_exists($num);
        
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($numdetail));
        }
    }
=======
	
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
	public function save_patient($id=NULL)
	{
		//$error = '';
		$this->form_validation->set_rules('first_name','First Name', 'required');
		$this->form_validation->set_rules('last_name','Last Name', 'required');
		$this->form_validation->set_rules('gender','Gender', 'required');
		$this->form_validation->set_rules('phone','Phone No', 'is_unique[patient.phone]');
		//$this->form_validation->set_rules('email','Email', 'valid_email');
		//$this->form_validation->set_rules('vat_no','Patient Old Id', 'is_unique[patient.vat_no]');
		if ($this->form_validation->run() == FALSE)
		{
			if ($id !=NULL){
			$this->data['patient'] = $this->patient->get_patient_by_id($id);
			$this->data['patient_files'] = $this->patient->get_patient_files($id);
			}
			$this->data['subview']='pages/add-patient';
			$this->load->view('frame', $this->data);
		}
		else
		{
            if(!empty($_FILES['photo']) && !empty($_FILES['photo']['name']) ) {
                $image = $this->patient->save_photo('photo');
                if(!empty($image['error']))
                {
                    $error = $image['error'];
                    $this->session->set_flashdata('error',$error .'<br>Upload image max size 2mb, jpg, png again on edit <br>');
                    //redirect('patient/add_patient');
                    //$this->data['subview']='pages/add-patient';
                    //$this->load->view('frame', $this->data);
                }
                $photo = $image['file_name'];
            }elseif($this->input->post('old_image'))
                {
                    $photo =  $this->input->post('old_image');
                }else{
                $photo = '';
            }
			
			if(!empty($_FILES['spouse_photo']) && !empty($_FILES['spouse_photo']['name']) ) {
                $image = $this->patient->save_spouse_photo('spouse_photo');
                if(!empty($image['error2']))
                {
                    $error2 = $image['error2'];
                    $this->session->set_flashdata('error2',$error2 .'<br>Upload image max size 2mb, jpg, png again on edit <br>');
                }
                $spouse_photo = $image['file_name'];
            }elseif($this->input->post('spouse_image'))
                {
                    $spouse_photo =  $this->input->post('spouse_image');
                }else{
                $spouse_photo = '';
            }
			
		if ($this->input->post('id')) {
			$id = $this->input->post('id');

			if($this->patient->save_patient($id,$photo,$spouse_photo)) {
				//var_dump($_FILES['doc']['name']); exit;
			if (!empty($_FILES['doc']) && !empty($_FILES['doc']['name'])) {
                        $images = $this->patient->upload_doc('doc',$id);
                         }
			$this->session->set_flashdata('success','patient profile has been updated.');
			redirect('patient'); 
			}else{
				$this->session->set_flashdata('error','There is an error during adding patient profile');
				//redirect('patient/add_patient');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
//			var_dump($_FILES['doc']);
//			exit();
			if($patient_id = $this->patient->save_patient($id=NULL,$photo,$spouse_photo)){
                           if (!empty($_FILES['doc']) && !empty($_FILES['doc']['name'])) {
                           $images = $this->patient->upload_doc('doc',$patient_id);
                         }
               $this->session->set_flashdata('success','The patient has been saved');
					
							redirect('patient');
				} else {
					$this->session->set_flashdata('error', 'There is error in saving patient');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
	}
	
<<<<<<< HEAD
	function delete_file($id) {
           
        if ($this->patient->delete_file($id)) {
            $this->session->set_flashdata('del', 'File Has been deleted');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error occured during delete File');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
	function delete_patient($id)
	{
		if($this->patient->del_patient($id)){
            $this->session->set_flashdata('del', 'The selected patient\'s profile has been deleted');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error occured during delete patient profile');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
	function delete_pic($id){
		if ($this->patient->delete_pic($id)) {
            $this->session->set_flashdata('success', 'Picture Has been deleted');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error occured during delete Image');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
	function delete_spouse_pic($id){
		if ($this->patient->delete_spouse_pic($id)) {
            $this->session->set_flashdata('success', 'Picture Has been deleted');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error occured during delete Image');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
	function deactivate_patient()
	{$id=$_GET["id"];
	$reason=$_GET["reason"];
		
		if($this->patient->deactivate_patient($id,$reason)){
            $this->session->set_flashdata('del', 'The selected patient\'s  has been deactivated successfully');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error occured during deactivating patient ');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}

=======
	
>>>>>>> 7f373b3f0527b2071cde4bd94c173ce0240483fa
	
}
