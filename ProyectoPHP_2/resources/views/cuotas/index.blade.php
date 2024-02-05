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
        <tr>
            <td>{{ $cuota['cif_cliente'] }}</td>
            <td>{{ $cuota['concepto'] }}</td>
            <td>{{ $cuota['fecha_emision'] }}</td>
            <td>{{ $cuota['importe'] }}</td>
            <td>
                @if ($cuota['pagada'] == 1)
                    Si
                @else
                    No
                @endif
            </td>
            <td>{{ $cuota['fecha_pago'] }}</td>
            <td>{{ $cuota['notas'] }}</td>
            <td>
                <a href="">
                    <button class="btn btn-outline-warning btn-sm bb">Modificar</button>
                </a>
                <a href="">
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </a>
                @if ($cuota['pagada'] == 1)
                    <a href=""><button class="btn btn-outline-secondary btn-sm">Descargar</button></a>
                @endif
            </td>
        </tr>
    @endforeach
@endsection
<a href="{{ route('cuotas.create') }}"><button
        class="btn btn-outline-secondary btn-lg fixed-button text-white border-white">Crear
        Cuota</button></a>
@endsection
