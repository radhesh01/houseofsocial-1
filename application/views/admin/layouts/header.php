<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($site_title) ? htmlspecialchars($site_title) : 'FilmyCurry' ?> — Admin</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind — required by all admin view files -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    fc: {
                        yellow: '#F5C518',
                        cream: '#F9F5EE',
                        dark: '#0D0D0D',
                        card: '#1A1A1A'
                    }
                }
            }
        }
    }
    </script>

    <style>
    /* ───────────────────────────────────────────
     TOKENS
  ─────────────────────────────────────────── */
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    :root {
        --bg: #0D0D0D;
        --sidebar: #111111;
        --card: #1A1A1A;
        --border: rgba(255, 255, 255, 0.07);
        --yellow: #F5C518;
        --cream: #F9F5EE;
        --muted: rgba(249, 245, 238, 0.4);
        --danger: #f87171;
        --green: #86efac;
        --sidebar-w: 240px;
    }

    html {
        font-size: 15px;
        -webkit-text-size-adjust: 100%;
    }

    body {
        background: var(--bg);
        color: var(--cream);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
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
        width: 4px;
        height: 4px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--yellow);
        border-radius: 2px;
    }

    /* ───────────────────────────────────────────
     OVERLAY
  ─────────────────────────────────────────── */
    #fc-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.65);
        z-index: 99;
        backdrop-filter: blur(2px);
    }

    #fc-overlay.show {
        display: block;
    }

    /* ───────────────────────────────────────────
     SIDEBAR
  ─────────────────────────────────────────── */
    #fc-sidebar {
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
        transition: transform 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform;
    }

    @media (max-width: 768px) {
        #fc-sidebar {
            transform: translateX(-100%);
            box-shadow: 4px 0 32px rgba(0, 0, 0, 0.6);
        }

        #fc-sidebar.open {
            transform: translateX(0);
        }
    }

    .sb-brand {
        padding: 18px 18px 14px;
        border-bottom: 1px solid var(--border);
        flex-shrink: 0;
    }

    .sb-brand-logo {
        font-family: 'Bebas Neue', Impact, sans-serif;
        font-size: 22px;
        letter-spacing: 0.08em;
        color: var(--cream);
        line-height: 1;
    }

    .sb-brand-logo span {
        color: var(--yellow);
    }

    .sb-brand-sub {
        font-size: 9px;
        color: var(--muted);
        letter-spacing: 0.2em;
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

    /* sidebar-link — used directly in view files */
    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 10px 12px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        color: var(--muted);
        transition: background 0.18s, color 0.18s;
        white-space: nowrap;
        min-height: 42px;
        border: none;
        background: none;
        cursor: pointer;
    }

    .sidebar-link i {
        width: 16px;
        flex-shrink: 0;
        font-size: 13px;
        text-align: center;
    }

    .sidebar-link:hover {
        background: rgba(245, 197, 24, 0.08);
        color: var(--yellow);
    }

    .sidebar-link.active {
        background: rgba(245, 197, 24, 0.1);
        color: var(--yellow);
        border-left: 3px solid var(--yellow);
        padding-left: 9px;
    }

    .sidebar-link.danger {
        color: rgba(248, 113, 113, 0.6);
    }

    .sidebar-link.danger:hover {
        background: rgba(248, 113, 113, 0.08);
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
        background: var(--yellow);
        color: #0D0D0D;
        font-weight: 700;
        font-size: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .sb-username {
        font-size: 13px;
        font-weight: 600;
        line-height: 1.2;
    }

    .sb-role {
        font-size: 11px;
        color: var(--muted);
    }

    /* ───────────────────────────────────────────
     MAIN WRAPPER
  ─────────────────────────────────────────── */
    #fc-main {
        margin-left: var(--sidebar-w);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    @media (max-width: 768px) {
        #fc-main {
            margin-left: 0;
        }
    }

    /* ───────────────────────────────────────────
     TOPBAR
  ─────────────────────────────────────────── */
    #fc-topbar {
        position: sticky;
        top: 0;
        z-index: 50;
        height: 56px;
        background: rgba(13, 13, 13, 0.97);
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        padding: 0 20px;
        gap: 14px;
        backdrop-filter: blur(12px);
        flex-shrink: 0;
    }

    #fc-menu-btn {
        display: none;
        background: none;
        border: 1px solid var(--border);
        cursor: pointer;
        padding: 0;
        width: 36px;
        height: 36px;
        border-radius: 8px;
        color: var(--cream);
        font-size: 15px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: background 0.18s;
    }

    #fc-menu-btn:hover {
        background: rgba(255, 255, 255, 0.06);
    }

    @media (max-width: 768px) {
        #fc-menu-btn {
            display: flex;
        }
    }

    .topbar-title {
        flex: 1;
        font-size: 13px;
        font-weight: 600;
        color: var(--muted);
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .topbar-date {
        font-size: 11px;
        color: rgba(249, 245, 238, 0.22);
        white-space: nowrap;
        flex-shrink: 0;
    }

    @media (max-width: 480px) {
        .topbar-date {
            display: none;
        }
    }

    /* ───────────────────────────────────────────
     CONTENT
  ─────────────────────────────────────────── */
    #fc-content {
        flex: 1;
        padding: 24px 20px;
        width: 100%;
        max-width: 1400px;
    }

    @media (max-width: 640px) {
        #fc-content {
            padding: 16px 12px;
        }
    }

    /* ───────────────────────────────────────────
     FLASH
  ─────────────────────────────────────────── */
    .flash-msg,
    .flash-success {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.25);
        color: var(--green);
        padding: 11px 14px;
        border-radius: 8px;
        margin-bottom: 18px;
        font-size: 13px;
        display: flex;
        align-items: flex-start;
        gap: 8px;
    }

    .flash-error {
        background: rgba(248, 113, 113, 0.1);
        border: 1px solid rgba(248, 113, 113, 0.25);
        color: var(--danger);
        padding: 11px 14px;
        border-radius: 8px;
        margin-bottom: 18px;
        font-size: 13px;
    }

    /* ───────────────────────────────────────────
     CARDS
  ─────────────────────────────────────────── */
    .card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
    }

    .card-pad {
        padding: 20px;
    }

    @media (max-width: 480px) {
        .card-pad {
            padding: 14px;
        }
    }

    /* ───────────────────────────────────────────
     FORM ELEMENTS
  ─────────────────────────────────────────── */
    label {
        display: block;
        font-size: 11px;
        font-weight: 600;
        color: var(--muted);
        text-transform: uppercase;
        letter-spacing: 0.08em;
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
        background: #0D0D0D;
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: var(--cream);
        border-radius: 8px;
        padding: 10px 13px;
        width: 100%;
        font-size: 14px;
        font-family: inherit;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        -webkit-appearance: none;
        appearance: none;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: var(--yellow);
        box-shadow: 0 0 0 3px rgba(245, 197, 24, 0.1);
    }

    input::placeholder,
    textarea::placeholder {
        color: rgba(249, 245, 238, 0.2);
    }

    select option {
        background: #1A1A1A;
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
        line-height: 1.6;
    }

    .space-y>*+* {
        margin-top: 16px;
    }

    /* ───────────────────────────────────────────
     BUTTONS
  ─────────────────────────────────────────── */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        background: var(--yellow);
        color: #0D0D0D;
        font-weight: 700;
        font-size: 13px;
        padding: 10px 18px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: filter 0.18s, transform 0.15s, box-shadow 0.18s;
        white-space: nowrap;
        text-decoration: none;
        min-height: 40px;
    }

    .btn-primary:hover {
        filter: brightness(1.1);
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(245, 197, 24, 0.3);
    }

    .btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.05);
        color: var(--cream);
        border: 1px solid rgba(255, 255, 255, 0.1);
        font-size: 12px;
        font-weight: 500;
        padding: 7px 13px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.18s;
        text-decoration: none;
        white-space: nowrap;
        min-height: 36px;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .btn-danger {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: rgba(248, 113, 113, 0.08);
        color: var(--danger);
        border: 1px solid rgba(248, 113, 113, 0.22);
        font-size: 12px;
        font-weight: 500;
        padding: 7px 13px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.18s;
        text-decoration: none;
        white-space: nowrap;
        min-height: 36px;
    }

    .btn-danger:hover {
        background: rgba(248, 113, 113, 0.18);
    }

    /* ───────────────────────────────────────────
     BADGES
  ─────────────────────────────────────────── */
    .badge-active {
        display: inline-block;
        background: rgba(34, 197, 94, 0.12);
        color: var(--green);
        border: 1px solid rgba(34, 197, 94, 0.25);
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        white-space: nowrap;
    }

    .badge-inactive {
        display: inline-block;
        background: rgba(248, 113, 113, 0.1);
        color: var(--danger);
        border: 1px solid rgba(248, 113, 113, 0.2);
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        white-space: nowrap;
    }

    /* ───────────────────────────────────────────
     TABLE
  ─────────────────────────────────────────── */
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
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: rgba(249, 245, 238, 0.3);
        white-space: nowrap;
    }

    td {
        padding: 11px 13px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        vertical-align: middle;
    }

    tr:hover td {
        background: rgba(255, 255, 255, 0.02);
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

    /* ───────────────────────────────────────────
     PAGE HEADER
  ─────────────────────────────────────────── */
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
        font-weight: 700;
        color: var(--cream);
        line-height: 1.2;
    }

    .page-hdr-sub {
        font-size: 12px;
        color: var(--muted);
        margin-top: 4px;
    }

    /* ───────────────────────────────────────────
     GRID HELPERS
  ─────────────────────────────────────────── */
    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    @media (max-width: 600px) {
        .grid-2 {
            grid-template-columns: 1fr;
        }
    }

    .grid-3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
    }

    @media (max-width: 860px) {
        .grid-3 {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 480px) {
        .grid-3 {
            grid-template-columns: 1fr;
        }
    }

    /* Post form: rich content + meta sidebar */
    .grid-form {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 18px;
        align-items: start;
    }

    @media (max-width: 960px) {
        .grid-form {
            grid-template-columns: 1fr 260px;
        }
    }

    @media (max-width: 720px) {
        .grid-form {
            grid-template-columns: 1fr;
        }
    }

    /* Settings cards */
    .grid-settings {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    @media (max-width: 768px) {
        .grid-settings {
            grid-template-columns: 1fr;
        }
    }

    /* Small 2-col inside cards */
    .grid-mini {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    @media (max-width: 400px) {
        .grid-mini {
            grid-template-columns: 1fr;
        }
    }

    /* Enquiry detail */
    .grid-enquiry {
        display: grid;
        grid-template-columns: 1fr 290px;
        gap: 18px;
        align-items: start;
    }

    @media (max-width: 860px) {
        .grid-enquiry {
            grid-template-columns: 1fr;
        }
    }

    /* ───────────────────────────────────────────
     CKEDITOR 5 — COMPREHENSIVE DARK FIX
     Fixes invisible text (white bg / white text clash)
  ─────────────────────────────────────────── */

    /* Editable body */
    .ck.ck-editor__editable,
    .ck.ck-editor__editable_inline,
    .ck-blurred.ck-editor__editable,
    .ck-focused.ck-editor__editable {
        background: #111111 !important;
        color: #F9F5EE !important;
        border-color: rgba(255, 255, 255, 0.14) !important;
        min-height: 360px;
        caret-color: #F5C518;
    }

    .ck.ck-editor__editable.ck-focused {
        border-color: #F5C518 !important;
        box-shadow: 0 0 0 3px rgba(245, 197, 24, 0.12) !important;
    }

    /* Toolbar background */
    .ck.ck-toolbar {
        background: #1a1a1a !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
    }

    .ck.ck-toolbar__separator {
        background: rgba(255, 255, 255, 0.1) !important;
    }

    /* Toolbar buttons */
    .ck.ck-button,
    .ck.ck-button.ck-off {
        color: rgba(249, 245, 238, 0.72) !important;
        background: transparent !important;
    }

    .ck.ck-button:hover:not(.ck-disabled),
    .ck.ck-button.ck-on {
        background: rgba(245, 197, 24, 0.14) !important;
        color: #F5C518 !important;
    }

    /* Dropdown panels */
    .ck.ck-dropdown__panel,
    .ck.ck-list,
    .ck.ck-balloon-panel,
    .ck.ck-dropdown__panel .ck-list {
        background: #1e1e1e !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
    }

    .ck.ck-list__item .ck-button {
        color: rgba(249, 245, 238, 0.75) !important;
    }

    .ck.ck-list__item .ck-button:hover,
    .ck.ck-list__item .ck-button.ck-on {
        background: rgba(245, 197, 24, 0.14) !important;
        color: #F5C518 !important;
    }

    /* Inputs inside CK panels (link dialog etc.) */
    .ck.ck-input-text,
    .ck.ck-input {
        background: #0D0D0D !important;
        color: var(--cream) !important;
        border-color: rgba(255, 255, 255, 0.15) !important;
    }

    .ck.ck-input-text:focus,
    .ck.ck-input:focus {
        border-color: #F5C518 !important;
        box-shadow: 0 0 0 2px rgba(245, 197, 24, 0.12) !important;
    }

    .ck.ck-label,
    .ck.ck-labeled-field-view__label {
        color: rgba(249, 245, 238, 0.5) !important;
    }

    /* Content typography */
    .ck-content,
    .ck-content p {
        color: #F9F5EE;
        margin-bottom: 1em;
    }

    .ck-content h1,
    .ck-content h2,
    .ck-content h3 {
        color: #F9F5EE;
        margin: 1.4em 0 0.5em;
    }

    .ck-content a {
        color: #F5C518;
    }

    .ck-content strong {
        color: #fff;
    }

    .ck-content blockquote {
        border-left: 3px solid #F5C518;
        padding-left: 1em;
        color: rgba(249, 245, 238, 0.55);
        font-style: italic;
    }

    .ck-content code,
    .ck-content pre {
        background: #0a0a0a;
        color: #F5C518;
        border-radius: 4px;
        padding: 2px 6px;
    }

    /* Balloon panel z-index */
    .ck.ck-balloon-panel {
        z-index: 9999 !important;
    }

    /* Mobile compress */
    @media (max-width: 640px) {
        .ck.ck-toolbar {
            flex-wrap: wrap !important;
        }

        .ck.ck-editor__editable {
            min-height: 220px;
        }
    }
    </style>
</head>

<body>

    <div id="fc-overlay" onclick="fcCloseSidebar()"></div>

    <!-- ══ SIDEBAR ════════════════════════════════════════════ -->
    <aside id="fc-sidebar" role="navigation" aria-label="Admin navigation">

        <div class="sb-brand">
            <div class="sb-brand-logo">FILMY<span>CURRY</span></div>
            <div class="sb-brand-sub">Admin Panel</div>
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
                    <?= strtoupper(substr($this->session->userdata('admin_username') ?? 'A', 0, 1)) ?>
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

    <!-- ══ MAIN ══════════════════════════════════════════════ -->
    <div id="fc-main">

        <header id="fc-topbar">
            <button id="fc-menu-btn" onclick="fcToggleSidebar()" aria-label="Toggle sidebar" aria-expanded="false">
                <i class="fa fa-bars" id="fc-menu-icon"></i>
            </button>
            <span class="topbar-title">
                <?= isset($site_title) ? htmlspecialchars($site_title) . ' — Admin' : 'FilmyCurry Admin' ?>
            </span>
            <span class="topbar-date"><?= date('D, d M Y') ?></span>
        </header>

        <div id="fc-content">

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