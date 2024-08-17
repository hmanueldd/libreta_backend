<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;
    protected $table = 'direcciones'; 

    protected $fillable = [
        'direccion',
        'estado',
        'ciudad',
        'codigo_postal',
        'contacto_id'
        // Agrega aquí todos los campos que desees que se puedan llenar automáticamente
    ];

    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}
