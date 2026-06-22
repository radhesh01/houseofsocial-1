<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
/* ================================================================
   CONTACT PAGE REDESIGN — HouseOfSocial
================================================================ */

/* ── HERO SECTION ── */
.cx-hero {
    position: relative;
    padding: calc(var(--navH) + 100px) var(--px) var(--sec);
    background: var(--s0);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    overflow: hidden;
}

.cx-hero-glow1 {
    position: absolute;
    top: 10%;
    left: 20%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(255, 60, 0, .06) 0%, transparent 60%);
    filter: blur(80px);
    pointer-events: none;
    z-index: 0;
}

.cx-hero-glow2 {
    position: absolute;
    bottom: 10%;
    right: 15%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(200, 241, 53, .03) 0%, transparent 60%);
    filter: blur(80px);
    pointer-events: none;
    z-index: 0;
}

.cx-hero-grid {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    background-image:
        linear-gradient(rgba(244, 241, 236, .015) 1px, transparent 1px),
        linear-gradient(90deg, rgba(244, 241, 236, .015) 1px, transparent 1px);
    background-size: 80px 80px;
    -webkit-mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, #000 30%, transparent 100%);
    mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, #000 30%, transparent 100%);
}

.cx-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 1000px;
    width: 100%;
}

.cx-h1 {
    font-family: var(--fDisplay);
    font-size: clamp(48px, 8vw, 110px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .9;
    color: var(--paper);
    margin-bottom: 24px;
}

.cx-h1 em {
    font-style: normal;
    color: var(--flame);
}

.cx-hero-sub {
    font-size: clamp(16px, 1.8vw, 20px);
    color: var(--ghost5);
    line-height: 1.6;
    max-width: 680px;
    margin: 0 auto 48px;
}

/* Floating elements in hero */
.cx-float {
    position: absolute;
    background: rgba(13, 13, 19, .6);
    border: 1px solid var(--b2);
    backdrop-filter: blur(12px);
    padding: 12px 20px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .08em;
    color: var(--ghost4);
    display: flex;
    align-items: center;
    gap: 8px;
    z-index: 3;
    pointer-events: none;
}

.cx-float-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--flame);
    box-shadow: 0 0 10px var(--flame);
}

.cx-float-1 {
    top: 20%;
    left: 8%;
    animation: floatA 6s ease-in-out infinite;
}

.cx-float-2 {
    bottom: 25%;
    right: 8%;
    animation: floatB 8s ease-in-out infinite;
}

.cx-float-3 {
    top: 60%;
    left: 12%;
    animation: floatA 7s ease-in-out infinite 1s;
}

/* ── METHODS GRID ── */
.cx-methods {
    max-width: var(--maxW);
    margin: 0 auto;
    padding: 0 var(--px) var(--sec);
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    position: relative;
    z-index: 5;
    margin-top: -60px;
}

.cx-method-card {
    background: rgba(13, 13, 19, .95);
    border: 1px solid var(--b2);
    padding: 40px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    transition: transform .3s var(--ease), border-color .3s, background .3s;
    text-decoration: none;
    position: relative;
    overflow: hidden;
}

.cx-method-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: var(--flame);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .4s var(--ease);
}

.cx-method-card:hover {
    transform: translateY(-8px);
    border-color: rgba(255, 60, 0, .3);
    background: var(--s1);
}

.cx-method-card:hover::before {
    transform: scaleX(1);
}

.cx-icon-wrap {
    width: 64px;
    height: 64px;
    border: 1px solid var(--b2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: var(--flame);
    margin-bottom: 24px;
    border-radius: 2px;
    transition: background .3s, color .3s;
}

.cx-method-card:hover .cx-icon-wrap {
    background: var(--flame);
    color: #fff;
    border-color: var(--flame);
}

.cx-method-lbl {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-bottom: 8px;
}

.cx-method-val {
    font-family: var(--fDisplay);
    font-size: 22px;
    font-weight: 600;
    color: var(--paper);
    line-height: 1.3;
}

/* ── FORM SECTION (GLASS STYLE) ── */
.cx-form-sec {
    background: var(--s0);
    padding: var(--sec) var(--px);
    position: relative;
    overflow: hidden;
}

.cx-form-sec::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: var(--b1);
}

.cx-form-container {
    max-width: 960px;
    margin: 0 auto;
    background: rgba(13, 13, 19, .4);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border: 1px solid var(--b2);
    padding: clamp(32px, 5vw, 64px);
    box-shadow: 0 40px 100px rgba(0,0,0,.5);
    position: relative;
}

