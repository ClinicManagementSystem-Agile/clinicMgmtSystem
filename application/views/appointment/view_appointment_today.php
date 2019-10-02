<style>
    .form-group .form-control {
        border: 1px solid #ccc;
    }

    .btn-group .form-control
    {
        border: 1px solid #ccc;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />


<link href='<?php echo base_url(); ?>assets/lib/fullcalendar.min.css' rel='stylesheet'/>
<link href='<?php echo base_url(); ?>assets/lib/fullcalendar.print.css' rel='stylesheet' media='print'/>
<script src='<?php echo base_url(); ?>assets/lib/jquery.min.js'></script>
<script src='<?php echo base_url(); ?>assets/lib/moment.min.js'></script>
<script src='<?php echo base_url(); ?>assets/lib/jquery-ui.custom.min.js'></script>
<script src='<?php echo base_url(); ?>assets/lib/fullcalendar.min.js'></script>


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!--<style>-->
<!--    tr{-->
<!--        height:50px ;-->
<!--    }-->
<!--</style>-->

<script>

    var save_method;

    function tConv24(time24) {
        var ts = time24;
        var H = +ts.substr(0, 2);
        var h = (H % 12) || 12;
        h = (h < 10)?("0"+h):h;  // leading 0 at the left for 1 digit hours
        var ampm = H < 12 ? "am" :"pm";
        ts = h+ampm;
        return ts;
    };

    function tConvert (time) {
        // Check correct time format and split into components
        time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)/) || [time];

        if (time.length > 1) { // If time format correct
            time = time.slice (1);  // Remove full string match value
            time[5] = +time[0] < 12 ? 'am' : 'pm'; // Set AM/PM
            time[0] = +time[0] % 12 || 12; // Adjust hours
             time[0] = ( time[0] < 10 ? "0" : "" ) + time[0];
        }
        return time.join (''); // return adjusted time or original string
    }


    $(document).ready(function () {

        function fmt(date) {
            return date.format("YYYY-MM-DD HH:mm");
            minDate:new Date();

        }
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var url = "<?php echo base_url('appointment/event')?>";


        var calendar = $('#calendar').fullCalendar({
            editable: true,
            defaultView: 'agendaWeek',
            allDaySlot: false,
            snapDuration: '00:15:00',
            slotDuration: "00:15:00",
            minTime: '08:00:00',
            maxTime: '21:00:00',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay',
            },

            businessHours:
                {

                    start: '11:00',
                    end:   '12:00',
                    dow: [ 1, 2, 3, 4, 5,6,7]
                },

            events:
                {
                    url: url,
                    type: 'POST', // Send post data
                    error: function() {
                        alert('There was an error while fetching events.');
                    }
                },

            // Convert the allDay from string to boolean
            eventRender: function (event, element, view) {

                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
                               $(element).css({"height": "auto", "right": "auto"});
            }
            ,
            selectable: true,
            selectHelper: true,
                select: function (start, end, allDay) {
                    var start = fmt(start);
                    var time = start.split(" ");
                    date = time[0];
                    time_ap = time[1];
//                    start_time = tConv24(time_ap);
                    start_time=tConvert (time_ap);

                     var end = fmt(end);
                    var time1 = end.split(" ");
                    time_ap1 = time1[1];
//                    end_time = tConv24(time_ap1);
                    end_time=tConvert (time_ap1);


//                    total_time= time_ap+'-'+time_ap1;
//alert(total_time)
                    total_time = start_time+'-'+end_time;
//                    alert(total_time);
                    $('#form_modal').modal('show'); // show bootstrap modal
                    $('.modal-title').text('Add Appointment'); // Set Title to Bootstrap modal title
                    //                    var title = prompt('Event Title:');
                    $('[name="appointment_book_date"]').val(date);
//                    document.getElementById('select_time').style.display='block';

                    $('[name="time_select"]').val(total_time);

                    var input = date;
                    var date1 = new Date(input).getUTCDay();

                    var weekday = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    var day = weekday[date1];

                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url(); ?>appointment/get_book_time',
                        data: {
                            time: total_time,
                            date:date,
                            day: day
                        },
                        success: function (response) {
//                            alert(response);
                            $( '#time' ).html(response);

                        }
                    });



                    if (title) {
                        var start = fmt(start);
                        var end = fmt(end);

                        calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                            true // make the event "stick"
                        );
                    }
                    calendar.fullCalendar('unselect');
                },

                editable: true,
