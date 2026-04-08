<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jam Tangan Eksklusif</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- 🔹 NAVBAR -->
<div class="navbar">
    <h2>MyWatch</h2>

    <div>
        <?php if(isset($_SESSION['nama'])) { ?>
            Halo, <?php echo $_SESSION['nama']; ?> |
            <a href="logout.php">Logout</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
        <?php } ?>
    </div>
</div>

<!-- 🔹 HERO SECTION -->
<div class="hero">
    <h1>Jam Tangan Eksklusif 🍹</h1>
    <p>Rasakan cita rasa premium dalam setiap tegukan</p>
</div>

<!-- 🔹 TENTANG -->
<div class="about">
    <h2>Tentang Kami</h2>
    <p>
        Kami menghadirkan minuman eksklusif dengan kualitas terbaik,
        dibuat dengan bahan pilihan dan penuh filosofi.
    </p>
</div>

<!-- 🔹 PRODUK -->
<div class="produk">
    <h2>Produk Kami</h2>

    <div class="produk-container">
        <?php while($row = mysqli_fetch_assoc($data)) { ?>
            <div class="card">
                
                <img src="gambar/<?php echo $row['gambar']; ?>">
                
                <h3><?php echo $row['nama']; ?></h3>
                <p>Rp <?php echo $row['harga']; ?></p>
                <p>Stok: <?php echo $row['stok']; ?></p>

                <a href="checkout.php?id=<?php echo $row['id_produk']; ?>" class="btn">Beli</a>
                
            </div>
        <?php } ?>
    </div>
</div>

<!-- 🔹 FOOTER -->
<div class="footer">
    <p>© 2026 MinumanKu. All rights reserved.</p>
</div>

</body>
</html>