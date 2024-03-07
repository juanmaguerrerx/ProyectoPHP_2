@extends('../layout')

@section('titulo', 'Cuotas')


<header>@include('navbar')</header>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center mt-6" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')
    @extends('../tabla')
    @section('nombre_tabla') Cuotas @endsection
@section('thead')
    <th class="w">CIF</th>
    <th>Concepto</th>
    <th class="w">Fecha de Emisión</th>
    <th>Importe</th>
    <th>Pagada</th>
    <th class="w">Fecha de Pago</th>
    <th>Notas</th>
    <th class="w"><strong>Opciones</strong></th>
@endsection
@section('tbody')

    @foreach ($cuotas as $cuota)
        @php
            $clase_pagada = '';
            if ($cuota['pagada'] == 1) {
                $clase_pagada = 'pagada';
            }

            $cuota['fecha_emision'] = new DateTime($cuota['fecha_emision']);
            $fecha_emision = $cuota['fecha_emision']->format('d/m/Y');
            if ($cuota['fecha_pago'] !== null) {
                $cuota['fecha_pago'] = new DateTime($cuota['fecha_pago']);
                $fecha_pago = $cuota['fecha_pago']->format('d/m/Y');
            } else {
                $fecha_pago = null;
            }
        @endphp
        <tr class="{{ $clase_pagada }}">
            <td>{{ $cuota['cif_cliente'] }}</td>
            <td>{{ $cuota['concepto'] }}</td>
            <td>{{ $fecha_emision }}</td>
            {{-- {{dd($cuota['importe'])}} --}}
            <td>{{ $cuota['importe'] }}€</td>
            <td>
                @if ($cuota['pagada'] == 1)
                    Si
                @else
                    No
                @endif
            </td>
            <td>{{ $fecha_pago == null ? '~' : $fecha_pago }}</td>
            <td>{{ $cuota['notas'] }}</td>
            <td>
                <abbr title="Editar">
                    <a href="{{ route('cuotas.edit', [$cuota->id]) }}">
                        <button class="btn btn-outline-warning bb"><i class="bi bi-pencil-square"></i></button>
                    </a>
                </abbr>
                <abbr title="Eliminar">
                    <button class="btn btn-danger bb" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                        onclick="{{ $cuotaDel = $cuota }}"><i class="bi bi-trash"></i></button>
                </abbr>
                @if ($cuota['pagada'] == 1)
                    <abbr title="Descargar">
                        <a href="{{ route('cuotas.factura', [$cuota->id]) }}"><button class="btn btn-outline pur bb"><i
                                    class="bi bi-download"></i></button></a>
                    </abbr>
                @endif
            </td>
        </tr>
    @endforeach
@endsection

<div class="row mt-2">
    <div class="col-12">
        {{ $cuotas->links() }}
    </div>
</div>

<abbr title="Añadir">
    <a href="{{ route('cuotas.create') }}">
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
                <form action="{{ route('cuotas.destroy', [$cuotaDel->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="confirmDeleteButton" class="btn btn-danger">Eliminar</button>
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
