<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    /* ================================================================
   FORCE HIDDEN LAYOUT ELEMENTS FOR COMING SOON STATE
================================================================ */
    
    /* Suppress the global navigation bar and footer */
    #g-nav, 
    #g-foot {
        display: none !important;
    }

    /* Reset global main content spacing since navbar is hidden */
    #main-content {
        padding-top: 0 !important;
        margin-top: 0 !important;
    }

    /* Force the custom cursor adjustments if coarse touch fallback isn't active */
    body {
        overflow-x: hidden;
    }

    /* ================================================================
   COMING SOON / UNDER CONSTRUCTION STATE — HouseOfSocial
================================================================ */

    .h-soon {
        position: relative;
        min-height: 100svh; /* Span full viewport height perfectly */
        overflow: hidden;
        background: var(--s0);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: var(--sec) var(--px);
    }

    .h-soon-bg {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 0;
        background:
            radial-gradient(ellipse 60% 55% at 50% 45%, rgba(255, 60, 0, .08) 0%, transparent 65%),
            radial-gradient(ellipse 35% 45% at 15% 75%, rgba(200, 241, 53, .02) 0%, transparent 60%);
    }

    .h-soon-grid {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 0;
        background-image:
            linear-gradient(rgba(244, 241, 236, .012) 1px, transparent 1px),
            linear-gradient(90deg, rgba(244, 241, 236, .012) 1px, transparent 1px);
        background-size: 80px 80px;
        -webkit-mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, #000 40%, transparent 100%);
        mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, #000 40%, transparent 100%);
    }

    .h-soon-inner {
        position: relative;
        z-index: 3;
        text-align: center;
        max-width: 900px;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .h-soon-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .25em;
        text-transform: uppercase;
        color: var(--flame);
        margin-bottom: 24px;
        opacity: 0;
        animation: soonUp .6s var(--ease) .1s forwards;
    }

    .h-soon-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #22c55e;
        box-shadow: 0 0 10px #22c55e;
        animation: blink 1.8s ease-in-out infinite;
    }

    .h-soon-headline {
        font-family: var(--fDisplay);
        font-size: clamp(48px, 8.5vw, 120px);
        font-weight: 700;
        line-height: .9;
        letter-spacing: -.04em;
        color: var(--paper);
        opacity: 0;
        animation: soonUp 1s var(--ease) .25s forwards;
        margin-bottom: 24px;
    }

    .h-soon-headline em {
        font-style: normal;
        color: var(--flame);
    }

    .h-soon-sub {
        font-size: clamp(15px, 1.6vw, 19px);
        color: rgba(244, 241, 236, 0.65);
        line-height: 1.75;
        max-width: 540px;
        opacity: 0;
        animation: soonUp .8s var(--ease) .5s forwards;
        margin-bottom: 40px;
    }

    .h-soon-btns {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
        justify-content: center;
        opacity: 0;
        animation: soonUp .7s var(--ease) .7s forwards;
    }

    @keyframes soonUp {
        from {
            opacity: 0;
            transform: translateY(24px)
        }
        to {
            opacity: 1;
            transform: none
        }
    }

    @media(max-width:640px) {
        .h-soon-btns {
            flex-direction: column;
            width: 100%;
            max-width: 320px;
        }
        .h-soon-btns .btn-primary,
        .h-soon-btns .btn-outline {
            width: 100%;
            justify-content: center;
        }
    }

    /* Minimal Ticker Layer */
    .h-soon-ticker {
        background: var(--s1);
        border-top: 1px solid var(--b1);
        border-bottom: 1px solid var(--b1);
        padding: 16px 0;
        width: 100%;
        overflow: hidden;
    }

    .h-soon-ticker-word {
        font-family: var(--fDisplay);
        font-size: clamp(13px, 1.5vw, 18px);
        font-weight: 700;
        color: rgba(244, 241, 236, 0.25);
        white-space: nowrap;
        padding: 0 32px;
        display: inline-block;
        letter-spacing: .04em;
    }

    .h-soon-ticker-sep {
        color: var(--flame);
    }
</style>

<section class="h-soon" aria-labelledby="soon-headline">
    <div class="h-soon-bg" aria-hidden="true"></div>
    <div class="h-soon-grid" aria-hidden="true"></div>

    <div class="h-soon-inner">
        <div class="h-soon-eyebrow">
            <span class="h-soon-dot"></span>
            Cooking Something Epic
        </div>
        
        <h1 class="h-soon-headline" id="soon-headline">
            Going Live<br><em>Very Soon.</em>
        </h1>
        
        <p class="h-soon-sub">
            We are fine-tuning our digital presence to match our culture-first approach. In the meantime, you can see what we're building and catch our latest updates directly on our Instagram.
        </p>
        
        <div class="h-soon-btns">
            <a href="https://www.instagram.com/houseofsocial.hos/" class="btn-primary lg" target="_blank" rel="noopener noreferrer" data-no-wipe>
                Follow on Instagram &rarr;
            </a>
            <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?>" class="btn-outline" data-no-wipe>
                Drop an Email
            </a>
        </div>
    </div>
</section>

<!--<div class="h-soon-ticker" aria-hidden="true">-->
<!--    <div class="mq-wrap">-->
<!--        <div class="mq-track mq-l" style="--d:30s">-->
<!--            <?php foreach (array_merge(['MEME MARKETING', 'CREATOR ECONOMY', 'INTERNET NATIVE', 'VIRAL CAMPAIGNS', 'DIGITAL CULTURE', 'BRAND STRATEGY'], ['MEME MARKETING', 'CREATOR ECONOMY', 'INTERNET NATIVE', 'VIRAL CAMPAIGNS', 'DIGITAL CULTURE', 'BRAND STRATEGY']) as $w): ?>-->
<!--                <span class="h-soon-ticker-word"><?= htmlspecialchars($w) ?></span><span class="h-soon-ticker-sep"> ✦ </span>-->
<!--            <?php endforeach; ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->