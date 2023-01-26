<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Appp\Models\Client;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "DNI" => $this->faker->bothify('########-?'),
            "nombre" => $this->faker->word(),
            "apellidos" => $this->faker->word(),
            "telefono" => $this->faker-> word(),
            'email' => $this->faker->safeEmail()
        ];
    }
}
