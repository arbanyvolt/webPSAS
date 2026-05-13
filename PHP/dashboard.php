<?php
session_start();

if(!isset($_SESSION['nama'])){
    header("Location: login.php");
    exit;
}
?>

<h2>Dashboard</h2>
<p>Halo, <?php echo $_SESSION['nama']; ?> 👋</p>

<a href="produk.php">Lihat Produk</a><br>
<a href="logout.php">Logout</a>