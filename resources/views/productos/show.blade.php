<x-app-layout>
<body class="form-body">
    <div class="form-container">
        <a href="{{ route('productos.index') }}" class="form-back-link">← Volver al listado</a>
        <div class="form-header">
            <h1>{{ $producto->nombre }}</h1>
            <p class="form-subtitle">Detalle del producto registrado en FoodLink</p>
        </div>

        <div class="show-card">
            <div class="show-grid">
                <div>
                    @if($producto->imagen)
                        <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" class="show-image">
                    @else
                        <div class="show-placeholder">🍽️</div>
                    @endif
                </div>
                <div>
                    <div class="show-field"><h3>Nombre</h3><p>{{ $producto->nombre }}</p></div>
                    <div class="show-field"><h3>Precio</h3><p style="font-size:2rem; font-weight:800;">{{ number_format($producto->precio, 2, ',', '.') }} €</p></div>
                    <div class="show-field"><h3>Stock</h3><p>{{ $producto->stock }} unidades</p></div>
                    <div class="show-field"><h3>Disponibilidad</h3>
                        @if($producto->disponible)
                            <span class="status-badge delivered">Sí, disponible</span>
                        @else
                            <span class="status-badge cancelled">No disponible</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="show-field" style="margin-top:2rem;"><h3>Descripción</h3><p>{{ $producto->descripcion ?? 'Sin descripción' }}</p></div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; color:#7f8c8d; font-size:.9rem; border-top:2px solid #f0f0f0; padding-top:1.2rem; margin-top:1.5rem;">
                <p><strong>Creado:</strong> {{ $producto->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Actualizado:</strong> {{ $producto->updated_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="show-actions">
                <a href="{{ route('productos.index') }}" class="btn btn-cancel" style="text-decoration:none;">Volver</a>
                @if(auth()->user()->role === 'admin')
                    <div style="display:flex; gap:.75rem;">
                        <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-save" style="text-decoration:none;">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-cancel" onclick="return confirm('¿Está seguro de que desea eliminar este producto?')">Eliminar</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</x-app-layout>
