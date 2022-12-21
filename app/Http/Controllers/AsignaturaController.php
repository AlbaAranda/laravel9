<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //llama la formulario de alta de una asignatura  y lo muestra

        return view('asignaturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //recoge los datos del formulario de alta
        //aqui iria la lógica de insertar en la bbdd. save (en el modelo)
        //dd("HE LLEGADO AQUÍ");  //dd es como un echo

        $datos = $request->validate([
            'nombre' => 'required|max:7',
            'curso' => 'required|integer|size:1|regex:/[1,2]/',
            'ciclo' => 'required|size:3|regex:/DA[M,W]/'
        ],[
            'nombre.required'=> 'Debes rellenar el nombre',
            'nombre.max'=> 'El nombre solo puede tener un máximo de 7 caracteres',
            'curso.required'=> 'Debes rellenar el curso',
            'curso.integer'=> 'El curso debe ser un número entero',
            'curso.regex'=> 'El curso debe estar comprendido entre 1 y 2',
            'curso.size' => 'El curso debe tener solo un número entero',
            'ciclo.required'=> 'Debes rellenar el ciclo',
            'ciclo.regex' => 'El ciclo debe ser DAM O DAW',
            'ciclo.size' => 'El ciclo solo pueden contener 3 letras'
        ]);

        /*
        $nombre = $request->input('nombre'); //se recomienda esta porque permite utilizar array  Hay otras opciones
        $curso = $request->input('curso');
        $ciclo = $request->input('ciclo');
        $comentario = $request->input('comentario');
        
        dd($nombre, $curso, $ciclo, $comentario); // para mostrar estas variables

        */


        /*
        $datos = $request->all();
        dd($datos);
        */

        /*
        $datos = $request->only('nombre','ciclo');
        dd($datos);
        */

        /*
        $datos = $request->except('nombre');
        dd($datos);
        */

        //verificar que existe un campo en el formulario

        /*
        $nuevocampo = "";
        if($request->has('nuevocampo')){
            dd($nuevocampo);
        }
        else{
            dd("El campo no existe");
        }
        */
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
