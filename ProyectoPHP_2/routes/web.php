<?php

use App\Http\Controllers\ClientesCtrl;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [DashboardCtrl::class, 'mostrarDash'])->name('dashboard');

Route::get('/clientes', [ClientesCtrl::class, 'index'])->name('clientes.index');
Route::get('/clientes-create',[ClientesCtrl::class, 'create'])->name('clientes.create');

Route::get('/operarios',[EmpleadosCtrl::class,'index'])->name('operarios.index');

Route::get('/tareas',[TareasCtrl::class,'index'])->name('tareas.index');

Route::get('/incidencias',[IncidenciasCtrl::class,'index'])->name('incidencias.index');

// Route::get('/facturas',[FacturasCtrl::class,'index'])->name('facturas.index');