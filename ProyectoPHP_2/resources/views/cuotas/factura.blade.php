<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }

        .btn {
            text-align: center;
            margin-top: 50px;
        }

        .button-download {
            text-align: center;
            margin: 0px auto;
            width: 100px;
            height: 35px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Factura | No Se Caen S.L</h1>
        <table>
            <tr>
                <th>CIF</th>
                <td id="cif">{{ $cuota['cif_cliente'] }}</td>
            </tr>
            <tr>
                <th>Concepto</th>
                <td id="concepto">{{ $cuota['concepto'] }}</td>
            </tr>
            <tr>
                <th>Fecha de Emisión</th>
                <td id="fecha_emision">{{ $cuota['fecha_emision'] }}</td>
            </tr>
            <tr>
                <th>Importe</th>
                <td id="importe">{{ $cuota['importe'] }}€</td>
            </tr>
            <tr>
                <th>Fecha de Pago</th>
                <td id="fecha_pago">{{ $cuota['fecha_pago'] }}</td>
            </tr>
            <tr>
                <th>Notas</th>
                <td id="notas">{{ $cuota['notas'] }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
