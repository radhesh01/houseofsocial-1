<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $s          = isset($data['_settings']) ? $data['_settings'] : (isset($data['settings']) ? $data['settings'] : []);
    $site_title = $s['site_title'] ?? 'HouseOfSocial';
    $site_desc  = $s['hero_subtext'] ?? 'Internet-native creative agency.';
    $uri        = isset($data['_uri']) ? $data['_uri'] : uri_string();
    $pg_title   = isset($data['page_title']) ? $data['page_title'] . ' — ' . $site_title : $site_title;
    $logo_url   = (!empty($s['site_logo'])) ? base_url('assets/images/uploads/' . $s['site_logo']) : '';
    ?>
    <title><?= htmlspecialchars($pg_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($site_desc) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pg_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($site_desc) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&display=swap"
        rel="stylesheet">
    <style>
    /* ============================================================
   HOS DESIGN SYSTEM v2 — COMPLETE REBUILD
   Void #0A0A0A / Orange #FF4D00 / Warm White #F5F2EE / Yellow #FFE135
============================================================ */
    :root {
        --o: #FF4D00;
        --o2: #FF6B2B;
        --o-dim: rgba(255, 77, 0, .14);
        --y: #FFE135;
        --y-dim: rgba(255, 225, 53, .08);
        --bg: #0A0A0A;
        --bg1: #0F0F0F;
        --bg2: #141414;
        --bg3: #1A1A1A;
        --bg4: #222;
        --w: #F5F2EE;
        --w80: rgba(245, 242, 238, .80);
        --w50: rgba(245, 242, 238, .50);
        --w20: rgba(245, 242, 238, .20);
        --w08: rgba(245, 242, 238, .08);
        --w04: rgba(245, 242, 238, .04);
        --border: rgba(245, 242, 238, .07);
        --border2: rgba(245, 242, 238, .12);
        --fh: 'Syne', sans-serif;
        --fb: 'DM Sans', sans-serif;
        --ease: cubic-bezier(.16, 1, .3, 1);
        --ease2: cubic-bezier(.4, 0, .2, 1);
        --nav: 72px;
        --px: clamp(18px, 5vw, 80px);
        --max: 1440px;
        --sec: clamp(80px, 10vw, 140px);
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0
    }

    html {
        font-size: 16px;
        -webkit-font-smoothing: antialiased;
        scroll-behavior: smooth
    }

    body {
        background: var(--bg);
        color: var(--w);
        font-family: var(--fb);
        overflow-x: hidden;
        line-height: 1.6;
        cursor: none
    }

    @media(hover:none) {
        body {
            cursor: auto
        }
    }

    img {
        max-width: 100%;
        height: auto;
        display: block
    }

    a {
        color: inherit;
        text-decoration: none
    }

    button {
        font-family: inherit;
        cursor: none;
        border: none;
        background: none
    }

    ul {
        list-style: none
    }

    ::selection {
        background: var(--o);
        color: #fff
    }

    ::-webkit-scrollbar {
        width: 2px
    }

    ::-webkit-scrollbar-thumb {
        background: var(--o)
    }

    /* NOISE */
    body::before {
        content: '';
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 9998;
        opacity: .028;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        background-size: 180px
    }

    /* SCROLL BAR */
    #g-prog {
        position: fixed;
        top: 0;
        left: 0;
        height: 2px;
        z-index: 9000;
        width: 0;
        background: linear-gradient(90deg, var(--o), var(--y));
        transition: width .06s linear
    }

    /* PAGE TRANSITION */
    #g-wipe {
        position: fixed;
        inset: 0;
        background: var(--bg);
        z-index: 9999;
        transform: scaleY(1);
        transform-origin: top;
        animation: wipe-out .8s var(--ease) .05s forwards;
        pointer-events: none
    }

    @keyframes wipe-out {
        to {
            transform: scaleY(0)
        }
    }

    /* ============================================================ CURSOR */
    #c-dot {
        position: fixed;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--o);
        pointer-events: none;
        z-index: 9997;
        transform: translate(-50%, -50%);
        transition: transform .1s, opacity .2s;
        mix-blend-mode: normal
    }

    #c-ring {
        position: fixed;
        width: 40px;
        height: 40px;
        border: 1.5px solid rgba(255, 77, 0, .5);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9996;
        transform: translate(-50%, -50%);
        transition: width .3s var(--ease), height .3s var(--ease), border-color .3s, background .3s
    }

    #c-trail {
        position: fixed;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: rgba(255, 77, 0, .3);
        pointer-events: none;
        z-index: 9995;
        transform: translate(-50%, -50%);
        transition: transform .25s var(--ease), opacity .3s
    }

    .c-hover #c-ring {
        width: 64px;
        height: 64px;
        border-color: rgba(255, 77, 0, .7);
        background: rgba(255, 77, 0, .06)
    }

    .c-hover #c-dot {
        transform: translate(-50%, -50%) scale(0)
    }

    @media(hover:none) {

        #c-dot,
        #c-ring,
        #c-trail {
            display: none
        }
    }

    /* ============================================================ NAV */
    #g-nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 600;
        height: var(--nav);
        display: flex;
        align-items: center;
        padding: 0 var(--px);
        transition: background .4s, border-color .4s
    }

    #g-nav.scrolled {
        background: rgba(10, 10, 10, .94);
        backdrop-filter: blur(24px);
        border-bottom: 1px solid var(--border)
    }

    .nav-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-shrink: 0;
        margin-right: auto;
        font-family: var(--fh);
        font-size: 18px;
        font-weight: 800;
        letter-spacing: -.03em
    }

    .nav-logo-sq {
        width: 34px;
        height: 34px;
        background: var(--o);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        font-weight: 800;
        color: #fff;
        clip-path: polygon(0 0, 90% 0, 100% 10%, 100% 100%, 10% 100%, 0 90%)
    }

    .nav-logo-txt {
        color: var(--w)
    }

    .nav-logo-io {
        color: var(--o);
        font-size: 13px;
        font-weight: 500;
        border: 1px solid var(--o-dim);
        padding: 2px 7px;
        border-radius: 4px;
        margin-left: 4px;
        vertical-align: middle
    }

    .nav-center {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        align-items: center;
        gap: 40px
    }

    .nav-a {
        font-size: 13px;
        font-weight: 500;
        letter-spacing: .02em;
        color: var(--w50);
        position: relative;
        padding: 4px 0;
        transition: color .2s
    }

    .nav-a::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 1px;
        background: var(--o);
        transition: width .35s var(--ease)
    }

    .nav-a:hover,
    .nav-a.on {
        color: var(--w)
    }

    .nav-a:hover::after,
    .nav-a.on::after {
        width: 100%
    }

    .nav-right {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-left: auto
    }

    .nav-cta {
        position: relative;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .02em;
        background: var(--o);
        color: #fff;
        padding: 9px 24px;
        clip-path: polygon(0 0, 92% 0, 100% 20%, 100% 100%, 8% 100%, 0 80%);
        transition: background .2s, transform .15s;
        white-space: nowrap
    }

    .nav-cta:hover {
        background: var(--o2);
        transform: translateY(-1px)
    }

    .nav-burger {
        display: none;
        width: 40px;
        height: 40px;
        border: 1px solid var(--border);
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 5px;
        padding: 10px;
        border-radius: 6px;
        cursor: none;
        transition: border-color .2s
    }

    .nav-burger:hover {
        border-color: var(--o)
    }

    .nav-burger span {
        display: block;
        width: 100%;
        height: 1.5px;
        background: var(--w);
        border-radius: 2px;
        transition: transform .35s var(--ease), opacity .2s
    }

    /* ============================================================ FULLSCREEN MENU */
    #g-menu {
        position: fixed;
        inset: 0;
        z-index: 700;
        background: var(--bg1);
        clip-path: circle(0% at calc(100% - 60px) 36px);
        transition: clip-path .7s var(--ease);
        pointer-events: none
    }

    #g-menu.open {
        clip-path: circle(160% at calc(100% - 60px) 36px);
        pointer-events: all
    }

    .menu-close {
        position: absolute;
        top: 24px;
        right: var(--px);
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: var(--w20);
        cursor: none;
        transition: color .2s
    }

    .menu-close:hover {
        color: var(--w)
    }

    .menu-x {
        width: 34px;
        height: 34px;
        border: 1px solid var(--border);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: border-color .2s, background .2s
    }

    .menu-close:hover .menu-x {
        border-color: var(--o);
        background: var(--o-dim);
        color: var(--o)
    }

    .menu-body {
        height: 100%;
        display: grid;
        grid-template-columns: 1fr 340px
    }

    .menu-left {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: var(--sec) var(--px);
        border-right: 1px solid var(--border);
        overflow: hidden
    }

    .menu-lnk {
        font-family: var(--fh);
        font-size: clamp(56px, 8.5vw, 100px);
        font-weight: 800;
        letter-spacing: -.04em;
        line-height: .9;
        display: block;
        color: var(--w08);
        transition: color .2s, transform .45s var(--ease);
        transform-origin: left
    }

    .menu-lnk:hover,
    .menu-lnk.on {
        color: var(--w);
        transform: translateX(16px)
    }

    .menu-lnk.accent {
        color: rgba(255, 77, 0, .18)
    }

    .menu-lnk.accent:hover {
        color: var(--o)
    }

    .menu-right {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0 48px
    }

    .mn-lbl {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: var(--w20);
        margin-bottom: 12px
    }

    .mn-lnk {
        display: block;
        font-size: 15px;
        color: var(--w50);
        margin-bottom: 8px;
        transition: color .2s;
        padding: 2px 0
    }

    .mn-lnk:hover {
        color: var(--o)
    }

    .mn-div {
        height: 1px;
        background: var(--border);
        margin: 24px 0
    }

    /* ============================================================ GLOBAL BUTTONS */
    .btn-os {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fb);
        font-size: 15px;
        font-weight: 600;
        background: var(--o);
        color: #fff;
        padding: 14px 32px;
        clip-path: polygon(0 0, 93% 0, 100% 18%, 100% 100%, 7% 100%, 0 82%);
        transition: background .2s, transform .2s;
        white-space: nowrap;
        letter-spacing: .01em
    }

    .btn-os:hover {
        background: var(--o2);
        transform: translateY(-2px)
    }

    .btn-os-lg {
        font-size: 17px;
        padding: 18px 44px
    }

    .btn-ghost {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fb);
        font-size: 14px;
        font-weight: 500;
        border: 1px solid var(--border2);
        color: var(--w50);
        padding: 13px 30px;
        border-radius: 2px;
        transition: border-color .2s, color .2s, background .2s
    }

    .btn-ghost:hover {
        border-color: var(--o);
        color: var(--w);
        background: var(--o-dim)
    }

    /* MAGNETIC WRAPPER */
    .mag-wrap {
        display: inline-block;
        position: relative
    }

    /* SEC LABEL */
    .lbl {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--o)
    }

    .lbl::before {
        content: '';
        width: 18px;
        height: 1.5px;
        background: var(--o);
        flex-shrink: 0
    }

    /* MARQUEE */
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
        overflow: hidden
    }

    .mq-track {
        display: flex;
        width: max-content;
        will-change: transform
    }

    .mq-l {
        animation: mq-l var(--d, 40s) linear infinite
    }

    .mq-r {
        animation: mq-r var(--d, 40s) linear infinite
    }

    .mq-track:hover {
        animation-play-state: paused
    }

    /* REVEAL */
    .rv {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity .9s var(--ease), transform .9s var(--ease)
    }

    .rv.sl {
        transform: translateX(-40px)
    }

    .rv.sr {
        transform: translateX(40px)
    }

    .rv.su {
        transform: translateY(-20px)
    }

    .rv.sc {
        transform: scale(.94)
    }

    .rv.in {
        opacity: 1;
        transform: none
    }

    .d1 {
        transition-delay: .06s !important
    }

    .d2 {
        transition-delay: .14s !important
    }

    .d3 {
        transition-delay: .22s !important
    }

    .d4 {
        transition-delay: .30s !important
    }

    .d5 {
        transition-delay: .38s !important
    }

    .d6 {
        transition-delay: .46s !important
    }

    /* ============================================================ FOOTER */
    #g-foot {
        background: var(--bg1);
        border-top: 1px solid var(--border);
        position: relative;
        overflow: hidden
    }

    #g-foot::before {
        content: '';
        position: absolute;
        bottom: -300px;
        left: -200px;
        width: 800px;
        height: 800px;
        background: radial-gradient(circle, rgba(255, 77, 0, .05) 0%, transparent 65%);
        pointer-events: none
    }

    .foot-marquee-line {
        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
        padding: 20px 0;
        overflow: hidden
    }

    .foot-mq-item {
        font-family: var(--fh);
        font-size: clamp(36px, 7vw, 80px);
        font-weight: 800;
        letter-spacing: -.03em;
        color: transparent;
        -webkit-text-stroke: 1px rgba(245, 242, 238, .07);
        white-space: nowrap;
        padding: 0 40px;
        display: inline-block
    }

    .foot-inner {
        max-width: var(--max);
        margin: 0 auto;
        padding: 64px var(--px) 0
    }

    .foot-top-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        padding-bottom: 48px;
        border-bottom: 1px solid var(--border);
        flex-wrap: wrap;
        gap: 40px
    }

    .foot-brand {
        font-family: var(--fh);
        font-size: 28px;
        font-weight: 800;
        letter-spacing: -.03em;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 10px
    }

    .foot-brand-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--o);
        box-shadow: 0 0 14px var(--o);
        animation: pulse-o 2s ease-in-out infinite
    }

    @keyframes pulse-o {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(255, 77, 0, .5)
        }

        50% {
            box-shadow: 0 0 0 6px rgba(255, 77, 0, 0)
        }
    }

    .foot-tagline {
        font-size: 14px;
        color: var(--w20);
        line-height: 1.8;
        max-width: 280px;
        margin-bottom: 28px
    }

    .foot-soc-row {
        display: flex;
        gap: 8px
    }

    .foot-soc {
        width: 38px;
        height: 38px;
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--w20);
        transition: border-color .2s, color .2s, background .2s
    }

    .foot-soc:hover {
        border-color: var(--o);
        color: var(--o);
        background: var(--o-dim)
    }

    .foot-nav-cols {
        display: grid;
        grid-template-columns: repeat(3, 140px);
        gap: 40px
    }

    .foot-col-h {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: var(--w20);
        margin-bottom: 18px
    }

    .foot-lnk {
        display: block;
        font-size: 14px;
        color: var(--w50);
        margin-bottom: 9px;
        transition: color .2s, padding-left .2s var(--ease)
    }

    .foot-lnk:hover {
        color: var(--o);
        padding-left: 6px
    }

    .foot-bottom {
        max-width: var(--max);
        margin: 0 auto;
        padding: 24px var(--px);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px
    }

    .foot-copy {
        font-size: 12px;
        color: var(--w20);
        letter-spacing: .04em
    }

    .foot-live {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .06em;
        color: var(--w20)
    }

    .foot-live-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--o);
        animation: pulse-o 1.8s ease-in-out infinite
    }

    /* ============================================================ RESPONSIVE */
    @media(max-width:1100px) {
        .nav-center {
            display: none
        }
    }

    @media(max-width:768px) {
        :root {
            --nav: 60px
        }

        .nav-cta {
            display: none
        }

        .nav-burger {
            display: flex
        }

        .menu-body {
            grid-template-columns: 1fr
        }

        .menu-right {
            display: none
        }

        .menu-left {
            padding: 60px var(--px)
        }

        .foot-top-row {
            flex-direction: column
        }

        .foot-nav-cols {
            grid-template-columns: 1fr 1fr;
            gap: 28px
        }
    }

    @media(max-width:480px) {
        :root {
            --px: 16px
        }

        .foot-nav-cols {
            grid-template-columns: 1fr
        }
    }
    </style>
