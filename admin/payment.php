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
                                <li class="breadcrumb-item active">Payment </li>
                            </ol>
                        </div>
                        <h4 class="page-title">Payment</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <?php
            include 'config/config.php';
            include 'Database.php';
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            $caseDetails = new CaseDetails($conn);
            $caseNumber = $caseDetails->getCaseNumber();

            ?>
            <div class="row">
            <div class="card col-sm-12">
                &nbsp;
                &nbsp;
                <div class="card-body">
                    <form method="POST">

                        <div class="row text-center align-items-center">
                            <div class="col-md-4">
                                <label class="mb-3"><b>Select CaseNumber</b></label>
                            </div>
                            <div class="col-md-6">
                                <select class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;" name="caseNumber" id="caseNumber">
                                    <option>Select</option>
                                    <?php foreach ($caseNumber as $case) { ?>
                                        <option value="<?php echo $case['case_number']; ?>"><?php echo $case['case_number']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-gradient-primary mx-auto d-block">Record Payment</button>
                            </div>
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                        </div>
                    </form>
                </div>
            </div>
            </div>

            <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Edit Case</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <form action="update_case.php" method="POST" enctype="multipart/form-data">
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
                                                            </select>
                                                        </div><!--end col-->                                                        
                                                    </div><!--end row-->
                                                </div><!--end form-group-->
                                                <div class="form-group">
                                                    <label for="projectName">Party Name :</label>
                                                    <input type="text" class="form-control" id="projectName"  value="<?php echo $cases[0]['party_name']; ?>" name="party_name" aria-describedby="emailHelp" placeholder="Enter Party Name">
                                                </div><!--end form-group-->
                                                
                                                <div class="col-md-9">
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
                                                           
                                                        </select>
                                                
                                                    </div>                                                      
                                                    </div><!--end row-->
                                                </div><!--end form-group-->
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
            <div class="row">
            <div class="card col-sm-12">
                <div class="card-body">
                    <b>Payment Details</b>
                    
                    <div class="">
                        <div class="col-lg-3 mb-3 mb-lg-0">
                            <label for="pro-start-date">Total Amount</label>
                            <input type="text" name="total_amount" class="form-control" id="case_number" required>
                        </div>
                        <!--end col-->
                        <div class="col-lg-3 mb-2 mb-lg-0">
                            <label for="pro-start-date">Received Amount</label>
                            <input type="text" class="form-control" name="recieved_amount" id="case_number"
                                oninput="calculatePendingAmount()" required>
                        </div>
                        <!--end col-->
                        <div class="col-lg-3 mb-2 mb-lg-0">
                            <label for="pro-start-date">Pending Amount</label>
                            <input type="text" class="form-control" name="pending_amount" id="case_number" readonly>
                        </div>
                        <!--end col-->
                        <div class="col-lg-3">
                            <label for="pro-end-date">Mode of Payment</label>
                            <select class="form-control" name="payment" required>
                                <option value="upi">UPI</option>
                                <option value="cash">CASH</option>
                                <option value="card">Credit Card/Debit Card</option>
                                <option value="Netbanking">Netbanking</option>
                                <option value="cheque">Cheque</option>
                            </select>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>

            <!-- end row -->

        </div><!-- container -->

        <footer class="footer text-center text-sm-left">
            &copy; 2023 Legal Partner
        </footer><!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->




<!-- jQuery  -->


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