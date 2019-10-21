<style> 
.body {margin:auto 5px;}
textarea.form-control {border: solid #ccc 1px !important;}
label {text-transform: capitalize;}
</style>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Add patient Vital</h2>
            <small class="text-muted">Welcome to Clinic</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Basic Information <small>add vital information</small> </h2>

                        <?php if (!empty($patient->photo)) { ?>
                            <img src="<?php echo base_url();?>assets/upload/patient_img/<?php echo $patient->photo;?>" width="80"><?php }else{ ?><img src="<?php echo base_url();?>assets/upload/patient_img/avatar.png" width="30"height="30"><?php } ?></a> &nbsp; &nbsp;
                        <?php echo $patient->first_name.' '.$patient->last_name; ?>  <?php   if ($patient->dob!='0000-00-00'){
       
         $birthDate = explode("-", $patient->dob);
        echo ' / ' . (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
    ? ((date("Y") - $birthDate[0]) - 1)
    : (date("Y") - $birthDate[0]));};     if ($patient->age=='0000-00-00' && $patient->age > 0) {  echo ' / ' . $patient->age; } ?>/ <?php echo $patient->gender; ?>
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
						
			<?php $attr = array('name'=>'myform', 'class'=>'form');

		echo form_open('vital/save_vital/', $attr);?>

				<input type="hidden" name="pid" value="<?php echo $pid; ?>">
                    <input type="hidden" name="appid" value="<?php echo $appid; ?>">



                    <div class="body">
					<div class="clearfix"></div>
					
					

						<?php foreach($vitals as $vrow): ?>	
						<div class="col-sm-4 col-xs-12">
							<div class="form-group"> <label for="<?php echo $vrow['name'];?>"><?php echo $vrow['name'];?>: </label>
								<div class="form-line">
	<input type="text" name="vital_name[]" id="<?php echo $vrow['name'];?>" class="form-control" placeholder="<?php echo $vrow['name'];?>" 
		   value="<?php //echo set_value('vital_name[]'); ?>" />
	<input type="hidden" name="parent_vital_id[]" value="<?php echo $vrow['id'];?>" />
								</div>
					<div class="err"><?php echo form_error($vrow['name']);?></div>
							</div>
						</div>
						<?php endforeach; ?>
					
					
					
						
<!--							<div class="col-sm-4 col-xs-12">
                                <div class="form-group"> <label for="address">Home Address :</label>
                                    <div class="form-line">
	<input type="text" name="address" id="address" class="form-control" placeholder="Enter address" 
		   value="<?php // if(!empty($vital->address)) {echo $vital->address;} else {echo set_value('address');}?>" />
                                    </div>
									<div class="err"> <?php // echo form_error('address'); ?></div>
                                </div>
                            </div>-->
							
  

                        <div class="row clearfix">							
                            <div class="col-sm-12">
                                <div class="form-group"> <label for="remark"> Other Information: </label> <span class="err"> *required field: </span> <span>Write short note or if nothing write n/a </span>
                                    <div class="form-line">
<textarea type="text" id='remark' name="remark" class="form-control" placeholder="Write other information about patient" rows="8"  cols="90" ><?php if(!empty($vital->remark)) {echo $vital->remark;} else {echo set_value('remark');}?></textarea>
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
