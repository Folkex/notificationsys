<?php 
include("include/base.php");
$success_msg="hide";
$success_msg2="hide";
$error_msg="hide";
$error_msg2="hide";
$error_msg3="hide";
$error_msg4="hide";
$error_msg5="hide";
if(isset($_GET['reg']) && $_GET['reg']==1) $success_msg="";
if(isset($_GET['reg']) && $_GET['reg']==2) $success_msg="";
if(isset($_GET['err']) && $_GET['err']==1) $error_msg="";
if(isset($_GET['err']) && $_GET['err']==2) $error_msg2="";
if(isset($_GET['err']) && $_GET['err']==3) $error_msg3="";
if(isset($_GET['err']) && $_GET['err']==4) $error_msg4="";
if(isset($_GET['err']) && $_GET['err']==5) $error_msg5="";
?>
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
                                <!--- Start Success and Error Messages--->
                                <div id="recovery-success" class="m-alert m-alert--outline alert alert-success alert-dismissible animated fadeIn <?php echo $success_msg;?>" role="alert">			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			<span>Cool! Account activation instruction has been sent to your email.</span>		</div>
                                <div id="recovery-success" class="m-alert m-alert--outline alert alert-success alert-dismissible animated fadeIn <?php echo $success_msg2;?>" role="alert">			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			<span>Cool! Password recovery instruction has been sent to your email.</span>		</div>
                                <div id="login-error" class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn <?php echo $error_msg;?>" role="alert">			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			<span>User with same Email address already exists!</span>		</div>
                                <div id="login-error" class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn <?php echo $error_msg2;?>" role="alert">			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			<span>Missing data entry. Please try again.</span>		</div>
                                <div id="login-error" class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn <?php echo $error_msg3;?>" role="alert">			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			<span>Your data wasn't saved, please check your internet connection!</span>		</div>
                                <div id="login-error" class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn <?php echo $error_msg4;?>" role="alert">			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			<span>User is not found with the credentials!</span>		</div>
                                <div id="login-error" class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn <?php echo $error_msg5;?>" role="alert">			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			<span>Missing Email and/or Password. Please try again.</span>		</div>
                                <!--- End Success and Error Messages--->
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
                                    <div id="sfullname-error1" class="form-control-feedback hide">Invalid Name.</div>
								</div>
                                <br>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <select class="form-control m-input" id="countrycode">
                                        <option data-dial-code="1" data-country-code="us">United States (+1)</option><option data-dial-code="44" data-country-code="gb">United Kingdom (+44)</option><option data-dial-code="93" data-country-code="af">Afghanistan (+93)</option><option data-dial-code="355" data-country-code="al">Albania (+355)</option><option data-dial-code="213" data-country-code="dz">Algeria (+213)</option><option data-dial-code="1684" data-country-code="as">American Samoa (+1684)</option><option data-dial-code="376" data-country-code="ad">Andorra (+376)</option><option data-dial-code="244" data-country-code="ao">Angola (+244)</option><option data-dial-code="1264" data-country-code="ai">Anguilla (+1264)</option><option data-dial-code="1268" data-country-code="ag">Antigua and Barbuda(+1268)</option><option data-dial-code="54" data-country-code="ar">Argentina (+54)</option><option data-dial-code="374" data-country-code="am">Armenia (+374)</option><option data-dial-code="297" data-country-code="aw">Aruba (+297)</option><option data-dial-code="61" data-country-code="au">Australia (+61)</option><option data-dial-code="43" data-country-code="at">Austria (+43)</option><option data-dial-code="994" data-country-code="az">Azerbaijan (+994)</option><option data-dial-code="1242" data-country-code="bs">Bahamas (+1242)</option><option data-dial-code="973" data-country-code="bh">Bahrain (+973)</option><option data-dial-code="880" data-country-code="bd">Bangladesh (+880)</option><option data-dial-code="1246" data-country-code="bb">Barbados (+1246)</option><option data-dial-code="375" data-country-code="by">Belarus (+375)</option><option data-dial-code="32" data-country-code="be">Belgium (+32)</option><option data-dial-code="501" data-country-code="bz">Belize (+501)</option><option data-dial-code="229" data-country-code="bj">Benin (+229)</option><option data-dial-code="1441" data-country-code="bm">Bermuda (+1441)</option><option data-dial-code="975" data-country-code="bt">Bhutan (+975)</option><option data-dial-code="591" data-country-code="bo">Bolivia (+591)</option><option data-dial-code="387" data-country-code="ba">Bosnia and Herzegovina (+387)</option><option data-dial-code="267" data-country-code="bw">Botswana (+267)</option><option data-dial-code="55" data-country-code="br">Brazil (+55)</option><option data-dial-code="246" data-country-code="io">British Indian Ocean Territory (+246)</option><option data-dial-code="1284" data-country-code="vg">British Virgin Islands (+1284)</option><option data-dial-code="673" data-country-code="bn">Brunei (+673)</option><option data-dial-code="359" data-country-code="bg">Bulgaria (+359)</option><option data-dial-code="226" data-country-code="bf">Burkina Faso (+226)</option><option data-dial-code="257" data-country-code="bi">Burundi (+257)</option><option data-dial-code="855" data-country-code="kh">Cambodia (+855)</option><option data-dial-code="237" data-country-code="cm">Cameroon (+237)</option><option data-dial-code="1" data-country-code="ca">Canada (+1)</option><option data-dial-code="238" data-country-code="cv">Cape Verde (+238)</option><option data-dial-code="599" data-country-code="bq">Caribbean Netherlands (+599)</option><option data-dial-code="1345" data-country-code="ky">Cayman Islands (+1345)</option><option data-dial-code="236" data-country-code="cf">Central African Republic (+236)</option><option data-dial-code="235" data-country-code="td">Chad (+235)</option><option data-dial-code="56" data-country-code="cl">Chile (+56)</option><option data-dial-code="86" data-country-code="cn">China (+86)</option><option data-dial-code="61" data-country-code="cx">Christmas Island (+61)</option><option data-dial-code="61" data-country-code="cc">Cocos (Keeling) Islands (+61)</option><option data-dial-code="57" data-country-code="co">Colombia (+57)</option><option data-dial-code="269" data-country-code="km">Comoros (+269)</option><option data-dial-code="243" data-country-code="cd">Congo (+243)</option><option data-dial-code="242" data-country-code="cg">Congo Republic Congo-Brazzaville (+242)</option><option data-dial-code="682" data-country-code="ck">Cook Islands (+682)</option><option data-dial-code="506" data-country-code="cr">Costa Rica (+506)</option><option data-dial-code="225" data-country-code="ci">Côte d’Ivoire (+225)</option><option data-dial-code="385" data-country-code="hr">Croatia (+385)</option><option data-dial-code="53" data-country-code="cu">Cuba (+53)</option><option data-dial-code="599" data-country-code="cw">Curaçao (+599)</option><option data-dial-code="357" data-country-code="cy">Cyprus (Κύπρος)(+357)</option><option data-dial-code="420" data-country-code="cz">Czech Republic (Česká republika)(+420)</option><option data-dial-code="45" data-country-code="dk">Denmark (Danmark)(+45)</option><option data-dial-code="253" data-country-code="dj">Djibouti(+253)</option><option data-dial-code="1767" data-country-code="dm">Dominica(+1767)</option><option data-dial-code="1" data-country-code="do">Dominican Republic (República Dominicana)(+1)</option><option data-dial-code="593" data-country-code="ec">Ecuador(+593)</option><option data-dial-code="20" data-country-code="eg">Egypt (+20)</option><option data-dial-code="503" data-country-code="sv">El Salvador(+503)</option><option data-dial-code="240" data-country-code="gq">Equatorial Guinea (+240)</option><option data-dial-code="291" data-country-code="er">Eritrea (+291)</option><option data-dial-code="372" data-country-code="ee">Estonia (+372)</option><option data-dial-code="251" data-country-code="et">Ethiopia(+251)</option><option data-dial-code="500" data-country-code="fk">Falkland Islands (+500)</option><option data-dial-code="298" data-country-code="fo">Faroe Islands (+298)</option><option data-dial-code="679" data-country-code="fj">Fiji (+679)</option><option data-dial-code="358" data-country-code="fi">Finland (+358)</option><option data-dial-code="33" data-country-code="fr">France (+33)</option><option data-dial-code="594" data-country-code="gf">French Guiana (+594)</option><option data-dial-code="689" data-country-code="pf">French Polynesia (+689)</option><option data-dial-code="241" data-country-code="ga">Gabon(+241)</option><option data-dial-code="220" data-country-code="gm">Gambia(+220)</option><option data-dial-code="995" data-country-code="ge">Georgia (+995)</option><option data-dial-code="49" data-country-code="de">Germany (+49)</option><option data-dial-code="233" data-country-code="gh">Ghana (+233)</option><option data-dial-code="350" data-country-code="gi">Gibraltar (+350)</option><option data-dial-code="30" data-country-code="gr">Greece (+30)</option><option data-dial-code="299" data-country-code="gl">Greenland (+299)</option><option data-dial-code="1473" data-country-code="gd">Grenada (+1473)</option><option data-dial-code="590" data-country-code="gp">Guadeloupe (+590)</option><option data-dial-code="1671" data-country-code="gu">Guam (+1671)</option><option data-dial-code="502" data-country-code="gt">Guatemala (+502)</option><option data-dial-code="44" data-country-code="gg">Guernsey (+44)</option><option data-dial-code="224" data-country-code="gn">Guinea (+224)</option><option data-dial-code="245" data-country-code="gw">Guinea-Bissau (+245)</option><option data-dial-code="592" data-country-code="gy">Guyana (+592)</option><option data-dial-code="509" data-country-code="ht">Haiti (+509)</option><option data-dial-code="504" data-country-code="hn">Honduras (+504)</option><option data-dial-code="852" data-country-code="hk">Hong Kong (+852)</option><option data-dial-code="36" data-country-code="hu">Hungary (+36)</option><option data-dial-code="354" data-country-code="is">Iceland (+354)</option><option data-dial-code="91" data-country-code="in">India (+91)</option><option data-dial-code="62" data-country-code="id">Indonesia (+62)</option><option data-dial-code="98" data-country-code="ir">Iran (+98)</option><option data-dial-code="964" data-country-code="iq">Iraq (+964)‫‬</option><option data-dial-code="353" data-country-code="ie">Ireland(+353)</option><option data-dial-code="44" data-country-code="im">Isle of Man(+44)</option><option data-dial-code="972" data-country-code="il">Israel (+972)</option><option data-dial-code="39" data-country-code="it">Italy (+39)</option><option data-dial-code="1876" data-country-code="jm">Jamaica (+1876)</option><option data-dial-code="81" data-country-code="jp">Japan (+81)</option><option data-dial-code="44" data-country-code="je">Jersey (+44)</option><option data-dial-code="962" data-country-code="jo">Jordan (+962)</option><option data-dial-code="7" data-country-code="kz">Kazakhstan (+7)</option><option data-dial-code="254" data-country-code="ke">Kenya (+254)</option><option data-dial-code="686" data-country-code="ki">Kiribati (+686)</option><option data-dial-code="383" data-country-code="xk">Kosovo (+383)</option><option data-dial-code="965" data-country-code="kw">Kuwait (+965)</option><option data-dial-code="996" data-country-code="kg">Kyrgyzstan (+996)</option><option data-dial-code="856" data-country-code="la">Laos (+856)</option><option data-dial-code="371" data-country-code="lv">Latvia (+371)</option><option data-dial-code="961" data-country-code="lb">Lebanon (+961)</option><option data-dial-code="266" data-country-code="ls">Lesotho (+266)</option><option data-dial-code="231" data-country-code="lr">Liberia (+231)</option><option data-dial-code="218" data-country-code="ly">Libya (+218)</option><option data-dial-code="423" data-country-code="li">Liechtenstein (+423)</option><option data-dial-code="370" data-country-code="lt">Lithuania (+370)</option><option data-dial-code="352" data-country-code="lu">Luxembourg (+352)</option><option data-dial-code="853" data-country-code="mo">Macau (+853)</option><option data-dial-code="389" data-country-code="mk">Macedonia (+389)</option><option data-dial-code="261" data-country-code="mg">Madagascar (+261)</option><option data-dial-code="265" data-country-code="mw">Malawi (+265)</option><option data-dial-code="60" data-country-code="my">Malaysia (+60)</option><option data-dial-code="960" data-country-code="mv">Maldives (+960)</option><option data-dial-code="223" data-country-code="ml">Mali (+223)</option><option data-dial-code="356" data-country-code="mt">Malta (+356)</option><option data-dial-code="692" data-country-code="mh">Marshall Islands (+692)</option><option data-dial-code="596" data-country-code="mq">Martinique (+596)</option><option data-dial-code="222" data-country-code="mr">Mauritania (+222)</option><option data-dial-code="230" data-country-code="mu">Mauritius (+230)</option><option data-dial-code="262" data-country-code="yt">Mayotte (+262)</option><option data-dial-code="52" data-country-code="mx">Mexico (+52)</option><option data-dial-code="691" data-country-code="fm">Micronesia (+691)</option><option data-dial-code="373" data-country-code="md">Moldova (+373)</option><option data-dial-code="377" data-country-code="mc">Monaco (+377)</option><option data-dial-code="976" data-country-code="mn">Mongolia (+976)</option><option data-dial-code="382" data-country-code="me">Montenegro (+382)</option><option data-dial-code="1664" data-country-code="ms">Montserrat (+1664)</option><option data-dial-code="212" data-country-code="ma">Morocco (+212)</option><option data-dial-code="258" data-country-code="mz">Mozambique (+258)</option><option data-dial-code="95" data-country-code="mm">Myanmar (+95)</option><option data-dial-code="264" data-country-code="na">Namibia (+264)</option><option data-dial-code="674" data-country-code="nr">Nauru (+674)</option><option data-dial-code="977" data-country-code="np">Nepal (+977)</option><option data-dial-code="31" data-country-code="nl">Netherlands (+31)</option><option data-dial-code="687" data-country-code="nc">New Caledonia (+687)</option><option data-dial-code="64" data-country-code="nz">New Zealand (+64)</option><option data-dial-code="505" data-country-code="ni">Nicaragua (+505)</option><option data-dial-code="227" data-country-code="ne">Niger (+227)</option><option data-dial-code="234" data-country-code="ng">Nigeria (+234)</option><option data-dial-code="683" data-country-code="nu">Niue (+683)</option><option data-dial-code="672" data-country-code="nf">Norfolk Island (+672)</option><option data-dial-code="850" data-country-code="kp">North Korea (+850)</option><option data-dial-code="1670" data-country-code="mp">Northern Mariana Islands (+1670)</option><option data-dial-code="47" data-country-code="no">Norway (+47)</option><option data-dial-code="968" data-country-code="om">Oman (+968)</option><option data-dial-code="92" data-country-code="pk">Pakistan (+92)</option><option data-dial-code="680" data-country-code="pw">Palau (+680)</option><option data-dial-code="970" data-country-code="ps">Palestine (+970)</option><option data-dial-code="507" data-country-code="pa">Panama (+507)</option><option data-dial-code="675" data-country-code="pg">Papua New Guinea (+675)</option><option data-dial-code="595" data-country-code="py">Paraguay (+595)</option><option data-dial-code="51" data-country-code="pe">Peru (+51)</option><option data-dial-code="63" data-country-code="ph">Philippines (+63)</option><option data-dial-code="48" data-country-code="pl">Poland (+48)</option><option data-dial-code="351" data-country-code="pt">Portugal (+351)</option><option data-dial-code="1" data-country-code="pr">Puerto Rico (+1)</option><option data-dial-code="974" data-country-code="qa">Qatar (+974)</option><option data-dial-code="262" data-country-code="re">Réunion (+262)</option><option data-dial-code="40" data-country-code="ro">Romania (+40)</option><option data-dial-code="7" data-country-code="ru">Russia (+7)</option><option data-dial-code="250" data-country-code="rw">Rwanda (+250)</option><option data-dial-code="590" data-country-code="bl">Saint Barthélemy (+590)</option><option data-dial-code="290" data-country-code="sh">Saint Helena (+290)</option><option data-dial-code="1869" data-country-code="kn">Saint Kitts and Nevis (+1869)</option><option data-dial-code="1758" data-country-code="lc">Saint Lucia (+1758)</option><option data-dial-code="590" data-country-code="mf">Saint Martin (+590)</option><option data-dial-code="508" data-country-code="pm">Saint Pierre and Miquelon (+508)</option><option data-dial-code="1784" data-country-code="vc">Saint Vincent and the Grenadines (+1784)</option><option data-dial-code="685" data-country-code="ws">Samoa (+685)</option><option data-dial-code="378" data-country-code="sm">San Marino (+378)</option><option data-dial-code="239" data-country-code="st">São Tomé and Príncipe (+239)</option><option data-dial-code="966" data-country-code="sa">Saudi Arabia (+966)</option><option data-dial-code="221" data-country-code="sn">Senegal (+221)</option><option data-dial-code="381" data-country-code="rs">Serbia (+381)</option><option data-dial-code="248" data-country-code="sc">Seychelles (+248)</option><option data-dial-code="232" data-country-code="sl">Sierra Leone (+232)</option><option data-dial-code="65" data-country-code="sg">Singapore (+65)</option><option data-dial-code="1721" data-country-code="sx">Sint Maarten (+1721)</option><option data-dial-code="421" data-country-code="sk">Slovakia (+421)</option><option data-dial-code="386" data-country-code="si">Slovenia (+386)</option><option data-dial-code="677" data-country-code="sb">Solomon Islands (+677)</option><option data-dial-code="252" data-country-code="so">Somalia (+252)</option><option data-dial-code="27" data-country-code="za">South Africa (+27)</option><option data-dial-code="82" data-country-code="kr">South Korea (+82)</option><option data-dial-code="211" data-country-code="ss">South Sudan (+211)</option><option data-dial-code="34" data-country-code="es">Spain (+34)</option><option data-dial-code="94" data-country-code="lk">Sri Lanka (+94)</option><option data-dial-code="249" data-country-code="sd">Sudan (+249)</option><option data-dial-code="597" data-country-code="sr">Suriname (+597)</option><option data-dial-code="47" data-country-code="sj">Svalbard and Jan Mayen (+47)</option><option data-dial-code="268" data-country-code="sz">Swaziland (+268)</option><option data-dial-code="46" data-country-code="se">Sweden (+46)</option><option data-dial-code="41" data-country-code="ch">Switzerland (+41)</option><option data-dial-code="963" data-country-code="sy">Syria (+963)</option><option data-dial-code="886" data-country-code="tw">Taiwan (+886)</option><option data-dial-code="992" data-country-code="tj">Tajikistan (+992)</option><option data-dial-code="255" data-country-code="tz">Tanzania (+255)</option><option data-dial-code="66" data-country-code="th">Thailand (+66)</option><option data-dial-code="670" data-country-code="tl">Timor-Leste (+670)</option><option data-dial-code="228" data-country-code="tg">Togo (+228)</option><option data-dial-code="690" data-country-code="tk">Tokelau (+690)</option><option data-dial-code="676" data-country-code="to">Tonga (+676)</option><option data-dial-code="1868" data-country-code="tt">Trinidad and Tobago (+1868)</option><option data-dial-code="216" data-country-code="tn">Tunisia (+216)</option><option data-dial-code="90" data-country-code="tr">Turkey (+90)</option><option data-dial-code="993" data-country-code="tm">Turkmenistan (+993)</option><option data-dial-code="1649" data-country-code="tc">Turks and Caicos Islands (+1649)</option><option data-dial-code="688" data-country-code="tv">Tuvalu (+688)</option><option data-dial-code="1340" data-country-code="vi">U.S. Virgin Islands (+1340)</option><option data-dial-code="256" data-country-code="ug">Uganda (+256)</option><option data-dial-code="380" data-country-code="ua">Ukraine (+380)</option><option data-dial-code="971" data-country-code="ae">United Arab Emirates (+971)</option><option data-dial-code="44" data-country-code="gb">United Kingdom (+44)</option><option data-dial-code="1" data-country-code="us">United States (+1)</option><option data-dial-code="598" data-country-code="uy">Uruguay (+598)</option><option data-dial-code="998" data-country-code="uz">Uzbekistan (+998)</option><option data-dial-code="678" data-country-code="vu">Vanuatu (+678)</option><option data-dial-code="39" data-country-code="va">Vatican City (+39)</option><option data-dial-code="58" data-country-code="ve">Venezuela (+58)</option><option data-dial-code="84" data-country-code="vn">Vietnam (+84)</option><option data-dial-code="681" data-country-code="wf">Wallis and Futuna (+681)</option><option data-dial-code="212" data-country-code="eh">Western Sahara (+212)</option><option data-dial-code="967" data-country-code="ye">Yemen (+967)</option><option data-dial-code="260" data-country-code="zm">Zambia (+260)</option><option data-dial-code="263" data-country-code="zw">Zimbabwe (+263)</option><option data-dial-code="358" data-country-code="ax">Åland Islands (+358)</option>
                                    </select>
                                        <input type="hidden" id="country_code" name="country_code"/>
                                    </div>
                                    <div class="col-lg-6 has-danger">
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
                                <!--<div class="form-group m-form__group has-danger">
                                    <select class="form-control m-input m-input--square" id="traffic" name="traffic">
                                        <option value="0">Trafic</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <div id="traffic-error" class="form-control-feedback hide">This field is required.</div>
                                </div>
                                <br>-->
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
								<div class="row form-group m-form__group m-login__form-sub has-danger">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--focus">
										<input type="checkbox" name="agree" id="agree"> I Agree the <a href="#" class="m-link m-link--focus">terms and conditions</a>.
										<span></span>
										</label><br>
                                        <div id="agree-error" class="form-control-feedback hide">This field is required.</div>
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
							<form class="m-login__form m-form" action="<?php echo DIR_ROOT.DIR_FORM."lstpw.php";?>" method="post">
								<div class="form-group m-form__group has-danger">
									<input class="form-control m-input" type="text" placeholder="Email" name="lstpwemail" id="lstpwemail" autocomplete="off">
                                    <div id="lstpwemail-error" class="form-control-feedback hide">This field is required.</div>
                                    <div id="lstpwemail-error1" class="form-control-feedback hide">Invalid Email.</div>
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
            <!-- <script src="assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>-->
                <script src="<?php echo DIR_ROOT.DIR_JS;?>lgn_reg.js" type="text/javascript"></script>
                <!--end::Page Snippets -->   
<script>
$( document ).ready(function() {
   var countryCode = $(this).find(':selected').data('dial-code');
    if (countryCode) {
        $('#country_code').val(countryCode);
    }
});
$('#countrycode').change(function () {
    var countryCode = $(this).find(':selected').data('dial-code');
    if (countryCode) {
        $('#country_code').val(countryCode);
    }
});
</script>                 
            </body>
    <!-- end::Body -->
</html>