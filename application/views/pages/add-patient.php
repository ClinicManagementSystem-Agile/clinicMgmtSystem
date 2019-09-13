<style> 
.body {margin:auto 5px;}
textarea.form-control {border: solid #ccc 1px !important;}	
</style>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
			<div class="col-md-4 col-sm-4">
            <h2><?php echo (!empty($patient)?"Update":"Add") ?> Patient</h2>
            <small class="text-muted">Welcome to Clinic</small>
			</div>
			<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>">Go to Dashboard</a></div>
			<div class="col-md-4 col-sm-4"><a href="<?php echo base_url();?>patient">View all patients</a></div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Basic Information <small>add patient information<span class="err"> *required field: </span></small>  </h2>                       
                    </div>
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
						
			<?php $attr = array('name'=>'myform', 'class'=>'form-horizontal');
			$id = NULL;
		echo form_open_multipart('patient/save_patient/"'.$id.'"', $attr);?>
			<?php if (!empty($patient->id)){ ?>		
				<input type="hidden" name="id" value="<?php echo $patient->id; ?>">
			<?php } ?>				
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line"><label for="first_name"> First Name: <span style="color:red; font-size: 20px; "> * </span> </label>
	<input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" value="<?php if(!empty($patient->first_name)) {echo $patient->first_name;} else {echo set_value('first_name');}?>" required />
                                    </div>
			<div class="err"><?php echo form_error('first_name');?></div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group"> <label for="last_name"> Last Name: <span style="color:red; font-size: 20px; "> * </span> </label>
                                    <div class="form-line">
		<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" 
value="<?php if(!empty($patient->last_name)) {echo $patient->last_name;} else {echo set_value('last_name');}?>" required />
                                    </div>
						<div class="err"><?php echo form_error('last_name');?></div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group"> <label for="phone"> Phone No.:  <span style="color:red; font-size: 20px; "> * </span></label>
                                    <div class="form-line">
	<input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone No." 
	value="<?php if(!empty($patient->phone)) {echo $patient->phone;} else {echo set_value('phone');}?>" onchange="check_number(this.value);" required />
                                    </div>
				<div class="mob" id="mob" style="color:red;"><?php echo form_error('phone');?></div>
                                </div>
                            </div>
							
	<div class="col-sm-4 col-xs-12">
                                <div class="form-group drop-custum"> <label for="gender"> Gender : <span style="color:red; font-size: 20px; "> * </span> </label>
                                    <select name="gender" class="form-control show-tick" id="gender" required>
<option value="" <?php if (empty($patient)): echo set_select('gender', ''); endif; ?>>Select Gender</option>

		<option value="male" <?php if (isset($patient) && $patient->gender=='male'): echo 'selected'; else: echo set_select('gender', 'male'); endif; ?>>Male</option>	
		
		<option value="female" <?php if (isset($patient) && $patient->gender=='female'): echo 'selected'; else: echo set_select('gender', 'female'); endif; ?>>Female</option>
		
                                    </select>
                                </div>
					<div class="err"> <?php echo form_error('gender');?> </div>
                            </div>
                            
							<div class="col-sm-4 col-xs-12">
                                <div class="form-group"> <label for="spouse_name"> Spouse Name: </label>
                                    <div class="form-line">
		<input type="text" name="spouse_name" id="spouse_name" class="form-control" placeholder="Spouse Name" 
value="<?php if(!empty($patient->spouse_name)) {echo $patient->spouse_name;} else {echo set_value('spouse_name');}?>" />
                                    </div>
						<div class="err"><?php echo form_error('spouse_name');?></div>
                                </div>
                            </div>
							
							<div class="col-sm-4 col-xs-12">
                                <div class="form-group"> <label for="spouse_phone"> Spouse Phone No.: </label>
                                    <div class="form-line">
	<input type="tel" name="spouse_phone" id="spouse_phone" class="form-control" placeholder="Spouse Phone No." 
	value="<?php if(!empty($patient->spouse_phone)) {echo $patient->spouse_phone;} else {echo set_value('spouse_phone');}?>" />
                                    </div>
				<div class="err"><?php echo form_error('spouse_phone');?></div>
                                </div>
                            </div>
                        
							
						
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group"> <label for="register_date"> Spouse Age: </label>
					<div class="form-line">
	<input type="number" name="spouse_age" class="datepicker form-control" placeholder="Spouse Age" 
value="<?php if(!empty($patient->spouse_age)) {echo $patient->spouse_age;} else {echo set_value('spouse_age');}?>" id="register_date" />
                                    </div>
					<div class="err"><?php echo form_error('spouse_age');?></div>
                                </div>
                            </div>
							
							
							<div class="col-sm-4 col-xs-12">
                                <div class="form-group"> <label for="address">Home Address :</label>
                                    <div class="form-line">
	<input type="text" name="address" id="address" class="form-control" placeholder="Enter address" 
		   value="<?php if(!empty($patient->address)) {echo $patient->address;} else {echo set_value('address');}?>" />
                                    </div>
									<div class="err"> <?php echo form_error('address'); ?></div>
                                </div>
                            </div>
							
                            <!--</div>-->
						
							<div class="col-sm-4 col-xs-12">
                                <div class="form-group"> <label for="dob"> Date of Birth: </label>
                                    <div class="form-line">
		<input type="date" name="dob" class="datepicker form-control" placeholder="Date of Birth" 
value="<?php if(!empty($patient->dob)) {echo $patient->dob;} else {echo set_value('dob');}?>"  id="dob" />
                                    </div>
					<div class="err"><?php echo form_error('dob');?></div>
                                </div>
                            </div>

                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group"> <label for="dob"> Age: </label>
                                <div class="form-line">
                                    <input type="text" name="age" class="form-control" placeholder="Age"
                                           value="<?php if(!empty($patient->age)) {echo $patient->age;} else {echo set_value('age');}?>"  id="age" />
                                </div>
                                <div class="err"><?php echo form_error('age');?></div>
                            </div>
                        </div>


                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group"> <label for="email"> Email Address: </label>
                                    <div class="form-line">
	<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email address" 
		   value="<?php if(!empty($patient->email)) {echo $patient->email;} else {echo set_value('email');}?>" />
                                    </div>
									<div class="err"> <?php echo form_error('email'); ?> </div>
                                </div>
                            </div>
                          <!--   <div class="col-sm-4 col-xs-12">
                                <div class="form-group"> <label for="vat_no">Patient Old Id (if exist): </label>
                                    <div class="form-line">
	<input type="number" id="vat_no" name="vat_no" id="vat_no"  max="619" class="form-control" placeholder="Enter ID if exist" 
		   value="<?php if(!empty($patient->id)) {echo $patient->id;} else {echo set_value('vat_no');}?>" <?php if(!empty($patient)): echo 'readonly'; endif; ?>/>
                                    </div>

                                    <div class="err_id" id="err_id" style="color:red"> <?php echo form_error('vat_no'); ?> </div>
                                </div>
                            </div> -->
					<div class="col-sm-4 col-xs-12">
						<div class="form-group"> <label for="allergy"> Allergy to anything : </label>
                                    <div class="form-line">
<textarea type="text" id='allergy' name="allergy" class="form-control" placeholder="Allergy to anything? " rows="3"><?php if(!empty($patient->allergy)) {echo $patient->allergy;} else {echo set_value('allergy');}?></textarea>
                                    </div>
				<div class="err"><?php echo form_error('allergy');?> </div>
                                </div>
					</div>
                            

						<div class="col-md-4 col-sm-4 col-xs-12">
							<?php if (!empty($patient->photo)){ ?>
							<input type="hidden" name="old_image" value="<?php echo $patient->photo; ?>">
							<div class="">
								<img src="<?php echo base_url();?>assets/upload/patient_img/<?php echo $patient->photo;?>" width="100" height="100" /><br>&nbsp; &nbsp; &nbsp; <a class="red" href="<?php echo base_url();?>patient/delete_pic/<?php echo $patient->id;?>" onclick="return confirm('Are you sure want to delete picture?')">[Delete]</a>
							</div>
							<?php } else { ?>
		<img src="<?php echo base_url();?>assets/upload/patient_img/avatar.png" width="100" height="100" /><br>	<br>
							<?php } ?>
							<label for="photo">Upload patient photo: </label>
							<input name="photo" type="file" />
							<p style="color:red;"><strong>Note: </strong> Upload image max size 2mb or 2048kb</p>
							<!---<div id="frmFileUpload" class="dropzone">
							<div class="dz-message">
								<div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
								<p>Upload a patient Picture.</p>
							</div>
								<div class="fallback">
									<input name="photo" type="file" />
								</div>
							</div>-->
							<br> <br> <br> 
						</div> 
						<div class="col-md-4 col-sm-4 col-xs-12">
							<?php if (!empty($patient->spouse_photo)){ ?>
							<input type="hidden" name="spouse_image" value="<?php echo $patient->spouse_photo; ?>">
							<div class="">
								<img src="<?php echo base_url();?>assets/upload/patient_img/<?php echo $patient->spouse_photo;?>" width="100" height="100" /><br>&nbsp; &nbsp; &nbsp; <a class="red" href="<?php echo base_url();?>patient/delete_spouse_pic/<?php echo $patient->id;?>" onclick="return confirm('Are you sure want to delete picture?')">[Delete]</a>
							</div>
							<?php } else { ?>
							<img src="<?php echo base_url();?>assets/upload/patient_img/avatar.png" width="100" height="100" /><br>	<br>
							<?php } ?>
							<label for="spouse_photo"> Upload spouse photo: </label>
							<input name="spouse_photo" type="file" />
							<p style="color:red;"><strong>Note: </strong> Upload image max size 2mb or 2048kb</p>
							<br> <br> <br>

                                                        
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
							<?php if(!empty($patient_files)){ if(count($patient_files)>0){ foreach($patient_files as $pfile): ?>
			<a href="<?php echo base_url();?>assets/upload/patient_documents/<?php echo $pfile['file'];?>" target="_blank">
								<?php echo $pfile['file'] . ' <br> ' ;?> 
			</a> &nbsp; &nbsp; &nbsp; <a class="red" href="<?php echo base_url();?>patient/delete_file/<?php echo $pfile['id'];?>" onclick="return confirm('Are you sure want to delete this file?')">[Delete]</a> <br><br>
							<?php endforeach; } } ?>
							<br>
							<label for="file">Upload patient file: </label><br>                            
							<div>							
								<input type="file" name="doc[]" size="20" multiple/>
							</div>
                        </div><br> <br>
						</div>
												
                        <div class="row clearfix">

                            <div class="col-sm-12">
                                <div class="form-group" style="padding-left: 20px;"> <label for="remark"> Other Information: </label>
                                    <div class="form-line">
<textarea type="text" id='remark' name="remark" class="form-control" placeholder="Write other information about patient" rows="5"  cols="90"><?php if(!empty($patient->remark)) {echo $patient->remark;} else {echo set_value('remark');}?></textarea>
                                    </div>
				<div class="err"><?php echo form_error('remark');?> </div>
                                </div>
                            </div>
							 </div>
                            <div class="col-xs-12 clearfix">
			<button type="submit" name="submit" id="submit" class="btn btn-raised g-bg-cyan">Submit</button>
                                <!--<button type="submit" class="btn btn-raised">Cancel</button>-->
                            </div>
                       </div>
<?php echo form_close(); ?>				
                    </div>
                </div>
            </div>
        </div>

</section>

<script>
    function check_number(val){
  url = "<?php echo site_url('patient/checknum') ?>";
                            $.ajax({
                                type: 'post',
                                url: url,
                                data: {
                                    num:val
                                },

                                success: function (response) {
                                    //  alert(response);
                                 
                                   if(response!=null){
                                  
                                    $('#mob' ).html("This number is already used with id: "+response.id+" Name: "+response.first_name);
                               
                                    document.getElementById("submit").disabled = true;
                                    


                                   }else{
                                    
                                     $('#mob' ).html("");
                                     document.getElementById("submit").disabled = false;
                                    
                                          
                                   }
                               }
                                

                            });
}
    $('#vat_no').change(function() {
      var vat_no = $("#vat_no").val();
     if(vat_no!='' && vat_no>619)
         {
            document.getElementById("err_id").innerHTML  = "Number Must be less 619";
           return false;
         }
         else
             {
                 document.getElementById("err_id").innerHTML  = "";
                 return true;
             }
});
    </script>