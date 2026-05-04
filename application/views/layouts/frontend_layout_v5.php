<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $s          = isset($data['_settings']) ? $data['_settings'] : (isset($data['settings']) ? $data['settings'] : []);
    $site_title = $s['site_title'] ?? 'FilmyCurry';
    $site_desc  = $s['hero_subtext'] ?? "India's premier influencer & meme marketing agency.";
    $uri        = isset($data['_uri']) ? $data['_uri'] : uri_string();
    $pg_title   = isset($data['page_title']) ? $data['page_title'] . ' — ' . $site_title : $site_title . ' — Spice Up Your Social Media';
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,700;1,9..40,400&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    fc: {
                        y: '#F5C518',
                        o: '#FF6432',
                        p: '#C860F0',
                        c: '#00D4FF',
                        g: '#3DFF8F',
                        bg: '#080810',
                        ink: '#0E0E1C',
                        card: '#13131F',
                        cream: '#EDE8DF',
                        muted: '#6B6B80',
                        border: '#1E1E2E'
                    }
                }
            }
        }
    }
    </script>

    <style>
    /* ── CSS VARS ─────────────────────────────── */
    :root {
        --y: #F5C518;
        --o: #FF6432;
        --p: #C860F0;
        --c: #00D4FF;
        --g: #3DFF8F;
        --bg: #080810;
        --ink: #0E0E1C;
        --card: #13131F;
        --cream: #EDE8DF;
        --muted: #6B6B80;
        --border: #1E1E2E;
        --font-d: 'Bebas Neue', Impact, sans-serif;
        --font-b: 'DM Sans', system-ui, sans-serif;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0
    }

    html {
        scroll-behavior: smooth;
        -webkit-font-smoothing: antialiased
    }

    body {
        background: var(--bg);
        color: var(--cream);
        font-family: var(--font-b);
        overflow-x: hidden;
        cursor: none
    }

    ::selection {
        background: var(--y);
        color: #000
    }

    ::-webkit-scrollbar {
        width: 2px
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(var(--y), var(--o))
    }

    img {
        max-width: 100%;
        height: auto
    }

    /* ══════════════════════════════════════════
       ANIMATED BACKGROUND LAYER
       FIX: z-index:2 so it shows above body bg
       but pointer-events:none so it never blocks clicks
    ══════════════════════════════════════════ */
    #fc-bg-layer {
        position: fixed;
        inset: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 2;
        overflow: hidden;
    }

    .fc-bg-el {
        position: absolute;
        pointer-events: none;
        will-change: transform;
        animation: fc-bg-float var(--fd, 12s) ease-in-out var(--fde, 0s) infinite;
        opacity: var(--fo, 0.15);
    }

    .fc-bg-el svg {
        width: 100%;
        height: 100%;
        display: block;
    }

    @keyframes fc-bg-float {

        0%,
        100% {
            transform: translateY(0px) rotate(var(--fr, 0deg));
        }

        50% {
            transform: translateY(var(--fy, -16px)) rotate(calc(var(--fr, 0deg) + var(--frs, 4deg)));
        }
    }

    /* Mobile: show only first 6 */
    @media (max-width: 767px) {
        .fc-bg-el:nth-child(n+7) {
            display: none;
        }
    }

    /* Tablet: show only first 12 */
    @media (min-width: 768px) and (max-width: 1023px) {
        .fc-bg-el:nth-child(n+13) {
            display: none;
        }
    }

    /* ── ORBS ─────────────────────────────────── */
    #fc-orbs {
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 1;
        overflow: hidden
    }

    .fc-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(120px);
        opacity: .045;
        animation: orb-drift 22s ease-in-out infinite
    }

    .o1 {
        width: 600px;
        height: 600px;
        background: var(--y);
        top: -180px;
        left: -120px;
        animation-delay: 0s
    }

    .o2 {
        width: 450px;
        height: 450px;
        background: var(--p);
        top: 35%;
        right: -100px;
        animation-delay: 7s
    }

    .o3 {
        width: 380px;
        height: 380px;
        background: var(--c);
        bottom: 8%;
        left: 28%;
        animation-delay: 14s
    }

    @keyframes orb-drift {

        0%,
        100% {
            transform: translate(0, 0) scale(1)
        }

        33% {
            transform: translate(22px, -16px) scale(1.05)
        }

        66% {
            transform: translate(-14px, 10px) scale(.96)
        }
    }

    /* ── CUSTOM CURSOR ────────────────────────── */
    #fc-cursor {
        width: 10px;
        height: 10px;
        background: var(--y);
        border-radius: 50%;
        position: fixed;
        pointer-events: none;
        z-index: 9999;
        transform: translate(-50%, -50%);
        mix-blend-mode: difference;
        transition: width .2s, height .2s;
    }

    #fc-cursor-ring {
        width: 38px;
        height: 38px;
        border: 1.5px solid rgba(245, 197, 24, .45);
        border-radius: 50%;
        position: fixed;
        pointer-events: none;
        z-index: 9998;
        transform: translate(-50%, -50%);
        transition: width .3s cubic-bezier(.16, 1, .3, 1), height .3s, opacity .3s, border-color .3s;
    }

    #fc-cursor-label {
        position: fixed;
        pointer-events: none;
        z-index: 9997;
        font-size: 8px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--y);
        transform: translate(-50%, 20px);
        opacity: 0;
        transition: opacity .2s;
        white-space: nowrap;
    }

    body.fc-ch #fc-cursor {
        width: 6px;
        height: 6px
    }

    body.fc-ch #fc-cursor-ring {
        width: 60px;
        height: 60px;
        border-color: var(--y);
        opacity: .9
    }

    body.fc-ch #fc-cursor-label {
        opacity: 1
    }

    /* ── SCROLL PROGRESS ──────────────────────── */
    #fc-progress {
        position: fixed;
        top: 0;
        left: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--y), var(--o), var(--p));
        z-index: 300;
        width: 0%;
        transition: width .08s linear;
    }

    /* ── NAVBAR ───────────────────────────────── */
    #fc-nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 200;
        padding: 0 52px;
        height: 72px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all .4s cubic-bezier(.16, 1, .3, 1);
    }

    #fc-nav.pinned {
        background: rgba(8, 8, 16, .95);
        backdrop-filter: blur(28px);
        border-bottom: 1px solid rgba(255, 255, 255, .05);
        height: 62px;
    }

    .fc-logo {
        font-family: var(--font-d);
        font-size: 26px;
        letter-spacing: .06em;
        color: var(--cream);
        text-decoration: none;
        flex-shrink: 0;
        transition: opacity .2s;
    }

    .fc-logo:hover {
        opacity: .85
    }

    .fc-logo .accent {
        color: var(--y)
    }

    .fc-nav-links {
        display: flex;
        align-items: center;
        gap: 32px
    }

    .fc-nav-link {
        font-size: 13px;
        font-weight: 600;
        color: rgba(237, 232, 223, .5);
        text-decoration: none;
        letter-spacing: .03em;
        transition: color .2s;
        position: relative;
        white-space: nowrap;
    }

    .fc-nav-link:hover,
    .fc-nav-link.active {
        color: var(--cream)
    }

    .fc-nav-link::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 0;
        height: 1px;
        background: var(--y);
        transition: width .35s cubic-bezier(.16, 1, .3, 1);
    }

    .fc-nav-link:hover::after,
    .fc-nav-link.active::after {
        width: 100%
    }

    .fc-nav-cta {
        background: var(--y);
        color: #080810;
        font-family: var(--font-d);
        font-size: 14px;
        letter-spacing: .08em;
        padding: 9px 22px;
        border-radius: 4px;
        text-decoration: none;
        transition: transform .2s, filter .2s, box-shadow .2s;
        white-space: nowrap;
    }

    .fc-nav-cta:hover {
        transform: translateY(-2px);
        filter: brightness(1.1);
        box-shadow: 0 8px 24px rgba(245, 197, 24, .35)
    }

    /* ── HAMBURGER ────────────────────────────── */
    #fc-hbg {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        flex-direction: column;
        gap: 5px;
        padding: 8px;
        z-index: 201;
        position: relative;
    }

    .fc-hb {
        display: block;
        width: 22px;
        height: 1.5px;
        background: var(--cream);
        transition: all .3s cubic-bezier(.16, 1, .3, 1)
    }

    /* ── MOBILE MENU ──────────────────────────── */
    #fc-mob {
        position: fixed;
        inset: 0;
        z-index: 190;
        background: rgba(8, 8, 16, .98);
        backdrop-filter: blur(24px);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        padding: 0 36px;
        gap: 4px;
        opacity: 0;
        pointer-events: none;
        transition: opacity .35s;
    }

    #fc-mob.open {
        opacity: 1;
        pointer-events: all
    }

    .fc-mob-link {
        font-family: var(--font-d);
        font-size: clamp(38px, 9vw, 68px);
        color: rgba(237, 232, 223, .1);
        text-decoration: none;
        line-height: 1.08;
        transition: color .25s, transform .3s;
        display: block;
        padding: 5px 0;
    }

    .fc-mob-link:hover {
        color: var(--y);
        transform: translateX(12px)
    }

    .mob-contact {
        margin-top: 40px;
        padding-top: 24px;
        border-top: 1px solid var(--border)
    }

    .mob-contact p {
        font-size: 13px;
        font-weight: 500;
        color: var(--muted);
        margin-bottom: 6px
    }

    /* ── FOOTER ───────────────────────────────── */
    .fc-footer {
        background: #050510;
        border-top: 1px solid var(--border);
        padding: 72px 52px 36px;
        position: relative;
        z-index: 5
    }

    .fc-footer-logo {
        font-family: var(--font-d);
        font-size: 26px;
        letter-spacing: .06em;
        margin-bottom: 14px;
        color: var(--cream)
    }

    .fc-footer-label {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 16px;
        display: block
    }

    .fc-footer-link {
        display: block;
        font-size: 13px;
        color: rgba(237, 232, 223, .38);
        font-weight: 500;
        margin-bottom: 10px;
        text-decoration: none;
        transition: color .2s
    }

    .fc-footer-link:hover {
        color: var(--y)
    }

    .fc-social {
        width: 34px;
        height: 34px;
        border: 1px solid rgba(255, 255, 255, .08);
        border-radius: 4px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 700;
        color: var(--muted);
        text-decoration: none;
        transition: all .2s;
    }

    .fc-social:hover {
        border-color: var(--y);
        color: var(--y)
    }

    .fc-max {
        max-width: 1380px;
        margin: 0 auto
    }

    .fc-grad-1 {
        background: linear-gradient(135deg, var(--y), var(--o));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text
    }

    /* ── REVEAL ───────────────────────────────── */
    .fc-rv {
        opacity: 0;
        transform: translateY(36px);
        transition: opacity .85s cubic-bezier(.16, 1, .3, 1), transform .85s cubic-bezier(.16, 1, .3, 1)
    }

    .fc-rv.fc-in {
        opacity: 1;
        transform: none
    }

    .d1 {
        transition-delay: .08s !important
    }

    .d2 {
        transition-delay: .16s !important
    }

    .d3 {
        transition-delay: .24s !important
    }

    .d4 {
        transition-delay: .32s !important
    }

    /* ── RESPONSIVE ───────────────────────────── */
    @media(max-width:1024px) {
        #fc-nav {
            padding: 0 28px
        }

        .fc-footer {
            padding: 56px 28px 28px
        }
    }

    @media(max-width:768px) {
        #fc-nav {
            padding: 0 18px;
            height: 60px
        }

        #fc-hbg {
            display: flex
        }

        .fc-nav-links {
            display: none
        }

        .fc-footer {
            padding: 48px 18px 24px
        }

        .fc-footer-cols {
            grid-template-columns: 1fr 1fr !important
        }

        body {
            cursor: auto
        }

        #fc-cursor,
        #fc-cursor-ring,
        #fc-cursor-label {
            display: none !important
        }
    }

    @media(max-width:480px) {
        .fc-footer-cols {
            grid-template-columns: 1fr !important
        }

        #fc-nav {
            height: 56px
        }
    }
    </style>
