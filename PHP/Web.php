<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chrocklock — Classic Luxury Watches</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- SESUAIKAN PATH -->
  <link rel="stylesheet" href="../CSS/Web.css" />

  <!-- Midtrans Snap -->
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="Mid-client-evN0MUz8X2Fx-VhC"></script>
</head>

<body>

  <a class="skip-link" href="#main">Skip to content</a>

  <header class="site-header">
    <div class="container header-wrap">

      <a class="brand" href="#home" aria-label="Chrocklock home">
        <span class="brand-mark" aria-hidden="true">
          <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.4">
            <circle cx="32" cy="32" r="19"></circle>
            <path d="M32 13V5M32 59v-8M13 32H5M59 32h-8"></path>
            <path d="M32 32 43 24"></path>
            <path d="M32 32 24 46"></path>
          </svg>
        </span>

        <span class="brand-name">Chrocklock</span>
      </a>

      <nav class="nav" aria-label="Primary">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#collection">Collection</a>
        <a href="#history">History</a>
      </nav>

      <div class="header-actions">

        <button class="lang-toggle" id="langToggle">
          ID / EN
        </button>

        <button class="icon-btn" id="themeToggle" aria-label="Switch theme">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
        </button>

        <?php if(isset($_SESSION['user'])): ?>
          <div class="user-info">
            <span><?= $_SESSION['user'] ?></span>
            <a href="logout.php" class="icon-btn" title="Logout" aria-label="Logout">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            </a>
          </div>
        <?php else: ?>
          <a href="login.php?redirect=../HTML/web.html" class="icon-btn" title="Login" aria-label="Login">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          </a>
        <?php endif; ?>

        <button class="icon-btn" id="openCartBtn" aria-label="Open cart">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
        </button>

      </div>
    </div>
  </header>

  <main id="main">

    <!-- HERO -->
    <section class="hero" id="home">

      <div class="container hero-grid">

        <div class="hero-copy">

          <div class="eyebrow">
            Rumah jam tangan klasik terbatas
          </div>

          <h1>
            Saat waktu berubah menjadi warisan.
          </h1>

          <p>
            Chrocklock merangkai jam tangan klasik dalam edisi terbatas—bukan sekadar penunjuk waktu, tetapi penanda momen yang ingin Anda simpan lebih lama dari satu kehidupan tren.
          </p>

          <div class="hero-actions">
            <a class="btn btn-primary" href="#collection">
              Lihat koleksi
            </a>

            <a class="btn btn-secondary" href="#about">
              Baca cerita
            </a>
          </div>

          <div class="stat-row">
            <div class="stat">
              <b>12</b>
              <span>Edisi terbatas per tahun</span>
            </div>

            <div class="stat">
              <b>48h</b>
              <span>Respons concierge</span>
            </div>

            <div class="stat">
              <b>100%</b>
              <span>Estetika monokrom terkurasi</span>
            </div>
          </div>

        </div>

        <div>
          <div class="hero-visual">

            <img
              src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/96c07fd29119028bb97f30f16409513200bd5f6b.jpg"
              alt="Elegant black dial classic watch">

          </div>
        </div>

      </div>
    </section>

    <!-- ABOUT -->
    <section id="about">

      <div class="container">

        <div class="section-head">

          <div>
            <div class="eyebrow">Tentang Chrocklock</div>

            <h2>
              Rumah monokrom untuk selera yang tidak mengejar waktu.
            </h2>
          </div>

          <p>
            Chrocklock hadir bagi penikmat jam tangan yang lebih percaya pada keheningan desain dibanding gemuruh logo.
          </p>

        </div>

        <div class="about-grid">

          <article class="panel">
            <p class="quote">
              “Keanggunan sejati tidak mengejar perhatian—ia menunggu untuk ditemukan.”
            </p>
          </article>

          <article class="panel">

            <h3>Short stories</h3>

            <p>
              Setiap koleksi dimulai dari satu pertanyaan sederhana.
            </p>

            <br>

            <p>
              Kami tidak mengejar deretan referensi yang panjang.
            </p>

          </article>

        </div>

      </div>
    </section>

    <!-- COLLECTION -->
    <section id="collection">

      <div class="container">

        <div class="section-head">

          <div>
            <div class="eyebrow">Koleksi</div>

            <h2>
              Potongan terbatas untuk lingkaran yang memilih dengan pelan.
            </h2>
          </div>

          <p>
            Koleksi Chrocklock disusun seperti galeri kecil.
          </p>

        </div>

        <!-- DATABASE PRODUK -->
        <div class="collection-grid">

          <?php
          $produk = mysqli_query($conn, "SELECT * FROM produk");

          while($p = mysqli_fetch_assoc($produk)){
          ?>

          <div class="product-card">

            <div class="product-image">

              <img src="IMG/<?= $p['gambar']; ?>" alt="<?= $p['nama']; ?>">

            </div>

            <h3><?= $p['nama']; ?></h3>

            <p><?= $p['deskripsi']; ?></p>

            <div class="product-price">
              Rp <?= number_format($p['harga'],0,',','.'); ?>
            </div>

            <div class="product-actions" style="margin-top: 15px; display: flex; gap: 10px;">
              <button class="btn btn-primary" onclick="addToCart('<?= $p['id_produk']; ?>')" style="flex: 1;">Tambah ke cart</button>
              <button class="btn btn-secondary" onclick="openCart()">Checkout</button>
            </div>

          </div>

          <?php } ?>

        </div>

      </div>
    </section>

    <!-- HISTORY -->
    <section id="history">

      <div class="container history-layout">

        <div>

          <div class="section-head">

            <div>
              <div class="eyebrow">Sejarah</div>

              <h2>
                Dirancang dengan napas atelier lama.
              </h2>
            </div>

          </div>

          <div class="panel timeline">

            <div class="timeline-item">
              <small>01</small>
              <h3>Asal mula</h3>

              <p>
                Berawal dari satu pertemuan sederhana.
              </p>
            </div>

            <div class="timeline-item">
              <small>02</small>

              <h3>Selera terkurasi</h3>

              <p>
                Arah desain Chrocklock menjauh dari keramaian warna.
              </p>
            </div>

            <div class="timeline-item">
              <small>03</small>

              <h3>Boutique masa depan</h3>

              <p>
                Struktur Chrocklock dibangun sejak awal untuk tumbuh.
              </p>
            </div>

          </div>

        </div>

        <figure class="history-image">

          <img
            src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/b77c324c97667a6a912ede583dece606055d3be7.jpg"
            alt="Classic vintage style dress watch">

        </figure>

      </div>

    </section>

    <!-- CONTACT -->
    <section id="contact">

      <div class="container">

        <div class="section-head">

          <div>
            <div class="eyebrow">Concierge</div>

            <h2>
              Konsultasi dan pemesanan privat.
            </h2>
          </div>

          <p>
            Tombol cart di bagian atas akan membuka popup pemesanan.
          </p>

        </div>

      </div>

    </section>

  </main>

  <!-- CART MODAL -->
  <div class="modal" id="cartModal" aria-hidden="true">
    <div class="modal-panel">
      <button class="icon-btn modal-close" id="closeCartBtn" aria-label="Close cart">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"></path></svg>
      </button>
      <div class="checkout-shell">
        <div class="panel">
          <div class="eyebrow" data-i18n="checkout.eyebrow">Pilihan Anda</div>
          <h2 data-i18n="checkout.title">Cart & checkout</h2>
          <div class="cart-list" id="cartList"></div>
        </div>
        <div class="panel">
          <div class="eyebrow" data-i18n="checkout.formEyebrow">Pemesanan concierge</div>
          <h2 data-i18n="checkout.formTitle">Lengkapi detail, kami yang akan menyusun sisanya.</h2>
          <p style="color:var(--color-text-muted);margin-top:var(--space-3)" data-i18n="checkout.formLead">Tuliskan nama dan cara kami menghubungi Anda.</p>
          <div id="summaryBox"></div>
          <form class="checkout-form" id="checkoutForm">
            <div class="field"><label for="name" data-i18n="form.name">Nama lengkap</label><input id="name" name="name" required></div>
            <div class="field"><label for="email" data-i18n="form.email">Email</label><input id="email" name="email" type="email" required></div>
            <div class="field"><label for="phone" data-i18n="form.phone">No. telepon / WhatsApp</label><input id="phone" name="phone" required></div>
            <div class="field"><label for="address" data-i18n="form.address">Catatan pengiriman</label><textarea id="address" name="address"></textarea></div>
            <button class="btn btn-primary" type="submit" data-i18n="checkout.submit">Bayar Sekarang</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="footer">

    <div class="container">

      <div class="footer-top">

        <div class="footer-brand">

          <div class="eyebrow">Chrocklock</div>

          <h2>
            A quiet house for watches meant to outlive noise.
          </h2>

          <p>
            Jam tangan klasik mewah dalam bahasa visual yang tenang.
          </p>

        </div>

      </div>

      <div class="footer-bottom">

        <span>© 2026 Chrocklock</span>

        <span>
          Classic luxury watches, shaped in monochrome.
        </span>

      </div>

    </div>

  </footer>

  <!-- WHATSAPP -->
  <a class="wa-float"
     href="https://wa.me/6285601445637"
     target="_blank">

    WhatsApp

  </a>

  <!-- DATA PRODUK UNTUK JS -->
  <?php
  include 'koneksi.php';
  $produkData = mysqli_query($conn, "SELECT * FROM produk");
  $productsArray = [];
  while ($row = mysqli_fetch_assoc($produkData)) {
      $productsArray[] = [
          'id' => $row['id_produk'],
          'name' => $row['nama'],
          'price' => (int)$row['harga'],
          'edition' => $row['tag'] ?? 'Limited Edition',
          'image' => 'IMG/' . $row['gambar'],
          'desc' => ['id' => $row['deskripsi'], 'en' => $row['deskripsi']]
      ];
  }
  ?>
  <script>
    var products = <?= json_encode($productsArray) ?>;
  </script>

  <!-- SESUAIKAN PATH -->
  <script src="../JS/web.js" defer></script>

</body>
</html>