<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
/* ─── DATA SETUP (content unchanged) ─────────────────── */
$svcs = [
    ['01', 'Influencer Marketing',  '#C9A84C', '🤳', 'Precision-matched creator partnerships — nano to celebrity — that feel authentic and perform powerfully.',     ['300+ campaigns', '12M+ reach', 'All platforms']],
    ['02', 'Meme Marketing',        '#E8836A', '😂', 'Culturally embedded viral content. Memes that spread because they belong, not because they were placed.',      ['Trend-first', '10x organic reach', 'Format-native']],
    ['03', 'Film Promotions',       '#8B5DA0', '🎬', 'End-to-end cinematic promotion strategy. We power the buzz that fills seats and drives streams.',             ['32% of OTT releases', 'Teaser to release', 'Bollywood + Hollywood']],
    ['04', 'Video Production',      '#3ABFB8', '🎥', 'Concept, craft, deliver. Brand films to web series — OTT-grade quality at studio speed.',                    ['Concept to final cut', 'OTT-grade', 'Fast turnaround']],
    ['05', 'Film Screenings',       '#6BAF8D', '🍿', 'Curated influencer screening events that generate authentic pre-release buzz at scale.',                       ['70+ screenings', 'Tier 1 & 2 cities', 'Press + creators']],
    ['06', 'On-Ground Activations', '#C9A84C', '🎪', 'Real-world brand moments bridging digital reach with physical memory.',                                        ['Pan-India', 'Brand activations', 'Celebrity tie-ins']],
    ['07', 'LinkedIn & X Strategy', '#E8836A', '💼', 'Platform-native campaigns building authority for studios, OTT brands, and their executive voices.',           ['Thought leadership', 'Viral threads', 'B2B + B2C']],
    ['08', 'Celebrity Endorsements', '#8B5DA0', '⭐', 'Curated star partnerships that amplify brand credibility and unlock millions of loyal followers.',             ['Verified partnerships', 'Contract negotiation', 'ROI focused']],
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
$fallback    = ["boAt", "Fastrack", "Masters' Union", "Myntra", "OnePlus", "Netflix", "Amazon Prime", "Disney+", "Dharma", "YRF", "Sony", "T-Series", "Warner Bros", "Zee5", "Jio Cinema", "Maddock Films"];
$ticker_imgs = !empty($brand_imgs) ? array_merge($brand_imgs, $brand_imgs) : [];
$ticker_text = array_merge($fallback, $fallback);

$proc_steps = [
    ['01', '🎯', 'Strategy & Discovery',  'Deep-dive into brand soul, audience nuance, and cultural context. We study the landscape before a single frame is shot.',   '#C9A84C'],
    ['02', '🌐', 'Network & Matching',    'Match with ideal influencers, meme pages, and creators from our curated pool of 10,000+ accounts across every niche.',      '#E8836A'],
    ['03', '🚀', 'Execute & Launch',      'Precision campaigns with real-time monitoring, creative iteration, and A/B optimisation for maximum cultural resonance.',    '#8B5DA0'],
    ['04', '📈', 'Scale & Compound',      'Analyse, optimise, double down on winners. Compound the momentum until your brand becomes the conversation.',               '#3ABFB8'],
];
?>

<style>
/* ══ TOKENS ══════════════════════════════════════════════ */
:root {
    --gold: #C9A84C;
    --rose: #E8836A;
    --plum: #8B5DA0;
    --teal: #3ABFB8;
    --sage: #6BAF8D;
    --noir: #060608;
    --ink: #0D0D12;
    --card: #121218;
    --ivory: #F0EBE1;
    --silver: #B0AC9F;
    --smoke: #5E5B68;
    --border: #1C1C24;
    --fd: 'Cormorant Garamond', Georgia, serif;
    --fb: 'DM Sans', system-ui, sans-serif;
}

/* ══ GLOBAL SCROLL-REVEAL ════════════════════════════════ */
.r {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity .9s cubic-bezier(.16, 1, .3, 1), transform .9s cubic-bezier(.16, 1, .3, 1);
}

.rl {
    opacity: 0;
    transform: translateX(-40px);
    transition: opacity .9s cubic-bezier(.16, 1, .3, 1), transform .9s cubic-bezier(.16, 1, .3, 1);
}

.rr {
    opacity: 0;
    transform: translateX(40px);
    transition: opacity .9s cubic-bezier(.16, 1, .3, 1), transform .9s cubic-bezier(.16, 1, .3, 1);
}

.rs {
    opacity: 0;
    transform: scale(.95);
    transition: opacity .9s cubic-bezier(.16, 1, .3, 1), transform .9s cubic-bezier(.16, 1, .3, 1);
}

.in {
    opacity: 1 !important;
    transform: none !important;
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

.d5 {
    transition-delay: .40s !important
}

.d6 {
    transition-delay: .48s !important
}

/* ══ TYPOGRAPHY ══════════════════════════════════════════ */
.disp {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    letter-spacing: -.025em;
    line-height: .86;
    color: var(--ivory);
}

.tag-line {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .32em;
    text-transform: uppercase;
}

.tag-line::before {
    content: '';
    width: 28px;
    height: 1px;
    background: currentColor;
    flex-shrink: 0;
}

.g-gold {
    background: linear-gradient(135deg, var(--gold), var(--rose));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.g-plum {
    background: linear-gradient(135deg, var(--plum), var(--teal));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.g-teal {
    background: linear-gradient(135deg, var(--teal), var(--sage));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* ══ LAYOUT ══════════════════════════════════════════════ */
.sec {
    padding: 100px 72px;
    position: relative;
    z-index: 1;
}

.sec-ink {
    background: var(--ink);
}

.sec-card {
    background: var(--card);
}

.sec-noir {
    background: var(--noir);
}

.max {
    max-width: 1440px;
    margin: 0 auto;
}

@media(max-width:1100px) {
    .sec {
        padding: 80px 40px;
    }
}

@media(max-width:768px) {
    .sec {
        padding: 60px 24px;
    }
}

@media(max-width:480px) {
    .sec {
        padding: 48px 16px;
    }
}

/* ══ BUTTONS ═════════════════════════════════════════════ */
.btn-film {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: var(--fd);
    font-style: italic;
    font-size: 17px;
    letter-spacing: .04em;
    padding: 15px 36px;
    border-radius: 2px;
    text-decoration: none;
    transition: transform .25s, box-shadow .25s;
    white-space: nowrap;
}

.btn-pf {
    background: linear-gradient(135deg, var(--gold), var(--rose));
    color: #060608;
}

.btn-pf:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 40px rgba(201, 168, 76, .35);
}

.btn-gf {
    border: 1px solid rgba(240, 235, 225, .15);
    color: var(--ivory);
}

.btn-gf:hover {
    border-color: var(--gold);
    color: var(--gold);
}

/* ════════════════════════════════════════════════════════
   §1 HERO — full redesign of right column
════════════════════════════════════════════════════════ */
#hero {
    min-height: 100vh;
    display: grid;
    grid-template-rows: 1fr auto;
    background: var(--noir);
    position: relative;
    overflow: hidden;
}

/* Noise grain */
#hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    opacity: .022;
    pointer-events: none;
    z-index: 0;
}

.hero-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    padding: 130px 72px 60px 72px;
    gap: 72px;
    position: relative;
    z-index: 1;
}

/* ── Hero left ── */
.hero-eyebrow {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 32px;
    opacity: 0;
    animation: hup .7s cubic-bezier(.16, 1, .3, 1) .3s forwards;
}

.hero-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: var(--gold);
    animation: dot-pulse 2.4s ease-in-out infinite;
}

