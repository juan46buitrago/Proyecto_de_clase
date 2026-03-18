@extends('layout.admin')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
<style>
    .page-title { font-family:'Syne',sans-serif; font-weight:800; font-size:1.5rem; letter-spacing:-0.5px; color:var(--text); margin-bottom:0.25rem; }
    .page-subtitle { font-size:0.83rem; color:var(--muted); margin-bottom:2rem; }

    .stats-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1rem; margin-bottom:2rem; }
    .stat-card { background:var(--surface); border:1px solid var(--border); border-radius:var(--radius); padding:1.5rem; display:flex; flex-direction:column; gap:0.75rem; transition:border-color 0.2s, transform 0.2s; }
    .stat-card:hover { border-color:var(--accent); transform:translateY(-2px); }
    .stat-card-top { display:flex; align-items:flex-start; justify-content:space-between; }
    .stat-icon { width:40px; height:40px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:1.1rem; }
    .stat-icon.yellow { background:rgba(232,255,71,0.12); color:var(--accent); }
    .stat-icon.green  { background:rgba(74,222,128,0.12); color:var(--success); }
    .stat-icon.red    { background:rgba(248,113,113,0.12); color:var(--danger); }
    .stat-icon.blue   { background:rgba(96,165,250,0.12); color:#60a5fa; }
    .stat-change { font-size:0.72rem; font-weight:600; padding:0.15rem 0.45rem; border-radius:20px; }
    .stat-change.up   { background:rgba(74,222,128,0.12); color:var(--success); }
    .stat-change.down { background:rgba(248,113,113,0.12); color:var(--danger); }
    .stat-value { font-family:'Syne',sans-serif; font-weight:800; font-size:2rem; letter-spacing:-1px; color:var(--text); line-height:1; }
    .stat-label { font-size:0.78rem; color:var(--muted); font-weight:500; }
    .stat-bar { height:4px; background:var(--border); border-radius:2px; overflow:hidden; }
    .stat-bar-fill { height:100%; border-radius:2px; }

    .content-grid { display:grid; grid-template-columns:1fr 320px; gap:1.25rem; margin-bottom:1.25rem; }
    .panel-body { padding:1.5rem; }
    .td-price { font-family:'Syne',sans-serif; font-weight:700; color:var(--accent); }
    .td-category { font-size:0.75rem; color:var(--muted); }

    .chart-area { height:140px; background:var(--surface2); border-radius:10px; display:flex; align-items:flex-end; justify-content:space-between; padding:0 0.5rem 0.5rem; gap:4px; overflow:hidden; }
    .chart-bar { flex:1; border-radius:4px 4px 0 0; background:var(--border); min-width:0; }
    .chart-bar.highlight { background:var(--accent); }

    .quick-actions { display:grid; grid-template-columns:1fr 1fr; gap:0.6rem; }
    .quick-btn { display:flex; align-items:center; gap:0.5rem; padding:0.65rem 0.85rem; border-radius:10px; font-size:0.8rem; font-weight:600; cursor:pointer; text-decoration:none; background:var(--surface2); border:1px solid var(--border); color:var(--text); transition:border-color 0.15s, background 0.15s; }
    .quick-btn:hover { border-color:var(--accent); background:rgba(232,255,71,0.05); color:var(--accent); }

    .activity-list { display:flex; flex-direction:column; }
    .activity-item { display:flex; align-items:flex-start; gap:0.75rem; padding:0.85rem 0; border-bottom:1px solid var(--border); }
    .activity-item:last-child { border-bottom:none; padding-bottom:0; }
    .activity-item:first-child { padding-top:0; }
    .activity-dot { width:8px; height:8px; border-radius:50%; margin-top:5px; flex-shrink:0; }
    .activity-dot.green  { background:var(--success); }
    .activity-dot.yellow { background:var(--accent); }
    .activity-dot.red    { background:var(--danger); }
    .activity-text { font-size:0.82rem; color:var(--text); line-height:1.4; }
    .activity-time { font-size:0.72rem; color:var(--muted); margin-top:0.15rem; }
</style>

    <div class="page-title">Dashboard</div>
    <div class="page-subtitle">Bienvenido de vuelta — aquí está el resumen de hoy.</div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-card-top"><div class="stat-icon yellow">📦</div><span class="stat-change up">↑ 12%</span></div>
            <div class="stat-value">48</div>
            <div class="stat-label">Productos activos</div>
            <div class="stat-bar"><div class="stat-bar-fill" style="width:68%; background:var(--accent);"></div></div>
        </div>
        <div class="stat-card">
            <div class="stat-card-top"><div class="stat-icon green">💰</div><span class="stat-change up">↑ 8%</span></div>
            <div class="stat-value">$2.4M</div>
            <div class="stat-label">Ingresos del mes</div>
            <div class="stat-bar"><div class="stat-bar-fill" style="width:82%; background:var(--success);"></div></div>
        </div>
        <div class="stat-card">
            <div class="stat-card-top"><div class="stat-icon blue">👥</div><span class="stat-change up">↑ 5%</span></div>
            <div class="stat-value">134</div>
            <div class="stat-label">Usuarios activos</div>
            <div class="stat-bar"><div class="stat-bar-fill" style="width:55%; background:#60a5fa;"></div></div>
        </div>
        <div class="stat-card">
            <div class="stat-card-top"><div class="stat-icon red">🛒</div><span class="stat-change down">↓ 3%</span></div>
            <div class="stat-value">27</div>
            <div class="stat-label">Pedidos pendientes</div>
            <div class="stat-bar"><div class="stat-bar-fill" style="width:30%; background:var(--danger);"></div></div>
        </div>
    </div>

    <div class="content-grid">
        <div class="panel">
            <div class="panel-header">
                <div class="panel-title">Productos recientes</div>
                <a href="/product" class="btn btn-ghost" style="font-size:0.78rem; padding:0.35rem 0.9rem;">Ver todos →</a>
            </div>
            <table class="data-table">
                <thead><tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Estado</th></tr></thead>
                <tbody>
                    <tr><td class="td-id">#0012</td><td>Auriculares Pro X</td><td class="td-category">Electrónica</td><td class="td-price">$350.000</td><td><span class="badge badge-active">Activo</span></td></tr>
                    <tr><td class="td-id">#0011</td><td>Silla Ergonómica</td><td class="td-category">Muebles</td><td class="td-price">$890.000</td><td><span class="badge badge-active">Activo</span></td></tr>
                    <tr><td class="td-id">#0010</td><td>Teclado Mecánico</td><td class="td-category">Electrónica</td><td class="td-price">$220.000</td><td><span class="badge badge-inactive">Inactivo</span></td></tr>
                    <tr><td class="td-id">#0009</td><td>Monitor 4K 27"</td><td class="td-category">Electrónica</td><td class="td-price">$1.200.000</td><td><span class="badge badge-active">Activo</span></td></tr>
                    <tr><td class="td-id">#0008</td><td>Mochila Urbana</td><td class="td-category">Accesorios</td><td class="td-price">$145.000</td><td><span class="badge badge-active">Activo</span></td></tr>
                </tbody>
            </table>
        </div>

        <div style="display:flex; flex-direction:column; gap:1.25rem;">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">Ventas este mes</div>
                    <span style="font-size:0.72rem; color:var(--muted);">Últimos 30 días</span>
                </div>
                <div class="panel-body">
                    <div style="font-family:'Syne',sans-serif; font-weight:800; font-size:1.6rem; color:var(--accent); margin-bottom:0.4rem;">$2.4M</div>
                    <div style="font-size:0.75rem; color:var(--muted); margin-bottom:1rem;">↑ 8% vs mes anterior</div>
                    <div class="chart-area">
                        <div class="chart-bar" style="height:40%"></div>
                        <div class="chart-bar" style="height:55%"></div>
                        <div class="chart-bar" style="height:35%"></div>
                        <div class="chart-bar" style="height:70%"></div>
                        <div class="chart-bar" style="height:50%"></div>
                        <div class="chart-bar" style="height:80%"></div>
                        <div class="chart-bar" style="height:60%"></div>
                        <div class="chart-bar highlight" style="height:95%"></div>
                        <div class="chart-bar" style="height:75%"></div>
                        <div class="chart-bar" style="height:88%"></div>
                        <div class="chart-bar" style="height:65%"></div>
                        <div class="chart-bar highlight" style="height:100%"></div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-header"><div class="panel-title">Acciones rápidas</div></div>
                <div class="panel-body">
                    <div class="quick-actions">
                        <a href="/product/create" class="quick-btn">📦 Nuevo producto</a>
                        <a href="#categorias" class="quick-btn">🗂️ Categoría</a>
                        <a href="#" class="quick-btn">📊 Reporte</a>
                        <a href="#" class="quick-btn">⚙️ Ajustes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header">
            <div class="panel-title">Actividad reciente</div>
            <span style="font-size:0.75rem; color:var(--muted);">Hoy</span>
        </div>
        <div class="panel-body">
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-dot green"></div>
                    <div><div class="activity-text">Producto <strong>#0012 Auriculares Pro X</strong> agregado al catálogo.</div><div class="activity-time">Hace 10 min</div></div>
                </div>
                <div class="activity-item">
                    <div class="activity-dot yellow"></div>
                    <div><div class="activity-text">Precio de <strong>Silla Ergonómica</strong> actualizado a $890.000.</div><div class="activity-time">Hace 45 min</div></div>
                </div>
                <div class="activity-item">
                    <div class="activity-dot red"></div>
                    <div><div class="activity-text">Producto <strong>#0007 Lámpara LED</strong> eliminado del inventario.</div><div class="activity-time">Hace 2 h</div></div>
                </div>
                <div class="activity-item">
                    <div class="activity-dot green"></div>
                    <div><div class="activity-text">Nueva categoría <strong>Accesorios</strong> creada.</div><div class="activity-time">Hace 4 h</div></div>
                </div>
            </div>
        </div>
    </div>

@endsection