</head>

<body>

    <!-- ══════════════════════════════════════════════
         ANIMATED BACKGROUND LAYER
         z-index:2 → above body bg, below content (z-index:3+)
         pointer-events:none → never blocks any clicks
    ══════════════════════════════════════════════ -->
    <div id="fc-bg-layer" aria-hidden="true">

        <!-- CLAPPERBOARD — top-left -->
        <div class="fc-bg-el"
            style="left:6%;top:7%;width:62px;height:62px;--fo:.18;--fd:13s;--fde:.2s;--fr:-5deg;--frs:4deg;--fy:-16px">
            <svg viewBox="0 0 80 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="4" y="22" width="72" height="50" rx="4" fill="#666" />
                <rect x="4" y="10" width="72" height="16" rx="3" fill="#555" />
                <line x1="18" y1="10" x2="12" y2="26" stroke="#aaa" stroke-width="4" />
                <line x1="30" y1="10" x2="24" y2="26" stroke="#aaa" stroke-width="4" />
                <line x1="42" y1="10" x2="36" y2="26" stroke="#aaa" stroke-width="4" />
                <line x1="54" y1="10" x2="48" y2="26" stroke="#aaa" stroke-width="4" />
                <line x1="66" y1="10" x2="60" y2="26" stroke="#aaa" stroke-width="4" />
            </svg>
        </div>

        <!-- FILM REEL — top-right -->
        <div class="fc-bg-el"
            style="left:78%;top:10%;width:56px;height:56px;--fo:.16;--fd:9s;--fde:1.5s;--fr:8deg;--frs:-5deg;--fy:-14px">
            <svg viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="30" cy="30" r="26" stroke="#aaa" stroke-width="3" fill="none" />
                <circle cx="30" cy="30" r="9" stroke="#aaa" stroke-width="3" fill="#444" />
                <circle cx="30" cy="8" r="4.5" fill="#888" />
                <circle cx="30" cy="52" r="4.5" fill="#888" />
                <circle cx="8" cy="19" r="4.5" fill="#888" />
                <circle cx="52" cy="19" r="4.5" fill="#888" />
                <circle cx="8" cy="41" r="4.5" fill="#888" />
                <circle cx="52" cy="41" r="4.5" fill="#888" />
            </svg>
        </div>

        <!-- VIDEO CAMERA — mid-right -->
        <div class="fc-bg-el"
            style="left:85%;top:35%;width:64px;height:64px;--fo:.16;--fd:11s;--fde:.4s;--fr:10deg;--frs:-4deg;--fy:-13px">
            <svg viewBox="0 0 72 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="2" y="10" width="44" height="32" rx="4" fill="#666" />
                <polygon points="46,16 66,10 66,40 46,36" fill="#555" />
                <circle cx="20" cy="26" r="9" fill="#444" />
                <circle cx="20" cy="26" r="5.5" fill="#333" />
                <rect x="6" y="42" width="6" height="7" rx="1.5" fill="#999" />
                <rect x="15" y="42" width="6" height="7" rx="1.5" fill="#999" />
                <rect x="28" y="42" width="6" height="7" rx="1.5" fill="#999" />
                <rect x="37" y="42" width="6" height="7" rx="1.5" fill="#999" />
            </svg>
        </div>

        <!-- POPCORN — upper-right -->
        <div class="fc-bg-el"
            style="left:88%;top:6%;width:54px;height:54px;--fo:.16;--fd:8s;--fde:.5s;--fr:12deg;--frs:-5deg;--fy:-15px">
            <svg viewBox="0 0 80 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 30 L18 80 H62 L70 30 Z" fill="#777" />
                <rect x="8" y="20" width="64" height="14" rx="3" fill="#666" />
                <line x1="27" y1="20" x2="22" y2="80" stroke="#999" stroke-width="3" />
                <line x1="53" y1="20" x2="58" y2="80" stroke="#999" stroke-width="3" />
                <circle cx="24" cy="14" r="8" fill="#aaa" />
                <circle cx="40" cy="8" r="10" fill="#bbb" />
                <circle cx="56" cy="14" r="8" fill="#aaa" />
            </svg>
        </div>

        <!-- FILM STRIP — left mid -->
        <div class="fc-bg-el"
            style="left:2%;top:42%;width:76px;height:76px;--fo:.14;--fd:12s;--fde:1.2s;--fr:-3deg;--frs:3deg;--fy:-9px">
            <svg viewBox="0 0 90 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0" y="0" width="90" height="32" rx="3" fill="#444" />
                <rect x="4" y="4" width="10" height="9" rx="2" fill="#777" />
                <rect x="22" y="4" width="10" height="9" rx="2" fill="#777" />
                <rect x="40" y="4" width="10" height="9" rx="2" fill="#777" />
                <rect x="58" y="4" width="10" height="9" rx="2" fill="#777" />
                <rect x="76" y="4" width="10" height="9" rx="2" fill="#777" />
                <rect x="4" y="19" width="10" height="9" rx="2" fill="#777" />
                <rect x="22" y="19" width="10" height="9" rx="2" fill="#777" />
                <rect x="40" y="19" width="10" height="9" rx="2" fill="#777" />
                <rect x="58" y="19" width="10" height="9" rx="2" fill="#777" />
                <rect x="76" y="19" width="10" height="9" rx="2" fill="#777" />
            </svg>
        </div>

        <!-- MEME FACE — top-center -->
        <div class="fc-bg-el"
            style="left:46%;top:5%;width:60px;height:60px;--fo:.14;--fd:14s;--fde:2s;--fr:2deg;--frs:3deg;--fy:-18px">
            <svg viewBox="0 0 70 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0" y="0" width="68" height="28" rx="8" fill="#555" />
                <polygon points="12,28 26,28 16,40" fill="#555" />
                <circle cx="56" cy="52" r="18" fill="#777" />
                <ellipse cx="50" cy="47" rx="3" ry="4" fill="#444" />
                <ellipse cx="62" cy="47" rx="3" ry="4" fill="#444" />
                <path d="M47 60 Q56 65 65 60" stroke="#444" stroke-width="2" fill="none" stroke-linecap="round" />
            </svg>
        </div>

        <!-- CINEMA TICKET — bottom-left -->
        <div class="fc-bg-el"
            style="left:14%;top:72%;width:70px;height:70px;--fo:.18;--fd:10s;--fde:.6s;--fr:5deg;--frs:-3deg;--fy:-11px">
            <svg viewBox="0 0 90 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="2" y="2" width="86" height="38" rx="5" fill="#555" stroke="#777" stroke-width="1.5" />
                <circle cx="24" cy="21" r="9" fill="#080810" />
                <line x1="32" y1="2" x2="32" y2="40" stroke="#777" stroke-width="1.5" stroke-dasharray="4 3" />
                <rect x="40" y="10" width="36" height="5" rx="2" fill="#777" />
                <rect x="40" y="20" width="24" height="5" rx="2" fill="#666" />
                <rect x="40" y="30" width="30" height="4" rx="2" fill="#666" />
            </svg>
        </div>

        <!-- STAR — right accent -->
        <div class="fc-bg-el"
            style="left:92%;top:7%;width:28px;height:28px;--fo:.18;--fd:7s;--fde:1.2s;--fr:0deg;--frs:10deg;--fy:-8px">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3L24 14H36L26 21L30 33L20 26L10 33L14 21L4 14H16Z" fill="#F5C518" />
            </svg>
        </div>

        <!-- STAR — left accent -->
        <div class="fc-bg-el"
            style="left:4%;top:20%;width:20px;height:20px;--fo:.16;--fd:6s;--fde:.5s;--fr:15deg;--frs:-6deg;--fy:-7px">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3L24 14H36L26 21L30 33L20 26L10 33L14 21L4 14H16Z" fill="#F5C518" />
            </svg>
        </div>

        <!-- FILM REEL — bottom-right -->
        <div class="fc-bg-el"
            style="left:72%;top:80%;width:50px;height:50px;--fo:.14;--fd:9s;--fde:3.5s;--fr:-6deg;--frs:4deg;--fy:-11px">
            <svg viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="30" cy="30" r="26" stroke="#999" stroke-width="3" fill="none" />
                <circle cx="30" cy="30" r="9" stroke="#999" stroke-width="3" fill="#444" />
                <circle cx="30" cy="8" r="4.5" fill="#777" />
                <circle cx="30" cy="52" r="4.5" fill="#777" />
                <circle cx="8" cy="19" r="4.5" fill="#777" />
                <circle cx="52" cy="19" r="4.5" fill="#777" />
                <circle cx="8" cy="41" r="4.5" fill="#777" />
                <circle cx="52" cy="41" r="4.5" fill="#777" />
            </svg>
        </div>

        <!-- CLAPPERBOARD — bottom-center -->
        <div class="fc-bg-el"
            style="left:44%;top:82%;width:54px;height:54px;--fo:.16;--fd:11s;--fde:.8s;--fr:-4deg;--frs:3deg;--fy:-12px">
            <svg viewBox="0 0 80 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="4" y="22" width="72" height="50" rx="4" fill="#555" />
                <rect x="4" y="10" width="72" height="16" rx="3" fill="#444" />
                <line x1="18" y1="10" x2="12" y2="26" stroke="#999" stroke-width="4" />
                <line x1="30" y1="10" x2="24" y2="26" stroke="#999" stroke-width="4" />
                <line x1="42" y1="10" x2="36" y2="26" stroke="#999" stroke-width="4" />
                <line x1="54" y1="10" x2="48" y2="26" stroke="#999" stroke-width="4" />
                <line x1="66" y1="10" x2="60" y2="26" stroke="#999" stroke-width="4" />
            </svg>
        </div>

        <!-- POPCORN — bottom-left -->
        <div class="fc-bg-el"
            style="left:28%;top:78%;width:46px;height:46px;--fo:.14;--fd:8s;--fde:1.7s;--fr:-9deg;--frs:5deg;--fy:-13px">
            <svg viewBox="0 0 80 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 30 L18 80 H62 L70 30 Z" fill="#666" />
                <rect x="8" y="20" width="64" height="14" rx="3" fill="#555" />
                <line x1="27" y1="20" x2="22" y2="80" stroke="#888" stroke-width="3" />
                <circle cx="24" cy="14" r="8" fill="#999" />
                <circle cx="40" cy="8" r="10" fill="#aaa" />
                <circle cx="56" cy="14" r="8" fill="#999" />
            </svg>
        </div>

        <!-- MEME FACE — bottom-right -->
        <div class="fc-bg-el"
            style="left:80%;top:68%;width:52px;height:52px;--fo:.14;--fd:10s;--fde:.6s;--fr:4deg;--frs:-4deg;--fy:-12px">
            <svg viewBox="0 0 70 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0" y="0" width="68" height="28" rx="8" fill="#444" />
                <polygon points="12,28 26,28 16,40" fill="#444" />
                <circle cx="56" cy="52" r="18" fill="#666" />
                <ellipse cx="50" cy="47" rx="3" ry="4" fill="#333" />
                <ellipse cx="62" cy="47" rx="3" ry="4" fill="#333" />
                <path d="M47 60 Q56 65 65 60" stroke="#333" stroke-width="2" fill="none" stroke-linecap="round" />
            </svg>
        </div>

        <!-- FILM STRIP — bottom-center -->
        <div class="fc-bg-el"
            style="left:35%;top:75%;width:68px;height:68px;--fo:.12;--fd:13s;--fde:4s;--fr:-7deg;--frs:4deg;--fy:-9px">
            <svg viewBox="0 0 90 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0" y="0" width="90" height="32" rx="3" fill="#333" />
                <rect x="4" y="4" width="10" height="9" rx="2" fill="#555" />
                <rect x="22" y="4" width="10" height="9" rx="2" fill="#555" />
                <rect x="40" y="4" width="10" height="9" rx="2" fill="#555" />
                <rect x="58" y="4" width="10" height="9" rx="2" fill="#555" />
                <rect x="76" y="4" width="10" height="9" rx="2" fill="#555" />
                <rect x="4" y="19" width="10" height="9" rx="2" fill="#555" />
                <rect x="22" y="19" width="10" height="9" rx="2" fill="#555" />
                <rect x="40" y="19" width="10" height="9" rx="2" fill="#555" />
                <rect x="58" y="19" width="10" height="9" rx="2" fill="#555" />
                <rect x="76" y="19" width="10" height="9" rx="2" fill="#555" />
            </svg>
        </div>

        <!-- TICKET — right-mid-low -->
        <div class="fc-bg-el"
            style="left:60%;top:62%;width:66px;height:66px;--fo:.14;--fd:9s;--fde:2.1s;--fr:6deg;--frs:-3deg;--fy:-10px">
            <svg viewBox="0 0 90 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="2" y="2" width="86" height="38" rx="5" fill="#444" stroke="#666" stroke-width="1.5" />
                <circle cx="24" cy="21" r="9" fill="#080810" />
                <line x1="32" y1="2" x2="32" y2="40" stroke="#666" stroke-width="1.5" stroke-dasharray="4 3" />
                <rect x="40" y="10" width="36" height="5" rx="2" fill="#666" />
                <rect x="40" y="20" width="24" height="5" rx="2" fill="#555" />
                <rect x="40" y="30" width="30" height="4" rx="2" fill="#555" />
            </svg>
        </div>

        <!-- STAR — bottom accent -->
        <div class="fc-bg-el"
            style="left:52%;top:90%;width:22px;height:22px;--fo:.16;--fd:7s;--fde:2s;--fr:14deg;--frs:-5deg;--fy:-7px">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3L24 14H36L26 21L30 33L20 26L10 33L14 21L4 14H16Z" fill="#F5C518" />
            </svg>
        </div>

        <!-- CAMERA SVG — top-center -->
        <div class="fc-bg-el"
            style="left:60%;top:5%;width:60px;height:60px;--fo:.16;--fd:11s;--fde:.5s;--fr:-6deg;--frs:4deg;--fy:-16px">
            <svg viewBox="0 0 64 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="4" y="10" width="38" height="26" rx="4" fill="#777" />
                <polygon points="42,16 58,10 58,36 42,30" fill="#666" />
                <circle cx="18" cy="23" r="7" fill="#555" />
                <circle cx="18" cy="23" r="4" fill="#444" />
                <rect x="6" y="38" width="5" height="7" rx="1" fill="#999" />
                <rect x="13" y="38" width="5" height="7" rx="1" fill="#999" />
                <rect x="24" y="38" width="5" height="7" rx="1" fill="#999" />
                <rect x="31" y="38" width="5" height="7" rx="1" fill="#999" />
            </svg>
        </div>

    </div>
    <!-- /#fc-bg-layer -->

    <!-- ORBS -->
    <div id="fc-orbs" aria-hidden="true">
        <div class="fc-orb o1"></div>
        <div class="fc-orb o2"></div>
        <div class="fc-orb o3"></div>
    </div>

    <!-- CURSOR -->
    <div id="fc-cursor" aria-hidden="true"></div>
    <div id="fc-cursor-ring" aria-hidden="true"></div>
    <div id="fc-cursor-label" aria-hidden="true"></div>
    <div id="fc-progress" aria-hidden="true"></div>

    <!-- NAVBAR -->
    <nav id="fc-nav" role="navigation" aria-label="Main navigation">
        <a href="<?= base_url() ?>" class="fc-logo" aria-label="<?= htmlspecialchars($site_title) ?> Home">
            <?php if ($logo_url): ?>
            <img src="<?= $logo_url ?>" alt="<?= htmlspecialchars($site_title) ?>" style="height:32px;width:auto">
            <?php else: ?>FILMY<span class="accent">CURRY</span><?php endif; ?>
        </a>
        <div class="fc-nav-links">
            <a href="<?= base_url() ?>"
                class="fc-nav-link <?= ($uri === '' || $uri === '/') ? 'active' : '' ?>">Home</a>
            <a href="<?= base_url('about') ?>"
                class="fc-nav-link <?= strpos($uri, 'about') !== FALSE ? 'active' : '' ?>">About</a>
            <a href="<?= base_url('work') ?>"
                class="fc-nav-link <?= strpos($uri, 'work') !== FALSE ? 'active' : '' ?>">Our Work</a>
            <a href="<?= base_url('contact') ?>" class="fc-nav-cta">Let's Talk ↗</a>
        </div>
        <button id="fc-hbg" aria-label="Toggle menu" aria-expanded="false">
            <span class="fc-hb" id="b1"></span>
            <span class="fc-hb" id="b2"></span>
            <span class="fc-hb" id="b3"></span>
        </button>
    </nav>

    <!-- MOBILE MENU -->
    <div id="fc-mob" role="dialog" aria-modal="true" aria-label="Navigation">
        <a href="<?= base_url() ?>" class="fc-mob-link">HOME</a>
        <a href="<?= base_url('about') ?>" class="fc-mob-link">ABOUT</a>
        <a href="<?= base_url('work') ?>" class="fc-mob-link">OUR WORK</a>
        <a href="<?= base_url('contact') ?>" class="fc-mob-link" style="color:var(--y)">LET'S TALK</a>
        <div class="mob-contact">
            <p><?= htmlspecialchars($s['site_email'] ?? '') ?></p>
            <p><?= htmlspecialchars($s['site_phone'] ?? '') ?></p>
        </div>
    </div>

    <!-- FIX: z-index:3 so it sits above bg layer (z-index:2) -->
    <!-- FIX: background:transparent so bg layer shows through -->
    <main role="main" style="position:relative;z-index:3;background:transparent"><?= $content ?></main>

    <!-- FOOTER -->
    <footer class="fc-footer" aria-label="Site footer">
        <div class="fc-max">
            <div class="fc-footer-cols"
                style="display:grid;grid-template-columns:1.3fr 1fr 1fr 1fr;gap:44px;margin-bottom:48px">
                <div>
                    <div class="fc-footer-logo">FILMY<span class="fc-grad-1">CURRY</span></div>
                    <p style="font-size:13px;color:var(--muted);line-height:1.8;max-width:250px;font-weight:500">India's
                        premier influencer & meme marketing agency. Powering 32% of all OTT releases.</p>
                    <div style="display:flex;gap:8px;margin-top:20px">
                        <a href="#" aria-label="LinkedIn" class="fc-social">In</a>
                        <a href="#" aria-label="Instagram" class="fc-social">Ig</a>
                        <a href="#" aria-label="X" class="fc-social">X</a>
                    </div>
                </div>
                <div>
                    <span class="fc-footer-label">Navigate</span>
                    <a href="<?= base_url() ?>" class="fc-footer-link">Home</a>
                    <a href="<?= base_url('about') ?>" class="fc-footer-link">About</a>
                    <a href="<?= base_url('work') ?>" class="fc-footer-link">Our Work</a>
                    <a href="<?= base_url('contact') ?>" class="fc-footer-link">Contact</a>
                </div>
                <div>
                    <span class="fc-footer-label">Services</span>
                    <?php foreach (['Influencer Marketing', 'Meme Marketing', 'Movie Promotions', 'Video Production'] as $sv): ?>
                    <span class="fc-footer-link" style="cursor:default"><?= $sv ?></span>
                    <?php endforeach; ?>
                </div>
                <div>
                    <span class="fc-footer-label">Contact</span>
                    <a href="mailto:<?= htmlspecialchars($s['site_email'] ?? '') ?>"
                        class="fc-footer-link"><?= htmlspecialchars($s['site_email'] ?? 'contact@filmycurry.com') ?></a>
                    <a href="tel:<?= htmlspecialchars($s['site_phone'] ?? '') ?>"
                        class="fc-footer-link"><?= htmlspecialchars($s['site_phone'] ?? '+91 9990802115') ?></a>
                    <span class="fc-footer-link"
                        style="cursor:default"><?= htmlspecialchars($s['site_address'] ?? 'India') ?></span>
                </div>
            </div>
            <div
                style="border-top:1px solid var(--border);padding-top:20px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px">
                <p style="font-size:11px;color:rgba(237,232,223,.2);font-weight:500">© <?= date('Y') ?>
                    <?= htmlspecialchars($site_title) ?>. All rights reserved.</p>
                <p style="font-size:11px;color:rgba(237,232,223,.2);font-weight:500">Made with 🎬 in India</p>
            </div>
        </div>
    </footer>

    <script>
    (function() {
        var isTouch = !window.matchMedia('(pointer:fine)').matches;
        var cur = document.getElementById('fc-cursor');
        var ring = document.getElementById('fc-cursor-ring');
        var clbl = document.getElementById('fc-cursor-label');

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
                if (clbl) {
                    clbl.style.left = mx + 'px';
                    clbl.style.top = my + 'px';
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

            document.querySelectorAll('[data-fc-cur]').forEach(function(el) {
                el.addEventListener('mouseenter', function() {
                    document.body.classList.add('fc-ch');
                    if (clbl) clbl.textContent = el.dataset.fcCur;
                });
                el.addEventListener('mouseleave', function() {
                    document.body.classList.remove('fc-ch');
                    if (clbl) clbl.textContent = '';
                });
            });

            document.querySelectorAll('a:not([data-fc-cur]),button:not([data-fc-cur])').forEach(function(el) {
                el.addEventListener('mouseenter', function() {
                    if (ring) {
                        ring.style.width = '52px';
                        ring.style.height = '52px';
                        ring.style.opacity = '1';
                    }
                });
                el.addEventListener('mouseleave', function() {
                    if (ring) {
                        ring.style.width = '38px';
                        ring.style.height = '38px';
                        ring.style.opacity = '.5';
                    }
                });
            });
        }

        /* Scroll progress + nav pin */
        var nav = document.getElementById('fc-nav');
        var prog = document.getElementById('fc-progress');
        window.addEventListener('scroll', function() {
            if (prog) prog.style.width = (window.scrollY / (document.body.scrollHeight - window
                .innerHeight) * 100) + '%';
            if (nav) window.scrollY > 60 ? nav.classList.add('pinned') : nav.classList.remove('pinned');
        }, {
            passive: true
        });

        /* Reveal on scroll */
        var rvObs = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    e.target.classList.add('fc-in');
                    rvObs.unobserve(e.target);
                }
            });
        }, {
            threshold: .08,
            rootMargin: '0px 0px -32px 0px'
        });
        document.querySelectorAll('.fc-rv').forEach(function(el) {
            rvObs.observe(el);
        });

        /* Mobile menu */
        var mob = document.getElementById('fc-mob');
        var hbg = document.getElementById('fc-hbg');
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
                if (b1) b1.style.transform = open ? 'rotate(45deg) translate(4px,5px)' : '';
                if (b2) b2.style.opacity = open ? '0' : '';
                if (b3) b3.style.transform = open ? 'rotate(-45deg) translate(4px,-5px)' : '';
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

        /* Scroll parallax on bg elements */
        var bgEls = document.querySelectorAll('.fc-bg-el');
        var ticking = false;
        if (bgEls.length) {
            window.addEventListener('scroll', function() {
                if (!ticking) {
                    requestAnimationFrame(function() {
                        var sy = window.pageYOffset || document.documentElement.scrollTop;
                        bgEls.forEach(function(el, i) {
                            var speed = 0.025 + (i % 5) * 0.012;
                            el.style.marginTop = -(sy * speed) + 'px';
                        });
                        ticking = false;
                    });
                    ticking = true;
                }
            }, {
                passive: true
            });
        }
    })();
    </script>

</body>

</html>