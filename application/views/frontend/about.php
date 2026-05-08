<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
.ab-rv {
    opacity: 0;
    transform: translateY(36px);
    transition: opacity .85s cubic-bezier(.16, 1, .3, 1), transform .85s cubic-bezier(.16, 1, .3, 1);
}

.ab-rv.ab-in {
    opacity: 1;
    transform: none;
}

.ab-d1 {
    transition-delay: .08s !important;
}

.ab-d2 {
    transition-delay: .16s !important;
}

.ab-d3 {
    transition-delay: .24s !important;
}

.ab-d4 {
    transition-delay: .32s !important;
}

.ab-tag {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .26em;
    text-transform: uppercase;
}

.ab-tag::before {
    content: '';
    width: 22px;
    height: 1px;
    background: currentColor;
}

.ab-h1 {
    font-family: var(--font-d);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(54px, 11vw, 130px);
    line-height: .86;
    letter-spacing: -.02em;
    color: var(--ivory);
}

.ab-h2 {
    font-family: var(--font-d);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(40px, 7vw, 88px);
    line-height: .88;
    letter-spacing: -.02em;
    color: var(--ivory);
}

.g1 {
    background: linear-gradient(135deg, var(--gold), var(--rose));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.g2 {
    background: linear-gradient(135deg, var(--plum), var(--teal));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.ab-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-d);
    letter-spacing: .08em;
    border-radius: 4px;
    text-decoration: none;
    font-style: italic;
    transition: transform .2s, box-shadow .2s, border-color .2s, color .2s;
}

.ab-btn-y {
    background: linear-gradient(135deg, var(--gold), var(--rose));
    color: #0A0A0F;
    font-size: 15px;
    padding: 13px 30px;
}

.ab-btn-y:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(201, 168, 76, .28);
}

.ab-btn-g {
    border: 1.5px solid rgba(245, 240, 232, .18);
    color: var(--ivory);
    font-size: 15px;
    padding: 12px 28px;
}

.ab-btn-g:hover {
    border-color: var(--gold);
    color: var(--gold);
}

.ab-sec {
    padding: 96px 60px;
    position: relative;
    z-index: 1;
}

.ab-sec-ink {
    background: var(--ink);
}

.ab-max {
    max-width: 1380px;
    margin: 0 auto;
}

.ab-hero {
    padding: 140px 60px 80px;
    position: relative;
    z-index: 1;
}

/* Stats grid */
.ab-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2px;
    background: var(--border);
    border-radius: 12px;
    overflow: hidden;
}

.ab-stat {
    background: var(--card);
    padding: 32px 24px;
    text-align: center;
    transition: background .3s;
}

.ab-stat:hover {
    background: rgba(201, 168, 76, .04);
}

.ab-stat-n {
    font-family: var(--font-d);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(36px, 5vw, 56px);
    letter-spacing: -.04em;
}

.ab-stat-l {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--smoke);
    margin-top: 6px;
}

/* Reason rows */
.ab-reason {
    border-top: 1px solid rgba(255, 255, 255, .06);
    padding: 28px 0;
    display: grid;
    grid-template-columns: 80px 1fr;
    gap: 24px;
    align-items: flex-start;
    transition: background .3s;
}

.ab-reason:last-child {
    border-bottom: 1px solid rgba(255, 255, 255, .06);
}

.ab-reason:hover {
    background: rgba(255, 255, 255, .015);
    padding-left: 16px;
    padding-right: 16px;
    margin: 0 -16px;
    border-radius: 8px;
}

.ab-reason:hover .ab-reason-num,
.ab-reason:hover .ab-reason-title {
    color: var(--gold);
}

.ab-reason-num {
    font-family: var(--font-d);
    font-size: 20px;
    color: rgba(245, 240, 232, .18);
    transition: color .3s;
    padding-top: 4px;
}

.ab-reason-title {
    font-family: var(--font-d);
    font-style: italic;
    font-size: clamp(22px, 3vw, 32px);
    color: var(--ivory);
    margin-bottom: 8px;
    transition: color .3s;
}

.ab-reason-desc {
    font-size: 14px;
    color: var(--smoke);
    line-height: 1.78;
    font-weight: 400;
    max-width: 560px;
}

