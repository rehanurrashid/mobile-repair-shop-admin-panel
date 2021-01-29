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
    <title>User | </title>
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
                        <li class="current">User</li>
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
                    <div class="col-md-9 col-sm-9">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-bars"></i>Update User</div>
                            </div>
                            <div class="portlet-body">
                                 <form action="user/edit.php" method="post" name="frm" enctype="multipart/form-data" onSubmit="javascript:return keshav_check();" class="form-horizontal row-border" id="validate-1" novalidate="novalidate">
                                    <input type="hidden" name="mode" id="mode" value="add">
                                    <input type="hidden" name="uid" id="uid">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>User ID:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="user_id" type="text" id="user_id" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>First Name:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="user_fname" type="text" id="user_fname" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Last Name:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="user_lname" type="text" id="user_lname" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Email:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="user_email" type="email" id="user_email" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Phone:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control required" name="user_phone" type="phone" id="user_phone" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Image:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="file" name="user_image" id="user_image" />
                                            <p id="error1" style="display:none; color:#FF0000;">
                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                            </p>
                                            <p id="error2" style="display:none; color:#FF0000;">
                                            Maximum File Size Limit is 5MB.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-center hide" id="user_image_div_display">
                                        <a style="cursor: pointer;" data-toggle="modal" data-target="#modal_user_image">
                                            <img id="user_image_display"  class="img-thumbnail" height="200px" width="200px">
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Gender:
                                        </label>
                                        <div class="col-md-9">
                                            <input type="radio" name="user_gender" value="male"> Male<br>
                                            <input type="radio" name="user_gender" value="female"> Female<br>
                                            <input type="radio" name="user_gender" value="other"> Other<br> 
                                        </div>
                                        <label class="gender_error" id="gender_error" style="color:#FC2727;margin-top: 1%;margin-left: 30%">You have to Check One Option.</label>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Address:
                                        </label>
                                        <div class="col-md-9"> <textarea id="user_address" name="user_address" rows="4" cols="20" style="width: 100%"></textarea> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            <span class="required">*</span>Password:
                                        </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="password" name="user_password" id="user_password" />
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="hidden" value="" name="id">
                                        <input name="submit" type="submit" value="Update" class="btn blue pull-right" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End : Inner Page container -->
        </div> <!-- End : Inner Page Content -->

<!-- Modal User Image-->
  <div class="modal fade" id="modal_user_image" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img id="user_image_modal"  class="img-thumbnail" height="500px" width="500px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
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

        // image validation code
        $('input[type="submit"]').prop("disabled", true);
        var a=0;
        //binds to onchange event of your input field
        $('#user_image').bind('change', function() {
        if ($('input:submit').attr('disabled',false)){
             $('input:submit').attr('disabled',true);
             }
            var ext = $('#user_image').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
             $('#error1').slideDown("slow");
             $('#error2').slideUp("slow");
             a=0;
             }else{
             var picsize = (this.files[0].size);
             if (picsize > 5000000){
             $('#error2').slideDown("slow");
             a=0;
             }else{
             a=1;
             $('#error2').slideUp("slow");
             }
             $('#error1').slideUp("slow");
             if (a==1){
             $('input:submit').attr('disabled',false);
             }
            }
        });

        // gender validation
      $('label.gender_error').hide(); // Hide Warning Label.
      $("input[name=submit]").on("click", function() {

            var user_gender=document.getElementsByName('user_gender');
            if (!(user_gender[0].checked || user_gender[1].checked || user_gender[2].checked)) {
                $("label.gender_error").show(); // show Warning 
                return false;
            }
            else{
                $("label.gender_error").hide(); // show Warning 
        }
        });
      
      $('#user_id').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('#user_fname').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('#user_lname').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      $('#user_email').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      $('#user_phone').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      $('#user_image').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      $('#user_address').on('input', function() {
        var input=$(this);
        var is_name=input.text();
        console.log(is_name)
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      var uid ="<?php echo $_GET['uid'] ?>";
      console.log(uid)
      $.ajax({
        url:"user/read.php",
        method:"GET",
        data:{uid:uid},
        dataType:"JSON",
        success:function(data)
        {
            console.log(data);
            var tuserlate = '';
            var serial = 1;
                if(data.records.length>0)
                {
                    console.log(data.records)
                    for(var item in data.records)
                    {      

                        // console.log(data.records[item].user_id);

                        $('#uid').val(data.records[item].uid);
                        $('#user_id').val(data.records[item].user_id);
                        $('#user_fname').val(data.records[item].user_fname);
                        $('#user_lname').val(data.records[item].user_lname);
                        $('#user_email').val(data.records[item].user_email);
                        $('#user_phone').val(data.records[item].user_phone);
                        $('#user_gender').val(data.records[item].user_gender);
                        $('#user_address').html(data.records[item].user_address);
                        $('#user_password').html(data.records[item].user_address);
                        if(data.records[item].user_image!=""){
                                $('#user_image_div_display').removeClass('hide').addClass('show');
                                $('#user_image_display').attr('src', data.records[item].user_image);
                                $('#user_image_modal').attr('src', data.records[item].user_image);
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