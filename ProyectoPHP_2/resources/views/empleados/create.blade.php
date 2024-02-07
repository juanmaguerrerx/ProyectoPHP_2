@extends('../layout')

@section('titulo', 'Crear Empleado')

<header>@include('navbar')</header>

@section('content')
    <div class="form-container fm marginTopTabla custom-box">
        <h2 class="text-center mb-4 text-white">Datos Empleado</h2>
        <form class="form-floating" method="POST" action="{{ route('empleados.store') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="dni" class="form-label">DNI:</label>
                    <input type="text" class="form-control" id="dni" name="dni">
                    @error('dni')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="nombre" class="form-label">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                    @error('nombre')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo:</label>
                    <input type="text" class="form-control" id="correo" name="correo">
                    @error('correo')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono">
                    @error('telefono')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-12 mt-4">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion">
                    @error('direccion')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fecha_alta" class="form-label">Fecha de Alta: (vacío para fecha actual)</label>
                    <input type="date" class="form-control" id="fecha_alta" name="fecha_alta">
                    @error('fecha_alta')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="rol" class="form-label">Rol:</label>
                    <select class="form-control" name="rol" id="rol">
                        <option value="0">Operario</option>
                        <option value="1">Administrador</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary custom-btn">Enviar</button>
                </div>
            </div>
        </form>
    </div>

@endsection
