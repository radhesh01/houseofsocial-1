<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
/* ================================================================
   POST DETAIL PAGE — Fully aligned to global dark theme system
================================================================ */
.pd-hero {
    background: var(--s0);
    min-height: 70svh;
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
    background: linear-gradient(to top, var(--ink) 0%, rgba(8, 8, 12, .6) 50%, rgba(8, 8, 12, .15) 100%);
}

.pd-hero-noimg {
    position: absolute;
    inset: 0;
    background: var(--s0);
    background-image:
        linear-gradient(rgba(244, 241, 236, .015) 1px, transparent 1px),
        linear-gradient(90deg, rgba(244, 241, 236, .015) 1px, transparent 1px);
    background-size: 80px 80px;
    -webkit-mask-image: radial-gradient(ellipse 90% 90% at 50% 50%, #000 30%, transparent 100%);
    mask-image: radial-gradient(ellipse 90% 90% at 50% 50%, #000 30%, transparent 100%);
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
    max-width: var(--maxW);
    margin: 0 auto;
    padding: 0 var(--px);
    margin-top: auto;
    padding-bottom: clamp(40px, 8vw, 80px);
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
    transition: transform .2s var(--ease);
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
    text-transform: uppercase;
}

.pd-title {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 7.5vw, 110px);
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
    max-width: 680px;
    border-left: 3px solid var(--flame);
    padding-left: 20px;
    font-style: italic;
}

.pd-layout {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: clamp(40px, 6vw, 80px);
    align-items: flex-start;
    max-width: var(--maxW);
    margin: 0 auto;
    padding: clamp(48px, 6vw, 90px) var(--px) var(--sec);
    background: var(--ink);
}

.pd-sidebar {
    position: sticky;
    top: calc(var(--navH) + 32px);
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.pd-sidebar-card {
    background: var(--s1);
    border: 1px solid var(--b1);
    padding: 28px;
    transition: border-color .3s;
}

.pd-sidebar-card:hover {
    border-color: rgba(255, 60, 0, .2);
}

.pd-sidebar-h {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .24em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-bottom: 16px;
    border-bottom: 1px solid var(--b1);
    padding-bottom: 12px;
}

.pd-sidebar-meta {
    font-size: 13px;
    color: var(--ghost4);
    line-height: 1.75;
}

.pd-sidebar-meta strong {
    color: var(--paper);
    font-weight: 600;
    display: block;
    margin-bottom: 2px;
}

.pd-content {
    font-size: clamp(16px, 1.55vw, 18px);
    color: var(--ghost4);
    line-height: 1.95;
}

.pd-content h1,
.pd-content h2,
.pd-content h3 {
    font-family: var(--fDisplay);
    color: var(--paper);
    margin: 48px 0 20px;
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
    margin-bottom: 24px;
}

.pd-content ul,
.pd-content ol {
    padding-left: 24px;
    margin-bottom: 24px;
}

.pd-content li {
    margin-bottom: 10px;
}

.pd-content li::marker {
    color: var(--flame);
}

.pd-content a {
    color: var(--flame);
    text-decoration: underline;
    text-underline-offset: 4px;
    transition: opacity .2s;
}

.pd-content a:hover {
    opacity: .8;
}

.pd-content strong {
    color: var(--paper);
    font-weight: 600;
}

.pd-content blockquote {
    border-left: 3px solid var(--flame);
    padding: 24px 32px;
    margin: 40px 0;
    background: rgba(255, 60, 0, .04);
}

.pd-content blockquote p {
    color: var(--paper);
    font-style: italic;
    font-size: clamp(18px, 1.8vw, 22px);
    margin-bottom: 0;
    line-height: 1.6;
}

.pd-content img {
    border-radius: 2px;
    max-width: 100%;
    margin: 36px 0;
    border: 1px solid var(--b1);
}

.pd-content pre,
.pd-content code {
    background: var(--s1);
    color: var(--lime);
    border-radius: 2px;
    padding: 4px 8px;
    font-size: 14px;
    border: 1px solid var(--b1);
}

.pd-content pre {
    padding: 24px;
    overflow-x: auto;
    margin: 32px 0;
}

.pd-ext-link {
    background: var(--s1);
    border: 1px solid var(--b1);
    padding: 28px 32px;
    margin-top: 56px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    flex-wrap: wrap;
    transition: background .3s;
}

.pd-ext-link:hover {
    background: var(--s2);
}

.pd-ext-lbl {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-bottom: 8px;
}

.pd-ext-url {
    color: var(--flame);
    font-size: 16px;
    word-break: break-all;
    transition: opacity .2s;
}

.pd-ext-url:hover {
    opacity: .75;
}

.pd-action-area {
    margin-top: 64px;
    padding-top: 48px;
    border-top: 1px solid var(--b1);
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
    align-items: center;
}

.pd-foot {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    padding: clamp(32px, 4vw, 56px) var(--px);
}

.pd-foot-inner {
    max-width: var(--maxW);
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
        order: 2;
    }

    .pd-content-wrap {
        order: 1;
    }
}

@media (max-width:640px) {
    .pd-action-area {
        flex-direction: column;
        align-items: stretch;
    }

    .pd-action-area .btn-primary,
    .pd-action-area .btn-outline {
        width: 100%;
        justify-content: center;
    }
}
</style>

<article>
    <header class="pd-hero">
        <?php if (!empty($post['image'])): ?>
        <div class="pd-hero-img">
            <img src="<?= base_url('assets/uploads/posts/' . $post['image']) ?>"
                alt="<?= htmlspecialchars($post['title']) ?>">
        </div>
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
                Back to All Work
            </a>
            <div class="pd-meta">
                <span class="pd-author-badge"><?= htmlspecialchars($post['author']) ?></span>
                <span class="pd-date"><?= date('d F Y', strtotime($post['created_at'])) ?></span>
                <?php if (!empty($post['external_link'])): ?>
                <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
                    style="font-size:11px;letter-spacing:.12em;color:var(--flame);text-transform:uppercase;font-weight:600;display:inline-block;margin-left:8px;">View
                    Campaign ↗</a>
                <?php endif; ?>
            </div>
            <h1 class="pd-title"><?= htmlspecialchars($post['title']) ?></h1>
            <p class="pd-desc"><?= htmlspecialchars($post['description']) ?></p>
        </div>
    </header>

    <div class="pd-layout">

        <div class="pd-content-wrap">
            <div class="pd-content rv">
                <?= $post['content'] /* HTML already sanitized on save */ ?>
            </div>

            <?php if (!empty($post['external_link'])): ?>
            <div class="pd-ext-link rv sc">
                <div>
                    <div class="pd-ext-lbl">External Link</div>
                    <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
                        class="pd-ext-url"><?= htmlspecialchars($post['external_link']) ?> ↗</a>
                </div>
                <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
                    class="btn-primary">View Campaign ↗</a>
            </div>
            <?php endif; ?>

            <div class="pd-action-area rv">
                <a href="<?= base_url('work') ?>" class="btn-outline">← All Work</a>
                <a href="<?= base_url('contact') ?>" class="btn-primary">Start a Similar Campaign</a>
            </div>
        </div>

        <aside class="pd-sidebar" aria-label="Post metadata">
            <div class="pd-sidebar-card rv sl d1">
                <div class="pd-sidebar-h">Campaign Details</div>
                <div class="pd-sidebar-meta">
                    <strong>Author</strong><?= htmlspecialchars($post['author']) ?>
                </div>
                <div class="pd-sidebar-meta" style="margin-top:16px;">
                    <strong>Published</strong><?= date('d M Y', strtotime($post['created_at'])) ?>
                </div>
                <?php if (!empty($post['external_link'])): ?>
                <div class="pd-sidebar-meta" style="margin-top:16px;">
                    <strong>Campaign Link</strong>
                    <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
                        style="color:var(--flame);font-size:14px;word-break:break-all;">View execution ↗</a>
                </div>
                <?php endif; ?>
            </div>

            <div class="pd-sidebar-card rv sl d2">
                <div class="pd-sidebar-h">Start Your Campaign</div>
                <p style="font-size:14px;color:var(--ghost4);line-height:1.75;margin-bottom:20px;">Ready to create
                    something like this for your brand?</p>
                <a href="<?= base_url('contact') ?>" class="btn-primary"
                    style="width:100%;justify-content:center;">Let's Talk</a>
            </div>
        </aside>
    </div>
</article>

<div class="pd-foot">
    <div class="pd-foot-inner">
        <a href="<?= base_url('work') ?>" class="btn-outline">← Back to All Work</a>
        <a href="<?= base_url('contact') ?>" class="btn-primary">Start a Campaign</a>
    </div>
</div>