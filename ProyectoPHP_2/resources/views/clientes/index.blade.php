@extends('../layout')

@section('titulo', 'Clientes')


<header>@include('navbar')</header>

@section('content')
    @extends('../tabla')
    @section('nombre_tabla') Clientes @endsection
@section('thead')
    <th scope="col">CIF</th>
    <th scope="col">Nombre</th>
    <th scope="col">Telefono</th>
    <th scope="col">Correo</th>
    <th scope="col">Cuenta Corriente</th>
    <th scope="col">País</th>
    <th scope="col">Importe Mensual</th>
    <th scope="col"><strong>Opciones</strong></th>
@endsection
@section('tbody')
    @foreach ($clientes as $cliente)
        <tr scope="row">
            <td>{{ $cliente['cif'] }}</td>
            <td>{{ $cliente['nombre'] }}</td>
            <td>{{ $cliente['telefono'] }}</td>
            <td>{{ $cliente['correo'] }}</td>
            <td>{{ $cliente['cuenta_corriente'] }}</td>
            <td>{{ $cliente['pais_id'] }}</td>
            <td>{{ $cliente['importe_mensual'] }}</td>
            <td><a href=""><button class="btn btn-outline-warning bb"><i class="bi bi-pencil-square"></i></button></a><a
                    href=""><button class="btn btn-danger bb"><i class="bi bi-trash"></i></button></a></td>
        </tr>
    @endforeach
@endsection
<a href="{{ route('clientes.create') }}"><button class="btn btn-outline-secondary btn-lg fixed-button border-white"><i
            class="bi bi-plus"></i></button></a>
@endsection
