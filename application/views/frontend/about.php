<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    /* ═══════════════════════════════════
   ABOUT PAGE
═══════════════════════════════════ */
    .ab-hero {
        background: var(--olive);
        padding: 140px 48px 80px;
        position: relative;
        overflow: hidden;
        z-index: 1;
        min-height: 75vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .ab-hero-bg-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: var(--fd);
        font-size: clamp(120px, 22vw, 320px);
        letter-spacing: .02em;
        line-height: 1;
        color: transparent;
        -webkit-text-stroke: 1.5px rgba(240, 232, 208, .06);
        white-space: nowrap;
        pointer-events: none;
        user-select: none;
        z-index: 0;
    }

    .ab-hero-content {
        position: relative;
        z-index: 2;
        max-width: 1380px;
    }

    .ab-h1 {
        font-family: var(--fd);
        font-size: clamp(80px, 14vw, 200px);
        line-height: .84;
        letter-spacing: .02em;
        color: var(--cream);
        margin-bottom: 24px;
    }

    .ab-sub {
        font-family: var(--fi);
        font-style: italic;
        font-size: clamp(16px, 2vw, 22px);
        color: rgba(240, 232, 208, .55);
        line-height: 1.75;
        max-width: 620px;
    }

    /* Stats row */
    .ab-stats-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        background: var(--ink);
        border-top: 3px solid var(--amber);
    }

    .ab-stat {
        padding: 36px 32px;
        border-right: 1px solid rgba(240, 232, 208, .07);
        transition: background .3s;
    }

    .ab-stat:last-child {
        border-right: none;
    }

    .ab-stat:hover {
        background: rgba(240, 232, 208, .03);
    }

    .ab-stat-n {
        font-family: var(--fd);
        font-size: clamp(38px, 5vw, 60px);
        line-height: 1;
        letter-spacing: .02em;
        color: var(--amber);
    }

    .ab-stat-l {
        font-family: var(--fb2);
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: rgba(240, 232, 208, .3);
        margin-top: 5px;
    }

    /* About body section */
    .ab-body-sec {
        background: var(--cream);
        padding: 100px 48px;
    }

    .ab-body-grid {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        gap: 80px;
        align-items: flex-start;
        max-width: 1380px;
        margin: 0 auto;
    }

    .ab-section-h {
        font-family: var(--fd);
        font-size: clamp(48px, 7vw, 96px);
        line-height: .88;
        letter-spacing: .02em;
        color: var(--ink);
        margin-bottom: 28px;
    }

    .ab-section-h span {
        color: var(--amber);
    }

    .ab-body-text {
        font-family: var(--fi);
        font-style: italic;
        font-size: 17px;
        line-height: 1.88;
        color: var(--muted);
        margin-bottom: 20px;
    }

    /* Reasons section */
    .ab-reasons-sec {
        background: var(--ink);
        padding: 100px 48px;
    }

    .ab-reasons-sec .ab-section-h {
        color: var(--cream);
    }

    .ab-reasons-sec .ab-section-h span {
        color: var(--amber);
    }

    .ab-reason-list {
        list-style: none;
        max-width: 1380px;
        margin: 0 auto;
    }

    .ab-reason {
        display: grid;
        grid-template-columns: 90px 1fr;
        gap: 24px;
        align-items: flex-start;
        border-top: 1px solid rgba(240, 232, 208, .07);
        padding: 32px 0;
        transition: padding-left .25s, background .25s;
    }

    .ab-reason:last-child {
        border-bottom: 1px solid rgba(240, 232, 208, .07);
    }

    .ab-reason:hover {
        padding-left: 16px;
    }

    .ab-reason:hover .ab-reason-n {
        color: var(--amber);
    }

    .ab-reason:hover .ab-reason-title {
        color: var(--amber);
    }

    .ab-reason-n {
        font-family: var(--fd);
        font-size: 18px;
        letter-spacing: .08em;
        color: rgba(240, 232, 208, .15);
        transition: color .3s;
        padding-top: 6px;
    }

    .ab-reason-title {
        font-family: var(--fd);
        font-size: clamp(24px, 3.5vw, 44px);
        letter-spacing: .02em;
        color: var(--cream);
        margin-bottom: 8px;
        transition: color .3s;
    }

    .ab-reason-desc {
        font-size: 14px;
        color: rgba(240, 232, 208, .4);
        line-height: 1.78;
        font-weight: 300;
        max-width: 520px;
    }

    /* CTA */
    .ab-cta-sec {
        background: var(--amber);
        padding: 100px 48px;
        text-align: center;
    }

    .ab-cta-h {
        font-family: var(--fd);
        font-size: clamp(60px, 12vw, 160px);
        line-height: .84;
        letter-spacing: .02em;
        color: var(--ink);
        margin-bottom: 40px;
    }

    .ab-cta-btns {
        display: flex;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    /* Responsive */
    @media(max-width:1100px) {
        .ab-stats-row {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media(max-width:900px) {
        .ab-body-grid {
            grid-template-columns: 1fr;
            gap: 48px;
        }
    }

    @media(max-width:768px) {
        .ab-hero {
            padding: 110px 24px 60px;
        }

        .ab-body-sec,
        .ab-reasons-sec {
            padding: 72px 24px;
        }

        .ab-cta-sec {
            padding: 80px 24px;
        }

        .ab-stats-row {
            grid-template-columns: 1fr 1fr;
        }

        .ab-stat {
            padding: 22px 16px;
        }

        .ab-reason {
            grid-template-columns: 60px 1fr;
        }
    }

    @media(max-width:480px) {
        .ab-stats-row {
            grid-template-columns: 1fr 1fr;
        }

        .ab-cta-btns {
            flex-direction: column;
            align-items: center;
        }
    }
</style>


<!-- HERO -->
<section class="ab-hero" aria-labelledby="ab-h1">
    <div class="ab-hero-bg-text" aria-hidden="true">WHO</div>
    <div class="ab-hero-content">
        <p class="tag-lbl rv" style="color:rgba(240,232,208,.45);margin-bottom:20px;">Our Story</p>
        <h1 id="ab-h1" class="ab-h1 rv d1">
            WHO<br>WE ARE
        </h1>
        <p class="ab-sub rv d2">
            India's most trusted cinema marketing studio — crafting authentic connections between brands and audiences.
        </p>
    </div>
</section>


<!-- STATS -->
<div class="ab-stats-row" aria-label="Key numbers">
    <?php foreach (
        [
            ['300+', 'Total Campaigns'],
            ['32%', 'OTT Releases'],
            ['12M+', 'People Reached'],
            ['70+', 'Screenings Done'],
        ] as $i => $s
    ): ?>
        <div class="ab-stat rv d<?= $i + 1 ?>">
            <div class="ab-stat-n"><?= $s[0] ?></div>
            <div class="ab-stat-l"><?= $s[1] ?></div>
        </div>
    <?php endforeach; ?>
</div>


<!-- BODY -->
<section class="ab-body-sec">
    <div class="ab-body-grid">
        <div>
            <p class="tag-lbl rv" style="color:var(--amber);margin-bottom:16px;">About Us</p>
            <h2 class="ab-section-h rv d1">THE <span>STORY</span></h2>
        </div>
        <div class="rv d2">
            <p class="ab-body-text">
                The Cine Caffe is India's premier cinema marketing studio, crafting authentic connections between brands
                and audiences to amplify reach, drive engagement, and spark meaningful cultural conversations.
            </p>
            <p class="ab-body-text">
                We drive high-impact influencer and meme campaigns for both brands and production houses across
                entertainment, culture, and commerce. Our ecosystem powers buzz for nearly 32% of all movie and OTT
                releases while enabling brands to embed themselves into cultural conversations at scale.
            </p>
            <p class="ab-body-text">
                <?= htmlspecialchars($settings['about_text'] ?? 'From strategy to execution, we handle everything — so you can focus on what matters most: your release.') ?>
            </p>
            <div style="margin-top:32px;display:flex;gap:12px;flex-wrap:wrap;">
                <a href="<?= base_url('contact') ?>" class="btn-solid is-amber"
                    style="font-size:16px;padding:12px 28px;">Let's Talk</a>
                <a href="<?= base_url('work') ?>" class="btn-outline" style="font-size:16px;padding:10px 26px;">See Our
                    Work</a>
            </div>
        </div>
    </div>
</section>


<!-- WHY US -->
<section class="ab-reasons-sec" aria-labelledby="ab-why">
    <div style="max-width:1380px;margin:0 auto;">
        <div class="rv" style="margin-bottom:52px;">
            <p class="tag-lbl" style="color:rgba(240,232,208,.35);margin-bottom:14px;">Our Edge</p>
            <h2 id="ab-why" class="ab-section-h">WHY <span>CINE CAFFE?</span></h2>
        </div>
        <ul class="ab-reason-list" role="list">
            <?php foreach (
                [
                    ['01', 'Low-Margin, High-Volume',  'We operate on a cost-efficient model delivering maximum scale without inflating your budget.'],
                    ['02', 'Cultural Intelligence',    'Our team lives and breathes pop culture — we know what will trend before it does.'],
                    ['03', 'End-to-End Execution',     'From strategy to delivery, we handle everything so you can focus on your release.'],
                    ['04', 'Authenticity First',       'Every campaign is crafted to feel genuine — audiences can sense a forced promotion from miles away.'],
                    ['05', 'Proven Track Record',      '300+ campaigns, 12M+ reach, and 32% of all OTT releases. Numbers that speak.'],
                ] as $i => $r
            ): ?>
                <li class="ab-reason rv d<?= ($i % 4) + 1 ?>" role="listitem">
                    <div class="ab-reason-n"><?= $r[0] ?></div>
                    <div>
                        <div class="ab-reason-title"><?= strtoupper($r[1]) ?></div>
                        <p class="ab-reason-desc"><?= $r[2] ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>


<!-- CTA -->
<section class="ab-cta-sec">
    <div>
        <p class="tag-lbl rv" style="color:rgba(26,26,20,.45);justify-content:center;margin:0 auto 20px;">Ready to
            Collaborate?</p>
        <h2 class="ab-cta-h rv d1">
            LET'S<br>COLLABORATE
        </h2>
        <div class="ab-cta-btns rv d2">
            <a href="<?= base_url('contact') ?>" class="btn-solid" style="font-size:17px;padding:14px 36px;">Let's
                Talk</a>
            <a href="<?= base_url('work') ?>" class="btn-outline" style="font-size:17px;padding:12px 34px;">See Our
                Work</a>
        </div>
    </div>
</section>