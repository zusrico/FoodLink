<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $producto->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Imagen -->
                        @if($producto->imagen)
                            <div>
                                <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" 
                                     class="w-full rounded shadow-lg">
                            </div>
                        @endif

                        <div>
                            <!-- Nombre -->
                            <div class="mb-4">
                                <h3 class="text-gray-600 dark:text-gray-400 font-bold mb-1">Nombre</h3>
                                <p class="text-gray-900 dark:text-gray-100 text-lg">{{ $producto->nombre }}</p>
                            </div>

                            <!-- Precio -->
                            <div class="mb-4">
                                <h3 class="text-gray-600 dark:text-gray-400 font-bold mb-1">Precio</h3>
                                <p class="text-gray-900 dark:text-gray-100 text-2xl font-bold">
                                    ${{ number_format($producto->precio, 2) }}
                                </p>
                            </div>

                            <!-- Stock -->
                            <div class="mb-4">
                                <h3 class="text-gray-600 dark:text-gray-400 font-bold mb-1">Stock</h3>
                                <p class="text-gray-900 dark:text-gray-100">{{ $producto->stock }} unidades</p>
                            </div>

                            <!-- Disponible -->
                            <div class="mb-4">
                                <h3 class="text-gray-600 dark:text-gray-400 font-bold mb-1">Disponible</h3>
                                @if($producto->disponible)
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded">Sí, disponible</span>
                                @else
                                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded">No disponible</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="mt-6 mb-6">
                        <h3 class="text-gray-600 dark:text-gray-400 font-bold mb-2">Descripción</h3>
                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">
                            {{ $producto->descripcion ?? 'Sin descripción' }}
                        </p>
                    </div>

                    <!-- Fechas -->
                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-500 dark:text-gray-400 mt-6 pt-6 border-t dark:border-gray-700">
                        <div>
                            <p><strong>Creado:</strong> {{ $producto->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <p><strong>Actualizado:</strong> {{ $producto->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('productos.index') }}"
                           class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                            Volver
                        </a>
                        @if(auth()->user()->role === 'admin')
                            <div class="flex gap-2">
                                <a href="{{ route('productos.edit', $producto->id_producto) }}"
                                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    Editar
                                </a>
                                <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                                            onclick="return confirm('¿Está seguro de que desea eliminar este producto?')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
