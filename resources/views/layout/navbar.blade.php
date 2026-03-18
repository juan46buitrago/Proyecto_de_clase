<nav class="=navbar">
    <a href="#" class="navbar-brand">JetProduct</a>
    <ul class="nav-links">
        <li><a href="#">Dasboard</a></li></ul>
<li><a href="#">Inventario</a></li></ul>
<li><a href="#">ventas</a></li></ul>
<li><a href="#">configuracion</a></li></ul>
<li>
    @php $cartCount = count(session('cart', [])); @endphp
    <a href="{{ route('cart.index') }}"
       style="display:inline-flex; align-items:center; gap:0.5rem;
              background:var(--accent); color:var(--bg);
              font-family:'Syne',sans-serif; font-weight:700; font-size:0.875rem;
              padding:0.45rem 1.1rem; border-radius:8px;
              text-decoration:none; transition:opacity 0.2s;"
       onmouseover="this.style.opacity='.85'" onmouseout="this.style.opacity='1'">
        🛒 Carrito
        @if($cartCount > 0)
            <span style="background:var(--bg); color:var(--accent); font-size:0.68rem; font-weight:800;
                         width:18px; height:18px; border-radius:50%; display:inline-flex;
                         align-items:center; justify-content:center; flex-shrink:0;">
                {{ $cartCount }}
            </span>
        @endif
    </a>
</li>


    </nav>
