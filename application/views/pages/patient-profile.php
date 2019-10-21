<section class="content profile-page">
    <div class="container-fluid">
<!--        <div class="block-header">
            <h2>Patient Profile</h2>
            <small class="text-muted">Welcome to <?php echo $title;?> Management System</small>
        </div>-->
		
		<div class="block-header noprint">
			<div class="row clearfix">
			<div class="col-md-4 col-sm-4">
            <h2>Patient's Ledger</h2>
            <small class="text-muted">View patient Ledger</small>
			</div>
			<div class='col-md-2 col-sm-4'><a href="<?php echo base_url();?>">Go to Dashboard</a></div>
			<div class='col-md-2 col-sm-4'><a href="<?php echo base_url();?>patient">Go to all patients </a> </div>
                        			<div class='col-md-2 col-sm-4'><a href="<?php echo base_url();?>appointment/index/<?php echo $patient->id;?>">Add Appointment </a> </div>
            </div>
        </div>
		
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class=" card patient-profile">
                    <?php if ($patient->photo) { ?>
                        <img src="<?php echo base_url(); ?>assets/upload/patient_img/<?php echo $patient->photo; ?>"
                             class="img-responsive" alt="<?php echo $patient->first_name; ?>" width="300" height="200" style="height: 250px!important;">
                    <?php } else { ?>
                        <img src="<?php echo base_url(); ?>assets/upload/patient_img/avatar.png" class="img-responsive"
                             alt="<?php echo $patient->first_name; ?>">
                    <?php } ?>

                    <br>
                    <!-- <a style="text-decoration: none">
                        <span style="text-align:center" class=" label label-success">
                            <i class="fa fa-envelope fa-lg">Send SMS</i>
                        </span>						
                    </a> &nbsp; &nbsp; &nbsp; -->
					<a href="<?php echo base_url();?>patient/add_patient/<?php echo $patient->id;?>"> Edit profile <i class="fa fa-edit"></i></a>
                       <a href="<?php echo base_url(); ?>patient/upload_photo/<?php echo $patient->id; ?>" style="margin-left:5px;"> 
                        <span style="text-align:center" class=" label label-success">          
                            Take Picture <i class="fa fa-camera"></i>
                        </span>  
                    </a>
                </div>

                <div class="card">
                    <div class="header">
                        <h2>About Patient</h2>
                    </div>
                    <div class="body">

                        <p><strong>Name : </strong> <?php echo $patient->first_name . '  ' . $patient->last_name; ?></p>
                        <p><strong>Patient system ID : </strong> <?php echo $patient->id; ?></p>
              
                        <?php if ($patient->email != '') { ?>

                            <p><strong>Email ID : </strong> <?php echo $patient->email; ?></p>
                        <?php } ?>
                        <?php if ($patient->age != '' && $patient->age !=0) { ?>

                            <p><strong>Age : </strong> <?php echo $patient->age; ?></p>
                        <?php } ?>
                        <?php if ($patient->dob != '0000-00-00') { ?>

                            <p><strong>DOB : </strong><?php echo $patient->dob; ?></p>
                        <?php } ?>
                        <?php if ($patient->spouse_name != '') { ?>

                            <p><strong>Spouse Name : </strong><?php echo $patient->spouse_name; ?></p>
                        <?php } ?>


                        <p><strong>Phone : </strong> <?php echo $patient->phone; ?></p>
                        <hr>
                        <strong>Address</strong>
                        <address><?php echo $patient->address; ?></address>
                        <hr>
                        <p><strong>Registered Date : </strong><?php echo $patient->register_date; ?></p>

                    </div>
                
                				<h3> Spouse Details </h3> <br>

						<?php if ($patient->spouse_photo) { ?>
                        <img src="<?php echo base_url(); ?>assets/upload/patient_img/<?php echo $patient->spouse_photo; ?>"
                             class="/*img-responsive*/" alt="<?php echo $patient->spouse_name; ?>" width="300" height="200">
                    <?php } else { ?>
                        <img src="<?php echo base_url(); ?>assets/upload/patient_img/avatar.png" class="img-responsive"
                             alt="<?php echo $patient->spouse_name; ?>">
                    <?php } ?>

						<?php if ($patient->spouse_name != '') { ?>
                            <p><strong>Spouse Name : </strong><?php echo $patient->spouse_name; ?></p>
                        <?php } ?>
						<?php if ($patient->spouse_phone != '') { ?>
                            <p><strong>Spouse Phone : </strong><?php echo $patient->spouse_phone; ?></p>
                        <?php } ?>
                            		<?php if ($patient->age != '') { ?>
                            <p><strong>Spouse Age : </strong><?php echo $patient->spouse_age; ?></p>
                        <?php } ?>
	
                
                
 						<?php if(!empty($patient_files)){ if(count($patient_files)>0){
							echo '<h3> Patient Docments </h3> <br>';
							foreach($patient_files as $pfile): ?>
			<a href="<?php echo base_url();?>assets/upload/patient_documents/<?php echo $pfile['file'];?>" target="_blank">
								<?php echo $pfile['file'] . ' <br> ' ;?>
		</a> <!--&nbsp; &nbsp; &nbsp; <a class="red" href="<?php echo base_url();?>patient/delete_file/<?php echo $pfile['id'];?>" onclick="return confirm('Are you sure want to delete this file?')">[Delete]</a><br><br>--> <br>
							<?php endforeach; } } ?>
					</div>
                
                </div>

 
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#report" data-toggle="tab"
                                                                      aria-expanded="false">Overview</a></li>
                            <li role="presentation" class=""><a href="#timeline" data-toggle="tab" aria-expanded="true">Visit
                                    History</a></li>
                            <!-- <li role="presentation"><a href="#report-chart" data-toggle="tab" aria-expanded="true">Patient Service/product ledger details</a></li> -->

                            <!--<li role="presentation"><a href="#pharmacy-chart" data-toggle="tab" aria-expanded="true"> Pharmacy Billing
                                    Details</a></li>--->

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade" id="report-chart">

    <?php //$this->load->view('ledger/patient_ledger'); ?>

                                <div id="real_time_chart" class="flot-chart"></div>
                            </div>



                            <div role="tabpanel" class="tab-pane fade" id="pharmacy-chart">

    <?php //$this->load->view('ledger/view_patient_product'); ?>

                                <div id="real_time_chart" class="flot-chart"></div>
                            </div>



                            <div role="tabpanel" class="tab-pane fade in active" id="report">
                                <div class="wrap-reset">
                                    <div class="mypost-list">
                                        <div class="post-box">
                                            <p><?php echo $patient->remark; ?></p>
                                        </div>
                                        <hr>
		
                                        <h4>Past Visit History</h4>
                                        <ul class="dis">
                                            <?php
                                            $i = 0;
                                            if(count($appointments)):
                                            foreach ($appointments as $app):
                                                $i++;
                                                ?>

                                                <li >
                                                    <?php
                                                    $nameOfDay = date('l', strtotime($app['date']));
                                                    echo $nameOfDay . ' ' . $app['date'] . ' ' . $app['start_time']; ?>
                                                    with
                                                    <?php
                                                     $ci =& get_instance();
                                                     $ci->load->model('doctor_model','doctor');
                                                    $doctor = $ci->doctor->get_doctor_by_id($app['doctor_id']);
                                                    echo $doctor->first_name . ' ' . $doctor->last_name;
                                                    ?></li>


                                                
                                                <?php
                                            endforeach;
                                            else:
                                                echo "No Visit History Found";
                                            endif;

                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="timeline">
                                <div class="timeline-body">
                                    <div class="timeline m-border">

								<!--<div class="timeline-item">
									<div class="item-content">
										<div class="text-small">Just now</div>
										<p>Discharge.</p>
									</div>
								</div>-->
                                        <?php
                                        $i = 0;
                                        if(count($appointments)):
                                        foreach ($appointments as $app):
                                        $i++;
                                        ?>

                                        <div class="timeline-item  <?php if ($i % 2 == 0): echo 'border-info'; else: echo 'border-warning'; endif; ?>">
                                            <div class="item-content">

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <?php echo $app['date'] . ' ' . $app['start_time']; ?>
                                                        </div>
                                                        <div class="pull-right">
                                    
