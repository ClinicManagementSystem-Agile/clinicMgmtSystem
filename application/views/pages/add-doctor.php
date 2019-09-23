<!--.form-group .form-control {padding-left:15px !important;}-->
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
				<div class="row">
				<div class='col-md-4 col-sm-4'>
                <h2>Add Doctor</h2>
                <small class="text-muted">Welcome to <?php echo $title;?></small>
				</div>
				<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>">Go to Dashboard</a></div>
				<div class="col-md-4 col-sm-4"><a href="<?php echo base_url();?>/doctor">View all doctors</a></div>
				</div>
            </div>
			
            <div class="row clearfix" style="padding-left:15px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Basic Information <small><span class="err"> *required field: </span></small> </h2>
                        </div>

<?php if(!empty($this->session->flashdata('success'))) {?>
<div class="alert alert-success">
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php } ?>

<?php if(!empty($this->session->flashdata('error'))) {?>
<div class="alert alert-danger">
	<?php echo $this->session->flashdata('error'); ?>
</div>
<?php } ?>
	<h3><?php if(!empty($error)){ echo $error;}?></h3>
			<?php $attr = array('name'=>'myform', 'class'=>'form-horizontal'); //,'id'=>'frmFileUpload'
		echo form_open_multipart('doctor/save_doctor', $attr);?>
	<div class="body">
<div style="color:red;"><?php echo validation_errors();?></div>
<div style="color:red;"><?php if(!empty($error)){ echo $error;}?></div>
		<div class="row clearfix">
			<div class="col-sm-6 col-xs-12">
				<label for="fname">First Name :<span style="color:red; font-size: 20px; "> * </span> </label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="firstname" id="fname" class="form-control" value="<?php echo set_value('firstname');?>" placeholder="First Name" required>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<label for="lname">Last Name :<span style="color:red; font-size: 20px; "> * </span> </label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="lastname" id="lname" class="form-control" placeholder="Last Name" value="<?php echo set_value('lastname');?>" required>
					</div>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-sm-3 col-xs-12">
				<label for="dob"> Date of Birth:</label>
				<div class="form-group">
					<div class="form-line">
						<input type="date" name="dob" id="dob" class="datepicker form-control" placeholder="Date of Birth" value="<?php echo set_value('dob');?>">
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12">
				<label for="gender">Gender :<span style="color:red; font-size: 20px; "> * </span></label>
				<div class="form-group drop-custum">
					<select class="form-control show-tick" name="gender" value="<?php echo set_value('gender');?>" required>
						<option value=""> Gender </option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12">
			<label for="speciality">Doctor's Speciality :<span style="color:red; font-size: 20px; "> * </span></label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="speciality" class="form-control" placeholder="Speciality" value="<?php echo set_value('speciality');?>" required>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12">
				<label for="phone">Phone No. :<span style="color:red; font-size: 20px; "> * </span></label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo set_value('phone');?>" required>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<label for="email">Email Address : </label>
				<div class="form-group">
					<div class="form-line">
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo set_value('email');?>" >
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<label for="address">Home Address :<span style="color:red; font-size: 20px; "> * </span> </label>
				<div class="form-group">
					<div class="form-line">
						<input type="address" name="address" id="address" class="form-control" placeholder="Enter home Address" value="<?php echo set_value('address');?>" required>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<label for="phone">Service Comission Rate(%) :</label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="scr" class="form-control" placeholder="Comission Rate in %" value="<?php echo set_value('scr');?>" required>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<label for="phone">Lab Comission Rate(%) :</label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="lcr" class="form-control" placeholder="Comission Rate in %" value="<?php echo set_value('lcr');?>" required>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<label for="phone">Pharmacy Comission Rate(%) :</label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="pcr" class="form-control" placeholder="Comission Rate in %" value="<?php echo set_value('pcr');?>" required>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<label for="web">Website : </label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="website" id="web" class="form-control" placeholder="Website URL" value="<?php echo set_value('website');?>">
					</div>
				</div>
			</div>



			<div class="col-md-5 col-sm-5 col-xs-12">				
				<div id="frmFileUpload" class="dropzone">
				<div class="dz-message">
						<div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
						<!--<h3>Drop files here or click to upload.</h3>-->
					</div>
					<div class="fallback">
						<input name="dr_photo" type="file" />
					</div>
					<p style="color:red;"><strong>Note: </strong> Upload image max size 2mb or 2048kb</p>
				</div>
			</div>
			<div class="clearfix"></div>



            <div class="row clearfix">
                <div class="col-md-12 col-xs-12">
<!--                    <div class="card">-->
                        <div class="header">
                            <h2>Doctor's Availability <small></small> </h2>


                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6 col-xs-12">
                                    <h5>Available Days</h5>
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                    <h5>From Time</h5>
                                </div>

                                <div class="col-sm-3 col-xs-12">
                                    <h5>To Time</h5>
                                </div>

                            <?php

                            $i=0;
                            foreach ($days as $day): ?>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="available_days[]" value="<?php echo $day['day']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="time" type="time" value="08:00" class="form-control" value="8:30" name="from_time[]" >

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="time" type="time"  class="form-control" value="19:00" name="to_time[]"  >

                                        </div>
                                    </div>
                                </div>
                                <?php
                            $i++;
                            endforeach; ?>
								<br><br>
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-raised g-bg-cyan">Submit</button>
                                    <button type="submit" class="btn btn-raised">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close();?>
<br><br>
	</div>
					</div>
				</div>
            </div>
        </div>
    </section>
