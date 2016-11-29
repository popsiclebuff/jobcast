<!DOCTYPE html>

<html lang="en">

<head>
<meta charset="utf-8"/>
<title>Jobcast | Log in</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('/assets/global/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('/assets/global/plugins/simple-line-icons/simple-line-icons.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('/assets/global/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('/assets/global/plugins/uniform/css/uniform.default.css'); ?>" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo site_url('/assets/global/plugins/select2/select2.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('/assets/admin/pages/css/login-soft.css'); ?>" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo site_url('/assets/global/css/components-rounded.css'); ?>" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('/assets/global/css/plugins.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('/assets/admin/layout/css/layout.css'); ?>" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo site_url('/assets/admin/layout/css/themes/default.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('/assets/admin/layout/css/custom.css'); ?>" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="<?php echo base_url(); ?>"> 
	<img src="<?php echo site_url('/assets/admin/JOB_CAST/logo-big.png'); ?>" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<?php 
	if ($error != "") {
		echo "<center><font color='red'>".$error."</font></center>";
	}?>
	<form class="login-form" method="post" action="<?php echo base_url(); ?>">
		<h3 class="form-title">Login to your account</h3>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-actions" style="background-color: #fff; padding-top: 10px; margin-left: 2px;margin-right: 2px;border-radius: 5px;">
		<input type="radio" name="logtype" id="company" value="Company" required ><label for="company" style="color:#000">Company</label>
		<input type="radio" name="logtype" id="student" value="Student" required ><label for="student" style="color:#000">Student</label>
		<input type="submit" class="btn blue pull-right" name="login" value="Login">
		</div> 
		
		<div class="forget-password">
			<h4>No account yet ?</h4>
			<p>
				It is easy and fast. <a style="color: aquamarine;" href="javascript:;" id="register-btn">
				Sign Up </a>
				for free!
			</p>
		</div>
	</form>
 	
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" action="<?php echo base_url(); ?>" method="post">
		<h3>Sign Up</h3>
		
		<p>
			 Enter your account details below:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">First Name</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="First Name" name="fname"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Lst Name</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="Last Name" name="lname"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" required type="email" autocomplete="off" placeholder="Email" name="Remail"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Company Name</label>
			<div class="input-icon">
				<i class="fa fa-building"></i>
				<input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="Company Name" name="compname"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="Username" name="Rusername"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" required type="password" autocomplete="off" id="register_password" placeholder="Password" name="Rpassword"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
			<div class="controls">
				<div class="input-icon">
					<i class="fa fa-check"></i>
					<input class="form-control placeholder-no-fix" required type="password" autocomplete="off" placeholder="Re-type Your Password" name="repassword"/>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label>
			<input type="checkbox" name="tnc" required /> I agree to the <a style="color: aquamarine;" href="javascript:;">
			Terms of Service </a>
			and <a style="color: aquamarine;" href="javascript:;">
			Privacy Policy </a>
			</label>
			<div id="register_tnc_error">
			</div>
		</div>
		<div class="form-actions">
			<button id="register-back-btn" type="button" class="btn">
			<i class="m-icon-swapleft"></i> Back </button>
			<input type="submit" name="sign" id="register-submit-btn" class="btn blue pull-right" id="sign" value="Sign Up">
			
		</div>
	</form>
	
	<!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2016 &copy; Job Cast.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo site_url('/assets/global/plugins/jquery.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('/assets/global/plugins/jquery-migrate.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('/assets/global/plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('/assets/global/plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('/assets/global/plugins/uniform/jquery.uniform.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('/assets/global/plugins/jquery.cokie.min.js'); ?>" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo site_url('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('/assets/global/plugins/backstretch/jquery.backstretch.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo site_url('/assets/global/plugins/select2/select2.min.js'); ?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo site_url('/assets/global/scripts/metronic.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('/assets/admin/layout/scripts/layout.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('/assets/admin/layout/scripts/demo.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('/assets/admin/pages/scripts/login-soft.js'); ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
Layout.init(); // init current layout
  Login.init();
  Demo.init();
       // init background slide images
       $.backstretch([
        "<?php echo site_url('/assets/admin/pages/media/bg/1.jpg'); ?>",
        "<?php echo site_url('/assets/admin/pages/media/bg/2.jpg'); ?>",
        "<?php echo site_url('/assets/admin/pages/media/bg/3.jpg'); ?>",
        "<?php echo site_url('/assets/admin/pages/media/bg/4.jpg'); ?>"
        ], {
          fade: 1000,
          duration: 8000
    }
    );
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>