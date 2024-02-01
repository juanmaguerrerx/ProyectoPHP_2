@extends('../layout')

@section('titulo', 'Clientes')


<header>@include('navbar')</header>
@section('content')

    @extends('../tabla')
    @section('nombre_tabla')Clientes @endsection
@section('thead')
    <th>CIF</th>
    <th>Nombre</th>
    <th>Teléfono</th>
    <th>Correo</th>
    <th>Cuenta Corriente</th>
    <th>País</th>
    <th>Importe mensual</th>
    <th><strong>Opciones</strong></th>
@endsection
@section('tbody')
    @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente['cif'] }}</td>
            <td>{{ $cliente['nombre'] }}</td>
            <td>{{ $cliente['telefono'] }}</td>
            <td>{{ $cliente['correo'] }}</td>
            <td>{{ $cliente['cuenta_corriente'] }}</td>
            <td>{{ $cliente['pais_id'] }}</td>
            <td>{{ $cliente['importe_mensual'] }}</td>
            <td><a href=""><button class="btn btn-outline-warning btn-sm bb">Modificar</button></a><a
                    href=""><button class="btn btn-danger btn-sm">Eliminar</button></a></td>
        </tr>
    @endforeach
@endsection

<a href="{{ route('clientes.create') }}"><button class="btn btn-outline-secondary btn-lg fixed-button text-white border-white">Crear
        Cliente</button></a>
@endsection
