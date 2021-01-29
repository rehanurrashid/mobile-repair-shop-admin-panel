<header class="header navbar navbar-fixed-top" role="banner">
        <!-- Start: Header and Nav Bar -->
        <div class="container">
            <!-- Start: Nav Bar Container -->
            <ul class="nav navbar-nav">
                <!-- Start: Mobile Menu toggle -->
                <li class="nav-toggle">
                    <a href="javascript:void(0);" title="">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul> <!-- End Mobile Menu toggle -->
            <a class="navbar-brand" href="deskboard.php">
                <!-- Start: Logo -->
                <img src="images/logo.png" alt="logo" />
                <strong>Welcome</strong> </a> <!-- End Logo -->
            <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation" >
                <i class="fa fa-bars"></i>
            </a> <!-- End : Desktop Main Menu Toggler -->
            <ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
                <!-- Start : Top Left Drop down -->
                <li><a href="deskboard.php">Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Employees <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="manage_employees.php">
                                <i class="fa fa-user"></i>Employees </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Users <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="manage_users.php">
                                <i class="fa fa-users"></i>Users </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Devices <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="manage_devices.php">
                                <i class="fa fa-desktop"></i>Devices </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Reason of Damage <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="manage_reasons.php">
                                <i class="fa fa-tasks"></i>Reason of Damage </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Currier <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="manage_currier.php">
                                <i  class="fa fa-archive" aria-hidden="true"></i>Currier </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Requests <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="manage_requests.php">
                                <i class="fa fa-file"></i>Requests </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Users Messages <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="manage_messages.php">
                                <i class="fa fa-comment"></i>Users Messages </a>
                        </li>
                    </ul>
                </li>
            </ul> <!-- End : Top Left Drop down -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Start : Top Right Drop down Menu -->
                <li class="dropdown user">
                    <!-- Start : User Drop Down -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="userImg" src="images/avatar-1.png">
                        <span class="username"></span>
                        <i class="fa fa-angle-down small"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="">
                                <i class="fa fa-user"></i></i> <?php echo $_SESSION['name']; ?>
                            </a>
                        </li>
                        <li>
                            <a href="changepass.php">
                                <i class="fa fa-edit"></i> My Profile
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="" data-toggle="modal" data-target="#modal_logout">
                                <i class="fa fa-power-off"></i> Log Out
                            </a>
                        </li>
                    </ul>
                </li> <!-- End : User Drop Down -->
            </ul> <!-- End : Top Right Drop down Menu -->
        </div> <!-- End Nav Bar Container -->
    </header> <!-- End Header and Nav Bar -->
    <div class="modal fade" id="modal_logout" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Alert!</h4>
        </div>
        <div class="modal-body text-center">
          <h4>Are your sure you want to logout?</h4>
        </div>
        <div class="modal-footer">
            <a href="admin/logout.php" type="button" class="btn btn-danger" >Logout</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>