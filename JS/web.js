if (typeof products === 'undefined') {
  var products = [
    { id: 'atelier-noir-01', name: 'Atelier Noir 01', price: 18500000, edition: '12 pieces', images: ['../Gambar/Jam1_1.png', '../Gambar/Jam1_2.png', '../Gambar/Jam1_3.png'], desc: { id: 'Dress watch hitam dengan dial tenang, kilau baja yang lembut, dan kehadiran formal yang tidak berlebihan.', en: 'A black-dial dress watch with a calm face, soft steel glow, and a formal presence without excess.' } },
    { id: 'atelier-blanc-02', name: 'Atelier Blanc 02', price: 16200000, edition: '15 pieces', images: ['../Gambar/Jam1_1.png', '../Gambar/Jam1_2.png', '../Gambar/Jam1_3.png'], desc: { id: 'White dial klasik dengan strap hitam; sederhana, jernih, dan terasa akrab seperti benda warisan.', en: 'A classic white dial with black strap; simple, lucid, and familiar like an inherited object.' } },
    { id: 'atelier-archive-03', name: 'Atelier Archive 03', price: 21900000, edition: '8 pieces', images: ['../Gambar/Jam1_1.png', '../Gambar/Jam1_2.png', '../Gambar/Jam1_3.png'], desc: { id: 'Nuansa vintage yang lebih pekat dengan numerik klasik dan proporsi case yang terasa layak dikoleksi lama.', en: 'A denser vintage mood with classic numerals and case proportions that feel worthy of long-term collecting.' } }
  ];
}

