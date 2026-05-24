<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
/* ================================================================
   WORK PAGE — HouseOfSocial
================================================================ */
.wk-hero {
    background: var(--s0);
    padding: calc(var(--navH) + 80px) var(--px) 72px;
    position: relative;
    overflow: hidden;
    min-height: 56vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

.wk-hero-glow {
    position: absolute;
    top: -180px;
    right: -120px;
    width: 580px;
    height: 580px;
    background: radial-gradient(circle, rgba(255, 60, 0, .08) 0%, transparent 60%);
    filter: blur(90px);
    pointer-events: none;
    z-index: 0;
}

.wk-hero-bg {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: var(--fDisplay);
    font-size: clamp(100px, 20vw, 310px);
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

.wk-hero-content {
    position: relative;
    z-index: 2;
    max-width: var(--maxW);
}

.wk-h1 {
    font-family: var(--fDisplay);
    font-size: clamp(80px, 13vw, 200px);
    font-weight: 700;
    letter-spacing: -.05em;
    line-height: .82;
    color: var(--paper);
    margin-bottom: 20px;
}

.wk-h1 em {
    font-style: normal;
    color: transparent;
    -webkit-text-stroke: 2px rgba(244, 241, 236, .4);
}

.wk-hero-sub {
    font-size: clamp(13px, 1.4vw, 16px);
    font-weight: 500;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--ghost3);
    max-width: 500px;
    line-height: 1.8;
}

/* Stats strip */
.wk-strip {
    background: var(--s1);
    border-top: 2px solid var(--flame);
}

.wk-strip-inner {
    max-width: var(--maxW);
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}

.wk-stat {
    padding: 26px var(--px);
    border-right: 1px solid var(--b1);
    text-align: center;
    cursor: default;
    transition: background .2s;
}

.wk-stat:last-child {
    border-right: none;
}

.wk-stat:hover {
    background: rgba(255, 60, 0, .04);
}

.wk-stat-n {
    font-family: var(--fDisplay);
    font-size: clamp(28px, 3.5vw, 50px);
    font-weight: 700;
    letter-spacing: -.03em;
    color: var(--flame);
    line-height: 1;
    display: block;
}

.wk-stat-l {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-top: 6px;
    display: block;
}

/* Grid section */
.wk-grid-sec {
    background: var(--paper);
    padding: var(--sec) var(--px);
}

.wk-grid-wrap {
    max-width: var(--maxW);
    margin: 0 auto;
}

.wk-grid-hdr {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: clamp(36px, 5vw, 64px);
    flex-wrap: wrap;
    gap: 24px;
}

.wk-grid-h {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 7vw, 96px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .88;
    color: var(--ink);
}

.wk-grid-h em {
    font-style: normal;
    color: var(--flame);
}

.wk-grid-sub {
    font-size: 14px;
    color: rgba(8, 8, 12, .5);
    max-width: 280px;
    line-height: 1.78;
    text-align: right;
    align-self: flex-end;
}

/* Cards grid */
.wk-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 3px;
    border: 2.5px solid var(--ink);
    overflow: hidden;
}

.wk-card {
    position: relative;
    overflow: hidden;
    background: var(--s2);
    display: block;
    text-decoration: none;
    transition: background .35s;
}

.wk-card:hover {
    background: var(--s3);
}

.wk-card::after {
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

.wk-card:hover::after {
    transform: scaleX(1);
}

.wk-card-img {
    height: 220px;
    overflow: hidden;
    position: relative;
}

.wk-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(.44) saturate(.55);
    transition: transform .8s var(--ease), filter .8s;
}

.wk-card:hover .wk-card-img img {
    transform: scale(1.06);
    filter: brightness(.62) saturate(.9);
}

.wk-card-img::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(8, 8, 12, .95) 0%, transparent 55%);
}

.wk-card-ph {
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--s3);
}

.wk-card-ph span {
    font-family: var(--fDisplay);
    font-size: 52px;
    font-weight: 700;
    color: var(--ghost2);
}

.wk-card-body {
    padding: 26px 28px 32px;
}

.wk-card-tag {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--flame);
    opacity: .8;
    margin-bottom: 9px;
    display: block;
}

.wk-card-title {
    font-family: var(--fDisplay);
    font-size: clamp(20px, 2.4vw, 28px);
    font-weight: 700;
    letter-spacing: -.02em;
    color: var(--paper);
    line-height: 1.1;
    margin-bottom: 10px;
    transition: color .22s;
}

.wk-card:hover .wk-card-title {
    color: var(--flame);
}

.wk-card-desc {
    font-size: 13px;
    color: var(--ghost3);
    line-height: 1.68;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.wk-card-cta {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-top: 16px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--ghost3);
    transition: color .22s, gap .22s;
}