@keyframes dot-pulse {

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

.hero-eye-txt {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .32em;
    text-transform: uppercase;
    color: var(--gold);
}

.hero-h1 {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(60px, 9vw, 140px);
    line-height: .84;
    letter-spacing: -.035em;
    color: var(--ivory);
    margin-bottom: 32px;
    opacity: 0;
    animation: hup 1.1s cubic-bezier(.16, 1, .3, 1) .5s forwards;
}

.hero-h1 .accent {
    color: var(--gold);
}

.hero-sub {
    font-size: clamp(14px, 1.5vw, 17px);
    font-weight: 300;
    color: var(--silver);
    line-height: 1.88;
    max-width: 420px;
    margin-bottom: 44px;
    opacity: 0;
    animation: hup .8s cubic-bezier(.16, 1, .3, 1) .9s forwards;
}

.hero-btns {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    opacity: 0;
    animation: hup .7s cubic-bezier(.16, 1, .3, 1) 1.1s forwards;
}

@keyframes hup {
    from {
        opacity: 0;
        transform: translateY(28px)
    }

    to {
        opacity: 1;
        transform: none
    }
}

@keyframes hfade {
    from {
        opacity: 0
    }

    to {
        opacity: 1
    }
}

/* ── Hero right — CINEMATIC VISUAL PANEL ── */
.hero-visual {
    position: relative;
    height: 520px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-radius: 12px;
    background: radial-gradient(ellipse 70% 70% at 50% 50%, rgba(201, 168, 76, .04) 0%, transparent 70%);
    opacity: 0;
    animation: hfade 1.4s ease .8s forwards;
}

/* Rotating outer ring */
.hero-ring {
    position: absolute;
    width: 460px;
    height: 460px;
    border-radius: 50%;
    border: 1px solid rgba(201, 168, 76, .12);
    animation: spin-slow 28s linear infinite;
}

.hero-ring-2 {
    position: absolute;
    width: 370px;
    height: 370px;
    border-radius: 50%;
    border: 1px solid rgba(232, 131, 106, .08);
    animation: spin-slow 18s linear infinite reverse;
}

@keyframes spin-slow {
    to {
        transform: rotate(360deg);
    }
}

/* Tick marks on ring */
.hero-ring::before,
.hero-ring::after {
    content: '';
    position: absolute;
    width: 10px;
    height: 2px;
    background: var(--gold);
    top: 50%;
    left: -5px;
    transform: translateY(-50%);
    border-radius: 1px;
}

.hero-ring::after {
    left: auto;
    right: -5px;
    background: var(--rose);
}

/* Central stat disc */
.hero-disc {
    position: relative;
    z-index: 3;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: radial-gradient(circle at 40% 35%, #1e1a12 0%, #0a0a0e 100%);
    border: 1px solid rgba(201, 168, 76, .2);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 80px rgba(201, 168, 76, .12), inset 0 1px 0 rgba(201, 168, 76, .15);
    text-align: center;
}

.disc-num {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    font-size: 72px;
    line-height: 1;
    letter-spacing: -.04em;
    color: var(--gold);
}

.disc-label {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--smoke);
    margin-top: 6px;
}

/* Floating stat cards around disc */
.hero-float {
    position: absolute;
    background: rgba(18, 18, 24, .95);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 14px 20px;
    backdrop-filter: blur(20px);
    z-index: 4;
    transition: transform .3s ease;
}

.hero-float:hover {
    transform: translateY(-4px) !important;
}

.hf-n {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    font-size: 32px;
    line-height: 1;
    letter-spacing: -.03em;
}

.hf-l {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--smoke);
    margin-top: 4px;
}

.hf-1 {
    top: 14%;
    left: 0;
    animation: float-a 6s ease-in-out infinite;
}

.hf-2 {
    bottom: 18%;
    right: 0;
    animation: float-b 7s ease-in-out infinite;
}

.hf-3 {
    top: 48%;
    right: 6%;
    transform: translateY(-50%);
    animation: float-c 5s ease-in-out infinite;
}

@keyframes float-a {

    0%,
    100% {
        transform: translateY(0)
    }

    50% {
        transform: translateY(-10px)
    }
}

@keyframes float-b {

    0%,
    100% {
        transform: translateY(0)
    }

    50% {
        transform: translateY(8px)
    }
}

@keyframes float-c {

    0%,
    100% {
        transform: translateY(-50%)
    }

    50% {
        transform: translateY(calc(-50% - 7px))
    }
}

/* Film strip sides */
.hero-strip {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 28px;
    display: flex;
    flex-direction: column;
    gap: 6px;
    padding: 8px 0;
    z-index: 2;
}

.hero-strip-l {
    left: 0;
}

.hero-strip-r {
    right: 0;
}

.strip-hole {
    width: 16px;
    height: 10px;
    border-radius: 2px;
    background: rgba(201, 168, 76, .08);
    border: 1px solid rgba(201, 168, 76, .12);
    margin: 0 auto;
    flex-shrink: 0;
    animation: hole-blink 4s ease-in-out infinite;
}

.strip-hole:nth-child(2n) {
    animation-delay: 1s;
}

.strip-hole:nth-child(3n) {
    animation-delay: 2s;
}

@keyframes hole-blink {

    0%,
    100% {
        opacity: .5
    }

    50% {
        opacity: 1
    }
}

