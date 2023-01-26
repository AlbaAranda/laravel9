<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //si usas lo que hay comentado en el metodo store, no es necesario añadir esta linea
    protected $fillable = ["nombre", "descripcion", "precio"];
}

