<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>HouseOfSocial — Admin</title>
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0
    }

    :root {
        --ink: #08080C;
        --s1: #0E0E16;
        --s2: #141420;
        --s3: #1A1A28;
        --paper: #F4F1EC;
        --g2: rgba(244, 241, 236, .14);
        --g3: rgba(244, 241, 236, .28);
        --g4: rgba(244, 241, 236, .5);
        --b1: rgba(244, 241, 236, .06);
        --b2: rgba(244, 241, 236, .12);
        --flame: #FF3C00;
        --flame2: #E03600;
        --fh: 'Syne', sans-serif;
        --fb: 'Satoshi', 'DM Sans', system-ui, sans-serif;
        --ease: cubic-bezier(.19, 1, .22, 1);
    }

    html {
        font-size: 16px;
        -webkit-font-smoothing: antialiased
    }

    body {
        background: var(--ink);
        font-family: var(--fb);
        min-height: 100vh;
        display: flex;
        align-items: stretch;
        overflow: hidden
    }

    /* Background grid */
    .lg-grid {
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 0;
        background-image: linear-gradient(rgba(244, 241, 236, .013) 1px, transparent 1px), linear-gradient(90deg, rgba(244, 241, 236, .013) 1px, transparent 1px);
        background-size: 72px 72px
    }

    /* Orbs */
    .lg-orb {
        position: fixed;
        border-radius: 50%;
        filter: blur(100px);
        pointer-events: none;
        z-index: 0
    }

    .lg-o1 {
        width: 560px;
        height: 560px;
        top: 5%;
        right: -10%;
        background: radial-gradient(circle, rgba(255, 60, 0, .07) 0%, transparent 70%)
    }

    .lg-o2 {
        width: 380px;
        height: 380px;
        bottom: 5%;
        left: -8%;
        background: radial-gradient(circle, rgba(200, 241, 53, .04) 0%, transparent 70%)
    }

    /* Left panel */
    .lg-left {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        padding: 72px clamp(36px, 5vw, 88px);
        position: relative;
        z-index: 1;
        border-right: 1px solid rgba(255, 255, 255, .04);
    }

    .lg-tagline {
        font-family: var(--fh);
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .3em;
        text-transform: uppercase;
        color: var(--g3);
        margin-bottom: 22px;
        display: flex;
        align-items: center;
        gap: 12px
    }

    .lg-tagline::before {
        content: '';
        width: 26px;
        height: 2px;
        background: var(--flame)
    }

    .lg-brand {
        font-family: var(--fh);
        font-size: clamp(44px, 7vw, 88px);
        font-weight: 800;
        line-height: .82;
        letter-spacing: -.03em;
        color: var(--paper);
        margin-bottom: 52px
    }

    .lg-brand span {
        color: var(--flame)
    }

    .lg-stats {
        display: flex;
        flex-direction: column;
        gap: 3px;
        max-width: 280px
    }

    .lg-stat {
        background: rgba(244, 241, 236, .03);
        border: 1px solid var(--b1);
        padding: 14px 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        transition: border-color .2s
    }

    .lg-stat:hover {
        border-color: rgba(255, 60, 0, .2)
    }

    .lg-stat-n {
        font-family: var(--fh);
        font-size: 26px;
        font-weight: 700;
        color: var(--flame);
        line-height: 1;
        width: 72px;
        flex-shrink: 0
    }

    .lg-stat-l {
        font-family: var(--fb);
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--g3)
    }

    /* Right form panel */
    .lg-right {
        width: clamp(360px, 38vw, 480px);
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 56px clamp(28px, 4vw, 44px);
        position: relative;
        z-index: 1;
        background: rgba(14, 14, 22, .6);
        backdrop-filter: blur(20px);
    }

    .lg-form-wrap {
        width: 100%;
        max-width: 340px
    }

    .lg-eyebrow {
        font-size: 9.5px;
        font-weight: 600;
        letter-spacing: .28em;
        text-transform: uppercase;
        color: var(--g3);
        margin-bottom: 12px;
        text-align: center
    }

    .lg-form-h {
        font-family: var(--fh);
        font-size: 32px;
        font-weight: 700;
        letter-spacing: .04em;
        color: var(--paper);
        margin-bottom: 32px;
        text-align: center;
        line-height: 1
    }

    .lg-form-h span {
        color: var(--flame)
    }

    /* Error */
    .lg-error {
        background: rgba(255, 60, 0, .09);
        border: 1px solid rgba(255, 60, 0, .22);
        color: var(--flame);
        border-radius: 4px;
        padding: 12px 15px;
        font-size: 13px;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 9px
    }

    /* Fields */
    .lg-field {
        margin-bottom: 18px
    }

    .lg-label {
        display: block;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: var(--g3);
        margin-bottom: 9px
    }

    .lg-input {
        width: 100%;
        background: rgba(8, 8, 12, .8);
        border: 1px solid var(--b2);
        color: var(--paper);
        border-radius: 4px;
        padding: 13px 15px;
        font-size: 14.5px;
        font-family: var(--fb);
        outline: none;
        transition: border-color .2s, box-shadow .2s;
        -webkit-appearance: none
    }

    .lg-input:focus {
        border-color: var(--flame);
        box-shadow: 0 0 0 3px rgba(255, 60, 0, .1)
    }

    .lg-input::placeholder {
        color: rgba(244, 241, 236, .18)
    }

    /* Submit */
    .lg-btn {
        width: 100%;
        background: var(--flame);
        color: #fff;
        font-family: var(--fh);
        font-size: 16px;
        font-weight: 700;
        letter-spacing: .1em;
        padding: 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background .2s, transform .15s, box-shadow .18s;
        margin-top: 8px;
    }

    .lg-btn:hover {
        background: var(--flame2);
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(255, 60, 0, .3)
    }

    /* Divider / footer */
    .lg-divider {
        height: 1px;
        background: var(--b1);
        margin: 26px 0
    }

    .lg-copy {
        text-align: center;
        font-size: 11px;
        color: rgba(244, 241, 236, .14);
        letter-spacing: .05em
    }

    /* Responsive */
    @media(max-width:900px) {
        body {
            flex-direction: column;
            overflow: auto
        }

        .lg-left {
            display: none
        }

        .lg-right {
            width: 100%;
            min-height: 100vh;
            background: transparent
        }
    }
    </style>
