<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title> @yield('page_title', 'Dashboard') </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Zij Admin Panel" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend') }}/images/favicon.ico">

        <!-- Plugins css-->
        <link href="{{ asset('backend') }}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Datatable-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

        <!-- App css -->
        <link href="{{ asset('backend') }}/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{ asset('backend') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend') }}/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('backend') }}/images/flags/us.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('backend') }}/images/flags/germany.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Bangla</span>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list d-none d-md-inline-block">
                        <a href="#" id="btn-fullscreen" class="nav-link waves-effect waves-light">
                            <i class="mdi mdi-crop-free noti-icon"></i>
                        </a>
                    </li>

                

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('backend') }}/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-face-profile"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-settings"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-lock"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{ route('logout') }} javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sl-menu-link dropdown-item notify-item">
                                <div class="sl-menu-item">
                                  <i class="mdi mdi-power"></i>
                                  <span class="menu-item-label">Logout</span>
                                </div><!-- menu-item -->
                            </a><!-- sl-menu-link -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="mdi mdi-settings-outline noti-icon"></i>
                        </a>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                        <a href="{{ route('home') }}" class="logo text-center logo-dark">
                            <span class="logo-lg">
                                <img src="{{ asset('backend') }}/images/logo-dark.png" alt="" height="16">
                                <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-lg-text-dark">M</span> -->
                                <img src="{{ asset('backend') }}/images/logo-sm.png" alt="" height="25">
                            </span>
                        </a>

                        <a href="{{ route('home') }}" class="logo text-center logo-light">
                            <span class="logo-lg">
                                <img src="{{ asset('backend') }}/images/logo-light.png" alt="" height="16">
                                <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-lg-text-dark">M</span> -->
                                <img src="{{ asset('backend') }}/images/logo-sm.png" alt="" height="25">
                            </span>
                        </a>
                    </div>

                <!-- LOGO -->
  

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
        
                    <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->
            
            <!-- ========== Left Sidebar Start ========== -->
           @include('layouts.sidebarmenu')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    @yield('dashboard_content')

                </div>
                <!-- end content -->

                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                Copyright & 2021 <strong class="text-danger">Zij</strong> | All Rights Reserved.		
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        
         

        <!-- Right bar overlay-->
        {{-- <div class="rightbar-overlay"></div> --}}

        <!-- Vendor js -->
        <script src="{{ asset('backend') }}/js/vendor.min.js"></script>

        <script src="{{ asset('backend') }}/libs/moment/moment.min.js"></script>
        <script src="{{ asset('backend') }}/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
        <script src="{{ asset('backend') }}/libs/sweetalert2/sweetalert2.min.js"></script>
        
        <!-- Chat app -->
        <script src="{{ asset('backend') }}/js/pages/jquery.chat.js"></script>

        <!-- Todo app -->
        <script src="{{ asset('backend') }}/js/pages/jquery.todo.js"></script>

        <!-- flot chart -->
        <script src="{{ asset('backend') }}/libs/flot-charts/jquery.flot.js"></script>
        <script src="{{ asset('backend') }}/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="{{ asset('backend') }}/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="{{ asset('backend') }}/libs/flot-charts/jquery.flot.resize.js"></script>
        <script src="{{ asset('backend') }}/libs/flot-charts/jquery.flot.pie.js"></script>
        <script src="{{ asset('backend') }}/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="{{ asset('backend') }}/libs/flot-charts/jquery.flot.stack.js"></script>
        <script src="{{ asset('backend') }}/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboard init JS -->
        <script src="{{ asset('backend') }}/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="{{ asset('backend') }}/js/app.min.js"></script>
        <script src="https://kit.fontawesome.com/58e523b3cc.js" crossorigin="anonymous"></script>
        
        <!-- Datatable js -->
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

        @yield('footer_scripts')

    </body>
</html>