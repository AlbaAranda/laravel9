<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Throwable;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //este this seria con el de web
       // $this->authorize('viewAny', Product::class);

       //en api seria:
       /*$user = \Auth::user();
       if($user->can('viewAny', Product::class)){
            $products = Product::all();
            return response()->json(['status'=> 'ok', 'data'=>$products],200);
       }
       else{
            return response()->json(['status'=> 'nok', 'message'=>"No tienes permiso"],403);
       }*/
       
        //$products = Product::all();
        //return $products;
        //return response()->json(['status' => 'ok','data' => $products,200]);

        $user = \Auth::user();
        
        if(!$user->can('viewAny', Product::class)){
            return response()->json(['status'=> 'nok', 'message'=>"No tienes permiso"],403);
        }
        
        return response()->json(['status' => 'ok','data' => $products,200]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Recibe los datos rellenado del formulario

        /*
        $request->validate([
            "nombre"=>'required|max:100',
            "descripcion"=>'required',
            "precio"=> 'required|gt:0'
        ]);*/

        $validated = Validator::make($request->all(),[
    
            "nombre"=>'required|max:100',
            "descripcion"=>'required',
            "precio"=> 'required|gt:0'
        ]);

        //si falla la validacion error 422
        if($validated->fails()){
            return response()->json(["status"=>"NOK", "data" => $validated->errors()],422);
        }
        
        //si no crea un producto
        $newproduct = Product::create($request->all());
        return response()->json(["status"=>"ok", "data" => $newproduct],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        // Corresponde con la ruta /studies/{study}
        // Buscamos un study por el ID.
        $product= Product::find($id);

        // Chequeamos si encontró o no el study
        if (! $product)
        {
            // Se devuelve un array errors con los errores detectados y código 404
            return response()->json(['errors'=>(['code'=>404,'message'=>'No se encuentra un producto con ese código.'])],404);
        }

    // Devolvemos la información encontrada.
    return response()->json(['status'=>'ok','data'=>$product],200);

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
        $product = Product::find($id);

        if(!$product){

            return response()->json([
                'status'=> 'NOK',
                'message'=> 'No se encuentra un producto con ese código'

            ],404);
        }

        $validated = Validator::make($request->all(),[

            "nombre"=>'required|max:100',
            "descripcion"=>'required',
            "precio"=> 'required|gt:0'
        ]);

        //si falla la validacion error 422
        if($validated->fails()){
            return response()->json(["status"=>"NOK", "data" => $validated->errors()],422);
        }

        $product->fill($request->all()); //relleno con los datos el objeto 
        $product->save(); //guardo en bbdd
        
        return response()->json(['status'=> 'ok', 'data'=>$product],200);
        
        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product){

            return response()->json([
                'status'=> 'NOK',
                'message'=> 'No se encuentra un producto con ese código.'

            ],404);
        } //if


        try{
            $product->delete();

            //tdo ok con el codigo 204
            return response()->json(['Borrado correctamente'],204);
        }
        catch (\Throwable $th){
            return response()->json(["status" => "NOK",
                    "mensaje" => "Borrado no realizado",
                    "error" => $th->getMessage()
            ],409);
        } //termina try
    }
}
