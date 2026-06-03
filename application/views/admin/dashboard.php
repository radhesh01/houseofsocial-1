<?php defined('BASEPATH') or exit('No direct script access allowed');

// Safely load counts for blogs and services
$CI = &get_instance();

$total_blogs    = 0;
$total_services = 0;
$total_enquiries = 0;
$unread_count   = 0;
$recent_enquiries = [];

try {
    if (!isset($CI->Blog_model)) {
        $CI->load->model('Blog_model');
    }
    $total_blogs = $CI->Blog_model->count_all();
} catch (Exception $e) {
}

try {
    if (!isset($CI->Service_model)) {
        $CI->load->model('Service_model');
    }
    $total_services = $CI->Service_model->count_all();
} catch (Exception $e) {
}

try {
    if (!isset($CI->Enquiry_model)) {
        $CI->load->model('Enquiry_model');
    }
    $all_enq         = $CI->Enquiry_model->get_all();
    $total_enquiries = count($all_enq);
    $unread_count    = $CI->Enquiry_model->count_unread();
    $recent_enquiries = array_slice($all_enq, 0, 5);
} catch (Exception $e) {
}
?>

<!-- Page Header -->
<div class="a-page-hdr">
    <div>
        <div class="a-page-title">Dashboard</div>
        <div class="a-page-sub">Welcome back,
            <?= htmlspecialchars($this->session->userdata('admin_username') ?? 'Admin') ?>
        </div>
    </div>
    <a href="<?= base_url('admin/posts/create') ?>" class="a-btn-primary">
        <i class="fa fa-plus"></i> New Campaign
    </a>
</div>

<!-- ── STAT CARDS ── -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:22px">

    <!-- Total Campaigns -->
    <div class="a-card a-card-pad" style="display:flex;align-items:center;gap:14px">
        <div
            style="width:42px;height:42px;border-radius:8px;background:rgba(255,60,0,.1);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-film" style="color:var(--flame);font-size:17px"></i>
        </div>
        <div>
            <div style="font-family:var(--fh);font-size:26px;font-weight:700;color:var(--paper);line-height:1">
                <?= $total_posts ?></div>
            <div style="font-size:11px;color:var(--g3);margin-top:3px">Total Campaigns</div>
        </div>
    </div>

    <!-- Active Campaigns -->
    <div class="a-card a-card-pad" style="display:flex;align-items:center;gap:14px">
        <div
            style="width:42px;height:42px;border-radius:8px;background:rgba(74,222,128,.08);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-circle-check" style="color:var(--green);font-size:17px"></i>
        </div>
        <div>
            <div style="font-family:var(--fh);font-size:26px;font-weight:700;color:var(--paper);line-height:1">
                <?= $active_posts ?></div>
            <div style="font-size:11px;color:var(--g3);margin-top:3px">Active Campaigns</div>
        </div>
    </div>

    <!-- Total Services -->
    <a href="<?= base_url('admin/services') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:14px;text-decoration:none;transition:border-color .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.3)'" onmouseout="this.style.borderColor='var(--b1)'">
        <div
            style="width:42px;height:42px;border-radius:8px;background:rgba(255,60,0,.08);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-bolt" style="color:var(--flame);font-size:17px"></i>
        </div>
        <div>
            <div style="font-family:var(--fh);font-size:26px;font-weight:700;color:var(--paper);line-height:1">
                <?= $total_services ?></div>
            <div style="font-size:11px;color:var(--g3);margin-top:3px">Services</div>
        </div>
    </a>

    <!-- Total Blog Posts -->
    <a href="<?= base_url('admin/blogs') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:14px;text-decoration:none;transition:border-color .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.3)'" onmouseout="this.style.borderColor='var(--b1)'">
        <div
            style="width:42px;height:42px;border-radius:8px;background:rgba(200,241,53,.07);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-pen-nib" style="color:var(--lime);font-size:17px"></i>
        </div>
        <div>
            <div style="font-family:var(--fh);font-size:26px;font-weight:700;color:var(--paper);line-height:1">
                <?= $total_blogs ?></div>
            <div style="font-size:11px;color:var(--g3);margin-top:3px">Blog Posts</div>
        </div>
    </a>

</div>

