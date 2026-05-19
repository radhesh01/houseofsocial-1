<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>The Cine Caffe — Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow+Condensed:wght@400;600;700&family=Barlow:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        :root {
            --ink: #0A0A0F;
            --card: #141420;
            --border: rgba(255, 255, 255, .07);
            --gold: #C9A84C;
            --gold-2: #E8A820;
            --cream: #F5F0E8;
            --muted: rgba(245, 240, 232, .38);
            --danger: #E8836A;
            --f-d: 'Bebas Neue', Impact, sans-serif;
            --f-c: 'Barlow Condensed', 'Arial Narrow', sans-serif;
            --f-b: 'Barlow', system-ui, sans-serif;
            --ease: cubic-bezier(.16, 1, .3, 1);
        }

        html {
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
        }

        body {
            background: var(--ink);
            font-family: var(--f-b);
            min-height: 100vh;
            display: flex;
            align-items: stretch;
            overflow: hidden;
        }

        /* bg grid */
        .lg-grid {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            background-image: linear-gradient(rgba(201, 168, 76, .035) 1px, transparent 1px), linear-gradient(90deg, rgba(201, 168, 76, .035) 1px, transparent 1px);
            background-size: 64px 64px;
        }

        /* ambient orbs */
        .lg-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(110px);
            pointer-events: none;
            z-index: 0;
        }

        .lg-o1 {
            width: 600px;
            height: 600px;
            top: 10%;
            right: -10%;
            background: radial-gradient(circle, rgba(201, 168, 76, .07) 0%, transparent 70%);
        }

        .lg-o2 {
            width: 400px;
            height: 400px;
            bottom: 5%;
            left: -5%;
            background: radial-gradient(circle, rgba(107, 122, 85, .15) 0%, transparent 70%);
        }

        /* grain */
        .lg-grain {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            opacity: .04;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        }

        /* left brand panel */
        .lg-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 80px clamp(40px, 6vw, 100px);
            position: relative;
            z-index: 1;
            border-right: 1px solid rgba(255, 255, 255, .05);
        }

        .lg-brand {
            font-family: var(--f-d);
            font-size: clamp(56px, 8vw, 100px);
            line-height: .82;
            letter-spacing: .02em;
            color: var(--cream);
            margin-bottom: 24px;
        }

        .lg-brand span {
            color: var(--gold);
        }

        .lg-tagline {
            font-family: var(--f-c);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .3em;
            text-transform: uppercase;
            color: rgba(245, 240, 232, .24);
            margin-bottom: 56px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .lg-tagline::before {
            content: '';
            width: 28px;
            height: 2px;
            background: var(--gold);
        }

        .lg-stats {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .lg-stat {
            background: rgba(255, 255, 255, .03);
            border: 1px solid var(--border);
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: border-color .2s;
        }

        .lg-stat:hover {
            border-color: rgba(201, 168, 76, .22);
        }

        .lg-stat-n {
            font-family: var(--f-d);
            font-size: 28px;
            color: var(--gold);
            line-height: 1;
            width: 80px;
            flex-shrink: 0;
        }

        .lg-stat-l {
            font-family: var(--f-c);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: rgba(245, 240, 232, .3);
        }

        .lg-vert {
            font-family: var(--f-c);
            font-size: 8px;
            font-weight: 700;
            letter-spacing: .28em;
            text-transform: uppercase;
            color: rgba(245, 240, 232, .1);
            writing-mode: vertical-rl;
            position: absolute;
            bottom: 60px;
            right: 32px;
        }

        /* right form panel */
        .lg-right {
            width: clamp(380px, 40vw, 500px);
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 48px;
            position: relative;
            z-index: 1;
            background: rgba(20, 20, 32, .6);
            backdrop-filter: blur(20px);
        }

        .lg-form-wrap {
            width: 100%;
            max-width: 360px;
        }

        .lg-form-eyebrow {
            font-family: var(--f-c);
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: .28em;
            text-transform: uppercase;
            color: rgba(245, 240, 232, .28);
            margin-bottom: 12px;
            text-align: center;
        }

        .lg-form-h {
            font-family: var(--f-d);
            font-size: 36px;
            letter-spacing: .06em;
            color: var(--cream);
            margin-bottom: 36px;
            text-align: center;
            line-height: 1;
        }

        .lg-form-h span {
            color: var(--gold);
        }

        /* error */
        .lg-error {
            background: rgba(232, 131, 106, .09);
            border: 1px solid rgba(232, 131, 106, .22);
            color: var(--danger);
            border-radius: 4px;
            padding: 13px 16px;
            font-size: 13px;
            margin-bottom: 22px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        /* fields */
        .lg-field {
            margin-bottom: 20px;
        }

        .lg-label {
            display: block;
            font-family: var(--f-c);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: rgba(245, 240, 232, .32);
            margin-bottom: 9px;
        }

        .lg-input {
            width: 100%;
            background: rgba(10, 10, 15, .8);
            border: 1px solid rgba(255, 255, 255, .1);
            color: var(--cream);
            border-radius: 4px;
            padding: 14px 16px;
            font-size: 15px;
            font-family: var(--f-b);
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .lg-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201, 168, 76, .10);
        }

        .lg-input::placeholder {
            color: rgba(245, 240, 232, .18);
        }

        /* submit */
        .lg-btn {
            width: 100%;
            background: var(--gold);
            color: var(--ink);
            font-family: var(--f-d);
            font-size: 18px;
            letter-spacing: .1em;
            padding: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background .2s, transform .15s, box-shadow .18s;
            margin-top: 8px;
        }

        .lg-btn:hover {
            background: var(--gold-2);
            transform: translateY(-2px);
            box-shadow: 0 10px 32px rgba(201, 168, 76, .3);
        }

        .lg-divider {
            height: 1px;
            background: var(--border);
            margin: 28px 0;
        }

        .lg-footer-txt {
            text-align: center;
            font-size: 11px;
            color: rgba(245, 240, 232, .14);
            letter-spacing: .05em;
        }

        @media(max-width:900px) {
            body {
                flex-direction: column;
                overflow: auto;
            }

            .lg-left {
                display: none;
            }

            .lg-right {
                width: 100%;
                min-height: 100vh;
                background: transparent;
            }
        }
    </style>
</head>

<body>
    <div class="lg-grid"></div>
    <div class="lg-orb lg-o1"></div>
    <div class="lg-orb lg-o2"></div>
    <div class="lg-grain"></div>

    <!-- LEFT BRAND PANEL -->
    <div class="lg-left">
        <div class="lg-tagline">Admin Studio</div>
        <div class="lg-brand">THE<br>CINE<br><span>CAFFE</span></div>
        <div class="lg-stats">
            <?php foreach ([['300+', 'Campaigns'], ['32%', 'OTT Releases'], ['12M+', 'Reached']] as $s): ?>
                <div class="lg-stat">
                    <div class="lg-stat-n"><?= $s[0] ?></div>
                    <div class="lg-stat-l"><?= $s[1] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="lg-vert">Cinema · Culture · Commerce</div>
    </div>

    <!-- RIGHT FORM PANEL -->
    <div class="lg-right">
        <div class="lg-form-wrap">
            <div class="lg-form-eyebrow">Secure Access</div>
            <h1 class="lg-form-h">SIGN <span>IN</span></h1>

            <?php if (!empty($error)): ?>
                <div class="lg-error"><span style="font-size:16px;flex-shrink:0">⚠</span><?= htmlspecialchars($error) ?>
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

                <button type="submit" class="lg-btn">SIGN IN &rarr;</button>
            </form>

            <div class="lg-divider"></div>
            <p class="lg-footer-txt">&copy; <?= date('Y') ?> The Cine Caffe. All rights reserved.</p>
        </div>
    </div>
</body>

</html>