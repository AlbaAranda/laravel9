<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function orders()
    {
        //return $this->hasMany(Order::class); tiene un. Es la clase padre (Customer) es la que propaga la id a la tabla orders
        //hasMany es como el hashOne pero para muchos relacion 1:n
        return $this->belongsToMany(Order::class); //relacion n:M
}
    }
    
