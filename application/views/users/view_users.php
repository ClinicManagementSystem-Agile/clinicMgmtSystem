<style> .green{color:#33cc66;}.red{color:#F44336;} </style>
<section class="content">
        <div class="container-fluid">
            <div class="block-header noprint">
			<div class="row clearfix">
			<div class="col-md-4 col-sm-4">
            <h2>All users</h2>
            <small class="text-muted">List of all users</small>
			</div>
			<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>">Go to Dashboard</a></div>
				<div class='col-md-4 col-sm-4'><a href="<?php echo base_url();?>user/create_user">Add New User  <i class="fa fa-plus"></i></a> </div>
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
                            <h2>Users Management</h2>
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
                        <div class="body">
                            <div class="table-responsive-m">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                          <th>Username</th>
                                        <th>Email</th>
                                        <th>phone</th>
                                        <th>Department</th>
                                        <!--<th>Access Level</th>-->
                                        <!--<th>Position</th>-->
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
				<?php if (count($users)):
				$i=0;
				foreach($users as $user): $i++;
				?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $user['fname']; ?></td>
                                        <td><?php echo $user['lname']; ?></td>
                                         <td><?php echo $user['username']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['phone']; ?></td>
                                        <td><?php echo $user['name']; ?></td>
                                        <!--<td><?php //echo $user['access_level']; ?></td>-->
                                        <!--<td><?php //echo $user['position']; ?></td>-->
<td>
<?php if($user_data['dept_id'] =='1') {?>
<?php //if($user['access_level']==1000){ ?>
	<a href="<?php echo base_url();?>user/edit_user/<?php echo $user['id'];?>">
		<i class="fa fa-pencil-square-o fa-lg green" aria-hidden="true"></i>
	</a> &nbsp;
	<!--<a href="<?php echo base_url();?>user/delete_user/<?php echo $user['id'];?>" onclick="return confirm('Are you sure, want to delete this user?')">
		<i class="fa fa-trash-o fa-lg red" aria-hidden="true"></i>
	</a>-->
<?php }?>
</td>
                                    </tr>
                                <?php endforeach;
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