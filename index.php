<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Login | Welcome to keshavinfotech</title>
    <script src="js/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel='stylesheet' type='text/css' href="css/open-sans.css">
    <link rel='stylesheet' type='text/css' href="css/uniform.default.css">
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="css/style_default.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="images/favicon1.ico">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144x144-precomposed.png">
    
</head>

<body class="login">
    <div class="logo">
        <!-- BEGIN LOGO -->
        <img src="images/logo.png" alt="logo" />
    </div> <!-- END LOGO -->
    <div class="content">
        <!-- BEGIN LOGIN -->
        <form class="form-vertical login-form" action="admin/login.php">
            <h3 class="form-title">Login to your account</h3>
            <div class="control-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label">Username</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fa fa-user"></i>
                        <input class="form-control" type="text" placeholder="Username" name="username" id="username" value="admin" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fa fa-lock"></i>
                        <input class="form-control" type="password" placeholder="Password" name="password" id="password" value="admin" />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <label class="checkbox">
                    <input type="checkbox" name="remember" value="1" /> Remember me
                </label>
                <button type="submit" class="btn blue pull-right">
                    <i class="fa fa-check"></i> Login
                </button>
            </div>
            <div class="forget-password">
                <a href="javascript:;" class="" id="forget-password">Forgot your password ?</a>
            </div>
        </form> <!-- END LOGIN FORM -->
        <div class="row" id="incorrect_password">
            <div class="col-md-12"  >
                <div class="page-title">
                    <?php if(isset($_GET['message'])): $message =$_GET['message']; ?>
                        <?php    if($message=="false"){ ?>
                            <h5 style="color: #b94a48;font-weight: bold;" class=" message">Username/Password is Incorrect!</h5>
                        <?php } ?>
                    <?php endif; ?>  
                </div>
            </div>
        </div>
        <form class="form-vertical forget-form" action="admin/forget.php" method="GET">
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <h3 class="">Forget Password ?</h3>
            <p>Enter your e-mail address below to reset your password.</p>
            <div class="control-group">
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fa fa-envelope-o"></i>
                        <input class="form-control" type="email" placeholder="Email" name="email" id="email" required />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn">
                    <i class="fa fa-arrow-left"></i> Back
                </button>
                <button type="submit" class="btn green pull-right">
                    <i class="fa fa-check"></i> Submit
                </button>
            </div>
        </form> <!-- END FORGOT PASSWORD FORM -->
        <div class="row" id="incorrect_email">
            <div class="col-md-12"  >
                <div class="page-title">
                    <?php if(isset($_GET['message'])): $message =$_GET['message']; ?>
                        <?php    if($message=="incorrect"){ ?>
                            <h5 style="color: #b94a48;font-weight: bold;" class=" message">No user registered with this email! Please try again</h5>
                        <?php } else if($message=="mailsent") { ?>
                            <h5 style="font-weight: bold;" class="text-success message">Check your email. Password is sent to your email.</h5>
                        <?php } elseif($message=="mailnotsent"){ ?>
                            <h5 style="color: #b94a48;font-weight: bold;" class=" message">Email not sent due to some error. 
                            Please try again</h5>
                        <?php }?>
                    <?php endif; ?>  
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN -->
    <!-- BEGIN COPYRIGHT -->
    <!-- END COPYRIGHT -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="js/jquery.blockUI.js"></script>
    <script type="text/javascript" src="js/jquery.event.move.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script>
    $(document).ready(function() {
        App.initLogin();
        $('#forget-password').click(function(){
            $('#incorrect_password').hide();
        })
    });
    </script>
</body>
</html>
<?php

if(isset($_GET['message'])){
    if($_GET['message'] == "mailsent" || $_GET['message'] == "incorrect" || $_GET['message'] == "mailnotsent"){

        ?>
        <script type="text/javascript">
            $('.login-form').hide();
            $('.forget-form').show();
        </script>
        <?php
    }
}

 ?>