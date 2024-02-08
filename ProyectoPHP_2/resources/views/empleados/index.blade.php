@extends('../layout')
@section('titulo', 'Empleados')
@section('style')
    <style>
        .O {
            background-color: rgb(14, 14, 60);
            color: rgb(210, 210, 255);
        }

        .A {
            background-color: rgb(69, 61, 15);
            color: rgb(255, 243, 174);
        }
    </style>
@endsection


@include('navbar')
@section('content')
    @extends('tabla')
    @section('nombre_tabla')Empleados @endsection
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

            $rol = 'O';

            if ($empleado['admin'] == 1) {
                $rol = 'A';
            }
        @endphp
        <tr>
            <td>{{ $empleado['dni'] }}</td>
            <td>{{ $empleado['nombre_empleado'] }}</td>
            <td>{{ $empleado['correo'] }}</td>
            <td>{{ $empleado['telefono'] }}</td>
            <td>{{ $empleado['direccion'] }}</td>
            <td>{{ $fecha_alta }}</td>
            <td> <span class="{{ $rol }}">{{ $empleado['admin'] == 0 ? 'Operario' : 'Administrador' }}</span></td>
            <td>
                <abbr title="Editar">
                    <a href="{{ route('empleados.edit', [$empleado->id]) }}">
                        <button class="btn btn-outline-warning bb"><i class="bi bi-pencil-square"></i></button>
                    </a>
                </abbr>
                <abbr title="Eliminar">
                    <a href=""><button class="btn btn-danger bb"><i class="bi bi-trash"></i></button>
                    </a>
                </abbr>
            </td>
        </tr>
    @endforeach
@endsection
<abbr title="Añadir">
    <a href="{{ route('empleados.create') }}">
        <button class="btn btn-outline-secondary btn-lg fixed-button ww text-white border-white"><i
                class="bi bi-plus"></i>
        </button>
    </a>
</abbr>

@endsection
