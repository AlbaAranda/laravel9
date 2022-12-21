@extends('layouts.master')

@section('title', 'Alta asignaturas')

@section('encabezado')
    Alta de asignaturas
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
    <br>Completa el siguiente formulario:
    <form action="{{route('asignaturas.store')}}" method="post">
    @csrf <!--Esto se pone por seguridad. lo malicioiso, se puede hacer un ataque con -> cross-site request forgery. Hay que estar logueado para poder hacer esto. Con este arroba se añade un token, un valor en el input-->
    <label for="nombre">Nombre</label><br>
    <input type="text" name="nombre" id="nombre" value="{{old('nombre') }}"> <!--Con el contenido en value se queda lo escrito en el input -->
    <br><br>
    <label for="curso">Curso</label><br>
    <input type="text" name="curso" id="curso" value="{{old('curso') }}">
    <br><br>
    <label for="ciclo">Ciclo</label><br>
    <input type="text" name="ciclo" id="ciclo" value="{{old('ciclo') }}">
    <br><br>
    <label for="comentario">Comentario</label><br>
    <textarea name="comentario" id="comentarios" cols="30" rows="10" placeholder="Escribe aquí"></textarea>
    <br><br>
@stop

@section('boton')
    @parent

    @section('destino')
        {{route('asignaturas.store')}}
    @stop

    @section('accionformulario')
    Enviar
    @stop
    </form>
@stop


