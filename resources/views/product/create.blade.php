@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Detalle de productos: <h1>
            <a href="{{route('products.index')}}" class="btn btn-primary">Lista</a>
             {{--<a href="{{route('products.edit', $product-> id)}}" class="btn btn-warning">Editar</a> --}}
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
            <form action="{{ route('products.store')}}" method="post">
                @csrf
                <div>Nombre: <input type="text" name="nombre" id="nombre" > <br><br></div>
                <div>Descripcion: <input type="text" name="descripcion" id="descripcion"><br><br></div>
                <div>Precio: <input type="text" name="precio" id="precio" ><br><br></div>

                <button class="btn btn-primary" type="submit">Añadir</button>
            </form>
    
        </div>
    </div>
</div>
@endsection