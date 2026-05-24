<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
/* ================================================================
   POST DETAIL — HouseOfSocial
   Immersive reading experience with sticky sidebar
================================================================ */
.pd-hero {
    background: var(--s0);
    min-height: 70vh;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.pd-hero-img {
    position: absolute;
    inset: 0;
}

.pd-hero-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(.32) saturate(.45);
}

.pd-hero-img::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, var(--s0) 0%, rgba(8, 8, 12, .7) 40%, rgba(8, 8, 12, .15) 100%);
}

.pd-hero-noimg {
    position: absolute;
    inset: 0;
    background: var(--s1);
    background-image: radial-gradient(rgba(244, 241, 236, .04) 1px, transparent 1px);
    background-size: 28px 28px;
}

.pd-hero-noimg::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 60% 60% at 78% 28%, rgba(255, 60, 0, .07), transparent 60%);
}

.pd-hero-content {
    position: relative;
    z-index: 2;
    max-width: 900px;
    margin: 0 auto;
    padding: 0 var(--px);
    margin-top: auto;
    padding-bottom: 60px;
    padding-top: calc(var(--navH) + 56px);
    width: 100%;
}

.pd-back {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-bottom: 36px;
    transition: color .2s;
}

.pd-back:hover {
    color: var(--flame);
}

.pd-back svg {
    transition: transform .2s;
}

.pd-back:hover svg {
    transform: translateX(-4px);
}

.pd-meta {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
    margin-bottom: 24px;
}

.pd-author-badge {
    background: rgba(255, 60, 0, .1);
    color: var(--flame);
    border: 1px solid rgba(255, 60, 0, .24);
    padding: 5px 16px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .14em;
    text-transform: uppercase;
}

.pd-date {
    font-size: 11px;
    letter-spacing: .12em;
    color: var(--ghost3);
    display: flex;
    align-items: center;
    gap: 6px;
}

.pd-title {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 7.5vw, 96px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .86;
    color: var(--paper);
    margin-bottom: 22px;
}

.pd-desc {
    font-size: clamp(15px, 1.8vw, 19px);
    color: var(--ghost4);
    line-height: 1.78;
    max-width: 620px;
    border-left: 3px solid var(--flame);
    padding-left: 20px;
    font-style: italic;
}

/* Body layout */
.pd-layout {
    display: grid;
    grid-template-columns: 1fr 240px;
    gap: 60px;
    align-items: flex-start;
    max-width: 1140px;
    margin: 0 auto;
    padding: clamp(36px, 5vw, 72px) var(--px) var(--sec);
    background: var(--paper);
}

.pd-sidebar {
    position: sticky;
    top: calc(var(--navH) + 24px);
}

.pd-sidebar-card {
    background: var(--s2);
    border: 1px solid rgba(8, 8, 12, .12);
    padding: 22px;
    margin-bottom: 14px;
}

.pd-sidebar-h {
    font-size: 9.5px;
    font-weight: 600;
    letter-spacing: .24em;
    text-transform: uppercase;
    color: rgba(8, 8, 12, .4);
    margin-bottom: 14px;
    border-bottom: 1px solid rgba(8, 8, 12, .08);
    padding-bottom: 10px;
}

.pd-sidebar-meta {
    font-size: 13px;
    color: rgba(8, 8, 12, .5);
    line-height: 1.75;
}

.pd-sidebar-meta strong {
    color: rgba(8, 8, 12, .7);
    font-weight: 600;
    display: block;
}

/* Content typography */
.pd-content {
    font-size: clamp(15px, 1.55vw, 17px);
    color: rgba(8, 8, 12, .72);
    line-height: 1.95;
}

.pd-content h1,
.pd-content h2,
.pd-content h3 {
    font-family: var(--fDisplay);
    color: var(--ink);
    margin: 38px 0 16px;
    letter-spacing: -.03em;
    line-height: .9;
}

.pd-content h1 {
    font-size: clamp(36px, 5vw, 58px);
}

.pd-content h2 {
    font-size: clamp(28px, 3.8vw, 46px);
}

.pd-content h3 {
    font-size: clamp(22px, 2.8vw, 34px);
}

.pd-content p {
    margin-bottom: 22px;
}

.pd-content ul,
.pd-content ol {
    padding-left: 24px;
    margin-bottom: 22px;
}

.pd-content li {
    margin-bottom: 9px;
    font-size: 16px;
}

.pd-content a {
    color: var(--flame);
    text-decoration: underline;
    text-underline-offset: 3px;
}

.pd-content strong {
    color: var(--ink);
    font-weight: 700;
}

.pd-content blockquote {
    border-left: 4px solid var(--flame);
    padding: 16px 22px;
    margin: 32px 0;
    background: rgba(255, 60, 0, .04);
}

.pd-content blockquote p {
    color: var(--ink);
    font-style: italic;
    font-size: 17px;
    margin-bottom: 0;
    line-height: 1.8;
}

.pd-content img {
    border-radius: 2px;
    max-width: 100%;
    margin: 28px 0;
}

.pd-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 26px 0;
}

.pd-content th {
    background: var(--ink);
    color: var(--paper);
    padding: 12px 16px;
    text-align: left;
    font-family: var(--fDisplay);
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .12em;
    text-transform: uppercase;
}

