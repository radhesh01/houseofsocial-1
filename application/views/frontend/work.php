<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
/* ================================================================
   WORK PAGE
================================================================ */
.wk-hero {
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

.wk-hero-glow {
    position: absolute;
    border-radius: 50%;
    filter: blur(110px);
    pointer-events: none;
    z-index: 0;
}

.wk-g1 {
    width: 480px;
    height: 480px;
    background: rgba(212, 146, 10, .09);
    top: -130px;
    right: -90px;
}

.wk-g2 {
    width: 300px;
    height: 300px;
    background: rgba(107, 122, 85, .18);
    bottom: 8%;
    left: -70px;
}

.wk-hero-bg {
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

.wk-hero-content {
    position: relative;
    z-index: 2;
    max-width: var(--max);
}

.wk-h1 {
    font-family: var(--f-d);
    font-size: clamp(88px, 14vw, 210px);
    line-height: .82;
    letter-spacing: .02em;
    color: var(--cream);
    margin-bottom: 22px;
}

.wk-h1 span {
    color: transparent;
    -webkit-text-stroke: 2px rgba(242, 234, 216, .5);
}

.wk-hero-sub {
    font-family: var(--f-c);
    font-size: 13px;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: rgba(242, 234, 216, .36);
    max-width: 520px;
    line-height: 1.8;
}

/* counter strip */
.wk-strip {
    background: var(--ink);
    border-top: 2px solid var(--amber);
}

.wk-strip-inner {
    max-width: var(--max);
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}

.wk-strip-cell {
    padding: 28px var(--px);
    border-right: 1px solid rgba(242, 234, 216, .07);
    text-align: center;
}

.wk-strip-cell:last-child {
    border-right: none;
}

.wk-strip-n {
    font-family: var(--f-d);
    font-size: clamp(32px, 4vw, 52px);
    line-height: 1;
    color: var(--amber);
    letter-spacing: .02em;
}

.wk-strip-l {
    font-family: var(--f-c);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: rgba(242, 234, 216, .3);
    margin-top: 5px;
}

/* grid section */
.wk-grid-sec {
    background: var(--cream);
    padding: var(--sec-py) var(--px);
}

.wk-grid-wrap {
    max-width: var(--max);
    margin: 0 auto;
}

.wk-grid-hdr {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: var(--s14);
    flex-wrap: wrap;
    gap: var(--s6);
}

.wk-grid-h {
    font-family: var(--f-d);
    font-size: clamp(44px, 7vw, 96px);
    line-height: .88;
    letter-spacing: .02em;
    color: var(--ink);
}

.wk-grid-h span {
    color: var(--olive);
}

.wk-grid-sub {
    font-family: var(--f-s);
    font-style: italic;
    font-size: 15px;
    color: var(--muted);
    max-width: 300px;
    line-height: 1.82;
}

/* the main grid */
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
    background: var(--ink-2);
    display: block;
    text-decoration: none;
    transition: background .35s;
}

.wk-card:hover {
    background: var(--ink-3);
}

.wk-card::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--amber);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .45s var(--ease);
}

.wk-card:hover::after {
    transform: scaleX(1);
}

.wk-card-img {
    height: 240px;
    overflow: hidden;
    position: relative;
}

.wk-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(.46) saturate(.65);
    transition: transform .8s var(--ease), filter .8s;
}

.wk-card:hover .wk-card-img img {
    transform: scale(1.07);
    filter: brightness(.66) saturate(1);
}

.wk-card-img::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(26, 26, 16, .95) 0%, transparent 55%);
}

.wk-card-ph {
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--ink);
}

.wk-card-ph span {
    font-family: var(--f-d);
    font-size: 52px;
    color: rgba(242, 234, 216, .04);
}

.wk-card-body {
    padding: 28px;
}

.wk-card-author {
    font-family: var(--f-c);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .24em;
    text-transform: uppercase;
    color: var(--amber);
    opacity: .72;
    margin-bottom: 10px;
    display: block;
}

.wk-card-title {
    font-family: var(--f-d);
    font-size: clamp(22px, 2.5vw, 30px);
    letter-spacing: .02em;
    color: var(--cream);
    margin-bottom: 10px;
    line-height: 1.1;
    transition: color .28s;
}

.wk-card:hover .wk-card-title {
    color: var(--amber-2);
}

.wk-card-desc {
    font-size: 13.5px;
    color: rgba(242, 234, 216, .34);
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
    font-family: var(--f-c);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: rgba(242, 234, 216, .22);
    transition: color .25s, gap .25s;
}

.wk-card:hover .wk-card-cta {
    color: var(--amber-2);
    gap: 12px;
}