</head>

<body>

    <div id="g-wipe" aria-hidden="true"></div>
    <div id="g-prog" aria-hidden="true"></div>
    <div id="c-trail" aria-hidden="true"></div>
    <div id="c-ring" aria-hidden="true"></div>
    <div id="c-dot" aria-hidden="true"></div>

    <!-- NAV -->
    <nav id="g-nav" role="navigation" aria-label="Main navigation">
        <a href="<?= base_url() ?>" class="nav-logo mag-wrap" data-mag>
            <?php if ($logo_url): ?>
            <img src="<?= $logo_url ?>" alt="<?= htmlspecialchars($site_title) ?>" style="height:30px;width:auto;">
            <?php else: ?>
            <div class="nav-logo-sq">H</div>
            <span class="nav-logo-txt">HouseOfSocial<span class="nav-logo-io">.io</span></span>
            <?php endif; ?>
        </a>
        <div class="nav-center">
            <a href="<?= base_url() ?>" class="nav-a <?= ($uri === '' || $uri === '/') ? 'on' : '' ?>">Home</a>
            <a href="<?= base_url('about') ?>"
                class="nav-a <?= strpos($uri, 'about') !== false ? 'on' : '' ?>">About</a>
            <a href="<?= base_url('work') ?>" class="nav-a <?= strpos($uri, 'work') !== false ? 'on' : '' ?>">Work</a>
            <a href="<?= base_url('contact') ?>"
                class="nav-a <?= strpos($uri, 'contact') !== false ? 'on' : '' ?>">Contact</a>
        </div>
        <div class="nav-right">
            <a href="<?= base_url('contact') ?>" class="nav-cta mag-wrap" data-mag>Let's talk →</a>
            <button class="nav-burger" id="g-mbtn" onclick="gMenu()" aria-label="Open menu" aria-expanded="false">
                <span id="hl1"></span><span id="hl2"></span>
            </button>
        </div>
    </nav>

    <!-- FULLSCREEN MENU -->
    <div id="g-menu" role="dialog" aria-modal="true">
        <button class="menu-close" onclick="gMenu()">CLOSE <span class="menu-x">×</span></button>
        <div class="menu-body">
            <div class="menu-left">
                <a href="<?= base_url() ?>" class="menu-lnk <?= ($uri === '' || $uri === '/') ? 'on' : '' ?>">HOME</a>
                <a href="<?= base_url('about') ?>"
                    class="menu-lnk <?= strpos($uri, 'about') !== false ? 'on' : '' ?>">ABOUT</a>
                <a href="<?= base_url('work') ?>"
                    class="menu-lnk <?= strpos($uri, 'work') !== false ? 'on' : '' ?>">WORK</a>
                <a href="<?= base_url('contact') ?>" class="menu-lnk accent">CONTACT</a>
            </div>
            <div class="menu-right">
                <p class="mn-lbl">Reach us</p>
                <a href="mailto:<?= htmlspecialchars($s['site_email'] ?? 'hello@houseofsocial.io') ?>"
                    class="mn-lnk"><?= htmlspecialchars($s['site_email'] ?? 'hello@houseofsocial.io') ?></a>
                <a href="tel:<?= htmlspecialchars($s['site_phone'] ?? '') ?>"
                    class="mn-lnk"><?= htmlspecialchars($s['site_phone'] ?? '+91 9990802115') ?></a>
                <div class="mn-div"></div>
                <p class="mn-lbl">Follow</p>
                <a href="#" class="mn-lnk" data-no-wipe>Instagram</a>
                <a href="#" class="mn-lnk" data-no-wipe>LinkedIn</a>
                <a href="#" class="mn-lnk" data-no-wipe>X / Twitter</a>
                <div class="mn-div"></div>
                <p style="font-size:13px;color:var(--w20);line-height:1.8">
                    Internet-native.<br>Meme-fluent.<br>Cinematically executed.</p>
            </div>
        </div>
    </div>

    <!-- MAIN -->
    <main id="mc" role="main"><?= $content ?></main>

    <!-- FOOTER -->
    <footer id="g-foot" role="contentinfo">
        <div class="foot-marquee-line" aria-hidden="true">
            <div class="mq-wrap">
                <div class="mq-track mq-l" style="--d:50s">
                    <?php foreach (array_merge(['HOUSEOFSOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'CINEMATIC CAMPAIGNS', 'HOUSEOFSOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'CINEMATIC CAMPAIGNS'], ['HOUSEOFSOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'CINEMATIC CAMPAIGNS', 'HOUSEOFSOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'CINEMATIC CAMPAIGNS']) as $w): ?>
                    <span class="foot-mq-item"><?= htmlspecialchars($w) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="foot-inner">
            <div class="foot-top-row">
                <div>
                    <div class="foot-brand">
                        <span class="foot-brand-dot"></span>
                        HouseOf<span style="color:var(--o)">Social</span>
                    </div>
                    <p class="foot-tagline">
                        <?= htmlspecialchars($s['hero_subtext'] ?? 'Internet-native creative agency crafting campaigns the culture actually cares about.') ?>
                    </p>
                    <div class="foot-soc-row">
                        <a href="#" class="foot-soc" data-no-wipe title="Instagram">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <rect x="2" y="2" width="20" height="20" rx="5" />
                                <circle cx="12" cy="12" r="5" />
                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                            </svg>
                        </a>
                        <a href="#" class="foot-soc" data-no-wipe title="LinkedIn">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z" />
                                <rect x="2" y="9" width="4" height="12" />
                                <circle cx="4" cy="4" r="2" />
                            </svg>
                        </a>
                        <a href="#" class="foot-soc" data-no-wipe title="X">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="foot-nav-cols">
                    <div>
                        <p class="foot-col-h">Navigate</p>
                        <a href="<?= base_url() ?>" class="foot-lnk">Home</a>
                        <a href="<?= base_url('about') ?>" class="foot-lnk">About</a>
                        <a href="<?= base_url('work') ?>" class="foot-lnk">Work</a>
                        <a href="<?= base_url('contact') ?>" class="foot-lnk">Contact</a>
                    </div>
                    <div>
                        <p class="foot-col-h">Services</p>
                        <a href="<?= base_url('contact') ?>" class="foot-lnk">Influencer Mktg</a>
                        <a href="<?= base_url('contact') ?>" class="foot-lnk">Meme Marketing</a>
                        <a href="<?= base_url('contact') ?>" class="foot-lnk">Film Promotions</a>
                        <a href="<?= base_url('contact') ?>" class="foot-lnk">Video Production</a>
                        <a href="<?= base_url('contact') ?>" class="foot-lnk">OTT Strategy</a>
                    </div>
                    <div>
                        <p class="foot-col-h">Contact</p>
                        <a href="mailto:<?= htmlspecialchars($s['site_email'] ?? 'hello@houseofsocial.io') ?>"
                            class="foot-lnk"><?= htmlspecialchars($s['site_email'] ?? 'hello@houseofsocial.io') ?></a>
                        <a href="tel:<?= htmlspecialchars($s['site_phone'] ?? '') ?>"
                            class="foot-lnk"><?= htmlspecialchars($s['site_phone'] ?? '+91 9990802115') ?></a>
                        <span class="foot-lnk"
                            style="cursor:default"><?= htmlspecialchars($s['site_address'] ?? 'India') ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="foot-bottom">
            <p class="foot-copy">© <?= date('Y') ?> HouseOfSocial. All rights reserved.</p>
            <div class="foot-live"><span class="foot-live-dot"></span>Building the next campaign right now</div>
            <p class="foot-copy">houseofsocial.io</p>
        </div>
    </footer>

    <script>
    (function() {
        'use strict';

        /* ── CURSOR ── */
        var dot = document.getElementById('c-dot'),
            ring = document.getElementById('c-ring'),
            trail = document.getElementById('c-trail'),
            mx = 0,
            my = 0,
            rx = 0,
            ry = 0,
            tx = 0,
            ty = 0,
            isTouch = !window.matchMedia('(hover:hover)').matches;

        if (!isTouch) {
            document.addEventListener('mousemove', function(e) {
                mx = e.clientX;
                my = e.clientY;
                if (dot) {
                    dot.style.left = mx + 'px';
                    dot.style.top = my + 'px'
                }
            });

            function loopRing() {
                rx += (mx - rx) * .10;
                ry += (my - ry) * .10;
                tx += (mx - tx) * .05;
                ty += (my - ty) * .05;
                if (ring) {
                    ring.style.left = rx + 'px';
                    ring.style.top = ry + 'px'
                }
                if (trail) {
                    trail.style.left = tx + 'px';
                    trail.style.top = ty + 'px'
                }
                requestAnimationFrame(loopRing);
            }
            loopRing();
            document.querySelectorAll('a,button,[data-mag]').forEach(function(el) {
                el.addEventListener('mouseenter', function() {
                    document.body.classList.add('c-hover')
                });
                el.addEventListener('mouseleave', function() {
                    document.body.classList.remove('c-hover')
                });
            });
        }

        /* ── MAGNETIC ── */
        document.querySelectorAll('[data-mag]').forEach(function(el) {
            el.addEventListener('mousemove', function(e) {
                var r = el.getBoundingClientRect(),
                    x = e.clientX - r.left - r.width / 2,
                    y = e.clientY - r.top - r.height / 2;
                el.style.transform = 'translate(' + x * .18 + 'px,' + y * .18 + 'px)';
            });
            el.addEventListener('mouseleave', function() {
                el.style.transform = '';
            });
        });

        /* ── SCROLL PROGRESS + NAV ── */
        var nav = document.getElementById('g-nav'),
            prog = document.getElementById('g-prog');
        window.addEventListener('scroll', function() {
            var y = window.scrollY,
                pct = y / (document.body.scrollHeight - window.innerHeight) * 100;
            if (prog) prog.style.width = Math.min(pct, 100) + '%';
            if (nav) y > 50 ? nav.classList.add('scrolled') : nav.classList.remove('scrolled');
        }, {
            passive: true
        });

        /* ── FULLSCREEN MENU ── */
        var mOpen = false;
        window.gMenu = function() {
            mOpen = !mOpen;
            var m = document.getElementById('g-menu'),
                b = document.getElementById('g-mbtn'),
                l1 = document.getElementById('hl1'),
                l2 = document.getElementById('hl2');
            if (!m) return;
            m.classList.toggle('open', mOpen);
            document.body.style.overflow = mOpen ? 'hidden' : '';
            if (b) b.setAttribute('aria-expanded', mOpen);
            if (l1) l1.style.transform = mOpen ? 'rotate(45deg) translate(3.5px,3.5px)' : '';
            if (l2) l2.style.transform = mOpen ? 'rotate(-45deg) translate(3.5px,-3.5px)' : '';
        };
        document.querySelectorAll('#g-menu a').forEach(function(a) {
            a.addEventListener('click', function() {
                if (mOpen) gMenu()
            });
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mOpen) gMenu()
        });

        /* ── REVEAL ── */
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function(entries) {
                entries.forEach(function(e) {
                    if (e.isIntersecting) {
                        e.target.classList.add('in');
                        io.unobserve(e.target)
                    }
                });
            }, {
                threshold: .06,
                rootMargin: '0px 0px -16px 0px'
            });
            document.querySelectorAll('.rv').forEach(function(el) {
                io.observe(el)
            });
        } else {
            document.querySelectorAll('.rv').forEach(function(el) {
                el.classList.add('in')
            })
        }

        /* ── COUNTERS ── */
        function animCount(el) {
            var t = parseFloat(el.dataset.count) || 0,
                suf = el.dataset.suffix || '',
                dur = 1600,
                step = 14,
                cur = 0,
                inc = t / (dur / step);
            var tm = setInterval(function() {
                cur += inc;
                if (cur >= t) {
                    cur = t;
                    clearInterval(tm)
                }
                el.textContent = Math.floor(cur) + suf;
            }, step);
        }
        var co = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    animCount(e.target);
                    co.unobserve(e.target)
                }
            });
        }, {
            threshold: .5
        });
        document.querySelectorAll('[data-count]').forEach(function(el) {
            co.observe(el)
        });

        /* ── PAGE WIPE ── */
        document.querySelectorAll('a[href]').forEach(function(a) {
            var h = a.getAttribute('href');
            if (!h || h[0] === '#' || h.startsWith('mailto') || h.startsWith('tel') ||
                h.startsWith('javascript') || a.target === '_blank' || a.hasAttribute('data-no-wipe'))
                return;
            a.addEventListener('click', function(e) {
                if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
                e.preventDefault();
                var w = document.getElementById('g-wipe');
                if (w) {
                    w.style.cssText =
                        'animation:none;transform:scaleY(0);transform-origin:bottom;transition:transform .5s cubic-bezier(.4,0,.2,1)';
                    requestAnimationFrame(function() {
                        requestAnimationFrame(function() {
                            w.style.transform = 'scaleY(1)';
                            setTimeout(function() {
                                window.location.href = h
                            }, 520);
                        })
                    });
                } else {
                    window.location.href = h
                }
            });
        });

    }());
    </script>
</body>

</html>