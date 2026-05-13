/* ─────────────────────────────────────────────────────────────────
   web.js  —  Chrocklock
   Produk dimuat dari PHP via variabel global `dbProducts`
   ───────────────────────────────────────────────────────────────── */

// ── Mapping produk dari DB ke format yang dipakai JS ─────────────
// dbProducts disuntik oleh Web.php sebagai JSON inline
const products = (typeof dbProducts !== 'undefined' ? dbProducts : []).map(p => ({
  id:    String(p.id_produk),
  name:  p.nama,
  price: p.harga,
  stok:  p.stok,
  edition: p.tag,
  image: `IMG/${p.gambar}`,
  desc:  { id: p.deskripsi, en: p.deskripsi }   // teks sama, bisa diperluas
}));

// ── Salinan teks dua bahasa ───────────────────────────────────────
const copy = {
  id: {
    'nav.home':'Home','nav.about':'About','nav.collection':'Collection','nav.history':'History',
    'hero.eyebrow':'Rumah jam tangan klasik terbatas',
    'hero.title':'Saat waktu berubah menjadi warisan.',
    'hero.desc':'Chrocklock merangkai jam tangan klasik dalam edisi terbatas—bukan sekadar penunjuk waktu, tetapi penanda momen yang ingin Anda simpan lebih lama dari satu kehidupan tren. Setiap detail dipilih dengan tenang: dial yang bersih, proporsi yang seimbang, dan kilau baja yang terasa seperti bisikan, bukan teriakan.',
    'hero.cta1':'Lihat koleksi','hero.cta2':'Baca cerita',
    'stats.editions':'Koleksi aktif','stats.concierge':'Respons concierge','stats.curated':'Estetika monokrom terkurasi',
    'about.eyebrow':'Tentang Chrocklock',
    'about.title':'Rumah monokrom untuk selera yang tidak mengejar waktu.',
    'about.lead':'Chrocklock hadir bagi penikmat jam tangan yang lebih percaya pada keheningan desain dibanding gemuruh logo. Dalam palet hitam putih, kami merayakan bentuk yang jujur: dial lapang, indeks yang tenang, dan finishing yang terasa dekat dengan kulit maupun cerita.',
    'about.quote':'"Keanggunan sejati tidak mengejar perhatian—ia menunggu untuk ditemukan."',
    'about.storyTitle':'Short stories',
    'about.story1':'Setiap koleksi dimulai dari satu pertanyaan sederhana: jika semua tren berhenti hari ini, apakah jam ini masih pantas dipakai dengan bangga?',
    'about.story2':'Kami tidak mengejar deretan referensi yang panjang, melainkan kehadiran yang utuh. Bezel yang tidak berlebihan, lug yang seimbang, strap yang terasa menyatu dengan pergelangan.',
    'collection.eyebrow':'Koleksi',
    'collection.title':'Potongan terbatas untuk lingkaran yang memilih dengan pelan.',
    'collection.lead':'Koleksi Chrocklock disusun seperti galeri kecil: jumlah yang terhitung, siluet yang bersih, dan detail yang hanya terlihat oleh mereka yang mau memperhatikan lebih lama dari satu pandang.',
    'history.eyebrow':'Sejarah',
    'history.title':'Dirancang dengan napas atelier lama, dihadirkan dalam ritme hari ini.',
    'history.i1t':'Asal mula',
    'history.i1d':'Berawal dari satu pertemuan sederhana antara penggemar jam tangan klasik dan meja kerja yang terlalu sering menjadi saksi tren lewat begitu saja. Di tengah kecepatan dunia, muncul keinginan untuk membuat sesuatu yang berjalan pelan—namun bertahan lebih lama.',
    'history.i2t':'Selera terkurasi',
    'history.i2d':'Arah desain Chrocklock menjauh dari keramaian warna dan bentuk. Kami memilih bahasa monokrom: hitam, putih, dan bayangan di antaranya.',
    'history.i3t':'Boutique masa depan',
    'history.i3d':'Struktur Chrocklock dibangun sejak awal untuk tumbuh tanpa kehilangan ketenangannya: siap disambungkan ke payment gateway, katalog yang lebih luas, dan domain yang lebih megah.',
    'checkout.eyebrow':'Pilihan Anda','checkout.title':'Cart & checkout',
    'checkout.formEyebrow':'Pemesanan concierge',
    'checkout.formTitle':'Lengkapi detail, kami yang akan menyusun sisanya.',
    'checkout.formLead':'Tuliskan nama dan cara kami menghubungi Anda. Setelah itu, biarkan kami menyiapkan jam pilihan Anda seolah kami menyiapkan hadiah yang akan Anda berikan pada diri sendiri di masa depan.',
    'checkout.submit':'Lanjutkan dengan concierge checkout',
    'form.name':'Nama lengkap','form.email':'Email',
    'form.phone':'No. telepon / WhatsApp','form.address':'Catatan pengiriman',
    'footer.copy':'Jam tangan klasik mewah dalam bahasa visual yang tenang, puitis, dan monokrom.',
    'footer.note':'Siap dikembangkan menuju domain, hosting, payment gateway, dan butik digital yang lebih utuh.'
  },
  en: {
    'nav.home':'Home','nav.about':'About','nav.collection':'Collection','nav.history':'History',
    'hero.eyebrow':'Limited classic watch house',
    'hero.title':'Where time turns into heirloom.',
    'hero.desc':'Chrocklock curates classic watches in limited editions—not merely to tell the hour, but to mark moments you wish to keep beyond the life of a trend. Each detail is chosen in quiet confidence: a clean dial, measured proportions, and steel that glows like a whisper rather than a shout.',
    'hero.cta1':'Explore collection','hero.cta2':'Read the story',
    'stats.editions':'Active collections','stats.concierge':'Concierge response','stats.curated':'Curated monochrome aesthetic',
    'about.eyebrow':'About Chrocklock',
    'about.title':'A monochrome house for those who do not chase time.',
    'about.lead':'Chrocklock is made for those who trust quiet design more than loud branding. Within a restrained black-and-white palette, we honor honest forms: open dials, composed indices, and finishes that feel as natural on the wrist as they do in a story.',
    'about.quote':'"True elegance never asks for attention—it waits to be noticed."',
    'about.storyTitle':'Short stories',
    'about.story1':'Every collection begins with a single question: if every trend ended today, would this watch still be worn with pride?',
    'about.story2':'We are not chasing a long list of references, but a complete presence. A bezel without excess, balanced lugs, a strap that feels like an extension of your hand.',
    'collection.eyebrow':'Collection',
    'collection.title':'Limited pieces for a circle that chooses slowly.',
    'collection.lead':'The Chrocklock collection is arranged like an intimate gallery: counted pieces, uncluttered silhouettes, and details for those willing to look a moment longer.',
    'history.eyebrow':'History',
    'history.title':'Shaped with the breath of old ateliers, tuned to today\'s rhythm.',
    'history.i1t':'Origin',
    'history.i1d':'It began with a simple encounter between a lover of classic watches and a workbench that had seen too many trends pass by.',
    'history.i2t':'Curated taste',
    'history.i2d':'Chrocklock\'s design direction walks away from visual noise. We speak in monochrome: black, white, and the shades in between.',
    'history.i3t':'Future boutique',
    'history.i3d':'From the start, Chrocklock has been structured to grow without losing its quiet: prepared for payment gateways, wider catalogues, and more commanding domains.',
    'checkout.eyebrow':'Your selection','checkout.title':'Cart & checkout',
    'checkout.formEyebrow':'Concierge order',
    'checkout.formTitle':'Share the details—we\'ll compose the rest.',
    'checkout.formLead':'Tell us your name and how to reach you. From there, we\'ll prepare your chosen watch as if we were arranging a gift you intend to give your future self.',
    'checkout.submit':'Proceed with concierge checkout',
    'form.name':'Full name','form.email':'Email',
    'form.phone':'Phone / WhatsApp','form.address':'Delivery notes',
    'footer.copy':'Classic luxury watches in a quiet, poetic, monochrome language.',
    'footer.note':'Ready to grow into a fuller digital boutique with domain, hosting, payment gateway, and expanded catalogue.'
  }
};

