
<style>
.body {margin:auto 5px;}
textarea.form-control {border: solid #ccc 1px !important;}
label {text-transform: capitalize;}
</style>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Update patient Vital</h2>
            <small class="text-muted">Welcome to Clinic</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Basic Information <small>Edit vital information</small> </h2>                       
                    </div>
                    <?php print_r($vital); ?>
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
		echo form_open('vital/update_vital/', $attr);?>
	
				<input type="hidden" name="pid" value="<?php echo $vital->patient_id; ?>" />
				<input type="hidden" name="vid" value="<?php echo $vital->id; ?>" />
					
					

	<?php foreach($vitals as $vrow): ?>	

	<div class="col-sm-4 col-xs-12">
		<div class="form-group"> <label for="<?php echo $vrow['name'];?>"><?php echo $vrow['name'];?>: </label>
			<div class="form-line">
<input type="text" name="vital_name[]" id="<?php echo $vrow['name'];?>" class="form-control" placeholder="<?php echo $vrow['name'];?>" 
value="<?php echo $vrow['value'];?>" />

<input type="hidden" name="pv_id[]" value="<?php echo $vrow['pv_id'];?>" />
<input type="hidden" name="vd_id[]" value="<?php echo $vrow['vd_id'];?>" />
			</div>
<div class="err"><?php echo form_error($vrow['name']);?></div>
		</div>
	</div>
<?php endforeach; ?>
					
					
					
						
<!--							<div class="col-sm-4 col-xs-12">
                                <div class="form-group"> <label for="address">Home Address :</label>
                                    <div class="form-line">
	<input type="text" name="address" id="address" class="form-control" placeholder="Enter address" 
		   value="<?php //if(!empty($vital->address)) {echo $vital->address;} else {echo set_value('address');}?>" />
                                    </div>
									<div class="err"> <?php //echo form_error('address'); ?></div>
                                </div>
                            </div>-->
							
  

		<div class="row clearfix">							
			<div class="col-sm-12">
				<div class="form-group"> <label for="remark"> Other Information: </label><span class="err"> *required field: </span>
					<div class="form-line">
<textarea type="text" id='remark' name="remark" class="form-control" placeholder="Write other information about vital" rows="8"  cols="90" required><?php if(!empty($vital->remark)) {echo $vital->remark;} else {echo set_value('remark');}?></textarea>
					</div>
<div class="err"><?php echo form_error('remark');?> </div>
				</div>								
			</div>
		</div>
					
                            <div class="col-xs-12 clearfix">
			<button type="submit" name="submit" id="submit" class="btn btn-raised g-bg-cyan">Update</button>
                                <!--<button type="submit" class="btn btn-raised">Cancel</button>-->
                            </div>
                       </div>
<?php echo form_close(); ?>				
                    </div>
                </div>
            </div>
        </div>
	
</section>
