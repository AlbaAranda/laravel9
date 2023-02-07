<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


class ProductController extends Controller
{
    //Con esto se está filtrando todas las peticiones sobre el controlador De Product
    public function __construct(){
        $this->middleware('auth'); // para ver los productos de los usuarios autenticados. Si no esta autenticado no vas a poder ver los productos

        //$this->middleware('auth')->only('index'); -> para que filtre solo las peticiones del index

        //$this->middleware('auth')->except('index');  para que filtre las peticiones todas excepto las del index
        session(['contador' => '0']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Product::class); //la forma mas simple de aplicar la politica
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
        $this->authorize('create', Product::class); 
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

        $this->authorize('create', Product::class); 
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
        $this->authorize('view', $product);
        //return $product;

        if($id %2 == 0){
            session()->increment('contador');
            session(['color' => 'rojo']);
        }
        else{
            $contador = 0;
            session(['color' => 'verde']);
            session(['contador' => $contador]);
        }
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
        $this->authorize('update', $product);
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

        $this->authorize('update', $p);

        //recuerda que las route va en plural
        return redirect()->route('products.index')->with('exito', 'Producto actualizado correctamente');

        return redirect()->route('products.index')->with('error', 'Producto no actualizado');
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
        $this->authorize('delete', $p); //metodo del policy
        $p->delete();
        return redirect()->route('products.index')->with('exito', 'Producto actualizado correctamente');
    }
}
