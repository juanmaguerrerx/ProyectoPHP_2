@extends('../layout')

@section('titulo', 'Editar Empleado')

<header>@include('navbar')</header>

@section('content')
    <div class="link_atras">
        <a href="{{ route('empleados.index') }}"> &#60; Volver</a>
    </div>
@endsection
