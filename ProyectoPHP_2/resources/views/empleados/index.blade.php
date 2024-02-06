@extends('../layout')
@section('titulo', 'Operarios')
@section('style')
<style>

</style>
@endsection


@include('navbar')
@section('content')
    @extends('tabla')
    @section('nombre_tabla')Operarios @endsection
@section('thead')
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Dirección</th>
        <th>Fecha alta</th>
        <th>Rol</th>
        <th><strong>Operaciones</strong></th>
    </tr>
@endsection
@section('tbody')
    @foreach ($empleados as $empleado)
    @php
     if ($empleado['fecha_alta'] != null && $empleado['fecha_alta'] != '0000-00-00') {
        $fecha_alta = (new DateTime($empleado['fecha_alta']))->format('d/m/Y');
     } else {
        $fecha_alta = '~';
     } 
    @endphp
        <tr>
            <td>{{ $empleado['dni'] }}</td>
            <td>{{ $empleado['nombre_empleado'] }}</td>
            <td>{{ $empleado['correo'] }}</td>
            <td>{{ $empleado['telefono'] }}</td>
            <td>{{ $empleado['direccion'] }}</td>
            <td>{{ $fecha_alta }}</td>
            <td>{{ $empleado['admin'] == 0 ? 'Operario' : 'Administrador' }}</td>
            <td><a href=""><button class="btn btn-outline-warning bb"><i class="bi bi-pencil-square"></i></button></a><a
                href=""><button class="btn btn-danger bb"><i class="bi bi-trash"></i></button></a></td>
        </tr>
    @endforeach
@endsection
<a href=""><button class="btn btn-outline-secondary btn-lg fixed-button text-white border-white">Crear Empleado</button></a>

@endsection
