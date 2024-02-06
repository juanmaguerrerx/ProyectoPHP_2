@extends('../layout')

@section('titulo', 'Incidencias')


<header>@include('navbar')</header>

@section('content')
    @extends('../tabla')
    @section('nombre_tabla') Incidencias @endsection
@section('thead')
    <style>
        thead {
            font-size: smaller;
        }

        tbody {
            font-size: small;
        }

        .R {
            /* realizada */
        }

        .C {
            /* cancelada */
        }

        .P {
            /* en progreso */
        }

        .E {
            /* esperando aprobacion */
        }
    </style>
    <th>CIF</th>
    <th>Nombre</th>
    <th>Telefono</th>
    <th>Descripción</th>
    <th>Correo</th>
    <th>Provincia</th>
    <th>Operario</th>
    <th>Estado</th>
    <th>Fecha Creación</th>
    <th>Fecha Realización</th>
    <th><strong>Opciones</strong></th>
@endsection
@section('tbody')

    @foreach ($incidencias as $incidencia)
        @php
            $estado = '';
            $icon = '';
            switch ($incidencia['estado']) {
                case 'P':
                    $estado = 'En Proceso';
                    //icono
                    break;
                case 'R':
                    $estado = 'Realizada';
                    //icono
                    break;
                case 'C':
                    $estado = 'Cancelada';
                    //icono
                    break;
                case 'E':
                    $estado = 'Esperando Aprobación...';
                    //icono
                    break;
                default:
                    $estado = '';
                    $icono = '';
                    break;
            }
        @endphp
        <tr class="{{ $incidencia['estado'] }}">
            <td>{{ $incidencia['cif_cliente'] }}</td>
            <td>{{ $incidencia['persona_contacto'] }}</td>
            <td>{{ $incidencia['telefono_contacto'] }}</td>
            <td>{{ $incidencia['descripcion'] }}</td>
            <td>{{ $incidencia['correo'] }}</td>
            <td>{{ $incidencia['provincia'] }}</td>
            <td>{{ $incidencia['dni_empleado'] }}</td>
            <td class="{{ $incidencia['estado'] }}">{{ $estado }}</td>
            <td>{{ $incidencia['fecha_creacion'] }}</td>
            <td>{{ $incidencia['fecha_realizacion'] }}</td>
            <td>
                <a href="">
                    <button class="btn btn-outline-warning bb ww btn-sm"><i class="bi bi-pencil-square"></i></button>
                </a>
                <br>
                <a href="">
                    <button class="btn btn-danger bb ww btn-sm"><i class="bi bi-trash"></i></button>
                </a>
                <br>
                <a href="">
                    <button class="btn btn-secondary bb ww btn-sm"><i class="bi bi-search"></i></button>
                </a>
            </td>
        </tr>
    @endforeach
@endsection
<a href="">{{-- {{ route('incidencias.create') }} --}}<button
        class="btn btn-outline-secondary btn-lg fixed-button text-white border-white"><i
            class="bi bi-plus"></i></button></button></a>
@endsection