const copy = {
  id: {
    'nav.home': 'Home', 'nav.about': 'About', 'nav.collection': 'Collection', 'nav.history': 'History', 'nav.checkout': 'Checkout',
    'hero.eyebrow': 'Jam tangan klasik terbatas', 'hero.title': 'Saat waktu berubah menjadi warisan.', 'hero.desc': 'Chrocklock merangkai jam tangan klasik dalam edisi terbatas—bukan sekadar penunjuk waktu, tetapi penanda momen yang ingin Anda simpan lebih lama dari satu kehidupan tren. Setiap detail dipilih dengan tenang: dial yang bersih, proporsi yang seimbang, dan kilau baja yang terasa seperti bisikan, bukan teriakan.', 'hero.cta1': 'Lihat koleksi', 'hero.cta2': 'Baca cerita',
    'stats.editions': 'Edisi terbatas per tahun', 'stats.concierge': 'Respons concierge', 'stats.curated': 'Estetika monokrom terkurasi',
    'about.eyebrow': 'Tentang Chrocklock', 'about.title': 'Rumah monokrom untuk selera yang tidak mengejar waktu.', 'about.lead': 'Chrocklock hadir bagi penikmat jam tangan yang lebih percaya pada keheningan desain dibanding gemuruh logo. Dalam palet hitam putih, kami merayakan bentuk yang jujur: dial lapang, indeks yang tenang, dan finishing yang terasa dekat dengan kulit maupun cerita.', 'about.quote': '“Keanggunan sejati tidak mengejar perhatian—ia menunggu untuk ditemukan.”', 'about.storyTitle': 'Short stories', 'about.story1': 'Setiap koleksi dimulai dari satu pertanyaan sederhana: jika semua tren berhenti hari ini, apakah jam ini masih pantas dipakai dengan bangga? Dari sana, kami memilih proporsi, sudut, dan tekstur yang tidak meminta maaf pada waktu—hanya berdialog pelan dengannya.', 'about.story2': 'Kami tidak mengejar deretan referensi yang panjang, melainkan kehadiran yang utuh. Bezel yang tidak berlebihan, lug yang seimbang, strap yang terasa menyatu dengan pergelangan—semua diarahkan pada satu hal: jam yang layak mewakili Anda, bahkan saat Anda diam.',
    'collection.eyebrow': 'Koleksi', 'collection.title': 'Potongan terbatas untuk lingkaran yang memilih dengan pelan.', 'collection.lead': 'Koleksi Chrocklock disusun seperti galeri kecil: jumlah yang terhitung, siluet yang bersih, dan detail yang hanya terlihat oleh mereka yang mau memperhatikan lebih lama dari satu pandang. Setiap jam hadir bukan untuk memenuhi ruang, melainkan untuk mengisi cerita Anda berikutnya.',
    'history.eyebrow': 'Sejarah', 'history.title': 'Dirancang dengan napas atelier lama, dihadirkan dalam ritme hari ini.', 'history.i1t': 'Asal mula', 'history.i1d': 'Berawal dari satu pertemuan sederhana antara penggemar jam tangan klasik dan meja kerja yang terlalu sering menjadi saksi tren lewat begitu saja. Di tengah kecepatan dunia, muncul keinginan untuk membuat sesuatu yang berjalan pelan—namun bertahan lebih lama.', 'history.i2t': 'Selera terkurasi', 'history.i2d': 'Arah desain Chrocklock menjauh dari keramaian warna dan bentuk. Kami memilih bahasa monokrom: hitam, putih, dan bayangan di antaranya. Di dalamnya, setiap garis dan permukaan diberi ruang untuk bernapas, seolah jam ini ditata di etalase atelier kecil yang hanya dikunjungi mereka yang tahu apa yang mereka cari.', 'history.i3t': 'Boutique masa depan', 'history.i3d': 'Struktur Chrocklock dibangun sejak awal untuk tumbuh tanpa kehilangan ketenangannya: siap disambungkan ke payment gateway, katalog yang lebih luas, dan domain yang lebih megah—namun tetap setia pada satu janji: menyuguhkan jam tangan klasik yang terasa seperti potongan puisi di pergelangan tangan.',
    'checkout.eyebrow': 'Pilihan Anda', 'checkout.title': 'Cart & checkout', 'checkout.formEyebrow': 'Pemesanan concierge', 'checkout.formTitle': 'Lengkapi detail, kami yang akan menyusun sisanya.', 'checkout.formLead': 'Tuliskan nama dan cara kami menghubungi Anda. Setelah itu, biarkan kami menyiapkan jam pilihan Anda seolah kami menyiapkan hadiah yang akan Anda berikan pada diri sendiri di masa depan.',
    'form.name': 'Nama lengkap', 'form.email': 'Email', 'form.phone': 'No. telepon', 'form.address': 'Catatan pengiriman',
    'footer.copy': 'Jam tangan klasik mewah dalam bahasa visual yang tenang, puitis, dan monokrom.', 'footer.note': 'Siap dikembangkan menuju domain, hosting, payment gateway, dan butik digital yang lebih utuh.'
  },
  en: {
    'nav.home': 'Home', 'nav.about': 'About', 'nav.collection': 'Collection', 'nav.history': 'History', 'nav.checkout': 'Checkout',
    'hero.eyebrow': 'Limited classic watch', 'hero.title': 'Where time turns into heirloom.', 'hero.desc': 'Chrocklock curates classic watches in limited editions—not merely to tell the hour, but to mark moments you wish to keep beyond the life of a trend. Each detail is chosen in quiet confidence: a clean dial, measured proportions, and steel that glows like a whisper rather than a shout.', 'hero.cta1': 'Explore collection', 'hero.cta2': 'Read the story',
    'stats.editions': 'Limited editions yearly', 'stats.concierge': 'Concierge response', 'stats.curated': 'Curated monochrome aesthetic',
    'about.eyebrow': 'About Chrocklock', 'about.title': 'A monochrome house for those who do not chase time.', 'about.lead': 'Chrocklock is made for those who trust quiet design more than loud branding. Within a restrained black-and-white palette, we honor honest forms: open dials, composed indices, and finishes that feel as natural on the wrist as they do in a story.', 'about.quote': '“True elegance never asks for attention—it waits to be noticed.”', 'about.storyTitle': 'Short stories', 'about.story1': 'Every collection begins with a single question: if every trend ended today, would this watch still be worn with pride? From that point, we choose proportions, angles, and textures that do not apologize to time—they simply converse softly with it.', 'about.story2': 'We are not chasing a long list of references, but a complete presence. A bezel without excess, balanced lugs, a strap that feels like an extension of your hand.',
    'collection.eyebrow': 'Collection', 'collection.title': 'Limited pieces for a circle that chooses slowly.', 'collection.lead': 'The Chrocklock collection is arranged like an intimate gallery: counted pieces, uncluttered silhouettes, and details for those willing to look a moment longer.',
    'history.eyebrow': 'History', 'history.title': 'Shaped with the breath of old ateliers, tuned to today’s rhythm.', 'history.i1t': 'Origin', 'history.i1d': 'It began with a simple encounter between a lover of classic watches and a workbench that had seen too many trends pass by.', 'history.i2t': 'Curated taste', 'history.i2d': 'Chrocklock’s design direction walks away from visual noise. We speak in monochrome: black, white, and the shades in between.', 'history.i3t': 'Future boutique', 'history.i3d': 'From the start, Chrocklock has been structured to grow without losing its quiet.',
    'checkout.eyebrow': 'Your selection', 'checkout.title': 'Cart & checkout', 'checkout.formEyebrow': 'Concierge order', 'checkout.formTitle': 'Share the details—we’ll compose the rest.', 'checkout.formLead': 'Tell us your name and how to reach you. From there, we’ll prepare your chosen watch as if we were arranging a gift you intend to give your future self.',
    'form.name': 'Full name', 'form.email': 'Email', 'form.phone': 'Phone', 'form.address': 'Delivery notes',
    'footer.copy': 'Classic luxury watches in a quiet, poetic, monochrome language.', 'footer.note': 'Ready to grow into a fuller digital boutique with domain, hosting, payment gateway, and expanded catalogue.'
  }
};

