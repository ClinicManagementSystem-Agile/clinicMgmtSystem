<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->library('upload');
	}
	function get_patients()
	{
        $this->db->order_by('id','desc');
        $this->db->where('status','1');
        $query=$this->db->get('patient');
		return $query->result_array();
	}
		function get_patient_deactivated()
	{
        $this->db->order_by('id','desc');
        $this->db->where('status','0');
        $query=$this->db->get('patient');
		return $query->result_array();
	}
	
	



    function get_patients_nursing()
    {
		$this->db->order_by('id', 'desc');
        $this->db->select('patient.*,bill.id as bid,bill.status as bstatus');
        //$this->db->order_by('bill.created_date','desc');
        $this->db->group_by('patient.first_name');
        $this->db->join('bill','bill.patient_id=patient.id','left');
        $query=$this->db->get('patient');
        return $query->result_array();
    }


 function get_patient_ledger_id($patient_id)
    {
        $id='patient_id-'.$patient_id;
        $this->db->where('other_info', $id);
        $query = $this->db->get('ledger');
        $result = $query->row();

        return $result;
    }
    
    function get_vitals()
	{
		$query=$this->db->get('vitals');
		$result = $query->result_array();
		return $result;
	}

	function get_patient_ids_from_vital()
	{
		$this->db->select('patient_id');
		$this->db->from('vitals');
		$query =$this->db->get();
		return $query->result();
	}

	function get_patient_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('patient');
		return $query->row();
	}
	function get_file_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('patient_file');
		return $query->row();
	}
	function get_vital_by_id($patient_id)
	{
		$this->db->where('patient_id', $patient_id);
		$query = $this->db->get('vitals');
		return $query->result();		
	}

    function get_vital_by_appid($app_id,$patient_id)
    {
        $this->db->where('appid', $app_id);
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get('vitals');
        return $query->result();
    }
	function get_patient_files($id)
	{
		$this->db->where('patient_id', $id);
		$query = $this->db->get('patient_file');
		return $query->result_array();
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

    function get_appointment_by_patientid($id)
    {
        $this->db->where('status', 'used');
        $this->db->where('patient_id', $id);
        $query = $this->db->get('appointment');
        return $query->result_array();

    }

    function get_visit_by_id($appid)
    {
        $this->db->where('appid', $appid);
        $query = $this->db->get('visit_files');
        return $query->result_array();
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
	
	
	function del_patient($id)
	{
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->delete('patient');
		return true;
	}
	function delete_pic($id)
    {
		$data=array('photo'=>'');
		$image = $this->get_patient_by_id($id)->photo;
		$this->db->where('id', $id);
		if($this->db->update('patient', $data)):
		@unlink('./assets/upload/patient_img/'.$image);
		return true;
		else:
			return false;
		endif;
    }
	function delete_file($id)
    {
		//$data=array('file'=>'');
		$doc = $this->get_file_by_id($id)->file;
		$this->db->where('id', $id);
		if($this->db->delete('patient_file')):
		@unlink('./assets/upload/patient_documents/'.$doc);
		return true;
		else:
			return false;
		endif;
    }
	function delete_spouse_pic($id)
    {
		$data=array('spouse_photo'=>'');
		$image = $this->get_patient_by_id($id)->spouse_photo;
		$this->db->where('id', $id);
		if($this->db->update('patient', $data)):
		@unlink('./assets/upload/patient_img/'.$image);
		return true;
		else:
			return false;
		endif;
    }


    function get_patient_payment($patient_id)
   {
       $this->db->select('sum(total) as bill_total');
       $this->db->where('patient_id',$patient_id);
       $this->db->order_by('bill_date', 'desc');
       $query = $this->db->get('bill');
       $total_bill = $query->row()->bill_total;

       $this->db->select('sum(amount) as total_receipt');
       $this->db->where('patient_id',$patient_id);
       $this->db->order_by('receipt_date', 'desc');
       $query = $this->db->get('receipts');
       $total_receipt = $query->row()->total_receipt;

       $total = $total_bill-$total_receipt;
       return $total;

   }
   function deactivate_patient($id,$reason)
	{
	
		 $date=date('Y-m-d H:i:s');
		$data = array(
    
		'status'=>'0',
		'deactivate_reason'=>$reason,
		'deactivate_date'=>$date,
		'deactivated_by'=>$this->session->userdata['loggedin']['user_id'],
		
		);
	
		$this->db->where('id',$id);
		 if($this->db->update('patient',$data)){
		 	return true;
		 }else{
		 	return false;
		 }
	
	}

}
