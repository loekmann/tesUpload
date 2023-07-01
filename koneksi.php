<?php 
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'rumahmakan';
// mysqli_connect ini digunakan utk menghubungkan php ini dngn SQL yg ada d localhost.phpmyadmin
    $conn = mysqli_connect($host, $user, $pass, $db); //Yg didalam kurung yaitu parameter

    mysqli_select_db($conn, $db);
?>


