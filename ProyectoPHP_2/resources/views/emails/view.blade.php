<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Cuota Creada</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-md rounded-lg">
        <p class="text-lg font-semibold mb-4">Estimado/a {{ $cliente->nombre }},</p>
        <p class="mb-4">Le informamos que se ha creado una nueva cuota para su cuenta. A continuación, encontrará los detalles:</p>
        <ul class="list-disc ml-6 mb-4">
            <li><strong>CIF del Cliente:</strong> {{ $cuota->cif_cliente }}</li>
            <li><strong>Concepto:</strong> {{ $cuota->concepto }}</li>
            <li><strong>Fecha de Emisión:</strong> {{ $cuota->fecha_emision }}</li>
            <li><strong>Importe:</strong> {{ $cuota->importe }}</li>
        </ul>
        <p class="text-sm">Gracias por su atención.</p>
    </div>
</body>
</html>
