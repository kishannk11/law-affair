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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Law Affair</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-8">  
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card dash-data-card text-center">
                                        <div class="card-body"> 
                                            <div class="icon-info mb-3">
                                                <i class="fas fa-ticket-alt bg-soft-warning"></i>
                                            </div>
                                            <h3 class="text-dark">184</h3>
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
                                            <h3 class="text-dark">101</h3>
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
                                            <h3 class="text-dark">18</h3>
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
                                            <h3 class="text-danger">92</h3>
                                            <h6 class="font-14 text-dark">Unassigned Cases</h6>                                                                                                                            
                                        </div><!--end card-body--> 
                                    </div><!--end card-->   
                                </div><!-- end col-->                       
                            </div><!--end row-->                                                      
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0">Tickets Status</h4>                                                                    
                                    <div class="">
                                        <div id="ana_dash_1" class="apex-charts"></div>
                                    </div>  
                                </div><!--end card-body-->                                
                            </div><!--end card-->                            
                        </div><!--end col-->
                        <div class="col-lg-4">                            
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mt-0">Customer Satisfaction</h4>
                                    <div class="happiness-score">
                                        <h2 class="mb-1">94.5%</h2>
                                        <p class="mb-0 text-uppercase">Happiness</p>
                                    </div> 
                                    <div id="ana_device" class="apex-charts mt-4"></div>                                                                       
                                    <div class="table-responsive">
                                        <table class="table border-dashed mb-0">
                                            <thead class="thead-light">
                                            <tr>
                                                <th class="border-bottom-0">Performance Type</th>
                                                <th class="border-bottom-0 text-right">Score</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th class="border-top-0 text-dark" scope="row"><i class="far fa-grin-stars text-success font-24 mr-2 align-middle"></i>Excellent</th>
                                                <td class="border-top-0 text-right">65%</td>
                                            </tr>
                                            <tr>
                                                <th class="text-dark" scope="row"><i class="far fa-smile text-primary font-24 mr-2 align-middle"></i>Very Good</th>
                                                <td class="text-right">20%</td>                                                 
                                            </tr>
                                            <tr>
                                                <th class="text-dark" scope="row"><i class="far fa-meh text-warning font-24 mr-2 align-middle"></i>Good</th>
                                                <td class="text-right">10%</td>
                                            </tr>
                                            <tr>
                                                <th class="text-dark" scope="row"><i class="far fa-frown text-pink font-24 mr-2 align-middle"></i>Fair</th>
                                                <td class="text-right">5%</td>
                                            </tr>
                                            
                                            </tbody>
                                        </table><!--end /table-->
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->                            
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="row">                        
                        
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <p class="badge badge-soft-pink font-11 p-1 mb-1 float-lg-right float-md-none">Last updated 15 minutes ago</p> -->
                                    <h4 class="header-title mt-0 mb-3">Advocates Performance</h4>                                    
                                    <div class="table-responsive browser_users">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="border-top-0">Advocate</th>
                                                    <th class="border-top-0">Total Cases</th>
                                                    <th class="border-top-0">Active Cases</th>
                                                    <th class="border-top-0"></th>
                                                    <th class="border-top-0"></th>
                                                    <th class="border-top-0">Action</th>
                                                </tr><!--end tr-->
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <img src="assets/images/users/kishan.jpeg" alt="" class="thumb-sm rounded-circle mr-2">                                       
                                                            <div class="media-body align-self-center text-truncate">
                                                                <h6 class="mt-0 mb-1 text-dark">Kishan Nayak</h6>
                                                                <p class="text-muted mb-0">Senior Advocate</p>
                                                            </div><!--end media-body-->
                                                        </div>
                                                    </td>
                                                    <td>38</td>
                                                    <td>32</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>                                                                                                       
                                                        <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                                    </td>
                                                </tr><!--end tr--> 

                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <img src="assets/images/users/ranju.jpeg" alt="" class="thumb-sm rounded-circle mr-2">                                       
                                                            <div class="media-body align-self-center text-truncate">
                                                                <h6 class="mt-0 mb-1 text-dark">Ranjith</h6>
                                                                <p class="text-muted mb-0">Senior Advocate</p>
                                                            </div><!--end media-body-->
                                                        </div>
                                                    </td>
                                                    <td>38</td>
                                                    <td>32</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>                                                                                                       
                                                        <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <div class="avatar-box thumb-sm align-self-center mr-2">
                                                                <span class="avatar-title bg-soft-pink rounded-circle">RM</span>
                                                            </div>                                    
                                                            <div class="media-body align-self-center text-truncate">
                                                                <h6 class="mt-0 mb-1 text-dark">Rakesh Marate</h6>
                                                                <p class="text-muted mb-0">Junior Advocate</p>
                                                            </div><!--end media-body-->
                                                        </div>
                                                    </td>
                                                    <td>50</td>
                                                    <td>45</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>                                                                                                       
                                                        <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                                    </td>
                                                </tr><!--end tr-->
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <img src="assets/images/users/user-4.jpg" alt="" class="thumb-sm rounded-circle mr-2">                                       
                                                            <div class="media-body align-self-center text-truncate">
                                                                <h6 class="mt-0 mb-1 text-dark">Paula Anderson</h6>
                                                                <p class="text-muted mb-0">Dummy text of the printing.</p>
                                                            </div><!--end media-body-->
                                                        </div>
                                                    </td>
                                                    <td>32</td>
                                                    <td>24</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>                                                                                                       
                                                        <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                                    </td>
                                                </tr><!--end tr-->
                                                
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <img src="assets/images/users/user-3.png" alt="" class="thumb-sm rounded-circle mr-2">                                       
                                                            <div class="media-body align-self-center text-truncate">
                                                                <h6 class="mt-0 mb-1 text-dark">Lucy Peterson</h6>
                                                                <p class="text-muted mb-0">Dummy text of the printing.</p>
                                                            </div><!--end media-body-->
                                                        </div>
                                                    </td>
                                                    <td>25</td>
                                                    <td>21</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>                                                                                                       
                                                        <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                                    </td>
                                                </tr><!--end tr-->  
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <div class="avatar-box thumb-sm align-self-center mr-2">
                                                                <span class="avatar-title bg-soft-primary rounded-circle">JR</span>
                                                            </div>                                    
                                                            <div class="media-body align-self-center text-truncate">
                                                                <h6 class="mt-0 mb-1 text-dark">Joseph Rust</h6>
                                                                <p class="text-muted mb-0">Dummy text of the printing.</p>
                                                            </div><!--end media-body-->
                                                        </div>
                                                    </td>
                                                    <td>50</td>
                                                    <td>45</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>                                                                                                       
                                                        <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                                    </td>
                                                </tr><!--end tr-->
                                            </tbody>
                                        </table> <!--end table-->                                               
                                    </div><!--end /div-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->                        
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

        <script src="plugins/apexcharts/apexcharts.min.js"></script>
        <script src="assets/pages/jquery.helpdesk-dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        
    </body>

</html>