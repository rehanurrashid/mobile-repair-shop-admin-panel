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
    <title>Reason | </title>
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
    <SCRIPT language=javascript src="body.js"></SCRIPT>
    <link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendarc5b3.css?random=20051112" media="screen" />
    <script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendarcfb7.js?random=20060118"></script>
</head>
<style type="text/css">
    input.invalid, textarea.invalid{
    border: 2px solid red;
}

input.valid, textarea.valid{
    border: 2px solid green;
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
                        <li class="current">Reason</li>
                    </ul>
                </div> <!-- End : Breadcrumbs -->
                <div class="page-header">
                    <!-- Start : Page Header -->
                    <div class="page-title">
                        <h3>Update Reason</h3>
                        <span style="color:#CC6600;">
                        </span>
                    </div>
                </div> <!-- End : Page Header -->
                <div class="row">
                    <div class="col-md-9 col-sm-9">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-bars"></i>Update Reason</div>
                            </div>
                            <div class="portlet-body">
                                <form action="reason/edit.php" method="post" name="frm" enctype="multipart/form-data" onSubmit="javascript:return keshav_check();" class="form-horizontal row-border" id="validate-1" novalidate="novalidate">
                                    <input type="hidden" name="mode" id="mode" value="Update">
                                    <input type="hidden" name="rid" id="rid">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Reason of Damage:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="reason" type="text" id="reason" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Short Description
                                        </label>
                                        <div class="col-md-9">
                                            <textarea class="form-control required" name="shortdescription" id="shortdescription" cols="50" rows="7"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="hidden" value="" name="id">
                                        <input name="Submit" type="submit" value="Update" class="btn blue pull-right" />
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

      $('#reason').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('#shortdescription').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      var rid ="<?php echo $_GET['rid'] ?>";
      console.log(rid)
      $.ajax({
        url:"reason/read.php",
        method:"GET",
        data:{rid:rid},
        dataType:"JSON",
        success:function(data)
        {
            // console.log(data);
            var template = '';
            var serial = 1;
                if(data.records.length>0)
                {
                    for(var item in data.records)
                    {             
                        // console.log(data.records[item].reason);

                        $('#rid').val(data.records[item].rid);
                        $('#reason').val(data.records[item].reason);
                        $('#shortdescription').html(data.records[item].description);  
                    }
                } 
                else
                {
                    for(var item in data){
                        alert("no data found!")
                    }
                }
        }
       });
    });
    </script>
</body>
</html>