<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedInCustId'])) {
    header("Location: ../halaman/Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SelvaHouse</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <!-- jss -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="../assets/img2/selvahouse.png" type="image/x-icon">

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="../assets2/css/style-prefix.css">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="overlay" data-overlay></div>
    <header>
        <div class="header-top">
            <div class="container">
                <ul class="header-social-container">
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>
                </ul>
                <div class="header-alert-news">
                    <p>
                        <b>Selva House</b>
                    </p>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <a href="#" class="header-logo">
                    <img src="../assets/img2/SelvaHouse2.png" alt="Anon's logo" width="120" height="36">
                </a>
                <div class="header-search-container">

                    <form action="Search.php" method="GET">
                        <input type="search" name="search" class="search-field"
                            placeholder="Enter your product name...">
                        <button type="submit" class="search-btn">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </form>
                </div>

                <div class="header-user-actions">

                    <a href="Profile.php" class="action-btn">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>

                    <a href="data_transaksi.php" class="action-btn">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                    </a>

                </div>

            </div>

        </div>

        <nav class="desktop-navigation-menu">

            <div class="container">

                <ul class="desktop-menu-category-list">

                <li class="menu-category"><a href="../halaman_customer/index.php" class="menu-title">Home</a></li>
                     <li class="menu-category"><a href="../halaman_customer/aboutUs.php" class="menu-title">About</a></li>

                    

                </ul>

            </div>

        </nav>

        <div class="mobile-bottom-navigation">

            <button class="action-btn" data-mobile-menu-open-btn>
                <ion-icon name="menu-outline"></ion-icon>
            </button>

            <button class="action-btn">
                <ion-icon name="bag-handle-outline"></ion-icon>

                <span class="count">0</span>
            </button>

            <button class="action-btn">
                <ion-icon name="home-outline"></ion-icon>
            </button>

            <button class="action-btn">
                <ion-icon name="heart-outline"></ion-icon>

                <span class="count">0</span>
            </button>

            <button class="action-btn" data-mobile-menu-open-btn>
                <ion-icon name="grid-outline"></ion-icon>
            </button>

        </div>
    </header>
    <main>


    <div class="container-fluid py-4">
    <div class="card mb-4 card-with-margin">
        <div class="card-body">
            <p>Riwayat Pemesanan</p>
            <div class="table-responsive">
                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal Pesan</th>
                            <th>Nama Barang</th>
                            <th>Ukuran</th>
                            <th>Warna</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../Controller/koneksi.php';

                        $cust_id = $_SESSION['loggedInCustId'];

                        $customer_query = mysqli_query($koneksi, "SELECT nama FROM customers WHERE cust_id = $cust_id");
                        $customer_data = mysqli_fetch_array($customer_query);
                        $nama_customer = $customer_data['nama'];

                        $orders = mysqli_query($koneksi, "SELECT o.tgl_pesan, p.nama_barang, pv.price, o.jumlah, o.status, u.nama_ukuran, w.warna
                        FROM orders o
                            JOIN product_variants pv ON o.var_id = pv.var_id
                            JOIN product p ON pv.prd_id = p.prd_id
                            JOIN size u ON pv.size_id = u.size_id
                            JOIN color w ON pv.color_id = w.color_id
                            WHERE o.cust_id = $cust_id");
                        while ($row = mysqli_fetch_array($orders)) {
                            $total_harga = $row['price'] * $row['jumlah']; 
                            echo "<tr>
                                <td>" . $row['tgl_pesan'] . "</td>
                                <td>" . $row['nama_barang'] . "</td>
                                <td>" . $row['nama_ukuran'] . "</td>
                                <td>" . $row['warna'] . "</td>
                                <td>" . $row['jumlah'] . "</td>
                                <td>" . $total_harga . "</td>
                                <td>" . $row['status'] . "</td>
                                <td>";
                                
                            if ($row['status'] == 'Diproses') {
                                echo '<a href="https://api.whatsapp.com/send?phone=62895601342260&text=Halo,%20saya%20' . urlencode($nama_customer) . '%20ingin%20mengonfirmasi%20pesanan%20berikut%20yang%20berstatus%20di%20proses:%0A%0ATanggal%20Pesan:%20' . $row['tgl_pesan'] . '%0ANama%20Barang:%20' . $row['nama_barang'] . '%0AUkuran:%20' . $row['nama_ukuran'] . '%0AWarna:%20' . $row['warna'] . '%0AJumlah:%20' . $row['jumlah'] . '%0ATotal%20Harga:%20' . $total_harga . '%0AStatus:%20' . $row['status'] . '" target="_blank" class="btn btn-success">
                                        <i class="fab fa-whatsapp"></i> Konfirmasi via WhatsApp
                                    </a>';
                            } else {
                                echo "Tidak Tersedia";
                            }
                            
                            echo "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>

</div>

</div>
    </main>
    <footer>

        <div class="footer-nav">

            <div class="container">

                <ul class="footer-nav-list">
                    <li class="footer-nav-item">
                        <h2 class="nav-title">Categories</h2>
                    </li>

                    <?php
                    $query = 'SELECT nama_kategori FROM categories';
                    $result = mysqli_query($koneksi, $query);



                    while ($row = mysqli_fetch_assoc($result)) {
                        $category = $row['nama_kategori'];
                        ?>
                        <li class="footer-nav-item">
                            <a class="footer-nav-link">
                                <?php echo $category; ?>
                            </a>
                        </li>
                        <?php
                    }

                    ?>


                </ul>



                <ul class="footer-nav-list">

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Our Company</h2>
                    </li>

                    <li class="footer-nav-item">
                        <a class="footer-nav-link">Delivery</a>
                    </li>

                    <li class="footer-nav-item">
                        <a class="footer-nav-link">Legal Notice</a>
                    </li>

                    <li class="footer-nav-item">
                        <a class="footer-nav-link">Terms and conditions</a>
                    </li>

                    <li class="footer-nav-item">
                        <a class="footer-nav-link">About us</a>
                    </li>

                    <li class="footer-nav-item">
                        <a class="footer-nav-link">Secure payment</a>
                    </li>

                </ul>

                <ul class="footer-nav-list">

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Services</h2>
                    </li>

                    <li class="footer-nav-item">
                        <a class="footer-nav-link">Prices drop</a>
                    </li>

                    <li class="footer-nav-item">
                        <a class="footer-nav-link">New products</a>
                    </li>

                    <li class="footer-nav-item">
                        <a class="footer-nav-link">Best sales</a>
                    </li>

                    <li class="footer-nav-item">
                        <a class="footer-nav-link">Contact us</a>
                    </li>

                    <li class="footer-nav-item">
                        <a class="footer-nav-link">Sitemap</a>
                    </li>

                </ul>

                <ul class="footer-nav-list">

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Contact</h2>
                    </li>

                    <li class="footer-nav-item flex">
                        <div class="icon-box">
                            <ion-icon name="location-outline"></ion-icon>
                        </div>

                        <address class="content">
                            Jl. Umbansari No. 27C. Rumbai,Pekanbaru
                        </address>
                    </li>

                    <li class="footer-nav-item flex">
                        <div class="icon-box">
                            <ion-icon name="call-outline"></ion-icon>
                        </div>

                        <a class="footer-nav-link">088708017121</a>
                    </li>

                    <li class="footer-nav-item flex">
                        <div class="icon-box">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </div>
                        <a href="https://www.instagram.com/selva.house/" class="footer-nav-link">@Selva.house</a>
                    </li>

                </ul>

                <ul class="footer-nav-list">

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Follow Us</h2>
                    </li>

                    <li>
                        <ul class="social-link">

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">
                                    <ion-icon name="logo-facebook"></ion-icon n-icon>
                                </a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">
                                    <ion-icon name="logo-twitter"></ion-icon>
                                </a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">
                                    <ion-icon name="logo-linkedin"></ion-icon>
                                </a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">
                                    <ion-icon name="logo-instagram"></ion-icon>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>

            </div>

        </div>




    </footer>
    <script> $('#example').DataTable();</script>
    <script src="../assets2/js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>