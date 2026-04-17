<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "jamtangan_store");

$email = $_POST['email'];
$password = $_POST['password'];
$redirect = $_POST['redirect']; // ambil dari hidden input

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($query) > 0){
  $user = mysqli_fetch_assoc($query);

  if($password == $user['password']){

    $_SESSION['user'] = $user['name'];

    // 🔥 redirect ke halaman sebelumnya
    header("Location: " . $redirect);
    exit;

  } else {
    echo "Password salah!";
  }

} else {
  echo "Email tidak ditemukan!";
}
?>