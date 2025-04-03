<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AutosController;
use App\Http\Controllers\ReservacionesController;

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
//    return view('welcome');
    return Inertia::render('Home');
});

Route::get('/contacto', function () {
//    return view('welcome');
    return Inertia::render('Contacto');
});


//
//Route::get('/autos', function () {
//    return Inertia::render('Autos/index');
//});

//Forma Correcta de usar ruta con Inertia para traer los carros de la DB
Route::get('/autos', [AutosController::class, 'index'])->name('autos.index');

//Rutas para mostrar Create de Autos
Route::get('/autos/create', [AutosController::class, 'create'])->name('autos.create');
//Ruta para metodo post
Route::post('/autos', [AutosController::class, 'store'])->name('autos.store');



//Reservaciones
Route::get('/reserva', [ReservacionesController::class, 'index'])->name('reserva.index');
//Ruta agarra id del auto para mandarla al controlador
Route::get('/reserva/{id}', [ReservacionesController::class, 'show'])->name('reserva.show');
