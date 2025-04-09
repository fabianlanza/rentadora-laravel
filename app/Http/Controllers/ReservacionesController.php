<?php

namespace App\Http\Controllers;

use App\Models\Reservaciones;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Autos;
use App\Models\User;



use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;

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
        $validated = $request->validate([
            'nombre_cliente' => 'required',
            'cedula' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'seguro' => 'required',
            'fk_auto' => 'required|exists:autos,id',
            'fk_user' => 'nullable|exists:users,id',
            'cantidad_dias_reservado' => 'required|integer',
        ]);
        
        // Create the reservation with all data including user ID
        $reservacion = Reservaciones::create($validated);

        // Enviar correo de confirmación
        Mail::to($request->user()->email)->send(new ReservationConfirmation($reservacion));
        
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
    public function edit()
    {
        // Trae informacion de la reservacion y el auto asociado
        $reservas = Reservaciones::with('auto')->get()->map(function ($reserva) {
            // Merge detalles del auto con la reserva
            return array_merge(
                $reserva->toArray(),
                $reserva->auto ? $reserva->auto->toArray() : []
            );
        });
    
        return Inertia::render('Reservas/edit', [
            'reservas' => $reservas,
            // Auth is automatically included in Inertia shared data, but making it explicit here
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

    /**
     * Display all reservations for admin
     */
    public function adminIndex()
    {
        // Get all reservations with their associated auto information
        // Using the same approach as in the edit method
        $reservaciones = Reservaciones::with('auto')->get()->map(function ($reserva) {
            // Merge auto details with reservation
            return array_merge(
                $reserva->toArray(),
                $reserva->auto ? $reserva->auto->toArray() : []
            );
        });
        
        // Count statistics for dashboard
        $totalClientes = User::count();
        $cochesDisponibles = Autos::where('Disponibilidad_vehiculo', true)->count();
        $reservacionesActivas = Reservaciones::count();
        
        return Inertia::render('Reservas/admin', [
            'reservaciones' => $reservaciones,
            'totalClientes' => $totalClientes,
            'cochesDisponibles' => $cochesDisponibles,
            'reservacionesActivas' => $reservacionesActivas
        ]);
    }
}
