<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>The Cine Caffe — Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0
    }

    :root {
        --gold: #C9A84C;
        --rose: #E8836A;
        --noir: #0A0A0F;
        --ink: #12121A;
        --card: #1A1A26;
        --ivory: #F5F0E8;
        --smoke: #6B6878;
        --border: #242435;
        --font-d: 'Cormorant Garamond', Georgia, serif;
        --font-b: 'DM Sans', system-ui, sans-serif;
    }

    body {
        background: var(--noir);
        font-family: var(--font-b);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden
    }

    /* Animated grid */
    .bg-grid {
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 0;
        background-image: linear-gradient(rgba(201, 168, 76, .04) 1px, transparent 1px),
            linear-gradient(90deg, rgba(201, 168, 76, .04) 1px, transparent 1px);
        background-size: 60px 60px
    }

    /* Ambient orb */
    .glow {
        position: fixed;
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(201, 168, 76, .06) 0%, transparent 70%);
        pointer-events: none;
        z-index: 0
    }

    /* Grain */
    .grain {
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 0;
        opacity: .018;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.95' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E")
    }

    /* Card */
    .card {
        background: var(--card);
        border: 1px solid rgba(255, 255, 255, .06);
        border-radius: 16px;
        padding: 44px 40px;
        width: 100%;
        max-width: 400px;
        position: relative;
        z-index: 1;
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 32px;
        right: 32px;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--gold), transparent);
        opacity: .5;
        border-radius: 1px;
    }

    /* Inputs */
    .cc-input {
        width: 100%;
        background: #0A0A0F;
        border: 1px solid rgba(255, 255, 255, .1);
        color: var(--ivory);
        border-radius: 8px;
        padding: 13px 16px;
        font-size: 14px;
        font-family: var(--font-b);
        outline: none;
        transition: border-color .2s, box-shadow .2s;
    }

    .cc-input:focus {
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(201, 168, 76, .08)
    }

    .cc-input::placeholder {
        color: rgba(245, 240, 232, .2)
    }

    label {
        display: block;
        font-size: 10px;
        font-weight: 600;
        color: rgba(245, 240, 232, .35);
        text-transform: uppercase;
        letter-spacing: .14em;
        margin-bottom: 9px;
    }

    /* Submit button */
    .btn-login {
        width: 100%;
        background: linear-gradient(135deg, var(--gold), var(--rose));
        color: var(--noir);
        font-weight: 700;
        font-size: 13px;
        letter-spacing: .1em;
        text-transform: uppercase;
        padding: 15px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all .2s;
        font-family: var(--font-b);
    }

    .btn-login:hover {
        filter: brightness(1.08);
        transform: translateY(-1px);
        box-shadow: 0 10px 28px rgba(201, 168, 76, .3)
    }

    /* Error */
    .error-box {
        background: rgba(232, 131, 106, .08);
        border: 1px solid rgba(232, 131, 106, .22);
        color: #e8836a;
        border-radius: 8px;
        padding: 12px 15px;
        font-size: 13px;
        margin-bottom: 22px;
        display: flex;
        align-items: flex-start;
        gap: 8px;
    }

    /* Divider */
    .divider {
        height: 1px;
        background: var(--border);
        margin: 24px 0
    }
    </style>
</head>

<body>

    <div class="bg-grid"></div>
    <div class="glow"></div>
    <div class="grain"></div>

    <div class="card">

        <!-- Logo mark -->
        <div style="text-align:center;margin-bottom:36px">
            <div
                style="width:52px;height:52px;border:1px solid rgba(201,168,76,.4);border-radius:50%;margin:0 auto 14px;display:flex;align-items:center;justify-content:center">
                <span style="font-family:var(--font-d);font-size:22px;font-style:italic;color:var(--gold)">C</span>
            </div>
            <div
                style="font-family:var(--font-d);font-size:28px;font-weight:300;font-style:italic;color:var(--ivory);letter-spacing:.06em;line-height:1">
                The Cine <span style="color:var(--gold)">Caffe</span>
            </div>
            <div
                style="font-size:9px;color:rgba(245,240,232,.22);letter-spacing:.28em;text-transform:uppercase;margin-top:6px">
                Admin Studio</div>
        </div>

        <?php if (!empty($error)): ?>
        <div class="error-box">
            <span style="font-size:14px;flex-shrink:0">⚠</span>
            <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('admin/login') ?>">
            <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

            <div style="margin-bottom:18px">
                <label>Username</label>
                <input type="text" name="username" class="cc-input" placeholder="admin"
                    value="<?= set_value('username') ?>" autocomplete="username">
            </div>

            <div style="margin-bottom:30px">
                <label>Password</label>
                <input type="password" name="password" class="cc-input" placeholder="••••••••"
                    autocomplete="current-password">
            </div>

            <button type="submit" class="btn-login">Sign In →</button>
        </form>

        <div class="divider"></div>
        <p style="text-align:center;font-size:11px;color:rgba(245,240,232,.15);letter-spacing:.05em">
            © <?= date('Y') ?> The Cine Caffe. All rights reserved.
        </p>
    </div>

</body>

</html>