/* Ambient glow behind disc */
.hero-glow {
    position: absolute;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(201, 168, 76, .14) 0%, transparent 70%);
    z-index: 1;
    animation: glow-pulse 4s ease-in-out infinite;
}

@keyframes glow-pulse {

    0%,
    100% {
        opacity: .6;
        transform: scale(1)
    }

    50% {
        opacity: 1;
        transform: scale(1.1)
    }
}

/* Hero stats strip */
.hero-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border-top: 1px solid var(--border);
    position: relative;
    z-index: 1;
    opacity: 0;
    animation: hup .7s ease 1.3s forwards;
}

.hero-stat {
    padding: 26px clamp(16px, 3.5vw, 56px);
    border-right: 1px solid var(--border);
    transition: background .3s;
}

.hero-stat:last-child {
    border-right: none;
}

.hero-stat:hover {
    background: rgba(201, 168, 76, .03);
}

.hs-n {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(28px, 3.5vw, 44px);
    line-height: 1;
    letter-spacing: -.03em;
}

.hs-l {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--smoke);
    margin-top: 6px;
}

/* Scroll hint */
.hero-scroll {
    position: absolute;
    bottom: 118px;
    left: 72px;
    display: flex;
    align-items: center;
    gap: 12px;
    opacity: 0;
    animation: hfade .6s ease 1.7s forwards;
    z-index: 2;
}

.scroll-line {
    width: 1px;
    height: 48px;
    background: linear-gradient(var(--gold), transparent);
    animation: lp 2.6s ease-in-out infinite;
}

@keyframes lp {

    0%,
    100% {
        opacity: .2
    }

    50% {
        opacity: 1
    }
}

.scroll-lbl {
    font-size: 8px;
    font-weight: 700;
    letter-spacing: .3em;
    text-transform: uppercase;
    color: rgba(240, 235, 225, .2);
    writing-mode: vertical-rl;
    transform: rotate(180deg);
}

/* ════════════════════════════════════════════════════════
   §2 BRAND TICKER
════════════════════════════════════════════════════════ */
.ticker-sec {
    background: var(--ink);
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    padding: 44px 0;
    overflow: hidden;
    position: relative;
    z-index: 1;
}

.ticker-lbl {
    text-align: center;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .32em;
    text-transform: uppercase;
    color: rgba(90, 87, 100, .45);
    margin-bottom: 28px;
}

.ticker-wrap {
    position: relative;
    overflow: hidden;
}

.ticker-wrap::before,
.ticker-wrap::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 100px;
    z-index: 2;
    pointer-events: none;
}

.ticker-wrap::before {
    left: 0;
    background: linear-gradient(90deg, var(--ink), transparent);
}

.ticker-wrap::after {
    right: 0;
    background: linear-gradient(-90deg, var(--ink), transparent);
}

.ticker-img {
    display: flex;
    align-items: center;
    width: max-content;
    animation: tick 44s linear infinite;
}

.ticker-img:hover {
    animation-play-state: paused;
}

.ticker-img img {
    height: 48px;
    width: auto;
    max-width: 140px;
    object-fit: contain;
    padding: 0 44px;
    flex-shrink: 0;
    opacity: .3;
    filter: grayscale(1);
    transition: opacity .4s, filter .4s, transform .4s;
    cursor: pointer;
}

.ticker-img img:hover {
    opacity: .85;
    filter: grayscale(0);
    transform: scale(1.18) translateY(-3px);
}

.ticker-txt {
    display: flex;
    align-items: center;
    white-space: nowrap;
    width: max-content;
    animation: tick 36s linear infinite;
}

.ticker-txt:hover {
    animation-play-state: paused;
}

.b-chip {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 7px 20px;
    margin: 0 5px;
    border: 1px solid rgba(255, 255, 255, .05);
    border-radius: 100px;
    font-size: 11px;
    font-weight: 500;
    color: rgba(240, 235, 225, .25);
    transition: all .3s;
    letter-spacing: .06em;
}

.b-chip:hover {
    border-color: rgba(201, 168, 76, .3);
    color: var(--gold);
}

.b-dot {
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: var(--gold);
    opacity: .4;
}

@keyframes tick {
    0% {
        transform: translateX(0)
    }

    100% {
        transform: translateX(-50%)
    }
}

/* ════════════════════════════════════════════════════════
   §3 WHO WE ARE — redesigned right column
════════════════════════════════════════════════════════ */
.about-wrap {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
}

/* Left — copy (unchanged structure, refined styling) */
.about-copy {}

.about-stat-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2px;
    margin-top: 48px;
    background: var(--border);
    border-radius: 4px;
    overflow: hidden;
}

.asg-cell {
    background: var(--card);
    padding: 24px 20px;
    transition: background .3s;
}

.asg-cell:hover {
    background: rgba(201, 168, 76, .04);
}

.asg-n {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(28px, 3.5vw, 44px);
    letter-spacing: -.03em;
    line-height: 1;
}

.asg-l {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--smoke);
    margin-top: 6px;
}

/* Right — layered visual composition */
.about-visual {
    position: relative;
    height: 560px;
    overflow: visible;
    margin-top: 36px;
    margin-bottom: 36px;
}

/* Main dark panel */
.av-main {
    position: absolute;
    inset: 0;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 12px;
    overflow: hidden;
}

/* Corner film-frame brackets */
.av-main::before,
.av-main::after {
    content: '';
    position: absolute;
    width: 40px;
    height: 40px;
    border-color: rgba(201, 168, 76, .35);
    border-style: solid;
}

.av-main::before {
    top: 20px;
    left: 20px;
    border-width: 1.5px 0 0 1.5px;
}

.av-main::after {
    bottom: 20px;
    right: 20px;
    border-width: 0 1.5px 1.5px 0;
}

/* Vertical scrolling client ticker inside right panel */
.av-vticker {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    width: 96px;
    border-left: 1px solid var(--border);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 16px 0;
}

.av-vticker::before,
.av-vticker::after {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    height: 60px;
    z-index: 2;
    pointer-events: none;
}

.av-vticker::before {
    top: 0;
    background: linear-gradient(var(--card), transparent);
}

.av-vticker::after {
    bottom: 0;
    background: linear-gradient(transparent, var(--card));
}

.vticker-track {
    display: flex;
    flex-direction: column;
    gap: 0;
    animation: vtick 24s linear infinite;
    width: 100%;
}

.vticker-track:hover {
    animation-play-state: paused;
}

