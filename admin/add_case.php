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

                <div class="row ">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Create Case</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <form action="case.php" method="POST" enctype="multipart/form-data">
                                            <?php
                                                
                                                require_once 'config/config.php';
                                                require 'Database.php';
                                                $selectClient = new SelectClient($conn);
                                                $clientNames = $selectClient->getClientNames();

                                                $advocate = new SelectAdvocate($conn);
                                                $advocateNames = $advocate->getAdvocateNames();
                                                
                                                $casenumber= 'CASE' . rand(1000, 9999);
                                            ?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 mb-2 mb-lg-0">
                                                            <label for="pro-start-date">Case No</label>
                                                            <input type="text" class="form-control" name="case_number" value="<?php echo $casenumber; ?>" id="case_number" readonly    >
                                                        </div><!--end col-->
                                                        <div class="col-lg-3 mb-2 mb-lg-0">
                                                            <label for="pro-start-date">Filing No</label>
                                                            <input type="text" name="ffiling_number" class="form-control" id="case_number">
                                                        </div><!--end col-->
                                                        <div class="col-lg-3 mb-2 mb-lg-0">
                                                            <label for="pro-start-date">Filing Date</label>
                                                            <input type="date" name="fillingDate" class="form-control" id="pro-start-date" placeholder="Enter start date">
                                                        </div><!--end col-->
                                                        <div class="col-lg-3">
                                                            <label for="pro-end-date">Client</label>
                                                            <select class="form-control" name="client">
                                                            <option value="">Select</option>
                                                            <?php foreach ($clientNames as $client) { ?>
                                                                <option value="<?php echo $client['username']; ?>"><?php echo $client['name'] . ' (' . $client['username'] . ')'; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div><!--end col-->                                                        
                                                    </div><!--end row-->
                                                </div><!--end form-group-->
                                                <div class="form-group">
                                                    <label for="projectName">Party Name :</label>
                                                    <input type="text" class="form-control" id="projectName" name="party_name" aria-describedby="emailHelp" placeholder="Enter Party Name">
                                                </div><!--end form-group-->
                                                
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

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6 mb-2 mb-lg-0">
                                                            <label for="pro-start-date">Case Next Date</label>
                                                            <input type="date" class="form-control" name="case_next_date" id="pro-start-date" placeholder="Enter start date">
                                                        </div><!--end col-->
                                                        <div class="form-group col-lg-6 mb-2 mb-lg-0">
                                                            <label class="drop-down">Select Advocate</label>
                                                            <select class="form-control" name="advocate">
                                                                <option value="">Select</option>
                                                                <?php foreach ($advocateNames as $advocate) { ?>
                                                                    <option value="<?php echo $advocate['username']; ?>"><?php echo $advocate['name'] . ' (' . $advocate['username'] . ')'; ?></option>
                                                                <?php } ?>  
                                                            </select>
                                                        </div>                                                      
                                                    </div><!--end row-->
                                                </div><!--end form-group-->


                                                <div class="form-group">
                                                    <label for="pro-message">Special Note</label>
                                                    <textarea class="form-control" name="special_note" rows="5" id="pro-message"  placeholder="Special Note"></textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                <b>Payment Details</b>
                                                <div class="row">
                                                    <div class="col-lg-3 mb-2 mb-lg-0">
                                                        <label for="pro-start-date">Total Amount</label>
                                                        <input type="text" name="total_amount" class="form-control" id="case_number">
                                                    </div><!--end col-->
                                                    <div class="col-lg-3 mb-2 mb-lg-0">
                                                        <label for="pro-start-date">Received Amount</label>
                                                        <input type="text" class="form-control" name="recieved_amount" id="case_number" oninput="calculatePendingAmount()">
                                                    </div><!--end col-->
                                                    <div class="col-lg-3 mb-2 mb-lg-0">
                                                        <label for="pro-start-date">Pending Amount</label>
                                                        <input type="text" class="form-control" name="pending_amount" id="case_number" readonly>
                                                    </div><!--end col-->
                                                    <div class="col-lg-3">
                                                        <label for="pro-end-date">Mode of Payment</label>
                                                        <select class="form-control" name="payment">
                                                            <option value="upi">UPI</option>
                                                            <option value="cash">CASH</option>
                                                            <option value="card">Credit Card/Debit Card</option>
                                                            <option value="Netbanking">Netbanking</option>
                                                        </select>
                                                    </div><!--end col-->                                                        
                                                </div><!--end row-->
                                            </div><!--end form-group-->
                                                
                                                <button type="submit" class="btn btn-gradient-primary">Create Case</button>
                                                <button type="button" class="btn btn-gradient-danger">Cancel</button>
                                            </form>  <!--end form-->
                                        </div><!--end col-->
                                    </div><!--end row-->                                                                              
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                    


            <!--end row-->               
            <!-- End Test Element -->
        </div><!-- container -->

        <footer class="footer text-center text-sm-left">
            &copy; 2023 Law Affair
        </footer><!--end footer-->
</div>
<!-- end page content -->
</div>
<!-- end page-wrapper -->


<script>
    function calculatePendingAmount() {
        // Get the total amount and received amount input elements
        var totalAmountInput = document.getElementsByName("total_amount")[0];
        var receivedAmountInput = document.getElementsByName("recieved_amount")[0];
        var pendingAmountInput = document.getElementsByName("pending_amount")[0];

        // Get the values from the input elements
        var totalAmount = parseFloat(totalAmountInput.value.replace("Rs.", ""));
        var receivedAmount = parseFloat(receivedAmountInput.value);

        // Calculate the pending amount
        var pendingAmount = totalAmount - receivedAmount;

        // Set the pending amount to the input element
        pendingAmountInput.value = pendingAmount;
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