//                eventDrop: function (event, delta) {
//                    alert('here');
//                    var start = fmt(event.start);
//                    var end = fmt(event.end);
//                    $.ajax({
//                        url: 'update_events.php',
//                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
//                        type: "POST",
//                        success: function (json) {
//                            alert("Updated Successfully");
//                        }
//                    });
//                },

eventMouseover: function(calEvent, jsEvent) {
    var tooltip = '<div class="tooltipevent" style="width:150px;height:100px;background:#ccc;position:absolute;z-index:10001;">' + calEvent.title +'<p><strong>'+calEvent.description +'</strong></p></div>';
    var $tooltip = $(tooltip).appendTo('body');

    $(this).mouseover(function(e) {
        $(this).css('z-index', 10000);
        $tooltip.fadeIn('500');
        $tooltip.fadeTo('10', 1.9);
    }).mousemove(function(e) {
        $tooltip.css('top', e.pageY + 10);
        $tooltip.css('left', e.pageX + 20);
    });
},

eventMouseout: function(calEvent, jsEvent) {
    $(this).css('z-index', 8);
    $('.tooltipevent').remove();
},
                eventClick: function (event) {
                    save_method = 'update';
//                alert(event.id)
//                    var decision = confirm("Do you want to remove event?");
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url(); ?>appointment/get_appointment',
                            data: {
                                appointment_id: event.id
                            },
                            success: function (data) {
                            var start_time = tConvert(data.start_time);
                            var end_time = tConvert(data.end_time);
                            total_time = start_time+'-'+end_time;    
                            
document.getElementById("edit").style.display = "block";
                                doctor(data.doctor_id,data.date,total_time);
                                $('#form')[0].reset(); // reset form on modals
                                $('#form_modal').modal('show'); // show bootstrap modal
                                $('.modal-title').text('Update Appointment'); // Set Title to Bootstrap modal title
                                //                    var title = prompt('Event Title:');
                            $('[name="appointment_book_date"]').val(data.date);
                                $('[name="doctor_id"]').val(data.doctor_id);
                                $('[name="patient_id"]').val(data.patient_id);
//                                $('[name="time"]').val(total_time);
                                $('[name="appointment_id"]').val(data.id);
                                $('[name="status"]').val(data.status);
                                $('[name="description"]').val(data.description);

                                $('#doctor_id').css('pointer-events','none');
                                $('#patient_id').css('pointer-events','none');
//                                document.getElementById("doctor_id").disabled = true;
//                                document.getElementById("patient_id").disabled = true;
                                 //alert("Updated Successfully");
                            }
                        });
                }
