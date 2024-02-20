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

        .mt-6 {
            margin: 0px auto;
            margin-top: 7rem;
            width: 200px;
        }
    </style>
@endsection

<header>@include('navbar')</header>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center mt-6" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

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
                    <button class="btn btn-danger bb" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                            class="bi bi-trash"></i></button>
                </abbr>
            </td>
        </tr>
    @endforeach

@endsection
<div class="row mt-2">
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

<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle-fill" style="color: white"></i> <!-- Icono de cierre -->
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este cliente?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" id="confirmDeleteButton" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');

        confirmDeleteButton.addEventListener('click', function() {
            // Aquí puedes agregar la lógica para enviar la solicitud de eliminación
            // Por ejemplo, puedes usar JavaScript para redirigir a la ruta de eliminación del cliente
            // window.location.href = '{{ route('clientes.destroy', [$cliente->id]) }}';
            // O puedes enviar una solicitud AJAX para eliminar el cliente sin recargar la página
        });
    });
</script>


@endsection
