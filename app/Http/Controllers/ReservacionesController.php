<?php

namespace App\Http\Controllers;

use App\Models\Reservaciones;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Autos;

class ReservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Reservas/index', [
//            'autos' => $autos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //Para traer datos de un Auto especifico
        $auto = Autos::findOrFail($id); // Busca el auto por ID
        return Inertia::render('Reservas/index', ['auto' => $auto]); // Envia el auto a la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservaciones $reservaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservaciones $reservaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservaciones $reservaciones)
    {
        //
    }
}
