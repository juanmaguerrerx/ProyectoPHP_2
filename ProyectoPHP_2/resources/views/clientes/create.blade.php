@extends('../layout')
@section('titulo', 'Dar de Alta Cliente')
@section('style')
    <style>
        body {
            background-color: #787878;
        }

        .form-container {
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.227);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
@endsection
@include('navbar')
@section('content')
    <div class="form-container">
        <h2 class="text-center mb-4">Datos del Formulario</h2>
        <form>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cif" class="form-label">CIF:</label>
                    <input type="text" class="form-control" id="cif" name="cif">
                </div>
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono">
                </div>
                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo:</label>
                    <input type="text" class="form-control" id="correo" name="correo">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cuenta_corriente" class="form-label">Cuenta Corriente:</label>
                    <input type="text" class="form-control" id="cuenta_corriente" name="cuenta_corriente">
                </div>
                <div class="col-md-6">
                    <label for="pais" class="form-label">País:</label>
                    <select name="pais" id="pais" class="form-control">
                        <option value="" default>-Selecciona país-</option>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais['id'] }}" data-moneda="{{ $pais['iso_moneda'] }}">
                                {{ $pais['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="moneda" class="form-label">Moneda:</label>
                    <select name="moneda" class="form-control" id="moneda" disabled>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais['iso_moneda'] }}">{{ $pais['nombre_moneda'] }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pais').change(function() {
                var selectedMoneda = $(this).find(':selected').data('moneda');

                $('#moneda').prop('disabled', false);

                $('#moneda').val(selectedMoneda);
            });
        });
    </script>

@endsection
