<div class="page-hdr">
    <div>
        <h1 class="page-hdr-title">Enquiries</h1>
        <p class="page-hdr-sub">Contact form submissions from thecinecaffe.com</p>
    </div>
    <?php if ($unread > 0): ?>
    <span
        style="background:rgba(201,168,76,.12);color:#C9A84C;border:1px solid rgba(201,168,76,.25);padding:6px 14px;border-radius:20px;font-size:13px;font-weight:600;">
        <?= $unread ?> unread
    </span>
    <?php endif; ?>
</div>

<?php if ($flash): ?><div class="flash-msg"><i class="fa fa-circle-check"></i> <?= htmlspecialchars($flash) ?></div>
<?php endif; ?>

<div class="card">
    <div class="table-wrap">
        <table>
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
                    <td colspan="8" style="padding:40px;text-align:center;color:var(--muted);">No enquiries yet.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($enquiries as $e): ?>
                <tr style="<?= !$e['is_read'] ? 'background:rgba(201,168,76,.02)' : '' ?>">
                    <td>
                        <div style="color:#F5F0E8;font-weight:500;display:flex;align-items:center;gap:7px;">
                            <?php if (!$e['is_read']): ?>
                            <span
                                style="width:6px;height:6px;background:#C9A84C;border-radius:50%;flex-shrink:0;display:inline-block;"></span>
                            <?php endif; ?>
                            <?= htmlspecialchars($e['name']) ?>
                        </div>
                        <?php if ($e['company']): ?>
                        <div style="color:var(--muted);font-size:11px;margin-top:2px;">
                            <?= htmlspecialchars($e['company']) ?></div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="mailto:<?= htmlspecialchars($e['email']) ?>"
                            style="color:var(--muted);font-size:13px;text-decoration:none;transition:color .2s;"
                            onmouseover="this.style.color='#C9A84C'" onmouseout="this.style.color='var(--muted)'">
                            <?= htmlspecialchars($e['email']) ?>
                        </a>
                    </td>
                    <td style="color:var(--muted);"><?= htmlspecialchars($e['phone'] ?: '—') ?></td>
                    <td style="color:var(--muted);"><?= htmlspecialchars($e['service'] ?: '—') ?></td>
                    <td style="color:var(--muted);"><?= htmlspecialchars($e['budget'] ?: '—') ?></td>
                    <td>
                        <?php if (!$e['is_read']): ?>
                        <span class="badge-active">New</span>
                        <?php else: ?>
                        <span class="badge-inactive">Read</span>
                        <?php endif; ?>
                    </td>
                    <td style="color:var(--muted);font-size:12px;"><?= date('d M Y', strtotime($e['created_at'])) ?>
                    </td>
                    <td>
                        <div class="action-row">
                            <a href="<?= base_url('admin/enquiries/view/' . $e['id']) ?>" class="btn-secondary">View</a>
                            <a href="<?= base_url('admin/enquiries/delete/' . $e['id']) ?>" class="btn-danger"
                                onclick="return confirm('Delete this enquiry?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>