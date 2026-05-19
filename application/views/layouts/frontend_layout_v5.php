<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $s          = isset($data['_settings']) ? $data['_settings'] : (isset($data['settings']) ? $data['settings'] : []);
    $site_title = $s['site_title'] ?? 'The Cine Caffe';
    $site_desc  = $s['hero_subtext'] ?? "India's most refined cinema & influencer marketing studio.";
    $uri        = isset($data['_uri']) ? $data['_uri'] : uri_string();
    $pg_title   = isset($data['page_title']) ? $data['page_title'] . ' — ' . $site_title : $site_title;
    $logo_url   = (!empty($s['site_logo'])) ? base_url('assets/images/uploads/' . $s['site_logo']) : '';
    ?>
    <title><?= htmlspecialchars($pg_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($site_desc) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pg_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($site_desc) ?>">
    <meta property="og:type" content="website">
    <link rel="canonical" href="<?= base_url(uri_string()) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow+Condensed:ital,wght@0,300;0,400;0,600;0,700;0,800;1,600;1,700&family=Barlow:wght@300;400;500;600&family=Libre+Baskerville:ital,wght@0,400;1,400&display=swap"
        rel="stylesheet">

    <style>
        /* ================================================================
       THE CINE CAFFE — GLOBAL DESIGN SYSTEM v5
       Aesthetic: Cinematic Brutalist Editorial · Olive/Cream/Ink/Amber
    ================================================================ */
        :root {
            --olive: #6B7A55;
            --olive-d: #59674A;
            --olive-l: #7D8F65;
            --olive-dk: #3E4A30;
            --cream: #F2EAD8;
            --cream-2: #EAE0C8;
            --cream-3: #DDD4B8;
            --ink: #1A1A10;
            --ink-2: #232318;
            --ink-3: #2E2E22;
            --amber: #D4920A;
            --amber-2: #E8A820;
            --amber-3: #F0BC3C;
            --white: #FAF6EC;

            --bg: var(--cream);
            --fg: var(--ink);
            --accent: var(--amber);
            --muted: rgba(26, 26, 16, .46);
            --muted-2: rgba(26, 26, 16, .24);
            --border: rgba(26, 26, 16, .12);
            --border-2: rgba(26, 26, 16, .06);
            --l-muted: rgba(242, 234, 216, .46);
            --l-muted-2: rgba(242, 234, 216, .24);
            --l-border: rgba(242, 234, 216, .11);

            --f-d: 'Bebas Neue', 'Impact', sans-serif;
            --f-c: 'Barlow Condensed', 'Arial Narrow', sans-serif;
            --f-b: 'Barlow', system-ui, sans-serif;
            --f-s: 'Libre Baskerville', Georgia, serif;

            /* 8px grid spacing */
            --s1: 4px;
            --s2: 8px;
            --s3: 12px;
            --s4: 16px;
            --s5: 20px;
            --s6: 24px;
            --s8: 32px;
            --s10: 40px;
            --s12: 48px;
            --s14: 56px;
            --s16: 64px;
            --s20: 80px;
            --s24: 96px;
            --s32: 128px;

            --max: 1300px;
            --nav-h: 72px;
            --px: clamp(22px, 5.5vw, 72px);
            --sec-py: clamp(72px, 9vw, 120px);

            --ease: cubic-bezier(.16, 1, .3, 1);
            --ease-2: cubic-bezier(.4, 0, .2, 1);
            --t1: .15s;
            --t2: .32s;
            --t3: .64s;

            --sh-1: 0 2px 12px rgba(26, 26, 16, .10);
            --sh-2: 0 8px 40px rgba(26, 26, 16, .14);
            --sh-3: 0 28px 80px rgba(26, 26, 16, .18);
        }

        /* ── RESET ── */
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
            color: var(--fg);
            font-family: var(--f-b);
            overflow-x: hidden;
            line-height: 1.65
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
            cursor: pointer;
            border: none;
            background: none
        }

        ul,
        ol {
            list-style: none
        }

        ::selection {
            background: var(--amber-2);
            color: var(--ink)
        }

        ::-webkit-scrollbar {
            width: 3px
        }

        ::-webkit-scrollbar-thumb {
            background: var(--amber);
            border-radius: 2px
        }

        /* ── ATMOSPHERIC OVERLAYS ── */
        /* Grain texture — cinematic noise */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 9901;
            opacity: .055;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 180px 180px;
            mix-blend-mode: multiply;
        }

        /* Vignette */
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 9900;
            background: radial-gradient(ellipse 90% 90% at 50% 50%, transparent 55%, rgba(10, 10, 5, .28) 100%);
        }

        /* ── SCROLL PROGRESS ── */
        #g-prog {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            z-index: 9000;
            width: 0%;
            background: linear-gradient(90deg, var(--amber), var(--amber-3), var(--amber));
            transition: width .06s linear;
            box-shadow: 0 0 10px rgba(212, 146, 10, .5);
        }

        /* ── PAGE WIPE ── */
        #g-wipe {
            position: fixed;
            inset: 0;
            background: var(--ink);
            z-index: 9999;
            transform: scaleY(1);
            transform-origin: top;
            animation: wipe-out .72s var(--ease) .08s forwards;
            pointer-events: none;
        }

        @keyframes wipe-out {
            to {
                transform: scaleY(0)
            }
        }

        /* ================================================================
       NAVIGATION — properly balanced
    ================================================================ */
        #g-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 600;
            height: var(--nav-h);
            display: flex;
            align-items: center;
            padding: 0 var(--px);
            transition: background var(--t2) var(--ease-2), border-color var(--t2), height var(--t1);
        }

        #g-nav.pinned {
            background: rgba(242, 234, 216, .96);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            border-bottom: 2px solid var(--ink);
            height: 60px;
            box-shadow: var(--sh-1);
        }

        /* Logo — left */
        .nav-logo {
            display: inline-flex;
            flex-direction: column;
            align-items: flex-start;
            border: 2px solid var(--ink);
            padding: 6px 16px;
            line-height: 1;
            gap: 3px;
            flex-shrink: 0;
            transition: background var(--t1), color var(--t1);
            margin-right: auto;
        }

        .nav-logo:hover {
            background: var(--ink);
            color: var(--cream)
        }

        .nav-logo img {
            height: 32px;
            width: auto;
            display: block
        }

        .logo-n {
            font-family: var(--f-d);
            font-size: 15px;
            letter-spacing: .18em;
            white-space: nowrap;
            display: block
        }

        .logo-s {
            font-family: var(--f-c);
            font-size: 7.5px;
            font-weight: 700;
            letter-spacing: .28em;
            text-transform: uppercase;
            color: var(--muted);
            display: block;
            transition: color var(--t1)
        }

        .nav-logo:hover .logo-s {
            color: rgba(242, 234, 216, .4)
        }

        /* Center links */
        .nav-links {
            display: flex;
            align-items: center;
            gap: var(--s10);
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .nav-a {
            font-family: var(--f-c);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--muted);
            position: relative;
            padding-bottom: 4px;
            transition: color var(--t1);
        }

        .nav-a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--amber);
            transition: width var(--t2) var(--ease);
        }

        .nav-a:hover,
        .nav-a.on {
            color: var(--ink)
        }

        .nav-a:hover::after,
        .nav-a.on::after {
            width: 100%
        }

        /* Right side */
        .nav-r {
            display: flex;
            align-items: center;
            gap: var(--s4);
            margin-left: auto
        }

        .nav-cta {
            font-family: var(--f-d);
            font-size: 15px;
            letter-spacing: .1em;
            background: var(--amber);
            color: var(--ink);
            padding: 8px 22px;
            border-radius: 2px;
            transition: background var(--t1), transform var(--t1), box-shadow var(--t1);
            white-space: nowrap;
        }

        .nav-cta:hover {
            background: var(--amber-2);
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(212, 146, 10, .4)
        }

        .nav-menu-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 0;
            font-family: var(--f-c);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--muted);
            transition: color var(--t1);
        }

        .nav-menu-btn:hover {
            color: var(--ink)
        }

        .ham {
            display: flex;
            flex-direction: column;
            gap: 5px
        }

        .ham span {
            width: 22px;
            height: 2px;
            background: currentColor;
            border-radius: 1px;
            display: block;
            transition: transform var(--t2) var(--ease), opacity var(--t1)
        }

        /* ================================================================
       FULLSCREEN MENU
    ================================================================ */
        #g-menu {
            position: fixed;
            inset: 0;
            z-index: 700;
            background: var(--ink);
            clip-path: circle(0% at calc(100% - 80px) 36px);
            transition: clip-path .65s var(--ease);
            pointer-events: none;
        }

        #g-menu.open {
            clip-path: circle(160% at calc(100% - 80px) 36px);
            pointer-events: all
        }

        .menu-inner {
            display: grid;
            grid-template-columns: 1fr 320px;
            height: 100%
        }

        .menu-close {
            position: absolute;
            top: 22px;
            right: var(--px);
            z-index: 2;
            font-family: var(--f-c);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: rgba(242, 234, 216, .3);
            display: flex;
            align-items: center;
            gap: 10px;
            transition: color var(--t1);
        }

        .menu-close:hover {
            color: var(--cream)
        }

        .menu-left {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: var(--s20) var(--px);
            border-right: 1px solid var(--l-border);
            overflow: hidden;
        }

        .menu-lnk {
            font-family: var(--f-d);
            font-size: clamp(52px, 8.5vw, 100px);
            line-height: .92;
            letter-spacing: .02em;
            color: rgba(242, 234, 216, .08);
            display: block;
            transition: color var(--t1), transform var(--t2) var(--ease), letter-spacing var(--t2);
            transform-origin: left;
        }

        .menu-lnk:hover,
        .menu-lnk.on {
            color: var(--cream);
            transform: translateX(16px);
            letter-spacing: .04em
        }

        .menu-lnk.accent {
            color: rgba(212, 146, 10, .16)
        }

        .menu-lnk.accent:hover {
            color: var(--amber-2)
        }

        .menu-right {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: var(--s20) var(--s12)
        }

        .m-lbl {
            font-family: var(--f-c);
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: .26em;
            text-transform: uppercase;
            color: rgba(242, 234, 216, .22);
            margin-bottom: var(--s4)
        }

        .m-lnk {
            font-family: var(--f-s);
            font-style: italic;
            font-size: 14px;
            color: rgba(242, 234, 216, .38);
            display: block;
            margin-bottom: var(--s2);
            transition: color var(--t1)
        }

        .m-lnk:hover {
            color: var(--amber-2)
        }

        .m-div {
            height: 1px;
            background: var(--l-border);
            margin: var(--s6) 0
        }

        .m-tag {
            font-family: var(--f-s);
            font-style: italic;
            font-size: 13px;
            color: rgba(242, 234, 216, .18);
            line-height: 1.9
        }

        /* ================================================================
       FOOTER — cinematic premium
    ================================================================ */
        #g-foot {
            background: var(--ink-2);
            color: var(--cream);
            position: relative;
            overflow: hidden;
            border-top: 3px solid var(--amber);
        }

        #g-foot::before {
            content: '';
            position: absolute;
            top: -120px;
            right: -80px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(212, 146, 10, .06) 0%, transparent 65%);
            pointer-events: none;
        }

        .foot-top {
            max-width: var(--max);
            margin: 0 auto;
            padding: var(--s20) var(--px) 0;
        }

        .foot-banner {
            font-family: var(--f-d);
            font-size: clamp(56px, 10vw, 140px);
            line-height: .82;
            letter-spacing: .03em;
            color: transparent;
            -webkit-text-stroke: 1.5px rgba(242, 234, 216, .09);
            user-select: none;
            pointer-events: none;
            margin-bottom: var(--s12);
            white-space: nowrap;
        }

        .foot-divider {
            height: 1px;
            background: var(--l-border);
            margin: 0 var(--px)
        }

        .foot-inner {
            max-width: var(--max);
            margin: 0 auto;
            padding: var(--s12) var(--px) var(--s16)
        }

        .foot-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr;
            gap: var(--s16);
            padding-bottom: var(--s12);
            border-bottom: 1px solid var(--l-border);
            margin-bottom: var(--s8);
        }

        .foot-brand-name {
            font-family: var(--f-d);
            font-size: clamp(32px, 5vw, 54px);
            letter-spacing: .04em;
            line-height: .88;
            color: var(--cream);
            margin-bottom: var(--s3);
        }

        .foot-brand-sub {
            font-family: var(--f-c);
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .3em;
            text-transform: uppercase;
            color: rgba(242, 234, 216, .22);
            margin-bottom: var(--s6);
        }

        .foot-tag {
            font-family: var(--f-s);
            font-style: italic;
            font-size: 14px;
            color: rgba(242, 234, 216, .28);
            line-height: 1.9;
            max-width: 240px;
            margin-bottom: var(--s8);
        }

        .foot-social {
            display: flex;
            gap: var(--s3);
            flex-wrap: wrap
        }

        .foot-soc-a {
            font-family: var(--f-c);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            border: 1.5px solid rgba(242, 234, 216, .14);
            padding: 8px 16px;
            border-radius: 100px;
            color: rgba(242, 234, 216, .35);
            transition: border-color var(--t1), color var(--t1);
        }

        .foot-soc-a:hover {
            border-color: var(--amber);
            color: var(--amber)
        }

        .foot-col-h {
            font-family: var(--f-c);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .24em;
            text-transform: uppercase;
            color: rgba(242, 234, 216, .26);
            margin-bottom: var(--s6);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .foot-col-h::before {
            content: '';
            width: 20px;
            height: 2px;
            background: var(--amber);
            flex-shrink: 0
        }

        .foot-a {
            display: block;
            font-size: 15px;
            font-weight: 400;
            color: rgba(242, 234, 216, .42);
            margin-bottom: var(--s3);
            transition: color var(--t1), padding-left var(--t2);
        }

        .foot-a:hover {
            color: var(--amber-2);
            padding-left: 8px
        }

        .foot-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: var(--s4);
        }

        .foot-contact-icon {
            width: 28px;
            height: 28px;
            border: 1px solid rgba(242, 234, 216, .1);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            flex-shrink: 0;
            margin-top: 2px;
            font-size: 11px;
            color: var(--amber);
        }

        .foot-contact-label {
            font-size: 9px;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: rgba(242, 234, 216, .26);
            margin-bottom: 2px
        }

        .foot-contact-val {
            font-size: 14px;
            color: rgba(242, 234, 216, .52);
            line-height: 1.4
        }

        .foot-bot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: var(--s4);
        }

        .foot-copy {
            font-family: var(--f-c);
            font-size: 10.5px;
            letter-spacing: .06em;
            color: rgba(242, 234, 216, .18)
        }

        .foot-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(212, 146, 10, .08);
            border: 1px solid rgba(212, 146, 10, .18);
            padding: 6px 14px;
            border-radius: 100px;
            font-family: var(--f-c);
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: rgba(212, 146, 10, .6);
        }

        /* ================================================================
       GLOBAL SCROLL REVEAL
    ================================================================ */
        .rv {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity var(--t3) var(--ease), transform var(--t3) var(--ease)
        }

        .rv.sl {
            transform: translateX(-36px)
        }

        .rv.sr {
            transform: translateX(36px)
        }

        .rv.ss {
            transform: scale(.92)
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
            transition-delay: .20s !important
        }

        .d4 {
            transition-delay: .28s !important
        }

        .d5 {
            transition-delay: .36s !important
        }

        .d6 {
            transition-delay: .44s !important
        }

        .d7 {
            transition-delay: .52s !important
        }

        .d8 {
            transition-delay: .60s !important
        }

        /* ================================================================
       GLOBAL UTILITIES
    ================================================================ */
        .wrap {
            max-width: var(--max);
            margin: 0 auto;
            padding: 0 var(--px)
        }

        .sec {
            padding: var(--sec-py) var(--px)
        }

        /* Section label */
        .s-lbl {
            font-family: var(--f-c);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .3em;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .s-lbl::before {
            content: '';
            width: 28px;
            height: 2px;
            background: currentColor;
            flex-shrink: 0
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
            position: relative
        }

        .mq-track {
            display: flex;
            width: max-content;
            will-change: transform
        }

        .mq-l {
            animation: mq-l var(--d, 36s) linear infinite
        }

        .mq-r {
            animation: mq-r var(--d, 36s) linear infinite
        }

        .mq-track:hover {
            animation-play-state: paused
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: var(--f-d);
            letter-spacing: .09em;
            font-size: 17px;
            padding: 12px 28px;
            border-radius: 2px;
            position: relative;
            overflow: hidden;
            white-space: nowrap;
            transition: transform var(--t1) var(--ease), box-shadow var(--t1) var(--ease), background var(--t1), color var(--t1), border-color var(--t1);
        }

        .btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, .12);
            transform: translateX(-110%) skewX(-14deg);
            transition: transform .45s var(--ease);
        }

        .btn:hover::before {
            transform: translateX(120%) skewX(-14deg)
        }

        .btn:hover {
            transform: translateY(-2px)
        }

        .btn-ink {
            background: var(--ink);
            color: var(--cream)
        }

        .btn-ink:hover {
            box-shadow: 0 10px 28px rgba(26, 26, 16, .28)
        }

        .btn-amber {
            background: var(--amber);
            color: var(--ink)
        }

        .btn-amber:hover {
            background: var(--amber-2);
            box-shadow: 0 10px 28px rgba(212, 146, 10, .42)
        }

        .btn-ol-dk {
            border: 2px solid var(--ink);
            color: var(--ink);
            background: transparent;
            padding: 10px 26px
        }

        .btn-ol-dk:hover {
            background: var(--ink);
            color: var(--cream)
        }

        .btn-ol-lt {
            border: 2px solid rgba(242, 234, 216, .34);
            color: var(--cream);
            background: transparent;
            padding: 10px 26px
        }

        .btn-ol-lt:hover {
            background: var(--cream);
            color: var(--ink);
            border-color: var(--cream)
        }

        .btn-lg {
            font-size: 19px;
            padding: 14px 34px
        }

        /* Shared keyframes */
        @keyframes float-a {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-12px)
            }
        }

        @keyframes float-b {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(10px)
            }
        }

        @keyframes spin-cw {
            to {
                transform: rotate(360deg)
            }
        }

        @keyframes float-x {

            0%,
            100% {
                transform: translateX(0)
            }

            50% {
                transform: translateX(8px)
            }
        }

        /* ================================================================
       RESPONSIVE
    ================================================================ */
        @media(max-width:1080px) {
            .nav-links {
                display: none
            }
        }

        @media(max-width:768px) {
            :root {
                --nav-h: 62px;
                --sec-py: clamp(56px, 9vw, 84px)
            }

            .nav-cta {
                display: none
            }

            .menu-inner {
                grid-template-columns: 1fr
            }

            .menu-right {
                display: none
            }

            .menu-left {
                padding: 72px var(--px)
            }

            .foot-grid {
                grid-template-columns: 1fr 1fr
            }

            #g-foot::before {
                display: none
            }
        }

        @media(max-width:480px) {
            :root {
                --px: 18px
            }

            .foot-grid {
                grid-template-columns: 1fr
            }
        }
    </style>
