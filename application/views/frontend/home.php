<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
/* ─── DATA SETUP ───────────────────────────────────── */
$svcs = [
    ['01', 'Influencer Marketing',  'Precision-matched creator partnerships — nano to celebrity — that feel authentic and perform powerfully.',     ['300+ campaigns', '12M+ reach', 'All platforms'],   '🤳'],
    ['02', 'Meme Marketing',        'Culturally embedded viral content. Memes that spread because they belong, not because they were placed.',      ['Trend-first', '10× organic reach', 'Format-native'], '😂'],
    ['03', 'Film Promotions',       'End-to-end cinematic promotion strategy. We power the buzz that fills seats and drives streams.',             ['32% of OTT releases', 'Teaser→release', 'Bollywood + Hollywood'], '🎬'],
    ['04', 'Video Production',      'Concept, craft, deliver. Brand films to web series — OTT-grade quality at studio speed.',                    ['Concept to final cut', 'OTT-grade', 'Fast turnaround'], '🎥'],
    ['05', 'Film Screenings',       'Curated influencer screening events that generate authentic pre-release buzz at scale.',                       ['70+ screenings', 'Tier 1 & 2 cities', 'Press + creators'], '🍿'],
    ['06', 'On-Ground Activations', 'Real-world brand moments bridging digital reach with physical memory.',                                        ['Pan-India', 'Brand activations', 'Celebrity tie-ins'], '🎪'],
    ['07', 'LinkedIn & X Strategy', 'Platform-native campaigns building authority for studios, OTT brands, and their executive voices.',           ['Thought leadership', 'Viral threads', 'B2B + B2C'], '💼'],
    ['08', 'Celebrity Endorsements', 'Curated star partnerships that amplify brand credibility and unlock millions of loyal followers.',             ['Verified partnerships', 'Contract negotiation', 'ROI focused'], '⭐'],
];

$brand_dir  = FCPATH . 'assets/brand/';
$brand_url  = base_url('assets/brand/');
$brand_imgs = [];
if (is_dir($brand_dir)) {
    foreach (['png', 'jpg', 'jpeg', 'webp', 'svg', 'gif', 'PNG', 'JPG', 'JPEG', 'WEBP', 'SVG', 'GIF'] as $ext)
        foreach (glob($brand_dir . '*.' . $ext) as $f)
            $brand_imgs[] = $brand_url . basename($f);
    $brand_imgs = array_unique($brand_imgs);
}
$fallback = [
    "boAt",
    "Fastrack",
    "Masters' Union",
    "Myntra",
    "OnePlus",
    "Netflix",
    "Amazon Prime",
    "Disney+",
    "Dharma",
    "YRF",
    "Sony",
    "T-Series",
    "Warner Bros",
    "Zee5",
    "Jio Cinema",
    "Maddock Films"
];

$proc_steps = [
    ['01', '🎯', 'Strategy & Discovery', 'Deep-dive into brand soul, audience nuance, and cultural context. We study the landscape before a single frame is shot.'],
    ['02', '🌐', 'Network & Matching',   'Match with ideal influencers, meme pages, and creators from our curated pool of 10,000+ accounts across every niche.'],
    ['03', '🚀', 'Execute & Launch',     'Precision campaigns with real-time monitoring, creative iteration, and A/B optimisation for maximum cultural resonance.'],
    ['04', '📈', 'Scale & Compound',     'Analyse, optimise, double down on winners. Compound the momentum until your brand becomes the conversation.'],
];
?>
<!--- NOTE: This file is loaded INSIDE frontend_layout_v5.php via _render().
      All <style> and <script> tags here are appended into <body> by the layout. --->

<!-- ═══════════════════════════════════════════════════════
     GLOBAL TOKENS + RESET (scoped to this page)
