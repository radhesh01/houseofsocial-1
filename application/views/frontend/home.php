<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
$svcs = [
    ['01', '08', 'Influencer Marketing', '#C9A84C', '🤳', 'Precision-matched creator partnerships — nano to celebrity — that feel authentic and perform powerfully.', ['300+ campaigns', '12M+ reach', 'All platforms']],
    ['02', '08', 'Meme Marketing', '#E8836A', '😂', 'Culturally embedded viral content. Memes that spread because they belong, not because they were placed.', ['Trend-first', '10x organic reach', 'Format-native']],
    ['03', '08', 'Film Promotions', '#8B5DA0', '🎬', 'End-to-end cinematic promotion strategy. We power the buzz that fills seats and drives streams.', ['32% of OTT releases', 'Teaser to release', 'Bollywood + Hollywood']],
    ['04', '08', 'Video Production', '#3ABFB8', '🎥', 'Concept, craft, deliver. Brand films to web series — OTT-grade quality at studio speed.', ['Concept to final cut', 'OTT-grade', 'Fast turnaround']],
    ['05', '08', 'Film Screenings', '#6BAF8D', '🍿', 'Curated influencer screening events that generate authentic pre-release buzz at scale.', ['70+ screenings', 'Tier 1 & 2 cities', 'Press + creators']],
    ['06', '08', 'On-Ground Activations', '#C9A84C', '🎪', 'Real-world brand moments bridging digital reach with physical memory. Pop-ups, events, meet-and-greets.', ['Pan-India', 'Brand activations', 'Celebrity tie-ins']],
    ['07', '08', 'LinkedIn & X Strategy', '#E8836A', '💼', 'Platform-native campaigns building authority for studios, OTT brands, and their executive voices.', ['Thought leadership', 'Viral threads', 'B2B + B2C']],
    ['08', '08', 'Celebrity Endorsements', '#8B5DA0', '⭐', 'Curated star partnerships that amplify brand credibility and unlock millions of loyal followers.', ['Verified partnerships', 'Contract negotiation', 'ROI focused']],
];

$holes = array_fill(0, 20, 1);

$brand_dir  = FCPATH . 'assets/brand/';
$brand_url  = base_url('assets/brand/');
$brand_imgs = [];
if (is_dir($brand_dir)) {
    $exts = ['png', 'jpg', 'jpeg', 'webp', 'svg', 'gif', 'PNG', 'JPG', 'JPEG', 'WEBP', 'SVG', 'GIF'];
    foreach ($exts as $ext) {
        foreach (glob($brand_dir . '*.' . $ext) as $f) {
            $brand_imgs[] =  $brand_url . basename($f);
        }
    }
    $brand_imgs = array_unique($brand_imgs);
}
$ticker_imgs = !empty($brand_imgs) ? array_merge($brand_imgs, $brand_imgs) : [];
$fallback = ["boAt", "Fastrack", "Masters' Union", "Myntra", "OnePlus", "Netflix", "Amazon Prime", "Disney+", "Dharma", "YRF", "Sony", "T-Series", "Warner Bros", "Zee5", "Jio Cinema", "Maddock Films"];
$ticker_text = array_merge($fallback, $fallback);
?>

<style>
/* ════════════════════════════════════════════════════
   THE CINE CAFE — HOME PAGE
════════════════════════════════════════════════════ */

/* ── HERO ──────────────────────────────────────── */
.cc-hero {
    position: relative;
    z-index: 1;
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 110px 60px 80px;
    overflow: hidden;
}

.cc-hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: .32em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 28px;
    opacity: 0;
    animation: h-up .6s ease .3s forwards;
}

.cc-hero-eyebrow::before {
    content: '';
    width: 28px;
    height: 1px;
    background: var(--gold);
}

.h-h1 {
    font-family: var(--font-d);
    font-size: clamp(54px, 10vw, 132px);
    font-weight: 300;
    font-style: italic;
    line-height: .88;
    letter-spacing: -.02em;
    color: var(--ivory);
    margin-bottom: 30px;
    opacity: 0;
    animation: h-up 1s cubic-bezier(.16, 1, .3, 1) .5s forwards;
}

.h-h1 em {
    font-style: normal;
    color: var(--gold);
}

.h-sub {
    font-size: clamp(14px, 1.8vw, 17px);
    font-weight: 300;
    color: var(--smoke);
    max-width: 420px;
    line-height: 1.82;
    margin-bottom: 44px;
    opacity: 0;
    animation: h-up .7s ease .85s forwards;
    letter-spacing: .01em;
}

.h-btns {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    opacity: 0;
    animation: h-up .6s ease 1.05s forwards;
}

.cc-btn-gold {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: var(--font-d);
    font-size: 15px;
    font-weight: 600;
    letter-spacing: .08em;
    padding: 14px 32px;
    border-radius: var(--radius);
    background: var(--gold);
    color: var(--noir);
    text-decoration: none;
    transition: transform .2s, box-shadow .2s;
}

.cc-btn-gold:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 36px rgba(201, 168, 76, .3);
}

.cc-btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: var(--font-d);
    font-size: 15px;
    font-weight: 600;
    letter-spacing: .08em;
    padding: 13px 30px;
    border-radius: var(--radius);
    border: 1px solid rgba(245, 240, 232, .18);
    color: var(--ivory);
    text-decoration: none;
    transition: all .25s;
}

.cc-btn-ghost:hover {
    border-color: var(--gold);
    color: var(--gold);
}

.h-stats {
    margin-top: 56px;
    padding-top: 32px;
    border-top: 1px solid rgba(245, 240, 232, .07);
    display: flex;
    flex-wrap: wrap;
    gap: 44px;
    opacity: 0;
    animation: h-up .6s ease 1.2s forwards;
}

.h-sn {
    font-family: var(--font-d);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(32px, 4vw, 50px);
    line-height: 1;
    letter-spacing: -.02em;
}

.h-sl {
    font-size: 9px;
    font-weight: 600;
    letter-spacing: .24em;
    text-transform: uppercase;
    color: var(--smoke);
    margin-top: 6px;
}

