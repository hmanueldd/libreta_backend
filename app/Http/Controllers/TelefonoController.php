<?php

namespace App\Http\Controllers;

use App\Models\Telefono;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'numero' => 'required|string|max:255',
            'contacto_id' => 'required|int',
        ]);

        $telefono = Telefono::create($validatedData);
        
        return response()->json(['message' => "Teléfono actualizado correctamente",'data'=> $telefono->id, 'error' => false], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'numero' => 'required|string|max:255',
            'contacto_id' => 'required|int',
        ]);

        // Buscar el email
        $telefono = Telefono::findOrFail($id);

        // Actualizar los datos del contacto
        $telefono->update($validatedData);
        return response()->json(['message' => "Telefóno actualizado correctamente",'data'=> $telefono->id, 'error' => false], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $telefono = Telefono::findOrFail($id);
            $telefono->delete();
            return response()->json(['message' => "Teléfono eliminado correctamente",'data'=> null, 'error' => false], 200);
        }catch(\Throwable $error){
            return response()->json(['message' => "Ocurrió un error al eliminar el teléfono",'data'=> null, 'error' => true], 200);
        }
    }
}