.cx-form-container::before {
    content: '';
    position: absolute;
    top: -1px;
    left: 50%;
    transform: translateX(-50%);
    width: 40%;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--flame), transparent);
}

.cx-form-h {
    font-family: var(--fDisplay);
    font-size: clamp(32px, 4vw, 48px);
    font-weight: 700;
    letter-spacing: -.03em;
    color: var(--paper);
    margin-bottom: 40px;
    text-align: center;
}

.cf-grid2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-bottom: 24px;
}

.cf-field {
    margin-bottom: 24px;
}

.cf-label {
    display: block;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .15em;
    text-transform: uppercase;
    color: var(--ghost4);
    margin-bottom: 10px;
}

.cf-label span {
    color: var(--flame);
}

.cf-input {
    width: 100%;
    background: rgba(8, 8, 12, .6);
    border: none;
    border-bottom: 1px solid var(--b3);
    color: var(--paper);
    padding: 16px 0;
    font-size: 16px;
    font-family: var(--fBody);
    outline: none;
    transition: border-color .3s, background .3s;
    -webkit-appearance: none;
    border-radius: 0;
}

.cf-input:focus {
    border-color: var(--flame);
    background: rgba(255, 60, 0, .03);
}

.cf-input::placeholder {
    color: var(--ghost3);
}

.cf-input option {
    background: #121218;
    color: var(--paper);
}

textarea.cf-input {
    resize: vertical;
    min-height: 140px;
    line-height: 1.7;
    padding: 16px;
    border: 1px solid var(--b3);
}

textarea.cf-input:focus {
    border-color: var(--flame);
}

/* File drop */
.cf-drop {
    border: 1px dashed var(--b3);
    padding: 40px 20px;
    text-align: center;
    cursor: pointer;
    position: relative;
    transition: all .3s;
    background: rgba(8, 8, 12, .3);
}

.cf-drop:hover,
.cf-drop.drag {
    border-color: var(--flame);
    background: rgba(255, 60, 0, .05);
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
    font-size: 32px;
    margin-bottom: 12px;
    opacity: .6;
    color: var(--paper);
}

.cf-drop-txt {
    font-size: 15px;
    color: var(--ghost5);
    font-weight: 500;
}

.cf-drop-txt span {
    color: var(--flame);
    text-decoration: underline;
}

.cf-drop-hint {
    font-size: 12px;
    color: var(--ghost3);
    margin-top: 8px;
}

/* Submit Button */
.cf-submit-wrap {
    text-align: center;
    margin-top: 40px;
}

.cf-submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    background: var(--flame);
    color: #fff;
    font-family: var(--fDisplay);
    font-size: 18px;
    font-weight: 700;
    letter-spacing: .06em;
    padding: 20px 48px;
    border: none;
    cursor: pointer;
    clip-path: polygon(0 0, 94% 0, 100% 20%, 100% 100%, 6% 100%, 0 80%);
    transition: background .2s, transform .2s, box-shadow .2s;
    min-width: 260px;
}

.cf-submit:hover {
    background: #e03600;
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(255, 60, 0, .4);
}

.cf-submit:disabled {
    opacity: .6;
    cursor: wait;
    transform: none;
    box-shadow: none;
}

