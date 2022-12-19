@extends('layouts.master')

@section('title', 'Alta asignaturas')

@section('encabezado')
    Alta de asignaturas
@stop

@section('cuerpo')
    @parent
    <br>Completa el siguiente formulario:
    <form action="{{route('asignaturas.store')}}" method="post">
    <label for="nombre">Nombre</label><br>
    <input type="text" name="nombre" id="nombre">
    <br><br>
    <label for="curso">Curso</label><br>
    <input type="text" name="curso" id="curso">
    <br><br>
    <label for="ciclo">Ciclo</label><br>
    <input type="text" name="ciclo" id="ciclo">
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


