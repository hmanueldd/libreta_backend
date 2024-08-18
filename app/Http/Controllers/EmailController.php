<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
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
            'email' => 'required|email|unique:contacts,email',
            'contacto_id' => 'required|int',
        ]);

        $email = Email::create($validatedData);
        
        return response()->json(['message' => "Email actualizado correctamente",'data'=> $email->id, 'error' => false], 201);
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
            'email' => 'required|email|unique:contacts,email',
            'contacto_id' => 'required|int',
        ]);

        // Buscar el email
        $email = Email::findOrFail($id);

        // Actualizar los datos del contacto
        $email->update($validatedData);
        return response()->json(['message' => "Email actualizado correctamente",'data'=> $email->id, 'error' => false], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $email = Email::findOrFail($id);
            $email->delete();
            return response()->json(['message' => "Email eliminado correctamente",'data'=> null, 'error' => false], 200);
        }catch(\Throwable $error){
            return response()->json(['message' => "Ocurrió un error al eliminar el email",'data'=> null, 'error' => true], 200);
        }
    }
}