.pd-content td {
    padding: 11px 16px;
    border-bottom: 1px solid rgba(8, 8, 12, .1);
    font-size: 14px;
}

.pd-content pre,
.pd-content code {
    background: var(--ink);
    color: var(--lime);
    border-radius: 2px;
    padding: 2px 8px;
    font-size: 14px;
}

.pd-content pre {
    padding: 20px 22px;
    overflow-x: auto;
}

/* External link box */
.pd-ext-link {
    background: var(--s2);
    border: 1px solid rgba(8, 8, 12, .12);
    padding: 22px 24px;
    margin-top: 44px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    flex-wrap: wrap;
}

.pd-ext-lbl {
    font-size: 9.5px;
    font-weight: 600;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: rgba(8, 8, 12, .4);
    margin-bottom: 5px;
}

.pd-ext-url {
    color: var(--flame);
    font-size: 15px;
    word-break: break-all;
    transition: opacity .2s;
}

.pd-ext-url:hover {
    opacity: .75;
}

/* Footer nav */
.pd-foot {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    padding: clamp(28px, 4vw, 48px) var(--px);
}

.pd-foot-inner {
    max-width: 1140px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--gap);
    flex-wrap: wrap;
}

@media (max-width:960px) {
    .pd-layout {
        grid-template-columns: 1fr;
    }

    .pd-sidebar {
        position: static;
    }
}

@media (max-width:640px) {
    .pd-title {
        font-size: clamp(38px, 10vw, 68px);
    }

    .pd-hero-content {
        padding-bottom: 44px;
    }
}
</style>

<article>
    <!-- HERO -->
    <header class="pd-hero">
        <?php if (!empty($post['image'])): ?>
        <div class="pd-hero-img"><img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>"
                alt="<?= htmlspecialchars($post['title']) ?>"></div>
        <?php else: ?>
        <div class="pd-hero-noimg"></div>
        <?php endif; ?>

        <div class="pd-hero-content">
            <a href="<?= base_url('work') ?>" class="pd-back">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12" />
                    <polyline points="12 19 5 12 12 5" />
                </svg>
                All Work
            </a>
            <div class="pd-meta">
                <span class="pd-author-badge"><?= htmlspecialchars($post['author']) ?></span>
                <span class="pd-date">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        style="display:inline;vertical-align:middle">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    <?= date('d F Y', strtotime($post['created_at'])) ?>
                </span>
            </div>
            <h1 class="pd-title"><?= htmlspecialchars($post['title']) ?></h1>
            <p class="pd-desc"><?= htmlspecialchars($post['description']) ?></p>
        </div>
    </header>

    <!-- BODY -->
    <div class="pd-layout">
        <!-- CONTENT -->
        <div>
            <div class="pd-content"><?= $post['content'] ?></div>

            <?php if (!empty($post['external_link'])): ?>
            <div class="pd-ext-link">
                <div>
                    <div class="pd-ext-lbl">External Link</div>
                    <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
                        class="pd-ext-url"><?= htmlspecialchars($post['external_link']) ?> ↗</a>
                </div>
                <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
                    class="btn-primary">View Campaign ↗</a>
            </div>
            <?php endif; ?>

            <div
                style="margin-top:52px;padding-top:36px;border-top:1px solid rgba(8,8,12,.12);display:flex;gap:14px;flex-wrap:wrap;align-items:center;">
                <a href="<?= base_url('work') ?>" class="btn-outline"
                    style="border-color:rgba(8,8,12,.22);color:var(--ink);">← All Work</a>
                <a href="<?= base_url('contact') ?>" class="btn-primary">Start a Similar Campaign</a>
            </div>
        </div>

        <!-- SIDEBAR -->
        <aside class="pd-sidebar" aria-label="Post metadata">
            <div class="pd-sidebar-card">
                <div class="pd-sidebar-h">Campaign Details</div>
                <div class="pd-sidebar-meta"><strong>Author</strong><?= htmlspecialchars($post['author']) ?></div>
                <div class="pd-sidebar-meta" style="margin-top:13px;">
                    <strong>Published</strong><?= date('d M Y', strtotime($post['created_at'])) ?></div>
                <?php if (!empty($post['external_link'])): ?>
                <div class="pd-sidebar-meta" style="margin-top:13px;">
                    <strong>Campaign Link</strong>
                    <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
                        style="color:var(--flame);font-size:13px;word-break:break-all;">View ↗</a>
                </div>
                <?php endif; ?>
            </div>
            <div class="pd-sidebar-card">
                <div class="pd-sidebar-h">Start Your Campaign</div>
                <p style="font-size:13px;color:rgba(8,8,12,.45);line-height:1.78;margin-bottom:14px;">Ready to create
                    something like this for your brand?</p>
                <a href="<?= base_url('contact') ?>" class="btn-primary"
                    style="width:100%;justify-content:center;font-size:14px;padding:12px;">Let's Talk</a>
            </div>
        </aside>
    </div>
</article>

<!-- FOOTER NAV -->
<div class="pd-foot">
    <div class="pd-foot-inner">
        <a href="<?= base_url('work') ?>" class="btn-outline">← Back to All Work</a>
        <a href="<?= base_url('contact') ?>" class="btn-primary">Start a Campaign</a>
    </div>
</div>