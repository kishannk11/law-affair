<?php
require_once('config/session.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Law Affair - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href=" /assets/images/favicon.png">

        <!-- App css -->
        <link href=" assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href=" assets/css/jquery-ui.min.css" rel="stylesheet">
        <link href=" assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href=" assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href=" assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
        
         <!-- Top Bar Start -->
         <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="helpdesk-index.php" class="logo">
                    <span>
                        <img src=" assets/images/logo.png" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src=" assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                    </span>
                </a>
            </div>
            <!--end logo-->
            <!-- Navbar -->
            <nav class="navbar-custom">    
                <ul class="list-unstyled topbar-nav float-right mb-0"> 

                   

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src=" assets/images/users/kishan.jpeg" alt="profile-user" class="rounded-circle" /> 
                            <span class="ml-1 nav-user-name hidden-sm">Kishan Nayak <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
                            <a class="dropdown-item" href="logout.php"><i class="ti-power-off text-muted mr-2"></i> Logout</a>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->
    
                <ul class="list-unstyled topbar-nav mb-0">                        
                    <li>
                        <button class="nav-link button-menu-mobile waves-effect waves-light">
                            <i class="ti-menu nav-icon"></i>
                        </button>
                    </li>
                    <li class="hide-phone app-search">
                        <form role="search" class="">
                            <input type="text" id="AllCompo" placeholder="Search ." class="form-control">
                            <a href=""><i class="fas fa-search"></i></a>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->

        
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <ul class="metismenu left-sidenav-menu">
                <li>
                    <a href=" dashboard/helpdesk-index.html"><i class="ti-bar-chart"></i><span>Dashboard</span></i></span></a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="ti-server"></i><span>Apps</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);"><i class="ti-control-record"></i>Email <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href=" /apps/email-inbox.html">Inbox</a></li>
                                <li><a href=" /apps/email-read.html">Read Email</a></li>
                            </ul>
                        </li>  
                        <li class="nav-item"><a class="nav-link" href=" /apps/chat.html"><i class="ti-control-record"></i>Chat</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /apps/contact-list.html"><i class="ti-control-record"></i>Contact List</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /apps/calendar.html"><i class="ti-control-record"></i>Calendar</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /apps/invoice.html"><i class="ti-control-record"></i>Invoice</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /apps/tasks.html"><i class="ti-control-record"></i>Tasks</a></li>
                        <li>
                            <a href="javascript: void(0);"><i class="ti-control-record"></i>Projects <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href=" /apps/project-overview.html">Overview</a></li>                                    
                                <li><a href=" /apps/project-projects.html">Projects</a></li>
                                <li><a href=" /apps/project-board.html">Board</a></li>
                                <li><a href=" /apps/project-teams.html">Teams</a></li>
                                <li><a href=" /apps/project-files.html">Files</a></li>
                                <li><a href=" /apps/new-project.html">New Project</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);"><i class="ti-control-record"></i>Ecommerce <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href=" /apps/ecommerce-products.html">Products</a></li>                                    
                                <li><a href=" /apps/ecommerce-product-list.html">Product List</a></li>
                                <li><a href=" /apps/ecommerce-product-detail.html">Product Detail</a></li>
                                <li><a href=" /apps/ecommerce-cart.html">Cart</a></li>
                                <li><a href=" /apps/ecommerce-checkout.html">Checkout</a></li>                                    
                            </ul>
                        </li>
                    </ul>
                </li>                   

                <li>
                    <a href="javascript: void(0);"><i class="ti-crown"></i><span>UI Kit</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);"><i class="ti-control-record"></i>Elements <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href=" /others/ui-bootstrap.html">Bootstrap</a></li>
                                <li><a href=" /others/ui-animation.html">Animation</a></li>
                                <li><a href=" /others/ui-avatar.html">Avatar</a></li>
                                <li><a href=" /others/ui-clipboard.html">Clip Board</a></li>
                                <li><a href=" /others/ui-files.html">File Manager</a></li>
                                <li><a href=" /others/ui-check-radio.html"><span>Check & Radio</span></a></li>
                            </ul>
                        </li>  
                        <li>
                            <a href="javascript: void(0);"><i class="ti-control-record"></i>Advanced UI <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href=" /others/advanced-rangeslider.html">Range Slider</a></li>
                                <li><a href=" /others/advanced-sweetalerts.html">Sweet Alerts</a></li>
                                <li><a href=" /others/advanced-nestable.html">Nestable List</a></li>
                                <li><a href=" /others/advanced-ratings.html">Ratings</a></li>
                                <li><a href=" /others/advanced-highlight.html">Highlight</a></li>
                                <li><a href=" /others/advanced-session.html">Session Timeout</a></li>
                                <li><a href=" /others/advanced-idle-timer.html">Idle Timer</a></li>
                            </ul>
                        </li>  
                        <li>
                            <a href="javascript: void(0);"><i class="ti-control-record"></i>Forms <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href=" /others/forms-elements.html">Basic Elements</a></li>
                                <li><a href=" /others/forms-advanced.html">Advance Elements</a></li>
                                <li><a href=" /others/forms-validation.html">Validation</a></li>
                                <li><a href=" /others/forms-wizard.html">Wizard</a></li>
                                <li><a href=" /others/forms-editors.html">Editors</a></li>
                                <li><a href=" /others/forms-repeater.html">Repeater</a></li>
                                <li><a href=" /others/forms-x-editable.html">X Editable</a></li>
                                <li><a href=" /others/forms-uploads.html">File Upload</a></li>
                            </ul>
                        </li>  
                        <li>
                            <a href="javascript: void(0);"><i class="ti-control-record"></i>Charts <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href=" /others/charts-apex.html">Apex</a></li>
                                <li><a href=" /others/charts-morris.html">Morris</a></li>
                                <li><a href=" /others/charts-flot.html">Flot</a></li>
                                <li><a href=" /others/charts-chartjs.html">Chartjs</a></li>
                            </ul>
                        </li>  
                        <li>
                            <a href="javascript: void(0);"><i class="ti-control-record"></i>Tables <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href=" /others/tables-basic.html">Basic</a></li>
                                <li><a href=" /others/tables-datatable.html">Datatables</a></li>
                                <li><a href=" /others/tables-responsive.html">Responsive</a></li>
                                <li><a href=" /others/tables-editable.html">Editable</a></li>
                            </ul>
                        </li>  
                        <li>
                            <a href="javascript: void(0);"><i class="ti-control-record"></i>Icons <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href=" /others/icons-materialdesign.html">Material Design</a></li>
                                <li><a href=" /others/icons-dripicons.html">Dripicons</a></li>
                                <li><a href=" /others/icons-fontawesome.html">Font awesome</a></li>
                                <li><a href=" /others/icons-themify.html">Themify</a></li>
                                <li><a href=" /others/icons-typicons.html">Typicons</a></li>
                            </ul>
                        </li>  
                        <li>
                            <a href="javascript: void(0);"><i class="ti-control-record"></i>Maps <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href=" /others/maps-google.html">Google Maps</a></li>
                                <li><a href=" /others/maps-vector.html">Vector Maps</a></li>  
                            </ul>
                        </li>  
                        <li>
                            <a href="javascript: void(0);"><i class="ti-control-record"></i>Email Template <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href=" /others/email-templates-basic.html">Basic Action Email</a></li>
                                <li><a href=" /others/email-templates-alert.html">Alert Email</a></li>
                                <li><a href=" /others/email-templates-billing.html">Billing Email</a></li>
                            </ul>
                        </li>   
                    </ul>                        
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="ti-layers-alt"></i><span>Pages</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href=" /pages/pages-profile.html"><i class="ti-control-record"></i>Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /pages/pages-timeline.html"><i class="ti-control-record"></i>Timeline</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /pages/pages-treeview.html"><i class="ti-control-record"></i>Treeview</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /pages/pages-starter.html"><i class="ti-control-record"></i>Starter Page</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /pages/pages-pricing.html"><i class="ti-control-record"></i>Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /pages/pages-gallery.html"><i class="ti-control-record"></i>Gallery</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="ti-lock"></i><span>Authentication</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href=" /authentication/auth-login.html"><i class="ti-control-record"></i>Log in</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /authentication/auth-register.html"><i class="ti-control-record"></i>Register</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /authentication/auth-recover-pw.html"><i class="ti-control-record"></i>Recover Password</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /authentication/auth-lock-screen.html"><i class="ti-control-record"></i>Lock Screen</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /authentication/auth-404.html"><i class="ti-control-record"></i>Error 404</a></li>
                        <li class="nav-item"><a class="nav-link" href=" /authentication/auth-500.html"><i class="ti-control-record"></i>Error 500</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- end left-sidenav-->
        <script src="  assets/js/jquery.min.js"></script>
        <script src="  assets/js/bootstrap.bundle.min.js"></script>
        <script src="  assets/js/metismenu.min.js"></script>
        <script src="  assets/js/waves.js"></script>
        <script src="  assets/js/feather.min.js"></script>
        <script src="  assets/js/jquery.slimscroll.min.js"></script>
        <script src="  assets/js/jquery-ui.min.js"></script>

        <script src="    plugins/moment/moment.js"></script>
        <script src="    plugins/apexcharts/apexcharts.min.js"></script>
        <script src="    plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="    plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="    plugins/flot-chart/jquery.canvaswrapper.js"></script>
        <script src="    plugins/flot-chart/jquery.colorhelpers.js"></script>
        <script src="    plugins/flot-chart/jquery.flot.js"></script>        
        <script src="    plugins/flot-chart/jquery.flot.saturated.js"></script>
        <script src="    plugins/flot-chart/jquery.flot.browser.js"></script>
        <script src="    plugins/flot-chart/jquery.flot.drawSeries.js"></script> 
        <script src="    plugins/flot-chart/jquery.flot.uiConstants.js"></script>
        <script src="    plugins/flot-chart/jquery.flot-dataType.js"></script>
        <script src="  assets/pages/jquery.crm_dashboard.init.js"></script>

        <!-- App js -->
        <script src="  assets/js/app.js"></script>