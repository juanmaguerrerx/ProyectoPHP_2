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

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center mt-6" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

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
                    <button class="btn btn-danger bb" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i class="bi bi-trash"></i></button>
                </abbr>
            </td>
        </tr>
    @endforeach
@endsection

<div class="row mt-2">
    <div class="col-12">
        {{ $empleados->links() }}
    </div>
</div>

<abbr title="Añadir">
    <a href="{{ route('empleados.create') }}">
        <button class="btn btn-outline-secondary btn-lg fixed-button ww text-white border-white"><i
                class="bi bi-plus"></i>
        </button>
    </a>
</abbr>


<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">
            <div class="modal-header text-danger">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle-fill" style="color: white"></i> <!-- Icono de cierre -->
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar esta cuota?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" id="confirmDeleteButton" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');

        confirmDeleteButton.addEventListener('click', function() {
            
        });
    });
</script>

@endsection
