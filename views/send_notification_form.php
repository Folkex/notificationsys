<?php
include ('header.php');?>		
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">		
<?php include('leftmenu.php'); ?>
	
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
	<div class="d-flex align-items-center">
 		<div class="mr-auto">
 			<h3 class="m-subheader__title ">Send Push Notifications</h3>			
		</div>
  		</div>	
  		</div>
	<div class="m-portlet" id="send_notf_form">
			<!--begin::Form-->
			<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
				<div class="m-portlet__body">	
					<div class="form-group m-form__group row">
						<div class="col-lg-6 top" style="">
							<label>Notification Title</label>
							<textarea class="form-control m-input m-input--solid" id="exampleTextarea" rows="2" placeholder="96 characters max"></textarea>
							</div>
						<div class="col-lg-6" >
							<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon">
							<i class="fa fa-chrome"></i>
							</span>
							<h3 class="m-portlet__head-text">
							Chrome on Windows
							</h3>
							</div>			
							</div>
							</div>
							<div class="m-portlet__body box" >
		<!--begin::Content-->
		<div class="tab-content">
			<div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
				<!--begin::m-widget5-->
				<div class="m-widget5">
					<div class="m-widget5__item">
						<div class="m-widget5__pic"> 
							<img class="m-widget7__img img1" src="../images/cpa.png" alt="" style="">  
						</div>
						<div class="m-widget5__content">
							<span class="m-widget5__title">
								Notification Title
							</span><br>
							<span class="m-widget5__title">
								Notification Message
							</span><br>
							<span class="m-widget5__title">
								Nouralhouda@gmail.com
							</span>
						</div>
					</div>
					
				</div>
				<!--end::m-widget5-->
			</div>
			</div>
		</div>
		<!--end::Content-->
	</div>
				</div>	 
					<div class="form-group m-form__group row">
						<div class="col-lg-6 top">
							<label>Message</label>
							<div class="m-input-icon m-input-icon--right">
								<textarea class="form-control m-input m-input--solid" id="exampleTextarea" rows="2" placeholder="255 characters max"></textarea>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon">
							<i class="fa fa-firefox"></i>
							</span>
							<h3 class="m-portlet__head-text">
							FireFox on windows
							</h3>
							</div>			
							</div>
							</div>
							<div class="m-portlet__body body2" style=" ">
		<!--begin::Content-->
		<div class="tab-content">
			<div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
				<!--begin::m-widget5-->
				<div class="m-widget5">
					<span class="m-widget5__title">
								Notification Title
							</span><br><br>
							<span class="m-widget5__title span2" style="" >
								Notification Message
							</span>
					<div class="m-widget5__item">
						<div class="m-widget5__pic"> 
							<img class="m-widget7__img img2" src="../images/cpa.png" alt="" style="">  
						</div>
						<span class="m-widget5__title">
								Nouralhouda@gmail.com
							</span>
					</div>
						
					
				</div>
				<!--end::m-widget5-->
			</div>
			</div>
		</div>
		<!--end::Content-->
	</div>
				</div>	 
					
					<div class="form-group m-form__group row">
						<div class="col-lg-6 top">
							<label>Landing Page URL</label>
							<div class="m-input-icon m-input-icon--right">
								<input class="form-control m-input" placeholder="Enter URL with http:// or https://" type="text">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon">
							<i class="fa fa-android"></i>
							</span>
							<h3 class="m-portlet__head-text">
							Chrome on Android
							</h3>
							</div>			
							</div>
							</div>
							<div class="m-portlet__body body3" >
		<!--begin::Content-->
		<div class="tab-content">
			<div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
				<!--begin::m-widget5-->
				<div class="m-widget5">
					<div class="m-widget5__item">
						<div class="m-widget5__pic"> 
							<img class="m-widget7__img" src="../images/cpa.png" alt="" style="width: 62px; float: left;margin-top: 9px; margin-left: -15px;">  
						</div>
						<div class="m-widget5__content">
							<span class="m-widget5__title">
								Notification Title
							</span><br>
							<span class="m-widget5__title">
								Notification Message
							</span>
						</div>
					</div>
					
				</div>
				<!--end::m-widget5-->
			</div>
			</div>
		</div>
		<!--end::Content-->
	</div>
					</div>	
						<div class="form-group m-form__group row">
						<div class="col-lg-6">
						<label>Image</label><div class="col-md-10"><div class="notification-min-height col-xs-3 p0"><img class="width-80 pull-left" src="../images/cpa.png" width="80"><div class="change-logo-text width-80 text-center cursor-pointer "><form enctype="multipart/form-data"><input accept="image/*" class="change-image-file cursor-pointer 
            			" type="file"></form></div></div>
            			<div></div><br><br><br>
            			<p class="mb0"><span class="text-grey-color pt5 font-11 image-info-align block">Recommended Size: 192 X 192</span></p><p class="text-danger mt100 pos--absolute hide "></p></div>
						</div>
						<div class="col-lg-6">
							<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon">
							<i class="fa fa-chrome"></i>
							</span>
							<h3 class="m-portlet__head-text">
							Chrome on Mac 
							</h3>
							</div>			
							</div>
							</div><br>
							<div class="m-portlet__body" style="background: #F0F0F0;border-radius: 5px;border: 1px solid #ccc; min-height: 89px;width: 362px !important;">
							<div style="margin-top: 10px !important;padding: 10px !important;" class="col-xs-2"><img src="../images/chrome.png" style="width: 40px; float: left !important;border: 0;margin-left: -25px;"></div>
							<div style="margin-top: -15px;margin-right: 60px;" class="col-xs-2"><span style="margin-left: 13px;">Notification Title</span><br> <span style="margin-left: 13px;">pushcrew.com</span><br><span style="margin-left: 13px;">Notification Message</span></div>
							<div style="margin-right: 56px;" class="col-xs-2"><img src="../images/cpa.png" style="width: 40px; float: right !important;border: 0;margin-right: 16px;margin-top: -58px;"></div>
                                <div style="border-left: 1px solid #ccc;height: 87px;width: 90px;padding: 0 !important; margin-left:245px;margin-top: -78px;" class="col-xs-2">
                                    <div style="border-bottom:1px solid #ccc;text-align: center;height: 44px;line-height: 40px;width:83px;">Close</div>
                                    <div style="text-align: center;height: 40px;line-height: 40px;">
                                        <span>Settings</span>
                                    </div>
                                    
                                </div>

						</div>
						

						</div>
					</div>	 
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<div>
								<label class="m-checkbox">
											<input type="checkbox">Show Big Image in Notification
											<span></span>
											</label><br>
											<span>Big size images are only supported on Chrome (56+) browser</span>
											<div style="display: none; ">
												<button type="button" class="btn btn-primary">Upload</button><br>
												<span>Recommended Size: 600 X 400</span>
											</div>
							</div>
						</div>
					</div>	
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<div>
								<label class="m-checkbox">
											<input type="checkbox">Enable Button(s) on Chrome Notification
											<span></span>
											</label><br>
											<span>Call to action buttons are only supported on Chrome browser</span><br><br>
											<div style="visibility: ;">
												<button type="button" class="btn btn-secondary">One button</button>  <button type="button" class="btn btn-primary">two buttons</button><br>
											</div><br>
											<div class="container" style="display: none;">
												<label>Button text</label>
												<input class="form-control m-input m-input--solid" id="exampleTextarea" rows="2" placeholder="36 characters max" type="text"><br>
												<label>Landing Page URL</label>
												<input class="form-control m-input m-input--solid" id="exampleTextarea" placeholder="Enter URL with http:// or https://"  type="text">
											</div><br>
												<div class="container" style="display: none;">
												<label>Button text</label>
												<input class="form-control m-input m-input--solid" id="exampleTextarea" rows="2" placeholder="36 characters max" type="text"><br>
												<label>Landing Page URL</label>
												<input class="form-control m-input m-input--solid" id="exampleTextarea" placeholder="Enter URL with http:// or https://"  type="text">
											</div>
							</div>
						</div>
					</div>	  
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
						<label class="">Send to</label><br>
						<button type="button" class="btn btn-secondary ">All subscribers</button>
						<button type="button" class="btn btn-primary ">Segments</button><br><br>
						<div class="m-stack__demo-item">Notification will be sent to all 2 subscribers</div>
						</div>
					</div> 
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
						<label class="">Advanced Options</label><br>
						<label class="m-checkbox">
						<input type="checkbox">Auto-hide notification after 20 seconds.<i class="fa fa-question-circle"></i>
						<span></span>
						</label><br>
						Don't attempt sending this notification
						<div class="form-group m-form__group row" >
							
						<div class="inline-block col-lg-3"><label class="font-weight-400" for="days">Days</label>
							<select class="form-control m-input" id="exampleSelect1" style="width: 47px;" >
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select><span style="text-align: left;">From Now</span>
						</div>
					
					
						<div class="inline-block inline-block col-lg-3"><label class="font-weight-400" for="days">Hours</label>
							<select class="form-control m-input" id="exampleSelect1" style="width: 47px;" >
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						</div>
						<div class="inline-block inline-block col-lg-3"><label class="font-weight-400" for="days">Minutes</label>
							<select class="form-control m-input" id="exampleSelect1" style="width: 47px;" >
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						</div>

						</div>
					</div>
					</div>  
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<div>
								<label class="m-checkbox">
											<input type="checkbox">Schedule Notification(Current time is 08-05-2018 15:10:59 GMT+03:00 Asia/Beirut)
											<span></span>
											</label><br>
											
							</div>
							<div class="form-group m-form__group row" >
							
						<div class="inline-block col-lg-6">
							<label class="font-weight-400" for="days">Date</label>
							<div class="input-group date">
						<input class="form-control m-input" readonly="" placeholder="Select date" id="m_datepicker_2" type="text">
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-calendar-check-o"></i>
							</span>
						</div>
					</div>
						
						</div>
					
					
						<div class="inline-block inline-block col-lg-3"><label class="font-weight-400" for="days">Hours</label>
							<select class="form-control m-input" id="exampleSelect1" style="width: 47px;" >
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						</div>
						<div class="inline-block inline-block col-lg-3"><label class="font-weight-400" for="days">Minutes</label>
							<select class="form-control m-input" id="exampleSelect1" style="width: 47px;" >
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						</div>

						</div>
						</div>
					</div>	           
	            </div>
	            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions--solid">
						<div class="row">
							<div class="col-lg-6">
								<button type="Submit" class="btn btn-primary btn-lg" style="margin-left: 30px;margin-bottom: 10px;">Send Notification</button>
								
							</div>
							
						</div>
					</div>
				</div>

			</form>
			<!--end::Form-->
		</div>

</div>
</div>
<?php include('footer.php'); ?>
