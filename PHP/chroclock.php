<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "jamtangan_store");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// ── Ambil semua produk dari database ─────────────────────────────
$produkQuery = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk ASC");
$produkList  = [];
while ($row = mysqli_fetch_assoc($produkQuery)) {
    $produkList[] = $row;
}

// ── Proses checkout form (AJAX-style POST) ────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'checkout') {
    header('Content-Type: application/json');

    $name    = mysqli_real_escape_string($conn, trim($_POST['name']    ?? ''));
    $email   = mysqli_real_escape_string($conn, trim($_POST['email']   ?? ''));
    $phone   = mysqli_real_escape_string($conn, trim($_POST['phone']   ?? ''));
    $address = mysqli_real_escape_string($conn, trim($_POST['address'] ?? ''));
    $items   = $_POST['items'] ?? '[]';           // JSON string dari JS
    $total   = (int)($_POST['total'] ?? 0);

    if (!$name || !$email || !$phone) {
        echo json_encode(['success' => false, 'message' => 'Data tidak lengkap.']);
        exit;
    }

    $order_id = 'CL-' . strtoupper(substr(md5(uniqid()), 0, 8));
    $tanggal  = date('Y-m-d H:i:s');

    $stmt = $conn->prepare(
        "INSERT INTO orders (order_id, tanggal, nama, email, phone, alamat, produk, total, status)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending')"
    );
    $stmt->bind_param('sssssssi', $order_id, $tanggal, $name, $email, $phone, $address, $items, $total);
    $ok = $stmt->execute();
    $stmt->close();

    echo json_encode(['success' => $ok, 'order_id' => $order_id]);
    exit;
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
  <link rel="stylesheet" href="../CSS/chroclock.css" />
</head>
<body>

<a class="skip-link" href="#main">Skip to content</a>

<!-- ── HEADER ─────────────────────────────────────────────────── -->
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
      <a href="#home"       data-i18n="nav.home">Home</a>
      <a href="#about"      data-i18n="nav.about">About</a>
      <a href="#collection" data-i18n="nav.collection">Collection</a>
      <a href="#history"    data-i18n="nav.history">History</a>
      <?php if (isset($_SESSION['user'])): ?>
        <a href="logout.php">Logout (<?= htmlspecialchars($_SESSION['user']) ?>)</a>
      <?php else: ?>
        <a href="login.php?redirect=Web.php">Login</a>
      <?php endif; ?>
    </nav>

    <div class="header-actions">
      <button class="lang-toggle" id="langToggle" aria-label="Toggle language">ID / EN</button>
      <button class="icon-btn" id="themeToggle" aria-label="Switch theme">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
        </svg>
      </button>
      <button class="icon-btn" id="openCartBtn" aria-label="Open cart">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        <span class="cart-badge" id="cartBadge" style="display:none">0</span>
      </button>
    </div>

  </div>
</header>