@keyframes vtick {
    0% {
        transform: translateY(0)
    }

    100% {
        transform: translateY(-50%)
    }
}

.vticker-item {
    padding: 16px 12px;
    border-bottom: 1px solid rgba(255, 255, 255, .04);
    text-align: center;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .1em;
    color: rgba(240, 235, 225, .28);
    transition: color .3s;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    cursor: default;
}

.vticker-item:hover {
    color: var(--gold);
}

/* Central content inside av-main */
.av-content {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    right: 96px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 36px;
}

/* Large ghost year */
.av-year {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(80px, 12vw, 140px);
    line-height: 1;
    letter-spacing: -.06em;
    color: transparent;
    -webkit-text-stroke: 1px rgba(201, 168, 76, 1.09);
    pointer-events: none;
    user-select: none;
}

/* Quick facts list */
.av-facts {
    list-style: none;
}

.av-fact {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 13px 0;
    border-bottom: 1px solid rgba(255, 255, 255, .05);
    transition: background .2s, padding-left .2s;
    border-radius: 4px;
}

.av-fact:last-child {
    border-bottom: none;
}

.av-fact:hover {
    background: rgba(201, 168, 76, .04);
    padding-left: 8px;
}

.av-fact-icon {
    font-size: 18px;
    opacity: .6;
    flex-shrink: 0;
    transition: opacity .3s, transform .3s;
}

.av-fact:hover .av-fact-icon {
    opacity: 1;
    transform: scale(1.2) rotate(-6deg);
}

.av-fact-txt {
    font-size: 13px;
    font-weight: 400;
    color: var(--silver);
    letter-spacing: .03em;
}

/* Floating credibility badge */
.av-badge {
    position: absolute;
    top: -28px;
    right: 120px;
    background: linear-gradient(135deg, rgba(18, 18, 24, .98), rgba(12, 12, 18, .98));
    border: 1px solid rgba(201, 168, 76, .3);
    border-radius: 10px;
    padding: 18px 22px;
    z-index: 5;
    backdrop-filter: blur(16px);
    box-shadow: 0 16px 48px rgba(0, 0, 0, .5), 0 0 0 1px rgba(201, 168, 76, .1) inset;
    animation: badge-float 6s ease-in-out infinite;
}

@keyframes badge-float {

    0%,
    100% {
        transform: translateY(0)
    }

    50% {
        transform: translateY(-10px)
    }
}

.av-badge-pct {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    font-size: 44px;
    line-height: 1;
    letter-spacing: -.04em;
    color: var(--gold);
}

.av-badge-lbl {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--smoke);
    margin-top: 5px;
}

/* Second floating card */
.av-card2 {
    position: absolute;
    bottom: -24px;
    left: 24px;
    background: rgba(14, 14, 20, .96);
    border: 1px solid rgba(58, 191, 184, .25);
    border-radius: 8px;
    padding: 14px 18px;
    z-index: 5;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, .4);
    animation: badge-float 7s ease-in-out 1s infinite;
}

.av-card2-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--teal);
    animation: dot-pulse 2s ease-in-out infinite;
    flex-shrink: 0;
}

.av-card2-txt {
    font-size: 12px;
    font-weight: 600;
    color: var(--ivory);
    letter-spacing: .03em;
}

.av-card2-sub {
    font-size: 10px;
    color: var(--smoke);
    margin-top: 2px;
    letter-spacing: .06em;
}

/* ════════════════════════════════════════════════════════
   §4 SERVICES — BENTO CARD GRID
════════════════════════════════════════════════════════ */
.svc-outer {
    background: var(--noir);
    position: relative;
    z-index: 1;
}

.svc-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    padding: 80px 72px 56px;
    gap: 24px;
    flex-wrap: wrap;
    border-bottom: 1px solid var(--border);
}

.svc-bento {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2px;
    background: var(--border);
    /* bottom border already from last row */
}

.svc-card {
    position: relative;
    background: var(--card);
    padding: 40px 32px;
    overflow: hidden;
    cursor: default;
    transition: background .4s cubic-bezier(.16, 1, .3, 1), transform .4s cubic-bezier(.16, 1, .3, 1);
    display: flex;
    flex-direction: column;
    min-height: 300px;
}

/* Top accent line */
.svc-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--svc-c, var(--gold));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .45s cubic-bezier(.16, 1, .3, 1);
}

.svc-card:hover::before {
    transform: scaleX(1);
}

/* Shimmer sweep */
.svc-card::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(105deg, transparent 40%, rgba(255, 255, 255, .028) 50%, transparent 60%);
    transform: translateX(-100%);
    transition: transform .6s cubic-bezier(.16, 1, .3, 1);
}

.svc-card:hover::after {
    transform: translateX(100%);
}

.svc-card:hover {
    background: #16161e;
    box-shadow: 0 20px 56px rgba(0, 0, 0, .55), 0 0 0 1px rgba(255, 255, 255, .04) inset;
}

/* Ghost emoji backdrop */
.svc-bg-emoji {
    position: absolute;
    bottom: -12px;
    right: -8px;
    font-size: 88px;
    opacity: .06;
    pointer-events: none;
    user-select: none;
    transition: opacity .4s, transform .4s;
    line-height: 1;
}

.svc-card:hover .svc-bg-emoji {
    opacity: .12;
    transform: scale(1.08) rotate(-8deg);
}

/* Number */
.svc-n {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    font-size: 13px;
    letter-spacing: .04em;
    color: var(--svc-c, var(--gold));
    opacity: .5;
    margin-bottom: 20px;
    transition: opacity .3s;
}

.svc-card:hover .svc-n {
    opacity: 1;
}

/* Emoji icon */
.svc-icon {
    font-size: 34px;
    margin-bottom: 18px;
    display: inline-block;
    transition: transform .4s cubic-bezier(.16, 1, .3, 1);
}

.svc-card:hover .svc-icon {
    transform: scale(1.2) rotate(-6deg);
}

/* Title */
.svc-title {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(20px, 2vw, 27px);
    line-height: 1.1;
    letter-spacing: -.01em;
    color: var(--ivory);
    margin-bottom: 14px;
    transition: color .3s;
}

.svc-card:hover .svc-title {
    color: var(--svc-c, var(--gold));
}

/* Description — hidden until hover */
.svc-desc {
    font-size: 13px;
    color: var(--silver);
    line-height: 1.75;
    font-weight: 300;
    max-height: 0;
    overflow: hidden;
    transition: max-height .5s cubic-bezier(.16, 1, .3, 1), opacity .4s;
    opacity: 0;
}

