<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
    $name = $_POST['nama'];
    $usernama = $_POST['usernama'];
    $password =$_POST['password']; 

    
    require_once "koneksi.php";

    
    $sql = "INSERT INTO customers (nama, username, password) VALUES ('$name', '$usernama', '$password')";

    if ($koneksi->query($sql) === TRUE) {

       
       
        session_start();
        $_SESSION['notification'] = "Account created successfully. You can now log in.";

     
        header("Location: ../halaman/Login.php");
        exit();
    } 

  
    $koneksi->close();
}
?>