.wk-card:hover .wk-card-cta {
    color: var(--flame);
    gap: 12px;
}

/* Empty state */
.wk-empty {
    grid-column: span 3;
    padding: 80px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 14px;
    background: var(--s2);
    text-align: center;
}

.wk-empty-h {
    font-family: var(--fDisplay);
    font-size: 44px;
    font-weight: 700;
    color: var(--ghost3);
}

.wk-empty-p {
    font-size: 15px;
    color: var(--ghost3);
}

/* CTA */
.wk-cta {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    padding: var(--sec) var(--px);
    text-align: center;
}

.wk-cta-h {
    font-family: var(--fDisplay);
    font-size: clamp(40px, 6vw, 84px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .88;
    color: var(--paper);
    margin-bottom: var(--sec);
}

.wk-cta-h em {
    font-style: normal;
    color: var(--flame);
}

@media (max-width:1024px) {
    .wk-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width:768px) {
    .wk-strip-inner {
        grid-template-columns: 1fr 1fr;
    }

    .wk-stat {
        border-bottom: 1px solid var(--b1);
    }

    .wk-grid-hdr {
        flex-direction: column;
        align-items: flex-start;
    }

    .wk-grid-sub {
        text-align: left;
    }
}

@media (max-width:600px) {
    .wk-grid {
        grid-template-columns: 1fr;
    }

    .wk-empty {
        grid-column: span 1;
        padding: 48px 24px;
    }

    .wk-strip-inner {
        grid-template-columns: 1fr 1fr;
    }
}
</style>

<!-- HERO -->
<section class="wk-hero" aria-labelledby="wk-h1">
    <div class="wk-hero-glow" aria-hidden="true"></div>
    <div class="wk-hero-bg" aria-hidden="true">WORK</div>
    <div class="wk-hero-content">
        <span class="s-label rv" style="color:var(--ghost3);margin-bottom:18px">Portfolio</span>
        <h1 id="wk-h1" class="wk-h1 rv d1">Our<br><em>Work</em></h1>
        <p class="wk-hero-sub rv d2">300+ campaigns delivered across influencer marketing, meme culture, OTT, sports
            &amp; brands.</p>
    </div>
</section>

<!-- STATS -->
<div class="wk-strip">
    <div class="wk-strip-inner">
        <?php foreach ([['300+', 'Campaigns'], ['32%', 'OTT Releases'], ['12M+', 'People Reached'], ['150+', 'Brands']] as $i => $s): ?>
        <div class="wk-stat rv d<?= $i + 1 ?>">
            <span class="wk-stat-n"><?= $s[0] ?></span>
            <span class="wk-stat-l"><?= $s[1] ?></span>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- GRID -->
<section class="wk-grid-sec">
    <div class="wk-grid-wrap">
        <div class="wk-grid-hdr">
            <div class="rv sl">
                <span class="s-label" style="color:var(--flame);margin-bottom:14px">Case Studies</span>
                <h2 class="wk-grid-h">All <em>Work</em></h2>
            </div>
            <p class="wk-grid-sub rv sr">Every campaign crafted with cultural intelligence and executed to perfection.
            </p>
        </div>

        <div class="wk-grid rv sc">
            <?php if (empty($posts)): ?>
            <div class="wk-empty">
                <p class="wk-empty-h">Coming Soon</p>
                <p class="wk-empty-p">Great campaigns in the making — check back soon.</p>
            </div>
            <?php else: foreach ($posts as $post): ?>
            <a href="<?= base_url('post/' . $post['slug']) ?>" class="wk-card"
                aria-label="<?= htmlspecialchars($post['title']) ?>">
                <?php if ($post['image']): ?>
                <div class="wk-card-img"><img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>"
                        alt="<?= htmlspecialchars($post['title']) ?>" loading="lazy"></div>
                <?php else: ?>
                <div class="wk-card-img wk-card-ph"><span>HOS</span></div>
                <?php endif; ?>
                <div class="wk-card-body">
                    <span class="wk-card-tag"><?= htmlspecialchars($post['author']) ?></span>
                    <h2 class="wk-card-title"><?= htmlspecialchars($post['title']) ?></h2>
                    <p class="wk-card-desc"><?= htmlspecialchars($post['description']) ?></p>
                    <div class="wk-card-cta">View Campaign <span>→</span></div>
                </div>
            </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<div class="wk-cta">
    <span class="s-label rv" style="color:var(--ghost3);justify-content:center;margin:0 auto 18px">Ready to be
        next?</span>
    <h2 class="wk-cta-h rv d1">Start Your<br><em>Campaign</em></h2>
    <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;" class="rv d2">
        <a href="<?= base_url('contact') ?>" class="btn-primary lg">Let's Talk</a>
        <a href="<?= base_url('about') ?>" class="btn-outline">About Us</a>
    </div>
</div>