
<nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="../">
                        <!-- Logo icon -->
                        <b><img src="../resources/images/GADDSEAPLOGOV2.png" style=" height: 40px;" alt="GADDSEAP" class="dark-logo" /></b>

                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>GADDSEAP</span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                        <!-- blank space between logo and notifs and profile-->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0 pull-right">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../resources/admindesign/images/bookingSystem/2.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-user"></i><?php echo "  ".$_SESSION['accountname'];?></a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
<!-- Modal -->
