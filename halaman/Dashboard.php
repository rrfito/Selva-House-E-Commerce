<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedInAdmId'])) {
    header("Location: ../halaman/Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
    Selva House
    </title>
    <link rel="shortcut icon" href="../assets/img2/selvahouse.png" type="image/x-icon">
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .custom-card {
            min-height: 140px;
            /* Set the desired height for the cards */
        }
    </style>
</head>

<body class="g-sidenav-show   bg-gradient-warning">
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" ../halaman/Dashboard.php" target="_blank">
                <img src="../assets/img2/selvahouse.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Selva House</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="../halaman/Dashboard.php">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../halaman/supplier.php">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Supplier</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../halaman/barang.php">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../halaman/Customers.php">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../halaman/kategori.php">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../halaman/Orders.php">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../halaman/Laporan.php">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Financial Report</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <div class="card card-plain shadow-none" id="sidenavCard">
                <img class="w-40 mx-auto " src="../assets/img2/retailer.png" alt="retailer">
                <div class="card-body text-center p-3 w-100 pt-0">
                    <div class="docs-info">
                        <p class="text-xs font-weight-bold mb-0">Pergi untuk melihat Website </p>
                    </div>
                </div>
            </div>
            <a href="../halaman_customer/index.php" target="_blank" class="btn btn-dark bg-gradient-warning btn-sm w-100 mb-3">Website</a>
            <a class="btn btn-primary bg-gradient-info btn-sm mb-0 w-100" href="../halaman/Login.php" type="button">Log
                Out</a>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <?php
        include "../Controller/koneksi.php";
        // menghitung total pendapatan selama ini
        $query = "SELECT SUM(harga * jumlah) AS total_pendapatan FROM orders WHERE status <> 'Dibatalkan';";
        $result = $koneksi->query($query);
        $totalPendapatan = 0;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalPendapatan = $row['total_pendapatan'];
        }
        // menghitung total customer
        $query = "SELECT COUNT(cust_id) AS total_customer FROM customers";
        $result = $koneksi->query($query);
        $totalCustomer = 0;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalCustomer = $row['total_customer'];
        }
        //menghitung total barang
        $query = "SELECT SUM(jumlah) AS total_product FROM product";
        $result = $koneksi->query($query);
        $totalProduct = 0;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalProduct = $row['total_product'];
        } //mencari total barang terjual
        $query = "SELECT SUM(jumlah) AS total_sold FROM orders";
        $result = $koneksi->query($query);
        $total_sold = 0;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $total_sold = $row['total_sold'];
        }

        $koneksi->close();
        ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card card custom-card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pendapatan</p>
                                        <h5 class="font-weight-bolder">
                                            Rp
                                            <?php echo number_format($totalPendapatan, 0, ',', '.'); ?>
                                        </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card card custom-card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Customer</p>
                                        <h5 class="font-weight-bolder">
                                            <?php echo $totalCustomer; ?>
                                        </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card card custom-card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total <br>Product </p>
                                        <h5 class="font-weight-bolder">
                                            <?php echo $totalProduct; ?>
                                        </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card custom-card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Produk Terjual</p>
                                        <h5 class="font-weight-bolder">
                                            <?php echo $total_sold; ?>
                                        </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <h6 class="text-capitalize">Gambaran Umum Penjualan</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            include "../Controller/koneksi.php";


                            $query = "SELECT tgl_pesan, harga*jumlah as total  FROM orders";
                            $result = $koneksi->query($query);

                            $tgl_pesan = [];
                            $harga_total = [];

                            while ($row = $result->fetch_assoc()) {
                                $tgl_pesan[] = $row['tgl_pesan'];
                                $harga_total[] = $row['total'];
                            }

                            $koneksi->close();
                            ?>
                            <div class="chart-container" style="position: relative; height: 300px;">

                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card card-carousel overflow-hidden h-100 p-0">
                        <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                            <div class="carousel-inner border-radius-lg h-100">
                                <div class="carousel-item h-100 active" style="background-image: url('../assets/img2/a.jpg');
                            background-size: cover;">
                                    <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                        <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                            <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                        </div>
                                        <h5 class="text-white mb-1">Liat informasi mengenai marketplace kamu</h5>

                                    </div>
                                </div>
                                <div class="carousel-item h-100" style="background-image: url('../assets/img2/b1.jpg');
                            background-size: cover;">
                                    <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                        <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                            <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                                        </div>
                                        <h5 class="text-white mb-1">Melihat data penghasilan dengan spesifik</h5>

                                    </div>
                                </div>
                                <div class="carousel-item h-100" style="background-image: url('../assets/img2/ank3.jpg');
                             background-size: cover;">
                                    <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                        <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                            <i class="ni ni-trophy text-dark opacity-10"></i>
                                        </div>
                                        <h5 class="text-white mb-1">Memberikan kemudahan dalam mencari informasi</h5>

                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev w-5 me-3" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next w-5 me-3" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-7 mb-lg-0 mb-4">

                    <div class="card ">
                        <?php

                        include "../Controller/koneksi.php";
                        $query = "SELECT status, COUNT(*) as jumlah FROM orders GROUP BY status";
                        $result = $koneksi->query($query);

                        $status_counts = array(
                            'Diproses' => 0,
                            'Dalam Pengiriman' => 0,
                            'Telah Diterima' => 0,
                            'Dibatalkan' => 0
                        );

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $status_counts[$row['status']] = $row['jumlah'];
                            }
                        }
                        $status_icons = array(
                            'Diproses' => 'fas fa-check-circle text-primary',
                            'Dalam Pengiriman' => 'fas fa-truck text-warning',
                            'Telah Diterima' => 'fas fa-check-circle text-success',
                            'Dibatalkan' => 'fas fa-times-circle text-danger'
                        );


                        $koneksi->close();
                        ?>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center ">
                                    <tbody>
                                        <tr>
                                            <th>
                                                <h6 class="mb-2">Status Pengiriman</h6>
                                            </th>
                                            <th>
                                                <h6 class="mb-2">Jumlah
                                            </th>
                                        </tr>
                                        <tr>
                                            <td><i class="<?php echo $status_icons['Diproses']; ?>"></i> Diproses</td>
                                            <td>
                                                <?php echo $status_counts['Diproses']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="<?php echo $status_icons['Dalam Pengiriman']; ?>"></i> Dalam
                                                Pengiriman
                                            </td>
                                            <td>
                                                <?php echo $status_counts['Dalam Pengiriman']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="<?php echo $status_icons['Telah Diterima']; ?>"></i> Telah
                                                Diterima
                                            </td>
                                            <td>
                                                <?php echo $status_counts['Telah Diterima']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="<?php echo $status_icons['Dibatalkan']; ?>"></i> Dibatalkan
                                            </td>
                                            <td>
                                                <?php echo $status_counts['Dibatalkan']; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Suppliers</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center ">
                                    <tbody>
                                        <tr>
                                            <th>Nama Supplier</th>
                                            <th>Jumlah tipe Produk</th>
                                        </tr>
                                        <?php
                                        include "../Controller/koneksi.php";
                                        $sql = "SELECT s.nama_suppliers, COUNT(p.spp_id) AS jumlah_produk
                                FROM suppliers s
                                LEFT JOIN product p ON s.spp_id = p.spp_id
                                GROUP BY s.spp_id, s.nama_suppliers";
                                        $result = $koneksi->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $namaSupplier = $row["nama_suppliers"];
                                                $jumlahProduk = $row["jumlah_produk"];
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $namaSupplier; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $jumlahProduk; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo '<tr><td colspan="2">Tidak ada data supplier.</td></tr>';
                                        }

                                        $koneksi->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </main>



    <script>
        $(document).ready(function () {
            //chart circle
            var dataTglPesan = <?php echo json_encode($tgl_pesan); ?>;
            var dataHargaTotal = <?php echo json_encode($harga_total); ?>;


            var totalPendapatanPerTahun = {};
            for (var i = 0; i < dataTglPesan.length; i++) {
                var tahun = new Date(dataTglPesan[i]).getFullYear();
                if (!totalPendapatanPerTahun[tahun]) {
                    totalPendapatanPerTahun[tahun] = 0;
                }
                totalPendapatanPerTahun[tahun] += dataHargaTotal[i];
            }

            var tahunLabels = Object.keys(totalPendapatanPerTahun);
            var pendapatanData = Object.values(totalPendapatanPerTahun);

            var revenueChart = new Chart(document.getElementById('revenueChart'), {
                type: 'pie',
                data: {
                    labels: tahunLabels,
                    datasets: [{
                        data: pendapatanData,
                        backgroundColor: [
                            '#FF6384',
                            '#36A2EB',
                            '#FFCE56',
                        ],
                    }],
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                var dataset = data.datasets[tooltipItem.datasetIndex];
                                var totalRevenue = dataset.data.reduce(function (total, currentValue) {
                                    return total + currentValue;
                                });
                                var currentValue = dataset.data[tooltipItem.index];
                                var percentage = parseFloat((currentValue / totalRevenue * 100).toFixed(1));
                                return ' Total Pendapatan: Rp ' + totalRevenue + ' (' + percentage + '%)';
                            }
                        }
                    }
                },
            });
        });
    </script>


</body>

</html>