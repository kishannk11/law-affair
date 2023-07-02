<?php
require('top-navbar.php');
?>
<?php
require_once 'config/config.php';
require_once 'Database.php';
$case = new totalCase($conn);
$total_count_case = $case->getTotalCount();

$totalAdvocates = new totalAdvocates($conn);
$total_count_advocate = $totalAdvocates->getTotalCount();

?>
<div class="page-wrapper">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Legal Partner</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="jumbotron mb-0 bg-light">
                                        <h1 class="display-4">Hello, Admin! Welcome</h1>
                                    </div>
                                </div><!--end card-body-->    
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->
                    <?php
                    
                    

                    ?>
                    <div class="row">
                        <div class="col-lg-12">  
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card dash-data-card text-center">
                                        <div class="card-body"> 
                                            <div class="icon-info mb-3">
                                                <i class="fas fa-ticket-alt bg-soft-warning"></i>
                                            </div>
                                            <h3 class="text-dark">
                                            <?php echo $total_count_case;?>
                                            </h3>
                                            <h6 class="font-14 text-dark">Total Cases</h6>                                                                                                                            
                                        </div><!--end card-body--> 
                                    </div><!--end card-->   
                                </div><!-- end col-->
                                <div class="col-lg-3">
                                    <div class="card dash-data-card text-center">
                                        <div class="card-body"> 
                                            <div class="icon-info mb-3">
                                                <i class="fas fa-ribbon bg-soft-pink"></i>
                                            </div>
                                            <h3 class="text-dark"><?php echo $total_count_advocate;?></h3>
                                            <h6 class="font-14 text-dark">Total Advocates</h6>                                                                                                                            
                                        </div><!--end card-body--> 
                                    </div><!--end card-->   
                                </div><!-- end col-->  
                                <div class="col-lg-3">
                                    <div class="card dash-data-card text-center">
                                        <div class="card-body"> 
                                            <div class="icon-info mb-3">
                                                <i class="fas fa-handshake bg-soft-success"></i>
                                            </div>
                                            <h3 class="text-dark">1</h3>
                                            <h6 class="font-14 text-dark">Assigned Cases</h6>                                                                                                                            
                                        </div><!--end card-body--> 
                                    </div><!--end card-->   
                                </div><!-- end col-->
                                <div class="col-lg-3">
                                    <div class="card dash-data-card text-center">
                                        <div class="card-body"> 
                                            <div class="icon-info mb-3">
                                                <i class="fas fa-clipboard bg-soft-primary"></i>
                                            </div>
                                            <h3 class="text-danger">2</h3>
                                            <h6 class="font-14 text-dark">Unassigned Cases</h6>                                                                                                                            
                                        </div><!--end card-body--> 
                                    </div><!--end card-->   
                                </div><!-- end col-->                       
                            </div><!--end row-->                                                      
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0">Cases Status</h4>                                                                    
                                    <div class="">
                                        <div id="ana_dash_1" class="apex-charts"></div>
                                    </div>  
                                </div><!--end card-body-->                                
                            </div><!--end card-->                            
                        </div><!--end col-->
                        <div class="col-lg-4">                            
                </div><!-- container -->

                <footer class="footer text-center text-sm-left">
                    &copy; 2023 Legal Partner 
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

        <script src="plugins/apexcharts/apexcharts.min.js"></script>
        <script src="assets/pages/jquery.helpdesk-dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        
    </body>

</html>
