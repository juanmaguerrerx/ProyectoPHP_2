@extends('../layout')

@section('titulo','Editar Cliente')

<header>@include('navbar')</header>

@section('content')
<div class="link_atras">
    <a href="{{ route('clientes.index') }}"> &#60; Volver</a>
</div>
@endsection

