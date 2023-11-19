<?php
include 'connect.php';

$id = '';
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$text = "$password";
$key = 12;

$ciphertext = caesar_encrypt($text, $key);

$hash = hash('sha256', "$ciphertext");

// Insert the user into the database
$stmt = mysqli_query($koneksi, "INSERT INTO user (id_user, username, email, password) VALUES ('$id', '$username', '$email','$hash')");

header("location: login-form.php");

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
