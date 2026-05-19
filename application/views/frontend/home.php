<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
function svg($id, $w = 20, $h = null, $col = 'currentColor', $sw = 1.7)
{
    $h = $h ?? $w;
    static $p = [
        'film'        => '<path d="M7 2H3a1 1 0 00-1 1v3a1 1 0 001 1h4a1 1 0 001-1V3a1 1 0 00-1-1zm10 0h-4a1 1 0 00-1 1v3a1 1 0 001 1h4a1 1 0 001-1V3a1 1 0 00-1-1zM7 9H3a1 1 0 00-1 1v3a1 1 0 001 1h4a1 1 0 001-1v-3a1 1 0 00-1-1zm10 0h-4a1 1 0 00-1 1v3a1 1 0 001 1h4a1 1 0 001-1v-3a1 1 0 00-1-1zM7 16H3a1 1 0 00-1 1v3a1 1 0 001 1h4a1 1 0 001-1v-3a1 1 0 00-1-1zm10 0h-4a1 1 0 00-1 1v3a1 1 0 001 1h4a1 1 0 001-1v-3a1 1 0 00-1-1z"/><path d="M2 7h20M2 12h20M2 17h20"/>',
        'target'      => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
        'trending'    => '<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>',
        'award'       => '<circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>',
        'video'       => '<polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/>',
        'pin'         => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>',
        'zap'         => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
        'star'        => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
        'globe'       => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>',
        'mic'         => '<path d="M12 1a3 3 0 00-3 3v8a3 3 0 006 0V4a3 3 0 00-3-3z"/><path d="M19 10v2a7 7 0 01-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/>',
        'arrow-r'     => '<line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>',
        'arrow-ur'    => '<line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/>',
        'check'       => '<polyline points="20 6 9 17 4 12"/>',
        'bar-chart'   => '<line x1="12" y1="20" x2="12" y2="10"/><line x1="18" y1="20" x2="18" y2="4"/><line x1="6" y1="20" x2="6" y2="16"/>',
        'users'       => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>',
        'layers'      => '<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>',
        'send'        => '<line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>',
        'eye'         => '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>',
        'quote'       => '<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1zm12 0c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/>',
        'play'        => '<circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/>',
        'briefcase'   => '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/>',
    ];
    $path = $p[$id] ?? '<circle cx="12" cy="12" r="10"/>';
    return '<svg width="' . $w . '" height="' . $h . '" viewBox="0 0 24 24" fill="none" stroke="' . $col . '" stroke-width="' . $sw . '" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $path . '</svg>';
}

$svcs = [
    ['trending', 'Influencer Marketing', 'Precision-matched creator partnerships — nano to celebrity — that feel authentic and perform powerfully.'],
    ['film', 'Meme Marketing', 'Culturally embedded viral content crafted to spread because it belongs, not because it was placed.'],
    ['video', 'Film Promotions', 'End-to-end cinematic promotion strategy. We power the buzz that fills seats and drives streams.'],
    ['eye', 'Video Production', 'Concept, craft, deliver. Brand films to web series — OTT-grade quality at studio speed.'],
    ['users', 'Film Screenings', 'Curated influencer screening events generating authentic pre-release buzz at scale.'],
    ['pin', 'On-Ground Activations', 'Real-world brand moments bridging digital reach with physical memory.'],
    ['mic', 'LinkedIn &amp; X Strategy', 'Platform-native campaigns building authority for studios and executive voices.'],
    ['star', 'Celebrity Endorsements', 'Curated star partnerships that amplify brand credibility and unlock millions of loyal followers.'],
];
$feats = [
    ['target', 'Cultural Intelligence', 'We know what trends before it does — our team lives and breathes pop culture every single day.'],
    ['zap', '24–48h Turnaround', 'Lightning-fast execution without compromising quality. Your campaign launch never waits on us.'],
    ['globe', '10,000+ Creators', 'Access to authentic voices for every niche, genre, and audience segment across India.'],
    ['bar-chart', 'Data-Driven', 'Every campaign is monitored in real time and optimised for maximum cultural resonance and ROI.'],
    ['film', 'OTT Expertise', 'We have powered 32% of all OTT releases — no one understands streaming promotion like we do.'],
    ['layers', 'End-to-End', 'From strategy to execution, we handle everything so you can focus on what matters most.'],
];
$testi = [
    ['"The Cine Caffe turned our OTT launch into a cultural moment. 3M+ organic impressions in 72 hours."', 'Priya S.', 'Marketing Head, Major OTT Platform'],
    ['"Their meme strategy was unmatched. Content felt native, not paid — that\'s extraordinarily rare."', 'Rohit K.', 'Producer, Bollywood Production House'],
    ['"From strategy to execution, absolutely flawless. 40% above-target reach on our influencer campaign."', 'Meera V.', 'Brand Manager, Consumer Electronics'],
];
$procs = [
    ['target', 'Strategy & Discovery', 'Deep-dive into brand soul, audience nuance, and cultural context before a single frame is shot.'],
    ['globe', 'Network & Matching', 'Match with ideal influencers from our curated pool of 10,000+ accounts across every niche.'],
    ['send', 'Execute & Launch', 'Precision campaigns with real-time monitoring, creative iteration, and A/B optimisation.'],
    ['bar-chart', 'Scale & Compound', 'Analyse, optimise, double down on winners. Compound momentum until your brand owns the conversation.'],
];
$brands = ['Netflix', 'Amazon Prime', 'Disney+', 'Dharma Productions', 'YRF', 'Sony Pictures', 'T-Series', 'Warner Bros', 'Zee5', 'JioCinema', 'Maddock Films', 'boAt', 'Myntra', 'OnePlus', 'Fastrack', 'Viacom18'];
?>

