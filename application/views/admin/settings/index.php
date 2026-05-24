<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="a-page-hdr">
    <div>
        <div class="a-page-title">Settings</div>
        <div class="a-page-sub">Manage HouseOfSocial website content and configuration</div>
    </div>
</div>

<?php if ($flash): ?>
<div class="a-flash a-flash-ok"><i class="fa fa-circle-check"></i> <?= htmlspecialchars($flash) ?></div>
<?php endif; ?>

<?php echo form_open_multipart('admin/settings/update'); ?>

<div class="a-grid-settings">

    <!-- Site Identity -->
    <div class="a-card a-card-pad a-space">
        <div style="display:flex;align-items:center;gap:9px;margin-bottom:4px">
            <i class="fa fa-globe" style="color:var(--flame);font-size:13px;width:16px"></i>
            <span
                style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4)">Site
                Identity</span>
        </div>
        <div style="height:1px;background:var(--b1);margin-bottom:4px"></div>

        <div>
            <label class="a-label">Website Title</label>
            <input type="text" name="site_title" class="a-input"
                value="<?= htmlspecialchars($settings['site_title']['setting_value'] ?? 'HouseOfSocial') ?>">
        </div>

        <div>
            <label class="a-label">Website Logo</label>
            <?php if (!empty($settings['site_logo']['setting_value'])): ?>
            <div style="margin-bottom:10px">
                <img src="<?= base_url('assets/images/uploads/' . $settings['site_logo']['setting_value']) ?>"
                    alt="Logo"
                    style="max-height:52px;background:var(--s2);padding:8px;border-radius:6px;object-fit:contain">
                <p style="font-size:11px;color:var(--g3);margin-top:4px">Upload new to replace</p>
            </div>
            <?php endif; ?>
            <input type="file" name="site_logo" class="a-input" accept="image/*">
        </div>
    </div>

    <!-- Contact Info -->
    <div class="a-card a-card-pad a-space">
        <div style="display:flex;align-items:center;gap:9px;margin-bottom:4px">
            <i class="fa fa-address-card" style="color:var(--flame);font-size:13px;width:16px"></i>
            <span
                style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4)">Contact
                Information</span>
        </div>
        <div style="height:1px;background:var(--b1);margin-bottom:4px"></div>

        <div>
            <label class="a-label">Email Address</label>
            <input type="email" name="site_email" class="a-input"
                value="<?= htmlspecialchars($settings['site_email']['setting_value'] ?? 'hello@houseofsocial.io') ?>">
        </div>
        <div>
            <label class="a-label">Phone Number</label>
            <input type="tel" name="site_phone" class="a-input"
                value="<?= htmlspecialchars($settings['site_phone']['setting_value'] ?? '') ?>">
        </div>
        <div>
            <label class="a-label">Address / Location</label>
            <textarea name="site_address" class="a-input"
                rows="2"><?= htmlspecialchars($settings['site_address']['setting_value'] ?? 'India') ?></textarea>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="a-card a-card-pad a-space">
        <div style="display:flex;align-items:center;gap:9px;margin-bottom:4px">
            <i class="fa fa-star" style="color:var(--flame);font-size:13px;width:16px"></i>
            <span
                style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4)">Hero
                Section</span>
        </div>
        <div style="height:1px;background:var(--b1);margin-bottom:4px"></div>

        <div>
            <label class="a-label">Hero Heading</label>
            <input type="text" name="hero_heading" class="a-input"
                value="<?= htmlspecialchars($settings['hero_heading']['setting_value'] ?? 'We Make Brands Belong') ?>">
        </div>
        <div>
            <label class="a-label">Hero Subtext</label>
            <textarea name="hero_subtext" class="a-input"
                rows="3"><?= htmlspecialchars($settings['hero_subtext']['setting_value'] ?? '') ?></textarea>
        </div>
        <div>
            <label class="a-label">About Text</label>
            <textarea name="about_text" class="a-input"
                rows="4"><?= htmlspecialchars($settings['about_text']['setting_value'] ?? '') ?></textarea>
        </div>
    </div>

    <!-- Stats -->
    <div class="a-card a-card-pad a-space">
        <div style="display:flex;align-items:center;gap:9px;margin-bottom:4px">
            <i class="fa fa-chart-bar" style="color:var(--flame);font-size:13px;width:16px"></i>
            <span
                style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4)">Homepage
                Stats</span>
        </div>
        <div style="height:1px;background:var(--b1);margin-bottom:4px"></div>

        <div class="a-mini-grid">
            <div>
                <label class="a-label">Campaigns</label>
                <input type="text" name="stat_campaigns" class="a-input"
                    value="<?= htmlspecialchars($settings['stat_campaigns']['setting_value'] ?? '300') ?>">
            </div>
            <div>
                <label class="a-label">Reach</label>
                <input type="text" name="stat_reach" class="a-input"
                    value="<?= htmlspecialchars($settings['stat_reach']['setting_value'] ?? '12') ?>">
            </div>
            <div>
                <label class="a-label">Movies / Films</label>
                <input type="text" name="stat_movies" class="a-input"
                    value="<?= htmlspecialchars($settings['stat_movies']['setting_value'] ?? '150') ?>">
            </div>
            <div>
                <label class="a-label">Screenings</label>
                <input type="text" name="stat_screenings" class="a-input"
                    value="<?= htmlspecialchars($settings['stat_screenings']['setting_value'] ?? '70') ?>">
            </div>
        </div>
    </div>

</div><!-- /.a-grid-settings -->

<div style="margin-top:20px;display:flex;justify-content:flex-end">
    <button type="submit" class="a-btn-primary" style="padding:11px 26px;font-size:13.5px">
        <i class="fa fa-save"></i> Save All Settings
    </button>
</div>

<?php echo form_close(); ?>