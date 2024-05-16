<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListadoController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/entradas', [ListadoController::class, 'index'])->name('entradas.index');
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::get('/entradas/create', [ListadoController::class, 'create'])->name('entradas.create');
    Route::get('/entradas/{entradas_id}', [ListadoController::class, 'show'])->name('entradas.show');
    Route::get('/entradas/{entradas_id}/edit', [ListadoController::class, 'edit'])->name('entradas.edit');
    Route::get('/usuarios/{id}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::post('/entradas', [ListadoController::class, 'store'])->name('entradas.store');
    Route::put('/entradas/{entradas_id}', [ListadoController::class, 'update'])->name('entradas.update');
    Route::put('/usuarios/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/entradas/{entradas_id}', [ListadoController::class, 'destroy'])->name('entradas.destroy');
    Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
    Route::post('/usuarios/import', [UsuariosController::class, 'import'])->name('usuarios.import');
    Route::get('/usuarios/export', [UsuariosController::class, 'export'])->name('usuarios.export');
});

require __DIR__ . '/auth.php';
