<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
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
        $empleados = new Empleados;
        foreach ($incidencias as $incidencia) {
            $incidencia['dni_empleado'] = $empleados->getEmpleado($incidencia['dni_empleado']);
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
        $empleados = new Empleados;
        $incidencia['dni_empleado'] = $empleados->getEmpleado($incidencia['dni_empleado']);
        $provincias = new TblProvincias;
        $incidenia['provincia'] = $provincias->getProvincia($incidencia['id']);
        return view('incidencias.show', compact('incidencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidencias $incidencia)
    {
        //
        $provincias = new TblProvincias;
        $provincias = $provincias->all();
        $empleados = new Empleados;
        $empleados = $empleados->all();
        return view('incidencias.edit',compact('incidencia','provincias','empleados'));
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
