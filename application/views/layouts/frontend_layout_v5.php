<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
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
    <link rel="canonical" href="<?= base_url(uri_string()) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&display=swap"
        rel="stylesheet">
    <style>
    /* ==============================================================
   HOS GLOBAL SYSTEM v3 — STABLE & RESPONSIVE
   Breakpoints tested: 320 / 375 / 480 / 640 / 768 / 1024 / 1280 / 1440
============================================================== */
    :root {
        --o: #FF4D00;
        --o2: #E64400;
        --o-dim: rgba(255, 77, 0, .11);
        --o-glow: rgba(255, 77, 0, .22);
        --y: #FFE135;
        --bg: #0A0A0A;
        --bg1: #0F0F0F;
        --bg2: #141414;
        --bg3: #1A1A1A;
        --bg4: #202020;
        --w: #F5F2EE;
        --w80: rgba(245, 242, 238, .80);
        --w60: rgba(245, 242, 238, .60);
        --w40: rgba(245, 242, 238, .40);
        --w20: rgba(245, 242, 238, .20);
        --w08: rgba(245, 242, 238, .08);
        --w04: rgba(245, 242, 238, .04);
        --border: rgba(245, 242, 238, .08);
        --border2: rgba(245, 242, 238, .14);
        --fh: 'Syne', sans-serif;
        --fb: 'DM Sans', sans-serif;
        --ease: cubic-bezier(.16, 1, .3, 1);
        --ease2: cubic-bezier(.4, 0, .2, 1);
        --nav: 68px;
        --px: clamp(16px, 5vw, 80px);
        --max: 1400px;
        --sec: clamp(60px, 8vw, 120px);
    }

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
    }

    body {
        background: var(--bg);
        color: var(--w);
        font-family: var(--fb);
        line-height: 1.6;
        overflow-x: hidden;
    }

    /* cursor:none only for real pointer+hover devices */
    @media (hover:hover) and (pointer:fine) {
        body {
            cursor: none;
        }
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

    @media (hover:hover) and (pointer:fine) {
        button {
            cursor: none;
        }
    }

    ul {
        list-style: none;
    }

    ::selection {
        background: var(--o);
        color: #fff;
    }

    ::-webkit-scrollbar {
        width: 2px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--o);
    }

    /* NOISE */
    body::before {
        content: '';
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 9998;
        opacity: .024;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        background-size: 160px;
    }

    /* PROGRESS BAR */
    #g-prog {
        position: fixed;
        top: 0;
        left: 0;
        height: 2px;
        z-index: 9000;
        width: 0;
        background: linear-gradient(90deg, var(--o), var(--y));
        transition: width .06s linear;
        pointer-events: none;
    }

    /* PAGE WIPE */
    #g-wipe {
        position: fixed;
        inset: 0;
        background: var(--bg);
        z-index: 9999;
        transform: scaleY(1);
        transform-origin: top;
        animation: g-wipe-out .75s var(--ease) .05s forwards;
        pointer-events: none;
    }

    @keyframes g-wipe-out {
        to {
            transform: scaleY(0);
        }
    }

    /* CURSOR — hidden on touch/coarse */
    #c-dot,
    #c-ring {
        position: fixed;
        border-radius: 50%;
        pointer-events: none;
        transform: translate(-50%, -50%);
    }

    #c-dot {
        width: 7px;
        height: 7px;
        background: var(--o);
        z-index: 9997;
        transition: transform .1s, opacity .15s;
    }

    #c-ring {
        width: 36px;
        height: 36px;
        z-index: 9996;
        border: 1.5px solid rgba(255, 77, 0, .45);
        transition: width .3s var(--ease), height .3s var(--ease), border-color .3s, background .3s;
    }

    .cur-hover #c-ring {
        width: 58px;
        height: 58px;
        border-color: rgba(255, 77, 0, .6);
        background: var(--o-dim);
    }

    .cur-hover #c-dot {
        transform: translate(-50%, -50%) scale(0);
    }

    @media (hover:none),
    (pointer:coarse) {

        #c-dot,
        #c-ring {
            display: none;
        }
    }

    /* GLOBAL KEYFRAMES — defined here so all pages can use them */
    @keyframes hos-up {
        from {
            opacity: 0;
            transform: translateY(28px);
        }

        to {
            opacity: 1;
            transform: none;
        }
    }

    @keyframes hos-fade {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes pdot {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(255, 77, 0, .5);
        }

        50% {
            box-shadow: 0 0 0 6px rgba(255, 77, 0, 0);
        }
    }

    @keyframes flt-a {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    @keyframes flt-b {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(9px);
        }
    }

    @keyframes spin-cw {
        to {
            transform: rotate(360deg);
        }
    }

    @keyframes blob-p {

        0%,
        100% {
            transform: translate(-50%, -50%) scale(1);
        }

        50% {
            transform: translate(-50%, -50%) scale(1.2);
        }
    }

    @keyframes line-pulse {

        0%,
        100% {
            width: 40px;
        }

        50% {
            width: 56px;
        }
    }

    @keyframes bar-grow {
        from {
            transform: scaleY(0);
        }

        to {
            transform: scaleY(1);
        }
    }

    /* REVEAL */
    .rv {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity .85s var(--ease), transform .85s var(--ease);
    }

    .rv.sl {
        transform: translateX(-30px);
    }

    .rv.sr {
        transform: translateX(30px);
    }

    .rv.sc {
        transform: scale(.95);
        opacity: 0;
    }

    .rv.in {
        opacity: 1;
        transform: none;
    }

    .d1 {
        transition-delay: .06s !important;
    }

    .d2 {
        transition-delay: .13s !important;
    }

    .d3 {
        transition-delay: .20s !important;
    }

    .d4 {
        transition-delay: .27s !important;
    }

    .d5 {
        transition-delay: .34s !important;
    }

    .d6 {
        transition-delay: .41s !important;
    }

    /* MARQUEE */
    @keyframes mq-l {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    @keyframes mq-r {
        from {
            transform: translateX(-50%);
        }

        to {
            transform: translateX(0);
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
        animation: mq-l var(--d, 40s) linear infinite;
    }

    .mq-r {
        animation: mq-r var(--d, 40s) linear infinite;
    }

    @media (hover:hover) {
        .mq-track:hover {
            animation-play-state: paused;
        }
    }

    /* BUTTONS */
    .btn-os {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        font-family: var(--fb);
        font-size: 15px;
        font-weight: 600;
        background: var(--o);
        color: #fff;
        padding: 13px 30px;
        clip-path: polygon(0 0, 93% 0, 100% 18%, 100% 100%, 7% 100%, 0 82%);
        transition: background .2s, transform .2s, box-shadow .2s;
        white-space: nowrap;
        -webkit-tap-highlight-color: transparent;
    }

    .btn-os:hover {
        background: var(--o2);
        transform: translateY(-2px);
        box-shadow: 0 10px 26px var(--o-glow);
    }

    .btn-os:active {
        transform: translateY(0);
    }

    .btn-os-lg {
        font-size: 16px;
        padding: 16px 38px;
    }

    .btn-ghost {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        font-family: var(--fb);
        font-size: 14px;
        font-weight: 500;
        border: 1px solid var(--border2);
        color: var(--w60);
        padding: 12px 28px;
        border-radius: 2px;
        transition: border-color .2s, color .2s, background .2s;
        -webkit-tap-highlight-color: transparent;
    }

    .btn-ghost:hover {
        border-color: var(--o);
        color: var(--w);
        background: var(--o-dim);
    }

    .btn-ghost:active {
        background: var(--o-dim);
    }

    /* SECTION LABEL */
    .lbl {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--o);
    }

    .lbl::before {
        content: '';
        width: 18px;
        height: 1.5px;
        background: var(--o);
        flex-shrink: 0;
    }

    /* ============================================================
   NAV
============================================================ */
    #g-nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 600;
        height: var(--nav);
        /* 3-region flex: logo | links(center) | right */
        display: flex;
        align-items: center;
        padding: 0 var(--px);
        transition: background .35s, border-color .35s;
    }

    #g-nav.scrolled {
        background: rgba(10, 10, 10, .95);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-bottom: 1px solid var(--border);
    }

    .nav-logo {
        flex: 0 0 auto;
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fh);
        font-size: 17px;
        font-weight: 800;
        letter-spacing: -.025em;
        transition: opacity .2s;
        white-space: nowrap;
    }

    .nav-logo:hover {
        opacity: .75;
    }

    .nav-logo-sq {
        width: 30px;
        height: 30px;
        flex-shrink: 0;
        background: var(--o);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 800;
        color: #fff;
        clip-path: polygon(0 0, 88% 0, 100% 12%, 100% 100%, 12% 100%, 0 88%);
    }

    /* Desktop nav links — centred */
    .nav-links {
        flex: 1 1 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 36px;
    }

    .nav-a {
        font-size: 13px;
        font-weight: 500;
        letter-spacing: .02em;
        color: var(--w60);
        position: relative;
        padding: 4px 0;
        white-space: nowrap;
        transition: color .2s;
    }

    .nav-a::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 1px;
        background: var(--o);
        transition: width .32s var(--ease);
    }

    .nav-a:hover,
    .nav-a.on {
        color: var(--w);
    }

    .nav-a:hover::after,
    .nav-a.on::after {
        width: 100%;
    }

    .nav-right {
        flex: 0 0 auto;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .nav-cta {
        font-size: 13px;
        font-weight: 600;
        background: var(--o);
        color: #fff;
        padding: 9px 22px;
        white-space: nowrap;
        clip-path: polygon(0 0, 91% 0, 100% 22%, 100% 100%, 9% 100%, 0 78%);
        transition: background .2s, transform .15s;
    }

    .nav-cta:hover {
        background: var(--o2);
        transform: translateY(-1px);
    }

    .nav-burger {
        display: none;
        /* shown via media query */
        width: 38px;
        height: 38px;
        border: 1px solid var(--border);
        border-radius: 6px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 9px;
        transition: border-color .2s;
    }

    .nav-burger:hover {
        border-color: var(--o);
    }

    .nav-burger span {
        display: block;
        width: 16px;
        height: 1.5px;
        background: var(--w);
        border-radius: 2px;
        transition: transform .35s var(--ease), opacity .2s;
    }

    /* ============================================================
   FULLSCREEN MENU
============================================================ */
    #g-menu {
        position: fixed;
        inset: 0;
        z-index: 700;
        background: var(--bg1);
        clip-path: circle(0% at calc(100% - 55px) 30px);
        transition: clip-path .65s var(--ease);
        pointer-events: none;
        overflow: hidden;
    }

    #g-menu.open {
        clip-path: circle(160% at calc(100% - 55px) 30px);
        pointer-events: all;
    }

    .menu-close {
        position: absolute;
        top: 20px;
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
        transition: color .2s;
    }

    .menu-close:hover {
        color: var(--w);
    }

    .menu-x {
        width: 32px;
        height: 32px;
        border: 1px solid var(--border);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: border-color .2s, background .2s, color .2s;
    }

    .menu-close:hover .menu-x {
        border-color: var(--o);
        background: var(--o-dim);
        color: var(--o);
    }

    .menu-body {
        height: 100%;
        display: grid;
        grid-template-columns: 1fr 320px;
    }

    .menu-left {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: var(--sec) var(--px);
        border-right: 1px solid var(--border);
        overflow: hidden;
    }

    .menu-lnk {
        font-family: var(--fh);
        font-size: clamp(44px, 7.5vw, 92px);
        font-weight: 800;
        letter-spacing: -.04em;
        line-height: .9;
        display: block;
        color: var(--w08);
        transition: color .2s, transform .4s var(--ease);
        transform-origin: left;
    }

    .menu-lnk:hover,
    .menu-lnk.on {
        color: var(--w);
        transform: translateX(14px);
    }

    .menu-lnk.accent {
        color: rgba(255, 77, 0, .18);
    }

    .menu-lnk.accent:hover {
        color: var(--o);
    }

    .menu-right {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0 44px;
    }

    .mn-lbl {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--w20);
        margin-bottom: 12px;
    }

    .mn-lnk {
        display: block;
        font-size: 15px;
        color: var(--w60);
        margin-bottom: 8px;
        transition: color .2s;
    }

    .mn-lnk:hover {
        color: var(--o);
    }

    .mn-div {
        height: 1px;
        background: var(--border);
        margin: 20px 0;
    }

    /* ============================================================
   FOOTER
============================================================ */
    #g-foot {
        background: var(--bg1);
        border-top: 1px solid var(--border);
        position: relative;
        overflow: hidden;
    }

    #g-foot::before {
        content: '';
        position: absolute;
        bottom: -250px;
        left: -150px;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255, 77, 0, .05) 0%, transparent 65%);
        pointer-events: none;
    }

    .foot-marquee {
        border-bottom: 1px solid var(--border);
        padding: 18px 0;
        overflow: hidden;
    }

    .foot-mq-word {
        font-family: var(--fh);
        font-size: clamp(30px, 5.5vw, 68px);
        font-weight: 800;
        letter-spacing: -.03em;
        color: transparent;
        -webkit-text-stroke: 1px var(--w08);
        white-space: nowrap;
        padding: 0 32px;
        display: inline-block;
    }

    .foot-body {
        max-width: var(--max);
        margin: 0 auto;
        padding: 52px var(--px) 0;
    }

    .foot-top {
        display: grid;
        grid-template-columns: 1.8fr 1fr 1fr 1fr;
        gap: 36px;
        padding-bottom: 44px;
        border-bottom: 1px solid var(--border);
    }

    .foot-brand {
        font-family: var(--fh);
        font-size: 20px;
        font-weight: 800;
        letter-spacing: -.025em;
        display: flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 14px;
    }

    .foot-brand-dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        flex-shrink: 0;
        background: var(--o);
        box-shadow: 0 0 10px var(--o);
        animation: pdot 2.2s ease-in-out infinite;
    }

    .foot-tagline {
        font-size: 13px;
        color: var(--w20);
        line-height: 1.85;
        max-width: 260px;
        margin-bottom: 22px;
    }

    .foot-soc-row {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .foot-soc {
        width: 34px;
        height: 34px;
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--w20);
        flex-shrink: 0;
        transition: border-color .2s, color .2s, background .2s;
    }

    .foot-soc:hover {
        border-color: var(--o);
        color: var(--o);
        background: var(--o-dim);
    }

    .foot-col-h {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: var(--w20);
        margin-bottom: 16px;
    }

    .foot-lnk {
        display: block;
        font-size: 13px;
        color: var(--w60);
        margin-bottom: 9px;
        transition: color .2s, padding-left .2s var(--ease);
    }

    .foot-lnk:hover {
        color: var(--o);
        padding-left: 5px;
    }

    .foot-bot {
        max-width: var(--max);
        margin: 0 auto;
        padding: 20px var(--px);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    .foot-copy {
        font-size: 11px;
        color: var(--w20);
        letter-spacing: .04em;
    }

    .foot-live {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 11px;
        color: var(--w20);
    }

    .foot-live-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #22c55e;
        box-shadow: 0 0 8px #22c55e;
        animation: pdot 1.8s ease-in-out infinite;
    }

    /* ============================================================
   RESPONSIVE OVERRIDES
============================================================ */
    @media (max-width:1079px) {
        .nav-links {
            display: none;
        }
    }

    @media (max-width:767px) {
        :root {
            --nav: 58px;
        }

        .nav-cta {
            display: none;
        }

        .nav-burger {
            display: flex;
        }

        .menu-body {
            grid-template-columns: 1fr;
        }

        .menu-right {
            display: none;
        }

        .menu-left {
            padding: 64px var(--px) var(--px);
        }

        .foot-top {
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .foot-top>div:first-child {
            grid-column: 1 / -1;
        }
    }

    @media (max-width:479px) {
        :root {
            --px: 16px;
            --nav: 54px;
        }

        .foot-top {
            grid-template-columns: 1fr;
        }

        .foot-top>div:first-child {
            grid-column: 1;
        }

        .btn-os-lg {
            font-size: 15px;
            padding: 14px 26px;
        }

        .btn-ghost {
            font-size: 13px;
            padding: 11px 22px;
        }
    }
    </style>
</head>

<body>

    <div id="g-wipe" aria-hidden="true"></div>
    <div id="g-prog" aria-hidden="true"></div>
    <div id="c-ring" aria-hidden="true"></div>
    <div id="c-dot" aria-hidden="true"></div>

    <nav id="g-nav" role="navigation" aria-label="Main navigation">
        <a href="<?= base_url() ?>" class="nav-logo" aria-label="<?= htmlspecialchars($site_title) ?> home">
            <?php if ($logo_url): ?>
            <img src="<?= $logo_url ?>" alt="<?= htmlspecialchars($site_title) ?>"
                style="height:28px;width:auto;flex-shrink:0;">
            <?php else: ?>
            <div class="nav-logo-sq" aria-hidden="true">H</div>
            <span>HouseOf<span style="color:var(--o)">Social</span></span>
            <?php endif; ?>
        </a>
        <div class="nav-links">
            <a href="<?= base_url() ?>" class="nav-a <?= ($uri === '' || $uri === '/') ? 'on' : '' ?>">Home</a>
            <a href="<?= base_url('about') ?>"
                class="nav-a <?= strpos($uri, 'about') !== false ? 'on' : '' ?>">About</a>
            <a href="<?= base_url('work') ?>" class="nav-a <?= strpos($uri, 'work') !== false ? 'on' : '' ?>">Work</a>
            <a href="<?= base_url('contact') ?>"
                class="nav-a <?= strpos($uri, 'contact') !== false ? 'on' : '' ?>">Contact</a>
        </div>
        <div class="nav-right">
            <a href="<?= base_url('contact') ?>" class="nav-cta">Let's talk →</a>
            <button class="nav-burger" id="g-mbtn" onclick="gMenu()" aria-label="Toggle menu" aria-expanded="false"
                aria-controls="g-menu">
                <span id="hl1"></span><span id="hl2"></span>
            </button>
        </div>
    </nav>

    <div id="g-menu" role="dialog" aria-modal="true" aria-label="Navigation">
        <button class="menu-close" onclick="gMenu()">CLOSE <span class="menu-x" aria-hidden="true">×</span></button>
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
                <p style="font-size:13px;color:var(--w20);line-height:1.85">
                    Internet-native.<br>Meme-fluent.<br>Cinematically executed.</p>
            </div>
        </div>
    </div>

    <main id="mc" role="main"><?= $content ?></main>

    <footer id="g-foot" role="contentinfo">
        <div class="foot-marquee" aria-hidden="true">
            <div class="mq-wrap">
                <div class="mq-track mq-l" style="--d:50s">
                    <?php foreach (
                        array_merge(
                            ['HOUSEOFSOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'CINEMATIC CAMPAIGNS', 'CULTURE FIRST'],
                            ['HOUSEOFSOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'CINEMATIC CAMPAIGNS', 'CULTURE FIRST'],
                            ['HOUSEOFSOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'CINEMATIC CAMPAIGNS', 'CULTURE FIRST'],
                            ['HOUSEOFSOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'CINEMATIC CAMPAIGNS', 'CULTURE FIRST']
                        ) as $fw
                    ): ?>
                    <span class="foot-mq-word"><?= htmlspecialchars($fw) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="foot-body">
            <div class="foot-top">
                <div>
                    <div class="foot-brand"><span class="foot-brand-dot"></span>HouseOf<span
                            style="color:var(--o)">Social</span></div>
                    <p class="foot-tagline">
                        <?= htmlspecialchars($s['hero_subtext'] ?? 'Internet-native creative agency crafting campaigns the culture actually cares about.') ?>
                    </p>
                    <div class="foot-soc-row">
                        <a href="#" class="foot-soc" data-no-wipe title="Instagram" aria-label="Instagram">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <rect x="2" y="2" width="20" height="20" rx="5" />
                                <circle cx="12" cy="12" r="5" />
                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                            </svg>
                        </a>
                        <a href="#" class="foot-soc" data-no-wipe title="LinkedIn" aria-label="LinkedIn">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z" />
                                <rect x="2" y="9" width="4" height="12" />
                                <circle cx="4" cy="4" r="2" />
                            </svg>
                        </a>
                        <a href="#" class="foot-soc" data-no-wipe title="X" aria-label="X Twitter">
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
        <div class="foot-bot">
            <p class="foot-copy">© <?= date('Y') ?> HouseOfSocial. All rights reserved.</p>
            <div class="foot-live"><span class="foot-live-dot"></span>Building the next campaign right now</div>
            <p class="foot-copy">houseofsocial.io</p>
        </div>
    </footer>

    <script>
    (function() {
        'use strict';
        var isTouch = !window.matchMedia('(hover:hover) and (pointer:fine)').matches;

        /* CURSOR */
        if (!isTouch) {
            var dot = document.getElementById('c-dot'),
                ring = document.getElementById('c-ring');
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
                rx += (mx - rx) * .11;
                ry += (my - ry) * .11;
                if (ring) {
                    ring.style.left = rx + 'px';
                    ring.style.top = ry + 'px';
                }
                requestAnimationFrame(loop);
            })();
            document.querySelectorAll('a,button').forEach(function(el) {
                el.addEventListener('mouseenter', function() {
                    document.body.classList.add('cur-hover');
                });
                el.addEventListener('mouseleave', function() {
                    document.body.classList.remove('cur-hover');
                });
            });
        }

        /* MAGNETIC */
        if (!isTouch) {
            document.querySelectorAll('[data-mag]').forEach(function(el) {
                el.addEventListener('mousemove', function(e) {
                    var r = el.getBoundingClientRect();
                    el.style.transform = 'translate(' + (e.clientX - r.left - r.width / 2) * .15 +
                        'px,' + (e.clientY - r.top - r.height / 2) * .15 + 'px)';
                });
                el.addEventListener('mouseleave', function() {
                    el.style.transform = '';
                });
            });
        }

        /* SCROLL PROGRESS + NAV */
        var nav = document.getElementById('g-nav'),
            prog = document.getElementById('g-prog');

        function onScroll() {
            var y = window.scrollY,
                max = document.body.scrollHeight - window.innerHeight;
            if (prog && max > 0) prog.style.width = Math.min(y / max * 100, 100) + '%';
            if (nav) y > 48 ? nav.classList.add('scrolled') : nav.classList.remove('scrolled');
        }
        window.addEventListener('scroll', onScroll, {
            passive: true
        });
        onScroll();

        /* MENU */
        var mOpen = false;
        window.gMenu = function() {
            mOpen = !mOpen;
            var m = document.getElementById('g-menu'),
                b = document.getElementById('g-mbtn');
            var l1 = document.getElementById('hl1'),
                l2 = document.getElementById('hl2');
            if (!m) return;
            m.classList.toggle('open', mOpen);
            document.body.style.overflow = mOpen ? 'hidden' : '';
            if (b) b.setAttribute('aria-expanded', String(mOpen));
            if (l1) l1.style.transform = mOpen ? 'rotate(45deg) translate(3.5px,3.5px)' : '';
            if (l2) l2.style.transform = mOpen ? 'rotate(-45deg) translate(3.5px,-3.5px)' : '';
        };
        document.querySelectorAll('#g-menu a').forEach(function(a) {
            a.addEventListener('click', function() {
                if (mOpen) gMenu();
            });
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mOpen) gMenu();
        });

        /* REVEAL */
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function(entries) {
                entries.forEach(function(e) {
                    if (e.isIntersecting) {
                        e.target.classList.add('in');
                        io.unobserve(e.target);
                    }
                });
            }, {
                threshold: .07,
                rootMargin: '0px 0px -10px 0px'
            });
            document.querySelectorAll('.rv').forEach(function(el) {
                io.observe(el);
            });
        } else {
            document.querySelectorAll('.rv').forEach(function(el) {
                el.classList.add('in');
            });
        }

        /* COUNTERS */
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
                    clearInterval(tm);
                }
                el.textContent = Math.floor(cur) + suf;
            }, step);
        }
        var co = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    animCount(e.target);
                    co.unobserve(e.target);
                }
            });
        }, {
            threshold: .5
        });
        document.querySelectorAll('[data-count]').forEach(function(el) {
            co.observe(el);
        });

        /* PAGE WIPE */
        document.querySelectorAll('a[href]').forEach(function(a) {
            var h = a.getAttribute('href');
            if (!h || h === '#' || h[0] === '#' || h.startsWith('mailto') || h.startsWith('tel') || h
                .startsWith('javascript') || a.target === '_blank' || a.hasAttribute('data-no-wipe'))
                return;
            a.addEventListener('click', function(e) {
                if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
                e.preventDefault();
                var w = document.getElementById('g-wipe');
                if (w) {
                    w.style.cssText =
                        'animation:none;transform:scaleY(0);transform-origin:bottom;transition:transform .48s cubic-bezier(.4,0,.2,1);';
                    requestAnimationFrame(function() {
                        requestAnimationFrame(function() {
                            w.style.transform = 'scaleY(1)';
                            setTimeout(function() {
                                window.location.href = h;
                            }, 500);
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