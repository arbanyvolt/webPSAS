<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_midtrans";

$conn_midtrans = mysqli_connect($host, $user, $pass, $db);

if (!$conn_midtrans) {
    die("Koneksi ke db_midtrans gagal: " . mysqli_connect_error());
}
?>
