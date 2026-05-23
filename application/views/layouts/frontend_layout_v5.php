<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <?php
    $s          = isset($data['_settings']) ? $data['_settings'] : (isset($data['settings']) ? $data['settings'] : []);
    $site_title = $s['site_title'] ?? 'HouseOfSocial';
    $site_desc  = $s['hero_subtext'] ?? 'Internet-native creative marketing agency.';
    $uri        = isset($data['_uri']) ? $data['_uri'] : uri_string();
    $pg_title   = isset($data['page_title']) ? $data['page_title'] . ' — ' . $site_title : $site_title;
    $logo_url   = (!empty($s['site_logo'])) ? base_url('assets/images/uploads/' . $s['site_logo']) : '';
    ?>
    <title><?= htmlspecialchars($pg_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($site_desc) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pg_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($site_desc) ?>">
    <link rel="canonical" href="<?= base_url(uri_string()) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=Satoshi:wght@300;400;500;700&family=Editorial+New:ital@0;1&display=swap"
        rel="stylesheet">
    <!-- Fallback for Clash Display if not available via Google -->
    <link
        href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&f[]=satoshi@300,400,500,700&display=swap"
        rel="stylesheet">
    <style>
    /* ================================================================
   HOUSEOFSOCIAL — GLOBAL SYSTEM v5
   Brand: Internet-native creative marketing agency
   Aesthetic: Dark editorial × Human-crafted premium × Culture-first
   Typography: Clash Display (display) + Satoshi (body)
================================================================ */
    :root {
        /* Brand */
        --ink: #08080C;
        --paper: #F4F1EC;
        --chalk: #E8E4DC;
        --smoke: #B0AAA0;
        --ghost: rgba(244, 241, 236, .06);
        --ghost2: rgba(244, 241, 236, .12);
        --ghost3: rgba(244, 241, 236, .24);
        --ghost4: rgba(244, 241, 236, .48);
        --ghost5: rgba(244, 241, 236, .72);

        /* Accent — flame orange + electric lime */
        --flame: #FF3C00;
        --flame2: #FF6B35;
        --lime: #C8F135;
        --limeDim: rgba(200, 241, 53, .14);
        --limeMid: rgba(200, 241, 53, .35);

        /* Surfaces */
        --s0: #08080C;
        --s1: #0D0D13;
        --s2: #121218;
        --s3: #181820;
        --s4: #1E1E28;
        --s5: #242430;

        /* Borders */
        --b1: rgba(244, 241, 236, .06);
        --b2: rgba(244, 241, 236, .12);
        --b3: rgba(244, 241, 236, .22);

        /* Typography */
        --fDisplay: 'Clash Display', 'Bebas Neue', Impact, sans-serif;
        --fBody: 'Satoshi', 'DM Sans', system-ui, sans-serif;

        /* Layout */
        --navH: 64px;
        --px: clamp(18px, 5.5vw, 88px);
        --maxW: 1480px;
        --gap: clamp(8px, 1.5vw, 20px);
        --sec: clamp(72px, 10vw, 140px);

        /* Easing */
        --ease: cubic-bezier(.19, 1, .22, 1);
        --ease2: cubic-bezier(.4, 0, .2, 1);
    }

    /* ── RESET ── */
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
        background: var(--ink);
        color: var(--paper);
        font-family: var(--fBody);
        line-height: 1.6;
        overflow-x: hidden;
    }

    img,
    svg {
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
        border: none;
        background: none;
    }

    ul {
        list-style: none;
    }

    ::selection {
        background: var(--flame);
        color: #fff;
    }

    ::-webkit-scrollbar {
        width: 2px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--flame);
    }

    /* ── CURSOR (hover devices only) ── */
    @media (hover:hover) and (pointer:fine) {
        body {
            cursor: none;
        }

        button,
        a {
            cursor: none;
        }
    }

    #g-dot,
    #g-ring {
        position: fixed;
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        transform: translate(-50%, -50%);
        transition: opacity .2s;
    }

    #g-dot {
        width: 6px;
        height: 6px;
        background: var(--flame);
        transition: transform .12s, opacity .2s;
    }

    #g-ring {
        width: 32px;
        height: 32px;
        border: 1.5px solid rgba(255, 60, 0, .4);
        transition: width .35s var(--ease), height .35s var(--ease), border-color .3s, background .3s;
    }

    .c-grow #g-ring {
        width: 52px;
        height: 52px;
        border-color: rgba(255, 60, 0, .55);
        background: rgba(255, 60, 0, .06);
    }

    .c-grow #g-dot {
        transform: translate(-50%, -50%) scale(0);
    }

    @media (hover:none),
    (pointer:coarse) {

        #g-dot,
        #g-ring {
            display: none;
        }
    }

    /* ── NOISE OVERLAY ── */
    body::before {
        content: '';
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 9990;
        opacity: .028;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.82' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        background-size: 180px;
    }

    /* ── SCROLL PROGRESS ── */
    #g-prog {
        position: fixed;
        top: 0;
        left: 0;
        height: 2px;
        z-index: 9000;
        width: 0;
        background: var(--flame);
        transition: width .05s linear;
        pointer-events: none;
    }

    /* ── PAGE WIPE ── */
    #g-wipe {
        position: fixed;
        inset: 0;
        background: var(--ink);
        z-index: 9998;
        transform-origin: top;
        animation: wipeOut .7s var(--ease) .05s forwards;
        pointer-events: none;
    }

    @keyframes wipeOut {
        to {
            transform: scaleY(0);
        }
    }

    /* ── REVEAL ── */
    .rv {
        opacity: 0;
        transform: translateY(28px);
        transition: opacity .9s var(--ease), transform .9s var(--ease);
    }

    .rv.sl {
        transform: translateX(-28px);
    }

    .rv.sr {
        transform: translateX(28px);
    }

    .rv.sc {
        transform: scale(.96);
    }

    .rv.in {
        opacity: 1;
        transform: none;
    }

    .d1 {
        transition-delay: .05s !important;
    }

    .d2 {
        transition-delay: .12s !important;
    }

    .d3 {
        transition-delay: .19s !important;
    }

    .d4 {
        transition-delay: .26s !important;
    }

    .d5 {
        transition-delay: .33s !important;
    }

    /* ── MARQUEE ── */
    @keyframes mqL {
        from {
            transform: translateX(0)
        }

        to {
            transform: translateX(-50%)
        }
    }

    @keyframes mqR {
        from {
            transform: translateX(-50%)
        }

        to {
            transform: translateX(0)
        }
    }

    .mq-wrap {
        overflow: hidden;
        width: 100%;
    }

    .mq-track {
        display: flex;
        width: max-content;
        will-change: transform;
    }

    .mq-l {
        animation: mqL var(--d, 38s) linear infinite;
    }

    .mq-r {
        animation: mqR var(--d, 38s) linear infinite;
    }

    @media (hover:hover) {
        .mq-track:hover {
            animation-play-state: paused;
        }
    }

    /* ── BUTTONS ── */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fDisplay);
        font-size: 15px;
        font-weight: 600;
        letter-spacing: .04em;
        background: var(--flame);
        color: #fff;
        padding: 14px 32px;
        clip-path: polygon(0 0, 94% 0, 100% 20%, 100% 100%, 6% 100%, 0 80%);
        transition: background .22s, transform .18s, box-shadow .22s;
        white-space: nowrap;
    }

    .btn-primary:hover {
        background: #e03600;
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(255, 60, 0, .3);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    .btn-primary.lg {
        font-size: 17px;
        padding: 18px 40px;
    }

    .btn-outline {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fBody);
        font-size: 14px;
        font-weight: 500;
        border: 1px solid var(--b2);
        color: var(--ghost4);
        padding: 13px 30px;
        border-radius: 2px;
        transition: border-color .2s, color .2s, background .2s;
        white-space: nowrap;
    }

    .btn-outline:hover {
        border-color: var(--flame);
        color: var(--paper);
        background: rgba(255, 60, 0, .06);
    }

    .btn-lime {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fDisplay);
        font-size: 14px;
        font-weight: 600;
        letter-spacing: .04em;
        background: var(--lime);
        color: var(--ink);
        padding: 13px 30px;
        clip-path: polygon(0 0, 93% 0, 100% 22%, 100% 100%, 7% 100%, 0 78%);
        transition: background .2s, transform .18s;
        white-space: nowrap;
    }

    .btn-lime:hover {
        background: #b8e020;
        transform: translateY(-2px);
    }

    /* ── SECTION LABEL ── */
    .s-label {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fBody);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: var(--flame);
    }

    .s-label::before {
        content: '';
        width: 22px;
        height: 1.5px;
        background: var(--flame);
        flex-shrink: 0;
    }

    .s-label.lime {
        color: var(--lime);
    }

    .s-label.lime::before {
        background: var(--lime);
    }

    /* ── GLOBAL ANIMATIONS ── */
    @keyframes floatA {

        0%,
        100% {
            transform: translateY(0)
        }

        50% {
            transform: translateY(-10px)
        }
    }

    @keyframes floatB {

        0%,
        100% {
            transform: translateY(0)
        }

        50% {
            transform: translateY(8px)
        }
    }

    @keyframes spinSlow {
        to {
            transform: rotate(360deg)
        }
    }

    @keyframes blink {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(255, 60, 0, .5)
        }

        50% {
            box-shadow: 0 0 0 7px rgba(255, 60, 0, 0)
        }
    }


    /* =================================================================
   NAV
================================================================= */
    #g-nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 600;
        height: var(--navH);
        display: grid;
        grid-template-columns: auto 1fr auto;
        align-items: center;
        gap: 24px;
        padding: 0 var(--px);
        transition: background .4s, border-color .4s;
    }

    #g-nav.stuck {
        background: rgba(8, 8, 12, .96);
        backdrop-filter: blur(22px);
        -webkit-backdrop-filter: blur(22px);
        border-bottom: 1px solid var(--b1);
    }

    /* Logo */
    .nav-logo {
        display: flex;
        align-items: center;
        gap: 11px;
        font-family: var(--fDisplay);
        font-size: 18px;
        font-weight: 700;
        letter-spacing: -.02em;
        white-space: nowrap;
        transition: opacity .2s;
    }

    .nav-logo:hover {
        opacity: .8;
    }

    .nav-logo-mark {
        width: 32px;
        height: 32px;
        flex-shrink: 0;
        background: var(--flame);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 700;
        clip-path: polygon(0 0, 86% 0, 100% 14%, 100% 100%, 14% 100%, 0 86%);
    }

    .nav-logo-text {
        display: flex;
        flex-direction: column;
        line-height: 1.1;
    }

    .nav-logo-text small {
        font-family: var(--fBody);
        font-size: 9px;
        font-weight: 500;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: var(--ghost3);
        display: block;
    }

    /* Desktop links */
    .nav-links {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 40px;
    }

    .nav-a {
        font-size: 13.5px;
        font-weight: 500;
        letter-spacing: .02em;
        color: var(--ghost4);
        position: relative;
        padding: 4px 0;
        transition: color .2s;
    }

    .nav-a::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 1px;
        background: var(--flame);
        transition: width .32s var(--ease);
    }

    .nav-a:hover,
    .nav-a.on {
        color: var(--paper);
    }

    .nav-a:hover::after,
    .nav-a.on::after {
        width: 100%;
    }

    /* Right side */
    .nav-right {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .nav-pill {
        font-family: var(--fBody);
        font-size: 13px;
        font-weight: 600;
        background: var(--flame);
        color: #fff;
        padding: 9px 22px;
        white-space: nowrap;
        clip-path: polygon(0 0, 90% 0, 100% 24%, 100% 100%, 10% 100%, 0 76%);
        transition: background .2s, transform .15s;
    }

    .nav-pill:hover {
        background: #e03600;
        transform: translateY(-1px);
    }

    /* Hamburger */
    .nav-ham {
        display: none;
        width: 40px;
        height: 40px;
        border: 1px solid var(--b2);
        border-radius: 4px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 10px;
        transition: border-color .2s;
    }

    .nav-ham:hover {
        border-color: var(--flame);
    }

    .nav-ham span {
        display: block;
        width: 18px;
        height: 1.5px;
        background: var(--paper);
        border-radius: 1px;
        transition: transform .36s var(--ease), opacity .2s;
    }

    /* =================================================================
   FULLSCREEN MENU
================================================================= */
    #g-menu {
        position: fixed;
        inset: 0;
        z-index: 700;
        background: var(--s1);
        clip-path: circle(0% at calc(100% - 52px) 30px);
        transition: clip-path .6s var(--ease);
        pointer-events: none;
        overflow: hidden;
    }

    #g-menu.open {
        clip-path: circle(170% at calc(100% - 52px) 30px);
        pointer-events: all;
    }

    .menu-close-btn {
        position: absolute;
        top: 16px;
        right: var(--px);
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: var(--ghost3);
        transition: color .2s;
    }

    .menu-close-btn:hover {
        color: var(--paper);
    }

    .menu-x {
        width: 34px;
        height: 34px;
        border: 1px solid var(--b2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        transition: border-color .2s, background .2s;
    }

    .menu-close-btn:hover .menu-x {
        border-color: var(--flame);
        background: rgba(255, 60, 0, .08);
    }

    .menu-inner {
        height: 100%;
        display: grid;
        grid-template-columns: 1fr 340px;
    }

    .menu-nav {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: var(--sec) var(--px);
        border-right: 1px solid var(--b1);
        overflow: hidden;
    }

    .menu-link {
        font-family: var(--fDisplay);
        font-size: clamp(52px, 9vw, 112px);
        font-weight: 700;
        letter-spacing: -.04em;
        line-height: .88;
        display: block;
        color: var(--ghost2);
        transition: color .22s, transform .45s var(--ease);
        transform-origin: left;
    }

    .menu-link:hover,
    .menu-link.on {
        color: var(--paper);
        transform: translateX(16px);
    }

    .menu-link.accent {
        color: rgba(255, 60, 0, .16);
    }

    .menu-link.accent:hover {
        color: var(--flame);
    }

    .menu-meta {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0 50px;
    }

    .menu-meta-h {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: var(--ghost3);
        margin-bottom: 14px;
    }

    .menu-meta-lnk {
        display: block;
        font-size: 15px;
        color: var(--ghost4);
        margin-bottom: 9px;
        transition: color .2s;
    }

    .menu-meta-lnk:hover {
        color: var(--flame);
    }

    .menu-meta-div {
        height: 1px;
        background: var(--b1);
        margin: 22px 0;
    }

    .menu-meta-tagline {
        font-size: 13px;
        color: var(--ghost3);
        line-height: 1.9;
        font-style: italic;
    }

    /* =================================================================
   FOOTER
================================================================= */
    #g-foot {
        background: var(--s1);
        border-top: 1px solid var(--b1);
        position: relative;
        overflow: hidden;
    }

    #g-foot::before {
        content: '';
        position: absolute;
        bottom: -300px;
        left: -100px;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255, 60, 0, .04) 0%, transparent 65%);
        pointer-events: none;
    }

    .foot-ticker {
        border-bottom: 1px solid var(--b1);
        padding: 20px 0;
        overflow: hidden;
    }

    .foot-ticker-word {
        font-family: var(--fDisplay);
        font-size: clamp(28px, 5vw, 64px);
        font-weight: 700;
        letter-spacing: -.03em;
        color: transparent;
        -webkit-text-stroke: 1px var(--ghost2);
        white-space: nowrap;
        padding: 0 36px;
        display: inline-block;
    }

    .foot-body {
        max-width: var(--maxW);
        margin: 0 auto;
        padding: 56px var(--px) 0;
    }

    .foot-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 32px;
        padding-bottom: 48px;
        border-bottom: 1px solid var(--b1);
    }

    .foot-brand-row {
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fDisplay);
        font-size: 19px;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .foot-brand-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--flame);
        box-shadow: 0 0 10px var(--flame);
        animation: blink 2.4s ease-in-out infinite;
        flex-shrink: 0;
    }

    .foot-tagline {
        font-size: 13px;
        color: var(--ghost3);
        line-height: 1.9;
        max-width: 280px;
        margin-bottom: 24px;
    }

    .foot-socials {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .foot-soc {
        width: 36px;
        height: 36px;
        border: 1px solid var(--b1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--ghost3);
        flex-shrink: 0;
        transition: border-color .2s, color .2s, background .2s;
    }

    .foot-soc:hover {
        border-color: var(--flame);
        color: var(--flame);
        background: rgba(255, 60, 0, .06);
    }

    .foot-col-h {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--ghost3);
        margin-bottom: 18px;
    }

    .foot-lnk {
        display: block;
        font-size: 13px;
        color: var(--ghost4);
        margin-bottom: 10px;
        transition: color .2s, padding-left .22s var(--ease);
    }

    .foot-lnk:hover {
        color: var(--flame);
        padding-left: 6px;
    }

    .foot-bot {
        max-width: var(--maxW);
        margin: 0 auto;
        padding: 18px var(--px);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .foot-copy {
        font-size: 11px;
        color: var(--ghost3);
        letter-spacing: .04em;
    }

    .foot-live {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 11px;
        color: var(--ghost3);
    }

    .foot-live-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #22c55e;
        box-shadow: 0 0 8px #22c55e;
        animation: blink 2s ease-in-out infinite;
    }


    /* ─── RESPONSIVE ──────────────────────────────────── */
    @media (max-width:1079px) {
        .nav-links {
            display: none;
        }
    }

    @media (max-width:767px) {
        :root {
            --navH: 56px;
        }

        .nav-pill {
            display: none;
        }

        .nav-ham {
            display: flex;
        }

        .menu-inner {
            grid-template-columns: 1fr;
        }

        .menu-meta {
            display: none;
        }

        .menu-nav {
            padding: 56px var(--px) var(--px);
        }

        .foot-grid {
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .foot-grid>div:first-child {
            grid-column: 1/-1;
        }
    }

    @media (max-width:479px) {
        :root {
            --px: 16px;
            --navH: 52px;
        }

        .foot-grid {
            grid-template-columns: 1fr;
        }

        .foot-grid>div:first-child {
            grid-column: 1;
        }
    }
    </style>
</head>

<body>

    <div id="g-wipe" aria-hidden="true"></div>
    <div id="g-prog" aria-hidden="true"></div>
    <div id="g-ring" aria-hidden="true"></div>
    <div id="g-dot" aria-hidden="true"></div>

    <!-- ═══ NAV ══════════════════════════════════════════════════════ -->
    <nav id="g-nav" role="navigation" aria-label="Main navigation">
        <!-- Logo -->
        <a href="<?= base_url() ?>" class="nav-logo" aria-label="<?= htmlspecialchars($site_title) ?> home">
            <?php if ($logo_url): ?>
            <img src="<?= $logo_url ?>" alt="<?= htmlspecialchars($site_title) ?>"
                style="height:30px;width:auto;flex-shrink:0;">
            <?php else: ?>
            <div class="nav-logo-mark" aria-hidden="true">H</div>
            <div class="nav-logo-text">
                <span>House<span style="color:var(--flame)">Of</span>Social</span>
                <small>Creative Agency</small>
            </div>
            <?php endif; ?>
        </a>

        <!-- Desktop links -->
        <div class="nav-links">
            <a href="<?= base_url() ?>" class="nav-a <?= ($uri === '' || $uri === '/') ? 'on' : '' ?>">Home</a>
            <a href="<?= base_url('about') ?>"
                class="nav-a <?= strpos($uri, 'about') !== false ? 'on' : '' ?>">About</a>
            <a href="<?= base_url('work') ?>" class="nav-a <?= strpos($uri, 'work') !== false ? 'on' : '' ?>">Work</a>
            <a href="<?= base_url('contact') ?>"
                class="nav-a <?= strpos($uri, 'contact') !== false ? 'on' : '' ?>">Contact</a>
        </div>

        <!-- Right -->
        <div class="nav-right">
            <a href="<?= base_url('contact') ?>" class="nav-pill">Let's talk &rarr;</a>
            <button class="nav-ham" id="g-ham" onclick="hosMenu()" aria-label="Open menu" aria-expanded="false"
                aria-controls="g-menu">
                <span id="hb1"></span><span id="hb2"></span>
            </button>
        </div>
    </nav>

    <!-- ═══ FULLSCREEN MENU ════════════════════════════════════════════ -->
    <div id="g-menu" role="dialog" aria-modal="true" aria-label="Navigation menu">
        <button class="menu-close-btn" onclick="hosMenu()">Close <span class="menu-x"
                aria-hidden="true">×</span></button>
        <div class="menu-inner">
            <nav class="menu-nav">
                <a href="<?= base_url() ?>" class="menu-link <?= ($uri === '' || $uri === '/') ? 'on' : '' ?>">Home</a>
                <a href="<?= base_url('about') ?>"
                    class="menu-link <?= strpos($uri, 'about') !== false ? 'on' : '' ?>">About</a>
                <a href="<?= base_url('work') ?>"
                    class="menu-link <?= strpos($uri, 'work') !== false ? 'on' : '' ?>">Work</a>
                <a href="<?= base_url('contact') ?>" class="menu-link accent">Contact</a>
            </nav>
            <div class="menu-meta">
                <p class="menu-meta-h">Get in touch</p>
                <a href="mailto:<?= htmlspecialchars($s['site_email'] ?? 'hello@houseofsocial.io') ?>"
                    class="menu-meta-lnk"><?= htmlspecialchars($s['site_email'] ?? 'hello@houseofsocial.io') ?></a>
                <a href="tel:<?= htmlspecialchars($s['site_phone'] ?? '') ?>"
                    class="menu-meta-lnk"><?= htmlspecialchars($s['site_phone'] ?? '+91 9990802115') ?></a>
                <div class="menu-meta-div"></div>
                <p class="menu-meta-h">Follow</p>
                <a href="#" class="menu-meta-lnk" data-no-wipe>Instagram</a>
                <a href="#" class="menu-meta-lnk" data-no-wipe>LinkedIn</a>
                <a href="#" class="menu-meta-lnk" data-no-wipe>X / Twitter</a>
                <div class="menu-meta-div"></div>
                <p class="menu-meta-tagline">Internet-native.<br>Culture-first.<br>Built for 2025.</p>
            </div>
        </div>
    </div>

    <!-- ═══ MAIN CONTENT ═══════════════════════════════════════════════ -->
    <main id="main-content" role="main"><?= $content ?></main>

    <!-- ═══ FOOTER ════════════════════════════════════════════════════ -->
    <footer id="g-foot" role="contentinfo">
        <div class="foot-ticker" aria-hidden="true">
            <div class="mq-wrap">
                <div class="mq-track mq-l" style="--d:55s">
                    <?php foreach (array_merge(['HOUSE OF SOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'INFLUENCER MARKETING', 'VIRAL CAMPAIGNS', 'BRAND STRATEGY', 'CONTENT CREATION', 'CULTURE FIRST'], ['HOUSE OF SOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'INFLUENCER MARKETING', 'VIRAL CAMPAIGNS', 'BRAND STRATEGY', 'CONTENT CREATION', 'CULTURE FIRST'], ['HOUSE OF SOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'INFLUENCER MARKETING', 'VIRAL CAMPAIGNS', 'BRAND STRATEGY', 'CONTENT CREATION', 'CULTURE FIRST'], ['HOUSE OF SOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'INFLUENCER MARKETING', 'VIRAL CAMPAIGNS', 'BRAND STRATEGY', 'CONTENT CREATION', 'CULTURE FIRST']) as $fw): ?>
                    <span class="foot-ticker-word"><?= htmlspecialchars($fw) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="foot-body">
            <div class="foot-grid">
                <div>
                    <div class="foot-brand-row">
                        <span class="foot-brand-dot"></span>
                        House<span style="color:var(--flame)">Of</span>Social
                    </div>
                    <p class="foot-tagline">
                        <?= htmlspecialchars($s['hero_subtext'] ?? 'We help brands stop posting and start belonging. Internet-native creative agency, India.') ?>
                    </p>
                    <div class="foot-socials">
                        <a href="#" class="foot-soc" data-no-wipe aria-label="Instagram">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <rect x="2" y="2" width="20" height="20" rx="5" />
                                <circle cx="12" cy="12" r="5" />
                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                            </svg>
                        </a>
                        <a href="#" class="foot-soc" data-no-wipe aria-label="LinkedIn">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z" />
                                <rect x="2" y="9" width="4" height="12" />
                                <circle cx="4" cy="4" r="2" />
                            </svg>
                        </a>
                        <a href="#" class="foot-soc" data-no-wipe aria-label="X Twitter">
                            <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.253 5.622z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <p class="foot-col-h">Navigate</p>
                    <a href="<?= base_url() ?>" class="foot-lnk">Home</a>
                    <a href="<?= base_url('about') ?>" class="foot-lnk">About</a>
                    <a href="<?= base_url('work') ?>" class="foot-lnk">Work</a>
                    <a href="<?= base_url('contact') ?>" class="foot-lnk">Contact</a>
                </div>
                <div>
                    <p class="foot-col-h">Services</p>
                    <a href="<?= base_url('contact') ?>" class="foot-lnk">Influencer Marketing</a>
                    <a href="<?= base_url('contact') ?>" class="foot-lnk">Meme Marketing</a>
                    <a href="<?= base_url('contact') ?>" class="foot-lnk">Reddit Marketing</a>
                    <a href="<?= base_url('contact') ?>" class="foot-lnk">UGC Content</a>
                    <a href="<?= base_url('contact') ?>" class="foot-lnk">Brand Strategy</a>
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

        <div class="foot-bot">
            <p class="foot-copy">&copy; <?= date('Y') ?> HouseOfSocial. All rights reserved.</p>
            <div class="foot-live"><span class="foot-live-dot"></span> Building something right now</div>
            <p class="foot-copy">houseofsocial.io</p>
        </div>
    </footer>

    <!-- ═══ GLOBAL SCRIPTS ═══════════════════════════════════════════ -->
    <script>
    (function() {
        'use strict';

        /* ── CURSOR ── */
        var isCoarse = !window.matchMedia('(hover:hover) and (pointer:fine)').matches;
        if (!isCoarse) {
            var dot = document.getElementById('g-dot'),
                ring = document.getElementById('g-ring');
            var mx = 0,
                my = 0,
                rx = 0,
                ry = 0;
            document.addEventListener('mousemove', function(e) {
                mx = e.clientX;
                my = e.clientY;
                if (dot) {
                    dot.style.left = mx + 'px';
                    dot.style.top = my + 'px';
                }
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
                    document.body.classList.add('c-grow');
                });
                el.addEventListener('mouseleave', function() {
                    document.body.classList.remove('c-grow');
                });
            });
        }

        /* ── NAV SCROLL ── */
        var nav = document.getElementById('g-nav');
        var prog = document.getElementById('g-prog');

        function onScroll() {
            var y = window.scrollY,
                max = document.body.scrollHeight - window.innerHeight;
            if (prog && max > 0) prog.style.width = Math.min(y / max * 100, 100) + '%';
            if (nav) y > 40 ? nav.classList.add('stuck') : nav.classList.remove('stuck');
        }
        window.addEventListener('scroll', onScroll, {
            passive: true
        });
        onScroll();

        /* ── MENU ── */
        var menuOpen = false;
        window.hosMenu = function() {
            menuOpen = !menuOpen;
            var m = document.getElementById('g-menu'),
                b = document.getElementById('g-ham'),
                b1 = document.getElementById('hb1'),
                b2 = document.getElementById('hb2');
            if (m) m.classList.toggle('open', menuOpen);
            document.body.style.overflow = menuOpen ? 'hidden' : '';
            if (b) b.setAttribute('aria-expanded', String(menuOpen));
            if (b1) b1.style.transform = menuOpen ? 'rotate(45deg) translate(3.5px,3.5px)' : '';
            if (b2) b2.style.transform = menuOpen ? 'rotate(-45deg) translate(3.5px,-3.5px)' : '';
        };
        document.querySelectorAll('#g-menu a').forEach(function(a) {
            a.addEventListener('click', function() {
                if (menuOpen) hosMenu();
            });
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && menuOpen) hosMenu();
        });

        /* ── REVEAL ── */
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function(entries) {
                entries.forEach(function(e) {
                    if (e.isIntersecting) {
                        e.target.classList.add('in');
                        io.unobserve(e.target);
                    }
                });
            }, {
                threshold: .06,
                rootMargin: '0px 0px -8px 0px'
            });
            document.querySelectorAll('.rv').forEach(function(el) {
                io.observe(el);
            });
        } else {
            document.querySelectorAll('.rv').forEach(function(el) {
                el.classList.add('in');
            });
        }

        /* ── COUNTERS ── */
        function runCounter(el) {
            var t = parseFloat(el.dataset.count) || 0,
                suf = el.dataset.suffix || '',
                dur = 1800,
                step = 14,
                cur = 0,
                inc = t / (dur / step);
            var tm = setInterval(function() {
                cur += inc;
                if (cur >= t) {
                    cur = t;
                    clearInterval(tm);
                }
                el.textContent = Math.floor(cur) + suf;
            }, step);
        }
        var co = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    runCounter(e.target);
                    co.unobserve(e.target);
                }
            });
        }, {
            threshold: .5
        });
        document.querySelectorAll('[data-count]').forEach(function(el) {
            co.observe(el);
        });

        /* ── PAGE WIPE ── */
        document.querySelectorAll('a[href]').forEach(function(a) {
            var h = a.getAttribute('href');
            if (!h || h === '#' || h[0] === '#' || h.startsWith('mailto') || h.startsWith('tel') ||
                h.startsWith('javascript') || a.target === '_blank' || a.hasAttribute('data-no-wipe'))
                return;
            a.addEventListener('click', function(e) {
                if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
                e.preventDefault();
                var w = document.getElementById('g-wipe');
                if (w) {
                    w.style.cssText =
                        'animation:none;transform:scaleY(0);transform-origin:bottom;transition:transform .5s cubic-bezier(.4,0,.2,1);';
                    requestAnimationFrame(function() {
                        requestAnimationFrame(function() {
                            w.style.transform = 'scaleY(1)';
                            setTimeout(function() {
                                window.location.href = h;
                            }, 520);
                        });
                    });
                } else {
                    window.location.href = h;
                }
            });
        });

    }());
    </script>
</body>

</html>