═══════════════════════════════════════════════════════ -->
<style>
    /* ── PAGE-LEVEL TOKENS ───────────────────────────── */
    :root {
        --cc-dark: #0a0a0d;
        --cc-darker: #060608;
        --cc-ink: #111118;
        --cc-card: #15151e;
        --cc-cream: #f0ebe1;
        --cc-cream2: #e8e2d6;
        --cc-cream3: #d9d3c5;
        --cc-gold: #c9a84c;
        --cc-gold2: #e8c05a;
        --cc-rose: #e8836a;
        --cc-plum: #8b5da0;
        --cc-teal: #3abfb8;
        --cc-sage: #6baf8d;
        --cc-border: #1e1e28;
        --cc-muted: rgba(240, 235, 225, .38);
        --cc-smoke: rgba(240, 235, 225, .22);
        --fd: 'Cormorant Garamond', Georgia, serif;
        --fb: 'DM Sans', system-ui, sans-serif;
        --ease: cubic-bezier(.16, 1, .3, 1);
    }

    /* ── PAGE RESET ──────────────────────────────────── */
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    /* ── SELECTION ───────────────────────────────────── */
    ::selection {
        background: var(--cc-gold);
        color: #000;
    }

    /* ── UTILITY ─────────────────────────────────────── */
    .u-max {
        max-width: 1440px;
        margin: 0 auto;
    }

    /* ── SCROLL REVEAL ───────────────────────────────── */
    .sr {
        opacity: 0;
        transform: translateY(48px);
        transition: opacity .9s var(--ease), transform .9s var(--ease);
    }

    .sr.sl {
        transform: translateX(-48px);
    }

    .sr.sr2 {
        transform: translateX(48px);
    }

    .sr.ss {
        transform: scale(.94);
    }

    .sr.in {
        opacity: 1;
        transform: none;
    }

    .d1 {
        transition-delay: .06s !important
    }

    .d2 {
        transition-delay: .13s !important
    }

    .d3 {
        transition-delay: .20s !important
    }

    .d4 {
        transition-delay: .27s !important
    }

    .d5 {
        transition-delay: .34s !important
    }

    .d6 {
        transition-delay: .41s !important
    }

    .d7 {
        transition-delay: .48s !important
    }

    .d8 {
        transition-delay: .55s !important
    }

    /* ── MARQUEE ─────────────────────────────────────── */
    @keyframes mq-left {
        from {
            transform: translateX(0)
        }

        to {
            transform: translateX(-50%)
        }
    }

    @keyframes mq-right {
        from {
            transform: translateX(-50%)
        }

        to {
            transform: translateX(0)
        }
    }

    .mq-track {
        display: flex;
        width: max-content;
        will-change: transform;
    }

    .mq-track.go-l {
        animation: mq-left var(--dur, 40s) linear infinite;
    }

    .mq-track.go-r {
        animation: mq-right var(--dur, 40s) linear infinite;
    }

    .mq-track:hover {
        animation-play-state: paused;
    }

    /* ── ORB DRIFT ───────────────────────────────────── */
    @keyframes orb-drift {

        0%,
        100% {
            transform: translate(0, 0) scale(1)
        }

        50% {
            transform: translate(22px, -18px) scale(1.06)
        }
    }

    @keyframes float-y {

        0%,
        100% {
            transform: translateY(0)
        }

        50% {
            transform: translateY(-14px)
        }
    }

    @keyframes float-y2 {

        0%,
        100% {
            transform: translateY(0)
        }

        50% {
            transform: translateY(10px)
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
            transform: scale(.45)
        }
    }

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

    @keyframes line-grow {
        from {
            transform: scaleX(0)
        }

        to {
            transform: scaleX(1)
        }
    }

    @keyframes count-in {
        from {
            opacity: 0;
            transform: translateY(20px)
        }

        to {
            opacity: 1;
            transform: none
        }
    }


    /* ════════════════════════════════════════════════════
   §1  HERO
════════════════════════════════════════════════════ */
    #hm-hero {
        min-height: 100svh;
        background: var(--cc-dark);
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    /* ambient orbs */
    .h-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(120px);
        pointer-events: none;
    }

    .h-orb-1 {
        width: 700px;
        height: 700px;
        background: rgba(201, 168, 76, .07);
        top: -180px;
        left: -100px;
        animation: orb-drift 20s ease-in-out infinite;
    }

    .h-orb-2 {
        width: 500px;
        height: 500px;
        background: rgba(139, 93, 160, .06);
        bottom: 10%;
        right: -120px;
        animation: orb-drift 26s ease-in-out 6s infinite;
    }

    .h-orb-3 {
        width: 380px;
        height: 380px;
        background: rgba(58, 191, 184, .05);
        top: 40%;
        left: 35%;
        animation: orb-drift 18s ease-in-out 3s infinite;
    }

    /* grain */
    .h-grain {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 1;
        opacity: .03;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    }

    /* hero main body */
    .h-body {
        flex: 1;
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        padding: 140px 72px 60px;
        gap: 60px;
        position: relative;
        z-index: 2;
    }

    /* eyebrow */
    .h-eye {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 28px;
        opacity: 0;
        animation: count-in .7s var(--ease) .3s forwards;
    }

    .h-eye-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--cc-gold);
        animation: pulse-dot 2.4s ease-in-out infinite;
        flex-shrink: 0;
    }

    .h-eye-lbl {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .3em;
        text-transform: uppercase;
        color: var(--cc-gold);
    }

    /* headline */
    .h-h1 {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: clamp(64px, 9.5vw, 148px);
        line-height: .82;
        letter-spacing: -.035em;
        color: var(--cc-cream);
        margin-bottom: 28px;
        opacity: 0;
        animation: count-in 1.1s var(--ease) .5s forwards;
    }

    .h-h1 em {
        color: var(--cc-gold);
        font-style: normal;
    }

    /* subtext */
    .h-sub {
        font-size: clamp(14px, 1.6vw, 18px);
        font-weight: 300;
        color: var(--cc-muted);
        line-height: 1.85;
        max-width: 420px;
        margin-bottom: 44px;
        opacity: 0;
        animation: count-in .8s var(--ease) .9s forwards;
    }

    /* cta row */
    .h-btns {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        opacity: 0;
        animation: count-in .7s var(--ease) 1.1s forwards;
    }

    .h-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fd);
        font-style: italic;
        font-size: 18px;
        letter-spacing: .04em;
        padding: 15px 36px;
        border-radius: 2px;
        text-decoration: none;
        transition: transform .25s var(--ease), box-shadow .25s var(--ease), border-color .2s, color .2s;
        white-space: nowrap;
    }

    .h-btn-gold {
        background: linear-gradient(135deg, var(--cc-gold), var(--cc-rose));
        color: #060608;
    }

    .h-btn-gold:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 48px rgba(201, 168, 76, .38);
    }

    .h-btn-ghost {
        border: 1.5px solid rgba(240, 235, 225, .18);
        color: var(--cc-cream);
    }

    .h-btn-ghost:hover {
        border-color: var(--cc-gold);
        color: var(--cc-gold);
        transform: translateY(-2px);
    }

    /* right visual panel */
    .h-visual {
        position: relative;
        height: 520px;
        border-radius: 14px;
        background: rgba(255, 255, 255, .015);
        border: 1px solid var(--cc-border);
        overflow: hidden;
        opacity: 0;
        animation: count-in 1.2s var(--ease) .8s forwards;
    }

    /* rotating decorative rings */
    .h-ring {
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 50%;
        border: 1px solid rgba(201, 168, 76, .1);
        transform: translate(-50%, -50%);
        pointer-events: none;
    }

    .h-ring-1 {
        width: 480px;
        height: 480px;
        animation: spin-cw 32s linear infinite;
    }

    .h-ring-2 {
        width: 360px;
        height: 360px;
        animation: spin-ccw 22s linear infinite;
        border-color: rgba(139, 93, 160, .08);
    }

    .h-ring-3 {
        width: 240px;
        height: 240px;
        animation: spin-cw 16s linear infinite;
        border-color: rgba(58, 191, 184, .07);
    }

    /* central disc */
    .h-disc {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 190px;
        height: 190px;
        border-radius: 50%;
        background: radial-gradient(circle at 38% 32%, #1e1a12, #0a0a0e);
        border: 1px solid rgba(201, 168, 76, .22);
        box-shadow: 0 0 80px rgba(201, 168, 76, .13), inset 0 1px 0 rgba(201, 168, 76, .18);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        z-index: 3;
    }

    .h-disc-n {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: 68px;
        line-height: 1;
        letter-spacing: -.04em;
        color: var(--cc-gold);
    }

    .h-disc-l {
        font-size: 8px;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: rgba(240, 235, 225, .3);
        margin-top: 4px;
    }

    /* floating stat cards */
    .h-float {
        position: absolute;
        background: rgba(14, 14, 20, .95);
        border: 1px solid rgba(255, 255, 255, .07);
        border-radius: 10px;
        padding: 14px 18px;
        backdrop-filter: blur(20px);
        z-index: 4;
    }

    .h-float-n {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: 34px;
        line-height: 1;
        letter-spacing: -.03em;
    }

    .h-float-l {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: var(--cc-muted);
        margin-top: 4px;
    }

    .hf-a {
        top: 12%;
        left: 6%;
        animation: float-y 6s ease-in-out infinite;
    }

    .hf-b {
        bottom: 14%;
        right: 8%;
        animation: float-y2 7s ease-in-out infinite;
    }

    .hf-c {
        top: 50%;
        right: 5%;
        transform: translateY(-50%);
        animation: float-y 5s ease-in-out infinite;
    }

    /* film strip holes left/right */
    .h-strip {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 30px;
        display: flex;
        flex-direction: column;
        gap: 6px;
        padding: 8px 0;
        z-index: 2;
    }

    .h-strip.hs-l {
        left: 0;
    }

    .h-strip.hs-r {
        right: 0;
    }

    .h-hole {
        width: 16px;
        height: 10px;
        border-radius: 2px;
        background: rgba(201, 168, 76, .07);
        border: 1px solid rgba(201, 168, 76, .12);
        margin: 0 auto;
        flex-shrink: 0;
    }

    /* glow behind disc */
    .h-glow {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(201, 168, 76, .16) 0%, transparent 70%);
        z-index: 1;
        animation: orb-drift 4s ease-in-out infinite;
    }

    /* bottom stats bar */
    .h-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        border-top: 1px solid var(--cc-border);
        position: relative;
        z-index: 2;
        opacity: 0;
        animation: count-in .7s var(--ease) 1.3s forwards;
    }

    .h-stat {
        padding: 28px clamp(20px, 3.5vw, 60px);
        border-right: 1px solid var(--cc-border);
        transition: background .3s;
        cursor: default;
    }

    .h-stat:last-child {
        border-right: none;
    }

    .h-stat:hover {
        background: rgba(201, 168, 76, .03);
    }

    .hs-n {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: clamp(30px, 4vw, 50px);
        line-height: 1;
        letter-spacing: -.03em;
        color: var(--cc-cream);
    }

    .hs-l {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: var(--cc-muted);
        margin-top: 6px;
    }

    /* scroll cue */
    .h-scroll-cue {
        position: absolute;
        bottom: 108px;
        left: 72px;
        z-index: 3;
        display: flex;
        align-items: center;
        gap: 12px;
        opacity: 0;
        animation: count-in .5s ease 1.8s forwards;
    }

    .h-scroll-line {
        width: 1px;
        height: 52px;
        background: linear-gradient(var(--cc-gold), transparent);
        animation: float-y 2.6s ease-in-out infinite;
    }

    .h-scroll-lbl {
        font-size: 8px;
        font-weight: 700;
        letter-spacing: .3em;
        text-transform: uppercase;
        color: rgba(240, 235, 225, .2);
        writing-mode: vertical-rl;
        transform: rotate(180deg);
    }


    /* ════════════════════════════════════════════════════
   §2  MARQUEE TICKER (dark band)
════════════════════════════════════════════════════ */
    #hm-ticker {
        background: var(--cc-ink);
        border-top: 1px solid var(--cc-border);
        border-bottom: 1px solid var(--cc-border);
        padding: 0;
        overflow: hidden;
        position: relative;
        z-index: 1;
    }

    .tk-row {
        padding: 22px 0;
        overflow: hidden;
        position: relative;
    }

    .tk-row+.tk-row {
        border-top: 1px solid var(--cc-border);
    }

    .tk-row::before,
    .tk-row::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 120px;
        z-index: 2;
        pointer-events: none;
    }

    .tk-row::before {
        left: 0;
        background: linear-gradient(90deg, var(--cc-ink), transparent);
    }

    .tk-row::after {
        right: 0;
        background: linear-gradient(-90deg, var(--cc-ink), transparent);
    }

    /* image ticker */
    .tk-img {
        display: flex;
        gap: 0;
        align-items: center;
    }

    .tk-img img {
        height: 44px;
        width: auto;
        max-width: 130px;
        object-fit: contain;
        padding: 0 44px;
        flex-shrink: 0;
        opacity: .28;
        filter: grayscale(1) brightness(1.4);
        transition: opacity .4s, filter .4s, transform .4s;
        cursor: pointer;
    }

    .tk-img img:hover {
        opacity: .9;
        filter: grayscale(0);
        transform: scale(1.18) translateY(-3px);
    }

    /* text chip ticker */
    .tk-chip {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 8px 24px;
        margin: 0 4px;
        border: 1px solid rgba(255, 255, 255, .06);
        border-radius: 100px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .08em;
        color: rgba(240, 235, 225, .25);
        white-space: nowrap;
        transition: border-color .3s, color .3s;
    }

    .tk-chip:hover {
        border-color: rgba(201, 168, 76, .3);
        color: var(--cc-gold);
    }

    .tk-dot {
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: var(--cc-gold);
        opacity: .4;
    }

    /* text separator ticker (large running words) */
    .tk-word {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: clamp(32px, 5vw, 56px);
        letter-spacing: -.02em;
        color: rgba(240, 235, 225, .06);
        padding: 0 48px;
        white-space: nowrap;
        display: inline-block;
        cursor: default;
    }

    .tk-sep {
        color: var(--cc-gold);
        opacity: .3;
        font-size: clamp(20px, 3vw, 36px);
        padding: 0 8px;
        display: inline-block;
    }


    /* ════════════════════════════════════════════════════
   §3  ABOUT (cream section — high contrast alternation)
════════════════════════════════════════════════════ */
    #hm-about {
        background: var(--cc-cream);
        color: var(--cc-dark);
        position: relative;
        overflow: hidden;
        z-index: 1;
        padding: 100px 72px;
    }

    .ab-wrap {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 72px;
        align-items: center;
    }

    /* section label */
    .sec-lbl {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .3em;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .sec-lbl::before {
        content: '';
        width: 28px;
        height: 1px;
        background: currentColor;
        flex-shrink: 0;
    }

    /* about headline */
    .ab-h {
        font-family: var(--fd);
        font-weight: 600;
        font-style: italic;
        font-size: clamp(48px, 7.5vw, 104px);
        line-height: .84;
        letter-spacing: -.035em;
        color: var(--cc-dark);
        margin-bottom: 28px;
    }

    .ab-h span {
        color: var(--cc-gold);
    }

    .ab-body {
        font-size: clamp(15px, 1.5vw, 17px);
        line-height: 1.88;
        font-weight: 300;
        color: rgba(10, 10, 13, .65);
        max-width: 440px;
        margin-bottom: 36px;
    }

    .ab-link {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fd);
        font-style: italic;
        font-size: 17px;
        letter-spacing: .05em;
        color: var(--cc-dark);
        border-bottom: 1px solid currentColor;
        padding-bottom: 2px;
        text-decoration: none;
        transition: color .2s, border-color .2s;
    }

    .ab-link:hover {
        color: var(--cc-gold);
        border-color: var(--cc-gold);
    }

    /* mini stat grid inside about */
    .ab-stat-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2px;
        margin-top: 48px;
        border: 2px solid var(--cc-dark);
        border-radius: 4px;
        overflow: hidden;
    }

    .ab-stat-cell {
        background: var(--cc-dark);
        color: var(--cc-cream);
        padding: 24px 20px;
        transition: background .3s;
    }

    .ab-stat-cell:nth-child(odd) {
        background: rgba(10, 10, 13, .92);
    }

    .ab-stat-cell:hover {
        background: #1a1a22;
    }

    .asc-n {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: clamp(28px, 4vw, 46px);
        line-height: 1;
        letter-spacing: -.03em;
    }

    .asc-l {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: var(--cc-muted);
        margin-top: 6px;
    }

    /* right visual panel in about */
    .ab-visual {
        position: relative;
        height: 580px;
    }

    .ab-vis-main {
        position: absolute;
        inset: 0;
        background: var(--cc-dark);
        border-radius: 12px;
        overflow: hidden;
        border: 2px solid var(--cc-dark);
    }

    /* corner frame brackets */
    .ab-vis-main::before,
    .ab-vis-main::after {
        content: '';
        position: absolute;
        width: 44px;
        height: 44px;
        border-color: var(--cc-gold);
        border-style: solid;
        pointer-events: none;
    }

    .ab-vis-main::before {
        top: 24px;
        left: 24px;
        border-width: 1.5px 0 0 1.5px;
    }

    .ab-vis-main::after {
        bottom: 24px;
        right: 24px;
        border-width: 0 1.5px 1.5px 0;
    }

    /* vertical client ticker */
    .ab-vtick {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        width: 90px;
        border-left: 1px solid rgba(255, 255, 255, .06);
        overflow: hidden;
    }

    .ab-vtick::before,
    .ab-vtick::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        height: 56px;
        z-index: 2;
        pointer-events: none;
    }

    .ab-vtick::before {
        top: 0;
        background: linear-gradient(var(--cc-dark), transparent);
    }

    .ab-vtick::after {
        bottom: 0;
        background: linear-gradient(transparent, var(--cc-dark));
    }

    @keyframes vtick-up {
        0% {
            transform: translateY(0)
        }

        100% {
            transform: translateY(-50%)
        }
    }

    .ab-vtick-track {
        animation: vtick-up 22s linear infinite;
    }

    .ab-vtick-track:hover {
        animation-play-state: paused;
    }

    .ab-vti {
        padding: 14px 8px;
        border-bottom: 1px solid rgba(255, 255, 255, .04);
        text-align: center;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: rgba(240, 235, 225, .25);
        transition: color .3s;
        cursor: default;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .ab-vti:hover {
        color: var(--cc-gold);
    }

    /* content inside left part of visual */
    .ab-vis-content {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        right: 90px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 32px;
    }

    .ab-year {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: clamp(72px, 11vw, 130px);
        line-height: 1;
        letter-spacing: -.06em;
        color: transparent;
        -webkit-text-stroke: 1px rgba(201, 168, 76, .18);
        pointer-events: none;
        user-select: none;
    }

    .ab-facts {
        list-style: none;
    }

    .ab-fact {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 11px 0;
        border-bottom: 1px solid rgba(255, 255, 255, .05);
        border-radius: 4px;
        transition: padding-left .25s, background .25s;
    }

    .ab-fact:last-child {
        border-bottom: none;
    }

    .ab-fact:hover {
        background: rgba(201, 168, 76, .04);
        padding-left: 8px;
    }

    .ab-fact-ico {
        font-size: 17px;
        opacity: .55;
        transition: opacity .3s, transform .3s;
        flex-shrink: 0;
    }

    .ab-fact:hover .ab-fact-ico {
        opacity: 1;
        transform: scale(1.25) rotate(-6deg);
    }

    .ab-fact-txt {
        font-size: 13px;
        font-weight: 400;
        color: rgba(240, 235, 225, .6);
        letter-spacing: .03em;
    }

    /* floating badge */
    .ab-badge {
        position: absolute;
        top: -32px;
        right: 108px;
        background: linear-gradient(135deg, rgba(18, 18, 24, .98), rgba(12, 12, 18, .98));
        border: 1px solid rgba(201, 168, 76, .32);
        border-radius: 12px;
        padding: 20px 24px;
        z-index: 5;
        box-shadow: 0 20px 56px rgba(0, 0, 0, .55), 0 0 0 1px rgba(201, 168, 76, .1) inset;
        animation: float-y 6s ease-in-out infinite;
    }

    .ab-badge-n {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: 48px;
        line-height: 1;
        letter-spacing: -.04em;
        color: var(--cc-gold);
    }

    .ab-badge-l {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: var(--cc-muted);
        margin-top: 5px;
    }

    /* live indicator card */
    .ab-live-card {
        position: absolute;
        bottom: -28px;
        left: 24px;
        background: rgba(12, 12, 18, .97);
        border: 1px solid rgba(58, 191, 184, .25);
        border-radius: 10px;
        padding: 14px 18px;
        z-index: 5;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 10px 36px rgba(0, 0, 0, .4);
        animation: float-y2 7s ease-in-out infinite;
    }

    .ab-live-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--cc-teal);
        animation: pulse-dot 2s ease-in-out infinite;
        flex-shrink: 0;
    }

    .ab-live-txt {
        font-size: 12px;
        font-weight: 700;
        color: var(--cc-cream);
        letter-spacing: .02em;
    }

    .ab-live-sub {
        font-size: 10px;
        color: var(--cc-muted);
        margin-top: 1px;
        letter-spacing: .06em;
    }


    /* ════════════════════════════════════════════════════
   §4  SERVICES (dark, bento-style)
════════════════════════════════════════════════════ */
    #hm-services {
        background: var(--cc-darker);
        position: relative;
        z-index: 1;
    }

    .svc-hdr {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        padding: 88px 72px 52px;
        gap: 24px;
        flex-wrap: wrap;
        border-bottom: 1px solid var(--cc-border);
    }

    .svc-hdr-h {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: clamp(48px, 7.5vw, 108px);
        line-height: .84;
        letter-spacing: -.035em;
        color: var(--cc-cream);
    }

    .svc-hdr-h span {
        color: var(--cc-gold);
    }

    /* bento grid */
    .svc-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2px;
        background: var(--cc-border);
    }

    .svc-card {
        position: relative;
        background: var(--cc-card);
        padding: 40px 32px 48px;
        overflow: hidden;
        cursor: default;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        transition: background .4s var(--ease);
    }

    /* top accent sweep */
    .svc-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--sc, var(--cc-gold));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .45s var(--ease);
    }

    .svc-card:hover::before {
        transform: scaleX(1);
    }

    /* shimmer */
    .svc-card::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(108deg, transparent 40%, rgba(255, 255, 255, .025) 50%, transparent 60%);
        transform: translateX(-100%);
        transition: transform .65s var(--ease);
    }

    .svc-card:hover::after {
        transform: translateX(100%);
    }

    .svc-card:hover {
        background: #17171f;
    }

    .svc-bg-ico {
        position: absolute;
        bottom: -10px;
        right: -6px;
        font-size: 90px;
        opacity: .05;
        pointer-events: none;
        user-select: none;
        line-height: 1;
        transition: opacity .4s, transform .4s;
    }

    .svc-card:hover .svc-bg-ico {
        opacity: .12;
        transform: scale(1.1) rotate(-8deg);
    }

    .svc-num {
        font-family: var(--fd);
        font-style: italic;
        font-size: 13px;
        letter-spacing: .04em;
        color: var(--sc, var(--cc-gold));
        opacity: .45;
        margin-bottom: 20px;
        transition: opacity .3s;
    }

    .svc-card:hover .svc-num {
        opacity: 1;
    }

    .svc-ico {
        font-size: 32px;
        margin-bottom: 16px;
        display: inline-block;
        transition: transform .4s var(--ease);
    }

    .svc-card:hover .svc-ico {
        transform: scale(1.22) rotate(-6deg);
    }

    .svc-title {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: clamp(20px, 2vw, 28px);
        line-height: 1.1;
        color: var(--cc-cream);
        margin-bottom: 14px;
        transition: color .3s;
    }

    .svc-card:hover .svc-title {
        color: var(--sc, var(--cc-gold));
    }

    .svc-desc {
        font-size: 13px;
        color: rgba(240, 235, 225, .45);
        line-height: 1.75;
        font-weight: 300;
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        transition: max-height .5s var(--ease), opacity .4s;
    }

    .svc-card:hover .svc-desc {
        max-height: 200px;
        opacity: 1;
    }

    .svc-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-top: auto;
        padding-top: 20px;
    }

    .svc-tag {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 100px;
        border: 1px solid rgba(255, 255, 255, .07);
        color: rgba(240, 235, 225, .3);
        transition: border-color .3s, color .3s;
    }

    .svc-card:hover .svc-tag {
        border-color: var(--sc, var(--cc-gold));
        color: var(--sc, var(--cc-gold));
        opacity: .7;
    }

    /* arrow cta */
    .svc-arr {
        position: absolute;
        bottom: 24px;
        right: 24px;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, .07);
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(240, 235, 225, .25);
        font-size: 16px;
        text-decoration: none;
        transition: all .3s var(--ease);
    }

    .svc-card:hover .svc-arr {
        border-color: var(--sc, var(--cc-gold));
        color: var(--sc, var(--cc-gold));
        transform: translate(2px, -2px);
    }


    /* ════════════════════════════════════════════════════
   §5  CAMPAIGNS / WORK (magazine grid — cream bg)
════════════════════════════════════════════════════ */
    #hm-campaigns {
        background: var(--cc-cream);
        color: var(--cc-dark);
        padding: 100px 72px;
        position: relative;
        z-index: 1;
    }

    .camp-hdr {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 52px;
        gap: 24px;
        flex-wrap: wrap;
    }

    .camp-hdr-h {
        font-family: var(--fd);
        font-weight: 600;
        font-style: italic;
        font-size: clamp(48px, 7.5vw, 108px);
        line-height: .84;
        letter-spacing: -.035em;
        color: var(--cc-dark);
    }

    .camp-hdr-h span {
        color: var(--cc-gold);
    }

    .camp-view-all {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-family: var(--fd);
        font-style: italic;
        font-size: 17px;
        letter-spacing: .05em;
        color: var(--cc-dark);
        border-bottom: 1px solid currentColor;
        padding-bottom: 2px;
        text-decoration: none;
        transition: color .2s, border-color .2s;
        flex-shrink: 0;
        align-self: flex-end;
        margin-bottom: 8px;
    }

    .camp-view-all:hover {
        color: var(--cc-gold);
        border-color: var(--cc-gold);
    }

    /* 12-col magazine grid */
    .camp-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 2px;
        border: 2px solid var(--cc-dark);
        border-radius: 8px;
        overflow: hidden;
    }

    .camp-card {
        position: relative;
        background: #1a1a22;
        text-decoration: none;
        display: block;
        overflow: hidden;
        transition: background .35s;
    }

    .camp-card:hover {
        background: #1e1e28;
    }

    .camp-card.c-feat {
        grid-column: span 8;
    }

    .camp-card.c-sm {
        grid-column: span 4;
    }

    .camp-iw {
        overflow: hidden;
        position: relative;
    }

    .camp-iw img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(.5) saturate(.75);
        transition: transform .85s var(--ease), filter .85s;
    }

    .camp-card:hover .camp-iw img {
        transform: scale(1.07);
        filter: brightness(.7) saturate(1);
    }

    .camp-card.c-feat .camp-iw {
        height: 400px;
    }

    .camp-card.c-sm .camp-iw {
        height: 240px;
    }

    .camp-iw::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(6, 6, 8, .96) 0%, transparent 58%);
    }

    .camp-ph {
        /* placeholder when no image */
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #141420, #0a0a0e);
    }

    .camp-ph span {
        font-family: var(--fd);
        font-size: 60px;
        font-style: italic;
        color: rgba(201, 168, 76, .05);
    }

    .camp-body {
        padding: 28px;
    }

    .camp-card.c-feat .camp-body {
        padding: 36px;
    }

    .camp-author {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: var(--cc-gold);
        opacity: .7;
        margin-bottom: 10px;
        display: block;
    }

    .camp-title {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: clamp(20px, 2.4vw, 32px);
        line-height: 1.15;
        color: var(--cc-cream);
        margin-bottom: 10px;
        transition: color .25s;
    }

    .camp-card.c-feat .camp-title {
        font-size: clamp(26px, 3.2vw, 46px);
    }

    .camp-card:hover .camp-title {
        color: var(--cc-gold);
    }

    .camp-desc {
        font-size: 13px;
        color: rgba(240, 235, 225, .4);
        line-height: 1.65;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .camp-cta {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 16px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: rgba(201, 168, 76, .32);
        transition: color .25s, gap .25s;
    }

    .camp-card:hover .camp-cta {
        color: var(--cc-gold);
        gap: 12px;
    }

    /* empty state */
    .camp-empty {
        grid-column: span 12;
        padding: 80px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
        background: #111118;
    }

    .camp-empty-h {
        font-family: var(--fd);
        font-style: italic;
        font-size: 40px;
        color: rgba(240, 235, 225, .25);
    }

    .camp-empty-p {
        font-size: 14px;
        color: rgba(240, 235, 225, .2);
    }


    /* ════════════════════════════════════════════════════
   §6  WORD TICKER (bold running text between sections)
════════════════════════════════════════════════════ */
    #hm-word-ticker {
        background: var(--cc-dark);
        border-top: 1px solid var(--cc-border);
        border-bottom: 1px solid var(--cc-border);
        padding: 32px 0;
        overflow: hidden;
    }


    /* ════════════════════════════════════════════════════
   §7  PROCESS (dark, editorial split rows)
════════════════════════════════════════════════════ */
    #hm-process {
        background: var(--cc-ink);
        position: relative;
        z-index: 1;
        padding: 88px 0;
    }

    .proc-hdr {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: end;
        padding: 0 72px;
        margin-bottom: 60px;
    }

    .proc-hdr-h {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: clamp(48px, 7.5vw, 108px);
        line-height: .84;
        letter-spacing: -.035em;
        color: var(--cc-cream);
    }

    .proc-hdr-h span {
        color: var(--cc-teal);
    }

    .proc-hdr-p {
        font-size: 15px;
        color: var(--cc-muted);
        line-height: 1.85;
        font-weight: 300;
        max-width: 400px;
        padding-bottom: 8px;
    }

    .proc-list {
        list-style: none;
    }

    .proc-item {
        display: grid;
        grid-template-columns: 1fr 1px 1fr;
        border-top: 1px solid var(--cc-border);
        border-bottom: 1px solid var(--cc-border);
        margin-bottom: -1px;
        min-height: 200px;
        transition: background .3s;
    }

    .proc-item:hover {
        background: rgba(255, 255, 255, .01);
    }

    .proc-div {
        background: var(--cc-border);
    }

    .proc-l,
    .proc-r {
        padding: 48px 72px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .proc-num {
        font-family: var(--fd);
        font-size: 92px;
        font-weight: 300;
        font-style: italic;
        line-height: 1;
        letter-spacing: -.06em;
        color: rgba(255, 255, 255, .03);
        margin-bottom: -10px;
        transition: color .5s;
    }

    .proc-item:hover .proc-num {
        color: rgba(201, 168, 76, .1);
    }

    .proc-tag {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .28em;
        text-transform: uppercase;
        opacity: .5;
        margin-bottom: 10px;
        transition: opacity .3s;
    }

    .proc-item:hover .proc-tag {
        opacity: 1;
    }

    .proc-title {
        font-family: var(--fd);
        font-weight: 300;
        font-style: italic;
        font-size: clamp(26px, 3.5vw, 52px);
        line-height: .9;
        letter-spacing: -.02em;
        color: rgba(240, 235, 225, .4);
        transition: color .5s;
    }

    .proc-item:hover .proc-title {
        color: var(--pp, var(--cc-gold));
    }

    .proc-ico {
        font-size: 40px;
        margin-bottom: 14px;
        opacity: .45;
        transition: opacity .4s, transform .4s;
    }

    .proc-item:hover .proc-ico {
        opacity: 1;
        transform: scale(1.18) rotate(-5deg);
    }

    .proc-desc {
        font-size: 14px;
        color: var(--cc-muted);
        line-height: 1.85;
        font-weight: 300;
        max-width: 440px;
    }


    /* ════════════════════════════════════════════════════
   §8  CTA CLOSING (cream with giant ghost text)
════════════════════════════════════════════════════ */
    #hm-cta {
        background: var(--cc-cream);
        color: var(--cc-dark);
        position: relative;
        overflow: hidden;
        z-index: 1;
        padding: 120px 72px;
        text-align: center;
    }

    .cta-ghost {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: var(--fd);
        font-weight: 600;
        font-style: italic;
        font-size: clamp(80px, 14vw, 220px);
        letter-spacing: -.05em;
        line-height: 1;
        color: transparent;
        -webkit-text-stroke: 1.5px rgba(10, 10, 13, .07);
        white-space: nowrap;
        pointer-events: none;
        user-select: none;
    }

    .cta-h {
        font-family: var(--fd);
        font-weight: 600;
        font-style: italic;
        font-size: clamp(52px, 9vw, 136px);
        line-height: .82;
        letter-spacing: -.04em;
        color: var(--cc-dark);
        margin-bottom: 44px;
        position: relative;
        z-index: 2;
    }

    .cta-h span {
        color: var(--cc-gold);
    }

    .cta-btns {
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
    }

    .cta-btn-dark {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fd);
        font-style: italic;
        font-size: 18px;
        letter-spacing: .04em;
        background: var(--cc-dark);
        color: var(--cc-cream);
        padding: 15px 40px;
        border-radius: 2px;
        text-decoration: none;
        transition: background .2s, transform .25s, box-shadow .25s;
    }

    .cta-btn-dark:hover {
        background: #1e1e28;
        transform: translateY(-2px);
        box-shadow: 0 16px 44px rgba(10, 10, 13, .28);
    }

    .cta-btn-outline {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--fd);
        font-style: italic;
        font-size: 18px;
        letter-spacing: .04em;
        border: 2px solid var(--cc-dark);
        color: var(--cc-dark);
        padding: 14px 38px;
        border-radius: 2px;
        text-decoration: none;
        transition: background .2s, color .2s, transform .25s;
    }

    .cta-btn-outline:hover {
        background: var(--cc-dark);
        color: var(--cc-cream);
        transform: translateY(-2px);
    }

    .cta-sub {
        margin-top: 36px;
        font-size: 13px;
        color: rgba(10, 10, 13, .4);
        letter-spacing: .1em;
        position: relative;
        z-index: 2;
    }


    /* ════════════════════════════════════════════════════
   RESPONSIVE
════════════════════════════════════════════════════ */
    @media(max-width:1200px) {
        .svc-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width:1100px) {
        .h-body {
            grid-template-columns: 1fr;
            padding: 130px 40px 60px;
        }

        .h-visual {
            height: 360px;
        }

        .h-ring-1 {
            width: 320px;
            height: 320px;
        }

        .h-ring-2 {
            width: 240px;
            height: 240px;
        }

        .h-ring-3 {
            width: 160px;
            height: 160px;
        }

        .h-disc {
            width: 170px;
            height: 170px;
        }

        .h-disc-n {
            font-size: 52px;
        }

        .hf-a,
        .hf-b,
        .hf-c {
            display: none;
        }

        .h-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .h-scroll-cue {
            display: none;
        }

        .ab-wrap {
            grid-template-columns: 1fr;
            gap: 52px;
        }

        .ab-visual {
            height: 420px;
        }

        .ab-badge {
            right: 100px;
        }

        .camp-card.c-feat {
            grid-column: span 12;
        }

        .camp-card.c-sm {
            grid-column: span 6;
        }

        .proc-hdr {
            grid-template-columns: 1fr;
            padding: 0 40px;
        }

        .proc-item {
            grid-template-columns: 1fr;
            min-height: auto;
        }

        .proc-div {
            display: none;
        }

        .proc-l,
        .proc-r {
            padding: 32px 40px;
        }

        #hm-about,
        #hm-campaigns,
        #hm-cta {
            padding: 80px 40px;
        }

        .svc-hdr {
            padding: 64px 40px 44px;
        }
    }

    @media(max-width:768px) {
        .h-body {
            padding: 108px 24px 52px;
        }

        .h-visual {
            height: 280px;
        }

        .h-ring-1 {
            width: 240px;
            height: 240px;
        }

        .h-ring-2 {
            width: 180px;
            height: 180px;
        }

        .h-ring-3 {
            width: 120px;
            height: 120px;
        }

        .h-disc {
            width: 130px;
            height: 130px;
        }

        .h-disc-n {
            font-size: 40px;
        }

        .h-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .h-stat {
            padding: 18px 24px;
        }

        .ab-visual {
            height: 360px;
        }

        .ab-vtick {
            width: 72px;
        }

        .ab-badge {
            right: 84px;
        }

        .camp-card.c-sm {
            grid-column: span 12;
        }

        .camp-card.c-feat .camp-iw {
            height: 260px;
        }

        #hm-about,
        #hm-campaigns,
        #hm-cta {
            padding: 64px 24px;
        }

        .svc-hdr {
            padding: 52px 24px 36px;
        }

        .proc-l,
        .proc-r {
            padding: 28px 24px;
        }

        .proc-hdr {
            padding: 0 24px;
        }

        .camp-hdr-h {
            font-size: clamp(40px, 10vw, 72px);
        }
    }

    @media(max-width:600px) {
        .svc-grid {
            grid-template-columns: 1fr;
        }

        .svc-desc {
            max-height: 200px !important;
            opacity: 1 !important;
        }

        .h-btns {
            flex-direction: column;
        }

        .h-btn {
            justify-content: center;
            text-align: center;
        }

        .cta-btns {
            flex-direction: column;
            align-items: center;
        }

        .h-stats {
            grid-template-columns: 1fr 1fr;
        }

        .ab-stat-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>


<!-- ══════════════════════════════════════════
     §1  HERO
══════════════════════════════════════════════ -->
<section id="hm-hero" aria-labelledby="hm-h1">
    <!-- ambient -->
    <div class="h-orb h-orb-1" aria-hidden="true"></div>
    <div class="h-orb h-orb-2" aria-hidden="true"></div>
    <div class="h-orb h-orb-3" aria-hidden="true"></div>
    <div class="h-grain" aria-hidden="true"></div>

    <div class="h-body">
        <!-- LEFT: copy -->
        <div>
            <div class="h-eye" aria-label="India's Premier Cinema Marketing Studio">
                <span class="h-eye-dot" aria-hidden="true"></span>
                <span class="h-eye-lbl">India's Premier Cinema Marketing Studio</span>
            </div>

            <h1 class="h-h1" id="hm-h1">
                Where<br>Cinema<br>Meets&nbsp;<em>Culture</em>
            </h1>

            <p class="h-sub">
                <?= htmlspecialchars($settings['hero_subtext'] ?? 'A refined studio crafting authentic influencer campaigns, viral content, and cinematic promotions that move audiences.') ?>
            </p>

            <div class="h-btns">
                <a href="#hm-campaigns" class="h-btn h-btn-gold">Explore Our Work</a>
                <a href="<?= base_url('contact') ?>" class="h-btn h-btn-ghost">Reserve a Table →</a>
            </div>
        </div>

        <!-- RIGHT: cinematic visual -->
        <div class="h-visual" aria-hidden="true">
            <div class="h-glow"></div>
            <div class="h-ring h-ring-1"></div>
            <div class="h-ring h-ring-2"></div>
            <div class="h-ring h-ring-3"></div>

            <!-- film strip holes -->
            <div class="h-strip hs-l">
                <?php for ($i = 0; $i < 18; $i++): ?><div class="h-hole"></div><?php endfor; ?>
            </div>
            <div class="h-strip hs-r">
                <?php for ($i = 0; $i < 18; $i++): ?><div class="h-hole"></div><?php endfor; ?>
            </div>

            <!-- central disc -->
            <div class="h-disc">
                <div class="h-disc-n" data-target="32" data-suffix="%">0%</div>
                <div class="h-disc-l">OTT Releases</div>
            </div>

            <!-- floating stats -->
            <div class="h-float hf-a">
                <div class="h-float-n" style="color:var(--cc-gold);" data-target="300" data-suffix="+">0+</div>
                <div class="h-float-l">Campaigns</div>
            </div>
            <div class="h-float hf-b">
                <div class="h-float-n" style="color:var(--cc-teal);" data-target="12" data-suffix="M+">0M+</div>
                <div class="h-float-l">People Reached</div>
            </div>
            <div class="h-float hf-c">
                <div class="h-float-n" style="color:var(--cc-rose);" data-target="70" data-suffix="+">0+</div>
                <div class="h-float-l">Screenings</div>
            </div>
        </div>
    </div><!-- /.h-body -->

    <!-- scroll cue -->
    <div class="h-scroll-cue" aria-hidden="true">
        <div class="h-scroll-line"></div>
        <span class="h-scroll-lbl">Scroll</span>
    </div>

    <!-- bottom stats bar -->
    <div class="h-stats" aria-label="Key metrics">
        <?php $hs = [
            [$settings['stat_campaigns'] ?? '300+', 'Campaigns',        '--cc-gold'],
            ['32%',                              'OTT Releases',     '--cc-rose'],
            [$settings['stat_reach'] ?? '12M+',   'People Reached',   '--cc-plum'],
            [$settings['stat_movies'] ?? '150+',  'Films',            '--cc-teal'],
        ];
        foreach ($hs as $h): ?>
            <div class="h-stat">
                <div class="hs-n" style="color:var(<?= $h[2] ?>)"><?= htmlspecialchars($h[0]) ?></div>
                <div class="hs-l"><?= $h[1] ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<!-- ══════════════════════════════════════════
     §2  BRAND TICKER
══════════════════════════════════════════════ -->
<section id="hm-ticker" aria-label="Brand partners">
    <?php if (!empty($brand_imgs)): ?>
        <!-- Image ticker row 1 — left -->
        <div class="tk-row">
            <div class="mq-track go-l" style="--dur:50s;">
                <?php $ti = array_merge($brand_imgs, $brand_imgs);
                foreach ($ti as $img): ?>
                    <img src="<?= htmlspecialchars($img) ?>" alt="Brand partner" loading="lazy" style="height:40px;width:auto;max-width:120px;object-fit:contain;padding:0 44px;flex-shrink:0;
                  opacity:.28;filter:grayscale(1) brightness(1.4);
                  transition:opacity .4s,filter .4s,transform .4s;"
                        onmouseover="this.style.opacity='.9';this.style.filter='none';this.style.transform='scale(1.18) translateY(-3px)'"
                        onmouseout="this.style.opacity='.28';this.style.filter='grayscale(1) brightness(1.4)';this.style.transform=''">
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <!-- Text chip ticker -->
        <div class="tk-row" style="padding:28px 0;">
            <div class="mq-track go-l tk-chip-track" style="--dur:38s;">
                <?php $tc = array_merge($fallback, $fallback);
                foreach ($tc as $b): ?>
                    <span class="tk-chip"><span class="tk-dot" aria-hidden="true"></span><?= htmlspecialchars($b) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</section>


<!-- ══════════════════════════════════════════
     §3  WHO WE ARE  (cream)
══════════════════════════════════════════════ -->
<section id="hm-about" aria-labelledby="hm-about-h">
    <div class="u-max">
        <div class="ab-wrap">

            <!-- LEFT: copy -->
            <div>
                <p class="sec-lbl sr" style="color:var(--cc-gold);">Who We Are</p>
                <h2 id="hm-about-h" class="ab-h sr d1">
                    Crafting<br><span>Cinematic</span><br>Impact
                </h2>
                <p class="ab-body sr d2">
                    <?= htmlspecialchars($settings['about_text'] ?? 'The Cine Caffe is a premium cinema marketing studio driving high-impact campaigns for brands and production houses across entertainment, culture, and commerce.') ?>
                </p>
                <a href="<?= base_url('about') ?>" class="ab-link sr d3">Our Full Story →</a>

                <div class="ab-stat-grid sr d4">
                    <?php $stats = [
                        [$settings['stat_campaigns'] ?? '300+', 'Campaigns', '--cc-gold'],
                        ['32%', 'OTT Releases', '--cc-rose'],
                        [$settings['stat_reach'] ?? '12M+', 'Reached', '--cc-plum'],
                        [$settings['stat_screenings'] ?? '70+', 'Screenings', '--cc-teal'],
                    ];
                    foreach ($stats as $s): ?>
                        <div class="ab-stat-cell">
                            <div class="asc-n" style="color:var(<?= $s[2] ?>)"><?= htmlspecialchars($s[0]) ?></div>
                            <div class="asc-l"><?= $s[1] ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div><!-- /left -->

            <!-- RIGHT: layered visual -->
            <div class="ab-visual sr sr2 d1">
                <!-- floating % badge -->
                <div class="ab-badge" aria-hidden="true">
                    <div class="ab-badge-n">32%</div>
                    <div class="ab-badge-l">Of All OTT Releases</div>
                </div>

                <!-- main dark panel -->
                <div class="ab-vis-main">
                    <!-- vertical client ticker -->
                    <div class="ab-vtick" aria-hidden="true">
                        <div class="ab-vtick-track">
                            <?php
                            $clients = [
                                'Netflix',
                                'Amazon',
                                'Disney+',
                                'Dharma',
                                'YRF',
                                'Sony',
                                'T-Series',
                                'Warner',
                                'Zee5',
                                'Jio Cinema',
                                'Maddock',
                                'boAt',
                                'Myntra',
                                'OnePlus',
                                'Fastrack'
                            ];
                            $cv = array_merge($clients, $clients);
                            foreach ($cv as $c): ?>
                                <div class="ab-vti"><?= htmlspecialchars($c) ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- left content -->
                    <div class="ab-vis-content">
                        <div class="ab-year" aria-hidden="true"><?= date('Y') ?></div>
                        <ul class="ab-facts">
                            <?php $facts = [
                                ['🎬', 'End-to-End Campaign Management'],
                                ['🌐', '10,000+ Creator Network'],
                                ['📍', 'Pan-India Coverage'],
                                ['⚡', '24–48h Response Time'],
                                ['🏆', '300+ Successful Campaigns'],
                            ];
                            foreach ($facts as $f): ?>
                                <li class="ab-fact">
                                    <span class="ab-fact-ico" aria-hidden="true"><?= $f[0] ?></span>
                                    <span class="ab-fact-txt"><?= $f[1] ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div><!-- /.ab-vis-main -->

                <!-- live card -->
                <div class="ab-live-card" aria-hidden="true">
                    <div class="ab-live-dot"></div>
                    <div>
                        <div class="ab-live-txt">Live Campaigns</div>
                        <div class="ab-live-sub">India's Trusted Studio</div>
                    </div>
                </div>
            </div><!-- /right visual -->

        </div><!-- /.ab-wrap -->
    </div>
</section>


<!-- ══════════════════════════════════════════
     §4  SERVICES  (dark bento)
══════════════════════════════════════════════ -->
<section id="hm-services" aria-labelledby="hm-svc-h">
    <div class="svc-hdr">
        <div class="sr">
            <p class="sec-lbl" style="color:var(--cc-rose);">What We Do</p>
            <h2 id="hm-svc-h" class="svc-hdr-h">
                Our <span>Services</span>
            </h2>
        </div>
        <a href="<?= base_url('contact') ?>" class="h-btn h-btn-ghost sr" style="align-self:flex-end">Work With Us →</a>
    </div>

    <div class="svc-grid" role="list">
        <?php
        $svc_colors = ['#C9A84C', '#E8836A', '#8B5DA0', '#3ABFB8', '#6BAF8D', '#C9A84C', '#E8836A', '#8B5DA0'];
        foreach ($svcs as $i => $sv):
        ?>
            <article class="svc-card sr d<?= ($i % 4) + 1 ?>" style="--sc:<?= $svc_colors[$i] ?>;" role="listitem">
                <div class="svc-bg-ico" aria-hidden="true"><?= $sv[4] ?></div>
                <div class="svc-num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></div>
                <div class="svc-ico" aria-hidden="true"><?= $sv[4] ?></div>
                <h3 class="svc-title"><?= htmlspecialchars($sv[1]) ?></h3>
                <p class="svc-desc"><?= htmlspecialchars($sv[2]) ?></p>
                <div class="svc-tags">
                    <?php foreach ($sv[3] as $tag): ?>
                        <span class="svc-tag"><?= htmlspecialchars($tag) ?></span>
                    <?php endforeach; ?>
                </div>
                <a href="<?= base_url('contact') ?>" class="svc-arr"
                    aria-label="Start <?= htmlspecialchars($sv[1]) ?>">›</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>


<!-- ══════════════════════════════════════════
     §5  CAMPAIGNS  (cream, magazine grid)
══════════════════════════════════════════════ -->
<section id="hm-campaigns" aria-labelledby="hm-camp-h">
    <div class="u-max">
        <div class="camp-hdr">
            <div class="sr sl">
                <p class="sec-lbl" style="color:var(--cc-plum);">Case Studies</p>
                <h2 id="hm-camp-h" class="camp-hdr-h">
                    Signature <span>Campaigns</span>
                </h2>
            </div>
            <a href="<?= base_url('work') ?>" class="camp-view-all sr sr2">View All Work →</a>
        </div>

        <div class="camp-grid sr ss">
            <?php if (empty($posts)): ?>
                <div class="camp-empty">
                    <p class="camp-empty-h">Coming Soon</p>
                    <p class="camp-empty-p">Great campaigns are in the making — check back soon.</p>
                </div>
                <?php else: foreach ($posts as $i => $p):
                    $feat = ($i === 0);
                    $cls = $feat ? 'c-feat' : 'c-sm';
                ?>
                    <a href="<?= base_url('post/' . $p['slug']) ?>" class="camp-card <?= $cls ?>"
                        aria-label="<?= htmlspecialchars($p['title']) ?>">
                        <?php if (!empty($p['image'])): ?>
                            <div class="camp-iw" style="<?= $feat ? 'height:400px' : 'height:240px' ?>">
                                <img src="<?= base_url('assets/images/uploads/' . $p['image']) ?>"
                                    alt="<?= htmlspecialchars($p['title']) ?>" loading="lazy">
                            </div>
                        <?php else: ?>
                            <div class="camp-iw camp-ph" style="<?= $feat ? 'height:400px' : 'height:240px' ?>">
                                <span>Cine</span>
                            </div>
                        <?php endif; ?>
                        <div class="camp-body">
                            <span class="camp-author"><?= htmlspecialchars($p['author']) ?></span>
                            <h3 class="camp-title"><?= htmlspecialchars($p['title']) ?></h3>
                            <p class="camp-desc"><?= htmlspecialchars(mb_substr($p['description'], 0, 110)) ?>…</p>
                            <div class="camp-cta">View Campaign <span>→</span></div>
                        </div>
                    </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     §6  BOLD WORD TICKER
══════════════════════════════════════════════ -->
<section id="hm-word-ticker" aria-hidden="true">
    <div class="mq-track go-l" style="--dur:36s;">
        <?php $words = [
            'Where Cinema Meets Culture',
            'Influencer Marketing',
            'Film Promotions',
            'Meme Marketing',
            'Video Production',
            'Celebrity Endorsements',
            'OTT Strategy',
            'On-Ground Activations'
        ];
        $wt = array_merge($words, $words);
        foreach ($wt as $w): ?>
            <span class="tk-word"><?= htmlspecialchars($w) ?></span>
            <span class="tk-sep" aria-hidden="true">✦</span>
        <?php endforeach; ?>
    </div>
</section>


<!-- ══════════════════════════════════════════
     §7  PROCESS  (dark editorial)
══════════════════════════════════════════════ -->
<section id="hm-process" aria-labelledby="hm-proc-h">
    <div class="proc-hdr">
        <div class="sr">
            <p class="sec-lbl" style="color:var(--cc-teal);">How We Work</p>
            <h2 id="hm-proc-h" class="proc-hdr-h">
                Our <span>Process</span>
            </h2>
        </div>
        <p class="proc-hdr-p sr d2">
            A refined four-act framework that transforms brands into cultural icons — from strategy to compound growth.
        </p>
    </div>

    <ul class="proc-list" role="list">
        <?php
        $proc_colors = ['--cc-gold', '--cc-rose', '--cc-plum', '--cc-teal'];
        foreach ($proc_steps as $i => $ps):
        ?>
            <li class="proc-item sr" style="--pp:var(<?= $proc_colors[$i] ?>);" role="listitem">
                <div class="proc-l">
                    <div class="proc-num" aria-hidden="true"><?= $ps[0] ?></div>
                    <div class="proc-tag" style="color:var(<?= $proc_colors[$i] ?>)"><?= $ps[0] ?> — <?= $ps[2] ?></div>
                    <h3 class="proc-title"><?= $ps[2] ?></h3>
                </div>
                <div class="proc-div" aria-hidden="true"></div>
                <div class="proc-r">
                    <div class="proc-ico" aria-hidden="true"><?= $ps[1] ?></div>
                    <p class="proc-desc"><?= $ps[3] ?></p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

    <div style="margin-top:56px;display:flex;justify-content:center;" class="sr">
        <a href="<?= base_url('contact') ?>" class="h-btn h-btn-gold" style="font-size:18px;padding:18px 52px;">
            Start Your Campaign →
        </a>
    </div>
</section>


<!-- ══════════════════════════════════════════
     §8  CTA CLOSING  (cream)
══════════════════════════════════════════════ -->
<section id="hm-cta" aria-label="Call to action">
    <div class="cta-ghost" aria-hidden="true">Extraordinary</div>

    <div class="u-max" style="position:relative;z-index:2;">
        <p class="sec-lbl sr" style="color:var(--cc-sage);justify-content:center;margin:0 auto 24px;">Ready to Begin?
        </p>
        <h2 class="cta-h sr d1">
            Let's Create<br>Something <span>Extraordinary</span>
        </h2>
        <div class="cta-btns sr d2">
            <a href="<?= base_url('contact') ?>" class="cta-btn-dark">Start a Campaign</a>
            <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'contact@thecinecaffe.com') ?>"
                class="cta-btn-outline">Email Us</a>
        </div>
        <p class="cta-sub sr d3">
            <?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?>
            &nbsp;·&nbsp;
            <?= htmlspecialchars($settings['site_email'] ?? 'contact@thecinecaffe.com') ?>
        </p>
    </div>
