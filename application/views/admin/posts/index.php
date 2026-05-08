<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="page-hdr">
    <div>
        <div class="page-hdr-title">Posts &amp; Campaigns</div>
        <div class="page-hdr-sub">Manage all campaigns and blog posts for The Cine Caffe</div>
    </div>
    <a href="<?= base_url('admin/posts/create') ?>" class="btn-primary">
        <i class="fa fa-plus"></i> New Post
    </a>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($posts)): ?>
                <tr>
                    <td colspan="6" style="text-align:center;padding:40px;color:var(--muted);">
                        No posts yet.
                        <a href="<?= base_url('admin/posts/create') ?>" style="color:#C9A84C;">Create the first post
                            →</a>
                    </td>
                </tr>
                <?php else: foreach ($posts as $p): ?>
                <tr>
                    <td>
                        <?php if ($p['image']): ?>
                        <img src="<?= base_url('assets/images/uploads/' . $p['image']) ?>" alt=""
                            style="width:48px;height:48px;object-fit:cover;border-radius:8px;display:block;">
                        <?php else: ?>
                        <div
                            style="width:48px;height:48px;border-radius:8px;background:rgba(201,168,76,0.08);display:flex;align-items:center;justify-content:center;">
                            <i class="fa fa-image" style="color:#C9A84C;opacity:0.4;"></i>
                        </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div style="color:#F5F0E8;font-weight:500;max-width:220px;"><?= htmlspecialchars($p['title']) ?>
                        </div>
                        <div style="color:var(--muted);font-size:11px;margin-top:2px;">/post/<?= $p['slug'] ?></div>
                    </td>
                    <td style="color:var(--muted);"><?= htmlspecialchars($p['author']) ?></td>
                    <td>
                        <a href="<?= base_url('admin/posts/toggle/' . $p['id']) ?>" title="Click to toggle">
                            <span class="<?= $p['status'] ? 'badge-active' : 'badge-inactive' ?>"
                                style="cursor:pointer;">
                                <?= $p['status'] ? 'Active' : 'Hidden' ?>
                            </span>
                        </a>
                    </td>
                    <td style="color:var(--muted);font-size:12px;">
                        <?= date('d M Y', strtotime($p['created_at'])) ?>
                    </td>
                    <td>
                        <div class="action-row">
                            <a href="<?= base_url('post/' . $p['slug']) ?>" target="_blank" class="btn-secondary"
                                title="Preview">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="<?= base_url('admin/posts/edit/' . $p['id']) ?>" class="btn-secondary">Edit</a>
                            <a href="<?= base_url('admin/posts/delete/' . $p['id']) ?>" class="btn-danger"
                                onclick="return confirm('Delete this post? This cannot be undone.')">
                                <i class="fa fa-trash"></i>
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