@keyframes h-up {
    from {
        opacity: 0;
        transform: translateY(32px)
    }

    to {
        opacity: 1;
        transform: none
    }
}

/* decorative lines */
.cc-hero-rule {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 1px;
    background: linear-gradient(to bottom, transparent, rgba(201, 168, 76, .15), transparent);
    pointer-events: none;
}

/* scroll hint */
.h-scroll-hint {
    position: absolute;
    bottom: 32px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    opacity: 0;
    animation: h-up .5s ease 1.7s forwards;
}

.h-scroll-line {
    width: 1px;
    height: 52px;
    background: linear-gradient(var(--gold), transparent);
    animation: line-pulse 2.4s ease-in-out infinite;
}

@keyframes line-pulse {

    0%,
    100% {
        opacity: .3
    }

    50% {
        opacity: 1
    }
}

/* ── BRAND TICKER ──────────────────────────────── */
.cc-brands-sec {
    padding: 56px 0;
    border-top: 1px solid rgba(245, 240, 232, .04);
    border-bottom: 1px solid rgba(245, 240, 232, .04);
    overflow: hidden;
    position: relative;
    z-index: 1;
}

.cc-brands-label {
    text-align: center;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: .32em;
    text-transform: uppercase;
    color: rgba(107, 104, 120, .4);
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    padding: 0 60px;
}

.cc-brands-label::before,
.cc-brands-label::after {
    content: '';
    flex: 1;
    max-width: 80px;
    height: 1px;
    background: rgba(107, 104, 120, .12);
}

.ticker-wrap {
    overflow: hidden;
    position: relative;
}

.ticker-wrap::before,
.ticker-wrap::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 110px;
    z-index: 2;
    pointer-events: none;
}

.ticker-wrap::before {
    left: 0;
    background: linear-gradient(90deg, #0A0A0F 0%, transparent 100%);
}

.ticker-wrap::after {
    right: 0;
    background: linear-gradient(-90deg, #0A0A0F 0%, transparent 100%);
}

.ticker-img-track {
    display: flex;
    align-items: center;
    width: max-content;
    animation: ticker-run 42s linear infinite;
    gap: 0;
    padding: 8px 0;
}

.ticker-img-track:hover {
    animation-play-state: paused;
}

.ticker-img-track img {
    height: 56px;
    width: auto;
    max-width: 160px;
    object-fit: contain;
    padding: 0 44px;
    flex-shrink: 0;
    opacity: .4;
    filter: grayscale(1);
    transition: opacity .35s, filter .35s, transform .4s;
    cursor: pointer;
}

.ticker-img-track img:hover {
    opacity: .9;
    filter: grayscale(0);
    transform: scale(1.2) translateY(-4px);
}

.ticker-txt-track {
    display: flex;
    align-items: center;
    white-space: nowrap;
    width: max-content;
    animation: ticker-run 34s linear infinite;
}

.ticker-txt-track:hover {
    animation-play-state: paused;
}

.b-chip {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 22px;
    margin: 0 4px;
    background: rgba(255, 255, 255, .02);
    border: 1px solid rgba(255, 255, 255, .05);
    border-radius: 100px;
    font-size: 12px;
    font-weight: 500;
    color: rgba(245, 240, 232, .3);
    white-space: nowrap;
    flex-shrink: 0;
    transition: all .3s;
    cursor: default;
    letter-spacing: .05em;
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
    flex-shrink: 0;
}

@keyframes ticker-run {
    0% {
        transform: translateX(0)
    }

    100% {
        transform: translateX(-50%)
    }
}

/* ── SECTIONS ──────────────────────────────────── */
.ccsec {
    padding: 100px 60px;
    position: relative;
    z-index: 1;
}

.ccsec-ink {
    background: var(--ink);
}

.cc-tag {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: .28em;
    text-transform: uppercase;
}

.cc-tag::before {
    content: '';
    width: 24px;
    height: 1px;
    background: currentColor;
}

.cc-h2 {
    font-family: var(--font-d);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(44px, 8vw, 100px);
    line-height: .88;
    letter-spacing: -.02em;
    color: var(--ivory);
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

.g-sage {
    background: linear-gradient(135deg, var(--teal), var(--sage));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* stat cards */
.cc-stc {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 28px 22px;
    transition: border-color .3s, transform .3s;
}

.cc-stc:hover {
    border-color: rgba(201, 168, 76, .25);
    transform: translateY(-4px);
}

/* campaign cards */
.cc-cc {
    border-radius: 12px;
    overflow: hidden;
    background: var(--card);
    border: 1px solid var(--border);
    transition: transform .45s cubic-bezier(.16, 1, .3, 1), border-color .3s, box-shadow .3s;
    text-decoration: none;
    display: block;
}

.cc-cc:hover {
    transform: translateY(-8px);
    border-color: rgba(201, 168, 76, .22);
    box-shadow: 0 28px 64px rgba(0, 0, 0, .5);
}

.cc-ci {
    height: 200px;
    overflow: hidden;
    position: relative;
}

.cc-ci img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .7s cubic-bezier(.16, 1, .3, 1);
}

.cc-cc:hover .cc-ci img {
    transform: scale(1.08);
}

.cc-ctag {
    position: absolute;
    top: 12px;
    left: 12px;
    background: rgba(10, 10, 15, .84);
    backdrop-filter: blur(12px);
    padding: 4px 12px;
    border-radius: 100px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--gold);
}

.cc-cbdy {
    padding: 22px;
}

.cc-ctt {
    font-family: var(--font-d);
    font-size: 22px;
    font-weight: 400;
    color: var(--ivory);
    margin-bottom: 8px;
    line-height: 1.2;
    transition: color .25s;
}

.cc-cc:hover .cc-ctt {
    color: var(--gold);
}

.cc-cdsc {
    font-size: 13px;
    color: var(--smoke);
    line-height: 1.6;
}

.cc-clnk {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 14px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: rgba(201, 168, 76, .4);
    transition: color .25s, gap .25s;
}

.cc-cc:hover .cc-clnk {
    color: var(--gold);
    gap: 10px;
}

/* ── SERVICES ──────────────────────────────────── */
.svc-section {
    position: relative;
    z-index: 1;
    background: var(--ink);
}

.svc-pin-wrap {
    position: relative;
}

.svc-pin {
    position: sticky;
    top: 0;
    height: 100vh;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.svc-header {
    padding: 52px 60px 24px;
    flex-shrink: 0;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
}

.svc-progress-bar {
    height: 1px;
    background: rgba(255, 255, 255, .04);
    margin: 0 60px;
    border-radius: 1px;
    overflow: hidden;
    flex-shrink: 0;
}

.svc-progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--gold), var(--rose));
    border-radius: 1px;
    transition: width .5s cubic-bezier(.16, 1, .3, 1);
    width: 0%;
}

