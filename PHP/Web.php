<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chroclock — Classic Luxury Watches</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../CSS/Web.css" />

  <!-- Midtrans Snap -->
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="Mid-client-evN0MUz8X2Fx-VhC"></script>
</head>

<body>
  <a class="skip-link" href="#mainContent">Lewati ke konten</a>

  <header class="site-header">
    <div class="container header-wrap">
      <a href="#home" class="brand" aria-label="Chroclock home">
        <span class="brand-mark">
          <img src="../Gambar/logo.png" alt="Logo Chroclock" style="position: relative; top: 0px; height: 40px; width: auto;">
          <svg viewBox="0 0 24 24" fill="none" width="24" height="24" style="position: absolute; opacity: 0;">
            <circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.2"></circle>
            <path d="M12 7.8V12l3.2 2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"></path>
          </svg>
        </span>
        <span class="brand-name">Chroclock</span>
      </a>

      <nav class="nav" aria-label="Navigasi utama">
        <a href="#home" data-i18n="nav.home">Beranda</a>
        <a href="#about" data-i18n="nav.about">Tentang Kami</a>
        <a href="#collection" data-i18n="nav.collection">Koleksi</a>
        <a href="#history" data-i18n="nav.history">Narasi Sejarah</a>
      </nav>

      <div class="header-actions">
        <button class="icon-btn" id="themeToggle" type="button" aria-label="Toggle tema">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
          </svg>
        </button>

        <?php if(isset($_SESSION['user'])): ?>
          <div class="user-info">
            <span><?= $_SESSION['user'] ?></span>
            <a href="logout.php" class="icon-btn" title="Logout" aria-label="Logout">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            </a>
          </div>
        <?php else: ?>
          <a href="login.php?redirect=../PHP/Web.php" class="icon-btn" title="Login" aria-label="Login">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          </a>
        <?php endif; ?>

        <button class="icon-btn" id="openCartBtn" type="button" aria-label="Buka cart">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
        </button>
      </div>
    </div>
  </header>

  <main id="mainContent">
    <section class="hero" id="home">
      <div class="container hero-grid">
        <div class="hero-copy" data-reveal>
          <p class="eyebrow" data-i18n="hero.eyebrow">Atelier Horologi Klasik</p>
          <h1 data-i18n="hero.title">Melampaui Waktu, Menjadi Warisan.</h1>
          <p data-i18n="hero.desc">Chroclock merangkai keindahan yang jujur. Koleksi kami bukan sekadar instrumen penunjuk waktu, melainkan simfoni visual bagi momen yang layak Anda abadikan—jauh melampaui riuh rendah tren yang silih berganti. Setiap detail dipilih dengan penuh pertimbangan: dial yang jernih, proporsi yang presisi, dan kilau baja yang memancarkan kemewahan tanpa perlu bersuara.</p>
          <div class="hero-actions">
            <a href="#collection" class="btn btn-primary" data-i18n="hero.cta1">Lihat koleksi</a>
            <a href="#history" class="btn btn-secondary" data-i18n="hero.cta2">Baca cerita</a>
          </div>
          <div class="stat-row">
            <article class="stat"><b>12</b><span data-i18n="stats.editions">Edisi Terbatas Tahunan</span></article>
            <article class="stat"><b>2 Year</b><span data-i18n="stats.warranty">Proteksi Eksklusif 2 Warsa</span></article>
            <article class="stat"><b>100%</b><span data-i18n="stats.brand">Mahakarya Horologi Indonesia</span></article>
          </div>
        </div>
        <div class="hero-visual" aria-label="Hero gallery" data-reveal>
          <img class="hero-slide is-active" src="../Gambar/Jam1_1.png" alt="Jam tangan klasik tampilan pertama">
          <img class="hero-slide" src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/3fbc773f7948bb51bbff3d9e18ea42af023998ba.jpg" alt="Jam tangan klasik tampilan kedua">
          <img class="hero-slide" src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/27d4d15bcef056a3e7dff83e1de414dff044a9b1.jpg" alt="Jam tangan klasik tampilan ketiga">
        </div>
      </div>
    </section>

    <section id="about">
      <div class="container">
        <div class="section-head" data-reveal>
          <div>
            <p class="eyebrow" data-i18n="about.eyebrow">Filosofi Chroclock</p>
            <h2 data-i18n="about.title">Keheningan Visual, Keabadian dalam Detik.</h2>
          </div>
          <p data-i18n="about.lead">Hadir bagi mereka yang mengerti bahwa esensi keanggunan terletak pada detail, bukan pada gemuruh logo. Melalui palet monokrom yang abadi, kami menerjemahkan warisan atelier klasik ke dalam ritme kehidupan modern.</p>
        </div>
        <div class="about-grid">
          <article class="panel" data-reveal>
            <p class="quote" data-i18n="about.quote">“Keanggunan sejati tidak mengejar perhatian—ia menunggu untuk ditemukan.”</p>
          </article>
          <article class="panel" data-reveal>
            <p class="eyebrow" data-i18n="about.storyTitle">Short stories</p>
            <p data-i18n="about.story1">Setiap koleksi dimulai dari satu pertanyaan sederhana: jika semua tren berhenti hari ini, apakah jam ini masih pantas dipakai dengan bangga? Dari sana, kami memilih proporsi, sudut, dan tekstur yang tidak meminta maaf pada waktu—hanya berdialog pelan dengannya.</p>
            <br />
            <p data-i18n="about.story2">Kami tidak mengejar deretan referensi yang panjang, melainkan kehadiran yang utuh. Bezel yang tidak berlebihan, lug yang seimbang, strap yang terasa menyatu dengan pergelangan—semua diarahkan pada satu hal: jam yang layak mewakili Anda, bahkan saat Anda diam.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="collection">
      <div class="container">
        <div class="section-head" data-reveal>
          <div>
            <p class="eyebrow" data-i18n="collection.eyebrow">Kurasi Koleksi</p>
            <h2 data-i18n="collection.title">Kepingan Terbatas untuk Selera yang Terkurasi.</h2>
          </div>
          <p data-i18n="collection.lead">Setiap kepingan dikurasi layaknya sebuah galeri intim: terbatas dalam jumlah, murni dalam siluet, dan kaya akan detail yang hanya akan terungkap bagi mata yang jeli. Jam ini hadir bukan untuk sekadar memenuhi ruang, melainkan untuk melengkapi babak baru dalam hidup Anda.</p>
        </div>
        <div class="collection-grid" id="productGrid">
          <!-- JS will render this, but we'll provide data via PHP -->
        </div>
      </div>
    </section>

    <section id="history">
      <div class="container">
        <div class="section-head" data-reveal>
          <div>
            <p class="eyebrow" data-i18n="history.eyebrow">Sejarah</p>
            <h2 data-i18n="history.title">Dirancang dengan napas atelier lama, dihadirkan dalam ritme hari ini.</h2>
          </div>
        </div>
        <div class="history-layout">
          <div class="timeline" data-reveal>
            <article class="timeline-item"><small data-i18n="history.i1t">Titik Mula</small><p data-i18n="history.i1d">Berawal dari visi seorang artisan di meja kerja yang sunyi. Di tengah hiruk-pikuk dunia yang serba instan, lahir keinginan untuk menciptakan instrumen yang berdetak pelan, namun memiliki jiwa yang bertahan melintasi dekade.</p></article>
            <article class="timeline-item"><small data-i18n="history.i2t">Estetika Terkurasi</small><p data-i18n="history.i2d">Arah desain Chroclock menjauh dari keriuhan visual. Kami memilih bahasa monokrom: hitam, putih, dan spektrum bayangan di antaranya. Di dalamnya, setiap garis diberi ruang untuk bernapas, memberikan ketenangan bagi mereka yang benar-benar memahami apa yang mereka cari.</p></article>
            <article class="timeline-item"><small data-i18n="history.i3t">Butik Masa Depan</small><p data-i18n="history.i3d">Chroclock dibangun untuk terus tumbuh tanpa mengorbankan ketenangannya. Kami tetap setia pada satu janji: menghadirkan arloji klasik yang terasa seperti bait puisi yang melingkar indah di pergelangan tangan Anda.</p></article>
          </div>
          <div class="history-gallery" data-reveal>
            <figure class="history-photo history-photo-lg"><img src="https://images.unsplash.com/photo-1523170335258-f5ed11844a49?auto=format&fit=crop&w=1200&q=80" alt="Workshop jam tangan klasik" loading="lazy"></figure>
            <figure class="history-photo"><img src="https://images.unsplash.com/photo-1547996160-81dfa63595aa?auto=format&fit=crop&w=900&q=80" alt="Detail jam tangan klasik" loading="lazy"></figure>
            <figure class="history-photo"><img src="https://images.unsplash.com/photo-1508057198894-247b23fe5ade?auto=format&fit=crop&w=900&q=80" alt="Koleksi jam tangan di meja display" loading="lazy"></figure>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="container">
      <div class="footer-top">
        <div class="footer-brand">
          <h3>Chroclock</h3>
          <p data-i18n="footer.copy">Classic luxury watches in a quiet, poetic, monochrome language.</p>
        </div>
        <div class="footer-links">
          <div><small>Navigation</small><a href="#home">Home</a><a href="#collection">Collection</a><a href="#history">History</a></div>
          <div><small>Contact</small><p>Email: Chroclock@gmail.com</p><p>Purwokerto, Indonesia</p></div>
          <div><small>Notes</small><p data-i18n="footer.note">Ready to grow into a fuller digital boutique with domain, hosting, payment gateway, and expanded catalogue.</p></div>
        </div>
      </div>
      <div class="footer-bottom"><span>© 2026 Chroclock</span><span>Monochrome classical watch house</span></div>
    </div>
  </footer>

  <!-- CART MODAL -->
  <div class="modal" id="cartModal" aria-hidden="true">
    <div class="modal-panel">
      <button class="icon-btn modal-close" id="closeCartBtn" type="button" aria-label="Tutup modal">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"></path></svg>
      </button>
      <div class="checkout-shell">
        <div class="panel cart-panel-selection">
          <div class="eyebrow" data-i18n="checkout.eyebrow">Pilihan Anda</div>
          <h2 data-i18n="checkout.title">Cart & checkout</h2>
          <div class="cart-list" id="cartList"></div>
          <div id="summaryBox"></div>
          <button class="btn btn-primary" id="goToCheckoutBtn" type="button" style="width: 100%; margin-top: var(--space-4);">Checkout</button>
        </div>
        <div class="panel checkout-panel-form" style="display: none;">
          <button class="btn btn-secondary" id="backToCartBtn" type="button" style="width: 100%; margin-bottom: var(--space-4);">Back to Cart</button>
          <div class="eyebrow" data-i18n="checkout.formEyebrow">Pemesanan concierge</div>
          <h2 data-i18n="checkout.formTitle">Lengkapi detail, kami yang akan menyusun sisanya.</h2>
          <p style="color:var(--color-text-muted);margin-top:var(--space-3)" data-i18n="checkout.formLead">Tuliskan nama dan cara kami menghubungi Anda.</p>
          <form class="checkout-form" id="checkoutForm">
            <div class="field"><label for="name" data-i18n="form.name">Nama lengkap</label><input id="name" name="name" required></div>
            <div class="field"><label for="email" data-i18n="form.email">Email</label><input id="email" name="email" type="email" required></div>
            <div class="field"><label for="phone" data-i18n="form.phone">No. telepon</label><input id="phone" name="phone" required></div>
            <div class="field"><label for="address" data-i18n="form.address">Catatan pengiriman</label><textarea id="address" name="address" required></textarea></div>
            <button class="btn btn-primary" type="submit" data-i18n="checkout.submit">Pay Now</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- QUANTITY SELECTION MODAL -->
  <div class="modal" id="qtyModal" aria-hidden="true">
    <div class="modal-panel" style="max-width: 400px; text-align: center; padding: var(--space-6);">
      <button class="icon-btn modal-close" id="closeQtyBtn" type="button" aria-label="Tutup modal">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"></path></svg>
      </button>
      <h3 style="font-family: var(--font-display); margin-bottom: var(--space-3); font-size: 1.5rem;">Select Quantity</h3>
      <p id="qtyProductLabel" style="font-weight: 600; margin-bottom: var(--space-4); color: var(--color-text-muted);"></p>
      <div class="qty-select-container" style="display: flex; align-items: center; justify-content: center; gap: var(--space-4); margin-bottom: var(--space-6);">
        <button class="btn btn-secondary" id="qtySelectMinus" type="button" style="padding: 5px 15px; font-size: 1.2rem; min-width: 40px;">-</button>
        <span id="qtySelectCount" style="font-size: 1.5rem; font-weight: 600; min-width: 40px; display: inline-block;">1</span>
        <button class="btn btn-secondary" id="qtySelectPlus" type="button" style="padding: 5px 15px; font-size: 1.2rem; min-width: 40px;">+</button>
      </div>
      <button class="btn btn-primary" id="confirmAddQtyBtn" style="width: 100%;">Add to Cart</button>
    </div>
  </div>

  <?php
  // Fetch products for JS
  $produkData = mysqli_query($conn, "SELECT * FROM produk");
  $productsArray = [];
  while ($row = mysqli_fetch_assoc($produkData)) {
      $item = [
          'id' => $row['id_produk'],
          'name' => $row['nama'],
          'price' => (int)$row['harga'],
          'image' => '../Gambar/' . $row['gambar'],
          'desc' => $row['deskripsi'],
          'tag' => $row['tag'] ?? 'Limited Edition'
      ];
      // Terapkan 3 gambar slider ke semua produk (menggunakan aset Jam 1 sebagai placeholder)
      $item['images'] = ['../Gambar/Jam1_1.png', '../Gambar/Jam1_2.png', '../Gambar/Jam1_3.png'];
      
      $productsArray[] = $item;
  }
  ?>
  <script>
    var products = <?= json_encode($productsArray) ?>;
  </script>
  <a class="wa-float" href="https://wa.me/6285601445637?text=Halo%20Chroclock%2C%20saya%20ingin%20konsultasi%20koleksi%20jam%20tangan." target="_blank" rel="noopener noreferrer" aria-label="WhatsApp Chroclock">
    <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M20.52 3.48A11.86 11.86 0 0 0 12.07 0C5.5 0 .16 5.33.16 11.9c0 2.1.55 4.15 1.6 5.95L0 24l6.33-1.66a11.9 11.9 0 0 0 5.74 1.47h.01c6.57 0 11.91-5.34 11.91-11.91 0-3.18-1.24-6.16-3.47-8.42ZM12.08 21.8h-.01a9.88 9.88 0 0 1-5.03-1.37l-.36-.21-3.76.99 1-3.66-.23-.37a9.87 9.87 0 0 1-1.51-5.27c0-5.46 4.44-9.9 9.91-9.9 2.64 0 5.12 1.03 6.98 2.9a9.82 9.82 0 0 1 2.9 6.99c0 5.46-4.44 9.9-9.89 9.9Zm5.43-7.39c-.3-.15-1.77-.88-2.05-.98-.28-.1-.48-.15-.69.15-.2.3-.78.98-.95 1.18-.18.2-.35.23-.65.08-.3-.15-1.25-.46-2.39-1.48-.88-.79-1.48-1.77-1.65-2.07-.18-.3-.02-.46.13-.61.13-.13.3-.35.45-.53.15-.18.2-.3.3-.5.1-.2.05-.38-.03-.53-.08-.15-.69-1.66-.95-2.28-.25-.6-.5-.52-.69-.53h-.58c-.2 0-.53.08-.8.38-.28.3-1.05 1.03-1.05 2.51 0 1.48 1.08 2.91 1.23 3.11.15.2 2.12 3.23 5.13 4.53.72.31 1.29.5 1.73.64.73.23 1.4.2 1.92.12.59-.09 1.77-.73 2.03-1.43.25-.71.25-1.31.18-1.43-.08-.13-.28-.2-.58-.35Z"/></svg>
    <span>WhatsApp</span>
  </a>

  <script src="../JS/web.js?v=2" defer></script>

</body>
</html>