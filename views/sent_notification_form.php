<?php
include ('header.php');?>		
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">		
<?php include('leftmenu.php'); ?>							
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="row">
        <div class="col-lg-12" > 
            <h3 style="margin-left: 10px !important;margin-top: 10px;">Sent Notifications</h3>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-6">
            <div class="m-portlet m-portlet--mobile" style="margin-left: 10px;width: 1146px;height:auto !important;">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<div class="table-responsive" style="width: 1118px;margin-left: -17px;">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Notification</th>
                                            <th>Clicks</th>
                                            <th>Delivered</th>
                                            <th>Click Rate <br>(Click/Delivered)</th>
                                            <th>Sent at <br> (GMT+03:00) Asia/Beirut</th>
                                            <th></th></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="text-left">
                                                    <img src="../images/cpa.png" width="20" height="20">
                                                    <span class="pl10">test 3</span>
                                                </div>
                                            </td>
                                        <td class="text-left">
                                        1</td>
                                            <td>1</td>
                                            <td>100</td>
                                            <td>May 02, 2018 10:56 AM</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-default" href="send_notification_form.php">Duplicate</a>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_4">View Details</button></div></td></tr></tbody></table></div>
						</h3>
					</div>			
				</div>
			</div>
		</div>
            <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel" style="padding-left:249px;" >Sent Notification Details</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group m-form__group row">
        <div class="col-lg-6 top">
            <div style="margin-top: -64px;font-size: 27px;" >
                <span >Previews</span>
                <i class="fa fa-info-circle" aria-describedby="popover-trigger-hover-focus"></i>
            </div>
            <div class="modal-div1" >
                <div  class="modal-div2" >
                <i aria-hidden="true" class="fa fa-chrome pr5 label-preview"></i>
                    Chrome on windows
                </div>
                <div class="chrome-windows-div1">
                    <div class="col-xs-3" class="chrome-windows-div2" >
                        <img src="../images/cpa.png" width="80" class="chrome-windows-image">
                      
                        <div class="col-xs-9 chrome-windows-text-div" >
                            <p style="" class="chrome-windows-p1" >
                            <span class="chrome-windows-sp1" >test 3</span>
                            </p>
                            <p  class="chrome-windows-p2">
                                <span class="chrome-windows-sp2" >this is a test only</span>
                            </p>
                            <p class="chrome-windows-p3">
                                <span class="chrome-windows-sp3">ibra-ak95.pushcrew.com</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-div3">
                <span class="modal-span3" >
                    <i aria-hidden="true" class="fa fa-firefox pr5 label-preview"></i>
                    FireFox on windows
                </span>
                <div class="firefox-windows-div1">
                    <div class="firefox-windows-div2">
                        <div style="color: #2c2c2c;" >
                            <strong>test 3</strong>
                        </div>
                    </div>
                    <div class="firefox-windows-div3" >
                        <div class="firefox-windows-div4" >
                            <img src="../images/cpa.png" width="80" height="80" style="display: block;">
                        </div>
                        <div class="firefox-windows-div5">
                            <div class="firefox-windows-div6">This is a test only</div>
                            <div >
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
            <div class="modal-div4" >
                <span class="modal-span4">
                    <i aria-hidden="true" class="fa fa-android pr5 label-preview"></i>
                    Chrome on android
                </span>
                <div class="chrome-android-div1" >
                    <div class="chrome-android-div2">
                        <div class="col-xs-2" class="chrome-android-div3" >
                            <img src="../images/cpa.png" class="chrome-android-img" >
                        </div>
                        <div class="col-xs-10" class="chrome-android-div4" >
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
            <div class="modal-div5" >
                <div class="chrome-mac-div1" >
                    <i aria-hidden="true" class="fa fa-chrome pr5 label-preview"></i>
                    Chrome on Mac
                </div>
            <div class="m-portlet__body chrome-mac-div2">
							<div class="col-xs-2 chrome-mac-div3">
                                <img src="../images/chrome.png" class="chrome-mac-img1"></div>
							<div class="col-xs-2 chrome-mac-div4">
                                <span class="chrome-mac-sp1">Notification Title</span><br> 
                                <span class="chrome-mac-sp1">pushcrew.com</span><br>
                                <span class="chrome-mac-sp1">Notification Message</span></div>
							<div class="col-xs-2 chrome-mac-div5">
                                <img src="../images/cpa.png" class="chrome-mac-img2"></div>
                                <div class="col-xs-2 chrome-mac-div6">
                                    <div class="chrome-mac-div7">Close</div>
                                    <div class="chrome-mac-div8">
                                        <span>Settings</span>
                                    </div>
                                    
                                </div>

						</div>
            </div>
   
            
            
        </div>
            <div class="col-lg-6 top">
                <div class="not-det-div1">
                    <div>
                        <div class="not-det-div2" >
                            <div class="not-det-div3">Delivered</div>
                            <div class="not-det-div4">1</div>
                        </div>
                         <div class="not-det-div2">
                            <div class="not-det-div3">Total clicks</div>
                            <div class="not-det-div4">1</div>
                        </div>
                         <div class="not-det-div2">
                            <div class="not-det-div3">Click rate</div>
                            <div class="not-det-div4">100%</div>
                        </div>
                       
       
                    
                    </div>
                </div>
                <div class="not-det-div5">
                    <div>
                        <div class="not-det-url" >Default Notifications URL</div>
                        <div class="not-det-url-color" >
                        <a class="break-world" href="http://ibra-ak95.com/latestpost-view.php?latestpostsId=6&amp;utm_source=browser&amp;utm_medium=push_notification&amp;utm_campaign=PushCrew_notification_1525236930" target="_blank">http://ibra-ak95.com/latestpost-view.php?latestpostsId=6&utm_source=browser&utm_medium=push_notification&utm_campaign=PushCrew_notification_1525236930</a>
                        </div>
                    </div>
                    <div>
                        <div class="not-det-ttl" >
                            <div class="not-det-txt">Time to live</div>
                            <div> 28 days</div>
                        </div>
                    </div>
                    <div>
                        <div class="sent-subscribers">
                            <div class="sent-subscribers-txt">sent to(2 subscribers)</div>
                            <div>All subscribers</div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
      
    </div>
  </div>
</div>

        </div>
    </div>
    
</div>
</div>
<?php include('footer.php'); ?>