</section>


<!-- ══════════════════════════════════════════
     JS
══════════════════════════════════════════════ -->
<script>
    (function() {
        'use strict';

        /* ── 1. Scroll reveal ──────────────────────── */
        var items = document.querySelectorAll('.sr');
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function(entries) {
                entries.forEach(function(e) {
                    if (e.isIntersecting) {
                        e.target.classList.add('in');
                        io.unobserve(e.target);
                    }
                });
            }, {
                threshold: .1,
                rootMargin: '0px 0px -36px 0px'
            });
            items.forEach(function(el) {
                io.observe(el);
            });
        } else {
            items.forEach(function(el) {
                el.classList.add('in');
            });
        }

        /* ── 2. Counter animation ──────────────────── */
        function animCounter(el) {
            var target = parseFloat(el.dataset.target) || 0;
            var suffix = el.dataset.suffix || '';
            var dur = 1800,
                step = 16,
                cur = 0,
                inc = target / (dur / step);
            var t = setInterval(function() {
                cur += inc;
                if (cur >= target) {
                    cur = target;
                    clearInterval(t);
                }
                el.textContent = Math.floor(cur) + suffix;
            }, step);
        }
        var cObs = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    animCounter(e.target);
                    cObs.unobserve(e.target);
                }
            });
        }, {
            threshold: .5
        });
        document.querySelectorAll('[data-target]').forEach(function(el) {
            cObs.observe(el);
        });

        /* ── 3. Hero visual parallax tilt (desktop) ── */
        var vis = document.querySelector('.h-visual');
        if (vis && window.innerWidth > 1100) {
            document.addEventListener('mousemove', function(e) {
                var x = (e.clientX / window.innerWidth - .5) * 10;
                var y = (e.clientY / window.innerHeight - .5) * 6;
                vis.style.transform = 'perspective(900px) rotateY(' + x + 'deg) rotateX(' + (-y) + 'deg)';
            }, {
                passive: true
            });
        }

        /* ── 4. Campaign grid responsive fix ─────────── */
        function fixCamp() {
            var f = document.querySelector('.camp-card.c-feat');
            var sm = document.querySelectorAll('.camp-card.c-sm');
            if (!f) return;
            var w = window.innerWidth;
            f.style.gridColumn = w <= 1100 ? 'span 12' : 'span 8';
            sm.forEach(function(c) {
                c.style.gridColumn = w <= 768 ? 'span 12' : w <= 1100 ? 'span 6' : 'span 4';
            });
        }
        fixCamp();
        window.addEventListener('resize', fixCamp, {
            passive: true
        });

        /* ── 5. Process grid responsive fix ──────────── */
        function fixProc() {
            document.querySelectorAll('.proc-item').forEach(function(el) {
                el.style.gridTemplateColumns = window.innerWidth <= 1100 ? '1fr' : '1fr 1px 1fr';
            });
        }
        fixProc();
        window.addEventListener('resize', fixProc, {
            passive: true
        });

        /* ── 6. Smooth anchor scroll ──────────────────── */
        document.querySelectorAll('a[href^="#hm-"]').forEach(function(a) {
            a.addEventListener('click', function(e) {
                var t = document.querySelector(this.getAttribute('href'));
                if (t) {
                    e.preventDefault();
                    t.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

    })();
</script>