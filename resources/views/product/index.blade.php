<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos — MiTienda</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('layout.navbar') 

    <main class="main-content">
        <div class="container">

            <div class="page-header">
                <div>
                    <h1>Nuestros <em>Productos</em></h1>
                    <p>3 productos disponibles</p>
                </div>
                <a href="/product/create" class="btn btn-accent">+ Agregar producto</a>
            </div>

            <p class="section-label">Catálogo</p>

            <div class="products-grid">

                {{-- Producto 1 --}}
                <a href="/product/1" class="product-card">
                    <div class="card-img-wrap">
                        <img
                            src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=80"
                            alt="Sneaker Air Volt"
                        >
                        <div class="card-img-overlay">
                            <span class="badge badge-active">activo</span>
                        </div>
                        <div class="card-id-tag">#0001</div>
                    </div>
                    <div class="card-body">
                        <div class="card-name">Sneaker Air Volt</div>
                        <div class="card-desc">
                            Zapatilla de alto rendimiento con suela de amortiguación avanzada.
                            Diseño ergonómico y transpirable para uso diario o deportivo.
                        </div>
                    </div>
                    <div class="card-footer-strip">
                        <span class="card-price">$249.900</span>
                        <span class="btn btn-ghost" style="font-size:0.8rem;padding:0.35rem 0.85rem;">Ver →</span>
                    </div>
                </a>

                {{-- Producto 2 --}}
                <a href="/product/2" class="product-card">
                    <div class="card-img-wrap">
                        <img
                            src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=600&q=80"
                            alt="Mochila Trekker 30L"
                        >
                        <div class="card-img-overlay">
                            <span class="badge badge-active">activo</span>
                        </div>
                        <div class="card-id-tag">#0002</div>
                    </div>
                    <div class="card-body">
                        <div class="card-name">Mochila Trekker 30L</div>
                        <div class="card-desc">
                            Mochila resistente al agua con capacidad de 30 litros,
                            múltiples compartimentos y soporte lumbar para aventuras largas.
                        </div>
                    </div>
                    <div class="card-footer-strip">
                        <span class="card-price">$189.900</span>
                        <span class="btn btn-ghost" style="font-size:0.8rem;padding:0.35rem 0.85rem;">Ver →</span>
                    </div>
                </a>

                {{-- Producto 3 --}}
                <a href="/product/3" class="product-card">
                    <div class="card-img-wrap">
                        <img
                            src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600&q=80"
                            alt="Reloj Minimalista Nero"
                        >
                        <div class="card-img-overlay">
                            <span class="badge badge-inactive">inactivo</span>
                        </div>
                        <div class="card-id-tag">#0003</div>
                    </div>
                    <div class="card-body">
                        <div class="card-name">Reloj Minimalista Nero</div>
                        <div class="card-desc">
                            Reloj de diseño minimalista con correa de cuero genuino.
                            Mecanismo de cuarzo japonés y resistencia al agua de 50m.
                        </div>
                    </div>
                    <div class="card-footer-strip">
                        <span class="card-price">$379.000</span>
                        <span class="btn btn-ghost" style="font-size:0.8rem;padding:0.35rem 0.85rem;">Ver →</span>
                    </div>
                </a>

            </div>
        </div>
    </main>

    @include('layout.footer')

</body>
</html>