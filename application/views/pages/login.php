<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>:: CLINIC ::</title>
    <!-- Favicon-->  
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url();?>assets/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="login-page authentication">

<div class="container">
    <div class="card-top"></div>
    <div class="card">
<?php if(!empty($this->session->flashdata('success'))) {?>
<div class="alert alert-warning">
<?php echo $this->session->flashdata('success'); ?>
</div>
<?php } ?>
<?php if(!empty($this->session->flashdata('error'))) {?>
<div class="alert alert-danger">
<?php echo $this->session->flashdata('error'); ?>
</div>
<?php } ?>
        <h1 class="title">Admin Login <span class="msg">Sign in to start your system</span></h1>
        <div class="col-md-12">
			<?php $attr = array('class'=>'form','id'=>'sign_in');
			echo form_open('user/user_login',$attr); ?>

                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-user fa-lg"></i> </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" required autofocus>
                    </div>
                </div>
                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-lock fa-lg"></i> </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password');?>" required>
                    </div>
                </div>
                <div>
<!--                    <div class="">-->
<!--                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">-->
<!--                        <label for="rememberme">Remember Me</label>-->
<!--                    </div>-->
                    <div class="text-center">
						<button type="submit" name="submit" class="btn btn-raised waves-effect g-bg-cyan">SIGN IN</button>	
                        <!--<a href="index.php" class="btn btn-raised waves-effect g-bg-cyan">SIGN IN</a>-->
<!--                        <a href="sign-up.html" class="btn btn-raised waves-effect">SIGN UP</a>-->
                    </div>
<!--                    <div class="text-center"> <a href="forgot-password.php">Forgot Password?</a></div>-->
                </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>


<!-- Jquery Core Js -->
<script src="<?php echo base_url();?>assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?php echo base_url();?>assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?php echo base_url();?>assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>
</html>