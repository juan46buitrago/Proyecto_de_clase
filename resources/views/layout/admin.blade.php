<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title', 'Admin') — JetProduct</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        .admin-shell {
            display: flex;
            min-height: 100vh;
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: var(--surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 1.5rem 1.4rem 1.2rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .sidebar-brand .brand-icon {
            width: 32px; height: 32px;
            background: var(--accent);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; color: var(--bg); font-weight: 800; flex-shrink: 0;
        }

        .sidebar-brand .brand-text {
            font-family: 'Syne', sans-serif;
            font-weight: 800; font-size: 1rem;
            color: var(--accent); letter-spacing: -0.3px;
        }

        .sidebar-brand .brand-text span { color: var(--text); }

        .sidebar-nav {
            flex: 1;
            padding: 1.2rem 0.75rem;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .nav-section-title {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
            font-weight: 700;
            padding: 0 0.6rem;
            margin: 1.2rem 0 0.4rem;
        }

        .nav-section-title:first-child { margin-top: 0; }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.5rem 0.7rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--muted);
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
        }

        .nav-item:hover { background: var(--surface2); color: var(--text); }

        .nav-item.active {
            background: rgba(232,255,71,0.1);
            color: var(--accent);
            font-weight: 600;
        }

        .nav-icon { width: 18px; flex-shrink: 0; text-align: center; font-size: 0.95rem; }

        .sidebar-footer {
            padding: 1rem 1.1rem;
            border-top: 1px solid var(--border);
            display: flex; align-items: center; gap: 0.75rem;
        }

        .s-avatar {
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--surface2); border: 1.5px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem; font-weight: 700; color: var(--accent); flex-shrink: 0;
        }

        .avatar-info { flex: 1; min-width: 0; }
        .avatar-name { font-size: 0.8rem; font-weight: 600; color: var(--text); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .avatar-role { font-size: 0.7rem; color: var(--muted); }

        /* ── MAIN ── */
        .admin-main {
            margin-left: 240px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .topbar {
            height: 60px;
            background: rgba(13,13,13,0.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 2rem;
            position: sticky; top: 0; z-index: 99;
        }

        .breadcrumb {
            display: flex; align-items: center; gap: 0.4rem;
            font-size: 0.82rem; color: var(--muted);
        }

        .breadcrumb span { color: var(--text); font-weight: 600; }

        .topbar-right { display: flex; align-items: center; gap: 0.75rem; }

        .topbar-search {
            display: flex; align-items: center; gap: 0.5rem;
            background: var(--surface2); border: 1px solid var(--border);
            border-radius: 8px; padding: 0.35rem 0.9rem;
            font-size: 0.82rem; color: var(--muted); width: 200px;
        }

        .topbar-search input {
            background: none; border: none; outline: none;
            color: var(--text); font-size: 0.82rem;
            font-family: 'DM Sans', sans-serif; width: 100%;
        }

        .topbar-search input::placeholder { color: var(--muted); }

        .icon-btn {
            width: 34px; height: 34px; border-radius: 8px;
            background: var(--surface2); border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.95rem; cursor: pointer; color: var(--muted);
            transition: color 0.15s, border-color 0.15s; position: relative;
        }

        .icon-btn:hover { color: var(--text); border-color: var(--muted); }

        .notif-dot {
            position: absolute; top: 5px; right: 5px;
            width: 6px; height: 6px; border-radius: 50%; background: var(--accent);
        }

        .topbar-avatar {
            width: 34px; height: 34px; border-radius: 50%;
            background: var(--surface2); border: 1.5px solid var(--accent);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem; font-weight: 700; color: var(--accent); cursor: pointer;
        }

        .admin-content { flex: 1; padding: 2rem; }

        .admin-footer {
            padding: 1.25rem 2rem;
            border-top: 1px solid var(--border);
            display: flex; justify-content: space-between; align-items: center;
            font-size: 0.75rem; color: var(--muted2);
        }

        /* ── PANEL ── */
        .panel {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
        }

        .panel-header {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
        }

        .panel-title {
            font-family: 'Syne', sans-serif;
            font-weight: 700; font-size: 0.95rem; color: var(--text);
        }

        /* ── TABLE ── */
        .data-table { width: 100%; border-collapse: collapse; font-size: 0.85rem; }
        .data-table thead tr { border-bottom: 1px solid var(--border); }
        .data-table th { text-align: left; padding: 0.7rem 1rem; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.7px; font-weight: 700; color: var(--muted); }
        .data-table td { padding: 0.85rem 1rem; color: var(--text); border-bottom: 1px solid var(--border); vertical-align: middle; }
        .data-table tr:last-child td { border-bottom: none; }
        .data-table tr:hover td { background: var(--surface2); }
        .td-id { font-family: 'Syne', sans-serif; font-weight: 700; color: var(--accent); }
        .td-actions { display: flex; gap: 0.4rem; }

        .tbl-btn { padding: 0.28rem 0.7rem; border-radius: 6px; font-size: 0.75rem; font-weight: 600; cursor: pointer; border: none; text-decoration: none; display: inline-flex; align-items: center; gap: 0.3rem; }
        .tbl-btn-edit { background: rgba(232,255,71,0.1); color: var(--accent); border: 1px solid rgba(232,255,71,0.2); }
        .tbl-btn-edit:hover { background: rgba(232,255,71,0.2); }
        .tbl-btn-del  { background: rgba(248,113,113,0.1); color: var(--danger); border: 1px solid rgba(248,113,113,0.2); }
        .tbl-btn-del:hover { background: rgba(248,113,113,0.2); }
    </style>
</head>
<body style="background: var(--bg); color: var(--text);">
<div class="admin-shell">

    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">J</div>
            <div class="brand-text">Jet<span>Product</span></div>
        </div>

        <div class="sidebar-nav">

            <div class="nav-section-title">Principal</div>

            <a class="nav-item {{ request()->is('admin') ? 'active' : '' }}" href="/admin">
                <span class="nav-icon">⊞</span> Dashboard
            </a>
            <a class="nav-item {{ request()->is('product*') ? 'active' : '' }}" href="/product">
                <span class="nav-icon">📦</span> Productos
            </a>
            <a class="nav-item" href="/product/create">
                <span class="nav-icon">＋</span> Nuevo producto
            </a>

            <div class="nav-section-title">Gestión</div>

            <a class="nav-item {{ request()->is('admin') ? 'active' : '' }}" href="{{ route('admin.index') }}#categorias">
                <span class="nav-icon">🗂️</span> Categorías
            </a>
            <a class="nav-item" href="#">
                <span class="nav-icon">👥</span> Usuarios
            </a>
            <a class="nav-item" href="#">
                <span class="nav-icon">🧾</span> Pedidos
            </a>

            <div class="nav-section-title">Sistema</div>

            <a class="nav-item" href="#">
                <span class="nav-icon">📊</span> Reportes
            </a>
            <a class="nav-item" href="#">
                <span class="nav-icon">⚙️</span> Configuración
            </a>

        </div>

        <div class="sidebar-footer">
            <div class="s-avatar">A</div>
            <div class="avatar-info">
                <div class="avatar-name">Administrador</div>
                <div class="avatar-role">Admin</div>
            </div>
        </div>
    </aside>

    <div class="admin-main">

        <header class="topbar">
            <div class="breadcrumb">
                Admin <span style="opacity:.4;margin:0 0.2rem;">/</span>
                <span>@yield('breadcrumb', 'Dashboard')</span>
            </div>
            <div class="topbar-right">
                <div class="topbar-search">
                    <span>🔍</span>
                    <input type="text" placeholder="Buscar...">
                </div>
                <div class="icon-btn">🔔<span class="notif-dot"></span></div>
                <div class="topbar-avatar">A</div>
            </div>
        </header>

        <main class="admin-content">
            @yield('content')
        </main>

        <footer class="admin-footer">
            <span>JetProduct Admin Panel — 2026</span>
            <span>v1.0.0</span>
        </footer>

    </div>
</div>
</body>
</html>
