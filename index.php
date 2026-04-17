<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "jamtangan_store");
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chroclock — Time. Refined. Yours.</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="CSS/secstyle.css" />
</head>

<body>

<div class="cursor" id="cursor"></div>
<div class="cursor-ring" id="cursorRing"></div>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobileMenu">
  <a href="#about" onclick="closeMobileMenu()">Tentang</a>
  <a href="#collections" onclick="closeMobileMenu()">Koleksi</a>
  <a href="#orders" onclick="closeMobileMenu()">Pesanan</a>
  <a href="#order" onclick="closeMobileMenu()">Beli</a>
</div>

<!-- NAV -->
<nav id="navbar">
  <a href="#" class="nav-logo">Chroclock</a>
  <ul class="nav-links">
    <li><a href="#about">Craft</a></li>
    <li><a href="#collections">Collections</a></li>
    <li><a href="#orders">History</a></li>
  </ul>
  <button class="hamburger" id="hamburger">
    <span></span><span></span><span></span>
  </button>
    <div class="nav-user">
    <?php if(isset($_SESSION['user'])): ?>
      <span>Halo, <?= $_SESSION['user']; ?></span>
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
  </div>
</nav>

<!-- HERO (FULL, BIAR JS & DESIGN BALIK NORMAL) -->
<section class="hero">
  <p class="hero-eyebrow fade-in">Premium Indonesian Watch Brand</p>
  <h1 class="hero-title fade-in delay-1">Chro<em>clock</em></h1>
  <p class="hero-tagline fade-in delay-2">Time · Refined · Yours</p>
  <div class="hero-actions fade-in delay-3">
  <a href="#collections" class="btn-primary">Shop Now</a>
  <a href="#about" class="btn-ghost">Our Craft</a>
</div>
</section>

<div class="ticker">
    <div class="ticker-inner">
      <span class="ticker-item">Swiss Movement<span class="dot"></span></span>
      <span class="ticker-item">Sapphire Crystal<span class="dot"></span></span>
      <span class="ticker-item">100m Water Resistant<span class="dot"></span></span>
      <span class="ticker-item">2-Year Warranty<span class="dot"></span></span>
      <span class="ticker-item">Handcrafted<span class="dot"></span></span>
      <span class="ticker-item">Limited Edition<span class="dot"></span></span>
      <span class="ticker-item">Swiss Movement<span class="dot"></span></span>
      <span class="ticker-item">Sapphire Crystal<span class="dot"></span></span>
      <span class="ticker-item">100m Water Resistant<span class="dot"></span></span>
      <span class="ticker-item">2-Year Warranty<span class="dot"></span></span>
      <span class="ticker-item">Handcrafted<span class="dot"></span></span>
      <span class="ticker-item">Limited Edition<span class="dot"></span></span>
      
    </div>
  </div>

    <section class="about" id="about">
    <div class="about-quote fade-in">
      <blockquote>"A watch is not just a timepiece. It is a statement of who you are."</blockquote>
    </div>
    <div class="about-divider"></div>
    <div class="about-text fade-in delay-2">
      <span class="about-label">Our Craft</span>
      <p>Chroclock lahir dari obsesi terhadap presisi dan keindahan yang tak lekang waktu. Setiap jam tangan kami adalah perpaduan antara keahlian tradisional dan desain kontemporer yang menjawab estetika generasi baru.</p>
      <p>Kami percaya bahwa kemewahan sejati bukan tentang harga — melainkan tentang detail, kejujuran material, dan makna di balik setiap detik yang berlalu.</p>
    </div>
  </section>

<!-- ================= PRODUK ================= -->
<section class="collections" id="collections">
  <div class="section-header">
    <h2 class="section-title fade-in">Our<br><em>Collections</em></h2>
    <span class="section-label fade-in delay-2">Pilihan Terbaik</span>
  </div>

  <div class="collections-grid">

  <?php
  $produk = mysqli_query($conn, "SELECT * FROM produk");
  $no = 1;

  while($p = mysqli_fetch_assoc($produk)){
  ?>
    <div class="product-card fade-in">
      <div class="product-num"><?= str_pad($no,2,"0",STR_PAD_LEFT); ?></div>
      <div class="product-icon">⌚</div>
      <h3 class="product-name"><?= $p['nama']; ?></h3>
      <p class="product-desc"><?= $p['deskripsi']; ?></p>
      <p class="product-price">Rp <?= number_format($p['harga'],0,',','.'); ?></p>
      <span class="product-tag"><?= $p['tag']; ?></span>
      <span class="product-detail">→ View Details</span>
    </div>
  <?php $no++; } ?>

  </div>
</section>

<!-- ================= ORDERS ================= -->
<section class="order-history" id="orders">
  <div class="section-header">
    <h2 class="section-title fade-in">Your Orders</h2>
  </div>

  <div class="order-table-wrap">
    <table class="order-table">
      <thead>
        <tr>
          <th>Order ID</th><th>Date</th><th>Product</th><th>Status</th><th>Total</th>
        </tr>
      </thead>

      <tbody>
      <?php
      $orders = mysqli_query($conn, "SELECT * FROM orders");

      while($o = mysqli_fetch_assoc($orders)){
      ?>
        <tr data-status="<?= $o['status']; ?>">
          <td><?= $o['order_id']; ?></td>
          <td><?= $o['tanggal']; ?></td>
          <td><?= $o['produk']; ?></td>
          <td><?= $o['status']; ?></td>
          <td>Rp <?= number_format($o['total'],0,',','.'); ?></td>
        </tr>
      <?php } ?>
      </tbody>

    </table>
  </div>
</section>

<!-- CTA -->
<section class="cta-section" id="order">
  <h2 class="cta-title">Own the Time</h2>

<?php if(isset($_SESSION['user'])): ?>
  <a href="order.php" class="btn-light fade-in delay-2">Order Now</a>
<?php else: ?>
  <a href="login.php?redirect=index.php" class="btn-light fade-in delay-2">Order Now</a>
<?php endif; ?>
</section>

<!-- FOOTER (BIAR GA ILANG LAGI 😭) -->
<footer>
  <a href="#" class="footer-logo">Chroclock</a>
  <p class="footer-copy">© 2024 Chroclock. All rights reserved.</p>
  <div class="footer-socials">
    <a href="#">Instagram</a>
    <a href="#">TikTok</a>
    <a href="#">Pinterest</a>
  </div>
</footer>

<script src="webPSAS/script (1).js"></script>

</body>
</html>