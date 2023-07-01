<?php
require_once('config/session.php');
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark" >

    <head>
        <meta charset="utf-8" />
        <title>Law Affair - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <link href="plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
        <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <!-- App css -->

        <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 


        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/jquery-ui.min.css" rel="stylesheet">
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
        .error-popup {
            color: red;
        }
        .error-title {
            color: red;
        }
        .error-text {
            color: red;
        }
        </style>

    </head>

    <body class="dark-topbar">
        
         <!-- Top Bar Start -->
         <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="dashboard.php" class="logo">
                    <span>
                        <img src="assets/images/new-logo.png" alt="logo" class="logo-sm">
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
                            <img src="assets/images/users/admin-dp.png" alt="profile-user" class="rounded-circle"width="40" height="40"> 
                            <span class="ml-1 nav-user-name hidden-sm">Admin<i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="profile.php"><i class="ti-user text-muted mr-2"></i> Profile</a>
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
                            <input type="text" placeholder="Search..." class="form-control">
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
                    <a href="dashboard.php"><i class="ti-bar-chart"></i><span>Dashboard</span></i></a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="ti-tag"></i><span>Advocates</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="add_advocate.php"><i class="ti-control-record"></i>Add Advocate</a></li>
                        <li class="nav-item"><a class="nav-link" href="advocate-list.php"><i class="ti-control-record"></i>Advocates List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="mdi mdi-account-alert"></i><span>Clients</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="client.php"><i class="ti-control-record"></i>Add Client</a></li>
                        <li class="nav-item"><a class="nav-link" href="client_list.php"><i class="ti-control-record"></i>Client List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="ti-briefcase"></i><span>Cases</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="add_case.php"><i class="ti-control-record"></i>Add Case</a></li>
                        <li class="nav-item"><a class="nav-link" href="case_list.php"><i class="ti-control-record"></i>Case List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="reports_list.php"><i class="ti-bar-chart"></i><span>Reports</span></i></span></a>
                </li>

                <li>

                    <a href="logout.php"><i class="ti-power-off"></i><span>Logout</span></i></span></a>
                </li>

            </ul>
        </div>
        <!-- end left-sidenav-->