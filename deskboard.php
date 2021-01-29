<?php
// include_once 'config/database.php';
session_start();
// print_r($_SESSION['msg']);exit;
if( !isset($_SESSION["name"]))
    {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <!-- Head Links -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Dashboard | keshavinfotech</title>
    <script src="js/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel='stylesheet' type='text/css' href="css/open-sans.css">
    <link rel='stylesheet' type='text/css' href="css/fullcalendar.css">
    <link rel='stylesheet' type='text/css' href="css/morris.css">
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="css/style_default.css" rel="stylesheet" type="text/css" />
    <link href="css/smart_wizard.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="images/favicon1.ico">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144x144-precomposed.png">
</head>

<body style="font-family:Arial, Helvetica, sans-serif;">

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
                        <li class="current">
                            <i class="fa fa-home"></i>Dashboard
                        </li>
                    </ul>
                </div> <!-- End : Breadcrumbs -->
                <div class="page-header">
                    <!-- Start : Page Header -->
                    <div class="col-md-3">
                        <div class="page-title">
                            <h3>Dashboard</h3>
                        <span>statistics and more</span>
                        </div>
                    </div>
                    <div class="col-md-9" id="msg" style="color: black;display: none">
                        <div class="page-title">
                            <h3>
                                <?php if(empty($_SESSION['msg'])) {echo " ";} else echo $_SESSION['msg'];  ?>  
                            </h3>
                        </div>
                    </div>
                    <div class="col-md-9" id="password" >
                        <div class="page-title">
                                <?php if(isset($_GET['message'])): $message =$_GET['message']; ?>
                                    <?php    if($message=="success"){ ?>
                                        <h3 class="text-success message">Password Updated Successfully!</h3>
                                    <?php  }elseif($message=="failed"){ ?>
                                            <h3 class="text-danger message">Password Failed to Update. Please try Again!</h3>
                                    <?php } ?>
                                <?php endif; ?>  
                        </div>
                    </div>
                </div> <!-- End : Page Header -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- For Dashboard Staters -->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        102
                                    </div>
                                    <div class="desc">
                                        New User
                                    </div>
                                </div>
                                <a class="more" href="#">
                                    View All <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        110
                                    </div>
                                    <div class="desc">
                                        New Orders
                                    </div>
                                </div>
                                <a class="more" href="#">
                                    Check All <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="dashboard-stat red">
                                <div class="visual">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        75
                                    </div>
                                    <div class="desc">
                                        New E-mails
                                    </div>
                                </div>
                                <a class="more" href="#">
                                    View more <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="dashboard-stat purple">
                                <div class="visual">
                                    <i class="fa fa-dollar"></i>

                                </div>
                                <div class="details">
                                    <div class="number">
                                        $1029
                                    </div>
                                    <div class="desc">
                                        Total Profit
                                    </div>
                                </div>
                                <a class="more" href="#">
                                    View more <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div> <!-- END : Dashboard Staters -->
                    <!-- <div class="col-md-6">
                        <div class="portlet dashboardPort">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cloud"></i>Server Load</div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="javascript:;" class="reload"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="load_statistics" style="height:108px;"></div>
                            </div>
                        </div>
                    </div> --> <!-- END : Server Load -->
                </div>
            </div> <!-- End : Inner Page container -->
            <a href="javascript:void(0);" class="scrollup">Scroll</a>
        </div> <!-- End : Inner Page Content -->
    </div>
    <p>
    
        <!-- End : container -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="js/jquery.blockUI.js"></script>
        <script type="text/javascript" src="js/jquery.event.move.js"></script>
        <script type="text/javascript" src="js/lodash.compat.js"></script>
        <script type="text/javascript" src="js/respond.min.js"></script>
        <script type="text/javascript" src="js/excanvas.js"></script>
    </p>
    <p>&nbsp; </p>
    <p>&nbsp;</p>
    <p>&nbsp; </p>
    <p>&nbsp;</p>
    <p>
        <script type="text/javascript" src="js/breakpoints.js"></script>
        <script type="text/javascript" src="js/touch-punch.min.js"></script>
        <script type="text/javascript" src="js/jquery.flot.min.js"></script>
        <script type="text/javascript" src="js/jquery.flot.tooltip.js"></script>
        <script type="text/javascript" src="js/jquery.flot.pie.min.js"></script>
        <script type="text/javascript" src="js/jquery.flot.time.min.js"></script>
        <script type="text/javascript" src="js/jquery.sparkline.js"></script>
        <script type="text/javascript" src="js/fullcalendar.min.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
    </p>
    <script>
    jQuery(document).ready(function() {
        App.init();
        Dashboard.init();

    });
    </script>
</body>
</html>
<?php 
if(!empty($_SESSION['msg']))
{
?>
    <script>
        $(document).ready(function(){
            $("#msg").fadeIn(3000,function(){
                $("#msg").fadeOut(3000);
            });
            
            
          });
    </script>
<?php
}
unset($_SESSION['msg']);
?>