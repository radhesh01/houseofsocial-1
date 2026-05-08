<div style="display:flex;align-items:center;gap:14px;margin-bottom:24px;">
    <a href="<?= base_url('admin/enquiries') ?>"
        style="width:36px;height:36px;border:1px solid var(--border);border-radius:6px;display:flex;align-items:center;justify-content:center;color:var(--muted);transition:all .2s;text-decoration:none;"
        onmouseover="this.style.borderColor='#C9A84C';this.style.color='#C9A84C'"
        onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--muted)'">
        <i class="fa fa-arrow-left" style="font-size:12px;"></i>
    </a>
    <div>
        <h1 style="font-size:20px;font-weight:600;color:#F5F0E8;">Enquiry from <?= htmlspecialchars($enquiry['name']) ?>
        </h1>
        <p style="color:var(--muted);font-size:12px;margin-top:3px;">
            <?= date('d F Y, h:i A', strtotime($enquiry['created_at'])) ?></p>
    </div>
    <?php if (!$enquiry['is_read']): ?>
    <span class="badge-active" style="margin-left:auto;">New</span>
    <?php endif; ?>
</div>

<div class="grid-enquiry">

    <!-- Main -->
    <div class="card card-pad space-y">
        <div>
            <label>Message</label>
            <div
                style="background:#0A0A0F;border:1px solid rgba(255,255,255,.08);border-radius:8px;padding:16px;font-size:14px;line-height:1.82;color:rgba(245,240,232,.7);white-space:pre-wrap;">
                <?= htmlspecialchars($enquiry['message']) ?></div>
        </div>

        <?php if ($enquiry['attachment']): ?>
        <div>
            <label>Attachment</label>
            <a href="<?= base_url('assets/images/uploads/enquiries/' . $enquiry['attachment']) ?>" target="_blank"
                style="display:inline-flex;align-items:center;gap:8px;background:rgba(201,168,76,.08);color:#C9A84C;border:1px solid rgba(201,168,76,.2);padding:10px 16px;border-radius:6px;font-size:13px;text-decoration:none;transition:all .2s"
                onmouseover="this.style.background='rgba(201,168,76,.15)'"
                onmouseout="this.style.background='rgba(201,168,76,.08)'">
                <i class="fa fa-download"></i> Download Attachment
            </a>
        </div>
        <?php endif; ?>

        <div style="display:flex;gap:10px;flex-wrap:wrap;padding-top:8px;">
            <a href="mailto:<?= htmlspecialchars($enquiry['email']) ?>" class="btn-primary"
                style="text-decoration:none;">
                <i class="fa fa-envelope"></i> Reply via Email
            </a>
            <?php if ($enquiry['phone']): ?>
            <a href="tel:<?= htmlspecialchars($enquiry['phone']) ?>" class="btn-secondary"
                style="text-decoration:none;">
                <i class="fa fa-phone"></i> Call
            </a>
            <?php endif; ?>
            <a href="<?= base_url('admin/enquiries/delete/' . $enquiry['id']) ?>" class="btn-danger"
                onclick="return confirm('Delete this enquiry? This cannot be undone.')">
                <i class="fa fa-trash"></i> Delete
            </a>
        </div>
    </div>

    <!-- Sidebar -->
    <div style="display:flex;flex-direction:column;gap:14px;">

        <div class="card card-pad space-y">
            <h3 style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#C9A84C;">
                Contact Details</h3>
            <?php $fields = ['Name' => $enquiry['name'], 'Email' => $enquiry['email'], 'Phone' => ($enquiry['phone'] ?: '—'), 'Company' => ($enquiry['company'] ?: '—')];
      foreach ($fields as $k => $v): ?>
            <div>
                <label><?= $k ?></label>
                <div style="font-size:14px;color:rgba(245,240,232,.7);"><?= htmlspecialchars($v) ?></div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="card card-pad space-y">
            <h3 style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#C9A84C;">
                Campaign Info</h3>
            <?php $fields2 = ['Service' => ($enquiry['service'] ?: '—'), 'Budget' => ($enquiry['budget'] ?: '—'), 'Received' => date('d M Y', strtotime($enquiry['created_at']))];
      foreach ($fields2 as $k => $v): ?>
            <div>
                <label><?= $k ?></label>
                <div style="font-size:14px;color:rgba(245,240,232,.7);"><?= htmlspecialchars($v) ?></div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>