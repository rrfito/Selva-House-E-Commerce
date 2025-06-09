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
                                    <th>Warna</th>
                                    <th>Ukuran</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../Controller/koneksi.php';
                                $produk_variants = mysqli_query($koneksi, "SELECT *
                                FROM product_variants vp
                                JOIN product p ON vp.prd_id = p.prd_id
                                JOIN categories c ON p.cat_id = c.cat_id
                                JOIN suppliers s ON p.spp_id = s.spp_id
                                JOIN size sz ON vp.size_id = sz.size_id
                                JOIN color clr ON vp.color_Id = clr.color_Id;");

                                while ($row = mysqli_fetch_array($produk_variants)) {
                                    echo "<tr>
                                                <td>" . $row['var_id'] . "</td>
                                                <td>" . $row['nama_kategori'] . "</td>
                                                <td>" . $row['nama_suppliers'] . "</td>
                                                <td>" . $row['nama_barang'] . "</td>
                                                <td>" . $row['kode'] . "</td>
                                                <td>" . $row['warna'] . "</td>
                                                <td>" . $row['nama_ukuran'] . "</td>
                                                <td>" . $row['jumlah'] . "</td>
                                                <td>" . 'Rp. ' . $row['price'] . "</td>
                                                <td><img src='../assets/img/IMG" . $row['foto'] . "' width='60' height='70' /></td>
                                                <td>
                                                <button type='button' class='btn btn-primary' onclick='openUpdateVariantModal(" . $row['var_id'] . ", \"" . $row['nama_ukuran'] . "\", \"" . $row['warna'] . "\", " . $row['price'] . ")'>Update</button>
                                                <a href='../Controller/ProductDB.php?action=delete&id=" . $row['var_id'] . "' class='btn btn-danger'>Delete</a>
                                                </td>
                                            </tr>";
                                }


                                ?>
                            </tbody>

                        </table>
                       
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#tambahVariantModal">
                            Tambah variant produk
                        </button>
                        <a href="../halaman/barangSub.php" class="btn btn-success">
                            Barang
                        </a>

                        <!-- Modal tambah variant produk -->
                        <div class="modal fade" id="tambahVariantModal" tabindex="-1"
                            aria-labelledby="tambahVariantModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahVariantModalLabel">Tambah Variant Produk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formTambahVariantData" action="../Controller/ProductDB.php"
                                            method="POST">
                                            <div class="mb-3">
                                                <label for="tambah_variant_produk" class="form-label">Produk</label>
                                                <select class="form-select" id="tambah_variant_produk"
                                                    name="tambah_variant_produk" required>
                                                    <option value="" disabled selected>Pilih Produk</option>
                                                    <?php
                                                    $produk_query = mysqli_query($koneksi, "SELECT prd_id, nama_barang FROM product");
                                                    while ($row_produk = mysqli_fetch_array($produk_query)) {
                                                        echo "<option value='" . $row_produk['prd_id'] . "'>" . $row_produk['prd_id'] . " - " . $row_produk['nama_barang'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tambah_variant_size" class="form-label">Ukuran</label>
                                                <select class="form-select" id="tambah_variant_size"
                                                    name="tambah_variant_size" required>
                                                    <option value="" disabled selected>Pilih Ukuran</option>
                                                    <?php
                                                    $ukuran_query = mysqli_query($koneksi, "SELECT * FROM size");
                                                    while ($row_ukuran = mysqli_fetch_array($ukuran_query)) {
                                                        echo "<option value='" . $row_ukuran['size_id'] . "'>" . $row_ukuran['nama_ukuran'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tambah_variant_color" class="form-label">Warna</label>
                                                <select class="form-select" id="tambah_variant_color"
                                                    name="tambah_variant_color" required>
                                                    <option value="" disabled selected>Pilih Warna</option>
                                                    <?php
                                                    $warna_query = mysqli_query($koneksi, "SELECT * FROM color");
                                                    while ($row_warna = mysqli_fetch_array($warna_query)) {
                                                        echo "<option value='" . $row_warna['color_Id'] . "'>" . $row_warna['warna'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tambah_variant_harga" class="form-label">Harga</label>
                                                <input type="number" class="form-control" id="tambah_variant_harga"
                                                    name="tambah_variant_harga" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" name="action" value="Variant">
                                                <button type="submit" class="btn btn-primary">Tambah Variant</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal fade" id="updateVariantModal" tabindex="-1"
                            aria-labelledby="updateVariantModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateVariantModalLabel">Update Product Variant</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formUpdateVariantData" action="../Controller/ProductDB.php"
                                            method="POST">

                                            <div class="mb-3">
                                                <label for="update_variant_size" class="form-label">Size</label>
                                                <select class="form-select" id="update_variant_size"
                                                    name="update_variant_size" required>

                                                    <?php
                                                    $ukuran_query = mysqli_query($koneksi, "SELECT * FROM size");
                                                    while ($row_ukuran = mysqli_fetch_array($ukuran_query)) {
                                                        echo "<option value='" . $row_ukuran['size_id'] . "'>" . $row_ukuran['nama_ukuran'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="update_variant_color" class="form-label">Color</label>
                                                <select class="form-select" id="update_variant_color"
                                                    name="update_variant_color" required>
                                                    <?php
                                                    $warna_query = mysqli_query($koneksi, "SELECT * FROM color");
                                                    while ($row_warna = mysqli_fetch_array($warna_query)) {
                                                        echo "<option value='" . $row_warna['color_Id'] . "'>" . $row_warna['warna'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="update_variant_harga" class="form-label">Harga</label>
                                                <input type="number" class="form-control" id="update_variant_harga"
                                                    name="update_variant_harga" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" id="update_variant_id" name="update_variant_id">
                                                <input type="hidden" name="action" value="update_variant">
                                                <button type="submit" class="btn btn-primary">Update Variant</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#example').DataTable();

            function openUpdateVariantModal(var_id, size, color, harga) {
                // Set the modal title
                $("#updateVariantModalLabel").text("Update Product Variant");

                // Set the modal body content
                $("#update_variant_id").val(var_id);
                $("#update_variant_size").val(size);
                $("#update_variant_color").val(color);
                $("#update_variant_harga").val(harga);

                // Show the modal
                $("#updateVariantModal").modal("show");
            }



            function openDeleteModal(var_id) {
                if (confirm("Are you sure you want to delete this product?")) {
                    $.ajax({
                        type: "POST",
                        url: "../Controller/ProductDB.php",
                        data: {
                            action: "delete_variant",
                            delete_variant_id: var_id
                        },
                        success: function (response) {
                            alert(response); // Menampilkan pesan berhasil atau pesan kesalahan
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