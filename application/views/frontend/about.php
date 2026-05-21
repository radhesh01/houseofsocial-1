<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    /* ============================================================
   ABOUT — HOUSEOFSOCIAL
============================================================ */
    .ab-open {
        min-height: 100svh;
        background: var(--bg);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        position: relative;
    }

    .ab-open-grid {
        position: absolute;
        inset: 0;
        pointer-events: none;
        background-image: linear-gradient(rgba(245, 242, 238, .018) 1px, transparent 1px),
            linear-gradient(90deg, rgba(245, 242, 238, .018) 1px, transparent 1px);
        background-size: 80px 80px;
    }

    .ab-open-glow {
        position: absolute;
        top: -200px;
        right: -200px;
        width: 700px;
        height: 700px;
        background: radial-gradient(circle, rgba(255, 77, 0, .1) 0%, transparent 60%);
        filter: blur(80px);
        pointer-events: none;
    }

    /* top nav spacer + big statement */
    .ab-open-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: calc(var(--nav)+80px) var(--px) 0;
        max-width: var(--max);
        margin: 0 auto;
        width: 100%;
        position: relative;
        z-index: 2;
    }

    .ab-big-h {
        font-family: var(--fh);
        font-size: clamp(72px, 14vw, 200px);
        font-weight: 800;
        letter-spacing: -.05em;
        line-height: .82;
        color: var(--w);
        opacity: 0;
        animation: aUp 1s var(--ease) .2s forwards;
    }

    .ab-big-h .blk {
        display: block
    }

    .ab-big-h .orange {
        color: var(--o)
    }

    .ab-big-h .stroke {
        color: transparent;
        -webkit-text-stroke: 2px rgba(245, 242, 238, .2)
    }

    .ab-open-bottom {
        border-top: 1px solid var(--border);
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin-top: 60px;
        opacity: 0;
        animation: aUp .8s var(--ease) .6s forwards;
    }

    .ab-open-bl {
        padding: 32px 0 32px var(--px);
        border-right: 1px solid var(--border);
    }

    .ab-open-br {
        padding: 32px var(--px) 32px 40px
    }

    .ab-open-sub {
        font-size: clamp(15px, 1.5vw, 18px);
        color: var(--w50);
        line-height: 1.8
    }

    /* ── MANIFESTO SECTION ── */
    .ab-manifest {
        background: var(--bg);
        padding: var(--sec) var(--px);
        border-top: 1px solid var(--border);
    }

    .ab-manifest-inner {
        max-width: var(--max);
        margin: 0 auto
    }

    .ab-manifest-row {
        display: grid;
        grid-template-columns: 200px 1fr;
        gap: 64px;
        align-items: start;
        padding: 56px 0;
        border-top: 1px solid var(--border);
    }

    .ab-manifest-row:first-child {
        border-top: none
    }

    .ab-manifest-label {
        font-family: var(--fh);
        font-size: clamp(44px, 5vw, 64px);
        font-weight: 800;
        letter-spacing: -.03em;
        color: var(--w08);
        line-height: 1;
        transition: color .4s;
        cursor: default;
    }

    .ab-manifest-row:hover .ab-manifest-label {
        color: var(--o)
    }

    .ab-manifest-content {}

    .ab-manifest-title {
        font-family: var(--fh);
        font-size: clamp(28px, 3.5vw, 48px);
        font-weight: 800;
        letter-spacing: -.03em;
        color: var(--w);
        margin-bottom: 20px;
        transition: color .2s;
    }

    .ab-manifest-row:hover .ab-manifest-title {
        color: var(--w80)
    }

    .ab-manifest-body {
        font-size: 15px;
        color: var(--w50);
        line-height: 1.9;
        max-width: 640px
    }

    /* ── CAPABILITIES GRID: 2-col asymm ── */
    .ab-caps {
        background: var(--bg1);
        border-top: 1px solid var(--border);
        padding: var(--sec) var(--px);
    }

    .ab-caps-inner {
        max-width: var(--max);
        margin: 0 auto
    }

    .ab-caps-top {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        margin-bottom: 64px;
        align-items: end;
    }

    .ab-caps-h {
        font-family: var(--fh);
        font-size: clamp(48px, 7vw, 96px);
        font-weight: 800;
        letter-spacing: -.04em;
        line-height: .9;
        color: var(--w);
    }

    .ab-caps-h em {
        font-style: normal;
        color: var(--o)
    }

    .ab-caps-body {
        font-size: 15px;
        color: var(--w50);
        line-height: 1.85;
        max-width: 400px
    }

    .ab-caps-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2px;
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .ab-cap-card {
        background: var(--bg2);
        padding: 40px 32px;
        position: relative;
        overflow: hidden;
        cursor: default;
        transition: background .3s;
    }

    .ab-cap-card::after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 2px;
        background: var(--o);
        transform: scaleY(0);
        transform-origin: top;
        transition: transform .4s var(--ease);
    }

    .ab-cap-card:hover {
        background: var(--bg3)
    }

    .ab-cap-card:hover::after {
        transform: scaleY(1)
    }

    .ab-cap-idx {
        font-family: var(--fh);
        font-size: 48px;
        font-weight: 800;
        color: var(--w04);
        line-height: 1;
        margin-bottom: 20px;
    }

    .ab-cap-title {
        font-family: var(--fh);
        font-size: 22px;
        font-weight: 700;
        color: var(--w);
        margin-bottom: 14px;
        transition: color .2s;
    }

    .ab-cap-card:hover .ab-cap-title {
        color: var(--o)
    }

    .ab-cap-desc {
        font-size: 13px;
        color: var(--w20);
        line-height: 1.8
    }

    /* ── NUMBERS FULL-BLEED ── */
    .ab-nums {
        background: var(--o);
        padding: 80px var(--px);
        overflow: hidden;
        position: relative;
    }

    .ab-nums-ghost {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: var(--fh);
        font-size: clamp(100px, 20vw, 280px);
        font-weight: 800;
        letter-spacing: -.05em;
        color: transparent;
        -webkit-text-stroke: 1px rgba(255, 255, 255, .08);
        white-space: nowrap;
        pointer-events: none;
        user-select: none;
    }

    .ab-nums-grid {
        position: relative;
        z-index: 1;
        max-width: var(--max);
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2px;
    }

    .ab-num-cell {
        padding: 32px;
        background: rgba(0, 0, 0, .14);
        text-align: center;
        cursor: default;
        transition: background .2s
    }

    .ab-num-cell:hover {
        background: rgba(0, 0, 0, .22)
    }

    .ab-num-n {
        font-family: var(--fh);
        font-size: clamp(48px, 7vw, 80px);
        font-weight: 800;
        letter-spacing: -.04em;
        color: #fff;
        display: block;
        line-height: 1;
    }

    .ab-num-l {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, .6);
        margin-top: 8px
    }

    /* ── VALUES ── */
    .ab-values {
        background: var(--bg1);
        border-top: 1px solid var(--border);
        padding: var(--sec) var(--px);
    }

    .ab-values-inner {
        max-width: var(--max);
        margin: 0 auto
    }

    .ab-values-h {
        font-family: var(--fh);
        font-size: clamp(48px, 7vw, 96px);
        font-weight: 800;
        letter-spacing: -.04em;
        line-height: .9;
        color: var(--w);
        margin-bottom: 56px;
    }

    .ab-values-h em {
        font-style: normal;
        color: var(--o)
    }

    .ab-values-list {
        border: 1px solid var(--border);
        overflow: hidden
    }

    .ab-val-row {
        display: grid;
        grid-template-columns: 80px 1fr 1fr;
        border-top: 1px solid var(--border);
        min-height: 120px;
        transition: background .2s;
        cursor: default;
        align-items: center;
    }

    .ab-val-row:first-child {
        border-top: none
    }

    .ab-val-row:hover {
        background: var(--bg2)
    }

    .ab-val-row:hover .ab-val-n {
        color: var(--o)
    }

    .ab-val-row:hover .ab-val-title {
        color: var(--o)
    }

    .ab-val-n {
        font-family: var(--fh);
        font-size: clamp(32px, 4vw, 52px);
        font-weight: 800;
        letter-spacing: -.04em;
        color: var(--w08);
        padding: 0 0 0 32px;
        border-right: 1px solid var(--border);
        height: 100%;
        display: flex;
        align-items: center;
        transition: color .3s;
    }

    .ab-val-title {
        font-family: var(--fh);
        font-size: clamp(22px, 2.5vw, 32px);
        font-weight: 700;
        color: var(--w);
        padding: 0 32px;
        letter-spacing: -.02em;
        transition: color .2s;
    }

    .ab-val-desc {
        font-size: 13px;
        color: var(--w20);
        line-height: 1.75;
        padding-right: 32px
    }

    /* ── CTA ── */
    .ab-cta {
        background: var(--bg);
        padding: var(--sec) var(--px);
        border-top: 1px solid var(--border);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .ab-cta-glow {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 500px;
        height: 300px;
        pointer-events: none;
        background: radial-gradient(ellipse, rgba(255, 77, 0, .1) 0%, transparent 65%);
        filter: blur(70px);
        z-index: 0;
    }

    .ab-cta-inner {
        position: relative;
        z-index: 1;
        max-width: 900px;
        margin: 0 auto
    }

    .ab-cta-h {
        font-family: var(--fh);
        font-size: clamp(52px, 9vw, 128px);
        font-weight: 800;
        letter-spacing: -.05em;
        line-height: .88;
        color: var(--w);
        margin-bottom: 40px;
    }

    .ab-cta-h span {
        color: var(--o)
    }

    /* RESPONSIVE */
    @media(max-width:1024px) {
        .ab-open-bottom {
            grid-template-columns: 1fr
        }

        .ab-open-bl {
            border-right: none;
            border-bottom: 1px solid var(--border)
        }

        .ab-open-br {
            padding-left: 0
        }

        .ab-caps-top {
            grid-template-columns: 1fr
        }

        .ab-caps-grid {
            grid-template-columns: 1fr 1fr
        }

        .ab-nums-grid {
            grid-template-columns: 1fr 1fr
        }

        .ab-val-row {
            grid-template-columns: 64px 1fr
        }

        .ab-val-desc {
            display: none
        }

        .ab-manifest-row {
            grid-template-columns: 120px 1fr;
            gap: 32px
        }
    }

    @media(max-width:768px) {
        .ab-big-h {
            font-size: clamp(56px, 13vw, 100px)
        }

        .ab-caps-grid {
            grid-template-columns: 1fr
        }

        .ab-val-n {
            font-size: clamp(28px, 6vw, 44px)
        }
    }

    @media(max-width:480px) {
        .ab-nums-grid {
            grid-template-columns: 1fr
        }

        .ab-manifest-row {
            grid-template-columns: 1fr
        }

        .ab-manifest-label {
            font-size: clamp(36px, 8vw, 52px);
            margin-bottom: 12px
        }
    }
</style>

<!-- OPEN ─────────────────────────────────────────────── -->
<section class="ab-open" aria-labelledby="ab-main-h">
    <div class="ab-open-grid" aria-hidden="true"></div>
    <div class="ab-open-glow" aria-hidden="true"></div>

    <div class="ab-open-body">
        <h1 id="ab-main-h" class="ab-big-h">
            <span class="blk">Culture</span>
            <span class="blk orange">Is Our</span>
            <span class="blk stroke">Business</span>
        </h1>
        <div class="ab-open-bottom">
            <div class="ab-open-bl">
                <p class="lbl" style="margin-bottom:14px">Who we are</p>
                <p class="ab-open-sub">India's most internet-native creative agency. We live on the timeline, think in
                    memes, and execute at cinematic scale.</p>
            </div>
            <div class="ab-open-br">
                <p style="font-size:14px;color:var(--w20);line-height:1.8;margin-bottom:24px">Founded on a simple
                    belief: internet culture is the most powerful force in modern marketing.</p>
                <a href="<?= base_url('contact') ?>" class="btn-os">Let's build together →</a>
            </div>
        </div>
    </div>
</section>

<!-- MANIFESTO ──────────────────────────────────────────── -->
<section class="ab-manifest" aria-labelledby="ab-manif-h">
    <div class="ab-manifest-inner">
        <p class="lbl rv" style="margin-bottom:48px">Our beliefs</p>

        <?php $beliefs = [
            ['01', 'We Think In Memes', 'Internet culture is not a channel — it\'s a language. We\'re fluent.'],
            ['02', 'Speed Is A Creative Tool', 'The window for cultural relevance is measured in hours. We move fast without cutting corners.'],
            ['03', 'Authenticity Beats Volume', 'One creator who genuinely loves your brand outperforms 100 who don\'t. Every single time.'],
            ['04', 'Cinema Sets The Standard', 'Everything we produce — from a reel to a nationwide campaign — deserves cinematic care.'],
            ['05', 'Data Informs, Culture Decides', 'Numbers tell us what happened. Culture tells us what will.'],
        ];
        foreach ($beliefs as $i => $b): ?>
            <div class="ab-manifest-row rv d<?= ($i % 3) + 1 ?>">
                <div class="ab-manifest-label"><?= $b[0] ?></div>
                <div class="ab-manifest-content">
                    <h2 class="ab-manifest-title"><?= htmlspecialchars($b[1]) ?></h2>
                    <p class="ab-manifest-body"><?= htmlspecialchars($b[2]) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- CAPABILITIES ─────────────────────────────────────── -->
<section class="ab-caps" aria-labelledby="ab-caps-h">
    <div class="ab-caps-inner">
        <div class="ab-caps-top">
            <div>
                <p class="lbl rv" style="margin-bottom:16px">Our services</p>
                <h2 id="ab-caps-h" class="ab-caps-h rv d1">What We<br><em>Actually Do</em></h2>
            </div>
            <p class="ab-caps-body rv d2">Eight disciplines. One vision: making culture move for brands and films across
                India.</p>
        </div>
        <div class="ab-caps-grid rv sc">
            <?php foreach (
                [
                    ['01', 'Influencer Marketing', 'Precision-matched campaigns from nano to celebrity tier.'],
                    ['02', 'Meme Marketing', 'Native viral content engineered to spread organically.'],
                    ['03', 'Film Promotions', 'End-to-end buzz creation for Bollywood and OTT.'],
                    ['04', 'Video Production', 'OTT-grade films, reels, and brand content.'],
                    ['05', 'Film Screenings', 'Influencer events with authentic pre-release energy.'],
                    ['06', 'On-Ground Activations', 'Physical brand experiences anchored in digital culture.'],
                    ['07', 'LinkedIn & X Strategy', 'Platform-native authority for studios and executives.'],
                    ['08', 'Celebrity Endorsements', 'Star partnerships that unlock loyal, massive audiences.'],
                    ['09', 'OTT Strategy', 'Data-driven streaming launch campaigns at scale.'],
                ] as $i => $c
            ): ?>
                <div class="ab-cap-card rv d<?= ($i % 3) + 1 ?>">
                    <div class="ab-cap-idx"><?= $c[0] ?></div>
                    <h3 class="ab-cap-title"><?= htmlspecialchars($c[1]) ?></h3>
                    <p class="ab-cap-desc"><?= htmlspecialchars($c[2]) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- NUMBERS ──────────────────────────────────────────── -->
<section class="ab-nums" aria-label="Stats">
    <div class="ab-nums-ghost" aria-hidden="true">NUMBERS</div>
    <div class="ab-nums-grid rv">
        <?php foreach (
            [
                [$settings['stat_campaigns'] ?? '300', '+', 'Campaigns'],
                ['32', '%', 'OTT Market Share'],
                [$settings['stat_reach'] ?? '12', 'M+', 'People Reached'],
                ['150', '+', 'Films Promoted'],
            ] as $i => $n
        ): ?>
            <div class="ab-num-cell rv d<?= $i + 1 ?>">
                <span class="ab-num-n"><?= htmlspecialchars($n[0] . $n[1]) ?></span>
                <span class="ab-num-l"><?= htmlspecialchars($n[2]) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- VALUES ───────────────────────────────────────────── -->
<section class="ab-values" aria-labelledby="ab-val-h">
    <div class="ab-values-inner">
        <p class="lbl rv" style="margin-bottom:20px">What we stand for</p>
        <h2 id="ab-val-h" class="ab-values-h rv d1">Our <em>Values</em></h2>
        <div class="ab-values-list rv">
            <?php foreach (
                [
                    ['01', 'Authenticity', 'Every campaign feels native, genuine, and culturally embedded.'],
                    ['02', 'Speed', 'Rapid execution without compromising on creative quality. Ever.'],
                    ['03', 'Impact', 'We create lasting conversations, not vanishing impressions.'],
                    ['04', 'Culture', 'Deep fluency in internet culture, meme economics, and social behavior.'],
                    ['05', 'Scale', 'From niche product launches to nationwide cultural moments.'],
                    ['06', 'Results', 'Everything we do is driven by measurable, real-world outcomes.'],
                ] as $i => $v
            ): ?>
                <div class="ab-val-row">
                    <div class="ab-val-n"><?= $v[0] ?></div>
                    <div class="ab-val-title"><?= htmlspecialchars($v[1]) ?></div>
                    <div class="ab-val-desc"><?= htmlspecialchars($v[2]) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA ─────────────────────────────────────────────── -->
<section class="ab-cta" aria-label="CTA">
    <div class="ab-cta-glow" aria-hidden="true"></div>
    <div class="ab-cta-inner">
        <p class="lbl rv" style="justify-content:center;margin:0 auto 20px">Work with us</p>
        <h2 class="ab-cta-h rv d1">Build Your<br><span>Campaign Now</span></h2>
        <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap" class="rv d2">
            <a href="<?= base_url('contact') ?>" class="btn-os btn-os-lg mag-wrap" data-mag>Start a campaign →</a>
            <a href="<?= base_url('work') ?>" class="btn-ghost">See our work</a>
        </div>
    </div>
</section>