.svc-card:hover .svc-desc {
    max-height: 200px;
    opacity: 1;
}

/* Tags */
.svc-pill-row {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: auto;
    padding-top: 20px;
}

.svc-pill {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 100px;
    border: 1px solid rgba(255, 255, 255, .07);
    color: rgba(240, 235, 225, .35);
    transition: border-color .3s, color .3s;
}

.svc-card:hover .svc-pill {
    border-color: var(--svc-c, var(--gold));
    color: var(--svc-c, var(--gold));
    opacity: .7;
}

/* Arrow CTA */
.svc-cta {
    position: absolute;
    bottom: 28px;
    right: 28px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, .08);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--smoke);
    font-size: 16px;
    transition: all .3s cubic-bezier(.16, 1, .3, 1);
    text-decoration: none;
}

.svc-card:hover .svc-cta {
    border-color: var(--svc-c, var(--gold));
    color: var(--svc-c, var(--gold));
    transform: translate(2px, -2px);
    background: rgba(201, 168, 76, .08);
}

/* ════════════════════════════════════════════════════════
   §5 CAMPAIGNS — magazine grid (unchanged)
════════════════════════════════════════════════════════ */
.camp-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 2px;
    background: var(--border);
}

.camp-card {
    background: var(--card);
    position: relative;
    overflow: hidden;
    text-decoration: none;
    display: block;
    transition: background .35s;
}

.camp-card:hover {
    background: #1a1a22;
}

.camp-card.featured {
    grid-column: span 8;
}

.camp-card.small {
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
    transition: transform .8s cubic-bezier(.16, 1, .3, 1), filter .8s;
    filter: brightness(.55) saturate(.8);
}

.camp-card:hover .camp-iw img {
    transform: scale(1.06);
    filter: brightness(.72) saturate(1);
}

.camp-card.featured .camp-iw {
    height: 400px;
}

.camp-card.small .camp-iw {
    height: 240px;
}

.camp-iw::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(6, 6, 8, .95) 0%, transparent 55%);
}

.camp-ph {
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #121218, #0a0a0e);
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

.camp-card.featured .camp-body {
    padding: 36px;
}

.camp-author {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--gold);
    opacity: .7;
    margin-bottom: 10px;
    display: block;
}

.camp-title {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(20px, 2.4vw, 32px);
    color: var(--ivory);
    line-height: 1.15;
    margin-bottom: 10px;
    transition: color .25s;
}

.camp-card.featured .camp-title {
    font-size: clamp(26px, 3.2vw, 44px);
}

.camp-card:hover .camp-title {
    color: var(--gold);
}

.camp-desc {
    font-size: 13px;
    color: var(--smoke);
    line-height: 1.65;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.camp-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 16px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: rgba(201, 168, 76, .35);
    transition: color .25s, gap .25s;
}

.camp-card:hover .camp-link {
    color: var(--gold);
    gap: 10px;
}

/* ════════════════════════════════════════════════════════
   §6 PROCESS (unchanged)
════════════════════════════════════════════════════════ */
.proc-list {
    list-style: none;
}

.proc-item {
    display: grid;
    grid-template-columns: 1fr 1px 1fr;
    min-height: 200px;
    border-bottom: 1px solid var(--border);
    transition: background .3s;
}

.proc-item:first-child {
    border-top: 1px solid var(--border);
}

.proc-item:hover {
    background: rgba(255, 255, 255, .01);
}

.proc-div {
    background: var(--border);
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
    font-size: 88px;
    font-weight: 300;
    font-style: italic;
    line-height: 1;
    letter-spacing: -.06em;
    color: rgba(255, 255, 255, .032);
    transition: color .5s;
    margin-bottom: -10px;
}

.proc-item:hover .proc-num {
    color: var(--proc-c, rgba(201, 168, 76, .1));
}

.proc-lbl {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .28em;
    text-transform: uppercase;
    color: var(--proc-c, var(--gold));
    opacity: .55;
    transition: opacity .3s;
    margin-bottom: 10px;
}

.proc-item:hover .proc-lbl {
    opacity: 1;
}

.proc-title {
    font-family: var(--fd);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(26px, 3.5vw, 48px);
    line-height: .92;
    letter-spacing: -.02em;
    color: rgba(240, 235, 225, .45);
    transition: color .5s;
}

.proc-item:hover .proc-title {
    color: var(--proc-c, var(--gold));
}

.proc-icon {
    font-size: 40px;
    margin-bottom: 14px;
    opacity: .5;
    transition: opacity .4s, transform .4s;
}

.proc-item:hover .proc-icon {
    opacity: 1;
    transform: scale(1.15) rotate(-5deg);
}

.proc-desc {
    font-size: 14px;
    color: var(--silver);
    line-height: 1.85;
    font-weight: 300;
    max-width: 440px;
}

/* ════════════════════════════════════════════════════════
   §7 CTA (unchanged)
════════════════════════════════════════════════════════ */
.cta-sec {
    position: relative;
    overflow: hidden;
    z-index: 1;
    padding: 120px 72px;
    background: var(--noir);
    text-align: center;
}

/* FIX #10 */
.cta-bg-t {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: var(--fd);
    font-size: clamp(100px, 18vw, 260px);
    font-style: italic;
    font-weight: 300;
    letter-spacing: -.06em;
    line-height: 1;
    color: transparent;
    -webkit-text-stroke: 1px rgba(201, 168, 76, .05);
    white-space: nowrap;
    pointer-events: none;
    user-select: none;
}

.cta-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 800px;
    height: 400px;
    background: radial-gradient(ellipse, rgba(201, 168, 76, .08) 0%, transparent 65%);
    pointer-events: none;
}

.cta-grid {
    position: absolute;
    inset: 0;
    pointer-events: none;
    background-image: linear-gradient(rgba(201, 168, 76, .03) 1px, transparent 1px), linear-gradient(90deg, rgba(201, 168, 76, .03) 1px, transparent 1px);
    background-size: 72px 72px;
}

