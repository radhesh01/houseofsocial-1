<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="page-hdr">
    <div>
        <div class="page-hdr-title">Dashboard</div>
        <div class="page-hdr-sub">Welcome back,
            <?= htmlspecialchars($this->session->userdata('admin_username') ?? 'Admin') ?>!</div>
    </div>
    <a href="<?= base_url('admin/posts/create') ?>" class="btn-primary">
        <i class="fa fa-plus"></i> New Post
    </a>
</div>

<!-- Stat cards -->
<div class="grid-3" style="margin-bottom:22px;">

    <div class="card" style="display:flex;align-items:center;gap:14px;padding:18px;">
        <div
            style="width:44px;height:44px;border-radius:10px;background:rgba(201,168,76,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fa fa-film" style="color:#C9A84C;font-size:18px;"></i>
        </div>
        <div>
            <div
                style="font-size:28px;font-family:'Cormorant Garamond',serif;font-weight:300;font-style:italic;color:#F5F0E8;line-height:1;">
                <?= $total_posts ?></div>
            <div style="font-size:11px;color:var(--muted);margin-top:3px;">Total Posts</div>
        </div>
    </div>

    <div class="card" style="display:flex;align-items:center;gap:14px;padding:18px;">
        <div
            style="width:44px;height:44px;border-radius:10px;background:rgba(107,175,141,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fa fa-check-circle" style="color:#6BAF8D;font-size:18px;"></i>
        </div>
        <div>
            <div
                style="font-size:28px;font-family:'Cormorant Garamond',serif;font-weight:300;font-style:italic;color:#F5F0E8;line-height:1;">
                <?= $active_posts ?></div>
            <div style="font-size:11px;color:var(--muted);margin-top:3px;">Active Posts</div>
        </div>
    </div>

    <div class="card" style="display:flex;align-items:center;gap:14px;padding:18px;">
        <div
            style="width:44px;height:44px;border-radius:10px;background:rgba(232,131,106,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fa fa-eye-slash" style="color:#E8836A;font-size:18px;"></i>
        </div>
        <div>
            <div
                style="font-size:28px;font-family:'Cormorant Garamond',serif;font-weight:300;font-style:italic;color:#F5F0E8;line-height:1;">
                <?= $total_posts - $active_posts ?></div>
            <div style="font-size:11px;color:var(--muted);margin-top:3px;">Hidden Posts</div>
        </div>
    </div>

</div>

<!-- Recent posts -->
<div class="card">
    <div
        style="display:flex;align-items:center;justify-content:space-between;padding:14px 16px;border-bottom:1px solid var(--border);flex-wrap:wrap;gap:8px;">
        <span style="font-size:14px;font-weight:600;">Recent Posts</span>
        <a href="<?= base_url('admin/posts') ?>" style="font-size:12px;color:#C9A84C;">View all →</a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($recent_posts)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;padding:32px;color:var(--muted);">
                        No posts yet.
                        <a href="<?= base_url('admin/posts/create') ?>" style="color:#C9A84C;margin-left:4px;">Create
                            one →</a>
                    </td>
                </tr>
                <?php else: foreach ($recent_posts as $p): ?>
                <tr>
                    <td>
                        <div
                            style="color:#F5F0E8;font-weight:500;max-width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                            <?= htmlspecialchars($p['title']) ?>
                        </div>
                        <?php if (!empty($p['slug'])): ?>
                        <div style="color:var(--muted);font-size:11px;margin-top:2px;">/post/<?= $p['slug'] ?></div>
                        <?php endif; ?>
                    </td>
                    <td style="color:var(--muted);"><?= htmlspecialchars($p['author']) ?></td>
                    <td>
                        <span class="<?= $p['status'] ? 'badge-active' : 'badge-inactive' ?>">
                            <?= $p['status'] ? 'Active' : 'Hidden' ?>
                        </span>
                    </td>
                    <td style="color:var(--muted);font-size:12px;white-space:nowrap;">
                        <?= date('d M Y', strtotime($p['created_at'])) ?>
                    </td>
                    <td>
                        <div class="action-row">
                            <a href="<?= base_url('admin/posts/edit/' . $p['id']) ?>" class="btn-secondary">
                                <i class="fa fa-pen"></i> Edit
                            </a>
                            <a href="<?= base_url('post/' . $p['slug']) ?>" target="_blank" class="btn-secondary"
                                title="Preview">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach;
                endif; ?>
            </tbody>
        </table>
    </div>
</div>