</head>

<body>

    <div id="g-wipe" aria-hidden="true"></div>
    <div id="g-prog" aria-hidden="true"></div>

    <!-- NAV -->
    <nav id="g-nav" role="navigation" aria-label="Main navigation">
        <a href="<?= base_url() ?>" class="nav-logo" aria-label="<?= htmlspecialchars($site_title) ?>">
            <?php if ($logo_url): ?>
                <img src="<?= $logo_url ?>" alt="<?= htmlspecialchars($site_title) ?>">
            <?php else: ?>
                <span class="logo-n">THE CINE CAFFE</span>
                <span class="logo-s">Cinema Studio</span>
            <?php endif; ?>
        </a>
        <div class="nav-links">
            <a href="<?= base_url() ?>" class="nav-a <?= ($uri === '' || $uri === '/') ? 'on' : '' ?>">Home</a>
            <a href="<?= base_url('about') ?>" class="nav-a <?= strpos($uri, 'about') !== false ? 'on' : '' ?>">About</a>
            <a href="<?= base_url('work') ?>" class="nav-a <?= strpos($uri, 'work') !== false ? 'on' : '' ?>">Work</a>
            <a href="<?= base_url('contact') ?>"
                class="nav-a <?= strpos($uri, 'contact') !== false ? 'on' : '' ?>">Contact</a>
        </div>
        <div class="nav-r">
            <a href="<?= base_url('contact') ?>" class="nav-cta">Let's Talk</a>
            <button class="nav-menu-btn" id="g-mbtn" onclick="gMenu()" aria-expanded="false" aria-controls="g-menu">
                <span>MENU</span>
                <span class="ham" aria-hidden="true"><span id="hl1"></span><span id="hl2"></span></span>
            </button>
        </div>
    </nav>

    <!-- FULLSCREEN MENU -->
    <div id="g-menu" role="dialog" aria-modal="true" aria-label="Navigation">
        <button class="menu-close" onclick="gMenu()" aria-label="Close menu">CLOSE &#215;</button>
        <div class="menu-inner">
            <div class="menu-left">
                <a href="<?= base_url() ?>" class="menu-lnk <?= ($uri === '' || $uri === '/') ? 'on' : '' ?>">HOME</a>
                <a href="<?= base_url('about') ?>"
                    class="menu-lnk <?= strpos($uri, 'about') !== false ? 'on' : '' ?>">ABOUT</a>
                <a href="<?= base_url('work') ?>" class="menu-lnk <?= strpos($uri, 'work') !== false ? 'on' : '' ?>">OUR
                    WORK</a>
                <a href="<?= base_url('contact') ?>" class="menu-lnk accent">CONTACT</a>
            </div>
            <div class="menu-right">
                <p class="m-lbl">Get In Touch</p>
                <a href="mailto:<?= htmlspecialchars($s['site_email'] ?? 'contact@thecinecaffe.com') ?>"
                    class="m-lnk"><?= htmlspecialchars($s['site_email'] ?? 'contact@thecinecaffe.com') ?></a>
                <a href="tel:<?= htmlspecialchars($s['site_phone'] ?? '') ?>"
                    class="m-lnk"><?= htmlspecialchars($s['site_phone'] ?? '+91 9990802115') ?></a>
                <div class="m-div"></div>
                <p class="m-lbl">Follow Us</p>
                <a href="#" class="m-lnk" data-no-wipe>Instagram</a>
                <a href="#" class="m-lnk" data-no-wipe>LinkedIn</a>
                <a href="#" class="m-lnk" data-no-wipe>Twitter / X</a>
                <div class="m-div"></div>
                <p class="m-tag">Where Cinema Meets Culture &mdash; India&#8217;s trusted studio for influencer &amp;
                    film marketing.</p>
            </div>
        </div>
    </div>

    <!-- MAIN -->
    <main id="mc" role="main"><?= $content ?></main>

    <!-- FOOTER -->
    <footer id="g-foot" role="contentinfo">
        <div class="foot-top">
            <div class="foot-banner" aria-hidden="true">THE CINE CAFFE</div>
        </div>
        <div class="foot-divider"></div>
        <div class="foot-inner">
            <div class="foot-grid">
                <!-- Brand col -->
                <div>
                    <div class="foot-brand-name">THE<br>CINE<br>CAFFE</div>
                    <div class="foot-brand-sub">Cinema Marketing Studio</div>
                    <p class="foot-tag">Where Cinema Meets Culture &mdash; India&#8217;s trusted partner for influencer
                        &amp; film marketing.</p>
                    <div class="foot-social">
                        <a href="#" class="foot-soc-a" data-no-wipe>Instagram</a>
                        <a href="#" class="foot-soc-a" data-no-wipe>LinkedIn</a>
                        <a href="#" class="foot-soc-a" data-no-wipe>X</a>
                    </div>
                </div>
                <!-- Nav col -->
                <div>
                    <p class="foot-col-h">Navigate</p>
                    <a href="<?= base_url() ?>" class="foot-a">Home</a>
                    <a href="<?= base_url('about') ?>" class="foot-a">About Us</a>
                    <a href="<?= base_url('work') ?>" class="foot-a">Our Work</a>
                    <a href="<?= base_url('contact') ?>" class="foot-a">Contact</a>
                </div>
                <!-- Contact col -->
                <div>
                    <p class="foot-col-h">Contact</p>
                    <div class="foot-contact-item">
                        <div class="foot-contact-icon">@</div>
                        <div>
                            <div class="foot-contact-label">Email</div>
                            <a href="mailto:<?= htmlspecialchars($s['site_email'] ?? 'contact@thecinecaffe.com') ?>"
                                class="foot-contact-val" style="color:rgba(242,234,216,.52);transition:color .2s"
                                onmouseover="this.style.color='#E8A820'"
                                onmouseout="this.style.color='rgba(242,234,216,.52)'"><?= htmlspecialchars($s['site_email'] ?? 'contact@thecinecaffe.com') ?></a>
                        </div>
                    </div>
                    <div class="foot-contact-item">
                        <div class="foot-contact-icon" style="font-size:12px">&#9742;</div>
                        <div>
                            <div class="foot-contact-label">Phone</div>
                            <a href="tel:<?= htmlspecialchars($s['site_phone'] ?? '') ?>" class="foot-contact-val"
                                style="color:rgba(242,234,216,.52);transition:color .2s"
                                onmouseover="this.style.color='#E8A820'"
                                onmouseout="this.style.color='rgba(242,234,216,.52)'"><?= htmlspecialchars($s['site_phone'] ?? '+91 9990802115') ?></a>
                        </div>
                    </div>
                    <div class="foot-contact-item">
                        <div class="foot-contact-icon" style="font-size:12px">&#9679;</div>
                        <div>
                            <div class="foot-contact-label">Location</div>
                            <div class="foot-contact-val"><?= htmlspecialchars($s['site_address'] ?? 'India') ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="foot-bot">
                <p class="foot-copy">&copy; <?= date('Y') ?> <?= htmlspecialchars($site_title) ?>. All rights reserved.
                </p>
                <div class="foot-badge">
                    <svg width="10" height="14" viewBox="0 0 12 18" fill="none">
                        <path d="M7 1L1 10h5l-1 7L11 8H6L7 1Z" fill="#D4920A" />
                    </svg>
                    Crafted with passion in India
                </div>
                <p class="foot-copy">India's Premier Cinema Studio</p>
            </div>
        </div>
    </footer>

    <script>
        (function() {
            'use strict';
            /* scroll progress + nav pin */
            var nav = document.getElementById('g-nav'),
                prog = document.getElementById('g-prog');
            window.addEventListener('scroll', function() {
                var y = window.scrollY,
                    pct = y / (document.body.scrollHeight - window.innerHeight) * 100;
                if (prog) prog.style.width = Math.min(pct, 100) + '%';
                if (nav) y > 60 ? nav.classList.add('pinned') : nav.classList.remove('pinned');
            }, {
                passive: true
            });

            /* fullscreen menu */
            var open = false;
            window.gMenu = function() {
                open = !open;
                var m = document.getElementById('g-menu'),
                    b = document.getElementById('g-mbtn'),
                    l1 = document.getElementById('hl1'),
                    l2 = document.getElementById('hl2');
                if (!m) return;
                m.classList.toggle('open', open);
                document.body.style.overflow = open ? 'hidden' : '';
                if (b) b.setAttribute('aria-expanded', open);
                if (l1) l1.style.transform = open ? 'rotate(45deg) translate(3px,3.5px)' : '';
                if (l2) l2.style.transform = open ? 'rotate(-45deg) translate(3px,-3.5px)' : '';
            };
            document.querySelectorAll('#g-menu a').forEach(function(a) {
                a.addEventListener('click', function() {
                    if (open) gMenu();
                });
            });
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && open) gMenu();
            });

            /* scroll reveal */
            var rvs = document.querySelectorAll('.rv');
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
                    rootMargin: '0px 0px -16px 0px'
                });
                rvs.forEach(function(el) {
                    io.observe(el);
                });
            } else {
                rvs.forEach(function(el) {
                    el.classList.add('in');
                });
            }

            /* counters */
            function animCnt(el) {
                var t = parseFloat(el.dataset.target) || 0,
                    suf = el.dataset.suffix || '',
                    dur = 1900,
                    step = 14,
                    cur = 0,
                    inc = t / (dur / step);
                var timer = setInterval(function() {
                    cur += inc;
                    if (cur >= t) {
                        cur = t;
                        clearInterval(timer);
                    }
                    el.textContent = Math.floor(cur) + suf;
                }, step);
            }
            var co = new IntersectionObserver(function(entries) {
                entries.forEach(function(e) {
                    if (e.isIntersecting) {
                        animCnt(e.target);
                        co.unobserve(e.target);
                    }
                });
            }, {
                threshold: .5
            });
            document.querySelectorAll('[data-target]').forEach(function(el) {
                co.observe(el);
            });

            /* page wipe transitions */
            document.querySelectorAll('a[href]').forEach(function(a) {
                var href = a.getAttribute('href');
                if (!href || href[0] === '#' || href.startsWith('mailto') || href.startsWith('tel') || href
                    .startsWith('javascript') || a.target === '_blank' || a.hasAttribute('data-no-wipe'))
                    return;
                a.addEventListener('click', function(e) {
                    if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
                    e.preventDefault();
                    var w = document.getElementById('g-wipe');
                    if (w) {
                        w.style.cssText =
                            'animation:none;transform:scaleY(0);transform-origin:bottom;transition:transform .46s cubic-bezier(.4,0,.2,1);';
                        requestAnimationFrame(function() {
                            requestAnimationFrame(function() {
                                w.style.transform = 'scaleY(1)';
                                setTimeout(function() {
                                    window.location.href = href;
                                }, 480);
                            });
                        });
                    } else {
                        window.location.href = href;
                    }
                });
            });
        }());
    </script>
</body>

</html>