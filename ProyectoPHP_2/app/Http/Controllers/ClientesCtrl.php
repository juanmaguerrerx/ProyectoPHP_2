<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Models\Paises;
use App\Rules\CIFValidation;

class ClientesCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Clientes::paginate(5);
        foreach ($clientes as $cliente) {
            $paisesMod = new Paises;
            $cliente['pais_id'] = $paisesMod->getNombrePais($cliente['pais_id']);
            $cliente['pais_iso2'] = $paisesMod->where('nombre', $cliente['pais_id'])->value('iso2');
        }
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paisesMod = new Paises;
        $paises = $paisesMod->getPaises();

        return view('clientes.create', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cif' => ['required', new CIFValidation],
            'nombre' => 'required',
            'telefono' => 'required|numeric|digits:9',
            'correo' => 'required|email',
            'cuenta_corriente' => 'required',
            'importe_mensual' => 'nullable|numeric',
            'pais' => 'required',
        ]);

        // Si la validación pasa, crear un nuevo cliente
        $cliente = new Clientes;
        $cliente->cif = $request->cif;
        $cliente->nombre = $request->nombre;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->cuenta_corriente = $request->cuenta_corriente;
        $cliente->importe_mensual = $request->importe_mensual;
        $cliente->pais_id = $request->pais;

        // Guardar el cliente en la base de datos
        $cliente->save();

        
        return redirect()->route('clientes.index')->with('success', 'Cliente añadido correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $cliente)
    {
        //
        $paisesMod = new Paises;
        $paises = $paisesMod->getPaises();
        // dd($cliente);
        return view('clientes.edit', compact('cliente', 'paises'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $clientes)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clientes $cliente)
    {
        $request->validate([
            'cif' => ['required', new CIFValidation],
            'nombre' => 'required',
            'telefono' => 'required|numeric|digits:9',
            'correo' => 'required|email',
            'cuenta_corriente' => 'required',
            'importe_mensual' => 'nullable|numeric',
            'pais' => 'required',
        ]);

        // Si la validación pasa, actualizar cliente
        $cliente-> cif = $request->input('cif');
        $cliente-> nombre = $request->input('nombre');
        $cliente-> telefono = $request->input('telefono');
        $cliente-> correo = $request->input('correo');
        $cliente-> cuenta_corriente = $request->input('cuenta_corriente');
        $cliente-> importe_mensual = $request->input('importe_mensual');
        $cliente-> pais_id = $request->input('pais');


        // Actualizar el cliente en la base de datos
        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
