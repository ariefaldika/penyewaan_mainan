<?php

require '../config/connect.php';

// $key = $_GET['id'];
$name = $_FILES['file']['name'];
$tmpname = $_FILES['file']['tmp_name'];
$dir = "../upload/";
$rand = rand(100000,999999);
$namefile = $rand.$name;
$filename = $dir.$namefile;
$size = $_FILES['file']['size'];


    $move = move_uploaded_file($tmpname, $filename);
    $insert = mysqli_query($con, "INSERT INTO gambar VALUE(NULL,'$namefile',NOW())");

?>