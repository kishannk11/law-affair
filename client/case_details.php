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
                                <li class="breadcrumb-item active">Case details</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Case Details</h4>
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
                            <form action="case_update.php" method="POST" enctype="multipart/form-data">
                                <?php
                                require_once 'config/config.php';
                                //require 'Database.php';
                                $caseList = new getCaseDetails($conn);
                                $cases = $caseList->getCases($_GET['id']);
                                
                                function isChecked($status, $output) {
                                    $statuses = explode(',', $output);
                                    return in_array($status, $statuses);
                                }
    
                                ?>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Case No</label>
                                    <input class="form-control" name="case_number" type="text" id="example-text-input" value="<?php echo $cases[0]['case_number']; ?>" readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Filing No</label>
                                    <input class="form-control" name="ffiling_number" type="text" id="example-text-input" value="<?php echo $cases[0]['filing_number']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="example-datetime-local-input">Filing Date</label>
                                    <input class="form-control" name="fillingDate" type="date" id="example-datetime-local-input" value="<?php echo $cases[0]['fillingDate']; ?>" readonly >
                                </div>
                                <div class="form-group">
                                    <label class="drop-down">Client Name</label>
                                    <input class="form-control" type="text" id="example-text-input" value="<?php echo $cases[0]['client']; ?>" readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Party Name</label>
                                    <input class="form-control" name="party_name" type="text" id="example-text-input" value="<?php echo $cases[0]['party_name']; ?>" readonly>
                                </div>
                                
                                <!-- Checkboxes -->
                                <div class="form-group">
                                <label for="example-text-input">Case Status</label>
                                <div class="col-md-9">
                                    <?php
                                    foreach ($cases as $case) {
                                        $output = $case['case_status'];  
                                    }
                                    print_r($output);
                                    $caseStatuses = ['Status 1', 'Status 2', 'Status 3', 'Status 4', 'Status5 '];
                                    //$output = $cases[0]['case_status'];
                                    //Status 1
                                    //Status 1
                                    $i = 6;

                                    foreach ($caseStatuses as $status) {
                                        $checked = isChecked($status, $output) ? 'checked' : '';
                                        echo "
                                            <div class='checkbox my-2'>
                                                <div class='custom-control custom-checkbox'>
                                                    <input type='checkbox' name='case[]' value='$status' class='custom-control-input' id='customCheck0$i' data-parsley-multiple='groups' data-parsley-mincheck='2' $checked>
                                                    <label class='custom-control-label' for='customCheck0$i'>$status</label>
                                                </div>
                                            </div>
                                        ";
                                        $i++;
                                    }
                                    ?>
                                </div>
                              </div>
                                <!-- End Checkboxes -->

                                <div class="form-group">
                                    <label class="drop-down">Advocate Name</label>
                                    <input class="form-control" type="text" id="example-text-input" value="<?php echo $cases[0]['advocate']; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="example-datetime-local-input">Case Date</label>
                                    <input class="form-control"  name="case_date" type="date" id="example-datetime-local-input" value="<?php echo $cases[0]['case_next_date']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="example-datetime-local-input">Case Next Date</label>
                                    <input class="form-control" name ="case_next_date" type="date" id="example-datetime-local-input">
                                </div>
                                <div class="form-group">
                                    <label for="example-datetime-local-input">Filing Date</label>
                                    <input class="form-control" type="date" id="example-datetime-local-input" value="<?php echo $cases[0]['fillingDate']; ?>" readonly >
                                </div>
                                <?php
                                foreach ($cases as $case) {
                                ?>
                                <div class="form-group">
                                    <label for="message">Special Note for <?php echo $case['fillingDate']; ?></label>
                                    <textarea class="form-control"  rows="5" id="message" readonly><?php echo $case['special_note']; ?></textarea>
                                </div>
                                
                                <?php
                                }
                                ?>
                                <div class="form-group"> 
                                    <label for="message">Special Note for <?php echo $case['case_next_date']; ?> </label> 
                                    <textarea class="form-control" name="special_note" rows="5" id="message"></textarea> 
                                </div>
                                <div class="row">
                                <div class="col-lg-3 mb-2 mb-lg-0">
                                    <label for="pro-start-date">Total Amount</label>
                                    <input type="text" name="total_amount" value="<?php echo $cases[0]['total_amount']; ?>" class="form-control" id="case_number">
                                </div><!--end col-->
                                <div class="col-lg-3 mb-2 mb-lg-0">
                                    <label for="pro-start-date">Received Amount</label>
                                    <input type="text" class="form-control" value="<?php echo $cases[0]['recieved_amount']; ?>" name="recieved_amount" id="case_number" oninput="calculatePendingAmount()">
                                </div><!--end col-->
                                <div class="col-lg-3 mb-2 mb-lg-0">
                                    <label for="pro-start-date">Pending Amount</label>
                                    <input type="text" class="form-control" value="<?php echo $cases[0]['pending_amount']; ?>" name="pending_amount" id="case_number" readonly>
                                </div><!--end col-->
                                <div class="col-lg-3">
                                <label for="pro-end-date">Mode of Payment</label>
                                <select class="form-control" name="payment">
                                    <option value="upi" <?php if ($cases[0]['payment'] == 'upi') echo 'selected'; ?>>UPI</option>
                                    <option value="cash" <?php if ($cases[0]['payment'] == 'cash') echo 'selected'; ?>>CASH</option>
                                    <option value="card" <?php if ($cases[0]['payment'] == 'card') echo 'selected'; ?>>Credit Card/Debit Card</option>
                                    <option value="Netbanking" <?php if ($cases[0]['payment'] == 'Netbanking') echo 'selected'; ?>>Netbanking</option>
                                </select>
                                </div><!--end col-->                                                        
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
            &copy; 2023 Legal Partner
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