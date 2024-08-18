<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contacto;
use App\Models\Telefono;
use App\Models\Email;
use App\Models\Direccion;

class ContactoSeeder extends Seeder
{
    
    public function run()
    {
        // Genera 5000 contactos y almacenamos en una colección
        $contactos = Contacto::factory(5000)->create();

        // Iteramos sobre cada contacto para crear sus relaciones
        foreach ($contactos as $contacto) {
            $telefonos = Telefono::factory(rand(1, 3))->make(['contacto_id' => $contacto->id]);
            $emails = Email::factory(rand(1, 3))->make(['contacto_id' => $contacto->id]);
            $direcciones = Direccion::factory(rand(1, 2))->make(['contacto_id' => $contacto->id]);

            $contacto->telefonos()->saveMany($telefonos);
            $contacto->emails()->saveMany($emails);
            $contacto->direcciones()->saveMany($direcciones);
        }
    }

}
