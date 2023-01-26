@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Detalle de productos: <h1>
                <a href="{{route('products.index')}}" class="btn btn-primary">Lista</a>
                
            <div>
                Nombre
                <strong>
                    {{$product->nombre}}
                </strong>
            </div>

            <div>
                Descripcion
                <strong>
                    {{$product->descripcion}}
                </strong>
            </div>


            <div>
                Precio
                <strong>
                    {{$product->precio}}
                </strong>
            </div>
        </div>
    </div>
</div>
@endsection