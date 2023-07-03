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
                                <li class="breadcrumb-item"><a href="dashboard.php">Legal Partner</a></li>
                                <li class="breadcrumb-item active">Add Client</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Client</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            
            <!-- Add Client Form Start -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
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
                        ?>
                        <?php
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
                        <?php
                        if (isset($_GET['required'])) {
                            $error = $_GET['required'];
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
                        <div class="card-body">
                            <form action="add_client.php" method="POST" enctype="multipart/form-data">
                            
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input class="form-control" name="name" type="text" id="example-text-input">
                                </div>
                                &nbsp;
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Mobile</label>
                                    <input class="form-control" name="mobileNumber" type="text" id="example-text-input">
                                </div>
                                &nbsp;
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input class="form-control" name="address" type="text" id="example-text-input">
                                </div>
                                &nbsp;
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">City</label>
                                    <input class="form-control" name="city" type="text" id="example-text-input">
                                </div>
                                &nbsp;
                                <div class="col-lg-6">
                                        <label for="exampleFormControlSelect1">State</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="state">
                                            <option>Select State</option>
                                            <option>Andhra Pradesh</option>
                                            <option>Arunachal Pradesh</option>
                                            <option>Assam</option>
                                            <option>Bihar</option>
                                            <option>Chhattisgarh</option>
                                            <option>Goa</option>
                                            <option>Gujarat</option>
                                            <option>Haryana</option>
                                            <option>Himachal Pradesh</option>
                                            <option>Jharkhand</option>
                                            <option>Karnataka</option>
                                            <option>Kerala</option>
                                            <option>Madhya Pradesh</option>
                                            <option>Maharashtra</option>
                                            <option>Manipur</option>
                                            <option>Meghalaya</option>
                                            <option>Mizoram</option>
                                            <option>Nagaland</option>
                                            <option>Odisha</option>
                                            <option>Punjab</option>
                                            <option>Rajasthan</option>
                                            <option>Sikkim</option>
                                            <option>Tamil Nadu</option>
                                            <option>Telangana</option>
                                            <option>Tripura</option>
                                            <option>Uttar Pradesh</option>
                                            <option>Uttarakhand</option>
                                            <option>West Bengal</option>
                                        </select>
                                    </div>
                                &nbsp;
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Pincode</label>
                                    <input class="form-control" name="pincode" type="text" id="example-text-input">
                                </div>
                                &nbsp;
                                
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Upload Photo</label>
                                    <input class="form-control" name="photo" type="file" id="example-text-input">
                                </div>
                                &nbsp;
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Upload Documents</label>
                                    <input class="form-control" name="document" type="file" id="example-text-input">
                                </div>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                <br>
                                
                                <button type="submit" class="btn btn-gradient-primary">Submit</button>
                                <button type="button" class="btn btn-gradient-danger">Cancel</button>
                            </form>                                           
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->    

            <!-- Add Client Form Ends -->
        </div><!-- container -->

        <footer class="footer text-center text-sm-left">
            &copy; 2023 Legal Partner
        </footer><!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->




<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metismenu.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/feather.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>

<script src="plugins/apexcharts/apexcharts.min.js"></script>
<script src="assets/pages/jquery.helpdesk-dashboard.init.js"></script>

<script src="plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>
