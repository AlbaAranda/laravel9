<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    //establecer la cardinalidad, es decir, uncliente pertenece a un pedido
    public function customers(){
        return $this->belongsToMany(Customer::class); // esto significa pertenece a un 
    }
}
