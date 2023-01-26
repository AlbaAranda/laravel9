<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class; //asocia el modelo

    
    public function definition()
    {
        return [
            "nombre" => $this->faker->word(),
            "descripcion" => $this->faker->paragraph(),
            "precio" => $this->faker->randomFloat(2,20,40)
        ];
    }
}
