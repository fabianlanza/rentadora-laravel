<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;

class ReservationController extends Controller
{
    // ... otros métodos ...

    public function store(Request $request)
    {
        // Validar y guardar la reserva
        $validated = $request->validate([
            // tus reglas de validación
        ]);
        
        $reservation = Reservation::create($validated);
        
        // Enviar correo de confirmación
        Mail::to($request->user()->email)->send(new ReservationConfirmation($reservation));
        
        // Redireccionar o responder
        return redirect()->route('reservations.show', $reservation)
            ->with('success', 'Reserva creada exitosamente. Se ha enviado un correo de confirmación.');
    }
    
    // ... otros métodos ...
}