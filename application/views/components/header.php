<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Clinic</title>
    <link rel="icon" href="<?php echo base_url();?>assets/favicon-32x32.png" sizes="32x32" />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/plugins/morrisjs/morris.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/plugins/waitme/waitMe.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />


    <link href="<?php echo base_url();?>assets/plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<style rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></style>
    <!-- Custom Css -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->1
    <link href="<?php echo base_url();?>assets/css/themes/all-themes.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet"  media='screen,print'>
    <link href="<?php echo base_url();?>assets/css/mystyle.css" rel="stylesheet"  media='all'>
    <script src="<?php echo base_url();?>assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

</head>


<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-cyan">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- #Float icon -->


<?php if ($this->session->userdata['loggedin']['dept_id'] == '1' || $this->session->userdata['loggedin']['dept_id'] == '5'): ?>
<ul id="f-menu" class="mfb-component--br mfb-zoomin noprint" data-mfb-toggle="hover">
    <li class="mfb-component__wrap">
        <a href="#" class="mfb-component__button--main g-bg-cyan">
            <i class="mfb-component__main-icon--resting fa fa-plus"></i>
            <i class="mfb-component__main-icon--active fa fa-close"></i>
        </a>
        <ul class="mfb-component__list">

            <li>
                <a href="<?php echo base_url(); ?>appointment " data-mfb-label="Doctor Appointment" class="mfb-component__button--child bg-blue">
                    <i class="fa fa-calendar mfb-component__child-icon"></i>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>patient"  data-mfb-label="Patients List" class="mfb-component__button--child bg-orange">
                    <i class="fa fa-users mfb-component__child-icon"></i>
                </a>
            </li>

            <?php if($this->session->userdata['loggedin']['dept_id'] == '1'): ?>
                <li>
                <a href="<?php echo base_url(); ?>doctor"  data-mfb-label="Doctor List" class="mfb-component__button--child bg-purple">
                    <i class="fa fa-user mfb-component__child-icon"></i>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </li>
</ul>
<?php endif; ?>


<!-- #Float icon -->
<!-- Morphing Search  -->
<div id="morphsearch" class="morphsearch">
<!--    <form class="morphsearch-form">-->
<!--        <div class="form-group m-0">-->
<!--            <input value="" type="search" placeholder="Search..." class="form-control morphsearch-input" />-->
<!--            <button class="morphsearch-submit" type="submit">Search</button>-->
<!--        </div>-->
<!--    </form>-->
    <div class="morphsearch-content">
        <div class="dummy-column">
            <h2>People</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar1.jpg" alt="hospital"/>
                <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar4.jpg" alt="hospital"/>
                <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar3.jpg" alt="hospital"/>
                <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar6.jpg" alt="hospital"/>
                <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar5.jpg" alt="hospital"/>
                <h3>Tim Holman</h3>
            </a></div>
        <div class="dummy-column">
            <h2>Popular</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar1.jpg" alt="hospital"/>
                <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar4.jpg" alt="hospital"/>
                <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar3.jpg" alt="hospital"/>
                <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar6.jpg" alt="hospital"/>
                <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar5.jpg" alt="hospital"/>
                <h3>Tim Holman</h3>
            </a> </div>
        <div class="dummy-column">
            <h2>Recent</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar1.jpg" alt="hospital"/>
                <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar4.jpg" alt="hospital"/>
                <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar3.jpg" alt="hospital"/>
                <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar6.jpg" alt="hospital"/>
                <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="<?php echo base_url();?>assets/images/random-avatar5.jpg" alt="hospital"/>
                <h3>Tim Holman</h3>
            </a></div>
    </div>
    <!-- /morphsearch-content -->
    <span class="morphsearch-close"></span> </div>
<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="container-fluid">
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="<?php echo base_url();?>">Clinic </a> </div>
        <ul class="nav navbar-nav navbar-right">
            <!-- Notifications -->
