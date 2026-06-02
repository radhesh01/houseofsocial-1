<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="a-page-hdr">
    <div>
        <div class="a-page-title">Blog Posts</div>
        <div class="a-page-sub">Manage all blog articles for HouseOfSocial.io</div>
    </div>
    <a href="<?= base_url('admin/blogs/create') ?>" class="a-btn-primary">
        <i class="fa fa-plus"></i> New Blog Post
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
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($blogs)): ?>
                    <tr>
                        <td colspan="5" style="text-align:center;padding:40px;color:var(--g3)">
                            No blog posts yet.
                            <a href="<?= base_url('admin/blogs/create') ?>" style="color:var(--flame);margin-left:4px">Write
                                the first →</a>
                        </td>
                    </tr>
                    <?php else: foreach ($blogs as $b): ?>
                        <tr>
                            <td>
                                <div
                                    style="color:var(--paper);font-weight:500;max-width:280px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                                    <?= htmlspecialchars($b['title']) ?>
                                </div>
                                <?php if (!empty($b['subtitle'])): ?>
                                    <div
                                        style="color:var(--g3);font-size:11px;margin-top:2px;max-width:280px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                                        <?= htmlspecialchars($b['subtitle']) ?>
                                    </div>
                                <?php endif; ?>
                                <div style="color:var(--g3);font-size:11px;margin-top:2px">
                                    /blog/<?= htmlspecialchars($b['slug']) ?></div>
                            </td>
                            <td style="color:var(--g3)"><?= htmlspecialchars($b['author']) ?></td>
                            <td>
                                <a href="<?= base_url('admin/blogs/toggle/' . $b['id']) ?>" title="Click to toggle"
                                    style="text-decoration:none">
                                    <?php if ($b['status']): ?>
                                        <span class="a-badge-on" style="cursor:pointer">Active</span>
                                    <?php else: ?>
                                        <span class="a-badge-off" style="cursor:pointer">Hidden</span>
                                    <?php endif; ?>
                                </a>
                            </td>
                            <td style="color:var(--g3);font-size:12px;white-space:nowrap">
                                <?= date('d M Y', strtotime($b['created_at'])) ?>
                            </td>
                            <td>
                                <div class="a-act-row">
                                    <a href="<?= base_url('blog/' . $b['slug']) ?>" target="_blank" class="a-btn-secondary"
                                        title="Preview"><i class="fa fa-eye"></i></a>
                                    <a href="<?= base_url('admin/blogs/edit/' . $b['id']) ?>" class="a-btn-secondary"><i
                                            class="fa fa-pen"></i> Edit</a>
                                    <a href="<?= base_url('admin/blogs/delete/' . $b['id']) ?>" class="a-btn-danger"
                                        onclick="return confirm('Delete this blog post? This cannot be undone.')">
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