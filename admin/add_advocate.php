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
                                <li class="breadcrumb-item active">Add Advocate</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Advocate</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="advocate.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label for="example-text-input"
                                                class="col-sm-2 col-form-label text-right">Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="name" type="text"
                                                    id="example-text-input">
                                                <?php
                                                if (isset($succes)) {
                                                    echo '<div class="alert alert-danger">' . htmlspecialchars($succes ). '</div>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input"
                                                class="col-sm-2 col-form-label text-right">Mobile
                                                Number</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="mobileNumber" type="tel"
                                                    id="example-tel-input">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="example-datetime-local-input"
                                                class="col-sm-2 col-form-label text-right">Joining Date</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="date" name="joiningDate"
                                                    id="example-datetime-local-input">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-datetime-local-input"
                                                class="col-sm-2 col-form-label text-right">Upload Photo</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="photo" class="custom-file-input"
                                                    id="inputGroupFile04">
                                                <label class="custom-file-label" for="inputGroupFile04">Choose
                                                    file</label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-text-input"
                                                class="col-sm-2 col-form-label text-right">Address</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="address" rows="5"
                                                    id="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input"
                                                class="col-sm-2 col-form-label text-right">Specialization</label>
                                            <div class="col-md-9">
                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="lawyer[]" value="Tax Lawyer"
                                                            class="custom-control-input" id="customCheck06"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                        <label class="custom-control-label" for="customCheck06">Tax
                                                            Lawyer</label>
                                                    </div>
                                                </div>

                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="lawyer[]" value="Criminal Lawyer"
                                                            class="custom-control-input" id="customCheck07"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                        <label class="custom-control-label" for="customCheck07">Criminal
                                                            Lawyer</label>
                                                    </div>
                                                </div>

                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="lawyer[]"
                                                            value="Intellectual Lawyer" class="custom-control-input"
                                                            id="customCheck08" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="2">
                                                        <label class="custom-control-label"
                                                            for="customCheck08">Intellectual
                                                            Lawyer</label>
                                                    </div>
                                                </div>

                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="lawyer[]" value="Buisness lawyer"
                                                            class="custom-control-input" id="customCheck09"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                        <label class="custom-control-label" for="customCheck09">Buisness
                                                            lawyer</label>
                                                    </div>
                                                </div>

                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="lawyer[]" value="Family Lawyer"
                                                            class="custom-control-input" id="customCheck10"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                        <label class="custom-control-label" for="customCheck10">Family
                                                            Lawyer</label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-gradient-primary">Submit</button>
                            </form>
                            <button type="button" class="btn btn-gradient-danger">Cancel</button>

                        </div>
                    </div>



                </div>



            </div>
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