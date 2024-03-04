<?php

use App\Http\Controllers\ClientesCtrl;
use App\Http\Controllers\CuotasCtrl;
use App\Http\Controllers\DashboardCtrl;
use App\Http\Controllers\EmpleadosCtrl;
use App\Http\Controllers\IncidenciasCtrl;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Cuotas;
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

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('clientes', ClientesCtrl::class);
    Route::resource('cuotas', CuotasCtrl::class)->middleware(AdminMiddleware::class);
    Route::get('/cuotas/{$id}',[CuotasCtrl::class, 'factura'])->name('cuotas.factura')->middleware(AdminMiddleware::class);
    Route::get('/dashboard', [DashboardCtrl::class, 'mostrarDash'])->name('dashboard');
    Route::resource('empleados', EmpleadosCtrl::class)->middleware(AdminMiddleware::class);
});
Route::resource('incidencias', IncidenciasCtrl::class);




require __DIR__.'/auth.php';