// ── State ─────────────────────────────────────────────────────────
let currentLang  = 'id';
let currentTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
let cart = [];

document.documentElement.setAttribute('data-theme', currentTheme);

// ── Format harga ──────────────────────────────────────────────────
const formatCurrency = value =>
  new Intl.NumberFormat(
    currentLang === 'id' ? 'id-ID' : 'en-US',
    { style:'currency', currency: currentLang === 'id' ? 'IDR' : 'USD', maximumFractionDigits:0 }
  ).format(currentLang === 'id' ? value : Math.round(value / 16000));

// ── i18n ──────────────────────────────────────────────────────────
function applyLanguage() {
  document.querySelectorAll('[data-i18n]').forEach(node => {
    const key = node.dataset.i18n;
    if (copy[currentLang][key]) node.textContent = copy[currentLang][key];
  });
  document.documentElement.lang = currentLang === 'id' ? 'id' : 'en';
  updateCartBadge();
  renderCart();
}

// ── Cart badge ────────────────────────────────────────────────────
function updateCartBadge() {
  const badge = document.getElementById('cartBadge');
  if (!badge) return;
  const total = cart.reduce((sum, i) => sum + i.qty, 0);
  badge.textContent = total;
  badge.style.display = total > 0 ? 'flex' : 'none';
}

