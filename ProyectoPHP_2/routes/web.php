<?php

use App\Http\Controllers\ClientesCtrl;
use App\Http\Controllers\CuotasCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardCtrl;
use App\Http\Controllers\EmpleadosCtrl;
use App\Http\Controllers\IncidenciasCtrl;
use App\Http\Controllers\OperariosCtrl;
use App\Http\Controllers\TareasCtrl;

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
    return view('dashboard');
});

/**
 * Ruta Dashboard
 */
Route::get('/dashboard', [DashboardCtrl::class, 'mostrarDash'])->name('dashboard');


/**
 * Rutas Clientes
 */
Route::resource('clientes', ClientesCtrl::class);


/**
 * Rutas Operarios
 */
Route::resource('empleados', EmpleadosCtrl::class);


/**
 * Rutas Incidencias
 */
Route::resource('incidencias', IncidenciasCtrl::class);


/**
 * Rutas Cuotas
 */
Route::resource('cuotas', CuotasCtrl::class);
