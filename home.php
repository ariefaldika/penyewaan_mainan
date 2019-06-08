<?php
    require 'akses.php';
    require 'session.php';
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
        <?php
            require 'partial/content.php';
        ?>
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
