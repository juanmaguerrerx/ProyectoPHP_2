<?php

use App\Http\Controllers\ClientesCtrl;
use App\Http\Controllers\CuotasCtrl;
use App\Http\Controllers\DashboardCtrl;
use App\Http\Controllers\EmpleadosCtrl;
use App\Http\Controllers\IncidenciasCtrl;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

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




Route::middleware('auth', 'verified')->group(function () {
    //Route::get('/dashboard', [DashboardCtrl::class, 'mostrarDash'])->name('dashboard');
    Route::get('/', [DashboardCtrl::class, 'mostrarDash'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/clientes/search', [ClientesCtrl::class, 'search'])->name('clientes.search');
    Route::resource('clientes', ClientesCtrl::class);
    Route::get('/cuotas/{$id}', [CuotasCtrl::class, 'factura'])->name('cuotas.factura')->middleware(AdminMiddleware::class);
    Route::resource('cuotas', CuotasCtrl::class)->middleware(AdminMiddleware::class);
    Route::resource('empleados', EmpleadosCtrl::class)->middleware(AdminMiddleware::class);
    Route::get('/incidencias/search', [IncidenciasCtrl::class, 'search'])->name('incidencias.search');
});


Route::resource('incidencias', IncidenciasCtrl::class);




require __DIR__ . '/auth.php';
