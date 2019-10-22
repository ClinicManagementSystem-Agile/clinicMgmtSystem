<style>
	.err {color:red;}
</style>
<section class="content">
        <div class="container-fluid">
		<div class="block-header">
			<div class="row clearfix">
			<div class="col-md-4 col-sm-4">
            <h2>Create New User</h2>
            <small class="text-muted">Fill details to create new user</small>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>User Basic Information <small></small> </h2>
                        </div>				
					
			<?php $attr = array('name'=>'myform', 'class'=>'form');
		echo form_open('user/save_user', $attr); ?>
		<?php //if (isset($user->id)){ ?>
				<!--<input type="hidden" name="uid" value="<?php echo $user->id;?>">-->
		<?php //} ?>
	<div class="body">
<?php //if(!empty(validation_errors())) { ?>		
<!--<div class="alert alert-danger"><?php echo validation_errors();?></div>-->
<?php //} ?>
		<div class="row clearfix">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="fname" class="form-control" value="<?php echo set_value('fname'); ?>" placeholder="First Name" required>						
					</div>
				<div class="err"><?php echo form_error('fname');?></div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo set_value('lname'); ?>" required>						
					</div>
				<div class="err"><?php echo form_error('lname');?></div>	
				</div>
			</div>
		</div>
		<div class="row clearfix">
		<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo set_value('address'); ?>" required>						
					</div>
				<div class="err"><?php echo form_error('address');?></div>
				</div>
		</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
				Joined Date <input type="date" name="join_date" class="datepicker form-control" placeholder="Joined Date" value="<?php echo set_value('join_date');?>" required>				
					</div>
				<div class="err"><?php echo form_error('join_date');?></div>	
				</div>
			</div>
<div class="col-sm-3 col-xs-12">
<div class="form-group drop-custum">
	<select class="form-control show-tick" name="department" required>
        <option value=" ">--Select Department--</option>
<?php foreach ($departments as $department): ?>
        <option value="<?php echo $department['id']; ?>" <?php echo set_select('department', $department['id'] ); ?>><?php echo  $department['name'] ;?></option>
        <?php endforeach;  ?>
	</select>
	<div class="err"><?php echo form_error('department');?></div>
</div>
</div>
<div class="col-sm-3 col-xs-12">
<!--<div class="form-group drop-custum">
	<select class="form-control show-tick" name="user_type" required>
		<option value="" <?php echo set_select('user_type', ''); ?>>User Type</option>
		<option value="admin" <?php echo set_select('user_type', 'admin'); ?>>Admin</option>
		<option value="superadmin" <?php echo set_select('user_type', 'superadmin'); ?>>Superadmin</option>
		<option value="staff" <?php echo set_select('user_type', 'staff'); ?>>Staff</option>
		<option value="other" <?php echo set_select('user_type', 'other'); ?>>Other</option>
	</select>
	<div class="err"><?php echo form_error('user_type');?></div>
</div>-->
</div>

			<div class="col-sm-3 col-xs-12">
				<div class="form-group">
					<div class="form-line">
					<input type="text" name="phone" class="form-control" placeholder="Phone" 
					value="<?php echo set_value('phone'); ?>" required>
					</div>
					<div class="err"><?php echo form_error('phone');?></div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
						<input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo set_value('email'); ?>" required>
						<div class="err"><?php echo form_error('email');?></div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo set_value('username'); ?>" required>						
					</div>
				<div class="err"><?php echo form_error('username');?></div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
						<input type="password" name="password" class="form-control" placeholder="password"
			value="<?php echo set_value('password'); ?>" required>				
					</div>
				<div class="err"><?php echo form_error('password');?></div>	
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
						<input type="password" name="cpassword" class="form-control" placeholder="confirm password" 
			value="<?php echo set_value('cpassword'); ?>" required>				
					</div>
					<div class="err"><?php echo form_error('cpassword');?></div>
				</div>
			</div>

<!--<div class="form-group">
<div class="col-xs-12 col-sm-4 col-sm-offset-3">
<label>
<input name="status" type="checkbox" class="ace ace-switch ace-switch-4"
<?php
//if(isset($user->status)){
//	if($user->status == "1"){
//		echo "checked";
//	}
//} ;?> value="1" checked/>
<span class="lbl"> &nbsp; Visibility </span>
</label>
</div>
</div>-->

			<div class="clearfix"></div>
			<br> <br>

			<div class="col-xs-12">
				<button type="submit" name="submit" class="btn btn-raised g-bg-cyan">Submit</button>
				<button type="reset" class="btn btn-raised">Reset</button>
			</div>
		</div>							
	</div>	
		<?php echo form_close();?>					
		</div>
	</div>
</div>           
            
</div>
</section>

