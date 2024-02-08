@extends('../layout')

@section('titulo', 'Editar Cuota')

<header>@include('navbar')</header>

@section('content')
    <div class="link_atras">
        <a href="{{ route('cuotas.index') }}"> &#60; Volver</a>
    </div>
@endsection