<!-- ── SECOND ROW: Enquiries + Hidden Campaigns ── -->
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:22px">

    <!-- Unread Enquiries -->
    <a href="<?= base_url('admin/enquiries') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:14px;text-decoration:none;transition:border-color .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.3)'" onmouseout="this.style.borderColor='var(--b1)'">
        <div
            style="width:42px;height:42px;border-radius:8px;background:rgba(255,60,0,.1);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-envelope" style="color:var(--flame);font-size:17px"></i>
        </div>
        <div>
            <div style="font-family:var(--fh);font-size:26px;font-weight:700;color:var(--paper);line-height:1">
                <?= $unread_count ?></div>
            <div style="font-size:11px;color:var(--g3);margin-top:3px">Unread Enquiries</div>
        </div>
    </a>

    <!-- Total Enquiries -->
    <a href="<?= base_url('admin/enquiries') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:14px;text-decoration:none;transition:border-color .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.3)'" onmouseout="this.style.borderColor='var(--b1)'">
        <div
            style="width:42px;height:42px;border-radius:8px;background:rgba(244,241,236,.05);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-inbox" style="color:var(--g3);font-size:17px"></i>
        </div>
        <div>
            <div style="font-family:var(--fh);font-size:26px;font-weight:700;color:var(--paper);line-height:1">
                <?= $total_enquiries ?></div>
            <div style="font-size:11px;color:var(--g3);margin-top:3px">Total Enquiries</div>
        </div>
    </a>

    <!-- Hidden Campaigns -->
    <div class="a-card a-card-pad" style="display:flex;align-items:center;gap:14px">
        <div
            style="width:42px;height:42px;border-radius:8px;background:rgba(248,113,113,.08);display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-eye-slash" style="color:var(--red);font-size:17px"></i>
        </div>
        <div>
            <div style="font-family:var(--fh);font-size:26px;font-weight:700;color:var(--paper);line-height:1">
                <?= $total_posts - $active_posts ?></div>
            <div style="font-size:11px;color:var(--g3);margin-top:3px">Hidden Campaigns</div>
        </div>
    </div>

</div>

