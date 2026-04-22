<?php
require_once 'data.php';
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
  <link rel="stylesheet" href="CSS/style.css" />
</head>
<body>

  <!-- Custom Cursor -->
  <div class="cursor" id="cursor"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <!-- Mobile Menu -->
  <div class="mobile-menu" id="mobileMenu">
    <a href="#about"      onclick="closeMobileMenu()">Tentang</a>
    <a href="#collections"onclick="closeMobileMenu()">Koleksi</a>
    <a href="#orders"     onclick="closeMobileMenu()">Pesanan</a>
    <a href="#order"      onclick="closeMobileMenu()">Beli</a>
  </div>

  <!-- ── NAVBAR ── -->
  <nav id="navbar">
    <a href="#" class="nav-logo">Chroclock</a>
    <ul class="nav-links">
      <li><a href="#about">Craft</a></li>
      <li><a href="#collections">Collections</a></li>
      <li><a href="#orders">History</a></li>
    </ul>
    <a href="#order" class="nav-cta">Order Now</a>
    <button class="hamburger" id="hamburger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </nav>

  <!-- ── HERO ── -->
  <section class="hero">
    <!-- Minimal watch/clock SVG illustration -->
    <svg class="hero-clock-svg" viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle cx="150" cy="150" r="140" stroke="currentColor" stroke-width="1"/>
      <circle cx="150" cy="150" r="120" stroke="currentColor" stroke-width="0.5"/>
      <circle cx="150" cy="150" r="4"   fill="currentColor"/>
      <!-- hour markers -->
      <?php for ($i = 0; $i < 12; $i++):
        $angle = $i * 30 * M_PI / 180;
        $x1 = 150 + 130 * sin($angle); $y1 = 150 - 130 * cos($angle);
        $x2 = 150 + 118 * sin($angle); $y2 = 150 - 118 * cos($angle);
      ?>
      <line x1="<?= round($x1,2) ?>" y1="<?= round($y1,2) ?>" x2="<?= round($x2,2) ?>" y2="<?= round($y2,2) ?>" stroke="currentColor" stroke-width="<?= ($i % 3 === 0) ? '2' : '1' ?>"/>
      <?php endfor; ?>
      <!-- hour hand  (10 o'clock) -->
      <line x1="150" y1="150" x2="108" y2="90"  stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
      <!-- minute hand (pointing ~2) -->
      <line x1="150" y1="150" x2="198" y2="98"  stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
      <!-- second hand -->
      <line x1="150" y1="150" x2="155" y2="210" stroke="currentColor" stroke-width="0.8" stroke-linecap="round"/>
    </svg>

    <p class="hero-eyebrow fade-in">Premium Indonesian Watch Brand</p>
    <h1 class="hero-title fade-in delay-1">Chro<em>clock</em></h1>
    <p class="hero-tagline fade-in delay-2">Time &nbsp;·&nbsp; Refined &nbsp;·&nbsp; Yours</p>
    <div class="hero-actions fade-in delay-3">
      <a href="#collections" class="btn-primary">Shop Now</a>
      <a href="#about" class="btn-ghost">Our Craft</a>
    </div>
  </section>

  <!-- ── TICKER ── -->
  <div class="ticker">
    <div class="ticker-inner">
      <?php
      $tickers = ['Swiss Movement','Sapphire Crystal','100m Water Resistant','2-Year Warranty','Handcrafted','Limited Edition'];
      $all = array_merge($tickers, $tickers); // duplicate for seamless loop
      foreach ($all as $item): ?>
        <span class="ticker-item"><?= htmlspecialchars($item) ?><span class="dot"></span></span>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- ── ABOUT ── -->
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

  <!-- ── COLLECTIONS ── -->
  <section class="collections" id="collections">
    <div class="section-header">
      <h2 class="section-title fade-in">Our<br /><em style="font-family:var(--serif);font-style:italic;">Collections</em></h2>
      <span class="section-label fade-in delay-2">Pilihan Terbaik</span>
    </div>
    <div class="collections-grid">
      <?php foreach ($products as $i => $p):
        $delay = $i > 0 ? " delay-{$i}" : '';
      ?>
      <div class="product-card fade-in<?= $delay ?>">
        <div class="product-num"><?= htmlspecialchars($p['num']) ?></div>
        <div class="product-icon"><?= $p['icon'] ?></div>
        <h3 class="product-name"><?= htmlspecialchars($p['name']) ?></h3>
        <p class="product-desc"><?= htmlspecialchars($p['desc']) ?></p>
        <p class="product-price"><?= htmlspecialchars($p['price']) ?></p>
        <span class="product-tag"><?= htmlspecialchars($p['tag']) ?></span>
        <span class="product-detail">→ View Details</span>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ── CRAFT STATS ── -->
  <section class="stats">
    <?php foreach ($stats as $i => $s):
      $delay = $i > 0 ? " delay-{$i}" : '';
    ?>
    <div class="stat-item fade-in<?= $delay ?>">
      <div class="stat-num"><?= htmlspecialchars($s['num']) ?></div>
      <div class="stat-label"><?= htmlspecialchars($s['label']) ?></div>
    </div>
    <?php endforeach; ?>
  </section>

  <!-- ── ORDER HISTORY ── -->
  <section class="order-history" id="orders">
    <div class="section-header">
      <h2 class="section-title fade-in">Your<br /><em style="font-family:var(--serif);font-style:italic;">Orders</em></h2>
      <span class="section-label fade-in delay-2">History</span>
    </div>

    <!-- Filter Buttons -->
    <div class="order-filters fade-in">
      <button class="filter-btn active" data-filter="all">All</button>
      <button class="filter-btn" data-filter="Delivered">Delivered</button>
      <button class="filter-btn" data-filter="Shipped">Shipped</button>
      <button class="filter-btn" data-filter="Processing">Processing</button>
    </div>

    <!-- Desktop Table -->
    <div class="order-table-wrap fade-in delay-1">
      <table class="order-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Product</th>
            <th>Status</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orders as $o): ?>
          <tr data-status="<?= htmlspecialchars($o['status']) ?>">
            <td><span class="order-id"><?= htmlspecialchars($o['id']) ?></span></td>
            <td><span class="order-date"><?= htmlspecialchars($o['date']) ?></span></td>
            <td><span class="order-product"><?= htmlspecialchars($o['product']) ?></span></td>
            <td><?= statusBadge($o['status']) ?></td>
            <td><span class="order-total"><?= htmlspecialchars($o['total']) ?></span></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Mobile Cards -->
    <div class="order-cards">
      <?php foreach ($orders as $o): ?>
      <div class="order-card" data-status="<?= htmlspecialchars($o['status']) ?>">
        <div class="order-card-header">
          <span class="order-card-id"><?= htmlspecialchars($o['id']) ?></span>
          <?= statusBadge($o['status']) ?>
        </div>
        <div class="order-card-row">
          <span>Product</span>
          <span class="order-product"><?= htmlspecialchars($o['product']) ?></span>
        </div>
        <div class="order-card-row">
          <span>Date</span>
          <span><?= htmlspecialchars($o['date']) ?></span>
        </div>
        <div class="order-card-row">
          <span>Total</span>
          <span class="order-total"><?= htmlspecialchars($o['total']) ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ── TESTIMONIALS ── -->
  <section class="testimonials">
    <div class="section-header">
      <h2 class="section-title fade-in">What They<br /><em style="font-family:var(--serif);font-style:italic;">Say</em></h2>
      <span class="section-label fade-in delay-2">Testimonials</span>
    </div>
    <div class="testimonial-grid">
      <?php foreach ($testimonials as $i => $t):
        $delay = $i > 0 ? " delay-{$i}" : '';
      ?>
      <div class="testimonial-card fade-in<?= $delay ?>">
        <span class="testimonial-mark">"</span>
        <p class="testimonial-text"><?= htmlspecialchars($t['text']) ?></p>
        <p class="testimonial-author">
          <strong><?= htmlspecialchars($t['author']) ?></strong>
          &nbsp;·&nbsp; <?= htmlspecialchars($t['role']) ?>
        </p>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ── CTA ── -->
  <section class="cta-section" id="order">
    <p class="cta-eyebrow fade-in">Mulai Koleksimu</p>
    <h2 class="cta-title fade-in delay-1">Own<br /><em>the Time</em></h2>
    <a href="#collections" class="btn-light fade-in delay-2">Order Now</a>
  </section>

  <!-- ── FOOTER ── -->
  <footer>
    <a href="#" class="footer-logo">Chroclock</a>
    <p class="footer-copy">© <?= date('Y') ?> Chroclock. All rights reserved.</p>
    <div class="footer-socials">
      <a href="#">Instagram</a>
      <a href="#">TikTok</a>
      <a href="#">Pinterest</a>
    </div>
  </footer>

  <script src="JS/script.js"></script>
</body>
</html>
