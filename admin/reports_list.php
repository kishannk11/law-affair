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
            include 'Database.php';
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            $caseDetails = new CaseDetails($conn);
            $caseNumber = $caseDetails->getCaseNumber();

            ?>
            <form method="POST">
            <div class="row form-inline text-center">
                <div class="col-md-4">
                    <label class="mb-3">Select CaseNumber</label>
                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;"
                        name="caseNumber" id="caseNumber">
                        <option>Select</option>
                        <?php foreach ($caseNumber as $case) { ?>
                            <option value="<?php echo $case['case_number']; ?>">
                                <?php echo $case['case_number']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="mb-3">Select Start Date</label>
                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;"
                        name="startDate" id="startDate">
                        <option>Select</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="mb-3">Select End Date</label>
                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;"
                    name="endDate" id="endDate">
                        <option>Select</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-gradient-primary mx-auto d-block">View Report</button>
                </div>
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
            </div>
            </form>
            <?php
            $report = new caseReport($conn);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $caseNumber = $_POST['caseNumber'];
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $specialNotes = $report->getSpecialNotes($caseNumber, $startDate, $endDate);
            }

            ?>
            <div class="row">
                <?php if (isset($specialNotes) && !empty($specialNotes)): ?>
                    <?php $currentCase = null; ?>
                    <?php foreach ($specialNotes as $note): ?>
                        <?php if ($note['case_number'] !== $currentCase): ?>
                            <?php if ($currentCase !== null): ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="card col-sm-12">
                                <div class="card-body">
                                
                                
                               
<button type="submit" class="btn btn-gradient-danger float-right btn-close-case" onclick="confirmCloseCase('<?php echo $note['case_number']; ?>')" <?php echo $note['status'] === 'closed' ? 'disabled' : ''; ?>>Close Case</button>
                                    <h4 class="mt-0 header-title">Case No: <?php echo $note['case_number']; ?></h4>
                                    <p class="text-muted">Handled by: <?php echo $note['advocate']; ?></p>
                                    <?php $currentCase = $note['case_number']; ?>
                        <?php endif; ?>
                        <p class="text-muted ">Date: <?php echo date('d/m/Y', strtotime($note['fillingDate'])); ?></p>
                        <p id="clipboardParagraph" class="border p-3">
                            <?php echo $note['special_note']; ?><br>
                        </p>
                    <?php endforeach; ?>
                            </div>
                        </div>
                <?php endif; ?>

                
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
    $(document).ready(function () {
        // When the case number is selected, make an AJAX request to fetch the filling date and case next date
        $('#caseNumber').on('change', function () {
            var caseNumber = $(this).val();
            $.ajax({
                url: 'getCaseDates.php',
                type: 'POST',
                data: { caseNumber: caseNumber },
                success: function (response) {
                    var dates = JSON.parse(response);
                    $('#startDate').empty();
                    $.each(dates.fillingDates, function (index, fillingDate) {
                        $('#startDate').append('<option>' + fillingDate + '</option>');
                    });
                    $('#endDate').empty();
                    $.each(dates.caseNextDates, function (index, caseNextDate) {
                        $('#endDate').append('<option>' + caseNextDate + '</option>');
                    });
                }
            });
        });
    });
</script>
<script>
function confirmCloseCase(caseNumber) {
  Swal.fire({
    title: 'Do you want to close the case?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Yes',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
      // Make AJAX request to update case status
      updateCaseStatus(caseNumber);
    }
  });
}

function updateCaseStatus(caseNumber) {
  // Make AJAX request to update case status
  $.ajax({
    url: 'update_case_status.php',
    type: 'POST',
    data: { caseNumber: caseNumber },
    success: function(response) {
      // Disable the close case button
      document.querySelector('.btn-close-case').disabled = true;
      // Show success message
      Swal.fire('Case closed!', '', 'success');
    },
    error: function() {
      Swal.fire('Error!', 'An error occurred while closing the case.', 'error');
    }
  });
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