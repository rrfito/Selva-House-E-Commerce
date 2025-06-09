<?php
include "../Controller/koneksi.php";
session_start();

if (isset($_SESSION['loggedInCustId'])) {
  $loggedInCustId = $_SESSION['loggedInCustId'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_profile'])) {
    // Data submitted, process and save it to the database
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    // Use prepared statement to avoid SQL injection
    $query = "UPDATE customers SET nama=?, username=?, no_hp=?, alamat=? WHERE cust_id=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $nama, $username, $no_hp, $alamat, $loggedInCustId);

    // Execute the update query
    if (mysqli_stmt_execute($stmt)) {
      // Data successfully updated
      $response = array('status' => 'success', 'message' => 'Data saved successfully!');
    } else {
      // Error occurred during the update
      $response = array('status' => 'error', 'message' => 'Error saving data. Please try again later.');
    }

    // Close the statement
    mysqli_stmt_close($stmt);
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
  }

  // Retrieve the user data for displaying in the form
  $query = "SELECT nama, username, no_hp, alamat FROM customers WHERE cust_id = ?";
  $stmt = mysqli_prepare($koneksi, $query);
  mysqli_stmt_bind_param($stmt, "i", $loggedInCustId);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  // Pastikan ada hasil dari kueri sebelum mengambil data
  if ($result && mysqli_num_rows($result) > 0) {
    $userData = mysqli_fetch_assoc($result);
  } else {
    // Jika tidak ada hasil, ada masalah dengan cust_id yang disimpan dalam session
    // Arahkan kembali ke halaman login atau berikan pesan kesalahan
    header('Location: ../halaman/Login.php');
    exit();
  }

  // Close the statement
  mysqli_stmt_close($stmt);
} else {
  // Jika 'loggedInCustId' tidak ada dalam session, arahkan kembali ke halaman login
  header('Location: ../halaman/Login.php');
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
    Argon Dashboard 2 by Creative Tim
  </title>
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
  <!-- Add this script tag in the <head> section -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

  <style>
    body {
      margin: 0;
      padding: 0;
      background-size: cover;
      min-height: 100vh; 
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .main-content {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body class="bg-gradient-warning">

  <div class="main-content position-relative max-height-vh-100 h-100">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <!-- Form with action attribute pointing to the same PHP file -->
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <p class="text-uppercase text-sm">Informasi User</p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Nama</label>
                      <input id="namaInput" class="form-control" type="text" name="nama"
                        value="<?php echo $userData['nama']; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Username</label>
                      <input id="usernameInput" class="form-control" type="text" name="username"
                        value="<?php echo $userData['username']; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">No Hp</label>
                      <input id="noHpInput" class="form-control" type="text" name="no_hp"
                        value="<?php echo $userData['no_hp']; ?>">
                    </div>
                  </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Informasi Kontak</p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Alamat</label>
                      <input id="alamatInput" class="form-control" type="text" name="alamat"
                        value="<?php echo $userData['alamat']; ?>">
                    </div>
                  </div>
                  
                </div>
                <input type="hidden" name="save_profile" value="1">
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="../halaman_customer/index.php" class="btn btn-danger ml-2">Keluar</a>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>
  </div>
 
</body>
<script>
  // Function to show SweetAlert2 alert
  function showAlert(status, message) {
    if (status === 'success') {
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: message,
      });
    } else if (status === 'error') {
      Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: message,
      });
    }
  }

  // Function to handle form submission using AJAX
  function submitForm(event) {
    event.preventDefault();
    const form = event.target;

    fetch(form.action, {
      method: 'POST',
      body: new FormData(form),
    })
      .then((response) => response.json())
      .then((data) => {

        showAlert(data.status, data.message);
      })
      .catch((error) => {

        console.error('Error:', error);
      });
  }


  const form = document.querySelector('form');
  form.addEventListener('submit', submitForm);
</script>

</html>