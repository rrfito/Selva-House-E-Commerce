<?php
session_start();
include 'koneksi.php'; // Pastikan Anda memiliki file koneksi.php yang memuat informasi koneksi ke database

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'add_product') {
        $category_id = $_POST['addProductCategory'];
        $supplier_id = $_POST['addProductSupplier'];
        $nama_barang = $_POST['addProductName'];
        $kode = $_POST['addProductCode'];
        $Quantity = $_POST['addProductJumlah'];
        $description = $_POST['addProductDescription'];
        
        $nama_foto = $_FILES['addProductImage']['name'];
        $tmp_foto = $_FILES['addProductImage']['tmp_name'];

        $folder_tujuan = '../assets/img/IMG';
       

        $nama_unik_foto = uniqid() . '_' . $nama_foto;
        

        $tujuan_foto = $folder_tujuan . $nama_unik_foto;

        if (move_uploaded_file($tmp_foto, $tujuan_foto)) {
            include 'koneksi.php';

            $query_product = "INSERT INTO product (nama_barang, kode, spp_id, cat_id,jumlah,Deskripsi_Product, foto)
                              VALUES ('$nama_barang', '$kode', '$supplier_id', '$category_id',$Quantity, '$description','$nama_unik_foto')";

            $result_product = mysqli_query($koneksi, $query_product);

            if ($result_product) {
                // Jika berhasil, arahkan pengguna ke halaman barang.php
                header("Location: ../halaman/barangSub.php");
                exit();
            } else {
                echo "Failed to add product.";
            }
        } else {
            echo "Failed to upload image.";
        }
    } elseif ($action === 'update_product') {
        // Proses update data produk
        $productId = $_POST['updateProductId'];
        $category = $_POST['updateProductCategory'];
        $supplier = $_POST['updateProductSupplier'];
        $productName = $_POST['updateProductName'];
        $productCode = $_POST['updateProductCode'];
        $Quantity = $_POST['updateProductJumlah'];
        $description = $_POST['updateProductDescription'];
    
        // Perbaikan query dengan menghapus koma setelah '$description'
        $query = "UPDATE product SET cat_id='$category', spp_id='$supplier', nama_barang='$productName', 
                  kode='$productCode',jumlah= $Quantity, Deskripsi_Product='$description' WHERE prd_id='$productId'";
        
        // Lakukan pengecekan apakah query berhasil dijalankan
        if (mysqli_query($koneksi, $query)) {
            header("Location: ../halaman/barangSub.php");
            exit();
        } else {
            // Tampilkan pesan error jika query gagal
            echo "Error updating product: " . mysqli_error($koneksi);
        }
    }
    
    
    
    elseif ($action === 'delete_product') {
        // Proses delete data produk
        if (isset($_POST['id'])) {  // Change 'id' to match the parameter name in JavaScript
            $productId = $_POST['id'];

            // Hapus data produk dari database
            $query = "DELETE FROM product WHERE prd_id='$productId'";
            if (mysqli_query($koneksi, $query)) {
                header("Location: ../halaman/barangSub.php"); // Mengarahkan kembali ke halaman produk setelah penghapusan berhasil
                exit();
            } else {
                echo "Failed to delete product.";
            }
        } else {
            echo "Product ID not specified.";
        }
    }
}

?>