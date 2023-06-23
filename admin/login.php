<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/config.php';
require_once "Database.php";
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User($conn);
    $user->username = $_POST["username"];
    $user->password = $_POST["userpassword"];
     if ($user->login()) {
        header("location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Law-Affair</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="account-body accountbg">

    <!-- Log In page -->
    <div class="container">
        <div class="row vh-100 ">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box">
                                    <a href="#" class="logo logo-admin"><img
                                            src="assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                                </div><!--end auth-logo-box-->
                                <?php
                                if (isset($error)) {
                                    echo '<div class="alert alert-danger">' . $error . '</div>';
                                }
                                ?>
                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">Welcome to LAW AFFAIR</h4>
                                    <p class="text-muted mb-0">Sign in to continue to Portal</p>
                                </div> <!--end auth-logo-text-->


                                <form method="POST" class="form-horizontal auth-form my-4" action="login.php">

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-user"></i>
                                            </span>
                                            <input type="text" class="form-control" name="username" id="username"
                                                placeholder="Enter username">
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock"></i>
                                            </span>
                                            <input type="password" class="form-control" name="userpassword"
                                                id="userpassword" placeholder="Enter password">
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-switch switch-success">
                                                <input type="checkbox" name="remember_me" class="custom-control-input"
                                                    id="customSwitchSuccess" value="1">
                                                <label class="custom-control-label text-muted"
                                                    for="customSwitchSuccess">Remember me</label>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-sm-6 text-right">
                                            <a href="forgot_password.php" class="text-muted font-13"><i
                                                    class="dripicons-lock"></i> Forgot password?</a>
                                        </div><!--end col-->
                                    </div><!--end form-group-->

                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button
                                                class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light"
                                                type="submitt">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->
                            </div><!--end /div-->

                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end auth-page-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <!-- End Log In page -->




    <!-- jQuery  -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/metismenu.min.js"></script>
    <script src="../assets/js/waves.js"></script>
    <script src="../assets/js/feather.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.js"></script>

</body>

</html>