</head>

<body>
    <div class="lg-grid"></div>
    <div class="lg-orb lg-o1"></div>
    <div class="lg-orb lg-o2"></div>

    <!-- LEFT BRAND -->
    <div class="lg-left">
        <div class="lg-tagline">Admin Studio</div>
        <div class="lg-brand">HOUSE<br>OF<br><span>SOCIAL</span></div>
        <div class="lg-stats">
            <?php foreach ([['300+', 'Campaigns'], ['12M+', 'Reached'], ['10K+', 'Creators']] as $s): ?>
            <div class="lg-stat">
                <div class="lg-stat-n"><?= $s[0] ?></div>
                <div class="lg-stat-l"><?= $s[1] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- RIGHT FORM -->
    <div class="lg-right">
        <div class="lg-form-wrap">
            <div class="lg-eyebrow">Secure Access</div>
            <h1 class="lg-form-h">SIGN <span>IN</span></h1>

            <?php if (!empty($error)): ?>
            <div class="lg-error"><span style="font-size:15px;flex-shrink:0">⚠</span><?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('admin/login') ?>">
                <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>
                <div class="lg-field">
                    <label class="lg-label" for="lg-u">Username</label>
                    <input type="text" name="username" id="lg-u" class="lg-input" placeholder="admin"
                        value="<?= set_value('username') ?>" autocomplete="username">
                </div>
                <div class="lg-field">
                    <label class="lg-label" for="lg-p">Password</label>
                    <input type="password" name="password" id="lg-p" class="lg-input" placeholder="••••••••"
                        autocomplete="current-password">
                </div>
                <button type="submit" class="lg-btn">SIGN IN →</button>
            </form>

            <div class="lg-divider"></div>
            <p class="lg-copy">&copy; <?= date('Y') ?> HouseOfSocial. All rights reserved.</p>
        </div>
    </div>
</body>

</html>