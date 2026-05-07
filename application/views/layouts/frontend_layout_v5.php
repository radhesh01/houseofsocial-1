<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $s          = isset($data['_settings']) ? $data['_settings'] : (isset($data['settings']) ? $data['settings'] : []);
    $site_title = $s['site_title'] ?? 'The Cine Cafe';
    $site_desc  = $s['hero_subtext'] ?? "India's most refined cinema & influencer marketing studio.";
    $uri        = isset($data['_uri']) ? $data['_uri'] : uri_string();
    $pg_title   = isset($data['page_title']) ? $data['page_title'] . ' — ' . $site_title : $site_title . ' — Where Cinema Meets Culture';
    $logo_url   = (!empty($s['site_logo'])) ? base_url('assets/images/uploads/' . $s['site_logo']) : '';
    ?>
    <title><?= htmlspecialchars($pg_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($site_desc) ?>">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="<?= htmlspecialchars($pg_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($site_desc) ?>">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="canonical" href="<?= base_url(uri_string()) ?>">

    <!-- Hinata + Cormorant Garamond for display, DM Sans for body -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    cc: {
                        gold: '#C9A84C',
                        bronze: '#8B5E3C',
                        noir: '#0A0A0F',
                        ink: '#12121A',
                        card: '#1A1A26',
                        ivory: '#F5F0E8',
                        silver: '#B8B4AC',
                        smoke: '#6B6878',
                        border: '#242435'
                    }
                }
            }
        }
    }
    </script>

    <style>
    /* ════════════════════════════════════════════
       THE CINE CAFE — CSS TOKENS
    ════════════════════════════════════════════ */
    :root {
        --gold: #C9A84C;
        --rose: #E8836A;
        --plum: #8B5DA0;
        --teal: #3ABFB8;
        --sage: #6BAF8D;
        --noir: #0A0A0F;
        --ink: #12121A;
        --card: #1A1A26;
        --ivory: #F5F0E8;
        --silver: #B8B4AC;
        --smoke: #6B6878;
        --border: #242435;
        --font-d: 'Cormorant Garamond', Georgia, serif;
        --font-b: 'DM Sans', system-ui, sans-serif;
        --radius: 3px;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html {
        scroll-behavior: smooth;
        -webkit-font-smoothing: antialiased;
    }

    body {
        background: var(--noir);
        color: var(--ivory);
        font-family: var(--font-b);
        overflow-x: hidden;
        cursor: none;
    }

    ::selection {
        background: var(--gold);
        color: #000;
    }

    ::-webkit-scrollbar {
        width: 2px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(var(--gold), var(--rose));
    }

    img {
        max-width: 100%;
        height: auto;
    }

    /* ── CUSTOM CURSOR ──────────────────────── */
    #cc-cursor {
        width: 8px;
        height: 8px;
        background: var(--gold);
        border-radius: 50%;
        position: fixed;
        pointer-events: none;
        z-index: 9999;
        transform: translate(-50%, -50%);
        transition: width .2s, height .2s, background .2s;
    }

    #cc-cursor-ring {
        width: 36px;
        height: 36px;
        border: 1px solid rgba(201, 168, 76, .5);
        border-radius: 50%;
        position: fixed;
        pointer-events: none;
        z-index: 9998;
        transform: translate(-50%, -50%);
        transition: all .35s cubic-bezier(.16, 1, .3, 1);
    }

    body.cc-hover #cc-cursor {
        width: 6px;
        height: 6px;
        background: var(--rose);
    }

    body.cc-hover #cc-cursor-ring {
        width: 56px;
        height: 56px;
        border-color: var(--gold);
        opacity: .9;
    }

    /* ── SCROLL PROGRESS ───────────────────── */
    #cc-progress {
        position: fixed;
        top: 0;
        left: 0;
        height: 1px;
        background: linear-gradient(90deg, var(--gold), var(--rose), var(--plum));
        z-index: 300;
        width: 0%;
        transition: width .08s linear;
    }

    /* ── GRAIN OVERLAY ─────────────────────── */
    #cc-grain {
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 1;
        opacity: .018;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.95' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    }

    /* ── AMBIENT ORBS ──────────────────────── */
    #cc-orbs {
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 0;
        overflow: hidden;
    }

    .cc-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(130px);
        opacity: .04;
        animation: orb-drift 24s ease-in-out infinite;
    }

    .cc-o1 {
        width: 700px;
        height: 700px;
        background: var(--gold);
        top: -200px;
        left: -150px;
        animation-delay: 0s;
    }

    .cc-o2 {
        width: 500px;
        height: 500px;
        background: var(--plum);
        top: 40%;
        right: -120px;
        animation-delay: 9s;
    }

    .cc-o3 {
        width: 400px;
        height: 400px;
        background: var(--teal);
        bottom: 10%;
        left: 25%;
        animation-delay: 17s;
    }

    @keyframes orb-drift {

        0%,
        100% {
            transform: translate(0, 0) scale(1);
        }

        33% {
            transform: translate(20px, -18px) scale(1.04);
        }

        66% {
            transform: translate(-16px, 12px) scale(.97);
        }
    }

    /* ── NAVBAR ────────────────────────────── */
    #cc-nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 200;
        padding: 0 60px;
        height: 76px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all .4s cubic-bezier(.16, 1, .3, 1);
    }

    #cc-nav.pinned {
        background: rgba(10, 10, 15, .94);
        backdrop-filter: blur(32px);
        border-bottom: 1px solid rgba(201, 168, 76, .12);
        height: 64px;
    }

    .cc-logo {
        font-family: var(--font-d);
        font-size: 22px;
        font-weight: 600;
        letter-spacing: .12em;
        color: var(--ivory);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: opacity .2s;
    }

    .cc-logo:hover {
        opacity: .85;
    }

    .cc-logo-mark {
        width: 32px;
        height: 32px;
        border: 1px solid rgba(201, 168, 76, .5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        color: var(--gold);
        font-style: italic;
    }

    .cc-logo .accent {
        color: var(--gold);
    }

    .cc-nav-links {
        display: flex;
        align-items: center;
        gap: 36px;
    }

    .cc-nav-link {
        font-size: 12px;
        font-weight: 500;
        color: rgba(245, 240, 232, .45);
        text-decoration: none;
        letter-spacing: .12em;
        text-transform: uppercase;
        transition: color .2s;
        position: relative;
        white-space: nowrap;
    }

    .cc-nav-link:hover,
    .cc-nav-link.active {
        color: var(--ivory);
    }

    .cc-nav-link::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 0;
        height: 1px;
        background: var(--gold);
        transition: width .35s cubic-bezier(.16, 1, .3, 1);
    }

    .cc-nav-link:hover::after,
    .cc-nav-link.active::after {
        width: 100%;
    }

    .cc-nav-cta {
        font-family: var(--font-d);
        font-size: 14px;
        font-weight: 600;
        letter-spacing: .1em;
        border: 1px solid rgba(201, 168, 76, .5);
        color: var(--gold);
        padding: 9px 24px;
        border-radius: var(--radius);
        text-decoration: none;
        transition: all .25s;
        white-space: nowrap;
    }

    .cc-nav-cta:hover {
        background: var(--gold);
        color: var(--noir);
        box-shadow: 0 8px 28px rgba(201, 168, 76, .3);
    }

    /* ── HAMBURGER ─────────────────────────── */
    #cc-hbg {
        display: none;
        background: none;
        border: 1px solid var(--border);
        cursor: pointer;
        flex-direction: column;
        gap: 5px;
        padding: 10px;
        border-radius: var(--radius);
        z-index: 201;
    }

    .cc-hb {
        display: block;
        width: 20px;
        height: 1px;
        background: var(--ivory);
        transition: all .3s cubic-bezier(.16, 1, .3, 1);
    }

    /* ── MOBILE MENU ───────────────────────── */
    #cc-mob {
        position: fixed;
        inset: 0;
        z-index: 190;
        background: rgba(10, 10, 15, .98);
        backdrop-filter: blur(32px);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        padding: 0 48px;
        gap: 6px;
        opacity: 0;
        pointer-events: none;
        transition: opacity .35s;
    }

    #cc-mob.open {
        opacity: 1;
        pointer-events: all;
    }

    .cc-mob-link {
        font-family: var(--font-d);
        font-size: clamp(40px, 9vw, 72px);
        color: rgba(245, 240, 232, .08);
        text-decoration: none;
        line-height: 1.1;
        transition: color .25s, transform .3s;
        display: block;
        padding: 4px 0;
        font-weight: 300;
        font-style: italic;
    }

    .cc-mob-link:hover {
        color: var(--gold);
        transform: translateX(14px);
    }

    .mob-contact {
        margin-top: 44px;
        padding-top: 24px;
        border-top: 1px solid var(--border);
    }

    .mob-contact p {
        font-size: 13px;
        color: var(--smoke);
        margin-bottom: 6px;
        letter-spacing: .04em;
    }

    /* ── FOOTER ────────────────────────────── */
    .cc-footer {
        background: #070710;
        border-top: 1px solid var(--border);
        padding: 80px 60px 40px;
        position: relative;
        z-index: 5;
    }

    .cc-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 60px;
        right: 60px;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--gold), transparent);
        opacity: .3;
    }

    .cc-footer-logo {
        font-family: var(--font-d);
        font-size: 28px;
        font-weight: 300;
        font-style: italic;
        letter-spacing: .1em;
        margin-bottom: 12px;
        color: var(--ivory);
    }

    .cc-footer-label {
        font-size: 9px;
        font-weight: 600;
        letter-spacing: .26em;
        text-transform: uppercase;
        color: var(--smoke);
        margin-bottom: 18px;
        display: block;
    }

    .cc-footer-link {
        display: block;
        font-size: 13px;
        color: rgba(245, 240, 232, .35);
        font-weight: 400;
        margin-bottom: 12px;
        text-decoration: none;
        transition: color .2s;
        letter-spacing: .03em;
    }

    .cc-footer-link:hover {
        color: var(--gold);
    }

    .cc-social {
        width: 36px;
        height: 36px;
        border: 1px solid rgba(255, 255, 255, .08);
        border-radius: var(--radius);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 700;
        color: var(--smoke);
        text-decoration: none;
        transition: all .2s;
        letter-spacing: .05em;
    }

    .cc-social:hover {
        border-color: var(--gold);
        color: var(--gold);
    }

    .cc-max {
        max-width: 1380px;
        margin: 0 auto;
    }

    /* ── REVEAL ─────────────────────────────── */
    .cc-rv {
        opacity: 0;
        transform: translateY(32px);
        transition: opacity .9s cubic-bezier(.16, 1, .3, 1), transform .9s cubic-bezier(.16, 1, .3, 1);
    }

    .cc-rv.cc-in {
        opacity: 1;
        transform: none;
    }

    .d1 {
        transition-delay: .08s !important;
    }

    .d2 {
        transition-delay: .17s !important;
    }

    .d3 {
        transition-delay: .26s !important;
    }

    .d4 {
        transition-delay: .35s !important;
    }

    /* ── RESPONSIVE ─────────────────────────── */
    @media(max-width:1024px) {
        #cc-nav {
            padding: 0 28px;
        }

        .cc-footer {
            padding: 60px 28px 32px;
        }
    }

    @media(max-width:768px) {
        #cc-nav {
            padding: 0 20px;
            height: 62px;
        }

        #cc-hbg {
            display: flex;
        }

        .cc-nav-links {
            display: none;
        }

        .cc-footer {
            padding: 48px 20px 24px;
        }

        .cc-footer-cols {
            grid-template-columns: 1fr 1fr !important;
        }

        body {
            cursor: auto;
        }

        #cc-cursor,
        #cc-cursor-ring {
            display: none !important;
        }
    }

    @media(max-width:480px) {
        .cc-footer-cols {
            grid-template-columns: 1fr !important;
        }

        #cc-nav {
            height: 56px;
        }
    }
    </style>
