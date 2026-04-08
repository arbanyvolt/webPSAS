<?php
session_start();
include 'koneksi.php';

$nama = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// simpan ke database
mysqli_query($conn, "INSERT INTO users (name, email, password)
VALUES ('$nama', '$email', '$password')");

// simpan ke session (auto login)
$_SESSION['nama'] = $nama;

// pindah ke dashboard
header("Location: dashboard.php");
exit;
?>