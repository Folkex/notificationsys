<?php
include ('header.php');?>		
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">		
<?php include('leftmenu.php'); ?>							
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-portlet1">
			<div class=" head1">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title" style="margin-top: 17px;">
						<span class="m-portlet__head-text">
<strong>IMPORTANT:</strong>Your subscribers are currently attached to the common FCM (earlier GCM) API key of PushCrew. Though you can continue sending notifications,to be able to<a href="#" class="a1"> export your subscriber list</a> later, we highly recommend that you add your own FCM (earlier GCM) Project Number and FCM (earlier GCM) API Key. <a href="#" class="a1">Here’s how to do it (takes just 5 minutes).</a>
						</span><br><br>
                        <div style="" class="form-group m-form__group row">
                            <div class="col-lg-3">
                                <input class="form-control1 m-input" value="FCM (earlier GCM) Project Number" id="example-text-input" type="text">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control1 m-input" value="FCM (earlier GCM) Project Number" id="example-text-input" type="text">
                            </div>
                            <button type="reset" class="btn btn-metal1">Submit</button>
                        </div>
					</div>
				</div>
			</div>
		</div><br>
    <div class="col-xs-12 col-sm-5 subscribers ">
        <div class="subscribers-det">
            <div class="subscribers-det1">
                <img src="../images/user.svg" class="subs-img">
            </div>
             <div class="subs-txt">
                    <div class="subs-txt1">Total subscribers</div>
                    <div class="subs-txt2">2</div>
                </div>
        </div>
    
    </div>
    <div class="col-xs-12 col-sm-7 left-side">
        <div class="left-div1">
            <div class="col-xs-4" class="left-div2">
                <div class="sub-txt1 left-subs">Subscribes for today</div>
                <div class="left-subs-nb left-subs-nb">0</div>
                <div  class="sub-txt1 left-unsubs">Unsubscribes for today</div>
                <div  class="left-unsubs-nb">0</div>
                <div class="left-view">
                    
                        <a href="reports-form.php" class="left-view-link">View more</a>
                
                </div>
            </div>
        </div>
    
    </div><br>
    <div class="total-subs">
        <div class="row-subs">
            <div class="col-sm-12 row-subs1">
                <h5 class="h5-subs"> Browser Distribution</h5>
            </div>
            <div class="col-sm-12 table-subs-div">
                <table class="table-subs">
                    <tbody>
                        <tr>
                            <td>Chrome for Desktop</td>
                            <td class="td-cd-subs">50.0% (1)</td>
                        </tr>
                        <tr>
                            <td style="" class="txt-subs-fd">Firefox for Desktop</td>
                            <td class="td-subs-fd">50.0% (1)</td>
                        </tr><tr>
                        <td>Opera for Desktop</td>
                        <td class="td-od-subs" >0.0% (0)</td>
                        </tr>
                        <tr>
                            <td class="txt-ca-subs">Chrome for Android</td>
                            <td class="td-ca-subs" >0.0% (0)</td>
                        </tr>
                        <tr>
                            <td>Firefox for Android</td>
                            <td class="td-fa-subs">0.0% (0)</td>
                        </tr>
                        <tr>
                            <td class="txt-oa-subs">Opera for Android</td>
                            <td class="td-oa-subs" >0.0% (0)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12" style="margin-top: -377px !important;padding-right: 0 !important; margin-left:611px;">
        <div style="margin-right: -10px;margin-left: -10px;">
            <div style="margin-bottom: 10px !important;" class="col-sm-12">
                <h5 style="font-size: 14px;font-weight: 700;margin-top: 10px;margin-bottom10px;font-family: inherit;line-height:1.1;color: inherit"> Platform Distribution</h5>
            </div>
        </div>
    </div>
</div>
</div>
<?php include('footer.php'); ?>