<style>
    /* ================================================================
   HOME PAGE — CINEMATIC PREMIUM
================================================================ */

    /* ── HERO ── */
    .hero {
        background: var(--olive-dk);
        min-height: 100svh;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
    }

    /* dot grid */
    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(242, 234, 216, .06) 1px, transparent 1px);
        background-size: 30px 30px;
        pointer-events: none;
        z-index: 0;
    }

    /* ambient glows */
    .h-glow {
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        pointer-events: none;
        z-index: 0;
    }

    .hg1 {
        width: 500px;
        height: 500px;
        background: rgba(212, 146, 10, .10);
        top: -140px;
        right: -100px;
        animation: float-a 24s ease-in-out infinite;
    }

    .hg2 {
        width: 360px;
        height: 360px;
        background: rgba(107, 122, 85, .22);
        bottom: 10%;
        left: -80px;
        animation: float-b 30s ease-in-out 6s infinite;
    }

    .hg3 {
        width: 240px;
        height: 240px;
        background: rgba(212, 146, 10, .07);
        top: 45%;
        left: 38%;
        animation: float-a 18s ease-in-out 3s infinite;
    }

    .hg4 {
        width: 180px;
        height: 180px;
        background: rgba(93, 120, 60, .15);
        top: 20%;
        right: 30%;
        animation: float-b 20s ease-in-out 9s infinite;
    }

    /* hero body center */
    .hero-body {
        flex: 1;
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: calc(var(--nav-h) + 56px) var(--px) 48px;
    }

    .hero-eye {
        font-family: var(--f-c);
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: .34em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .5);
        display: inline-flex;
        align-items: center;
        gap: 14px;
        margin-bottom: var(--s8);
        opacity: 0;
        animation: fadeUp .8s var(--ease) .2s forwards;
    }

    .hero-eye::before,
    .hero-eye::after {
        content: '';
        width: 32px;
        height: 1.5px;
        background: var(--amber);
        display: block;
    }

    .hero-h1 {
        font-family: var(--f-d);
        font-size: clamp(80px, 17vw, 228px);
        line-height: .78;
        letter-spacing: .02em;
        color: var(--cream);
        position: relative;
        z-index: 1;
        opacity: 0;
        animation: fadeUp 1.1s var(--ease) .35s forwards;
    }

    .hero-h1 .line-outline {
        display: block;
        color: transparent;
        -webkit-text-stroke: 2.5px rgba(242, 234, 216, .4);
    }

    .hero-h1 .line-gold {
        display: block;
        color: var(--amber);
        margin-top: -.02em;
    }

    .hero-h1 .line-solid {
        display: block;
    }

    .hero-sub {
        font-family: var(--f-s);
        font-style: italic;
        font-size: clamp(15px, 1.8vw, 18px);
        letter-spacing: .04em;
        color: rgba(242, 234, 216, .52);
        max-width: 500px;
        line-height: 1.8;
        margin: var(--s8) auto 0;
        opacity: 0;
        animation: fadeUp .8s var(--ease) .8s forwards;
    }

    .hero-btns {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: var(--s12);
        opacity: 0;
        animation: fadeUp .7s var(--ease) 1s forwards;
    }

    /* ── FLOATING LEFT PANEL ── */
    .hero-float-l {
        position: absolute;
        left: clamp(18px, 3.5vw, 56px);
        top: 50%;
        transform: translateY(-50%);
        z-index: 3;
        display: flex;
        flex-direction: column;
        gap: var(--s4);
        align-items: flex-start;
        opacity: 0;
        animation: fadeUp .9s var(--ease) 1.1s forwards;
    }

    /* OTT orbit badge */
    .spin-badge {
        position: relative;
        width: 116px;
        height: 116px;
        flex-shrink: 0;
        animation: float-a 7s ease-in-out 1s infinite;
    }

    .spin-badge-ring {
        width: 100%;
        height: 100%;
        border: 1.5px solid rgba(242, 234, 216, .2);
        border-radius: 50%;
        position: relative;
        animation: spin-cw 24s linear infinite;
    }

    .spin-badge-inner {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        animation: spin-cw 24s linear infinite reverse;
    }

    .spin-badge-n {
        font-family: var(--f-d);
        font-size: 28px;
        line-height: 1;
        color: var(--amber);
        display: block;
    }

    .spin-badge-l {
        font-family: var(--f-c);
        font-size: 8px;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .4);
        margin-top: 3px;
        display: block;
    }

    /* Vertical scroll label */
    .hero-scroll-cue {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: var(--s3);
        margin-top: var(--s8);
    }

    .hero-scroll-line {
        width: 1px;
        height: 52px;
        background: linear-gradient(var(--amber), transparent);
        animation: float-a 3s ease-in-out infinite;
    }

    .hero-scroll-t {
        font-family: var(--f-c);
        font-size: 8px;
        font-weight: 700;
        letter-spacing: .26em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .22);
        writing-mode: vertical-rl;
        transform: rotate(180deg);
    }

    /* Small achievement chip */
    .hero-chip {
        background: rgba(26, 26, 10, .7);
        border: 1px solid rgba(242, 234, 216, .10);
        backdrop-filter: blur(16px);
        padding: 10px 14px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 148px;
        animation: float-b 9s ease-in-out 2s infinite;
        margin-top: var(--s4);
    }

    .hero-chip-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--amber);
        flex-shrink: 0;
        animation: pulse-dot 2s ease-in-out infinite;
    }

    @keyframes pulse-dot {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(212, 146, 10, .5)
        }

        50% {
            box-shadow: 0 0 0 6px rgba(212, 146, 10, 0)
        }
    }

    .hero-chip-txt {
        font-family: var(--f-c);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .5);
    }

    .hero-chip-val {
        font-family: var(--f-d);
        font-size: 20px;
        color: var(--cream);
        line-height: 1;
    }

    /* ── FLOATING RIGHT PANEL ── */
    .hero-float-r {
        position: absolute;
        right: clamp(18px, 3.5vw, 56px);
        top: 50%;
        transform: translateY(-50%);
        z-index: 3;
        display: flex;
        flex-direction: column;
        gap: 3px;
        min-width: 156px;
        opacity: 0;
        animation: fadeUp .9s var(--ease) 1.2s forwards;
    }

    .hfc {
        background: rgba(26, 26, 10, .78);
        border: 1px solid rgba(242, 234, 216, .09);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        padding: 16px 20px;
        transition: border-color var(--t2), transform var(--t2);
    }

    .hfc:nth-child(1) {
        animation: float-b 8s ease-in-out 1s infinite;
    }

    .hfc:nth-child(3) {
        animation: float-a 7s ease-in-out 2s infinite;
    }

    .hfc:nth-child(5) {
        animation: float-b 9s ease-in-out 1.5s infinite;
    }

    .hfc:hover {
        border-color: rgba(212, 146, 10, .3);
        transform: translateX(-5px);
    }

    .hfc-n {
        font-family: var(--f-d);
        font-size: 30px;
        line-height: 1;
        letter-spacing: .02em;
    }

    .hfc-l {
        font-family: var(--f-c);
        font-size: 8.5px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--l-muted);
        margin-top: 4px;
    }

    .hfc-div {
        height: 2px;
        background: rgba(242, 234, 216, .07);
    }

    /* Vertical decorative text right side */
    .hero-vert-r {
        position: absolute;
        bottom: 100px;
        right: clamp(18px, 3.5vw, 56px);
        z-index: 3;
        font-family: var(--f-c);
        font-size: 8px;
        font-weight: 700;
        letter-spacing: .3em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .16);
        writing-mode: vertical-rl;
        opacity: 0;
        animation: fadeUp .6s var(--ease) 1.6s forwards;
    }

    /* hero bottom stats bar */
    .hero-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        border-top: 2px solid rgba(242, 234, 216, .1);
        position: relative;
        z-index: 2;
        opacity: 0;
        animation: fadeUp .7s var(--ease) 1.5s forwards;
    }

    .hs-cell {
        padding: 24px 28px;
        border-right: 1px solid rgba(242, 234, 216, .08);
        transition: background var(--t2);
        cursor: default;
    }

    .hs-cell:last-child {
        border-right: none;
    }

    .hs-cell:hover {
        background: rgba(242, 234, 216, .05);
    }

    .hs-n {
        font-family: var(--f-d);
        font-size: clamp(28px, 4vw, 46px);
        line-height: 1;
        letter-spacing: .02em;
        color: var(--cream);
    }

    .hs-l {
        font-family: var(--f-c);
        font-size: 9.5px;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .32);
        margin-top: 6px;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(28px)
        }

        to {
            opacity: 1;
            transform: none
        }
    }

    /* ── TICKER ── */
    .ticker {
        background: var(--ink);
        border-top: 3px solid var(--amber);
        border-bottom: 3px solid var(--amber);
        padding: 16px 0;
        overflow: hidden;
    }

    .tk-w {
        font-family: var(--f-d);
        font-size: clamp(22px, 3.5vw, 40px);
        letter-spacing: .04em;
        color: rgba(242, 234, 216, .09);
        padding: 0 36px;
        white-space: nowrap;
        display: inline-block;
    }

    .tk-sep {
        color: var(--amber);
        font-size: 16px;
        opacity: .6;
        display: inline-block;
        padding: 0 2px;
    }

    /* ── BRANDS ── */
    .brands {
        background: var(--cream-2);
        border-bottom: 1.5px solid var(--border);
        padding: 24px 0;
    }

    .brand-chip {
        font-family: var(--f-c);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: rgba(26, 26, 16, .28);
        padding: 6px 20px;
        margin: 0 3px;
        border: 1.5px solid rgba(26, 26, 16, .10);
        border-radius: 100px;
        white-space: nowrap;
        display: inline-block;
        transition: border-color var(--t2), color var(--t2);
        cursor: default;
    }

    .brand-chip:hover {
        border-color: rgba(26, 26, 16, .28);
        color: rgba(26, 26, 16, .56);
    }

    /* ── ABOUT ── */
    .about {
        background: var(--cream);
    }

    .about-wrap {
        max-width: var(--max);
        margin: 0 auto;
        padding: var(--sec-py) var(--px);
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
    }

    .about-h {
        font-family: var(--f-d);
        font-size: clamp(48px, 7.5vw, 104px);
        line-height: .86;
        letter-spacing: .02em;
        color: var(--ink);
        margin-bottom: var(--s8);
    }

    .about-h .ul {
        text-decoration: underline;
        text-decoration-thickness: 4px;
        text-underline-offset: 8px;
        text-decoration-color: var(--amber);
    }

    .about-body {
        font-family: var(--f-s);
        font-style: italic;
        font-size: clamp(15px, 1.6vw, 17px);
        color: var(--muted);
        line-height: 1.92;
        max-width: 440px;
        margin-bottom: var(--s10);
    }

    .about-cta {
        font-family: var(--f-c);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        border-bottom: 2px solid var(--amber);
        padding-bottom: 3px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: color var(--t1);
    }

    .about-cta:hover {
        color: var(--amber);
    }

    .about-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2px;
        margin-top: var(--s14);
        border: 2.5px solid var(--ink);
        overflow: hidden;
    }

    .as-c {
        background: var(--ink);
        color: var(--cream);
        padding: 24px 20px;
        transition: background var(--t2);
        cursor: default;
    }

    .as-c:hover {
        background: var(--olive-dk);
    }

    .as-n {
        font-family: var(--f-d);
        font-size: clamp(30px, 4vw, 46px);
        line-height: 1;
        letter-spacing: .02em;
    }

    .as-l {
        font-family: var(--f-c);
        font-size: 8.5px;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .3);
        margin-top: 5px;
    }

    /* visual box */
    .av {
        position: relative;
        height: 520px;
    }

    .av-main {
        position: absolute;
        inset: 0;
        background: var(--ink);
        border: 2.5px solid var(--ink);
        overflow: hidden;
    }

    .av-main::before,
    .av-main::after {
        content: '';
        position: absolute;
        width: 40px;
        height: 40px;
        border-color: var(--amber);
        border-style: solid;
        pointer-events: none;
        z-index: 2;
    }

    .av-main::before {
        top: 18px;
        left: 18px;
        border-width: 2px 0 0 2px;
    }

    .av-main::after {
        bottom: 18px;
        right: 18px;
        border-width: 0 2px 2px 0;
    }

    .av-yr {
        font-family: var(--f-d);
        font-size: clamp(80px, 14vw, 154px);
        line-height: 1;
        letter-spacing: -.04em;
        color: transparent;
        -webkit-text-stroke: 1px rgba(242, 234, 216, .06);
        position: absolute;
        bottom: 16px;
        left: 16px;
        pointer-events: none;
        user-select: none;
    }

    .av-facts {
        padding: var(--s10) var(--s8);
        position: relative;
        z-index: 1;
    }

    .av-fact {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 12px 0;
        border-bottom: 1px solid rgba(242, 234, 216, .05);
        transition: padding-left var(--t2);
    }

    .av-fact:last-child {
        border-bottom: none;
    }

    .av-fact:hover {
        padding-left: 10px;
    }

    .av-fact svg {
        opacity: .4;
        transition: opacity var(--t2), transform var(--t2);
        flex-shrink: 0;
    }

    .av-fact:hover svg {
        opacity: .9;
        transform: scale(1.2);
    }

    .av-ft {
        font-family: var(--f-c);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .06em;
        color: rgba(242, 234, 216, .52);
    }

    .av-badge {
        position: absolute;
        top: -24px;
        right: 64px;
        background: var(--amber);
        color: var(--ink);
        padding: 16px 20px;
        z-index: 3;
        animation: float-a 5.5s ease-in-out infinite;
    }

    .av-badge-n {
        font-family: var(--f-d);
        font-size: 38px;
        line-height: 1;
        letter-spacing: .02em;
    }

    .av-badge-l {
        font-family: var(--f-c);
        font-size: 8.5px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: rgba(26, 26, 16, .6);
        margin-top: 4px;
    }

    /* ── FEATURES ── */
    .features {
        background: var(--cream-2);
    }

    .feat-wrap {
        max-width: var(--max);
        margin: 0 auto;
        padding: var(--sec-py) var(--px);
    }

    .feat-top {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--s14);
        align-items: end;
        margin-bottom: var(--s14);
    }

    .feat-sub {
        font-family: var(--f-b);
        font-size: 15px;
        letter-spacing: .02em;
        color: var(--muted);
        line-height: 1.78;
        max-width: 320px;
        padding-bottom: 6px;
    }

    .feat-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 3px;
        border: 2.5px solid var(--ink);
        overflow: hidden;
    }

    .fc {
        background: var(--ink-2);
        padding: var(--s12) var(--s8) var(--s10);
        transition: background var(--t2);
        cursor: default;
        position: relative;
        overflow: hidden;
    }

    .fc::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2.5px;
        background: var(--amber);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .4s var(--ease);
    }

    .fc:hover::before {
        transform: scaleX(1);
    }

    .fc:hover {
        background: var(--ink-3);
    }

    .fc-ico {
        width: 42px;
        height: 42px;
        border: 1.5px solid rgba(242, 234, 216, .11);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: var(--s6);
        transition: border-color var(--t2), background var(--t2);
    }

    .fc:hover .fc-ico {
        border-color: rgba(212, 146, 10, .3);
        background: rgba(212, 146, 10, .06);
    }

    .fc-ico svg {
        stroke: rgba(242, 234, 216, .42);
        transition: stroke var(--t2), transform var(--t2);
    }

    .fc:hover .fc-ico svg {
        stroke: var(--amber-2);
        transform: scale(1.12);
    }

    .fc-t {
        font-family: var(--f-d);
        font-size: clamp(20px, 2.2vw, 28px);
        letter-spacing: .04em;
        color: var(--cream);
        margin-bottom: 10px;
        transition: color var(--t2);
    }

    .fc:hover .fc-t {
        color: var(--amber);
    }

    .fc-d {
        font-size: 13.5px;
        color: rgba(242, 234, 216, .36);
        line-height: 1.72;
        font-weight: 300;
    }

    /* ── SERVICES ── */
    .services {
        background: var(--ink);
    }

    .svc-wrap {
        max-width: var(--max);
        margin: 0 auto;
    }

    .svc-hdr {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        padding: var(--sec-py) var(--px) var(--s14);
        border-bottom: 1px solid var(--l-border);
        flex-wrap: wrap;
        gap: var(--s6);
    }

    .svc-h {
        font-family: var(--f-d);
        font-size: clamp(48px, 7.5vw, 104px);
        line-height: .86;
        letter-spacing: .02em;
        color: var(--cream);
    }

    .svc-h span {
        color: var(--amber);
    }

    .svc-list {
        padding: 0 var(--px) var(--sec-py);
    }

    .svc-row {
        display: grid;
        grid-template-columns: 64px 1fr auto auto;
        align-items: center;
        gap: var(--s8);
        padding: 20px 0;
        border-top: 1px solid var(--l-border);
        transition: padding-left var(--t2);
        cursor: default;
    }

    .svc-row:last-child {
        border-bottom: 1px solid var(--l-border);
    }

    .svc-row:hover {
        padding-left: 16px;
    }

    .svc-row:hover .svc-num,
    .svc-row:hover .svc-t {
        color: var(--amber);
    }

    .svc-row:hover .svc-arr {
        border-color: rgba(212, 146, 10, .4);
        transform: rotate(-45deg) translate(2px, -2px);
    }

    .svc-row:hover .svc-arr svg {
        stroke: var(--amber);
    }

    .svc-num {
        font-family: var(--f-d);
        font-size: 14px;
        letter-spacing: .1em;
        color: rgba(242, 234, 216, .14);
        transition: color var(--t2);
    }

    .svc-body {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .svc-t {
        font-family: var(--f-d);
        font-size: clamp(20px, 2.6vw, 34px);
        letter-spacing: .03em;
        color: var(--cream);
        transition: color var(--t2);
    }

    .svc-d {
        font-size: 13.5px;
        color: rgba(242, 234, 216, .3);
        line-height: 1.65;
        font-weight: 300;
        max-width: 420px;
    }

    .svc-ico {
        width: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: .3;
        transition: opacity var(--t2), transform var(--t2);
    }

    .svc-row:hover .svc-ico {
        opacity: .85;
        transform: scale(1.18) rotate(-5deg);
    }

    .svc-arr {
        width: 36px;
        height: 36px;
        border: 1.5px solid rgba(242, 234, 216, .1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: border-color var(--t2), transform var(--t2);
    }

    .svc-arr svg {
        stroke: rgba(242, 234, 216, .18);
        transition: stroke var(--t2);
    }

    /* ── CAMPAIGNS ── */
    .campaigns {
        background: var(--cream);
    }

    .camp-wrap {
        max-width: var(--max);
        margin: 0 auto;
        padding: var(--sec-py) var(--px);
    }

    .camp-hdr {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: var(--s14);
        flex-wrap: wrap;
        gap: var(--s8);
    }

    .camp-h {
        font-family: var(--f-d);
        font-size: clamp(48px, 7.5vw, 104px);
        line-height: .86;
        letter-spacing: .02em;
        color: var(--ink);
    }

    .camp-h span {
        color: var(--olive);
    }

    .camp-see {
        font-family: var(--f-c);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        border-bottom: 2px solid var(--ink);
        padding-bottom: 2px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: color var(--t1), border-color var(--t1);
        align-self: flex-end;
        margin-bottom: 4px;
    }

    .camp-see:hover {
        color: var(--amber);
        border-color: var(--amber);
    }

    .camp-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 3px;
        border: 2.5px solid var(--ink);
        overflow: hidden;
    }

    .ccard {
        position: relative;
        background: var(--ink-2);
        overflow: hidden;
        display: block;
        transition: background var(--t2);
    }

    .ccard:hover {
        background: var(--ink-3);
    }

    .ccard.feat {
        grid-column: span 8;
    }

    .ccard.sm {
        grid-column: span 4;
    }

    .c-img {
        overflow: hidden;
        position: relative;
    }

    .c-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(.46) saturate(.68);
        transition: transform .9s var(--ease), filter .9s;
    }

    .ccard:hover .c-img img {
        transform: scale(1.08);
        filter: brightness(.68) saturate(1);
    }

    .c-img::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(26, 26, 16, .98) 0%, transparent 55%);
    }

    .ccard.feat .c-img {
        height: 360px;
    }

    .ccard.sm .c-img {
        height: 210px;
    }

    .c-ph {
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--ink);
    }

    .c-ph span {
        font-family: var(--f-d);
        font-size: 48px;
        color: rgba(242, 234, 216, .04);
    }

    .c-body {
        padding: 22px;
    }

    .ccard.feat .c-body {
        padding: 28px;
    }

    .c-auth {
        font-family: var(--f-c);
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .24em;
        text-transform: uppercase;
        color: var(--amber);
        opacity: .72;
        margin-bottom: 8px;
        display: block;
    }

    .c-t {
        font-family: var(--f-d);
        font-size: clamp(18px, 2vw, 28px);
        letter-spacing: .02em;
        color: var(--cream);
        line-height: 1.1;
        margin-bottom: 7px;
        transition: color var(--t2);
    }

    .ccard.feat .c-t {
        font-size: clamp(24px, 2.8vw, 38px);
    }

    .ccard:hover .c-t {
        color: var(--amber-2);
    }

    .c-d {
        font-size: 13px;
        color: rgba(242, 234, 216, .34);
        line-height: 1.65;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .c-cta {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 14px;
        font-family: var(--f-c);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .2);
        transition: color var(--t2), gap var(--t2);
    }

    .ccard:hover .c-cta {
        color: var(--amber-2);
        gap: 12px;
    }

    .camp-empty {
        grid-column: span 12;
        padding: 72px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 14px;
        background: var(--ink-2);
    }

    .camp-empty-h {
        font-family: var(--f-d);
        font-size: 38px;
        color: rgba(242, 234, 216, .15);
    }

    /* ── STATS ── */
    .stats-sec {
        background: var(--olive);
        position: relative;
        overflow: hidden;
    }

    .stats-sec::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 70% 80% at 50% 50%, rgba(212, 146, 10, .08) 0%, transparent 70%);
        pointer-events: none;
    }

    .stats-inner {
        max-width: var(--max);
        margin: 0 auto;
        padding: var(--sec-py) var(--px);
    }

    .stats-top {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--s14);
        align-items: end;
        margin-bottom: var(--s14);
    }

    .stats-h {
        font-family: var(--f-d);
        font-size: clamp(42px, 6.5vw, 88px);
        line-height: .88;
        letter-spacing: .02em;
        color: var(--cream);
    }

    .stats-h span {
        color: var(--amber);
    }

    .stats-sub {
        font-family: var(--f-s);
        font-style: italic;
        font-size: 16px;
        letter-spacing: .02em;
        color: rgba(242, 234, 216, .4);
        line-height: 1.8;
        max-width: 320px;
        padding-bottom: 6px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2px;
        background: rgba(242, 234, 216, .1);
        border: 1.5px solid rgba(242, 234, 216, .12);
        overflow: hidden;
    }

    .stat-cell {
        background: rgba(242, 234, 216, .04);
        padding: 32px 24px;
        border-right: 1px solid rgba(242, 234, 216, .08);
        transition: background var(--t2);
        cursor: default;
    }

    .stat-cell:last-child {
        border-right: none;
    }

    .stat-cell:hover {
        background: rgba(242, 234, 216, .10);
    }

    .stat-n {
        font-family: var(--f-d);
        font-size: clamp(40px, 6vw, 70px);
        line-height: 1;
        letter-spacing: .02em;
        color: var(--amber);
    }

    .stat-l {
        font-family: var(--f-c);
        font-size: 9.5px;
        font-weight: 700;
        letter-spacing: .24em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .36);
        margin-top: 7px;
    }

    /* ── TESTIMONIALS ── */
    .testi {
        background: var(--cream-2);
    }

    .testi-wrap {
        max-width: var(--max);
        margin: 0 auto;
        padding: var(--sec-py) var(--px);
    }

    .testi-hdr {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: var(--s14);
        flex-wrap: wrap;
        gap: var(--s6);
    }

    .testi-h {
        font-family: var(--f-d);
        font-size: clamp(42px, 6.5vw, 88px);
        line-height: .88;
        letter-spacing: .02em;
        color: var(--ink);
    }

    .testi-h em {
        font-family: var(--f-s);
        font-style: italic;
        color: var(--amber);
    }

    .testi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 3px;
        border: 2.5px solid var(--ink);
        overflow: hidden;
    }

    .tcard {
        background: var(--ink-2);
        padding: var(--s12) var(--s8);
        position: relative;
        overflow: hidden;
        transition: background var(--t2);
    }

    .tcard::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2.5px;
        background: var(--amber);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .4s var(--ease);
    }

    .tcard:hover {
        background: var(--ink-3);
    }

    .tcard:hover::before {
        transform: scaleX(1);
    }

    .tcard-qi {
        width: 28px;
        height: 28px;
        margin-bottom: var(--s6);
        opacity: .28;
    }

    .tcard-qi svg {
        stroke: var(--amber-2);
    }

    .tcard-stars {
        display: flex;
        gap: 4px;
        margin-bottom: var(--s4);
    }

    .tcard-stars svg {
        stroke: var(--amber);
        fill: var(--amber);
    }

    .tcard-q {
        font-family: var(--f-s);
        font-style: italic;
        font-size: clamp(13.5px, 1.4vw, 15px);
        color: rgba(242, 234, 216, .58);
        line-height: 1.82;
        margin-bottom: var(--s8);
    }

    .tcard-author {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .tcard-name {
        font-family: var(--f-c);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .6);
    }

    .tcard-role {
        font-size: 12px;
        color: rgba(242, 234, 216, .28);
    }

    /* ── PROCESS ── */
    .process {
        background: var(--ink);
    }

    .proc-wrap {
        max-width: var(--max);
        margin: 0 auto;
    }

    .proc-hdr {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        padding: var(--sec-py) var(--px) var(--s14);
        border-bottom: 1px solid var(--l-border);
        flex-wrap: wrap;
        gap: var(--s6);
    }

    .proc-h {
        font-family: var(--f-d);
        font-size: clamp(48px, 7.5vw, 104px);
        line-height: .86;
        letter-spacing: .02em;
        color: var(--cream);
    }

    .proc-h span {
        color: var(--amber);
    }

    .proc-sub {
        font-family: var(--f-s);
        font-style: italic;
        font-size: 15px;
        letter-spacing: .02em;
        color: rgba(242, 234, 216, .36);
        max-width: 300px;
        line-height: 1.8;
        padding-bottom: 6px;
    }

    .proc-rows {
        padding: 0 var(--px);
    }

    .proc-row {
        display: grid;
        grid-template-columns: 80px 1fr 1fr;
        border-top: 1px solid var(--l-border);
        min-height: 180px;
        transition: background var(--t2);
    }

    .proc-row:last-child {
        border-bottom: 1px solid var(--l-border);
    }

    .proc-row:hover {
        background: rgba(242, 234, 216, .018);
    }

    .proc-nn {
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--f-d);
        font-size: clamp(50px, 7.5vw, 90px);
        line-height: 1;
        letter-spacing: -.04em;
        color: rgba(242, 234, 216, .06);
        border-right: 1px solid var(--l-border);
        transition: color .5s;
    }

    .proc-row:hover .proc-nn {
        color: rgba(242, 234, 216, .2);
    }

    .proc-l {
        padding: 28px var(--s8);
        display: flex;
        flex-direction: column;
        justify-content: center;
        border-right: 1px solid var(--l-border);
    }

    .proc-r {
        padding: 28px var(--s8);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .proc-tag {
        font-family: var(--f-c);
        font-size: 9.5px;
        font-weight: 700;
        letter-spacing: .28em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .28);
        margin-bottom: 10px;
        transition: color var(--t2);
    }

    .proc-row:hover .proc-tag {
        color: var(--amber);
    }

    .proc-title {
        font-family: var(--f-d);
        font-size: clamp(22px, 2.8vw, 40px);
        letter-spacing: .02em;
        color: rgba(242, 234, 216, .3);
        line-height: .92;
        transition: color .5s;
    }

    .proc-row:hover .proc-title {
        color: var(--cream);
    }

    .proc-ico {
        width: 32px;
        height: 32px;
        margin-bottom: 14px;
        opacity: .32;
        transition: opacity var(--t2), transform var(--t2);
    }

    .proc-ico svg {
        stroke: var(--cream);
    }

    .proc-row:hover .proc-ico {
        opacity: .9;
        transform: scale(1.14) rotate(-5deg);
    }

    .proc-desc {
        font-size: 14px;
        color: rgba(242, 234, 216, .38);
        line-height: 1.82;
        font-weight: 300;
        max-width: 380px;
    }

    .proc-cta {
        padding: var(--s16) var(--px);
        display: flex;
        justify-content: center;
    }

    /* ── CTA ── */
    .cta-sec {
        background: var(--cream);
        position: relative;
        overflow: hidden;
    }

    .cta-ghost {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: var(--f-d);
        font-size: clamp(68px, 14vw, 220px);
        letter-spacing: -.02em;
        line-height: 1;
        color: transparent;
        -webkit-text-stroke: 1.5px rgba(26, 26, 16, .055);
        white-space: nowrap;
        pointer-events: none;
        user-select: none;
    }

    .cta-inner {
        position: relative;
        z-index: 2;
        max-width: var(--max);
        margin: 0 auto;
        padding: var(--sec-py) var(--px);
        text-align: center;
    }

    .cta-h {
        font-family: var(--f-d);
        font-size: clamp(52px, 9vw, 132px);
        line-height: .84;
        letter-spacing: .02em;
        color: var(--ink);
        margin-bottom: var(--s12);
    }

    .cta-h span {
        color: var(--amber);
    }

    .cta-btns {
        display: flex;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: var(--s8);
    }

    .cta-sub {
        font-family: var(--f-c);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: rgba(26, 26, 16, .3);
    }

    /* ── RESPONSIVE ── */
    @media(max-width:1100px) {

        .about-wrap,
        .feat-top,
        .stats-top {
            grid-template-columns: 1fr;
        }

        .av {
            height: 380px;
        }

        .feat-grid {
            grid-template-columns: 1fr 1fr;
        }

        .ccard.feat {
            grid-column: span 12;
        }

        .ccard.sm {
            grid-column: span 6;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .testi-grid {
            grid-template-columns: 1fr;
        }

        .proc-row {
            grid-template-columns: 64px 1fr;
        }

        .proc-r {
            display: none;
        }

        .hero-float-l,
        .hero-float-r,
        .hero-vert-r {
            display: none;
        }

        .hero-body {
            padding-top: calc(var(--nav-h)+60px);
        }
    }

    @media(max-width:900px) {
        .svc-row {
            grid-template-columns: 56px 1fr;
        }

        .svc-ico,
        .svc-arr,
        .svc-d {
            display: none;
        }

        .av-badge {
            display: none;
        }
    }

    @media(max-width:768px) {
        .hero-stats {
            grid-template-columns: 1fr 1fr;
        }

        .hs-cell {
            padding: 18px;
        }

        .about-stats {
            grid-template-columns: 1fr 1fr;
        }

        .feat-grid {
            grid-template-columns: 1fr;
        }

        .ccard.sm {
            grid-column: span 12;
        }

        .ccard.feat .c-img {
            height: 260px;
        }

        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }

        .testi-grid {
            grid-template-columns: 1fr;
        }

        .proc-row {
            min-height: auto;
        }

        .proc-l {
            padding: 22px var(--s6);
        }

        .proc-nn {
            font-size: 42px;
        }
    }

    @media(max-width:540px) {

        .hero-btns,
        .cta-btns {
            flex-direction: column;
            align-items: center;
        }

        .hero-h1 {
            font-size: clamp(60px, 17vw, 120px);
        }
    }