<!-- ── MAIN CONTENT GRID: Recent Campaigns + Recent Enquiries ── -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:18px">

    <!-- Recent Campaigns -->
    <div class="a-card">
        <div
            style="display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid var(--b1)">
            <span style="font-size:13px;font-weight:600;color:var(--paper)">Recent Campaigns</span>
            <a href="<?= base_url('admin/posts') ?>" style="font-size:12px;color:var(--flame)">View all →</a>
        </div>
        <div class="a-tbl-wrap">
            <table class="a-tbl">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recent_posts)): ?>
                        <tr>
                            <td colspan="4" style="text-align:center;padding:28px;color:var(--g3)">
                                No campaigns yet. <a href="<?= base_url('admin/posts/create') ?>"
                                    style="color:var(--flame)">Create one →</a>
                            </td>
                        </tr>
                        <?php else: foreach ($recent_posts as $p): ?>
                            <tr>
                                <td>
                                    <div
                                        style="color:var(--paper);font-weight:500;max-width:180px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                                        <?= htmlspecialchars($p['title']) ?>
                                    </div>
                                    <div style="color:var(--g3);font-size:11px;margin-top:1px">
                                        <?= htmlspecialchars($p['author']) ?>
                                    </div>
                                </td>
                                <td>
                                    <?php if ($p['status']): ?>
                                        <span class="a-badge-on">Active</span>
                                    <?php else: ?>
                                        <span class="a-badge-off">Hidden</span>
                                    <?php endif; ?>
                                </td>
                                <td style="color:var(--g3);font-size:11px;white-space:nowrap">
                                    <?= date('d M Y', strtotime($p['created_at'])) ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/posts/edit/' . $p['id']) ?>" class="a-btn-secondary"
                                        style="padding:5px 10px;font-size:11px"><i class="fa fa-pen"></i></a>
                                </td>
                            </tr>
                    <?php endforeach;
                    endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Enquiries -->
    <div class="a-card">
        <div
            style="display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid var(--b1)">
            <span style="font-size:13px;font-weight:600;color:var(--paper)">Recent Enquiries</span>
            <a href="<?= base_url('admin/enquiries') ?>" style="font-size:12px;color:var(--flame)">View all →</a>
        </div>
        <div class="a-tbl-wrap">
            <table class="a-tbl">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recent_enquiries)): ?>
                        <tr>
                            <td colspan="4" style="text-align:center;padding:28px;color:var(--g3)">No enquiries yet.</td>
                        </tr>
                        <?php else: foreach ($recent_enquiries as $e): ?>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;gap:7px">
                                        <?php if (!$e['is_read']): ?>
                                            <span
                                                style="width:6px;height:6px;background:var(--flame);border-radius:50%;flex-shrink:0;display:inline-block"></span>
                                        <?php endif; ?>
                                        <div>
                                            <div style="color:var(--paper);font-weight:500;font-size:13px">
                                                <?= htmlspecialchars($e['name']) ?>
                                            </div>
                                            <div style="color:var(--g3);font-size:11px">
                                                <?= htmlspecialchars($e['email']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    style="color:var(--g3);font-size:12px;max-width:120px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                                    <?= htmlspecialchars($e['service'] ?: '—') ?>
                                </td>
                                <td>
                                    <?php if (!$e['is_read']): ?>
                                        <span class="a-badge-on"
                                            style="background:rgba(255,60,0,.1);color:var(--flame);border-color:rgba(255,60,0,.25)">New</span>
                                    <?php else: ?>
                                        <span class="a-badge-off"
                                            style="background:rgba(244,241,236,.05);color:var(--g3);border-color:var(--b1)">Read</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/enquiries/view/' . $e['id']) ?>" class="a-btn-secondary"
                                        style="padding:5px 10px;font-size:11px">View</a>
                                </td>
                            </tr>
                    <?php endforeach;
                    endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- ── QUICK LINKS ── -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:14px">

    <a href="<?= base_url('admin/posts/create') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:13px;text-decoration:none;transition:border-color .2s,background .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.28)';this.style.background='var(--s2)'"
        onmouseout="this.style.borderColor='var(--b1)';this.style.background='var(--s1)'">
        <div
            style="width:36px;height:36px;background:rgba(255,60,0,.1);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-plus" style="color:var(--flame);font-size:13px"></i>
        </div>
        <div>
            <div style="font-size:13px;font-weight:600;color:var(--paper)">New Campaign</div>
            <div style="font-size:11px;color:var(--g3);margin-top:2px">Add a post</div>
        </div>
    </a>

    <a href="<?= base_url('admin/blogs/create') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:13px;text-decoration:none;transition:border-color .2s,background .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.28)';this.style.background='var(--s2)'"
        onmouseout="this.style.borderColor='var(--b1)';this.style.background='var(--s1)'">
        <div
            style="width:36px;height:36px;background:rgba(200,241,53,.08);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-pen-nib" style="color:var(--lime);font-size:13px"></i>
        </div>
        <div>
            <div style="font-size:13px;font-weight:600;color:var(--paper)">New Blog Post</div>
            <div style="font-size:11px;color:var(--g3);margin-top:2px">Write an article</div>
        </div>
    </a>

    <a href="<?= base_url('admin/enquiries') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:13px;text-decoration:none;transition:border-color .2s,background .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.28)';this.style.background='var(--s2)'"
        onmouseout="this.style.borderColor='var(--b1)';this.style.background='var(--s1)'">
        <div
            style="width:36px;height:36px;background:rgba(255,60,0,.1);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-inbox" style="color:var(--flame);font-size:13px"></i>
        </div>
        <div>
            <div style="font-size:13px;font-weight:600;color:var(--paper)">Enquiries</div>
            <div style="font-size:11px;color:var(--g3);margin-top:2px"><?= $unread_count ?> unread</div>
        </div>
    </a>

    <a href="<?= base_url('admin/settings') ?>" class="a-card a-card-pad"
        style="display:flex;align-items:center;gap:13px;text-decoration:none;transition:border-color .2s,background .2s"
        onmouseover="this.style.borderColor='rgba(255,60,0,.28)';this.style.background='var(--s2)'"
        onmouseout="this.style.borderColor='var(--b1)';this.style.background='var(--s1)'">
        <div
            style="width:36px;height:36px;background:rgba(244,241,236,.05);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fa fa-cog" style="color:var(--g3);font-size:13px"></i>
        </div>
        <div>
            <div style="font-size:13px;font-weight:600;color:var(--paper)">Settings</div>
            <div style="font-size:11px;color:var(--g3);margin-top:2px">Site config</div>
        </div>
    </a>

</div>

<style>
    @media(max-width:900px) {
        .a-grid-4 {
            grid-template-columns: 1fr 1fr !important;
        }
    }

    @media(max-width:640px) {
        div[style*="grid-template-columns:repeat(4"] {
            grid-template-columns: 1fr 1fr !important;
        }

        div[style*="grid-template-columns:1fr 1fr"] {
            grid-template-columns: 1fr !important;
        }

        div[style*="grid-template-columns:repeat(3"] {
            grid-template-columns: 1fr 1fr !important;
        }
    }

    @media(max-width:480px) {
        div[style*="grid-template-columns:repeat(4"] {
            grid-template-columns: 1fr !important;
        }

        div[style*="grid-template-columns:repeat(3"] {
            grid-template-columns: 1fr !important;
        }
    }
</style>