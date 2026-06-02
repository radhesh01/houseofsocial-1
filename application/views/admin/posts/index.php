<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="a-page-hdr">
    <div>
        <div class="a-page-title">Posts &amp; Campaigns</div>
        <div class="a-page-sub">Manage all campaigns and articles for HouseOfSocial</div>
    </div>
    <a href="<?= base_url('admin/posts/create') ?>" class="a-btn-primary">
        <i class="fa fa-plus"></i> New Post
    </a>
</div>

<?php if ($flash): ?>
<div class="a-flash a-flash-ok"><i class="fa fa-circle-check"></i> <?= htmlspecialchars($flash) ?></div>
<?php endif; ?>

<div class="a-card">
    <div class="a-tbl-wrap">
        <table class="a-tbl">
            <thead>
                <tr>
                    <th style="width:60px">Image</th>
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
                    <td colspan="6" style="text-align:center;padding:40px;color:var(--g3)">
                        No posts yet.
                        <a href="<?= base_url('admin/posts/create') ?>"
                            style="color:var(--flame);margin-left:4px">Create the first →</a>
                    </td>
                </tr>
                <?php else: foreach ($posts as $p): ?>
                <tr>
                    <td>
                        <?php if (!empty($p['image'])): ?>
                        <img src="<?= base_url('assets/images/uploads/' . $p['image']) ?>" alt=""
                            style="width:46px;height:46px;object-fit:cover;border-radius:6px;display:block">
                        <?php else: ?>
                        <div
                            style="width:46px;height:46px;border-radius:6px;background:rgba(255,60,0,.08);display:flex;align-items:center;justify-content:center">
                            <i class="fa fa-image" style="color:var(--flame);opacity:.35;font-size:15px"></i>
                        </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div
                            style="color:var(--paper);font-weight:500;max-width:240px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                            <?= htmlspecialchars($p['title']) ?></div>
                        <div style="color:var(--g3);font-size:11px;margin-top:2px">
                            /post/<?= htmlspecialchars($p['slug']) ?></div>
                    </td>
                    <td style="color:var(--g3)"><?= htmlspecialchars($p['author']) ?></td>
                    <td>
                        <a href="<?= base_url('admin/posts/toggle/' . $p['id']) ?>" title="Click to toggle"
                            style="text-decoration:none">
                            <?php if ($p['status']): ?>
                            <span class="a-badge-on" style="cursor:pointer">Active</span>
                            <?php else: ?>
                            <span class="a-badge-off" style="cursor:pointer">Hidden</span>
                            <?php endif; ?>
                        </a>
                    </td>
                    <td style="color:var(--g3);font-size:12px;white-space:nowrap">
                        <?= date('d M Y', strtotime($p['created_at'])) ?></td>
                    <td>
                        <div class="a-act-row">
                            <a href="<?= base_url('post/' . $p['slug']) ?>" target="_blank" class="a-btn-secondary"
                                title="Preview"><i class="fa fa-eye"></i></a>
                            <a href="<?= base_url('admin/posts/edit/' . $p['id']) ?>" class="a-btn-secondary"><i
                                    class="fa fa-pen"></i> Edit</a>
                            <a href="<?= base_url('admin/posts/delete/' . $p['id']) ?>" class="a-btn-danger"
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