@extends('../layout')

@section('titulo', 'Ver Incidencia')

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

@php
    $estado = '';
    $icono = '';
    switch ($incidencia['estado']) {
        case 'P':
            $estado = 'En Proceso';
            $icono = 'bi bi-clock-history';
            //icono
            break;
        case 'R':
            $estado = 'Realizada';
            $icono = 'bi bi-check-circle';
            //icono
            break;
        case 'C':
            $estado = 'Cancelada';
            //icono
            $icono = 'bi bi-x-circle';
            break;
        case 'E':
            $estado = 'Esperando Aprobación...';
            //icono
            $icono = 'bi bi-hourglass-split';
            break;
        default:
            $estado = '';
            $icono = '';
            break;
    }

@endphp

@section('content')
    <div class="link_atras">
        <a href="{{ route('incidencias.index') }}"> &#60; Volver</a>
    </div>
    <div class="link_editar">
        <a href="{{ route('incidencias.edit', [$incidencia->id]) }}">Editar &#62;</a>
    </div>
    <div class="form-container fm marginTopTabla custom-box">
        <h2 class="text-center mb-4 text-white">Datos Incidencia</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="" class="form-label">CIF:</label>
                <div class="form-control">{{ $incidencia['cif_cliente'] }}</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="" class="form-label">Nombre Cliente:</label>
                <div class="form-control">{{ $incidencia['persona_contacto'] }}</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="" class="form-label">Telefono Cliente:</label>
                <div class="form-control">{{ $incidencia['telefono_contacto'] }}</div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Correo Cliente:</label>
                <div class="form-control">{{ $incidencia['correo'] }}</div>
            </div>
            <div class="col-md-12 mt-4">
                <label for="" class="form-label">Descripción:</label>
                <textarea class="form-control txt" disabled="disabled" cols="10" rows="5">{{ $incidencia['descripcion'] }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="" class="form-label">Direccion:</label>
                <div class="form-control">{{ $incidencia['direccion'] }}</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="" class="form-label">Población:</label>
                <div class="form-control">{{ $incidencia['poblacion'] }}</div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Código Postal:</label>
                <div class="form-control">{{ $incidencia['codigo_postal'] }}</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="" class="form-label">Provincia:</label>
                <div class="form-control">{{ $incidencia['provincia'] }}</div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Estado:</label>
                <div class="form-control {{ $incidencia['estado'] }}"> {{ $estado }} <i
                        class="{{ $icono }}"></i>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="" class="form-label">Fecha Creación:</label>
                <div class="form-control">{{ $incidencia['fecha_creacion'] }}</div>
            </div>
            @if ($incidencia['fecha_realizacion'])
                <div class="col-md-6">
                    <label for="" class="form-label">Fecha Realización:</label>
                    <div class="form-control">{{ $incidencia['fecha_realizacion'] }}</div>
                </div>
            @endif
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="" class="form-label">Empleado Encargado:</label>
                <div class="form-control">{{ $incidencia['dni_empleado'] }}</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <label for="" class="form-label">Anotaciones Anteriores:</label>
                <div class="form-control">{{ $incidencia['anotaciones_anteriores'] }}</div>
            </div>
        </div>

        @if ($incidencia['anotaciones_posteriores'])
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="" class="form-label">Anotaciones Posteriores:</label>
                <div class="form-control">{{ $incidencia['anotaciones_posteriores'] }}</div>
            </div>
        </div>
        @endif
        
        {{-- {{dd($incidencia['fichero_resumen'])}} --}}

        @if ($incidencia['fichero_resumen'])
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="" class="form-label">Fichero Resumen:</label>
                <div class="form-control">
                        <embed src="{{url('storage/ficheros_resumen/'.$incidencia['fichero_resumen'])}}" type="application/pdf" width="100%" height="600px">
                </div>
            </div>
        </div>
        @endif



    </div>

@endsection
