<style>
	.err {color:red;}
</style>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
			<div class="row clearfix">
			<div class="col-md-4 col-sm-4">
            <h2>Update User</h2>
            <small class="text-muted">Edit user details </small>
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
                            <h2>Update User Information <small></small> </h2>
                        </div>
			<?php $attr = array('name'=>'myform', 'class'=>'form');
		echo form_open('user/update_user', $attr);?>
				<input type="hidden" name="id" value="<?php echo $user->id; ?>">
	<div class="body">
<!--<div class="alert alert-danger"><?php //echo validation_errors();?></div>-->	
		<div class="row clearfix">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="fname" class="form-control" value="<?php if(!empty($user->fname)) {echo $user->fname;}?>" placeholder="First Name" required>
					</div>
				<div class="err"><?php echo form_error('fname');?></div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php if(!empty($user->lname)) {echo $user->lname;}?>" required>
					</div>
			<div class="err"><?php echo form_error('lname');?></div>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			
<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="address" class="form-control" placeholder="Address" value="<?php if(!empty($user->lname)) {echo $user->address;}?>" required>
					</div>
			<div class="err"><?php echo form_error('address');?></div>
				</div>
		</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
				Joined Date <input type="date" name="join_date" class="datepicker form-control" placeholder="Joined Date" value="<?php if(!empty($user->join_date)) {echo $user->join_date;}?>" required>
					</div>
			<div class="err"><?php echo form_error('join_date');?></div>
				</div>
			</div>
			
<div class="col-sm-3 col-xs-12">
<div class="form-group drop-custum">
	<select class="form-control show-tick" name="department" required>
		<option value="" <?php if (empty($user)): echo set_select('department', ''); endif; ?>>Department</option>
	<?php if ($user_data['dept_id'] ==1) { ?>	
		<option value="1" <?php if ( isset($user) && $user->dept_id=='1'): echo 'selected'; else: echo set_select('department', '1'); endif; ?>>Management</option>
	<?php } ?>	
		<option value="2" <?php if ( isset($user) && $user->dept_id=='2'): echo 'selected'; else: echo set_select('department', '2'); endif; ?>>Billing</option>
		<option value="3" <?php if ( isset($user) && $user->dept_id=='3'): echo 'selected'; else: echo set_select('department', '3'); endif; ?>>Reception</option>
		<option value="4" <?php if ( isset($user) && $user->dept_id=='4'): echo 'selected'; else: echo set_select('department', '4'); endif; ?>>Data Entry</option>
	</select>
	<div class="err"><?php echo form_error('department');?></div>
</div>
</div>
			
<div class="col-sm-3 col-xs-12">
<!--<div class="form-group drop-custum">
	<select class="form-control show-tick" name="user_type" required>
		<option value="" <?php if (empty($user)): echo set_select('user_type', ''); endif; ?>>User Type</option>
		<option value="admin" <?php if ( isset($user) && $user->user_type=='admin'): echo 'selected'; else: echo set_select('user_type', 'admin'); endif; ?>>Admin</option>
		<option value="superadmin" <?php if ( isset($user) && $user->user_type=='superadmin'): echo 'selected'; else: echo set_select('user_type', 'superadmin'); endif; ?>>Superadmin</option>
		<option value="staff" <?php if ( isset($user) && $user->user_type=='staff'): echo 'selected'; else: echo set_select('user_type', 'staff'); endif; ?>>Staff</option>
		<option value="other" <?php if ( isset($user) && $user->user_type=='other'): echo 'selected'; else: echo set_select('user_type', 'other'); endif; ?>>other</option>
	</select>
	<div class="err"><?php echo form_error('user_type');?></div>
</div>-->
</div>

			<div class="col-sm-3 col-xs-12">
				<div class="form-group">
					<div class="form-line">
					<input type="text" name="phone" class="form-control" placeholder="Phone" 
					value="<?php if (!empty($user->phone)) {echo $user->phone;}?>" required>
					</div>
			<div class="err"><?php echo form_error('phone');?></div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<div class="form-line">
						<input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php if(!empty($user->email)) {echo $user->email;}?>" required>
					</div>
			<div class="err"><?php echo form_error('email');?></div>
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
				<button type="submit" name="submit" class="btn btn-raised g-bg-cyan">Update</button>
				<!--<button type="reset" class="btn btn-raised">Reset</button>-->
			</div>
		</div>							
	</div>	
		<?php echo form_close();?>					
		</div>
	</div>
</div>           
            
</div>
</section>



