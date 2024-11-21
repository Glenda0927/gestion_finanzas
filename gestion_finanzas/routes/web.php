<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CuentaController;

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

Route::get('/', function () {
    return view('bienvenida');
})->name('bienvenida');

Route::prefix('user')->group(function () {
    Route::get('crear', [UsuarioController::class, 'create'])->name('user.create');
    Route::post('crear', [UsuarioController::class, 'store'])->name('user.store');
    Route::get('mostrar', [UsuarioController::class, 'index'])->name('user.index');
    Route::put('actualizar/{id}', [UsuarioController::class, 'update'])->name('user.update');
    Route::delete('eliminar/{id}', [UsuarioController::class, 'destroy'])->name('user.destroy');
});

Route::prefix('cuenta')->group(function () {
    Route::get('crear', [CuentaController::class, 'create'])->name('cuenta.create');
    Route::post('crear', [CuentaController::class, 'store'])->name('cuenta.store');
    Route::get('mostrar', [CuentaController::class, 'index'])->name('cuenta.index');
    Route::get('mostrar/{id}', [CuentaController::class, 'show'])->name('cuenta.show');
    Route::put('actualizar/{id}', [CuentaController::class, 'update'])->name('cuenta.update');
});
