<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login-form.php");
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS_files/contact-form.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-image:url('Images/background.jpg');background-size: cover;">
    <div class="container-fluid text-white" id="change-color">
        <div class="container-fluid side-bar px-0">
            <div class="col-12 text-right bg-danger">
                <span class="close"><a href="#/" class="color">&times;</a></span>
            </div>
        </div>
    </div>
    <?php
    include('connect.php');
    $id_acara = $_POST['id_acara'];
    $jenis_kursi = $_POST['jenis_kursi'];
    $harga = $_POST['harga'];
    $jumlah_kursi = $_POST['jumlah_kursi'];

    $username = $_SESSION['username'];
    $id_user = "SELECT id_user FROM `user` WHERE username = '$username'";
    $query_user    = mysqli_query($koneksi, $id_user)->fetch_assoc()['id_user'];
    $sql    = "SELECT * FROM `acara` WHERE id_acara = '$id_acara'";
    $sql_seat = "SELECT * FROM `seat` WHERE id_acara = '$id_acara' AND jenis_kursi = '$jenis_kursi'";
    $query    = mysqli_query($koneksi, $sql);
    $query_seat    = mysqli_query($koneksi, $sql_seat);
    $data = mysqli_fetch_array($query);
    $data_seat = mysqli_fetch_array($query_seat);
    $seat = $data_seat['harga'];
    $total_harga = $seat * $jumlah_kursi;
    ?>


    <div class="container">
        <div class="container form bg-white pt-5 mt-4 mb-3">
            <p class="text-center contact-heading">Pembayaran</p>
            <div class="container">
                <form action="payment_proses.php" method="POST" enctype="multipart/form-data">
                    <div class="row pl-5 pt-3">
                        <div>
                            <input type="hidden" id="id_acara" name="id_acara" class="form-control" value="<?= $id_acara ?>">
                        </div>
                        <div>
                            <input type="hidden" id="id_user" name="id_user" class="form-control" value="<?= $query_user ?>">
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" placeholder="name" style="width:85%;border:transparent;border-bottom:2px solid black;height:40px" readonly class="name" value=<?= $data['nama'] ?>>
                            <div class="name-hide"></div>
                        </div>
                        <div class="col-12 pt-4">
                            <input type="text" placeholder="Seat" style="width:85%;border:transparent;border-bottom:2px solid black;height:40px" readonly class="seat" value=<?= $jenis_kursi ?> name="jenis_kursi">
                            <div class="seat-hide"></div>
                        </div>
                        <div>
                            <input type="hidden" id="jumlah_kursi" name="jumlah_kursi" class="form-control" value="<?= $jumlah_kursi ?>">
                        </div>
                        <div class="col-12 pt-4">
                            <input type="number" placeholder="Total Harga" style="width:85%;border:transparent;border-bottom:2px solid black;height:40px" readonly class="total_harga" value=<?= $total_harga ?> name="total_harga">
                            <div class="harga-hide"></div>
                        </div>
                        <div class="col-12 pt-4">
                            <input type="number" placeholder="Masukkan No. Rekening Anda" style="width:85%;border:transparent;border-bottom:2px solid black;height:40px" class="rekening" name="rekening">
                            <div class="rekening-hide"></div>
                        </div>
                        <div class="col-12 pt-4">
                            <input type="file" placeholder="Masukkan Bukti Pembayaran Anda" style="width:85%;border:transparent;border-bottom:2px solid black;height:40px" class="bukti" name="gambar">
                            <div class="bukti-hide"></div>
                        </div>
                        <div class="col-12 pt-5">
                            <button type="submit" class="btn text-white send-button" style="width:85%">
                                Kirim
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>