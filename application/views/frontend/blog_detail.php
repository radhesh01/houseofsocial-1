
<style>
.bd-hero {
    background: var(--s0);
    min-height: 62svh;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}
.bd-hero-img {
    position: absolute;
    inset: 0;
}
.bd-hero-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(.32) saturate(.45);
}
.bd-hero-img::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, var(--ink) 0%, rgba(8,8,12,.6) 50%, rgba(8,8,12,.15) 100%);
}
.bd-hero-noimg {
    position: absolute;
    inset: 0;
    background: var(--s0);
    background-image:
        linear-gradient(rgba(244,241,236,.015) 1px, transparent 1px),
        linear-gradient(90deg, rgba(244,241,236,.015) 1px, transparent 1px);
    background-size: 80px 80px;
    -webkit-mask-image: radial-gradient(ellipse 90% 90% at 50% 50%, #000 30%, transparent 100%);
    mask-image: radial-gradient(ellipse 90% 90% at 50% 50%, #000 30%, transparent 100%);
}
.bd-hero-noimg::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 60% 60% at 78% 28%, rgba(255,60,0,.07), transparent 60%);
}
.bd-hero-content {
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
.bd-back {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: rgba(244,241,236,0.45);
    margin-bottom: 36px;
    transition: color .2s;
}
.bd-back:hover { color: var(--flame); }
.bd-back svg { transition: transform .2s var(--ease); }
.bd-back:hover svg { transform: translateX(-4px); }
.bd-meta {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
    margin-bottom: 24px;
}
.bd-author-badge {
    background: rgba(255,60,0,.1);
    color: var(--flame);
    border: 1px solid rgba(255,60,0,.24);
    padding: 5px 16px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .14em;
    text-transform: uppercase;
}
.bd-date {
    font-size: 11px;
    letter-spacing: .12em;
    color: rgba(244,241,236,0.45);
    display: flex;
    align-items: center;
    gap: 6px;
    text-transform: uppercase;
}
.bd-title {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 7.5vw, 110px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .86;
    color: var(--paper);
    margin-bottom: 22px;
}
.bd-subtitle {
    font-size: clamp(15px, 1.8vw, 19px);
    color: rgba(244,241,236,0.65);
    line-height: 1.78;
    max-width: 680px;
    border-left: 3px solid var(--flame);
    padding-left: 20px;
    font-style: italic;
}
.bd-layout {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: clamp(40px, 6vw, 80px);
    align-items: flex-start;
    max-width: var(--maxW);
    margin: 0 auto;
    padding: clamp(48px, 6vw, 90px) var(--px) var(--sec);
    background: var(--ink);
}
.bd-sidebar {
    position: sticky;
    top: calc(var(--navH) + 32px);
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.bd-sidebar-card {
    background: var(--s1);
    border: 1px solid var(--b1);
    padding: 28px;
    transition: border-color .3s;
}
.bd-sidebar-card:hover { border-color: rgba(255,60,0,.2); }
.bd-sidebar-h {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .24em;
    text-transform: uppercase;
    color: rgba(244,241,236,0.45);
    margin-bottom: 16px;
    border-bottom: 1px solid var(--b1);
    padding-bottom: 12px;
}
.bd-sidebar-meta {
    font-size: 13px;
    color: rgba(244,241,236,0.65);
    line-height: 1.75;
}
.bd-sidebar-meta strong {
    color: var(--paper);
    font-weight: 600;
    display: block;
    margin-bottom: 2px;
}
.bd-content {
    font-size: clamp(16px, 1.55vw, 18px);
    color: white;
    line-height: 1.95;
}
.bd-content h1,.bd-content h2,.bd-content h3 {
    font-family: var(--fDisplay);
    color: var(--paper);
    margin: 48px 0 20px;
    letter-spacing: -.03em;
    line-height: .9;
}
.bd-content h1 { font-size: clamp(36px, 5vw, 58px); }
.bd-content h2 { font-size: clamp(28px, 3.8vw, 46px); }
.bd-content h3 { font-size: clamp(22px, 2.8vw, 34px); }
.bd-content p { margin-bottom: 24px; }
.bd-content ul,.bd-content ol { padding-left: 24px; margin-bottom: 24px; }
.bd-content li { margin-bottom: 10px; }
.bd-content li::marker { color: var(--flame); }
.bd-content a { color: var(--flame); text-decoration: underline; text-underline-offset: 4px; transition: opacity .2s; }
.bd-content a:hover { opacity: .8; }
.bd-content strong { color: var(--paper); font-weight: 600; }
.bd-content blockquote {
    border-left: 3px solid var(--flame);
    padding: 24px 32px;
    margin: 40px 0;
    background: rgba(255,60,0,.04);
}
.bd-content blockquote p {
    color: var(--paper);
    font-style: italic;
    font-size: clamp(18px, 1.8vw, 22px);
    margin-bottom: 0;
    line-height: 1.6;
}
.bd-content img { border-radius: 2px; max-width: 100%; margin: 36px 0; border: 1px solid var(--b1); }
.bd-content pre,.bd-content code { background: var(--s1); color: var(--lime); border-radius: 2px; padding: 4px 8px; font-size: 14px; border: 1px solid var(--b1); }
.bd-content pre { padding: 24px; overflow-x: auto; margin: 32px 0; }
.bd-action-area {
    margin-top: 64px;
    padding-top: 48px;
    border-top: 1px solid var(--b1);
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
    align-items: center;
}
.bd-related {
    background: var(--s1);
    border-top: 1px solid var(--b1);
    padding: var(--sec) var(--px);
}
.bd-related-inner { max-width: var(--maxW); margin: 0 auto; }
.bd-related-h {
    font-family: var(--fDisplay);
    font-size: clamp(36px, 5vw, 60px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .9;
    color: var(--paper);
    margin-bottom: 40px;
}
.bd-related-h em { font-style: normal; color: var(--flame); }
.bd-related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2px;
    background: var(--b1);
    border: 1px solid var(--b1);
    overflow: hidden;
}
.bd-rel-card {
    background: var(--s1);
    display: block;
    transition: background .2s;
    overflow: hidden;
}
.bd-rel-card:hover { background: var(--s2); }
.bd-rel-card:hover .bd-rel-title { color: var(--flame); }
.bd-rel-img { height: 140px; overflow: hidden; }
.bd-rel-img img { width: 100%; height: 100%; object-fit: cover; filter: brightness(.5); transition: transform .6s var(--ease), filter .6s; }
.bd-rel-card:hover .bd-rel-img img { transform: scale(1.04); filter: brightness(.65); }
.bd-rel-img-ph { height: 140px; background: var(--s2); display: flex; align-items: center; justify-content: center; }
.bd-rel-img-ph span { font-family: var(--fDisplay); font-size: 28px; color: rgba(244,241,236,.1); }
.bd-rel-body { padding: 20px 22px 26px; }
.bd-rel-meta {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--flame);
    opacity: .8;
    margin-bottom: 10px;
}
.bd-rel-title {
    font-family: var(--fDisplay);
    font-size: clamp(17px, 1.8vw, 22px);
    font-weight: 700;
    color: var(--paper);
    line-height: 1.1;
    letter-spacing: -.02em;
    transition: color .2s;
}
.bd-foot {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    padding: clamp(28px, 4vw, 48px) var(--px);
}
.bd-foot-inner {
    max-width: var(--maxW);
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    flex-wrap: wrap;
}
@media(max-width:960px) {
    .bd-layout { grid-template-columns: 1fr; }
    .bd-sidebar { position: static; order: 2; }
    .bd-content-wrap { order: 1; }
    .bd-related-grid { grid-template-columns: 1fr 1fr; }
}
@media(max-width:640px) {
    .bd-action-area { flex-direction: column; align-items: stretch; }
    .bd-action-area .btn-primary,.bd-action-area .btn-outline { width: 100%; justify-content: center; }
    .bd-related-grid { grid-template-columns: 1fr; }
}
</style>

<article>
    <header class="bd-hero">
        <?php if (!empty($blog['image'])): ?>
        <div class="bd-hero-img">
            <img src="<?= base_url('assets/images/uploads/' . $blog['image']) ?>" alt="<?= htmlspecialchars($blog['title']) ?>">
        </div>
        <?php else: ?>
        <div class="bd-hero-noimg"></div>
        <?php endif; ?>

        <div class="bd-hero-content">
            <a href="<?= base_url('blog') ?>" class="bd-back">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"/>
                    <polyline points="12 19 5 12 12 5"/>
                </svg>
                All Articles
            </a>
            <div class="bd-meta">
                <span class="bd-author-badge"><?= htmlspecialchars($blog['author']) ?></span>
                <span class="bd-date">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    <?= date('d F Y', strtotime($blog['created_at'])) ?>
                </span>
            </div>
            <h1 class="bd-title"><?= htmlspecialchars($blog['title']) ?></h1>
            <?php if (!empty($blog['subtitle'])): ?>
                <p class="bd-subtitle"><?= htmlspecialchars($blog['subtitle']) ?></p>
            <?php endif; ?>
        </div>
    </header>

    <div class="bd-layout">
        <div class="bd-content-wrap">
            <div class="bd-content rv">
                <?= $blog['content'] ?>
            </div>
            <div class="bd-action-area rv">
                <a href="<?= base_url('blog') ?>" class="btn-outline">← All Articles</a>
                <a href="<?= base_url('contact') ?>" class="btn-primary">Start a Campaign</a>
            </div>
        </div>

        <aside class="bd-sidebar" aria-label="Article metadata">
            <div class="bd-sidebar-card rv sl d1">
                <div class="bd-sidebar-h">About This Article</div>
                <div class="bd-sidebar-meta">
                    <strong>Author</strong><?= htmlspecialchars($blog['author']) ?>
                </div>
                <div class="bd-sidebar-meta" style="margin-top:16px">
                    <strong>Published</strong><?= date('d M Y', strtotime($blog['created_at'])) ?>
                </div>
                <?php if (!empty($blog['updated_at']) && $blog['created_at'] !== $blog['updated_at']): ?>
                <!--<div class="bd-sidebar-meta" style="margin-top:16px">-->
                <!--    <strong>Updated</strong><?= date('d M Y', strtotime($blog['updated_at'])) ?>-->
                <!--</div>-->
                <?php endif; ?>
            </div>

            <div class="bd-sidebar-card rv sl d2">
                <div class="bd-sidebar-h">Want Results Like This?</div>
                <p style="font-size:13px;color:rgba(244,241,236,0.65);line-height:1.75;margin-bottom:18px">
                    Talk to us about building a campaign that actually moves culture.
                </p>
                <a href="<?= base_url('contact') ?>" class="btn-primary" style="width:100%;justify-content:center">Let's Talk</a>
            </div>

            <div class="bd-sidebar-card rv sl d3">
                <div class="bd-sidebar-h">Explore More</div>
                <a href="<?= base_url('blog') ?>" style="display:block;font-size:13px;color:rgba(244,241,236,0.65);margin-bottom:8px;transition:color .2s"
                    onmouseover="this.style.color='var(--flame)'" onmouseout="this.style.color='rgba(244,241,236,0.65)'">← All Articles</a>
                <a href="<?= base_url('work') ?>" style="display:block;font-size:13px;color:rgba(244,241,236,0.65);margin-bottom:8px;transition:color .2s"
                    onmouseover="this.style.color='var(--flame)'" onmouseout="this.style.color='rgba(244,241,236,0.65)'">Our Work</a>
                <a href="<?= base_url('services') ?>" style="display:block;font-size:13px;color:rgba(244,241,236,0.65);transition:color .2s"
                    onmouseover="this.style.color='var(--flame)'" onmouseout="this.style.color='rgba(244,241,236,0.65)'">Our Services</a>
            </div>
        </aside>
    </div>
</article>

<?php
$CI = &get_instance();
$all_blogs = $CI->Blog_model->get_active();
$related = array_filter($all_blogs, fn($b) => $b['id'] !== $blog['id']);
$related = array_slice(array_values($related), 0, 3);
?>
<?php if (!empty($related)): ?>
<section class="bd-related">
    <div class="bd-related-inner">
        <span class="s-label rv" style="margin-bottom:18px">Keep Reading</span>
        <h2 class="bd-related-h rv d1">More <em>Articles</em></h2>
        <div class="bd-related-grid rv sc">
            <?php foreach ($related as $r): ?>
            <a href="<?= base_url('blog/' . $r['slug']) ?>" class="bd-rel-card">
                <?php if (!empty($r['image'])): ?>
                <div class="bd-rel-img">
                    <img src="<?= base_url('assets/images/uploads/' . $r['image']) ?>" alt="<?= htmlspecialchars($r['title']) ?>" loading="lazy">
                </div>
                <?php else: ?>
                <div class="bd-rel-img-ph"><span>HOS</span></div>
                <?php endif; ?>
                <div class="bd-rel-body">
                    <div class="bd-rel-meta"><?= htmlspecialchars($r['author']) ?> · <?= date('d M Y', strtotime($r['created_at'])) ?></div>
                    <h3 class="bd-rel-title"><?= htmlspecialchars($r['title']) ?></h3>
                    <?php if (!empty($r['subtitle'])): ?>
                    <p style="font-size:12px;color:rgba(244,241,236,0.45);line-height:1.65;margin-top:8px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden">
                        <?= htmlspecialchars($r['subtitle']) ?>
                    </p>
                    <?php endif; ?>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!--<div class="bd-foot">-->
<!--    <div class="bd-foot-inner">-->
<!--        <a href="<?= base_url('blog') ?>" class="btn-outline">← Back to Blog</a>-->
<!--        <a href="<?= base_url('contact') ?>" class="btn-primary">Start a Campaign</a>-->
<!--    </div>-->
<!--</div>-->