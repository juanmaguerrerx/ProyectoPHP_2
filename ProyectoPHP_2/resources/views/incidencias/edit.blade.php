@extends('../layout')

@section('titulo', 'Editar Incidencia')

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
                    <input type="text" class="form-control"
                        value="{{ $incidencia['cif_cliente'] ? $incidencia['cif_cliente'] : '' }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="" class="form-label">Nombre Cliente:</label>
                    <input type="text" class="form-control"
                        value="{{ $incidencia['persona_contacto'] ? $incidencia['persona_contacto'] : '' }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Telefono Cliente:</label>
                    <input type="text" class="form-control"
                        value="{{ $incidencia['telefono_contacto'] ? $incidencia['telefono_contacto'] : '' }}">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Correo Cliente:</label>
                    <input type="text" class="form-control"
                        value="{{ $incidencia['correo'] ? $incidencia['correo'] : '' }}">
                </div>
                <div class="col-md-12 mt-4">
                    <label for="" class="form-label">Descripción:</label>
                    <textarea class="form-control txt" cols="10" rows="5">{{ $incidencia['descripcion'] ? $incidencia['descripcion'] : '' }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="" class="form-label">Direccion:</label>
                    <input type="text" class="form-control"
                        value="{{ $incidencia['direccion'] ? $incidencia['direccion'] : '' }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Población:</label>
                    <input type="text" class="form-control"
                        value="{{ $incidencia['direccion'] ? $incidencia['direccion'] : '' }}">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Código Postal:</label>
                    <input type="text" class="form-control"
                        value="{{ $incidencia['codigo_postal'] ? $incidencia['codigo_postal'] : '' }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Provincia:</label>
                    <select class="form-control">
                        @foreach ($provincias as $provincia)
                            <option value="{{ $provincia['cod'] }}" @if ($provincia['cod'] == $incidencia['provincia']) selected @endif>
                                {{ $provincia['nombre'] }}
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Estado:</label>
                    <select class="form-control">
                        <option value="P" @if ($incidencia['estado'] == 'P') selected @endif>En Proceso</option>
                        <option value="R" @if ($incidencia['estado'] == 'R') selected @endif>Realizada</option>
                        <option value="E" @if ($incidencia['estado'] == 'E') selected @endif>Esparando Aprobación
                        </option>
                        <option value="C" @if ($incidencia['estado'] == 'C') selected @endif>Cancelada</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Fecha Creación:</label>
                    <input type="date" class="form-control"
                        value="{{ $incidencia['fecha_creacion'] ? $incidencia['fecha_creacion'] : '' }}">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Fecha Realización:</label>
                    <input type="date" class="form-control"
                        value="{{ $incidencia['fecha_realizacion'] ? $incidencia['fecha_realizacion'] : '' }}">
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
