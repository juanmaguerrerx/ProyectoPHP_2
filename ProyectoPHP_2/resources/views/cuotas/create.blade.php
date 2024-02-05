@extends('../layout')
@section('titulo', 'Dar de Alta Cliente')
@section('style')
    <style>
        .fm {
            border-right: 1px solid rgba(255, 255, 255, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.4);
        }

        .custom-box{
            widows: 400px;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            color: white;
        }
        .custom-select{
            width: 360px;
        }
    </style>
@endsection
@include('navbar')
@section('content')
    <div class="form-container text-white fm  marginTopTabla custom-box">
        <h2 class="text-center mb-4">Datos</h2>
        <form>
            <div class="row mb-3">

                <div class="col-md-6">
                    <label for="nombre" class="form-label">Empresa:</label>
                    <select name="cif" id="cif" class="form-control custom-select" readonly>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente['cif'] }}">{{ $cliente['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Concepto:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono">
                </div>
                <div class="col-md-6">
                    <label for="correo" class="form-label">Fecha de Emisión:</label>
                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cuenta_corriente" class="form-label">Importe</label>
                    <input type="text" class="form-control" id="importe" name="importe">
                </div>
                <div class="col-md-6">
                    <label for="pais" class="form-label">Pagada: (marcar si lo está)</label>
                    <input type="checkbox" class="form-check-input" name="pagada" id="pagada">
                </div>
            </div>
            {{-- fecha pago si está pagada --}}

            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="moneda" class="form-label">Notas:</label>
                    <textarea name="notas" id="notas" cols="43" rows="10" placeholder="Notas"></textarea>
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
