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
                                <li class="breadcrumb-item"><a href="dashboard.php">Law Affair</a></li>
                                <li class="breadcrumb-item active">Client List</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Client List</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-body table-responsive">

                            <h4 class="mt-0 header-title">Clients</h4>
                            <div class="">

                            <table id="datatable2"
                                class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Client Username</th>
                                        <th>Client Name</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    ini_set('display_errors', 1);
                                    ini_set('display_startup_errors', 1);
                                    error_reporting(E_ALL);

                                    require_once 'config/config.php';
                                    try {
                                        // Create a new PDO instance
                                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        // Prepare and execute the SQL query
                                        $stmt = $conn->prepare("SELECT username,id,name, mobile_number, address FROM clients");
                                        $stmt->execute();
                                        // Print the data in the desired format
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($row["username"]) . '</td>';
                                            echo '<td>' . htmlspecialchars($row["name"]) . '</td>';
                                            echo '<td>' . htmlspecialchars($row["mobile_number"]) . '</td>';
                                            echo '<td>' . htmlspecialchars($row["address"]) . '</td>';

                                            echo '<td>';
                                            echo '<a href="edit_client.php?id=' . $row['id'] . '" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>';
                                            echo "<a onclick=\"deleteClient({$row['id']})\"><i class=\"fas fa-trash-alt text-danger font-16\"></i></a>";
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } catch (PDOException $e) {
                                        echo "Error: " . $e->getMessage();
                                    }
                                    // Close the database connection
                                    $conn = null;


                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
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
    function deleteClient(id) {
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
                window.location.replace("delete_client.php?id=" + id);
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

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="plugins/datatables/dataTables.buttons.min.js"></script>
<script src="plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="plugins/datatables/jszip.min.js"></script>
<script src="plugins/datatables/pdfmake.min.js"></script>
<script src="plugins/datatables/vfs_fonts.js"></script>
<script src="plugins/datatables/buttons.html5.min.js"></script>
<script src="plugins/datatables/buttons.print.min.js"></script>
<script src="plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="plugins/datatables/dataTables.responsive.min.js"></script>
<script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="assets/pages/jquery.datatable.init.js"></script>


<script src="plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>
<link href="plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
<link href="plugins/animate/animate.css" rel="stylesheet" type="text/css">

</body>

</html>