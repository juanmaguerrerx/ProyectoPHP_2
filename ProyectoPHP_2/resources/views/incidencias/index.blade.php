@extends('../layout')

@section('titulo', 'Incidencias')


<header>@include('navbar')</header>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center mt-6" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')
    {{-- @if (auth()->user()->isAdmin())
        <form action="{{ route('incidencias.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="buscador" placeholder="Buscar...">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
        </form>
    @endif --}}
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
    <th>CIF</th>
    <th>Descripción</th>
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
            $fecha = $incidencia['fecha_realizacion'];
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
            if (
                $incidencia['fecha_realizacion'] == null ||
                $incidencia['fecha_realizacion'] == '0000-00-00' ||
                $incidencia['estado'] == 'P'
            ) {
                $fecha = '~';
            }
        @endphp
        <tr>
            <td>{{ $incidencia['cif_cliente'] }}</td>
            <td>{{ $incidencia['descripcion'] }}</td>
            <td>{{ $incidencia['provincia'] }}</td>
            <td>{{ $incidencia['dni_empleado'] }}</td>
            <td><span class="{{ $incidencia['estado'] }}">{{ $estado }} <i class="{{ $icon }}"></i></span>
            </td>
            <td>{{ \Carbon\Carbon::parse($incidencia['fecha_creacion'])->format('d-m-Y') }}</td>
            <td>
                @if ($fecha == '~' || $fecha == null)
                    {{ $fecha }}
                @else
                    {{ \Carbon\Carbon::parse($fecha)->format('d-m-Y') }}
                @endif
            </td>
            <td style="width: 150px">
                <abbr title="Editar">
                    <a href="{{ route('incidencias.edit', [$incidencia->id]) }}">
                        <button class="btn btn-outline-warning bb btn-sm"><i class="bi bi-pencil-square"></i></button>
                    </a>
                </abbr>
                @if (auth()->user()->isAdmin())
                    <abbr title="Eliminar">
                        <button class="btn btn-danger bb btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                            onclick="{{ $incidenciaDel = $incidencia }}"><i class="bi bi-trash"></i></button>
                    </abbr>
                @endif
                <abbr title="Ver">
                    <a href="{{ route('incidencias.show', [$incidencia->id]) }}">
                        <button class="btn btn-secondary bb btn-sm"><i class="bi bi-search"></i></button>
                    </a>
                </abbr>
            </td>
        </tr>
    @endforeach
@endsection

<div class="row mt-2">
    <div class="col-12">
        {{ $incidencias->links() }}
    </div>
</div>

@if (auth()->user()->isAdmin())
    <abbr title="Añadir">
        <a href="{{ route('incidencias.create') }}">
            <button class="btn btn-outline-secondary btn-lg ww fixed-button text-white border-white"><i
                    class="bi bi-plus"></i>
            </button>
        </a>
    </abbr>
@endif


@if (auth()->user()->isAdmin())
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
                    <form action="{{ route('incidencias.destroy', [$incidenciaDel->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="confirmDeleteButton" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');

        confirmDeleteButton.addEventListener('click', function() {

        });
    });
</script>

@endsection
