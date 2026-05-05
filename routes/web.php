<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas de productos
    Route::resource('productos', ProductoController::class);
});

// Rutas de autenticación de Breeze
require __DIR__.'/auth.php';
