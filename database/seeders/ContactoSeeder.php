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
    /**
     * Run the database seeds.
     */
    public function run()
    {   
        echo "Se está ejecutando ContactoSeeder...\n";
        Contacto::factory(5000)->create()->each(function ($contacto) {
            $contacto->telefonos()->createMany(Telefono::factory(rand(1, 3))->make()->toArray());
            $contacto->emails()->createMany(Email::factory(rand(1, 3))->make()->toArray());
            $contacto->direcciones()->createMany(Direccion::factory(rand(1, 2))->make()->toArray());
        });
    }

}
