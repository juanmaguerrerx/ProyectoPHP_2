@extends('../layout')
@section('titulo', 'Dar de Alta Cliente')
@section('style')
<style>
.fm{
    border-right: 1px solid rgba(255, 255, 255, 0.4);
    border-bottom: 1px solid rgba(255, 255, 255, 0.4);
}
.form-control{
    background-color:rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(5px); 
    color: white;
}
</style>  
@endsection
@include('navbar')
@section('content')
    <div class="form-container text-white fm marginTopTabla">
        <h2 class="text-center mb-4">Datos del Cliente</h2>
        <form>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cif" class="form-label">CIF:</label>
                    <input type="text" class="form-control blu" id="cif" name="cif">
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
