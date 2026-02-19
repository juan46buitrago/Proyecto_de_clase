<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- NAVBAR --}}
    <nav>
        <a href="/" class="brand">🛍️ MiTienda</a>
        <div class="nav-links">
            <a href="/">Inicio</a>
            <a href="/product">Productos</a>
            <a href="/product/create" class="active">Agregar</a>
        </div>
    </nav>

    {{-- CONTENIDO --}}
    <div class="container">

        <div class="page-header">
            <h1>Nuevo Producto</h1>
            <a href="/product" class="btn btn-back">← Volver</a>
        </div>

        <div class="form-card">
            <h2>📦 Información del Producto</h2>

            <form action="/product" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- NOMBRE --}}
                <div class="form-group">
                    <label for="nombre">Nombre del Producto</label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        placeholder="Ej: Camiseta Deportiva"
                        value="{{ old('nombre') }}"
                        required
                    >
                    @error('nombre')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- PRECIO --}}
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input
                        type="number"
                        id="precio"
                        name="precio"
                        placeholder="0.00"
                        step="0.01"
                        min="0"
                        value="{{ old('precio') }}"
                        required
                    >
                    <span class="input-hint">Ingresa el precio en tu moneda local.</span>
                    @error('precio')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- DESCRIPCIÓN --}}
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Describe el producto brevemente..."
                        required
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- IMAGEN --}}
                <div class="form-group">
                    <label for="imagen">Imagen del Producto</label>
                    <input
                        type="file"
                        id="imagen"
                        name="imagen"
                        accept="image/*"
                        onchange="previewImage(event)"
                    >
                    <span class="input-hint">Formatos aceptados: JPG, PNG, WEBP. Máx. 2MB.</span>
                    @error('imagen')
                        <span class="error">{{ $message }}</span>
                    @enderror

                    {{-- PREVIEW --}}
                    <div class="image-preview" id="imagePreview">
                        <span>Vista previa de la imagen</span>
                    </div>
                </div>

                {{-- ACCIONES --}}
                <div class="form-actions">
                    <a href="/product" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>

            </form>
        </div>

    </div>

    {{-- PREVIEW SCRIPT --}}
    <script>
        function previewImage(event) {
            const preview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Vista previa">`;
                };
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '<span>Vista previa de la imagen</span>';
            }
        }
    </script>

</body>
</html>