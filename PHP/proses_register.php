<?php
session_start();
include 'koneksi.php';

$nama = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$redirect = isset($_POST['redirect']) && !empty($_POST['redirect']) ? $_POST['redirect'] : 'Web.php';

// simpan ke database
mysqli_query($conn, "INSERT INTO users (name, email, password)
VALUES ('$nama', '$email', '$password')");

// Jangan auto login, arahkan ke login.php agar user memasukkan detailnya sendiri
header("Location: login.php?status=registered&redirect=" . urlencode($redirect));
exit;
?>