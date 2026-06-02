<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
/* ================================================================
   CONTACT PAGE — HouseOfSocial
================================================================ */
.ct-hero {
    background: var(--s0);
    padding: calc(var(--navH) + 80px) var(--px) 72px;
    position: relative;
    overflow: hidden;
    min-height: 52vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

.ct-hero-glow1 {
    position: absolute;
    top: -160px;
    right: -120px;
    width: 560px;
    height: 560px;
    background: radial-gradient(circle, rgba(255, 60, 0, .08) 0%, transparent 65%);
    filter: blur(90px);
    pointer-events: none;
    z-index: 0;
}

.ct-hero-glow2 {
    position: absolute;
    bottom: 0;
    left: -80px;
    width: 340px;
    height: 340px;
    background: radial-gradient(circle, rgba(200, 241, 53, .04) 0%, transparent 65%);
    filter: blur(80px);
    pointer-events: none;
    z-index: 0;
}

.ct-hero-bg {
    position: absolute;
    top: 50%;
    left: var(--px);
    transform: translateY(-50%);
    font-family: var(--fDisplay);
    font-size: clamp(80px, 18vw, 260px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: 1;
    color: transparent;
    -webkit-text-stroke: 1.5px rgba(244, 241, 236, .03);
    pointer-events: none;
    user-select: none;
    z-index: 0;
}

.ct-hero-content {
    position: relative;
    z-index: 2;
    max-width: var(--maxW);
}

.ct-h1 {
    font-family: var(--fDisplay);
    font-size: clamp(72px, 12vw, 180px);
    font-weight: 700;
    letter-spacing: -.05em;
    line-height: .82;
    color: var(--paper);
    margin-bottom: 20px;
}

.ct-h1 em {
    font-style: normal;
    color: var(--flame);
}

.ct-hero-sub {
    font-size: clamp(14px, 1.5vw, 17px);
    color: var(--ghost4);
    line-height: 1.8;
    max-width: 500px;
}

/* Info strip */
.ct-strip {
    background: var(--s1);
    border-top: 2px solid var(--b1);
}

.ct-strip-inner {
    max-width: var(--maxW);
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
}

.ct-strip-cell {
    padding: 30px var(--px);
    border-right: 1px solid var(--b1);
    display: flex;
    align-items: center;
    gap: 16px;
    transition: background .3s;
    text-decoration: none;
    color: inherit;
}

.ct-strip-cell:last-child {
    border-right: none;
}

.ct-strip-cell:hover {
    background: var(--s2);
}

.ct-strip-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    border: 1px solid rgba(255, 60, 0, .25);
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: var(--flame);
}

.ct-strip-lbl {
    font-size: 9.5px;
    font-weight: 600;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-bottom: 4px;
}

.ct-strip-val {
    font-size: 14px;
    font-weight: 500;
    color: var(--ghost4);
    transition: color .2s;
}

.ct-strip-cell:hover .ct-strip-val {
    color: var(--paper);
}

/* Main layout */
.ct-main {
    max-width: var(--maxW);
    margin: 0 auto;
    padding: var(--sec) var(--px);
    display: grid;
    grid-template-columns: 1fr 1.55fr;
    gap: 64px;
    align-items: flex-start;
}

/* Left info */
.ct-info-card {
    background: var(--s1);
    border: 1px solid var(--b1);
    padding: 28px;
    margin-bottom: 16px;
    transition: border-color .3s;
}

.ct-info-card:hover {
    border-color: rgba(255, 60, 0, .2);
}

.ct-info-h {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .24em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.ct-info-h::before {
    content: '';
    width: 18px;
    height: 1.5px;
    background: var(--flame);
    flex-shrink: 0;
}

.ct-why-item {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 13px;
}

.ct-why-dot {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 1.5px solid rgba(255, 60, 0, .3);
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
    background: var(--flame);
}

.ct-why-txt {
    font-size: 14px;
    font-weight: 500;
    color: var(--ghost4);
}

.ct-social-row {
    display: flex;
    gap: 9px;
    flex-wrap: wrap;
    margin-top: 8px;
}

.ct-soc-pill {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .14em;
    text-transform: uppercase;
    border: 1.5px solid var(--b2);
    padding: 8px 16px;
    color: var(--ghost3);
    transition: border-color .2s, color .2s;
}

.ct-soc-pill:hover {
    border-color: var(--flame);
    color: var(--flame);
}

/* Form card */
.ct-form-card {
    background: var(--s1);
    border: 1px solid var(--b1);
    padding: clamp(28px, 4vw, 48px) clamp(24px, 3.5vw, 44px);
    position: relative;
    overflow: hidden;
}

.ct-form-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--flame), var(--lime), var(--flame));
}

