<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- Post Hero -->
<section style="padding-top:100px;min-height:100vh;background:#0A0A0F">

    <?php if ($post['image']): ?>
    <div style="width:100%;height:60vh;overflow:hidden;position:relative">
        <img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>"
            alt="<?= htmlspecialchars($post['title']) ?>"
            style="width:100%;height:100%;object-fit:cover;filter:brightness(.45)">
        <div style="position:absolute;inset:0;background:linear-gradient(to top,#0A0A0F 0%,transparent 55%)"></div>
    </div>
    <?php endif; ?>

    <div style="max-width:820px;margin:0 auto;padding:56px 40px 100px">

        <!-- Breadcrumb -->
        <a href="<?= base_url() ?>"
            style="display:inline-flex;align-items:center;gap:6px;font-size:12px;color:rgba(245,240,232,.35);text-decoration:none;transition:color .2s;margin-bottom:32px"
            onmouseover="this.style.color='#C9A84C'" onmouseout="this.style.color='rgba(245,240,232,.35)'">← Back to
            Home</a>

        <!-- Author badge + date -->
        <div style="display:flex;gap:14px;align-items:center;flex-wrap:wrap;margin-bottom:24px">
            <span
                style="background:rgba(201,168,76,.08);color:#C9A84C;border:1px solid rgba(201,168,76,.22);padding:4px 14px;border-radius:20px;font-size:12px;letter-spacing:.07em">
                <?= htmlspecialchars($post['author']) ?>
            </span>
            <span
                style="font-size:12px;color:rgba(245,240,232,.28)"><?= date('d F Y', strtotime($post['created_at'])) ?></span>
        </div>

        <!-- Title -->
        <h1
            style="font-family:'Cormorant Garamond',serif;font-weight:300;font-style:italic;font-size:clamp(40px,7vw,80px);line-height:.92;color:#F5F0E8;margin-bottom:24px">
            <?= htmlspecialchars($post['title']) ?>
        </h1>

        <!-- Description -->
        <p
            style="font-size:19px;color:rgba(245,240,232,.5);line-height:1.75;margin-bottom:52px;border-left:2px solid #C9A84C;padding-left:22px">
            <?= htmlspecialchars($post['description']) ?>
        </p>

        <!-- Full content -->
        <div class="post-body" style="font-size:16px;color:rgba(245,240,232,.72);line-height:1.95">
            <?= $post['content'] ?>
        </div>

        <!-- External link -->
        <?php if ($post['external_link']): ?>
        <div
            style="margin-top:48px;padding:24px;background:#14141F;border:1px solid rgba(255,255,255,.06);border-radius:10px">
            <p
                style="font-size:10px;color:rgba(245,240,232,.28);letter-spacing:.15em;text-transform:uppercase;margin-bottom:8px">
                External Link</p>
            <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
                style="color:#C9A84C;font-size:15px;word-break:break-all;text-decoration:none">
                <?= htmlspecialchars($post['external_link']) ?> ↗
            </a>
        </div>
        <?php endif; ?>

        <!-- Back CTA -->
        <div style="margin-top:64px;padding-top:40px;border-top:1px solid rgba(255,255,255,.07)">
            <a href="<?= base_url() ?>"
                style="display:inline-flex;align-items:center;gap:8px;background:linear-gradient(135deg,#C9A84C,#E8836A);color:#0A0A0F;font-family:'Cormorant Garamond',serif;font-style:italic;font-size:18px;letter-spacing:.06em;padding:13px 28px;border-radius:4px;text-decoration:none;transition:all .2s"
                onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">
                ← Back to Home
            </a>
        </div>
    </div>
</section>

<style>
.post-body h2,
.post-body h3 {
    font-family: 'Cormorant Garamond', serif;
    font-style: italic;
    color: #F5F0E8;
    margin: 36px 0 14px
}

.post-body h2 {
    font-size: 38px
}

.post-body h3 {
    font-size: 28px
}

.post-body p {
    margin-bottom: 22px
}

.post-body ul,
.post-body ol {
    padding-left: 24px;
    margin-bottom: 22px
}

.post-body li {
    margin-bottom: 8px
}

.post-body strong {
    color: #F5F0E8;
    font-weight: 600
}

.post-body a {
    color: #C9A84C;
    text-decoration: underline
}

.post-body blockquote {
    border-left: 2px solid #C9A84C;
    padding-left: 22px;
    color: rgba(245, 240, 232, .45);
    font-style: italic;
    margin: 28px 0
}

.post-body img {
    border-radius: 8px;
    max-width: 100%;
    margin: 24px 0
}

@media(max-width:640px) {
    section>div {
        padding: 40px 20px 64px !important
    }
}
</style>