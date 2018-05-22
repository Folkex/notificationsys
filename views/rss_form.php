<?php
include ('header.php');?>		
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">		
<?php include('leftmenu.php'); ?>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h4 style="margin-left:18px; margin-top:10px;">RSS-to-push</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12" >
          <div class="m-portlet m-portlet--mobile" style="width: 1132PX;margin-left: 16px;height: auto;" id="port">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<div class="row">
                                <div class="col-lg-12 box" style="width: 1077px;margin-left: 6px;margin-top: 27px;height: 172px;background-color:#f5f5f5">
                                    <div class="row" >
                                        <div class="col-lg-8" >
                                            <h5 style="margin-top:10px;">RSS feed URL </h5>
                                            <div style="" class="form-group m-form__group row">
                            <div class="col-lg-3">
                                <input class="form-control1 m-input" value="Add your RSS URL here" id="example-text-input" type="text" style="width: 614px;">
                            </div>
                            <div>
                         </div>
                        </div>
                        </div>
                         </div>
                        <label class="m-checkbox">
				        <input type="checkbox">Auto-hide notification after 20 seconds.
				        <span></span>
				        </label><br>
                        <button class="btn" style="background-color:#09c;">Add RSS</button> <button class="btn" style="background-color:#C55858;display:none;" id="remove">Remove</button>
                        
                        <h5 class="change-title" >Change default notification content</h5>
                        <div class="change-div1">
                        <div class="col-xs-3 change-div2">
                        <img src="../images/cpa.png" width="80" class="img-style">
                        <div class="change-logo" >
                            <span>
                                Change image
                            </span>
                            <i class="fa fa-refresh fa-spin fa-fw refresh "></i>
                            <form enctype="multipart/form-data">
                            <input accept="image/*" class="change-image-file" type="file"></form>
                        </div>
                        </div>
                        <div class="col-xs-9 change-div3">
                            <p class="p1">
                                <span class="sp1" contenteditable="false" id="txt" >First 96 chars of your post title</span>
                                <input class="input1" contenteditable="true" id="em" type="text" >
                                <img style="display: inline;" src="../images/edit.svg" id="img">
                                
                            </p>
                            <p style="p2">
                                <span class="sp2" contenteditable="false" id="txt1">
                                  First 255 chars of your post message  
                                </span>
                                <input class="input2" contenteditable="true" id="em1" type="text" >
                                <img style="display: inline;" src="../images/edit.svg" id="img1">
                                
                            </p>
                            <p class="p-email" ><span>ibra-ak95.pushcrew.com</span></p>
                        </div>
                        </div>
                
                        </div><br><br>
                                 <div id="new_rss">
                                </div>
                                <div style="color:#09c;cursor:pointer;margin-left: 3px;" id="add_rss" class="row">+ Add another RSS feed</div> 
                                 <input type="hidden" id="hide" value="">

                               
                            </div>
						</h3>
					</div>			
				</div>
			</div>
			
		</div>
        </div>
        
    </div>
</div>
</div>
<script>
 $(document).ready(function(){
    $("#add_rss").click(function(){
    var count;
    var count1=$("#hide").val();
    if(count1=="")
     {
                   count=0;   
    }
             else
             {
                 count=count1;
             }
        count++;
        var txt="RSS feed URL"+count;
        var btn_id="remove"+count;
        var div_id="row"+count;
     
        $("#new_rss").append("<br><div class='row' id='"+div_id+"'><div class='col-lg-12 box' style='width: 1077px;margin-left: 21px;margin-top: 27px;height: 172px;background-color:#f5f5f5'><div class='row'> <div class='col-lg-8' ><h5 style='margin-top:10px;'>"+txt+"</h5><div style='' class='form-group m-form__group row'><div class='col-lg-3'><input class='form-control1 m-input' value='Add your RSS URL here' id='example-text-input' type='text' style='width: 614px;'></div><div></div></div></div></div><label class='m-checkbox'><input type='checkbox'>Auto-hide notification after 20 seconds.<span></span></label><br><button class='btn' style='background-color:#09c;'>Add RSS</button> <button class='btn' style='background-color:#C55858;' id='"+btn_id+"' onclick='remove(this.id)'>Remove</button><h5 class='change-title' >Change default notification content</h5><div class='change-div1'><div class='col-xs-3 change-div2'><img src='../images/cpa.png' width='80' class='img-style'><div class='change-logo'><span>Change image</span><i class='fa fa-refresh fa-spin fa-fw refresh '></i><form enctype='multipart/form-data'><input accept='image/*' class='change-image-file' type='file'></form></div></div><div class='col-xs-9 change-div3'><p class='p1'><span class='sp1' contenteditable='false' id='txt' >First 96 chars of your post title</span><input class='input1' contenteditable='true' id='em' type='text' ><img style='display: inline;' src='../images/edit.svg' id='img'></p><p style='p2'><span class='sp2' contenteditable='false' id='txt1'>First 255 chars of your post message  </span><input class='input2' contenteditable='true' id='em1' type='text' ><img style='display: inline;' src='../images/edit.svg' id='img1'></p><p class='p-email' ><span>ibra-ak95.pushcrew.com</span></p></div></div></div></div>");
     
        $("#remove").attr("style","display:inline;background-color:#C55858");
        $("#hide").val(count);
        var count1=$("#hide").val();
    });
});
    
$(document).ready(function(){
        $("#remove").click(function(){
        var count_val=$("#hide").val();
        var text="#row"+count_val;
        $(text).remove();
        count_val=count_val-1;
        if(count_val==0)
          {
            $("#remove").attr("style","display:none;background-color:#C55858");
          }
        $("#hide").val(count_val);
    });
    });   
</script>

<script>
   function remove(btn_id)
    {
        $(document).ready(function(){
            var id=btn_id.substring(6,7);
            var next_id=+id + +1;
            var div_id="#row"+id;
            var div_nextid="#row"+next_id;
            var count_val=$("#hide").val();
            if($(div_nextid).length>0)
                {
                    $(div_nextid).remove();
                }
            else
                {
                    $(div_id).remove();
                }
            count_val=count_val-1;
            if(count_val==0)
                {
                  $("#remove").attr("style","display:none;background-color:#C55858");
                }
            $("#hide").val(count_val);
        });
    }
</script>
<script>
    $(document).ready(function(){
        $("#img").click(function(){
            $("#txt").attr("style","display:none");
            $("#img").attr("style","display:none");
            $("#em").attr("style","display:inline");
            
        });
    });
        $(document).ready(function(){
        $("#img1").click(function(){
            $("#txt1").attr("style","display:none");
            $("#img1").attr("style","display:none");
            $("#em1").attr("style","display:inline");
            
        });
    });
</script>
<?php include('footer.php'); ?>