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
                                        <li class="breadcrumb-item active">Case List</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Case List</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
    
                                    <h4 class="mt-0 header-title">Product Stock</h4>
                                    <p class="text-muted mb-4 font-13">
                                        Available all products.
                                    </p>
    
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Pics</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Avai.Color</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
    
    
                                        <tbody>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/img-2.png" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Apple Watch</a> 
                                                    <br>
                                                    <span class="text-muted font-13">Size-05 (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Sports</td>
                                            <td>32</td>
                                            <td>$39</td>
                                            <td><span class="badge badge-md badge-soft-warning">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/1.jpg" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Morden Chair</a> 
                                                    <br>
                                                    <span class="text-muted font-13">Size-Mediam (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Interior</td>
                                            <td>10</td>
                                            <td>$99</td>
                                            <td><span class="badge badge-md badge-soft-pink">Sold</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/img-5.png" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Reebok Shoes</a> 
                                                    <br>
                                                    <span class="text-muted font-13">size-08 (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Footwear</td>
                                            <td>24</td>
                                            <td>$49</td>
                                            <td><span class="badge badge-md badge-soft-secondary">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/img-6.png" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Cosco Vollyboll</a> 
                                                    <br>
                                                    <span class="text-muted font-13">size-04 (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Sports</td>
                                            <td>8</td>
                                            <td>$49</td>
                                            <td><span class="badge badge-md badge-soft-secondary">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/img-4.png" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Royal Purse</a> 
                                                    <br>
                                                    <span class="text-muted font-13">Pure Lether 100%</span> 
                                                </p>
                                            </td>
                                            <td>Life Style</td>
                                            <td>52</td>
                                            <td>$89</td>
                                            <td><span class="badge badge-md badge-soft-purple">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/3.jpg" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">New Morden Chair</a> 
                                                    <br>
                                                    <span class="text-muted font-13">size-05 (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Interior</td>
                                            <td>6</td>
                                            <td>$20</td>
                                            <td><span class="badge badge-md badge-soft-warning">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/2.jpg" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Important Chair</a> 
                                                    <br>
                                                    <span class="text-muted font-13">size-05 (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Interior</td>
                                            <td>32</td>
                                            <td>$39</td>
                                            <td><span class="badge badge-md badge-soft-warning">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/img-2.png" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Nivya Footboll</a> 
                                                    <br>
                                                    <span class="text-muted font-13">Size-05 (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Sports</td>
                                            <td>32</td>
                                            <td>$39</td>
                                            <td><span class="badge badge-md badge-soft-warning">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/1.jpg" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Green Morden Chair</a> 
                                                    <br>
                                                    <span class="text-muted font-13">Size-Mediam (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Interior</td>
                                            <td>10</td>
                                            <td>$99</td>
                                            <td><span class="badge badge-md badge-soft-pink">Sold</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/img-5.png" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Bata Shoes</a> 
                                                    <br>
                                                    <span class="text-muted font-13">size-08 (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Footwear</td>
                                            <td>24</td>
                                            <td>$49</td>
                                            <td><span class="badge badge-md badge-soft-secondary">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/img-6.png" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Nike Vollyboll</a> 
                                                    <br>
                                                    <span class="text-muted font-13">size-04 (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Sports</td>
                                            <td>8</td>
                                            <td>$49</td>
                                            <td><span class="badge badge-md badge-soft-secondary">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/img-4.png" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Lava Purse</a> 
                                                    <br>
                                                    <span class="text-muted font-13">Pure Lether 100%</span> 
                                                </p>
                                            </td>
                                            <td>Life Style</td>
                                            <td>52</td>
                                            <td>$89</td>
                                            <td><span class="badge badge-md badge-soft-purple">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/3.jpg" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Brown Morden Chair</a> 
                                                    <br>
                                                    <span class="text-muted font-13">size-05 (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Interior</td>
                                            <td>6</td>
                                            <td>$20</td>
                                            <td><span class="badge badge-md badge-soft-warning">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/2.jpg" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">Best Look Chair</a> 
                                                    <br>
                                                    <span class="text-muted font-13">size-05 (Model 2019)</span> 
                                                </p>
                                            </td>
                                            <td>Interior</td>
                                            <td>32</td>
                                            <td>$39</td>
                                            <td><span class="badge badge-md badge-soft-warning">Stock</span></td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>        
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row --> 

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
    
                                    <h4 class="mt-0 header-title">Cases</h4>
    
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Client Name</th>
                                            <th>Handelled by</th>
                                            <th>Email</th>
                                            <th>Start date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
    
    
                                        <tbody>
                                        <tr>
                                            <td>Gautham</td>
                                            <td>Kishan Nayak</td>
                                            <td>gautham@gmail.com</td>
                                            <td>01/06/2023</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Krishna</td>
                                            <td>Ranjith</td>
                                            <td>krishna@gmail.com</td>
                                            <td>01/06/2023</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Irfaan</td>
                                            <td>Rakesh Marate</td>
                                            <td>rakesh@gmail.com</td>
                                            <td>01/06/2023</td>                                        
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Ranjith</td>
                                            <td>cedric@gmail.com</td>
                                            <td>2012/03/29</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Siri Sharma</td>
                                            <td>Kishan Nayak</td>
                                            <td>siri@gmail.com</td>
                                            <td>2008/11/28</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>2012/12/02</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>2012/08/06</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>Integration Specialist</td>
                                            <td>Tokyo</td>
                                            <td>2010/10/14</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>Javascript Developer</td>
                                            <td>San Francisco</td>
                                            <td>2009/09/15</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sonya Frost</td>
                                            <td>Software Engineer</td>
                                            <td>Edinburgh</td>
                                            <td>2008/12/13</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jena Gaines</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>2008/12/19</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Quinn Flynn</td>
                                            <td>Support Lead</td>
                                            <td>Edinburgh</td>
                                            <td>2013/03/03</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Charde Marshall</td>
                                            <td>Regional Director</td>
                                            <td>San Francisco</td>
                                            <td>2008/10/16</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Haley Kennedy</td>
                                            <td>Senior Marketing Designer</td>
                                            <td>London</td>
                                            <td>2012/12/18</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tatyana Fitzpatrick</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>2010/03/17</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Michael Silva</td>
                                            <td>Marketing Designer</td>
                                            <td>London</td>
                                            <td>2012/11/27</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Paul Byrd</td>
                                            <td>Chief Financial Officer (CFO)</td>
                                            <td>New York</td>
                                            <td>2010/06/09</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Gloria Little</td>
                                            <td>Systems Administrator</td>
                                            <td>New York</td>
                                            <td>2009/04/10</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>2012/10/13</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dai Rios</td>
                                            <td>Personnel Lead</td>
                                            <td>Edinburgh</td>
                                            <td>2012/09/26</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenette Caldwell</td>
                                            <td>Development Lead</td>
                                            <td>New York</td>
                                            <td>2011/09/03</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Yuri Berry</td>
                                            <td>Chief Marketing Officer (CMO)</td>
                                            <td>New York</td>
                                            <td>2009/06/25</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>2011/12/12</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Doris Wilder</td>
                                            <td>Sales Assistant</td>
                                            <td>Sidney</td>
                                            <td>2010/09/20</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Angelica Ramos</td>
                                            <td>Chief Executive Officer (CEO)</td>
                                            <td>London</td>
                                            <td>2009/10/09</td>
                                            <td>                                                                                                       
                                                <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>        
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
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