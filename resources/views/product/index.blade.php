@extends('layouts.master')

@section('title', 'Listado de productos')

@section('encabezado')
    Lista de productos
@stop


<!--Para recoger los errores -->
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
    @endif
    <br>Lista de Productos: <br>
    <a href="{{route('products.create') }}">Nuevo Producto</a>
    <table border="1">
        @foreach($productList as $product)

        <tr>
            <td>{{$product->nombre }}</td>
            <td>{{$product->descripcion }}</td>
            <td>{{$product->precio }}</td>

            <td>
                <a href="{{route('products.edit', $product->id) }}">Editar</a>
                
            </td>
                
            <td>
                <a href="{{route('products.show', $product->id) }}">Ver</a>
            </td>
            
            <td>
                Borrar
            </td>
        </tr>
        @endforeach
    </table>

@stop

@section('boton')
    @parent

@stop