</style>

<!-- ─── HERO ─────────────────────────────────────────────────── -->
<section class="hero" aria-labelledby="h-hero">
    <div class="h-glow hg1" aria-hidden="true"></div>
    <div class="h-glow hg2" aria-hidden="true"></div>
    <div class="h-glow hg3" aria-hidden="true"></div>
    <div class="h-glow hg4" aria-hidden="true"></div>

    <!-- Floating LEFT -->
    <div class="hero-float-l" aria-hidden="true">
        <div class="spin-badge">
            <div class="spin-badge-ring">
                <div class="spin-badge-inner">
                    <span class="spin-badge-n">32%</span>
                    <span class="spin-badge-l">OTT Share</span>
                </div>
            </div>
        </div>
        <div class="hero-chip">
            <div class="hero-chip-dot"></div>
            <div>
                <div class="hero-chip-txt">Campaigns</div>
                <div class="hero-chip-val">300+</div>
            </div>
        </div>
        <div class="hero-chip" style="animation-delay:3s">
            <div class="hero-chip-dot" style="background:var(--olive-l)"></div>
            <div>
                <div class="hero-chip-txt">Creators</div>
                <div class="hero-chip-val">10K+</div>
            </div>
        </div>
        <!-- <div class="hero-scroll-cue" style="margin-top:var(--s8)">
            <div class="hero-scroll-line"></div>
            <span class="hero-scroll-t">Scroll</span>
        </div> -->
    </div>

    <!-- CENTER -->
    <div class="hero-body">
        <div class="hero-eye">India's Premier Cinema Marketing Studio</div>
        <h1 class="hero-h1" id="h-hero">
            <span class="line-solid">WHERE</span>
            <span class="line-outline">CINEMA</span>
            <span class="line-gold">MEETS</span>
        </h1>
        <p class="hero-sub">
            <?= htmlspecialchars($settings['hero_subtext'] ?? 'Authentic influencer campaigns, viral content and cinematic promotions that move audiences and fill seats.') ?>
        </p>
        <div class="hero-btns">
            <a href="#hp-camp" class="btn btn-amber btn-lg">Explore Our Work</a>
            <a href="<?= base_url('contact') ?>" class="btn btn-ol-lt btn-lg">Start a Campaign</a>
        </div>
    </div>

    <!-- Floating RIGHT -->
    <div class="hero-float-r" aria-hidden="true">
        <div class="hfc">
            <div class="hfc-n" style="color:var(--amber)">300+</div>
            <div class="hfc-l">Campaigns</div>
        </div>
        <div class="hfc-div"></div>
        <div class="hfc">
            <div class="hfc-n" style="color:var(--olive-l)">12M+</div>
            <div class="hfc-l">People Reached</div>
        </div>
        <div class="hfc-div"></div>
        <div class="hfc">
            <div class="hfc-n" style="color:var(--cream)">70+</div>
            <div class="hfc-l">Screenings</div>
        </div>
        <div class="hfc-div"></div>
        <div class="hfc">
            <div class="hfc-n" style="color:var(--amber-3)">150+</div>
            <div class="hfc-l">Films Promoted</div>
        </div>
    </div>

    <!-- Vertical right label -->
    <!-- <div class="hero-vert-r" aria-hidden="true">Cinema · Culture · Commerce</div> -->

    <!-- Stats bar -->
    <!-- <div class="hero-stats" aria-label="Key metrics">
        <?php foreach (
            [
                [$settings['stat_campaigns'] ?? '300+', 'Campaigns'],
                ['32%', 'OTT Releases'],
                [$settings['stat_reach'] ?? '12M+', 'People Reached'],
                [$settings['stat_movies'] ?? '150+', 'Films Promoted'],
            ] as $hs
        ): ?>
            <div class="hs-cell">
                <div class="hs-n"><?= htmlspecialchars($hs[0]) ?></div>
                <div class="hs-l"><?= htmlspecialchars($hs[1]) ?></div>
            </div>
        <?php endforeach; ?>
    </div> -->
