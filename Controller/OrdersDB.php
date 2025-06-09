<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['status'])) {
        $ord_id = $_POST['ord_id'];
        $status = $_POST['status'];

        $query = "UPDATE orders SET status = '$status' WHERE ord_id = $ord_id";

        if (mysqli_query($koneksi, $query)) {
            header('Location: ../halaman/Orders.php');
        } else {
            echo "Error updating status: " . mysqli_error($koneksi);
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'orders') {
        $cust_id = $_POST["cust_id"];
        $var_id = $_POST["var_id"];
    
        // Ambil harga varian dari database berdasarkan var_id
        $sql_get_variant_price = "SELECT price FROM product_variants WHERE var_id = $var_id";
        $result_variant_price = $koneksi->query($sql_get_variant_price);
    
        // Ambil peran dari database berdasarkan cust_id
        $sql_get_customer_role = "SELECT peran FROM customers WHERE cust_id = $cust_id";
        $result_customer_role = $koneksi->query($sql_get_customer_role);
    
        if ($result_variant_price->num_rows > 0 && $result_customer_role->num_rows > 0) {
            $row_variant_price = $result_variant_price->fetch_assoc();
            $harga = $row_variant_price['price'];
    
            $row_customer_role = $result_customer_role->fetch_assoc();
            $peran = $row_customer_role['peran'];
    
            // mengecek peran
            if ($peran == 'reseller') {
                $diskon = 0.1; // Diskon 10% untuk reseller
            } else {
                $diskon = 0; // Tidak ada diskon untuk peran lain
            }
            $harga_setelah_diskon = $harga - ($harga * $diskon);
    
            $tgl_pesan = date("Y-m-d");
            $alamat_pengiriman = $_POST["alamat_pengiriman"];
            $jumlah = $_POST["jumlah_produk"];
            $no_hp_penerima = $_POST["no_hp_penerima"];
            $status = "Diproses";
    
           
            $koneksi->begin_transaction();
    
            // Insert pesanan
            $sql_insert_order = "INSERT INTO orders (cust_id, var_id, tgl_pesan, alamat_pengiriman, harga, jumlah, no_hp_penerima, status)
                                 VALUES ('$cust_id', '$var_id', '$tgl_pesan', '$alamat_pengiriman', '$harga_setelah_diskon', '$jumlah', '$no_hp_penerima', '$status')";
    
            if ($koneksi->query($sql_insert_order) === TRUE) {
                // mencari prd_id 
                $sql_get_product_id = "SELECT prd_id FROM product_variants WHERE var_id = $var_id";
                $result_product_id = $koneksi->query($sql_get_product_id);
                if ($result_product_id->num_rows > 0) {
                    $row_product_id = $result_product_id->fetch_assoc();
                    $product_id = $row_product_id['prd_id'];
    
                    // Update jumlah barang dalam tabel products
                    $sql_update_product_quantity = "UPDATE product SET jumlah = jumlah - '$jumlah' WHERE prd_id = '$product_id'";
                    if ($koneksi->query($sql_update_product_quantity) === TRUE) {
                        // Commit transaksi
                        $koneksi->commit();
                        header("Location: ../halaman_customer/index.php");
                        exit();
                    } else {
                        // Rollback transaksi jika gagal mengurangi jumlah barang
                        $koneksi->rollback();
                        echo "Error updating product quantity: " . mysqli_error($koneksi);
                    }
                } else {
                    // Rollback transaksi jika gagal mendapatkan prd_Id
                    $koneksi->rollback();
                    echo "Invalid variant ID.";
                }
            } else {
                echo "Error processing order: " . mysqli_error($koneksi);
            }
        } else {
            echo "Invalid variant ID or customer ID.";
        }
    } else {
        echo "Invalid form submission.";
    }
    

}

mysqli_close($koneksi);
?>