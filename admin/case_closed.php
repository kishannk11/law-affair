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
                                <li class="breadcrumb-item active">Closed Cases</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Closed Cases</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-body table-responsive">

                                <h4 class="mt-0 header-title">Cases</h4>
                                <div class="">

                                <table id="datatable2"
                                    class="table table-striped table-bordered dt-responsive"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        
                                        <tr>
                                            <th>Case Number</th>
                                            <th>Filling Number</th>
                                            <th>Closed Date</th>
                                            <th>Client</th>
                                            <th>Advocate</th>
                                            <th>Party Name</th>
                                            <th>Case Status</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                
                                    require_once 'Database.php';
                                    require_once 'config/config.php';
                                    $caseList = new CaseList($conn);

                                    // Get the case details
                                    $cases = $caseList->getCases();


                                    // Display the case details in a table
                                    
                                    
                                    foreach ($cases as $case) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($case["case_number"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($case["filing_number"]) . "</td>";
                                        echo "<td>01/01/2023</td>";
                                        echo "<td>" . htmlspecialchars($case["client"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($case["party_name"]) . "</td>";
                                        // echo "<td>" . htmlspecialchars($case["case_status"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($case["advocate"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($case["special_note"]) . "</td>";
                                        echo "<td>";
                                        echo '<a href="edit_case.php?id='. $case["id"] .'" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>';
                                        echo "<a onclick=\"deleteCase({$case['id']})\"><i class=\"fas fa-trash-alt text-danger font-16\"></i></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
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