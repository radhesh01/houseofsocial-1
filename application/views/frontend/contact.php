<?php defined('BASEPATH') or exit('No direct script access allowed');
/* FILE: application/views/frontend/contact.php */
?>
<style>
.ct-hero {
    position: relative;
    z-index: 1;
    padding: 140px 52px 72px;
    overflow: hidden
}

.ct-hero-grad {
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 60% 80% at 80% 50%, rgba(200, 96, 240, .07) 0%, transparent 60%), radial-gradient(ellipse 40% 60% at 15% 20%, rgba(0, 212, 255, .05) 0%, transparent 50%);
    pointer-events: none
}

.ct-main {
    padding: 0 52px 100px;
    position: relative;
    z-index: 1
}

.fc-ff {
    background: var(--ink);
    border: 1.5px solid var(--border);
    color: var(--cream);
    border-radius: 10px;
    padding: 14px 18px;
    font-size: 15px;
    font-family: var(--font-b);
    font-weight: 500;
    outline: none;
    width: 100%;
    transition: border-color .25s, background .25s, box-shadow .25s;
    -webkit-appearance: none
}

.fc-ff:focus {
    border-color: var(--y);
    background: #131320;
    box-shadow: 0 0 0 3px rgba(245, 197, 24, .08)
}

.fc-ff::placeholder {
    color: var(--muted)
}

.fc-ff option {
    background: var(--ink)
}

.fc-fl {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--muted);
    display: block;
    margin-bottom: 10px
}

.fc-fw {
    position: relative
}

.fc-fbar {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--y), var(--o));
    border-radius: 0 0 10px 10px;
    transition: width .4s cubic-bezier(.16, 1, .3, 1)
}

.fc-ff:focus~.fc-fbar {
    width: 100%
}

.fc-fdrop {
    border: 1.5px dashed rgba(255, 255, 255, .1);
    border-radius: 10px;
    padding: 32px 20px;
    text-align: center;
    cursor: pointer;
    transition: all .3s;
    position: relative;
    background: var(--card)
}

.fc-fdrop:hover,
.fc-fdrop.drag {
    border-color: rgba(245, 197, 24, .4);
    background: rgba(245, 197, 24, .04)
}

.fc-fdrop input {
    position: absolute;
    inset: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%;
    height: 100%
}

.fc-fsub {
    width: 100%;
    background: linear-gradient(135deg, var(--y), var(--o));
    color: #0D0D0F;
    font-family: var(--font-d);
    font-weight: 700;
    font-size: 16px;
    letter-spacing: .04em;
    padding: 18px;
    border: none;
    border-radius: 100px;
    cursor: pointer;
    transition: transform .2s, box-shadow .2s;
    position: relative;
    overflow: hidden
}

.fc-fsub:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 40px rgba(245, 197, 24, .35)
}

.fok {
    background: rgba(61, 255, 143, .08);
    border: 1px solid rgba(61, 255, 143, .2);
    color: var(--g);
    padding: 14px 18px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 10px
}

.ferr {
    background: rgba(255, 100, 50, .08);
    border: 1px solid rgba(255, 100, 50, .2);
    color: var(--o);
    padding: 14px 18px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px
}

.fc-ic {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 28px;
    transition: border-color .3s;
    margin-bottom: 14px
}

.fc-ic:hover {
    border-color: rgba(245, 197, 24, .2)
}

@keyframes fc-float {

    0%,
    100% {
        transform: translateY(0) rotate(0)
    }

    50% {
        transform: translateY(-14px) rotate(4deg)
    }
}

@media(max-width:1024px) {

    .ct-hero,
    .ct-main {
        padding-left: 28px !important;
        padding-right: 28px !important
    }
}

@media(max-width:768px) {
    .ct-hero {
        padding-top: 100px !important
    }

    .ct-main {
        padding-left: 20px !important;
        padding-right: 20px !important
    }

    .ct-cols {
        grid-template-columns: 1fr !important
    }
}

