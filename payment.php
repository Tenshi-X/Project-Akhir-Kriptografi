<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login-form.php");
}
$username = $_SESSION['username'];
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="CSS_files/payment.css">
  <script src="JS_files/payment.js"></script>
</head>

<body>
  <!--header part start-->
  <div class="container-fluid text-white" id="change-color">
    <div class="row" id="top-containt">
      <div class="col-3 text-center">
        <div height="130px" style="margin-top: 30px; color:black; font-weight:700">
          Hai, <?= $username ?>
        </div>
      </div>
      <div class="col-5 pt-4 mt-1 text-center">
        <span class="menu"><a href="event_page.php" class="color">Event</a></span>
        <span class="menu"><a href="payment.php" class="color">My Ticket</a></span>
        <span class="menu-bar text-right"><a href="#/" class="color">&#9776;</a></span>
        <span class="menu-bar-1 text-right"><a href="#/" class="color">&#9776;</a></span>
        <span class="menu-bar-2 text-right"><a href="#/" class="color">&#9776;</a></span>
      </div>
      <div class="col-4 pt-4 mt-1 d-flex justify-content-around">
        <a href="logout.php">
          <button type="button" class="btn-outline-danger">
            Logout
          </button>
        </a>
      </div>
    </div>
  </div>
  <!--header part end-->
  <div class="container mt-3 mb-3">
    <?php
    include('connect.php');

    $username = $_SESSION['username'];
    $id_user = "SELECT id_user FROM `user` WHERE username = '$username'";
    $query_user    = mysqli_query($koneksi, $id_user)->fetch_assoc()['id_user'];
    $sql    = "SELECT * FROM `tiket` WHERE id_user = '$query_user'";
    $query    = mysqli_query($koneksi, $sql);
    while ($hasil = mysqli_fetch_array($query)) {
    ?>

      <div class="row pt-5">
        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
          <div id="accordion">
            <div class="card">
              <div class="card-header">
                <div class="row pt-3">
                  <div class="col-4 text-center">
                    <span style="padding:2% 8%;border:1px solid transparent;background-color: rgb(197, 191, 191);"><?= $decryptedCode = decrypt($hasil['kode_tiket']); ?></span>
                  </div>
                  <?php
                  $id_acara = $hasil['id_acara'];
                  $sql_acara    = "SELECT * FROM `acara` WHERE id_acara = '$id_acara'";
                  $query_acara    = mysqli_query($koneksi, $sql_acara)->fetch_assoc()['nama'];
                  ?>
                  <div class="col-6">
                    <span style="font-size:20px;font-weight:600;color:black;text-transform: uppercase;"><?= $query_acara?></span>
                    <p>Rp<?= $hasil['total_harga'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  </div>
  </div>
  </div>

  </div>
  <!--footer-->
  <div class="container-fluid bg-dark text-white">
    <div class="container">
      <div class="row ">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 footer pt-5">
          <p style="font-size:20px;text-transform: uppercase;font-weight: 500;" data-aos="slide-right">Kritografi Semester 5 2023</p>
        </div>
      </div>
    </div>
  </div>
  <!--footer-->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
      duration: 1000,
    });
  </script>
</body>

</html>
<?php
function encrypt($data)
{
  $key = "coba";
  $ivlen = openssl_cipher_iv_length($cipher = "AES-256-CBC");
  $iv = openssl_random_pseudo_bytes($ivlen);
  $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
  return base64_encode($encrypted . '::' . $iv);
}
function decrypt($data)
{
  $key = "coba";
  list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
  return openssl_decrypt($encrypted_data, 'AES-256-CBC', $key, 0, $iv);
}
