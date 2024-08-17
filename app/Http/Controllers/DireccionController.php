<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;

class DireccionController extends Controller
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
            'direccion' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:255',
            'contacto_id' => 'required|int',
        ]);

        $direccion = Direccion::create($validatedData);
        
        return response()->json(['message' => "Dirección creada correctamente",'data'=> $direccion->id, 'error' => false], 201);
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
            'direccion' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:255',
            'contacto_id' => 'required|int',
        ]);

        // Buscar el contacto
        $direccion = Direccion::findOrFail($id);

        // Actualizar los datos del contacto
        $direccion->update($validatedData);
        return response()->json(['message' => "Dirección actualizada correctamente",'data'=> $direccion->id, 'error' => false], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $direccion = Direccion::findOrFail($id);
            $direccion->delete();
            return response()->json(['message' => "Dirección eliminado correctamente",'data'=> null, 'error' => false], 200);
        }catch(\Throwable $error){
            return response()->json(['message' => "Ocurrió un error al eliminar el dirección",'data'=> null, 'error' => true], 200);
        }
    }
}
