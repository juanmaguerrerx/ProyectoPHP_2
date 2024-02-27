@extends('../layout')
@section('titulo', 'Crear Cuota')
@section('style')
    <style>
        .custom-select {
            width: 375px;
            margin: 0px auto;
        }

        .large-input {
            widows: 350px;
        }

        .check-lg {
            margin-left: 2.5px;
            height: 19px;
            width: 19px;
            background-color: rgba(233, 232, 232, 0.381);
            backdrop-filter: blur(5px);
        }

        .text-pagada {
            font-size: 19px;
        }

        .custom-btn {
            width: 200px;
            height: 45px;
        }
    </style>
@endsection
@include('navbar')
@section('content')
    <div class="link_atras">
        <a href="{{ route('cuotas.index') }}"> &#60; Volver</a>
    </div>
    <div class="form-container fm marginTopTabla custom-box">
        <h2 class="text-center mb-4 text-white">Datos Cuota</h2>
        <form class="form-floating" method="POST" action="{{ route('cuotas.store') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cif" class="form-label">Empresa:</label>
                    <select name="cif" id="cif" class="form-select custom-select text-center" readonly>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente['cif'] }}" @if ($cliente['cif'] == old('cif')) selected @endif>
                                {{ $cliente['nombre'] }}</option>
                        @endforeach
                    </select>
                    @error('cif')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="concepto" class="form-label">Concepto:</label>
                    <input type="text" class="form-control large-input" id="concepto" name="concepto"
                        value="{{ old('concepto') }}">
                    @error('concepto')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fecha_emision" class="form-label">Fecha de Emisión:</label>
                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision"
                        value="{{ old('fecha_emision') }}">
                    @error('fecha_emision')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="importe" class="form-label">Importe</label>
                    <input type="text" class="form-control" id="importe" name="importe" value="{{ old('importe') }}">
                    @error('importe')
                        <p class="message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-12 mt-4 text-center">
                    <label for="pagada" class="form-label text-pagada">Pagada: (marcar si lo está):</label> &nbsp;&nbsp;
                    <input type="checkbox" class="form-check-input check-lg" name="pagada" id="pagada"
                        value="{{ old('pagada') }}">
                </div>
            </div>

            <div class="row mb-3" id="fecha_pago_field">
                <div class="col-md-6">
                    <label for="fecha_pago" class="form-label">Fecha de Pago:</label>
                    <input type="date" class="form-control" id="fecha_pago" name="fecha_pago"
                        value="{{ old('fecha_pago') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="notas" class="form-label">Notas:</label>
                    <textarea name="notas" class="form-control" id="notas" cols="43" rows="10">{{ old('notas') }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary custom-btn">Enviar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Función para mostrar u ocultar el campo de fecha de pago con animación
            function toggleFechaPago() {
                // Obtener el estado del checkbox de "Pagada"
                var pagadaChecked = $('#pagada').prop('checked');
                // Obtener el campo de fecha de pago
                var fechaPagoField = $('#fecha_pago_field');

                // Mostrar u ocultar el campo de fecha de pago con animación
                if (pagadaChecked) {
                    fechaPagoField.slideDown(); // Mostrar campo de fecha de pago con animación
                } else {
                    fechaPagoField.slideUp(); // Ocultar campo de fecha de pago con animación
                }
            }

            // Llamar a la función al cargar la página
            toggleFechaPago();

            // Llamar a la función cuando el estado del checkbox cambie
            $('#pagada').change(function() {
                toggleFechaPago();
            });
        });
    </script>

@endsection
