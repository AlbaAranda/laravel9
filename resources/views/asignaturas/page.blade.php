@extends('layouts.master')

@section('title', 'Pagina de Informacion')

@section('widget')
    @parent <!-- hereda lo del padre y además añade más codigo en el padre -->
    <h4>Esto es un añadido</h4>
@stop <!-- para para una pagina hija se pone stop no show-->


@section('amincontent')
<!-- sin el parent estoy sobreescribiendo el contenido del padre, no se hereda su contenido-->
    <p>Otro parrafo mas</p>
@stop <!-- para para una pagina hija se pone stop no show-->

@section('secondarycontent')
    <h2>Contenido sencundario</h2>
    {{$nombremodulo}}  <!--Es como poner dentro de una seccion php un echo  -->
@stop