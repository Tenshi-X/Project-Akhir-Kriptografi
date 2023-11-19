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
  <link rel="stylesheet" href="CSS_files/for-each-image.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
  <link rel="stylesheet" type="text/css" href="Plugins/slick-master/slick/slick-theme1.css" />
  <script type="text/javascript" src="Plugins/slick-master/slick/slick.min.js"></script>
  <script src="JS_files/for-each-image.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="Plugins\jQuery-Plugin-For-Image-Hover-Zoom-WM-Zoom\wm-zoom\jquery.wm-zoom-1.0.min.css">
  <style>
    a:hover,
    a {
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
  <?php
  include('connect.php');
  $id_acara = $_GET['id_acara'];

  $sql    = "SELECT * FROM `acara` WHERE id_acara = '$id_acara'";
  $query    = mysqli_query($koneksi, $sql);
  while ($data = mysqli_fetch_array($query)) {
  ?>
    <div class="container mt-5 pt-4 hide-for-tablate">
      <div class="row pt-5">
        <div class="col-5 text-center zooming-open-head wm-zoom-container my-zoom-1">
          <div class="wm-zoom-box">
            <img src="Images/<?= $data['id_acara'] ?>.jpg" height="400px" width="405px" class="wm-zoom-default-img" alt="alternative text" data-hight-src="for-each-image-1.jpg">
          </div>
        </div>
        <div class="col-5">
          <form action="payment-form.php" method="post">
            <div class="row">
              <div class="col-12 pt-3">
                <p style="font-size:25px;font-weight:600"><?= $data['nama'] ?></p>
              </div>
              <div class="col-12">
                <ul>
                  <li>Artis: <?= $data['artis'] ?></li>
                  <li>Waktu: <?= $data['waktu_konser'] ?></li>
                  <li>Tempat: <?= $data['tempat'] ?></li>
                </ul>
                <div>
                  <input type="hidden" id="id_acara" name="id_acara" class="form-control" value="<?= $data['id_acara'] ?>">
                </div>
                <div class="row mt-3">
                  <label class="col-2 col-form-label" style="border: 2px; border-color: black">Jenis Seat: </label>
                  <select name="jenis_kursi" style="background-color: white; margin-left: 1.5%; border-color:black" class="col-5 btn" data-bs-toggle="dropdown" required="">:
                    <?php
                    include('connect.php');

                    $sql    = "SELECT * FROM seat WHERE id_acara = '$id_acara'";
                    $query  = mysqli_query($koneksi, $sql);

                    while ($data = mysqli_fetch_array($query)) {

                    ?>
                      <option align="left" value=<?= $data['jenis_kursi']; ?>><?= $data['jenis_kursi']; ?>: Rp<?= $data['harga'] ?> </option>
                    <?php } ?>
                  </select>
                </div>
                <div>
                  <input hidden type="number" id="harga" name="harga" class="form-control" value="<?= $data['harga'] ?>">
                </div>
                <div class="row mt-3">
                  <label class="col-2 col-form-label" style="border: 2px; border-color: black">Jumlah</label>
                  <div class="col-3">
                    <input style="border-color: black;" type="number" name="jumlah_kursi" class="form-control" required="">
                  </div>
                </div>
                <div class="col-12 pl-5 mt-4">
                  <button type="submit" style="width:30%;border:1px solid;padding:2% 5%;text-transform: uppercase;font-size:15px;font-weight:600;background-color:rgb(255, 174, 0);border-radius:10px;"><i class="fa fa-shopping-cart ml-2" aria-hidden="true"></i>
                    Beli Sekarang
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    <?php } ?>
    <div class="row pt-2">
      <div class="col-6 pl-5 text-white">
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
    <script type="text/javascript">
      //for single slider
      $('.single-slider').slick({
        dots: false,
        infinite: false,
        autoplaySpeed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              infinite: true,
              arrows: false,
              dots: false
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
              arrows: false
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
              arrows: false
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });
    </script>
    <script type="text/javascript" src="Plugins\jQuery-Plugin-For-Image-Hover-Zoom-WM-Zoom\assets\js\jquery-1.11.1.js"></script>
    <script type="text/javascript" src="Plugins\jQuery-Plugin-For-Image-Hover-Zoom-WM-Zoom\wm-zoom\jquery.wm-zoom-1.0.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.my-zoom-1').WMZoom();
        config: {
          inner: true
        }
      });
    </script>
    <script>
      AOS.init({
        once: true,
        duration: 1000,
      });
    </script>

</body>

</html>