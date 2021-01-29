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
                        <h3>View Request</h3>
                        <span style="color:#CC6600;">
                        </span>
                    </div>
                </div> <!-- End : Page Header -->
                <div class="row" style="height: 100%">
                    <div class="col-md-9 col-sm-9">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-bars"></i>View Request</div>
                                <button id="print-btn" class="btn default pull-right">
                                    <b>Print this Request</b>
                                </button>
                            </div>
                            <div class="portlet-body">
                                <div method="post" class="form-horizontal row-border" >
                                    <input type="hidden" name="mode" id="mode" value="edit">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Request By:
                                        </h4>
                                        <div class="col-md-3 control-label" id='selUser' class="form-control" name="uid">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Reason of Damage:
                                        </h4>
                                        <div class="col-md-3 control-label" id='selReason' class="form-control" name="rid">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Device Name:
                                        </h4>
                                        <div class="col-md-3 control-label" id="selDevice" class="form-control" name="did">
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <h4 class="col-md-3 control-label">
                                            Device Front Image:(Unbroken display)
                                        </h4>
                                        <div class="hide" id="front_image_div">
                                            <a style="cursor: pointer;margin-left: 50px" data-toggle="modal" data-target="#modal_front_image">
                                                <img id="front_image"  class="img-thumbnail " height="200px" width="200px">
                                            </a>
                                        </div>
                                        <div class="text-center text-danger hide" id="no_front_image_div">
                                            <h4>There is no Image to Display!</h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Device Back Image:
                                        </h4>
                                        <div class="hide" id="back_image_div">
                                            <a style="cursor: pointer;margin-left: 50px" data-toggle="modal" data-target="#modal_back_image">
                                                <img id="back_image"  class="img-thumbnail" height="200px" width="200px">
                                            </a>
                                        </div>
                                        <div class="text-center text-danger hide" id="no_back_image_div">
                                            <h4>There is no Image to Display!</h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Create data backup:
                                        </h4>
                                        <div class="col-md-9 d-inline" id="backup">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Warranty:
                                        </h4>
                                        <div class="col-md-9 d-inline" id="warranty">
                                        </div>
                                    </div>
                                    <div class="form-group hide" id="warranty_image">
                                        <h4 class="col-md-3 control-label">
                                            Warranty Card Image:
                                        </h4>
                                        <div class="hide" id="warranty_image_div">
                                            <a style="cursor: pointer;margin-left: 50px" data-toggle="modal" data-target="#modal_warranty_image">
                                                <img id="warranty_image_display"  class="img-thumbnail" height="200px" width="200px">
                                            </a>
                                        </div>
                                        <div class="text-center text-danger hide" id="no_warranty_image_div">
                                            <h4>There is no Image to Display!</h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Ip:
                                        </h4>
                                        <div class="col-md-9 d-inline" id="ip">
                                        </div>
                                    </div>
                                    <div class="form-group hide" id="ip_settings_div">
                                        <h4 class="col-md-3 control-label">
                                            Ip Settings:
                                        </h4>
                                        <div class="col-md-9" id="ip_settings">
                                        </div>
                                    </div>
                                     <div class="form-group hide" id="ip_settings_image_div">
                                        <h4 class="col-md-3 control-label">
                                            Ip Settings Image(optional):
                                        </h4>
                                        <div class="hide" id="ip_settings_image_div_display">
                                            <a style="cursor: pointer;margin-left: 50px" data-toggle="modal" data-target="#modal_ip_settings_image">
                                                <img id="ip_settings_image_display"  class="img-thumbnail" height="200px" width="200px">
                                            </a>
                                        </div>
                                        <div class="text-center text-danger hide" id="no_ip_settings_image_div">
                                            <h4>There is no Image to Display!</h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Accessories:
                                        </h4>
                                        <div class="col-md-9 " id="accessories">
                                        </div>
                                    </div>
                                    <div class="form-group hide" id="accessories_detail">
                                        <h4 class="col-md-3 control-label">
                                            Accessories Details:
                                        </h4>
                                        <div class="col-md-9" id="accessories_details">
                                        </div>
                                    </div>
                                    <div class="form-group hide" id="accessories_image">
                                        <h4 class="col-md-3 control-label">
                                            Accessories Image:
                                        </h4>
                                        <div class="hide" id="accessories_image_div_display">
                                            <a style="cursor: pointer;margin-left: 50px" data-toggle="modal" data-target="#modal_accessories_image">
                                                <img id="accessories_image_display"  class="img-thumbnail" height="200px" width="200px">
                                            </a>
                                        </div>
                                        <div class="text-center text-danger hide" id="no_accessories_image_div">
                                            <h4>There is no Image to Display!</h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Received or Sent Status:
                                        </h4>
                                        <div class="col-md-3 control-label" id='receivedorsent' class="form-control"></div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Device Received Date & Time:
                                        </h4>
                                        <div class="col-md-3 control-label" id='receive_time' class="form-control"></div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Device Sent Date & Time:
                                        </h4>
                                        <div class="col-md-3 control-label" id='sent_time' class="form-control"></div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Repair Status:
                                        </h4>
                                        <div class="col-md-3 control-label" id='repair_status' class="form-control"></div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Repair Price:
                                        </h4>
                                        <div class="col-md-3 control-label" id='repair_price' class="form-control"></div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Repair Date & Time:
                                        </h4>
                                        <div class="col-md-3 control-label" id='repair_time' class="form-control"></div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            Request Date & Time:
                                        </h4>
                                        <div class="col-md-3 control-label" id='request_time' class="form-control"></div>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="col-md-3 control-label">
                                            User Approval:
                                        </h4>
                                        <div class="col-md-3 control-label" id='user_approval' class="form-control"></div>
                                    </div>
                                </div>

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
  <!-- Modal Accessories Image-->
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
    });
