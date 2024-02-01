@extends('../layout')

@section('titulo', 'Clientes')

@section('style')
    <style>
        .fixed-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .table-container {
            max-width: 900px;
            margin: auto;
            margin-top: 50px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            padding: 1rem;
            text-align: center;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .table-hover tbody tr:hover {
            background-color: #e0e0e0;
        }

        .bb {
            margin-bottom: 2px;
        }
    </style>
@endsection
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

<a href="{{ route('clientes.create') }}"><button class="btn btn-outline-primary btn-lg fixed-button">Crear
        Cliente</button></a>
@endsection
