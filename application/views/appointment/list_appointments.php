<style>
    .green {
        color: #33cc66;
    }

    .red {
        color: #F44336;
    }

</style>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
			<div class="row">
				<div class='col-md-4 col-sm-4'>
            <h2>Today's Appointment &nbsp; &nbsp; <button class="btn btn-primary" onClick="window.location.reload()">Refresh page</button></h2>
            <small class="text-muted">List of Today's Appointment</small>
			</div>
				<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>">Go to Dashboard</a></div>
				<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>appointment">Add New appointment  <i class="fa fa-plus"></i></a> </div>
			</div>
			<div class="row">
            <?php if (!empty($this->session->flashdata('success'))) { ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>
            <?php if (!empty($this->session->flashdata('del'))) { ?>
                <div class="alert alert-warning">
                    <?php echo $this->session->flashdata('del'); ?>
                </div>
            <?php } ?>

            <?php if (!empty($this->session->flashdata('error'))) { ?>
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
                        <h2>Clinic products</h2>
                        <!--                            <ul class="header-dropdown m-r--5">
                                                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="javascript:void(0);">Action</a></li>
                                                                <li><a href="javascript:void(0);">Another action</a></li>
                                                                <li><a href="javascript:void(0);">Something else here</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>-->
                    </div>

                    <?php

                    ?>
                    <div class="body">
                        <div class="table-responsive-m">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Patient ID</th>
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php


                                if (count($todayappointments)):
                                    $i = 0;
                                    foreach ($todayappointments as $app): $i++;
                                        ?>
                                        <?php
                                        $amount = $this->patient_model->get_patient_payment($app['patient_id']);
                                        ?>


                                        <tr <?php if ($amount > 0): ?>style="background-color: #f2dede;" <?php endif; ?>>
                                            <td><?php echo $i; ?></td>
                                            
                                            <td><?= $app['patient_id']; ?></td>
                                            <td>
                                                <?php $patient = $this->patient_model->get_patient_by_id($app['patient_id']);?>
						<?php echo $patient->first_name . ' ' . $patient->last_name; ?> <br>
				<a href="<?php echo base_url();?>patient/patient_profile/<?php echo $patient->id;?>" class="edit">
                                                <?php if (!empty($patient->photo)) { ?>
					<img src="<?php echo base_url();?>assets/upload/patient_img/<?php echo $patient->photo;?>" width="80"height="80"><?php }else{ ?><img src="<?php echo base_url();?>assets/upload/patient_img/avatar.png" width="80"height="80"><?php } ?></a></td>
                                            <td>
                                                <?php $doctor = $this->doctor_model->get_doctor_by_id($app['doctor_id']);
                                                echo $doctor->first_name . ' ' . $doctor->last_name;
                                                ?></td>
                                            <td><?php echo $app['start_time'] . ' - ' . $app['end_time']; ?></td>
                                            <td><?php echo $app['status']; ?></td>
                                            <td>


                                                <?php
                                                $vitals = $this->patient_model->get_vital_by_appid($app['id'],$app['patient_id']);
                                                if (!empty($vitals)) { ?>
                                                   <!-- <a href="<?php echo base_url(); ?>vital/edit_vital/<?php echo $app['patient_id']; ?>/<?php echo $app['id']; ?>">
                                                        <small>[Edit vital <i class="fa fa-pencil-square-o"></i> ]
                                                        </small>
                                                    </a> &nbsp; &nbsp;
                                                    <?php //if (($this->session->userdata['loggedin']['dept_id'])==1) { ?>
                                                    &nbsp; &nbsp;
                                                    <a href="<?php echo base_url(); ?>vital/delete_vital/<?php echo $app['patient_id']; ?>"
                                                       onclick="return confirm('Are you sure want to delete this vital?')">
                                                        <small>[Delete vital <i class="fa fa-trash-o"></i>]</small>
                                                    </a> &nbsp; &nbsp;-->
                                                    &nbsp; &nbsp;
                                                    <a href="#"
                                                       onclick="view_details(<?php echo $app['id']; ?>,<?php echo $app['patient_id'] ?>)">
                                                        <small>[View Details <i class="fa fa-eye"></i> ]</small>
                                                    </a> &nbsp; &nbsp;
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url(); ?>vital/create_vital/<?php echo $app['patient_id']; ?>/<?php echo $app['id']; ?>">
                                                        <small> [Add vital <i class="fa fa-plus"></i> ]</small>
                                                    </a> &nbsp; &nbsp;
                                                <?php } ?>

                                                <a href="#"
                                                   onclick="add_visit(<?php echo $app['patient_id'] ?>,<?php echo $app['id']; ?>)"><small>[Add Visit Details] </small></a> &nbsp; &nbsp;
                                                <!--<a><small>[Buy Medicine]</small></a>-->

                                                <br>
                                                <ul style="list-style: none;">


                                                    <?php
                                                    $visits = $this->patient_model->get_visit_by_id($app['id']);


                                                    if (!empty($visits)) {
                                                        foreach ($visits as $visit):

                                                            ?>
                                                            <li style="float: left; padding-left: 5px;">
                                                                <a target="_blank"
                                                                   href="<?php echo base_url(); ?>assets/upload/visit/<?php echo $visit['file_chosen']; ?>"><i class="fa fa-file fa-lg"></i></a> &nbsp; <?php echo $visit['file_chosen']; ?>
                                                            </li>

                                                        <?php endforeach;
                                                    }
                                                    ?>

                                                </ul>


                                            </td>
                                            </td>

                                        </tr>
                                    <?php endforeach;
                                    ?>
                                <?php else: ?>

                                    <tr>
                                        <td colspan="6">No Data Found</td>
                                    </tr>
                                    <?php
                                endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div style="height:50px;"></div>

<style>
    .form-group input[type=file] {
        position: relative;
        opacity: 1;
    }
</style>

<div class="modal fade" id="vital_detail" role="dialog">
    <div class="modal-dialog-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" style="text-align: center"><a href="#" id="btnPrint"><i class="fa fa-print"></i></a>  </h3>
            </div>
            <div id="printThis">


                <div class="modal-body form">

                    <div id="view_details"></div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">Upload File</h3>
            </div>
            <div class="modal-body form">
                <form id="form" enctype="multipart/form-data" class="form-horizontal"
                ">
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
<!-- End Bootstrap modal -->

<script>
    document.getElementById("btnPrint").onclick = function () {
//        alert('here');
        printElement(document.getElementById("printThis"));
    }


    function printElement(elem) {
//        alert('here');
        var domClone = elem.cloneNode(true);

        var $printSection = document.getElementById("printSection");

        if (!$printSection) {
            var $printSection = document.createElement("div");
            $printSection.id = "printSection";
            document.body.appendChild($printSection);
        }

        $printSection.innerHTML = "";
        $printSection.appendChild(domClone);
        window.print();
    }


    function view_details(id,patient_id) {
        $('#vital_detail').modal('show'); // show bootstrap modal
//        $('.modal-title').text('View All Documents'); // Set Title to Bootstrap modal title
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>vital/patient_vital_details_appid',
            data: {
                patient_id: patient_id,
                app_id: id,
            },
            success: function (response) {
//                alert(response);
                document.getElementById("view_details").innerHTML = response;
            }
        });

    }

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