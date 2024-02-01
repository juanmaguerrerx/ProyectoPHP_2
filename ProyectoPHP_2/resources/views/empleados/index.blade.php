@extends('../layout')
@section('titulo', 'Operarios')

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
        <tr>
            <td>{{ $empleado['dni'] }}</td>
            <td>{{ $empleado['nombre_empleado'] }}</td>
            <td>{{ $empleado['correo'] }}</td>
            <td>{{ $empleado['telefono'] }}</td>
            <td>{{ $empleado['direccion'] }}</td>
            <td>{{ $empleado['fecha_alta'] }}</td>
            <td>{{ $empleado['admin'] == 0 ? 'Operario' : 'Administrador' }}</td>
            <td><a href=""><button class="btn btn-outline-warning btn-sm bb">Modificar</button></a><a
                    href=""><button class="btn btn-danger btn-sm">Eliminar</button></a></td>
        </tr>
    @endforeach
@endsection
<a href=""><button class="btn btn-outline-secondary btn-lg fixed-button">Crear Empleado</button></a>

@endsection