.svc-track-outer {
    flex: 1;
    overflow: hidden;
    position: relative;
}

.svc-track {
    display: flex;
    height: 100%;
    transition: transform .7s cubic-bezier(.16, 1, .3, 1);
    will-change: transform;
}

.svc-slide {
    flex: 0 0 100%;
    height: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    padding: 40px 60px;
    position: relative;
    overflow: hidden;
}

.svc-slide::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 55% 60% at 20% 50%, rgba(var(--svc-rgb, 201, 168, 76), .05) 0%, transparent 70%);
    pointer-events: none;
}

.svc-left {
    padding-right: 48px;
}

.svc-counter {
    font-size: 9px;
    font-weight: 600;
    letter-spacing: .28em;
    color: var(--svc-col, var(--gold));
    opacity: .5;
    margin-bottom: 18px;
    display: block;
    text-transform: uppercase;
}

.svc-title {
    font-family: var(--font-d);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(38px, 5.5vw, 76px);
    line-height: .88;
    letter-spacing: -.02em;
    color: var(--ivory);
    margin-bottom: 20px;
}

.svc-desc {
    font-size: clamp(13px, 1.3vw, 15px);
    color: var(--smoke);
    line-height: 1.85;
    font-weight: 400;
    max-width: 460px;
    margin-bottom: 28px;
}

.svc-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 32px;
}

.svc-tag {
    padding: 5px 14px;
    border: 1px solid rgba(var(--svc-rgb, 201, 168, 76), .25);
    border-radius: 100px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .08em;
    color: var(--svc-col, var(--gold));
    opacity: .75;
}

.svc-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-d);
    font-size: 14px;
    font-weight: 600;
    letter-spacing: .1em;
    color: var(--svc-col, var(--gold));
    text-decoration: none;
    transition: gap .25s;
    border: none;
    background: none;
    cursor: pointer;
}

.svc-cta:hover {
    gap: 14px;
}

.svc-right {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.svc-big-num {
    font-family: var(--font-d);
    font-weight: 300;
    font-size: clamp(130px, 19vw, 240px);
    line-height: .8;
    letter-spacing: -.06em;
    color: rgba(255, 255, 255, .025);
    pointer-events: none;
    user-select: none;
    position: absolute;
    right: -20px;
    font-style: italic;
}

.svc-emoji-wrap {
    position: relative;
    z-index: 2;
    font-size: clamp(68px, 10vw, 120px);
    animation: svc-float 4.5s ease-in-out infinite;
    filter: drop-shadow(0 0 32px rgba(var(--svc-rgb, 201, 168, 76), .18));
}

@keyframes svc-float {

    0%,
    100% {
        transform: translateY(0) rotate(0deg)
    }

    50% {
        transform: translateY(-14px) rotate(3deg)
    }
}

.svc-nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 60px 0;
    flex-shrink: 0;
}

.svc-scroll-hint {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .16em;
    text-transform: uppercase;
    color: rgba(245, 240, 232, .2);
    display: flex;
    align-items: center;
    gap: 8px;
}

.svc-scroll-hint svg {
    animation: bounce-down 2s ease-in-out infinite;
    opacity: .5;
}

@keyframes bounce-down {

    0%,
    100% {
        transform: translateY(0)
    }

    50% {
        transform: translateY(4px)
    }
}

.svc-dots {
    display: flex;
    gap: 8px;
    align-items: center;
}

.svc-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: rgba(245, 240, 232, .12);
    border: none;
    cursor: pointer;
    transition: all .35s cubic-bezier(.16, 1, .3, 1);
    padding: 0;
}

.svc-dot.on {
    width: 26px;
    border-radius: 4px;
    background: var(--gold);
}

.svc-arrows {
    display: flex;
    gap: 10px;
}

.svc-arrow {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: 1px solid rgba(245, 240, 232, .12);
    background: none;
    cursor: pointer;
    color: var(--ivory);
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all .25s;
}

.svc-arrow:hover {
    border-color: var(--gold);
    color: var(--gold);
    background: rgba(201, 168, 76, .08);
}

.svc-arrow:disabled {
    opacity: .2;
    cursor: not-allowed;
}

/* ── PROCESS ───────────────────────────────────── */
.fcp-wrap {
    position: relative;
    z-index: 1;
    background: var(--noir);
    padding: 100px 60px;
}

.fcp-inner {
    max-width: 1380px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 340px 1fr;
    gap: 88px;
    align-items: start;
}

.fcp-sticky-left {
    position: sticky;
    top: 96px;
    display: flex;
    flex-direction: column;
    gap: 22px;
}

.fcp-sub {
    font-size: 15px;
    color: var(--smoke);
    line-height: 1.78;
    font-weight: 400;
    max-width: 290px;
}

.fcp-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    border: 1px solid rgba(201, 168, 76, .4);
    color: var(--gold);
    font-family: var(--font-d);
    font-weight: 600;
    font-size: 15px;
    letter-spacing: .08em;
    padding: 13px 28px;
    border-radius: var(--radius);
    text-decoration: none;
    align-self: flex-start;
    transition: all .25s;
    white-space: nowrap;
}

.fcp-cta-btn:hover {
    background: var(--gold);
    color: var(--noir);
    box-shadow: 0 10px 28px rgba(201, 168, 76, .28);
}

.fcp-counter {
    display: flex;
    align-items: baseline;
    gap: 5px;
    margin-top: 8px;
}