.ct-form-h {
    font-family: var(--fDisplay);
    font-size: clamp(24px, 2.8vw, 34px);
    font-weight: 700;
    letter-spacing: -.03em;
    color: var(--paper);
    margin-bottom: 30px;
}

.ct-form-h em {
    font-style: normal;
    color: var(--flame);
}

/* Fields */
.cf-grid2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 16px;
}

.cf-field {
    margin-bottom: 16px;
}

.cf-label {
    display: block;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-bottom: 9px;
}

.cf-label span {
    color: var(--flame);
}

.cf-input {
    width: 100%;
    background: rgba(8, 8, 12, .7);
    border: 1px solid var(--b2);
    color: var(--paper);
    padding: 13px 15px;
    font-size: 14px;
    font-family: var(--fBody);
    outline: none;
    transition: border-color .25s, background .25s, box-shadow .25s;
    -webkit-appearance: none;
    border-radius: 0;
}

.cf-input:focus {
    border-color: var(--flame);
    background: rgba(8, 8, 12, .9);
    box-shadow: 0 0 0 3px rgba(255, 60, 0, .08);
}

.cf-input::placeholder {
    color: var(--ghost3);
}

.cf-input option {
    background: #1a1a22;
}

textarea.cf-input {
    resize: vertical;
    min-height: 120px;
    line-height: 1.7;
}

/* File drop */
.cf-drop {
    border: 1.5px dashed var(--b2);
    padding: 28px 18px;
    text-align: center;
    cursor: pointer;
    position: relative;
    transition: border-color .3s, background .3s;
    background: rgba(8, 8, 12, .4);
}

.cf-drop:hover,
.cf-drop.drag {
    border-color: rgba(255, 60, 0, .4);
    background: rgba(255, 60, 0, .03);
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
    font-size: 28px;
    margin-bottom: 9px;
    opacity: .45;
}

.cf-drop-txt {
    font-size: 13px;
    color: var(--ghost3);
    font-weight: 500;
}

.cf-drop-txt span {
    color: var(--lime);
}

.cf-drop-hint {
    font-size: 11px;
    color: var(--ghost3);
    margin-top: 5px;
    opacity: .6;
}

/* Submit */
.cf-submit {
    width: 100%;
    background: var(--flame);
    color: #fff;
    font-family: var(--fDisplay);
    font-size: 17px;
    font-weight: 700;
    letter-spacing: .06em;
    padding: 17px;
    border: none;
    cursor: pointer;
    clip-path: polygon(0 0, 95% 0, 100% 18%, 100% 100%, 5% 100%, 0 82%);
    transition: background .2s, transform .18s, box-shadow .18s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 26px;
}

.cf-submit:hover {
    background: #e03600;
    transform: translateY(-2px);
    box-shadow: 0 12px 34px rgba(255, 60, 0, .35);
}

.cf-submit:disabled {
    opacity: .6;
    cursor: wait;
    transform: none;
}

