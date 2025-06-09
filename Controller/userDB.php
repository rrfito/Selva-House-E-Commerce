<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === "update") {
           
            $nama = $_POST['update_Nama_Customer']; 
            $peran = $_POST['update_peran']; 

            $sql = "UPDATE customers SET peran = '$peran' WHERE nama = '$nama'";

            if (mysqli_query($koneksi, $sql)) {
                header("Location:../halaman/Customers.php"); 
                exit();
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $cust_id = $_GET['id'];
  
    $sql = "DELETE FROM customers WHERE cust_id = '$cust_id'";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../halaman/Customers.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
