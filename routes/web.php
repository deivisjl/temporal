<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index' ]);

Route::get('/reporte', [HomeController::class, 'reporte' ])->name('reportes.reporte');

 Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('libros/crear', [LibroController::class, 'create'])->name('libros.crear');
Route::get('libros/{libro}/edit', [LibroController::class, 'edit'])->name('libros.edit');
Route::post('libros',[LibroController::class, 'store'] )->name('libros.store');
Route::put('libros/{libro}', [LibroController::class, 'update' ])->name('libros.update');
Route::post('libros/{id}',  [LibroController::class, 'destroy' ])->name('libros.destroy');

Route::get('estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::get('estudiantes/crear', [EstudianteController::class, 'create'])->name('estudiantes.crear');
Route::get('estudiantes/{estudiante}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
Route::post('estudiantes',[EstudianteController::class, 'store'] )->name('estudiantes.store');
Route::put('estudiantes/{estudiante}', [EstudianteController::class, 'update' ])->name('estudiantes.update');
Route::post('estudiantes/{id}',  [EstudianteController::class, 'destroy' ])->name('estudiantes.destroy');

Route::get('secretarias', [SecretariaController::class, 'index'])->name('secretarias.index');
Route::get('secretarias/crear', [SecretariaController::class, 'create'])->name('secretarias.crear');
Route::get('secretarias/{secretaria}/edit', [SecretariaController::class, 'edit'])->name('secretarias.edit');
Route::post('secretarias',[SecretariaController::class, 'store'] )->name('secretarias.store');
Route::put('secretarias/{secretaria}', [SecretariaController::class, 'update' ])->name('secretarias.update');
Route::post('secretarias/{id}',  [SecretariaController::class, 'destroy' ])->name('secretarias.destroy');

Route::get('reservaciones', [ReservacionController::class, 'index'])->name('reservaciones.index');
Route::get('reservaciones/pendientes', [ReservacionController::class, 'pendientes'])->name('reservaciones.pendientes');
Route::post('reservaciones/pendientes', [ReservacionController::class, 'autorizacion'])->name('reservaciones.autorizacion');


Route::post('reservaciones',[ReservacionController::class, 'store'] )->name('reservaciones.store');
/* Route::get('secretarias/crear', [SecretariaController::class, 'create'])->name('secretarias.crear');
Route::get('secretarias/{secretaria}/edit', [SecretariaController::class, 'edit'])->name('secretarias.edit');

Route::put('secretarias/{secretaria}', [SecretariaController::class, 'update' ])->name('secretarias.update');
Route::post('secretarias/{id}',  [SecretariaController::class, 'destroy' ])->name('secretarias.destroy');
 */
