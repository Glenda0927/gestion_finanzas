<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\CatalogoTipoCuentaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('user')->group(function () {
    Route::post('crear', [UsuarioController::class, 'create']);
    Route::get('mostrar', [UsuarioController::class, 'index']);
    Route::put('actualizar/{id}', [UsuarioController::class, 'update']);
    Route::delete('eliminar/{id}', [UsuarioController::class, 'destroy']);
});

Route::prefix('cuenta')->group(function () {
    Route::post('crear', [CuentaController::class, 'cuenta']);
    Route::get('mostrar', [CuentaController::class, 'index']);
    Route::get('mostrar/{id}', [CuentaController::class, 'show']);
    Route::put('actualizar/{id}', [CuentaController::class, 'update']);
});

Route::prefix('tipo_cuenta')->group(function () {
    Route::post('crear', [CatalogoTipoCuentaController::class, 'create']);
    Route::get('mostrar', [CatalogoTipoCuentaController::class, 'index']);
});
