@extends('layout.app')
@section('title', 'Detalle del producto')
@section('content')

    <main class="main-content">
        <div class="container">

            <div class="page-header">
                <div>
                    <h1>Detalle del <em>Producto</em></h1>
                </div>
                <a href="/product" class="btn btn-ghost">← Volver</a>
            </div>

            <div class="show-layout">

                {{-- IMAGEN --}}
                <div class="show-img-wrap">
                    <img
                        src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80"
                        alt="Sneaker Air Volt"
                    >
                </div>

                {{-- INFORMACIÓN --}}
                <div class="show-body">

                    <div class="show-id-tag">Producto #0001</div>
                    <div class="show-name">Sneaker Air Volt</div>

                    <div class="info-group">
                        <div class="info-label">Precio</div>
                        <div class="info-price">$249.900</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Descripción</div>
                        <div class="info-value">
                            Zapatilla de alto rendimiento con suela de amortiguación avanzada.
                            Diseño ergonómico y transpirable para uso diario o deportivo.
                            Disponible en tallas 36 al 44.
                        </div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Estado</div>
                        <div class="info-value">
                            <span class="badge badge-active">activo</span>
                        </div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Imagen (URL)</div>
                        <div class="info-value info-url">
                            https://images.unsplash.com/photo-1542291026-7eec264c27ff
                        </div>
                    </div>

                    <div class="show-actions">
                        <a href="/product" class="btn btn-ghost">← Volver a la lista</a>
                        <a href="/product/create" class="btn btn-accent">+ Nuevo producto</a>
                    </div>

                </div>
            </div>

        </div>
    </main>

@endsection
