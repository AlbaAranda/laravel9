<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Order::class; //asocia el modelo

    public function definition()
    {
        return [
            //ESTOS SON LOS DATOS FAKE
            "solicitante" => $this->faker->word(),
            
            //se puede poner en date ('d_m_y') para especificar el formato 
            "fecha" => $this->faker->date('Y_m_d'),
            //se ha puest sentence(6), que significa que ocupe 6 parrafos
            "descripcion" => $this->faker->paragraph(),
            // precio  randomFloat el primer valor es la cantidad de decimales, y los otros valores que son opcionales especifican el valor minimo y maximo que tendrá ese float
            "customer_id" =>Customer::inRandomOrder()->first()->id //que ordene las tuplas aleaotoriamente y ordene a partir del primero
        ];
    }
}
