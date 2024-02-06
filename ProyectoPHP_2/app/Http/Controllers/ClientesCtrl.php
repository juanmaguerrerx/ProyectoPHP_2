<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Models\Paises;

class ClientesCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Clientes::all();
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
            'cif' => 'required',
            'nombre' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'cuenta_corriente' => 'required',
            'pais' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
