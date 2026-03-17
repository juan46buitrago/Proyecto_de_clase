@extends('layout.app')
@section('title', 'JetProduct — Gestión de Inventario')
@section('content')

<main class="main-content">

    {{-- HERO --}}
    <section style="padding: 6rem 0 5rem; text-align: center; position: relative; overflow: hidden;">
        <div class="container" style="position: relative; z-index: 1;">

            <span class="badge badge-active" style="margin-bottom: 1.5rem; font-size: 0.72rem;">
                ✦ Plataforma de inventario
            </span>

            <h1 style="font-family: 'Syne', sans-serif; font-weight: 800; font-size: clamp(2.8rem, 7vw, 5rem); letter-spacing: -2px; line-height: 1.05; margin: 1rem 0 1.5rem;">
                Gestiona tus <em style="font-style: normal; color: var(--accent);">productos</em><br>sin complicaciones
            </h1>

            <p style="font-size: 1.1rem; color: var(--muted); max-width: 520px; margin: 0 auto 2.5rem; line-height: 1.7;">
                JetProduct centraliza tu catálogo, controla precios y organiza tu inventario
                en un solo lugar, rápido y sin fricciones.
            </p>

            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="/product" class="btn btn-accent" style="font-size: 1rem; padding: 0.75rem 2rem;">
                    Ver catálogo →
                </a>
                <a href="/product/create" class="btn btn-ghost" style="font-size: 1rem; padding: 0.75rem 2rem;">
                    + Agregar producto
                </a>
            </div>
        </div>

        {{-- Fondo decorativo --}}
        <div style="position: absolute; top: -120px; left: 50%; transform: translateX(-50%);
                    width: 700px; height: 700px; border-radius: 50%;
                    background: radial-gradient(circle, rgba(232,255,71,0.06) 0%, transparent 70%);
                    pointer-events: none;"></div>
    </section>

    {{-- DIVISOR --}}
    <div class="container">
        <div style="height: 1px; background: var(--border); margin-bottom: 4rem;"></div>
    </div>

    {{-- STATS --}}
    <section style="padding-bottom: 4rem;">
        <div class="container">
            <p class="section-label">Por qué JetProduct</p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">

                <div style="background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; text-align: center;">
                    <div style="font-family: 'Syne', sans-serif; font-size: 2.8rem; font-weight: 800; color: var(--accent); margin-bottom: 0.4rem;">100%</div>
                    <div style="font-size: 0.875rem; color: var(--muted);">Control de inventario</div>
                </div>

                <div style="background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; text-align: center;">
                    <div style="font-family: 'Syne', sans-serif; font-size: 2.8rem; font-weight: 800; color: var(--accent); margin-bottom: 0.4rem;">∞</div>
                    <div style="font-size: 0.875rem; color: var(--muted);">Productos sin límite</div>
                </div>

                <div style="background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; text-align: center;">
                    <div style="font-family: 'Syne', sans-serif; font-size: 2.8rem; font-weight: 800; color: var(--accent); margin-bottom: 0.4rem;">1</div>
                    <div style="font-size: 0.875rem; color: var(--muted);">Lugar centralizado</div>
                </div>

                <div style="background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; text-align: center;">
                    <div style="font-family: 'Syne', sans-serif; font-size: 2.8rem; font-weight: 800; color: var(--accent); margin-bottom: 0.4rem;">0</div>
                    <div style="font-size: 0.875rem; color: var(--muted);">Configuración compleja</div>
                </div>

            </div>
        </div>
    </section>

    {{-- FEATURES --}}
    <section style="padding: 3rem 0 5rem;">
        <div class="container">
            <p class="section-label">Funcionalidades</p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.25rem;">

                <div style="background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; transition: border-color 0.2s;" onmouseover="this.style.borderColor='var(--accent)'" onmouseout="this.style.borderColor='var(--border)'">
                    <div style="font-size: 2rem; margin-bottom: 1.1rem;">📦</div>
                    <h3 style="font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.05rem; margin-bottom: 0.6rem;">Catálogo visual</h3>
                    <p style="font-size: 0.875rem; color: var(--muted); line-height: 1.6;">Visualiza todos tus productos con imágenes, precios y categorías en una cuadrícula limpia y ordenada.</p>
                </div>

                <div style="background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; transition: border-color 0.2s;" onmouseover="this.style.borderColor='var(--accent)'" onmouseout="this.style.borderColor='var(--border)'">
                    <div style="font-size: 2rem; margin-bottom: 1.1rem;">✏️</div>
                    <h3 style="font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.05rem; margin-bottom: 0.6rem;">Carga rápida</h3>
                    <p style="font-size: 0.875rem; color: var(--muted); line-height: 1.6;">Agrega nuevos productos con formularios intuitivos: nombre, descripción, precio, categoría e imagen.</p>
                </div>

                <div style="background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; transition: border-color 0.2s;" onmouseover="this.style.borderColor='var(--accent)'" onmouseout="this.style.borderColor='var(--border)'">
                    <div style="font-size: 2rem; margin-bottom: 1.1rem;">🔍</div>
                    <h3 style="font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.05rem; margin-bottom: 0.6rem;">Detalle completo</h3>
                    <p style="font-size: 0.875rem; color: var(--muted); line-height: 1.6;">Consulta cada producto con toda su información en una vista clara, con accesos directos a las acciones.</p>
                </div>

                <div style="background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; transition: border-color 0.2s;" onmouseover="this.style.borderColor='var(--accent)'" onmouseout="this.style.borderColor='var(--border)'">
                    <div style="font-size: 2rem; margin-bottom: 1.1rem;">🗂️</div>
                    <h3 style="font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.05rem; margin-bottom: 0.6rem;">Categorías</h3>
                    <p style="font-size: 0.875rem; color: var(--muted); line-height: 1.6;">Organiza tu inventario por categorías para encontrar cualquier producto en segundos.</p>
                </div>

                <div style="background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; transition: border-color 0.2s;" onmouseover="this.style.borderColor='var(--accent)'" onmouseout="this.style.borderColor='var(--border)'">
                    <div style="font-size: 2rem; margin-bottom: 1.1rem;">🗑️</div>
                    <h3 style="font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.05rem; margin-bottom: 0.6rem;">Gestión total</h3>
                    <p style="font-size: 0.875rem; color: var(--muted); line-height: 1.6;">Elimina productos obsoletos y mantén tu catálogo actualizado con un solo clic.</p>
                </div>

                <div style="background: var(--surface2); border: 1.5px dashed var(--border); border-radius: var(--radius); padding: 2rem; display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 0.75rem; text-align: center;">
                    <div style="font-size: 2rem;">⚡</div>
                    <h3 style="font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.05rem;">Más por venir</h3>
                    <p style="font-size: 0.875rem; color: var(--muted); line-height: 1.6;">Reportes, exportación y más funciones en camino.</p>
                </div>

            </div>
        </div>
    </section>

    {{-- CTA FINAL --}}
    <section style="padding-bottom: 6rem;">
        <div class="container">
            <div style="background: var(--surface); border: 1px solid var(--border); border-radius: 20px; padding: 4rem 2.5rem; text-align: center; position: relative; overflow: hidden;">

                {{-- Glow decorativo --}}
                <div style="position: absolute; bottom: -80px; left: 50%; transform: translateX(-50%);
                            width: 500px; height: 300px; border-radius: 50%;
                            background: radial-gradient(circle, rgba(232,255,71,0.08) 0%, transparent 70%);
                            pointer-events: none;"></div>

                <div style="position: relative; z-index: 1;">
                    <h2 style="font-family: 'Syne', sans-serif; font-weight: 800; font-size: clamp(1.8rem, 4vw, 2.8rem); letter-spacing: -1px; margin-bottom: 1rem;">
                        Listo para comenzar
                    </h2>
                    <p style="color: var(--muted); font-size: 1rem; max-width: 420px; margin: 0 auto 2rem; line-height: 1.7;">
                        Explora el catálogo actual o agrega tu primer producto ahora mismo.
                    </p>
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                        <a href="/product" class="btn btn-accent" style="font-size: 1rem; padding: 0.75rem 2rem;">
                            Ir al catálogo →
                        </a>
                        <a href="/product/create" class="btn btn-outline" style="font-size: 1rem; padding: 0.75rem 2rem;">
                            + Nuevo producto
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
