<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //variable donde cargar todos los registros
        $productList = Product::all(); // el metodo all es eloquent ORM

        // $productList;

        //devuelve una vista: contiene el nombre de la vista 
        return view('product.index', ['productList'=> $productList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre"=>'required|max:100',
            "descripcion"=>'required',
            "precio"=> 'required|gt:0'
        ],[
            'nombre.required'=> 'Debes rellenar el nombre',
            'nombre.max'=> 'El nombre no puede exceder los 100 caracteres',
            'descripcion.max'=> 'El nombre on exceder de 100 caracteres',
            'precio.gt'=> 'El precio debe ser mayor que 0'
        ]
        );
        /*
        $p = new Product(); //un objeto de tipo producto que gracia a eloquent es una fila de la tabla
        //dentro del input se pone el name del formulario, no de la base de datos
        $p->nombre = $request->input("nombre");
        $p->descripcion = $request->input("descripcion");
        $p->precio = $request->input("precio");
        $p->save(); // save es un método de eloquent
        //recuerda que las route va en plural
        return redirect()->route('products.index')->with('exito', 'Producto actualizado correctamente');
        */
        //ESTO NO ESTA EN LOS APUNTES
        Product::create($request->all()); //esto es una forma de recoger los request. Primero valida y luego lo empaqueta todo
        return redirect()->route('products.index')->with('exito', 'Producto actualizado correctamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //buscar el producto
        $product = Product::find($id); //eloquent
        //return $product;
        //devolver vista
        return view('product.show', ['product'=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Buscar product
        $product = Product::find($id);
        return view('product.edit',['product' => $product]);
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

        $request->validate([
            "nombre"=>'required|max:7',
            "descripcion"=>'required',
            "precio"=> 'required|gt:0'
        ],[
            'nombre.required'=> 'Debes rellenar el nombre',
            'nombre.max'=> 'El nombre no puede exceder los 100 caracteres',
            'descripcion.max'=> 'El nombre on exceder de 100 caracteres',
            'precio.gt'=> 'El precio debe ser mayor que 0'
        ]
        );
        $p = Product::find($id);
        //dentro del input se pone el name del formulario, no de la base de datos
        $p->nombre = $request->input("nombre");
        $p->descripcion = $request->input("descripcion");
        $p->precio = $request->input("precio");
        $p->save(); // save es un método de eloquent
        //recuerda que las route va en plural
        return redirect()->route('products.index')->with('exito', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Product::find($id);
        $p->delete();
        return redirect()->route('products.index')->with('exito', 'Producto actualizado correctamente');
    }
}
