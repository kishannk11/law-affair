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
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                
                                    require_once 'Database.php';
                                    require_once 'config/config.php';
                                    $caseList = new CaseManager($conn);

                                    // Get the case details
                                    $cases = $caseList->getClosedCases();


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
                                        echo "<td>" . htmlspecialchars($case["status"]) . "</td>";
                                        //echo "<td>View Details</i></td>";
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
            &copy; 2023 Legal Partner
        </footer><!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->





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