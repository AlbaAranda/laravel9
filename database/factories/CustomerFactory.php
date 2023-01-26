<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Customer::class; //asocio al modelo

    public function definition()
    {
        return [
            "dni"=> $this->faker->bothify('########-?'),
            "nombre" => $this->faker->firstName(),
            "apellidos"=> $this->faker->word(),
            "telefono" => $this->faker->regexify('[0-9]{9}'),
            "email" => $this->faker->safeEmail()

        ];
    }
}
