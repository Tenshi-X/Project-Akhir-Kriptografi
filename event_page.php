<?php
include 'connect.php';
session_start();
// semisal belum login, langsung masuk ke index.php
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
  <link rel="stylesheet" href="CSS_files/ecommerce-price-men.css">
  <script src="JS_files/ecommerce-price-men.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
  <link rel="stylesheet" type="text/css" href="Plugins/slick-master/slick/slick-theme1.css" />
  <script type="text/javascript" src="Plugins/slick-master/slick/slick.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css" />
  <style>
    a {
      color: black
    }

    a:hover {
      color: black
    }
  </style>
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
  <div class="container-fluid mt-5 pt-5">
    <div class="row flex justify-content-center">
      <?php
      include('connect.php');

      $sql    = "SELECT * FROM `acara`";
      $query    = mysqli_query($koneksi, $sql);
      while ($data = mysqli_fetch_array($query)) {
      ?>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 pl-0 ">
          <div class="container large-right-sider">
            <div class="row hide-front-page d-flex justify-content-center">
              <div class="col d-flex flex-column justify-content-center align-items-center " style="width:fit-content;">
                <a href="for-each-image.php?id_acara=<?= $data['id_acara'] ?>"><img src="Images/<?= $data['id_acara'] ?>.jpg" class="img-men mx-auto" data-aos="fade-up" style="border-radius:20px;height:180px"></a>
                <a href="for-each-image.php?id_acara=<?= $data['id_acara'] ?>"><span class="d-flex text-bold text-center mx- p-2" style="width: 100%;" data-aos="fade-up"><?= $data['nama'] ?> </span></a>
              </div>
              <div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
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
</body>

</html>