<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Solo admins pueden crear
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('productos.index')->with('error', 'No tienes permiso para crear productos');
        }
        
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Verificar permiso
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('productos.index')->with('error', 'No tienes permiso para crear productos');
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|string',
            'disponible' => 'nullable|boolean',
        ]);

        $validated['disponible'] = $request->has('disponible');

        Producto::create($validated);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        // Solo admins pueden editar
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('productos.index')->with('error', 'No tienes permiso para editar productos');
        }

        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        // Verificar permiso
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('productos.index')->with('error', 'No tienes permiso para editar productos');
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|string',
            'disponible' => 'nullable|boolean',
        ]);

        $validated['disponible'] = $request->has('disponible');

        $producto->update($validated);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        // Verificar permiso
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('productos.index')->with('error', 'No tienes permiso para eliminar productos');
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }
}