@media(max-width:640px) {
    .fform2 {
        grid-template-columns: 1fr !important
    }
}
</style>

<section class="ct-hero" aria-labelledby="ct-h1">
    <div class="ct-hero-grad"></div>
    <div style="position:absolute;top:20%;right:8%;font-size:36px;opacity:.12;animation:fc-float 7s ease-in-out infinite;pointer-events:none"
        aria-hidden="true">&#127909;</div>
    <div style="position:absolute;bottom:15%;right:20%;font-size:28px;opacity:.10;animation:fc-float 5s ease-in-out 1s infinite;pointer-events:none"
        aria-hidden="true">&#128172;</div>
    <div style="max-width:1380px;margin:0 auto;position:relative;z-index:2">
        <p class="fc-tag fc-rv" style="color:var(--c);margin-bottom:20px">Get In Touch</p>
        <h1 id="ct-h1" class="fc-h2 fc-rv fc-d1" style="margin-bottom:24px;font-size:clamp(64px,11vw,128px)">
            LET'S<br><span class="fc-grad-text-1">TALK</span></h1>
        <p class="fc-rv fc-d2"
            style="font-size:17px;color:var(--muted);max-width:440px;line-height:1.75;font-weight:500">Have a brand to
            grow? A film to promote? Tell us — we'll make it explode.</p>
    </div>
</section>

