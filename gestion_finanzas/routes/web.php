<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('user')->group(function () {
    Route::get('crear', [UsuarioController::class, 'create'])->name('user.create'); // Formulario para crear usuario
    Route::post('crear', [UsuarioController::class, 'store'])->name('user.store');  // Enviar datos del formulario (nuevo método en el controlador)
    Route::get('mostrar', [UsuarioController::class, 'index'])->name('user.index');
    Route::put('actualizar/{id}', [UsuarioController::class, 'update'])->name('user.update'); // Actualizar usuario
    Route::delete('eliminar/{id}', [UsuarioController::class, 'destroy'])->name('user.destroy'); // Eliminar usuario
});