// ── Cart modal open/close ─────────────────────────────────────────
const cartModal   = document.getElementById('cartModal');
const detailModal = document.getElementById('detailModal');

function openCart() {
  renderCart();
  cartModal.classList.add('open');
  cartModal.setAttribute('aria-hidden', 'false');
  document.body.style.overflow = 'hidden';
}
function closeCart() {
  cartModal.classList.remove('open');
  cartModal.setAttribute('aria-hidden', 'true');
  document.body.style.overflow = '';
}
function openDetail(id) {
  const p = products.find(x => x.id === String(id));
  if (!p) return;
  const content = document.getElementById('detailContent');
  content.innerHTML = `
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--space-6);align-items:start">
      <div style="border-radius:var(--radius-lg);overflow:hidden;border:1px solid var(--color-border)">
        <img src="${p.image}" alt="${p.name}"
             style="width:100%;aspect-ratio:1/1;object-fit:cover;filter:grayscale(100%)"
             onerror="this.src='https://pplx-res.cloudinary.com/image/upload/pplx_search_images/96c07fd29119028bb97f30f16409513200bd5f6b.jpg'">
      </div>
      <div>
        <span class="badge" style="margin-bottom:var(--space-3);display:inline-flex">${p.edition}</span>
        <h2 style="font-family:var(--font-display);font-size:var(--text-xl);margin-bottom:var(--space-3)">${p.name}</h2>
        <p style="color:var(--color-text-muted);margin-bottom:var(--space-5);white-space:pre-line">${p.desc[currentLang]}</p>
        <div style="font-size:var(--text-xl);font-weight:800;margin-bottom:var(--space-5)">${formatCurrency(p.price)}</div>
        ${p.stok > 0
          ? `<div style="display:flex;gap:var(--space-3)">
               <button class="btn btn-primary" onclick="addToCart('${p.id}');closeDetail()">🛒 Tambah ke cart</button>
             </div>
             <p style="font-size:var(--text-sm);color:var(--color-text-faint);margin-top:var(--space-3)">Stok: ${p.stok} unit tersisa</p>`
          : `<span class="badge" style="color:var(--color-text-faint)">Stok habis</span>`
        }
      </div>
    </div>`;
  detailModal.classList.add('open');
  detailModal.setAttribute('aria-hidden', 'false');
  document.body.style.overflow = 'hidden';
}
function closeDetail() {
  detailModal.classList.remove('open');
  detailModal.setAttribute('aria-hidden', 'true');
  document.body.style.overflow = '';
}

