<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
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
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});


Route::get('/', function () {
//    return view('welcome');
    return Inertia::render('Home');
});


// Contacto
Route::get('/contacto', function () {
    return Inertia::render('Contacto');
});


//Forma Correcta de usar ruta con Inertia para traer los carros de la DB
Route::get('/autos', [AutosController::class, 'index'])->name('autos.index');




Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    //-------------------------AUTOS---------------------------------------
    //Rutas para mostrar Create de Autos
    Route::get('/autos/create', [AutosController::class, 'create'])->name('autos.create');
    //Ruta para metodo post
    Route::post('/autos', [AutosController::class, 'store'])->name('autos.store');


    //Reservaciones
    Route::get('/reserva', [ReservacionesController::class, 'index'])->name('reserva.index');
    //Ruta agarra id del auto para mandarla al controlador
    Route::get('/reserva/{id}', [ReservacionesController::class, 'show'])->name('reserva.show');

    //Ruta para mostrar reservaciones
    Route::get('/reservasActivas', [ReservacionesController::class, 'edit'])->name('reservasActivas.edit');
    //Route::get('/formcliente',[ReservacionesController::class, 'create'])->name('formcliente');
    Route::get('reservaciones-formulario/{id}',[ReservacionesController::class, 'make'])->name('reservaciones-formulario');
});

require __DIR__.'/auth.php';
