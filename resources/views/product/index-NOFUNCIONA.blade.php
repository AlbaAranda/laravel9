@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<!--Para recoger los errores 
@section('cuerpo')
    @parent
    @if($errors->any())
    <div class="alert alert-danger">
        <h6>Por favor corrige los siguientes errores</h6>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    @endif -->
            <h1>Lista de Productos: <h1>
            <a class="btn btn-primary" href="{{route('products.create') }}">Nuevo Producto</a>
            <table class="table table-striped">
                @foreach($productList as $product)

                <tr>
                    <td>{{$product->nombre }}</td>
                    <td>{{$product->descripcion }}</td>
                    <td>{{$product->precio }}</td>

                    <td>
                        <a href="{{route('products.edit', $product->id) }}" class="btn btn-primary">Editar</a>
                        
                    </td>
                        
                    <td>
                        <a href="{{route('products.show', $product->id) }}" class="btn btn-primary">Ver</a>
                    </td>
                    
                    <a href="{{route('products.destroy', $product->id) }}" class="btn btn-primary">Borrar</a>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

