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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selva House</title>
    <link rel="shortcut icon" href="../assets/img2/selvahouse.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
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
    <div class="container-fluid py-4">
        <div class="card mb-4 card-with-margin">
            <div class="card-body ">
                <div class="table-responsive">
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>No Hp</th>
                                <th>alamat</th>
                                <th>Peran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../Controller/koneksi.php';
                            $customers = mysqli_query($koneksi, "select * from customers");
                            while ($row = mysqli_fetch_array($customers)) {
                                echo "<tr>
            <td>" . $row['nama'] . "</td>
            <td>" . $row['username'] . "</td>
            <td>" . $row['no_hp'] . "</td>
            <td>" . $row['alamat'] . "</td>
            <td>" . $row['peran'] . "</td>
            <td>  <button type='button' class='btn btn-primary' onclick='openUpdatePeranModal(\"" . $row['nama'] . "\", \"" . $row['peran'] . "\")'>Update</button>
                <a href='../Controller/userDB.php?action=delete&id=" . $row['cust_id'] . "' class='btn btn-danger'>Delete</a>
            </td>
            </tr>";
                            }
                            ?>
                        <tbody>
                    </table>
                    <div class="modal fade" id="updatePeranModal" tabindex="-1" aria-labelledby="updatePeranModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updatePeranModalLabel">Update Peran Customer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                               
                                    <form id="formUpdatePeran" action="../Controller/userDB.php" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="update_Nama_Customer" class="form-label">Nama Customer</label>
                                            <input type="text" class="form-control" id="update_Nama_Customer"
                                                name="update_Nama_Customer" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="update_peran" class="form-label">Peran</label>
                                            <select class="form-select" id="update_peran" name="update_peran" required>
                                                <option value="reguler">reguler</option>
                                                <option value="reseller">reseller</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="action" value="update">
                                        <button type="submit" class="btn btn-primary">Update Peran</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
</body>
<script>
    $('#example').DataTable();

    
    function openUpdatePeranModal(nama, peran) {
        $('#update_Nama_Customer').val(nama);
        $('#update_peran').val(peran);
        $('#updatePeranModal').modal('show');
    }
</script>

</html>