//            eventResize: function (event) {
//                var start = fmt(event.start);
//                var end = fmt(event.end);
//                $.ajax({
//                    url: 'update_events.php',
//                    data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
//                    type: "POST",
//                    success: function (json) {
//                        //alert("Updated Successfully");
//                    }
//                });
//
//            }

        });

    });

    function save()
    {
        var time = document.forms["form"]["time"].value;
        var patient = document.forms["form"]["patient_id"].value;
        var doctor = document.forms["form"]["doctor_id"].value;
        var first_name = document.forms["form"]["first_name"].value;
        var last_name = document.forms["form"]["last_name"].value;
        var phone = document.forms["form"]["phone"].value;
        var phoneno =  /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;        

          if (patient == "new") {
                if(first_name=='')
                    {
                        alert("First name must be entered");
                        return false;
                    }
                    
                    if(last_name=='')
                    {
                        alert("Last name must be entered");
                        return false;
                    }
                    
                     if(phone.match(phoneno)==null)
                    {
                            alert("Valid Phone number required");
                            return false;
                        }
    
}


        if (doctor == "") {
            alert("Doctor must be selected");
            return false;
        }
        if (patient == "") {
            alert("Patient must be selected");
            return false;
        }
                if (time == "") {
            alert("Time must be selected");
            return false;
        }


//        alert('here')
        $('#btnSave').text('saving...'); //change button text
//        $('#btnSave').attr('disabled',true); //set button disable
        if(save_method == 'update') {
            url = "<?php echo site_url('appointment/update_appointment')?>";
        } else {
            url = "<?php echo site_url('appointment/book_appointment')?>";
        }

//alert(url);
//        alert(url);
        var start = $("#date").val();
        var time = $("#time").val();
        var formData = new FormData($('#form')[0]);
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
//            data: $('#form').serialize(),
            success: function(data)
            {
//                alert(data);
            if(save_method=='update')
            {
                $('#modal_form').modal('hide');

//                alert(data);
                location.reload();

            }
            else
            {
                window.location = '<?php echo  base_url(); ?>payment/generatebill/'+data
            }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });

    }

</script>
<style>

    /*body {*/
        /*margin-top: 40px;*/
        /*text-align: center;*/
        /*font-size: 14px;*/
        /*font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;*/

    /*}*/

    /*#calendar {*/
        /*width: 900px;*/
        /*margin: 0 auto;*/
    /*}*/

