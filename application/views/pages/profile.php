<section class="content profile-page">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12 p-l-0 p-r-0">
                    <section class="boxs-simple">
                        <div class="profile-header">
                            <div class="profile_info">
                                <div class="profile-image">
									<?php if (!empty($doctor->photo)){ ?>
									<img src="<?php echo base_url(); ?>assets/upload/doctor_img/<?php echo $doctor->photo;?>" alt="<?php echo $doctor->first_name;?>" class="img-circle" width="250" height="200">
										<?php } else { ?>
									<img src="<?php echo base_url(); ?>assets/upload/doctor_img/avatar_img.png" alt="<?php echo $doctor->first_name;?>" class="img-circle">
										<?php } ?>
								</div>
                                <h4 class="mb-0"><strong><?php echo $doctor->first_name;?> </strong> <?php echo $doctor->last_name;?></h4>
                                <span class="text-muted col-white"><?php echo $doctor->speciality;?></span>
                                <!-- <div class="mt-10">
                                    <button class="btn btn-raised btn-default bg-blush btn-sm">Follow</button>
                                    <button class="btn btn-raised btn-default bg-green btn-sm">Message</button>
                                </div> -->
<!--                                <p class="social-icon">
                                    <a title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    <a title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    <a title="Google-plus" href="#"><i class="fa fa-twitter"></i></a>
                                    <a title="Dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                                    <a title="Behance" href="#"><i class="fa fa-behance"></i></a>
                                    <a title="Instagram" href="#"><i class="fa fa-instagram "></i></a>
                                    <a title="Pinterest" href="#"><i class="fa fa-pinterest "></i></a>
                                </p>-->
                            </div>
                        </div>
<!--                        <div class="profile-sub-header">
                            <div class="box-list">
                                <ul class="text-center">
                                    <li> <a href="#" class=""><i class="fa fa-envelope"></i>
                                            <p>My Inbox</p>
                                        </a> </li>
                                    <li> <a href="#" class=""><i class="fa fa-camera"></i>
                                            <p>Gallery</p>
                                        </a> </li>
                                    <li> <a href="#"><i class="fa fa-paperclip"></i>
                                            <p>Collections</p>
                                        </a> </li>
                                    <li> <a href="#"><i class="fa fa-tasks"></i>
                                            <p>Tasks</p>
                                        </a> </li>
                                </ul>
                            </div>
                        </div>-->
                    </section>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<!--                    <div class="card">
                        <div class="header">
                            <h2>About Doctor</h2>
                        </div>
                        <div class="body">
                            <p class="text-default">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <small>Designer <cite title="Source Title">Source Title</cite></small> </blockquote>
                        </div>
                    </div>-->
                    <div class="card">
                        <div class="header">
                            <h2>Doctor's Details</h2>
                        </div>
<div class="body">
	<div class="row">
		<table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
			<thead>
			<th>Name</th>
			<th>Details</th>
			</thead>
			<tbody>
				<tr>
					<td>Doctor Name</td>
					<td><?php echo $doctor->first_name.' '.$doctor->last_name; ?></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><?php echo $doctor->gender; ?></td>
				</tr>
				<tr>
					<td>Date of Birth</td>
					<td><?php echo $doctor->dob; ?></td>
				</tr>
				<tr>
					<td>Doctor's age</td>
					<td><?php 
						$start = new DateTime($doctor->dob);
						$end   = new DateTime(); // Current date time
						$diff  = $start->diff($end);
						echo $diff->y .' years '. $diff->m.' months';
					?></td>
				</tr>
				<tr>
					<td>Doctor Speciality</td>
					<td><?php echo $doctor->speciality; ?></td>
				</tr>
				<tr>
					<td>Phone No.</td>
					<td><?php echo $doctor->phone; ?></td>
				</tr>
				<tr>
					<td>Email address</td>
					<td><?php echo $doctor->email; ?></td>
				</tr>
				<tr>
					<td>Home Address</td>
					<td><?php echo $doctor->address; ?></td>
				</tr>
				<tr>
					<td>Doctor's Website</td>
					<td><?php echo $doctor->website; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <!--<li role="presentation" class="active"><a href="#mypost" data-toggle="tab" aria-expanded="false">Activity</a></li>-->
                                <!--<li role="presentation" class=""><a href="#timeline" data-toggle="tab" aria-expanded="true">Timeline</a></li>-->
                                <!--<li role="presentation"><a href="#usersettings" data-toggle="tab" aria-expanded="true">Setting</a></li>-->
                            </ul>

                            <!-- Tab panes -->
                            <!-- <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="mypost">
                                    <div class="wrap-reset">
                                        <div class="mypost-form">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                                </div>
                                            </div>
                                            <div class="post-toolbar-b"> <a href="#" tooltip="Add File" class="btn btn-raised btn-default btn-sm"><i class="fa fa-paperclip"></i></a> <a href="#" tooltip="Add Image" class="btn btn-raised btn-default btn-sm"><i class="fa fa-camera"></i></a> <a href="#" class="pull-right btn btn-raised btn-success btn-sm" tooltip="Post it!">Post</a> </div>
                                        </div> -->
										
<div class="clearfix"></div>

<div class="row">
		<h2>Doctor's Available Days and Time </h2>
<table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th>Available Days</th>
		<th>From Time</th>
        <th>To Time</th>
	</tr>
	</thead>
	 <tbody>
		<?php
        if (count($days)):
		foreach($days as $day): ?>
		 <tr>
			 <td><?php echo $day['available_days']; ?> </td>
 <td>
<?php
echo date('h:i a ', strtotime($day['from_time']));
//$time = json_decode($day['available_time']);
//if (!empty($time)){
//		for($i=0; $i<count($time); $i++){
//			$time_name = $this->doctor_model->get_time($time[$i]);
//			echo $time_name->time.',  ';
//		}
//} else {
//	echo 'Not available';
//}
//?>
 </td>
<td><?php echo date('h:i a ', strtotime($day['to_time'])); ?></td>
		 </tr>

		<?php endforeach;
		else: echo 'Available days and time are provided yet for this doctor';
		endif;
		?>
		</tbody>
</table>

</div>


<div class="clearfix"></div>
			
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

