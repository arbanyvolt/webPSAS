const products = [
      {id:'atelier-noir-01',name:'Atelier Noir 01',price:18500000,edition:'12 pieces',image:'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/96c07fd29119028bb97f30f16409513200bd5f6b.jpg',desc:{id:'Dress watch hitam dengan dial tenang, kilau baja yang lembut, dan kehadiran formal yang tidak berlebihan.',en:'A black-dial dress watch with a calm face, soft steel glow, and a formal presence without excess.'}},
      {id:'atelier-blanc-02',name:'Atelier Blanc 02',price:16200000,edition:'15 pieces',image:'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/3fbc773f7948bb51bbff3d9e18ea42af023998ba.jpg',desc:{id:'White dial klasik dengan strap hitam; sederhana, jernih, dan terasa akrab seperti benda warisan.',en:'A classic white dial with black strap; simple, lucid, and familiar like an inherited object.'}},
      {id:'atelier-archive-03',name:'Archive 03',price:21900000,edition:'8 pieces',image:'https://pplx-res.cloudinary.com/image/upload/pplx_search_images/27d4d15bcef056a3e7dff83e1de414dff044a9b1.jpg',desc:{id:'Nuansa vintage yang lebih pekat dengan numerik klasik dan proporsi case yang terasa layak dikoleksi lama.',en:'A denser vintage mood with classic numerals and case proportions that feel worthy of long-term collecting.'}}
    ];

    const copy = {
      id: {
        'nav.home':'Home','nav.about':'About','nav.collection':'Collection','nav.history':'History','nav.checkout':'Checkout',
        'hero.eyebrow':'Rumah jam tangan klasik terbatas','hero.title':'Saat waktu berubah menjadi warisan.','hero.desc':'Chrocklock merangkai jam tangan klasik dalam edisi terbatas—bukan sekadar penunjuk waktu, tetapi penanda momen yang ingin Anda simpan lebih lama dari satu kehidupan tren. Setiap detail dipilih dengan tenang: dial yang bersih, proporsi yang seimbang, dan kilau baja yang terasa seperti bisikan, bukan teriakan.','hero.cta1':'Lihat koleksi','hero.cta2':'Baca cerita','hero.cardLabel':'Short story','hero.cardText':'Lahir dari kegelisahan terhadap tren yang cepat berlalu, Chrocklock memilih jalan sebaliknya: sedikit, terkurasi, dan siap diwariskan. Setiap siluet dipandang seperti lembar arsip—jika ia tetap indah di mata esok hari, barulah ia layak menyandang nama ini.',
        'stats.editions':'Edisi terbatas per tahun','stats.concierge':'Respons concierge','stats.curated':'Estetika monokrom terkurasi',
        'about.eyebrow':'Tentang Chrocklock','about.title':'Rumah monokrom untuk selera yang tidak mengejar waktu.','about.lead':'Chrocklock hadir bagi penikmat jam tangan yang lebih percaya pada keheningan desain dibanding gemuruh logo. Dalam palet hitam putih, kami merayakan bentuk yang jujur: dial lapang, indeks yang tenang, dan finishing yang terasa dekat dengan kulit maupun cerita.','about.quote':'“Keanggunan sejati tidak mengejar perhatian—ia menunggu untuk ditemukan.”','about.storyTitle':'Short stories','about.story1':'Setiap koleksi dimulai dari satu pertanyaan sederhana: jika semua tren berhenti hari ini, apakah jam ini masih pantas dipakai dengan bangga? Dari sana, kami memilih proporsi, sudut, dan tekstur yang tidak meminta maaf pada waktu—hanya berdialog pelan dengannya.','about.story2':'Kami tidak mengejar deretan referensi yang panjang, melainkan kehadiran yang utuh. Bezel yang tidak berlebihan, lug yang seimbang, strap yang terasa menyatu dengan pergelangan—semua diarahkan pada satu hal: jam yang layak mewakili Anda, bahkan saat Anda diam.',
        'collection.eyebrow':'Koleksi','collection.title':'Potongan terbatas untuk lingkaran yang memilih dengan pelan.','collection.lead':'Koleksi Chrocklock disusun seperti galeri kecil: jumlah yang terhitung, siluet yang bersih, dan detail yang hanya terlihat oleh mereka yang mau memperhatikan lebih lama dari satu pandang. Setiap jam hadir bukan untuk memenuhi ruang, melainkan untuk mengisi cerita Anda berikutnya.',
        'history.eyebrow':'Sejarah','history.title':'Dirancang dengan napas atelier lama, dihadirkan dalam ritme hari ini.','history.i1t':'Asal mula','history.i1d':'Berawal dari satu pertemuan sederhana antara penggemar jam tangan klasik dan meja kerja yang terlalu sering menjadi saksi tren lewat begitu saja. Di tengah kecepatan dunia, muncul keinginan untuk membuat sesuatu yang berjalan pelan—namun bertahan lebih lama.','history.i2t':'Selera terkurasi','history.i2d':'Arah desain Chrocklock menjauh dari keramaian warna dan bentuk. Kami memilih bahasa monokrom: hitam, putih, dan bayangan di antaranya. Di dalamnya, setiap garis dan permukaan diberi ruang untuk bernapas, seolah jam ini ditata di etalase atelier kecil yang hanya dikunjungi mereka yang tahu apa yang mereka cari.','history.i3t':'Boutique masa depan','history.i3d':'Struktur Chrocklock dibangun sejak awal untuk tumbuh tanpa kehilangan ketenangannya: siap disambungkan ke payment gateway, katalog yang lebih luas, dan domain yang lebih megah—namun tetap setia pada satu janji: menyuguhkan jam tangan klasik yang terasa seperti potongan puisi di pergelangan tangan.',
        'checkout.eyebrow':'Pilihan Anda','checkout.title':'Cart & checkout','checkout.formEyebrow':'Pemesanan concierge','checkout.formTitle':'Lengkapi detail, kami yang akan menyusun sisanya.','checkout.formLead':'Tuliskan nama dan cara kami menghubungi Anda. Setelah itu, biarkan kami menyiapkan jam pilihan Anda seolah kami menyiapkan hadiah yang akan Anda berikan pada diri sendiri di masa depan.','checkout.submit':'Lanjutkan dengan concierge checkout',
        'form.name':'Nama lengkap','form.email':'Email','form.phone':'No. telepon / WhatsApp','form.address':'Catatan pengiriman',
        'footer.copy':'Jam tangan klasik mewah dalam bahasa visual yang tenang, puitis, dan monokrom.','footer.note':'Siap dikembangkan menuju domain, hosting, payment gateway, dan butik digital yang lebih utuh.'
      },
      en: {
        'nav.home':'Home','nav.about':'About','nav.collection':'Collection','nav.history':'History','nav.checkout':'Checkout',
        'hero.eyebrow':'Limited classic watch house','hero.title':'Where time turns into heirloom.','hero.desc':'Chrocklock curates classic watches in limited editions—not merely to tell the hour, but to mark moments you wish to keep beyond the life of a trend. Each detail is chosen in quiet confidence: a clean dial, measured proportions, and steel that glows like a whisper rather than a shout.','hero.cta1':'Explore collection','hero.cta2':'Read the story','hero.cardLabel':'Short story','hero.cardText':'Born from a restlessness with fleeting fashions, Chrocklock takes the opposite path: fewer pieces, finely curated, ready to be passed on. Every silhouette is treated like an archival page—if it still looks beautiful tomorrow, only then does it earn our name.',
        'stats.editions':'Limited editions yearly','stats.concierge':'Concierge response','stats.curated':'Curated monochrome aesthetic',
        'about.eyebrow':'About Chrocklock','about.title':'A monochrome house for those who do not chase time.','about.lead':'Chrocklock is made for those who trust quiet design more than loud branding. Within a restrained black-and-white palette, we honor honest forms: open dials, composed indices, and finishes that feel as natural on the wrist as they do in a story.','about.quote':'“True elegance never asks for attention—it waits to be noticed.”','about.storyTitle':'Short stories','about.story1':'Every collection begins with a single question: if every trend ended today, would this watch still be worn with pride? From that point, we choose proportions, angles, and textures that do not apologize to time—they simply converse softly with it.','about.story2':'We are not chasing a long list of references, but a complete presence. A bezel without excess, balanced lugs, a strap that feels like an extension of your hand—all directed toward one quiet aim: a watch that can represent you, even when you say nothing.',
        'collection.eyebrow':'Collection','collection.title':'Limited pieces for a circle that chooses slowly.','collection.lead':'The Chrocklock collection is arranged like an intimate gallery: counted pieces, uncluttered silhouettes, and details for those willing to look a moment longer. Each watch arrives not to fill space, but to inhabit your next chapter.',
        'history.eyebrow':'History','history.title':'Shaped with the breath of old ateliers, tuned to today’s rhythm.','history.i1t':'Origin','history.i1d':'It began with a simple encounter between a lover of classic watches and a workbench that had seen too many trends pass by. Amid the pace of the world, there was a desire to create something that moves slowly—but stays much longer.','history.i2t':'Curated taste','history.i2d':'Chrocklock’s design direction walks away from visual noise. We speak in monochrome: black, white, and the shades in between. Within that language, every line and surface is given room to breathe, as if each watch were placed in a small atelier window visited only by those who know what they are looking for.','history.i3t':'Future boutique','history.i3d':'From the start, Chrocklock has been structured to grow without losing its quiet: prepared for payment gateways, wider catalogues, and more commanding domains—yet always anchored to one promise: to offer classic watches that feel like a fragment of poetry resting on your wrist.',
        'checkout.eyebrow':'Your selection','checkout.title':'Cart & checkout','checkout.formEyebrow':'Concierge order','checkout.formTitle':'Share the details—we’ll compose the rest.','checkout.formLead':'Tell us your name and how to reach you. From there, we’ll prepare your chosen watch as if we were arranging a gift you intend to give your future self.','checkout.submit':'Proceed with concierge checkout',
        'form.name':'Full name','form.email':'Email','form.phone':'Phone / WhatsApp','form.address':'Delivery notes',
        'footer.copy':'Classic luxury watches in a quiet, poetic, monochrome language.','footer.note':'Ready to grow into a fuller digital boutique with domain, hosting, payment gateway, and expanded catalogue.'
      }
    };

    let currentLang = 'id';
    let currentTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    let cart = [{id:'atelier-noir-01', qty:1}];
    const cartModal = document.getElementById('cartModal');
    document.documentElement.setAttribute('data-theme', currentTheme);

    const formatCurrency = value => new Intl.NumberFormat(currentLang === 'id' ? 'id-ID' : 'en-US', {style:'currency', currency: currentLang === 'id' ? 'IDR' : 'USD', maximumFractionDigits:0}).format(currentLang === 'id' ? value : Math.round(value/16000));

    function applyLanguage(){
      document.querySelectorAll('[data-i18n]').forEach(node => { const key = node.dataset.i18n; if(copy[currentLang][key]) node.textContent = copy[currentLang][key]; });
      document.documentElement.lang = currentLang === 'id' ? 'id' : 'en';
      renderProducts(); renderCart();
    }

    function renderProducts(){
      const grid = document.getElementById('productGrid');
      grid.innerHTML = products.map(product => `
        <article class="product-card" data-reveal>
          <img src="${product.image}" alt="${product.name}" width="800" height="800" loading="lazy" decoding="async">
          <div class="product-body">
            <div class="product-meta">
              <div><h3>${product.name}</h3><span class="badge">${product.edition}</span></div>
              <div class="price">${formatCurrency(product.price)}</div>
            </div>
            <p class="product-desc">${product.desc[currentLang]}</p>
            <div class="product-actions">
              <button class="btn btn-primary" onclick="addToCart('${product.id}')">${currentLang === 'id' ? 'Tambah ke cart' : 'Add to cart'}</button>
              <button class="btn btn-secondary" onclick="openCart()">${currentLang === 'id' ? 'Checkout' : 'Checkout'}</button>
            </div>
          </div>
        </article>`).join('');
      document.querySelectorAll('[data-reveal]').forEach(el => revealObserver.observe(el));
    }

    function openCart(){ cartModal.classList.add('open'); cartModal.setAttribute('aria-hidden','false'); }
    function closeCart(){ cartModal.classList.remove('open'); cartModal.setAttribute('aria-hidden','true'); }

    function addToCart(id){
      const found = cart.find(item => item.id === id);
      if(found) found.qty += 1; else cart.push({id, qty:1});
      renderCart(); openCart();
    }

    function updateQty(id, delta){
      const item = cart.find(entry => entry.id === id); if(!item) return;
      item.qty += delta; if(item.qty <= 0) cart = cart.filter(entry => entry.id !== id);
      renderCart();
    }

    function renderCart(){
      const cartList = document.getElementById('cartList');
      const summary = document.getElementById('summaryBox');
      if(cart.length === 0){
        cartList.innerHTML = `<p>${currentLang === 'id' ? 'Cart masih kosong. Pilih koleksi terlebih dahulu.' : 'Your cart is empty. Select a watch first.'}</p>`;
        summary.innerHTML = '';
        return;
      }
      const detailed = cart.map(item => ({...item, product: products.find(p => p.id === item.id)}));
      const subtotal = detailed.reduce((sum, item) => sum + item.product.price * item.qty, 0);
      const service = Math.round(subtotal * 0.02);
      const total = subtotal + service;
      cartList.innerHTML = detailed.map(item => `
        <div class="cart-item">
          <img class="cart-thumb" src="${item.product.image}" alt="${item.product.name}" width="66" height="66" loading="lazy" decoding="async">
          <div><strong>${item.product.name}</strong><p style="font-size:var(--text-sm);color:var(--color-text-muted)">${formatCurrency(item.product.price)}</p></div>
          <div class="qty-controls"><button aria-label="Decrease quantity" onclick="updateQty('${item.product.id}',-1)">−</button><span>${item.qty}</span><button aria-label="Increase quantity" onclick="updateQty('${item.product.id}',1)">+</button></div>
        </div>`).join('');
      summary.innerHTML = `<div class="summary-line"><span>${currentLang === 'id' ? 'Subtotal' : 'Subtotal'}</span><span>${formatCurrency(subtotal)}</span></div><div class="summary-line"><span>${currentLang === 'id' ? 'Concierge service' : 'Concierge service'}</span><span>${formatCurrency(service)}</span></div><div class="summary-line total"><span>Total</span><span>${formatCurrency(total)}</span></div>`;
    }

    document.getElementById('langToggle').addEventListener('click', () => { currentLang = currentLang === 'id' ? 'en' : 'id'; applyLanguage(); });
    document.getElementById('themeToggle').addEventListener('click', () => { currentTheme = currentTheme === 'dark' ? 'light' : 'dark'; document.documentElement.setAttribute('data-theme', currentTheme); });
    document.getElementById('openCartBtn').addEventListener('click', openCart);
    document.getElementById('closeCartBtn').addEventListener('click', closeCart);
    cartModal.addEventListener('click', e => { if(e.target === cartModal) closeCart(); });
    document.addEventListener('keydown', e => { if(e.key === 'Escape') closeCart(); });

    document.getElementById('checkoutForm').addEventListener('submit', (e) => {
      e.preventDefault();
      const form = new FormData(e.target);
      const orderText = cart.map(item => { const product = products.find(p => p.id === item.id); return `${product.name} x${item.qty}`; }).join(', ');
      const message = currentLang === 'id'
        ? `Halo Chrocklock, saya ingin melanjutkan pesanan untuk: ${orderText}. Nama: ${form.get('name')}. Email: ${form.get('email')}. WhatsApp: ${form.get('phone')}. Catatan: ${form.get('address') || '-'}.`
        : `Hello Chrocklock, I would like to continue my order for: ${orderText}. Name: ${form.get('name')}. Email: ${form.get('email')}. WhatsApp: ${form.get('phone')}. Notes: ${form.get('address') || '-'}.`;
      window.open(`https://wa.me/6285601445637?text=${encodeURIComponent(message)}`, '_blank', 'noopener');
      closeCart();
    });

    const revealObserver = new IntersectionObserver((entries) => { entries.forEach(entry => { if(entry.isIntersecting) entry.target.classList.add('is-visible'); }); }, {threshold:.12});
    document.querySelectorAll('[data-reveal]').forEach(el => revealObserver.observe(el));
    applyLanguage();