/* CTA */
.ab-cta-sec {
    padding: 100px 60px;
    text-align: center;
    background: radial-gradient(ellipse 70% 70% at 50% 50%, rgba(201, 168, 76, .06) 0%, #0A0A0F 70%);
    position: relative;
    z-index: 1;
}

/* Responsive */
@media(max-width:1200px) {
    .ab-stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width:1024px) {

    .ab-hero,
    .ab-sec,
    .ab-cta-sec {
        padding-left: 28px !important;
        padding-right: 28px !important;
    }
}

@media(max-width:768px) {
    .ab-hero {
        padding: 100px 20px 64px !important;
    }

    .ab-sec,
    .ab-cta-sec {
        padding: 64px 20px !important;
    }

    .ab-stats-grid {
        grid-template-columns: 1fr 1fr;
    }

    .ab-reason {
        grid-template-columns: 60px 1fr;
        gap: 16px;
    }

    .ab-btns {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media(max-width:480px) {
    .ab-reason {
        grid-template-columns: 1fr;
        gap: 8px;
    }

    .ab-reason-num {
        display: none;
    }
}
</style>

<!-- HERO -->
<section class="ab-hero" aria-labelledby="ab-h">
    <div class="ab-max">
        <p class="ab-tag ab-rv" style="color:var(--gold);margin-bottom:20px;">Our Story</p>
        <h1 id="ab-h" class="ab-h1 ab-rv ab-d1" style="margin-bottom:28px;">
            Who<br>We <span class="g1">Are</span>
        </h1>
        <div class="ab-rv ab-d2" style="max-width:640px;">
            <p
                style="font-size:clamp(15px,2vw,20px);color:rgba(245,240,232,.6);line-height:1.75;margin-bottom:20px;font-weight:400;">
                The Cine Caffe is India's premier cinema marketing studio, crafting authentic connections between brands
                and audiences to amplify reach, drive engagement, and spark meaningful cultural conversations.
            </p>
            <p style="font-size:clamp(13px,1.5vw,15px);color:rgba(245,240,232,.42);line-height:1.82;font-weight:400;">
                We drive high-impact influencer and meme campaigns for both brands and production houses across
                entertainment, culture, and commerce. Our ecosystem powers buzz for nearly 32% of all movie and OTT
                releases while enabling brands to embed themselves into cultural conversations at scale.
            </p>
        </div>
    </div>
</section>

<!-- STATS -->
<section style="padding:0 60px 80px;position:relative;z-index:1;" class="ab-sec-stats">
    <div class="ab-max">
        <div class="ab-stats-grid">
            <?php foreach (
                [
                    ['300+', 'Total Campaigns', '--gold'],
                    ['32%', 'OTT Releases',   '--rose'],
                    ['12M+', 'People Reached',  '--plum'],
                    ['70+', 'Screenings',      '--teal'],
                ] as $i => $s
            ): ?>
            <div class="ab-stat ab-rv ab-d<?= ($i + 1) ?>">
                <div class="ab-stat-n" style="color:var(<?= $s[2] ?>)"><?= $s[0] ?></div>
                <div class="ab-stat-l"><?= $s[1] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- WHY THE CINE CAFFE -->
<section class="ab-sec ab-sec-ink" aria-labelledby="ab-why">
    <div class="ab-max">
        <p class="ab-tag ab-rv" style="color:var(--rose);margin-bottom:16px;">Our Edge</p>
        <h2 id="ab-why" class="ab-h2 ab-rv ab-d1" style="margin-bottom:52px;">
            Why <span class="g2">The Cine Caffe?</span>
        </h2>
        <?php $reasons = [
            ['01', 'Low-Margin, High-Volume', 'We operate on a cost-efficient model delivering maximum scale without inflating your budget.'],
            ['02', 'Cultural Intelligence', 'Our team lives and breathes pop culture — we know what will trend before it does.'],
            ['03', 'End-to-End Execution', 'From strategy to delivery, we handle everything so you can focus on your release.'],
            ['04', 'Authenticity First', 'Every campaign is crafted to feel genuine — audiences can sense a forced promotion from miles away.'],
            ['05', 'Proven Track Record', '300+ campaigns, 12M+ reach, and 32% of all OTT releases. Numbers that speak.'],
        ];
        foreach ($reasons as $i => $r):
            $di = 'ab-d' . min($i + 1, 4);
        ?>
        <div class="ab-reason ab-rv <?= $di ?>">
            <div class="ab-reason-num"><?= $r[0] ?></div>
            <div>
                <h3 class="ab-reason-title"><?= $r[1] ?></h3>
                <p class="ab-reason-desc"><?= $r[2] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- CTA -->
<section class="ab-cta-sec">
    <div class="ab-max">
        <p class="ab-tag ab-rv" style="color:var(--sage);justify-content:center;margin:0 auto 20px;">Ready to
            Collaborate?</p>
        <h2 class="ab-h2 ab-rv ab-d1" style="margin-bottom:36px;font-size:clamp(48px,9vw,100px);">
            Ready to <span class="g1">Collaborate?</span>
        </h2>
        <div class="ab-btns ab-rv ab-d2" style="display:flex;gap:14px;flex-wrap:wrap;justify-content:center;">
            <a href="<?= base_url('contact') ?>" class="ab-btn ab-btn-y" style="font-size:16px;padding:15px 36px;">Let's
                Talk</a>
            <a href="<?= base_url('work') ?>" class="ab-btn ab-btn-g" style="font-size:16px;padding:14px 32px;">See Our
                Work</a>
        </div>
    </div>
</section>

<style>
@media(max-width:1024px) {
    .ab-sec-stats {
        padding-left: 28px !important;
        padding-right: 28px !important;
    }
}

@media(max-width:768px) {
    .ab-sec-stats {
        padding-left: 20px !important;
        padding-right: 20px !important;
        padding-bottom: 56px !important;
    }
}
</style>

<script>
(function() {
    var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(e) {
            if (e.isIntersecting) {
                e.target.classList.add('ab-in');
                obs.unobserve(e.target);
            }
        });
    }, {
        threshold: .08,
        rootMargin: '0px 0px -28px 0px'
    });
    document.querySelectorAll('.ab-rv').forEach(function(el) {
        obs.observe(el);
    });
})();
</script>