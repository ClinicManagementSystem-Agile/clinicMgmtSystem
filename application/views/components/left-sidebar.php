<style>
    .bg-color {
        background: #1fbdb0;
        width: 100%;
    }

    .sidebar .user-info .admin-action-info > ul li a {
        width: 100%;
        height: auto;
        line-height: 15px;
    }

    .suc {
        color: green !important;
        font-weight: bold;
    }
    .suc a, a, a:hover {font-weight: bold; text-decoration: none;}

    .bottom_height {
        height: 20px;
        margin: 10px auto;
        padding: 2px;
    }
	/*.menu ul {overflow-y:auto !important;}*/
</style>
<section>
    <?php 
    $user_name=null; $user_name = $this->session->userdata['loggedin']['name'];
  echo  $loggeded = $this->session->userdata['loggedin']['dept_id'];
    ?>
    <!-- Left Sidebar -->
    <aside class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"><img src="<?php echo base_url(); ?>assets/images/random-avatar7.jpg"
                                          alt="hospital"></div>
            <div class="admin-action-info"><span>Welcome &nbsp;</span>
                <span class="suc"> <?php if (!empty($user_name)){echo $user_name;} ?></span>
               <!--<br><span class="suc"><?php echo anchor('user/logout', '<i class="ace-icon fa fa-power-off"></i> Logout'); ?></span>-->
                <ul class="nav navbar-nav">
                    <li><h1><?php echo anchor('user/logout', '<i class="ace-icon fa fa-power-off"></i> Logout'); ?></h1></li>
                    <!--<li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            <h3> <?php if (!empty($user_name)){echo $user_name;} ?> <i class="ace-icon fa fa-caret-down"></i></h3>
                        </a>
                        <ul class="dropdown-menu bg-color">
                            <li class="divider"></li>
                            <li>
                                <?php echo anchor('user/logout', '<i class="ace-icon fa fa-power-off"></i> Logout'); ?>
                            </li>
                        </ul>
                    </li>-->
                </ul>

            </div>
            <div class="quick-stats">
<!--                <h5>Today Report</h5>-->
               <br>
                <br>
                <?php if ($loggeded == '5' || $loggeded == '1' ):  //for Reception user ?> 
                <ul>
                    <li style="width: 110px"><span><a href="<?php echo base_url(); ?>patient">0<i> New Patient</i></span></a></li>
                    <li style="width: 110px"><span><a href="<?php echo base_url(); ?>appointment/view_appointment">0<i>New Appointment</i></a></span></li>
<!--                    <li><span>04<i>Visit</i></span></li>-->
                </ul>
                <?php endif ;?>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active open"><a href="<?php echo base_url(); ?>"><i
                            class="fa fa-home"></i><span>Dashboard</span></a></li>


                            
                            
                            
                            <?php if ($loggeded == '7'): ?> <!-- for Data Entry -->
             


                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-file-text-o"></i><span>Ledger</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>patient">Patient</a></li>
                            <li><a href="<?php echo base_url(); ?>supplier">Supplier</a></li>
                            <li><a href="#">Cash</a></li>
                            <li><a href="#">Bank</a></li>
                            <li><a href="#">Salary</a></li>
                            <li><a href="#">Service Tax</a></li>
                            <li><a href="#">Product Vat Collected</a></li>
                            <li><a href="#">Advance</a></li>
                            <li><a href="#">Outstanding</a></li>
                                 
                            <li><a href="#">Stock</a></li>
                            </ul>
                    </li>
                    

                    
                <?php endif; ?>

                            
                            
                <?php if ($loggeded == '5' || $loggeded == '2'): // For reception user ?>
             


                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="fa fa-user-circle-o"></i><span>Patients</span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?php echo base_url(); ?>patient">View Patients</a></li>
                         <li><a href="<?php echo base_url(); ?>patient/deactivate_patient_list">Inactive Patients</a></li>
                        <li><a href="<?php echo base_url(); ?>patient/add_patient">Add Patient</a></li>
                    </ul>
                </li>


              


                
                <?php endif; ?>


           

                <?php if ($loggeded == '3'): // for Nursing dept user ?>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-users"></i><span>Patient</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>patient/patient_nursing">View Patients</a></li>
							<li><a href="<?php echo base_url(); ?>patient/add_patient">Add Patient</a></li>
                        </ul>
                    </li>

                   
    

                <?php endif; ?>

               

                <?php if ($loggeded == '1'): // For Management ?>



                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                    class="fa fa-user-circle-o"></i><span>Patients</span> </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>patient">View Patients</a></li>
                             <li><a href="<?php echo base_url(); ?>patient/deactivate_patient_list">Inactive Patients</a></li>
                            
                            <li><a href="<?php echo base_url(); ?>patient/add_patient">Add Patient</a></li>
                        </ul>
                    </li>

              



                    

    
                <?php endif; ?>

                
					<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
                
            </ul> <br> <br> 
        </div> <br> <br>
        <!-- #Menu -->
    </aside> <br>
    <!-- #END# Left Sidebar -->

<div class="bottom_height"></div>
</section>
