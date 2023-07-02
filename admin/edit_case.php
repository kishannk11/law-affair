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
                                <li class="breadcrumb-item active">Edit Case</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Case</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            
            <!-- Test Element -->
            
            <div class="row ">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Edit Case</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <form action="update_case.php" method="POST" enctype="multipart/form-data">
                                            <?php
                                                ini_set('display_errors', 1);
                                                ini_set('display_startup_errors', 1);
                                                error_reporting(E_ALL);
                                                require_once 'config/config.php';
                                                require 'Database.php';
                                                $selectClient = new SelectClient($conn);
                                                $clientNames = $selectClient->getClientNames();

                                                $advocate = new SelectAdvocate($conn);
                                                $advocateNames = $advocate->getAdvocateNames();   
                                            ?>
                                            <?php
                                            require_once 'config/config.php';
                                            //require 'Database.php';
                                            $caseList = new getAllCaseDetails($conn);
                                            $cases = $caseList->getCases($_GET['id']);
                                            
                                            
                                            function isChecked($status, $output) {
                                                $statuses = explode(',', $output);
                                                return in_array($status, $statuses);
                                            }

                                            ?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 mb-2 mb-lg-0">
                                                            <label for="pro-start-date">Case No</label>
                                                            <input type="text" class="form-control"  id="case_number" value="<?php echo $cases[0]['case_number']; ?>" readonly    >
                                                            <input type="hidden" class="form-control" name="id"  id="id" value="<?php echo $cases[0]['id']; ?>" readonly    >
                                                        </div><!--end col-->
                                                        <div class="col-lg-3 mb-2 mb-lg-0">
                                                            <label for="pro-start-date">Filing No</label>
                                                            <input type="text" name="ffiling_number" class="form-control" id="case_number" value="<?php echo $cases[0]['filing_number']; ?>">
                                                        </div><!--end col-->
                                                        <div class="col-lg-3 mb-2 mb-lg-0">
                                                            <label for="pro-start-date">Filing Date</label>
                                                            <input type="date" name="fillingDate" class="form-control" id="pro-start-date" placeholder="Enter start date" value="<?php echo $cases[0]['fillingDate']; ?>">
                                                        </div><!--end col-->
                                                        <div class="col-lg-3">
                                                        <label class="drop-down">Client Name</label>
                                                        <select class="form-control" name="client">
                                                            <option value="">Select</option>
                                                            <?php foreach ($clientNames as $client) { ?>
                                                                <option value="<?php echo $client['username']; ?>"<?php if ($client['username'] == $cases[0]['client']) echo 'selected'; ?>>
                                                                <?php echo $client['name'] . ' (' . $client['username'] . ')'; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div><!--end col-->                                                        
                                                    </div><!--end row-->
                                                </div><!--end form-group-->
                                                <div class="form-group">
                                                    <label for="projectName">Party Name :</label>
                                                    <input type="text" class="form-control" id="projectName"  value="<?php echo $cases[0]['party_name']; ?>" name="party_name" aria-describedby="emailHelp" placeholder="Enter Party Name">
                                                </div><!--end form-group-->
                                                
                                                <div class="col-md-9">
                                                    <?php
                                                    $caseStatuses = ['Status 1', 'Status 2', 'Status 3', 'Status 4', 'Status 5'];
                                                    $output = $cases[0]['case_status'];
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

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6 mb-2 mb-lg-0">
                                                            <label for="pro-start-date">Case Next Date</label>
                                                            <input type="date" class="form-control" name="case_next_date" id="pro-start-date" value="<?php echo $cases[0]['case_next_date']; ?>" placeholder="Enter start date">
                                                        </div><!--end col-->
                                                        <div class="form-group col-lg-6 mb-2 mb-lg-0">
                                                        <label class="drop-down">Select Advocate</label>
                                                        <select class="form-control" name="advocate">
                                                            <option value="">Select</option>
                                                            <?php foreach ($advocateNames as $advocate) { ?>
                                                                <option value="<?php echo $advocate['username']; ?>" <?php if ($advocate['username'] == $cases[0]['advocate']) echo 'selected'; ?>>
                                                                    <?php echo $advocate['name'] . ' (' . $advocate['username'] . ')'; ?>
                                                                </option>
                                                            <?php } ?>  
                                                           
                                                        </select>
                                                
                                                    </div>                                                      
                                                    </div><!--end row-->
                                                </div><!--end form-group-->


                                                <div class="form-group">
                                                    <label for="pro-message">Special Note</label>
                                                    <textarea class="form-control" name="special_note" rows="5" id="pro-message"  placeholder="Special Note"><?php echo $cases[0]['special_note']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Upload Photo</label>
                                                    <input class="form-control"  type="file" id="example-text-input">
                                                </div>
                                                &nbsp;
                                                &nbsp;
                                                
                                                <div class="form-group">
                                                <b>Payment Details</b>
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
                                                </div><!--end row-->
                                            </div><!--end form-group-->
                                                
                                                <button type="submit" class="btn btn-gradient-primary">Update Case</button>
                                                <button type="button" class="btn btn-gradient-danger">Cancel</button>
                                            </form>  <!--end form-->
                                        </div><!--end col-->
                                    </div><!--end row-->                                                                              
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
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