</section>

<!-- ─── TICKER ─────────────────────────────────────────────── -->
<div class="ticker" aria-hidden="true">
    <div class="mq-wrap">
        <div class="mq-track mq-l" style="--d:32s">
            <?php $tw = ['WHERE CINEMA MEETS CULTURE', 'INFLUENCER MARKETING', 'FILM PROMOTIONS', 'MEME MARKETING', 'VIDEO PRODUCTION', 'CELEBRITY ENDORSEMENTS', 'OTT STRATEGY', 'ON-GROUND ACTIVATIONS'];
            foreach (array_merge($tw, $tw) as $w): ?>
                <span class="tk-w"><?= htmlspecialchars($w) ?></span><span class="tk-sep">&#8725;</span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ─── BRANDS ─────────────────────────────────────────────── -->
<div class="brands" aria-label="Brand partners">
    <div class="mq-wrap">
        <div class="mq-track mq-l" style="--d:40s">
            <?php foreach (array_merge($brands, $brands) as $b): ?>
                <span class="brand-chip"><?= htmlspecialchars($b) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ─── ABOUT ─────────────────────────────────────────────── -->
<section class="about" aria-labelledby="h-about">
    <div class="about-wrap">
        <div>
            <p class="s-lbl rv" style="color:var(--amber);margin-bottom:16px">Who We Are</p>
            <h2 id="h-about" class="about-h rv d1">CRAFTING<br><span class="ul">CINEMATIC</span><br>IMPACT</h2>
            <p class="about-body rv d2">
                <?= htmlspecialchars($settings['about_text'] ?? 'The Cine Caffe is a premium cinema marketing studio driving high-impact campaigns for brands and production houses across entertainment, culture, and commerce.') ?>
            </p>
            <a href="<?= base_url('about') ?>" class="about-cta rv d3">Our Full Story <?= svg('arrow-r', 14) ?></a>
            <div class="about-stats rv d4">
                <?php foreach (
                    [
                        [$settings['stat_campaigns'] ?? '300+', 'Campaigns', 'var(--amber)'],
                        ['32%', 'OTT Releases', 'var(--olive-l)'],
                        [$settings['stat_reach'] ?? '12M+', 'Reached', 'var(--amber)'],
                        [$settings['stat_screenings'] ?? '70+', 'Screenings', 'var(--olive-l)'],
                    ] as $as
                ): ?>
                    <div class="as-c">
                        <div class="as-n" style="color:<?= $as[2] ?>"><?= htmlspecialchars($as[0]) ?></div>
                        <div class="as-l"><?= htmlspecialchars($as[1]) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="av rv sr d2">
            <div class="av-badge">
                <div class="av-badge-n">32%</div>
                <div class="av-badge-l">Of All OTT Releases</div>
            </div>
            <div class="av-main">
                <div class="av-yr" aria-hidden="true"><?= date('Y') ?></div>
                <div class="av-facts">
                    <?php foreach ([['film', 'End-to-End Campaign Management'], ['globe', '10,000+ Creator Network'], ['pin', 'Pan-India Coverage'], ['zap', '24–48h Response Time'], ['award', '300+ Successful Campaigns'], ['play', '32% of All OTT Releases']] as $f): ?>
                        <div class="av-fact">
                            <?= svg($f[0], 16, 16, 'rgba(242,234,216,.4)', 1.7) ?>
                            <span class="av-ft"><?= htmlspecialchars($f[1]) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ─── FEATURES ─────────────────────────────────────────── -->
