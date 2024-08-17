<?php

namespace Database\Factories;

use App\Models\Contacto;
use App\Models\Email;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailFactory extends Factory
{
    protected $model = Email::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'contacto_id' => Contacto::factory(), // O relaciona con un contacto existente
        ];
    }
}