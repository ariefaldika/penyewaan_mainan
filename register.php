<?php
    require '../config/connect.php';

    if (isset($_POST['signup'])) {
        # code...
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $fullname = $_POST['fullname'];

        $signup = mysqli_query($con, "INSERT INTO users VALUE(NULL,'$username','$password','1','$fullname','1')");
        if ($signup) {
            # code...
            echo'<script>
                setTimeout(function() {
                    swal({
                        title: "Success",
                        text: "Register new user",
                        type: "success"
                    }, function() {
                        window.location = "login.php";
                    });
                }, 500);
                </script>';
        }else {
            # code...
            echo'<script>
            setTimeout(function() {
                swal({
                    title: "Failed",
                    text: "Gagal signup!",
                    type: "error"
                }, function() {
                    window.location = "login.php";
                });
            }, 500);
            </script>';
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Cubic Admin Template</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <!-- ===== Animation CSS ===== -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Sweetalert CSS -->
    <link href="../plugins/components/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" action="" method="post" >
                    <h3 class="box-title m-b-20">Sign Up</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email" name="username" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Fullname" name="fullname" required>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="signup">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="login.html" class="text-primary m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="../plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Sweet Alert -->
    <script src="../plugins/components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/components/sweetalert/jquery.sweet-alert.custom.js"></script>
</body>

</html>
