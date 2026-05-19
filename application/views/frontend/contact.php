<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    /* ================================================================
   CONTACT PAGE
================================================================ */
    .ct-hero {
        background: var(--olive-dk);
        padding: 160px var(--px) 80px;
        position: relative;
        overflow: hidden;
        z-index: 1;
        min-height: 52vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .ct-hero-glow {
        position: absolute;
        border-radius: 50%;
        filter: blur(110px);
        pointer-events: none;
        z-index: 0;
    }

    .ct-g1 {
        width: 460px;
        height: 460px;
        background: rgba(212, 146, 10, .09);
        top: -120px;
        right: -80px;
    }

    .ct-g2 {
        width: 280px;
        height: 280px;
        background: rgba(107, 122, 85, .18);
        bottom: 5%;
        left: -60px;
    }

    .ct-hero-bg-txt {
        position: absolute;
        top: 50%;
        left: var(--px);
        transform: translateY(-50%);
        font-family: var(--f-d);
        font-size: clamp(100px, 20vw, 280px);
        color: transparent;
        -webkit-text-stroke: 1.5px rgba(242, 234, 216, .04);
        pointer-events: none;
        user-select: none;
        z-index: 0;
        line-height: 1;
        letter-spacing: .02em;
    }

    .ct-hero-content {
        position: relative;
        z-index: 2;
        max-width: var(--max);
    }

    .ct-h1 {
        font-family: var(--f-d);
        font-size: clamp(88px, 14vw, 210px);
        line-height: .82;
        letter-spacing: .02em;
        color: var(--cream);
        margin-bottom: 22px;
    }

    .ct-h1 span {
        color: var(--amber);
    }

    .ct-hero-sub {
        font-family: var(--f-s);
        font-style: italic;
        font-size: clamp(15px, 1.8vw, 18px);
        color: rgba(242, 234, 216, .5);
        line-height: 1.8;
        max-width: 520px;
    }

    /* info strip */
    .ct-strip {
        background: var(--ink);
        border-top: 2px solid rgba(242, 234, 216, .08);
    }

    .ct-strip-inner {
        max-width: var(--max);
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }

    .ct-strip-cell {
        padding: 32px var(--px);
        border-right: 1px solid rgba(242, 234, 216, .07);
        display: flex;
        align-items: center;
        gap: 18px;
        transition: background .3s;
    }

    .ct-strip-cell:last-child {
        border-right: none;
    }

    .ct-strip-cell:hover {
        background: rgba(242, 234, 216, .03);
    }

    .ct-strip-icon {
        width: 44px;
        height: 44px;
        border: 1px solid rgba(212, 146, 10, .28);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 18px;
    }

    .ct-strip-label {
        font-family: var(--f-c);
        font-size: 9.5px;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .28);
        margin-bottom: 4px;
    }

    .ct-strip-val {
        font-size: 15px;
        font-weight: 500;
        color: rgba(242, 234, 216, .7);
        transition: color .2s;
    }

    a.ct-strip-cell:hover .ct-strip-val {
        color: var(--amber-2);
    }

    /* main layout */
    .ct-main {
        max-width: var(--max);
        margin: 0 auto;
        padding: var(--sec-py) var(--px);
        display: grid;
        grid-template-columns: 1fr 1.55fr;
        gap: 72px;
        align-items: flex-start;
    }

    /* left sidebar */
    .ct-info-card {
        background: var(--ink-2);
        border: 1px solid rgba(242, 234, 216, .07);
        padding: 28px;
        border-radius: 2px;
        margin-bottom: 18px;
        transition: border-color .3s;
    }

    .ct-info-card:hover {
        border-color: rgba(212, 146, 10, .18);
    }

    .ct-info-card-h {
        font-family: var(--f-c);
        font-size: 9.5px;
        font-weight: 700;
        letter-spacing: .26em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .28);
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .ct-info-card-h::before {
        content: '';
        width: 20px;
        height: 2px;
        background: var(--amber);
        flex-shrink: 0;
    }

    .ct-why-item {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 14px;
    }

    .ct-why-dot {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        border: 1.5px solid rgba(212, 146, 10, .3);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .ct-why-dot::after {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--amber);
    }

    .ct-why-txt {
        font-size: 14px;
        font-weight: 500;
        color: rgba(242, 234, 216, .56);
    }

    .ct-social-row {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 8px;
    }

    .ct-soc-a {
        font-family: var(--f-c);
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
        border: 1.5px solid rgba(242, 234, 216, .13);
        padding: 9px 18px;
        border-radius: 100px;
        color: rgba(242, 234, 216, .38);
        transition: border-color .2s, color .2s;
    }

    .ct-soc-a:hover {
        border-color: var(--amber);
        color: var(--amber);
    }

    /* form card */
    .ct-form-card {
        background: var(--ink-2);
        border: 1px solid rgba(242, 234, 216, .07);
        border-radius: 2px;
        padding: 44px 40px;
        position: relative;
        overflow: hidden;
    }

    .ct-form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--amber), var(--amber-3), var(--amber));
    }

    .ct-form-h {
        font-family: var(--f-d);
        font-size: 28px;
        letter-spacing: .04em;
        color: var(--cream);
        margin-bottom: 32px;
    }

    .ct-form-h span {
        color: var(--amber);
    }

    /* form fields */
    .cf-grid2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
        margin-bottom: 18px;
    }

    .cf-field {
        margin-bottom: 18px;
    }

    .cf-label {
        display: block;
        font-family: var(--f-c);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: rgba(242, 234, 216, .38);
        margin-bottom: 10px;
    }

    .cf-label span {
        color: var(--amber);
    }

    .cf-input {
        width: 100%;
        background: rgba(10, 10, 5, .6);
        border: 1px solid rgba(242, 234, 216, .1);
        color: var(--cream);
        border-radius: 2px;
        padding: 14px 16px;
        font-size: 15px;
        font-family: var(--f-b);
        font-weight: 400;
        outline: none;
        transition: border-color .25s, background .25s, box-shadow .25s;
        -webkit-appearance: none;
    }

    .cf-input:focus {
        border-color: var(--amber);
        background: rgba(10, 10, 5, .8);
        box-shadow: 0 0 0 3px rgba(212, 146, 10, .09);
    }

    .cf-input::placeholder {
        color: rgba(242, 234, 216, .18);
    }

    .cf-input option {
        background: #1a1a10;
    }

    textarea.cf-input {
        resize: vertical;
        min-height: 130px;
        line-height: 1.7;
    }

    /* file drop */
    .cf-drop {
        border: 1.5px dashed rgba(242, 234, 216, .13);
        border-radius: 2px;
        padding: 32px 20px;
        text-align: center;
        cursor: pointer;
        transition: all .3s;
        position: relative;
        background: rgba(10, 10, 5, .4);
    }

    .cf-drop:hover,
    .cf-drop.drag {
        border-color: rgba(212, 146, 10, .4);
        background: rgba(212, 146, 10, .04);
    }

    .cf-drop input {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .cf-drop-icon {
        font-size: 30px;
        margin-bottom: 10px;
        opacity: .5;
    }

    .cf-drop-txt {
        font-size: 13px;
        color: rgba(242, 234, 216, .38);
        font-weight: 500;
    }

    .cf-drop-txt span {
        color: var(--amber-2);
    }

    .cf-drop-hint {
        font-size: 11px;
        color: rgba(242, 234, 216, .22);
        margin-top: 5px;
    }

    /* submit */
    .cf-submit {
        width: 100%;
        background: var(--amber);
        color: var(--ink);
        font-family: var(--f-d);
        font-size: 18px;
        letter-spacing: .08em;
        padding: 18px;
        border: none;
        border-radius: 2px;
        cursor: pointer;
        transition: background .2s, transform .18s, box-shadow .18s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 28px;
    }

    .cf-submit:hover {
        background: var(--amber-2);
        transform: translateY(-2px);
        box-shadow: 0 12px 36px rgba(212, 146, 10, .38);
    }

    .cf-submit:disabled {
        opacity: .6;
        cursor: wait;
        transform: none;
    }

    /* flash messages */
    .cf-success {
        background: rgba(107, 175, 100, .1);
        border: 1px solid rgba(107, 175, 100, .22);
        color: #7dc878;
        padding: 14px 18px;
        border-radius: 2px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 24px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }

    .cf-error {
        background: rgba(212, 80, 60, .1);
        border: 1px solid rgba(212, 80, 60, .22);
        color: #e07060;
        padding: 14px 18px;
        border-radius: 2px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 24px;
    }

    /* page outer bg */
    .ct-page-bg {
        background: var(--ink);
    }

    @media(max-width:1100px) {
        .ct-main {
            grid-template-columns: 1fr;
            gap: 48px;
        }
    }

    @media(max-width:768px) {
        .ct-hero {
            padding-top: 120px;
        }

        .ct-strip-inner {
            grid-template-columns: 1fr;
        }

        .ct-strip-cell {
            border-right: none;
            border-bottom: 1px solid rgba(242, 234, 216, .07);
        }

        .ct-strip-cell:last-child {
            border-bottom: none;
        }

        .cf-grid2 {
            grid-template-columns: 1fr;
        }

        .ct-form-card {
            padding: 28px 22px;
        }
    }

    @media(max-width:480px) {
        .ct-h1 {
            font-size: clamp(68px, 16vw, 120px);
        }
    }
</style>

<div class="ct-page-bg">

    <!-- HERO -->
    <section class="ct-hero" aria-labelledby="ct-h1">
        <div class="ct-hero-glow ct-g1" aria-hidden="true"></div>
        <div class="ct-hero-glow ct-g2" aria-hidden="true"></div>
        <div class="ct-hero-bg-txt" aria-hidden="true">TALK</div>
        <div class="ct-hero-content">
            <p class="s-lbl rv" style="color:rgba(242,234,216,.44);margin-bottom:20px">Get In Touch</p>
            <h1 id="ct-h1" class="ct-h1 rv d1">LET'S<br><span>TALK</span></h1>
            <p class="ct-hero-sub rv d2">Have a brand to grow? A film to promote? A campaign that needs to explode? Tell
                us — we'll make it happen.</p>
        </div>
    </section>

    <!-- INFO STRIP -->
    <div class="ct-strip">
        <div class="ct-strip-inner">
            <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'contact@thecinecaffe.com') ?>"
                class="ct-strip-cell rv d1">
                <div class="ct-strip-icon">&#9993;</div>
                <div>
                    <div class="ct-strip-label">Email Us</div>
                    <div class="ct-strip-val">
                        <?= htmlspecialchars($settings['site_email'] ?? 'contact@thecinecaffe.com') ?></div>
                </div>
            </a>
            <a href="tel:<?= htmlspecialchars($settings['site_phone'] ?? '') ?>" class="ct-strip-cell rv d2">
                <div class="ct-strip-icon">&#9742;</div>
                <div>
                    <div class="ct-strip-label">Call Us</div>
                    <div class="ct-strip-val"><?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?></div>
                </div>
            </a>
            <div class="ct-strip-cell rv d3">
                <div class="ct-strip-icon">&#9679;</div>
                <div>
                    <div class="ct-strip-label">Location</div>
                    <div class="ct-strip-val"><?= htmlspecialchars($settings['site_address'] ?? 'India') ?></div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div style="background:var(--ink);">
        <div class="ct-main">

            <!-- LEFT COLUMN -->
            <div>
                <div class="ct-info-card rv d1">
                    <div class="ct-info-card-h">Why Cine Caffe?</div>
                    <?php foreach (
                        [
                            '300+ campaigns delivered',
                            '32% of all OTT releases',
                            '12M+ people reached',
                            '24–48h response time',
                            '10,000+ creator network',
                            'Pan-India coverage',
                        ] as $w
                    ): ?>
                        <div class="ct-why-item">
                            <div class="ct-why-dot"></div>
                            <span class="ct-why-txt"><?= htmlspecialchars($w) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="ct-info-card rv d2">
                    <div class="ct-info-card-h">Response Time</div>
                    <p style="font-size:15px;color:rgba(242,234,216,.5);line-height:1.8;font-weight:400;">
                        We reply to every enquiry within <strong style="color:var(--amber)">24–48 hours</strong>. For
                        urgent campaigns, mention it in your message and we'll prioritise accordingly.
                    </p>
                </div>

                <div class="ct-info-card rv d3">
                    <div class="ct-info-card-h">Follow Us</div>
                    <div class="ct-social-row">
                        <a href="#" class="ct-soc-a" data-no-wipe>Instagram</a>
                        <a href="#" class="ct-soc-a" data-no-wipe>LinkedIn</a>
                        <a href="#" class="ct-soc-a" data-no-wipe>Twitter / X</a>
                    </div>
                </div>
            </div>

            <!-- RIGHT FORM -->
            <div class="ct-form-card rv d2">
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="cf-success">
                        <span style="font-size:20px;flex-shrink:0">&#127881;</span>
                        <?= htmlspecialchars($this->session->flashdata('success')) ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="cf-error">&#9888; <?= $this->session->flashdata('error') ?></div>
                <?php endif; ?>

                <h2 class="ct-form-h">Send a <span>Message</span></h2>

                <?= form_open_multipart('contact/send', ['id' => 'ct-form', 'novalidate' => '']) ?>
                <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

                <div class="cf-grid2">
                    <div>
                        <label class="cf-label" for="f-name">Name <span>*</span></label>
                        <input type="text" name="name" id="f-name" class="cf-input" placeholder="Raj Malhotra" required
                            autocomplete="name">
                    </div>
                    <div>
                        <label class="cf-label" for="f-phone">Phone</label>
                        <input type="tel" name="phone" id="f-phone" class="cf-input" placeholder="+91 98765 43210"
                            autocomplete="tel">
                    </div>
                </div>

                <div class="cf-field">
                    <label class="cf-label" for="f-email">Email <span>*</span></label>
                    <input type="email" name="email" id="f-email" class="cf-input" placeholder="raj@brand.com" required
                        autocomplete="email">
                </div>

                <div class="cf-grid2">
                    <div>
                        <label class="cf-label" for="f-co">Company</label>
                        <input type="text" name="company" id="f-co" class="cf-input" placeholder="Brand Name">
                    </div>
                    <div>
                        <label class="cf-label" for="f-bud">Budget</label>
                        <select name="budget" id="f-bud" class="cf-input">
                            <option value="">Select range</option>
                            <option>Under &#8377;1 Lakh</option>
                            <option>&#8377;1L &ndash; &#8377;5L</option>
                            <option>&#8377;5L &ndash; &#8377;20L</option>
                            <option>&#8377;20L &ndash; &#8377;50L</option>
                            <option>&#8377;50L+</option>
                        </select>
                    </div>
                </div>

                <div class="cf-field">
                    <label class="cf-label" for="f-svc">Service</label>
                    <select name="service" id="f-svc" class="cf-input">
                        <option value="">Choose a service</option>
                        <option>Influencer Marketing</option>
                        <option>Meme Marketing</option>
                        <option>Movie Promotions</option>
                        <option>LinkedIn &amp; X Marketing</option>
                        <option>Celebrity Endorsement</option>
                        <option>Video Production</option>
                        <option>Movie Screenings</option>
                        <option>On-Ground Promotions</option>
                        <option>Full Package</option>
                    </select>
                </div>

                <div class="cf-field">
                    <label class="cf-label" for="f-msg">Message <span>*</span></label>
                    <textarea name="message" id="f-msg" class="cf-input" rows="5"
                        placeholder="Tell us about your project, campaign goals, and timeline..." required></textarea>
                </div>

                <div class="cf-field">
                    <label class="cf-label">Attachment <span
                            style="opacity:.4;text-transform:none;letter-spacing:0;font-size:10px;">(optional &mdash;
                            PDF/JPG/PNG, max 5MB)</span></label>
                    <div class="cf-drop" id="cf-drop">
                        <input type="file" name="attachment" id="f-file" accept=".pdf,.jpg,.jpeg,.png,.webp"
                            onchange="cfFile(this)">
                        <div id="cf-flbl">
                            <div class="cf-drop-icon">&#128206;</div>
                            <p class="cf-drop-txt">Drop file here or <span>browse</span></p>
                            <p class="cf-drop-hint">PDF, JPG, PNG &mdash; max 5MB</p>
                        </div>
                    </div>
                </div>

                <button type="submit" class="cf-submit" id="cf-sbtn">
                    <span id="cf-stxt">SEND MESSAGE &rarr;</span>
                    <span id="cf-spin" style="display:none;align-items:center;gap:8px">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" style="animation:ct-spin .8s linear infinite">
                            <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4" />
                        </svg>
                        SENDING...
                    </span>
                </button>

                <?= form_close() ?>
            </div>

        </div>
    </div>

