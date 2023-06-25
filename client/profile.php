<?php
require("top-navbar.php");
?>

        <div class="page-wrapper">
            <!-- Page Content-->
            <div class="page-content">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php">Law Affair</a></li>
                                        <li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Profile</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body  met-pro-bg">
                                    <div class="met-profile">
                                        <div class="row">
                                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                                <div class="met-profile-main">
                                                    <div class="met-profile-main-pic">
                                                        <img src="assets/images/users/kishan.png" alt="" class="rounded-circle">
                                                        <!-- <span class="fro-profile_main-pic-change">
                                                            <i class="fas fa-camera"></i>
                                                        </span> -->
                                                    </div>
                                                    <div class="met-profile_user-detail">
                                                        <h5 class="met-user-name">Kishan Nayak</h5>                                                        
                                                        <p class="mb-0 met-user-name-post">Senior Advocate</p>
                                                    </div>
                                                </div>                                                
                                            </div><!--end col-->
                                            <div class="col-lg-4 ml-auto">
                                                <ul class="list-unstyled personal-detail">
                                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> : +91 97406 84686</li>
                                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : kishannk11@gmail.com</li>
                                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : India</li>
                                                </ul>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end f_profile-->                                                                                
                                </div><!--end card-body-->
                                <div class="card-body">
                                    <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="general_detail_tab" data-toggle="pill" href="#general_detail">General</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings_detail_tab" data-toggle="pill" href="#settings_detail">Settings</a>
                                        </li>
                                    </ul>        
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content detail-list" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="general_detail">
                                    <div class="row">
                                        <div class="col-xl-4">  
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class=" d-flex justify-content-between">
                                                            <img src="assets/images/widgets/monthly-re.png" alt="" height="75">
                                                            <div class="align-self-center">
                                                                <h2 class="mt-0 mb-2 font-weight-semibold">$955<span class="badge badge-soft-success font-11 ml-2"><i class="fas fa-arrow-up"></i> 8.6%</span></h2>
                                                                <h4 class="title-text mb-0">Monthly Revenue</h4>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between bg-purple p-3 mt-3 rounded">
                                                            <div>
                                                                <h4 class="mb-1 font-weight-semibold text-white">$10255</h4>
                                                                <p class="text-white mb-0">Card Balance</p>
                                                            </div>
                                                            <div>
                                                                <h4 class=" mb-1 font-weight-semibold text-white">25.12 <small>BTC</small></h4>
                                                                <p class="text-white mb-0">Crypto Balance</p>
                                                            </div>
                                                        </div>                                    
                                                    </div><!--end card-body-->
                                                </div><!--end card-->                        
                                            <div class="card">
                                                <div class="card-body dash-info-carousel">
                                                    <h4 class="mt-0 header-title mb-4">Active Case</h4>
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button" class="btn btn-gradient-primary btn-sm">View Cases</button>
                                                    </div>
                                                    <div class="bg-light p-3 mt-3 d-flex justify-content-between">
                                                        <div>
                                                            <h2 class="mb-1 font-weight-semibold">402</h2>
                                                            <p class="text-muted mb-0">Total Cases Handelled</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end card-->
                                        </div><!--end col-->
                                        <div class="col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="float-lg-right float-none eco-revene-history justify-content-end">
                                                        <ul class="nav">
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="#">This Year</a>
                                                            </li>                                     
                                                        </ul>
                                                    </div>
                                                    <h4 class="header-title mt-0">Cases Attended</h4>
                                                    <canvas id="bar" class="drop-shadow w-100"  height="350"></canvas>
                                                </div><!--end card-body-->
                                            </div><!--end card-->                                          
                                        </div><!--end col-->  
                                    </div><!--end row-->                                     
                                </div><!--end general detail-->

                                
                                <div class="tab-pane fade" id="settings_detail">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-9 mx-auto">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form method="post" class="card-box">
                                                        <input type="file" id="input-file-now-custom-1" class="dropify"/>
                                                    </form>
        
                                                    <div class="">
                                                        <form class="form-horizontal form-material mb-0">
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Full Name" class="form-control">
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <input type="email" placeholder="Email" class="form-control" name="example-email" id="example-email">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="password" placeholder="password" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="password" placeholder="Re-password" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                            <div class="col-md-4">
                                                                    <select class="form-control">
                                                                        <option>+91</option>
                                                                        <option>+01</option>
                                                                        <option>+02</option>
                                                                        <option>+911</option>
                                                                        <option>+82</option>
                                                                    </select>
                                                                </div> 
                                                                <div class="col-md-8">
                                                                    <input type="text" placeholder="Phone No" class="form-control">
                                                                </div>
                                                                <!-- <div class="col-md-6">
                                                                    <select class="form-control">
                                                                        <option>London</option>
                                                                        <option>India</option>
                                                                        <option>Usa</option>
                                                                        <option>Canada</option>
                                                                        <option>Thailand</option>
                                                                    </select>
                                                                </div> -->
                                                            </div>
                                                            <div class="form-group">
                                                                <!-- <textarea rows="5" placeholder="Message" class="form-control"></textarea> -->
                                                                <button class="btn btn-gradient-primary btn-sm px-4 mt-3 float-right mb-0">Update Profile</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </div> <!--end col-->                                          
                                    </div><!--end row-->
                                </div><!--end settings detail-->
                            </div><!--end tab-content--> 
                            
                        </div><!--end col-->
                    </div><!--end row-->

                </div><!-- container -->

                <footer class="footer text-center text-sm-left">
                    &copy; 2020 Law Affair 
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metismenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/feather.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>   
        
        <script src="plugins/dropify/js/dropify.min.js"></script>
        <script src="plugins/moment/moment.js"></script>
        <script src="plugins/filter/isotope.pkgd.min.js"></script>
        <script src="plugins/filter/masonry.pkgd.min.js"></script>
        <script src="plugins/filter/jquery.magnific-popup.min.js"></script>
        <script src="plugins/chartjs/chart.min.js"></script>
        <script src="plugins/chartjs/roundedBar.min.js"></script>
        <script src="plugins/lightpick/lightpick.js"></script>
        <script src="assets/pages/jquery.profile.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        
    </body>

</html>