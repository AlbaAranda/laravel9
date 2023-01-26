<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*$this->call([  //esto se crea para no tener que poner --class=ProductSeeder despues de php artisan db:seed
            ProductSeeder::class
        ])

        */ 
        //ES RECOMENDABLE QUITAR ESTE CALL

        $this->call([  //esto se crea para no tener que poner --class=ProductSeeder despues de php artisan db:seed
            CustomerSeeder::class,
            OrderSeeder::class,
            CustomerOrderSeeder::class
            
        ]);

        /*$this->call([  //esto se crea para no tener que poner --class=ProductSeeder despues de php artisan db:seed
            ProductSeeder::class
            OrderSeeder::class
        ]);*/
    }
}
