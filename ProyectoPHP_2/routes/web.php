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
Route::get('/clientes', [ClientesCtrl::class, 'index'])->name('clientes.index');

Route::get('/clientes-create', [ClientesCtrl::class, 'create'])->name('clientes.create');
Route::post('/clientes-create',[ClientesCtrl::class, 'store'])->name('clientes.store');


/**
 * Rutas Operarios
 */
Route::get('/operarios', [EmpleadosCtrl::class, 'index'])->name('operarios.index');

/**
 * Rutas Tareas
 */
Route::get('/tareas', [TareasCtrl::class, 'index'])->name('tareas.index');

/**
 * Rutas Incidencias
 */
Route::get('/incidencias', [IncidenciasCtrl::class, 'index'])->name('incidencias.index');

/**
 * Rutas Cuotas
 */
Route::get('/cuotas',[CuotasCtrl::class,'index'])->name('cuotas.index');
Route::get('/cuotas-create', [CuotasCtrl::class, 'create'])->name('cuotas.create');
