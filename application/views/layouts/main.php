<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($settings['site_title'] ?? 'FilmyCurry') ?> — Spice Up Your Social Media</title>
  <meta name="description"
    content="<?= htmlspecialchars($settings['hero_subtext'] ?? 'One-stop solution for influencer and meme marketing.') ?>">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            fc: {
              yellow: '#F5C518',
              black: '#0D0D0D',
              gray: '#111111',
              cream: '#F9F5EE'
            }
          },
          fontFamily: {
            display: ['"Bebas Neue"', 'Impact', 'sans-serif']
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      background: #0D0D0D;
      color: #F9F5EE;
      font-family: 'Inter', sans-serif;
      overflow-x: hidden;
      cursor: none;
    }

    /* Cursor */
    .c-dot {
      width: 8px;
      height: 8px;
      background: #F5C518;
      border-radius: 50%;
      position: fixed;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: transform 0.1s;
    }

    .c-ring {
      width: 36px;
      height: 36px;
      border: 1.5px solid rgba(245, 197, 24, 0.5);
      border-radius: 50%;
      position: fixed;
      pointer-events: none;
      z-index: 9998;
      transform: translate(-50%, -50%);
      transition: all 0.08s ease;
    }

    /* Film grain */
    .grain {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 1;
      opacity: 0.025;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    }

    /* Scroll bar */
    ::-webkit-scrollbar {
      width: 3px;
    }

    ::-webkit-scrollbar-track {
      background: #0D0D0D;
    }

    ::-webkit-scrollbar-thumb {
      background: #F5C518;
      border-radius: 2px;
    }

    /* Scroll progress */
    #progress-bar {
      position: fixed;
      top: 0;
      left: 0;
      height: 2px;
      background: #F5C518;
      z-index: 200;
      width: 0%;
      transition: width 0.1s;
    }

    /* Animations */
    .reveal {
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .reveal-left {
      opacity: 0;
      transform: translateX(-40px);
      transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .reveal-left.visible {
      opacity: 1;
      transform: translateX(0);
    }

    .delay-1 {
      transition-delay: 0.1s !important;
    }

    .delay-2 {
      transition-delay: 0.2s !important;
    }

    .delay-3 {
      transition-delay: 0.3s !important;
    }

    .delay-4 {
      transition-delay: 0.4s !important;
    }

    /* Marquee */
    .marquee-track {
      display: flex;
      gap: 64px;
      white-space: nowrap;
      animation: marquee 30s linear infinite;
    }

    .marquee-track:hover {
      animation-play-state: paused;
    }

    @keyframes marquee {
      0% {
        transform: translateX(0)
      }

      100% {
        transform: translateX(-50%)
      }
    }

    /* Film strip */
    .film-strip {
      position: absolute;
      top: 0;
      bottom: 0;
      width: 48px;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      opacity: 0.08;
    }

    .film-hole {
      width: 22px;
      height: 16px;
      background: #F5C518;
      border-radius: 3px;
      margin: 10px auto;
      flex-shrink: 0;
    }

    /* Scanlines */
    .scanlines {
      position: absolute;
      inset: 0;
      pointer-events: none;
      background: repeating-linear-gradient(0deg, transparent, transparent 3px, rgba(0, 0, 0, 0.07) 3px, rgba(0, 0, 0, 0.07) 4px);
      opacity: 0.4;
    }

    /* Campaign cards */
    .campaign-card {
      position: relative;
      overflow: hidden;
      background: #111;
      border: 1px solid rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      cursor: pointer;
    }

    .campaign-card:hover {
      transform: translateY(-6px);
      border-color: rgba(245, 197, 24, 0.3);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    .campaign-card .card-img {
      height: 200px;
      overflow: hidden;
    }

    .campaign-card .card-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .campaign-card:hover .card-img img {
      transform: scale(1.06);
    }

    .campaign-card .card-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, transparent 60%);
      opacity: 0;
      transition: opacity 0.4s;
    }

    .campaign-card:hover .card-overlay {
      opacity: 1;
    }

    /* Stat counter */
    .stat-item {
      border-top: 1px solid rgba(255, 255, 255, 0.08);
      padding-top: 24px;
    }

    /* Services */
    .service-row {
      border-top: 1px solid rgba(255, 255, 255, 0.06);
      padding: 24px 16px;
      display: flex;
      gap: 20px;
      align-items: flex-start;
      transition: background 0.3s;
    }

    .service-row:hover {
      background: rgba(255, 255, 255, 0.02);
    }

    .service-row:hover .svc-num {
      color: #F5C518;
    }

    .service-row:hover .svc-title {
      color: #F5C518;
    }

    /* Nav */
    .nav-link {
      position: relative;
      font-size: 14px;
      font-weight: 500;
      color: rgba(249, 245, 238, 0.6);
      transition: color 0.2s;
      letter-spacing: 0.02em;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 1px;
      background: #F5C518;
      transition: width 0.3s;
    }

    .nav-link:hover {
      color: #F9F5EE;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
      width: 100%;
    }

    .nav-link.active {
      color: #F9F5EE;
    }
  </style>
</head>

<body>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NNNSWTLX" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!-- Cursor -->
  <div class="c-dot" id="cDot"></div>
  <div class="c-ring" id="cRing"></div>

  <!-- Grain overlay -->
  <div class="grain"></div>

  <!-- Scroll progress -->
  <div id="progress-bar"></div>

  <?php if ($page === 'home'): ?>
    <?php $this->load->view('frontend/home', ['posts' => $posts, 'settings' => $settings]); ?>
  <?php elseif ($page === 'post'): ?>
    <?php $this->load->view('frontend/post', ['post' => $post, 'settings' => $settings]); ?>
  <?php endif; ?>

  <!-- Scripts -->
  <script>
    // Cursor
    const dot = document.getElementById('cDot');
    const ring = document.getElementById('cRing');
    let mx = 0,
      my = 0,
      rx = 0,
      ry = 0;
    document.addEventListener('mousemove', e => {
      mx = e.clientX;
      my = e.clientY;
      dot.style.left = mx + 'px';
      dot.style.top = my + 'px';
    });

    function animateRing() {
      rx += (mx - rx) * 0.12;
      ry += (my - ry) * 0.12;
      ring.style.left = rx + 'px';
      ring.style.top = ry + 'px';
      requestAnimationFrame(animateRing);
    }
    animateRing();
    document.querySelectorAll('a,button').forEach(el => {
      el.addEventListener('mouseenter', () => {
        ring.style.width = '56px';
        ring.style.height = '56px';
        ring.style.opacity = '1';
        dot.style.transform = 'translate(-50%,-50%) scale(0)';
      });
      el.addEventListener('mouseleave', () => {
        ring.style.width = '36px';
        ring.style.height = '36px';
        ring.style.opacity = '0.5';
        dot.style.transform = 'translate(-50%,-50%) scale(1)';
      });
    });

    // Scroll progress bar
    window.addEventListener('scroll', () => {
      const pct = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
      document.getElementById('progress-bar').style.width = pct + '%';
    });

    // Reveal on scroll
    const revealEls = document.querySelectorAll('.reveal,.reveal-left');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) e.target.classList.add('visible');
      });
    }, {
      threshold: 0.12
    });
    revealEls.forEach(el => observer.observe(el));

    // Counter animation
    function animateCounter(el) {
      const target = parseFloat(el.dataset.target) || 0;
      const suffix = el.dataset.suffix || '';
      const isFloat = el.dataset.float === 'true';
      const dur = 2000,
        step = 16;
      let current = 0;
      const inc = target / (dur / step);
      const timer = setInterval(() => {
        current += inc;
        if (current >= target) {
          current = target;
          clearInterval(timer);
        }
        el.textContent = (isFloat ? current.toFixed(1) : Math.floor(current)) + suffix;
      }, step);
    }
    const counterObs = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          animateCounter(e.target);
          counterObs.unobserve(e.target);
        }
      });
    }, {
      threshold: 0.5
    });
    document.querySelectorAll('.counter').forEach(el => counterObs.observe(el));

    // Mobile menu
    const mBtn = document.getElementById('menuBtn');
    const mMenu = document.getElementById('mobileMenu');
    if (mBtn && mMenu) {
      mBtn.addEventListener('click', () => {
        mMenu.classList.toggle('hidden');
        document.body.style.overflow = mMenu.classList.contains('hidden') ? '' : 'hidden';
      });
    }
  </script>
</body>

</html>