</style>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
			<div class="row">
				<div class='col-md-4 col-sm-4'>
            <h2>Appointment</h2>
            <small class="text-muted">Doctor Appointment Calender</small>
			</div>
				<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>">Go to Dashboard</a></div>
				<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>appointment">Add New appointment  <i class="fa fa-plus"></i></a> </div>
			</div>
			<div class="row">
            <?php if(!empty($this->session->flashdata('success'))) {?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>
            <?php if(!empty($this->session->flashdata('del'))) {?>
                <div class="alert alert-warning">
                    <?php echo $this->session->flashdata('del'); ?>
                </div>
            <?php } ?>

            <?php if(!empty($this->session->flashdata('error'))) {?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
		</div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> Appointment</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive-m">


<!--                            <div style="text-align: center">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#form_modal"><strong><i class="fa fa-calendar" aria-hidden="true"></i> Book Now</strong></button>
                            </div>
-->

                            <div id='calendar'></div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div id="form_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Book Appointment</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" id="form">
                    <fieldset>

                        <input type="hidden" value="" name="appointment_id"/>


<!--                        <div class="form-group" id="select_time" style="display: none">-->
<!--                            <label class="col-md-4 control-label" for="password">Your Appointment Time is:</label>-->
<!--                            <div class="col-md-8">-->
<!--                                <input type="text" id="time_select" name="time_select" class="form-control" readonly/>-->
<!--                            </div>-->
<!--                        </div>-->


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fname">Select Doctor</label>
                            <div class="col-md-8">
                                <div class="form-line">
                                <select name="doctor_id" class="form-control" id="doctor_id" required>
                                    <option value="">Select Doctor</option>
                                    <?php foreach ($doctors as $doctor): ?>
                                        <option value="<?php echo $doctor['id']; ?>"><?php echo $doctor['first_name'].' '.$doctor['last_name']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                                    </div>
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="lname">Select Patient</label>
                            <div class="col-md-8">
                                <div class="form-line">
                                <select name="patient_id"   data-live-search="true" data-live-search-style="startsWith" class="form-control" id="patient_id" onchange="display_patient(this.value)" required>
                                    <option value="">Select Patient</option>
                                    <option value="new">New Patient </option>
                                    <?php foreach ($patients as $patient): ?>
                                        <option value="<?php echo $patient['id']; ?>"><?php echo $patient['first_name'].' '.$patient['last_name']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                                </div>    
                            </div>
                        </div>


                        <div id="patient_detail" style="display: none; margin-top: 10px" class="card" >
                            <div class="form-group" >
                                <label class="col-md-2 control-label" for="password">First Name</label>
                                <div class="col-md-4">
                                    <div class="form-line">
                                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" required />
                                    <div id="err_fname" style="color:red"></div>
                                    </div>
                            </div>

                                <label class="col-md-2 control-label" for="password">Last Name</label>
                                <div class="col-md-4">
                                    <div class="form-line">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required />
                                    <div id="err_lname" style="color:red"></div>
                                    </div>
                                    </div>
                            </div>
                        
                            <div class="form-group" >
                                <label class="col-md-2 control-label" for="password">Address</label>
                                <div class="col-md-4">
                                    <div class="form-line">
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter address"" />                                </div>
                                </div>
                                      
                                <label class="col-md-2 control-label" for="password">Phone No</label>
                                <div class="col-md-4">
                                    <div class="form-line">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone No" />                            </div>
                                    <div id="err_phone" style="color:red"></div>
                                </div>
                              </div>  
                            
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Appointment Date</label>
                            <div class="col-md-8">
                                <div class="form-line">
                                <input id="date" name="appointment_book_date" type="date"  class="form-control input-md" required="" onchange="return change_date(this.value);">
                                </div>
                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group" id="appointment_time">
                            <label class="col-md-4 control-label" for="password">Select Time</label>
                            <div class="col-md-8">
                                <div class="form-line">
                   <select  class="form-control"  id="time" name="time" onchange="change_time();">
                       <option value="">Select Appointment time</option>
                    
                   </select>
                                </div>

                            </div>
                        </div>

                        <!-- Button (Double) -->


                        <div class="form-group" id="description" >
                            <label class="col-md-4 control-label" for="password" >Description</label>
                            <div class="col-md-8">
                                <div class="form-line">
                                <textarea name="description" class="form-control" placeholder="Description here"></textarea>
                                </div>
                                </div>
                        </div>

                        

                        <div class="form-group" id="edit" style="display: none">
                            <label class="col-md-4 control-label" for="password">Status</label>
                            <div class="col-md-8">
                                <select name="status" class="form-control" id="status">
                                    <option value="new">New</option>
                                    <option value="rebooked">Rebooked</option>
                                    <option value="cancelled">Cancelled</option>
                                <option value="used">Used</option>
                                </select>
                            </div>
                        </div>
      </div>

            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Book</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </fieldset>
                </form>

            </div>
        </div>

    </div>

</div>



</div>

<script>
 
    function display_patient(val) {
        if(val=='new')
        {
            document.getElementById('patient_detail').style.display = 'block';
        }
        else
        {
            document.getElementById('patient_detail').style.display = 'none';
        }
        
    }

    $(document).on('change','#doctor_id',function(){
        var doctor_id = document.getElementById("doctor_id").value;
        var val = document.getElementById("date").value;

        var select_time = document.getElementById("time_select").value;
        var input = val;
        var date = new Date(input).getUTCDay();
        var weekday = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        var day = weekday[date];

        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>appointment/get_time',
            data: {
                select_time:select_time,
                doctor_id: doctor_id,
                day:day
            },
            success: function (response) {
//                alert(response);
                $('#time').html(response);
            }
        });

    });

    function doctor(doctor_id,val,total_time) {
        var input = val;
        var date = new Date(input).getUTCDay();
        var weekday = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        var day = weekday[date];
//        alert(day);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>appointment/get_time',
            data: {
                doctor_id: doctor_id,
                day:day,
                total_time:total_time
            },
            success: function (response) {
//                 alert(response);
document.getElementById("time").innerHTML = response;           
            }
        });
    }


    function change_date(val) {

        var doctor_id = document.getElementById("doctor_id").value;
//        alert(doctor_id);
        var input = val;
        var date = new Date(input).getUTCDay();

        var weekday = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
           var day = weekday[date];

        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>appointment/get_time',
            data: {
                doctor_id: doctor_id,
                day:day
            },
            success: function (response) {
                $('[name="status"]').val('rebooked');
                $( '#time' ).html(response);
//            alert(response)

            }
        });
    }

    function change_time() {
        $('[name="status"]').val('rebooked');

    }

</script>