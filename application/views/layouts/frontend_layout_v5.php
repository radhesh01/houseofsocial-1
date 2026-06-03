<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NNNSWTLX');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <?php
    $s          = isset($data['_settings']) ? $data['_settings'] : (isset($data['settings']) ? $data['settings'] : []);
    $site_title = $s['site_title'] ?? 'HouseOfSocial';
    $site_desc  = $s['hero_subtext'] ?? 'Internet-native creative marketing agency.';
    $uri        = isset($data['_uri']) ? $data['_uri'] : uri_string();
    $pg_title   = isset($data['meta_title']) ? $data['meta_title'] : (isset($data['page_title']) ? $data['page_title'] . ' — ' . $site_title : $site_title . ' | Internet-Native Creative Agency');
    $pg_desc    = isset($data['meta_desc']) ? $data['meta_desc'] : $site_desc;
    $logo_url   = (!empty($s['site_logo'])) ? base_url('assets/images/uploads/' . $s['site_logo']) : '';

    $CI = &get_instance();
    $nav_services = [];
    if (isset($CI->Service_model)) {
        $nav_services = $CI->Service_model->get_active();
    } else {
        $CI->load->model('Service_model');
        $nav_services = $CI->Service_model->get_active();
    }
    ?>
    <title><?= htmlspecialchars($pg_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pg_desc) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pg_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pg_desc) ?>">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($pg_title) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pg_desc) ?>">
    <link rel="canonical" href="<?= base_url(uri_string()) ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=Satoshi:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <link
        href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&f[]=satoshi@300,400,500,700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --ink: #08080C;
            --paper: #F4F1EC;
            --chalk: #E8E4DC;
            --smoke: #B0AAA0;
            --ghost: rgba(244, 241, 236, .06);
            --ghost2: rgba(244, 241, 236, .12);
            --ghost3: rgba(244, 241, 236, .24);
            --ghost4: rgba(244, 241, 236, .48);
            --ghost5: rgba(244, 241, 236, .72);
            --flame: #FF3C00;
            --flame2: #FF6B35;
            --lime: #C8F135;
            --limeDim: rgba(200, 241, 53, .14);
            --limeMid: rgba(200, 241, 53, .35);
            --s0: #08080C;
            --s1: #0D0D13;
            --s2: #121218;
            --s3: #181820;
            --s4: #1E1E28;
            --s5: #242430;
            --b1: rgba(244, 241, 236, .06);
            --b2: rgba(244, 241, 236, .12);
            --b3: rgba(244, 241, 236, .22);
            --fDisplay: 'Clash Display', 'Bebas Neue', Impact, sans-serif;
            --fBody: 'Satoshi', 'DM Sans', system-ui, sans-serif;
            --navH: 64px;
            --px: clamp(18px, 5.5vw, 88px);
            --maxW: 1480px;
            --gap: clamp(8px, 1.5vw, 20px);
            --sec: clamp(72px, 10vw, 140px);
            --ease: cubic-bezier(.19, 1, .22, 1);
            --ease2: cubic-bezier(.4, 0, .2, 1);
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

        @media(hover:hover) and (pointer:fine) {
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

        @media(hover:none),
        (pointer:coarse) {

            #g-dot,
            #g-ring {
                display: none;
            }
        }

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

        @media(hover:hover) {
            .mq-track:hover {
                animation-play-state: paused;
            }
        }

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

        /* ── NAV ── */
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

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 36px;
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

        /* ── SERVICES DROPDOWN ── */
        .nav-dropdown {
            position: relative;
        }

        .nav-dropdown-toggle {
            font-size: 13.5px;
            font-weight: 500;
            letter-spacing: .02em;
            color: var(--ghost4);
            position: relative;
            padding: 4px 0;
            transition: color .2s;
            cursor: pointer;
            background: none;
            border: none;
            font-family: var(--fBody);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-dropdown-toggle::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--flame);
            transition: width .32s var(--ease);
        }

        /* Desktop: CSS hover opens dropdown */
        @media(hover:hover) and (pointer:fine) {
            .nav-dropdown:hover .nav-dropdown-toggle {
                color: var(--paper);
            }

            .nav-dropdown:hover .nav-dropdown-toggle::after {
                width: 100%;
            }

            .nav-dropdown:hover .nav-dropdown-arrow {
                transform: rotate(180deg);
            }

            .nav-dropdown:hover>.nav-dropdown-menu {
                max-height: 600px;
                opacity: 1;
                pointer-events: all;
            }
        }

        /* JS-toggled open state (for touch/tablet) */
        .nav-dropdown.is-open .nav-dropdown-toggle {
            color: var(--paper);
        }

        .nav-dropdown.is-open .nav-dropdown-toggle::after {
            width: 100%;
        }

        .nav-dropdown.is-open .nav-dropdown-arrow {
            transform: rotate(180deg);
        }

        .nav-dropdown.is-open>.nav-dropdown-menu {
            max-height: 600px;
            opacity: 1;
            pointer-events: all;
        }

        .nav-dropdown-arrow {
            font-size: 9px;
            transition: transform .2s;
            display: inline-block;
            opacity: .6;
        }

        .nav-dropdown-menu {
            position: absolute;
            top: calc(100% + 16px);
            left: 50%;
            transform: translateX(-50%);
            background: rgba(8, 8, 12, .98);
            border: 1px solid var(--b2);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            min-width: 220px;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: max-height .35s var(--ease), opacity .25s;
            pointer-events: none;
            z-index: 700;
        }

        /* Creates an invisible hover bridge across the 16px gap */
        .nav-dropdown-menu::before {
            content: '';
            position: absolute;
            top: -16px;
            left: 0;
            width: 100%;
            height: 16px;
        }

        .nav-dropdown-item {
            display: block;
            padding: 11px 18px;
            font-size: 13px;
            color: var(--ghost4);
            transition: background .15s, color .15s;
            border-bottom: 1px solid var(--b1);
            white-space: nowrap;
        }

        .nav-dropdown-item:last-child {
            border-bottom: none;
        }

        .nav-dropdown-item:hover {
            background: rgba(255, 60, 0, .08);
            color: var(--paper);
        }

        .nav-dropdown-item.on {
            color: var(--flame);
        }

        .nav-dropdown-view-all {
            display: block;
            padding: 10px 18px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--flame);
            text-align: center;
            border-top: 1px solid var(--b1);
            transition: background .15s;
        }

        .nav-dropdown-view-all:hover {
            background: rgba(255, 60, 0, .08);
        }

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

        /* ── FULLSCREEN MENU ── */
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
            overflow-y: auto;
        }

        .menu-link {
            font-family: var(--fDisplay);
            font-size: clamp(42px, 7vw, 96px);
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

        .menu-svc-group {
            margin-top: 12px;
            padding-left: 4px;
        }

        .menu-svc-label {
            font-family: var(--fBody);
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: var(--ghost3);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            padding: 0;
        }

        .menu-svc-links {
            display: flex;
            flex-direction: column;
            gap: 2px;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: max-height .4s var(--ease), opacity .3s;
        }

        .menu-svc-group.is-open .menu-svc-links {
            max-height: 400px;
            opacity: 1;
            margin-bottom: 12px;
        }

        .menu-svc-group.is-open .nav-dropdown-arrow {
            transform: rotate(180deg);
        }

        .menu-svc-lnk {
            font-size: 15px;
            color: var(--ghost3);
            padding: 6px 0;
            transition: color .2s, padding-left .2s;
        }

        .menu-svc-lnk:hover {
            color: var(--flame);
            padding-left: 8px;
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

        /* ── FOOTER ── */
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

        /* ── RESPONSIVE ── */
        @media(max-width:1079px) {
            .nav-links {
                gap: 24px;
            }

            .nav-dropdown-menu {
                left: 0;
                transform: none;
            }
        }

        @media(max-width:899px) {
            .nav-links {
                display: none;
            }
        }

        @media(max-width:767px) {
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

        @media(max-width:479px) {
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

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NNNSWTLX" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <div id="g-wipe" aria-hidden="true"></div>
    <div id="g-prog" aria-hidden="true"></div>
    <div id="g-ring" aria-hidden="true"></div>
    <div id="g-dot" aria-hidden="true"></div>

    <!-- ═══ NAV ══════════════════════════════════════════════════════ -->
    <nav id="g-nav" role="navigation" aria-label="Main navigation">
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

        <div class="nav-links">
            <a href="<?= base_url() ?>" class="nav-a <?= ($uri === '' || $uri === '/') ? 'on' : '' ?>">Home</a>
            <a href="<?= base_url('about') ?>"
                class="nav-a <?= strpos($uri, 'about') !== false ? 'on' : '' ?>">About</a>
            <a href="<?= base_url('work') ?>" class="nav-a <?= strpos($uri, 'work') !== false ? 'on' : '' ?>">Work</a>

            <?php if (!empty($nav_services)): ?>
                <div class="nav-dropdown" id="nav-svc-dropdown">
                    <button class="nav-dropdown-toggle <?= strpos($uri, 'services') !== false ? 'on' : '' ?>"
                        id="nav-svc-btn" aria-haspopup="true" aria-expanded="false" aria-controls="nav-svc-menu">
                        Services <span class="nav-dropdown-arrow">▾</span>
                    </button>
                    <div class="nav-dropdown-menu" id="nav-svc-menu" role="menu">
                        <?php foreach ($nav_services as $nsvc): ?>
                            <a href="<?= base_url('services/' . $nsvc['slug']) ?>"
                                class="nav-dropdown-item <?= $uri === 'services/' . $nsvc['slug'] ? 'on' : '' ?>"
                                role="menuitem">
                                <?php if (!empty($nsvc['icon_emoji'])): ?><span
                                        style="margin-right:8px"><?= htmlspecialchars($nsvc['icon_emoji']) ?></span><?php endif; ?>
                                <?= htmlspecialchars($nsvc['title']) ?>
                            </a>
                        <?php endforeach; ?>
                        <a href="<?= base_url('services') ?>" class="nav-dropdown-view-all">View All Services →</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="<?= base_url('services') ?>"
                    class="nav-a <?= strpos($uri, 'services') !== false ? 'on' : '' ?>">Services</a>
            <?php endif; ?>

            <a href="<?= base_url('blog') ?>" class="nav-a <?= strpos($uri, 'blog') !== false ? 'on' : '' ?>">Blog</a>
            <a href="<?= base_url('contact') ?>"
                class="nav-a <?= strpos($uri, 'contact') !== false ? 'on' : '' ?>">Contact</a>
        </div>

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
                <a href="<?= base_url('services') ?>"
                    class="menu-link <?= strpos($uri, 'services') !== false ? 'on' : '' ?>">Services</a>

                <?php if (!empty($nav_services)): ?>
                    <div class="menu-svc-group" id="mobile-svc-group">
                        <button class="menu-svc-label"
                            onclick="document.getElementById('mobile-svc-group').classList.toggle('is-open')">
                            All Services <span class="nav-dropdown-arrow" style="margin-left: 6px;">▾</span>
                        </button>
                        <div class="menu-svc-links">
                            <?php foreach ($nav_services as $nsvc): ?>
                                <a href="<?= base_url('services/' . $nsvc['slug']) ?>"
                                    class="menu-svc-lnk"><?= htmlspecialchars($nsvc['title']) ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <a href="<?= base_url('blog') ?>"
                    class="menu-link <?= strpos($uri, 'blog') !== false ? 'on' : '' ?>">Blog</a>
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
                <p class="menu-meta-tagline">Internet-native.<br>Culture-first.<br>Built for today.</p>
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
                    <?php foreach (
                        array_merge(
                            ['HOUSE OF SOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'INFLUENCER MARKETING', 'VIRAL CAMPAIGNS', 'BRAND STRATEGY', 'CONTENT CREATION', 'CULTURE FIRST'],
                            ['HOUSE OF SOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'INFLUENCER MARKETING', 'VIRAL CAMPAIGNS', 'BRAND STRATEGY', 'CONTENT CREATION', 'CULTURE FIRST'],
                            ['HOUSE OF SOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'INFLUENCER MARKETING', 'VIRAL CAMPAIGNS', 'BRAND STRATEGY', 'CONTENT CREATION', 'CULTURE FIRST'],
                            ['HOUSE OF SOCIAL', 'INTERNET NATIVE', 'MEME CULTURE', 'INFLUENCER MARKETING', 'VIRAL CAMPAIGNS', 'BRAND STRATEGY', 'CONTENT CREATION', 'CULTURE FIRST']
                        ) as $fw
                    ): ?>
                        <span class="foot-ticker-word"><?= htmlspecialchars($fw) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="foot-body">
            <div class="foot-grid">
                <div>
                    <div class="foot-brand-row"><span class="foot-brand-dot"></span>House<span
                            style="color:var(--flame)">Of</span>Social</div>
                    <p class="foot-tagline">
                        <?= htmlspecialchars($s['hero_subtext'] ?? 'We help brands stop posting and start belonging. Internet-native creative agency, India.') ?>
                    </p>
                    <div class="foot-socials">
                        <a href="#" class="foot-soc" data-no-wipe aria-label="Instagram"><svg width="13" height="13"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="2" y="2" width="20" height="20" rx="5" />
                                <circle cx="12" cy="12" r="5" />
                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                            </svg></a>
                        <a href="#" class="foot-soc" data-no-wipe aria-label="LinkedIn"><svg width="13" height="13"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z" />
                                <rect x="2" y="9" width="4" height="12" />
                                <circle cx="4" cy="4" r="2" />
                            </svg></a>
                        <a href="#" class="foot-soc" data-no-wipe aria-label="X Twitter"><svg width="12" height="12"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.253 5.622z" />
                            </svg></a>
                    </div>
                </div>
                <div>
                    <p class="foot-col-h">Navigate</p>
                    <a href="<?= base_url() ?>" class="foot-lnk">Home</a>
                    <a href="<?= base_url('about') ?>" class="foot-lnk">About</a>
                    <a href="<?= base_url('work') ?>" class="foot-lnk">Work</a>
                    <a href="<?= base_url('services') ?>" class="foot-lnk">Services</a>
                    <a href="<?= base_url('blog') ?>" class="foot-lnk">Blog</a>
                    <a href="<?= base_url('contact') ?>" class="foot-lnk">Contact</a>
                </div>
                <div>
                    <p class="foot-col-h">Services</p>
                    <?php if (!empty($nav_services)): ?>
                        <?php foreach (array_slice($nav_services, 0, 6) as $fsvc): ?>
                            <a href="<?= base_url('services/' . $fsvc['slug']) ?>"
                                class="foot-lnk"><?= htmlspecialchars($fsvc['title']) ?></a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <a href="<?= base_url('services') ?>" class="foot-lnk">Influencer Marketing</a>
                        <a href="<?= base_url('services') ?>" class="foot-lnk">Meme Marketing</a>
                        <a href="<?= base_url('services') ?>" class="foot-lnk">Reddit Marketing</a>
                        <a href="<?= base_url('services') ?>" class="foot-lnk">UGC Content</a>
                        <a href="<?= base_url('services') ?>" class="foot-lnk">Brand Strategy</a>
                    <?php endif; ?>
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
            <p class="foot-copy">&copy; <?= date('Y') ?> HouseOfSocial.io. All rights reserved.</p>
            <div class="foot-live"><span class="foot-live-dot"></span> Building something right now</div>
            <p class="foot-copy">houseofsocial.io</p>
        </div>
    </footer>

    <script>
        (function() {
            'use strict';

            // ── CURSOR ──────────────────────────────────────────────────
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

            // ── SCROLL PROGRESS ─────────────────────────────────────────
            var nav = document.getElementById('g-nav'),
                prog = document.getElementById('g-prog');

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

            // ── FULLSCREEN MENU ──────────────────────────────────────────
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

            // ── SERVICES DROPDOWN — TOUCH/CLICK TOGGLE ──────────────────
            // Only activates on touch or non-hover devices (tablets, phones at ≥900px)
            // Desktop pointer:fine gets CSS hover — no JS needed there.
            var svcDropdown = document.getElementById('nav-svc-dropdown');
            var svcBtn = document.getElementById('nav-svc-btn');

            if (svcDropdown && svcBtn) {
                // Determine if this is a touch/non-hover device
                var isTouchDevice = !window.matchMedia('(hover:hover) and (pointer:fine)').matches;

                if (isTouchDevice) {
                    // On touch devices: toggle on button click, close on outside tap
                    svcBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        var isOpen = svcDropdown.classList.contains('is-open');
                        // Close any other open dropdowns first
                        document.querySelectorAll('.nav-dropdown.is-open').forEach(function(d) {
                            d.classList.remove('is-open');
                            var tb = d.querySelector('.nav-dropdown-toggle');
                            if (tb) tb.setAttribute('aria-expanded', 'false');
                        });
                        if (!isOpen) {
                            svcDropdown.classList.add('is-open');
                            svcBtn.setAttribute('aria-expanded', 'true');
                        }
                    });

                    // Close when tapping a dropdown item
                    document.querySelectorAll('#nav-svc-menu a').forEach(function(a) {
                        a.addEventListener('click', function() {
                            svcDropdown.classList.remove('is-open');
                            svcBtn.setAttribute('aria-expanded', 'false');
                        });
                    });

                    // Close when tapping anywhere else on the page
                    document.addEventListener('click', function() {
                        if (svcDropdown.classList.contains('is-open')) {
                            svcDropdown.classList.remove('is-open');
                            svcBtn.setAttribute('aria-expanded', 'false');
                        }
                    });

                    // Prevent dropdown menu taps from bubbling to document
                    var svcMenu = document.getElementById('nav-svc-menu');
                    if (svcMenu) {
                        svcMenu.addEventListener('click', function(e) {
                            e.stopPropagation();
                        });
                    }
                }

                // On pointer:fine (desktop), keep CSS hover — but also support click
                // so keyboard users and users who prefer click also work
                if (!isTouchDevice) {
                    svcBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        var isOpen = svcDropdown.classList.contains('is-open');
                        svcDropdown.classList.toggle('is-open', !isOpen);
                        svcBtn.setAttribute('aria-expanded', String(!isOpen));
                    });
                    document.addEventListener('click', function() {
                        svcDropdown.classList.remove('is-open');
                        svcBtn.setAttribute('aria-expanded', 'false');
                    });
                    var svcMenu2 = document.getElementById('nav-svc-menu');
                    if (svcMenu2) {
                        svcMenu2.addEventListener('click', function(e) {
                            e.stopPropagation();
                        });
                    }
                    // Close on Escape
                    document.addEventListener('keydown', function(e) {
                        if (e.key === 'Escape') {
                            svcDropdown.classList.remove('is-open');
                            svcBtn.setAttribute('aria-expanded', 'false');
                        }
                    });
                }
            }

            // ── REVEAL ON SCROLL ─────────────────────────────────────────
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

            // ── COUNTER ANIMATION ────────────────────────────────────────
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

            // ── PAGE TRANSITION WIPE ─────────────────────────────────────
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