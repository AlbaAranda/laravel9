<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use APp\Models\Customer;

class CustomerOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory()->count(22)->create();

        //sync lo que hace es borrar lo que haya (los resgistros qe pudiese haber) e introducir datos
        Customer::factory()->count(43)->create()->each(function($customer){
            $customer->orders()->sync(
                Order::all()->random(4)
            );
        });
    }
}
