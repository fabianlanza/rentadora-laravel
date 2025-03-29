<?php

namespace App\Http\Controllers;

use App\Models\Autos;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Devuelve todos los autos en formato JSON
        return response()->json(Autos::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Autos/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validar los datos del formulario
        $validated = $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'motor' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'año' => 'required|integer|min:1900|max:2100',
            'placa' => 'required|string|max:255',
            'Numero_asientos' => 'required|integer',
            'Aire_acondicionado' => 'required|string|in:Sí,No',
            'Detalles_desperfectos' => 'nullable|string',
            'Disponibilidad_vehiculo' => 'required|boolean',
            'Precio_base' => 'required|numeric',
            'imagen' => 'nullable|string',
        ]);

        // Crear el nuevo auto en la base de datos
        $auto = Autos::create([
            'marca' => $validated['marca'],
            'modelo' => $validated['modelo'],
            'motor' => $validated['motor'],
            'color' => $validated['color'],
            'año' => $validated['año'],
            'placa' => $validated['placa'],
            'Numero_asientos' => $validated['Numero_asientos'],
            'Aire_acondicionado' => $validated['Aire_acondicionado'],
            'Detalles_desperfectos' => $validated['Detalles_desperfectos'],
            'Disponibilidad_vehiculo' => $validated['Disponibilidad_vehiculo'],
            'Precio_base' => $validated['Precio_base'],
            'imagen' => $validated['imagen'], // Si vas a guardar solo la URL de la imagen
        ]);

        // Puedes redirigir al usuario a una página de éxito
        return redirect()->route('autos.index')->with('success', 'Auto guardado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Autos $autos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autos $autos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autos $autos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autos $autos)
    {
        //
    }
}