<main id="main">

  <!-- ── HERO ─────────────────────────────────────────────────── -->
  <section class="hero" id="home">
    <div class="container hero-grid">
      <div class="hero-copy" data-reveal>
        <div class="eyebrow" data-i18n="hero.eyebrow">Rumah jam tangan klasik terbatas</div>
        <h1 data-i18n="hero.title">Saat waktu berubah menjadi warisan.</h1>
        <p data-i18n="hero.desc">Chrocklock merangkai jam tangan klasik dalam edisi terbatas—bukan sekadar penunjuk waktu, tetapi penanda momen yang ingin Anda simpan lebih lama dari satu kehidupan tren. Setiap detail dipilih dengan tenang: dial yang bersih, proporsi yang seimbang, dan kilau baja yang terasa seperti bisikan, bukan teriakan.</p>
        <div class="hero-actions">
          <a class="btn btn-primary"   href="#collection" data-i18n="hero.cta1">Lihat koleksi</a>
          <a class="btn btn-secondary" href="#about"      data-i18n="hero.cta2">Baca cerita</a>
        </div>
        <div class="stat-row">
          <div class="stat"><b><?= count($produkList) ?></b><span data-i18n="stats.editions">Koleksi aktif</span></div>
          <div class="stat"><b>48h</b><span data-i18n="stats.concierge">Respons concierge</span></div>
          <div class="stat"><b>100%</b><span data-i18n="stats.curated">Estetika monokrom terkurasi</span></div>
        </div>
      </div>
      <div data-reveal>
        <div class="hero-visual">
          <img src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/96c07fd29119028bb97f30f16409513200bd5f6b.jpg"
               alt="Elegant black dial classic watch" width="693" height="693" loading="eager" decoding="async">
        </div>
      </div>
    </div>
  </section>

  <!-- ── ABOUT ─────────────────────────────────────────────────── -->
  <section id="about">
    <div class="container">
      <div class="section-head" data-reveal>
        <div>
          <div class="eyebrow" data-i18n="about.eyebrow">Tentang Chrocklock</div>
          <h2 data-i18n="about.title">Rumah monokrom untuk selera yang tidak mengejar waktu.</h2>
        </div>
        <p data-i18n="about.lead">Chrocklock hadir bagi penikmat jam tangan yang lebih percaya pada keheningan desain dibanding gemuruh logo. Dalam palet hitam putih, kami merayakan bentuk yang jujur: dial lapang, indeks yang tenang, dan finishing yang terasa dekat dengan kulit maupun cerita.</p>
      </div>
      <div class="about-grid">
        <article class="panel" data-reveal>
          <p class="quote" data-i18n="about.quote">"Keanggunan sejati tidak mengejar perhatian—ia menunggu untuk ditemukan."</p>
        </article>
        <article class="panel" data-reveal>
          <h3 data-i18n="about.storyTitle">Short stories</h3>
          <p data-i18n="about.story1">Setiap koleksi dimulai dari satu pertanyaan sederhana: jika semua tren berhenti hari ini, apakah jam ini masih pantas dipakai dengan bangga?</p>
          <br>
          <p data-i18n="about.story2">Kami tidak mengejar deretan referensi yang panjang, melainkan kehadiran yang utuh. Bezel yang tidak berlebihan, lug yang seimbang, strap yang terasa menyatu dengan pergelangan.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ── COLLECTION (dari database) ────────────────────────────── -->
  <section id="collection">
    <div class="container">
      <div class="section-head" data-reveal>
        <div>
          <div class="eyebrow" data-i18n="collection.eyebrow">Koleksi</div>
          <h2 data-i18n="collection.title">Potongan terbatas untuk lingkaran yang memilih dengan pelan.</h2>
        </div>
        <p data-i18n="collection.lead">Koleksi Chrocklock disusun seperti galeri kecil: jumlah yang terhitung, siluet yang bersih, dan detail yang hanya terlihat oleh mereka yang mau memperhatikan lebih lama dari satu pandang.</p>
      </div>

      <!-- Grid produk dari DB -->
      <div class="collection-grid" id="productGrid">
        <?php foreach ($produkList as $p): ?>
        <article class="product-card" data-reveal
                 data-id="<?= $p['id_produk'] ?>"
                 data-name="<?= htmlspecialchars($p['nama'], ENT_QUOTES) ?>"
                 data-price="<?= $p['harga'] ?>"
                 data-stok="<?= $p['stok'] ?>"
                 data-desc="<?= htmlspecialchars($p['deskripsi'], ENT_QUOTES) ?>"
                 data-tag="<?= htmlspecialchars($p['tag'],  ENT_QUOTES) ?>">

          <img src="IMG/<?= htmlspecialchars($p['gambar']) ?>"
               alt="<?= htmlspecialchars($p['nama']) ?>"
               width="800" height="800" loading="lazy" decoding="async"
               onerror="this.src='https://pplx-res.cloudinary.com/image/upload/pplx_search_images/96c07fd29119028bb97f30f16409513200bd5f6b.jpg'">

          <div class="product-body">
            <div class="product-meta">
              <div>
                <h3><?= htmlspecialchars($p['nama']) ?></h3>
                <span class="badge"><?= htmlspecialchars($p['tag']) ?></span>
              </div>
              <div class="price">Rp <?= number_format($p['harga'], 0, ',', '.') ?></div>
            </div>
            <p class="product-desc"><?= nl2br(htmlspecialchars($p['deskripsi'])) ?></p>
            <div class="product-actions">
              <?php if ($p['stok'] > 0): ?>
                <button class="btn btn-primary btn-add-cart"
                        data-id="<?= $p['id_produk'] ?>">
                  🛒 Tambah ke cart
                </button>
                <button class="btn btn-secondary btn-detail"
                        data-id="<?= $p['id_produk'] ?>">
                  Detail
                </button>
              <?php else: ?>
                <span class="badge" style="color:var(--color-text-faint)">Stok habis</span>
              <?php endif; ?>
            </div>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── HISTORY ────────────────────────────────────────────────── -->
  <section id="history">
    <div class="container history-layout">
      <div data-reveal>
        <div class="section-head" style="margin-bottom:var(--space-6)">
          <div>
            <div class="eyebrow" data-i18n="history.eyebrow">Sejarah</div>
            <h2 data-i18n="history.title">Dirancang dengan napas atelier lama, dihadirkan dalam ritme hari ini.</h2>
          </div>
        </div>
        <div class="panel timeline">
          <div class="timeline-item">
            <small>01</small>
            <h3 data-i18n="history.i1t">Asal mula</h3>
            <p data-i18n="history.i1d">Berawal dari satu pertemuan sederhana antara penggemar jam tangan klasik dan meja kerja yang terlalu sering menjadi saksi tren lewat begitu saja.</p>
          </div>
          <div class="timeline-item">
            <small>02</small>
            <h3 data-i18n="history.i2t">Selera terkurasi</h3>
            <p data-i18n="history.i2d">Arah desain Chrocklock menjauh dari keramaian warna dan bentuk. Kami memilih bahasa monokrom: hitam, putih, dan bayangan di antaranya.</p>
          </div>
          <div class="timeline-item">
            <small>03</small>
            <h3 data-i18n="history.i3t">Boutique masa depan</h3>
            <p data-i18n="history.i3d">Struktur Chrocklock dibangun sejak awal untuk tumbuh tanpa kehilangan ketenangannya: siap disambungkan ke payment gateway, katalog yang lebih luas, dan domain yang lebih megah.</p>
          </div>
        </div>
      </div>
      <figure class="history-image" data-reveal>
        <img src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/b77c324c97667a6a912ede583dece606055d3be7.jpg"
             alt="Classic vintage style dress watch" width="1600" height="900" loading="lazy" decoding="async">
      </figure>
    </div>
  </section>

  <!-- ── CONTACT ────────────────────────────────────────────────── -->
  <section id="contact">
    <div class="container">
      <div class="section-head" data-reveal>
        <div>
          <div class="eyebrow">Concierge</div>
          <h2>Konsultasi dan pemesanan privat.</h2>
        </div>
        <p>Tombol cart di bagian atas akan membuka popup pemesanan agar pengalaman belanja terasa lebih tenang, fokus, dan personal.</p>
      </div>
    </div>
  </section>

