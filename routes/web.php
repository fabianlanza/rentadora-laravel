<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AutosController;

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


//Route::get('/autos', [AutosController::class, 'index']);



Route::get('/autos', function () {
    return Inertia::render('Autos/index');
});
//Route::get('/autos', [AutosController::class, 'index'])->name('autos.index');

//Rutas para mostrar Create de Autos
Route::get('/autos/create', [AutosController::class, 'create'])->name('autos.create');
//Ruta para metodo post
Route::post('/autos', [AutosController::class, 'store'])->name('autos.store');