<section class="ct-main">
    <div style="max-width:1380px;margin:0 auto">
        <div class="ct-cols" style="display:grid;grid-template-columns:1fr 1.5fr;gap:64px;align-items:flex-start">

            <!-- LEFT INFO -->
            <div>
                <?php $info = [['&#128222;', 'Phone', $settings['site_phone'] ?? '+91 9990802115', 'tel:' . ($settings['site_phone'] ?? ''), '--y'], ['&#9993;&#65039;', 'Email', $settings['site_email'] ?? 'contact@filmycurry.com', 'mailto:' . ($settings['site_email'] ?? ''), '--o'], ['&#128205;', 'Location', $settings['site_address'] ?? 'India', '', '--p']];
        foreach ($info as $inf): ?>
                <div class="fc-ic fc-rv">
                    <div style="display:flex;align-items:center;gap:14px">
                        <div
                            style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.05);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0">
                            <?php echo $inf[0]; ?></div>
                        <div>
                            <p
                                style="font-size:10px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--muted);margin-bottom:5px">
                                <?php echo $inf[1]; ?></p>
                            <?php if ($inf[3]): ?><a href="<?php echo $inf[3]; ?>"
                                style="font-size:15px;font-weight:700;color:var(--cream);text-decoration:none;transition:color .2s"
                                onmouseover="this.style.color='var(--y)'"
                                onmouseout="this.style.color='var(--cream)'"><?php echo htmlspecialchars($inf[2]); ?></a>
                            <?php else: ?><p style="font-size:15px;font-weight:700;color:rgba(237,232,223,.6)">
                                <?php echo htmlspecialchars($inf[2]); ?></p><?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="fc-rv fc-d1"
                    style="margin-top:8px;padding:28px;border-radius:16px;background:var(--card);border:1px solid var(--border);position:relative;overflow:hidden">
                    <div
                        style="position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--y),var(--o),var(--p),var(--c))">
                    </div>
                    <p
                        style="font-size:10px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--muted);margin-bottom:18px">
                        Why FilmyCurry?</p>
                    <?php foreach ([['var(--y)', '300+ campaigns delivered'], ['var(--o)', '32% of all OTT releases'], ['var(--p)', '12M+ people reached'], ['var(--c)', '24-48h response time']] as $pt): ?>
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px">
                        <div
                            style="width:20px;height:20px;border-radius:50%;background:rgba(255,255,255,.05);display:flex;align-items:center;justify-content:center;flex-shrink:0">
                            <span style="color:<?php echo $pt[0]; ?>;font-size:10px;font-weight:900">&#10003;</span>
                        </div>
                        <span
                            style="font-size:14px;font-weight:600;color:rgba(237,232,223,.65)"><?php echo $pt[1]; ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="fc-rv fc-d2" style="margin-top:20px">
                    <p
                        style="font-size:10px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--muted);margin-bottom:14px">
                        Follow Us</p>
                    <div style="display:flex;gap:10px">
                        <?php foreach (['LinkedIn', 'Instagram', 'X'] as $soc): ?>
                        <a href="#" aria-label="<?php echo $soc; ?>"
                            style="padding:10px 18px;border:1.5px solid var(--border);border-radius:100px;font-size:12px;font-weight:800;color:var(--muted);text-decoration:none;transition:all .2s"
                            onmouseover="this.style.borderColor='var(--y)';this.style.color='var(--y)'"
                            onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--muted)'"><?php echo $soc; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- RIGHT FORM -->
            <div class="fc-rv fc-d2">
                <?php if ($this->session->flashdata('success')): ?>
                <div class="fok"><span
                        style="font-size:18px">&#127881;</span><?php echo htmlspecialchars($this->session->flashdata('success')); ?>
                </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')): ?>
                <div class="ferr">&#9888; <?php echo $this->session->flashdata('error'); ?></div>
                <?php endif; ?>

                <div
                    style="background:var(--card);border:1px solid var(--border);border-radius:20px;padding:40px;position:relative;overflow:hidden">
                    <div
                        style="position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--y),var(--o),var(--p),var(--c),var(--g))">
                    </div>
                    <h2
                        style="font-family:var(--font-d);font-weight:700;font-size:24px;letter-spacing:-.03em;margin-bottom:32px">
                        Send Us a Message</h2>

                    <?php echo form_open_multipart('contact/send', ['id' => 'ct-form', 'novalidate' => '']); ?>
                    <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

                    <div class="fform2" style="display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px">
                        <div><label class="fc-fl" for="f-name">Name <span style="color:var(--y)">*</span></label>
                            <div class="fc-fw"><input type="text" name="name" id="f-name" class="fc-ff"
                                    placeholder="Raj Malhotra" required autocomplete="name"><span
                                    class="fc-fbar"></span></div>
                        </div>
                        <div><label class="fc-fl" for="f-phone">Phone</label>
                            <div class="fc-fw"><input type="tel" name="phone" id="f-phone" class="fc-ff"
                                    placeholder="+91 98765 43210" autocomplete="tel"><span class="fc-fbar"></span></div>
                        </div>
                    </div>
                    <div style="margin-bottom:18px"><label class="fc-fl" for="f-email">Email <span
                                style="color:var(--y)">*</span></label>
                        <div class="fc-fw"><input type="email" name="email" id="f-email" class="fc-ff"
                                placeholder="raj@brand.com" required autocomplete="email"><span class="fc-fbar"></span>
                        </div>
                    </div>
                    <div class="fform2" style="display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px">
                        <div><label class="fc-fl" for="f-co">Company</label>
                            <div class="fc-fw"><input type="text" name="company" id="f-co" class="fc-ff"
                                    placeholder="Brand Name"><span class="fc-fbar"></span></div>
                        </div>
                        <div><label class="fc-fl" for="f-bud">Budget</label>
                            <div class="fc-fw"><select name="budget" id="f-bud" class="fc-ff">
                                    <option value="">Select range</option>
                                    <option>Under &#8377;1 Lakh</option>
                                    <option>&#8377;1L &ndash; &#8377;5L</option>
                                    <option>&#8377;5L &ndash; &#8377;20L</option>
                                    <option>&#8377;20L &ndash; &#8377;50L</option>
                                    <option>&#8377;50L+</option>
                                </select><span class="fc-fbar"></span></div>
                        </div>
                    </div>
                    <div style="margin-bottom:18px"><label class="fc-fl" for="f-svc">Service</label>
                        <div class="fc-fw"><select name="service" id="f-svc" class="fc-ff">
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
                            </select><span class="fc-fbar"></span></div>
                    </div>
                    <div style="margin-bottom:18px"><label class="fc-fl" for="f-msg">Message <span
                                style="color:var(--y)">*</span></label>
                        <div class="fc-fw"><textarea name="message" id="f-msg" class="fc-ff" rows="5"
                                placeholder="Tell us about your project..." required
                                style="resize:vertical;min-height:120px"></textarea><span class="fc-fbar"></span></div>
                    </div>
                    <div style="margin-bottom:28px">
                        <label class="fc-fl">Attachment <span
                                style="opacity:.4;text-transform:none;letter-spacing:0">(optional &mdash; PDF/JPG/PNG,
                                max 5MB)</span></label>
                        <div class="fc-fdrop" id="fc-drop"><input type="file" name="attachment" id="f-file"
                                accept=".pdf,.jpg,.jpeg,.png,.webp" onchange="fcFile(this)">
                            <div id="fc-flbl">
                                <div style="font-size:28px;margin-bottom:8px">&#128206;</div>
                                <p style="font-size:13px;font-weight:600;color:rgba(237,232,223,.4)">Drop file here or
                                    <span style="color:var(--y)">browse</span>
                                </p>
                                <p style="font-size:11px;color:var(--muted);margin-top:4px">PDF, JPG, PNG &mdash; max
                                    5MB</p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="fc-fsub" id="fc-sbtn"><span id="fc-stxt"
                            style="display:flex;align-items:center;justify-content:center;gap:10px">SEND MESSAGE <span
                                id="fc-sarr" style="transition:transform .2s">&rarr;</span></span><span id="fc-spin"
                            style="display:none;align-items:center;justify-content:center;gap:8px"><svg width="18"
                                height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                style="animation:fcspin .8s linear infinite">
                                <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4" />
                            </svg>SENDING...</span></button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
