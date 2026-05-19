<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    /* ================================================================
   POST DETAIL PAGE — Editorial Reading Experience
================================================================ */
    .pd-hero {
        background: var(--ink);
        min-height: 68vh;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    /* featured image */
    .pd-hero-img {
        position: absolute;
        inset: 0;
    }

    .pd-hero-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(.38) saturate(.55);
    }

    .pd-hero-img::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, var(--ink) 0%, rgba(26, 26, 16, .7) 40%, rgba(26, 26, 16, .2) 100%);
    }

    /* if no image */
    .pd-hero-noimg {
        position: absolute;
        inset: 0;
        background: var(--olive-dk);
        background-image: radial-gradient(rgba(242, 234, 216, .05) 1px, transparent 1px);
        background-size: 28px 28px;
    }

    .pd-hero-noimg::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 60% 70% at 80% 30%, rgba(212, 146, 10, .08), transparent 60%);
    }

    .pd-hero-content {
        position: relative;
        z-index: 2;
        max-width: 860px;
        margin: 0 auto;
        padding: 0 var(--px);
        margin-top: auto;
        padding-bottom: 64px;
        padding-top: calc(var(--nav-h) + 60px);
    }

    /* breadcrumb */
    .pd-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-family: var(--f-c);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .38);
        margin-bottom: 40px;
        transition: color .2s;
    }

    .pd-back:hover {
        color: var(--amber);
    }

    .pd-back svg {
        transition: transform .2s;
    }

    .pd-back:hover svg {
        transform: translateX(-4px);
    }

    /* author + date row */
    .pd-meta {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 26px;
    }

    .pd-author-badge {
        background: rgba(212, 146, 10, .1);
        color: var(--amber);
        border: 1px solid rgba(212, 146, 10, .24);
        padding: 5px 16px;
        border-radius: 100px;
        font-family: var(--f-c);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .pd-date {
        font-family: var(--f-c);
        font-size: 11px;
        letter-spacing: .12em;
        color: rgba(242, 234, 216, .3);
    }

    /* title */
    .pd-title {
        font-family: var(--f-d);
        font-size: clamp(48px, 8vw, 100px);
        line-height: .86;
        letter-spacing: .02em;
        color: var(--cream);
        margin-bottom: 24px;
    }

    /* description */
    .pd-desc {
        font-family: var(--f-s);
        font-style: italic;
        font-size: clamp(16px, 2vw, 20px);
        color: rgba(242, 234, 216, .52);
        line-height: 1.78;
        max-width: 640px;
        border-left: 3px solid var(--amber);
        padding-left: 22px;
    }

    /* article body */
    .pd-body-wrap {
        background: var(--cream);
    }

    .pd-body-inner {
        max-width: 860px;
        margin: 0 auto;
        padding: var(--s20) var(--px) var(--sec-py);
    }

    /* sidebar floater — desktop */
    .pd-layout {
        display: grid;
        grid-template-columns: 1fr 240px;
        gap: 64px;
        align-items: flex-start;
        max-width: 1100px;
        margin: 0 auto;
        padding: var(--s20) var(--px) var(--sec-py);
    }

    .pd-sidebar {
        position: sticky;
        top: 90px;
    }

    .pd-sidebar-card {
        background: var(--ink-2);
        border: 1px solid rgba(242, 234, 216, .07);
        padding: 22px;
        border-radius: 2px;
        margin-bottom: 14px;
    }

    .pd-sidebar-h {
        font-family: var(--f-c);
        font-size: 9.5px;
        font-weight: 700;
        letter-spacing: .24em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .28);
        margin-bottom: 14px;
        border-bottom: 1px solid rgba(242, 234, 216, .07);
        padding-bottom: 10px;
    }

    .pd-sidebar-meta {
        font-size: 13px;
        color: rgba(242, 234, 216, .45);
        line-height: 1.75;
    }

    .pd-sidebar-meta strong {
        color: rgba(242, 234, 216, .7);
        font-weight: 600;
        display: block;
    }

    /* content styles */
    .pd-content {
        font-size: clamp(15px, 1.6vw, 17px);
        color: var(--muted);
        line-height: 1.95;
    }

    .pd-content h1,
    .pd-content h2,
    .pd-content h3 {
        font-family: var(--f-d);
        color: var(--ink);
        margin: 40px 0 16px;
        letter-spacing: .02em;
        line-height: .9;
    }

    .pd-content h1 {
        font-size: clamp(38px, 5vw, 62px);
    }

    .pd-content h2 {
        font-size: clamp(30px, 4vw, 50px);
    }

    .pd-content h3 {
        font-size: clamp(24px, 3vw, 38px);
    }

    .pd-content p {
        margin-bottom: 24px;
    }

    .pd-content ul,
    .pd-content ol {
        padding-left: 26px;
        margin-bottom: 24px;
    }

    .pd-content li {
        margin-bottom: 10px;
        font-size: 16px;
    }

    .pd-content a {
        color: var(--amber);
        text-decoration: underline;
        text-underline-offset: 3px;
    }

    .pd-content strong {
        color: var(--ink);
        font-weight: 700;
    }

    .pd-content em {
        font-family: var(--f-s);
        font-style: italic;
    }

    .pd-content blockquote {
        border-left: 4px solid var(--amber);
        padding: 18px 24px;
        margin: 36px 0;
        background: rgba(212, 146, 10, .04);
    }

    .pd-content blockquote p {
        color: var(--ink);
        font-family: var(--f-s);
        font-style: italic;
        font-size: 18px;
        margin-bottom: 0;
        line-height: 1.8;
    }

    .pd-content img {
        border-radius: 4px;
        max-width: 100%;
        margin: 32px 0;
    }

    .pd-content pre,
    .pd-content code {
        background: var(--ink);
        color: var(--amber-2);
        border-radius: 4px;
        padding: 2px 8px;
        font-size: 14px;
    }

    .pd-content pre {
        padding: 20px 24px;
        overflow-x: auto;
    }

    .pd-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 28px 0;
    }

    .pd-content th {
        background: var(--ink);
        color: var(--cream);
        padding: 12px 16px;
        text-align: left;
        font-family: var(--f-c);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
    }

    .pd-content td {
        padding: 12px 16px;
        border-bottom: 1px solid var(--border);
        font-size: 15px;
    }

    /* external link */
    .pd-ext-link {
        background: var(--ink-2);
        border: 1px solid rgba(242, 234, 216, .07);
        padding: 22px 26px;
        border-radius: 2px;
        margin-top: 48px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .pd-ext-lbl {
        font-family: var(--f-c);
        font-size: 9.5px;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .28);
        margin-bottom: 5px;
    }

    .pd-ext-url {
        color: var(--amber-2);
        font-size: 15px;
        word-break: break-all;
        transition: color .2s;
    }

    .pd-ext-url:hover {
        color: var(--amber-3);
    }

    /* post footer */
    .pd-footer-nav {
        background: var(--ink);
        border-top: 1px solid rgba(242, 234, 216, .07);
        padding: var(--s12) var(--px);
    }

    .pd-footer-nav-inner {
        max-width: 1100px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: var(--s6);
        flex-wrap: wrap;
    }

    @media(max-width:960px) {
        .pd-layout {
            grid-template-columns: 1fr;
        }

        .pd-sidebar {
            position: static;
        }
    }

    @media(max-width:768px) {
        .pd-title {
            font-size: clamp(40px, 10vw, 72px);
        }

        .pd-hero-content {
            padding-bottom: 48px;
        }
    }
