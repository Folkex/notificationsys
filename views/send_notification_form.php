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
							<div class="m-portlet__body " >
		<div class="chrome-windows-div1">
                    <div class="col-xs-3">
                        <img src="../images/cpa.png" class="chrome-windows-image" width="80">
                      
                        <div class="col-xs-9 chrome-windows-text-div">
                            <p style="" class="chrome-windows-p1">
                            <span class="chrome-windows-sp1">test 3</span>
                            </p>
                            <p class="chrome-windows-p2">
                                <span class="chrome-windows-sp2">this is a test only</span>
                            </p>
                            <p class="chrome-windows-p3">
                                <span class="chrome-windows-sp3">ibra-ak95.pushcrew.com</span>
                            </p>
                        </div>
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
							<div class="m-portlet__body " style=" ">
                                <div class="firefox-windows-div1">
                    <div class="firefox-windows-div2">
                        <div style="color: #2c2c2c;">
                            <strong>test 3</strong>
                        </div>
                    </div>
                    <div class="firefox-windows-div3">
                        <div class="firefox-windows-div4">
                            <img src="../images/cpa.png" style="display: block;" width="80" height="80">
                        </div>
                        <div class="firefox-windows-div5">
                            <div class="firefox-windows-div6">This is a test only</div>
                            <div>
                                <div class="firefox-windows-div7">
                                    via ibra-ak95.pushcrew.com
                                </div>
                                <div class="firefox-windows-div8">
                                    <i class="fa fa-cog"></i>
                                </div>
                            </div>
                        </div>
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
							<div class="m-portlet__body " >
		<!--begin::Content-->
		<div class="chrome-android-div1">
                    <div class="chrome-android-div2">
                        <div class="col-xs-2">
                            <img src="../images/cpa.png" class="chrome-android-img">
                        </div>
                        <div class="col-xs-10">
                            <p class="chrome-android-p1">
                                <span class="chrome-android-sp1">Test 3</span>
                            </p>
                            <p class="chrome-android-p2">
                                <span class="chrome-android-sp2">This is a test only</span>
                            </p>
                        </div>
                    </div>
                </div>
		</div>
		<!--end::Content-->
	</div>
					</div>	
						<div class="form-group m-form__group row">
						<div class="col-lg-6">
						<label>Image</label>
                            <div class="col-md-10">
                            <div class="col-xs-3 p0">
                                <img class="pull-left" src="../images/cpa.png" width="80">
                                <div class="change-logo-text">
                                    <span>
                                        Change
                                        <i class="fa fa-refresh fa-spin fa-fw none"></i>
                                    </span>
                                    <form enctype="multipart/form-data">
                                        <input accept="image/*" class="browse-image" type="file"></form></div></div>
            			<div></div><br><br><br>
            			<p class="mb0">
                            <span>Recommended Size: 192 X 192</span></p></div>
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
							<div class="m-portlet__body mac-body" >
							<div class="col-xs-2 send-mac-chrome">
                                <img src="../images/chrome.png" class="send-mac-chrome-img1"></div>
							<div class="col-xs-2 send-mac-chrome-div1">
                                <span class="chrome-mac-sp1">Notification Title</span><br> 
                                <span class="chrome-mac-sp1">pushcrew.com</span><br>
                                <span class="chrome-mac-sp1">Notification Message</span></div>
							<div class="col-xs-2 send-chrome-mac-div2">
                                <img src="../images/cpa.png" class="send-chrome-mac-img2"></div>
                                <div class="col-xs-2 send-chrome-mac-div3">
                                    <div class="send-chrome-mac-div4" >Close</div>
                                    <div class="send-chrome-mac-div5" >
                                        <span>Settings</span>
                                    </div>
                                    
                                </div>

						</div>
						

						</div>
					</div>	 
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<div>
								<input type="checkbox" id="show_big_img" /> Show Big Image in Notification<br>
											<span>Big size images are only supported on Chrome (56+) browser</span>
											<div style="display: none;" id="upload_image">
												<button type="button" class="btn btn-primary">Upload</button><br>
												<span>Recommended Size: 600 X 400</span>
											</div>
							</div>
						</div>
					</div>	
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<div>
								<input type="checkbox" id="show_btns" /> Enable Button(s) on Chrome Notification<br>
											<span>Call to action buttons are only supported on Chrome browser</span><br><br>
											<div style="display:none;" id="btns">
												<button type="button" class="btn btn-secondary" id="one_btn">One button</button>  <button type="button" class="btn btn-primary" id="two_btns">two buttons</button><br>
											</div><br>
											<div class="container" style="display: none;" id="one_btn_form">
												<label>Button text</label>
												<input class="form-control m-input m-input--solid" id="exampleTextarea" rows="2" placeholder="36 characters max" type="text"><br>
												<label>Landing Page URL</label>
												<input class="form-control m-input m-input--solid" id="exampleTextarea" placeholder="Enter URL with http:// or https://"  type="text">
											</div><br>
												<div class="container" style="display: none;" id="two_btns_forms">
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
							<select class="form-control m-input" id="exampleSelect1" style="width: 70px;" >
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select><span style="text-align: left;">From Now</span>
						</div>
					
					
						<div class="inline-block inline-block col-lg-3"><label class="font-weight-400" for="days">Hours</label>
							<select class="form-control m-input" id="exampleSelect1" style="width: 70px;" >
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						</div>
						<div class="inline-block inline-block col-lg-3"><label class="font-weight-400" for="days">Minutes</label>
							<select class="form-control m-input" id="exampleSelect1" style="width: 70px;" >
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
											<input type="checkbox">Schedule Notification(Current time is <span id="time"></span>GMT+03:00 Asia/Beirut)
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
							<select class="form-control m-input" id="exampleSelect1" style="width: 70px;" >
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						</div>
						<div class="inline-block inline-block col-lg-3"><label class="font-weight-400" for="days">Minutes</label>
							<select class="form-control m-input" id="exampleSelect1" style="width: 70px;" >
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
<script>
    $(function () {
        $("#show_big_img").click(function () {
            if ($(this).is(":checked")) {
                $("#upload_image").show();
               
            } else {
                $("#upload_image").hide();
                
            }
        });
    });
     $(function () {
        $("#show_btns").click(function () {
            if ($(this).is(":checked")) {
                $("#btns").show();
               
            } else {
                $("#btns").hide();
                
            }
        });
    });
    $(function(){
       $("#one_btn").click(function(){
          $("#one_btn_form").show();
           $("#two_btns_forms").hide();
       });
         $("#two_btns").click(function(){
          $("#two_btns_forms").show();
             $("#one_btn_form").show();
       });
    });
    
    
  
</script>


