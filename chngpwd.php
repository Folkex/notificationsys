<?php 
include("include/base.php");
$email=$_GET["email"];
$activation_code=$_GET["activation_code"];
$activation_salt=$_GET["salt"];
?>
<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
<head>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <title>Notify | Change Password</title>
        <meta name="description" content="Web Notification system"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
        <!--begin::Web font -->
        <script src="<?php echo DIR_ROOT.DIR_WEBFONT;?>"></script>
        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!--end::Web font -->
        <!--begin::Base Styles -->  
		<link href="<?php echo DIR_ROOT.DIR_VENDORS;?>vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo DIR_ROOT.DIR_DEMO_DEFAULT_BASE;?>style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
        <link rel="shortcut icon" href="<?php echo DIR_ROOT.DIR_TITLE_LOGO;?>" /> 
</head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
    	<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url(assets/app/media/img/bg/bg-1.jpg);">
	<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
		<div class="m-login__container">
			<div class="m-login__logo">
				<a href="#">
				<img src="assets/app/media/img/logos/logo-1.png">  	
				</a>
			</div>
			<div class="m-login__signin">
				<div class="m-login__head">
					<h3 class="m-login__title">Change your password</h3>
				</div>

				<form class="m-login__form m-form" action="<?php echo DIR_ROOT.DIR_FORM."passrecovery.php?email=".$email."&activation_code=".$activation_code."&salt=".$activation_salt."";?>" method="post">
					<div class="form-group m-form__group has-danger">
						<input class="form-control m-input " type="password" placeholder="Password" name="cgpassword" id="cgpassword" autocomplete="off">
                       <div id="cgpassword-error" class="form-control-feedback hide">This field is required.</div>
					</div>

					<div class="form-group m-form__group has-danger">
						<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" id="ccgpassword" name="ccgpassword">
                        <div id="ccgpassword-error" class="form-control-feedback hide">This field is required.</div>
					<div class="m-login__form-action">
						<button id="m_login_recover_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">Submit</button>
					</div>
				</form>
			</div>
		</div>	
	</div>
</div>	
</div>
<!-- end:: Page -->
    	<!--begin::Base Scripts -->        
    	    	<script src="<?php echo DIR_ROOT.DIR_VENDORS;?>vendors.bundle.js" type="text/javascript"></script>
		    	<script src="<?php echo DIR_ROOT.DIR_DEMO_DEFAULT_BASE;?>scripts.bundle.js" type="text/javascript"></script>
				<!--end::Base Scripts --> 
                    
        <!--begin::Page Snippets --> 
             <!-- <script src="assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>-->
               <script src="<?php echo DIR_ROOT.DIR_JS;?>lgn_reg.js" type="text/javascript"></script>
                <!--end::Page Snippets --> 
            </body>
    <!-- end::Body -->
</html>