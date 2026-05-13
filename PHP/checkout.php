<?php
session_start();

if(!isset($_SESSION['nama'])){
    header("Location: login.php");
    exit;
}
?>

<h2>Checkout</h2>
<p>Kamu sudah login, lanjutkan pembelian</p>