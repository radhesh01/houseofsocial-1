<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
    /* ================================================================
   ABOUT PAGE
================================================================ */

    .ab-hero {
        background: var(--olive-dk);
        padding: 160px var(--px) 80px;
        position: relative;
        overflow: hidden;
        z-index: 1;
        min-height: 56vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .ab-hero-glow {
        position: absolute;
        border-radius: 50%;
        filter: blur(110px);
        pointer-events: none;
        z-index: 0;
    }

    .ab-g1 {
        width: 480px;
        height: 480px;
        background: rgba(212, 146, 10, .09);
        top: -130px;
        right: -90px;
    }

    .ab-g2 {
        width: 300px;
        height: 300px;
        background: rgba(107, 122, 85, .18);
        bottom: 8%;
        left: -70px;
    }

    .ab-hero-bg {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: var(--f-d);
        font-size: clamp(100px, 20vw, 300px);
        letter-spacing: .02em;
        line-height: 1;
        color: transparent;
        -webkit-text-stroke: 1.5px rgba(242, 234, 216, .04);
        white-space: nowrap;
        pointer-events: none;
        user-select: none;
        z-index: 0;
    }

    .ab-hero-content {
        position: relative;
        z-index: 2;
        max-width: var(--max);
    }

    .ab-h1 {
        font-family: var(--f-d);
        font-size: clamp(88px, 14vw, 210px);
        line-height: .82;
        letter-spacing: .02em;
        color: var(--cream);
        margin-bottom: 22px;
    }

    .ab-h1 span {
        color: transparent;
        -webkit-text-stroke: 2px rgba(242, 234, 216, .5);
    }

    .ab-hero-sub {
        font-family: var(--f-c);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .36);
        max-width: 520px;
        line-height: 1.8;
    }

    /* STATS STRIP */
    .ab-strip {
        background: var(--ink);
        border-top: 2px solid var(--amber);
    }

    .ab-strip-inner {
        max-width: var(--max);
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }

    .ab-strip-cell {
        padding: 28px var(--px);
        border-right: 1px solid rgba(242, 234, 216, .07);
        text-align: center;
    }

    .ab-strip-cell:last-child {
        border-right: none;
    }

    .ab-strip-n {
        font-family: var(--f-d);
        font-size: clamp(32px, 4vw, 52px);
        line-height: 1;
        color: var(--amber);
        letter-spacing: .02em;
    }

    .ab-strip-l {
        font-family: var(--f-c);
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .3);
        margin-top: 5px;
    }

    /* BODY */
    .ab-body {
        background: var(--cream);
        padding: var(--sec-py) var(--px);
    }

    .ab-body-wrap {
        max-width: var(--max);
        margin: 0 auto;
    }

    .ab-grid {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        gap: 80px;
        align-items: flex-start;
    }

    .ab-title {
        font-family: var(--f-d);
        font-size: clamp(44px, 7vw, 96px);
        line-height: .88;
        letter-spacing: .02em;
        color: var(--ink);
    }

    .ab-title span {
        color: var(--olive);
    }

    .ab-subtitle {
        font-family: var(--f-s);
        font-style: italic;
        font-size: 15px;
        color: var(--muted);
        max-width: 300px;
        line-height: 1.82;
        margin-top: 18px;
    }

    .ab-content p {
        font-size: 15px;
        line-height: 1.9;
        color: var(--muted);
        margin-bottom: 24px;
    }

    .ab-quote {
        border-left: 4px solid var(--amber);
        padding: 22px 26px;
        margin: 34px 0;
        background: rgba(212, 146, 10, .04);
    }

    .ab-quote p {
        font-family: var(--f-s);
        font-style: italic;
        font-size: 20px;
        color: var(--ink);
        line-height: 1.7;
        margin: 0;
    }

    /* VALUES */
    .ab-values {
        background: var(--ink);
        padding: var(--sec-py) var(--px);
    }

    .ab-values-wrap {
        max-width: var(--max);
        margin: 0 auto;
    }

    .ab-values-head {
        margin-bottom: var(--s14);
    }

    .ab-values-head h2 {
        font-family: var(--f-d);
        font-size: clamp(44px, 7vw, 96px);
        line-height: .88;
        color: var(--cream);
    }

    .ab-values-head h2 span {
        color: var(--amber);
    }

    .ab-values-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 3px;
        border: 2px solid var(--cream);
    }

    .ab-value {
        background: var(--ink-2);
        padding: 40px 32px;
    }

    .ab-value-num {
        font-family: var(--f-d);
        font-size: 46px;
        color: rgba(242, 234, 216, .08);
        margin-bottom: 12px;
    }

    .ab-value-title {
        font-family: var(--f-d);
        font-size: 28px;
        color: var(--cream);
        margin-bottom: 12px;
    }

    .ab-value-desc {
        font-size: 14px;
        line-height: 1.8;
        color: rgba(242, 234, 216, .38);
    }

    /* CTA */
    .ab-cta {
        background: var(--amber);
        padding: var(--s16) var(--px);
        text-align: center;
    }

    .ab-cta h2 {
        font-family: var(--f-d);
        font-size: clamp(40px, 6vw, 84px);
        line-height: .88;
        color: var(--ink);
        margin-bottom: var(--s10);
    }

    .ab-cta h2 span {
        color: var(--cream);
    }

    /* RESPONSIVE */
    @media(max-width:1024px) {

        .ab-grid {
            grid-template-columns: 1fr;
            gap: 48px;
        }

        .ab-values-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media(max-width:768px) {

        .ab-hero {
            padding-top: 120px;
            min-height: auto;
        }

        .ab-strip-inner {
            grid-template-columns: 1fr 1fr;
        }

        .ab-strip-cell {
            border-bottom: 1px solid rgba(242, 234, 216, .07);
        }

        .ab-values-grid {
            grid-template-columns: 1fr;
        }

        .ab-title {
            font-size: clamp(44px, 10vw, 72px);
        }

        .ab-cta h2 {
            font-size: clamp(54px, 14vw, 100px);
        }
    }

    @media(max-width:600px) {

        .ab-hero {
            padding: 95px 18px 42px;
        }

        .ab-h1 {
            font-size: 52px;
            line-height: .9;
        }

        .ab-hero-sub {
            font-size: 11px;
            letter-spacing: .16em;
        }

        /* .ab-strip-inner {
            grid-template-columns: 1fr;
        } */

        .ab-strip-cell {
            border-right: none;
        }

        .ab-value {
            padding: 34px 22px;
        }
    }
</style>

<!-- HERO -->
<section class="ab-hero" aria-labelledby="ab-h1">

    <div class="ab-hero-glow ab-g1"></div>
    <div class="ab-hero-glow ab-g2"></div>

    <div class="ab-hero-bg">ABOUT</div>

    <div class="ab-hero-content">

        <p class="s-lbl rv" style="color:rgba(242,234,216,.36);margin-bottom:20px">
            About Us
        </p>

        <h1 id="ab-h1" class="ab-h1 rv d1">
            WHO<br><span>WE ARE</span>
        </h1>

        <p class="ab-hero-sub rv d2">
            INDIA'S MOST TRUSTED CINEMA MARKETING STUDIO — CRAFTING CULTURAL CAMPAIGNS THAT DRIVE REAL IMPACT.
        </p>

    </div>

</section>

<!-- STATS -->
<div class="ab-strip">
    <div class="ab-strip-inner">

        <?php foreach ([['300+', 'Campaigns'], ['32%', 'OTT Releases'], ['12M+', 'People Reached'], ['150+', 'Films Promoted']] as $i => $s): ?>

            <div class="ab-strip-cell rv d<?= $i + 1 ?>">
                <div class="ab-strip-n"><?= $s[0] ?></div>
                <div class="ab-strip-l"><?= $s[1] ?></div>
            </div>

        <?php endforeach; ?>

    </div>
</div>

<!-- BODY -->
<section class="ab-body">

    <div class="ab-body-wrap">

        <div class="ab-grid">

            <div>

                <p class="s-lbl" style="color:var(--olive);margin-bottom:14px">
                    Our Story
                </p>

                <h2 class="ab-title">
                    CINEMA<br><span>MEETS CULTURE</span>
                </h2>

                <p class="ab-subtitle">
                    We create campaigns that blend entertainment, internet culture, and audience psychology into
                    unforgettable digital moments.
                </p>

            </div>

            <div class="ab-content">

                <p>
                    The Cine Caffe is India's premier cinema marketing studio, crafting authentic connections between
                    brands and audiences to amplify reach, drive engagement, and spark meaningful cultural
                    conversations.
                </p>

                <div class="ab-quote">
                    <p>
                        “We drive high-impact influencer and meme campaigns for brands and production houses — powering
                        buzz for nearly 32% of OTT releases.”
                    </p>
                </div>

                <p>
                    Our ecosystem spans entertainment, culture, and commerce — from Bollywood to OTT, from nano creators
                    to celebrity partnerships.
                </p>

                <p>
                    <?= htmlspecialchars($settings['about_text'] ?? 'From strategy to execution, we handle everything — so you can focus on what matters most.') ?>
                </p>

            </div>

        </div>

    </div>

</section>

<!-- VALUES -->
<section class="ab-values">

    <div class="ab-values-wrap">

        <div class="ab-values-head">

            <p class="s-lbl" style="color:rgba(242,234,216,.3);margin-bottom:16px">
                Our Values
            </p>

            <h2>
                WHAT WE<br><span>STAND FOR</span>
            </h2>

        </div>

        <div class="ab-values-grid">

            <?php
            $values = [
                ['01', 'Authenticity', 'Every campaign feels native, genuine, and culturally relevant.'],
                ['02', 'Speed', 'Rapid execution without compromising creative quality.'],
                ['03', 'Impact', 'We create conversations, not just impressions.'],
                ['04', 'Culture', 'Deep understanding of internet and entertainment culture.'],
                ['05', 'Scale', 'From niche launches to nationwide campaigns.'],
                ['06', 'Results', 'Everything we do is driven by measurable impact.']
            ];
            ?>

            <?php foreach ($values as $v): ?>

                <div class="ab-value">

                    <div class="ab-value-num"><?= $v[0] ?></div>

                    <h3 class="ab-value-title"><?= $v[1] ?></h3>

                    <p class="ab-value-desc"><?= $v[2] ?></p>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="ab-cta">

    <p class="s-lbl rv" style="color:rgba(26,26,16,.5);justify-content:center;margin:0 auto 18px">
        Ready To Collaborate?
    </p>

    <h2 class="rv d1">
        LET'S BUILD<br><span>YOUR CAMPAIGN</span>
    </h2>

    <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;" class="rv d2">

        <a href="<?= base_url('contact') ?>" class="btn btn-ink btn-lg">
            Let's Talk
        </a>

        <a href="<?= base_url('work') ?>" class="btn btn-ol-dk">
            View Work
        </a>

    </div>

</section>