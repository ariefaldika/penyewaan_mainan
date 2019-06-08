<?php
    require 'akses.php';
    require 'session.php';
    // require 'dropzone.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- cut to partial -->
    <?php
        require 'partial/header.php';
    ?>
</head>

<body class="mini-sidebar">
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ===== Top-Navigation ===== -->
        <?php
            require 'partial/nav.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require 'partial/sidebar.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Dropzone </h3>
                            <p class="text-muted m-b-30"> For multiple file upload</p>
                            <form action="dropzone.php" class="dropzone">
                                <div class="fallback">
                                    <input name="file" type="file" multiple /> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.container-fluid -->
            <footer class="footer t-a-c">
                © 2017 Cubic Admin
            </footer>
        </div>
        <!-- ===== end page content ===== -->
        <footer class="footer t-a-c">
        <?php
            require 'partial/footer.php';
        ?>
        </footer>   
        <!-- ===== Page-Content-End ===== -->
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <?php
        require 'partial/js.php';
    ?>
</body>

</html>
