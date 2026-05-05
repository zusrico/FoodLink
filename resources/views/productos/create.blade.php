<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('productos.store') }}" method="POST">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Nombre *
                            </label>
                            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                   required>
                            @error('nombre')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="descripcion" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Descripción
                            </label>
                            <textarea id="descripcion" name="descripcion" rows="4"
                                      class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Precio -->
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <div>
                                <label for="precio" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                    Precio *
                                </label>
                                <input type="number" id="precio" name="precio" step="0.01" value="{{ old('precio') }}"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                       required>
                                @error('precio')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Stock -->
                            <div>
                                <label for="stock" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                    Stock *
                                </label>
                                <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                       required>
                                @error('stock')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="mb-4">
                            <label for="imagen" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                URL Imagen
                            </label>
                            <input type="text" id="imagen" name="imagen" value="{{ old('imagen') }}"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                   placeholder="https://example.com/imagen.jpg">
                            @error('imagen')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Disponible -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" id="disponible" name="disponible" value="1"
                                       class="rounded" {{ old('disponible') ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700 dark:text-gray-300">Disponible</span>
                            </label>
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-between">
                            <a href="{{ route('productos.index') }}"
                               class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                                Cancelar
                            </a>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Crear Producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
