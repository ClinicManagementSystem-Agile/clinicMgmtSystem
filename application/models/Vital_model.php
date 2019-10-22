<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vital_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function get_vitals()
	{
		$query=$this->db->get('vitals');
		return $query->result_array();
	}
	function patient_vitals($pat_id)
	{
		$this->db->order_by('v.date', 'desc');
		$this->db->where('v.patient_id', $pat_id);
		$this->db->select('pv.name, pv.id as parent_vital_id, vd.value, vd.id as vd_id, v.patient_id as patient_id, v.id as vital_id,v.date');
		//$this->db->group_by('pv.name');
		$this->db->from('vitals v');
		$this->db->join('vital_details vd', 'vd.vital_id = v.id');
		$this->db->join('parent_vital pv', 'vd.parent_vital_id =pv.id');
		$query = $this->db->get();
		$result= $query->result_array();
		if($result) {
		return $result;} else {
			return false;
		}
	}
	function parent_vital()
	{
	    $this->db->order_by('id','desc');
		$query=$this->db->get('parent_vital');
		return $query->result_array();
	}
	function get_vital_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('vitals');
		return $query->row();
	}
	function get_vital_by_patid($patid,$appointmentid=null)
	{
		$this->db->where('patient_id', $patid);
                if ($appointmentid!=null){
                $this->db->where('appid', $appointmentid);
                }
		$query = $this->db->get('vitals');
		return $query->row();
	}

    function get_vital_by_appid($appid)
    {
        $this->db->where('appid', $appid);
        $query = $this->db->get('vitals');
        return $query->row();
    }

	function get_vital_details_by_id($id)
	{
		$this->db->select('parent_vital.*,parent_vital.id as pv_id,vital_details.*,vital_details.id as vd_id');
		$this->db->where('vital_details.vital_id', $id);
		$this->db->join('parent_vital','parent_vital.id=vital_details.parent_vital_id');
		$query = $this->db->get('vital_details');
		return $query->result_array();
	}
    function get_patient_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }


    function save_vital()
	{
	$data1 = array(
		'remark'=>$this->input->post('remark'),
		'date'=> date('Y-m-d H:i:s'),
		'user_id' => $this->session->userdata['loggedin']['user_id'],
		'patient_id'=>$this->input->post('pid'),
        'appid'=>$this->input->post('appid'),
        );
		$this->db->insert('vitals', $data1);
		$id = $this->db->insert_id();

		$d = array(
		    'status' =>'used'
        );

        $this->db->where('id', $this->input->post('appid'));
        $this->db->update('appointment', $d);

		if ($id){
                    
			$count = count($this->input->post('vital_name'));
                       $vitalcount=0;

			for($i=0; $i<$count; $i++ )
			{
                            if ($this->input->post('vital_name')[$i]=='') continue;
                            $vitalcount=$vitalcount+1;
			$data[] = array(
				'parent_vital_id'=>$this->input->post('parent_vital_id')[$i],
				'value' => $this->input->post('vital_name')[$i],
				'vital_id'=>$id,
				);
			}
		if ( $vitalcount>0){
			$this->db->insert_batch('vital_details', $data);
			return $this->db->insert_id();
                }
                else return true;
                        
		}
		
	}
	function update_vital($vid,$vd_id)
	{
	$data1 = array(
		'remark'=>$this->input->post('remark'),
		//'date'=> date('Y-m-d H:i:s'),
		'user_id' => $this->session->userdata['loggedin']['user_id'],
		//'patient_id'=>$this->input->post('pid'),
		);
		$this->db->where('id', $vid);
		$this->db->update('vitals', $data1);
		//return true;
		//if ($vid){
			$count = count($this->input->post('vital_name'));
			for($i=0; $i<$count; $i++ )
			{
			//$where[] = array ('id' => $this->input->post('vd_id'));
			$data[] = array(
				'id' => $this->input->post('vd_id')[$i],
				'parent_vital_id'=>$this->input->post('pv_id')[$i],
				'value' => $this->input->post('vital_name')[$i],
				'vital_id'=>$vid,
				);
			}
			$this->db->where_in('id',$vd_id);
			$this->db->update_batch('vital_details', $data, 'id');
			return true;
	}
	function update_vital_one($id)
	{		
	$data = array(
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'dob'=>$this->input->post('dob'),
		'gender'=>$this->input->post('gender'),
		'phone'=>$this->input->post('phone'),
		'email'=>$this->input->post('email'),
		'address'=>$this->input->post('address'),		
		);
		$this->db->where('id',$id);
		return $this->db->update('vital',$data);
	}
	
	function del_vital($vid)
	{
		$this->db->where('id',$vid);
		$this->db->delete('vitals');
		$this->db->where('vital_id',$vid);
		$this->db->delete('vital_details');
		return true;
	}
	
	
}