</style>

<!-- HERO -->
<article>
    <header class="pd-hero">
        <?php if (!empty($post['image'])): ?>
            <div class="pd-hero-img">
                <img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>"
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
                All Work
            </a>
            <div class="pd-meta">
                <span class="pd-author-badge"><?= htmlspecialchars($post['author']) ?></span>
                <span class="pd-date">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        style="display:inline;vertical-align:middle;margin-right:5px">
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
    <div class="pd-layout" style="background:var(--cream);">
        <!-- CONTENT -->
        <div>
            <div class="pd-content">
                <?= $post['content'] ?>
            </div>

            <?php if (!empty($post['external_link'])): ?>
                <div class="pd-ext-link">
                    <div>
                        <div class="pd-ext-lbl">External Link</div>
                        <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
                            class="pd-ext-url"><?= htmlspecialchars($post['external_link']) ?> &#8599;</a>
                    </div>
                    <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
                        class="btn btn-amber">View Campaign &#8599;</a>
                </div>
            <?php endif; ?>

            <!-- Back / CTA -->
            <div
                style="margin-top:56px;padding-top:40px;border-top:1px solid var(--border);display:flex;gap:14px;flex-wrap:wrap;align-items:center;">
                <a href="<?= base_url('work') ?>" class="btn btn-ink">← All Work</a>
                <a href="<?= base_url('contact') ?>" class="btn btn-amber">Start a Similar Campaign</a>
            </div>
        </div>

        <!-- SIDEBAR -->
        <aside class="pd-sidebar" aria-label="Post metadata">
            <div class="pd-sidebar-card">
                <div class="pd-sidebar-h">Campaign Details</div>
                <div class="pd-sidebar-meta">
                    <strong>Author</strong><?= htmlspecialchars($post['author']) ?>
                </div>
                <div class="pd-sidebar-meta" style="margin-top:14px;">
                    <strong>Published</strong><?= date('d M Y', strtotime($post['created_at'])) ?>
                </div>
                <?php if (!empty($post['external_link'])): ?>
                    <div class="pd-sidebar-meta" style="margin-top:14px;">
                        <strong>Campaign Link</strong>
                        <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
                            style="color:var(--amber-2);font-size:13px;word-break:break-all;">View &#8599;</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="pd-sidebar-card">
                <div class="pd-sidebar-h">Start Your Campaign</div>
                <p style="font-size:13px;color:rgba(242,234,216,.42);line-height:1.75;margin-bottom:14px;">Ready to
                    create something like this for your brand?</p>
                <a href="<?= base_url('contact') ?>" class="btn btn-amber"
                    style="width:100%;justify-content:center;font-size:14px;padding:11px;">Let's Talk</a>
            </div>
        </aside>
    </div>
</article>

<!-- FOOTER NAV -->
<div class="pd-footer-nav">
    <div class="pd-footer-nav-inner">
        <a href="<?= base_url('work') ?>" class="btn btn-ol-lt">← Back to All Work</a>
        <a href="<?= base_url('contact') ?>" class="btn btn-amber">Start a Campaign</a>
    </div>
</div>