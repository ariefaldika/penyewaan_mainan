<?php
session_start();

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda harus login ea mamanx');window.location='login.php'</script>";
}

?>