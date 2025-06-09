
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SelvaHouse</title>

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

  <main>


    <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

          <div class="slider-item">

            <img src="../assets/img2/33.png" class="banner-img" style="object-fit: cover;">

          </div>

          <div class="slider-item">

            <img src="../assets/img2/22.png" alt="modern sunglasses" class="banner-img" style="object-fit: cover;">

          </div>

          <div class="slider-item">

            <img src="../assets/img2/11.png" alt="new fashion summer sale" class="banner-img"
              style="object-fit: cover;">

          </div>

        </div>

      </div>

    </div>


    <div class="product-container">

      <div class="container">

        <div class="sidebar has-scrollbar" data-mobile-menu>
          <div class="sidebar-category">
            <div class="sidebar-top">
              <h2 class="sidebar-title">Category</h2>
              <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
              </button>
            </div>
            <ul class="sidebar-menu-category-list">
              <?php
              include "../Controller/koneksi.php";

              $query = 'SELECT * FROM categories';
              $result = mysqli_query($koneksi, $query);


              while ($row = mysqli_fetch_assoc($result)) {
                $item = $row['nama_kategori'];

                ?>
                <li class="sidebar-menu-category">
                  <a href="index.php?category=<?php echo $row['cat_id']; ?>" class="sidebar-accordion-menu"
                    data-accordion-btn>
                    <div class="menu-title-flex">
                      <img src="../assets2/images/icons/<?php echo strtolower($item); ?>.png" alt="<?php echo $item; ?>"
                        width="20" height="20" class="menu-title-img">
                      <p class="menu-title">
                        <?php echo $item; ?>
                      </p>
                    </div>
                  </a>
                </li>
                <?php
              }

              mysqli_close($koneksi);
              ?>
            </ul>
          </div>
        </div>



        <div class="product-box">

          <div class="product-main">

            <h2 class="title">New Products</h2>

            <div class="product-grid">

              <?php
              include "../Controller/koneksi.php";
              $photoDirectory = "../assets/img/IMG";
              if (isset($_GET['category']) && is_numeric($_GET['category'])) {
                $selectedCategory = $_GET['category'];
                $sql = "SELECT * FROM product_variants vp
                  JOIN product p ON vp.prd_id = p.prd_id
                  JOIN categories c ON p.cat_id = c.cat_id
                  JOIN suppliers s ON p.spp_id = s.spp_id
                  JOIN size sz ON vp.size_id = sz.size_id
                  JOIN color clr ON vp.color_Id = clr.color_Id
                  WHERE p.cat_id = $selectedCategory
                  GROUP BY nama_barang;";
              } else {
                // If no specific category is selected, show all products
                $sql = "SELECT * FROM product_variants vp
                  JOIN product p ON vp.prd_id = p.prd_id
                  JOIN categories c ON p.cat_id = c.cat_id
                  JOIN suppliers s ON p.spp_id = s.spp_id
                  JOIN size sz ON vp.size_id = sz.size_id
                  JOIN color clr ON vp.color_Id = clr.color_Id
                  GROUP BY vp.prd_id;";
              }



              $result = $koneksi->query($sql);

              if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                  $category = $row['nama_kategori'];
                  $productName = $row['nama_barang'];
                  $price = $row['price'];
                  $photoFileName = $row['foto'];
                  $product_id = $row['prd_id'];

                  $photoURL = $photoDirectory . $photoFileName;

                  ?>

                  <div class="showcase">
                    <div class="showcase-banner">

                      <img src="<?php echo $photoURL; ?>" alt="<?php echo $productName; ?>" class="product-img default"
                        width="300">
                      <img src="<?php echo $photoURL; ?>" alt="<?php echo $productName; ?>" class="product-img hover"
                        width="300">

                      <?php
                      // Kode untuk menampilkan badge sesuai kondisi, misalnya badge "sale" jika ada diskon
                      ?>
                    </div>
                    <div class="showcase-content">

                      <?php

                      ?>
                      <a href="Deskripsi.php?prd_id=<?php echo $product_id; ?>" class="showcase-category">
                        <?php echo $productName; ?>
                      </a>

                      <h3><a href="Deskripsi.php?prd_id=<?php echo $product_id; ?>" class="showcase-title">
                          <?php echo $category; ?>
                        </a></h3>

                      <div class="showcase-rating">

                      </div>

                      <div class="price-box">
                        <p class="price">Rp
                          <?php echo number_format($price, 0, ',', '.'); ?>
                        </p>

                      </div>
                    </div>
                  </div>
                  <?php
                }
              } else {
                echo "Tidak ada data produk yang ditemukan.";
              }
              ?>
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
  <script src="../assets2/js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>