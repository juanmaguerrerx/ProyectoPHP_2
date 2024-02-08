@extends('../layout')

@section('titulo', 'Crear Incidencia')

@section('style')
    <style>
        .txt {
            background-color: rgba(255, 255, 255, 0.149) !important;
            backdrop-filter: blur(5px) !important;
            color: white !important;
        }
    </style>
@endsection

<header>@include('navbar')</header>

@section('content')
    <div class="link_atras">
        <a href="{{ route('incidencias.index') }}"> &#60; Volver</a>
    </div>
    <div class="form-container fm marginTopTabla custom-box">
        <form action="" method="post">
            @csrf

            <h2 class="text-center mb-4 text-white">Datos Incidencia</h2>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">CIF:</label>
                    <select name="cif_cliente" id="cif_cliente" class="form-control">
                        {{-- CIF CLIENTES --}}
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente['id'] }}">{{$cliente['nombre']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="" class="form-label">Nombre Cliente:</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Telefono Cliente:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Correo Cliente:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-12 mt-4">
                    <label for="" class="form-label">Descripción:</label>
                    <textarea class="form-control txt" cols="10" rows="5"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="" class="form-label">Direccion:</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Población:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Código Postal:</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Provincia:</label>
                    <select class="form-control">
                        @foreach ($provincias as $provincia)
                            <option value="{{ $provincia['cod'] }}">
                                {{ $provincia['nombre'] }}
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Estado:</label>
                    <select class="form-control">
                        <option value="P">En Proceso</option>
                        <option value="R">Realizada</option>
                        <option value="E">Esparando Aprobación</option>
                        <option value="C">Cancelada</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Fecha Creación:</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Fecha Realización:</label>
                    <input type="date" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="" class="form-label">Empleado Encargado:</label>
                    <select class="form-control">
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado['id'] }}">{{ $empleado['nombre_empleado'] }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- FALTA FICHERO RESUMEN --}}
            </div>
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                </div>
            </div>
        </form>

    @endsection