.fcp-counter-cur {
    font-family: var(--font-d);
    font-size: 68px;
    font-weight: 300;
    font-style: italic;
    line-height: 1;
    letter-spacing: -.04em;
    color: var(--gold);
    transition: color .45s;
}

.fcp-counter-sep {
    font-size: 26px;
    color: rgba(245, 240, 232, .15);
    font-weight: 300;
    align-self: center;
}

.fcp-counter-tot {
    font-family: var(--font-d);
    font-size: 34px;
    font-weight: 300;
    font-style: italic;
    letter-spacing: -.03em;
    color: rgba(245, 240, 232, .15);
}

.fcp-right {
    display: flex;
    flex-direction: column;
}

.fcp-step {
    display: grid;
    grid-template-columns: 72px 1fr 70px;
    gap: 0 22px;
    align-items: start;
    cursor: default;
}

.fcp-icon-col {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.fcp-icon-wrap {
    position: relative;
    width: 62px;
    height: 62px;
    flex-shrink: 0;
}

.fcp-icon-ring {
    position: absolute;
    inset: 0;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, .08);
    background: var(--card);
    transition: border-color .5s, background .5s, box-shadow .5s;
}

.fcp-icon-inner {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    transition: transform .5s cubic-bezier(.16, 1, .3, 1);
}

.fcp-line {
    width: 1px;
    min-height: 76px;
    flex: 1;
    background: rgba(255, 255, 255, .06);
    border-radius: 1px;
    margin-top: 4px;
    transition: background .5s;
}

.fcp-body {
    padding-top: 8px;
    padding-bottom: 52px;
    opacity: .22;
    transition: opacity .6s cubic-bezier(.16, 1, .3, 1);
}

.fcp-step:last-child .fcp-body {
    padding-bottom: 0;
}

.fcp-num {
    display: block;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: .24em;
    color: rgba(245, 240, 232, .25);
    margin-bottom: 8px;
    transition: color .5s;
}

.fcp-title {
    font-family: var(--font-d);
    font-size: clamp(26px, 3vw, 50px);
    font-weight: 300;
    font-style: italic;
    letter-spacing: -.02em;
    line-height: .9;
    color: rgba(245, 240, 232, .35);
    margin-bottom: 12px;
    transition: color .5s;
}

.fcp-desc {
    font-size: 14px;
    color: var(--smoke);
    line-height: 1.82;
    font-weight: 400;
    max-width: 460px;
}

.fcp-ghost {
    font-family: var(--font-d);
    font-size: clamp(42px, 6vw, 68px);
    font-weight: 300;
    font-style: italic;
    letter-spacing: -.05em;
    line-height: 1;
    color: rgba(255, 255, 255, .025);
    pointer-events: none;
    user-select: none;
    padding-top: 8px;
    text-align: right;
    transition: color .5s;
}