let currentLang = 'id';
let currentTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
let cart = [];

const cartModal = document.getElementById('cartModal');
const cartList = document.getElementById('cartList');
const summary = document.getElementById('summaryBox');

document.documentElement.setAttribute('data-theme', currentTheme);

const formatCurrency = value => new Intl.NumberFormat(currentLang === 'id' ? 'id-ID' : 'en-US', {
  style: 'currency',
  currency: currentLang === 'id' ? 'IDR' : 'USD',
  maximumFractionDigits: 0
}).format(currentLang === 'id' ? value : Math.round(value / 16000));

function applyLanguage() {
  document.querySelectorAll('[data-i18n]').forEach(node => {
    const key = node.dataset.i18n;
    if (copy[currentLang][key]) node.textContent = copy[currentLang][key];
  });
  document.documentElement.lang = currentLang === 'id' ? 'id' : 'en';
  renderProducts();
  renderCart();
}

function renderProducts() {
  const grid = document.getElementById('productGrid');
  if (!grid) return;
  // If products are from database, they might have 'image' instead of 'images' array
  grid.innerHTML = products.map(product => {
    const mainImg = Array.isArray(product.images) ? product.images[0] : (product.image || 'placeholder.png');
    const images = Array.isArray(product.images) ? product.images : [mainImg];

    return `
    <article class="product-card" data-product-id="${product.id}" data-reveal>
      <div class="product-media" data-product-slider>
        ${images.map((img, index) => `
          <img src="${img}" alt="${product.name} view ${index + 1}" class="product-slide ${index === 0 ? 'is-active' : ''}" loading="lazy">
        `).join('')}
      </div>
      <div class="product-body">
        <div class="product-meta">
          <div>
            <h3>${product.name}</h3>
            <span class="badge">${product.edition || 'Limited Edition'}</span>
          </div>
          <div class="price">${formatCurrency(product.price)}</div>
        </div>
        <p class="product-desc">${product.desc[currentLang] || product.desc}</p>
        <div class="product-actions">
          <button class="btn btn-primary add-to-cart" data-id="${product.id}">${currentLang === 'id' ? 'Tambah ke cart' : 'Add to cart'}</button>
          <button class="btn btn-secondary" onclick="openCart()">${currentLang === 'id' ? 'Checkout' : 'Checkout'}</button>
        </div>
      </div>
    </article>
  `}).join('');
  initProductHoverSliders();
  initReveal();
}

