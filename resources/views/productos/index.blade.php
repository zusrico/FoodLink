<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Productos') }}
            </h2>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('productos.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    + Nuevo Producto
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ $message }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="border px-6 py-3 text-left text-gray-900 dark:text-gray-100">Nombre</th>
                                <th class="border px-6 py-3 text-left text-gray-900 dark:text-gray-100">Descripción</th>
                                <th class="border px-6 py-3 text-left text-gray-900 dark:text-gray-100">Precio</th>
                                <th class="border px-6 py-3 text-left text-gray-900 dark:text-gray-100">Stock</th>
                                <th class="border px-6 py-3 text-left text-gray-900 dark:text-gray-100">Disponible</th>
                                @if(auth()->user()->role === 'admin')
                                    <th class="border px-6 py-3 text-center text-gray-900 dark:text-gray-100">Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="divide-y dark:divide-gray-700">
                            @forelse($productos as $producto)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="border px-6 py-4 text-gray-900 dark:text-gray-100">{{ $producto->nombre }}</td>
                                    <td class="border px-6 py-4 text-gray-600 dark:text-gray-400">{{ Str::limit($producto->descripcion, 50) }}</td>
                                    <td class="border px-6 py-4 text-gray-900 dark:text-gray-100">
                                        <span class="font-semibold">${{ number_format($producto->precio, 2) }}</span>
                                    </td>
                                    <td class="border px-6 py-4 text-gray-900 dark:text-gray-100">{{ $producto->stock }}</td>
                                    <td class="border px-6 py-4">
                                        @if($producto->disponible)
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">Sí</span>
                                        @else
                                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-sm">No</span>
                                        @endif
                                    </td>
                                    @if(auth()->user()->role === 'admin')
                                        <td class="border px-6 py-4 text-center">
                                            <a href="{{ route('productos.edit', $producto->id_producto) }}" class="text-blue-600 hover:text-blue-900 mr-2">Editar</a>
                                            <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Está seguro?')">Eliminar</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ auth()->user()->role === 'admin' ? '6' : '5' }}" class="border px-6 py-4 text-center text-gray-500">
                                        No hay productos registrados
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
