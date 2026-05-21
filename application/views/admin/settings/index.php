<div class="page-hdr">
    <div>
        <h1 class="page-hdr-title">Settings</h1>
        <p class="page-hdr-sub">Manage The Cine Caffe website content and configuration</p>
    </div>
</div>

<?php if ($flash): ?>
    <div class="flash-msg"><i class="fa fa-circle-check"></i> <?= htmlspecialchars($flash) ?></div>
<?php endif; ?>

<?php echo form_open_multipart('admin/settings/update'); ?>

<div class="grid-settings">

    <!-- Site Identity -->
    <div class="card card-pad space-y">
        <h2 style="font-size:11px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:#C9A84C;">
            <i class="fa fa-globe" style="margin-right:6px;"></i>Site Identity
        </h2>

        <div>
            <label>Website Title</label>
            <input type="text" name="site_title"
                value="<?= htmlspecialchars($settings['site_title']['setting_value'] ?? 'The Cine Caffe') ?>">
        </div>

        <div>
            <label>Website Logo</label>
            <?php if (!empty($settings['site_logo']['setting_value'])): ?>
                <div style="margin-bottom:10px;">
                    <img src="<?= base_url('assets/images/uploads/' . $settings['site_logo']['setting_value']) ?>"
                        alt="Logo"
                        style="max-height:56px;background:#111;padding:8px;border-radius:8px;object-fit:contain;">
                    <p style="font-size:11px;color:var(--muted);margin-top:4px;">Upload to replace</p>
                </div>
            <?php endif; ?>
            <input type="file" name="site_logo" accept="image/*">
        </div>
    </div>

    <!-- Contact Info -->
    <div class="card card-pad space-y">
        <h2 style="font-size:11px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:#C9A84C;">
            <i class="fa fa-address-card" style="margin-right:6px;"></i>Contact Information
        </h2>

        <div>
            <label>Email Address</label>
            <input type="email" name="site_email"
                value="<?= htmlspecialchars($settings['site_email']['setting_value'] ?? 'contact@thecinecaffe.com') ?>">
        </div>

        <div>
            <label>Phone Number</label>
            <input type="tel" name="site_phone"
                value="<?= htmlspecialchars($settings['site_phone']['setting_value'] ?? '') ?>">
        </div>

        <div>
            <label>Address</label>
            <textarea name="site_address"
                rows="3"><?= htmlspecialchars($settings['site_address']['setting_value'] ?? 'India') ?></textarea>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="card card-pad space-y">
        <h2 style="font-size:11px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:#C9A84C;">
            <i class="fa fa-star" style="margin-right:6px;"></i>Hero Section
        </h2>

        <div>
            <label>Hero Heading</label>
            <input type="text" name="hero_heading"
                value="<?= htmlspecialchars($settings['hero_heading']['setting_value'] ?? 'Where Cinema Meets Culture') ?>">
        </div>

        <div>
            <label>Hero Subtext</label>
            <textarea name="hero_subtext"
                rows="3"><?= htmlspecialchars($settings['hero_subtext']['setting_value'] ?? '') ?></textarea>
        </div>

        <div>
            <label>About Text</label>
            <textarea name="about_text"
                rows="4"><?= htmlspecialchars($settings['about_text']['setting_value'] ?? '') ?></textarea>
        </div>
    </div>

    <!-- Stats -->
    <div class="card card-pad space-y">
        <h2 style="font-size:11px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:#C9A84C;">
            <i class="fa fa-chart-bar" style="margin-right:6px;"></i>Homepage Stats
        </h2>

        <div class="grid-mini">
            <div>
                <label>Campaigns</label>
                <input type="text" name="stat_campaigns"
                    value="<?= htmlspecialchars($settings['stat_campaigns']['setting_value'] ?? '300+') ?>">
            </div>
            <div>
                <label>Reach</label>
                <input type="text" name="stat_reach"
                    value="<?= htmlspecialchars($settings['stat_reach']['setting_value'] ?? '12M+') ?>">
            </div>
            <div>
                <label>Movies</label>
                <input type="text" name="stat_movies"
                    value="<?= htmlspecialchars($settings['stat_movies']['setting_value'] ?? '150+') ?>">
            </div>
            <div>
                <label>Screenings</label>
                <input type="text" name="stat_screenings"
                    value="<?= htmlspecialchars($settings['stat_screenings']['setting_value'] ?? '70+') ?>">
            </div>
        </div>
    </div>

</div><!-- /.grid-settings -->

<div style="margin-top:20px;display:flex;justify-content:flex-end;">
    <button type="submit" class="btn-primary" style="padding:12px 28px;font-size:14px;">
        <i class="fa fa-save"></i> Save All Settings
    </button>
</div>

<?php echo form_close(); ?>