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
                                <li class="breadcrumb-item active">Edit Advocate</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Advocate</h4>
                    </div>
                    <!--end page-title-box-->
                </div>
                <!--end col-->
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <?php
                if (isset($_GET['succes'])) {
                    $success = $_GET['succes'];
                    // echo '<div class="alert alert-success">' . $success . '</div>';
                    echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire("Success!", "' .htmlspecialchars( $success, ENT_QUOTES, 'UTF-8') . '", "success");
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="update_advocate.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php
                                         include 'config/config.php';
                                         include 'Database.php';
                                         ini_set('display_errors', 1);
                                         ini_set('display_startup_errors', 1);
                                         error_reporting(E_ALL);
                                         $advocate = new Advocate($conn);
                                         $id = $_GET['id'];
                                         $advocateDetails = $advocate->getAdvocateDetailsById($id);
                                         // Extract the advocate details
                                         $name = $advocateDetails['name'];
                                         $mobile_number = $advocateDetails['mobile_number'];
                                         $joining_date = $advocateDetails['joining_date'];
                                         $photo = $advocateDetails['photo'];
                                         $address = $advocateDetails['address'];
                                         $specializations = json_decode($advocateDetails['specializations']);
                                        
                                         function isChecked($specialization, $specializations)
                                         {
                                             return in_array($specialization, $specializations);
                                         }
                                        ?>
                                        <div class="form-group">
                                            <label for="example-text-input">Name</label>
                                            <input class="form-control" name="id" type="hidden" id="example-text-input"
                                                value="<?php echo $id; ?>">
                                            <input class="form-control" name="name" type="text" id="example-text-input"
                                                value="<?php echo $name; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-tel-input" class="">Mobile
                                                Number</label>
                                            <input class="form-control" name="mobileNumber" type="tel"
                                                id="example-tel-input" value="<?php echo $mobile_number; ?>">

                                        </div>

                                        <div class="form-group">
                                            <label for="example-datetime-local-input" class="">Joining Date</label>

                                            <input class="form-control" type="date" name="joiningDate"
                                                id="example-datetime-local-input" value="<?php echo $joining_date; ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="">Password</label>

                                            <input class="form-control" name="password" type="text"
                                                id="example-text-input">

                                        </div>

                                        <div class="form-group">
                                            <label class="">Upload Photo</label>

                                            <input type="file" name="photo" class="form-control" id="inputGroupFile04">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input class="form-control" name="address" type="text"
                                                id="example-text-input"
                                                value="<?php echo $advocateDetails['address'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">City</label>
                                            <input class="form-control" name="city" type="text" id="example-text-input"
                                                value="<?php echo $advocateDetails['city'];?>">
                                        </div>
                                        <div class="form-group">
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
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pincode</label>
                                            <input class="form-control" name="pincode" type="text"
                                                id="example-text-input"
                                                value="<?php echo $advocateDetails['pincode'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Country</label>
                                            <input class="form-control" name="country" type="text"
                                                id="example-text-input"
                                                value="<?php echo $advocateDetails['country'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="">Specialization</label>
                                            <div class="col-md-9">
                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="lawyer[]" value="Tax Lawyer"
                                                            class="custom-control-input" id="customCheck06"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                            <?php echo isChecked('Tax Lawyer', $specializations) ? 'checked' : ''; ?>>
                                                        <label class="custom-control-label" for="customCheck06">Tax
                                                            Lawyer</label>
                                                    </div>
                                                </div>

                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="lawyer[]" value="Criminal Lawyer"
                                                            class="custom-control-input" id="customCheck07"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                            <?php echo isChecked('Criminal Lawyer', $specializations) ? 'checked' : ''; ?>>
                                                        <label class="custom-control-label" for="customCheck07">Criminal
                                                            Lawyer</label>
                                                    </div>
                                                </div>

                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="lawyer[]"
                                                            value="Intellectual Lawyer" class="custom-control-input"
                                                            id="customCheck08" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="2"
                                                            <?php echo isChecked('Intellectual Lawyer', $specializations) ? 'checked' : ''; ?>>
                                                        <label class="custom-control-label"
                                                            for="customCheck08">Intellectual
                                                            Lawyer</label>
                                                    </div>
                                                </div>

                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="lawyer[]" value="Business lawyer"
                                                            class="custom-control-input" id="customCheck09"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                            <?php echo isChecked('Business lawyer', $specializations) ? 'checked' : ''; ?>>
                                                        <label class="custom-control-label" for="customCheck09">Business
                                                            lawyer</label>
                                                    </div>
                                                </div>

                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="lawyer[]" value="Family Lawyer"
                                                            class="custom-control-input" id="customCheck10"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                            <?php echo isChecked('Family Lawyer', $specializations) ? 'checked' : ''; ?>>
                                                        <label class="custom-control-label" for="customCheck10">Family
                                                            Lawyer</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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

        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>
<!--end col-->
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
<script>
    function goBack() {
        window.history.back();
    }
</script>
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