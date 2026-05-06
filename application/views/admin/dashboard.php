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

<!-- Stat cards — grid-3 collapses to 2-col on tablet, 1-col on mobile -->
<div class="grid-3" style="margin-bottom:22px;">

    <div class="card" style="display:flex;align-items:center;gap:14px;padding:18px;">
        <div
            style="width:44px;height:44px;border-radius:10px;background:rgba(245,197,24,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fa fa-film" style="color:#F5C518;font-size:18px;"></i>
        </div>
        <div>
            <div style="font-size:26px;font-weight:700;color:#F9F5EE;line-height:1;"><?= $total_posts ?></div>
            <div style="font-size:11px;color:var(--muted);margin-top:3px;">Total Posts</div>
        </div>
    </div>

    <div class="card" style="display:flex;align-items:center;gap:14px;padding:18px;">
        <div
            style="width:44px;height:44px;border-radius:10px;background:rgba(34,197,94,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fa fa-check-circle" style="color:#86efac;font-size:18px;"></i>
        </div>
        <div>
            <div style="font-size:26px;font-weight:700;color:#F9F5EE;line-height:1;"><?= $active_posts ?></div>
            <div style="font-size:11px;color:var(--muted);margin-top:3px;">Active Posts</div>
        </div>
    </div>

    <div class="card" style="display:flex;align-items:center;gap:14px;padding:18px;">
        <div
            style="width:44px;height:44px;border-radius:10px;background:rgba(248,113,113,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fa fa-eye-slash" style="color:#f87171;font-size:18px;"></i>
        </div>
        <div>
            <div style="font-size:26px;font-weight:700;color:#F9F5EE;line-height:1;"><?= $total_posts - $active_posts ?>
            </div>
            <div style="font-size:11px;color:var(--muted);margin-top:3px;">Hidden Posts</div>
        </div>
    </div>

</div>

<!-- Recent posts table -->
<div class="card">
    <div
        style="display:flex;align-items:center;justify-content:space-between;padding:14px 16px;border-bottom:1px solid var(--border);flex-wrap:wrap;gap:8px;">
        <span style="font-size:14px;font-weight:600;">Recent Posts</span>
        <a href="<?= base_url('admin/posts') ?>" style="font-size:12px;color:#F5C518;">View all →</a>
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
                        <a href="<?= base_url('admin/posts/create') ?>" style="color:#F5C518;margin-left:4px;">Create
                            one →</a>
                    </td>
                </tr>
                <?php else: foreach ($recent_posts as $p): ?>
                <tr>
                    <td>
                        <div
                            style="color:#F9F5EE;font-weight:500;max-width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                            <?= htmlspecialchars($p['title']) ?>
                        </div>
                    </td>
                    <td style="color:var(--muted);"><?= htmlspecialchars($p['author']) ?></td>
                    <td>
                        <span class="<?= $p['status'] ? 'badge-active' : 'badge-inactive' ?>">
                            <?= $p['status'] ? 'Active' : 'Hidden' ?>
                        </span>
                    </td>
                    <td style="color:var(--muted);font-size:12px;white-space:nowrap;">
                        <?= date('d M Y', strtotime($p['created_at'])) ?></td>
                    <td>
                        <div class="action-row">
                            <a href="<?= base_url('admin/posts/edit/' . $p['id']) ?>" class="btn-secondary">Edit</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach;
                endif; ?>
            </tbody>
        </table>
    </div>
</div>