// ── Tambah / ubah qty di cart ─────────────────────────────────────
function addToCart(id) {
  const found = cart.find(i => i.id === String(id));
  const prod  = products.find(p => p.id === String(id));
  if (!prod || prod.stok <= 0) return;
  if (found) {
    found.qty = Math.min(found.qty + 1, prod.stok);
  } else {
    cart.push({ id: String(id), qty: 1 });
  }
  updateCartBadge();
  renderCart();
}
function updateQty(id, delta) {
  const item = cart.find(e => e.id === String(id));
  if (!item) return;
  item.qty += delta;
  if (item.qty <= 0) cart = cart.filter(e => e.id !== String(id));
  updateCartBadge();
  renderCart();
}

// ── Render cart list + summary ────────────────────────────────────
function renderCart() {
  const cartList = document.getElementById('cartList');
  const summary  = document.getElementById('summaryBox');
  if (!cartList) return;

  if (cart.length === 0) {
    cartList.innerHTML = `<p style="color:var(--color-text-muted)">${
      currentLang === 'id'
        ? 'Cart masih kosong. Pilih koleksi terlebih dahulu.'
        : 'Your cart is empty. Select a watch first.'
    }</p>`;
    if (summary) summary.innerHTML = '';
    return;
  }

  const detailed = cart.map(item => ({
    ...item,
    product: products.find(p => p.id === item.id)
  })).filter(i => i.product);

  const subtotal = detailed.reduce((sum, i) => sum + i.product.price * i.qty, 0);
  const service  = Math.round(subtotal * 0.02);
  const total    = subtotal + service;

  cartList.innerHTML = detailed.map(item => `
    <div class="cart-item">
      <img class="cart-thumb" src="${item.product.image}" alt="${item.product.name}"
           width="66" height="66" loading="lazy" decoding="async"
           onerror="this.src='https://pplx-res.cloudinary.com/image/upload/pplx_search_images/96c07fd29119028bb97f30f16409513200bd5f6b.jpg'">
      <div>
        <strong>${item.product.name}</strong>
        <p style="font-size:var(--text-sm);color:var(--color-text-muted)">${formatCurrency(item.product.price)}</p>
      </div>
      <div class="qty-controls">
        <button aria-label="Kurangi" onclick="updateQty('${item.product.id}',-1)">−</button>
        <span>${item.qty}</span>
        <button aria-label="Tambah" onclick="updateQty('${item.product.id}',1)">+</button>
      </div>
    </div>`).join('');

  if (summary) {
    summary.innerHTML = `
      <div class="summary-line"><span>Subtotal</span><span>${formatCurrency(subtotal)}</span></div>
      <div class="summary-line"><span>Concierge service (2%)</span><span>${formatCurrency(service)}</span></div>
      <div class="summary-line total"><span>Total</span><span>${formatCurrency(total)}</span></div>`;
  }
}

