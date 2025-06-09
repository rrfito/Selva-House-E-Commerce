<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === "tambah") {
            $nama_kategori = $_POST['nama_kategori'];
           
            $sql = "INSERT INTO categories (nama_kategori) VALUES ('$nama_kategori')";

            if (mysqli_query($koneksi, $sql)) {
                header("Location: ../halaman/kategori.php"); 
                exit();
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        } elseif ($action === "update") {
            $cat_id = $_POST['update_cat_id']; 
            $nama_kategori = $_POST['update_nama_kategori']; 

          
            $sql = "UPDATE categories SET nama_kategori = '$nama_kategori' WHERE cat_id = '$cat_id'";

            if (mysqli_query($koneksi, $sql)) {
                header("Location: ../halaman/kategori.php"); 
                exit();
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $cat_id = $_GET['id'];
  
    $sql = "DELETE FROM categories WHERE cat_id = '$cat_id'";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../halaman/kategori.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>