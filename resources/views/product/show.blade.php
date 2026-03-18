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

                    @if(session('added'))
                        <div style="background:rgba(74,222,128,0.1); border:1px solid rgba(74,222,128,0.3); border-radius:10px; padding:0.75rem 1rem; font-size:0.85rem; color:var(--success); margin-bottom:1rem;">
                            ✅ <strong>{{ session('added') }}</strong> agregado al carrito.
                            <a href="{{ route('cart.index') }}" style="color:var(--accent); font-weight:600; margin-left:0.5rem;">Ver carrito →</a>
                        </div>
                    @endif

                    <div class="show-actions">
                        <a href="/product" class="btn btn-ghost">← Volver</a>
                        <form action="{{ route('cart.add', $p) }}" method="POST" style="margin:0;">
                            @csrf
                            <button type="submit" class="btn btn-accent" style="font-size:1rem; padding:0.65rem 1.5rem;">
                                🛒 Agregar al carrito
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </main>

@endsection