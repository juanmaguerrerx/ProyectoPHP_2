@extends('../layout')
@section('titulo', 'Editar Cliente')
@section('style')
    <style>

    </style>
@endsection
@include('navbar')
@section('content')
    <div class="link_atras">
        <a href="{{ route('clientes.index') }}"> &#60; Volver</a>
    </div>
    <div class="form-container fm marginTopTabla">
        <h2 class="text-center mb-4 text-white">Datos del Cliente</h2>
        <form action="{{ route('clientes.update', [$cliente->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cif" class="form-label">CIF:</label>
                    <input type="text" class="form-control blu" id="cif" name="cif"
                        value="{{ $cliente['cif'] }}">
                    @error('cif')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        value="{{ $cliente['nombre'] }}">
                    @error('nombre')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                        value="{{ $cliente['telefono'] }}">
                    @error('telefono')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo:</label>
                    <input type="text" class="form-control" id="correo" name="correo"
                        value="{{ $cliente['correo'] }}">
                    @error('correo')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cuenta_corriente" class="form-label">Cuenta Corriente:</label>
                    <input type="text" class="form-control" id="cuenta_corriente" name="cuenta_corriente"
                        value="{{ $cliente['cuenta_corriente'] }}">
                    @error('cuenta_corriente')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pais" class="form-label">País:</label>
                    <select name="pais" id="pais" class="form-control">
                        <option value="" default>-Selecciona país-</option>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais['id'] }}"@if ($cliente['pais_id'] == $pais['id']) selected @endif
                                data-moneda="{{ $pais['iso_moneda'] }}">
                                {{ $pais['nombre'] }}</option>
                        @endforeach
                    </select>
                    @error('pais')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="moneda" class="form-label">Moneda:</label>
                    <select name="moneda" disabled class="form-control sel" id="moneda">
                        <option value="">-Moneda-</option>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais['iso_moneda'] }}">
                                {{ $pais['nombre_moneda'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="importe_mensual" class="form-label">Importe mensual:</label>
                    <input type="text" class="form-control" name="importe_mensual" id="importe_mensual"
                        value="{{ $cliente['importe_mensual'] ? $cliente['importe_mensual'] : '' }}">
                    @error('importe_mensual')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            var selectedMoneda = $(this).find(':selected').data('moneda');
                $('#moneda').val(selectedMoneda);
            $('#pais').change(function() {
                var selectedMoneda = $(this).find(':selected').data('moneda');
                $('#moneda').val(selectedMoneda);
            });
        });
    </script>

@endsection
