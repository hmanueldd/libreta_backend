<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'contacto_id'
        // Agrega aquí todos los campos que desees que se puedan llenar automáticamente
    ];

    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}
