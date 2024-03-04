<?php

namespace App\Http\Controllers;

use App\Models\Cuotas;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailableClass;
use App\Models\Clientes;
use App\Models\Paises;
use App\Rules\CIFValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Illuminate\Support\Carbon;
use Dompdf\Options;
use FFI\CData;
use Illuminate\Support\Facades\Http;


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

        $this->sendCuotaCreatedEmail($cuota);


        return redirect()->route('cuotas.index')->with('success', 'Cuota creada con éxito');
    }
    /**
     * Envía un correo electrónico al cliente correspondiente cuando se crea una nueva cuota.
     *
     * @param Cuotas $cuota
     * @return void
     */
    private function sendCuotaCreatedEmail(Cuotas $cuota)
    {
        $cliente = Clientes::where('cif', $cuota->cif_cliente)->first();

        // dd($cliente->correo);

        // Verifica si el cliente tiene una dirección de correo electrónico
        if ($cliente->correo) {
            // Construye el asunto del correo electrónico
            $subject = 'Nueva cuota creada';
        
            // Envía el correo electrónico utilizando la clase MailableClass
            Mail::to($cliente->correo)->send(new MailableClass($subject, $cuota, $cliente));
        }
    }

    /**
     * Envía un correo electrónico al cliente correspondiente con una factura cuando se paga una cuota.
     *
     * @param Cuotas $cuota
     * @return void
     */
    private function sendCuotaPagadaEmail(Cuotas $cuota)
    {
        $cliente = Clientes::where('cif', $cuota->cif_cliente)->first();

        // dd($cliente->correo);

        // Verifica si el cliente tiene una dirección de correo electrónico
        if ($cliente->correo) {
            // Construye el asunto del correo electrónico
            $subject = 'Nueva factura';
        
            // Envía el correo electrónico utilizando la clase MailableClass
            Mail::to($cliente->correo)->send(new MailableClass($subject, $cuota, $cliente, true));
        }
    }

    /**
     * Mostrar cuota (descargar pdf y enviar correo al cliente)
     *
     * @param Cuotas $cuota
     * @return void
     */
    public function show(Cuotas $cuota)
    {
        $cliente = new Clientes();
        $cliente = $cliente->getCliente($cuota['cif_cliente']);
        // $pais = new Paises();
        // $pais = $pais->getPais($cliente['pais_id']);
        // if ($pais['iso_moneda'] != 'EUR') {
        //     $response = Http::get('https://www.freeforexapi.com/api/live?pairs=EUR' . $pais['iso_moneda']);

        //     if ($response->successful()) {
        //         $data = $response->json();
        //         if ($data['rates'] != null) {
        //             $cuota['importe'] = $cuota['importe'] * $data['rates'];
        //         } else $cuota['importe'] = $cuota['importe'];
        //     }
        // }


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

            $this->sendCuotaPagadaEmail($cuota);

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
            if ($fecha = null || $fecha == '0000-00-00' || $fecha == 0 || $fecha = false) {
                $fecha = date('Y-m-d');
            } else $fecha = $request->fecha_pago;
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
