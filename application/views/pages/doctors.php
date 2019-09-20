<section class="content">
    <div class="container-fluid">
        <div class="block-header clearfix">
			<div class='col-md-4 col-sm-4'>
            <h2>All Doctors</h2>
            <small class="text-muted">Welcome to Clinic</small>
		</div>
			<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>">Go to Dashboard</a></div>
		<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>doctor/add_doctor">Add New Doctor  <i class="fa fa-plus"></i></a> </div>
		
<?php if(!empty($this->session->flashdata('success'))) {?>
<div class="alert alert-success">
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php } ?>
<?php if(!empty($this->session->flashdata('delete'))) {?>
<div class="alert alert-info">
	<?php echo $this->session->flashdata('delete'); ?>
</div>
<?php } ?>

<?php if(!empty($this->session->flashdata('error'))) {?>
<div class="alert alert-danger">
	<?php echo $this->session->flashdata('error'); ?>
</div>
<?php } ?>		
        </div> <hr>
		
        <div class="row clearfix">
	<?php if(count($doctors)):
	foreach($doctors as $doctor): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="member-card verified">
<ul class="header-dropdown">
	<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-pencil-square-o"></i></a>
		<ul class="dropdown-menu pull-right">
			<li><a href="<?php echo base_url();?>doctor/edit_doctor/<?php echo $doctor['id'];?>" class=" waves-effect waves-block">Edit</a></li>
			<!-- <li><a href="<?php echo base_url();?>doctor/delete_doctor/<?php echo $doctor['id'];?>" onclick="return confirm('Are you sure want to delete this doctor profie?')" class=" waves-effect waves-block">Delete</a></li> -->
			<!--<li><a href="javascript:void(0);" class=" waves-effect waves-block">Block</a></li>-->
		</ul>
	</li>
</ul>
                            <div class="thumb-xl member-thumb">
				<img src="<?php echo base_url();?>assets/upload/doctor_img/<?php if($doctor['photo']=='')
{echo 'avatar.png';}else {echo $doctor['photo'];} ?>" class="img-circle" width="120" height="120"
	alt="<?php echo $doctor['speciality'];?>">
                                <i class="fa fa-info-circle" title="verified user"></i>
                            </div>

                            <div class="">
                                <h4 class="m-b-5"><?php echo $doctor['first_name'];?></h4>
								<p class="text-muted"><?php echo $doctor['speciality'];?><span> <a href="#" class="text-pink"><?php if($doctor['website']!='') {echo $doctor['website'];} else {echo '<br>';}?></a> </span></p>
                            </div>

                            <p class="text-muted"><?php echo $doctor['address'];?></p>
                            <a href="<?php echo base_url();?>doctor/profile/<?php echo $doctor['id'];?>"  class="btn btn-raised btn-sm">View Profile</a>
                            <a href="send-sms.php"  class="btn btn-raised btn-sm"><i class="fa fa-envelope"></i> Send SMS</a>
                             <a href="<?php echo base_url();?>doctor/doctor_visit_history/<?php echo $doctor['id'].'/?name='.$doctor['first_name']; ?>"  class="btn btn-raised btn-sm"><i class="fa fa-address-card"></i> View Visit History</a>
                            <ul class="social-links list-inline m-t-10">
                                <li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a title="twitter" href="#" ><i class="fa fa-twitter"></i></a></li>
                                <li><a title="instagram" href="3" ><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
	<?php endforeach;
	else:
		echo '<div class="alert alert-info">No Doctor Records. Doctors profile will be uploaded soon.</div>';
		endif;
	?>

        </div>
        <div class="row clearfix">
            <div class="col-xs-12 text-center">
<!--<a href="" class="btn btn-raised g-bg-cyan">Add Doctor</a>-->
            </div>
        </div>
    </div>
</section>