/* ════════════════════════════════════════════════════════
   RESPONSIVE
════════════════════════════════════════════════════════ */
@media(max-width:1200px) {
    .svc-bento {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width:1100px) {
    .hero-inner {
        grid-template-columns: 1fr;
        padding: 130px 40px 60px;
    }

    .hero-visual {
        height: 360px;
    }

    .hero-ring {
        width: 320px;
        height: 320px;
    }

    .hero-ring-2 {
        width: 260px;
        height: 260px;
    }

    .hero-disc {
        width: 170px;
        height: 170px;
    }

    .disc-num {
        font-size: 52px;
    }

    .hf-1,
    .hf-2,
    .hf-3 {
        display: none;
    }

    .hero-stats {
        grid-template-columns: repeat(2, 1fr);
    }

    .hero-stat {
        padding: 22px 40px;
    }

    .about-wrap {
        grid-template-columns: 1fr;
        gap: 48px;
    }

    .about-visual {
        height: 420px;
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

    .proc-l.stacked {
        border-bottom: 1px solid var(--border);
        padding-bottom: 0;
    }

    .camp-card.featured {
        grid-column: span 12;
    }

    .camp-card.small {
        grid-column: span 6;
    }

    .svc-header {
        padding: 60px 40px 40px;
    }
}

@media(max-width:900px) {
    .svc-bento {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width:768px) {
    .hero-inner {
        padding: 110px 24px 60px;
    }

    .hero-visual {
        height: 280px;
    }

    .hero-ring {
        width: 240px;
        height: 240px;
    }

    .hero-ring-2 {
        width: 190px;
        height: 190px;
    }

    .hero-disc {
        width: 130px;
        height: 130px;
    }

    .disc-num {
        font-size: 40px;
    }

    .hero-stats {
        grid-template-columns: repeat(2, 1fr);
    }

    .hero-stat {
        padding: 18px 24px;
    }

    .hero-scroll {
        display: none;
    }

    .about-visual {
        height: 360px;
    }

    .av-vticker {
        width: 72px;
    }

    .av-badge {
        right: 90px;
    }

    .camp-card.small {
        grid-column: span 12;
    }

    .camp-card.featured .camp-iw {
        height: 260px;
    }

    .svc-header {
        padding: 48px 24px 32px;
    }

    .proc-l,
    .proc-r {
        padding: 28px 24px;
    }

    .cta-sec {
        padding: 72px 24px;
    }
}

@media(max-width:600px) {
    .svc-bento {
        grid-template-columns: 1fr;
    }

    .svc-card {
        min-height: 240px;
    }

    .svc-desc {
        max-height: 200px !important;
        opacity: 1 !important;
    }

    .hero-btns {
        flex-direction: column;
    }

    .btn-film {
        justify-content: center;
    }
}

@media(max-width:480px) {
    .about-stat-grid {
        grid-template-columns: 1fr 1fr;
    }

    .hero-stats {
        grid-template-columns: 1fr 1fr;
    }
}
</style>

<!-- ══════════════════════════════════════════════
     §1  HERO
══════════════════════════════════════════════════ -->
<section id="hero" aria-labelledby="hero-h1">

    <div class="hero-inner">

        <!-- LEFT: copy -->
        <div>
            <div class="hero-eyebrow" aria-label="India's Premier Cinema Marketing Studio">
                <div class="hero-dot" aria-hidden="true"></div>
                <span class="hero-eye-txt">India's Premier Cinema Marketing Studio</span>
            </div>

            <h1 class="hero-h1" id="hero-h1">
                Where<br>Cinema<br>Meets&nbsp;<span class="accent">Culture</span>
            </h1>

            <p class="hero-sub">
                <?= htmlspecialchars($settings['hero_subtext'] ?? 'A refined studio crafting authentic influencer campaigns, viral content, and cinematic promotions that move audiences.') ?>
            </p>

            <div class="hero-btns">
                <a href="#cc-campaigns" class="btn-film btn-pf">Explore Our Work</a>
                <a href="<?= base_url('contact') ?>" class="btn-film btn-gf">Reserve a Table →</a>
            </div>
        </div>

        <!-- RIGHT: cinematic visual panel -->
        <div class="hero-visual" aria-hidden="true">
            <div class="hero-glow"></div>
            <div class="hero-ring"></div>
            <div class="hero-ring-2"></div>

            <!-- Film strips -->
            <div class="hero-strip hero-strip-l">
                <?php for ($i = 0; $i < 18; $i++): ?><div class="strip-hole"></div><?php endfor; ?>
            </div>
            <div class="hero-strip hero-strip-r">
                <?php for ($i = 0; $i < 18; $i++): ?><div class="strip-hole"></div><?php endfor; ?>
            </div>

            <!-- Central stat disc -->
            <div class="hero-disc">
                <div class="disc-num" data-target="32" data-suffix="%">0%</div>
                <div class="disc-label">OTT Releases</div>
            </div>

            <!-- Floating cards -->
            <div class="hero-float hf-1">
                <div class="hf-n" style="color:var(--gold);" data-target="300" data-suffix="+">0+</div>
                <div class="hf-l">Campaigns</div>
            </div>
            <div class="hero-float hf-2">
                <div class="hf-n" style="color:var(--teal);" data-target="12" data-suffix="M+">0M+</div>
                <div class="hf-l">People Reached</div>
            </div>
            <div class="hero-float hf-3">
                <div class="hf-n" style="color:var(--rose);" data-target="70" data-suffix="+">0+</div>
                <div class="hf-l">Screenings</div>
            </div>
        </div>
    </div>

    <!-- Bottom stats strip -->
    <div class="hero-stats" aria-label="Key metrics">
        <?php $hs = [
            [$settings['stat_campaigns'] ?? '300+', 'Campaigns', '--gold'],
            ['32%', 'OTT Releases', '--rose'],
            [$settings['stat_reach'] ?? '12M+', 'People Reached', '--plum'],
            [$settings['stat_movies'] ?? '150+', 'Films', '--teal'],
        ];
        foreach ($hs as $h): ?>
        <div class="hero-stat">
            <div class="hs-n" style="color:var(<?= $h[2] ?>)"><?= htmlspecialchars($h[0]) ?></div>
            <div class="hs-l"><?= $h[1] ?></div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- <div class="hero-scroll" aria-hidden="true">
        <div class="scroll-line"></div>
        <span class="scroll-lbl">Scroll</span>
    </div> -->
</section>

<!-- ══════════════════════════════════════════════
     §2  BRAND TICKER
══════════════════════════════════════════════════ -->
<section class="ticker-sec" aria-label="Brand partners">
    <div class="ticker-lbl">Trusted by India's Finest</div>
    <?php if (!empty($ticker_imgs)): ?>
    <div class="ticker-wrap">
        <div class="ticker-img">
            <?php foreach ($ticker_imgs as $img): ?><img src="<?= htmlspecialchars($img) ?>" alt="Brand partner"
                loading="lazy"><?php endforeach; ?>
        </div>
    </div>
    <?php else: ?>
    <div class="ticker-wrap">
        <div class="ticker-txt">
            <?php foreach ($ticker_text as $b): ?><span class="b-chip"><span class="b-dot"
                    aria-hidden="true"></span><?= htmlspecialchars($b) ?></span><?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</section>

<!-- ══════════════════════════════════════════════
     §3  WHO WE ARE
══════════════════════════════════════════════════ -->
<section class="sec sec-ink" aria-labelledby="about-h">
    <div class="max">
        <p class="tag-line r" style="color:var(--gold);margin-bottom:56px;">Who We Are</p>

        <div class="about-wrap">
            <!-- Left: copy -->
            <div class="about-copy">
                <h2 id="about-h" class="disp r" style="font-size:clamp(52px,8vw,100px);margin-bottom:28px;">
                    Crafting<br><span class="g-gold">Cinematic</span><br>Impact
                </h2>
                <p class="r d1"
                    style="font-size:clamp(14px,1.5vw,16px);color:var(--silver);line-height:1.92;max-width:440px;font-weight:300;margin-bottom:36px;">
                    <?= htmlspecialchars($settings['about_text'] ?? 'The Cine Caffe is a premium cinema marketing studio driving high-impact campaigns for brands and production houses across entertainment, culture, and commerce.') ?>
                </p>
                <a href="<?= base_url('about') ?>" class="btn-film btn-gf r d2"
                    style="display:inline-flex;margin-bottom:0;">Our Story →</a>

                <div class="about-stat-grid r d3">
                    <?php $stat_blocks = [
                        [$settings['stat_campaigns'] ?? '300+', 'Campaigns', '--gold'],
                        ['32%', 'OTT Releases', '--rose'],
                        [$settings['stat_reach'] ?? '12M+', 'Reached', '--plum'],
                        [$settings['stat_screenings'] ?? '70+', 'Screenings', '--teal'],
                    ];
                    foreach ($stat_blocks as $sb): ?>
                    <div class="asg-cell">
                        <div class="asg-n" style="color:var(<?= $sb[2] ?>)"><?= htmlspecialchars($sb[0]) ?></div>
                        <div class="asg-l"><?= $sb[1] ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Right: layered visual -->
            <div class="about-visual rr d1">
                <!-- Floating badge -->
                <div class="av-badge" aria-hidden="true">
                    <div class="av-badge-pct">32%</div>
                    <div class="av-badge-lbl">Of All OTT Releases</div>
                </div>

                <!-- Main panel -->
                <div class="av-main">
                    <!-- Vertical client ticker -->
                    <div class="av-vticker" aria-hidden="true">
                        <?php
                        $clients = ['Netflix', 'Amazon', 'Disney+', 'Dharma', 'YRF', 'Sony', 'T-Series', 'Warner', 'Zee5', 'Jio', 'Maddock', 'boAt', 'Myntra', 'OnePlus', 'Fastrack'];
                        $vt = array_merge($clients, $clients); // duplicate for seamless loop
                        ?>
                        <div class="vticker-track">
                            <?php foreach ($vt as $c): ?>
                            <div class="vticker-item"><?= htmlspecialchars($c) ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Content area -->
                    <div class="av-content">
                        <div class="av-year" aria-hidden="true"><?= date('Y') ?></div>

                        <ul class="av-facts">
                            <?php $facts = [
                                ['🎬', 'End-to-End Campaign Management'],
                                ['🌐', '10,000+ Creator Network'],
                                ['📍', 'Pan-India Coverage'],
                                ['⚡', '24–48h Response Time'],
                                ['🏆', '300+ Successful Campaigns'],
                            ];
                            foreach ($facts as $f): ?>
                            <li class="av-fact">
                                <span class="av-fact-icon" aria-hidden="true"><?= $f[0] ?></span>
                                <span class="av-fact-txt"><?= $f[1] ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Second floating card -->
                <div class="av-card2" aria-hidden="true">
                    <div class="av-card2-dot"></div>
                    <div>
                        <div class="av-card2-txt">Live Campaigns</div>
                        <div class="av-card2-sub">India's Trusted Studio</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════
     §4  SERVICES — bento card grid
══════════════════════════════════════════════════ -->
<section class="svc-outer" id="cc-services" aria-labelledby="svc-h">
    <div class="svc-header">
        <div class="r">
            <p class="tag-line" style="color:var(--rose);margin-bottom:16px;">What We Do</p>
            <h2 id="svc-h" class="disp" style="font-size:clamp(44px,7vw,96px);">
                Our <span class="g-gold">Services</span>
            </h2>
        </div>
        <a href="<?= base_url('contact') ?>" class="btn-film btn-gf r">Work With Us</a>
    </div>

    <div class="svc-bento" role="list">
        <?php foreach ($svcs as $i => $sv): ?>
        <article class="svc-card r d<?= (($i % 4) + 1) ?>" style="--svc-c:<?= $sv[1] ?>;" role="listitem">
            <div class="svc-bg-emoji" aria-hidden="true"><?= $sv[3] ?></div>

            <div class="svc-n"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></div>
            <div class="svc-icon" aria-hidden="true"><?= $sv[3] ?></div>
            <h3 class="svc-title"><?= htmlspecialchars($sv[2]) ?></h3>
            <p class="svc-desc"><?= htmlspecialchars($sv[4]) ?></p>

            <div class="svc-pill-row" aria-label="Tags">
                <?php foreach ($sv[5] as $tag): ?>
                <span class="svc-pill"><?= htmlspecialchars($tag) ?></span>
                <?php endforeach; ?>
            </div>

            <a href="<?= base_url('contact') ?>" class="svc-cta"
                aria-label="Start <?= htmlspecialchars($sv[2]) ?>">›</a>
        </article>
        <?php endforeach; ?>
    </div>
</section>

<!-- ══════════════════════════════════════════════
     §5  CAMPAIGNS
══════════════════════════════════════════════════ -->
<?php if (!empty($posts)): ?>
<section class="sec sec-card" id="cc-campaigns" aria-labelledby="camp-h">
    <div class="max">
        <div
            style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:48px;flex-wrap:wrap;gap:20px;">
            <div class="rl">
                <p class="tag-line" style="color:var(--plum);margin-bottom:16px;">Case Studies</p>
                <h2 id="camp-h" class="disp" style="font-size:clamp(44px,7vw,96px);">
                    Signature <span class="g-plum">Campaigns</span>
                </h2>
            </div>
            <a href="<?= base_url('work') ?>" class="btn-film btn-gf rr">View All Work →</a>
        </div>

        <div class="camp-grid rs">
            <?php foreach ($posts as $i => $p):
                    $feat = ($i === 0);
                    $cls  = $feat ? 'featured' : 'small';
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
                    <div class="camp-link">View Campaign <span>→</span></div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ══════════════════════════════════════════════
     §6  PROCESS
══════════════════════════════════════════════════ -->
<section class="sec sec-noir" id="cc-process" aria-labelledby="proc-h">
    <div class="max">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:end;margin-bottom:60px;" class="r">
            <div>
                <p class="tag-line" style="color:var(--teal);margin-bottom:16px;">How We Work</p>
                <h2 id="proc-h" class="disp" style="font-size:clamp(44px,7vw,96px);">
                    Our <span class="g-teal">Process</span>
                </h2>
            </div>
            <p class="r d2"
                style="font-size:15px;color:var(--silver);line-height:1.82;font-weight:300;max-width:400px;padding-bottom:8px;">
                A refined four-act framework that transforms brands into cultural icons.
            </p>
        </div>

        <ul class="proc-list" role="list">
            <?php foreach ($proc_steps as $i => $ps): ?>
            <li class="proc-item r" style="--proc-c:<?= $ps[4] ?>;" role="listitem">
                <div class="proc-l">
                    <div class="proc-num" aria-hidden="true"><?= $ps[0] ?></div>
                    <div class="proc-lbl"><?= $ps[0] ?> — <?= $ps[2] ?></div>
                    <h3 class="proc-title"><?= $ps[2] ?></h3>
                </div>
                <div class="proc-div" aria-hidden="true"></div>
                <div class="proc-r">
                    <div class="proc-icon" aria-hidden="true"><?= $ps[1] ?></div>
                    <p class="proc-desc"><?= $ps[3] ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>

        <div style="margin-top:56px;display:flex;justify-content:center;" class="r">
            <a href="<?= base_url('contact') ?>" class="btn-film btn-pf" style="font-size:18px;padding:18px 48px;">
                Start Your Campaign →
            </a>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════
     §7  CTA
══════════════════════════════════════════════════ -->
<section class="cta-sec" aria-label="Call to action">
    <div class="cta-glow" aria-hidden="true"></div>
    <div class="cta-grid" aria-hidden="true"></div>
    <div class="cta-bg-t" aria-hidden="true">Extraordinary</div>

    <div style="position:relative;z-index:2;max-width:900px;margin:0 auto;">
        <p class="tag-line r" style="color:var(--sage);justify-content:center;margin:0 auto 28px;">Ready to Begin?</p>
        <h2 class="disp r d1" style="font-size:clamp(52px,9vw,128px);text-align:center;margin-bottom:44px;">
            Let's Create Something<br><span class="g-gold">Extraordinary</span>
        </h2>
        <div style="display:flex;justify-content:center;gap:16px;flex-wrap:wrap;" class="r d2">
            <a href="<?= base_url('contact') ?>" class="btn-film btn-pf" style="font-size:18px;padding:18px 48px;">Start
                a Campaign</a>
            <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'contact@thecinecaffe.com') ?>"
                class="btn-film btn-gf" style="font-size:18px;padding:17px 44px;">Email Us</a>
        </div>
        <p class="r d3"
            style="margin-top:32px;font-size:12px;color:var(--smoke);letter-spacing:.1em;text-align:center;">
            <?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?>
            &nbsp;&middot;&nbsp;
            <?= htmlspecialchars($settings['site_email'] ?? 'contact@thecinecaffe.com') ?>
        </p>
    </div>
</section>

<!-- ══════════════════════════════════════════════
     JS
══════════════════════════════════════════════════ -->
<script>
(function() {
    'use strict';

    /* ── Scroll reveal ─────────────────────────── */
    var els = document.querySelectorAll('.r,.rl,.rr,.rs');
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
            rootMargin: '0px 0px -32px 0px'
        });
        els.forEach(function(el) {
            io.observe(el);
        });
    } else {
        els.forEach(function(el) {
            el.classList.add('in');
        });
    }

    /* ── Counter animation ─────────────────────── */
    function runCounter(el) {
        var target = parseFloat(el.dataset.target) || 0;
        var suffix = el.dataset.suffix || '';
        var dur = 1800,
            step = 16,
            current = 0,
            inc = target / (dur / step);
        var t = setInterval(function() {
            current += inc;
            if (current >= target) {
                current = target;
                clearInterval(t);
            }
            el.textContent = Math.floor(current) + suffix;
        }, step);
    }
    var counterObs = new IntersectionObserver(function(entries) {
        entries.forEach(function(e) {
            if (e.isIntersecting) {
                runCounter(e.target);
                counterObs.unobserve(e.target);
            }
        });
    }, {
        threshold: .5
    });
    document.querySelectorAll('[data-target]').forEach(function(el) {
        counterObs.observe(el);
    });

    /* ── Hero parallax tilt (desktop only) ────── */
    var poster = document.querySelector('.hero-visual');
    if (poster && window.innerWidth > 1100) {
        document.addEventListener('mousemove', function(e) {
            var x = (e.clientX / window.innerWidth - .5) * 10;
            var y = (e.clientY / window.innerHeight - .5) * 6;
            poster.style.transform = 'perspective(800px) rotateY(' + x + 'deg) rotateX(' + (-y) + 'deg)';
        }, {
            passive: true
        });
    }

    /* ── Campaign grid responsive ──────────────── */
    function fixCamp() {
        var f = document.querySelector('.camp-card.featured');
        var smalls = document.querySelectorAll('.camp-card.small');
        if (!f) return;
        var w = window.innerWidth;
        f.style.gridColumn = w <= 1100 ? 'span 12' : 'span 8';
        smalls.forEach(function(c) {
            c.style.gridColumn = w <= 768 ? 'span 12' : w <= 1100 ? 'span 6' : 'span 4';
        });
    }
    fixCamp();
    window.addEventListener('resize', fixCamp, {
        passive: true
    });

    /* ── Process grid responsive ───────────────── */
    function fixProc() {
        document.querySelectorAll('.proc-item').forEach(function(el) {
            el.style.gridTemplateColumns = window.innerWidth <= 1100 ? '1fr' : '1fr 1px 1fr';
        });
    }
    fixProc();
    window.addEventListener('resize', fixProc, {
        passive: true
    });

}());
</script>