@extends('../layout')

@section('titulo', 'Editar Incidencia')

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
        <form action="{{ route('incidencias.update', [$incidencia->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            <h2 class="text-center mb-4 text-white">Datos Incidencia</h2>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cif" class="form-label">CIF:</label>
                    <select class="form-control" name="cif" id="cif">
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente['cif'] }}">{{ $cliente['nombre'] }}</option>
                        @endforeach
                    </select>
                    @error('cif')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 mt-4">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea class="form-control txt" cols="10" rows="5" name="descripcion" id="descripcion">{{ $incidencia['descripcion'] ? $incidencia['descripcion'] : '' }}</textarea>
                    @error('descripcion')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <input type="text" class="form-control" name="direccion" id="direccion"
                        value="{{ $incidencia['direccion'] ? $incidencia['direccion'] : '' }}">
                    @error('direccion')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="direccion" class="form-label">Población:</label>
                    <input type="text" class="form-control" name="direccion" id="direccion"
                        value="{{ $incidencia['direccion'] ? $incidencia['direccion'] : '' }}">
                    @error('direccion')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="codigo_postal" class="form-label">Código Postal:</label>
                    <input type="text" class="form-control" name="codigo_postal" id="codigo_postal"
                        value="{{ $incidencia['codigo_postal'] ? $incidencia['codigo_postal'] : '' }}">
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
                            <option value="{{ $provincia['cod'] }}" @if ($provincia['cod'] == $incidencia['provincia']) selected @endif>
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
                        <option value="" default>-Selecciona un estado-</option>
                        <option value="P" @if ($incidencia['estado'] == 'P') selected @endif>En Proceso</option>
                        <option value="R" @if ($incidencia['estado'] == 'R') selected @endif>Realizada</option>
                        <option value="E" @if ($incidencia['estado'] == 'E') selected @endif>Esparando Aprobación
                        </option>
                        <option value="C" @if ($incidencia['estado'] == 'C') selected @endif>Cancelada</option>
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
                        value="{{ $incidencia['fecha_creacion'] ? $incidencia['fecha_creacion'] : '' }}">
                    @error('fecha_creacion')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-6" id="fecha_realizacion_field">
                    <label for="fecha_realizacion" class="form-label">Fecha Realización:</label>
                    <input type="date" class="form-control" name="fecha_realizacion" id="fecha_realizacion"
                        value="{{ $incidencia['fecha_realizacion'] ? $incidencia['fecha_realizacion'] : '' }}">
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
                            <option value="{{ $empleado['dni_empleado'] }}">{{ $empleado['nombre_empleado'] }}</option>
                        @endforeach
                    </select>
                    @error('nombre_empleado')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- FALTA FICHERO RESUMEN --}}
            </div>
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                </div>
            </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
