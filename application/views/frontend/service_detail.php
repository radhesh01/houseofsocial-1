
<style>
    .sd-hero {
        background: var(--s0);
        padding: calc(var(--navH) + 72px) var(--px) 64px;
        position: relative;
        overflow: hidden;
        min-height: 50vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        border-bottom: 1px solid var(--b1);
    }

    .sd-hero-glow {
        position: absolute;
        top: -140px;
        right: -100px;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255, 60, 0, .08) 0%, transparent 65%);
        filter: blur(80px);
        pointer-events: none;
        z-index: 0;
    }

    .sd-hero-content {
        position: relative;
        z-index: 2;
        max-width: var(--maxW);
    }

    .sd-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: var(--ghost3);
        margin-bottom: 28px;
        transition: color .2s;
    }

    .sd-back:hover {
        color: var(--flame);
    }

    .sd-emoji {
        font-size: 48px;
        margin-bottom: 16px;
        display: block;
    }

    .sd-icon-img {
        width: 60px;
        height: 60px;
        object-fit: contain;
        margin-bottom: 18px;
        filter: brightness(.9);
    }

    .sd-h1 {
        font-family: var(--fDisplay);
        font-size: clamp(52px, 9vw, 140px);
        font-weight: 700;
        letter-spacing: -.05em;
        line-height: .84;
        color: var(--paper);
        margin-bottom: 20px;
    }

    .sd-h1 em {
        font-style: normal;
        color: var(--flame);
    }

    .sd-short {
        font-size: clamp(15px, 1.6vw, 19px);
        color: white;
        line-height: 1.78;
        max-width: 680px;
        border-left: 3px solid var(--flame);
        padding-left: 20px;
        font-style: italic;
    }

    .sd-layout {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: clamp(40px, 5vw, 72px);
        align-items: flex-start;
        max-width: var(--maxW);
        margin: 0 auto;
        padding: clamp(48px, 6vw, 90px) var(--px) var(--sec);
    }

    .sd-content {
        font-size: clamp(15px, 1.45vw, 17px);
        color: white;
        line-height: 1.95;
    }

    .sd-content h1,
    .sd-content h2,
    .sd-content h3 {
        font-family: var(--fDisplay);
        color: var(--paper);
        margin: 44px 0 18px;
        letter-spacing: -.03em;
        line-height: .9;
    }

    .sd-content h1 {
        font-size: clamp(32px, 4.5vw, 54px);
    }

    .sd-content h2 {
        font-size: clamp(26px, 3.5vw, 42px);
    }

    .sd-content h3 {
        font-size: clamp(20px, 2.6vw, 32px);
    }

    .sd-content p {
        margin-bottom: 22px;
    }

    .sd-content ul,
    .sd-content ol {
        padding-left: 22px;
        margin-bottom: 22px;
    }

    .sd-content li {
        margin-bottom: 8px;
    }

    .sd-content li::marker {
        color: var(--flame);
    }

    .sd-content a {
        color: var(--flame);
        text-decoration: underline;
        text-underline-offset: 4px;
    }

    .sd-content strong {
        color: var(--paper);
        font-weight: 600;
    }

    .sd-content blockquote {
        border-left: 3px solid var(--flame);
        padding: 20px 28px;
        margin: 36px 0;
        background: rgba(255, 60, 0, .04);
    }

    .sd-content blockquote p {
        color: var(--paper);
        font-style: italic;
        margin-bottom: 0;
    }

    .sd-content img {
        max-width: 100%;
        margin: 32px 0;
        border: 1px solid var(--b1);
    }

    .sd-seo {
        margin-top: 48px;
        padding-top: 40px;
        border-top: 1px solid var(--b1);
        font-size: 14px;
        color: var(--ghost3);
        line-height: 1.88;
    }

    .sd-seo h4 {
        font-family: var(--fDisplay);
        font-size: 20px;
        color: var(--paper);
        margin-bottom: 12px;
        letter-spacing: -.02em;
    }

    .sd-sidebar {
        position: sticky;
        top: calc(var(--navH) + 28px);
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .sd-sidebar-card {
        background: var(--s1);
        border: 1px solid var(--b1);
        padding: 26px;
        transition: border-color .3s;
    }

    .sd-sidebar-card:hover {
        border-color: rgba(255, 60, 0, .2);
    }

    .sd-sidebar-h {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .24em;
        text-transform: uppercase;
        color: var(--ghost3);
        margin-bottom: 14px;
        border-bottom: 1px solid var(--b1);
        padding-bottom: 10px;
    }

    .sd-other-svc {
        display: block;
        padding: 10px 0;
        border-bottom: 1px solid var(--b1);
        font-size: 13px;
        color: var(--ghost4);
        transition: color .2s, padding-left .2s;
    }

    .sd-other-svc:last-child {
        border-bottom: none;
    }

    .sd-other-svc:hover {
        color: var(--flame);
        padding-left: 6px;
    }

    .sd-other-svc.on {
        color: var(--flame);
    }

    .sd-foot {
        background: var(--s0);
        border-top: 1px solid var(--b1);
        padding: clamp(28px, 3.5vw, 48px) var(--px);
    }

    .sd-foot-inner {
        max-width: var(--maxW);
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    @media(max-width:960px) {
        .sd-layout {
            grid-template-columns: 1fr;
        }

        .sd-sidebar {
            position: static;
        }
    }
</style>

<article>
    <header class="sd-hero">
        <div class="sd-hero-glow" aria-hidden="true"></div>
        <div class="sd-hero-content">
            <a href="<?= base_url('services') ?>" class="sd-back">← All Services</a>
            <?php if (!empty($service['icon_image'])): ?>
                <img src="<?= base_url('assets/images/uploads/services/' . $service['icon_image']) ?>" alt=""
                    class="sd-icon-img">
            <?php elseif (!empty($service['icon_emoji'])): ?>
                <span class="sd-emoji"><?= htmlspecialchars($service['icon_emoji']) ?></span>
            <?php endif; ?>
            <h1 class="sd-h1"><?= htmlspecialchars($service['title']) ?></h1>
            <p class="sd-short"><?= htmlspecialchars($service['short_description']) ?></p>
        </div>
    </header>

    <div class="sd-layout">
        <div>
            <?php if (!empty($service['full_content'])): ?>
                <div class="sd-content rv"><?= $service['full_content'] ?></div>
            <?php else: ?>
                <div class="sd-content rv">
                    <p><?= htmlspecialchars($service['short_description']) ?></p>
                </div>
            <?php endif; ?>

            <?php if (!empty($service['seo_content'])): ?>
                <div class="sd-seo rv">
                    <h4>More About <?= htmlspecialchars($service['title']) ?></h4>
                    <?= $service['seo_content'] ?>
                </div>
            <?php endif; ?>

            <div style="margin-top:52px;padding-top:40px;border-top:1px solid var(--b1);display:flex;gap:14px;flex-wrap:wrap;"
                class="rv">
                <a href="<?= base_url('services') ?>" class="btn-outline">← All Services</a>
                <a href="<?= base_url('contact') ?>" class="btn-primary">Start a Campaign</a>
            </div>
        </div>

        <aside class="sd-sidebar">
            <div class="sd-sidebar-card rv d1">
                <div class="sd-sidebar-h">Get Started</div>
                <p style="font-size:13px;color:var(--ghost4);line-height:1.75;margin-bottom:18px;">Ready to run a
                    <?= htmlspecialchars($service['title']) ?> campaign for your brand?</p>
                <a href="<?= base_url('contact') ?>" class="btn-primary"
                    style="width:100%;justify-content:center;">Let's Talk</a>
            </div>

            <?php if (!empty($services) && count($services) > 1): ?>
                <div class="sd-sidebar-card rv d2">
                    <div class="sd-sidebar-h">Other Services</div>
                    <?php foreach ($services as $osvc): ?>
                        <?php if ($osvc['id'] == $service['id']) continue; ?>
                        <a href="<?= base_url('services/' . $osvc['slug']) ?>"
                            class="sd-other-svc <?= $osvc['slug'] === $service['slug'] ? 'on' : '' ?>">
                            <?php if (!empty($osvc['icon_emoji'])): ?><span
                                    style="margin-right:6px"><?= htmlspecialchars($osvc['icon_emoji']) ?></span><?php endif; ?>
                            <?= htmlspecialchars($osvc['title']) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </aside>
    </div>
</article>

<!--<div class="sd-foot">-->
<!--    <div class="sd-foot-inner">-->
<!--        <a href="<?= base_url('services') ?>" class="btn-outline">← All Services</a>-->
<!--        <a href="<?= base_url('contact') ?>" class="btn-primary">Start a Campaign →</a>-->
<!--    </div>-->
<!--</div>-->