/* Flash */
.cf-success {
    background: rgba(34, 197, 94, .09);
    border: 1px solid rgba(34, 197, 94, .22);
    color: #4ade80;
    padding: 14px 18px;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 22px;
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.cf-error {
    background: rgba(255, 60, 0, .09);
    border: 1px solid rgba(255, 60, 0, .22);
    color: var(--flame);
    padding: 14px 18px;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 22px;
}

/* Responsive */
@media (max-width:1100px) {
    .ct-main {
        grid-template-columns: 1fr;
        gap: 48px;
    }
}

@media (max-width:768px) {
    .ct-strip-inner {
        grid-template-columns: 1fr;
    }

    .ct-strip-cell {
        border-right: none;
        border-bottom: 1px solid var(--b1);
    }

    .ct-strip-cell:last-child {
        border-bottom: none;
    }

    .cf-grid2 {
        grid-template-columns: 1fr;
    }
}

@media (max-width:480px) {
    .ct-h1 {
        font-size: clamp(52px, 14vw, 110px);
    }
}

@keyframes spinAnim {
    to {
        transform: rotate(360deg)
    }
}
</style>

<div style="background:var(--s0)">
    <!-- HERO -->
    <section class="ct-hero" aria-labelledby="ct-h1">
        <div class="ct-hero-glow1" aria-hidden="true"></div>
        <div class="ct-hero-glow2" aria-hidden="true"></div>
        <div class="ct-hero-bg" aria-hidden="true">TALK</div>
        <div class="ct-hero-content">
            <span class="s-label rv" style="margin-bottom:18px;color:var(--ghost3)">Get In Touch</span>
            <h1 id="ct-h1" class="ct-h1 rv d1">Let's<br><em>Talk</em></h1>
            <p class="ct-hero-sub rv d2">Have a brand to grow? A film to promote? A campaign that needs to explode? Tell
                us — we'll make it happen.</p>
        </div>
    </section>

    <!-- STRIP -->
    <div class="ct-strip">
        <div class="ct-strip-inner">
            <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?>"
                class="ct-strip-cell rv d1">
                <div class="ct-strip-icon">✉</div>
                <div>
                    <div class="ct-strip-lbl">Email Us</div>
                    <div class="ct-strip-val">
                        <?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?></div>
                </div>
            </a>
            <a href="tel:<?= htmlspecialchars($settings['site_phone'] ?? '') ?>" class="ct-strip-cell rv d2">
                <div class="ct-strip-icon">✆</div>
                <div>
                    <div class="ct-strip-lbl">Call Us</div>
                    <div class="ct-strip-val"><?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?></div>
                </div>
            </a>
            <div class="ct-strip-cell rv d3">
                <div class="ct-strip-icon">◉</div>
                <div>
                    <div class="ct-strip-lbl">Location</div>
                    <div class="ct-strip-val"><?= htmlspecialchars($settings['site_address'] ?? 'India') ?></div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN -->
    <div style="background:var(--s0)">
        <div class="ct-main">
            <!-- LEFT -->
            <div>
                <div class="ct-info-card rv d1">
                    <div class="ct-info-h">Why HouseOfSocial?</div>
                    <?php foreach (['300+ campaigns delivered', '12M+ people reached', '10,000+ creator network', '24–48h response time', 'Pan-India coverage', 'Culture-first thinking'] as $w): ?>
                    <div class="ct-why-item">
                        <div class="ct-why-dot"></div><span class="ct-why-txt"><?= htmlspecialchars($w) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="ct-info-card rv d2">
                    <div class="ct-info-h">Response Time</div>
                    <p style="font-size:14px;color:var(--ghost4);line-height:1.82;">We reply to every enquiry within
                        <strong style="color:var(--flame)">24–48 hours</strong>. For urgent campaigns, mention it in
                        your message and we'll prioritise accordingly.</p>
                </div>
                <div class="ct-info-card rv d3">
                    <div class="ct-info-h">Follow Us</div>
                    <div class="ct-social-row">
                        <a href="https://www.instagram.com/houseofsocial.hos/" target="_blank" class="ct-soc-pill" data-no-wipe>Instagram</a>
                        <a href="https://www.linkedin.com/company/houseofsocialhos/" target="_blank" class="ct-soc-pill" data-no-wipe>LinkedIn</a>
                        <a href="#" class="ct-soc-pill" data-no-wipe>Twitter / X</a>
                    </div>
                </div>
            </div>

            <!-- RIGHT FORM -->
            <div class="ct-form-card rv d2">
                <?php if ($this->session->flashdata('success')): ?>
                <div class="cf-success"><span
                        style="font-size:18px;flex-shrink:0">🎉</span><?= htmlspecialchars($this->session->flashdata('success')) ?>
                </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')): ?>
                <div class="cf-error">⚠ <?= $this->session->flashdata('error') ?></div>
                <?php endif; ?>

                <h2 class="ct-form-h">Send a <em>Message</em></h2>

                <?= form_open_multipart('contact/send', ['id' => 'ct-form', 'novalidate' => '']) ?>
                <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

                <div class="cf-grid2">
                    <div><label class="cf-label" for="f-name">Name <span>*</span></label><input type="text" name="name"
                            id="f-name" class="cf-input" placeholder="Raj Malhotra" required autocomplete="name"></div>
                    <div><label class="cf-label" for="f-phone">Phone</label><input type="tel" name="phone" id="f-phone"
                            class="cf-input" placeholder="+91 98765 43210" autocomplete="tel"></div>
                </div>
                <div class="cf-field">
                    <label class="cf-label" for="f-email">Email <span>*</span></label>
                    <input type="email" name="email" id="f-email" class="cf-input" placeholder="raj@brand.com" required
                        autocomplete="email">
                </div>
                <div class="cf-grid2">
                    <div><label class="cf-label" for="f-co">Company</label><input type="text" name="company" id="f-co"
                            class="cf-input" placeholder="Brand Name"></div>
                    <div>
                        <label class="cf-label" for="f-bud">Budget</label>
                        <select name="budget" id="f-bud" class="cf-input">
                            <option value="">Select range</option>
                            <option>Under ₹1 Lakh</option>
                            <option>₹1L – ₹5L</option>
                            <option>₹5L – ₹20L</option>
                            <option>₹20L – ₹50L</option>
                            <option>₹50L+</option>
                        </select>
                    </div>
                </div>
                <div class="cf-field">
                    <label class="cf-label" for="f-svc">Service</label>
                    <select name="service" id="f-svc" class="cf-input">
                        <option value="">Choose a service</option>
                        <option>Influencer Marketing</option>
                        <option>Meme Marketing</option>
                        <option>Reddit Marketing</option>
                        <option>LinkedIn Marketing</option>
                        <option>Twitter/X Trending</option>
                        <option>UGC Content</option>
                        <option>Viral Marketing</option>
                        <option>Performance Marketing</option>
                        <option>Content Production</option>
                        <option>Brand Strategy</option>
                        <option>Creative Campaigns</option>
                        <option>On-Ground Promotions</option>
                        <option>Full Package</option>
                    </select>
                </div>
                <div class="cf-field">
                    <label class="cf-label" for="f-msg">Message <span>*</span></label>
                    <textarea name="message" id="f-msg" class="cf-input" rows="5"
                        placeholder="Tell us about your project, goals, and timeline..." required></textarea>
                </div>
                <div class="cf-field">
                    <label class="cf-label">Attachment <span
                            style="opacity:.4;text-transform:none;letter-spacing:0;font-size:10px;">(optional —
                            PDF/JPG/PNG, max 5MB)</span></label>
                    <div class="cf-drop" id="cf-drop">
                        <input type="file" name="attachment" id="f-file" accept=".pdf,.jpg,.jpeg,.png,.webp"
                            onchange="cfFileChange(this)">
                        <div id="cf-flbl">
                            <div class="cf-drop-icon">📎</div>
                            <p class="cf-drop-txt">Drop file here or <span>browse</span></p>
                            <p class="cf-drop-hint">PDF, JPG, PNG — max 5MB</p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="cf-submit" id="cf-sbtn">
                    <span id="cf-txt">SEND MESSAGE →</span>
                    <span id="cf-spin" style="display:none;align-items:center;gap:8px">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" style="animation:spinAnim .8s linear infinite">
                            <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4" />
                        </svg>
                        SENDING...
                    </span>
                </button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<script>
function cfFileChange(i) {
    if (!i.files || !i.files[0]) return;
    var s = (i.files[0].size / 1024 / 1024).toFixed(1);
    document.getElementById('cf-flbl').innerHTML =
        '<div style="font-size:22px;margin-bottom:8px;opacity:.6">📄</div><p style="font-size:13px;font-weight:600;color:var(--lime)">' +
        i.files[0].name + '</p><p style="font-size:11px;color:var(--ghost3);margin-top:4px">' + s +
        ' MB · Click to change</p>';
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
var cf = document.getElementById('ct-form');
if (cf) {
    cf.addEventListener('submit', function() {
        var sb = document.getElementById('cf-sbtn'),
            t = document.getElementById('cf-txt'),
            sp = document.getElementById('cf-spin');
        if (sb) {
            sb.disabled = true;
            if (t) t.style.display = 'none';
            if (sp) sp.style.display = 'flex';
        }
    });
}
</script>