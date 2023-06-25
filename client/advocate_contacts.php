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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Law Firm</a></li>
                            <li class="breadcrumb-item active">Contacts</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Contacts</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <?php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        require_once('config/config.php'); 
        //require 'Database.php';
        $advocates = new getAllAdvocate($conn); 
        $result=$advocates->getAdvocates(); 

        ?>
        <div class="row">
        <?php
        foreach($result as $row) {
            echo '<div class="col-lg-4">';
            echo '<div class="card profile-card">';
            echo '<div class="card-body p-0">';
            echo '<div class="media p-3  align-items-center">';
            echo '<img src="../admin/'.$row['photo'].'" alt="user" class="rounded-circle thumb-l" height="90" width="90">';
            echo '<div class="media-body ml-3 align-self-center">';
            echo '<h5 class="pro-title">'.htmlspecialchars($row['name']).'</h5>';
            $specializations = json_decode($row["specializations"]);
            if ($specializations !== null) {
                $specializations = array_map(function ($item) {
                    return str_replace("\r\n", " ", $item);
                }, $specializations);
                $specializationsStr = implode(', ', $specializations);
            } else {
                $specializationsStr = '';
            }
            echo '<p class="mb-2 text-muted">'.htmlspecialchars($specializationsStr).'</p>';
            echo '<p class="mb-2 text-muted">'.htmlspecialchars($row['address']).'</p>';
            echo '<p class="mb-2 text-muted">+91 '.htmlspecialchars($row['mobile_number']).'</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        
        ?>
        
        <!--end col-->

            <!--end col-->
        </div><!--end row-->

    </div><!-- container -->

    <footer class="footer text-center text-sm-left">
            &copy; 2023 Law Affair 
    </footer><!--end footer-->
</div>
<!-- end page content -->
</div>
<!-- end page-wrapper -->




<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metismenu.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/feather.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>