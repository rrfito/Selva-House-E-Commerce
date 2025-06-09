
<?php
// 1. Mengambil input pencarian dari form
$searchKeyword = $_GET['search'];

// 2. Melakukan koneksi ke database (contoh: menggunakan koneksi.php yang sudah ada)
include "../Controller/koneksi.php";
$photoDirectory = "../assets/img/IMG";

// 3. Lakukan query pencarian ke database
$sql = "SELECT vp.var_id,p.prd_id ,p.nama_barang, p.kode, p.jumlah, p.foto, c.nama_kategori, s.nama_suppliers, sz.nama_ukuran, clr.warna, vp.price
FROM product_variants vp
JOIN product p ON vp.prd_id = p.prd_id
JOIN categories c ON p.cat_id = c.cat_id
JOIN suppliers s ON p.spp_id = s.spp_id
JOIN size sz ON vp.size_id = sz.size_id
JOIN color clr ON vp.color_Id = clr.color_Id
        WHERE nama_barang LIKE '%$searchKeyword%'
        group by nama_barang;";

// Menjalankan query
$result = $koneksi->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Selva House</title>

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
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
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
    <div class="product-container">
        <div class="container">
            <div class="product-box">
                <h2 class="title">Search Results for "<?php echo $searchKeyword; ?>"</h2>
                <div class="product-grid">
                    <?php
                    // Tampilkan hasil pencarian
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
                              
                                    <img src="<?php echo $photoURL; ?>" alt="<?php echo $productName; ?>" width="300">
                                   
                                 
                                   
                                </div>
                                <div class="showcase-content">
                                  
                                <a href="Deskripsi.php?prd_id=<?php echo $product_id; ?>" class="showcase-category"><?php echo $category; ?></a>
                                
                                    <h3> <a href="Deskripsi.php?prd_id=<?php echo $product_id; ?>" class="showcase-title"><?php echo $productName; ?></a></h3>
                                 
                                    <div class="showcase-rating">
                                      
                                    </div>
                                  
                                    <div class="price-box">
                                        <p class="price">Rp <?php echo number_format($price, 0, ',', '.'); ?></p>
                                        <!-- Kode untuk menampilkan harga asli dan diskon jika ada -->
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                   
                        ?>
                        <p>No products found for "<?php echo $searchKeyword; ?>"</p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
    </div>
</main>
</body>

</html>
<script src="../assets2/js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

