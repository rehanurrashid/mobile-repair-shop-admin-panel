<?php
session_start();
if( !isset($_SESSION["name"]))
    {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Request | </title>
    <!--[if lt IE 9]> <script src="assets/plugins/common/html5shiv.js" type="text/javascript"></script> <![endif]-->
    <script src="js/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css" />
    <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="assets/plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/><![endif]-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/open-sans.css">
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="css/style_default.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="images/favicon1.ico">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144x144-precomposed.png">
    <SCRIPT language=javascript src="js/body.js"></SCRIPT>
<!--     <link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendarc5b3.css?random=20051112" media="screen" />
    <script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendarcfb7.js?random=20060118"></script> -->
<!-- Script -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Searchable Select -->
    <script src='js/select.min.js' type='text/javascript'></script>
    <!-- CSS -->
    <link href='css/select.min.css' rel='stylesheet' type='text/css'>
</head>
<style type="text/css">
    input.invalid, textarea.invalid{
    border: 2px solid red;
}

input.valid, textarea.valid{
    border: 2px solid green;
}
.hide{
    display: none;
}
.show{
    display: block;
}
</style>
<body>
    <!-- scripts varibles  -->
    <script src="js/constants.js" language="javascript" type="text/javascript"></script>
    <!-- header -->
    <?php include("header.php"); ?>

    <div id="container">
        <!-- Start : container -->
        <!-- sidebar -->
        <?php include("sidebar.php"); ?>
        <div id="content">
          <!-- </div> -->
            <div class="container">
                <!-- Start : Inner Page container -->
                <div class="crumbs">
                    <!-- Start : Breadcrumbs -->
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="deskboard.php">Dashboard</a>
                        </li>
                        <li class="current">Request</li>
                    </ul>
                </div> <!-- End : Breadcrumbs -->
                <div class="page-header">
                    <!-- Start : Page Header -->
                    <div class="page-title">
                        <h3>Update Request</h3>
                        <span style="color:#CC6600;">
                        </span>
                    </div>
                </div> <!-- End : Page Header -->
                <div class="row">
                    <div class="col-md-9 col-sm-9">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-bars"></i>Update Request</div>
                            </div>
                            <div class="portlet-body">
                                <form action="request/edit.php" method="post" name="frm" enctype="multipart/form-data" onSubmit="javascript:return keshav_check();" class="form-horizontal row-border" id="validate-1" novalidate="novalidate">
                                    <input type="hidden" name="mode" id="mode" value="edit">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Select User:
                                        </label>
                                        <div class="col-md-9">
                                            <select  id='selUser' class="form-control" name="uid">
                                                <option value="0" selected>Select User</option>
                                            </select>
                                              <label class="uid_error" id="uid_error" style="color:#FC2727;margin-top: 1%"> Warning : You have to Select One Item.</label>
                                            <!-- <input type='button' value='Seleted option' id='but_read'> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Reason of damage:
                                        </label>
                                        <div class="col-md-9">
                                            <select  id='selReason' class="form-control" name="rid">
                                                <option value="" selected>Select Reason</option>
                                            </select>
                                            <label class="rid_error" id="rid_error" style="color:#FC2727;margin-top: 1%"> Warning : You have to Select One Item.</label>
                                            <!-- <input type='button' value='Seleted option' id='but_read'> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Reason of damage(if not in dropdown):
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="damag_reason" id="damag_reason" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Device:
                                        </label>
                                        <div class="col-md-9">
                                            <select id="selDevice" class="form-control" name="did">
                                              <option value="" selected>Select Device</option>
                                            </select>
                                            <label class="did_error" id="did_error" style="color:#FC2727;margin-top: 1%"> Warning : You have to Select One Item.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Device(if not in dropdown):
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="device" id="device" />
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Device Front Image:(Unbroken display)
                                        </label>
                                        <div class="col-md-9">
                                                <input class="form-control" type="file" name="device_front_image" id="device_front_image" />
                                                <p id="front_error1" style="display:none; color:#FF0000;">
                                                Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                                </p>
                                                <p id="front_error2" style="display:none; color:#FF0000;">
                                                Maximum File Size Limit is 5MB.
                                                </p>
                                        </div>
                                    </div>
                                    <div class="text-center hide" id="front_image_div">
                                        <a style="cursor: pointer;" data-toggle="modal" data-target="#modal_front_image">
                                            <img id="front_image"  class="img-thumbnail " height="200px" width="200px">
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Device Back Image:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="file" name="device_back_image" id="device_back_image" />
                                            <p id="back_error1" style="display:none; color:#FF0000;">
                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                            </p>
                                            <p id="back_error2" style="display:none; color:#FF0000;">
                                            Maximum File Size Limit is 5MB.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-center hide" id="back_image_div">
                                        <a style="cursor: pointer;" data-toggle="modal" data-target="#modal_back_image">
                                            <img id="back_image"  class="img-thumbnail" height="200px" width="200px">
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Create data backup:
                                        </label>
                                        <div class="col-md-9 d-inline">
                                            <label class="radio-inline">
                                              <input type="radio" name="backup" value="yes">Yes
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="backup" value="no">No
                                            </label> 
                                        </div>
                                       <label class="backup_error" id="backup_error" style="color:#FC2727;margin-top: 1%;margin-left: 30%">You have to Check One Option.</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Warranty:
                                        </label>
                                        <div class="col-md-9 d-inline">
                                            <label class="radio-inline">
                                              <input type="radio" name="warranty" value="yes">Yes
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="warranty" value="no">No
                                            </label> 
                                        </div>
                                         <label class="warranty_error" id="warranty_error" style="color:#FC2727;margin-top: 1%;margin-left: 30%">You have to Check One Option.</label>
                                    </div>
                                    <div class="form-group hide" id="warranty_image_input">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Warranty Card Image:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="file" name="warranty_image" id="warranty_image" />
                                            <p id="warranty_error1" style="display:none; color:#FF0000;">
                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                            </p>
                                            <p id="warranty_error2" style="display:none; color:#FF0000;">
                                            Maximum File Size Limit is 5MB.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-center hide" id="warranty_image_div">
                                        <a style="cursor: pointer;" data-toggle="modal" data-target="#modal_warranty_image">
                                            <img id="warranty_image_display"  class="img-thumbnail" height="200px" width="200px">
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Ip Settings:
                                        </label>
                                        <div class="col-md-9 d-inline">
                                            <label class="radio-inline">
                                              <input type="radio" name="ip" value="yes">Yes
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="ip" value="no">No
                                            </label> 
                                        </div>
                                         <label class="ip_error hide" id="ip_error" style="color:#FC2727;margin-top: 1%;margin-left: 30%">You have to Check One Option.</label>
                                    </div>
                                    <div class="form-group hide" id="ip_settings_div">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Ip Settings Text:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="ip_settings" type="text" id="ip_settings" value="" />
                                        </div>
                                    </div>
                                     <div class="form-group hide" id="ip_settings_image_div">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Ip Settings Image(optional):
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="file" name="ip_settings_image" id="ip_settings_image" />
                                            <p id="ip_error1" style="display:none; color:#FF0000;">
                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                            </p>
                                            <p id="ip_error2" style="display:none; color:#FF0000;">
                                            Maximum File Size Limit is 5MB.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-center hide" id="ip_settings_image_div_display">
                                        <a style="cursor: pointer;" data-toggle="modal" data-target="#modal_ip_settings_image">
                                            <img id="ip_settings_image_display"  class="img-thumbnail" height="200px" width="200px">
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Accessories:
                                        </label>
                                        <div class="col-md-9 d-inline">
                                            <label class="radio-inline">
                                              <input type="radio" name="accessories" value="yes">Yes
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="accessories" value="no">No
                                            </label> 
                                        </div>
                                        <label class="accessories_error" id="accessories_error" style="color:#FC2727;margin-top: 1%;margin-left: 30%">You have to Check One Option.</label>
                                    </div>
                                    <div class="form-group hide" id="accessories_detail">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Accessories Details:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="accessories_detail" type="text"  value="" />
                                        </div>
                                    </div>
                                     <div class="form-group hide" id="accessories_image_input">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Accessories Image:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="file" name="accessories_image" id="accessories_image" />
                                            <p id="accessories_error1" style="display:none; color:#FF0000;">
                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                            </p>
                                            <p id="accessories_error2" style="display:none; color:#FF0000;">
                                            Maximum File Size Limit is 5MB.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-center hide" id="accessories_image_div_display">
                                        <a style="cursor: pointer;" data-toggle="modal" data-target="#modal_accessories_image">
                                            <img id="accessories_image_display"  class="img-thumbnail" height="200px" width="200px">
                                        </a>
                                    </div>
                                    <div class="form-actions">
                                        <input name="submit" type="submit" value="Update" class="btn blue pull-right" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End : Inner Page container -->
        </div> <!-- End : Inner Page Content -->
        <a href="javascript:void(0);" class="scrollup">Scroll</a>
    </div> <!-- End : container -->


<!-- Modal Front Image-->
  <div class="modal fade" id="modal_front_image" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img id="front_image_modal"  class="img-thumbnail" height="500px" width="500px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Back Image-->
  <div class="modal fade" id="modal_back_image" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img id="back_image_modal"  class="img-thumbnail" height="500px" width="500px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Warranty Card Image-->
  <div class="modal fade" id="modal_warranty_image" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img id="warranty_image_modal"  class="img-thumbnail" height="500px" width="500px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Ip Settings Image-->
  <div class="modal fade" id="modal_ip_settings_image" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img id="ip_settings_image_modal"  class="img-thumbnail" height="500px" width="500px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal accessories Image-->
  <div class="modal fade" id="modal_accessories_image" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img id="accessories_image_modal"  class="img-thumbnail" height="500px" width="500px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript" src="js/jquery.event.move.js"></script>
<script type="text/javascript" src="js/lodash.compat.js"></script>
<script type="text/javascript" src="js/respond.min.js"></script>
<script type="text/javascript" src="js/excanvas.js"></script>
<script type="text/javascript" src="js/breakpoints.js"></script>
<script type="text/javascript" src="js/touch-punch.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script>
    $(document).ready(function() {
        App.init();
        FormValidation.init();

        // Initialize // Searchable select box
        $("#selUser").select2();
        $("#selReason").select2();
        $("#selDevice").select2();
        // Read selected option
        // $('#user_read').click(function(){
        // // var username = $('#selUser option:selected').text();
        // // var userid = $('#selUser').val();

        // });
        
    });
</script>
<script language="javascript">
    $(document).ready(function(){

        $('.uid_error').hide(); // Hide Warning Label.
        $('.rid_error').hide(); // Hide Warning Label.
        $('.did_error').hide(); // Hide Warning Label. 
        $('.warranty_error').hide(); // Hide Warning Label.
        $('.backup_error').hide(); // Hide Warning Label.
        $('.accessories_error').hide(); // Hide Warning Label.
        $('.warranty_image_error').hide(); // Hide Warning Label.

        var a=0;
        // front image validation code
        $('input[type="submit"]').prop("disabled", true);
        //binds to onchange event of your input field
        $('#device_front_image').bind('change', function() {
        if ($('input:submit').attr('disabled',false)){
             $('input:submit').attr('disabled',true);
             }
            var ext = $('#device_front_image').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
             $('#front_error1').slideDown("slow");
             $('#front_error2').slideUp("slow");
             a=0;
             }else{
             var picsize = (this.files[0].size);
             if (picsize > 5000000){
             $('#front_error2').slideDown("slow");
             a=0;
             }else{
             a=1;
             $('#front_error2').slideUp("slow");
             }
             $('#front_error1').slideUp("slow");
             if (a==1){
             $('input:submit').attr('disabled',false);
             }
            }
        });
        // back image validation code
        $('input[type="submit"]').prop("disabled", true);
        //binds to onchange event of your input field
        $('#device_back_image').bind('change', function() {
        if ($('input:submit').attr('disabled',false)){
             $('input:submit').attr('disabled',true);
             }
            var ext = $('#device_back_image').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
             $('#back_error1').slideDown("slow");
             $('#back_error2').slideUp("slow");
             a=0;
             }else{
             var picsize = (this.files[0].size);
             if (picsize > 5000000){
             $('#back_error2').slideDown("slow");
             a=0;
             }else{
             a=1;
             $('#back_error2').slideUp("slow");
             }
             $('#back_error1').slideUp("slow");
             if (a==1){
             $('input:submit').attr('disabled',false);
             }
            }
        });

        // warranty card image validation code
        $('input[type="submit"]').prop("disabled", true);
        //binds to onchange event of your input field
        $('#warranty_image').bind('change', function() {
        if ($('input:submit').attr('disabled',false)){
             $('input:submit').attr('disabled',true);
             }
            var ext = $('#warranty_image').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
             $('#warranty_error1').slideDown("slow");
             $('#warranty_error2').slideUp("slow");
             a=0;
             }else{
             var picsize = (this.files[0].size);
             if (picsize > 5000000){
             $('#warranty_error2').slideDown("slow");
             a=0;
             }else{
             a=1;
             $('#warranty_error2').slideUp("slow");
             }
             $('#warranty_error1').slideUp("slow");
             if (a==1){
             $('input:submit').attr('disabled',false);
             }
            }
        });

        // ip image image validation code
        $('input[type="submit"]').prop("disabled", true);
        //binds to onchange event of your input field
        $('#ip_settings_image').bind('change', function() {
        if ($('input:submit').attr('disabled',false)){
             $('input:submit').attr('disabled',true);
             }
            var ext = $('#ip_settings_image').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
             $('#ip_error1').slideDown("slow");
             $('#ip_error2').slideUp("slow");
             a=0;
             }else{
             var picsize = (this.files[0].size);
             if (picsize > 5000000){
             $('#ip_error2').slideDown("slow");
             a=0;
             }else{
             a=1;
             $('#ip_error2').slideUp("slow");
             }
             $('#ip_error1').slideUp("slow");
             if (a==1){
             $('input:submit').attr('disabled',false);
             }
            }
        });

         // accessories image validation code
        $('input[type="submit"]').prop("disabled", true);
        //binds to onchange event of your input field
        $('#accessories_image').bind('change', function() {
        if ($('input:submit').attr('disabled',false)){
             $('input:submit').attr('disabled',true);
             }
            var ext = $('#accessories_image').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
             $('#accessories_error1').slideDown("slow");
             $('#accessories_error2').slideUp("slow");
             a=0;
             }else{
             var picsize = (this.files[0].size);
             if (picsize > 5000000){
             $('#accessories_error2').slideDown("slow");
             a=0;
             }else{
             a=1;
             $('#accessories_error2').slideUp("slow");
             }
             $('#accessories_error1').slideUp("slow");
             if (a==1){
             $('input:submit').attr('disabled',false);
             }
            }
        });
        
        $("input[name=submit]").on("click", function() {
            var returnvalue;
            if($("select[name=uid]").val() == 0) {

                $("label#uid_error").show(); // show Warning 
                $("select#selUser").focus();  // Focus the select box      
                returnvalue=false;   
            }
            else{
                $('.uid_error').hide();
            }

             if($("select[name=rid]").val() == 0) {

                $("label#rid_error").show(); // show Warning 
                $("select#selReason").focus();  // Focus the select box      
                returnvalue=false;   
            }
            else{
                $('.rid_error').hide();
            }

            if($("select[name=did]").val() == 0) {

                $("label#did_error").show(); // show Warning 
                $("select#selDevice").focus();  // Focus the select box      
                returnvalue=false;   
            }
            else{
                $('.did_error').hide();
            }

            //radio buttons validation
            var warranty=document.getElementsByName('warranty');
            if (!(warranty[0].checked || warranty[1].checked)) {
                $("label.warranty_error").show(); // show Warning 
                return false;
            }
            else{
                $("label.warranty_error").hide(); // show Warning 
            }

            var backup=document.getElementsByName('backup');
            if (!(backup[0].checked || backup[1].checked)) {
                $("label.backup_error").show(); // show Warning 
                return false;
            }
            else{
                $("label.backup_error").hide(); // show Warning 
            }
            var accessories=document.getElementsByName('accessories');
            if (!(accessories[0].checked || accessories[1].checked)) {
                $("label.accessories_error").show(); // show Warning 
                return false;
            }
            else{
                $("label.accessories_error").hide(); // show Warning 
            }
            var ip=document.getElementsByName('ip');
            if (!(ip[0].checked || ip[1].checked)) {
                $("label.ip_error").show(); // show Warning 
                return false;
            }
            else{
                $("label.ip_error").hide(); // show Warning 
            }

    });

      $('#ip_settings').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('#accessories_detail').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      // fetching users and displaying in dropdown
      var token = 987;
      $.ajax({
        url:"user/fetch.php",
        method:"GET",
        data:{token:token},
        dataType:"JSON",
            success:function(data)
            {
              for (x in (data.data)) {

                  let uid = data.data[x][0];
                  let name = data.data[x][1];
                  let option = "<option value='"+ uid +"'>"+ name +"</option>";
                  $('#selUser').append(option);
                }
            }
       })

      // fetching reasons and displaying in dropdown
      $.ajax({
        url:"reason/fetch.php",
        method:"GET",
        data:{token:token},
        dataType:"JSON",
            success:function(data)
            {
              for (x in (data.data)) {

                  let rid = data.data[x][0];
                  let reason = data.data[x][1];
                  let option = "<option value='"+ rid +"'>"+ reason +"</option>";
                  $('#selReason').append(option);
                }
            }
       })

      // fetching devices and displaying in dropdown
      $.ajax({
        url:"device/fetch.php",
        method:"GET",
        data:{token:token},
        dataType:"JSON",
            success:function(data)
            {
              for (x in (data.data)) {

                  let did = data.data[x][0];
                  let device = data.data[x][1];
                  let option = "<option value='"+ did +"'>"+ device +"</option>";
                  $('#selDevice').append(option);
                }
            }
       })

      //displaying image input if warranty is checked yes
      $("input[type='radio']").click(function(){
            let warranty = $("input[name=warranty]:checked").val();
            if(warranty == "yes"){
                $('#warranty_image_input').removeClass('hide').addClass('show');
            }
            else
            {
                $('#warranty_image_input').removeClass('show').addClass('hide');
                $('#warranty_image_div').removeClass('show').addClass('hide');
            }
        });

      //displaying image and details input if ip settings if checked yes
      $("input[type='radio']").click(function(){
            let ip = $("input[name=ip]:checked").val();
            if(ip == "yes"){
                $('#ip_settings_div').removeClass('hide').addClass('show');
                $('#ip_settings_image_div').removeClass('hide').addClass('show');
            }
            else
            {   
                $('#ip_settings_image_div_display').removeClass('show').addClass('hide');
                $('#ip_settings_div').removeClass('show').addClass('hide');
                $('#ip_settings_image_div').removeClass('show').addClass('hide');
            }
        });

      //displaying image and details input if accessories is checked yes
      $("input[type='radio']").click(function(){
            let accessories = $("input[name=accessories]:checked").val();
            if(accessories == "yes"){
                $('#accessories_detail').removeClass('hide').addClass('show');
                $('#accessories_image_input').removeClass('hide').addClass('show');
            }
            else
            {
                $('#accessories_detail').removeClass('show').addClass('hide');
                $('#accessories_image_input').removeClass('show').addClass('hide');
                $('#accessories_image_div_display').removeClass('show').addClass('hide');
            }
        });
      var id ="<?php echo $_GET['id'] ?>";
      $.ajax({
        url:"request/read.php",
        method:"GET",
        data:{id:id},
        dataType:"JSON",
        success:function(data)
        {
            // console.log(data);
            var template = '';
            var serial = 1;
                if(data.records.length>0)
                {
                    console.log(data.records)
                    for(var item in data.records)
                    {     
                        $('#id').val(data.records[item].id);
                        // console.log(data.records[item].id);
                        let id   = data.records[item].id ;
                        let name = data.records[item].first_name + ' ' + data.records[item].last_name;
                        let option_user = "<option selected value='"+ id+"'>"+ name +"</option>";
                        $('#selUser').append(option_user);

                        let rid    = data.records[item].rid;
                        console.log(rid)
                        let reason = data.records[item].reason;
                        let option_reason = "<option selected value='"+ rid +"'>"+ reason +"</option>";
                        $('#selReason').append(option_reason);

                        let did    = data.records[item].did;
                        let device = data.records[item].device_name;
                        let option_device = "<option selected value='"+ did +"'>"+ device +"</option>";
                        $('#selDevice').append(option_device);

                        if(data.records[item].device_front_image!=""){
                            $('#front_image_div').removeClass('hide').addClass('show');
                            $('#front_image').attr('src', data.records[item].device_front_image);
                            $('#front_image_modal').attr('src', data.records[item].device_front_image);
                        }
                        if(data.records[item].device_back_image!=""){
                            $('#back_image_div').removeClass('hide').addClass('show');
                            $('#back_image').attr('src', data.records[item].device_back_image);
                            $('#back_image_modal').attr('src', data.records[item].device_back_image); 
                        }
                        
                        if(data.records[item].warranty == "yes"){
                           let warranty =  $('input[name ="warranty"]');
                           $(warranty[0]).prop( "checked", true );
                           $('#warranty_image_input').removeClass('hide').addClass('show');
                           $('#warranty_image_div').removeClass('hide').addClass('show');
                           $('#warranty_image_display').attr('src', data.records[item].warranty_image);
                           $('#warranty_image_modal').attr('src', data.records[item].warranty_image);
                           $('#front_image_modal').attr('src', data.records[item].device_front_image);
                        }
                        else{
                            let warranty =  $('input[name ="warranty"]');
                            $(warranty[1]).prop( "checked", true );
                            $('#warranty_image_input').removeClass('show').addClass('hide');
                            $('#warranty_image_div').removeClass('show').addClass('hide');
                        } 
                        if(data.records[item].backup == "yes"){
                            let backup =  $('input[name ="backup"]');
                            $(backup[0]).prop( "checked", true );
                        }
                        else{
                            let backup =  $('input[name ="backup"]');
                            $(backup[1]).prop( "checked", true );
                        }
                        if(data.records[item].ip == "yes"){
                            let ip  =  $('input[name ="ip"]');
                            $(ip[0]).prop( "checked", true );
                            let ip_settings =  $('input[name ="ip_settings"]');
                            $(ip_settings).val(data.records[item].ip_settings);
                            $('#ip_settings_div').removeClass('hide').addClass('show');
                            $('#ip_settings_image_div').removeClass('hide').addClass('show');
                            if(data.records[item].ip_settings_image!=""){
                                $('#ip_settings_image_div_display').removeClass('hide').addClass('show');
                                $('#ip_settings_image_display').attr('src', data.records[item].ip_settings_image);
                                $('#ip_settings_image_modal').attr('src', data.records[item].ip_settings_image);
                            }
                        }
                        else{
                            let ip =  $('input[name ="ip"]');
                            $(ip[1]).prop( "checked", true );
                        }

                        if(data.records[item].accessories == "yes"){
                            let accessories =  $('input[name ="accessories"]');
                            $(accessories[0]).prop( "checked", true );
                            let accessories_detail =  $('input[name ="accessories_detail"]');
                            $(accessories_detail).val(data.records[item].accessories_details);
                            $('#accessories_detail').removeClass('hide').addClass('show');
                            $('#accessories_image_input').removeClass('hide').addClass('show');
                            if(data.records[item].accessories_image!=""){
                                $('#accessories_image_div_display').removeClass('hide').addClass('show');
                                $('#accessories_image_display').attr('src', data.records[item].ip_settings_image);
                                $('#accessories_image_modal').attr('src', data.records[item].ip_settings_image);
                            }
                        }
                        else{
                            let accessories =  $('input[name ="accessories"]');
                            $(accessories[1]).prop( "checked", true );
                        }
                    }
                } 
                else
                {
                    for(var item in data){
                        console.log("no data found!")
                    }
                }
        }
       });
    });
</script>
</body>
</html>