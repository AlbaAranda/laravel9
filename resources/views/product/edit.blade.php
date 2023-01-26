@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Detalle de productos: <h1>
            <a href="{{route('products.index')}}" class="btn btn-primary">Lista</a>
             <!--<a href="{{route('products.edit', $product-> id)}}" class="btn btn-warning">Editar</a> -->
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
            <form action="{{ route('products.update', ['product' => $product->id])}}" method="post">
                @csrf
                @method("PUT")
                Nombre: <input type="text" name="nombre" id="nombre" value="{{$product->nombre ?? ''}}"> <br><br>
                Descripcion: <input type="text" name="descripcion" id="descripcion" value="{{$product->descripcion ?? ''}}"><br><br>
                Precio: <input type="text" name="precio" id="precio" value="{{$product->precio ?? ''}}"><br><br>

                <button class="btn btn-primary" type="submit">Actualizar</button>
            </form>
    
        </div>
    </div>
</div>
@endsection