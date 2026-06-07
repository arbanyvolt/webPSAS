if (typeof products === 'undefined') {
  var products = [
    { id: 'atelier-noir-01', name: 'Atelier Noir 01', price: 18500000, edition: '12 pieces', images: ['../Gambar/Jam1_1.png', '../Gambar/Jam1_2.png', '../Gambar/Jam1_3.png'], desc: 'A black-dial dress watch with a calm face, soft steel glow, and a formal presence without excess.' },
    { id: 'atelier-blanc-02', name: 'Atelier Blanc 02', price: 16200000, edition: '15 pieces', images: ['../Gambar/Jam2_1.jpg', '../Gambar/Jam2_2.jpg', '../Gambar/Jam2_3.jpg'], desc: 'A classic white dial with black strap; simple, lucid, and familiar like an inherited object.' },
    { id: 'atelier-archive-03', name: 'Atelier Archive 03', price: 21900000, edition: '8 pieces', images: ['../Gambar/Jam1_1.png', '../Gambar/Jam1_2.png', '../Gambar/Jam1_3.png'], desc: 'A denser vintage mood with classic numerals and case proportions that feel worthy of long-term collecting.' }
  ];
}

let currentTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
let cart = [];
let isLoggedIn = false;
let selectedProductId = null;
let selectedQty = 1;

const cartModal = document.getElementById('cartModal');
const cartList = document.getElementById('cartList');
const summary = document.getElementById('summaryBox');

document.documentElement.setAttribute('data-theme', currentTheme);

const formatCurrency = value => new Intl.NumberFormat('id-ID', {
  style: 'currency',
  currency: 'IDR',
  maximumFractionDigits: 0
}).format(value);

function renderProducts() {
  const grid = document.getElementById('productGrid');
  if (!grid) return;
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
        <p class="product-desc">${product.desc || ''}</p>
        <div class="product-actions">
          <button class="btn btn-primary add-to-cart" data-id="${product.id}">Add to cart</button>
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
    cartList.innerHTML = `<p>Your cart is empty. Select a watch first.</p>`;
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
  addToCartWithQty(productId, 1);
}

function addToCartWithQty(productId, qty) {
  const found = cart.find(item => item.id === productId);
  if (found) found.qty += qty;
  else cart.push({ id: productId, qty: qty });
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
    const selectionPanel = cartModal.querySelector('.cart-panel-selection');
    const formPanel = cartModal.querySelector('.checkout-panel-form');
    if (selectionPanel) selectionPanel.style.display = 'block';
    if (formPanel) formPanel.style.display = 'none';
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
      alert('Cart is empty.');
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
          address: form.get('address'),
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
            alert('Payment success!');
            cart = [];
            renderCart();
            closeCart();
          },
          onPending: function (result) {
            updateStatus('pending');
            alert('Payment pending.');
            closeCart();
          },
          onError: function (result) {
            updateStatus('error');
            alert('Payment failed.');
          },
          onClose: function () {
            console.log('customer closed the popup');
          }
        });
      } else {
        alert('Error: ' + (data.error || 'Failed to get payment token'));
      }
    } catch (err) {
      console.error(err);
      alert('An error occurred while connecting to the server.');
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
    isLoggedIn = data.logged_in;
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



const sunIcon = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>`;
const moonIcon = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>`;

function updateThemeUI() {
  const toggleBtn = document.getElementById('themeToggle');
  if (toggleBtn) {
    toggleBtn.innerHTML = currentTheme === 'dark' ? sunIcon : moonIcon;
  }
}

document.getElementById('themeToggle').addEventListener('click', () => {
  currentTheme = currentTheme === 'dark' ? 'light' : 'dark';
  document.documentElement.setAttribute('data-theme', currentTheme);
  updateThemeUI();
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

// STEPPED CHECKOUT NAVIGATION
const goToCheckoutBtn = document.getElementById('goToCheckoutBtn');
if (goToCheckoutBtn) {
  goToCheckoutBtn.addEventListener('click', () => {
    if (!isLoggedIn) {
      alert("Please login first to proceed to checkout.");
      const isHtmlFolder = window.location.pathname.includes('/HTML/');
      const loginUrl = isHtmlFolder ? '../PHP/login.php' : (window.location.pathname.includes('/PHP/') ? 'login.php' : 'PHP/login.php');
      window.location.href = loginUrl + '?redirect=' + encodeURIComponent(window.location.href);
      return;
    }
    const selectionPanel = cartModal.querySelector('.cart-panel-selection');
    const formPanel = cartModal.querySelector('.checkout-panel-form');
    if (selectionPanel) selectionPanel.style.display = 'none';
    if (formPanel) formPanel.style.display = 'block';
  });
}

const backToCartBtn = document.getElementById('backToCartBtn');
if (backToCartBtn) {
  backToCartBtn.addEventListener('click', () => {
    const selectionPanel = cartModal.querySelector('.cart-panel-selection');
    const formPanel = cartModal.querySelector('.checkout-panel-form');
    if (selectionPanel) selectionPanel.style.display = 'block';
    if (formPanel) formPanel.style.display = 'none';
  });
}

// QUANTITY SELECTION MODAL LOGIC
const qtyModal = document.getElementById('qtyModal');
const qtyProductLabel = document.getElementById('qtyProductLabel');
const qtySelectCount = document.getElementById('qtySelectCount');

function openQtyModal(productId) {
  const product = products.find(p => p.id === productId);
  if (!product) return;
  selectedProductId = productId;
  selectedQty = 1;
  if (qtyProductLabel) qtyProductLabel.textContent = product.name;
  if (qtySelectCount) qtySelectCount.textContent = selectedQty;
  if (qtyModal) {
    qtyModal.classList.add('open');
    qtyModal.setAttribute('aria-hidden', 'false');
  }
}

function closeQtyModal() {
  if (qtyModal) {
    qtyModal.classList.remove('open');
    qtyModal.setAttribute('aria-hidden', 'true');
  }
  selectedProductId = null;
}

const qtySelectMinus = document.getElementById('qtySelectMinus');
const qtySelectPlus = document.getElementById('qtySelectPlus');
const confirmAddQtyBtn = document.getElementById('confirmAddQtyBtn');
const closeQtyBtn = document.getElementById('closeQtyBtn');

if (qtySelectMinus) {
  qtySelectMinus.addEventListener('click', () => {
    if (selectedQty > 1) {
      selectedQty--;
      if (qtySelectCount) qtySelectCount.textContent = selectedQty;
    }
  });
}

if (qtySelectPlus) {
  qtySelectPlus.addEventListener('click', () => {
    selectedQty++;
    if (qtySelectCount) qtySelectCount.textContent = selectedQty;
  });
}

if (confirmAddQtyBtn) {
  confirmAddQtyBtn.addEventListener('click', () => {
    if (selectedProductId) {
      addToCartWithQty(selectedProductId, selectedQty);
      closeQtyModal();
    }
  });
}

if (closeQtyBtn) closeQtyBtn.addEventListener('click', closeQtyModal);
if (qtyModal) {
  qtyModal.addEventListener('click', e => {
    if (e.target === qtyModal) closeQtyModal();
  });
}

document.addEventListener('click', e => {
  if (e.target.classList.contains('add-to-cart')) openQtyModal(e.target.dataset.id);
  if (e.target.classList.contains('qty-plus')) updateQty(e.target.dataset.id, 1);
  if (e.target.classList.contains('qty-minus')) updateQty(e.target.dataset.id, -1);
});

document.addEventListener('DOMContentLoaded', () => {
  checkLoginStatus();
  renderProducts();
  renderCart();
  initHeroSlider();
  updateThemeUI();
});