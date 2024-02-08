<?php

namespace App\Http\Controllers;

use App\Models\Cuotas;
use App\Models\Clientes;
use Illuminate\Http\Request;

class CuotasCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuotas = Cuotas::all();
        return view('cuotas.index', ['cuotas'=>$cuotas]);
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuotas $cuota)
    {
        //
        return view('cuotas.edit');
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
