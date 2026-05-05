<x-app-layout>
<body class="form-body">
    <div class="form-container">
        <a href="{{ route('productos.index') }}" class="form-back-link">← Volver al listado</a>
        <div class="form-header">
            <h1>Editar producto</h1>
            <p class="form-subtitle">Actualice la información del producto seleccionado</p>
        </div>

        @if ($errors->any())
            <div class="foodlink-alert foodlink-alert-error">Revisa los campos marcados antes de guardar los cambios.</div>
        @endif

        <form class="product-form" action="{{ route('productos.update', $producto->id_producto) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group">
                    <label for="nombre">Nombre del producto</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                    @error('nombre')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="restaurante_visual">Restaurante asociado</label>
                    <select id="restaurante_visual" disabled>
                        <option>FoodLink Demo</option>
                        <option>Burger House</option>
                        <option>Pizza Italia</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <div class="input-with-addon">
                        <input type="number" id="precio" name="precio" step="0.01" min="0" value="{{ old('precio', $producto->precio) }}" required>
                        <span class="addon">€</span>
                    </div>
                    @error('precio')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" min="0" value="{{ old('stock', $producto->stock) }}" required>
                    @error('stock')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="disponible">Disponibilidad</label>
                    <select id="disponible" name="disponible">
                        <option value="1" {{ old('disponible', $producto->disponible) ? 'selected' : '' }}>Disponible</option>
                        <option value="0" {{ !old('disponible', $producto->disponible) ? 'selected' : '' }}>No disponible</option>
                    </select>
                    @error('disponible')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen del producto</label>
                    <input type="text" id="imagen" name="imagen" value="{{ old('imagen', $producto->imagen) }}" placeholder="https://example.com/imagen.jpg">
                    @error('imagen')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-group full-width">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="5">{{ old('descripcion', $producto->descripcion) }}</textarea>
                @error('descripcion')<span class="error-text">{{ $message }}</span>@enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('productos.index') }}" class="btn btn-cancel" style="text-decoration:none;">Cancelar</a>
                <button type="submit" class="btn btn-save">Guardar cambios</button>
            </div>
        </form>
    </div>
</body>
</x-app-layout>
