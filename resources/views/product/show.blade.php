@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        
            <h1>Detalle de productos: <h1>
            
            {{-- dd(session()->all()) --}}

            
            <a href="{{route('products.index')}}" class="btn btn-primary">Lista</a>

            @can('update', $product)
            <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning">Editar</a>
            @endcan   
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

            <div>
                Color
                <strong>
                    {{session('color') }}
                </strong>
            </div>
        </div>
    </div>
</div>
@endsection