function renderCart() {
  if (!cartList || !summary) return;
  if (!cart.length) {
    cartList.innerHTML = `<p>${currentLang === 'id' ? 'Cart masih kosong. Pilih koleksi terlebih dahulu.' : 'Your cart is empty. Select a watch first.'}</p>`;
    summary.innerHTML = '';
    return;
  }

  const detailed = cart.map(item => ({ ...item, product: products.find(p => p.id === item.id) }));
  const subtotal = detailed.reduce((sum, item) => sum + (item.product ? item.product.price * item.qty : 0), 0);
  const service = Math.round(subtotal * 0.02);
  const total = subtotal + service;

  cartList.innerHTML = detailed.map(item => {
    if (!item.product) return '';
    const thumb = Array.isArray(item.product.images) ? item.product.images[0] : (item.product.image || '');
    return `
    <article class="cart-item">
      <img class="cart-thumb" src="${thumb}" alt="${item.product.name}">
      <div>
        <strong>${item.product.name}</strong>
        <p>${formatCurrency(item.product.price)}</p>
      </div>
      <div class="qty-controls">
        <button type="button" class="qty-minus" data-id="${item.product.id}">-</button>
        <span>${item.qty}</span>
        <button type="button" class="qty-plus" data-id="${item.product.id}">+</button>
      </div>
    </article>
  `}).join('');

  summary.innerHTML = `
    <div class="summary-line"><span>Subtotal</span><strong>${formatCurrency(subtotal)}</strong></div>
    <div class="summary-line"><span>Service</span><strong>${formatCurrency(service)}</strong></div>
    <div class="summary-line total"><span>Total</span><strong>${formatCurrency(total)}</strong></div>
  `;
}

function addToCart(productId) {
  const found = cart.find(item => item.id === productId);
  if (found) found.qty += 1;
  else cart.push({ id: productId, qty: 1 });
  renderCart();
  openCart();
}

function updateQty(productId, delta) {
  const item = cart.find(i => i.id === productId);
  if (!item) return;
  item.qty += delta;
  if (item.qty <= 0) cart = cart.filter(i => i.id !== productId);
  renderCart();
}

function openCart() {
  if (cartModal) {
    cartModal.classList.add('open');
    cartModal.setAttribute('aria-hidden', 'false');
  }
}

function closeCart() {
  if (cartModal) {
    cartModal.classList.remove('open');
    cartModal.setAttribute('aria-hidden', 'true');
  }
}

function initHeroSlider() {
  const slides = document.querySelectorAll('.hero-slide');
  if (!slides.length) return;
  let current = 0;
  setInterval(() => {
    slides[current].classList.remove('is-active');
    current = (current + 1) % slides.length;
    slides[current].classList.add('is-active');
  }, 3500);
}

function initProductHoverSliders() {
  const cards = document.querySelectorAll('[data-product-slider]');
  cards.forEach(card => {
    const slides = card.querySelectorAll('.product-slide');
    if (slides.length < 2) return;
    let current = 0;
    let interval = null;

    const showSlide = index => {
      slides.forEach(slide => slide.classList.remove('is-active'));
      slides[index].classList.add('is-active');
    };

    const startLoop = () => {
      if (interval) return;
      interval = setInterval(() => {
        current = (current + 1) % slides.length;
        showSlide(current);
      }, 1200);
    };

    const stopLoop = () => {
      clearInterval(interval);
      interval = null;
      current = 0;
      showSlide(current);
    };

    card.addEventListener('mouseenter', startLoop);
    card.addEventListener('mouseleave', stopLoop);
  });
}

const revealObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) entry.target.classList.add('is-visible');
  });
}, { threshold: 0.12 });

function initReveal() {
  document.querySelectorAll('[data-reveal]').forEach(el => revealObserver.observe(el));
}

