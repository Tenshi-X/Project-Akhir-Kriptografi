<?php
include 'connect.php';
session_start();
if (isset($_SESSION['username'])) {
    header("location: event_page.php");
}


$username = $_POST['username'];
$password = $_POST['password'];


$text = "$password";
$key = 12;

$ciphertext = caesar_encrypt($text, $key);

$hash = hash('sha256', "$ciphertext");

$query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE username='$username' AND password = '$hash'");

$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    header("location: event_page.php");
} else {
    echo "<p><center class='alert alert-danger'>Username atau Password Salah</center></p>";
    header("location: login-form.php");
}
function caesar_encrypt($text, $key)
{
    $ciphertext = "";
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        $code = ord($char);
        $new_code = $code + $key;
        if ($new_code > 127) {
            $new_code -= 256;
        }
        $ciphertext .= chr($new_code);
    }
    return $ciphertext;
}
