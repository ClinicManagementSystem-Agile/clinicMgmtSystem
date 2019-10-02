<?php
class Appointment extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('appointment_model');
        $this->load->model('doctor_model');
        $this->load->model('patient_model');
		if (!$this->session->userdata('loggedin')) {redirect('user/user_login');}
        $this->data['page'] = 'appointment';
    
		$this->data['doctors'] = $this->appointment_model->get_doctors();
        $this->data['patients'] = $this->appointment_model->get_patients();
        $this->data['times'] = $this->appointment_model->get_times();
    }

    function index($patient_id=NULL)
    {
           $this->data['patient_id'] = $patient_id; 
        

        $this->data['subview']='appointment/view_appointment';
        $this->load->view('frame', $this->data);
    }
    
    function list_today_appointments(){
        $this->data['todayappointments'] = $this->appointment_model->get_today_appointment();

        $this->data['subview']='appointment/list_appointments';
        $this->load->view('frame', $this->data);
          
          
    }
    
    function view_all_appointment(){

        $this->data['appointments'] = $this->appointment_model->get_all_appointments();
      

        $this->data['subview']='appointment/all_appointment';
        $this->load->view('frame', $this->data);
      }
    
      
      
    
    function event()
    {
        $appointment = $this->appointment_model->get_appointment();
        $events = array();



        // Fetch results
        foreach ($appointment as $row) {
            $doctor=$this->doctor_model->get_doctor_by_id($row['doctor_id']);
            $patient=$this->patient_model->get_patient_by_id($row['patient_id']);

            $dname=$doctor->first_name.' '.$doctor->last_name;
            $pname=$patient->first_name.' '.$patient->last_name;

         if($row['status']=='cancelled')
         {
             $color = 'grey';
         }
            if($row['status']=='new')
            {
                $color = 'green';
            }

            if($row['status']=='rebooked')
            {
                $color = 'orange';
            }
            if($row['status']=='used')
            {
                $color = 'yellow';
            }


            $e = array();
        $e['id'] = $row['id'];
        $e['title'] = $pname.' Appoints To '.$dname;
        $e['description'] = $row['description'];
        $e['start'] = $row['date'].'T'.$row['start_time'];
        $e['end'] = $row['date'].'T'.$row['end_time'];
        $e['color'] =$color;


//        $e['end'] = $row['appointment_book_date'];
        $e['allDay'] = false;

        // Merge the event array into the return array
        array_push($events, $e);

    }

        // Output json for our calendar
        echo json_encode($events);

        json_encode($appointment);
    }


    function book_appointment()
    {
//        if(!empty($this->input->post('time_select')))
//        {
//            $str = $this->input->post('time_select');
//            $times = (explode("-", $str));
//            $time1 = $times[0];
//            $time2 = $times[1];
//            $start_time = date('H:i:s', strtotime($time1));
//            $end_time = date('H:i:s', strtotime($time2));
//        }
//        else
//        {
//            $str = $this->input->post('time');
//            $times = (explode("-", $str));
//            $time1 = $times[0];
//            $time2 = $times[1];
//            $start_time = date('H:i:s', strtotime($time1));
//            $end_time = date('H:i:s', strtotime($time2));
//        }
        $str = $this->input->post('time');
        $times = (explode("-", $str));
        $time1 = $times[0];
        $time2 = $times[1];
       
        $time_check1 = explode(':', $time1);
        $time_check2 = explode(':', $time1);
        if($time_check1[0]>12 || $time_check2[0]>12 )
        {
            $time1 = substr($time1, 0, -2);
            $time2 = substr($time2, 0, -2);
        }
        else
        {
              $time1 = $time1;
              $time2 = $time2;
        }
            
        $start_time = date('H:i:s', strtotime($time1));
        $end_time = date('H:i:S', strtotime($time2));
        if($this->input->post('patient_id')=='new')
        {
            $data = array(
                'first_name'=>$this->input->post('first_name'),
                'last_name'=>$this->input->post('last_name'),
                'phone'=>$this->input->post('phone'),
//                'dob'=>$this->input->post('dob'),
//                'age'=>$this->input->post('age'),
//                'gender'=>$this->input->post('gender'),
//                'email'=>$this->input->post('email'),
                'address'=>$this->input->post('address'),
//                'spouse_name'=>$this->input->post('spouse_name'),
//                'remark'=>$this->input->post('remark'),
//                'vat_no'=>$this->input->post('vat_no'),
                'register_date'=> date('Y-m-d'),
                'status'=>'1',
                //'photo' => isset($photo)? $photo:''
            );

            $patient_id = $this->appointment_model->add_patient($data);
        }
        else
        {
            $patient_id = $this->input->post('patient_id');
        }

        $data = array(
            'patient_id' => $patient_id,
            'doctor_id' => $this->input->post('doctor_id'),
            'date' => $this->input->post('appointment_book_date'),
            'appointment_book_date' =>date('Y-m-d') ,
            'start_time' =>$start_time,
            'end_time' =>$end_time,
            'status' => 'new',
            'description' => $this->input->post('description')
        );

//        var_dump($data);
//        exit();
        $this->appointment_model->save_appointment($data);
        if($this->session->userdata['loggedin']['dept_id']=='3')
        {
            $this->session->set_flashdata('success','New Appointment has been booked');
            echo 'nursing';
        }
        else
        {
             echo $patient_id;
        }
       
//        $this->session->set_flashdata('success','New Appointment has been booked');

    }

    function test()
    {
        $time= $date = '2am';
        echo date('H:i:s', strtotime($date));
    }

    function get_time()
    {
        $day = $this->input->post('day');
        $doctor_id = $this->input->post('doctor_id');
        $total_time = $this->input->post('total_time');
        $appointment = $this->appointment_model->get_availability($day,$doctor_id);
        if($appointment)
{
    if($appointment->from_time!='00:00:00')
    {
        $start=strtotime($appointment->from_time);
        $end=strtotime($appointment->to_time);
        $range=range($start,$end,15*60);     
        foreach($range as $key=>$time){
                        $time_next = date("H:ia",$range[$key+1]);
            $time= date("H:ia",$time);

             echo '<option value="'.$time.'-'.$time_next.'" '.(($time.'-'.$time_next == $total_time) ? 'selected' : '').'>'.$time.'-'.$time_next.'</option>';
//            echo '<option value="'.$time.'-'.$time_next.'" >'.$time.'-'.$time_next.'</option>';

        }

    }
    else
    {
        echo '<option value="">Not Available</option>';
    }

}
else
{
    $start=strtotime('08:00:00');
    $end=strtotime('20:00:00');
    $range=range($start,$end,15*60);
    foreach($range as $key=>$time){
        $time_next = date("H:ia",$range[$key+1]);
        $time= date("H:ia",$time);
        echo '<option value="'.$time.'-'.$time_next.'">'.$time.'-'.$time_next.'</option>';

    }

}


    }


    function view_appointment()
    {
        $this->data['subview']='appointment/view_appointment_today';
        $this->load->view('frame', $this->data);

    }

    function get_book_time()
    {
        echo $date = $this->input->post('date');
        echo $time = $this->input->post('time');
//        $appointment =  $this->appointment_model->get_appointment_bytime($date,$time);

        echo '<option value="'.$time.'">'.$time.'</option>';
//        echo $day = $this->input->post('day');

    }

    function get_appointment()
    {

        $ap_id = $this->input->post('appointment_id');
        $appointment =  $this->appointment_model->get_appointment_byid($ap_id);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($appointment));

    }

    function update_appointment()
        {

//            $str = $this->input->post('time');
//            $times = (explode("-", $str));
//            $time1 = $times[0];
//            $time2 = $times[1];
//            $start_time = date('H:i:s', strtotime($time1));
//            $end_time = date('H:i:s', strtotime($time2));


                    $str = $this->input->post('time');
        $times = (explode("-", $str));
        $time1 = $times[0];
        $time2 = $times[1];
       
        $time_check1 = explode(':', $time1);
        $time_check2 = explode(':', $time1);
        if($time_check1[0]>12 || $time_check2[0]>12 )
        {
            $time1 = substr($time1, 0, -2);
            $time2 = substr($time2, 0, -2);
        }
        else
        {
              $time1 = $time1;
              $time2 = $time2;
        }
            
        $start_time = date('H:i:s', strtotime($time1));
        $end_time = date('H:i:S', strtotime($time2));

            
            
            $data = array(
                'patient_id' => $this->input->post('patient_id'),
                'doctor_id' => $this->input->post('doctor_id'),
                'date' => $this->input->post('appointment_book_date'),
                'start_time' =>$start_time,
                'end_time' =>$end_time,
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status')
            );

            $update = $this->appointment_model->update_appointment($data,$this->input->post('appointment_id'));
             $this->session->set_flashdata('success','New Appointment has been updated');

        }


}