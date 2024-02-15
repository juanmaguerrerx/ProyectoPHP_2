<?php

namespace App\Http\Controllers;

use App\Models\Cuotas;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Dompdf\Options;


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
            'cif' => 'required',
            'concepto' => 'required',
            'fecha_emision' => 'required',
            'importe' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuotas $cuota)
    {
        //
        // return view('cuotas.factura', compact('cuota'));
    }

    public function factura(Cuotas $cuota)
    {
        //Si está pagada que se descargue, sino, que vuelva a .index
        if($cuota['pagada']==1){

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
        }else return redirect('/cuotas');
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
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuotas $cuota)
    {
        //
    }
}
