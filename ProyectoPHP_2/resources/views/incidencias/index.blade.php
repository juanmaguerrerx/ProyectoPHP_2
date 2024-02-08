@extends('../layout')

@section('titulo', 'Incidencias')


<header>@include('navbar')</header>

@section('content')
    @extends('../tabla')
    @section('nombre_tabla') Incidencias @endsection
@section('thead')
    <style>
        thead {
            font-size: small;
        }

        tbody {
            font-size: small;
        }

        .botones {
            display: inline-flex;
        }
    </style>
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
        <tr>
            <td>{{ $incidencia['persona_contacto'] }}</td>
            <td>{{ $incidencia['telefono_contacto'] }}</td>
            <td>{{ $incidencia['descripcion'] }}</td>
            <td>{{ $incidencia['correo'] }}</td>
            <td>{{ $incidencia['provincia'] }}</td>
            <td>{{ $incidencia['dni_empleado'] }}</td>
            <td><span class="{{ $incidencia['estado'] }}">{{ $estado }} <i class="{{ $icon }}"></i></span></td>
            <td>{{ $incidencia['fecha_creacion'] }}</td>
            <td>{{ $incidencia['fecha_realizacion'] }}</td>
            <td style="width: 150px">
                <abbr title="Editar">
                    <a href="{{ route('incidencias.edit', [$incidencia->id]) }}">
                        <button class="btn btn-outline-warning bb btn-sm"><i class="bi bi-pencil-square"></i></button>
                    </a>
                </abbr>
                <abbr title="Eliminar">
                    <a href=""><button class="btn btn-danger bb btn-sm"><i class="bi bi-trash"></i></button>
                    </a>
                </abbr>
                <abbr title="Ver">
                    <a href="{{ route('incidencias.show', [$incidencia->id]) }}">
                        <button class="btn btn-secondary bb btn-sm"><i class="bi bi-search"></i></button>
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
