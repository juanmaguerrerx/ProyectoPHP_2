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
// GET
Route::get('/clientes', [ClientesCtrl::class, 'index'])->name('clientes.index');
Route::get('/clientes-create', [ClientesCtrl::class, 'create'])->name('clientes.create');
// POST
Route::post('/clientes-create',[ClientesCtrl::class, 'store'])->name('clientes.store');




/**
 * Rutas Operarios
 */
Route::get('/empleados', [EmpleadosCtrl::class, 'index'])->name('empleados.index');
Route::get('/empleados-create',[EmpleadosCtrl::class, 'create'])->name('empleados.create');


/**
 * Rutas Incidencias
 */
// GET
Route::get('/incidencias', [IncidenciasCtrl::class, 'index'])->name('incidencias.index');
Route::get('/incidencias-create',[IncidenciasCtrl::class, 'create'])->name('incidencias.create');
Route::get('/incidencias-show',[IncidenciasCtrl::class, 'show'])->name('incidencias.show');
Route::get('/incidencias-edit',[IncidenciasCtrl::class, 'edit'])->name('incidencias.edit');
// POST

/**
 * Rutas Cuotas
 */
// GET
Route::get('/cuotas',[CuotasCtrl::class,'index'])->name('cuotas.index');
Route::get('/cuotas-create', [CuotasCtrl::class, 'create'])->name('cuotas.create');

// POST