<section class="features">
    <div class="feat-wrap">
        <div class="feat-top">
            <div class="rv sl">
                <p class="s-lbl" style="color:var(--olive);margin-bottom:14px">Our Strengths</p>
                <h2 style="font-family:var(--f-d);font-size:clamp(44px,7vw,92px);line-height:.88;letter-spacing:.02em">
                    WHY <span style="color:var(--amber)">CHOOSE US</span></h2>
            </div>
            <p class="feat-sub rv sr">A refined studio crafting authentic campaigns that move audiences and build
                lasting brand authority across India's entertainment landscape.</p>
        </div>
        <div class="feat-grid rv ss d2">
            <?php foreach ($feats as $i => $fc): ?>
                <div class="fc rv d<?= $i + 1 ?>">
                    <div class="fc-ico"><?= svg($fc[0], 19, 19, 'rgba(242,234,216,.4)', 1.7) ?></div>
                    <div class="fc-t"><?= htmlspecialchars($fc[1]) ?></div>
                    <p class="fc-d"><?= htmlspecialchars($fc[2]) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ─── SERVICES ─────────────────────────────────────────── -->
<section class="services" aria-labelledby="h-svc">
    <div class="svc-wrap">
        <div class="svc-hdr">
            <div class="rv">
                <p class="s-lbl" style="color:rgba(242,234,216,.28);margin-bottom:14px">What We Do</p>
                <h2 id="h-svc" class="svc-h">OUR <span>SERVICES</span></h2>
            </div>
            <a href="<?= base_url('contact') ?>" class="btn btn-ol-lt rv" style="align-self:flex-end">Work With Us</a>
        </div>
        <ul class="svc-list">
            <?php foreach ($svcs as $i => $sv): ?>
                <li class="svc-row rv d<?= ($i % 5) + 1 ?>">
                    <span class="svc-num">0<?= $i + 1 ?></span>
                    <div class="svc-body">
                        <span class="svc-t"><?= $sv[1] ?></span>
                        <span class="svc-d"><?= htmlspecialchars($sv[2]) ?></span>
                    </div>
                    <div class="svc-ico"><?= svg($sv[0], 18, 18, 'rgba(242,234,216,.4)', 1.7) ?></div>
                    <div class="svc-arr"><?= svg('arrow-ur', 13, 13, 'rgba(242,234,216,.2)', 2) ?></div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<!-- ─── CAMPAIGNS ─────────────────────────────────────────── -->
