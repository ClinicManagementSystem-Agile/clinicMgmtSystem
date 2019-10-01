<?php

class Appointment_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function save_appointment($data)
    {
        if( $this->db->insert('appointment', $data)){
            return true;
        }
        else{return false;}
        
    }


    function update_appointment($data,$id)
    {
        $this->db->where('id', $id);
        if($this->db->update('appointment', $data)){
            return true;
        }
        else{return false;
        }
    }

   


}