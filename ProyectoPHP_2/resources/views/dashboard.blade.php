@extends('layout')
@section('titulo', 'Dashboard')
@section('style')
    <style>
        body{
            background-image: url(./images/photo-1563340012-9a46fb6a29ff.avif);
            background-size: cover;
            background-repeat: no-repeat;
            backdrop-filter: blur(6px);
        }
        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .card {
            width: 200px;
            height: 200px;
            border: 5px solid #ccc;
            background-color: rgba(28, 28, 28, 0.6);
            box-shadow: 3px 3px 6px rgba(0,0,0,0.4);
            margin: 20px;
            transition: transform 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card:hover {
            transform: scale(1.1);
        }

        .card-title {
            font-size: 20px;
            margin: 10px;
            text-align: center;
            color: white;
            letter-spacing: 3px;
        }

        .card-link {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }
        .b{
            padding-top: 5px;
            color: rgb(0, 0, 0);
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
            <a href="{{route('clientes.index')}}" class="card-link">
            <div class="card-title">Clientes</div>
            </a>
        </div>

        <div class="card">
            <a href="{{route('operarios.index')}}" class="card-link">
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
