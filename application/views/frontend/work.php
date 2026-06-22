
<style>
/* ================================================================
   WORK PAGE — HouseOfSocial
   Aligned with global dark-theme editorial system v5
================================================================ */
.wk-hero {
    background: var(--s0);
    padding: calc(var(--navH) + 80px) var(--px) 72px;
    position: relative;
    overflow: hidden;
    min-height: 56svh;
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
    font-size: clamp(64px, 12vw, 200px);
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
    color: var(--ghost4);
    max-width: 500px;
    line-height: 1.8;
}

/* Stats strip */
.wk-strip {
    background: var(--s1);
    border-top: 2px solid var(--flame);
    border-bottom: 1px solid var(--b1);
}

.wk-strip-inner {
    max-width: var(--maxW);
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
}

.wk-stat {
    padding: clamp(24px, 4vw, 32px) var(--px);
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
    font-size: clamp(32px, 4vw, 56px);
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
    margin-top: 8px;
    display: block;
}

/* Grid section */
.wk-grid-sec {
    background: var(--ink);
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
    margin-bottom: clamp(40px, 6vw, 72px);
    flex-wrap: wrap;
    gap: 24px;
}

.wk-grid-h {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 7vw, 96px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .88;
    color: var(--paper);
}

.wk-grid-h em {
    font-style: normal;
    color: var(--flame);
}

.wk-grid-sub {
    font-size: 14px;
    color: var(--ghost4);
    max-width: 320px;
    line-height: 1.78;
    text-align: right;
    align-self: flex-end;
}

/* Cards grid - Using hairline gap trick for borders */
.wk-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2px;
    background: var(--b1);
    border: 1px solid var(--b1);
    overflow: hidden;
}

.wk-card {
    position: relative;
    overflow: hidden;
    background: var(--s1);
    display: block;
    text-decoration: none;
    transition: background .35s;
}

.wk-card:hover {
    background: var(--s2);
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
    height: 260px;
    overflow: hidden;
    position: relative;
}

.wk-card-img img {
    width: 100%;
    height: 100%;
    object-fit: fill;
    /*filter: brightness(.44) saturate(.55);*/
    transition: transform .8s var(--ease), filter .8s;
}

.wk-card:hover .wk-card-img img {
    transform: scale(1.06);
    /*filter: brightness(.62) saturate(.9);*/
}

.wk-card-img::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(8, 8, 12, .96) 0%, transparent 60%);
}

.wk-card-ph {
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--s2);
}

.wk-card-ph span {
    font-family: var(--fDisplay);
    font-size: 52px;
    font-weight: 700;
    color: var(--ghost2);
}

.wk-card-body {
    padding: 24px 28px 36px;
}

.wk-card-tag {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--flame);
    opacity: .9;
    margin-bottom: 12px;
    display: block;
}

.wk-card-title {
    font-family: var(--fDisplay);
    font-size: clamp(20px, 2.4vw, 28px);
    font-weight: 700;
    letter-spacing: -.02em;
    color: var(--paper);
    line-height: 1.1;
    margin-bottom: 12px;
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
    margin-top: 18px;
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
    grid-column: 1 / -1;
    padding: 100px 24px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 14px;
    background: var(--s1);
    text-align: center;
}