<!--            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="fa fa-bell"></i> <span class="label-count">7</span> </a>-->
<!--                <ul class="dropdown-menu">-->
<!--                    <li class="header">NOTIFICATIONS</li>-->
<!--                    <li class="body">-->
<!--                        <ul class="menu">-->
<!--                            <li> <a href="javascript:void(0);">-->
<!--                                    <div class="icon-circle bg-light-green"><i class="fa fa-account-add"></i></div>-->
<!--                                    <div class="menu-info">-->
<!--                                        <h4>12 new members joined</h4>-->
<!--                                        <p> <i class="material-icons">access_time</i> 14 mins ago </p>-->
<!--                                    </div>-->
<!--                                </a> </li>-->
<!--                            <li> <a href="javascript:void(0);">-->
<!--                                    <div class="icon-circle bg-cyan"><i class="fa fa-shopping-cart-plus"></i></div>-->
<!--                                    <div class="menu-info">-->
<!--                                        <h4>4 sales made</h4>-->
<!--                                        <p> <i class="material-icons">access_time</i> 22 mins ago </p>-->
<!--                                    </div>-->
<!--                                </a> </li>-->
<!--                            <li> <a href="javascript:void(0);">-->
<!--                                    <div class="icon-circle bg-red"><i class="fa fa-delete"></i></div>-->
<!--                                    <div class="menu-info">-->
<!--                                        <h4><b>Nancy Doe</b> deleted account</h4>-->
<!--                                        <p> <i class="material-icons">access_time</i> 3 hours ago </p>-->
<!--                                    </div>-->
<!--                                </a> </li>-->
<!--                            <li> <a href="javascript:void(0);">-->
<!--                                    <div class="icon-circle bg-orange"><i class="fa fa-edit"></i></div>-->
<!--                                    <div class="menu-info">-->
<!--                                        <h4><b>Nancy</b> changed name</h4>-->
<!--                                        <p> <i class="material-icons">access_time</i> 2 hours ago </p>-->
<!--                                    </div>-->
<!--                                </a> </li>-->
<!--                            <li> <a href="javascript:void(0);">-->
<!--                                    <div class="icon-circle bg-blue-grey"><i class="fa fa-comment-alt-text"></i></div>-->
<!--                                    <div class="menu-info">-->
<!--                                        <h4><b>John</b> commented your post</h4>-->
<!--                                        <p> <i class="material-icons">access_time</i> 4 hours ago </p>-->
<!--                                    </div>-->
<!--                                </a> </li>-->
<!--                            <li> <a href="javascript:void(0);">-->
<!--                                    <div class="icon-circle bg-light-green"><i class="fa fa-refresh-alt"></i></div>-->
<!--                                    <div class="menu-info">-->
<!--                                        <h4><b>John</b> updated status</h4>-->
<!--                                        <p> <i class="material-icons">access_time</i> 3 hours ago </p>-->
<!--                                    </div>-->
<!--                                </a> </li>-->
<!--                            <li> <a href="javascript:void(0);">-->
<!--                                    <div class="icon-circle bg-purple"><i class="fa fa-settings"></i></div>-->
<!--                                    <div class="menu-info">-->
<!--                                        <h4>Settings updated</h4>-->
<!--                                        <p> <i class="material-icons">access_time</i> Yesterday </p>-->
<!--                                    </div>-->
<!--                                </a> </li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>-->
<!--                </ul>-->
<!--            </li>-->
            <!-- #END# Notifications -->
            <!-- Tasks -->
<!--            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="fa fa-flag"></i><span class="label-count">9</span> </a>-->
<!--                <ul class="dropdown-menu">-->
<!--                    <li class="header">TASKS</li>-->
<!--                    <li class="body">-->
<!--                        <ul class="menu tasks">-->
<!--                            <li> <a href="javascript:void(0);">-->
<!--                                    <h4> Task 1 <small>32%</small> </h4>-->
<!--                                    <div class="progress">-->
<!--                                        <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%"> </div>-->
<!--                                    </div>-->
<!--                                </a> </li>-->
<!--                            <li> <a href="javascript:void(0);">-->
<!--                                    <h4>Task 2 <small>45%</small> </h4>-->
<!--                                    <div class="progress">-->
<!--                                        <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%"> </div>-->
<!--                                    </div>-->
<!--                                </a> </li>-->
<!--                            <li> <a href="javascript:void(0);">-->
<!--                                    <h4>Task 3 <small>54%</small> </h4>-->
<!--                                    <div class="progress">-->
<!--                                        <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%"> </div>-->
<!--                                    </div>-->
<!--                                </a> </li>-->
<!--                            <li> <a href="javascript:void(0);">-->
<!--                                    <h4> Task 4 <small>65%</small> </h4>-->
<!--                                    <div class="progress">-->
<!--                                        <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%"> </div>-->
<!--                                    </div>-->
<!--                                </a> </li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li class="footer"> <a href="javascript:void(0);">View All Tasks</a> </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <!-- #END# Tasks -->
<!--            <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="fa fa-settings"></i></a></li>-->
<!--        </ul>-->
    </div>
</nav>
<!-- #Top Bar -->
