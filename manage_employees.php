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
    <title>Employees | Welcome to keshavinfotech</title>
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
    <script type="text/javascript" src="js/jquery.js"></script>
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
                        <li class="current">Employees</li>
                    </ul>
                </div> <!-- End : Breadcrumbs -->
                <div class="page-header">
                    <!-- Start : Page Header -->
                    <div class="col-md-3">
                        <div class="page-title">
                            <h3>Manage Employees</h3>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="page-title">
                        <h4 id="message" class="text-success message hide">Employees are Deleted Successfully!</h4>

                    <?php if(isset($_GET['message'])): $message =$_GET['message']; ?>
                    <?php    if($message=="true"){ ?>
                            <h4 class="text-success message">Employee Inserted Successfully!</h4>
                    <?php  }elseif($message=="false"){ ?>
                            <h4 class="text-danger message">Employee Failed to Insert. Please try Again!</h4>
                    <?php }
                    else if($message=="exists"){ ?>
                        <h4 class="text-danger message">Employee Already Exists!</h4>
                    <?php } elseif($message=="deletesuccessfully"){ ?>
                        <h4 class="text-success message">Employee Deleted Successfully!</h4>
                    <?php } elseif($message=="notdeleted"){ ?>
                        <h4 class="text-danger message">Employee Unable to Delete!</h4>
                    <?php } elseif($message=="editsucessfully"){ ?>
                        <h4 class="text-success message">Employee Updated Successfully!</h4>
                    <?php } elseif($message=="editunsucessfull"){ ?>
                        <h4 class="text-danger message">Employee Unable to Update!</h4>
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
                                <div class="caption"><i class="fa fa-table"></i>Employees</div>
                            </div>
                            <div class="portlet-body">
                                <div class="tableFixHead">
<!--                                     <form name="frmNewsList" method="post" action="#"> -->
                                        <table class="table table-bordered table-hover " id="manageEmployees" style="width: 100%">
                                            <thead>
                                              <tr>
                                                <th width="25px"><input type="checkbox" name="chkAll" id="selectall" value="chkAll" /></th>
                                                <th>No.</th>
                                                <th>Emp. ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Image</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>actions</th>
                                              </tr>
                                            </thead>
                                          </table>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="count" id="count" value="0" />
                                                <input style="margin-right:7px;" type="button" name="button2" id="button2" value="Add New" onclick="location.href='add_employee.php?mode=add'" class="btn green pull-left" />
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

    var manageEmployees;
    $(document).ready(function() {

          App.init();
          manageEmployees = $("#manageEmployees").DataTable({
            'ajax': 'employee/fetch.php',
            'orders': []
          });
        
    });
</script>
<script type="text/javascript">
    function confirmDelete(eid){
        var message = confirm("Are your sure you want to delete?");
        if(message==true){
            window.location.href = "employee/delete.php?eid="+eid+"&token=999";
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
        var message = confirm("Are your sure you want to delete all Selected Employees?");
        if(message==true){
            var eid = [];
        $("input[name = 'case']:checked").each(function(){
            eid.push($(this).attr('id'));
            $.get(`Employee/delete.php`,{eid:eid},function(_data){
            let data=JSON.parse(_data);
            if(data.response== true){
                $('#message').removeClass('hide').addClass('show').fadeOut(3000);
                var table = $('#manageEmployees').DataTable();
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