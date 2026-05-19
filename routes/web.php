<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas de productos - solo para administradores
    Route::middleware('admin')->group(function () {
        Route::resource('productos', ProductoController::class);
    });
});

// Rutas de autenticación de Breeze
require __DIR__.'/auth.php';
