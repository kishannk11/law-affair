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
                                <li class="breadcrumb-item active">Add Case</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Case</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            
            <!-- Test Element -->
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
            <?php
            if (isset($_POST['errors'])) {
                $error_messages = $_POST['errors'];
                // Build the error message string
                $error_string = "";
                foreach ($error_messages as $field => $message) {
                    $error_string .= "$message ";
                }
                // Remove extra spaces from the error message string
                $error_string = trim($error_string);
                // Display the error message using SweetAlert
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "'.  htmlspecialchars($error_string, ENT_QUOTES, 'UTF-8').'",
                            
                        });
                    });
                </script>';
            }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="case.php" method="POST" enctype="multipart/form-data">
                                <?php
                                ini_set('display_errors', 1);
                                ini_set('display_startup_errors', 1);
                                error_reporting(E_ALL);
                                require_once 'config/config.php';
                                //require 'Database.php';
                                $caseList = new getCaseDetails($conn);
                                $cases = $caseList->getCases($_GET['id']);
                                print_r($cases)
                                ?>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Case No <?php echo $cases['case_number']; ?></label>
                                    <input class="form-control" name="case_number" type="text" id="example-text-input" value="<?php echo $cases['case_nuumber']; ?>" readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Filing No</label>
                                    <input class="form-control" name="ffiling_number" type="text" id="example-text-input">
                                </div>
                                <div class="form-group">
                                    <label for="example-datetime-local-input">Filing Date</label>
                                    <input class="form-control" name="fillingDate" type="date" id="example-datetime-local-input">
                                </div>
                                <div class="form-group">
                                    <label class="drop-down">Select Client</label>
                                    <select class="form-control" name="client">
                                        <option value="">Select</option>
                                        <?php foreach ($clientNames as $client) { ?>
                                            <option value="<?php echo $client['username']; ?>"><?php echo $client['name'] . ' (' . $client['username'] . ')'; ?></option>
                                        <?php } ?>  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Party Name</label>
                                    <input class="form-control" name="party_name" type="text" id="example-text-input">
                                </div>
                                
                                <!-- Checkboxes -->
                                <div class="form-group">
                                    <label for="example-text-input">Case Status</label>
                                    
                                    <div class="col-md-9">
                                        <div class="checkbox my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="case[]" value="Status 1"
                                                    class="custom-control-input" id="customCheck06"
                                                    data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck06">Status 1</label>
                                            </div>
                                        </div>

                                        <div class="checkbox my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="case[]" value="Status 2"
                                                    class="custom-control-input" id="customCheck07"
                                                    data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck07">Status 2</label>
                                            </div>
                                        </div>

                                        <div class="checkbox my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="case[]"
                                                    value="Status 3" class="custom-control-input"
                                                    id="customCheck08" data-parsley-multiple="groups"
                                                    data-parsley-mincheck="2">
                                                <label class="custom-control-label"
                                                    for="customCheck08">Status 3</label>
                                            </div>
                                        </div>

                                        <div class="checkbox my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="case[]" value="Status 4"
                                                    class="custom-control-input" id="customCheck09"
                                                    data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck09">Status 4</label>
                                            </div>
                                        </div>

                                        <div class="checkbox my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="case[]" value="Status 5"
                                                    class="custom-control-input" id="customCheck10"
                                                    data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck10">Status 5</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Checkboxes -->

                                <div class="form-group">
                                    <label class="drop-down">Select Advocate</label>
                                    <select class="form-control" name="advocate">
                                        <option value="">Select</option>
                                        <?php foreach ($advocateNames as $advocate) { ?>
                                            <option value="<?php echo $advocate['username']; ?>"><?php echo $advocate['name'] . ' (' . $advocate['username'] . ')'; ?></option>
                                        <?php } ?>  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="example-datetime-local-input">Case Next Date</label>
                                    <input class="form-control" name="case_next_date" type="date" id="example-datetime-local-input">
                                </div>

                                <div class="form-group">
                                        <label for="message">Special Note</label>
                                        <textarea class="form-control" name="special_note" rows="5" id="message"></textarea>
                                </div>

                                
                                <button type="submit" class="btn btn-gradient-primary">Submit</button>
                                <button type="button" class="btn btn-gradient-danger">Cancel</button>
                            </form>                                           
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->               
            <!-- End Test Element -->
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