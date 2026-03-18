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

    <div class="panel" style="margin-bottom:1.25rem;">
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

    {{-- ══════════════════════════════════════
         CATEGORÍAS — CRUD completo
    ══════════════════════════════════════ --}}
    <div id="categorias" style="display:grid; grid-template-columns:1fr 380px; gap:1.25rem; align-items:start;">

        {{-- TABLA --}}
        <div class="panel">
            <div class="panel-header">
                <div class="panel-title">🗂️ Categorías</div>
                <span style="font-size:0.78rem; color:var(--muted);">{{ $categories->count() }} registradas</span>
            </div>

            @if($categories->isEmpty())
                <div style="padding:2.5rem; text-align:center; color:var(--muted);">
                    <div style="font-size:2rem; margin-bottom:0.5rem;">🗂️</div>
                    <p style="font-size:0.85rem;">No hay categorías aún. Crea una desde el formulario.</p>
                </div>
            @else
                <table class="data-table">
                    <thead>
                        <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Acciones</th></tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $cat)
                            <tr>
                                <td class="td-id">#{{ str_pad($cat->id, 3, '0', STR_PAD_LEFT) }}</td>
                                <td style="font-weight:600;">{{ $cat->name }}</td>
                                <td style="color:var(--muted); font-size:0.8rem;">{{ Str::limit($cat->description, 55) }}</td>
                                <td class="td-actions">
                                    <button onclick="toggleEdit({{ $cat->id }}, '{{ addslashes($cat->name) }}', '{{ addslashes($cat->description) }}')"
                                            class="tbl-btn tbl-btn-edit">✏️ Editar</button>
                                    <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar {{ $cat->name }}?')">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="tbl-btn tbl-btn-del">✕</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        {{-- FORMULARIOS --}}
        <div style="display:flex; flex-direction:column; gap:1rem;">

            <div class="panel" id="form-crear">
                <div class="panel-header"><div class="panel-title">+ Nueva categoría</div></div>
                <div class="panel-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name') }}" placeholder="Ej: Electrónica">
                            @error('name')<span style="font-size:0.75rem; color:var(--danger);">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Descripción</label>
                            <textarea name="description" class="form-control"
                                      placeholder="Describe la categoría..." style="min-height:80px;">{{ old('description') }}</textarea>
                            @error('description')<span style="font-size:0.75rem; color:var(--danger);">{{ $message }}</span>@enderror
                        </div>
                        <button type="submit" class="btn btn-accent" style="width:100%;">✓ Guardar categoría</button>
                    </form>
                </div>
            </div>

            <div class="panel" id="form-editar" style="display:none; border-color:var(--accent);">
                <div class="panel-header" style="border-color:rgba(232,255,71,0.2);">
                    <div class="panel-title" style="color:var(--accent);">✏️ Editando categoría</div>
                    <button onclick="cancelEdit()" style="background:none; border:none; color:var(--muted); cursor:pointer; font-size:1rem;">✕</button>
                </div>
                <div class="panel-body">
                    <form id="edit-form" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input type="text" id="edit-name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Descripción</label>
                            <textarea id="edit-description" name="description" class="form-control" style="min-height:80px;"></textarea>
                        </div>
                        <div style="display:flex; gap:0.5rem;">
                            <button type="button" onclick="cancelEdit()" class="btn btn-ghost" style="flex:1;">Cancelar</button>
                            <button type="submit" class="btn btn-accent" style="flex:2;">✓ Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        function toggleEdit(id, name, description) {
            document.getElementById('edit-form').action = '/admin/categories/' + id;
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-description').value = description;
            document.getElementById('form-editar').style.display = 'block';
            document.getElementById('form-crear').style.display = 'none';
            document.getElementById('form-editar').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
        function cancelEdit() {
            document.getElementById('form-editar').style.display = 'none';
            document.getElementById('form-crear').style.display = 'block';
        }
    </script>

@endsection
