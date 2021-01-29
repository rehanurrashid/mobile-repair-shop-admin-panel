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
    <title>Users | </title>
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
    <script language="JavaScript" type="text/javascript">
    var xmlHttp

    function top_GetXmlHttpObject() {
        var xmlHttp = null;
        try {
            // Firefox, Opera 8.0+, Safari
            xmlHttp = new XMLHttpRequest();
        } catch (e) {
            // Internet Explorer
            try {
                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        return xmlHttp;
    }

    function sam_GetSelectedItem(field_id) {
        var tmp = document.getElementById(field_id);
        var len = tmp.length
        var i = 0
        var chosen = ","

        for (i = 0; i < len; i++) {
            if (tmp[i].selected) {
                chosen = chosen + tmp[i].value + ","
            }
        }

        return chosen
    }

    function show_combo1(str) {
        xmlHttp = top_GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("Your browser does not support AJAX!");
            return;
        }
        var url = "ajax_get_subcategories5540.html";
        url = url + "?search_id=" + str + "&simple_multi=0";

        xmlHttp.onreadystatechange = top_stateChanged1;
        xmlHttp.open("GET.html", url, true);
        xmlHttp.send(null);
    }

    function top_stateChanged1() {
        if (xmlHttp.readyState == 4) {
            //tmp_txthint="txtHint1";

            document.getElementById("div_subcategories").innerHTML = xmlHttp.responseText;

        }
    }
    </script>
</head>

<body>
    <div id="container">
        <!-- Start : container -->
        
        <!-- scripts varibles  -->
    <script src="js/constants.js" language="javascript" type="text/javascript"></script>
    <!-- header -->
    <?php include("header.php"); ?>
        <div id="content">
            <!-- Start : Inner Page Content -->
            
          <!-- sidebar -->
          <?php include("sidebar.php"); ?>
            <div class="container">
                <!-- Start : Inner Page container -->
                <div class="crumbs">
                    <!-- Start : Breadcrumbs -->
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="deskboard.html">Dashboard</a>
                        </li>
                        <li class="current">Users</li>
                    </ul>
                </div> <!-- End : Breadcrumbs -->
                <div class="page-header">
                    <!-- Start : Page Header -->
                    <div class="page-title">
                        <h3>Update User</h3>
                        <span style="color:#CC6600;">
                        </span>
                    </div>
                </div> <!-- End : Page Header -->
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-bars"></i>Update Users</div>
                            </div>
                            <div class="portlet-body">
                                <form action="" method="post" name="frm" enctype="multipart/form-data" onSubmit="javascript:return keshav_check();" class="form-horizontal row-border" id="validate-1" novalidate="novalidate">
                                    <input type="hidden" name="mode" id="mode" value="add">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>User ID:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="eid" type="text" id="name" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>First Name:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="fname" type="text" id="name" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Last Name:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="lname" type="text" id="name" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Email:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="name" type="email" id="name" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Phone:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="phone" type="phone" id="sku" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Image:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="file" name="image" id="image_path" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Gender:
                                        </label>
                                        <div class="col-md-9">
                                            <input type="radio" name="gender" value="male"> Male<br>
                                            <input type="radio" name="gender" value="female"> Female<br>
                                            <input type="radio" name="gender" value="other"> Other<br> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Address:
                                        </label>
                                        <div class="col-md-9"> <textarea name="address" rows="4" cols="20" style="width: 100%"></textarea> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Password:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="password" name="password" id="password" />
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="hidden" value="" name="id">
                                        <input name="Submit" type="submit" value="Add" class="btn green pull-right" />
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
    function keshav_check() {
        /* -------------- Category Validation --------------------- */
        if (document.getElementById("category").value.split(" ").join("") == "" || document.getElementById("category").value.split(" ").join("") == "0" || document.getElementById("category").value.split(" ").join("") == "-") {
            alert("Please Select Category.");
            document.getElementById("category").focus();
            return false;
        }


        /* -------------- Sub Category Validation --------------------- */
        if (document.getElementById("subcategory").value.split(" ").join("") == "" || document.getElementById("subcategory").value.split(" ").join("") == "0" || document.getElementById("subcategory").value.split(" ").join("") == "-") {
            alert("Please Select Sub Category.");
            document.getElementById("subcategory").focus();
            return false;
        }


        /* -------------- Product Name Validation --------------------- */
        if (document.getElementById("name").value.split(" ").join("") == "" || document.getElementById("name").value.split(" ").join("") == "0") {
            alert("Please enter Product Name.");
            document.getElementById("name").focus();
            return false;
        }


        /* -------------- SKU Validation --------------------- */
        if (document.getElementById("sku").value.split(" ").join("") == "" || document.getElementById("sku").value.split(" ").join("") == "0") {
            alert("Please enter SKU.");
            document.getElementById("sku").focus();
            return false;
        }


        /* -------------- Price Validation --------------------- */
        if (document.getElementById("price").value.split(" ").join("") == "" || document.getElementById("price").value.split(" ").join("") == "0") {
            alert("Please enter Price.");
            document.getElementById("price").focus();
            return false;
        }


        /* -------------- Stock Validation --------------------- */
        if (document.getElementById("stock").value.split(" ").join("") == "" || document.getElementById("stock").value.split(" ").join("") == "0") {
            alert("Please enter Stock.");
            document.getElementById("stock").focus();
            return false;
        }


        /* -------------- Image Validation --------------------- */
        if (document.frm.mode.value == "Update" && document.frm.image_path.value.split(" ").join("") == "") {
            alert("Please Select Image.");
            document.frm.image_path.focus();
            return false
        }


        /* -------------- Short Description Validation --------------------- */
        if (document.getElementById("shortdescription").value.split(" ").join("") == "" || document.getElementById("shortdescription").value.split(" ").join("") == "0") {
            alert("Please enter Short Description.");
            document.getElementById("shortdescription").focus();
            return false;
        }


    }
    </script>
</body>
<!-- Mirrored from admin.keshavinfotechdemo.com/Update_Users.php?mode=Update by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Nov 2019 06:40:38 GMT -->

</html>