</script>
<script language="javascript">
    $(document).ready(function(){
        // print function
        $('#print-btn').click(function(){
            window.print();
        })
      //displaying image input if warranty is checked yes
      $("input[type='radio']").click(function(){
            let warranty = $("input[name=warranty]:checked").val();
            if(warranty == "yes"){
                $('#warranty_image').removeClass('hide').addClass('show');
            }
            else
            {
                $('#warranty_image').removeClass('show').addClass('hide');
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
                $('#accessories_image').removeClass('hide').addClass('show');
            }
            else
            {
                $('#accessories_detail').removeClass('show').addClass('hide');
                $('#accessories_image').removeClass('show').addClass('hide');
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
                        let option_user = "<h4>"+ name +"</h4>";
                        $('#selUser').append(option_user);

                        let rid    = data.records[item].rid;
                        let reason = data.records[item].reason;
                        let damage_reason = data.records[item].damage_reason;
                        if(data.records[item].reason!=""){

                            let option_reason = "<h4>"+ reason +"</h4>";
                            $('#selReason').append(option_reason);

                        }
                        else{
                            let option_reason = "<h4>"+ damage_reason +"</h4>";
                            $('#selReason').append(option_reason);
                        }
                        

                        let did    = data.records[item].did;
                        let device = data.records[item].device_name;
                        let device_name = data.records[item].device;
                        
                        if(data.records[item].reason!=""){

                            let option_device = "<h4>"+ device +"</h4>";
                            $('#selDevice').append(option_device);

                        }
                        else{
                            let option_device = "<h4>"+ device_name +"</h4>";
                            $('#selDevice').append(option_device);
                        }

                        if(data.records[item].device_front_image!=""){
                            $('#front_image_div').removeClass('hide').addClass('show');
                            $('#front_image').attr('src', data.records[item].device_front_image);
                            $('#front_image_modal').attr('src', data.records[item].device_front_image);
                        }
                        else{
                            $('#no_front_image_div').removeClass('hide').addClass('show');
                        }
                        if(data.records[item].device_back_image!=""){
                            $('#back_image_div').removeClass('hide').addClass('show');
                            $('#back_image').attr('src', data.records[item].device_back_image);
                            $('#back_image_modal').attr('src', data.records[item].device_back_image); 
                        }
                        else{
                            $('#no_back_image_div').removeClass('hide').addClass('show');
                        }
                        
                        if(data.records[item].warranty == "yes"){
                           let warranty = "<h4>Yes! I have warranty of this device.</h4>";
                           $('#warranty').append(warranty);
                           $('#warranty_image').removeClass('hide').addClass('show');
                           if(data.records[item].warranty_image!=""){
                                $('#warranty_image_div').removeClass('hide').addClass('show');
                                $('#warranty_image_display').attr('src', data.records[item].warranty_image);
                                $('#warranty_image_modal').attr('src', data.records[item].warranty_image);
                                $('#front_image_modal').attr('src', data.records[item].device_front_image);
                           }
                           else{
                                $('#no_warranty_image_div').removeClass('hide').addClass('show');
                           }
                        }
                        else{

                            let warranty = "<h4>No! I don't have warranty of this device.</h4>";
                           $('#warranty').append(warranty);
                            $('#warranty_image').removeClass('show').addClass('hide');
                            $('#warranty_image_div').removeClass('show').addClass('hide');
                        }

                        if(data.records[item].backup == "yes"){
                            let backup = "<h4>Yes! Create my device data backup</h4>";
                            $('#backup').append(backup);
                        }
                        else{
                            let backup = "<h4>No! Don't need to create my device data backup</h4>";
                            $('#backup').append(backup);
                        }
                        if(data.records[item].ip == "yes"){
                            let ip = "<h4>Yes! I have ip Settings of this device.</h4>";
                            $('#ip').append(ip);
                            let ip_settings = "<h4>"+ data.records[item].ip_settings +"</h4>";
                            $('#ip_settings').append(ip_settings);
                            $('#ip_settings_div').removeClass('hide').addClass('show');
                            $('#ip_settings_image_div').removeClass('hide').addClass('show');
                            if(data.records[item].ip_settings_image!=""){
                                $('#ip_settings_image_div_display').removeClass('hide').addClass('show');
                                $('#ip_settings_image_display').attr('src', data.records[item].ip_settings_image);
                                $('#ip_settings_image_modal').attr('src', data.records[item].ip_settings_image);
                            }
                            else{
                                $('#no_ip_settings_image_div').removeClass('hide').addClass('show');
                            }
                        }
                        else{
                            let ip = "<h4>No! I don't have ip settings of this device.</h4>";
                           $('#ip').append(ip);
                        }

                        if(data.records[item].accessories == "yes"){ 
                            let accessories = "<h4>Yes! I'm sending accessories with device.</h4>";
                            $('#accessories').append(accessories);
                            let accessories_detail = "<h4>"+ data.records[item].accessories_details +"</h4>";
                            $('#accessories_details').append(accessories_detail);
                            $('#accessories_detail').removeClass('hide').addClass('show');
                            $('#accessories_image').removeClass('hide').addClass('show');
                            if(data.records[item].accessories_image!=""){
                                $('#accessories_image_div_display').removeClass('hide').addClass('show');
                                $('#accessories_image_display').attr('src', data.records[item].ip_settings_image);
                                $('#accessories_image_modal').attr('src', data.records[item].ip_settings_image);
                            }
                            else{
                                $('#no_accessories_image_div').removeClass('hide').addClass('show');
                            }
                        }
                        else{
                            let accessories = "<h4>No! I don't want to send accessories with device.</h4>";
                            $('#accessories').append(accessories);
                        }
                        // console.log(data.records[item].receivedorsent)
                        let receivedorsent    = data.records[item].receivedorsent;
                        let html_receivedorsent = "<h4>"+ receivedorsent +"</h4>";
                        $('#receivedorsent').append(html_receivedorsent);

                        let receive_time    = data.records[item].device_receive_time;
                        let html_receive_time = "<h4>"+ receive_time +"</h4>";
                        $('#receive_time').append(html_receive_time);

                        let sent_time    = data.records[item].device_sent_time;
                        let html_sent_time = "<h4>"+ sent_time +"</h4>";
                        $('#sent_time').append(html_sent_time);

                        let device_status    = data.records[item].device_status;
                        let html_device_status = "<h4>"+ device_status +"</h4>";
                        $('#repair_status').append(html_device_status);

                        let repair_price    = data.records[item].repair_price;
                        let html_repair_price = "<h4>"+ repair_price +"</h4>";
                        $('#repair_price').append(html_repair_price);

                        let repair_time    = data.records[item].repair_time;
                        let html_repair_time = "<h4>"+ repair_time +"</h4>";
                        $('#repair_time').append(html_repair_time);

                        let request_time    = data.records[item].request_time;
                        let html_request_time = "<h4>"+ request_time +"</h4>";
                        $('#request_time').append(html_request_time);

                        let user_approval    = data.records[item].user_approval;
                        let html_user_approval = "<h4>"+ user_approval +"</h4>";
                        $('#user_approval').append(html_user_approval);
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