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
            <a href="../halaman_customer/index.php" target="_blank"
                class="btn btn-dark bg-gradient-warning btn-sm w-100 mb-3">Website</a>
            <a class="btn btn-primary bg-gradient-info btn-sm mb-0 w-100" href="../halaman/Login.php" type="button">Log
                Out</a>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="card mb-4 card-with-margin">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Produk ID</th>
                                    <th>Nama Kategori</th>
                                    <th>Nama Supplier</th>
                                    <th>Nama Barang</th>
                                    <th>Kode</th>
                                    <th>Jumlah</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../Controller/koneksi.php';
                                $products = mysqli_query($koneksi, "SELECT *
                                FROM product p
                                JOIN categories c ON p.cat_id = c.cat_id
                                JOIN suppliers s ON p.spp_id = s.spp_id;");

                                while ($row = mysqli_fetch_array($products)) {
                                    echo "<tr>
                                    <td>" . $row['prd_id'] . "</td>
                                    <td>" . $row['nama_kategori'] . "</td>
                                    <td>" . $row['nama_suppliers'] . "</td>
                                    <td>" . $row['nama_barang'] . "</td>
                                    <td>" . $row['kode'] . "</td>
                                    <td>" . $row['jumlah'] . "</td>
                                   
                                
                                    <td><img src='../assets/img/IMG" . $row['foto'] . "' width='60' height='70' /></td>
                                    <td>
                                    <button type='button' class='btn btn-primary' onclick='openUpdateProductModal(" . $row['prd_id'] . ", \"" . $row['nama_kategori'] . "\", \"" . $row['nama_suppliers'] . "\", \"" . $row['nama_barang'] . "\", \"" . $row['kode'] . "\", " . $row['jumlah'] . ", \"" . $row['Deskripsi_Product'] . "\", \"" . $row['foto'] . "\")'>Update</button>

                                  <button type='button' class='btn btn-danger' onclick='openDeleteModal(" . $row['prd_id'] . ")'>Delete</button>


                                    </td>
                                    </td>
                                </tr>";
                                }
                                ?>
                            </tbody>

                        </table>

                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addProductModal">
                        Tambah Data
                    </button>
                    <!-- Modal for Update Product -->
                    <div class="modal fade" id="updateProductModal" tabindex="-1"
                        aria-labelledby="updateProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateProductModalLabel">Update Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="updateProductForm" method="post" action="../Controller/ProductDBB.php"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="updateProductId" id="updateProductId">
                                        <div class="mb-3">
                                            <label for="updateProductCategory" class="form-label">Kategori</label>
                                            <select class="form-control" id="addProductCategory"
                                                name="updateProductCategory">
                                                <?php
                                                // Ambil data kategori dari database
                                                $queryCategories = "SELECT * FROM categories";
                                                $resultCategories = mysqli_query($koneksi, $queryCategories);

                                                while ($row = mysqli_fetch_assoc($resultCategories)) {
                                                    echo '<option value="' . $row['cat_id'] . '">' . $row['nama_kategori'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateProductSupplier" class="form-label">Supplier</label>
                                            <select class="form-control" id="addProductSupplier"
                                                name="updateProductSupplier">
                                                <?php
                                                // Ambil data pemasok (supplier) dari database
                                                $querySuppliers = "SELECT * FROM suppliers";
                                                $resultSuppliers = mysqli_query($koneksi, $querySuppliers);

                                                while ($row = mysqli_fetch_assoc($resultSuppliers)) {
                                                    echo '<option value="' . $row['spp_id'] . '">' . $row['nama_suppliers'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateProductName" class="form-label">Nama Produk</label>
                                            <input type="text" class="form-control" id="updateProductName"
                                                name="updateProductName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateProductCode" class="form-label">Kode</label>
                                            <input type="text" class="form-control" id="updateProductCode"
                                                name="updateProductCode">
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateProductJumlah" class="form-label">Jumlah</label>
                                            <input type="number" class="form-control" id="updateProductJumlah"
                                                name="updateProductJumlah">
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateProductDescription" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="updateProductDescription"
                                                name="updateProductDescription" rows="3"></textarea>
                                        </div>

                                        <input type="hidden" name="action" value="update_product">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Add Product -->
                    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addProductForm" method="post" action="../Controller/ProductDBB.php"
                                        enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="addProductCategory" class="form-label">Kategori</label>
                                            <select class="form-control" id="addProductCategory"
                                                name="addProductCategory">
                                                <?php
                                                // Ambil data kategori dari database
                                                $queryCategories = "SELECT * FROM categories";
                                                $resultCategories = mysqli_query($koneksi, $queryCategories);

                                                while ($row = mysqli_fetch_assoc($resultCategories)) {
                                                    echo '<option value="' . $row['cat_id'] . '">' . $row['nama_kategori'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addProductSupplier" class="form-label">Supplier</label>
                                            <select class="form-control" id="addProductSupplier"
                                                name="addProductSupplier">
                                                <?php
                                                // Ambil data pemasok (supplier) dari database
                                                $querySuppliers = "SELECT * FROM suppliers";
                                                $resultSuppliers = mysqli_query($koneksi, $querySuppliers);

                                                while ($row = mysqli_fetch_assoc($resultSuppliers)) {
                                                    echo '<option value="' . $row['spp_id'] . '">' . $row['nama_suppliers'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addProductName" class="form-label">Nama Produk</label>
                                            <input type="text" class="form-control" id="addProductName"
                                                name="addProductName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addProductCode" class="form-label">Kode</label>
                                            <input type="text" class="form-control" id="addProductCode"
                                                name="addProductCode">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addProductJumlah" class="form-label">Jumlah</label>
                                            <input type="number" class="form-control" id="addProductJumlah"
                                                name="addProductJumlah">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addProductDescription" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="addProductDescription"
                                                name="addProductDescription" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addProductImage" class="form-label">foto</label>
                                            <input type="file" class="form-control" id="addProductImage"
                                                name="addProductImage" required>
                                        </div>
                                        <input type="hidden" name="action" value="add_product">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <script>
            $('#example').DataTable();


            function openUpdateProductModal(prd_id, nama_kategori, nama_suppliers, nama_barang, kode, jumlah, Deskripsi_Product, foto) {
                $("#updateProductId").val(prd_id);
                $("#updateProductCategory").val(nama_kategori);
                $("#updateProductSupplier").val(nama_suppliers);
                $("#updateProductName").val(nama_barang);
                $("#updateProductCode").val(kode);
                $("#updateProductJumlah").val(jumlah);
                $("#updateProductDescription").val(Deskripsi_Product);

                $("#updateProductModal").modal("show");
            }



            function openDeleteModal(prd_id) {
                if (confirm("Are you sure you want to delete this product?")) {
                    $.ajax({
                        type: "POST",
                        url: "../Controller/ProductDBB.php",
                        data: {
                            action: "delete_product",
                            id: prd_id
                        },
                        success: function (response) {

                            window.location.reload();
                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            }

        </script>

</body>

</html>