/* Flash */
.cf-success {
    background: rgba(34, 197, 94, .1);
    border: 1px solid rgba(34, 197, 94, .3);
    color: #4ade80;
    padding: 16px 24px;
    font-size: 15px;
    font-weight: 500;
    margin-bottom: 32px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.cf-error {
    background: rgba(255, 60, 0, .1);
    border: 1px solid rgba(255, 60, 0, .3);
    color: var(--flame);
    padding: 16px 24px;
    font-size: 15px;
    font-weight: 500;
    margin-bottom: 32px;
}

/* ── WHY WORK WITH US ── */
.cx-why {
    background: var(--s1);
    padding: var(--sec) var(--px);
    border-top: 1px solid var(--b1);
}

.cx-why-hdr {
    max-width: var(--maxW);
    margin: 0 auto 56px;
    text-align: center;
}

.cx-why-h2 {
    font-family: var(--fDisplay);
    font-size: clamp(36px, 5vw, 64px);
    font-weight: 700;
    letter-spacing: -.03em;
    color: var(--paper);
}

.cx-why-grid {
    max-width: var(--maxW);
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.cx-why-card {
    background: var(--s0);
    border: 1px solid var(--b1);
    padding: 40px 32px;
    transition: background .3s, border-color .3s;
}

.cx-why-card:hover {
    background: var(--s2);
    border-color: rgba(255, 60, 0, .2);
}

.cx-why-num {
    font-family: var(--fDisplay);
    font-size: 14px;
    font-weight: 700;
    color: var(--flame);
    margin-bottom: 24px;
    display: block;
}

.cx-why-title {
    font-family: var(--fDisplay);
    font-size: 24px;
    font-weight: 700;
    color: var(--paper);
    margin-bottom: 12px;
    line-height: 1.1;
}

.cx-why-desc {
    font-size: 14px;
    color: var(--ghost5);
    line-height: 1.7;
}

/* ── FINAL CTA ── */
.cx-cta {
    background: var(--s0);
    padding: clamp(100px, 12vw, 180px) var(--px);
    text-align: center;
    border-top: 1px solid var(--b1);
    position: relative;
    overflow: hidden;
}

.cx-cta::after {
    content: '';
    position: absolute;
    bottom: -150px;
    left: 50%;
    transform: translateX(-50%);
    width: 600px;
    height: 300px;
    background: radial-gradient(ellipse, rgba(255, 60, 0, .08) 0%, transparent 70%);
    filter: blur(60px);
    pointer-events: none;
}

.cx-cta-h {
    font-family: var(--fDisplay);
    font-size: clamp(40px, 6vw, 88px);
    font-weight: 700;
    letter-spacing: -.04em;
    color: var(--paper);
    line-height: .9;
    max-width: 900px;
    margin: 0 auto 40px;
}

.cx-cta-h em {
    font-style: normal;
    color: var(--flame);
}

/* Responsive */
@media (max-width: 1100px) {
    .cx-methods {
        gap: 16px;
    }
    .cx-method-card {
        padding: 32px 24px;
    }
}

@media (max-width: 900px) {
    .cx-why-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .cx-methods {
        grid-template-columns: 1fr;
        margin-top: 0;
    }
    .cf-grid2 {
        grid-template-columns: 1fr;
    }
    .cx-float {
        display: none;
    }
}

@media (max-width: 540px) {
    .cx-why-grid {
        grid-template-columns: 1fr;
    }
    .cx-form-container {
        padding: 32px 20px;
    }
    .cf-submit {
        width: 100%;
        min-width: 0;
    }
}

@keyframes spinAnim {
    to { transform: rotate(360deg) }
}
</style>

<section class="cx-hero" aria-labelledby="cx-h1">
    <div class="cx-hero-glow1" aria-hidden="true"></div>
    <div class="cx-hero-glow2" aria-hidden="true"></div>
    <div class="cx-hero-grid" aria-hidden="true"></div>
    
    <div class="cx-float cx-float-1 rv d3"><span class="cx-float-dot"></span> Strategy First</div>
    <div class="cx-float cx-float-2 rv d4"><span class="cx-float-dot" style="background:var(--lime);box-shadow:0 0 10px var(--lime)"></span> Culture Native</div>
    <div class="cx-float cx-float-3 rv d5"><span class="cx-float-dot"></span> Viral Growth</div>

    <div class="cx-hero-inner">
        <h1 id="cx-h1" class="cx-h1 rv d1">Let's Build Something<br><em>People Remember.</em></h1>
        <p class="cx-hero-sub rv d2">Whether you're launching a brand, scaling a campaign, or trying to own a conversation — we'd love to hear about it.</p>
    </div>
</section>

<div class="cx-methods rv d3">
    <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?>" class="cx-method-card">
        <div class="cx-icon-wrap">✉</div>
        <div class="cx-method-lbl">Email Us</div>
        <div class="cx-method-val"><?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?></div>
    </a>
    <a href="tel:<?= htmlspecialchars($settings['site_phone'] ?? '') ?>" class="cx-method-card">
        <div class="cx-icon-wrap">✆</div>
        <div class="cx-method-lbl">Call Us</div>
        <div class="cx-method-val"><?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?></div>
    </a>
    <div class="cx-method-card">
        <div class="cx-icon-wrap">◉</div>
        <div class="cx-method-lbl">Headquarters</div>
        <div class="cx-method-val"><?= htmlspecialchars($settings['site_address'] ?? 'India') ?></div>
    </div>
</div>

<section class="cx-form-sec" id="contact-form">
    <div class="cx-form-container rv">
        <?php if ($this->session->flashdata('success')): ?>
        <div class="cf-success">
            <span style="font-size:20px;flex-shrink:0">🎉</span>
            <div><?= htmlspecialchars($this->session->flashdata('success')) ?></div>
        </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
        <div class="cf-error">⚠ <?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <h2 class="cx-form-h">Start a Conversation</h2>

        <?= form_open_multipart('contact/send', ['id' => 'ct-form', 'novalidate' => '']) ?>
        <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

        <div class="cf-grid2">
            <div class="cf-field">
                <label class="cf-label" for="f-name">Name <span>*</span></label>
                <input type="text" name="name" id="f-name" class="cf-input" placeholder="Your full name" required autocomplete="name">
            </div>
            <div class="cf-field">
                <label class="cf-label" for="f-email">Email <span>*</span></label>
                <input type="email" name="email" id="f-email" class="cf-input" placeholder="you@company.com" required autocomplete="email">
            </div>
        </div>

        <div class="cf-grid2">
            <div class="cf-field">
                <label class="cf-label" for="f-phone">Phone</label>
                <input type="tel" name="phone" id="f-phone" class="cf-input" placeholder="+91 98765 43210" autocomplete="tel">
            </div>
            <div class="cf-field">
                <label class="cf-label" for="f-co">Company</label>
                <input type="text" name="company" id="f-co" class="cf-input" placeholder="Brand or Company Name">
            </div>
        </div>

        <div class="cf-grid2">
            <div class="cf-field">
                <label class="cf-label" for="f-svc">Service Interested In</label>
                <select name="service" id="f-svc" class="cf-input">
                    <option value="">Select a service</option>
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
                <label class="cf-label" for="f-bud">Budget Range</label>
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
            <label class="cf-label" for="f-msg">Message <span>*</span></label>
            <textarea name="message" id="f-msg" class="cf-input" placeholder="Tell us about your project, goals, timeline, and what you're trying to achieve..." required></textarea>
        </div>

        <div class="cf-field">
            <label class="cf-label">Any Attachments? <span style="color:var(--ghost3);text-transform:none;letter-spacing:0">(optional — PDF/JPG/PNG, max 5MB)</span></label>
            <div class="cf-drop" id="cf-drop">
                <input type="file" name="attachment" id="f-file" accept=".pdf,.jpg,.jpeg,.png,.webp" onchange="cfFileChange(this)">
                <div id="cf-flbl">
                    <div class="cf-drop-icon">📎</div>
                    <p class="cf-drop-txt">Drop file here or <span>browse</span></p>
                    <p class="cf-drop-hint">PDF, JPG, PNG — max 5MB</p>
                </div>
            </div>
        </div>

        <div class="cf-submit-wrap">
            <button type="submit" class="cf-submit" id="cf-sbtn">
                <span id="cf-txt">Submit Request &rarr;</span>
                <span id="cf-spin" style="display:none;align-items:center;gap:10px">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="animation:spinAnim .8s linear infinite">
                        <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4" />
                    </svg>
                    SENDING...
                </span>
            </button>
        </div>
        <?= form_close() ?>
    </div>
</section>

<section class="cx-why">
    <div class="cx-why-hdr rv">
        <span class="s-label rv" style="justify-content:center;margin-bottom:16px">The HOS Advantage</span>
        <h2 class="cx-why-h2 rv d1">Why Work With Us</h2>
    </div>
    <div class="cx-why-grid">
        <?php foreach ([
            ['01', 'Internet Native Thinking', 'We grew up on the internet. We don\'t guess what works online; we know what the culture is talking about.'],
            ['02', 'Culture-First Campaigns', 'Content that belongs in the feed. We create marketing that feels like entertainment, not interruption.'],
            ['03', 'Creator Ecosystem', 'Access to 10,000+ vetted creators across every niche, platform, and tier for precision matching.'],
            ['04', 'Performance Focused', 'Organic reach is great, but we tie it to metrics that actually matter: traffic, conversions, and revenue.']
        ] as $i => $w): ?>
        <div class="cx-why-card rv d<?= $i + 1 ?>">
            <span class="cx-why-num"><?= $w[0] ?></span>
            <h3 class="cx-why-title"><?= htmlspecialchars($w[1]) ?></h3>
            <p class="cx-why-desc"><?= htmlspecialchars($w[2]) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="cx-cta">
    <h2 class="cx-cta-h rv d1">Your audience is already online. Let's give them something <em>worth talking about.</em></h2>
    <div class="rv d2">
        <a href="#contact-form" class="btn-primary lg" style="min-width:240px;justify-content:center">Start a Conversation</a>
    </div>
</section>

<script>
function cfFileChange(i) {
    if (!i.files || !i.files[0]) return;
    var s = (i.files[0].size / 1024 / 1024).toFixed(1);
    document.getElementById('cf-flbl').innerHTML =
        '<div style="font-size:28px;margin-bottom:12px;opacity:.8;color:var(--lime)">📄</div><p style="font-size:15px;font-weight:600;color:var(--paper)">' +
        i.files[0].name + '</p><p style="font-size:12px;color:var(--ghost4);margin-top:6px">' + s +
        ' MB · Click to change file</p>';
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