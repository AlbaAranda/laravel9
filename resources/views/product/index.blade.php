@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($message = Session::get('exito'))
            <div class="alert alert-succese"> 
                <p>{{$message}}</p>
            </div>
            @endif
            <h1>Listado de productos:</h1> <br>
            @can('create', App\Models\Product::class)
            <a class="btn btn-primary" href="{{ route('products.create') }}">Nuevo producto</a>
            @endcan
            <br> <br>
            <table class="table table-striped">
                <tr style="text-align: center;">
                <thead>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                </thead>
                </tr>
                @foreach($productList as $product)
                <tr>
                    <td>{{ $product->nombre }}</td>
                    <td>{{ $product->descripcion }}</td>
                    <td>{{ $product->precio }}</td>
                    
                    <td>
                        @can('update', $product) {{--si puede encontrar este metodo que lo ejecute y muestre solo los botones pares --}}
                        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">Editar</a>
                        @endcan
                    </td>
                    <td>
                    @can('view', $product)
                        <a href="{{ route('products.show',$product->id) }}" class="btn btn-primary">Ver</a>
                    @else
                    @endcan
                    </td>
                    <td>
                        @can('delete', $product)
                        <form action="{{ route('products.destroy',$product->id) }}" method= "post" >
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-primary" type="submit">Borrar</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection