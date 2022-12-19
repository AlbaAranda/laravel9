<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TE ESTOY DANDO INFORMACION DEL MODULO</h1>
    <table>
        <tr>
            <th>Nombre del módulo</th>
            <td>{{$nombremodulo}}</td>
        </tr>
        <tr>
            <th>Ciclo</th>
            <td>{{$ciclo}}</td> <!--esto es como poner < ?php $variable ? > -->
        </tr>
    </table>

    @if ($nombremodulo == "dwes")
        <p>Estoy en Entorno Servidor</p>
    @else 
        <p>Estoy en Entorno Cliente</p>
    @endif

    <h4>Departamento y ubicación del mismo</h4>
    @foreach ($departamentos as $key =>$dpto)
    
    {{$key}} : {{$dpto}} <br>
    @endforeach
</body>
</html>