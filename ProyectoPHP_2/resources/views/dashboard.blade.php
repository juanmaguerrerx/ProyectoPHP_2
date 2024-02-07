@extends('layout')
@section('titulo', 'Dashboard')
@section('style')
    <style>
        body {
            background-color: rgb(59, 57, 0);
        }
    </style>
@endsection
<header>@include('navbar')</header>
@section('content')
    <div class="text-center b text-white">
        <h1>Hola, usuario</h1> {{-- nombre del usuario --}}
        <h4>¿A dónde vamos?</h4>
    </div>
    <div class="card-container">
        <div class="card cl">
            <a href="{{ route('clientes.index') }}" class="card-link">
                <div class="card-title">Clientes</div>
            </a>
        </div>

        <div class="card">
            <a href="{{ route('empleados.index') }}" class="card-link">
                <div class="card-title">Operarios</div>
            </a>
        </div>
    </div>

    <div class="card-container">
        <div class="card in">
            <a href="{{route('incidencias.index')}}" class="card-link">
                <div class="card-title">Incidencias</div>
            </a>
        </div>

        <div class="card fa">
            <a href="{{route('cuotas.index')}}" class="card-link">
                <div class="card-title">Facturas/Cuotas</div>
            </a>
        </div>

    </div>
@endsection
