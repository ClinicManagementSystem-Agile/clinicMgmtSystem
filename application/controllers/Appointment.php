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
