<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="a-page-hdr">
    <div>
        <div class="a-page-title">Enquiries</div>
        <div class="a-page-sub">Contact form submissions from your website</div>
    </div>
    <?php if ($unread > 0): ?>
    <span
        style="background:rgba(255,60,0,.12);color:var(--flame);border:1px solid rgba(255,60,0,.25);padding:6px 14px;border-radius:20px;font-size:12.5px;font-weight:600">
        <?= $unread ?> unread
    </span>
    <?php endif; ?>
</div>

<?php if ($flash): ?>
<div class="a-flash a-flash-ok"><i class="fa fa-circle-check"></i> <?= htmlspecialchars($flash) ?></div>
<?php endif; ?>

<div class="a-card">
    <div class="a-tbl-wrap">
        <table class="a-tbl">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Service</th>
                    <th>Budget</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($enquiries)): ?>
                <tr>
                    <td colspan="8" style="padding:40px;text-align:center;color:var(--g3)">No enquiries yet.</td>
                </tr>
                <?php else: foreach ($enquiries as $e): ?>
                <tr style="<?= !$e['is_read'] ? 'background:rgba(255,60,0,.02)' : '' ?>">
                    <td>
                        <div style="color:var(--paper);font-weight:500;display:flex;align-items:center;gap:7px">
                            <?php if (!$e['is_read']): ?>
                            <span
                                style="width:6px;height:6px;background:var(--flame);border-radius:50%;flex-shrink:0;display:inline-block"></span>
                            <?php endif; ?>
                            <?= htmlspecialchars($e['name']) ?>
                        </div>
                        <?php if (!empty($e['company'])): ?>
                        <div style="color:var(--g3);font-size:11px;margin-top:2px">
                            <?= htmlspecialchars($e['company']) ?></div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="mailto:<?= htmlspecialchars($e['email']) ?>"
                            style="color:var(--g3);font-size:13px;transition:color .2s"
                            onmouseover="this.style.color='var(--flame)'"
                            onmouseout="this.style.color='var(--g3)'"><?= htmlspecialchars($e['email']) ?></a>
                    </td>
                    <td style="color:var(--g3)"><?= htmlspecialchars($e['phone'] ?: '—') ?></td>
                    <td style="color:var(--g3)"><?= htmlspecialchars($e['service'] ?: '—') ?></td>
                    <td style="color:var(--g3)"><?= htmlspecialchars($e['budget'] ?: '—') ?></td>
                    <td>
                        <?php if (!$e['is_read']): ?>
                        <span class="a-badge-on">New</span>
                        <?php else: ?>
                        <span class="a-badge-off">Read</span>
                        <?php endif; ?>
                    </td>
                    <td style="color:var(--g3);font-size:12px;white-space:nowrap">
                        <?= date('d M Y', strtotime($e['created_at'])) ?></td>
                    <td>
                        <div class="a-act-row">
                            <a href="<?= base_url('admin/enquiries/view/' . $e['id']) ?>"
                                class="a-btn-secondary">View</a>
                            <a href="<?= base_url('admin/enquiries/delete/' . $e['id']) ?>" class="a-btn-danger"
                                onclick="return confirm('Delete this enquiry?')"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach;
                endif; ?>
            </tbody>
        </table>
    </div>
</div>