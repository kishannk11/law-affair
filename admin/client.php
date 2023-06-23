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
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input class="form-control" name="name" type="text" id="example-text-input">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile</label>
                                    <input class="form-control" name="mobile_number" type="text" id="example-text-input">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Upload Photo</label>
                                    <input class="form-control" name="upload_photo" type="file" id="example-text-input">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <textarea class="form-control" name="address" rows="5" id="message"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Upload Documents</label>
                                    <input class="form-control" name="upload_document" type="file" id="example-text-input">
                                </div>
                                
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
            &copy; 2023 Law Affair
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