// MIDTRANS LOGIC
const checkoutForm = document.getElementById('checkoutForm');
if (checkoutForm) {
  checkoutForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const form = new FormData(e.target);

    const detailed = cart.map(item => ({ ...item, product: products.find(p => p.id === item.id) }));
    const subtotal = detailed.reduce((sum, item) => sum + (item.product ? item.product.price * item.qty : 0), 0);
    const service = Math.round(subtotal * 0.02);
    const total = subtotal + service;

    if (!total) {
      alert(currentLang === 'id' ? 'Keranjang masih kosong.' : 'Cart is empty.');
      return;
    }

    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.textContent = 'Processing...';

    try {
      const isHtmlFolder = window.location.pathname.includes('/HTML/');
      const fetchUrl = isHtmlFolder ? '../PHP/midtrans_process.php' : (window.location.pathname.includes('/PHP/') ? 'midtrans_process.php' : 'PHP/midtrans_process.php');

      const response = await fetch(fetchUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          name: form.get('name'),
          email: form.get('email'),
          phone: form.get('phone'),
          total: total
        })
      });

      const data = await response.json();
      if (data.token) {
        const updateStatus = async (status) => {
          const updateUrl = isHtmlFolder ? '../PHP/update_status.php' : (window.location.pathname.includes('/PHP/') ? 'update_status.php' : 'PHP/update_status.php');
          await fetch(updateUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ order_id: data.order_id, status: status })
          });
        };

        window.snap.pay(data.token, {
          onSuccess: function (result) {
            updateStatus('success');
            alert(currentLang === 'id' ? 'Pembayaran berhasil!' : 'Payment success!');
            cart = [];
            renderCart();
            closeCart();
          },
          onPending: function (result) {
            updateStatus('pending');
            alert(currentLang === 'id' ? 'Pembayaran tertunda.' : 'Payment pending.');
            closeCart();
          },
          onError: function (result) {
            updateStatus('error');
            alert(currentLang === 'id' ? 'Pembayaran gagal.' : 'Payment failed.');
          },
          onClose: function () {
            console.log('customer closed the popup');
          }
        });
      } else {
        alert('Error: ' + (data.error || 'Gagal mendapatkan token Midtrans'));
      }
    } catch (err) {
      console.error(err);
      alert('Terjadi kesalahan saat menghubungi server.');
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;
    }
  });
}

// LOGIN STATUS
async function checkLoginStatus() {
  try {
    const isHtmlFolder = window.location.pathname.includes('/HTML/');
    const fetchUrl = isHtmlFolder ? '../PHP/get_session.php' : (window.location.pathname.includes('/PHP/') ? 'get_session.php' : 'PHP/get_session.php');

    const response = await fetch(fetchUrl);
    if (!response.ok) throw new Error('Network response was not ok');

    const data = await response.json();
    const headerActions = document.querySelector('.header-actions');
    if (!headerActions) return;

    const loginLink = headerActions.querySelector('a[href*="login.php"]');

    if (data.logged_in && loginLink) {
      const displayUser = data.user ? data.user : 'User';
      const logoutUrl = isHtmlFolder ? '../PHP/logout.php' : (window.location.pathname.includes('/PHP/') ? 'logout.php' : 'PHP/logout.php');
      const userInfo = document.createElement('div');
      userInfo.className = 'user-info';
      userInfo.innerHTML = `
        <span>${displayUser}</span>
        <a href="${logoutUrl}" class="icon-btn" title="Logout" aria-label="Logout">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
        </a>
      `;
      loginLink.replaceWith(userInfo);
    }
  } catch (err) {
    console.error('Failed to check login status:', err);
  }
}

document.getElementById('langToggle').addEventListener('click', () => {
  currentLang = currentLang === 'id' ? 'en' : 'id';
  applyLanguage();
});

document.getElementById('themeToggle').addEventListener('click', () => {
  currentTheme = currentTheme === 'dark' ? 'light' : 'dark';
  document.documentElement.setAttribute('data-theme', currentTheme);
});

const openCartBtn = document.getElementById('openCartBtn');
if (openCartBtn) openCartBtn.addEventListener('click', openCart);

const closeCartBtn = document.getElementById('closeCartBtn');
if (closeCartBtn) closeCartBtn.addEventListener('click', closeCart);

if (cartModal) {
  cartModal.addEventListener('click', e => {
    if (e.target === cartModal) closeCart();
  });
}

document.addEventListener('click', e => {
  if (e.target.classList.contains('add-to-cart')) addToCart(e.target.dataset.id);
  if (e.target.classList.contains('qty-plus')) updateQty(e.target.dataset.id, 1);
  if (e.target.classList.contains('qty-minus')) updateQty(e.target.dataset.id, -1);
});

document.addEventListener('DOMContentLoaded', () => {
  checkLoginStatus();
  applyLanguage();
  initHeroSlider();
});