<section class="campaigns" id="hp-camp" aria-labelledby="h-camp">
    <div class="camp-wrap">
        <div class="camp-hdr">
            <div class="rv sl">
                <p class="s-lbl" style="color:var(--olive);margin-bottom:14px">Case Studies</p>
                <h2 id="h-camp" class="camp-h">SIGNATURE <span>CAMPAIGNS</span></h2>
            </div>
            <a href="<?= base_url('work') ?>" class="camp-see rv sr">View All Work
                <?= svg('arrow-r', 12, 12, 'currentColor', 2) ?></a>
        </div>
        <div class="camp-grid rv ss">
            <?php if (empty($posts)): ?>
                <div class="camp-empty">
                    <p class="camp-empty-h">Coming Soon</p>
                    <p style="font-size:14px;color:rgba(242,234,216,.18)">Great campaigns in the making — check back soon.
                    </p>
                </div>
                <?php else: foreach ($posts as $i => $p):
                    $feat = ($i === 0);
                    $cls = $feat ? 'feat' : 'sm'; ?>
                    <a href="<?= base_url('post/' . $p['slug']) ?>" class="ccard <?= $cls ?>">
                        <?php if (!empty($p['image'])): ?>
                            <div class="c-img" style="height:<?= $feat ? '360px' : '210px' ?>">
                                <img src="<?= base_url('assets/images/uploads/' . $p['image']) ?>"
                                    alt="<?= htmlspecialchars($p['title']) ?>" loading="lazy">
                            </div>
                        <?php else: ?>
                            <div class="c-img c-ph" style="height:<?= $feat ? '360px' : '210px' ?>"><span>Cine</span></div>
                        <?php endif; ?>
                        <div class="c-body">
                            <span class="c-auth"><?= htmlspecialchars($p['author']) ?></span>
                            <h3 class="c-t"><?= htmlspecialchars($p['title']) ?></h3>
                            <p class="c-d"><?= htmlspecialchars(mb_substr($p['description'], 0, 100)) ?>&#8230;</p>
                            <div class="c-cta">View Campaign &rarr;</div>
                        </div>
                    </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<!-- ─── STATS ─────────────────────────────────────────────── -->
