<?php

namespace Database\Factories;

use App\Models\Contacto;
use App\Models\Telefono;
use Illuminate\Database\Eloquent\Factories\Factory;

class TelefonoFactory extends Factory
{
    protected $model = Telefono::class;

    public function definition()
    {
        return [
            'numero' => $this->faker->phoneNumber,
            'contacto_id' => Contacto::factory(), // O relaciona con un contacto existente
        ];
    }
}