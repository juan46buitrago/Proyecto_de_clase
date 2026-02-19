<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- NAVBAR --}}
    <nav>
        <a href="/" class="brand">🛍️ MiTienda</a>
        <div class="nav-links">
            <a href="/">Inicio</a>
            <a href="/product" class="active">Productos</a>
            <a href="/product/create">Agregar</a>
        </div>
    </nav>

    {{-- CONTENIDO --}}
    <div class="container">

        <div class="page-header">
            <h1>Detalle del Producto</h1>
            <a href="/product" class="btn btn-back">← Volver</a>
        </div>

        <div class="show-card">

            {{-- IMAGEN --}}
            @if(isset($producto['imagen']) && $producto['imagen'])
                <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="show-image">
            @else
                <div class="show-image-placeholder">📦</div>
            @endif

            {{-- INFORMACIÓN --}}
            <div class="show-body">

                <div class="info-row">
                    <label>ID del Producto</label>
                    <span>#{{ $producto['id'] ?? '—' }}</span>
                </div>

                <h2>{{ $producto['nombre'] ?? '—' }}</h2>

                <div class="info-row">
                    <label>Precio</label>
                    <span class="show-price">${{ number_format($producto['precio'] ?? 0, 2) }}</span>
                </div>

                <div class="info-row">
                    <label>Descripción</label>
                    <span>{{ $producto['descripcion'] ?? 'Sin descripción.' }}</span>
                </div>

                <div class="info-row">
                    <label>Estado</label>
                    <span>
                        <span class="badge {{ ($producto['estado'] ?? '') === 'activo' ? 'badge-active' : 'badge-inactive' }}">
                            {{ $producto['estado'] ?? '—' }}
                        </span>
                    </span>
                </div>

                <div class="info-row">
                    <label>Imagen (URL)</label>
                    <span>{{ $producto['imagen'] ?? 'Sin imagen' }}</span>
                </div>

                <div class="show-actions">
                    <a href="/product" class="btn btn-secondary">← Volver a la lista</a>
                    <a href="/product/create" class="btn btn-primary">+ Nuevo Producto</a>
                </div>

            </div>
        </div>

    </div>

</body>
</html>
