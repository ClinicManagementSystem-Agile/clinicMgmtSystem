<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->library('upload');
	}
	
	
	
	   function upload_photo_patient($filename,$id)
    {
        $data = array(
            'photo'=>$filename,
           
        );
        $this->db->where('id',$id);
        $this->db->update('patient', $data);
        return true;


    }
	function save_photo($filename=null)
	{
	$config['upload_path']          = './assets/upload/patient_img/';
	$config['allowed_types']        = 'gif|jpg|png|jpeg|PNG|JPG|JPEG';
	$config['max_size']             = 3000;
	$config['max_width']            = 20000;
	$config['max_height']           = 20000;
	$config['overwrite']			= TRUE;

	//$this->load->library('upload', $config);
	$this->upload->initialize($config);

	if ( ! $this->upload->do_upload($filename))
	{
		$error = array('error' => $this->upload->display_errors());
		return $error;
	}else{
		$data = $this->upload->data();
		return $data;
	}	
	}
	function save_spouse_photo($filename=null)
	{
	$config['upload_path']          = './assets/upload/patient_img/';
	$config['allowed_types']        = 'gif|jpg|png|jpeg|PNG|JPG|JPEG';
	$config['max_size']             = 3000;
	$config['max_width']            = 20000;
	$config['max_height']           = 20000;
	$config['overwrite']			= TRUE;

	//$this->load->library('upload', $config);
	$this->upload->initialize($config);

	if ( ! $this->upload->do_upload($filename))
	{
		$error2 = array('error' => $this->upload->display_errors());
		return $error2;
	}else{
		$data = $this->upload->data();
		return $data;
	}	
	}


    function save_doc($filename=null)
    {
        $config['upload_path']          = './assets/upload/patient_doc/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 30000;
        $config['max_width']            = 20000;
        $config['max_height']           = 2000000;
        $config['overwrite']			= TRUE;

        //$this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($filename))
        {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }else{
            $data = $this->upload->data();
            return $data;
        }
    }
	
public function upload_doc($filename=NULL,$id){
          $no_files = count($_FILES['doc']['name']);

          for ($i = 0; $i < $no_files; $i++) {
              $_FILES['userfile']['name'] = $_FILES['doc']['name'][$i];
              $_FILES['userfile']['type'] = $_FILES['doc']['type'][$i];
              $_FILES['userfile']['tmp_name'] = $_FILES['doc']['tmp_name'][$i];
              $_FILES['userfile']['error'] = $_FILES['doc']['error'][$i];
              $_FILES['userfile']['size'] = $_FILES['doc']['size'][$i];
              $config = array(
                  'allowed_types' => '*',
                  'max_size' => '10000',
                  'overwrite' => TRUE,
                  'upload_path'=> './assets/upload/patient_documents/'
              );
              //$this->load->library('upload', $config);
              $this->upload->initialize($config);
              if (!$this->upload->do_upload()) :
                  $error = array('error' => $this->upload->display_errors());
			  return $error;
				//var_dump($error);exit();
              else :
                  $final_files_data = $this->upload->data();
                  $filename = $final_files_data['file_name'];
                  $data = array(
                      'patient_id' =>$id,
                      'file' => $filename
                  );
                  $this->db->insert('patient_file',$data);
              endif;
          }
      }

      
      
      
	function save_pat_file($data = array()){
        $insert = $this->db->insert_batch('patient_file',$data);
        return $insert?true:false; // didn't worked. 
    }
	function save_file($id=null,$patientData)
	{
		$data = array('patient_id' => $id, 'file'=>$patientData);
		return $this->db->insert('patient_file', $data);  // didn't worked. 
	}

    function save_historyimage($filename=null)
    {
        $config['upload_path']          = './assets/upload/visit/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
        $config['max_size']             = 30000;
        $config['max_width']            = 200000;
        $config['max_height']           = 2000000;
        $config['overwrite']			= TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($filename))
        {

            $error = array('error' => $this->upload->display_errors());
            return $error;
        }else{
            $data = $this->upload->data();
            return $data;
        }
    }


    function save_history($file)
    {
        $data = array(
            'appid'=>$this->input->post('appid'),
            'file_chosen' => isset($file)? $file:''
        );

        $this->db->insert('visit_files', $data);
        return $this->db->insert_id();


    }
          public function num_exists($num)
    {   
        $query = $this->db->get_where('patient', ['phone' => $num])->row();
        return $query;
         // if( $query->num_rows() > 0){
         //    return true;
         // }else{
         //    return false;
         // }
    }

    


	function save_patient($id=null,$photo,$spouse_photo)
	{
	if ($id !=null){
		$register_date = $this->get_patient_by_id($id)->register_date;
		if($register_date == '0000-00-00'){ $register_date = date('Y-m-d');}
	} else {
		$register_date = date('Y-m-d');
	}
	$data = array(
                'id'=>$this->input->post('vat_no'),
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'dob'=>$this->input->post('dob'),
        'age'=>$this->input->post('age'),
		'gender'=>$this->input->post('gender'),
		'phone'=>$this->input->post('phone'),
		'email'=>$this->input->post('email'),
		'address'=>$this->input->post('address'),
		'spouse_name'=>$this->input->post('spouse_name'),
		'spouse_phone'=>$this->input->post('spouse_phone'),
                'spouse_age'=>$this->input->post('spouse_age'),
		'allergy'=>$this->input->post('allergy'),
		'remark'=>$this->input->post('remark'),
		// 'vat_no'=>$this->input->post('vat_no'),
		'register_date'=> $register_date,
		'status'=>'1',
		'photo' => isset($photo)? $photo:'',
		'spouse_photo' => isset($spouse_photo)? $spouse_photo:'',
		);
	if ($id !=null){
		$this->db->where('id',$id);
		return $this->db->update('patient',$data);				
	} else {
		$this->db->insert('patient', $data);
		
                	$patient_id = $this->db->insert_id();
		
                        $data_ledger = array (
			'title' => $this->input->post('first_name').' '.$this->input->post('last_name'),
			'group_id' => 29,
                        'other_info' => 'patient_id'.'-'.$patient_id,
                        'opening_balance' => '0.00'    
		);
                
                                                              
                 return ($this->db->insert('ledger', $data_ledger));
        
	}
	
	}
	
	

}
