@extends('../layout')

@section('titulo', 'Clientes')

@section('style')
    <style>
        table {
            font-size: small;
        }

        .d {
            font-size: small;
            display: flex;
        }
        .pagination{
           display: flex;
           justify-content: center;
           
        }
        
        
    </style>
@endsection

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
    <th scope="col" class="op"><strong>Opciones</strong></th>
@endsection
@section('tbody')
    @foreach ($clientes as $cliente)
        <tr scope="row">
            <td>{{ $cliente['cif'] }}</td>
            <td>{{ $cliente['nombre'] }}</td>
            <td>{{ $cliente['telefono'] }}</td>
            <td>{{ $cliente['correo'] }}</td>
            <td>{{ $cliente['cuenta_corriente'] }}</td>
            <td>{{ $cliente['pais_id'] }} <img src="./images/country-flags-main/svg/{{ $cliente['pais_iso2'] }}.svg"
                    alt="{{ $cliente['pais_iso2'] }}" class="bandera"></td>
            <td>{{ $cliente['importe_mensual'] }}€</td>
            <td>
                <abbr title="Editar">
                    <a href="{{ route('clientes.edit', [$cliente->id]) }}">
                        <button class="btn btn-outline-warning bb"><i class="bi bi-pencil-square"></i></button>
                    </a>
                </abbr>
                <abbr title="Eliminar">
                    <a href=""><button class="btn btn-danger bb"><i class="bi bi-trash"></i></button>
                    </a>
                </abbr>
            </td>
        </tr>
    @endforeach

@endsection
<div class="row mt-5">
    <div class="col-12">
        {{ $clientes->links() }}
    </div>
</div>

<abbr title="Añadir">
    <a href="{{ route('clientes.create') }}">
        <button class="btn btn-outline-secondary ww btn-lg text-white fixed-button border-white"><i
                class="bi bi-plus"></i>
        </button>
    </a>
</abbr>

@endsection
