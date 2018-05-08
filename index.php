<?php include("include/base.php");?>
<!DOCTYPE html>
<html lang="en" >
<head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <title>Notify | Login Page</title>
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
    <!-- begin::Body -->
    <body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
    	<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
	<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
		<div class="m-stack m-stack--hor m-stack--desktop">
				<div class="m-stack__item m-stack__item--fluid">
					<div class="m-login__wrapper">
						<div class="m-login__logo">
							<a href="#">
							<img src="<?php echo DIR_ROOT.DIR_LOGO;?>">  	
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">Sign In To Admin</h3>
							</div>
							<form class="m-login__form m-form" action="<?php echo DIR_ROOT.DIR_FORM."lgn.php";?>" method="post">
                                <div id="login-error" class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn hide" role="alert">			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			<span>Incorrect username or password. Please try again.</span>		</div>
								<div class="form-group m-form__group has-danger">
									<input class="form-control m-input" type="text" placeholder="Email" name="email" id="email" autocomplete="off">
                                    <div id="email-error" class="form-control-feedback hide">This field is required.</div>
                                    <div id="email-error1" class="form-control-feedback hide">Invalid Email Address.</div>
								</div>
								<div class="form-group m-form__group has-danger">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password" id="password">
                                    <div id="password-error" class="form-control-feedback hide">This field is required.</div>
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--focus">
										<input type="checkbox" name="remember"> Remember me
										<span></span>
										</label>
									</div>
									<div class="col m--align-right">
										<a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
									</div>
								</div>
								<div class="m-login__form-action">
									<button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign In</button>
								</div>
							</form>
						</div>

						<div class="m-login__signup">
							<div class="m-login__head">
								<h3 class="m-login__title">Sign Up</h3>
								<div class="m-login__desc">Enter your details to create your account:</div>
							</div>
							<form class="m-login__form m-form" action="<?php echo DIR_ROOT.DIR_FORM."reg.php";?>" method="post">
                                <div class="form-group m-form__group has-danger">
									<input class="form-control m-input" type="email" placeholder="Email" name="semail" id="semail" autocomplete="off">
                                    <div id="semail-error" class="form-control-feedback hide">This field is required.</div>
                                    <div id="semail-error1" class="form-control-feedback hide">Invalid Email Address.</div>
								</div>
								<div class="form-group m-form__group has-danger">
									<input class="form-control m-input" type="password" placeholder="Password" name="spassword" id="spassword">
                                    <div id="spassword-error" class="form-control-feedback hide">This field is required.</div>
								</div>
								<div class="form-group m-form__group has-danger">
									<input class="form-control m-input" type="password" placeholder="Confirm Password" name="scpassword" id="scpassword">
                                    <div id="scpassword-error" class="form-control-feedback hide">This field is required.</div>
								</div>
								<div class="form-group m-form__group has-danger">
									<input class="form-control m-input" type="text" placeholder="Full Name" name="sfullname" id="sfullname">
                                    <div id="sfullname-error" class="form-control-feedback hide">This field is required.</div>
								</div>
                                <br>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <select class="form-control m-input" id="exampleSelect1">
                                        <option>+961</option>
                                    </select>
                                    </div>
                                    <div class="col-lg-8 has-danger">
                                        <input class="form-control m-input" type="tel" placeholder="Phone No." name="sphone" id="sphone">
                                        <div id="sphone-error" class="form-control-feedback hide">This field is required.</div>
                                        <div id="sphone-error1" class="form-control-feedback hide">Invalid Phone number.</div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group has-danger">
									<input class="form-control m-input" type="text" placeholder="Company / Blog Name" name="scompany_name" id="scompany_name">
                                    <div id="scompany_name-error" class="form-control-feedback hide">This field is required.</div>
								</div>
                                <br>
                                <div class="form-group m-form__group has-danger">
                                    <select class="form-control m-input m-input--square" id="traffic" name="traffic">
                                        <option value="0">Trafic</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <div id="traffic-error" class="form-control-feedback hide">This field is required.</div>
                                </div>
                                <br>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <select class="form-control m-input" id="exampleSelect1">
                                        <option>http://</option>
                                        <option>https://</option>
                                    </select>
                                    </div>
                                    <div class="col-lg-8 has-danger">
                                        <input class="form-control m-input" type="text" placeholder="Website / Blog URL" name="swebsite" id="swebsite">
                                        <div id="swebsite-error" class="form-control-feedback hide">This field is required.</div>
                                        <div id="swebsite-error1" class="form-control-feedback hide">Invalid URL.</div>
                                    </div>
                                </div>
								<div class="row form-group m-form__group m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--focus">
										<input type="checkbox" name="agree"> I Agree the <a href="#" class="m-link m-link--focus">terms and conditions</a>.
										<span></span>
										</label>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="m-login__form-action">
									<button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign Up</button>
									<button id="m_login_signup_cancel" class="btn btn-outline-focus  m-btn m-btn--pill m-btn--custom">Cancel</button>
								</div>
							</form>
						</div>

						<div class="m-login__forget-password">
							<div class="m-login__head">
								<h3 class="m-login__title">Forgotten Password ?</h3>
								<div class="m-login__desc">Enter your email to reset your password:</div>
							</div>
							<form class="m-login__form m-form" action="#">
								<div class="form-group m-form__group has-danger">
									<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
								</div>
								<div class="m-login__form-action">
									<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Request</button>
									<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">Cancel</button>
								</div>
							</form>
						</div>
					</div>

				</div>
				<div class="m-stack__item m-stack__item--center">  
					
					<div class="m-login__account">
						<span class="m-login__account-msg">
						Don't have an account yet ?
						</span>&nbsp;&nbsp;
						<a href="javascript:;" id="m_login_signup" class="m-link m-link--focus m-login__account-link">Sign Up</a>
					</div>
				
				</div>
		</div>
	</div>
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content" style="background-image: url(assets/app/media/img/bg/bg-4.jpg)">
		<div class="m-grid__item m-grid__item--middle">
			<h3 class="m-login__welcome">Join Our Community</h3>
			<p class="m-login__msg">
				Lorem ipsum dolor sit amet, coectetuer adipiscing<br>elit sed diam nonummy et nibh euismod
			</p>
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
            <!--<script src="assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>-->
                 <script src="<?php echo DIR_ROOT.DIR_JS;?>lgn_reg.js" type="text/javascript"></script>
                <!--end::Page Snippets -->   
        
                
            </body>
    <!-- end::Body -->

<!-- Mirrored from keenthemes.com/metronic/preview/?page=snippets/pages/user/login-1&demo=default by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 May 2018 07:21:20 GMT -->
</html>