<a href="#"
                                                   onclick="add_visit(<?php echo $patient->id; ?>,<?php echo $app['id']; ?>)"><small>[Add Visit Files]</small></a>

                                                            
                                                        </div>
                                                        
                                                        &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
                                                        Appointment with <strong><?php
                                                         $ci =& get_instance();
                                                         $ci->load->model('doctor_model','doctor');
                                                            $doctor = $ci->doctor->get_doctor_by_id($app['doctor_id']);
                                                            echo $doctor->first_name . ' ' . $doctor->last_name; ?></strong>
                                                    </div>
                                                    <div class="panel-body">
                                                        <h5>Vital Sign </h5>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                         <div class="row" >
        <div class="col-sm-6 col-sm-offset-1" >
                   <?php
                   
                   // $patient_vitals=  $this->vital->get_vital_by_patid($patient->id,$app['id']);
                   $ci =& get_instance();
                   $ci->load->model('vital_model','vital');
                     $patient_vitals=  $ci->vital->get_vital_by_appid($app['id']);
                   
                   
                   if (count($patient_vitals)>0){ ?>
         
            <h4 class="panel-title" style="font-size: 12px"><strong>Vital Signs </strong></h4>
                    <div class="table">
                       
                        
                        
                        <table style="width:100%">							
							
                            <tbody>                            
                                <tr>
								<?php
                                                                
                                                                
                                                               $vitalshere=   $this->vital->get_vital_details_by_id( $patient_vitals[0]['id']);
                                                                
                                                                $i=0; $count = count($vitalshere); foreach($vitalshere as $vrow): $i++;if ($vrow['value']=='') continue;  ?>
                                    <td style="text-align:center;font-size:11px;" ><strong><?php echo $vrow['name'];?></strong><br><?php echo $vrow['value'];?></td>
								<?php if($i==$count)break; endforeach; ?>
                                </tr>
                          
							</tbody>
                        </table>
                        
                        
                        
                        
                        
                      				

                    </div>
         
            <?php } ?>
             
                            <?php 
                          
                            if(!empty($vital->remark)) { echo '<strong>Note : </strong>'. ' ' . $vital->remark .' '; }?>
                            
                       
                </div>
            </div>	
                                                        
                                                        
                                                        
                                                        <!--<table class="table table-condensed">

                                                            <?php
                                                            
                                                            $i = 0;
                                                         
                                                            foreach ($vitals as $vrow):
                                                                
                                                                echo "here";
                                                                print_r($vrow);
                                                                echo "end";
                                                                ?>
                                                                <th><?php echo $vrow['name']; ?></th>
                                                            <?php endforeach; ?>


                                                            <tbody>


                                                            <tr>
                                                                <?php
                                                                $i = 0;
                                                                foreach ($vitals as $vrow): ?>

                                                                    <td><?php echo $vrow['value']; ?></td>
                                                                <?php endforeach; ?>

                                                            </tr>

                                                            <tr>
                                                                <td><strong>Remarks</strong></td>
                                                                <td><?php if (!empty($vital->remark)) {
                                                                        echo $vital->remark;
                                                                    } ?></td>


                                                            </tr>
                                                            </tbody>
                                                        </table>-->
                        <ul style="list-style: none;">

                          
                                                    <?php
                                                    $visits = $this->patient->get_visit_by_id($app['id']);


                                                    if (!empty($visits)) {
                                                        ?>
                              <h5>Uploaded Document:</h5>
                            
                            <?php 
                                                        foreach ($visits as $visit):

                                                            ?>
                                                            <li style="float: left; padding-left: 5px;">
                                                                <a target="_blank"
                                                                   href="<?php echo base_url(); ?>assets/upload/visit/<?php echo $visit['file_chosen']; ?>"><i class="fa fa-file-o"></i><?php echo $visit['file_chosen']; ?></a>
                                                            </li>

                                                        <?php endforeach;
                                                    }
                                                    ?>

                                                </ul>

                                                    </div>
                                                </div>


                                            </div>
                                            <?php endforeach;
                                            else:
                                            echo "No Visit Founds";
                                            endif;
                                            ?>
                                        </div>


                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

				            </div>
        </div>
    </div>
    </div>
</section>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">Upload File</h3>
            </div>
            <div class="modal-body form">
                <form id="form" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" value="" name="appid" id="appid"/>
                <input type="hidden" value="" id="patient_id" name="patient_id"/>
                <div class="form-body">
                    <div class="form-group files" style="border: 1px dotted grey">
                        <label>Upload Your File </label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>

 function add_visit(patient_id, appid) {
        $('#modal_form').modal('show'); // show bootstrap modal
        $('[name="appid"]').val(appid);
        $('[name="patient_id"]').val(patient_id);
    }
    
    
    
    function save() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable
        var url;

        url = "<?php echo site_url('patient/save_visit')?>";
        var formData = new FormData($('#form')[0]);
        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
//            data: $('#form').serialize(),
            success: function (data) {
//               alert(data);
                //if success close modal and reload ajax table
                $('#modal_form').modal('hide');
                location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });

    }
</script>