<?php
include 'connect.php';
session_start();
// semisal belum login, langsung masuk ke index.php
if (!isset($_SESSION['username'])) {
    header("Location: login-form.php");
}
$username = $_SESSION['username'];

$id_acara = $_POST['id_acara'];
$id_user = $_POST['id_user'];
$jenis_kursi = $_POST['jenis_kursi'];
$jumlah_kursi = $_POST['jumlah_kursi'];
$harga = $_POST['total_harga'];
$rekening = $_POST['rekening'];
$gambar = upload();
if (!$gambar) {
    return false;
}
$encryptedCode = encrypt("$id_acara-$id_user-$jenis_kursi-$jumlah_kursi");


// query insert data
$query = "INSERT INTO tiket VALUES('','$id_acara', '$id_user', '$jenis_kursi','$jumlah_kursi', '$harga','$rekening', '$gambar', CURRENT_TIMESTAMP(), '$encryptedCode')";
mysqli_query($koneksi, $query);

// cek keberhasilan input data
if (mysqli_affected_rows($koneksi) > 0) {
    echo "
				<script>
					alert('Pembayaran Berhasil!');
					document.location.href = 'payment.php';
				</script>
			";
} else {
    echo "
				<script>
					alert('Pembayaran Gagal!');
					document.location.href = 'payment-form.php';
				</script>
			";
}
// fungsi upload gambar
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah ada gambar yang diupload
    if ($error === 4) {
        echo "
				<script>
					alert('Gambar Belum Diinputkan!');
					document.location.href = 'payment-form.php';
				</script>
			";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // adakah sebuah string dalam sebuah array
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
				<script>
					alert('Yang Anda Upload Bukan Gambar!');
					document.location.href = 'payment-form.php';
				</script>
			";
        return false;
    }
    // jika ukuran terlalu besar
    if ($ukuranFile > 10000000) {
        echo "
				<script>
					alert('Ukuran Gambar Terlalu Besar!');
					document.location.href = 'payment-form.php';
				</script>
			";
        return false;
    }

    $namaFileBaru = encrypt($tmpName);

    move_uploaded_file($tmpName, 'Bukti/' . $namaFileBaru . '.' . $ekstensiGambar);
    return $namaFileBaru;
}
function encrypt($data)
{
    $key = "coba";
    $ivlen = openssl_cipher_iv_length($cipher = "AES-256-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}
