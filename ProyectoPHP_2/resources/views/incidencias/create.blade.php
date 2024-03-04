@extends('../layout')

@section('titulo', 'Crear Incidencia')

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
    <div class="link_atras">
        <a href="{{ route('incidencias.index') }}"> &#60; Volver</a>
    </div>
    <div class="form-container fm marginTopTabla custom-box">
        <form action="{{ route('incidencias.store') }}" method="POST">
            @csrf
            <h2 class="text-center mb-4 text-white">Datos Incidencia</h2>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cif_cliente" class="form-label">CIF:</label>
                    <select name="cif_cliente" id="cif_cliente" class="form-control">
                        {{-- CIF CLIENTES --}}
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente['cif'] }}" @if ($cliente['cif'] == old('cif_cliente')) selected @endif>
                                {{ $cliente['nombre'] }}</option>
                        @endforeach
                    </select>
                    @error('cif_cliente')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12 mt-4">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea class="form-control txt" name="descripcion" id="descripcion" cols="10" rows="5">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}"
                        class="form-control">
                    @error('direccion')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="poblacion" class="form-label">Población:</label>
                    <input type="text" name="poblacion" id="poblacion" value="{{ old('poblacion') }}"
                        class="form-control">
                    @error('poblacion')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="codigo_postal" class="form-label">Código Postal:</label>
                    <input type="text" name="codigo_postal" value="{{ old('codigo_postal') }}" id="codigo_postal"
                        class="form-control">
                    @error('codigo_postal')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="provincia" class="form-label">Provincia:</label>
                    <select class="form-control" name="provincia" id="provincia">
                        @foreach ($provincias as $provincia)
                            <option value="{{ $provincia['cod'] }}" @if ($provincia['cod'] == old('provincia')) selected @endif>
                                {{ $provincia['nombre'] }}
                        @endforeach
                    </select>
                    @error('provincia')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado:</label>
                    <select class="form-control" name="estado" id="estado" onchange="toggleFechaRealizacion()">
                        <option value="" defualt>-Selecciona un estado-</option>
                        <option value="P" @if (old('estado') == 'P') selected @endif>En Proceso</option>
                        <option value="R" @if (old('estado') == 'R') selected @endif>Realizada</option>
                        <option value="E" @if (old('estado') == 'E') selected @endif>Esparando Aprobación
                        </option>
                        <option value="C" @if (old('estado') == 'C') selected @endif>Cancelada</option>
                    </select>
                    @error('estado')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fecha_creacion" class="form-label">Fecha Creación:</label>
                    <input type="date" class="form-control" name="fecha_creacion" id="fecha_creacion"
                        value="{{ old('fecha_creacion') }}">
                    @error('fecha_creacion')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-6" id="fecha_realizacion_field">
                    <label for="fecha_realizacion" class="form-label">Fecha Realización:</label>
                    <input type="date" class="form-control" name="fecha_realizacion"
                        value="{{ old('fecha_realizacion') }}">
                    @error('fecha_realizacion')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="dni_empleado" class="form-label">Empleado Encargado:</label>
                    <select class="form-control" name="dni_empleado" id="dni_empleado">
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado['dni'] }}" @if ($empleado['dni'] == old('dni_empleado')) selected @endif>
                                {{ $empleado['nombre_empleado'] }}</option>
                        @endforeach
                    </select>
                    @error('dni_empleado')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 mt-4">
                    <label for="anotaciones_anteriores" class="form-label">Anotaciones Anteriores:</label>
                    <textarea class="form-control txt" name="anotaciones_anteriores" id="anotaciones_anteriores" cols="10" rows="5">{{ old('anotaciones_anteriores') }}</textarea>
                    @error('anotaciones_anteriores')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="fichero_resumen" class="form-label">Fichero Resumen:</label>
                    <input type="file" name="fichero_resumen" id="fichero_resumen">
                    @error('fichero_resumen')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                </div>
            </div>
        </form>

        <script>
            $(document).ready(function() {
                // Función para mostrar u ocultar el campo de fecha de realización con animación
                var estadoValue = $('#estado').val();
                var fechaRealizacionField = $('#fecha_realizacion_field');
                if (estadoValue === 'P') {
                    fechaRealizacionField.slideUp();
                }
            });

            function toggleFechaRealizacion() {
                // Obtener el valor seleccionado en el campo select de "Estado"
                var estadoValue = $('#estado').val();
                // Obtener el campo de fecha de realización
                var fechaRealizacionField = $('#fecha_realizacion_field');

                // Mostrar u ocultar el campo de fecha de realización con animación
                if (estadoValue === 'R' || estadoValue === 'C' || estadoValue === 'E') {
                    fechaRealizacionField.slideDown(); // Mostrar campo de fecha de realización con animación
                } else {
                    fechaRealizacionField.slideUp(); // Ocultar campo de fecha de realización con animación
                }
            }
        </script>

    @endsection
