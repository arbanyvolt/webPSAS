<?php
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params(0, '/');
    session_start();
}

$conn = mysqli_connect("localhost", "root", "", "jamtangan_store");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>