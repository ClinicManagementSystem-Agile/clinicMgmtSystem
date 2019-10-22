<style>.err {color:red;}</style>
<section class="content">
	<div class="container-fluid">
	<div class="block-header">
			<div class="row clearfix">
			<div class="col-md-4 col-sm-4">
            <h2>Change Password</h2>
            <small class="text-muted">change your password</small>
			</div>
			<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>">Go to Dashboard</a></div>
				<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>user">Go to users</a> </div>
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
		</div>		
		
		<div class="row clearfix">
			<div class="col-sm-12">
			<div class="card">
                        <div class="header">
				<h2>User Management</h2>
			</div>
			<?php
			$attr = array('name' => 'myform', 'class' => 'form');
			echo form_open('user/save_password', $attr);
			?>
				
		<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right"
					   for="page_title">Old Password:</label>

				<div class="col-xs-12 col-sm-9">
					<div class="clearfix">
						<input type="password" id="password" name="old_password"
							   placeholder="Old Password" class="col-xs-12 col-sm-5"  required 
							   value="<?php echo set_value('old_password');?>" />
					</div>
			<div class="err"><?php echo form_error('old_password');?></div>
				</div>
			</div>
				
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right"
					   for="page_title">New Password:</label>

				<div class="col-xs-12 col-sm-9">
					<div class="clearfix">
						<input type="password" id="user_password" name="new_password"
							   placeholder="New Password" class="col-xs-12 col-sm-5"  required 
							   value="<?php echo set_value('new_password');?>" />
					</div>
			<div class="err"><?php echo form_error('new_password');?></div>
				</div>
			</div>
				
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right"
					   for="page_title">Confirm Password:</label>

				<div class="col-xs-12 col-sm-9">
					<div class="clearfix">
						<input type="password" id="cpassword" name="cpassword"
							   placeholder="Confirm Password" class="col-xs-12 col-sm-5"  required 
							   onkeyup="checkPass(); return false;" 
							   value="<?php echo set_value('cpassword');?>" />
				   <span id="confirmMessage" class="confirmMessage"></span>
					</div>
					<div class="err"><?php echo form_error('cpassword');?></div>
				</div>
			</div>
				
			<div class="form-group">
				<div class="col-xs-12 col-sm-4 col-sm-offset-3">
					<label>
						<input type="submit" name="submit" class="btn btn-primary"  value="Change Password">
					</label>
				</div>
			</div>
		
		<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</section>


<script>
function checkPass()
{
//Store the password field objects into variables ...
var pass1 = document.getElementById('user_password');
var pass2 = document.getElementById('cpassword');
//Store the Confimation Message Object ...
var message = document.getElementById('confirmMessage');
//Set the colors we will be using ...
var goodColor = "#66cc66";
var badColor = "#ff6666";
//Compare the values in the password field
//and the confirmation field
if(pass1.value == pass2.value){
//The passwords match.
//Set the color to the good color and inform
//the user that they have entered the correct password
pass2.style.backgroundColor = goodColor;
message.style.color = goodColor;
message.innerHTML = "Passwords Match"
return true;
}else{
//The passwords do not match.
//Set the color to the bad color and
//notify the user.
pass2.style.backgroundColor = badColor;
message.style.color = badColor;
message.innerHTML = "Passwords Do Not Match!"
return false;
}
}
</script>