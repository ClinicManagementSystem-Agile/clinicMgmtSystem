<style rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></style>
<style> .green{color:#33cc66;}.red{color:#F44336;} </style>
<section class="content">
    <div class="container-fluid">
        <div class="block-header noprint">
			<div class="row clearfix">
			<div class="col-md-4 col-sm-4">
            <h2>All patients</h2>
            <small class="text-muted">List of all patients</small>
			</div>
			<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>">Go to Dashboard</a></div>
				<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>patient/add_patient">Add New Patient  <i class="fa fa-plus"></i></a> </div>
            </div>
        </div>
		<div class="row clearfix noprint">
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
			<?php if(!empty($this->session->flashdata('error2'))) {?>
			<div class="alert alert-danger">
			<?php echo $this->session->flashdata('error2'); ?>
			</div>
			<?php } ?>	
		</div>
		
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Clinic Patient List</h2>
                        </div>
                    <div class="body">
                        <div class="table-responsive-m">

                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Spouse Name</th>
                                    <th>Spouse Number</th>
                                    <th>Address</th>
                                   
                                    <th>Joined Date</th>
                                    <th class="noprint">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php if(count($patients)>0) :
                                    foreach ($patients as $patient):
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo base_url();?>patient/patient_profile/<?php echo $patient['id'];?>" class="edit">
                                                <?php echo $patient['id']; ?>
                                                </a>
                                            </td>
                                            <td>
												<?php echo $patient['first_name'].' '.$patient['last_name']; ?><br>
	<a href="<?php echo base_url();?>patient/patient_profile/<?php echo $patient['id'];?>" class="edit">
									<?php if (!empty($patient['photo'])) { ?>
													<img src="<?php echo base_url();?>assets/upload/patient_img/<?php echo $patient['photo'];?>" width="80"height="80"><?php }else{ ?><img src="<?php echo base_url();?>assets/upload/patient_img/avatar.png" width="80"height="80"><?php } ?></a><br>
                                                                                                      
                                                                                                
											</td>
                                            <td><?php echo $patient['phone'] ?></td>
											<td><?php echo $patient['spouse_name']; ?><br>
									<?php if (!empty($patient['spouse_photo'])) { ?>
						<img src="<?php echo base_url();?>assets/upload/patient_img/<?php echo $patient['spouse_photo'];?>" width="80"height="80"><?php }else{ ?><img src="<?php echo base_url();?>assets/upload/patient_img/avatar.png" width="80"height="80"><?php } ?>  
											</td>

                                            <td><?php echo $patient['spouse_phone'] ?></td>
                                            <td><?php echo $patient['address']; ?></td>
<!--<td><?php //$bills = $this->invoice->get_bills_by_id($patient['id']); if(!empty($bills)): ?><a href="<?php //echo  base_url(); ?>payment/bill/<?php //echo $patient['id'];?>">View Bill</a> <?php //else: ?><a href="<?php //echo  base_url(); ?>payment/generatebill/<?php //echo $patient['id']; ?>">Generate Bill</a>
<?php //endif;?> </td>-->

		<td><?php echo date("F j, Y",strtotime($patient['register_date'])); ?></td>
                                            <td class="noprint">
<!--                                                <a href="patient/patient_profile" class="edit"><i class="fa fa-eye fa-lg "></i></a>--><!--  <?php if($this->session->userdata['loggedin']['dept_id']==1){ ?>
<a href="<?php echo base_url();?>patient/delete_patient/<?php echo $patient['id'];?>" class="edit red" onclick="return confirm('Are you sure, want to delete this patient?')"><i class="fa fa-trash-o fa-lg"></i></a> <?php }?> &nbsp; 
&nbsp; -->


                                                <a href="<?php echo base_url();?>patient/add_patient/<?php echo $patient['id'];?>" class="edit green"><i class="fa fa-pencil-square-o fa-lg"></i></a>
												<br> <br>
                                                                                                <?php $ledger = $this->patient->get_patient_ledger_id($patient['id']); 
                                                                                                if(isset($ledger) && $ledger != null){ $ledger_id=$ledger->id; }else { $ledger_id="";}
                                                                                                ?>

                                                                                                  <br> <br>                                                                           
                        <!--   <a href="<?php echo base_url();?>patient/deactivate_patient/<?php echo $patient['id'];?>" onclick="return confirm('Are you sure, want to deactivate this patient?')">
                                    Deactivate Patient</a> -->
                                    <button type="button" class="form-control" onclick="load_model(this.value);" value="<?php echo $patient['id']; ?>" style="color:red;"title="Deactivate Account">Deactivate</button>
                                                                 

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                               
                                <?php endif; ?>

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('#reservation').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                {
                                extend: 'excel',
                                text: 'Export Search Results',
                                className: 'btn btn-default',
                                exportOptions: {
                                columns: 'th:not(:last-child)'
                                }
                                }]
                                });
</script>
<script>
      function load_model(id){
       // alert(id);
       
         $('#myModal').modal();
                                   
                                    $('[name="id"]').val(id);
                                      
                                    
                                   

                                     $('#myModal').modal('show');
      }
    </script>
     <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Deactivate patient</h4>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-md-12">
            <form name="myform" action="<?php echo base_url();?>patient/deactivate_patient">
            <div class="form-group">
                <h2 style="text-align: center;">Reason</h2><br/>
                <input type="hidden" name="id" >
                <textarea name="reason" class="form-control" required=""></textarea>
            </div>
        </div>
       </div>
      </div>
      <div class="modal-footer">
        <span class="pull-left">
         <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </span>
      </div>
  </form>
    </div>

  </div>
</div>

