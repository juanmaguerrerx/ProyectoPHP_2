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
        <form action="{{ route('incidencias.update', [$incidencia->id]) }}" method="PUT">
            @csrf
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
                <div class="col-md-12">
                    <label for="persona_contacto" class="form-label">Nombre Cliente:</label>
                    <input type="text" class="form-control" name="persona_contacto" id="persona_contacto"
                        value="{{ $incidencia['persona_contacto'] ? $incidencia['persona_contacto'] : '' }}">
                    @error('persona_contacto')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telefono_contacto" class="form-label">Telefono Cliente:</label>
                    <input type="text" class="form-control" name="telefono_contacto" id="telefono_contacto"
                        value="{{ $incidencia['telefono_contacto'] ? $incidencia['telefono_contacto'] : '' }}">
                    @error('telefono_contacto')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo Cliente:</label>
                    <input type="text" class="form-control" name="correo" id="correo"
                        value="{{ $incidencia['correo'] ? $incidencia['correo'] : '' }}">
                    @error('correo')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
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
                    <select class="form-control" name="estado" id="estado">
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
                <div class="col-md-6">
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

    @endsection
