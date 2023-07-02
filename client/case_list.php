<?php
require("top-navbar.php");
?>

<?php
if (isset($_GET['success'])) {
    $success = $_GET['success'];
    // echo '<div class="alert alert-success">' . $success . '</div>';
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire("Success!", "' . htmlspecialchars($success, ENT_QUOTES, 'UTF-8') . '", "success");
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
                                <li class="breadcrumb-item active">Client List</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Client List</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">

                            <h4 class="mt-0 header-title">Clients</h4>

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Case Number</th>
                                        <th>Filling Number</th>
                                        <th>Filling Date</th>
                                        <th>Client</th>
                                        <th>Advocate</th>
                                        <th>Party Name</th>
                                        <th>Case Status</th>
                                        <th>Case Next Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                <tbody>
                                    <?php
                                    ini_set('display_errors', 1);
                                    ini_set('display_startup_errors', 1);
                                    error_reporting(E_ALL);
                                    require 'config/config.php';
                                    $caseList = new myCase($conn);
                                    $cases = $caseList->getCases();
                                    
                                    foreach ($cases as $case) {
                                    ?>
                                    <tr>
                                        
                                        <td><?php echo $case['case_number']; ?></td>
                                        <td><?php echo $case['filing_number']; ?></td>
                                        <td><?php echo $case['fillingDate']; ?></td>
                                        <td><?php echo $case['client']; ?></td>
                                        <td><?php echo $case['party_name']; ?></td>
                                        <td><?php echo $case['case_status']; ?></td>
                                        <td><?php echo $case['advocate']; ?></td>
                                        <td><?php echo $case['case_next_date']; ?></td>
                                        
                                        <td><a href="case_details.php?id=<?php echo $case['case_number']; ?>">View Details</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
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
    function deleteCase(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.replace("delete_case.php?id=" + id);
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

<!-- App js -->
<script src="assets/js/app.js"></script>

<script src="plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>
<link href="plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
<link href="plugins/animate/animate.css" rel="stylesheet" type="text/css">

</body>

</html>