</div><!-- /.ct-page-bg -->

<style>
    @keyframes ct-spin {
        to {
            transform: rotate(360deg)
        }
    }
</style>
<script>
    function cfFile(i) {
        var l = document.getElementById('cf-flbl');
        if (i.files && i.files[0]) {
            var s = (i.files[0].size / 1024 / 1024).toFixed(1);
            l.innerHTML =
                '<div style="font-size:26px;margin-bottom:8px;opacity:.7">&#128196;</div><p style="font-size:13px;font-weight:700;color:var(--amber-2)">' +
                i.files[0].name + '</p><p style="font-size:11px;color:rgba(242,234,216,.28);margin-top:4px">' + s +
                ' MB &middot; Click to change</p>';
        }
    }
    var cd = document.getElementById('cf-drop');
    if (cd) {
        ['dragenter', 'dragover'].forEach(function(e) {
            cd.addEventListener(e, function(ev) {
                ev.preventDefault();
                cd.classList.add('drag');
            });
        });
        ['dragleave', 'drop'].forEach(function(e) {
            cd.addEventListener(e, function(ev) {
                ev.preventDefault();
                cd.classList.remove('drag');
            });
        });
    }
    var cf = document.getElementById('ct-form'),
        sb = document.getElementById('cf-sbtn'),
        st = document.getElementById('cf-stxt'),
        sp = document.getElementById('cf-spin');
    if (cf) {
        cf.addEventListener('submit', function() {
            if (sb) {
                sb.disabled = true;
                if (st) st.style.display = 'none';
                if (sp) sp.style.display = 'flex';
            }
        });
    }
</script>