<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //si usas lo que hay comentado en el metodo store, no es necesario añadir esta linea

    protected $fillable = ["nombre", "descripcion", "precio"];

    //mutator-> es un set<nombre_atributo>Attribute -> direccion : hacia la bbdd
    //accessor-> get
    //atributo: firstName -> first_name
    public function setNombreAttribute($value)
    {
        //con el ucfirst le estamos diciendo que la primera sea mayuscula
        $this->attributes['nombre'] = ucfirst(strtolower($value));
    }

    public function getNombreAttribute($value)
    {
        //devuelve el nombre todo en mayuscula
        return strtoupper($value);
    }
    
    //coger el precio y los muestre con la palabra euros
    public function getPrecioAttribute($value){
        return ($value . ' euros');
    }
}

