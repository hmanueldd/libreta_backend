<?php

namespace Database\Factories;

use App\Models\Contacto;
use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    protected $model = Direccion::class;

    public function definition()
    {
        return [
            'direccion' => $this->faker->streetAddress,
            'ciudad' => $this->faker->city,
            'estado' => $this->faker->state,
            'codigo_postal' => $this->faker->postcode,
            'contacto_id' => Contacto::factory(), // O relaciona con un contacto existente
        ];
    }
}
