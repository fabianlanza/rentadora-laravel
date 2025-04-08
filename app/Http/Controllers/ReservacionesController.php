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
        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'cedula' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'seguro' => 'required|string|in:si,no',
            'fk_auto' => 'required|exists:autos,id',
            'cantidad_dias_reservado' => 'required|integer|min:1',
        ]);
        
        Reservaciones::create($request->all());
        
        return redirect()->route('autos.index')->with('success', 'Reserva creada exitosamente');
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
    public function make($ide){
        $auto = Autos::findOrFail($ide);
        return Inertia::render('Reservas/FormularioCliente', ['auto' => $auto]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservaciones $reservaciones)
    {
        //
        $reservas = Reservaciones::with('auto')
            //->where('disponibilidad_vehiculo', 'activa') // si así defines una reserva activa
            ->get()
            ->map(function ($reserva) {
                return [
                    'id' => $reserva->id,
                    'marca' => $reserva->auto->marca,
                    'modelo' => $reserva->auto->modelo,
                    'motor' => $reserva->auto->motor,
                    'año' => $reserva->auto->año,
                    'placa' => $reserva->auto->placa,
                    'Numero_asientos' => $reserva->auto->Numero_asientos,
                    'imagen' => $reserva->auto->imagen,
                ];
            });

        return Inertia::render('Reservas/edit', [
            'reservas' => $reservas,
        ]);
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
