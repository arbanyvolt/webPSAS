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
  <title>Chrocklock — Classic Luxury Watches</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- SESUAIKAN PATH -->
  <link rel="stylesheet" href="../CSS/Web.css" />
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

        <?php if(isset($_SESSION['user'])): ?>
          <a href="logout.php">Logout</a>
        <?php else: ?>
          <a href="login.php?redirect=Web.php">Login</a>
        <?php endif; ?>
      </nav>

      <div class="header-actions">

        <button class="lang-toggle" id="langToggle">
          ID / EN
        </button>

        <button class="icon-btn" id="themeToggle">
          🌙
        </button>

        <button class="icon-btn" id="openCartBtn">
          🛒
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

  <!-- SESUAIKAN PATH -->
  <script src="../JS/web.js" defer></script>

</body>
</html>