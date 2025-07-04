<?php
session_start();


if (isset($_SESSION['notification'])) {
    echo '<div class="alert alert-success bg-gradient-warning  ">' . $_SESSION['notification'] . '</div>';
    
    unset($_SESSION['notification']);
}
if (isset($_GET['error']) && $_GET['error'] == 1) {
  $errorMessage = isset($_GET['message']) ? urldecode($_GET['message']) : "Login failed.";
  echo '<div class="alert alert-danger" role="alert">' . $errorMessage . '</div>';
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
</head>

<body class="">
    <main class="main-content  mt-0">
      <section>
        <div class="page-header min-vh-100">
          <div class="container">
            <div class="row">
              <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                <div class="card card-plain">
                  <div class="card-header pb-0 text-start">
                    <h4 class="font-weight-bolder">Sign In</h4>
                    <p class="mb-0">Enter your username and password to sign in</p>
                  </div>
                  <div class="card-body">
                    <!-- Mengarahkan form ke halaman login.php -->
                    <form action="../Controller/LoginProses.php" method="post">
                      <div class="mb-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="username" name="username" required>
                      </div>
                      <div class="mb-3">
                        <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" name="password" required>
                      </div>
                      <div class="text-center">
                        <!-- Mengubah type tombol menjadi "submit" -->
                        <button type="submit" class="btn btn-lg bg-gradient-warning btn-lg w-100 mt-4 mb-0">Sign in</button>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                      Don't have an account?
                      <a href="../halaman/signUp.php" class="text-dark font-weight-bolder">Sign up</a>
                    </p>
                  </div>
                </div>
              </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-warning h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('../assets/img2/a.jpg');
          background-size: cover;">
                
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>