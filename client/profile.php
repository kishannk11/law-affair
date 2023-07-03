<?php
require("top-navbar.php");
?>
<?php
if (isset($_GET['success'])) {
    $success = $_GET['success'];
    //echo '<div class="alert alert-success">' . htmlspecialchars($success ). '</div>';
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "' . htmlspecialchars($success) . '",
                icon: "success",
                confirmButtonText: "OK"
            });
        });
    </script>';
}

if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '",
        });
    });
</script>';
}
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
                                        <li class="breadcrumb-item"><a href="dashboard.php">Legal Partner</a></li>
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
                                                    <?php
                                                    include 'config/config.php';
                                                    $user = new UserProfile($conn);
                                                    $info=$user->displayUserInfo();

                                                    ?>
                                                    <div class="met-profile-main-pic">
                                                        <img src="../admin/uploads/<?php echo $info['photo']; ?>" alt="" class="rounded-circle" width="100" height="100">
                                                        <!-- <span class="fro-profile_main-pic-change">
                                                            <i class="fas fa-camera"></i>
                                                        </span> -->
                                                    </div>
                                                    <div class="met-profile_user-detail">
                                                        <h5 class="met-user-name"><?php echo $info['name']; ?></h5>                                                        
                                                        <p class="mb-0 met-user-name-post"></p>
                                                    </div>
                                                </div>                                                
                                            </div><!--end col-->
                                            <div class="col-lg-4 ml-auto">
                                                <ul class="list-unstyled personal-detail">
                                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> : +91 <?php echo $info['mobile_number']; ?></li>
                                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : <?php echo $info['email']; ?></li>
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
                    <?php
                    require_once 'config/config.php';
                    $case = new totalCase($conn);
                    $total_count_case = $case->getTotalCount();
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content detail-list" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="general_detail">
                                    <div class="row">
                                        <div class="col-xl-12">  
                                                <div class="card">
                                                    <!--end card-->                        
                                            <div class="card">
                                                <div class="card-body dash-info-carousel">
                                                    <h4 class="mt-0 header-title mb-4">Active Case</h4>
                                                    <div class="d-flex justify-content-between">
                                                    <a href="case_list.php">
                                                        <button type="button" class="btn btn-gradient-primary btn-sm">View Cases</button>
                                                        </a>
                                                    </div>
                                                    <div class="bg-light p-3 mt-3 d-flex justify-content-between">
                                                        <div>
                                                            <h2 class="mb-1 font-weight-semibold"><?php echo $total_count_case;?></h2>
                                                            <p class="text-muted mb-0">Total Cases Handelled</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end card-->
                                        </div><!--end col-->
                                        <!--end col-->  
                                    </div><!--end row-->                                     
                                </div><!--end general detail-->

                                
                                <div class="tab-pane fade" id="settings_detail">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-9 mx-auto">
                                            <div class="card">
                                                <div class="card-body">
                                                    
        
                                                    <div class="">
                                                        <form class="form-horizontal form-material mb-0" method="POST" action="update_profile.php" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Full Name" name="name" value="<?php echo $info['name']; ?>"class="form-control">
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <input type="email" placeholder="Email" name="email" class="form-control" value="<?php echo $info['email']; ?>" name="example-email" id="example-email">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="password" name="password" placeholder="password" class="form-control">
                                                                </div>
                                                        
                                                            </div>
                                                            <div class="form-group row">
                                                
                                                                <div class="col-md-12">
                                                                    <input type="text" placeholder="Phone No" value="<?php echo $info['mobile_number']; ?>" name="phone" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                            <input type="file" name="file" enctype="multipart/form-data">
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
                    &copy; 2020 Legal Partner 
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
        <script src="plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="assets/pages/jquery.sweet-alert.init.js"></script>
    </body>

</html>