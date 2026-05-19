<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($site_title) ? htmlspecialchars($site_title) : 'The Cine Caffe' ?> — Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow+Condensed:wght@400;600;700&family=Barlow:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        /* ================================================================
       ADMIN DESIGN SYSTEM — Premium Clean Dark
    ================================================================ */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        :root {
            --bg: #0C0C14;
            --sidebar: #0F0F1A;
            --card: #161624;
            --card-2: #1C1C2E;
            --border: rgba(255, 255, 255, .07);
            --border-2: rgba(255, 255, 255, .04);
            --gold: #C9A84C;
            --gold-2: #E8A820;
            --ivory: #F5F0E8;
            --muted: rgba(245, 240, 232, .38);
            --muted-2: rgba(245, 240, 232, .22);
            --danger: #E8836A;
            --green: #6BAF8D;
            --sidebar-w: 248px;
            --f-d: 'Bebas Neue', Impact, sans-serif;
            --f-c: 'Barlow Condensed', 'Arial Narrow', sans-serif;
            --f-b: 'Barlow', system-ui, sans-serif;
            --ease: cubic-bezier(.16, 1, .3, 1);
            --t1: .15s;
            --t2: .28s;
        }

        html {
            font-size: 15px;
            -webkit-font-smoothing: antialiased;
        }

        body {
            background: var(--bg);
            color: var(--ivory);
            font-family: var(--f-b);
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

        /* ── OVERLAY (mobile) ── */
        #cc-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .72);
            z-index: 99;
            backdrop-filter: blur(3px);
        }

        #cc-overlay.show {
            display: block;
        }

        /* ── SIDEBAR ── */
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
            transition: transform .28s var(--ease);
        }

        @media(max-width:768px) {
            #cc-sidebar {
                transform: translateX(-100%);
                box-shadow: 4px 0 40px rgba(0, 0, 0, .8);
            }

            #cc-sidebar.open {
                transform: translateX(0);
            }
        }

        /* brand */
        .sb-brand {
            padding: 24px 20px 20px;
            border-bottom: 1px solid var(--border);
            flex-shrink: 0;
        }

        .sb-brand-name {
            font-family: var(--f-d);
            font-size: 22px;
            letter-spacing: .12em;
            color: var(--ivory);
            line-height: 1;
            display: flex;
            align-items: baseline;
            gap: 0;
        }

        .sb-brand-name span {
            color: var(--gold);
        }

        .sb-brand-sub {
            font-family: var(--f-c);
            font-size: 8.5px;
            font-weight: 700;
            letter-spacing: .28em;
            text-transform: uppercase;
            color: var(--muted-2);
            margin-top: 5px;
        }

        .sb-brand-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--gold);
            display: inline-block;
            margin-right: 8px;
            animation: sb-pulse 2.4s ease-in-out infinite;
        }

        @keyframes sb-pulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(201, 168, 76, .4)
            }

            50% {
                box-shadow: 0 0 0 5px rgba(201, 168, 76, 0)
            }
        }

        /* nav */
        .sb-nav {
            flex: 1;
            padding: 10px 10px;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .sb-section-lbl {
            font-family: var(--f-c);
            font-size: 8.5px;
            font-weight: 700;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: rgba(245, 240, 232, .15);
            padding: 14px 10px 6px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 12px;
            border-radius: 6px;
            font-size: 13.5px;
            font-weight: 400;
            color: var(--muted);
            transition: background var(--t1), color var(--t1);
            border: none;
            background: none;
            cursor: pointer;
            white-space: nowrap;
            letter-spacing: .01em;
        }

        .sidebar-link i {
            width: 16px;
            flex-shrink: 0;
            font-size: 12px;
            text-align: center;
            transition: color var(--t1);
        }

        .sidebar-link:hover {
            background: rgba(201, 168, 76, .07);
            color: var(--gold);
        }

        .sidebar-link.active {
            background: rgba(201, 168, 76, .1);
            color: var(--gold);
            border-left: 2.5px solid var(--gold);
            padding-left: 10px;
        }

        .sidebar-link.active i {
            color: var(--gold);
        }

        .sidebar-link.danger {
            color: rgba(232, 131, 106, .55);
        }

        .sidebar-link.danger:hover {
            background: rgba(232, 131, 106, .07);
            color: var(--danger);
        }

        /* sb footer */
        .sb-footer {
            padding: 10px 10px;
            border-top: 1px solid var(--border);
            flex-shrink: 0;
        }

        .sb-user {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            margin-bottom: 4px;
        }

        .sb-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1.5px solid rgba(201, 168, 76, .36);
            color: var(--gold);
            font-family: var(--f-d);
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: rgba(201, 168, 76, .06);
        }

        .sb-username {
            font-size: 13.5px;
            font-weight: 600;
            line-height: 1.25;
            letter-spacing: .01em;
        }

        .sb-role {
            font-family: var(--f-c);
            font-size: 9px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--muted-2);
            margin-top: 2px;
        }

        /* ── MAIN ── */
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

        /* ── TOPBAR ── */
        #cc-topbar {
            position: sticky;
            top: 0;
            z-index: 50;
            height: 58px;
            background: rgba(12, 12, 20, .97);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            padding: 0 22px;
            gap: 14px;
            backdrop-filter: blur(18px);
            flex-shrink: 0;
        }

        #cc-menu-btn {
            display: none;
            background: none;
            border: 1px solid var(--border);
            cursor: pointer;
            width: 36px;
            height: 36px;
            border-radius: 6px;
            color: var(--ivory);
            font-size: 14px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: background var(--t1);
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
            letter-spacing: .02em;
        }

        .topbar-date {
            font-family: var(--f-c);
            font-size: 10px;
            color: rgba(245, 240, 232, .2);
            white-space: nowrap;
            flex-shrink: 0;
            letter-spacing: .08em;
        }

        @media(max-width:480px) {
            .topbar-date {
                display: none;
            }
        }

        /* ── CONTENT AREA ── */
        #cc-content {
            flex: 1;
            padding: 26px 22px;
            width: 100%;
            max-width: 1400px;
        }

        @media(max-width:640px) {
            #cc-content {
                padding: 16px 14px;
            }
        }

        /* ── FLASH ── */
        .flash-msg,
        .flash-success {
            background: rgba(107, 175, 141, .09);
            border: 1px solid rgba(107, 175, 141, .2);
            color: var(--green);
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 13px;
            display: flex;
            align-items: flex-start;
            gap: 9px;
        }

        .flash-error {
            background: rgba(232, 131, 106, .09);
            border: 1px solid rgba(232, 131, 106, .2);
            color: var(--danger);
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        /* ── CARDS ── */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 8px;
        }

        .card-pad {
            padding: 20px;
        }

        @media(max-width:480px) {
            .card-pad {
                padding: 14px;
            }
        }

        /* ── FORMS ── */
        label {
            display: block;
            font-family: var(--f-c);
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="url"],
        input[type="tel"],
        input[type="password"],
        input[type="number"],
        select,
        textarea {
            background: #0A0A12;
            border: 1px solid rgba(255, 255, 255, .1);
            color: var(--ivory);
            border-radius: 6px;
            padding: 11px 14px;
            width: 100%;
            font-size: 14px;
            font-family: var(--f-b);
            outline: none;
            transition: border-color .2s, box-shadow .2s;
            -webkit-appearance: none;
            appearance: none;
            line-height: 1.5;
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
            background: #1a1a26;
        }

        input[type="file"] {
            padding: 9px;
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

        /* ── BUTTONS ── */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            background: var(--gold);
            color: #0A0A0F;
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
            letter-spacing: .02em;
        }

        .btn-primary:hover {
            filter: brightness(1.1);
            transform: translateY(-1px);
            box-shadow: 0 6px 22px rgba(201, 168, 76, .3);
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
            padding: 7px 13px;
            border-radius: 6px;
            cursor: pointer;
            transition: background .18s;
            text-decoration: none;
            white-space: nowrap;
            min-height: 36px;
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
            border: 1px solid rgba(232, 131, 106, .18);
            font-size: 12px;
            padding: 7px 13px;
            border-radius: 6px;
            cursor: pointer;
            transition: background .18s;
            text-decoration: none;
            white-space: nowrap;
            min-height: 36px;
        }

        .btn-danger:hover {
            background: rgba(232, 131, 106, .14);
        }

        /* ── BADGES ── */
        .badge-active {
            display: inline-block;
            background: rgba(107, 175, 141, .1);
            color: var(--green);
            border: 1px solid rgba(107, 175, 141, .2);
            font-family: var(--f-c);
            font-size: 10px;
            font-weight: 700;
            padding: 3px 11px;
            border-radius: 20px;
            white-space: nowrap;
            letter-spacing: .06em;
        }

        .badge-inactive {
            display: inline-block;
            background: rgba(232, 131, 106, .09);
            color: var(--danger);
            border: 1px solid rgba(232, 131, 106, .18);
            font-family: var(--f-c);
            font-size: 10px;
            font-weight: 700;
            padding: 3px 11px;
            border-radius: 20px;
            white-space: nowrap;
            letter-spacing: .06em;
        }

        /* ── TABLE ── */
        .table-wrap {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13.5px;
            min-width: 540px;
        }

        thead tr {
            border-bottom: 1px solid var(--border);
        }

        th {
            text-align: left;
            padding: 11px 14px;
            font-family: var(--f-c);
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .14em;
            color: rgba(245, 240, 232, .28);
            white-space: nowrap;
        }

        td {
            padding: 12px 14px;
            border-bottom: 1px solid var(--border-2);
            vertical-align: middle;
        }

        tr:hover td {
            background: rgba(255, 255, 255, .016);
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

        /* ── PAGE HEADER ── */
        .page-hdr {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 22px;
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
            font-size: 13px;
            color: var(--muted);
            margin-top: 4px;
            letter-spacing: .01em;
        }

        /* ── GRIDS ── */
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
            grid-template-columns: 1fr 308px;
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
            grid-template-columns: 1fr 300px;
            gap: 18px;
            align-items: start;
        }

        @media(max-width:860px) {
            .grid-enquiry {
                grid-template-columns: 1fr;
            }
        }

        /* ── CKEDITOR DARK THEME ── */
        .ck.ck-editor__editable,
        .ck.ck-editor__editable_inline {
            background: #0A0A12 !important;
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
            background: #1a1a28 !important;
            border-color: rgba(255, 255, 255, .08) !important;
        }

        .ck.ck-toolbar__separator {
            background: rgba(255, 255, 255, .07) !important;
        }

        .ck.ck-button,
        .ck.ck-button.ck-off {
            color: rgba(245, 240, 232, .62) !important;
            background: transparent !important;
        }

        .ck.ck-button:hover:not(.ck-disabled),
        .ck.ck-button.ck-on {
            background: rgba(201, 168, 76, .1) !important;
            color: var(--gold) !important;
        }

        .ck.ck-dropdown__panel,
        .ck.ck-list,
        .ck.ck-balloon-panel {
            background: #1e1e30 !important;
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
            background: #0A0A12 !important;
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
            background: #050510;
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
            <div class="sb-brand-name">
                <span class="sb-brand-dot"></span>CINE <span>CAFFE</span>
            </div>
            <div class="sb-brand-sub">Admin Studio</div>
        </div>

        <nav class="sb-nav">
            <?php $uri = uri_string(); ?>
            <span class="sb-section-lbl">Main</span>
            <a href="<?= base_url('admin/dashboard') ?>"
                class="sidebar-link <?= (strpos($uri, 'dashboard') !== FALSE || $uri === 'admin') ? 'active' : '' ?>">
                <i class="fa fa-home"></i> Dashboard
            </a>
            <a href="<?= base_url('admin/posts') ?>"
                class="sidebar-link <?= strpos($uri, 'posts') !== FALSE ? 'active' : '' ?>">
                <i class="fa fa-film"></i> Posts &amp; Campaigns
            </a>
            <a href="<?= base_url('admin/enquiries') ?>"
                class="sidebar-link <?= strpos($uri, 'enquiries') !== FALSE ? 'active' : '' ?>">
                <i class="fa fa-envelope"></i> Enquiries
            </a>
            <span class="sb-section-lbl" style="margin-top:6px">System</span>
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
                <div class="sb-avatar"><?= strtoupper(substr($this->session->userdata('admin_username') ?? 'A', 0, 1)) ?>
                </div>
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
            <span
                class="topbar-title"><?= isset($site_title) ? htmlspecialchars($site_title) . ' — Admin' : 'The Cine Caffe Admin' ?></span>
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