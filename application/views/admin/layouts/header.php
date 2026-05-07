<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($site_title) ? htmlspecialchars($site_title) : 'The Cine Cafe' ?> — Admin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    cc: {
                        gold: '#C9A84C',
                        ivory: '#F5F0E8',
                        noir: '#0A0A0F',
                        card: '#1A1A26'
                    }
                }
            }
        }
    }
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    :root {
        --bg: #0A0A0F;
        --sidebar: #12121A;
        --card: #1A1A26;
        --border: rgba(255, 255, 255, 0.06);
        --gold: #C9A84C;
        --ivory: #F5F0E8;
        --muted: rgba(245, 240, 232, 0.38);
        --danger: #E8836A;
        --green: #6BAF8D;
        --sidebar-w: 236px;
        --font-d: 'Cormorant Garamond', Georgia, serif;
        --font-b: 'DM Sans', system-ui, sans-serif;
    }

    html {
        font-size: 15px;
        -webkit-text-size-adjust: 100%;
    }

    body {
        background: var(--bg);
        color: var(--ivory);
        font-family: var(--font-b);
        min-height: 100vh;
        overflow-x: hidden;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    button {
        font-family: inherit;
    }

    ::-webkit-scrollbar {
        width: 3px;
        height: 3px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--gold);
        border-radius: 2px;
    }

    #cc-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .7);
        z-index: 99;
        backdrop-filter: blur(2px);
    }

    #cc-overlay.show {
        display: block;
    }

    /* SIDEBAR */
    #cc-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: var(--sidebar-w);
        background: var(--sidebar);
        border-right: 1px solid var(--border);
        display: flex;
        flex-direction: column;
        z-index: 100;
        overflow-y: auto;
        overflow-x: hidden;
        transition: transform .28s cubic-bezier(.4, 0, .2, 1);
    }

    @media(max-width:768px) {
        #cc-sidebar {
            transform: translateX(-100%);
            box-shadow: 4px 0 32px rgba(0, 0, 0, .7);
        }

        #cc-sidebar.open {
            transform: translateX(0);
        }
    }

    .sb-brand {
        padding: 20px 18px 16px;
        border-bottom: 1px solid var(--border);
        flex-shrink: 0;
    }

    .sb-brand-logo {
        font-family: var(--font-d);
        font-size: 20px;
        font-weight: 300;
        font-style: italic;
        letter-spacing: .1em;
        color: var(--ivory);
        line-height: 1;
    }

    .sb-brand-logo span {
        color: var(--gold);
    }

    .sb-brand-sub {
        font-size: 9px;
        color: var(--muted);
        letter-spacing: .22em;
        text-transform: uppercase;
        margin-top: 4px;
    }

    .sb-nav {
        flex: 1;
        padding: 10px 8px;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 10px 12px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 400;
        color: var(--muted);
        transition: background .18s, color .18s;
        white-space: nowrap;
        min-height: 42px;
        border: none;
        background: none;
        cursor: pointer;
        letter-spacing: .02em;
    }

    .sidebar-link i {
        width: 16px;
        flex-shrink: 0;
        font-size: 12px;
        text-align: center;
    }

    .sidebar-link:hover {
        background: rgba(201, 168, 76, .07);
        color: var(--gold);
    }

    .sidebar-link.active {
        background: rgba(201, 168, 76, .1);
        color: var(--gold);
        border-left: 2px solid var(--gold);
        padding-left: 10px;
    }

    .sidebar-link.danger {
        color: rgba(232, 131, 106, .6);
    }

    .sidebar-link.danger:hover {
        background: rgba(232, 131, 106, .07);
        color: var(--danger);
    }

    .sb-footer {
        padding: 10px 8px;
        border-top: 1px solid var(--border);
        flex-shrink: 0;
    }

    .sb-user {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 12px;
        margin-bottom: 4px;
    }

    .sb-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: 1px solid rgba(201, 168, 76, .4);
        color: var(--gold);
        font-family: var(--font-d);
        font-style: italic;
        font-weight: 400;
        font-size: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .sb-username {
        font-size: 13px;
        font-weight: 500;
        line-height: 1.2;
        letter-spacing: .02em;
    }

    .sb-role {
        font-size: 10px;
        color: var(--muted);
        letter-spacing: .08em;
    }

    /* MAIN */
    #cc-main {
        margin-left: var(--sidebar-w);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    @media(max-width:768px) {
        #cc-main {
            margin-left: 0;
        }
    }

    /* TOPBAR */
    #cc-topbar {
        position: sticky;
        top: 0;
        z-index: 50;
        height: 54px;
        background: rgba(10, 10, 15, .97);
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        padding: 0 20px;
        gap: 14px;
        backdrop-filter: blur(16px);
        flex-shrink: 0;
    }

    #cc-menu-btn {
        display: none;
        background: none;
        border: 1px solid var(--border);
        cursor: pointer;
        padding: 0;
        width: 36px;
        height: 36px;
        border-radius: 6px;
        color: var(--ivory);
        font-size: 14px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: background .18s;
    }

    #cc-menu-btn:hover {
        background: rgba(255, 255, 255, .05);
    }

    @media(max-width:768px) {
        #cc-menu-btn {
            display: flex;
        }
    }

    .topbar-title {
        flex: 1;
        font-size: 13px;
        font-weight: 400;
        color: var(--muted);
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        letter-spacing: .03em;
    }

    .topbar-date {
        font-size: 10px;
        color: rgba(245, 240, 232, .18);
        white-space: nowrap;
        flex-shrink: 0;
        letter-spacing: .06em;
    }

    @media(max-width:480px) {
        .topbar-date {
            display: none;
        }
    }

    /* CONTENT */
    #cc-content {
        flex: 1;
        padding: 24px 20px;
        width: 100%;
        max-width: 1400px;
    }

    @media(max-width:640px) {
        #cc-content {
            padding: 16px 12px;
        }
    }

    /* FLASH */
    .flash-msg,
    .flash-success {
        background: rgba(107, 175, 141, .1);
        border: 1px solid rgba(107, 175, 141, .22);
        color: var(--green);
        padding: 11px 14px;
        border-radius: 6px;
        margin-bottom: 18px;
        font-size: 13px;
        display: flex;
        align-items: flex-start;
        gap: 8px;
    }

    .flash-error {
        background: rgba(232, 131, 106, .09);
        border: 1px solid rgba(232, 131, 106, .22);
        color: var(--danger);
        padding: 11px 14px;
        border-radius: 6px;
        margin-bottom: 18px;
        font-size: 13px;
    }

    /* CARDS */
    .card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 10px;
    }

    .card-pad {
        padding: 20px;
    }

    @media(max-width:480px) {
        .card-pad {
            padding: 14px;
        }
    }

    /* FORMS */
    label {
        display: block;
        font-size: 10px;
        font-weight: 600;
        color: var(--muted);
        text-transform: uppercase;
        letter-spacing: .1em;
        margin-bottom: 7px;
    }

    input[type="text"],
    input[type="email"],
    input[type="url"],
    input[type="tel"],
    input[type="password"],
    input[type="number"],
    select,
    textarea {
        background: #0A0A0F;
        border: 1px solid rgba(255, 255, 255, .1);
        color: var(--ivory);
        border-radius: 6px;
        padding: 10px 13px;
        width: 100%;
        font-size: 14px;
        font-family: var(--font-b);
        outline: none;
        transition: border-color .2s, box-shadow .2s;
        -webkit-appearance: none;
        appearance: none;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(201, 168, 76, .09);
    }

    input::placeholder,
    textarea::placeholder {
        color: rgba(245, 240, 232, .18);
    }

    select option {
        background: #1A1A26;
    }

    input[type="file"] {
        padding: 8px;
        cursor: pointer;
        font-size: 13px;
        color: var(--muted);
        border-style: dashed;
    }

    textarea {
        resize: vertical;
        min-height: 90px;
        line-height: 1.65;
    }

    .space-y>*+* {
        margin-top: 16px;
    }

    /* BUTTONS */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        background: var(--gold);
        color: var(--bg);
        font-weight: 600;
        font-size: 13px;
        padding: 10px 18px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: filter .18s, transform .15s, box-shadow .18s;
        white-space: nowrap;
        text-decoration: none;
        min-height: 40px;
        letter-spacing: .03em;
    }

    .btn-primary:hover {
        filter: brightness(1.1);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(201, 168, 76, .28);
    }

    .btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: rgba(255, 255, 255, .04);
        color: var(--ivory);
        border: 1px solid rgba(255, 255, 255, .09);
        font-size: 12px;
        font-weight: 400;
        padding: 7px 13px;
        border-radius: 6px;
        cursor: pointer;
        transition: background .18s;
        text-decoration: none;
        white-space: nowrap;
        min-height: 36px;
        letter-spacing: .02em;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, .09);
    }

    .btn-danger {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: rgba(232, 131, 106, .07);
        color: var(--danger);
        border: 1px solid rgba(232, 131, 106, .2);
        font-size: 12px;
        font-weight: 400;
        padding: 7px 13px;
        border-radius: 6px;
        cursor: pointer;
        transition: background .18s;
        text-decoration: none;
        white-space: nowrap;
        min-height: 36px;
    }

    .btn-danger:hover {
        background: rgba(232, 131, 106, .15);
    }

    /* BADGES */
    .badge-active {
        display: inline-block;
        background: rgba(107, 175, 141, .1);
        color: var(--green);
        border: 1px solid rgba(107, 175, 141, .22);
        font-size: 10px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        white-space: nowrap;
        letter-spacing: .06em;
    }

    .badge-inactive {
        display: inline-block;
        background: rgba(232, 131, 106, .09);
        color: var(--danger);
        border: 1px solid rgba(232, 131, 106, .18);
        font-size: 10px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        white-space: nowrap;
        letter-spacing: .06em;
    }

    /* TABLE */
    .table-wrap {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
        min-width: 540px;
    }

    thead tr {
        border-bottom: 1px solid var(--border);
    }

    th {
        text-align: left;
        padding: 11px 13px;
        font-size: 9px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .12em;
        color: rgba(245, 240, 232, .28);
        white-space: nowrap;
    }

    td {
        padding: 11px 13px;
        border-bottom: 1px solid rgba(255, 255, 255, .03);
        vertical-align: middle;
    }

    tr:hover td {
        background: rgba(255, 255, 255, .018);
    }

    tr:last-child td {
        border-bottom: none;
    }

    .action-row {
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    /* PAGE HEADER */
    .page-hdr {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .page-hdr-title {
        font-size: 20px;
        font-weight: 600;
        color: var(--ivory);
        line-height: 1.2;
        letter-spacing: .01em;
    }

    .page-hdr-sub {
        font-size: 12px;
        color: var(--muted);
        margin-top: 4px;
        letter-spacing: .02em;
    }

    /* GRIDS */
    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    @media(max-width:600px) {
        .grid-2 {
            grid-template-columns: 1fr;
        }
    }

    .grid-3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
    }

    @media(max-width:860px) {
        .grid-3 {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media(max-width:480px) {
        .grid-3 {
            grid-template-columns: 1fr;
        }
    }

    .grid-form {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 18px;
        align-items: start;
    }

    @media(max-width:960px) {
        .grid-form {
            grid-template-columns: 1fr 260px;
        }
    }

    @media(max-width:720px) {
        .grid-form {
            grid-template-columns: 1fr;
        }
    }

    .grid-settings {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    @media(max-width:768px) {
        .grid-settings {
            grid-template-columns: 1fr;
        }
    }

    .grid-mini {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    @media(max-width:400px) {
        .grid-mini {
            grid-template-columns: 1fr;
        }
    }

    .grid-enquiry {
        display: grid;
        grid-template-columns: 1fr 290px;
        gap: 18px;
        align-items: start;
    }

    @media(max-width:860px) {
        .grid-enquiry {
            grid-template-columns: 1fr;
        }
    }

    /* CKEDITOR DARK */
    .ck.ck-editor__editable,
    .ck.ck-editor__editable_inline,
    .ck-blurred.ck-editor__editable,
    .ck-focused.ck-editor__editable {
        background: #0A0A0F !important;
        color: var(--ivory) !important;
        border-color: rgba(255, 255, 255, .1) !important;
        min-height: 340px;
        caret-color: var(--gold);
    }

    .ck.ck-editor__editable.ck-focused {
        border-color: var(--gold) !important;
        box-shadow: 0 0 0 3px rgba(201, 168, 76, .1) !important;
    }

    .ck.ck-toolbar {
        background: #1A1A26 !important;
        border-color: rgba(255, 255, 255, .08) !important;
    }

    .ck.ck-toolbar__separator {
        background: rgba(255, 255, 255, .08) !important;
    }

    .ck.ck-button,
    .ck.ck-button.ck-off {
        color: rgba(245, 240, 232, .65) !important;
        background: transparent !important;
    }

    .ck.ck-button:hover:not(.ck-disabled),
    .ck.ck-button.ck-on {
        background: rgba(201, 168, 76, .1) !important;
        color: var(--gold) !important;
    }

    .ck.ck-dropdown__panel,
    .ck.ck-list,
    .ck.ck-balloon-panel,
    .ck.ck-dropdown__panel .ck-list {
        background: #1e1e2e !important;
        border-color: rgba(255, 255, 255, .08) !important;
    }

    .ck.ck-list__item .ck-button {
        color: rgba(245, 240, 232, .72) !important;
    }

    .ck.ck-list__item .ck-button:hover,
    .ck.ck-list__item .ck-button.ck-on {
        background: rgba(201, 168, 76, .1) !important;
        color: var(--gold) !important;
    }

    .ck.ck-input-text,
    .ck.ck-input {
        background: #0A0A0F !important;
        color: var(--ivory) !important;
        border-color: rgba(255, 255, 255, .12) !important;
    }

    .ck.ck-input-text:focus,
    .ck.ck-input:focus {
        border-color: var(--gold) !important;
    }

    .ck.ck-label,
    .ck.ck-labeled-field-view__label {
        color: rgba(245, 240, 232, .45) !important;
    }

    .ck-content,
    .ck-content p {
        color: var(--ivory);
        margin-bottom: 1em;
    }

    .ck-content h1,
    .ck-content h2,
    .ck-content h3 {
        color: var(--ivory);
        margin: 1.4em 0 .5em;
    }

    .ck-content a {
        color: var(--gold);
    }

    .ck-content strong {
        color: #fff;
    }

    .ck-content blockquote {
        border-left: 2px solid var(--gold);
        padding-left: 1em;
        color: rgba(245, 240, 232, .5);
        font-style: italic;
        margin: 28px 0;
    }

    .ck-content code,
    .ck-content pre {
        background: #050508;
        color: var(--gold);
        border-radius: 4px;
        padding: 2px 6px;
    }

    .ck.ck-balloon-panel {
        z-index: 9999 !important;
    }
    </style>
</head>

<body>
    <div id="cc-overlay" onclick="ccCloseSidebar()"></div>

    <!-- SIDEBAR -->
    <aside id="cc-sidebar" role="navigation" aria-label="Admin navigation">
        <div class="sb-brand">
            <div class="sb-brand-logo">The Cine <span>Cafe</span></div>
            <div class="sb-brand-sub">Admin Studio</div>
        </div>
        <nav class="sb-nav">
            <?php $uri = uri_string(); ?>
            <a href="<?= base_url('admin/dashboard') ?>"
                class="sidebar-link <?= (strpos($uri, 'dashboard') !== FALSE || $uri === 'admin') ? 'active' : '' ?>">
                <i class="fa fa-home"></i> Dashboard
            </a>
            <a href="<?= base_url('admin/posts') ?>"
                class="sidebar-link <?= strpos($uri, 'posts') !== FALSE ? 'active' : '' ?>">
                <i class="fa fa-film"></i> Posts / Campaigns
            </a>
            <a href="<?= base_url('admin/enquiries') ?>"
                class="sidebar-link <?= strpos($uri, 'enquiries') !== FALSE ? 'active' : '' ?>">
                <i class="fa fa-envelope"></i> Enquiries
            </a>
            <a href="<?= base_url('admin/settings') ?>"
                class="sidebar-link <?= strpos($uri, 'settings') !== FALSE ? 'active' : '' ?>">
                <i class="fa fa-cog"></i> Settings
            </a>
            <a href="<?= base_url() ?>" target="_blank" rel="noopener" class="sidebar-link">
                <i class="fa fa-arrow-up-right-from-square"></i> View Site
            </a>
        </nav>
        <div class="sb-footer">
            <div class="sb-user">
                <div class="sb-avatar">
                    <?= strtoupper(substr($this->session->userdata('admin_username') ?? 'A', 0, 1)) ?></div>
                <div>
                    <div class="sb-username">
                        <?= htmlspecialchars($this->session->userdata('admin_username') ?? 'Admin') ?></div>
                    <div class="sb-role">Administrator</div>
                </div>
            </div>
            <a href="<?= base_url('admin/logout') ?>" class="sidebar-link danger">
                <i class="fa fa-right-from-bracket"></i> Logout
            </a>
        </div>
    </aside>

    <!-- MAIN -->
    <div id="cc-main">
        <header id="cc-topbar">
            <button id="cc-menu-btn" onclick="ccToggleSidebar()" aria-label="Toggle sidebar" aria-expanded="false">
                <i class="fa fa-bars" id="cc-menu-icon"></i>
            </button>
            <span class="topbar-title">
                <?= isset($site_title) ? htmlspecialchars($site_title) . ' — Admin' : 'The Cine Cafe Admin' ?>
            </span>
            <span class="topbar-date"><?= date('D, d M Y') ?></span>
        </header>

        <div id="cc-content">
            <?php if ($flash = $this->session->flashdata('msg')): ?>
            <div class="flash-msg"><i class="fa fa-circle-check"></i> <?= htmlspecialchars($flash) ?></div>
            <?php endif; ?>
            <?php if ($flash = $this->session->flashdata('success')): ?>
            <div class="flash-success"><i class="fa fa-circle-check"></i> <?= htmlspecialchars($flash) ?></div>
            <?php endif; ?>
            <?php if ($flash = $this->session->flashdata('error')): ?>
            <div class="flash-error"><?= $flash ?></div>
            <?php endif; ?>
            <?php if ($flash = $this->session->flashdata('upload_error')): ?>
            <div class="flash-error">Upload error: <?= htmlspecialchars($flash) ?></div>
            <?php endif; ?>