@keyframes fcspin {
    to {
        transform: rotate(360deg)
    }
}
</style>
<script>
function fcFile(i) {
    var l = document.getElementById('fc-flbl');
    if (i.files && i.files[0]) {
        var s = (i.files[0].size / 1024 / 1024).toFixed(1);
        l.innerHTML =
            '<div style="font-size:24px;margin-bottom:6px">&#128196;</div><p style="font-size:13px;font-weight:700;color:var(--y)">' +
            i.files[0].name + '</p><p style="font-size:11px;color:var(--muted);margin-top:4px">' + s +
            ' MB &middot; Click to change</p>';
    }
}
var fd = document.getElementById('fc-drop');
if (fd) {
    ['dragenter', 'dragover'].forEach(function(e) {
        fd.addEventListener(e, function(ev) {
            ev.preventDefault();
            fd.classList.add('drag')
        })
    });
    ['dragleave', 'drop'].forEach(function(e) {
        fd.addEventListener(e, function(ev) {
            ev.preventDefault();
            fd.classList.remove('drag')
        })
    })
}
var cf = document.getElementById('ct-form'),
    sbtn = document.getElementById('fc-sbtn'),
    stxt = document.getElementById('fc-stxt'),
    spin = document.getElementById('fc-spin'),
    sarr = document.getElementById('fc-sarr');
if (cf) {
    cf.addEventListener('submit', function() {
        if (sbtn) {
            sbtn.disabled = true;
            if (stxt) stxt.style.display = 'none';
            if (spin) {
                spin.style.display = 'flex'
            }
        }
    })
}
if (sbtn && sarr) {
    sbtn.addEventListener('mouseenter', function() {
        sarr.style.transform = 'translateX(6px)'
    });
    sbtn.addEventListener('mouseleave', function() {
        sarr.style.transform = ''
    })
}
</script>