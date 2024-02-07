<?php

namespace App\Http\Controllers;

use App\Models\Incidencias;
use Illuminate\Http\Request;
use App\Models\TblProvincias;

class IncidenciasCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidencias = Incidencias::all();
        $provincias = new TblProvincias;
        foreach ($incidencias as $incidencia) {
            $incidencia['provincia'] = $provincias->getProvincia($incidencia['provincia']);
        }
        return view('incidencias.index', compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('incidencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidencias $incidencia)
    {
        //
        return view('incidencias.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidencias $incidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidencias $incidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidencias $incidencia)
    {
        //
    }
}
