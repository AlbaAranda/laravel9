<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppEjemplo extends Controller
{
    public function mostrarinformacion()
    {
        $nombremodulo = "dwes";
        $ciclo = "daw";

        /*
        $datos["nombremodulo"] = "dwes";
        $datos["ciclo"] = "DAW;

        return view('muestrasignatura', $datos);
        */
        $departamentos["nombredpto"] = "Informatica";
        $departamentos["ubicacion"] = "7 Planta";

        //return view('muestrasignatura', array("nombremodulo" => "dwes" , 
                                               // "ciclo" => "DAW"));

        //return view('muestrasignatura',["nombremodulo" => "dwes" , "ciclo" => "DAW"]);

        //return view('muestrasignatura')->with(["nombremodulo" => "dwes", "ciclo" => "DAW"]);

        //return view('asignaturas.muestrasignatura',compact('nombremodulo','ciclo', 'departamentos')); //mejor forma
        
        return view('asignaturas.page',compact('nombremodulo','ciclo', 'departamentos')); // LA MEJOR FORMA, se pasa el array como un string 
    }
}
