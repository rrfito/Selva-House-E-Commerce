<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === "tambah") {
            $nama_supplier = $_POST['nama_supplier'];
            $no_hp = $_POST['no_hp'];

          
            $sql = "INSERT INTO suppliers (nama_suppliers, no_hp) VALUES ('$nama_supplier', '$no_hp')";

            if (mysqli_query($koneksi, $sql)) {
                header("Location: ../halaman/supplier.php"); 
                exit();
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        } elseif ($action === "update") {
            $spp_id = $_POST['update_spp_id'];
            $nama_supplier = $_POST['update_nama_supplier'];
            $no_hp = $_POST['update_no_hp'];

          
            $sql = "UPDATE suppliers SET nama_suppliers = '$nama_supplier', no_hp = '$no_hp' WHERE spp_id = '$spp_id'";

            if (mysqli_query($koneksi, $sql)) {
                header("Location: ../halaman/supplier.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $spp_id = $_GET['id'];

   
    $sql = "DELETE FROM suppliers WHERE spp_id = '$spp_id'";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../halaman/supplier.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
