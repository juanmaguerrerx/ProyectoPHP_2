@extends('layout')
@section('titulo', 'Dashboard')
@section('style')
    <style>
        body {
            /* background-image: url(../images/photo-1563340012-9a46fb6a29ff.avif);
            background-size: cover;
            background-repeat: no-repeat;
            backdrop-filter: blur(15px); */
            background-color: whitesmoke;
        }
    </style>
@endsection
<header>@include('navbar')</header>
@section('content')
    <div class="text-center b">
        <h1>Hola, Juanma</h1> {{-- nombre del usuario --}}
        <h4>¿A dónde vamos?</h4>
    </div>
    <div class="card-container">
        <div class="card cl">
            <a href="{{ route('clientes.index') }}" class="card-link">
                <div class="card-title">Clientes</div>
            </a>
        </div>

        <div class="card">
            <a href="{{ route('operarios.index') }}" class="card-link">
                <div class="card-title">Operarios</div>
            </a>
        </div>
    </div>

    <div class="card-container">
        <div class="card in">
            <a href="" class="card-link">
                <div class="card-title">Incidencias</div>
            </a>
        </div>

        <div class="card ta">
            <a href="" class="card-link">
                <div class="card-title">Tareas</div>
            </a>
        </div>

        <div class="card fa">
            <a href="" class="card-link">
                <div class="card-title">Facturas/Cuotas</div>
            </a>
        </div>


    </div>
@endsection
