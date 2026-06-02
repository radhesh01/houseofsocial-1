<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
.enq-grid {
    display: grid;
    grid-template-columns: 1fr 280px;
    gap: 18px;
    align-items: start;
}

@media(max-width:860px) {
    .enq-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Back + Title -->
<div style="display:flex;align-items:center;gap:13px;margin-bottom:22px;flex-wrap:wrap">
    <a href="<?= base_url('admin/enquiries') ?>" class="a-btn-secondary" style="min-height:34px">
        <i class="fa fa-arrow-left" style="font-size:11px"></i>
    </a>
    <div>
        <div class="a-page-title">Enquiry from <?= htmlspecialchars($enquiry['name']) ?></div>
        <div class="a-page-sub"><?= date('d F Y, h:i A', strtotime($enquiry['created_at'])) ?></div>
    </div>
    <?php if (!$enquiry['is_read']): ?>
    <span class="a-badge-on" style="margin-left:auto">New</span>
    <?php endif; ?>
</div>

<div class="enq-grid">

    <!-- Main -->
    <div class="a-card a-card-pad a-space">

        <!-- Message -->
        <div>
            <label class="a-label">Message</label>
            <div
                style="background:rgba(8,8,12,.6);border:1px solid var(--b2);border-radius:var(--r);padding:16px;font-size:13.5px;line-height:1.82;color:var(--g4);white-space:pre-wrap">
                <?= htmlspecialchars($enquiry['message']) ?></div>
        </div>

        <?php if (!empty($enquiry['attachment'])): ?>
        <div>
            <label class="a-label">Attachment</label>
            <a href="<?= base_url('assets/images/uploads/enquiries/' . $enquiry['attachment']) ?>" target="_blank"
                style="display:inline-flex;align-items:center;gap:8px;background:rgba(255,60,0,.08);color:var(--flame);border:1px solid rgba(255,60,0,.2);padding:10px 16px;border-radius:var(--r);font-size:13px;transition:background .2s"
                onmouseover="this.style.background='rgba(255,60,0,.14)'"
                onmouseout="this.style.background='rgba(255,60,0,.08)'">
                <i class="fa fa-download"></i> Download Attachment
            </a>
        </div>
        <?php endif; ?>

        <!-- Actions -->
        <div style="display:flex;gap:10px;flex-wrap:wrap;padding-top:6px">
            <a href="mailto:<?= htmlspecialchars($enquiry['email']) ?>" class="a-btn-primary">
                <i class="fa fa-envelope"></i> Reply via Email
            </a>
            <?php if (!empty($enquiry['phone'])): ?>
            <a href="tel:<?= htmlspecialchars($enquiry['phone']) ?>" class="a-btn-secondary">
                <i class="fa fa-phone"></i> Call
            </a>
            <?php endif; ?>
            <a href="<?= base_url('admin/enquiries/delete/' . $enquiry['id']) ?>" class="a-btn-danger"
                onclick="return confirm('Delete this enquiry? This cannot be undone.')">
                <i class="fa fa-trash"></i> Delete
            </a>
        </div>

    </div><!-- /main -->

    <!-- Sidebar -->
    <div style="display:flex;flex-direction:column;gap:14px">

        <div class="a-card a-card-pad a-space">
            <div
                style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--flame);margin-bottom:14px">
                Contact Details</div>
            <?php foreach (['Name' => $enquiry['name'], 'Email' => $enquiry['email'], 'Phone' => ($enquiry['phone'] ?: '—'), 'Company' => ($enquiry['company'] ?: '—')] as $k => $v): ?>
            <div>
                <label class="a-label"><?= $k ?></label>
                <div style="font-size:13.5px;color:var(--g4)"><?= htmlspecialchars($v) ?></div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="a-card a-card-pad a-space">
            <div
                style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--flame);margin-bottom:14px">
                Campaign Info</div>
            <?php foreach (['Service' => ($enquiry['service'] ?: '—'), 'Budget' => ($enquiry['budget'] ?: '—'), 'Received' => date('d M Y', strtotime($enquiry['created_at']))] as $k => $v): ?>
            <div>
                <label class="a-label"><?= $k ?></label>
                <div style="font-size:13.5px;color:var(--g4)"><?= htmlspecialchars($v) ?></div>
            </div>
            <?php endforeach; ?>
        </div>

    </div><!-- /sidebar -->

</div>