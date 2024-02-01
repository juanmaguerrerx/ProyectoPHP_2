@extends('../layout')
@section('titulo', 'Operarios')
@section('style')
    <style>
        .fixed-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
        
        .table-container {
            max-width: 1000px;
            margin: auto;
            margin-top: 50px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            padding: 1rem;
            text-align: center;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .table-hover tbody tr:hover {
            background-color: #e0e0e0;
        }

        .bb {
            margin-bottom: 2.5px;
        }
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
<a href=""><button class="btn btn-outline-primary btn-lg fixed-button">Crear Empleado</button></a>

@endsection
