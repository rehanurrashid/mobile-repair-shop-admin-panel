<?php
session_start();
if( !isset($_SESSION["name"]))
    {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Requests | Welcome to keshavinfotech</title>
    <script src="js/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/open-sans.css">
    <link rel="stylesheet" type="text/css" href="css/select2.css" />
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="css/style_default.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="images/favicon1.ico">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144x144-precomposed.png">
    <SCRIPT language=javascript src="js/body.js"></SCRIPT>
    <!-- Links for Datatables-->
    <!-- <link href="css/sb-admin.css" rel="stylesheet"> -->
    <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
    <!-- Script -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Searchable Select -->
    <script src='js/select.min.js' type='text/javascript'></script>
    <!-- CSS -->
    <link href='css/select.min.css' rel='stylesheet' type='text/css'>
</head>
<style type="text/css">
    .message{
        /*padding-bottom: 10px;*/
        margin-top: 25px;
    }
    .show{
        display: block;
    }
    .hide{
        display: none;
    }
    .tableFixHead          { overflow-y: auto; }
    .tableFixHead thead th { position: sticky; top: 0; }

    /* Just common table stuff. Really. */
    table  { border-collapse: collapse; width: 100%; }
    th, td { padding: 8px 16px; }
    th     { background:#eee; }
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
            <!-- Start : Inner Page Content -->
            <div class="container">
                <!-- Start : Inner Page container -->
                <div class="crumbs">
                    <!-- Start : Breadcrumbs -->
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="deskboard.php">Dashboard</a>
                        </li>
                        <li class="current">Requests</li>
                    </ul>
                </div> <!-- End : Breadcrumbs -->
                <div class="page-header">
                    <!-- Start : Page Header -->
                    <div class="col-md-3">
                        <div class="page-title">
                            <h3>Manage Requests</h3>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="page-title">
                        <h4 id="message" class="text-success message hide">Requests are Deleted Successfully!</h4>

                    <?php if(isset($_GET['message'])): $message =$_GET['message']; ?>
                    <?php    if($message=="true"){ ?>
                            <h4 class="text-success message">Request Inserted Successfully!</h4>
                    <?php  }elseif($message=="false"){ ?>
                            <h4 class="text-danger message">Request Failed to Insert. Please try Again!</h4>
                    <?php }
                    else if($message=="exists"){ ?>
                        <h4 class="text-danger message">Request Already Exists!</h4>
                    <?php } elseif($message=="deletesuccessfully"){ ?>
                        <h4 class="text-success message">Request Deleted Successfully!</h4>
                    <?php } elseif($message=="notdeleted"){ ?>
                        <h4 class="text-danger message">Request Unable to Delete!</h4>
                    <?php } elseif($message=="editsucessfully"){ ?>
                        <h4 class="text-success message">Request Updated Successfully!</h4>
                    <?php } elseif($message=="editunsucessfull"){ ?>
                        <h4 class="text-danger message">Request Unable to Update!</h4>
                    <?php }?>

                    <?php endif; ?>
                    </div>
                    </div>
                </div> <!-- End : Page Header -->
                <!-- <div class="row">
                    <div class="col-md-12 " style="height: 30px;">

                    

                    </div>
                </div> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-table"></i>Requests</div>
                            </div>
                            <div class="portlet-body">
                                <div class="tableFixHead">
<!--                                     <form name="frmNewsList" method="post" action="#"> -->
                                        <table class="table table-bordered table-hover " id="manageRequests" style="width: 100%" >
                                            <thead>
                                              <tr>
                                                <th width="25px"><input type="checkbox" name="chkAll" id="selectall" value="chkAll" /></th>
                                                <th>No.</th>
                                                <th>User Name</th>
                                                <th>Device</th>
                                                <th>Damage Reason</th>
                                                <th>Device Front Image</th>
                                                <th>Device Back Image</th>
                                                <th>Warranty</th>
                                                <th>Warranty Image</th>
                                                <th>Import Data(Backup)</th>
                                                <th>Ip</th>
                                                <th>Ip Settings</th>
                                                <th>Ip Settings Image</th>
                                                <th>Accessories</th>
                                                <th>Accessories Details</th>
                                                <th>Accessories Image</th>
                                                <th>Received/Sent</th>
                                                <th>Device Status</th>
                                                <th>Device Receive Date/Time</th>
                                                <th>Device Sent Date/Time</th>
                                                <th>Repair Price</th>
                                                <th>Repair Date/Time</th>
                                                <th>Request Date/Time</th>
                                                <th>User Approval</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>
                                          </table>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="count" id="count" value="0" />
                                                <input style="margin-right:7px;" type="button" name="button2" id="button2" value="Add New" onclick="location.href='add_request.php?mode=add'" class="btn green pull-left" />
                                                &nbsp;
                                                 <input type="submit" value="Delete Selected" onclick="confirmDeleteAll();"  id="delete" class="btn red pull-left"/>
                                            </div>
                                        </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End : Inner Page container -->
            <a href="javascript:void(0);" class="scrollup">Scroll</a>
        </div> <!-- End : Inner Page Content -->
    </div> <!-- End : container -->
    <!-- datatables -->

    <!-- Modal Device Received or Sent -->
  <div class="modal fade" id="modal_device_received_sent" role="dialog"> 
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Change Device Received or Sent Status</h4>
        </div>
        <div class="modal-body text-center">
          <div  class="form-horizontal row-border" >
            <!-- <input type="hidden" name="mode" id="mode" value="add"> -->
            
            <div class="form-group">
                <label class="col-md-3 control-label">
                    <span class="required">*</span>Device Status:
                </label>
                <div class="col-md-9 d-inline">
                    <label class="radio-inline">
                        <input type="hidden" name="id" id="id" >
                        <input type="radio" name="receivedorsent" value="sent">Sent
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="receivedorsent" value="received">Received
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="receivedorsent" value="delivered">Device Received by User
                    </label> 
                </div>
                    <label class="receivedorsent_error" id="receivedorsent_error" style="color:#FC2727;margin-top: 1%;margin-left: 30%">You have to Check One Option.</label>
            </div>
            <div class="form-group hide" id="sent_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Delivered By:
                </label>
                <div class="col-md-6 d-inline">
                    <label class="radio-inline">
                        <input type="radio" name="deliver" value="employee">Employee
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="deliver" value="currier">Currier
                    </label> 
                </div>
            </div>
            <label class="deliver_error" id="deliver_error" style="color:#FC2727;margin-top: 1%;margin-left: 30%">You have to Check One Option.</label>

            <div class="form-group hide" id="employee_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Select Employee:
                </label>
                <div class="col-md-6">
                    <select  id='selEmployee'  name="eid" style="width: 220px">
                        <option value="0" selected>Select Employee</option>
                    </select><span class="caret"></span>
                </div>
            </div>
            <div class="form-group hide" id="currier_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Select Currier:
                </label>
                <div class="col-md-6">
                    <select  id='selCurrier'  name="cid" style="width: 220px">
                        <option selected>Select Currier</option>
                    </select><span class="caret"></span>
                </div>
            </div>
            <label class="currier_error" id="currier_error" style="color:#FC2727;margin-top: 1%;margin-left: 30%">You have to Check One Option.</label>

            <div class="form-group hide" id="sent_date_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Device Sent Date:
                </label>
                <div class="col-md-6">
                    <input class="form-control" type="date" name="sent_date" id="sent_date" required/>
                </div>
            </div>
            <div class="form-group hide" id="sent_time_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Device Sent Time:
                </label>
                <div class="col-md-6">
                    <input class="form-control" type="time" name="sent_time" id="sent_time" required/>
                </div>
            </div>

            <div class="form-group hide" id="arrival_date_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Device Arrival Date:
                </label>
                <div class="col-md-6">
                    <input class="form-control" type="date" name="arrival_date" id="arrival_date" required/>
                </div>
            </div>

            <div class="form-group hide" id="arrival_time_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Device Arrival Time:
                </label>
                <div class="col-md-6">
                    <input class="form-control" type="time" name="arrival_time" id="arrival_time" required/>
                </div>
            </div>

            <div class="form-group hide" id="pickup_date_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Device Pickup Date:
                </label>
                <div class="col-md-6">
                    <input class="form-control" type="date" name="pickup_date" id="pickup_date" required/>
                </div>
            </div>

            <div class="form-group hide" id="pickup_time_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Device Pickup Time:
                </label>
                <div class="col-md-6">
                    <input class="form-control" type="time" name="pickup_time" id="pickup_time" required/>
                </div>
            </div>

            <!-- displaying this div when chekced received -->
            <div class="form-group hide" id="received_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Device Received Date:
                </label>
                <div class="col-md-8">
                    <input class="form-control" type="date" name="received_date" id="received_date" required/>
                </div> <hr>

                <label class="col-md-4 control-label">
                    <span class="required">*</span>Device Received Time:
                </label>
                <div class="col-md-8">
                    <input class="form-control" type="time" name="received_time" id="received_time" required/>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <input type="hidden" value="" name="id"> -->
            <input name="Submit" type="submit" id="receivedorsent" value="Update Status" class="btn green pull-right" />
            <button style="margin-right: 10px" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>                 
        </div>
      </div>
    </div>
  </div>
   <!-- Modal Device Repair Status -->
  <div class="modal fade" id="modal_device_diagnose_repair" role="dialog"> 
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Change Device Diagnose or Repair Status</h4>
        </div>
        <div class="modal-body text-center">
          <div  class="form-horizontal row-border" >
            <!-- <input type="hidden" name="mode" id="mode" value="add"> -->
            
            <div class="form-group">
                <label class="col-md-3 control-label">
                    <span class="required">*</span>Device Status:
                </label>
                <div class="col-md-9 d-inline">
                    <label class="radio-inline">
                        <input type="hidden" name="req_id" id="req_id">
                        <input type="radio" name="diagnose_repair" value="repaired" id="repaired">
                        Device Repaired
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="diagnose_repair" value="diagnose_finish" id="diagnose_finish">
                        Device Diagnose finish
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="diagnose_repair" value="diagnose" id="diagnose">
                        Device is in diagnostic
                    </label>
                </div>
            </div>
            <label class="repair_error" id="repair_error" style="color:#FC2727;margin-top: 1%;margin-left: 30%">You have to Check One Option.</label>

            <div class="form-group hide" id="repair_date_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Device Repair Date:
                </label>
                <div class="col-md-6">
                    <input class="form-control" type="date" name="repair_date" id="repair_date" />
                </div>
            </div>
            <div class="form-group hide" id="repair_time_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Device Repair Time:
                </label>
                <div class="col-md-6">
                    <input class="form-control" type="time" name="repair_time" id="repair_time" />
                </div>
            </div>
                    <!-- <label class="warranty_error" id="warranty_error" style="color:#FC2727;margin-top: 1%;margin-left: 30%">You have to Check One Option.</label> -->
            <div class="form-group hide" id="repair_price_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Repair Price:
                </label>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="repair_price" id="repair_price">
                    <!-- <label class="cid_error" id="cid_error" style="color:#FC2727;margin-top: 1%"> Warning : You have to Select One Item.</label> -->
                </div>
            </div>
            <div class="form-group hide" id="fault_details_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Defects & Details:
                </label>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="fault_details" id="fault_details">
                    <!-- <label class="cid_error" id="cid_error" style="color:#FC2727;margin-top: 1%"> Warning : You have to Select One Item.</label> -->
                </div>
            </div>
            <!-- <div class="form-group hide" id="fault_image_div">
                <label class="col-md-4 control-label">
                    <span class="required">*</span>Defect Image:
                </label>
                <div class="col-md-6">
                    <input class="form-control" type="file" name="fault_image" id="fault_image">
                    <label class="cid_error" id="cid_error" style="color:#FC2727;margin-top: 1%"> Warning : You have to Select One Item.</label>
                </div>
            </div> -->
        <div class="modal-footer">
            <input name="Submit" type="submit" id="diagnose_repair_finish" value="Update Status" class="btn green pull-right" />
            <button style="margin-right: 10px" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>                 
        </div>
      </div>
    </div>
  </div>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
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
    <script type="text/javascript" src="js/select2.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/DT_bootstrap.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>

        <!-- Links for Datatables -->
<script type="text/javascript" src="datatables/datatables.min.js"></script>
  <script src="datatables/jquery.dataTables.js"></script>
  <script src="datatables/dataTables.bootstrap4.js"></script>
<script type="text/javascript">

var manageRequests;
$(document).ready(function() {

        // hide errors 
        $('.receivedorsent_error').hide(); // Hide Warning Label. 
        $('.employee_error').hide(); // Hide Warning Label.
        $('.currier_error').hide(); // Hide Warning Label.
        $('.deliver_error').hide(); // Hide Warning Label.
        $('.repair_error').hide(); // Hide Warning Label.

        // Searchable select box
        $("#selEmployee").select2();
        $("#selCurrier").select2();
          App.init();
          manageRequests = $("#manageRequests").DataTable({
            'ajax': 'request/fetch.php',
            'orders': []
          });

          // following code display and hide when specific radio button is checked/unchecked
        $("input[type='radio']").click(function(){
                let deliver = $("input[name=deliver]:checked").val();
                if(deliver == "employee"){
                    $('#employee_div').removeClass('hide').addClass('show');
                    $('#currier_div').removeClass('show').addClass('hide');
                    $('#sent_date_div').removeClass('hide').addClass('show');
                    $('#arrival_date_div').removeClass('hide').addClass('show');
                    $('#pickup_date_div').removeClass('hide').addClass('show');
                    $('#sent_time_div').removeClass('hide').addClass('show');
                    $('#arrival_time_div').removeClass('hide').addClass('show');
                    $('#pickup_time_div').removeClass('hide').addClass('show');
                }
                else if(deliver == "currier"){ 
                    $('#currier_div').removeClass('hide').addClass('show');
                    $('#employee_div').removeClass('show').addClass('hide');
                    $('#sent_date_div').removeClass('hide').addClass('show');
                    $('#arrival_date_div').removeClass('hide').addClass('show');
                    $('#pickup_date_div').removeClass('hide').addClass('show');
                    $('#sent_time_div').removeClass('hide').addClass('show');
                    $('#arrival_time_div').removeClass('hide').addClass('show');
                    $('#pickup_time_div').removeClass('hide').addClass('show');
                }
            });

            $("input[type='radio']").click(function(){
                let receivedorsent = $("input[name=receivedorsent]:checked").val();
                if(receivedorsent == "sent"){
                    $('#sent_div').removeClass('hide').addClass('show');
                    $('#received_div').removeClass('show').addClass('hide');
                }
                else if(receivedorsent == "received"){ 
                    $('#received_div').removeClass('hide').addClass('show');
                    $('#sent_div').removeClass('show').addClass('hide');
                    $('#currier_div').removeClass('show').addClass('hide');
                    $('#employee_div').removeClass('show').addClass('hide');
                    $('#sent_time_div').removeClass('show').addClass('hide');
                    $('#arrival_time_div').removeClass('show').addClass('hide');
                    $('#pickup_time_div').removeClass('show').addClass('hide');
                    $('#sent_date_div').removeClass('show').addClass('hide');
                    $('#arrival_date_div').removeClass('show').addClass('hide');
                    $('#pickup_date_div').removeClass('show').addClass('hide');
                }
                else if(receivedorsent == "delivered"){
                    $('#sent_div').removeClass('show').addClass('hide');
                    $('#currier_div').removeClass('show').addClass('hide');
                    $('#employee_div').removeClass('show').addClass('hide');
                    $('#sent_time_div').removeClass('show').addClass('hide');
                    $('#arrival_time_div').removeClass('show').addClass('hide');
                    $('#pickup_time_div').removeClass('show').addClass('hide');
                    $('#sent_date_div').removeClass('show').addClass('hide');
                    $('#arrival_date_div').removeClass('show').addClass('hide');
                    $('#pickup_date_div').removeClass('show').addClass('hide');
                    $('#received_div').removeClass('show').addClass('hide');
                }
            });

             $("input[type='radio']").click(function(){
                let receivedorsent = $("input[name=diagnose_repair]:checked").val();
                if(receivedorsent == "diagnose_finish"){

                    $('#repair_date_div').removeClass('hide').addClass('show');
                    $('#repair_time_div').removeClass('hide').addClass('show');
                    $('#repair_price_div').removeClass('hide').addClass('show');
                    $('#fault_details_div').removeClass('hide').addClass('show');
                    $('#fault_image_div').removeClass('hide').addClass('show');
                }
                else if(receivedorsent == "repaired"){ 

                    $('#repair_date_div').removeClass('show').addClass('hide');
                    $('#repair_time_div').removeClass('show').addClass('hide');
                    $('#repair_price_div').removeClass('show').addClass('hide');
                     $('#fault_details_div').removeClass('show').addClass('hide');
                    $('#fault_image_div').removeClass('show').addClass('hide');
                }
                else if(receivedorsent == "diagnose"){ 

                    $('#repair_date_div').removeClass('show').addClass('hide');
                    $('#repair_time_div').removeClass('show').addClass('hide');
                    $('#repair_price_div').removeClass('show').addClass('hide');
                     $('#fault_details_div').removeClass('show').addClass('hide');
                    $('#fault_image_div').removeClass('show').addClass('hide');
                }
            });
            // else
            // {
            //     $('#sent_div').removeClass('show').addClass('hide');
            //     // $('#warranty_image_div').removeClass('show').addClass('hide');
            // }
        
    // fetching Employees and displaying in dropdown
      var token = 987;
      $.ajax({
        url:"employee/fetch.php",
        method:"GET",
        data:{token:token},
        dataType:"JSON",
            success:function(data)
            {
                // console.log(data.data)
              for (x in (data.data)) {

                  let eid = data.data[x][0];
                  let name = data.data[x][1];
                  let option = "<option value='"+ eid +"'>"+ name +"</option>";
                  $('#selEmployee').append(option);
                }
            }
       });

    // fetching curriers and displaying in dropdown
      $.ajax({
        url:"currier/fetch.php",
        method:"GET",
        data:{token:token},
        dataType:"JSON",
            success:function(data)
            {   
                // console.log(data.data)
              for (x in (data.data)) {

                  let cid = data.data[x][0];
                  let name = data.data[x][1];
                  let option = "<option value='"+ cid +"'>"+ name +"</option>";
                  $('#selCurrier').append(option);
                }
            }
       });

      //updating Recevied Or Sent Status of Device
      
    $('body').on('click','.devicereceivedstatus',function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#req_id').val(id)
        });

    //  when submit button is clicked
      $('#receivedorsent').click(function(){

        // validations
        let  receivedorsent=document.getElementsByName('receivedorsent');

            if (!(receivedorsent[0].checked || receivedorsent[1].checked || receivedorsent[2].checked)) {
                $("label.receivedorsent_error").show(); // show Warning 
                return false;
            }
            else{
                $("label.receivedorsent_error").hide(); // show Warning 
            }

        

            // let returnvalue;
            // if($("select[name=eid]").val() == 0) {

            //     $("label#employee_error").show(); // show Warning 
            //     $("select#selEmployee").focus();  // Focus the select box      
            //     returnvalue=false;   
            // }
            // else{
            //     $('.employee_error').hide();
            // }
            // if($("select[name=cid]").val() == 0) {

            //     $("label#currier_error").show(); // show Warning 
            //     $("select#selCurrier").focus();  // Focus the select box      
            //     returnvalue=false;   
            // }
            // else{
            //     $('.currier_error').hide();
            // }


        receivedorsent = $("input[name=receivedorsent]:checked").val();
        // if device is received
        if(receivedorsent == "received"){
            let id = $('#id').val();
            let received_date = $('#received_date').val();
            let received_time = $('#received_time').val();

            $.ajax({
                url:"request/devicestatus.php",
                method:"POST",
                data:{
                    id:id,
                    received_date:received_date,
                    received_time:received_time,
                    receivedorsent:receivedorsent
                },
                    success:function(_data)
                    {   
                        
                        // update the manageRequests
                        manageRequests.ajax.reload(null, false);

                        // console.log(data)
                      let data=JSON.parse(_data);
                            // console.log(data.response)
                          if(data.response ==true){
                            alert("Status Updated");
                            $('#modal_device_received_sent').modal('hide');
                          }
                          else{
                            alert("Status Failed to Updated");
                            $('#modal_device_received_sent').modal('hide');
                          }
                    }
            });
        }
        // if device is sent repaired/un_repaired
        else if(receivedorsent == "sent"){
            // validations 
            let  deliver_val=document.getElementsByName('deliver');
            if (!(deliver_val[0].checked || deliver_val[1].checked)) {
                $("label.deliver_error").show(); // show Warning 
                return false;
            }
            else{
                $("label.deliver_error").hide(); // show Warning 
            }

            let eid = $('#selEmployee').val();
            let cid = $('select[name=cid]').val();
            // alert(eid)
            if(eid!=null && eid!=0 && eid.length!=0){
                // alert(eid)
                // alert(cid)
                // cid ="";
                let id = $('#id').val();
                let sent_time = $('#sent_time').val();
                let sent_date = $('#sent_date').val();
                let arrival_time = $('#arrival_time').val();
                let arrival_date = $('#arrival_date').val();
                let pickup_time = $('#pickup_time').val();
                let pickup_date = $('#pickup_date').val();
                $.ajax({
                    url:"request/devicestatus.php",
                    method:"POST",
                    data:{
                        id:id,
                        sent_time:sent_time,
                        sent_date:sent_date,
                        arrival_time:arrival_time,
                        arrival_date:arrival_date,
                        pickup_time:pickup_time,
                        pickup_date:pickup_date,
                        receivedorsent:receivedorsent,
                        eid:eid
                    },
                        success:function(_data)
                        {   
                            // update the manageRequests
                        manageRequests.ajax.reload(null, false);

                           let data=JSON.parse(_data);
                            console.log(_data)
                          if(data.response ==true){
                            alert("Status Updated");
                            $('#modal_device_received_sent').modal('hide');
                          }
                          else{
                            alert("Status Failed to Updated");
                            $('#modal_device_received_sent').modal('hide');
                          }
                        }
                });
            }
            else if(cid!=null || cid!="" || cid.length!=0)
            {
                let id = $('#id').val();
                let sent_time = $('#sent_time').val();
                let sent_date = $('#sent_date').val();
                let arrival_time = $('#arrival_time').val();
                let arrival_date = $('#arrival_date').val();
                let pickup_time = $('#pickup_time').val();
                let pickup_date = $('#pickup_date').val();
                
                $.ajax({
                    url:"request/devicestatus.php",
                    method:"POST",
                    data:{
                        id:id,
                        sent_time:sent_time,
                        sent_date:sent_date,
                        arrival_time:arrival_time,
                        arrival_date:arrival_date,
                        pickup_time:pickup_time,
                        pickup_date:pickup_date,
                        receivedorsent:receivedorsent,
                        cid:cid
                    },
                        success:function(_data)
                        {
                            // update the manageRequests
                            manageRequests.ajax.reload(null, false);

                            let data=JSON.parse(_data);
                            console.log(_data)
                          if(data.response ==true){
                            alert("Status Updated");
                            $('#modal_device_received_sent').modal('hide');
                          }
                          else{
                            alert("Status Failed to Updated");
                            $('#modal_device_received_sent').modal('hide');
                          }
                        }
                });
            }
            
        }
        // when device is handed over to the user
        else if(receivedorsent == "delivered")
        {
            let id = $('#id').val();
            $.ajax({
                url:"request/devicestatus.php",
                method:"POST",
                data:{
                    id:id,
                    receivedorsent:receivedorsent
                },
                    success:function(_data)
                    {
                        // update the manageRequests
                        manageRequests.ajax.reload(null, false);

                        // console.log(data)
                        let data=JSON.parse(_data);
                            // console.log(data.response)
                          if(data.response ==true){
                            alert("Status Updated");
                            $('#modal_device_received_sent').modal('hide');
                          }
                          else{
                            alert("Status Failed to Updated");
                            $('#modal_device_received_sent').modal('hide');
                          }
                    }
            });
        }
      });
    
    // when diagnose_repair_finish submit button is clicked
      $('#diagnose_repair_finish').click(function(){
        // validations

        let  diagnose_repair_val=document.getElementsByName('diagnose_repair');

            if (!(diagnose_repair_val[0].checked || diagnose_repair_val[1].checked || diagnose_repair_val[2].checked)) 
            {
                $("label.repair_error").show(); // show Warning 
                return false;
            }
            else{
                $("label.repair_error").hide(); // show Warning 
            }

        let diagnose_repair = $("input[name=diagnose_repair]:checked").val();
        // if device is received
        if(diagnose_repair == "repaired" || diagnose_repair == "diagnose"){

            let id = $('#req_id').val();
            let token = 999;
            $.ajax({
                url:"request/diagnose_repair.php",
                method:"POST",
                data:{
                    id:id,
                    diagnose_repair:diagnose_repair,
                    token:token
                },
                    success:function(_data)
                    {
                        // update the manageRequests
                        manageRequests.ajax.reload(null, false);

                        // console.log(data)
                        let data=JSON.parse(_data);
                            // console.log(data.response)
                          if(data.response ==true){
                            alert("Status Updated");
                            $('#modal_device_diagnose_repair').modal('hide');
                          }
                          else{
                            alert("Status Failed to Updated");
                            $('#modal_device_diagnose_repair').modal('hide');
                          }
                    }
            });
        }
        else if(diagnose_repair == "diagnose_finish")
        {
             let id = $('#req_id').val();
             let repair_date    = $('#repair_date').val();
             let repair_time    = $('#repair_time').val();
             let repair_price   = $('#repair_price').val();
             let fault_details  = $('#fault_details').val();
             // let fault_image    = $('#fault_image').val();
            $.ajax({
                url:"request/diagnose_repair.php",
                method:"POST",
                data:{
                    id:id,
                    diagnose_repair:diagnose_repair,
                    repair_date:repair_date,
                    repair_time:repair_time,
                    repair_price:repair_price,
                    fault_details:fault_details
                },
                    success:function(_data)
                    {
                        // update the manageRequests
                        manageRequests.ajax.reload(null, false);

                      // console.log(_data[0].response)
                      let data=JSON.parse(_data);
                          if(data.response ==true){
                            alert("Status Updated");
                            $('#modal_device_diagnose_repair').modal('hide');
                          }
                          else{
                            alert("Status Failed to Updated");
                            $('#modal_device_diagnose_repair').modal('hide');
                          }
                    }
            });
        }
      });
});

</script>
<script type="text/javascript">
    function confirmDelete(id){
        var message = confirm("Are your sure you want to delete?");
        if(message==true){
            window.location.href = "request/delete.php?id="+id+"&token=999";
        }
        else{
            return false;
        }
    }
    $("#selectall").click(function () {
                var checkAll = $("#selectall").prop('checked');
                    if (checkAll) {
                        $(".case").prop("checked", true);
                    } else {
                        $(".case").prop("checked", false);
                    }
        });
    $(".case").click(function(){
                if($(".case").length == $(".case:checked").length) {
                    $("#selectall").prop("checked", true);
                } else {
                    $("#selectall").prop("checked", false);
                }

        });
    function confirmDeleteAll(){
        var message = confirm("Are your sure you want to delete all Selected Requests?");
        if(message==true){
            var id = [];
        $("input[name = 'case']:checked").each(function(){
            id.push($(this).attr('id'));
            $.get(`request/delete.php`,{id:id},function(_data){
            let data=JSON.parse(_data);
            if(data.response== true){
                $('#message').removeClass('hide').addClass('show').fadeOut(3000);
                var table = $('#manageRequests').DataTable();
                table.ajax.reload();
            }
            else{
                alert("Unable to delete some records. Please Try Again!");
            }
            })
        });
        }
        else{
            return false;
        }
    }
    $('.message').fadeIn(2000,function(){
        $('.message').fadeOut(3000);
    });
    
</script>
</body>
</html>