.wk-empty-h {
    font-family: var(--fDisplay);
    font-size: clamp(32px, 5vw, 44px);
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
    font-size: clamp(44px, 8vw, 100px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .88;
    color: var(--paper);
    margin-bottom: 40px;
}

.wk-cta-h em {
    font-style: normal;
    color: var(--flame);
}

/* Responsiveness */
@media (max-width:1024px) {
    .wk-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width:768px) {
    .wk-strip-inner {
        grid-template-columns: repeat(2, 1fr);
    }

    .wk-stat {
        border-bottom: 1px solid var(--b1);
    }

    /* Remove right border on the second item in each row */
    .wk-stat:nth-child(2n) {
        border-right: none;
    }

    /* Remove bottom border on the last row */
    .wk-stat:nth-child(n+3) {
        border-bottom: none;
    }

    .wk-grid-hdr {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }

    .wk-grid-sub {
        text-align: left;
        max-width: 100%;
    }
}

@media (max-width:640px) {
    .wk-grid {
        grid-template-columns: 1fr;
    }

    .wk-card-img {
        height: 220px;
    }
}

@media (max-width:480px) {
    .wk-strip-inner {
        grid-template-columns: 1fr;
    }

    .wk-stat {
        border-right: none !important;
        border-bottom: 1px solid var(--b1);
    }

    .wk-stat:last-child {
        border-bottom: none;
    }

    .wk-cta-btns {
        flex-direction: column;
        width: 100%;
    }

    .wk-cta-btns .btn-primary,
    .wk-cta-btns .btn-outline {
        width: 100%;
        justify-content: center;
    }
}
</style>

<section class="wk-hero" aria-labelledby="wk-h1">
    <div class="wk-hero-glow" aria-hidden="true"></div>
    <div class="wk-hero-bg" aria-hidden="true">WORK</div>
    <div class="wk-hero-content">
        <span class="s-label rv" style="color:var(--ghost4);margin-bottom:18px">Portfolio</span>
        <h1 id="wk-h1" class="wk-h1 rv d1">Our<br><em>Work</em></h1>
        <p class="wk-hero-sub rv d2">300+ campaigns delivered across influencer marketing, meme culture, OTT, sports
            &amp; brands.</p>
    </div>
</section>

<div class="wk-strip">
    <div class="wk-strip-inner">
        <?php foreach (
            [
                ['250', '+', 'Campaigns Delivered', 'data-count="250" data-suffix="+"'],
                ['2', 'B+', 'Impressions Generated', 'data-count="2" data-suffix="B+"'],
                ['850', 'M+', 'Total Audience Reach', 'data-count="850" data-suffix="M+"'],
                ['40', 'K+', 'Creator Network', 'data-count="40" data-suffix="K+"'],
                ['150', '+', 'Brands Worked With', 'data-count="150" data-suffix="+"'],
            ] as $i => $s
        ): ?>
        <div class="wk-stat rv d<?= $i + 1 ?>">
            <span class="wk-stat-n" <?= $s[3] ?>><?= htmlspecialchars($s[0] . $s[1]) ?></span>
            <span class="wk-stat-l"><?= htmlspecialchars($s[2]) ?></span>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<section class="wk-grid-sec">
    <div class="wk-grid-wrap">
        <div class="wk-grid-hdr">
            <div class="rv sl">
                <span class="s-label" style="color:var(--flame);margin-bottom:16px">Case Studies</span>
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
                <?php if (!empty($post['image'])): ?>
                <div class="wk-card-img"><img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>"
                        alt="<?= htmlspecialchars($post['title']) ?>" loading="lazy"></div>
                <?php else: ?>
                <div class="wk-card-img wk-card-ph"><span>HOS</span></div>
                <?php endif; ?>
                <div class="wk-card-body">
                    <span class="wk-card-tag"><?= htmlspecialchars($post['author']) ?></span>
                    <h2 class="wk-card-title"><?= htmlspecialchars($post['title']) ?></h2>
                    <p class="wk-card-desc"><?= htmlspecialchars(mb_substr($post['description'], 0, 110)) ?>…</p>
                    <div class="wk-card-cta">View Campaign <span>→</span></div>
                </div>
            </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<div class="wk-cta">
    <span class="s-label rv" style="color:var(--ghost4);justify-content:center;margin:0 auto 18px">Ready to be
        next?</span>
    <h2 class="wk-cta-h rv d1">Start Your<br><em>Campaign</em></h2>
    <div class="wk-cta-btns rv d2" style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
        <a href="<?= base_url('contact') ?>" class="btn-primary lg">Let's Talk</a>
        <a href="<?= base_url('about') ?>" class="btn-outline">About Us</a>
    </div>
</div>