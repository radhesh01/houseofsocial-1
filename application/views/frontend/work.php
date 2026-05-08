<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
.work-card {
    position: relative;
    overflow: hidden;
    background: var(--card);
    border-bottom: 1px solid var(--border);
    border-right: 1px solid var(--border);
    padding: 36px;
    transition: background .4s;
    text-decoration: none;
    display: block;
}

.work-card::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--gold), var(--rose));
    transform: scaleX(0);
    transition: transform .45s cubic-bezier(.16, 1, .3, 1);
    transform-origin: left;
}

.work-card:hover {
    background: rgba(255, 255, 255, .02);
}

.work-card:hover::before {
    transform: scaleX(1);
}

.work-card:hover .card-img img {
    transform: scale(1.06);
}

.work-card:hover .card-title {
    color: var(--gold);
}

.card-img {
    height: 200px;
    overflow: hidden;
    border-radius: 8px;
    margin-bottom: 22px;
}

.card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .65s cubic-bezier(.16, 1, .3, 1);
}

.card-author {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: var(--gold);
    opacity: .7;
    margin-bottom: 8px;
}

.card-title {
    font-family: var(--font-d);
    font-weight: 300;
    font-style: italic;
    font-size: clamp(22px, 3vw, 30px);
    color: var(--ivory);
    margin-bottom: 10px;
    line-height: 1.15;
    transition: color .25s;
}

.card-desc {
    font-size: 13px;
    color: var(--smoke);
    line-height: 1.72;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-cta {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 18px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: rgba(201, 168, 76, .3);
    transition: color .25s, gap .25s;
}

.work-card:hover .card-cta {
    color: var(--gold);
    gap: 10px;
}
</style>

<section style="padding-top:140px;padding-bottom:80px;position:relative;z-index:1;" aria-labelledby="work-h">
    <div style="max-width:1380px;margin:0 auto;padding:0 60px">

        <p
            style="display:inline-flex;align-items:center;gap:10px;font-size:9px;font-weight:600;letter-spacing:.28em;text-transform:uppercase;color:var(--plum);margin-bottom:20px;">
            <span style="width:24px;height:1px;background:currentColor;"></span>
            Portfolio
        </p>
        <h1 id="work-h"
            style="font-family:var(--font-d);font-weight:300;font-style:italic;font-size:clamp(56px,11vw,132px);line-height:.88;letter-spacing:-.02em;color:var(--ivory);margin-bottom:20px;">
            Our <span
                style="background:linear-gradient(135deg,var(--plum),var(--teal));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Work</span>
        </h1>
        <p
            style="font-size:clamp(14px,1.8vw,17px);color:var(--smoke);max-width:480px;line-height:1.78;margin-bottom:60px;font-weight:400;">
            300+ campaigns delivered across Bollywood, Hollywood, OTT, sports, and brands.
        </p>

        <?php if (empty($posts)): ?>
        <div style="text-align:center;padding:80px 20px;color:var(--smoke);">
            <p style="font-family:var(--font-d);font-size:36px;font-style:italic;margin-bottom:12px;">Coming Soon</p>
            <p style="font-size:14px;">Check back soon — great campaigns in the making.</p>
        </div>
        <?php else: ?>

        <div
            style="display:grid;grid-template-columns:repeat(3,1fr);background:rgba(255,255,255,.04);border:1px solid var(--border);border-radius:12px;overflow:hidden;">
            <?php foreach ($posts as $i => $post): ?>
            <a href="<?= base_url('post/' . $post['slug']) ?>" class="work-card">

                <?php if ($post['image']): ?>
                <div class="card-img">
                    <img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>"
                        alt="<?= htmlspecialchars($post['title']) ?>" loading="lazy">
                </div>
                <?php else: ?>
                <div class="card-img"
                    style="background:linear-gradient(135deg,#1A1A26,#0A0A0F);display:flex;align-items:center;justify-content:center;">
                    <span
                        style="font-family:var(--font-d);font-size:52px;color:rgba(201,168,76,.06);font-style:italic;">Cine</span>
                </div>
                <?php endif; ?>

                <div class="card-author"><?= htmlspecialchars($post['author']) ?></div>
                <h2 class="card-title"><?= htmlspecialchars($post['title']) ?></h2>
                <p class="card-desc"><?= htmlspecialchars($post['description']) ?></p>
                <div class="card-cta">View Campaign <span>→</span></div>
            </a>
            <?php endforeach; ?>
        </div>

        <?php endif; ?>
    </div>
</section>

<style>
@media(max-width:1024px) {
    section>div {
        padding: 0 28px !important;
    }
}

@media(max-width:768px) {
    section>div>div[style*="grid-template-columns:repeat(3"] {
        grid-template-columns: 1fr 1fr !important;
    }

    .work-card {
        padding: 24px;
    }
}

@media(max-width:540px) {
    section>div>div[style*="grid-template-columns:repeat(3"] {
        grid-template-columns: 1fr !important;
    }

    section {
        padding-top: 100px !important;
    }
}
</style>