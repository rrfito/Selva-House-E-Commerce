<?php
include "koneksi.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'insert') {

        $nama_barang = $_POST['tambah_nama_barang'];
        $kode = $_POST['tambah_kode'];
        $jumlah = $_POST['tambah_jumlah'];
        $supplier_id = $_POST['tambah_supplier'];
        $category_id = $_POST['tambah_kategori'];


        $nama_foto = $_FILES['tambah_foto']['name'];
        $tmp_foto = $_FILES['tambah_foto']['tmp_name'];


        $folder_tujuan = 'C:\xampp\htdocs\admin\assets\img\IMG';


        $nama_unik_foto = uniqid() . '_' . $nama_foto;


        $tujuan_foto = $folder_tujuan . $nama_unik_foto;
        if (move_uploaded_file($tmp_foto, $tujuan_foto)) {
            // Proses insert ke tabel product
            $query_product = "INSERT INTO product (nama_barang, kode, jumlah, spp_id, cat_id, foto)
                              VALUES ('$nama_barang', '$kode', '$jumlah', '$supplier_id', '$category_id', '$nama_unik_foto')";

            $result_product = mysqli_query($koneksi, $query_product);

            if ($result_product) {

                $product_id = mysqli_insert_id($koneksi);


                $size_id = $_POST['tambah_ukuran'];
                $color_id = $_POST['tambah_warna'];
                $variant_price = $_POST['tambah_harga'];


                $query_product_variants = "INSERT INTO product_variants (prd_id, size_id, color_id, price)
                                          VALUES ('$product_id', '$size_id', '$color_id', '$variant_price')";

                $result_product_variants = mysqli_query($koneksi, $query_product_variants);

                if ($result_product_variants) {

                    header('Location: ../halaman/barang.php');
                    exit();
                } else {

                    echo "Error: " . mysqli_error($koneksi);
                }
            } else {

                echo "Error: " . mysqli_error($koneksi);
            }
        } else {

            echo "Error uploading file.";
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'Variant') {

        $produk_id = $_POST['tambah_variant_produk'];
        $size_id = $_POST['tambah_variant_size'];
        $color_id = $_POST['tambah_variant_color'];
        $harga = $_POST['tambah_variant_harga'];


        $query = "INSERT INTO product_variants (prd_id, size_id, color_Id, price) VALUES ('$produk_id', '$size_id', '$color_id', '$harga')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {

            header('Location: ../halaman/barang.php');
            exit();
        } else {

            echo "Error: " . mysqli_error($koneksi);
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "update_variant") {
    // Mengambil data dari form
    $var_Id = $_POST["update_variant_id"];
    $ukuran = $_POST["update_variant_size"];
    $warna = $_POST["update_variant_color"];
    $harga = $_POST["update_variant_harga"];

    // Perintah SQL untuk melakukan update data produk varians
    $update_query = "UPDATE product_variants SET size_id = '$ukuran', color_Id = '$warna', price = '$harga' WHERE var_id = '$var_Id'";
    $result = mysqli_query($koneksi, $update_query);
    if ($result) {
        header('Location: ../halaman/barang.php');
        exit();
    } else {

        echo "Error: " . mysqli_error($koneksi);
    }
}
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $delete_var_id = $_GET['id'];
  
    $delete_query = "DELETE FROM product_variants WHERE var_id = '$delete_var_id'";

    if (mysqli_query($koneksi, $delete_query)) {
        header("Location: ../halaman/Customers.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

        
?>