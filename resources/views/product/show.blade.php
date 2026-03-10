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
                        src="{{ $p->image ? asset('storage/' . $p->image) : 'https://www.shutterstock.com/image-vector/defect-icon-element-design-600nw-2615276675.jpg' }}"
                        alt="{{ $p->name }}"
                    >
                </div>

                {{-- INFORMACIÓN --}}
                <div class="show-body">

                    <div class="show-id-tag">Producto #{{ str_pad($p->id, 4, '0', STR_PAD_LEFT) }}</div>
                    <div class="show-name">{{ $p->name }}</div>

                    <div class="info-group">
                        <div class="info-label">Precio</div>
                        <div class="info-price">${{ number_format($p->price, 0, ',', '.') }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Descripción</div>
                        <div class="info-value">{{ $p->description }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Estado</div>
                        <div class="info-value">
                            <span class="badge badge-active">activo</span>
                        </div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Categoría</div>
                        <div class="info-value">{{ $p->category->name ?? $p->category_id }}</div>
                    </div>

                    @if($p->image)
                    <div class="info-group">
                        <div class="info-label">Imagen (URL)</div>
                        <div class="info-value info-url">{{ asset('storage/' . $p->image) }}</div>
                    </div>
                    @endif

                    <div class="show-actions">
                        <a href="/product" class="btn btn-ghost">← Volver a la lista</a>
                        <a href="/product/create" class="btn btn-accent">+ Nuevo producto</a>
                    </div>

                </div>
            </div>

        </div>
    </main>

@endsection