/* empty state */
.wk-empty {
    grid-column: span 3;
    padding: 88px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 16px;
    background: var(--ink-2);
    text-align: center;
}

.wk-empty-h {
    font-family: var(--f-d);
    font-size: 44px;
    color: rgba(242, 234, 216, .15);
}

.wk-empty-p {
    font-size: 15px;
    color: rgba(242, 234, 216, .22);
}

/* CTA bottom */
.wk-cta {
    background: var(--ink);
    border-top: 1px solid rgba(242, 234, 216, .07);
    padding: var(--s16) var(--px);
    text-align: center;
}

.wk-cta-h {
    font-family: var(--f-d);
    font-size: clamp(40px, 6vw, 84px);
    line-height: .88;
    letter-spacing: .02em;
    color: var(--cream);
    margin-bottom: var(--s10);
}

.wk-cta-h span {
    color: var(--amber);
}

@media(max-width:1024px) {
    .wk-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media(max-width:768px) {
    .wk-hero {
        padding-top: 120px;
    }

    .wk-strip-inner {
        grid-template-columns: 1fr 1fr;
    }

    .wk-strip-cell {
        border-bottom: 1px solid rgba(242, 234, 216, .07);
    }

    .wk-grid-hdr {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media(max-width:600px) {
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
    <div class="wk-hero-glow wk-g1" aria-hidden="true"></div>
    <div class="wk-hero-glow wk-g2" aria-hidden="true"></div>
    <div class="wk-hero-bg" aria-hidden="true">WORK</div>
    <div class="wk-hero-content">
        <p class="s-lbl rv" style="color:rgba(242,234,216,.36);margin-bottom:20px">Portfolio</p>
        <h1 id="wk-h1" class="wk-h1 rv d1">OUR<br><span>WORK</span></h1>
        <p class="wk-hero-sub rv d2">300+ campaigns delivered across Bollywood, Hollywood, OTT, sports &amp; brands.</p>
    </div>
</section>

<!-- STATS STRIP -->
<div class="wk-strip">
    <div class="wk-strip-inner">
        <?php foreach ([['300+', 'Campaigns'], ['32%', 'OTT Releases'], ['12M+', 'People Reached'], ['150+', 'Films Promoted']] as $i => $s): ?>
        <div class="wk-strip-cell rv d<?= $i + 1 ?>">
            <div class="wk-strip-n"><?= $s[0] ?></div>
            <div class="wk-strip-l"><?= $s[1] ?></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- GRID -->
<section class="wk-grid-sec">
    <div class="wk-grid-wrap">
        <div class="wk-grid-hdr">
            <div class="rv sl">
                <p class="s-lbl" style="color:var(--olive);margin-bottom:14px">Case Studies</p>
                <h2 class="wk-grid-h">ALL <span>WORK</span></h2>
            </div>
            <p class="wk-grid-sub rv sr">Every campaign crafted with cultural intelligence and executed to perfection.
            </p>
        </div>

        <div class="wk-grid rv ss">
            <?php if (empty($posts)): ?>
            <div class="wk-empty">
                <p class="wk-empty-h">Coming Soon</p>
                <p class="wk-empty-p">Great campaigns in the making — check back soon.</p>
            </div>
            <?php else: foreach ($posts as $post): ?>
            <a href="<?= base_url('post/' . $post['slug']) ?>" class="wk-card"
                aria-label="<?= htmlspecialchars($post['title']) ?>">
                <?php if ($post['image']): ?>
                <div class="wk-card-img">
                    <img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>"
                        alt="<?= htmlspecialchars($post['title']) ?>" loading="lazy">
                </div>
                <?php else: ?>
                <div class="wk-card-img wk-card-ph"><span>Cine</span></div>
                <?php endif; ?>
                <div class="wk-card-body">
                    <span class="wk-card-author"><?= htmlspecialchars($post['author']) ?></span>
                    <h2 class="wk-card-title"><?= htmlspecialchars($post['title']) ?></h2>
                    <p class="wk-card-desc"><?= htmlspecialchars($post['description']) ?></p>
                    <div class="wk-card-cta">View Campaign <span>&rarr;</span></div>
                </div>
            </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<div class="wk-cta">
    <p class="s-lbl rv" style="color:rgba(242,234,216,.26);justify-content:center;margin:0 auto 18px">Ready to be next?
    </p>
    <h2 class="wk-cta-h rv d1">START YOUR<br><span>CAMPAIGN</span></h2>
    <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;" class="rv d2">
        <a href="<?= base_url('contact') ?>" class="btn btn-amber btn-lg">Let's Talk</a>
        <a href="<?= base_url('about') ?>" class="btn btn-ol-lt">About Us</a>
    </div>
</div>