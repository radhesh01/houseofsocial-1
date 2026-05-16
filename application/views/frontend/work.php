<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    /* ═══════════════════════════════════
   WORK PAGE
═══════════════════════════════════ */
    .work-hero {
        background: var(--ink);
        padding: 140px 48px 72px;
        position: relative;
        overflow: hidden;
    }

    .work-hero-bg {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        font-family: var(--fd);
        font-size: clamp(100px, 20vw, 280px);
        letter-spacing: .02em;
        line-height: 1;
        color: transparent;
        -webkit-text-stroke: 1.5px rgba(240, 232, 208, .04);
        white-space: nowrap;
        pointer-events: none;
        user-select: none;
    }

    .work-h1 {
        font-family: var(--fd);
        font-size: clamp(72px, 13vw, 180px);
        line-height: .84;
        letter-spacing: .02em;
        color: var(--cream);
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    .work-h1 span {
        -webkit-text-stroke: 2px var(--cream);
        color: transparent;
    }

    .work-sub {
        font-family: var(--fb2);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: rgba(240, 232, 208, .38);
        max-width: 500px;
        position: relative;
        z-index: 2;
    }

    /* Grid */
    .work-sec {
        background: var(--cream);
        padding: 80px 48px 100px;
    }

    .work-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 3px;
        border: 3px solid var(--ink);
        overflow: hidden;
    }

    .work-card {
        position: relative;
        overflow: hidden;
        background: var(--ink);
        display: block;
        text-decoration: none;
        transition: background .3s;
    }

    .work-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--amber);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .4s var(--ease);
    }

    .work-card:hover::after {
        transform: scaleX(1);
    }

    .work-card:hover .wc-img img {
        transform: scale(1.06);
        filter: brightness(.7);
    }

    .work-card:hover .wc-title {
        color: var(--amber);
    }

    .wc-img {
        height: 220px;
        overflow: hidden;
    }

    .wc-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(.5) saturate(.7);
        transition: transform .7s var(--ease), filter .7s;
    }

    .wc-ph {
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--ink2);
    }

    .wc-ph span {
        font-family: var(--fd);
        font-size: 52px;
        color: rgba(240, 232, 208, .05);
    }

    .wc-body {
        padding: 28px;
    }

    .wc-author {
        font-family: var(--fb2);
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: var(--amber);
        opacity: .7;
        margin-bottom: 8px;
        display: block;
    }

    .wc-title {
        font-family: var(--fd);
        font-size: clamp(22px, 2.5vw, 32px);
        letter-spacing: .02em;
        color: var(--cream);
        margin-bottom: 8px;
        line-height: 1.1;
        transition: color .25s;
    }

    .wc-desc {
        font-size: 12px;
        color: rgba(240, 232, 208, .38);
        line-height: 1.65;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .wc-cta {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 16px;
        font-family: var(--fb2);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: rgba(240, 232, 208, .22);
        transition: color .25s, gap .25s;
    }

    .work-card:hover .wc-cta {
        color: var(--amber);
        gap: 12px;
    }

    .work-empty {
        grid-column: span 3;
        padding: 80px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 14px;
        background: var(--ink2);
    }

    .work-empty-h {
        font-family: var(--fd);
        font-size: 44px;
        color: rgba(240, 232, 208, .18);
    }

    .work-empty-p {
        font-size: 14px;
        color: rgba(240, 232, 208, .2);
    }

    /* Responsive */
    @media(max-width:1024px) {
        .work-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media(max-width:768px) {
        .work-hero {
            padding: 110px 24px 56px;
        }

        .work-sec {
            padding: 60px 24px 80px;
        }
    }

    @media(max-width:640px) {
        .work-grid {
            grid-template-columns: 1fr;
        }

        .work-empty {
            grid-column: span 1;
        }
    }
</style>


<!-- HERO -->
<section class="work-hero" aria-labelledby="work-h1">
    <div class="work-hero-bg" aria-hidden="true">WORK WORK WORK</div>
    <div style="max-width:1380px;margin:0 auto;position:relative;z-index:2;">
        <p class="tag-lbl rv" style="color:rgba(240,232,208,.35);margin-bottom:18px;">Portfolio</p>
        <h1 id="work-h1" class="work-h1 rv d1">
            OUR<br><span>WORK</span>
        </h1>
        <p class="work-sub rv d2">
            300+ campaigns delivered across Bollywood, Hollywood, OTT, sports, and brands.
        </p>
    </div>
</section>


<!-- GRID -->
<section class="work-sec">
    <div style="max-width:1380px;margin:0 auto;">
        <div class="work-grid rv ss">
            <?php if (empty($posts)): ?>
                <div class="work-empty">
                    <p class="work-empty-h">Coming Soon</p>
                    <p class="work-empty-p">Great campaigns in the making — check back soon.</p>
                </div>
                <?php else: foreach ($posts as $post): ?>
                    <a href="<?= base_url('post/' . $post['slug']) ?>" class="work-card"
                        aria-label="<?= htmlspecialchars($post['title']) ?>">
                        <?php if ($post['image']): ?>
                            <div class="wc-img">
                                <img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>"
                                    alt="<?= htmlspecialchars($post['title']) ?>" loading="lazy">
                            </div>
                        <?php else: ?>
                            <div class="wc-img wc-ph"><span>Cine</span></div>
                        <?php endif; ?>
                        <div class="wc-body">
                            <span class="wc-author"><?= htmlspecialchars($post['author']) ?></span>
                            <h2 class="wc-title"><?= htmlspecialchars($post['title']) ?></h2>
                            <p class="wc-desc"><?= htmlspecialchars($post['description']) ?></p>
                            <div class="wc-cta">View Campaign <span>→</span></div>
                        </div>
                    </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>