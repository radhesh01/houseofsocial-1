
<style>
.bl-hero {
    background: var(--s0);
    padding: calc(var(--navH) + 80px) var(--px) 64px;
    position: relative;
    overflow: hidden;
    min-height: 50svh;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}
.bl-hero-glow {
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
.bl-hero-bg {
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
.bl-hero-content {
    position: relative;
    z-index: 2;
    max-width: var(--maxW);
}
.bl-h1 {
    font-family: var(--fDisplay);
    font-size: clamp(64px, 12vw, 190px);
    font-weight: 700;
    letter-spacing: -.05em;
    line-height: .82;
    color: var(--paper);
    margin-bottom: 20px;
}
.bl-h1 em { font-style: normal; color: var(--flame); }
.bl-hero-sub {
    font-size: clamp(14px, 1.5vw, 17px);
    color: rgba(244,241,236,0.65);
    line-height: 1.8;
    max-width: 520px;
}
.bl-grid-sec {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    padding: var(--sec) var(--px);
}
.bl-grid-inner { max-width: var(--maxW); margin: 0 auto; }
.bl-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2px;
    background: var(--b1);
    border: 1px solid var(--b1);
    overflow: hidden;
}
.bl-card {
    background: var(--s1);
    display: block;
    position: relative;
    overflow: hidden;
    transition: background .3s;
    text-decoration: none;
}
.bl-card::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 3px;
    background: var(--flame);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .45s var(--ease);
}
.bl-card:hover { background: var(--s2); }
.bl-card:hover::after { transform: scaleX(1); }
.bl-card:hover .bl-card-title { color: var(--flame); }

.bl-card-img {
    height: 200px;
    overflow: hidden;
    position: relative;
}
.bl-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(.55) saturate(.7);
    transition: transform .7s var(--ease), filter .7s;
}
.bl-card:hover .bl-card-img img {
    transform: scale(1.04);
    filter: brightness(.7) saturate(.9);
}
.bl-card-img::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(8,8,12,.9) 0%, transparent 60%);
}
.bl-card-img-ph {
    height: 200px;
    background: var(--s2);
    display: flex;
    align-items: center;
    justify-content: center;
}
.bl-card-img-ph span {
    font-family: var(--fDisplay);
    font-size: 48px;
    font-weight: 700;
    color: rgba(244,241,236,.1);
}
.bl-card-body {
    padding: 28px 28px 36px;
}
.bl-card-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 14px;
    flex-wrap: wrap;
}
.bl-card-author {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--flame);
    opacity: .85;
}
.bl-card-date {
    font-size: 10px;
    color: rgba(244,241,236,0.45);
    letter-spacing: .1em;
}
.bl-card-title {
    font-family: var(--fDisplay);
    font-size: clamp(20px, 2.2vw, 26px);
    font-weight: 700;
    letter-spacing: -.02em;
    color: var(--paper);
    line-height: 1.1;
    margin-bottom: 10px;
    transition: color .2s;
}
.bl-card-subtitle {
    font-size: 13px;
    color: rgba(244,241,236,0.55);
    line-height: 1.72;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 18px;
}
.bl-card-cta {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: rgba(244,241,236,0.45);
    transition: color .2s, gap .2s;
}
.bl-card:hover .bl-card-cta { color: var(--flame); gap: 12px; }

/* Featured first card */
.bl-card-featured {
    grid-column: 1 / 3;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
}
.bl-card-featured .bl-card-img {
    height: 100%;
    min-height: 320px;
    overflow: hidden;
    position: relative;
}
.bl-card-featured .bl-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(.45) saturate(.55);
    transition: transform .8s var(--ease), filter .8s;
}
.bl-card-featured:hover .bl-card-img img {
    transform: scale(1.04);
    filter: brightness(.62) saturate(.9);
}
.bl-card-featured .bl-card-img::after {
    background: linear-gradient(to right, rgba(8,8,12,.9) 0%, transparent 70%);
}
.bl-card-featured .bl-card-img-ph {
    height: 100%;
    min-height: 320px;
}
.bl-card-featured .bl-card-body {
    padding: 40px 36px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}
.bl-card-feat-num {
    font-family: var(--fDisplay);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .2em;
    color: var(--flame);
    opacity: .7;
    margin-bottom: 12px;
}
.bl-card-featured .bl-card-title { font-size: clamp(24px, 2.8vw, 34px); }

.bl-empty {
    grid-column: 1 / -1;
    padding: 80px 24px;
    text-align: center;
    background: var(--s1);
}
.bl-empty-h {
    font-family: var(--fDisplay);
    font-size: clamp(28px, 4vw, 40px);
    font-weight: 700;
    color: rgba(244,241,236,.2);
    margin-bottom: 10px;
}

