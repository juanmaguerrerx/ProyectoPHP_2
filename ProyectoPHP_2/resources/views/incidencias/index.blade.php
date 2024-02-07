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
            background-color: rgba(48, 74, 8, 0.7) !important;
        }

        .C {
            /* cancelada */
            background-color: rgba(74, 10, 8, 0.7) !important;
        }

        .P {
            /* en proceso */
            background-color: rgba(8, 49, 74, 0.7) !important;
        }

        .E {
            /* esperando aprobacion */
            background-color: rgba(74, 60, 8, 0.7) !important;
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
                    $icon = 'bi bi-clock-history';
                    //icono
                    break;
                case 'R':
                    $estado = 'Realizada';
                    $icon = 'bi bi-check-circle';
                    //icono
                    break;
                case 'C':
                    $estado = 'Cancelada';
                    //icono
                    $icon = 'bi bi-x-circle';
                    break;
                case 'E':
                    $estado = 'Esperando Aprobación...';
                    //icono
                    $icon = 'bi bi-hourglass-split';
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
            <td class="{{ $incidencia['estado'] }}">{{ $estado }} <i class="{{ $icon }}"></i></td>
            <td>{{ $incidencia['fecha_creacion'] }}</td>
            <td>{{ $incidencia['fecha_realizacion'] }}</td>
            <td>
                <abbr title="Editar">
                    <a href="{{route('incidencias.edit')}}">
                        <button class="btn btn-outline-warning ww bb"><i class="bi bi-pencil-square"></i></button>
                    </a>
                </abbr>
                <br>
                <abbr title="Eliminar">
                    <a href=""><button class="btn btn-danger ww bb"><i class="bi bi-trash"></i></button>
                    </a>
                </abbr>
                <br>
                <abbr title="Ver">
                    <a href="{{ route('incidencias.show') }}">
                        <button class="btn btn-secondary ww bb"><i class="bi bi-search"></i></button>
                    </a>
                </abbr>
            </td>
        </tr>
    @endforeach
@endsection
<abbr title="Añadir">
    <a href="{{ route('incidencias.create') }}">
        <button class="btn btn-outline-secondary btn-lg ww fixed-button text-white border-white"><i
                class="bi bi-plus"></i>
        </button>
    </a>
</abbr>
@endsection
