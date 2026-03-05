@extends('layout.app')
@section('title', 'Productos')
@section('content')

    <main class="main-content">
        <div class="container">

            <div class="page-header">
                <div>
                    <h1>Nuestros <em>Productos</em></h1>
                    <p>{{ $misProductos->count() }} productos disponibles</p>
                </div>
                <a href="/product/create" class="btn btn-accent">+ Agregar producto</a>
            </div>

            <p class="section-label">Catálogo</p>

            <div class="products-grid">
                @foreach($misProductos as $p)
                    <a href="/product/{{ $p->id }}" class="product-card">
                        <div class="card-img-wrap">
                            <img
                                src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=80"
                                alt="{{ $p->name }}"
                            >
                            <div class="card-img-overlay">
                                <span class="badge badge-active">activo</span>
                            </div>
                            <div class="card-id-tag">#{{ str_pad($p->id, 4, '0', STR_PAD_LEFT) }}</div>
                        </div>
                        <div class="card-body">
                            <div class="name">{{ $p->name }}</div>
                            <div class="card-desc">{{ $p->description }}</div>
                        </div>
                        <div class="card-footer-strip">
                            <span class="price">${{ number_format($p->price, 0, ',', '.') }}</span>
                            <span class="btn btn-ghost" style="font-size:0.8rem;padding:0.35rem 0.85rem;">Ver →</span>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </main>

@endsection