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
                <div style="display:flex; gap:0.75rem;">
                    @php $cartCount = count(session('cart', [])); @endphp
                    @if($cartCount > 0)
                        <a href="{{ route('cart.index') }}" class="btn btn-ghost">
                            🛒 Carrito ({{ $cartCount }})
                        </a>
                    @endif
                    <a href="/product/create" class="btn btn-accent">+ Agregar producto</a>
                </div>
            </div>

            <p class="section-label">Catálogo</p>

            <div class="products-grid">
                @foreach($misProductos as $p)
                    <div class="product-card">
                        <a href="/product/{{ $p->id }}" style="text-decoration:none;color:inherit;">
                            <div class="card-img-wrap">
                                @if($p->image)
                                    <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}">
                                @else
                                    <img src="https://www.shutterstock.com/image-vector/defect-icon-element-design-600nw-2615276675.jpg" alt="Sin imagen">
                                @endif
                                <div class="card-img-overlay">
                                    <span class="badge badge-active">activo</span>
                                </div>
                                <div class="card-id-tag">#{{ str_pad($p->id, 4, '0', STR_PAD_LEFT) }}</div>
                            </div>
                            <div class="card-body">
                                <div class="name">{{ $p->name }}</div>
                                <div class="card-desc">{{ Str::limit($p->description, 80) }}</div>
                                <div style="font-size:0.78rem;color:var(--muted);margin-top:0.3rem;">
                                    Categoría: {{ $p->category->name ?? $p->category_id }}
                                </div>
                            </div>
                            <div class="card-footer-strip">
                                <span class="price">${{ number_format($p->price, 0, ',', '.') }}</span>
                                <span class="btn btn-ghost" style="font-size:0.8rem;padding:0.35rem 0.85rem;">Ver →</span>
                            </div>
                        </a>
                        <form action="{{route('product.destroy',$p)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                @endforeach
            </div>

        </div>
    </main>

@endsection