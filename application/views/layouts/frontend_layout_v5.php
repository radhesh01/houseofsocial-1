<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $s         = isset($data['_settings']) ? $data['_settings'] : (isset($data['settings']) ? $data['settings'] : []);
    $site_title = $s['site_title'] ?? 'The Cine Cafe';
    $site_desc = $s['hero_subtext'] ?? "India's most refined cinema & influencer marketing studio.";
    $uri       = isset($data['_uri']) ? $data['_uri'] : uri_string();
    $pg_title  = isset($data['page_title']) ? $data['page_title'] . ' — ' . $site_title : $site_title;
    $logo_url  = (!empty($s['site_logo'])) ? base_url('assets/images/uploads/' . $s['site_logo']) : '';
    ?>
    <title><?= htmlspecialchars($pg_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($site_desc) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pg_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($site_desc) ?>">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="canonical" href="<?= base_url(uri_string()) ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,900;1,900&family=Bebas+Neue&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap"
        rel="stylesheet">

    <style>
        /* ═══════════════════════════════════════════════════
   DESIGN SYSTEM — THE CINE CAFE
   Inspired by: brutalist editorial, bold typography,
   high contrast dark↔cream, minimal decoration
═══════════════════════════════════════════════════ */
        :root {
            /* Palette */
            --sage: #6B7C5A;
            --sage-d: #5a6a4a;
            --cream: #F0E8D5;
            --cream2: #E8DFC8;
            --cream3: #DDD4BC;
            --dark: #1A1A14;
            --dark2: #111110;
            --ink: #0D0D0C;
            --amber: #D4890A;
            --amber2: #E8A020;
            --offwhite: #EDE8DE;
            --muted: rgba(237, 232, 222, .45);
            --border-l: rgba(237, 232, 222, .12);
            --border-c: rgba(26, 26, 20, .14);

            /* Typography */
            --fd: 'Playfair Display', 'Georgia', serif;
            /* display: massive italic black */
            --fb2: 'Bebas Neue', 'Impact', sans-serif;
            /* hero all-caps display */
            --fb: 'DM Sans', system-ui, sans-serif;
            /* body */

            /* Spacing */
            --nav-h: 72px;
            --bar-h: 40px;

            /* Easing */
            --ease: cubic-bezier(.16, 1, .3, 1);
            --ease2: cubic-bezier(.4, 0, .2, 1);
        }

        /* ── RESET ──────────────────────────────────────── */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
            scroll-behavior: smooth;
        }

        body {
            background: var(--dark);
            color: var(--offwhite);
            font-family: var(--fb);
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font-family: inherit;
            cursor: pointer;
            border: none;
            background: none;
        }

        ::selection {
            background: var(--amber);
            color: var(--dark);
        }

        ::-webkit-scrollbar {
            width: 3px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--amber);
        }

        /* ── PAGE TRANSITION WIPE ───────────────────────── */
        #page-wipe {
            position: fixed;
            inset: 0;
            background: var(--ink);
            z-index: 9999;
            transform: scaleY(1);
            transform-origin: top;
            animation: wipe-out .85s var(--ease) .1s forwards;
            pointer-events: none;
        }

        @keyframes wipe-out {
            from {
                transform: scaleY(1);
            }

            to {
                transform: scaleY(0);
            }
        }

        /* ── SCROLL PROGRESS BAR ────────────────────────── */
        #scroll-prog {
            position: fixed;
            top: 0;
            left: 0;
            height: 2px;
            background: var(--amber);
            z-index: 500;
            width: 0%;
            transition: width .08s linear;
        }

        /* ══════════════════════════════════════════════════
   NAVIGATION
══════════════════════════════════════════════════ */
        #site-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 200;
            height: var(--nav-h);
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            padding: 0 32px;
            transition: background .4s, border-color .4s, height .3s;
        }

        #site-nav.pinned {
            background: rgba(26, 26, 20, .96);
            backdrop-filter: blur(24px);
            border-bottom: 1px solid var(--border-l);
            height: 60px;
        }

        /* Horizontal rules that extend from logo */
        #site-nav::before,
        #site-nav::after {
            content: '';
            position: absolute;
            top: 50%;
            height: 1px;
            background: rgba(237, 232, 222, .15);
            pointer-events: none;
            transition: background .4s;
        }

        #site-nav::before {
            left: 32px;
            right: calc(50% + 80px);
        }

        #site-nav::after {
            left: calc(50% + 80px);
            right: 32px;
        }

        #site-nav.pinned::before,
        #site-nav.pinned::after {
            background: rgba(237, 232, 222, .1);
        }

        /* Nav left: tiny links */
        .nav-left {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .nav-left a {
            color: rgba(237, 232, 222, .45);
            transition: color .2s;
            white-space: nowrap;
        }

        .nav-left a:hover,
        .nav-left a.active {
            color: var(--offwhite);
        }

        /* Center: boxed logo */
        .nav-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: 1.5px solid rgba(237, 232, 222, .25);
            padding: 10px 20px;
            transition: border-color .2s;
        }

        .nav-logo:hover {
            border-color: var(--amber);
        }

        .nav-logo img {
            height: 36px;
            width: auto;
        }

        .nav-logo-text {
            font-family: var(--fb2);
            font-size: 15px;
            letter-spacing: .18em;
            color: var(--offwhite);
            white-space: nowrap;
            line-height: 1;
        }

        .nav-logo-text span {
            display: block;
            font-size: 10px;
            letter-spacing: .3em;
            color: rgba(237, 232, 222, .4);
            margin-top: 2px;
            text-align: center;
        }

        /* Nav right: CTA + hamburger */
        .nav-right {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
        }

        .nav-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--amber);
            color: var(--dark);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            padding: 10px 20px;
            border-radius: 100px;
            transition: background .2s, transform .2s, box-shadow .2s;
            white-space: nowrap;
        }

        .nav-cta:hover {
            background: var(--amber2);
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(212, 137, 10, .4);
        }

        /* Hamburger */
        .nav-menu-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(237, 232, 222, .6);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            transition: color .2s;
            padding: 8px 0;
        }

        .nav-menu-btn:hover {
            color: var(--offwhite);
        }

        .ham-lines {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .ham-line {
            width: 22px;
            height: 1.5px;
            background: currentColor;
            transition: transform .35s var(--ease), opacity .2s;
            transform-origin: center;
        }

        /* ── FULLSCREEN MENU OVERLAY ────────────────────── */
        #menu-overlay {
            position: fixed;
            inset: 0;
            z-index: 300;
            background: var(--cream);
            display: flex;
            opacity: 0;
            pointer-events: none;
            transition: opacity .4s var(--ease2);
        }

        #menu-overlay.open {
            opacity: 1;
            pointer-events: all;
        }

        .menu-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 100px 80px;
        }

        .menu-link {
            font-family: var(--fb2);
            font-size: clamp(44px, 7vw, 80px);
            letter-spacing: .02em;
            color: rgba(26, 26, 20, .15);
            display: block;
            line-height: 1.1;
            transition: color .2s, transform .25s var(--ease);
            transform-origin: left;
        }

        .menu-link:hover,
        .menu-link.active {
            color: var(--dark);
            transform: translateX(16px);
        }

        .menu-link.highlight {
            color: var(--amber);
        }

        .menu-link.highlight:hover {
            color: var(--amber2);
        }

        .menu-right {
            width: 380px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 100px 60px 100px 0;
            border-left: 1px solid rgba(26, 26, 20, .1);
        }

        .menu-right-title {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: rgba(26, 26, 20, .4);
            margin-bottom: 16px;
        }

        .menu-right-body {
            font-size: 14px;
            color: rgba(26, 26, 20, .55);
            line-height: 1.8;
            margin-bottom: 32px;
            font-weight: 300;
        }

        .menu-close {
            position: absolute;
            top: 24px;
            right: 32px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: rgba(26, 26, 20, .4);
            display: flex;
            align-items: center;
            gap: 10px;
            transition: color .2s;
        }

        .menu-close:hover {
            color: var(--dark);
        }

        .menu-close-x {
            font-size: 20px;
            line-height: 1;
        }

        /* ── BOTTOM STICKY BAR ──────────────────────────── */
        #site-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: var(--bar-h);
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            pointer-events: none;
        }

        .bar-item {
            display: flex;
            align-items: center;
            gap: 8px;
            pointer-events: auto;
        }

        .bar-bolt {
            color: var(--amber);
            font-size: 16px;
            line-height: 1;
            animation: bolt-flicker 3s ease-in-out infinite;
        }

        @keyframes bolt-flicker {

            0%,
            90%,
            100% {
                opacity: 1
            }

            92% {
                opacity: .3
            }

            94% {
                opacity: 1
            }

            96% {
                opacity: .4
            }
        }

        .bar-text {
            font-size: 8px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: rgba(237, 232, 222, .3);
            line-height: 1.3;
        }

        /* ═══════════════════════════════════════════════════
   MAIN CONTENT AREA
═══════════════════════════════════════════════════ */
        #main-content {
            padding-top: var(--nav-h);
        }

        /* ═══════════════════════════════════════════════════
   FOOTER
═══════════════════════════════════════════════════ */
        #site-footer {
            background: var(--dark2);
            border-top: 1px dashed rgba(237, 232, 222, .12);
            padding: 28px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: var(--bar-h);
        }

        .footer-copy {
            font-size: 11px;
            color: rgba(237, 232, 222, .25);
            letter-spacing: .04em;
        }

        .footer-links {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .footer-links a {
            font-size: 11px;
            color: rgba(237, 232, 222, .25);
            letter-spacing: .06em;
            text-transform: uppercase;
            transition: color .2s;
        }

        .footer-links a:hover {
            color: var(--amber);
        }

        .footer-brand {
            font-family: var(--fb2);
            font-size: 14px;
            letter-spacing: .14em;
            color: rgba(237, 232, 222, .2);
        }

        /* ═══════════════════════════════════════════════════
   GLOBAL SCROLL REVEAL
═══════════════════════════════════════════════════ */
        .reveal {
            opacity: 0;
            transform: translateY(44px);
            transition: opacity .9s var(--ease), transform .9s var(--ease);
        }

        .reveal.from-left {
            transform: translateX(-44px);
        }

        .reveal.from-right {
            transform: translateX(44px);
        }

        .reveal.from-scale {
            transform: scale(.93);
        }

        .reveal.visible {
            opacity: 1;
            transform: none;
        }

        .d1 {
            transition-delay: .07s !important
        }

        .d2 {
            transition-delay: .14s !important
        }

        .d3 {
            transition-delay: .21s !important
        }

        .d4 {
            transition-delay: .28s !important
        }

        .d5 {
            transition-delay: .35s !important
        }

        .d6 {
            transition-delay: .42s !important
        }

        /* ═══════════════════════════════════════════════════
   GLOBAL UTILITY CLASSES
═══════════════════════════════════════════════════ */
        .u-max {
            max-width: 1440px;
            margin: 0 auto;
        }

        .u-pad {
            padding: 0 72px;
        }

        .tag-lbl {
            display: inline-block;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .26em;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .disp-xl {
            font-family: var(--fb2);
            font-size: clamp(60px, 10vw, 160px);
            line-height: .88;
            letter-spacing: .02em;
        }

        .disp-lg {
            font-family: var(--fb2);
            font-size: clamp(40px, 7vw, 100px);
            line-height: .9;
            letter-spacing: .02em;
        }

        .disp-md {
            font-family: var(--fb2);
            font-size: clamp(32px, 5vw, 72px);
            line-height: .95;
            letter-spacing: .02em;
        }

        .body-text {
            font-size: clamp(14px, 1.4vw, 16px);
            line-height: 1.82;
            font-weight: 300;
            color: var(--muted);
        }

        .btn-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--amber);
            color: var(--dark);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            padding: 14px 28px;
            border-radius: 100px;
            transition: background .2s, transform .25s var(--ease), box-shadow .25s;
            white-space: nowrap;
        }

        .btn-pill:hover {
            background: var(--amber2);
            transform: translateY(-2px);
            box-shadow: 0 10px 32px rgba(212, 137, 10, .38);
        }

        .btn-outline-dark {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: 1.5px solid var(--dark);
            color: var(--dark);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            padding: 13px 28px;
            border-radius: 100px;
            transition: background .2s, color .2s, transform .25s;
        }

        .btn-outline-dark:hover {
            background: var(--dark);
            color: var(--cream);
            transform: translateY(-2px);
        }

        .btn-outline-light {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: 1.5px solid rgba(237, 232, 222, .25);
            color: var(--offwhite);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            padding: 13px 28px;
            border-radius: 100px;
            transition: border-color .2s, color .2s, transform .25s;
        }

        .btn-outline-light:hover {
            border-color: var(--amber);
            color: var(--amber);
            transform: translateY(-2px);
        }

        /* dotted separator */
        .dotted-rule {
            border: none;
            border-top: 1px dashed rgba(237, 232, 222, .15);
            margin: 0;
        }

        /* Marquee */
        @keyframes mq-l {
            from {
                transform: translateX(0)
            }

            to {
                transform: translateX(-50%)
            }
        }

        @keyframes mq-r {
            from {
                transform: translateX(-50%)
            }

            to {
                transform: translateX(0)
            }
        }

        .mq-wrap {
            overflow: hidden;
            position: relative;
        }

        .mq-wrap::before,
        .mq-wrap::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 80px;
            z-index: 2;
            pointer-events: none;
        }

        .mq-track {
            display: flex;
            width: max-content;
            will-change: transform;
        }

        .mq-track.go-l {
            animation: mq-l var(--mq-dur, 38s) linear infinite;
        }

        .mq-track.go-r {
            animation: mq-r var(--mq-dur, 38s) linear infinite;
        }

        .mq-track:hover {
            animation-play-state: paused;
        }

        /* Rotate animation */
        @keyframes spin-cw {
            to {
                transform: rotate(360deg)
            }
        }

        @keyframes spin-ccw {
            to {
                transform: rotate(-360deg)
            }
        }

        @keyframes float-y {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-12px)
            }
        }

        @keyframes float-y2 {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(9px)
            }
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1)
            }

            50% {
                opacity: .3;
                transform: scale(.5)
            }
        }

        /* ── RESPONSIVE UTILITIES ───────────────────────── */
        @media(max-width:1100px) {
            .u-pad {
                padding: 0 40px;
            }
        }

        @media(max-width:768px) {
            .u-pad {
                padding: 0 20px;
            }

            :root {
                --nav-h: 60px;
            }

            #site-nav::before,
            #site-nav::after {
                display: none;
            }

            .nav-left {
                display: none;
            }

            .menu-right {
                display: none;
            }

            .menu-left {
                padding: 80px 32px;
            }
        }

        @media(max-width:480px) {
            .nav-cta {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- Page wipe transition -->
    <div id="page-wipe" aria-hidden="true"></div>

    <!-- Scroll progress -->
    <div id="scroll-prog" aria-hidden="true"></div>

    <!-- ══ NAVIGATION ═════════════════════════════════ -->
    <nav id="site-nav" role="navigation" aria-label="Main navigation">
        <!-- Left: page links -->
        <div class="nav-left">
            <a href="<?= base_url() ?>" class="<?= ($uri === '' || $uri === '/') ? 'active' : '' ?>">Home</a>
            <a href="<?= base_url('about') ?>" class="<?= strpos($uri, 'about') !== false ? 'active' : '' ?>">About</a>
            <a href="<?= base_url('work') ?>" class="<?= strpos($uri, 'work') !== false ? 'active' : '' ?>">Work</a>
            <a href="<?= base_url('contact') ?>" class="<?= strpos($uri, 'contact') !== false ? 'active' : '' ?>">Contact</a>
        </div>

        <!-- Center: boxed logo -->
        <a href="<?= base_url() ?>" class="nav-logo" aria-label="<?= htmlspecialchars($site_title) ?> Home">
            <?php if ($logo_url): ?>
                <img src="<?= $logo_url ?>" alt="<?= htmlspecialchars($site_title) ?>" style="height:32px;width:auto;">
            <?php else: ?>
                <span class="nav-logo-text">
                    THE CINE CAFE
                    <span>STUDIO</span>
                </span>
            <?php endif; ?>
        </a>

        <!-- Right: CTA + menu -->
        <div class="nav-right">
            <a href="<?= base_url('contact') ?>" class="nav-cta">Let's Talk</a>
            <button class="nav-menu-btn" onclick="toggleMenu()" aria-expanded="false" aria-controls="menu-overlay"
                id="menu-btn">
                <span style="letter-spacing:.16em;">MENU</span>
                <span class="ham-lines" aria-hidden="true">
                    <span class="ham-line" id="hl1"></span>
                    <span class="ham-line" id="hl2"></span>
                </span>
            </button>
        </div>
    </nav>

    <!-- ══ FULLSCREEN MENU OVERLAY ════════════════════ -->
    <div id="menu-overlay" role="dialog" aria-modal="true" aria-label="Site navigation">
        <button class="menu-close" onclick="toggleMenu()" aria-label="Close menu">
            SLUIT <span class="menu-close-x">✕</span>
        </button>

        <div class="menu-left">
            <a href="<?= base_url() ?>" class="menu-link <?= ($uri === '' || $uri === '/') ? 'active' : '' ?>">HOME</a>
            <a href="<?= base_url('about') ?>"
                class="menu-link <?= strpos($uri, 'about') !== false ? 'active' : '' ?>">ABOUT</a>
            <a href="<?= base_url('work') ?>" class="menu-link <?= strpos($uri, 'work') !== false ? 'active' : '' ?>">OUR
                WORK</a>
            <a href="<?= base_url('contact') ?>" class="menu-link highlight">CONTACT</a>
        </div>

        <div class="menu-right">
            <p class="menu-right-title">Stay in the Know</p>
            <p class="menu-right-body">Get first access to our campaigns, launches, and cultural conversations straight
                to your inbox.</p>
            <div
                style="display:flex;gap:0;border-bottom:1.5px solid rgba(26,26,20,.25);padding-bottom:4px;margin-bottom:20px;">
                <input type="email" placeholder="your@email.com"
                    style="flex:1;background:none;border:none;outline:none;font-size:14px;font-family:var(--fb);color:var(--dark);padding:8px 0;"
                    id="menu-email">
                <button onclick="menuSubscribe()"
                    style="width:36px;height:36px;border-radius:50%;background:var(--amber);display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .2s;"
                    onmouseover="this.style.background='var(--amber2)'"
                    onmouseout="this.style.background='var(--amber)'" aria-label="Subscribe">
                    <span style="font-size:16px;color:var(--dark);">↗</span>
                </button>
            </div>
            <div style="margin-top:40px;">
                <p
                    style="font-size:10px;letter-spacing:.16em;text-transform:uppercase;color:rgba(26,26,20,.3);margin-bottom:12px;">
                    Get in touch</p>
                <a href="mailto:<?= htmlspecialchars($s['site_email'] ?? 'contact@thecinecafe.in') ?>"
                    style="font-size:14px;color:rgba(26,26,20,.55);display:block;margin-bottom:6px;transition:color .2s;"
                    onmouseover="this.style.color='var(--dark)'" onmouseout="this.style.color='rgba(26,26,20,.55)'">
                    <?= htmlspecialchars($s['site_email'] ?? 'contact@thecinecafe.in') ?>
                </a>
                <a href="tel:<?= htmlspecialchars($s['site_phone'] ?? '') ?>"
                    style="font-size:14px;color:rgba(26,26,20,.55);transition:color .2s;"
                    onmouseover="this.style.color='var(--dark)'" onmouseout="this.style.color='rgba(26,26,20,.55)'">
                    <?= htmlspecialchars($s['site_phone'] ?? '+91 9990802115') ?>
                </a>
            </div>
        </div>
    </div>

    <!-- ══ MAIN CONTENT ════════════════════════════════ -->
    <main id="main-content" role="main"><?= $content ?></main>

    <!-- ══ FOOTER ══════════════════════════════════════ -->
    <footer id="site-footer" role="contentinfo">
        <p class="footer-copy">© <?= date('Y') ?> <?= htmlspecialchars($site_title) ?>. All rights reserved.</p>
        <span class="footer-brand">THE CINE CAFE</span>
        <nav class="footer-links" aria-label="Footer navigation">
            <a href="<?= base_url() ?>">Home</a>
            <a href="<?= base_url('about') ?>">About</a>
            <a href="<?= base_url('work') ?>">Work</a>
            <a href="<?= base_url('contact') ?>">Contact</a>
        </nav>
    </footer>

    <!-- ══ BOTTOM BAR ══════════════════════════════════ -->
    <div id="site-bar" aria-hidden="true">
        <div class="bar-item">
            <span class="bar-bolt">⚡</span>
            <span class="bar-bolt">⚡</span>
            <span class="bar-text">CRAFTED WITH<br>PASSION IN INDIA</span>
        </div>
        <div class="bar-item" style="justify-content:flex-end;">
            <span class="bar-text" style="text-align:right;">INDIA'S PREMIER<br>CINEMA STUDIO</span>
            <span class="bar-bolt">⚡</span>
            <span class="bar-bolt">⚡</span>
        </div>
    </div>

    <!-- ══ GLOBAL SCRIPTS ══════════════════════════════ -->
    <script>
        (function() {
            /* Scroll progress + nav pin */
            var nav = document.getElementById('site-nav');
            var prog = document.getElementById('scroll-prog');
            window.addEventListener('scroll', function() {
                var pct = window.scrollY / (document.body.scrollHeight - window.innerHeight) * 100;
                if (prog) prog.style.width = pct + '%';
                if (nav) window.scrollY > 60 ? nav.classList.add('pinned') : nav.classList.remove('pinned');
            }, {
                passive: true
            });

            /* Menu toggle */
            var menuOpen = false;
            window.toggleMenu = function() {
                menuOpen = !menuOpen;
                var overlay = document.getElementById('menu-overlay');
                var btn = document.getElementById('menu-btn');
                var hl1 = document.getElementById('hl1');
                var hl2 = document.getElementById('hl2');
                if (!overlay) return;
                overlay.classList.toggle('open', menuOpen);
                document.body.style.overflow = menuOpen ? 'hidden' : '';
                if (btn) btn.setAttribute('aria-expanded', menuOpen);
                if (hl1) hl1.style.transform = menuOpen ? 'rotate(45deg) translate(3px,3px)' : '';
                if (hl2) hl2.style.transform = menuOpen ? 'rotate(-45deg) translate(3px,-3px)' : '';
            };

            /* Close menu on link click */
            var mlinks = document.querySelectorAll('#menu-overlay a');
            mlinks.forEach(function(a) {
                a.addEventListener('click', function() {
                    if (menuOpen) window.toggleMenu();
                });
            });

            /* Close on Escape */
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && menuOpen) window.toggleMenu();
            });

            /* Menu subscribe stub */
            window.menuSubscribe = function() {
                var el = document.getElementById('menu-email');
                if (el && el.value) {
                    el.value = '';
                    alert('Thank you! We\'ll be in touch.');
                }
            };

            /* Scroll reveal */
            var revEls = document.querySelectorAll('.reveal');
            if ('IntersectionObserver' in window) {
                var io = new IntersectionObserver(function(entries) {
                    entries.forEach(function(e) {
                        if (e.isIntersecting) {
                            e.target.classList.add('visible');
                            io.unobserve(e.target);
                        }
                    });
                }, {
                    threshold: .1,
                    rootMargin: '0px 0px -32px 0px'
                });
                revEls.forEach(function(el) {
                    io.observe(el);
                });
            } else {
                revEls.forEach(function(el) {
                    el.classList.add('visible');
                });
            }

            /* Page-link wipe transition */
            document.querySelectorAll('a[href]').forEach(function(a) {
                var href = a.getAttribute('href');
                if (!href || href.startsWith('#') || href.startsWith('mailto') || href.startsWith('tel') || href
                    .startsWith('javascript') || a.target === '_blank') return;
                a.addEventListener('click', function(e) {
                    if (e.metaKey || e.ctrlKey || e.shiftKey) return;
                    e.preventDefault();
                    var wipe = document.getElementById('page-wipe');
                    if (wipe) {
                        wipe.style.animation = 'none';
                        wipe.style.transform = 'scaleY(0)';
                        wipe.style.transformOrigin = 'bottom';
                        requestAnimationFrame(function() {
                            wipe.style.transition = 'transform .55s cubic-bezier(.4,0,.2,1)';
                            wipe.style.transform = 'scaleY(1)';
                            setTimeout(function() {
                                window.location.href = href;
                            }, 560);
                        });
                    } else {
                        window.location.href = href;
                    }
                });
            });

        })();
    </script>
</body>

</html>