/* active state */
.fcp-step.fcp-active .fcp-icon-ring {
    border-color: var(--fcp-col, #C9A84C);
    background: var(--fcp-bg, rgba(201, 168, 76, .07));
    box-shadow: 0 0 0 5px var(--fcp-ring, rgba(201, 168, 76, .08)), 0 0 24px var(--fcp-glow, rgba(201, 168, 76, .2));
}

.fcp-step.fcp-active .fcp-icon-inner {
    transform: scale(1.14);
}

.fcp-step.fcp-active .fcp-line {
    background: var(--fcp-col, #C9A84C);
    opacity: .3;
}

.fcp-step.fcp-active .fcp-body {
    opacity: 1;
}

.fcp-step.fcp-active .fcp-num {
    color: var(--fcp-col, #C9A84C);
}

.fcp-step.fcp-active .fcp-title {
    color: var(--fcp-col, #C9A84C);
}

.fcp-step.fcp-active .fcp-ghost {
    color: var(--fcp-ghost, rgba(201, 168, 76, .06));
}

/* ── CTA SECTION ───────────────────────────────── */
.cc-cta-sec {
    position: relative;
    z-index: 1;
    padding: 110px 60px;
    overflow: hidden;
    text-align: center;
}

.cc-cta-bg {
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 60% 70% at 50% 50%, rgba(201, 168, 76, .06) 0%, transparent 65%);
    pointer-events: none;
}

.cc-cta-lines {
    position: absolute;
    inset: 0;
    pointer-events: none;
    background-image: linear-gradient(rgba(201, 168, 76, .04) 1px, transparent 1px), linear-gradient(90deg, rgba(201, 168, 76, .04) 1px, transparent 1px);
    background-size: 80px 80px;
}

/* ── RESPONSIVE ────────────────────────────────── */
@media(max-width:1024px) {

    .cc-hero,
    .ccsec,
    .fcp-wrap,
    .cc-cta-sec {
        padding-left: 28px !important;
        padding-right: 28px !important;
    }

    .svc-header,
    .svc-nav,
    .svc-progress-bar {
        padding-left: 28px !important;
        padding-right: 28px !important;
    }

    .svc-slide {
        padding: 40px 28px;
    }

    .cc-cg {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width:768px) {
    .cc-hero {
        padding: 90px 20px 72px !important;
    }

    .ccsec {
        padding: 72px 20px !important;
    }

    .fcp-wrap {
        padding: 72px 20px;
    }

    .cc-cta-sec {
        padding: 72px 20px !important;
    }

    .h-btns {
        flex-direction: column;
    }

    .cc-btn-gold,
    .cc-btn-ghost {
        width: 100%;
        justify-content: center;
    }

    .svc-pin {
        position: relative;
        height: auto;
        overflow: visible;
    }

    .svc-header,
    .svc-nav,
    .svc-progress-bar {
        padding-left: 20px !important;
        padding-right: 20px !important;
    }

    .svc-track-outer {
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
        scroll-snap-type: x mandatory;
        scrollbar-width: none;
        flex: none;
        height: auto;
    }

    .svc-track-outer::-webkit-scrollbar {
        display: none;
    }

    .svc-track {
        transform: none !important;
        transition: none !important;
        height: auto;
    }

    .svc-slide {
        flex: 0 0 90vw;
        height: auto;
        grid-template-columns: 1fr;
        padding: 32px 20px 44px;
        scroll-snap-align: center;
        margin-right: 10px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, .04);
    }

    .svc-slide:first-child {
        margin-left: 4vw;
    }

    .svc-right,
    .svc-scroll-hint {
        display: none;
    }

    .svc-left {
        padding-right: 0;
    }

    .svc-nav {
        flex-direction: column;
        gap: 18px;
        align-items: flex-start;
    }

    .about-gr {
        grid-template-columns: 1fr !important;
    }

    .stat-gr {
        grid-template-columns: 1fr 1fr !important;
    }

    .cc-cg {
        grid-template-columns: 1fr !important;
    }

    .fcp-inner {
        grid-template-columns: 1fr;
        gap: 0;
    }

    .fcp-sticky-left {
        position: relative;
        top: auto;
        gap: 16px;
        margin-bottom: 48px;
    }

    .fcp-counter {
        display: none;
    }

    .fcp-step {
        grid-template-columns: 62px 1fr;
    }

    .fcp-ghost {
        display: none;
    }
}
</style>

<!-- ════════════════════ HERO ════════════════════ -->
<section class="cc-hero" role="banner" aria-labelledby="cc-h1">
    <div class="cc-hero-rule" style="left:60px"></div>
    <div class="cc-hero-rule" style="right:60px"></div>

    <div style="position:relative;z-index:2;width:100%;max-width:1380px;margin:0 auto">
        <div class="cc-hero-eyebrow">India's Premier Cinema Marketing Studio</div>
        <h1 class="h-h1" id="cc-h1">
            Where Cinema<br>Meets <em>Culture</em>
        </h1>
        <p class="h-sub">
            <?= htmlspecialchars($settings['hero_subtext'] ?? 'A refined studio crafting authentic influencer campaigns, viral content, and cinematic promotions that move audiences.') ?>
        </p>
        <div class="h-btns">
            <a href="#cc-campaigns" class="cc-btn-gold">Explore Our Work</a>
            <a href="<?= base_url('contact') ?>" class="cc-btn-ghost">Reserve a Table →</a>
        </div>
        <div class="h-stats">
            <?php $stats = [
                [$settings['stat_campaigns'] ?? '300+', 'Campaigns', '--gold'],
                ['32%', 'OTT Releases', '--rose'],
                [$settings['stat_reach'] ?? '12M+', 'Reached', '--plum'],
                [$settings['stat_movies'] ?? '150+', 'Films', '--teal'],
            ];
            foreach ($stats as $st): ?>
            <div>
                <div class="h-sn" style="color:var(<?= $st[2] ?>)"><?= htmlspecialchars($st[0]) ?></div>
                <div class="h-sl"><?= $st[1] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="h-scroll-hint" aria-hidden="true">
        <span
            style="font-size:8px;letter-spacing:.32em;text-transform:uppercase;color:rgba(245,240,232,.18);font-weight:600">Scroll</span>
        <div class="h-scroll-line"></div>
    </div>
</section>

<!-- ════════════════ BRAND TICKER ════════════════ -->
<section class="cc-brands-sec" aria-label="Brand partners">
    <div class="cc-brands-label">Trusted by India's Finest</div>
    <?php if (!empty($ticker_imgs)): ?>
    <div class="ticker-wrap">
        <div class="ticker-img-track">
            <?php foreach ($ticker_imgs as $img): ?><img src="<?= htmlspecialchars($img) ?>" alt="Brand partner"
                loading="lazy"><?php endforeach; ?>
        </div>
    </div>
    <?php else: ?>
    <div class="ticker-wrap">
        <div class="ticker-txt-track">
            <?php foreach ($ticker_text as $b): ?><span class="b-chip"><span
                    class="b-dot"></span><?= htmlspecialchars($b) ?></span><?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</section>

<!-- ════════════════ ABOUT ════════════════════════ -->
<section class="ccsec" aria-labelledby="cc-about-h">
    <div style="max-width:1380px;margin:0 auto">
        <div class="about-gr"
            style="display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;margin-bottom:60px">
            <div>
                <p class="cc-tag cc-rv" style="color:var(--gold);margin-bottom:20px">Who We Are</p>
                <h2 id="cc-about-h" class="cc-h2 cc-rv d1" style="margin-bottom:28px">
                    Crafting<br><em class="g-gold" style="font-style:normal">Cinematic</em><br>Impact
                </h2>
                <p class="cc-rv d2"
                    style="font-size:clamp(14px,1.5vw,16px);color:var(--smoke);line-height:1.92;max-width:470px;font-weight:400">
                    <?= htmlspecialchars($settings['about_text'] ?? 'The Cine Cafe is a premium cinema marketing studio driving high-impact campaigns for brands and production houses across entertainment, culture, and commerce.') ?>
                </p>
                <a href="<?= base_url('about') ?>" class="cc-btn-ghost cc-rv d3"
                    style="margin-top:32px;display:inline-flex">Our Story →</a>
            </div>
            <div class="cc-rv d2"
                style="background:var(--card);border:1px solid var(--border);border-radius:12px;overflow:hidden;height:360px;position:relative">
                <img src="<?= base_url('assets/images/background.png') ?>" alt="The Cine Cafe team"
                    style="width:100%;height:100%;object-fit:cover;opacity:.4" loading="lazy"
                    onerror="this.style.display='none'">
                <div
                    style="position:absolute;inset:0;background:linear-gradient(to top,var(--card) 0%,transparent 55%)">
                </div>
                <div style="position:absolute;bottom:24px;left:24px">
                    <p
                        style="font-size:9px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:var(--gold);margin-bottom:4px">
                        Powered by</p>
                    <p
                        style="font-size:20px;font-family:var(--font-d);font-weight:300;font-style:italic;letter-spacing:.04em">
                        Authentic Storytelling 🎬</p>
                </div>
                <div
                    style="position:absolute;top:20px;right:20px;background:rgba(10,10,15,.82);backdrop-filter:blur(16px);border:1px solid rgba(201,168,76,.2);border-radius:8px;padding:14px 18px">
                    <p
                        style="font-size:24px;font-family:var(--font-d);font-weight:300;font-style:italic;color:var(--gold)">
                        32%</p>
                    <p
                        style="font-size:9px;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:var(--smoke)">
                        OTT Releases</p>
                </div>
            </div>
        </div>

        <div class="stat-gr cc-rv d2" style="display:grid;grid-template-columns:repeat(4,1fr);gap:14px">
            <?php $stat_blocks = [
                [$settings['stat_campaigns'] ?? '300+', 'Campaigns', 'Delivered', '--gold'],
                ['32%', 'OTT Releases', 'Of all India', '--rose'],
                [$settings['stat_reach'] ?? '12M+', 'Reach', 'Unique touchpoints', '--plum'],
                [$settings['stat_screenings'] ?? '70+', 'Screenings', 'Events run', '--teal'],
            ];
            foreach ($stat_blocks as $b): ?>
            <div class="cc-stc">
                <div
                    style="font-family:var(--font-d);font-weight:300;font-style:italic;font-size:clamp(30px,4vw,50px);letter-spacing:-.02em;color:var(<?= $b[3] ?>)">
                    <?= htmlspecialchars($b[0]) ?></div>
                <div
                    style="font-family:var(--font-d);font-size:14px;color:var(--ivory);margin-top:5px;letter-spacing:.04em">
                    <?= $b[1] ?></div>
                <div style="font-size:11px;color:var(--smoke);font-weight:500;margin-top:3px;letter-spacing:.04em">
                    <?= $b[2] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ════════════════ SERVICES ════════════════════ -->
<section class="svc-section" id="cc-services" aria-labelledby="cc-svc-h">
    <div class="svc-pin-wrap" id="svc-pin-wrap">
        <div class="svc-pin" id="svc-pin">
            <div class="svc-header">
                <div>
                    <p class="cc-tag" style="color:var(--rose);margin-bottom:12px">What We Do</p>
                    <h2 id="cc-svc-h" class="cc-h2">Our <em class="g-gold" style="font-style:italic">Services</em></h2>
                </div>
                <div style="display:flex;align-items:center;gap:20px;padding-bottom:4px">
                    <div class="svc-scroll-hint" id="svc-scroll-hint">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                            <path d="M7 1v12M3 9l4 4 4-4" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Scroll to explore
                    </div>
                    <a href="<?= base_url('contact') ?>" class="cc-btn-ghost" style="flex-shrink:0">Work With Us</a>
                </div>
            </div>
            <div class="svc-progress-bar" aria-hidden="true">
                <div class="svc-progress-fill" id="svc-progress-fill"></div>
            </div>
            <div class="svc-track-outer" id="svc-track-outer">
                <div class="svc-track" id="svc-track" role="region" aria-label="Services carousel">
                    <?php foreach ($svcs as $i => $sv):
                        $hex = ltrim($sv[3], '#');
                        $r = hexdec(substr($hex, 0, 2));
                        $gv = hexdec(substr($hex, 2, 2));
                        $bv = hexdec(substr($hex, 4, 2));
                    ?>
                    <div class="svc-slide" id="svc-slide-<?= $i ?>"
                        style="--svc-col:<?= $sv[3] ?>;--svc-rgb:<?= $r ?>,<?= $gv ?>,<?= $bv ?>" role="group"
                        aria-roledescription="slide"
                        aria-label="<?= htmlspecialchars($sv[2]) ?> (<?= ($i + 1) ?> of <?= count($svcs) ?>)">
                        <div class="svc-left">
                            <span class="svc-counter"><?= $sv[0] ?> / <?= $sv[1] ?></span>
                            <h3 class="svc-title"><?= htmlspecialchars($sv[2]) ?></h3>
                            <p class="svc-desc"><?= htmlspecialchars($sv[5]) ?></p>
                            <div class="svc-tags"><?php foreach ($sv[6] as $tag): ?><span
                                    class="svc-tag"><?= htmlspecialchars($tag) ?></span><?php endforeach; ?></div>
                            <a href="<?= base_url('contact') ?>" class="svc-cta">Begin this Service <span>→</span></a>
                        </div>
                        <div class="svc-right" aria-hidden="true">
                            <span class="svc-big-num"><?= $sv[0] ?></span>
                            <span class="svc-emoji-wrap"><?= $sv[4] ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="svc-nav">
                <div style="display:flex;align-items:center;gap:20px">
                    <div class="svc-dots" id="svc-dots" role="tablist" aria-label="Service slides">
                        <?php foreach ($svcs as $i => $sv): ?>
                        <button class="svc-dot<?= $i === 0 ? ' on' : '' ?>" data-idx="<?= $i ?>" role="tab"
                            aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"
                            aria-label="<?= htmlspecialchars($sv[2]) ?>"></button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="svc-arrows">
                    <button class="svc-arrow" id="svc-prev" aria-label="Previous service" disabled>&#8592;</button>
                    <button class="svc-arrow" id="svc-next" aria-label="Next service">&#8594;</button>
                </div>
            </div>
        </div>
        <div id="svc-spacers"></div>
    </div>
</section>

<!-- ════════════════ CAMPAIGNS ════════════════════ -->
<?php if (!empty($posts)): ?>
<section class="ccsec ccsec-ink" id="cc-campaigns" aria-labelledby="cc-camp-h">
    <div style="max-width:1380px;margin:0 auto">
        <p class="cc-tag cc-rv" style="color:var(--plum);margin-bottom:16px">Case Studies</p>
        <h2 id="cc-camp-h" class="cc-h2 cc-rv d1" style="margin-bottom:48px">Signature<br><em class="g-plum"
                style="font-style:italic">Campaigns</em></h2>
        <div class="cc-cg" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px">
            <?php foreach ($posts as $i => $p):
                    $delay = 'd' . (($i % 3) + 1);
                ?>
            <a href="<?= base_url('post/' . $p['slug']) ?>" class="cc-cc cc-rv <?= $delay ?>">
                <div class="cc-ci">
                    <?php if (!empty($p['image'])): ?>
                    <img src="<?= base_url('assets/images/uploads/' . $p['image']) ?>"
                        alt="<?= htmlspecialchars($p['title']) ?>" loading="lazy">
                    <?php else: ?>
                    <div
                        style="height:200px;background:linear-gradient(135deg,#1A1A26,#0A0A0F);display:flex;align-items:center;justify-content:center">
                        <span
                            style="font-family:var(--font-d);font-size:52px;color:rgba(201,168,76,.07);font-style:italic">Cine</span>
                    </div>
                    <?php endif; ?>
                    <div class="cc-ctag"><?= htmlspecialchars($p['author']) ?></div>
                </div>
                <div class="cc-cbdy">
                    <h3 class="cc-ctt"><?= htmlspecialchars($p['title']) ?></h3>
                    <p class="cc-cdsc"><?= htmlspecialchars(mb_substr($p['description'], 0, 90)) ?>...</p>
                    <div class="cc-clnk">View Campaign <span>→</span></div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <div style="text-align:center;margin-top:48px" class="cc-rv">
            <a href="<?= base_url('work') ?>" class="cc-btn-ghost">View All Campaigns</a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ════════════════ PROCESS ══════════════════════ -->
<section class="fcp-wrap" aria-labelledby="fcp-h" id="cc-process">
    <div class="fcp-inner">
        <div class="fcp-left">
            <div class="fcp-sticky-left">
                <p class="cc-tag" style="color:var(--teal)">How We Work</p>
                <h2 id="fcp-h" class="cc-h2">Our<br><em class="g-sage" style="font-style:italic">Process</em></h2>
                <p class="fcp-sub">A refined four-act framework that transforms brands into cultural icons.</p>
                <a href="<?= base_url('contact') ?>" class="fcp-cta-btn">Work With Us →</a>
                <div class="fcp-counter">
                    <span class="fcp-counter-cur" id="fcp-counter-cur">01</span>
                    <span class="fcp-counter-sep">/</span>
                    <span class="fcp-counter-tot">04</span>
                </div>
            </div>
        </div>
        <div class="fcp-right">
            <?php $proc_steps = [
                ['01', '🎯', 'Strategy', 'Deep-dive into brand soul, audience nuance, and cultural context. We study the landscape before a single frame is shot.', '#C9A84C'],
                ['02', '🌐', 'Network', 'Match with ideal influencers, meme pages, and creators from our curated pool of 10,000+ accounts across every niche.', '#E8836A'],
                ['03', '🚀', 'Execute', 'Launch precision campaigns with real-time monitoring, creative iteration, and A/B optimisation for maximum resonance.', '#8B5DA0'],
                ['04', '📈', 'Scale', 'Analyse, optimise, double down on winners. Compound the momentum until your brand becomes the conversation.', '#3ABFB8'],
            ];
            $total = count($proc_steps);
            foreach ($proc_steps as $i => $ps): ?>
            <div class="fcp-step" data-fcp-step="<?= $i ?>" data-fcp-color="<?= $ps[4] ?>">
                <div class="fcp-icon-col">
                    <div class="fcp-icon-wrap">
                        <div class="fcp-icon-ring"></div>
                        <div class="fcp-icon-inner"><?= $ps[1] ?></div>
                    </div>
                    <?php if ($i < $total - 1): ?><div class="fcp-line"></div><?php endif; ?>
                </div>
                <div class="fcp-body">
                    <span class="fcp-num"><?= $ps[0] ?></span>
                    <h3 class="fcp-title"><?= $ps[2] ?></h3>
                    <p class="fcp-desc"><?= $ps[3] ?></p>
                </div>
                <div class="fcp-ghost" aria-hidden="true"><?= $ps[0] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ════════════════ CTA ══════════════════════════ -->
<section class="cc-cta-sec" aria-label="Call to action">
    <div class="cc-cta-bg"></div>
    <div class="cc-cta-lines"></div>
    <div style="position:relative;z-index:1;max-width:1380px;margin:0 auto">
        <p class="cc-tag cc-rv" style="color:var(--sage);justify-content:center;margin:0 auto 20px">Ready to Begin?</p>
        <h2 class="cc-h2 cc-rv d1" style="margin-bottom:36px">
            Let's Create<br>Something <em class="g-gold" style="font-style:italic">Extraordinary</em>
        </h2>
        <div style="display:flex;justify-content:center;gap:16px;flex-wrap:wrap" class="cc-rv d2">
            <a href="<?= base_url('contact') ?>" class="cc-btn-gold" style="padding:16px 40px">Start a Campaign</a>
            <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'contact@thecinecafe.in') ?>"
                class="cc-btn-ghost" style="padding:15px 36px">Email Us</a>
        </div>
        <p class="cc-rv d3"
            style="margin-top:24px;font-size:12px;color:var(--smoke);font-weight:500;letter-spacing:.06em">
            <?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?>
            &nbsp;&middot;&nbsp;
            <?= htmlspecialchars($settings['site_email'] ?? 'contact@thecinecafe.in') ?>
        </p>
    </div>
</section>

<script>
(function() {
    'use strict';

    // Reveal
    var rvEls = document.querySelectorAll('.cc-rv');
    if (rvEls.length && 'IntersectionObserver' in window) {
        var rvObs = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    e.target.classList.add('cc-in');
                    rvObs.unobserve(e.target);
                }
            });
        }, {
            threshold: .1,
            rootMargin: '0px 0px -28px 0px'
        });
        rvEls.forEach(function(el) {
            rvObs.observe(el);
        });
    }

    // Services carousel
    var pinWrap = document.getElementById('svc-pin-wrap'),
        pin = document.getElementById('svc-pin');
    var track = document.getElementById('svc-track'),
        trackOuter = document.getElementById('svc-track-outer');
    var dots = document.querySelectorAll('.svc-dot');
    var btnPrev = document.getElementById('svc-prev'),
        btnNext = document.getElementById('svc-next');
    var fill = document.getElementById('svc-progress-fill'),
        hint = document.getElementById('svc-scroll-hint');
    var spacersEl = document.getElementById('svc-spacers');
    if (!track || !pinWrap) return;
    var total = dots.length,
        current = 0,
        isMobile = false;

    function checkMobile() {
        isMobile = window.innerWidth <= 768;
    }
    checkMobile();

    function setupDesktop() {
        if (spacersEl) {
            var extra = window.innerHeight * .85 * (total - 1);
            spacersEl.style.height = extra + 'px';
        }
        track.style.transition = 'transform .65s cubic-bezier(.16,1,.3,1)';
        track.style.transform = 'translateX(-' + (current * 100) + '%)';
        trackOuter.style.overflowX = 'hidden';
        if (hint) hint.style.display = '';
    }

    function setupMobile() {
        if (spacersEl) spacersEl.style.height = '0px';
        track.style.transform = '';
        track.style.transition = '';
        trackOuter.style.overflowX = 'auto';
        if (hint) hint.style.display = 'none';
    }

    function goTo(idx, instant) {
        idx = Math.max(0, Math.min(total - 1, idx));
        current = idx;
        if (isMobile) {
            var slides = track.querySelectorAll('.svc-slide');
            if (slides.length) {
                var slideW = slides[0].offsetWidth + 10;
                trackOuter.scrollTo({
                    left: idx * slideW,
                    behavior: instant ? 'instant' : 'smooth'
                });
            }
        } else {
            track.style.transform = 'translateX(-' + (idx * 100) + '%)';
        }
        updateUI();
    }

    function updateUI() {
        dots.forEach(function(d, i) {
            d.classList.toggle('on', i === current);
            d.setAttribute('aria-selected', i === current ? 'true' : 'false');
        });
        if (fill) fill.style.width = ((current + 1) / total * 100) + '%';
        if (btnPrev) btnPrev.disabled = current === 0;
        if (btnNext) btnNext.disabled = current === total - 1;
    }

    function onScroll() {
        if (isMobile) return;
        var rect = pinWrap.getBoundingClientRect();
        var wrapH = pinWrap.offsetHeight;
        var pinH = pin.offsetHeight;
        var scrolled = Math.max(0, Math.min(-rect.top, wrapH - pinH));
        var maxScroll = wrapH - pinH;
        if (maxScroll <= 0) return;
        var progress = scrolled / maxScroll;
        var rawIdx = progress * (total - 1);
        var idx = Math.round(rawIdx);
        if (idx !== current) {
            current = idx;
            track.style.transform = 'translateX(-' + (current * 100) + '%)';
            updateUI();
        }
        if (fill) fill.style.width = ((rawIdx + 1) / total * 100) + '%';
    }
    var mobileScrollTimer;

    function onMobileScroll() {
        clearTimeout(mobileScrollTimer);
        mobileScrollTimer = setTimeout(function() {
            var slides = track.querySelectorAll('.svc-slide');
            if (!slides.length) return;
            var slideW = slides[0].offsetWidth + 10;
            if (slideW <= 0) return;
            var idx = Math.round(trackOuter.scrollLeft / slideW);
            if (idx !== current) {
                current = idx;
                updateUI();
            }
        }, 60);
    }
    dots.forEach(function(d, i) {
        d.addEventListener('click', function() {
            goTo(i);
        });
    });
    if (btnPrev) btnPrev.addEventListener('click', function() {
        goTo(current - 1);
    });
    if (btnNext) btnNext.addEventListener('click', function() {
        goTo(current + 1);
    });
    var resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            var wasMobile = isMobile;
            checkMobile();
            if (isMobile !== wasMobile) {
                isMobile ? setupMobile() : setupDesktop();
                current = 0;
                updateUI();
            } else if (!isMobile) {
                setupDesktop();
                goTo(current, true);
            } else {
                goTo(current, true);
            }
        }, 150);
    });
    window.addEventListener('scroll', onScroll, {
        passive: true
    });
    if (trackOuter) trackOuter.addEventListener('scroll', onMobileScroll, {
        passive: true
    });
    isMobile ? setupMobile() : setupDesktop();
    updateUI();

    // Process steps
    var steps = document.querySelectorAll('.fcp-step');
    var counterEl = document.getElementById('fcp-counter-cur');
    if (!steps.length) return;
    var colors = [{
            col: '#C9A84C',
            bg: 'rgba(201,168,76,.08)',
            ring: 'rgba(201,168,76,.1)',
            glow: 'rgba(201,168,76,.22)',
            ghost: 'rgba(201,168,76,.07)'
        },
        {
            col: '#E8836A',
            bg: 'rgba(232,131,106,.08)',
            ring: 'rgba(232,131,106,.1)',
            glow: 'rgba(232,131,106,.22)',
            ghost: 'rgba(232,131,106,.07)'
        },
        {
            col: '#8B5DA0',
            bg: 'rgba(139,93,160,.08)',
            ring: 'rgba(139,93,160,.1)',
            glow: 'rgba(139,93,160,.22)',
            ghost: 'rgba(139,93,160,.07)'
        },
        {
            col: '#3ABFB8',
            bg: 'rgba(58,191,184,.08)',
            ring: 'rgba(58,191,184,.1)',
            glow: 'rgba(58,191,184,.22)',
            ghost: 'rgba(58,191,184,.07)'
        },
    ];
    var active = -1;

    function activate(idx) {
        if (idx === active) return;
        active = idx;
        var c = colors[idx] || colors[0];
        steps.forEach(function(s, i) {
            s.classList.toggle('fcp-active', i === idx);
            if (i === idx) {
                s.style.setProperty('--fcp-col', c.col);
                s.style.setProperty('--fcp-bg', c.bg);
                s.style.setProperty('--fcp-ring', c.ring);
                s.style.setProperty('--fcp-glow', c.glow);
                s.style.setProperty('--fcp-ghost', c.ghost);
            }
        });
        if (counterEl) {
            counterEl.textContent = String(idx + 1).padStart(2, '0');
            counterEl.style.color = c.col;
        }
    }
    activate(0);
    var isMob2 = window.innerWidth <= 860;
    var rm2 = isMob2 ? '-10% 0px -10% 0px' : '-25% 0px -45% 0px';
    var obs2 = new IntersectionObserver(function(entries) {
        entries.forEach(function(e) {
            if (e.isIntersecting) activate(parseInt(e.target.dataset.fcpStep, 10));
        });
    }, {
        rootMargin: rm2,
        threshold: 0
    });
    steps.forEach(function(s) {
        obs2.observe(s);
    });
})();
</script>