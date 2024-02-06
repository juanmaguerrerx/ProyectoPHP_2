@extends('../layout')

@section('titulo', 'Cuotas')


<header>@include('navbar')</header>

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
    <th><strong>Opciones</strong></th>
@endsection
@section('tbody')

    @foreach ($cuotas as $cuota)
        @php
            $cuota['fecha_emision'] = new DateTime($cuota['fecha_emision']);
            $fecha_emision = $cuota['fecha_emision']->format('d/m/Y');
            if ($cuota['fecha_pago'] !== null) {
                $cuota['fecha_pago'] = new DateTime($cuota['fecha_pago']);
                $fecha_pago = $cuota['fecha_pago']->format('d/m/Y');
            }else $fecha_pago = null;
        @endphp
        <tr>
            <td>{{ $cuota['cif_cliente'] }}</td>
            <td>{{ $cuota['concepto'] }}</td>
            <td>{{ $fecha_emision }}</td>
            <td>{{ $cuota['importe'] }}</td>
            <td>
                @if ($cuota['pagada'] == 1)
                    Si
                @else
                    No
                @endif
            </td>
            <td>{{ $fecha_pago == null ? '-' : $fecha_pago }}</td>
            <td>{{ $cuota['notas'] }}</td>
            <td>
                <a href="">
                    <button class="btn btn-outline-warning bb"><i class="bi bi-pencil-square"></i></button>
                </a>
                <a href="">
                    <button class="btn btn-danger bb"><i class="bi bi-trash"></i></button>
                </a>
                @if ($cuota['pagada'] == 1)
                    <a href=""><button class="btn btn-outline pur bb"><i class="bi bi-download"></i></button></a>
                @endif
            </td>
        </tr>
    @endforeach
@endsection
<a href="{{ route('cuotas.create') }}"><button
        class="btn btn-outline-secondary btn-lg fixed-button text-white border-white"><i
            class="bi bi-plus"></i></button></button></a>
@endsection