</main>

<!-- ── CART MODAL (popup besar) ──────────────────────────────────── -->
<div class="modal" id="cartModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="cartTitle">
  <div class="modal-panel">
    <button class="icon-btn modal-close" id="closeCartBtn" aria-label="Close cart">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M18 6 6 18M6 6l12 12"></path>
      </svg>
    </button>
    <div class="checkout-shell">

      <!-- Kiri: daftar cart -->
      <div class="panel">
        <div class="eyebrow" data-i18n="checkout.eyebrow">Pilihan Anda</div>
        <h2 id="cartTitle" data-i18n="checkout.title">Cart &amp; checkout</h2>
        <div class="cart-list" id="cartList"></div>
      </div>

      <!-- Kanan: form checkout -->
      <div class="panel">
        <div class="eyebrow" data-i18n="checkout.formEyebrow">Pemesanan concierge</div>
        <h2 data-i18n="checkout.formTitle">Lengkapi detail, kami yang akan menyusun sisanya.</h2>
        <p style="color:var(--color-text-muted);margin-top:var(--space-3)" data-i18n="checkout.formLead">
          Tuliskan nama dan cara kami menghubungi Anda. Setelah itu, biarkan kami menyiapkan jam pilihan Anda seolah kami menyiapkan hadiah yang akan Anda berikan pada diri sendiri di masa depan.
        </p>
        <div id="summaryBox"></div>

        <!-- ── ORDER SUCCESS MESSAGE ── -->
        <div id="orderSuccess" style="display:none;margin-top:var(--space-5);padding:var(--space-5);border-radius:var(--radius-lg);background:var(--color-surface-2);border:1px solid var(--color-border)">
          <h3 style="font-family:var(--font-display)">✓ Pesanan diterima!</h3>
          <p id="orderSuccessMsg" style="color:var(--color-text-muted);margin-top:.5rem"></p>
        </div>

        <form class="checkout-form" id="checkoutForm">
          <div class="field">
            <label for="name" data-i18n="form.name">Nama lengkap</label>
            <input id="name" name="name" required autocomplete="name">
          </div>
          <div class="field">
            <label for="email" data-i18n="form.email">Email</label>
            <input id="email" name="email" type="email" required autocomplete="email">
          </div>
          <div class="field">
            <label for="phone" data-i18n="form.phone">No. telepon / WhatsApp</label>
            <input id="phone" name="phone" required autocomplete="tel">
          </div>
          <div class="field">
            <label for="address" data-i18n="form.address">Catatan pengiriman</label>
            <textarea id="address" name="address"></textarea>
          </div>
          <button class="btn btn-primary" type="submit" id="checkoutSubmit" data-i18n="checkout.submit">
            Lanjutkan dengan concierge checkout
          </button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- ── DETAIL MODAL (popup produk) ───────────────────────────────── -->
