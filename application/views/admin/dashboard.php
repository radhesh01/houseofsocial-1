<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="a-page-hdr">
    <div>
        <div class="a-page-title">Dashboard</div>
        <div class="a-page-sub">Welcome back,
            <?= htmlspecialchars($this->session->userdata('admin_username') ?? 'Admin') ?></div>
    </div>
    <a href="<?= base_url('admin/posts/create') ?>" class="a-btn-primary">
        <i class="fa fa-plus"></i> New Post
    </a>
</div>

<!-- Stat Cards -->
<div class="a-grid-4" style="margin-bottom:22px">

    <div class="a-card a-card-pad" style="display:flex;align-items:center;gap:14px">
        <div
            style="width:42px;height:42px;border-radius:8px;background:rgba(255,60,0,.1);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-film" style="color:var(--flame);font-size:17px"></i>
        </div>
        <div>
            <div style="font-family:var(--fh);font-size:26px;font-weight:700;color:var(--paper);line-height:1">
                <?= $total_posts ?></div>
            <div style="font-size:11px;color:var(--g3);margin-top:3px">Total Posts</div>
        </div>
    </div>

    <div class="a-card a-card-pad" style="display:flex;align-items:center;gap:14px">
        <div
            style="width:42px;height:42px;border-radius:8px;background:rgba(74,222,128,.08);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-circle-check" style="color:var(--green);font-size:17px"></i>
        </div>
        <div>
            <div style="font-family:var(--fh);font-size:26px;font-weight:700;color:var(--paper);line-height:1">
                <?= $active_posts ?></div>
            <div style="font-size:11px;color:var(--g3);margin-top:3px">Active Posts</div>
        </div>
    </div>

    <div class="a-card a-card-pad" style="display:flex;align-items:center;gap:14px">
        <div
            style="width:42px;height:42px;border-radius:8px;background:rgba(248,113,113,.08);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-eye-slash" style="color:var(--red);font-size:17px"></i>
        </div>
        <div>
            <div style="font-family:var(--fh);font-size:26px;font-weight:700;color:var(--paper);line-height:1">
                <?= $total_posts - $active_posts ?></div>
            <div style="font-size:11px;color:var(--g3);margin-top:3px">Hidden Posts</div>
        </div>
    </div>

    <?php
    // Try to get unread enquiry count safely
    $unread_count = 0;
    try {
        $CI = &get_instance();
        if (isset($CI->Enquiry_model)) {
            $unread_count = $CI->Enquiry_model->count_unread();
        }
    } catch (Exception $e) {
    }
    ?>
    <a href="<?= base_url('admin/enquiries') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:14px;text-decoration:none;transition:border-color .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.3)'" onmouseout="this.style.borderColor='var(--b1)'">
        <div
            style="width:42px;height:42px;border-radius:8px;background:rgba(200,241,53,.08);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-envelope" style="color:var(--lime);font-size:17px"></i>
        </div>
        <div>
            <div style="font-family:var(--fh);font-size:26px;font-weight:700;color:var(--paper);line-height:1">
                <?= $unread_count ?></div>
            <div style="font-size:11px;color:var(--g3);margin-top:3px">Unread Enquiries</div>
        </div>
    </a>

</div>

<!-- Recent Posts -->
<div class="a-card" style="margin-bottom:18px">
    <div
        style="display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid var(--b1);flex-wrap:wrap;gap:8px">
        <span style="font-size:13.5px;font-weight:600;color:var(--paper)">Recent Posts</span>
        <a href="<?= base_url('admin/posts') ?>" style="font-size:12px;color:var(--flame)">View all →</a>
    </div>
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
                <?php if (empty($recent_posts)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;padding:32px;color:var(--g3)">
                        No posts yet.
                        <a href="<?= base_url('admin/posts/create') ?>"
                            style="color:var(--flame);margin-left:4px">Create one →</a>
                    </td>
                </tr>
                <?php else: foreach ($recent_posts as $p): ?>
                <tr>
                    <td>
                        <div
                            style="color:var(--paper);font-weight:500;max-width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                            <?= htmlspecialchars($p['title']) ?></div>
                        <?php if (!empty($p['slug'])): ?>
                        <div style="color:var(--g3);font-size:11px;margin-top:2px">
                            /post/<?= htmlspecialchars($p['slug']) ?></div>
                        <?php endif; ?>
                    </td>
                    <td style="color:var(--g3)"><?= htmlspecialchars($p['author']) ?></td>
                    <td>
                        <?php if ($p['status']): ?>
                        <span class="a-badge-on">Active</span>
                        <?php else: ?>
                        <span class="a-badge-off">Hidden</span>
                        <?php endif; ?>
                    </td>
                    <td style="color:var(--g3);font-size:12px;white-space:nowrap">
                        <?= date('d M Y', strtotime($p['created_at'])) ?></td>
                    <td>
                        <div class="a-act-row">
                            <a href="<?= base_url('admin/posts/edit/' . $p['id']) ?>" class="a-btn-secondary"><i
                                    class="fa fa-pen"></i> Edit</a>
                            <a href="<?= base_url('post/' . $p['slug']) ?>" target="_blank" class="a-btn-secondary"
                                title="Preview"><i class="fa fa-eye"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach;
                endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Quick links -->
<div class="a-grid-3">
    <a href="<?= base_url('admin/posts/create') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:13px;text-decoration:none;transition:border-color .2s,background .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.28)';this.style.background='var(--s2)'"
        onmouseout="this.style.borderColor='var(--b1)';this.style.background='var(--s1)'">
        <div
            style="width:36px;height:36px;background:rgba(255,60,0,.1);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-plus" style="color:var(--flame);font-size:13px"></i></div>
        <div>
            <div style="font-size:13px;font-weight:600;color:var(--paper)">New Post</div>
            <div style="font-size:11px;color:var(--g3);margin-top:2px">Create a campaign or article</div>
        </div>
    </a>
    <a href="<?= base_url('admin/enquiries') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:13px;text-decoration:none;transition:border-color .2s,background .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.28)';this.style.background='var(--s2)'"
        onmouseout="this.style.borderColor='var(--b1)';this.style.background='var(--s1)'">
        <div
            style="width:36px;height:36px;background:rgba(200,241,53,.08);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-inbox" style="color:var(--lime);font-size:13px"></i></div>
        <div>
            <div style="font-size:13px;font-weight:600;color:var(--paper)">Enquiries</div>
            <div style="font-size:11px;color:var(--g3);margin-top:2px">Review contact submissions</div>
        </div>
    </a>
    <a href="<?= base_url('admin/settings') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:13px;text-decoration:none;transition:border-color .2s,background .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.28)';this.style.background='var(--s2)'"
        onmouseout="this.style.borderColor='var(--b1)';this.style.background='var(--s1)'">
        <div
            style="width:36px;height:36px;background:rgba(244,241,236,.06);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-cog" style="color:var(--g3);font-size:13px"></i></div>
        <div>
            <div style="font-size:13px;font-weight:600;color:var(--paper)">Settings</div>
            <div style="font-size:11px;color:var(--g3);margin-top:2px">Manage site configuration</div>
        </div>
    </a>
</div>