.bl-cta {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    padding: var(--sec) var(--px);
    text-align: center;
}
.bl-cta-h {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 7vw, 100px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .88;
    color: var(--paper);
    margin-bottom: 36px;
}
.bl-cta-h em { font-style: normal; color: var(--flame); }

@media(max-width:960px) {
    .bl-grid { grid-template-columns: 1fr 1fr; }
    .bl-card-featured { grid-column: 1 / -1; grid-template-columns: 1fr; }
    .bl-card-featured .bl-card-img { min-height: 220px; }
    .bl-card-featured .bl-card-img::after { background: linear-gradient(to top, rgba(8,8,12,.95) 0%, transparent 60%); }
}
@media(max-width:640px) {
    .bl-grid { grid-template-columns: 1fr; }
    .bl-card-featured { grid-template-columns: 1fr; }
}
</style>

<section class="bl-hero" aria-labelledby="bl-h1">
    <div class="bl-hero-glow" aria-hidden="true"></div>
    <div class="bl-hero-bg" aria-hidden="true">BLOG</div>
    <div class="bl-hero-content">
        <span class="s-label rv" style="margin-bottom:18px;color:rgba(244,241,236,0.55)">Insights &amp; Perspectives</span>
        <h1 id="bl-h1" class="bl-h1 rv d1">Our <em>Blog</em></h1>
        <p class="bl-hero-sub rv d2">Strategy, culture, creator economy, and digital marketing insights from the people who live online.</p>
    </div>
</section>

<section class="bl-grid-sec">
    <div class="bl-grid-inner">
        <div class="bl-grid rv sc">
            <?php if (empty($blogs)): ?>
                <div class="bl-empty">
                    <p class="bl-empty-h">First post coming soon.</p>
                    <p style="font-size:14px;color:rgba(244,241,236,0.45)">We're writing something worth reading — check back soon.</p>
                </div>
            <?php else:
                foreach ($blogs as $i => $b):
                    $is_featured = ($i === 0 && count($blogs) > 1);
            ?>
                <?php if ($is_featured): ?>
                    <a href="<?= base_url('blog/' . $b['slug']) ?>" class="bl-card bl-card-featured">
                        <?php if (!empty($b['image'])): ?>
                        <div class="bl-card-img">
                            <img src="<?= base_url('assets/images/uploads/' . $b['image']) ?>" alt="<?= htmlspecialchars($b['title']) ?>" loading="lazy">
                        </div>
                        <?php else: ?>
                        <div class="bl-card-img-ph"><span>HOS</span></div>
                        <?php endif; ?>
                        <div class="bl-card-body">
                            <div class="bl-card-feat-num">FEATURED</div>
                            <div class="bl-card-meta">
                                <span class="bl-card-author"><?= htmlspecialchars($b['author']) ?></span>
                                <span class="bl-card-date"><?= date('d M Y', strtotime($b['created_at'])) ?></span>
                            </div>
                            <h2 class="bl-card-title"><?= htmlspecialchars($b['title']) ?></h2>
                            <?php if (!empty($b['subtitle'])): ?>
                                <p class="bl-card-subtitle"><?= htmlspecialchars($b['subtitle']) ?></p>
                            <?php endif; ?>
                            <span class="bl-card-cta">Read Article →</span>
                        </div>
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('blog/' . $b['slug']) ?>" class="bl-card">
                        <?php if (!empty($b['image'])): ?>
                        <div class="bl-card-img">
                            <img src="<?= base_url('assets/images/uploads/' . $b['image']) ?>" alt="<?= htmlspecialchars($b['title']) ?>" loading="lazy">
                        </div>
                        <?php else: ?>
                        <div class="bl-card-img-ph"><span>HOS</span></div>
                        <?php endif; ?>
                        <div class="bl-card-body">
                            <div class="bl-card-meta">
                                <span class="bl-card-author"><?= htmlspecialchars($b['author']) ?></span>
                                <span class="bl-card-date"><?= date('d M Y', strtotime($b['created_at'])) ?></span>
                            </div>
                            <h2 class="bl-card-title"><?= htmlspecialchars($b['title']) ?></h2>
                            <?php if (!empty($b['subtitle'])): ?>
                                <p class="bl-card-subtitle"><?= htmlspecialchars($b['subtitle']) ?></p>
                            <?php endif; ?>
                            <span class="bl-card-cta">Read Article →</span>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<section class="bl-cta">
    <span class="s-label rv" style="justify-content:center;margin:0 auto 22px">Ready to grow?</span>
    <h2 class="bl-cta-h rv d1">Start Your<br><em>Campaign</em></h2>
    <div class="rv d2" style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap">
        <a href="<?= base_url('contact') ?>" class="btn-primary lg">Let's Talk</a>
        <a href="<?= base_url('work') ?>" class="btn-outline">See our work</a>
    </div>
</section>