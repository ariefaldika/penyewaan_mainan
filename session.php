<?php

require '../config/connect.php';
$admin = $_SESSION['admin'];
$session = mysqli_query($con, "SELECT * FROM users WHERE username='$admin'");
$data = mysqli_fetch_array($session);
$idUsers = $data['id'];
$namaUsers = $data['fullname'];

?>