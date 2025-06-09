<?php

require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    function loginAdmin($koneksi, $username, $password)
    {
        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = $koneksi->query($query);

        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    function loginCustomer($koneksi, $username, $password)
    {
        $query = "SELECT * FROM customers WHERE username = '$username' AND password = '$password'";
        $result = $koneksi->query($query);

        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    if (loginAdmin($koneksi, $username, $password)) {
        $query = "SELECT adm_id FROM admin WHERE username = '$username' AND password = '$password'";
        $result = $koneksi->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $adm_id = $row['adm_id'];

            session_start();
            $_SESSION['loggedInAdmId'] = $adm_id;

            header('Location: ../halaman/Dashboard.php');
            exit();
        }
    } elseif (loginCustomer($koneksi, $username, $password)) {
        $query = "SELECT * FROM customers WHERE username = '$username' AND password = '$password'";
        $result = $koneksi->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $cust_id = $row['cust_id'];
            $peran = $row['peran']; // Ganti 'nama_peran' sesuai dengan nama kolom di tabel 'peran'

            session_start();
            $_SESSION['loggedInCustId'] = $cust_id;
            $_SESSION['loggedInCustPeran'] = $peran;


            header('Location: ../halaman_customer/index.php');
            exit();
        }
    } else {
        header('Location: ../halaman/Login.php?error=1&message=Invalid%20username%20or%20password');
        exit();
    }
}
?>