<?php

class Appointment_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_appointment()
    {
            $this->db->order_by('id','desc');
            $query = $this->db->get('appointment');
            return $query->result_array();

    }


    function get_today_appointment()
    {
            $this->db->order_by('id','desc');
            $this->db->where('date', date('Y-m-d'));
            $query = $this->db->get('appointment');
            return $query->result_array();

    }

    function get_all_appointments()
    {
            $this->db->order_by('id','desc');
            $query = $this->db->get('appointment');
            return $query->result_array();
    }



    function get_today_used_appointment()
    {
        $this->db->where('status','used');
        $this->db->where('appointment_book_date', date('Y-m-d'));
        $this->db->order_by('id','desc');
        $query = $this->db->get('appointment');
        return $query->result_array();

    }


    function get_appointment_byid($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('appointment');
        return $query->row();

    }


    function get_doctors()
    {
        $this->db->where('status','1');
        $this->db->order_by('id','desc');
        $query = $this->db->get('doctor');
        return $query->result_array();
    }

    function get_patients()
    {
        $this->db->where('status','1');
        $this->db->order_by('id','desc');
        $query = $this->db->get('patient');
        return $query->result_array();
    }

    function get_times()
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get('time_slots');
        return $query->result_array();
    }

    function save_appointment($data)
    {
        $this->db->insert('appointment', $data);
        return $this->db->insert_id();
    }


    function add_patient($data)
    {
        $this->db->insert('patient', $data);
        return $this->db->insert_id();
    }

    function update_appointment($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('appointment', $data);
    }

    function get_availability($day,$doctor_id)
    {
        $this->db->where('available_days',$day);
        $this->db->where('doctor_id',$doctor_id);
        $query = $this->db->get('doctor_availability');
        return $query->row();
    }

 function get_timename_byid($id)
 {
     $this->db->where('id',$id);
     $query = $this->db->get('time_slots');
     return $query->row();
 }


}