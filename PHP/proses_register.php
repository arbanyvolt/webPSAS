<?php
session_start();
include 'koneksi.php';

$nama = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// simpan ke database
mysqli_query($conn, "INSERT INTO users (name, email, password)
VALUES ('$nama', '$email', '$password')");

// auto login
$_SESSION['user'] = $nama;

// redirect ke index terbaru
header("Location: Web.php");
exit;
?>