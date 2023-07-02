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
                                <li class="breadcrumb-item active">Edit Client</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Client</h4>
                    </div>
                    <!--end page-title-box-->
                </div>
                <!--end col-->
            </div>
            <!-- end page title end breadcrumb -->

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
                        <?php
                        include 'config/config.php';
                        include 'Database.php';
                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);
                        $clientDetails = new ClientDetails($conn);
                        $id = $_GET['id'];
                        $client = $clientDetails->getClientDetails($id);

                        ?>
                        <div class="card-body">
                            <form action="update_client.php" method="POST" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <label for="example-text-input" class="">Name</label>

                                            <input class="form-control" name="id" type="hidden" id="example-text-input"
                                                value="<?php echo $client['id'] ?>">
                                            <input class="form-control" name="name" type="text" id="example-text-input"
                                                value="<?php echo htmlspecialchars($client['name']) ?>">

                                        </div>
                                        <div class="col-lg-12">
                                            <label for="example-tel-input" class="">Mobile
                                                Number</label>

                                            <input class="form-control" name="mobileNumber" type="tel"
                                                id="example-tel-input" value="<?php echo $client['mobile_number'] ?>">

                                        </div>

                                        <div class="col-lg-12">
                                            <label class="">Upload Photo</label>

                                            <div class="custom-file">
                                                <input type="file" class="" id="customFile" name="photo"
                                                    value="<?php echo $client['photo_name'] ?>">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>

    
                                        <div class="col-lg-12">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input class="form-control" name="address" value="<?php echo $client['address'] ?>"type="text"
                                                id="example-text-input">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="exampleInputEmail1">City</label>
                                            <input class="form-control" name="city" type="text" value="<?php echo $client['city'] ?>" id="example-text-input">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="exampleFormControlSelect1">State</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
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
                                        <div class="col-lg-12">
                                            <label for="exampleInputEmail1">Pincode</label>
                                            <input class="form-control" name="pincode" type="text"
                                                id="example-text-input" value="<?php echo $client['pincode'] ?>">
                                        </div>

                                        <div class="col-lg-12">
                                            <label for="example-datetime-local-input" class="">Upload Documents</label>

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile04"
                                                    name="document" value="<?php echo $client['document_name'] ?>">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        &nbsp;
                                        &nbsp;

                                        <div class="row">
                                            <div class="col-sm-10 ml-auto">
                                                <button type="submit" class="btn btn-gradient-primary">Submit</button>
                                                <button type="button" class="btn btn-gradient-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->

        </div><!-- container -->

        <footer class="footer text-center text-sm-left">
            &copy; 2023 Legal Partner
        </footer>
        <!--end footer-->
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