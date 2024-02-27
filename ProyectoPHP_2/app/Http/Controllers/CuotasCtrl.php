<?php

namespace App\Http\Controllers;

use App\Models\Cuotas;
use App\Models\Clientes;
use App\Rules\CIFValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Illuminate\Support\Carbon;
use Dompdf\Options;
use FFI\CData;

class CuotasCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuotas = Cuotas::paginate(5);
        // dd($cuotas);
        return view('cuotas.index', ['cuotas' => $cuotas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Clientes::select('cif', 'nombre')->get();
        return view('cuotas.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'concepto' => 'required',
            'fecha_emision' => 'required|date|before_or_equal:today',
            'importe' => 'required|numeric|min:0',
        ]);

        // Si la validacion es exitosa, crear cuota
        $cuota = new Cuotas;
        $cuota->cif_cliente = $request->cif;
        $cuota->concepto = $request->concepto;
        $cuota->fecha_emision = $request->fecha_emision;
        $cuota->importe = $request->importe;

        // Guardar el cliente en la bbdd
        $cuota->save();

        return redirect()->route('cuotas.index')->with('success', 'Cuota creada con éxito');
    }

    public function factura(Cuotas $cuota)
    {
        //Si está pagada que se descargue, sino, que vuelva a .index
        if ($cuota['pagada'] == 1) {

            $html = View::make('cuotas.factura', compact('cuota'))->render();

            // Crear una instancia de Dompdf con las opciones predeterminadas
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $dompdf = new Dompdf($options);

            // Cargar el HTML en Dompdf
            $dompdf->loadHtml($html);
            // Renderizar el HTML en PDF
            $dompdf->render();

            // Descargar el archivo PDF con un nombre específico
            $dompdf->stream('FacturaNSC_' . $cuota['cif_cliente'] . '_' . $cuota['fecha_pago'] . '.pdf', ['Attachment' => true]);
        } else return redirect('/cuotas');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuotas $cuota)
    {
        //
        $clientes = Clientes::select('cif', 'nombre')->get();
        return view('cuotas.edit', compact('cuota', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuotas $cuota)
    {
        //
        $request->validate([
            'concepto' => 'required',
            'fecha_emision' => 'required',
            'importe' => 'required|numeric',
            'pagada' => 'nullable',
            'fecha_pago' => 'nullable|date|after_or_equal:' . $request->fecha_emision,
        ]);
        // dd($request);

        $pagada = 0;
        $fecha = $request->fecha_pago;
        if ($request->input('pagada') == 'on') {
            $pagada = 1;
            if($fecha = null || $fecha == '0000-00-00'|| $fecha==0 || $fecha = false){
            $fecha = date('Y-m-d');
            }else $fecha = $request->fecha_pago;
        }

        

        // Si la validación pasa, actualizar cliente
        $cuota->cif_cliente = $request->cif_cliente;
        $cuota->concepto = $request->concepto;
        $cuota->fecha_emision = $request->fecha_emision;
        $cuota->importe = $request->importe;
        $cuota->pagada = $pagada;
        $cuota->fecha_pago = $fecha;
        $cuota->notas = $request->notas;

        // Actualizar el cliente en la base de datos
        $cuota->save();
        return redirect()->route('cuotas.index')->with('success', 'Cuota actualizada correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuotas $cuota)
    {
        //
    }
}
