@extends('layout')
@section('titulo', 'Dashboard')
@section('style')
    <style>
        body {
            background-color: rgb(16, 16, 16);
        }
    </style>
@endsection
<header>@include('navbar')</header>
@section('content')
    <div class="text-center b text-white">
        <h1>Hola, {{ auth()->user()->name }}</h1> {{-- nombre del usuario --}}
        <h4>¿A dónde vamos?</h4>
    </div>
    @if (auth()->check() && auth()->user()->isAdmin())
        <div class="card-container">
            <div class="card cl">
                <a href="{{ route('clientes.index') }}" class="card-link">
                    <div class="card-title">Clientes</div>
                </a>
            </div>

            <div class="card">
                <a href="{{ route('empleados.index') }}" class="card-link">
                    <div class="card-title">Empleados</div>
                </a>
            </div>
            <div class="card-container">
                <div class="card fa">
                    <a href="{{ route('cuotas.index') }}" class="card-link">
                        <div class="card-title">Facturas/Cuotas</div>
                    </a>
                </div>
            </div>
        </div>
    @endif


    <div class="card-container">
        <div class="card in">
            <a href="{{ route('incidencias.index') }}" class="card-link">
                <div class="card-title">Incidencias</div>
            </a>
        </div>



    </div>
@endsection
