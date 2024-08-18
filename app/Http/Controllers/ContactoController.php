<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Contacto::orderBy('id')->get();
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
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        $contacto = Contacto::create($validatedData);
        
        return response()->json(['message' => "Contacto actualizado correctamente",'data'=> $contacto->id, 'error' => false], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Contacto::with(['telefonos', 'emails', 'direcciones'])->find($id);
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
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        // Buscar el contacto
        $contacto = Contacto::findOrFail($id);

        // Actualizar los datos del contacto
        $contacto->update($validatedData);
        return response()->json(['message' => "Contacto actualizado correctamente",'data'=> $contacto->id, 'error' => false], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $contacto = Contacto::findOrFail($id);
            $contacto->delete();
            return response()->json(['message' => "Contacto eliminado correctamente",'data'=> null, 'error' => false], 200);
        }catch(\Throwable $error){
            return response()->json(['message' => "Ocurrió un error al eliminar el contacto",'data'=> null, 'error' => true], 200);
        }
    }

    public function search(Request $request){
        $query = Contacto::query();

        // Filtrar por nombre o apellido
        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->input('nombre') . '%')
                  ->orWhere('apellido', 'like', '%' . $request->input('nombre') . '%');
        }

        // Filtrar por ciudad
        if ($request->filled('ciudad')) {
            $query->whereHas('direcciones', function ($q) use ($request) {
                $q->where('ciudad', 'like', '%' . $request->input('ciudad') . '%');
            });
        }

        // Filtrar por estado
        if ($request->filled('estado')) {
            $query->whereHas('direcciones', function ($q) use ($request) {
                $q->where('estado', 'like', '%' . $request->input('estado') . '%');
            });
        }

        // Filtrar por código postal
        if ($request->filled('codigo_postal')) {
            $query->whereHas('direcciones', function ($q) use ($request) {
                $q->where('codigo_postal', 'like', '%' . $request->input('codigo_postal') . '%');
            });
        }

        if ($request->filled('telefono')) {
            $query->whereHas('telefonos', function($q) use ($request) {
                $q->where('numero', 'like', '%' . $request->input('telefono') . '%');
            });
        }
    
        if ($request->filled('email')) {
            $query->whereHas('emails', function($q) use ($request) {
                $q->where('email', 'like', '%' . $request->input('email') . '%');
            });
        }

        // Ejecutar la consulta y obtener los resultados
        $contactos = $query->get();

        // Retornar los resultados en formato JSON
        return response()->json($contactos, 200);
    }
}