// ── Submit checkout → kirim ke PHP + WhatsApp ─────────────────────
document.getElementById('checkoutForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  const form    = new FormData(e.target);
  const btn     = document.getElementById('checkoutSubmit');
  const success = document.getElementById('orderSuccess');
  const msg     = document.getElementById('orderSuccessMsg');

  btn.disabled   = true;
  btn.textContent = currentLang === 'id' ? 'Memproses…' : 'Processing…';

  // Buat daftar item untuk dikirim
  const detailed = cart.map(item => {
    const p = products.find(x => x.id === item.id);
    return { id: item.id, name: p?.name, qty: item.qty, price: p?.price };
  });
  const subtotal = detailed.reduce((s, i) => s + (i.price || 0) * i.qty, 0);
  const total    = subtotal + Math.round(subtotal * 0.02);

  // POST ke Web.php (same file)
  try {
    const payload = new FormData();
    payload.append('action',  'checkout');
    payload.append('name',    form.get('name'));
    payload.append('email',   form.get('email'));
    payload.append('phone',   form.get('phone'));
    payload.append('address', form.get('address') || '');
    payload.append('items',   JSON.stringify(detailed));
    payload.append('total',   total);

    const res  = await fetch('Web.php', { method: 'POST', body: payload });
    const data = await res.json();

    if (data.success) {
      // Tampilkan pesan sukses
      e.target.style.display = 'none';
      success.style.display  = 'block';
      msg.textContent = currentLang === 'id'
        ? `Order ID Anda: ${data.order_id}. Tim kami akan menghubungi Anda segera.`
        : `Your Order ID: ${data.order_id}. Our team will contact you shortly.`;

      // Buka WhatsApp juga
      const orderText = detailed.map(i => `${i.name} x${i.qty}`).join(', ');
      const waMsg = currentLang === 'id'
        ? `Halo Chrocklock, saya ingin melanjutkan pesanan (${data.order_id}) untuk: ${orderText}. Nama: ${form.get('name')}. WhatsApp: ${form.get('phone')}.`
        : `Hello Chrocklock, I'd like to confirm order (${data.order_id}) for: ${orderText}. Name: ${form.get('name')}. WhatsApp: ${form.get('phone')}.`;
      window.open(`https://wa.me/6285601445637?text=${encodeURIComponent(waMsg)}`, '_blank', 'noopener');

      cart = [];
      updateCartBadge();
    } else {
      alert(data.message || 'Terjadi kesalahan. Coba lagi.');
      btn.disabled   = false;
      btn.textContent = copy[currentLang]['checkout.submit'];
    }
  } catch (err) {
    console.error(err);
    // Fallback: kirim ke WhatsApp langsung
    const orderText = detailed.map(i => `${i.name} x${i.qty}`).join(', ');
    const waMsg = `Halo Chrocklock, pesanan: ${orderText}. Nama: ${form.get('name')}. WhatsApp: ${form.get('phone')}.`;
    window.open(`https://wa.me/6285601445637?text=${encodeURIComponent(waMsg)}`, '_blank', 'noopener');
    btn.disabled   = false;
    btn.textContent = copy[currentLang]['checkout.submit'];
  }
});

// ── Event listeners tombol produk (delegasi) ──────────────────────
document.addEventListener('click', (e) => {
  // Tombol tambah ke cart (di card)
  const addBtn = e.target.closest('.btn-add-cart');
  if (addBtn) {
    addToCart(addBtn.dataset.id);
    openCart();
    return;
  }
  // Tombol detail
  const detailBtn = e.target.closest('.btn-detail');
  if (detailBtn) {
    openDetail(detailBtn.dataset.id);
    return;
  }
});

// ── Header buttons ────────────────────────────────────────────────
document.getElementById('langToggle').addEventListener('click', () => {
  currentLang = currentLang === 'id' ? 'en' : 'id';
  applyLanguage();
});
document.getElementById('themeToggle').addEventListener('click', () => {
  currentTheme = currentTheme === 'dark' ? 'light' : 'dark';
  document.documentElement.setAttribute('data-theme', currentTheme);
});
document.getElementById('openCartBtn').addEventListener('click', openCart);
document.getElementById('closeCartBtn').addEventListener('click', closeCart);
document.getElementById('closeDetailBtn').addEventListener('click', closeDetail);

cartModal.addEventListener('click',   e => { if (e.target === cartModal)   closeCart(); });
detailModal.addEventListener('click', e => { if (e.target === detailModal) closeDetail(); });

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') { closeCart(); closeDetail(); }
});

// ── Reveal on scroll ──────────────────────────────────────────────
const revealObserver = new IntersectionObserver(
  entries => entries.forEach(entry => {
    if (entry.isIntersecting) entry.target.classList.add('is-visible');
  }),
  { threshold: 0.1 }
);
document.querySelectorAll('[data-reveal]').forEach(el => revealObserver.observe(el));

// ── Init ──────────────────────────────────────────────────────────
applyLanguage();
