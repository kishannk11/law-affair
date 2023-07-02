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

            <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Case Payment Details</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <form  method="POST" >
                                                
                                                    <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="drop-down">Select Case Number</label>
                                                        <select class="form-control" name="client">
                                                        <option>Select</option>
                                                        <?php foreach ($caseNumber as $case) { ?>
                                                            <option value="<?php echo $case['case_number']; ?>"><?php echo $case['case_number']; ?></option>
                                                        <?php } ?>
                                                            </select>
                                                        </div><!--end col-->
                                                        <!--end col-->
                                                                                       
                                                    </div><!--end row-->
                                                <!--end form-group-->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 mb-2 mb-lg-0">
                                                            <label for="pro-start-date">Filing No</label>
                                                            <input type="text" name="ffiling_number" class="form-control" id="case_number" readonly>
                                                        </div><!--end col-->
                                                        <div class="col-lg-4 mb-2 mb-lg-0">
                                                            <label for="pro-start-date">Filing Date</label>
                                                            <input type="date" name="fillingDate" class="form-control" id="pro-start-date" placeholder="Enter start date" readonly >
                                                        </div>
                                                        <div class="col-lg-4 mb-2 mb-lg-0">
                                                            <label for="projectName">Party Name :</label>
                                                            <input type="text" class="form-control" id="projectName"   name="party_name" aria-describedby="emailHelp" placeholder="Enter Party Name" readonly>
                                                        </div>
                                                        </div>
                                                </div><!--end form-group-->
                                                
                                                <div class="col-md-9">
                                                </div>

                                                <!--end form-group-->
                                                <div class="form-group">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0 table-centered">
                                                        <thead>
                                                        <tr>
                                                            <th>SL No</th>
                                                            <th>Total Amount</th>
                                                            <th>Recieved Amount</th>
                                                            <th>Pending</th>
                                                            <th>Date</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                        </tbody>
                                                    </table><!--end /table-->
                                                </div>
                                                        </div>

                                                <div class="form-group">
                                                <b>Payment Details</b>
                                                <div class="row">
                                                
                                                    <div class="col-lg-3 mb-2 mb-lg-0">
                                                        <label for="pro-start-date">Total Amount</label>
                                                        <input type="text" name="total_amount" class="form-control" id="totalamount" readonly>
                                                        <input type="hidden" name="case_number" class="form-control" id="case">
                                                    </div><!--end col-->
                                                    <div class="col-lg-3 mb-2 mb-lg-0">
                                                        <label for="pro-start-date">Received Amount</label>
                                                        <input type="text" class="form-control"  name="recieved_amount" id="case_number" oninput="calculatePendingAmount()">
                                                    </div><!--end col-->
                                                    <div class="col-lg-3 mb-2 mb-lg-0">
                                                        <label for="pro-start-date">Pending Amount</label>
                                                        <input type="text" class="form-control" name="pending_amount" id="case_number" readonly>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-3">
                                                        <label for="pro-end-date">Mode of Payment</label>
                                                        <select class="form-control" name="payment" id="payment" onchange="showHideTransactionId()">
                                                            <option>Select</option>
                                                            <option value="upi">UPI</option>
                                                            <option value="cash">CASH</option>
                                                            <option value="card">Credit Card/Debit Card</option>
                                                            <option value="Netbanking">Netbanking</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 mb-2 mb-lg-0" id="transactionIdField" style="display: none;">
                                                        <label for="pro-start-date">Transaction ID</label>
                                                        <input type="text" class="form-control" name="transaction" id="transactionId">
                                                    </div><!--end col-->                                                        
                                                </div><!--end row-->
                                            <!--end form-group-->
                                                &nbsp;
                                                <div class="col">
                                                <button type="submit" class="btn btn-gradient-primary">Add Transaction</button>
                        
                                                </div>
                                            </form>  
                                            </div><!--end form-->
                                        </div><!--end col-->
                                    </div><!--end row-->                                                                              
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->

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
function showHideTransactionId() {
    var paymentMethod = document.getElementById('payment').value;
    if (paymentMethod === 'upi' || paymentMethod === 'card') {
        document.getElementById('transactionIdField').style.display = 'block';
    } else {
        document.getElementById('transactionIdField').style.display = 'none';
    }
}
</script>

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
<script>
$(document).ready(function() {
    // Event listener for the client select change
    $('select[name="client"]').on('change', function() {
        var caseNumber = $(this).val();
         // Make an AJAX request to get the case details
        $.ajax({
            url: 'get_case_details.php',
            method: 'POST',
            data: { caseNumber: caseNumber },
            dataType: 'json',
            success: function(response) {
                // Handle the response and update the UI with the case details
                var caseDetails = response.caseDetails;
                var paymentDetails = response.paymentDetails;
                var totalAmount = paymentDetails[0].total_amount;
                console.log(totalAmount);
                 // Update the UI with the case details and payment details
                // ...
                 // Example: Update a div with the case details
                $('#case-details').html(JSON.stringify(caseDetails));
                $('#case_number').val(caseDetails.filing_number);
                $('#pro-start-date').val(caseDetails.fillingDate);
                $('#projectName').val(caseDetails.party_name);
                $('#totalamount').val(totalAmount);
                $('#case').val(caseDetails.case_number);
                


                var tbody = $('.table-bordered tbody');
                tbody.empty(); // Clear any existing rows

                // Loop through the payment details and create a row for each detail
                $.each(paymentDetails, function(index, detail) {
                    var row = $('<tr>');
                    row.append($('<td>').text(index + 1));
                    row.append($('<td>').text(detail.total_amount));
                    row.append($('<td>').text(detail.received_amount));
                    row.append($('<td>').text(detail.pending_amount));
                    row.append($('<td>').text(detail.created_at));
                    tbody.append(row);
                });
            },
            error: function(xhr, status, error) {
                // Handle any errors
                console.log(error);
            }
        });
    });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".form-group").hide();  //Initially hide form-group
    $('select[name="client"]').change(function(){
        if ($(this).val() != "Select") {  //If any option other than "Select" is chosen
            $(".form-group").show();  //Show form-group
        } else {
            $(".form-group").hide();  //Hide form-group if "Select" is chosen
        }
    });
});
</script>
<script>
$(document).ready(function() {
    // Submit the form via AJAX
    $('form').submit(function(e) {
        e.preventDefault();
         $.ajax({
            url: 'insert_payment.php',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response) {
                if (response.status === 'success') {
                    // Show success notification
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message
                    }).then(function() {
                        // Refresh the page
                        location.reload();
                    });
                } else {
                    // Show error notification
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function() {
                // Show error notification
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to add payment.'
                });
            }
        });
    });
});
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