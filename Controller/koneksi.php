<?php
    $host = "localhost";
    $username = "root";
    $pass = "";
    $database = "project_k5";
    
    // membuat koneksi
    $koneksi = mysqli_connect($host, $username, $pass, $database);
    
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }
?>