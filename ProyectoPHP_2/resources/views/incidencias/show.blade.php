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

@section('content')
    <div class="form-container fm marginTopTabla custom-box">
        <h2 class="text-center mb-4 text-white">Datos Incidencia</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="" class="form-label">CIF:</label>
                <div class="form-control"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="" class="form-label">Nombre Cliente:</label>
                <div class="form-control"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="" class="form-label">Telefono Cliente:</label>
                <div class="form-control"></div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Correo Cliente:</label>
                <div class="form-control"></div>
            </div>
            <div class="col-md-12 mt-4">
                <label for="" class="form-label">Descripción:</label>
                <textarea class="form-control txt" disabled="disabled" cols="10" rows="5"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="" class="form-label">Direccion:</label>
                <div class="form-control"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="" class="form-label">Población:</label>
                <div class="form-control"></div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Código Postal:</label>
                <div class="form-control"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="" class="form-label">Provincia:</label>
                <div class="form-control"></div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Estado:</label>
                <div class="form-control {{-- CLASE COLOR --}}"> {{-- ICONO --}}</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="" class="form-label">Fecha Creación:</label>
                <div class="form-control"></div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Fecha Realización:</label>
                <div class="form-control"></div>
            </div>
        </div>

        {{--FALTA OPERARIO ENCARGADO Y FICHERO RESUMEN--}}
    </div>

@endsection
