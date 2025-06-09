<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anon - eCommerce Website</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/img2/selvahouse.png" type="image/x-icon">

  <!-- Custom CSS link -->
  <link rel="stylesheet" href="../assets2/css/style-prefix.css">
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

  <!-- Google Font link -->
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


  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9f9f9;
    }

    .card {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-body {
      display: flex;
    }

    .product-image {
      flex: 1;
      margin-right: 20px;

      border-radius: 10px;
      overflow: hidden;
    }

    .product-image img {
      width: 100%;
      height: auto;
      border-radius: 10px;
      overflow: hidden;
    }

    .product-details {
      flex: 1;
    }

    .product-title {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .categories {
      margin-bottom: 10px;
    }

    .product-stock {
      margin-bottom: 10px;
    }

    .product-options {
      margin-bottom: 20px;
    }

    .product-options label {
      font-weight: 600;
      margin-right: 10px;
    }

    .product-description {
      margin-bottom: 20px;
    }
  </style>
</head>

<body class="budy">
  <div class="overlay" data-overlay></div>
  <header>
    <div class="header-top">
      <div class="container">
        <ul class="header-social-container">
          <li><a href="#" class="social-link"><ion-icon name="logo-facebook"></ion-icon></a></li>
          <li><a href="#" class="social-link"><ion-icon name="logo-twitter"></ion-icon></a></li>
          <li><a href="#" class="social-link"><ion-icon name="logo-instagram"></ion-icon></a></li>
          <li><a href="#" class="social-link"><ion-icon name="logo-linkedin"></ion-icon></a></li>
        </ul>
        <div class="header-alert-news">
          <p><b>Selva House</b></p>
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
            <input type="search" name="search" class="search-field" placeholder="Enter your product name...">
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

  <div class="container">
    <?php
    include "../Controller/koneksi.php";

    if (isset($_GET['prd_id'])) {
      $product_id = $_GET['prd_id'];

      $sql_product = "SELECT p.prd_id, p.nama_barang, p.foto, p.Deskripsi_Product, p.jumlah, c.nama_kategori
      FROM product p
      JOIN categories c ON p.cat_id = c.cat_id
      WHERE p.prd_id = $product_id";
      $result_product = $koneksi->query($sql_product);
      $photoDirectory = "../assets/img/IMG";

      if ($result_product->num_rows > 0) {
        $row_product = $result_product->fetch_assoc();
        $category = $row_product['nama_kategori'];
        $productName = $row_product['nama_barang'];
        $photoFileName = $row_product['foto'];
        $productDescription = $row_product['Deskripsi_Product'];
        $productStock = $row_product['jumlah'];
        $photoURL = $photoDirectory . $photoFileName;

        // Fetch product variants
        $sql_variants = "SELECT vp.var_id, vp.price, sz.nama_ukuran, clr.warna
          FROM product_variants vp
          JOIN size sz ON vp.size_id = sz.size_id
          JOIN color clr ON vp.color_Id = clr.color_Id
          WHERE vp.prd_id = $product_id";
        $result_variants = $koneksi->query($sql_variants);

        if ($result_variants->num_rows > 0) {
          $product_variants = array();
          while ($row_variant = $result_variants->fetch_assoc()) {
            $variant_id = $row_variant['var_id'];
            $color = $row_variant['warna'];
            $size = $row_variant['nama_ukuran'];
            $variant_price = $row_variant['price'];

            $product_variants[] = array(
              'var_id' => $variant_id,
              'warna' => $color,
              'nama_ukuran' => $size,
              'price' => $variant_price,
            );
          }
        }

        // Check if the customer is logged in
        if (isset($_SESSION['loggedInCustId'])) {
          // Retrieve the customer ID from the session
          $cust_id = $_SESSION['loggedInCustId'];


          // Fetch the customer's address and phone number from the database
          $sql_customer = "SELECT alamat, no_hp FROM customers WHERE cust_id = $cust_id";
          $result_customer = $koneksi->query($sql_customer);

          if ($result_customer->num_rows > 0) {
            $row_customer = $result_customer->fetch_assoc();
            $customer_address = $row_customer['alamat'];
            $customer_phone = $row_customer['no_hp'];
          }
        }
        ?>
        <div class="card">
          <div class="card-body">
            <div class="product-image">
              <img src="<?php echo $photoURL; ?>" alt="<?php echo $productName; ?>" class="img-fluid" />
            </div>
            <div class="product-details">
              <p class="categories"><strong>Categories:</strong>
                <?php echo $category; ?>
              </p>
              <h3 class="product-title">
                <?php echo $productName; ?>
              </h3>
              <p class="product-stock">
                Terjual <b>
                  <?php

                  $sql_total_terjual = "SELECT total_terjual FROM product_sales WHERE prd_id = $product_id";
                  $result_total_terjual = $koneksi->query($sql_total_terjual);
                  if ($result_total_terjual->num_rows > 0) {
                    $row_total_terjual = $result_total_terjual->fetch_assoc();
                    $total_terjual = $row_total_terjual['total_terjual'];
                    echo $total_terjual;
                  } else {
                    echo '0'; // Default jika belum ada transaksi
                  }
                  ?>
                </b> unit | Stok <b>
                  <?php echo $productStock; ?>
                </b> unit
              </p>



              <div class="product-options">
              <form method="post" action="../Controller/OrdersDB.php" id="orderForm">
                  <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

                  <div class="form-group col-md-6" style="margin-bottom: 0px">
                    <label for="ukuran">Ukuran dan Warna</label>
                    <select class="form-control" name="ukuran" id="ukuran" required>
                      <?php foreach ($product_variants as $variant): ?>
                        <option value="<?php echo $variant['var_id']; ?>" data-price="<?php echo $variant['price']; ?>">
                          <?php echo $variant['nama_ukuran'] . ' - ' . $variant['warna']; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <p class="product-price"><strong>Harga:</strong> <span id="productPrice">
                        <?php echo number_format($product_variants[0]['price'], 0, ',', '.'); ?>
                      </span></p>
                  </div>
                  <input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>">
                  <input type="hidden" name="peran" value="<?php echo $peran; ?>">
                  <input type="hidden" id="default_price" value="<?php echo $product_variants[0]['price']; ?>">
                  <input type="hidden" name="var_id" id="selected_var_id"
                    value="<?php echo $product_variants[0]['var_id']; ?>">
                  <div class="form-group col-md-6">
                    <label for="jumlah_produk">Jumlah:</label>
                    <input type="number" class="form-control" id="jumlah_produk" name="jumlah_produk" min="1" value="1"
                      required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="jumlah_produk">Alamat Pengiriman</label>
                    <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" required
                      value="<?php echo isset($customer_address) ? htmlspecialchars($customer_address) : ''; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="jumlah_produk">No Hp</label>
                    <input type="text" class="form-control" id="no_hp_penerima" name="no_hp_penerima" required
                      value="<?php echo isset($customer_phone) ? htmlspecialchars($customer_phone) : ''; ?>">
                  </div>
                  <input type="hidden" name="action" value="orders">
                  <button type="button" class="btn btn-success" onclick="handleSubmit()"> Order</button>

                </form>
              </div>
              <div class="product-description">
                <p>
                  <?php echo $productDescription; ?>
                </p>
              </div>
            </div>

          </div>
        </div>
        <?php
      } else {
        echo "Tidak ada data produk yang ditemukan.";
      }
    } else {
      echo "Produk tidak ditemukan. Mohon kembali ke halaman sebelumnya.";
    }
    ?>
    <div class="product-box">
      <div class="product-main">
        <h2 class="title"><br>Related Product<br></h2>
        <div class="product-grid">
          <?php
          $sql_relate = "SELECT vp.var_id,p.prd_id ,p.nama_barang, p.kode, p.jumlah, p.Deskripsi_Product, p.foto, c.nama_kategori, s.nama_suppliers, sz.nama_ukuran, clr.warna, vp.price
              FROM product_variants vp
              JOIN product p ON vp.prd_id = p.prd_id
              JOIN categories c ON p.cat_id = c.cat_id
              JOIN suppliers s ON p.spp_id = s.spp_id
              JOIN size sz ON vp.size_id = sz.size_id
              JOIN color clr ON vp.color_Id = clr.color_Id
              WHERE c.nama_kategori = '$category' AND p.prd_id != $product_id
              group by nama_barang
              ORDER BY p.nama_barang, vp.var_id";
          $result_relate = $koneksi->query($sql_relate);

          if ($result_relate->num_rows > 0) {
            while ($row_relate = $result_relate->fetch_assoc()) {
              //link ke halaman sama
              $related_product_id = $row_relate['prd_id'];
              $related_product_link = "Deskripsi.php?prd_id=" . $related_product_id;

              $productName_relate = $row_relate['nama_barang'];
              $price_relate = $row_relate['price'];
              $photoFileName_relate = $row_relate['foto'];

              $photoURL_relate = $photoDirectory . $photoFileName_relate;

              ?>
              <div class="showcase">
                <div class="showcase-banner">
                  <img src="<?php echo $photoURL_relate; ?>" alt="<?php echo $productName_relate; ?>"
                    class="product-img default" width="300">
                  <img src="<?php echo $photoURL_relate; ?>" alt="<?php echo $productName_relate; ?>"
                    class="product-img hover" width="300">
                  <?php
                  //  diskon
                  ?>
                </div>
                <div class="showcase-content">
                 <a href="<?php echo $related_product_link; ?>" class="showcase-category">
                    <?php echo $productName_relate; ?>
                  </a>
                  <h3><a href="<?php echo $related_product_link; ?>" class="showcase-title">
                      <?php echo $category; ?>
                    </a></h3>
                  <div class="showcase-rating">
                  </div>
                  <div class="price-box">
                    <p class="price">Rp
                      <?php echo number_format($price_relate, 0, ',', '.'); ?>
                    </p>
                  </div>
                </div>
              </div>
              <?php
            }
          } else {
            echo "Tidak ada produk terkait dalam kategori yang sama.";
          }
          ?>
        </div>
      </div>
    </div>
  </div>


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
                  <ion-icon name="logo-facebook"></ion-icon>
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

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const ukuranSelect = document.getElementById("ukuran");
      const productPriceSpan = document.getElementById("productPrice");

      ukuranSelect.addEventListener("change", function () {
        const selectedOption = ukuranSelect.options[ukuranSelect.selectedIndex];
        const variantPrice = selectedOption.getAttribute("data-price");

        productPriceSpan.textContent = "Rp " + Number(variantPrice).toLocaleString();
      });
    });
    window.onload = function () {
      // Tampilkan popup (modal) pesan sukses
      var modal = document.getElementById("successModal");
      modal.style.display = "block";
    };

    function closeModal() {
      // Tutup popup (modal) pesan sukses
      var modal = document.getElementById("successModal");
      modal.style.display = "none";
    }
    const loggedInCustId = <?php echo isset($_SESSION['loggedInCustId']) ? $_SESSION['loggedInCustId'] : 'null'; ?>;

  // Function to show the login alert
  function showLoginAlert() {
    alert('Please log in to place an order.');
  }

  // Function to handle form submission
  function handleSubmit() {
    if (loggedInCustId) {
      // User is logged in, submit the form
      document.getElementById('orderForm').submit();
    } else {
      // User is not logged in, show the login alert
      showLoginAlert();
    }
  }
  </script>

  <script src="../assets2/js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>