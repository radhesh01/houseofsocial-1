<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($site_title) ? htmlspecialchars($site_title) : 'HouseOfSocial' ?> — Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
    /* ================================================================
   HOUSEOFSOCIAL ADMIN — Design System
   Minimal, clean, dark, efficient.
================================================================ */
    :root {
        --ink: #08080C;
        --s0: #08080C;
        --s1: #0E0E16;
        --s2: #141420;
        --s3: #1A1A28;
        --s4: #202030;
        --paper: #F4F1EC;
        --chalk: #E0DDD6;
        --smoke: #9896A0;
        --b1: rgba(244, 241, 236, .06);
        --b2: rgba(244, 241, 236, .12);
        --b3: rgba(244, 241, 236, .22);
        --g1: rgba(244, 241, 236, .06);
        --g2: rgba(244, 241, 236, .14);
        --g3: rgba(244, 241, 236, .36);
        --g4: rgba(244, 241, 236, .56);
        --g5: rgba(244, 241, 236, .78);
        --flame: #FF3C00;
        --lime: #C8F135;
        --green: #4ade80;
        --red: #f87171;
        --fh: 'Syne', sans-serif;
        --fb: 'Satoshi', 'DM Sans', system-ui, sans-serif;
        --ease: cubic-bezier(.19, 1, .22, 1);
        --sbW: 240px;
        --topH: 56px;
        --px: 22px;
        --r: 6px;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html {
        font-size: 15px;
        -webkit-font-smoothing: antialiased;
    }

    body {
        background: var(--s0);
        color: var(--paper);
        font-family: var(--fb);
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
        cursor: pointer;
    }

    ::-webkit-scrollbar {
        width: 2px;
        height: 2px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--flame);
    }

    /* ── OVERLAY ── */
    #a-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .65);
        z-index: 98;
        backdrop-filter: blur(2px);
    }

    #a-overlay.show {
        display: block;
    }

    /* ── SIDEBAR ── */
    #a-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: var(--sbW);
        background: var(--s1);
        border-right: 1px solid var(--b1);
        display: flex;
        flex-direction: column;
        z-index: 100;
        overflow-y: auto;
        overflow-x: hidden;
        transition: transform .28s var(--ease);
    }

    @media(max-width:768px) {
        #a-sidebar {
            transform: translateX(-100%);
            box-shadow: 4px 0 40px rgba(0, 0, 0, .8);
        }

        #a-sidebar.open {
            transform: translateX(0);
        }
    }

    /* Brand */
    .a-brand {
        padding: 22px 18px 18px;
        border-bottom: 1px solid var(--b1);
        flex-shrink: 0;
    }

    .a-brand-name {
        font-family: var(--fh);
        font-size: 17px;
        font-weight: 700;
        letter-spacing: -.02em;
        color: var(--paper);
        display: flex;
        align-items: center;
        gap: 9px;
        line-height: 1;
    }

    .a-brand-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--flame);
        flex-shrink: 0;
        box-shadow: 0 0 8px var(--flame);
        animation: aDot 2.4s ease-in-out infinite;
    }

    @keyframes aDot {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(255, 60, 0, .5)
        }

        50% {
            box-shadow: 0 0 0 6px rgba(255, 60, 0, 0)
        }
    }

    .a-brand-sub {
        font-size: 9px;
        font-weight: 500;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: var(--g2);
        margin-top: 5px;
    }

    /* Nav */
    .a-nav {
        flex: 1;
        padding: 10px 10px;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .a-nav-section {
        font-size: 8.5px;
        font-weight: 600;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: rgba(244, 241, 236, .15);
        padding: 13px 10px 6px;
    }

    .a-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 11px;
        border-radius: var(--r);
        font-size: 13px;
        font-weight: 400;
        color: var(--g3);
        transition: background .15s, color .15s;
        white-space: nowrap;
        border-left: 2px solid transparent;
    }

    .a-link i {
        width: 15px;
        font-size: 12px;
        text-align: center;
        flex-shrink: 0;
    }

    .a-link:hover {
        background: rgba(255, 60, 0, .07);
        color: var(--paper);
    }

    .a-link.on {
        background: rgba(255, 60, 0, .1);
        color: var(--flame);
        border-left-color: var(--flame);
        padding-left: 9px;
    }

    .a-link.danger {
        color: rgba(248, 113, 113, .55);
    }

    .a-link.danger:hover {
        background: rgba(248, 113, 113, .07);
        color: var(--red);
    }

    /* Badge */
    .a-badge {
        margin-left: auto;
        background: rgba(255, 60, 0, .15);
        color: var(--flame);
        font-size: 10px;
        font-weight: 700;
        padding: 2px 7px;
        border-radius: 10px;
        flex-shrink: 0;
    }

    /* Footer */
    .a-sb-foot {
        padding: 10px 10px;
        border-top: 1px solid var(--b1);
        flex-shrink: 0;
    }

    .a-user {
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 9px 10px;
        margin-bottom: 4px;
    }

    .a-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: rgba(255, 60, 0, .08);
        border: 1.5px solid rgba(255, 60, 0, .3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--fh);
        font-size: 14px;
        font-weight: 700;
        color: var(--flame);
        flex-shrink: 0;
    }

    .a-username {
        font-size: 13px;
        font-weight: 600;
        line-height: 1.2;
    }

    .a-role {
        font-size: 9px;
        font-weight: 500;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: var(--g2);
        margin-top: 2px;
    }

    /* ── MAIN ── */
    #a-main {
        margin-left: var(--sbW);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    @media(max-width:768px) {
        #a-main {
            margin-left: 0;
        }
    }

    /* ── TOPBAR ── */
    #a-top {
        position: sticky;
        top: 0;
        z-index: 50;
        height: var(--topH);
        background: rgba(8, 8, 12, .97);
        border-bottom: 1px solid var(--b1);
        display: flex;
        align-items: center;
        padding: 0 var(--px);
        gap: 12px;
        backdrop-filter: blur(18px);
        flex-shrink: 0;
    }

    #a-menu-btn {
        display: none;
        background: none;
        border: 1px solid var(--b2);
        width: 34px;
        height: 34px;
        border-radius: var(--r);
        color: var(--paper);
        font-size: 13px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: background .15s;
    }

    #a-menu-btn:hover {
        background: rgba(255, 255, 255, .05);
    }

    @media(max-width:768px) {
        #a-menu-btn {
            display: flex;
        }
    }

    .a-top-title {
        flex: 1;
        font-size: 13px;
        color: var(--g3);
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .a-top-date {
        font-size: 10px;
        color: var(--g2);
        white-space: nowrap;
        flex-shrink: 0;
        letter-spacing: .06em;
    }

    @media(max-width:480px) {
        .a-top-date {
            display: none;
        }
    }

    /* ── CONTENT ── */
    #a-content {
        flex: 1;
        padding: 24px var(--px);
        width: 100%;
        max-width: 1440px;
    }

    @media(max-width:480px) {
        #a-content {
            padding: 16px 14px;
        }
    }

    /* ── FLASH ── */
    .a-flash,
    .a-flash-ok {
        padding: 11px 15px;
        border-radius: var(--r);
        margin-bottom: 18px;
        font-size: 13px;
        display: flex;
        align-items: flex-start;
        gap: 9px;
    }

    .a-flash-ok {
        background: rgba(74, 222, 128, .09);
        border: 1px solid rgba(74, 222, 128, .2);
        color: var(--green);
    }

    .a-flash-err {
        background: rgba(248, 113, 113, .09);
        border: 1px solid rgba(248, 113, 113, .2);
        color: var(--red);
    }

    /* ── CARD ── */
    .a-card {
        background: var(--s1);
        border: 1px solid var(--b1);
        border-radius: 8px;
    }

    .a-card-pad {
        padding: 20px;
    }

    @media(max-width:480px) {
        .a-card-pad {
            padding: 14px;
        }
    }

    /* ── FORMS ── */
    .a-label {
        display: block;
        font-size: 9.5px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--g3);
        margin-bottom: 8px;
    }

    .a-input {
        background: #070710;
        border: 1px solid rgba(244, 241, 236, .1);
        color: var(--paper);
        border-radius: var(--r);
        padding: 10px 13px;
        width: 100%;
        font-size: 13.5px;
        font-family: var(--fb);
        outline: none;
        transition: border-color .2s, box-shadow .2s;
        line-height: 1.5;
        -webkit-appearance: none;
        appearance: none;
    }

    .a-input:focus {
        border-color: var(--flame);
        box-shadow: 0 0 0 3px rgba(255, 60, 0, .09);
    }

    .a-input::placeholder {
        color: rgba(244, 241, 236, .18);
    }

    .a-input option {
        background: #1a1a26;
    }

    input[type="file"].a-input {
        padding: 9px;
        cursor: pointer;
        font-size: 12.5px;
        color: var(--g3);
        border-style: dashed;
    }

    textarea.a-input {
        resize: vertical;
        min-height: 88px;
        line-height: 1.65;
    }

    .a-space>*+* {
        margin-top: 16px;
    }

    /* ── BUTTONS ── */
    .a-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: var(--flame);
        color: #fff;
        font-size: 12.5px;
        font-weight: 600;
        padding: 9px 18px;
        border-radius: var(--r);
        border: none;
        white-space: nowrap;
        transition: filter .18s, transform .14s, box-shadow .18s;
        min-height: 38px;
    }

    .a-btn-primary:hover {
        filter: brightness(1.08);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(255, 60, 0, .28);
    }

    .a-btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(244, 241, 236, .04);
        color: var(--paper);
        border: 1px solid rgba(244, 241, 236, .1);
        font-size: 12px;
        padding: 7px 13px;
        border-radius: var(--r);
        white-space: nowrap;
        transition: background .16s;
        min-height: 34px;
    }

    .a-btn-secondary:hover {
        background: rgba(244, 241, 236, .09);
    }

    .a-btn-danger {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(248, 113, 113, .07);
        color: var(--red);
        border: 1px solid rgba(248, 113, 113, .18);
        font-size: 12px;
        padding: 7px 13px;
        border-radius: var(--r);
        white-space: nowrap;
        transition: background .16s;
        min-height: 34px;
    }

    .a-btn-danger:hover {
        background: rgba(248, 113, 113, .14);
    }

    /* ── BADGES ── */
    .a-badge-on {
        display: inline-block;
        background: rgba(74, 222, 128, .09);
        color: var(--green);
        border: 1px solid rgba(74, 222, 128, .2);
        font-size: 10px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        white-space: nowrap;
        letter-spacing: .06em;
    }

    .a-badge-off {
        display: inline-block;
        background: rgba(248, 113, 113, .09);
        color: var(--red);
        border: 1px solid rgba(248, 113, 113, .18);
        font-size: 10px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        white-space: nowrap;
        letter-spacing: .06em;
    }

    /* ── TABLE ── */
    .a-tbl-wrap {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    table.a-tbl {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
        min-width: 520px;
    }

    table.a-tbl thead tr {
        border-bottom: 1px solid var(--b1);
    }

    table.a-tbl th {
        text-align: left;
        padding: 10px 14px;
        font-size: 9px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .14em;
        color: rgba(244, 241, 236, .28);
        white-space: nowrap;
    }

    table.a-tbl td {
        padding: 11px 14px;
        border-bottom: 1px solid rgba(244, 241, 236, .04);
        vertical-align: middle;
    }

    table.a-tbl tr:hover td {
        background: rgba(255, 255, 255, .016);
    }

    table.a-tbl tr:last-child td {
        border-bottom: none;
    }

    .a-act-row {
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    /* ── PAGE HEADER ── */
    .a-page-hdr {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 14px;
        margin-bottom: 22px;
        flex-wrap: wrap;
    }

    .a-page-title {
        font-family: var(--fh);
        font-size: 19px;
        font-weight: 600;
        color: var(--paper);
        letter-spacing: -.01em;
        line-height: 1.2;
    }

    .a-page-sub {
        font-size: 12.5px;
        color: var(--g3);
        margin-top: 4px;
    }

    /* ── GRIDS ── */
    .a-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    .a-grid-3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
    }

    .a-grid-4 {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
    }

    .a-grid-form {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 18px;
        align-items: start;
    }

    .a-grid-settings {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .a-grid-enquiry {
        display: grid;
        grid-template-columns: 1fr 288px;
        gap: 18px;
        align-items: start;
    }

    @media(max-width:960px) {
        .a-grid-form {
            grid-template-columns: 1fr 260px;
        }
    }

    @media(max-width:720px) {
        .a-grid-form {
            grid-template-columns: 1fr;
        }

        .a-grid-settings {
            grid-template-columns: 1fr;
        }

        .a-grid-enquiry {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width:860px) {
        .a-grid-3 {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media(max-width:580px) {

        .a-grid-3,
        .a-grid-4 {
            grid-template-columns: 1fr;
        }

        .a-grid-2 {
            grid-template-columns: 1fr;
        }
    }

    .a-mini-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 11px;
    }

    @media(max-width:400px) {
        .a-mini-grid {
            grid-template-columns: 1fr;
        }
    }

    /* ── CK EDITOR DARK ── */
    .ck.ck-editor__editable,
    .ck.ck-editor__editable_inline {
        background: #070710 !important;
        color: var(--paper) !important;
        border-color: rgba(244, 241, 236, .1) !important;
        min-height: 320px;
        caret-color: var(--flame);
    }

    .ck.ck-editor__editable.ck-focused {
        border-color: var(--flame) !important;
        box-shadow: 0 0 0 3px rgba(255, 60, 0, .09) !important;
    }

    .ck.ck-toolbar {
        background: #141420 !important;
        border-color: rgba(244, 241, 236, .08) !important;
    }

    .ck.ck-toolbar__separator {
        background: rgba(244, 241, 236, .07) !important;
    }

    .ck.ck-button,
    .ck.ck-button.ck-off {
        color: rgba(244, 241, 236, .55) !important;
        background: transparent !important;
    }

    .ck.ck-button:hover:not(.ck-disabled),
    .ck.ck-button.ck-on {
        background: rgba(255, 60, 0, .1) !important;
        color: var(--flame) !important;
    }

    .ck.ck-dropdown__panel,
    .ck.ck-list,
    .ck.ck-balloon-panel {
        background: #1e1e2e !important;
        border-color: rgba(244, 241, 236, .08) !important;
    }

    .ck.ck-list__item .ck-button {
        color: rgba(244, 241, 236, .65) !important;
    }

    .ck.ck-list__item .ck-button:hover,
    .ck.ck-list__item .ck-button.ck-on {
        background: rgba(255, 60, 0, .1) !important;
        color: var(--flame) !important;
    }

    .ck.ck-input-text,
    .ck.ck-input {
        background: #070710 !important;
        color: var(--paper) !important;
        border-color: rgba(244, 241, 236, .12) !important;
    }

    .ck.ck-input-text:focus,
    .ck.ck-input:focus {
        border-color: var(--flame) !important;
    }

    .ck-content,
    .ck-content p {
        color: var(--paper);
        margin-bottom: 1em;
    }

    .ck-content h1,
    .ck-content h2,
    .ck-content h3 {
        color: var(--paper);
        margin: 1.4em 0 .5em;
    }

    .ck-content a {
        color: var(--flame);
    }

    .ck-content blockquote {
        border-left: 2px solid var(--flame);
        padding-left: 1em;
        color: var(--g3);
        font-style: italic;
        margin: 24px 0;
    }

    .ck.ck-balloon-panel {
        z-index: 9999 !important;
    }
    </style>
</head>

<body>

    <div id="a-overlay" onclick="aSidebarClose()"></div>

    <!-- ═══ SIDEBAR ═══════════════════════════════════════════════════ -->
    <aside id="a-sidebar" role="navigation" aria-label="Admin navigation">
        <div class="a-brand">
            <div class="a-brand-name">
                <span class="a-brand-dot"></span>
                House<span style="color:var(--flame)">Of</span>Social
            </div>
            <div class="a-brand-sub">Admin Studio</div>
        </div>

        <nav class="a-nav">
            <?php $uri = uri_string(); ?>
            <span class="a-nav-section">Main</span>
            <a href="<?= base_url('admin/dashboard') ?>"
                class="a-link <?= (strpos($uri, 'dashboard') !== false || $uri === 'admin') ? 'on' : '' ?>"><i
                    class="fa fa-home"></i> Dashboard</a>
            <a href="<?= base_url('admin/posts') ?>"
                class="a-link <?= strpos($uri, 'posts') !== false ? 'on' : '' ?>"><i class="fa fa-film"></i> Posts &amp;
                Campaigns</a>
            <a href="<?= base_url('admin/enquiries') ?>"
                class="a-link <?= strpos($uri, 'enquiries') !== false ? 'on' : '' ?>">
                <i class="fa fa-envelope"></i> Enquiries
                <?php
                // Load unread count if model available
                if (isset($this) && method_exists($this, 'load')) {
                    try {
                        $CI = &get_instance();
                        if (isset($CI->Enquiry_model)) {
                            $uc = $CI->Enquiry_model->count_unread();
                            if ($uc > 0) echo '<span class="a-badge">' . $uc . '</span>';
                        }
                    } catch (Exception $e) {
                    }
                }
                ?>
            </a>
            <span class="a-nav-section" style="margin-top:6px">System</span>
            <a href="<?= base_url('admin/settings') ?>"
                class="a-link <?= strpos($uri, 'settings') !== false ? 'on' : '' ?>"><i class="fa fa-cog"></i>
                Settings</a>
            <a href="<?= base_url() ?>" target="_blank" rel="noopener" class="a-link"><i
                    class="fa fa-arrow-up-right-from-square"></i> View Site</a>
        </nav>

        <div class="a-sb-foot">
            <div class="a-user">
                <div class="a-avatar"><?= strtoupper(substr($this->session->userdata('admin_username') ?? 'A', 0, 1)) ?>
                </div>
                <div>
                    <div class="a-username">
                        <?= htmlspecialchars($this->session->userdata('admin_username') ?? 'Admin') ?></div>
                    <div class="a-role">Administrator</div>
                </div>
            </div>
            <a href="<?= base_url('admin/logout') ?>" class="a-link danger"><i class="fa fa-right-from-bracket"></i>
                Logout</a>
        </div>
    </aside>

    <!-- ═══ MAIN ═══════════════════════════════════════════════════════ -->
    <div id="a-main">
        <header id="a-top">
            <button id="a-menu-btn" onclick="aSidebarToggle()" aria-label="Toggle sidebar" aria-expanded="false">
                <i class="fa fa-bars" id="a-ham-icon"></i>
            </button>
            <span
                class="a-top-title"><?= isset($site_title) ? htmlspecialchars($site_title) . ' — Admin' : 'HouseOfSocial Admin' ?></span>
            <span class="a-top-date"><?= date('D, d M Y') ?></span>
        </header>

        <div id="a-content">
            <?php if ($f = $this->session->flashdata('msg')): ?>
            <div class="a-flash a-flash-ok"><i class="fa fa-circle-check"></i> <?= htmlspecialchars($f) ?></div>
            <?php endif; ?>
            <?php if ($f = $this->session->flashdata('success')): ?>
            <div class="a-flash a-flash-ok"><i class="fa fa-circle-check"></i> <?= htmlspecialchars($f) ?></div>
            <?php endif; ?>
            <?php if ($f = $this->session->flashdata('error')): ?>
            <div class="a-flash a-flash-err"><?= $f ?></div>
            <?php endif; ?>
            <?php if ($f = $this->session->flashdata('upload_error')): ?>
            <div class="a-flash a-flash-err">Upload error: <?= htmlspecialchars($f) ?></div>
            <?php endif; ?>