<div class="modal" id="detailModal" aria-hidden="true" role="dialog" aria-modal="true">
  <div class="modal-panel" style="max-width:700px">
    <button class="icon-btn modal-close" id="closeDetailBtn" aria-label="Close detail">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M18 6 6 18M6 6l12 12"></path>
      </svg>
    </button>
    <div id="detailContent"></div>
  </div>
</div>

<!-- ── FOOTER ─────────────────────────────────────────────────────── -->
<footer class="footer">
  <div class="container">
    <div class="footer-top">
      <div class="footer-brand">
        <div class="eyebrow">Chrocklock</div>
        <h2 style="font-size:var(--text-xl);max-width:12ch;margin-bottom:var(--space-3)">A quiet house for watches meant to outlive noise.</h2>
        <p data-i18n="footer.copy">Jam tangan klasik mewah dalam bahasa visual yang tenang, puitis, dan monokrom.</p>
      </div>
      <div class="footer-links">
        <div>
          <small>Navigate</small>
          <a href="#home">Home</a>
          <a href="#about">About</a>
          <a href="#collection">Collection</a>
          <a href="#history">History</a>
        </div>
        <div>
          <small>Concierge</small>
          <a href="https://wa.me/6285601445637" target="_blank" rel="noopener noreferrer">WhatsApp</a>
          <a href="#contact">Private Order</a>
          <a href="#collection">Limited Pieces</a>
        </div>
        <div>
          <small>Notes</small>
          <p data-i18n="footer.note">Siap dikembangkan menuju domain, hosting, payment gateway, dan butik digital yang lebih utuh.</p>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 Chrocklock</span>
      <span>Classic luxury watches, shaped in monochrome.</span>
    </div>
  </div>
</footer>

<!-- WhatsApp float -->
<a class="wa-float"
   href="https://wa.me/6285601445637?text=Halo%20Chrocklock%2C%20saya%20ingin%20konsultasi%20koleksi%20jam%20tangan."
   target="_blank" rel="noopener noreferrer" aria-label="WhatsApp Chrocklock">
  <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor" aria-hidden="true">
    <path d="M20.52 3.48A11.86 11.86 0 0 0 12.07 0C5.5 0 .16 5.33.16 11.9c0 2.1.55 4.15 1.6 5.95L0 24l6.33-1.66a11.9 11.9 0 0 0 5.74 1.47h.01c6.57 0 11.91-5.34 11.91-11.91 0-3.18-1.24-6.16-3.47-8.42ZM12.08 21.8h-.01a9.88 9.88 0 0 1-5.03-1.37l-.36-.21-3.76.99 1-3.66-.23-.37a9.87 9.87 0 0 1-1.51-5.27c0-5.46 4.44-9.9 9.91-9.9 2.64 0 5.12 1.03 6.98 2.9a9.82 9.82 0 0 1 2.9 6.99c0 5.46-4.44 9.9-9.89 9.9Zm5.43-7.39c-.3-.15-1.77-.88-2.05-.98-.28-.1-.48-.15-.69.15-.2.3-.78.98-.95 1.18-.18.2-.35.23-.65.08-.3-.15-1.25-.46-2.39-1.48-.88-.79-1.48-1.77-1.65-2.07-.18-.3-.02-.46.13-.61.13-.13.3-.35.45-.53.15-.18.2-.3.3-.5.1-.2.05-.38-.03-.53-.08-.15-.69-1.66-.95-2.28-.25-.6-.5-.52-.69-.53h-.58c-.2 0-.53.08-.8.38-.28.3-1.05 1.03-1.05 2.51 0 1.48 1.08 2.91 1.23 3.11.15.2 2.12 3.23 5.13 4.53.72.31 1.29.5 1.73.64.73.23 1.4.2 1.92.12.59-.09 1.77-.73 2.03-1.43.25-.71.25-1.31.18-1.43-.08-.13-.28-.2-.58-.35Z"/>
  </svg>
  <span>WhatsApp</span>
</a>

<!-- ── DATA PRODUK UNTUK JS (dari PHP/DB) ───────────────────────── -->
<script>
/* Produk dari database, dikirim ke JS */
const dbProducts = <?= json_encode($produkList, JSON_UNESCAPED_UNICODE) ?>;
</script>
<script src="../JS/chroclock.js" defer></script>

</body>
</html>
