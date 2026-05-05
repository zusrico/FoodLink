<x-app-layout>
<body class="form-body">
    <div class="form-container">
        <a href="{{ route('dashboard') }}" class="form-back-link">← Volver al panel</a>
        <div class="form-header">
            <h1>Nuevo producto</h1>
            <p class="form-subtitle">Complete la información del producto para añadirlo al catálogo</p>
        </div>

        @if ($errors->any())
            <div class="foodlink-alert foodlink-alert-error">Revisa los campos marcados antes de guardar el producto.</div>
        @endif

        <form class="product-form" action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="nombre">Nombre del producto</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Hamburguesa BBQ" value="{{ old('nombre') }}" required>
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
                        <input type="number" id="precio" name="precio" placeholder="9.95" step="0.01" min="0" value="{{ old('precio') }}" required>
                        <span class="addon">€</span>
                    </div>
                    @error('precio')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" placeholder="40" min="0" value="{{ old('stock', 0) }}" required>
                    @error('stock')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="disponible">Disponibilidad</label>
                    <select id="disponible" name="disponible">
                        <option value="1" {{ old('disponible', '1') == '1' ? 'selected' : '' }}>Disponible</option>
                        <option value="0" {{ old('disponible') == '0' ? 'selected' : '' }}>No disponible</option>
                    </select>
                    @error('disponible')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen del producto</label>
                    <input type="text" id="imagen" name="imagen" placeholder="https://example.com/imagen.jpg" value="{{ old('imagen') }}">
                    @error('imagen')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-group full-width">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" placeholder="Hamburguesa de ternera con salsa barbacoa, queso cheddar, cebolla caramelizada y patatas." rows="5">{{ old('descripcion') }}</textarea>
                @error('descripcion')<span class="error-text">{{ $message }}</span>@enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('productos.index') }}" class="btn btn-cancel" style="text-decoration:none;">Cancelar</a>
                <button type="submit" class="btn btn-save">Guardar producto</button>
            </div>
        </form>
    </div>
</body>
</x-app-layout>
