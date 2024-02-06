@extends('../layout')
@section('titulo', 'Dar de Alta Cliente')
@section('style')
    <style>
        .custom-select {
            width: 360px;
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
    <div class="form-container fm marginTopTabla custom-box">
        <h2 class="text-center mb-4">Datos Cuota</h2>
        <form>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Empresa:</label>
                    <select name="cif" id="cif" class="form-select custom-select text-center" readonly>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente['cif'] }}">{{ $cliente['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="telefono" class="form-label">Concepto:</label>
                    <input type="text" class="form-control large-input" id="telefono" name="telefono">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="correo" class="form-label">Fecha de Emisión:</label>
                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision">
                </div>
                <div class="col-md-6">
                    <label for="cuenta_corriente" class="form-label">Importe</label>
                    <input type="text" class="form-control" id="importe" name="importe">
                </div>
                <div class="col-md-12 mt-4 text-center">
                    <label for="pais" class="form-label text-pagada">Pagada: (marcar si lo está)</label>
                    <input type="checkbox" class="form-check-input check-lg" name="pagada" id="pagada">
                </div>
            </div>
            {{-- fecha pago si está pagada --}}

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="moneda" class="form-label">Notas:</label>
                    <textarea name="notas" class="form-control" id="notas" cols="43" rows="10" placeholder="Notas"></textarea>
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
            $('#').change(function() {
                var selectedMoneda = $(this).find(':selected').data('moneda');

                $('#').prop('disabled', false);

                $('#').val(selectedMoneda);
            });
        });
    </script>

@endsection
