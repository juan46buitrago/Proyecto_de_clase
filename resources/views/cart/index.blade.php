@extends('layout.app')
@section('title', 'Carrito de compras')
@section('content')

<main class="main-content">
    <div class="container">

        <div class="page-header">
            <div>
                <h1>Tu <em>Carrito</em></h1>
                <p>{{ count($cart) }} {{ count($cart) === 1 ? 'producto' : 'productos' }} en el carrito</p>
            </div>
            <a href="/product" class="btn btn-ghost">← Seguir comprando</a>
        </div>

        {{-- MENSAJE ÉXITO --}}
        @if(session('success'))
            <div style="background:rgba(74,222,128,0.1); border:1px solid rgba(74,222,128,0.3); border-radius:var(--radius); padding:1rem 1.5rem; margin-bottom:1.5rem; display:flex; align-items:center; gap:0.75rem;">
                <span style="font-size:1.3rem;">✅</span>
                <div>
                    <div style="font-weight:600; color:var(--success);">{{ session('success') }}</div>
                    <div style="font-size:0.82rem; color:var(--muted); margin-top:0.2rem;">Gracias por tu compra. Tu pedido está en camino.</div>
                </div>
            </div>
        @endif

        @if(empty($cart))
            {{-- CARRITO VACÍO --}}
            <div style="text-align:center; padding:5rem 0;">
                <div style="font-size:4rem; margin-bottom:1rem;">🛒</div>
                <h2 style="font-family:'Syne',sans-serif; font-weight:700; font-size:1.5rem; margin-bottom:0.75rem;">Tu carrito está vacío</h2>
                <p style="color:var(--muted); margin-bottom:2rem;">Agrega productos desde el catálogo.</p>
                <a href="/product" class="btn btn-accent" style="font-size:1rem; padding:0.75rem 2rem;">Ver catálogo →</a>
            </div>

        @else
            <div style="display:grid; grid-template-columns:1fr 340px; gap:1.5rem; align-items:start;">

                {{-- TABLA PRODUCTOS --}}
                <div style="background:var(--surface); border:1px solid var(--border); border-radius:var(--radius); overflow:hidden;">

                    @foreach($cart as $item)
                        <div style="display:flex; align-items:center; gap:1.25rem; padding:1.25rem 1.5rem; border-bottom:1px solid var(--border);">

                            {{-- IMAGEN --}}
                            <div style="width:72px; height:72px; border-radius:10px; overflow:hidden; background:var(--surface2); flex-shrink:0;">
                                @if($item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                         style="width:100%; height:100%; object-fit:cover;">
                                @else
                                    <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; font-size:1.8rem;">📦</div>
                                @endif
                            </div>

                            {{-- INFO --}}
                            <div style="flex:1; min-width:0;">
                                <div style="font-family:'Syne',sans-serif; font-weight:700; font-size:1rem; margin-bottom:0.2rem;">{{ $item['name'] }}</div>
                                <div style="font-size:0.82rem; color:var(--muted);">Cantidad: {{ $item['quantity'] }}</div>
                            </div>

                            {{-- PRECIO --}}
                            <div style="font-family:'Syne',sans-serif; font-weight:800; font-size:1.15rem; color:var(--accent); white-space:nowrap; margin-right:1rem;">
                                ${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </div>

                            {{-- ELIMINAR --}}
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn"
                                        style="background:rgba(248,113,113,0.1); color:var(--danger); border:1px solid rgba(248,113,113,0.2); padding:0.4rem 0.9rem; font-size:0.82rem;"
                                        title="Eliminar del carrito">
                                    ✕ Quitar
                                </button>
                            </form>

                        </div>
                    @endforeach

                </div>

                {{-- RESUMEN --}}
                <div style="background:var(--surface); border:1px solid var(--border); border-radius:var(--radius); padding:1.75rem; position:sticky; top:80px;">

                    <div style="font-family:'Syne',sans-serif; font-weight:700; font-size:1rem; margin-bottom:1.5rem; padding-bottom:1rem; border-bottom:1px solid var(--border);">
                        Resumen del pedido
                    </div>

                    {{-- DESGLOSE --}}
                    @foreach($cart as $item)
                        <div style="display:flex; justify-content:space-between; font-size:0.82rem; color:var(--muted); margin-bottom:0.5rem;">
                            <span>{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                            <span>${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                        </div>
                    @endforeach

                    {{-- TOTAL --}}
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-top:1.25rem; padding-top:1.25rem; border-top:1px solid var(--border);">
                        <span style="font-family:'Syne',sans-serif; font-weight:700; font-size:1rem;">Total</span>
                        <span style="font-family:'Syne',sans-serif; font-weight:800; font-size:1.6rem; color:var(--accent);">
                            ${{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>

                    {{-- COMPRAR --}}
                    <form action="{{ route('cart.buy') }}" method="POST" style="margin-top:1.5rem;">
                        @csrf
                        <button type="submit" class="btn btn-accent" style="width:100%; font-size:1rem; padding:0.85rem; justify-content:center;">
                            💳 Comprar ahora
                        </button>
                    </form>

                    <a href="/product" class="btn btn-ghost" style="width:100%; margin-top:0.75rem; justify-content:center; font-size:0.875rem;">
                        ← Seguir comprando
                    </a>

                </div>
            </div>
        @endif

    </div>
</main>

@endsection
