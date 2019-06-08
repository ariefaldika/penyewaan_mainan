<?php
    require '../config/connect.php';

    if (isset($_POST['add'])) {
        # code...
        $namapeminjam = $_POST['nama'];
        $namamainan = $_POST['dropdown'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        $insert = mysqli_query($con, "INSERT INTO sewa VALUE(NULL,'$namapeminjam','$start','$end','$namamainan',NOW())");
        if ($insert) {
            # code...
            echo'<script>
            setTimeout(function() {
                swal({
                    title: "Success",
                    text: "Pinjam Sukses",
                    type: "success"
                }, function() {
                    window.location = "index.php";
                });
            }, 500);
            </script>';
        } else {
            echo'<script>
            setTimeout(function() {
                swal({
                    title: "Failed",
                    text: "Gagal jooon",
                    type: "error"
                }, function() {
                    window.location = "index.php";
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
    <title>CubiTitle Admin Template</title>
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
                    <h3 class="box-title m-b-20">Pilih mainan</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Nama" name="nama" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <!-- <input class="form-control" type="text" required="" placeholder="Email" name="username" required> -->
                                <label class="control-label">Pilih Mainan</label>
                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="dropdown">
                                    <?php
                                        $show = mysqli_query($con, "SELECT * FROM barang");
                                        $no = 1;
                                        while ($data = mysqli_fetch_array($show)) {
                                            # code...
                                            $id = $data['id'];
                                            $nama = $data['nama'];
                                        
                                    ?>
                                    <option value=<?php echo $nama ?>><?php echo $nama ?></option>
                                        <?php $no++; }?>
                                </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <!-- <input class="form-control" type="password" required="" placeholder="Password" name="password" required> -->
                              <p class="text-muted m-b-20">Pilih durasi pinjam.</p>
                                <div class="input-daterange input-group" id="date-range2">
                                    <input type="text" class="form-control" name="start" /> <span class="input-group-addon bg-info b-0 text-white">to</span>
                                        <input type="text" class="form-control" name="end" /> </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="add">Pinjam</button>
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
    <!-- Date Picker Plugin JavaScript -->
    <script src="../plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="../plugins/components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../plugins/components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range2').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });
    </script>
    <!--Style Switcher -->
    <script src="../plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
