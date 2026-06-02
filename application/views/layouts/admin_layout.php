<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data['page_title']) ? htmlspecialchars($data['page_title']) : 'Admin' ?> — FilmyCurry CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        fc: { yellow:'#F5C518', black:'#0D0D0D', cream:'#F9F5EE', dark:'#111111', gray:'#161616', border:'#222222' }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Inter',sans-serif; background:#0D0D0D; color:#F9F5EE; }
        .sidebar-link { display:flex; align-items:center; gap:.75rem; padding:.65rem 1rem; border-radius:6px; font-size:.875rem; color:rgba(249,245,238,.5); transition:all .2s; }
        .sidebar-link:hover,.sidebar-link.active { background:rgba(245,197,24,.08); color:#F5C518; }
        .sidebar-link .icon { width:18px; height:18px; flex-shrink:0; }
        input,select,textarea { background:#161616; border:1px solid #222; color:#F9F5EE; border-radius:6px; padding:.6rem .9rem; width:100%; font-size:.875rem; transition:border-color .2s; }
        input:focus,select:focus,textarea:focus { outline:none; border-color:#F5C518; }
        input::placeholder,textarea::placeholder { color:rgba(249,245,238,.2); }
        .badge-active   { background:rgba(34,197,94,.12); color:#4ade80; font-size:.7rem; padding:.2rem .6rem; border-radius:999px; }
        .badge-inactive { background:rgba(239,68,68,.12);  color:#f87171; font-size:.7rem; padding:.2rem .6rem; border-radius:999px; }
        .btn { display:inline-flex; align-items:center; gap:.4rem; padding:.55rem 1.1rem; border-radius:6px; font-size:.8rem; font-weight:500; transition:all .15s; cursor:pointer; }
        .btn-yellow { background:#F5C518; color:#0D0D0D; }
        .btn-yellow:hover { filter:brightness(1.1); }
        .btn-outline { border:1px solid #333; color:rgba(249,245,238,.6); }
        .btn-outline:hover { border-color:#F5C518; color:#F5C518; }
        .btn-danger { border:1px solid rgba(239,68,68,.3); color:#f87171; }
        .btn-danger:hover { background:rgba(239,68,68,.1); }
        .card { background:#111; border:1px solid #1e1e1e; border-radius:10px; padding:1.5rem; }
        table { width:100%; border-collapse:collapse; }
        th { text-align:left; padding:.75rem 1rem; color:rgba(249,245,238,.35); font-size:.7rem; text-transform:uppercase; letter-spacing:.1em; border-bottom:1px solid #1e1e1e; }
        td { padding:.9rem 1rem; border-bottom:1px solid #161616; font-size:.85rem; vertical-align:middle; }
        tr:hover td { background:rgba(255,255,255,.02); }
        .flash-success { background:rgba(34,197,94,.1); border:1px solid rgba(34,197,94,.2); color:#4ade80; padding:.75rem 1rem; border-radius:6px; margin-bottom:1.5rem; font-size:.85rem; }
        .flash-error   { background:rgba(239,68,68,.1);  border:1px solid rgba(239,68,68,.2);  color:#f87171; padding:.75rem 1rem; border-radius:6px; margin-bottom:1.5rem; font-size:.85rem; }
    </style>
</head>
<body>
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-60 bg-fc-dark border-r border-fc-border flex flex-col flex-shrink-0">
        <div class="px-6 py-6 border-b border-fc-border">
            <a href="<?= base_url('admin/dashboard') ?>" class="font-bold text-lg text-fc-cream">
                FILMY<span class="text-fc-yellow">CURRY</span>
            </a>
            <div class="text-fc-cream/30 text-xs mt-1">Admin Panel</div>
        </div>
        <nav class="flex-1 px-3 py-4 space-y-1">
            <a href="<?= base_url('admin/dashboard') ?>"
               class="sidebar-link <?= (uri_string() == 'admin/dashboard' || uri_string() == 'admin') ? 'active' : '' ?>">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>
            <a href="<?= base_url('admin/posts') ?>"
               class="sidebar-link <?= strpos(uri_string(), 'admin/posts') !== FALSE ? 'active' : '' ?>">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Posts
            </a>
            <a href="<?= base_url('admin/settings') ?>"
               class="sidebar-link <?= strpos(uri_string(), 'admin/settings') !== FALSE ? 'active' : '' ?>">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Settings
            </a>
        </nav>
        <div class="px-3 py-4 border-t border-fc-border">
            <div class="text-fc-cream/30 text-xs px-3 mb-2">
                <?= htmlspecialchars($this->session->userdata('admin_username') ?? 'Admin') ?>
            </div>
            <a href="<?= base_url('admin/logout') ?>" class="sidebar-link text-red-400/60 hover:text-red-400">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Logout
            </a>
            <a href="<?= base_url() ?>" target="_blank" class="sidebar-link mt-1">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                View Website
            </a>
        </div>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <header class="h-14 border-b border-fc-border flex items-center px-8 justify-between">
            <h1 class="text-sm font-medium text-fc-cream/70">
                <?= isset($data['page_title']) ? htmlspecialchars($data['page_title']) : 'Admin' ?>
            </h1>
            <div class="text-xs text-fc-cream/30"><?= date('D, M j Y') ?></div>
        </header>
        <main class="flex-1 p-8 overflow-auto">
            <?php if ($this->session->flashdata('success')): ?>
            <div class="flash-success">✓ <?= $this->session->flashdata('success') ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
            <div class="flash-error">⚠ <?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>
            <?= $content ?>
        </main>
    </div>
</div>
</body>
</html>