<section class="stats-sec" aria-label="Studio statistics">
    <div class="stats-inner">
        <div class="stats-top">
            <h2 class="stats-h rv sl">NUMBERS THAT<br><span>SPEAK</span></h2>
            <p class="stats-sub rv sr">Measurable results that prove cultural impact at scale — campaign after campaign,
                release after release.</p>
        </div>
        <div class="stats-grid rv ss d1">
            <?php foreach ([['300', 'Campaigns Delivered', '+'], ['12', 'Million People Reached', 'M+'], ['32', 'Of All OTT Releases', '%'], ['70', 'Influencer Screenings', '+']] as $i => $st): ?>
                <div class="stat-cell rv d<?= $i + 1 ?>">
                    <div class="stat-n"><span data-target="<?= $st[0] ?>" data-suffix="<?= $st[2] ?>">0<?= $st[2] ?></span>
                    </div>
                    <div class="stat-l"><?= htmlspecialchars($st[1]) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ─── TESTIMONIALS ─────────────────────────────────────── -->
<section class="testi" aria-labelledby="h-testi">
    <div class="testi-wrap">
        <div class="testi-hdr">
            <div class="rv sl">
                <p class="s-lbl" style="color:var(--olive-d);margin-bottom:14px">Client Love</p>
                <h2 id="h-testi" class="testi-h">WHAT CLIENTS <em>Say</em></h2>
            </div>
        </div>
        <div class="testi-grid rv ss">
            <?php foreach ($testi as $i => $t): ?>
                <div class="tcard rv d<?= $i + 1 ?>">
                    <div class="tcard-qi"><?= svg('quote', 28, 28, 'var(--amber-2)', 1.4) ?></div>
                    <div class="tcard-stars">
                        <?php for ($s = 0; $s < 5; $s++): ?><span><?= svg('star', 12, 12, 'var(--amber)', 1.5) ?></span><?php endfor; ?>
                    </div>
                    <blockquote class="tcard-q"><?= htmlspecialchars($t[0]) ?></blockquote>
                    <div class="tcard-author">
                        <cite class="tcard-name"><?= $t[1] ?></cite>
                        <span class="tcard-role"><?= $t[2] ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ─── PROCESS ──────────────────────────────────────────── -->
