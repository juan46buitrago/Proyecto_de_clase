<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
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
            <h1>Lista de Productos</h1>
            <a href="/product/create" class="btn btn-primary">+ Nuevo Producto</a>
        </div>

        {{-- LISTA DE PRODUCTOS --}}
        @if(isset($productos) && count($productos) > 0)

            <div class="products-grid">
                @foreach($productos as $producto)
                <div class="product-card">

                    {{-- IMAGEN --}}
                    @if($producto['imagen'] ?? null)
                        <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="card-image">
                    @else
                        <div class="card-image-placeholder">📦</div>
                    @endif

                    <div class="card-body">
                        <p class="card-id">#{{ $producto['id'] }}</p>
                        <h3>{{ $producto['nombre'] }}</h3>
                        <p class="price">${{ number_format($producto['precio'], 2) }}</p>
                        <p class="description">{{ $producto['descripcion'] }}</p>
                    </div>

                    <div class="card-footer">
                        <span class="badge {{ $producto['estado'] === 'activo' ? 'badge-active' : 'badge-inactive' }}">
                            {{ $producto['estado'] }}
                        </span>
                        <a href="/product/{{ $producto['id'] }}" class="btn btn-secondary">Ver detalle</a>
                    </div>

                </div>
                @endforeach
            </div>

        @else

            {{-- ESTADO VACÍO --}}
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <p>No hay productos registrados aún.</p>
                <a href="/product/create" class="btn btn-primary">Agregar primer producto</a>
            </div>

        @endif

    </div>

</body>
</html>