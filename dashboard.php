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
    <title>Reasons | Welcome to keshavinfotech</title>
    <script src="js/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css" />
    <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="assets/plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/><![endif]-->
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
</head>
<style type="text/css">
    .message{
        padding-bottom: 10px;
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
            <!-- Start : Inner Page Content -->
            <div class="container">
                <!-- Start : Inner Page container -->
                <div class="crumbs">
                    <!-- Start : Breadcrumbs -->
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="deskboard.html">Dashboard</a>
                        </li>
                        <li class="current">Reasons</li>
                    </ul>
                </div> <!-- End : Breadcrumbs -->
                <div class="page-header">
                    <!-- Start : Page Header -->
                    <div class="page-title">
                        <h3>Manage Reasons</h3>
                    </div>
                </div> <!-- End : Page Header -->
                <div class="row">
                    <div class="col-md-12 " style="height: 30px;">

                    <?php if(isset($_GET['message'])): $message =$_GET['message']; ?>
                    <?php    if($message=="true"){ ?>
                            <h4 class="text-success message">Reason Inserted Successfully!</h4>
                    <?php  }elseif($message=="false"){ ?>
                            <h4 class="text-danger message">Reason Failed to Insert. Please try Again!</h4>
                    <?php }
                    else if($message=="exists"){ ?>
                        <h4 class="text-danger message">Reason Already Exists!</h4>
                    <?php } elseif($message=="deletesuccessfully"){ ?>
                        <h4 class="text-success message">Reason Deleted Successfully!</h4>
                    <?php } elseif($message=="notdeleted"){ ?>
                        <h4 class="text-success message">Reason Unable to Delete Successfully!</h4>
                    <?php }?>

                    <?php endif; ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-table"></i>Reasons</div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <form name="frmNewsList" method="post" action="#">
                                        <table id="manageReasons" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="25px"><input type="checkbox" name="chkAll" id="chkAll" value="chkAll" onClick="chkSelectAll();" /></th>
                                                    <th width="25px">No.</th>
                                                    <th>Reason Name</th>
                                                    <th>Short Description</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="count" id="count" value="0" />
                                                <input style="margin-right:7px;" type="button" name="button2" id="button2" value="ADD NEW" onclick="location.href='add_reason.php?mode=add'" class="btn green pull-left" />
                                                &nbsp;
                                            </div>
                                        </div>
                                    </form>
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
    <script>
    $(document).ready(function() {
        var manageRoomTable;
        App.init();
        DataTabels.init();
        manageRoomTable = $("#manageReasons").DataTable({
        'ajax': 'http://localhost/ofice/katalog/reason/read.php',
        'orders': []
    }); 
    });
    </script>
    <script>
    function chkSelectAll() {
        totchk = document.getElementById("count").value;
        if (document.getElementById("chkAll").checked == true) {
            for (a = 1; a <= totchk; a++) {
                chkname = "chk" + a;
                document.getElementById(chkname).checked = true;
            }
        } else {
            for (a = 1; a <= totchk; a++) {
                chkname = "chk" + a;
                document.getElementById(chkname).checked = false;
            }
        }
    }

    function chkDelete() {
        return confirm("Are you sure that you want to delete the selected reason.");
    }

    $.ajax({
    url:"http://localhost/ofice/katalog/reason/read.php",
    method:"GET",
    dataType:"JSON",
    success:function(data)
    {
        console.log(data);
        var template = '';
        var serial = 1;
                if(data.records.length>0)
                {
                    for(var item in data.records)
                    {             
                    console.log(data.records[item].reason)

                        template +=`<tr>`;

                        template +=`<td><input type="checkbox" name="chk" /></td>`;

                        template +=`<td><h4>`+ serial++ +`</h4></td>`;

                        template +=`<td><h4>${data.records[item].reason}</h4></td>`;

                        template +=`<td><h4>${data.records[item].description}</h4></td>`;
               
                        template +=     `<td style="display:none" >${data.records[item].rid}</td>
                                        <td>
                                        <a class="btn btn-primary" href="edit_reason.php?rid=${data.records[item].rid}">Edit</a>
                                        <a onclick="chkDelete()" class="btn btn-danger"  href="reason/delete.php?rid=${data.records[item].rid}">Delete</a>
                                        </td>
                                    </tr>`;     
                    }
                    $('#myTable').html(template);
                } 
                else
                {
                    for(var item in data){
                        template +=`<tr>
                                <td></td>
                                <td><h4>Click Add New Question to Add Questions!</h4></td>
                                <td></td>
                                <td></td>
                            <tr>`;
                    }
                    template +=`</table>`;
                    $('#myTable').html(template);
                }
    }
   });

    </script>
</body>
</html>