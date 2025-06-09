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
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
 
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
   
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
   

    <style>
        .google-maps iframe {
            width: 100%;
            height: 300px;
            border: 0;
        }
    </style>

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

    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>About Us</h1>
                    <p>Kami, SelvaHouse, menyambut Anda dengan tangan terbuka ke dalam dunia fashion muslim yang penuh inspirasi. Sebagai destinasi utama untuk pakaian muslim dari anak-anak hingga dewasa, kami bangga menghadirkan koleksi yang menggabungkan kesopanan dan gaya dalam setiap jahitan.</p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-item d-flex align-items-center">
                                <ion-icon name="call-outline" class="me-2"></ion-icon>
                                <p>Customer Service: <a href="tel:088708017121">088708017121</a></p>
                            </div>
                            <div class="contact-item d-flex align-items-center">
                                <ion-icon name="mail-outline" class="me-2"></ion-icon>
                                <p>Email: <a href="mailto:info@selvahouse.com">SelvaHouse@Gmail.com</a></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-item d-flex align-items-center">
                                <ion-icon name="location-outline" class="me-2"></ion-icon>
                                <p>Jl. Umbansari No. 27C, Rumbai, Pekanbaru</p>
                            </div>
                            <div class="contact-item d-flex align-items-center">
                                <ion-icon name="time-outline" class="me-2"></ion-icon>
                                <p>Waktu Operasional: Senin - Sabtu, <br>9 AM - 6 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="google-maps">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.7195080523886!2d101.4375978145188!3d0.5086951646729047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3040db30b80a3371%3A0xe4b26940fb1b542e!2sJl.%20Umbansari%20No.%2027C%2C%20Rumbai%2C%20Pekanbaru%2C%20Riau!5e0!3m2!1sen!2sid!4v1660123456789!5m2!1sen!2sid"
                            frameborder="0" allowfullscreen="" loading="lazy"></iframe>
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
                    include "../Controller/koneksi.php";
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