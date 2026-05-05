<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($site_title) ? htmlspecialchars($site_title) : 'FilmyCurry' ?> — Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
    /* ═══════════════════════════════════════════
       RESET & BASE
    ═══════════════════════════════════════════ */
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
    }

    body {
        background: var(--bg);
        color: var(--cream);
        font-family: 'Inter', system-ui, sans-serif;
        min-height: 100vh;
        overflow-x: hidden;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    img {
        max-width: 100%;
    }

    /* ═══════════════════════════════════════════
       SCROLLBAR
    ═══════════════════════════════════════════ */
    ::-webkit-scrollbar {
        width: 4px;
        height: 4px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--yellow);
        border-radius: 2px;
    }

    /* ═══════════════════════════════════════════
       SIDEBAR
    ═══════════════════════════════════════════ */
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
        transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        overflow-y: auto;
        overflow-x: hidden;
    }

    /* Mobile: hidden off-screen */
    @media (max-width: 768px) {
        #fc-sidebar {
            transform: translateX(-100%);
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.5);
        }

        #fc-sidebar.open {
            transform: translateX(0);
        }
    }

    .sidebar-brand {
        padding: 20px 20px 16px;
        border-bottom: 1px solid var(--border);
        flex-shrink: 0;
    }

    .sidebar-brand-logo {
        font-family: 'Bebas Neue', Impact, sans-serif;
        font-size: 24px;
        letter-spacing: 0.08em;
        color: var(--cream);
    }

    .sidebar-brand-logo span {
        color: var(--yellow);
    }

    .sidebar-brand-sub {
        font-size: 10px;
        color: var(--muted);
        letter-spacing: 0.18em;
        text-transform: uppercase;
        margin-top: 3px;
    }

    .sidebar-nav {
        flex: 1;
        padding: 12px 10px;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 12px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        color: var(--muted);
        transition: all 0.2s;
        white-space: nowrap;
    }

    .sidebar-link i {
        width: 16px;
        flex-shrink: 0;
        font-size: 13px;
    }

    .sidebar-link:hover {
        background: rgba(245, 197, 24, 0.08);
        color: var(--yellow);
    }

    .sidebar-link.active {
        background: rgba(245, 197, 24, 0.1);
        color: var(--yellow);
        border-left: 3px solid var(--yellow);
    }

    .sidebar-link.danger {
        color: rgba(248, 113, 113, 0.6);
    }

    .sidebar-link.danger:hover {
        background: rgba(248, 113, 113, 0.08);
        color: var(--danger);
    }

    .sidebar-badge {
        margin-left: auto;
        background: var(--yellow);
        color: #0D0D0D;
        font-size: 10px;
        font-weight: 700;
        padding: 2px 7px;
        border-radius: 20px;
        flex-shrink: 0;
    }

    .sidebar-footer {
        padding: 12px 10px;
        border-top: 1px solid var(--border);
        flex-shrink: 0;
    }

    .sidebar-user {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 12px;
        margin-bottom: 4px;
    }

    .sidebar-avatar {
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

    .sidebar-username {
        font-size: 13px;
        font-weight: 600;
    }

    .sidebar-role {
        font-size: 11px;
        color: var(--muted);
    }

    /* Overlay for mobile */
    #fc-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        z-index: 99;
        backdrop-filter: blur(2px);
    }

    #fc-overlay.show {
        display: block;
    }

    /* ═══════════════════════════════════════════
       MAIN WRAPPER
    ═══════════════════════════════════════════ */
    #fc-main {
        margin-left: var(--sidebar-w);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        transition: margin-left 0.3s;
    }

    @media (max-width: 768px) {
        #fc-main {
            margin-left: 0;
        }
    }

    /* ═══════════════════════════════════════════
       TOPBAR
    ═══════════════════════════════════════════ */
    #fc-topbar {
        height: 56px;
        background: rgba(13, 13, 13, 0.95);
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        padding: 0 24px;
        gap: 16px;
        position: sticky;
        top: 0;
        z-index: 50;
        backdrop-filter: blur(12px);
    }

    #fc-menu-btn {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 6px;
        color: var(--cream);
        font-size: 18px;
        border-radius: 6px;
        transition: background 0.2s;
    }

    #fc-menu-btn:hover {
        background: rgba(255, 255, 255, 0.08);
    }

    @media (max-width: 768px) {
        #fc-menu-btn {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }

    .topbar-title {
        font-size: 14px;
        font-weight: 600;
        color: var(--muted);
        flex: 1;
    }

    .topbar-date {
        font-size: 12px;
        color: rgba(249, 245, 238, 0.25);
        white-space: nowrap;
    }

    /* ═══════════════════════════════════════════
       CONTENT AREA
    ═══════════════════════════════════════════ */
    #fc-content {
        flex: 1;
        padding: 28px 24px;
        max-width: 1400px;
        width: 100%;
    }

    @media (max-width: 640px) {
        #fc-content {
            padding: 16px 14px;
        }
    }

    /* ═══════════════════════════════════════════
       FLASH MESSAGES
    ═══════════════════════════════════════════ */
    .flash-msg,
    .flash-success {
        background: rgba(34, 197, 94, 0.12);
        border: 1px solid rgba(34, 197, 94, 0.25);
        color: var(--green);
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .flash-error {
        background: rgba(248, 113, 113, 0.1);
        border: 1px solid rgba(248, 113, 113, 0.25);
        color: var(--danger);
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    /* ═══════════════════════════════════════════
       CARDS
    ═══════════════════════════════════════════ */
    .card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
    }

    .card-pad {
        padding: 20px;
    }

    /* ═══════════════════════════════════════════
       FORMS
    ═══════════════════════════════════════════ */
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
        padding: 10px 14px;
        width: 100%;
        font-size: 13px;
        font-family: inherit;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        -webkit-appearance: none;
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
        font-size: 12px;
        color: var(--muted);
    }

    textarea {
        resize: vertical;
        min-height: 80px;
    }

    /* ═══════════════════════════════════════════
       BUTTONS
    ═══════════════════════════════════════════ */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: var(--yellow);
        color: #0D0D0D;
        font-weight: 700;
        font-size: 13px;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: filter 0.2s, transform 0.15s;
        white-space: nowrap;
        text-decoration: none;
    }

    .btn-primary:hover {
        filter: brightness(1.1);
        transform: translateY(-1px);
    }

    .btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.06);
        color: var(--cream);
        border: 1px solid rgba(255, 255, 255, 0.1);
        font-size: 12px;
        font-weight: 500;
        padding: 7px 14px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.2s;
        text-decoration: none;
        white-space: nowrap;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.12);
    }

    .btn-danger {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: rgba(248, 113, 113, 0.1);
        color: var(--danger);
        border: 1px solid rgba(248, 113, 113, 0.25);
        font-size: 12px;
        font-weight: 500;
        padding: 7px 14px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.2s;
        text-decoration: none;
        white-space: nowrap;
    }

    .btn-danger:hover {
        background: rgba(248, 113, 113, 0.2);
    }

    /* ═══════════════════════════════════════════
       BADGES
    ═══════════════════════════════════════════ */
    .badge-active {
        display: inline-block;
        background: rgba(34, 197, 94, 0.12);
        color: var(--green);
        border: 1px solid rgba(34, 197, 94, 0.25);
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
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
    }

    /* ═══════════════════════════════════════════
       RESPONSIVE TABLES
    ═══════════════════════════════════════════ */
    .table-wrap {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
        min-width: 600px;
    }

    thead tr {
        border-bottom: 1px solid var(--border);
    }

    th {
        text-align: left;
        padding: 12px 14px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: rgba(249, 245, 238, 0.3);
        white-space: nowrap;
    }

    td {
        padding: 12px 14px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        vertical-align: middle;
    }

    tr:hover td {
        background: rgba(255, 255, 255, 0.02);
    }

    tr:last-child td {
        border-bottom: none;
    }

    /* ═══════════════════════════════════════════
       ACTION BUTTON ROW
    ═══════════════════════════════════════════ */
    .action-row {
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    /* ═══════════════════════════════════════════
       PAGE HEADER
    ═══════════════════════════════════════════ */
    .page-hdr {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .page-hdr-title {
        font-size: 22px;
        font-weight: 700;
        color: var(--cream);
    }

    .page-hdr-sub {
        font-size: 12px;
        color: var(--muted);
        margin-top: 4px;
    }

    /* ═══════════════════════════════════════════
       GRID HELPERS
    ═══════════════════════════════════════════ */
    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .grid-3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .grid-form {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 20px;
        align-items: start;
    }

    .space-y>*+* {
        margin-top: 16px;
    }

    @media (max-width: 1024px) {
        .grid-form {
            grid-template-columns: 1fr 300px;
        }

        .grid-3 {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .grid-form {
            grid-template-columns: 1fr;
        }

        .grid-2,
        .grid-3 {
            grid-template-columns: 1fr;
        }
    }
    </style>
</head>

<body>

    <!-- Sidebar overlay (mobile) -->
    <div id="fc-overlay" onclick="fcCloseSidebar()"></div>

    <!-- ══ SIDEBAR ══ -->
    <aside id="fc-sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-logo">FILMY<span>CURRY</span></div>
            <div class="sidebar-brand-sub">Admin Panel</div>
        </div>

        <nav class="sidebar-nav">
            <?php $uri = uri_string(); ?>

            <a href="<?= base_url('admin/dashboard') ?>"
                class="sidebar-link <?= (strpos($uri, 'dashboard') !== FALSE || $uri === 'admin') ? 'active' : '' ?>">
                <i class="fa fa-home"></i> Dashboard
            </a>

            <a href="<?= base_url('admin/posts') ?>"
                class="sidebar-link <?= (strpos($uri, 'posts') !== FALSE) ? 'active' : '' ?>">
                <i class="fa fa-film"></i> Posts / Campaigns
            </a>

            <a href="<?= base_url('admin/enquiries') ?>"
                class="sidebar-link <?= (strpos($uri, 'enquiries') !== FALSE) ? 'active' : '' ?>">
                <i class="fa fa-envelope"></i> Enquiries
            </a>

            <a href="<?= base_url('admin/settings') ?>"
                class="sidebar-link <?= (strpos($uri, 'settings') !== FALSE) ? 'active' : '' ?>">
                <i class="fa fa-cog"></i> Settings
            </a>

            <a href="<?= base_url() ?>" target="_blank" class="sidebar-link">
                <i class="fa fa-external-link"></i> View Website
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar">
                    <?= strtoupper(substr($this->session->userdata('admin_username') ?? 'A', 0, 1)) ?>
                </div>
                <div>
                    <div class="sidebar-username">
                        <?= htmlspecialchars($this->session->userdata('admin_username') ?? 'Admin') ?>
                    </div>
                    <div class="sidebar-role">Administrator</div>
                </div>
            </div>
            <a href="<?= base_url('admin/logout') ?>" class="sidebar-link danger">
                <i class="fa fa-sign-out"></i> Logout
            </a>
        </div>
    </aside>

    <!-- ══ MAIN ══ -->
    <div id="fc-main">

        <!-- TOPBAR -->
        <header id="fc-topbar">
            <button id="fc-menu-btn" onclick="fcToggleSidebar()" aria-label="Toggle menu">
                <i class="fa fa-bars"></i>
            </button>
            <span class="topbar-title">
                <?= isset($site_title) ? htmlspecialchars($site_title) . ' — Admin' : 'FilmyCurry Admin' ?>
            </span>
            <span class="topbar-date"><?= date('D, d M Y') ?></span>
        </header>

        <!-- CONTENT -->
        <div id="fc-content">

            <?php if ($flash = $this->session->flashdata('msg')): ?>
            <div class="flash-msg"><i class="fa fa-check-circle"></i> <?= htmlspecialchars($flash) ?></div>
            <?php endif; ?>

            <?php if ($flash = $this->session->flashdata('success')): ?>
            <div class="flash-success"><i class="fa fa-check-circle"></i> <?= htmlspecialchars($flash) ?></div>
            <?php endif; ?>

            <?php if ($flash = $this->session->flashdata('error')): ?>
            <div class="flash-error"><i class="fa fa-exclamation-triangle"></i> <?= $flash ?></div>
            <?php endif; ?>

            <?php if ($flash = $this->session->flashdata('upload_error')): ?>
            <div class="flash-error"><i class="fa fa-exclamation-triangle"></i> Upload error:
                <?= htmlspecialchars($flash) ?></div>
            <?php endif; ?>