<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Redirigir raíz al login o dashboard
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard general (se mostrará según rol)
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Rutas solo para admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/materiales', function () { return Inertia::render('Dashboard'); })->name('materiales.index');
        Route::get('/proyectos', function () { return Inertia::render('Dashboard'); })->name('proyectos.index');
        Route::get('/usuarios', function () { return Inertia::render('Dashboard'); })->name('usuarios.index');
        Route::get('/funcionarios', function () { return Inertia::render('Dashboard'); })->name('funcionarios.index');
    });

    // Rutas para supervisor (y admin)
    Route::middleware(['role:admin,supervisor'])->group(function () {
        Route::get('/ingresos', function () { return Inertia::render('Dashboard'); })->name('ingresos.index');
        Route::get('/salidas', function () { return Inertia::render('Dashboard'); })->name('salidas.index');
        Route::get('/reportes', function () { return Inertia::render('Dashboard'); })->name('reportes.index');
    });
});

require __DIR__.'/auth.php';
