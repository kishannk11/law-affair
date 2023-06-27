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
                                <li class="breadcrumb-item active">Reports</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Reports</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <?php
            include 'config/config.php';
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            $caseDetails = new CaseDetails($conn);
            $caseNumber = $caseDetails->getCaseNumber();
            ?>
            <div class="row form-inline">
                <div class="col-md-4">
                    <label class="mb-3">Select CaseNumber</label>
                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" id="caseNumber">
                        <option>Select</option>
                        <option><?php echo $caseNumber; ?></option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="mb-3">Select Start Date</label>
                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                        <option>Select</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="mb-3">Select End Date</label>
                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                        <option>Select</option>
                    </select>
                </div>
            </div> <!-- end row -->

        </div><!-- container -->

        <footer class="footer text-center text-sm-left">
            &copy; 2023 Law Affair
        </footer><!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->




<!-- jQuery  -->
<script>
    $(document).ready(function() {
        // When the case number is selected, make an AJAX request to fetch the filling date and case next date
        $('#caseNumber').on('change', function() {
            var caseNumber = $(this).val();
            $.ajax({
                url: 'getCaseDates.php',
                type: 'POST',
                data: {caseNumber: caseNumber},
                success: function(response) {
                    var dates = JSON.parse(response);
                    $('#startDate').html('<option>' + dates.filling_date + '</option>');
                    $('#endDate').html('<option>' + dates.case_next_date + '</option>');
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