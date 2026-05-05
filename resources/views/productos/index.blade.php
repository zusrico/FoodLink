<x-app-layout>
<body class="orders-body">
    <div class="orders-container">
        <div class="orders-header">
            <h1>Listado de productos</h1>
            <p class="orders-subtitle">Consulta y gestión de los productos registrados en la plataforma</p>
        </div>

        @if ($message = Session::get('success'))
            <div class="foodlink-alert foodlink-alert-success">{{ $message }}</div>
        @endif
        @if ($message = Session::get('error'))
            <div class="foodlink-alert foodlink-alert-error">{{ $message }}</div>
        @endif

        <div class="filters-section">
            <div class="search-box">
                <input type="text" id="search-input" placeholder="Buscar producto" class="search-input">
                <span class="search-icon">🔍</span>
            </div>
            <div class="filters-group">
                <select id="status-filter" class="status-filter">
                    <option value="">Todos</option>
                    <option value="disponible">Disponible</option>
                    <option value="no-disponible">No disponible</option>
                </select>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('productos.create') }}" class="btn-export" style="text-decoration:none;">➕ Nuevo producto</a>
                @endif
            </div>
        </div>

        <div class="table-wrapper">
            <table class="orders-table" id="products-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="orders-body">
                    @forelse($productos as $producto)
                        <tr data-status="{{ $producto->disponible ? 'disponible' : 'no-disponible' }}">
                            <td class="order-id">{{ $producto->nombre }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($producto->descripcion, 55) }}</td>
                            <td class="amount">{{ number_format($producto->precio, 2, ',', '.') }} €</td>
                            <td>{{ $producto->stock }}</td>
                            <td>
                                @if($producto->disponible)
                                    <span class="status-badge delivered">Disponible</span>
                                @else
                                    <span class="status-badge cancelled">No disponible</span>
                                @endif
                            </td>
                            <td class="actions product-actions">
                                <a href="{{ route('productos.show', $producto->id_producto) }}" class="action-btn view-btn" title="Ver detalle">👁️</a>
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('productos.edit', $producto->id_producto) }}" class="action-btn edit-btn" title="Editar">✏️</a>
                                    <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" class="inline-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn" onclick="return confirm('¿Está seguro de que desea eliminar este producto?')" title="Eliminar">🗑️</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" style="text-align:center; padding:2rem; color:#7f8c8d;">No hay productos registrados</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <a href="{{ route('dashboard') }}" class="page-btn" style="text-decoration:none;">← Dashboard</a>
            <button class="page-btn active">1</button>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('search-input');
        const statusFilter = document.getElementById('status-filter');
        const rows = document.querySelectorAll('#orders-body tr');
        function filterRows() {
            const search = searchInput.value.toLowerCase();
            const status = statusFilter.value;
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const rowStatus = row.getAttribute('data-status');
                const matchSearch = text.includes(search);
                const matchStatus = !status || rowStatus === status;
                row.style.display = matchSearch && matchStatus ? '' : 'none';
            });
        }
        searchInput.addEventListener('input', filterRows);
        statusFilter.addEventListener('change', filterRows);
    </script>
</body>
</x-app-layout>
