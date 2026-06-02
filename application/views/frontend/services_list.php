<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
.svc-hero {
    background: var(--s0);
    padding: calc(var(--navH) + 80px) var(--px) 64px;
    position: relative;
    overflow: hidden;
    min-height: 52vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

.svc-hero-glow {
    position: absolute;
    top: -160px;
    right: -120px;
    width: 560px;
    height: 560px;
    background: radial-gradient(circle, rgba(255, 60, 0, .08) 0%, transparent 65%);
    filter: blur(90px);
    pointer-events: none;
    z-index: 0;
}

.svc-hero-bg {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: var(--fDisplay);
    font-size: clamp(80px, 18vw, 280px);
    font-weight: 700;
    letter-spacing: .02em;
    line-height: 1;
    color: transparent;
    -webkit-text-stroke: 1.5px rgba(244, 241, 236, .03);
    white-space: nowrap;
    pointer-events: none;
    user-select: none;
    z-index: 0;
}

.svc-hero-content {
    position: relative;
    z-index: 2;
    max-width: var(--maxW);
}

.svc-h1 {
    font-family: var(--fDisplay);
    font-size: clamp(64px, 12vw, 190px);
    font-weight: 700;
    letter-spacing: -.05em;
    line-height: .82;
    color: var(--paper);
    margin-bottom: 18px;
}

.svc-h1 em {
    font-style: normal;
    color: var(--flame);
}

.svc-hero-sub {
    font-size: clamp(14px, 1.5vw, 17px);
    color: var(--ghost4);
    line-height: 1.8;
    max-width: 520px;
}

.svc-grid-sec {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    padding: var(--sec) var(--px);
}

.svc-grid-inner {
    max-width: var(--maxW);
    margin: 0 auto;
}

.svc-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2px;
    background: var(--b1);
    border: 1px solid var(--b1);
    overflow: hidden;
}

.svc-card {
    background: var(--s1);
    padding: 36px 32px 40px;
    display: block;
    position: relative;
    overflow: hidden;
    transition: background .3s;
}

.svc-card::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--flame);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .45s var(--ease);
}

.svc-card:hover {
    background: var(--s2);
}

.svc-card:hover::after {
    transform: scaleX(1);
}

.svc-card:hover .svc-card-title {
    color: var(--flame);
}

.svc-card-num {
    font-family: var(--fDisplay);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .14em;
    color: var(--flame);
    opacity: .6;
    margin-bottom: 20px;
}

.svc-card-emoji {
    font-size: 32px;
    margin-bottom: 16px;
    display: block;
}

.svc-card-icon-img {
    width: 48px;
    height: 48px;
    object-fit: contain;
    margin-bottom: 16px;
    filter: brightness(.9);
}

.svc-card-title {
    font-family: var(--fDisplay);
    font-size: clamp(20px, 2vw, 26px);
    font-weight: 700;
    letter-spacing: -.02em;
    color: var(--paper);
    margin-bottom: 12px;
    transition: color .2s;
    line-height: 1.1;
}

.svc-card-desc {
    font-size: 13px;
    color: var(--ghost3);
    line-height: 1.75;
    margin-bottom: 20px;
}

.svc-card-cta {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--ghost3);
    transition: color .2s, gap .2s;
}

.svc-card:hover .svc-card-cta {
    color: var(--flame);
    gap: 12px;
}

.svc-cta {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    padding: var(--sec) var(--px);
    text-align: center;
}

.svc-cta-h {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 8vw, 110px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .88;
    color: var(--paper);
    margin-bottom: 36px;
}

.svc-cta-h em {
    font-style: normal;
    color: var(--flame);
}

@media(max-width:900px) {
    .svc-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media(max-width:540px) {
    .svc-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<section class="svc-hero">
    <div class="svc-hero-glow" aria-hidden="true"></div>
    <div class="svc-hero-bg" aria-hidden="true">SERVICES</div>
    <div class="svc-hero-content">
        <span class="s-label rv" style="margin-bottom:18px;color:var(--ghost4)">What We Do</span>
        <h1 class="svc-h1 rv d1">Our <em>Services</em></h1>
        <p class="svc-hero-sub rv d2">From influencer campaigns to meme culture, brand strategy to performance marketing
            — everything your brand needs to belong on the internet.</p>
    </div>
</section>

<section class="svc-grid-sec">
    <div class="svc-grid-inner">
        <div class="svc-grid rv sc">
            <?php if (empty($services)): ?>
            <div style="grid-column:1/-1;padding:80px;text-align:center;background:var(--s1);">
                <p style="font-family:var(--fDisplay);font-size:40px;color:var(--ghost2)">Services coming soon.</p>
            </div>
            <?php else: foreach ($services as $i => $svc): ?>
            <a href="<?= base_url('services/' . $svc['slug']) ?>" class="svc-card">
                <div class="svc-card-num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></div>
                <?php if (!empty($svc['icon_image'])): ?>
                <img src="<?= base_url('assets/images/uploads/services/' . $svc['icon_image']) ?>" alt=""
                    class="svc-card-icon-img">
                <?php elseif (!empty($svc['icon_emoji'])): ?>
                <span class="svc-card-emoji"><?= htmlspecialchars($svc['icon_emoji']) ?></span>
                <?php endif; ?>
                <h2 class="svc-card-title"><?= htmlspecialchars($svc['title']) ?></h2>
                <p class="svc-card-desc"><?= htmlspecialchars(mb_substr($svc['short_description'], 0, 120)) ?>…</p>
                <span class="svc-card-cta">Learn More →</span>
            </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<section class="svc-cta">
    <span class="s-label rv" style="justify-content:center;margin:0 auto 22px">Ready to grow?</span>
    <h2 class="svc-cta-h rv d1">Let's Build<br><em>Together</em></h2>
    <div class="rv d2" style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
        <a href="<?= base_url('contact') ?>" class="btn-primary lg">Start a campaign</a>
        <a href="<?= base_url('work') ?>" class="btn-outline">See our work</a>
    </div>
</section>