<section class="process" aria-labelledby="h-proc">
    <div class="proc-wrap">
        <div class="proc-hdr">
            <div class="rv">
                <p class="s-lbl" style="color:rgba(242,234,216,.26);margin-bottom:14px">How We Work</p>
                <h2 id="h-proc" class="proc-h">OUR <span>PROCESS</span></h2>
            </div>
            <p class="proc-sub rv d2">A refined four-act framework that transforms brands into cultural icons —
                consistently.</p>
        </div>
        <ul class="proc-rows">
            <?php foreach ($procs as $i => $p): ?>
                <li class="proc-row rv d<?= $i + 1 ?>">
                    <div class="proc-nn" aria-hidden="true">0<?= $i + 1 ?></div>
                    <div class="proc-l">
                        <div class="proc-tag">0<?= $i + 1 ?> &mdash; <?= htmlspecialchars($p[1]) ?></div>
                        <div class="proc-title"><?= strtoupper(htmlspecialchars($p[1])) ?></div>
                    </div>
                    <div class="proc-r">
                        <div class="proc-ico"><?= svg($p[0], 30, 30, 'var(--cream)', 1.6) ?></div>
                        <p class="proc-desc"><?= htmlspecialchars($p[2]) ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="proc-cta rv"><a href="<?= base_url('contact') ?>" class="btn btn-amber btn-lg">Start Your Campaign
                &rarr;</a></div>
    </div>
</section>

<!-- ─── CTA ──────────────────────────────────────────────── -->
<section class="cta-sec" aria-label="Call to action">
    <div class="cta-ghost" aria-hidden="true">Extraordinary</div>
    <div class="cta-inner">
        <p class="s-lbl rv" style="color:var(--olive);justify-content:center;margin:0 auto 18px">Ready to Begin?</p>
        <h2 class="cta-h rv d1">LET&#8217;S CREATE<br>SOMETHING <span>EXTRAORDINARY</span></h2>
        <div class="cta-btns rv d2">
            <a href="<?= base_url('contact') ?>" class="btn btn-ink btn-lg">Start a Campaign</a>
            <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'contact@thecinecaffe.com') ?>"
                class="btn btn-ol-dk btn-lg">Email Us</a>
        </div>
        <p class="cta-sub rv d3">
            <?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?> &nbsp;&middot;&nbsp;
            <?= htmlspecialchars($settings['site_email'] ?? 'contact@thecinecaffe.com') ?>
        </p>
    </div>
</section>

<script>
    (function() {
        function fixCamp() {
            var f = document.querySelector('.ccard.feat'),
                sm = document.querySelectorAll('.ccard.sm');
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
        document.querySelectorAll('a[href^="#"]').forEach(function(a) {
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
    }());
</script>