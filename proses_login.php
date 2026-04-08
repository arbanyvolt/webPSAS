<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$data = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
$cek = mysqli_num_rows($data);

if($cek > 0){
    $user = mysqli_fetch_assoc($data);
    $_SESSION['nama'] = $user['name'];

    header("Location: index.php");
    exit;
} else {
    echo "Login gagal!";
}
?>