</head>

<body>

    <!-- CURSOR -->
    <div id="cc-cursor" aria-hidden="true"></div>
    <div id="cc-cursor-ring" aria-hidden="true"></div>
    <div id="cc-progress" aria-hidden="true"></div>
    <div id="cc-grain" aria-hidden="true"></div>

    <!-- ORBS -->
    <div id="cc-orbs" aria-hidden="true">
        <div class="cc-orb cc-o1"></div>
        <div class="cc-orb cc-o2"></div>
        <div class="cc-orb cc-o3"></div>
    </div>

    <!-- NAVBAR -->
    <nav id="cc-nav" role="navigation" aria-label="Main navigation">
        <a href="<?= base_url() ?>" class="cc-logo" aria-label="<?= htmlspecialchars($site_title) ?> Home">
            <?php if ($logo_url): ?>
            <img src="<?= $logo_url ?>" alt="<?= htmlspecialchars($site_title) ?>" style="height:34px;width:auto">
            <?php else: ?>
            <span class="cc-logo-mark">C</span>
            THE CINE <span class="accent" style="margin-left:6px">CAFE</span>
            <?php endif; ?>
        </a>
        <div class="cc-nav-links">
            <a href="<?= base_url() ?>"
                class="cc-nav-link <?= ($uri === '' || $uri === '/') ? 'active' : '' ?>">Home</a>
            <a href="<?= base_url('about') ?>"
                class="cc-nav-link <?= strpos($uri, 'about') !== FALSE ? 'active' : '' ?>">About</a>
            <a href="<?= base_url('work') ?>"
                class="cc-nav-link <?= strpos($uri, 'work') !== FALSE ? 'active' : '' ?>">Our Work</a>
            <a href="<?= base_url('contact') ?>" class="cc-nav-cta">Reserve a Table ↗</a>
        </div>
        <button id="cc-hbg" aria-label="Toggle menu" aria-expanded="false">
            <span class="cc-hb" id="b1"></span>
            <span class="cc-hb" id="b2"></span>
            <span class="cc-hb" id="b3"></span>
        </button>
    </nav>

    <!-- MOBILE MENU -->
    <div id="cc-mob" role="dialog" aria-modal="true" aria-label="Navigation">
        <a href="<?= base_url() ?>" class="cc-mob-link">Home</a>
        <a href="<?= base_url('about') ?>" class="cc-mob-link">About</a>
        <a href="<?= base_url('work') ?>" class="cc-mob-link">Our Work</a>
        <a href="<?= base_url('contact') ?>" class="cc-mob-link" style="color:var(--gold)">Let's Talk</a>
        <div class="mob-contact">
            <p><?= htmlspecialchars($s['site_email'] ?? '') ?></p>
            <p><?= htmlspecialchars($s['site_phone'] ?? '') ?></p>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main role="main" style="position:relative;z-index:3;background:transparent"><?= $content ?></main>

    <!-- FOOTER -->
    <footer class="cc-footer" aria-label="Site footer">
        <div class="cc-max">
            <div class="cc-footer-cols"
                style="display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:48px;margin-bottom:52px">
                <div>
                    <div class="cc-footer-logo">The Cine <span style="color:var(--gold)">Cafe</span></div>
                    <p style="font-size:13px;color:var(--smoke);line-height:1.85;max-width:260px;font-weight:400">
                        India's premier cinema marketing studio. Where authentic storytelling meets cultural impact.</p>
                    <div style="display:flex;gap:8px;margin-top:22px">
                        <a href="#" aria-label="LinkedIn" class="cc-social">In</a>
                        <a href="#" aria-label="Instagram" class="cc-social">Ig</a>
                        <a href="#" aria-label="X" class="cc-social">X</a>
                    </div>
                </div>
                <div>
                    <span class="cc-footer-label">Navigate</span>
                    <a href="<?= base_url() ?>" class="cc-footer-link">Home</a>
                    <a href="<?= base_url('about') ?>" class="cc-footer-link">About</a>
                    <a href="<?= base_url('work') ?>" class="cc-footer-link">Our Work</a>
                    <a href="<?= base_url('contact') ?>" class="cc-footer-link">Contact</a>
                </div>
                <div>
                    <span class="cc-footer-label">Services</span>
                    <?php foreach (['Influencer Marketing', 'Meme Marketing', 'Film Promotions', 'Video Production'] as $sv): ?>
                    <span class="cc-footer-link" style="cursor:default"><?= $sv ?></span>
                    <?php endforeach; ?>
                </div>
                <div>
                    <span class="cc-footer-label">Contact</span>
                    <a href="mailto:<?= htmlspecialchars($s['site_email'] ?? '') ?>"
                        class="cc-footer-link"><?= htmlspecialchars($s['site_email'] ?? 'contact@thecinecafe.in') ?></a>
                    <a href="tel:<?= htmlspecialchars($s['site_phone'] ?? '') ?>"
                        class="cc-footer-link"><?= htmlspecialchars($s['site_phone'] ?? '+91 9990802115') ?></a>
                    <span class="cc-footer-link"
                        style="cursor:default"><?= htmlspecialchars($s['site_address'] ?? 'India') ?></span>
                </div>
            </div>
            <div
                style="border-top:1px solid var(--border);padding-top:22px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px">
                <p style="font-size:11px;color:rgba(245,240,232,.2);letter-spacing:.05em">© <?= date('Y') ?>
                    <?= htmlspecialchars($site_title) ?>. All rights reserved.</p>
                <p style="font-size:11px;color:rgba(245,240,232,.2);letter-spacing:.05em;font-style:italic">Crafted with
                    passion in India 🎬</p>
            </div>
        </div>
    </footer>

    <script>
    (function() {
        var isTouch = !window.matchMedia('(pointer:fine)').matches;
        var cur = document.getElementById('cc-cursor');
        var ring = document.getElementById('cc-cursor-ring');
        if (!isTouch && cur) {
            var mx = 0,
                my = 0,
                rx = 0,
                ry = 0;
            document.addEventListener('mousemove', function(e) {
                mx = e.clientX;
                my = e.clientY;
                cur.style.left = mx + 'px';
                cur.style.top = my + 'px';
            });
            (function loop() {
                rx += (mx - rx) * .1;
                ry += (my - ry) * .1;
                if (ring) {
                    ring.style.left = rx + 'px';
                    ring.style.top = ry + 'px';
                }
                requestAnimationFrame(loop);
            })();
            document.querySelectorAll('a,button').forEach(function(el) {
                el.addEventListener('mouseenter', function() {
                    document.body.classList.add('cc-hover');
                });
                el.addEventListener('mouseleave', function() {
                    document.body.classList.remove('cc-hover');
                });
            });
        }

        // Scroll progress + nav pin
        var nav = document.getElementById('cc-nav');
        var prog = document.getElementById('cc-progress');
        window.addEventListener('scroll', function() {
            if (prog) prog.style.width = (window.scrollY / (document.body.scrollHeight - window
                .innerHeight) * 100) + '%';
            if (nav) window.scrollY > 60 ? nav.classList.add('pinned') : nav.classList.remove('pinned');
        }, {
            passive: true
        });

        // Reveal on scroll
        var rvObs = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    e.target.classList.add('cc-in');
                    rvObs.unobserve(e.target);
                }
            });
        }, {
            threshold: .08,
            rootMargin: '0px 0px -28px 0px'
        });
        document.querySelectorAll('.cc-rv').forEach(function(el) {
            rvObs.observe(el);
        });

        // Mobile menu
        var mob = document.getElementById('cc-mob'),
            hbg = document.getElementById('cc-hbg');
        var b1 = document.getElementById('b1'),
            b2 = document.getElementById('b2'),
            b3 = document.getElementById('b3');
        var open = false;
        if (hbg) {
            hbg.addEventListener('click', function() {
                open = !open;
                if (mob) mob.classList.toggle('open', open);
                document.body.style.overflow = open ? 'hidden' : '';
                hbg.setAttribute('aria-expanded', open);
                if (b1) b1.style.transform = open ? 'rotate(45deg) translate(4px,4px)' : '';
                if (b2) b2.style.opacity = open ? '0' : '';
                if (b3) b3.style.transform = open ? 'rotate(-45deg) translate(4px,-4px)' : '';
            });
            if (mob) mob.querySelectorAll('a').forEach(function(a) {
                a.addEventListener('click', function() {
                    open = false;
                    mob.classList.remove('open');
                    document.body.style.overflow = '';
                    hbg.setAttribute('aria-expanded', 'false');
                    if (b1) b1.style.transform = '';
                    if (b2) b2.style.opacity = '';
                    if (b3) b3.style.transform = '';
                });
            });
        }
    })();
    </script>
</body>

</html>