<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto — MiTienda</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('layout.navbar')

    <main class="main-content">
        <div class="container">

            <div class="page-header">
                <div>
                    <h1>Nuevo <em>Producto</em></h1>
                    <p>Completa los datos para registrar el producto</p>
                </div>
                <a href="/product" class="btn btn-ghost">← Volver</a>
            </div>

            <div class="form-wrap">
                <div class="form-card">

                    <div class="form-title">
                        <div class="form-title-icon">✦</div>
                        Información del Producto
                    </div>

                    <form action="/product" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">

                            {{-- NOMBRE --}}
                            <div class="form-group">
                                <label class="form-label" for="nombre">Nombre</label>
                                <input
                                    type="text"
                                    id="nombre"
                                    name="nombre"
                                    class="form-control"
                                    value="{{ old('nombre', 'Chaqueta Urban Pro') }}"
                                    placeholder="Ej: Camiseta Básica"
                                    required
                                >
                                @error('nombre')
                                    <span style="font-size:0.78rem;color:var(--danger);">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- PRECIO --}}
                            <div class="form-group">
                                <label class="form-label" for="precio">Precio ($)</label>
                                <input
                                    type="number"
                                    id="precio"
                                    name="precio"
                                    class="form-control"
                                    value="{{ old('precio', '89900') }}"
                                    placeholder="0"
                                    step="0.01"
                                    min="0"
                                    required
                                >
                                @error('precio')
                                    <span style="font-size:0.78rem;color:var(--danger);">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        {{-- DESCRIPCIÓN --}}
                        <div class="form-group">
                            <label class="form-label" for="descripcion">Descripción</label>
                            <textarea
                                id="descripcion"
                                name="descripcion"
                                class="form-control"
                                placeholder="Describe características, materiales, tallas..."
                                required
                            >{{ old('descripcion', 'Chaqueta de corte moderno con forro interior térmico. Ideal para clima frío y uso urbano diario. Disponible en tallas S al XL.') }}</textarea>
                            @error('descripcion')
                                <span style="font-size:0.78rem;color:var(--danger);">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- IMAGEN --}}
                        <div class="form-group">
                            <label class="form-label" for="imagen">Imagen del Producto</label>
                            <div class="img-upload-area" id="upload-area">
                                <input
                                    type="file"
                                    id="imagen"
                                    name="imagen"
                                    accept="image/*"
                                    onchange="previewImg(event)"
                                >
                                <div class="img-upload-icon" id="upload-icon">📷</div>
                                <div class="img-upload-text" id="upload-text">Haz clic o arrastra una imagen aquí</div>
                            </div>
                            <p class="form-hint">JPG, PNG o WEBP — Máx. 2MB</p>
                            @error('imagen')
                                <span style="font-size:0.78rem;color:var(--danger);">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- ACCIONES --}}
                        <div class="form-actions">
                            <a href="/product" class="btn btn-ghost">Cancelar</a>
                            <button type="submit" class="btn btn-accent">✓ Guardar Producto</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </main>

    

    <script>
        function previewImg(event) {
            const file = event.target.files[0];
            const area = document.getElementById('upload-area');
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                // Ocultar iconos
                document.getElementById('upload-icon').style.display = 'none';
                document.getElementById('upload-text').style.display = 'none';

                // Mostrar imagen preview
                let img = area.querySelector('img.img-preview');
                if (!img) {
                    img = document.createElement('img');
                    img.className = 'img-preview';
                    img.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;object-fit:cover;pointer-events:none;';
                    area.appendChild(img);
                }
                img.src = e.target.result;
                area.style.borderColor = 'var(--accent)';
            };
            reader.readAsDataURL(file);
        }
    </script>
        @include('layout.footer')
</body>
</html>