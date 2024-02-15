<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Incidencias;
use Illuminate\Http\Request;
use App\Models\TblProvincias;
use App\Models\Clientes;

class IncidenciasCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidencias = Incidencias::paginate(5);
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
        $provincias = new TblProvincias;
        $provincias = $provincias->all();
        $empleados = new Empleados;
        $empleados = $empleados->all();
        $clientes = new Clientes;
        $clientes = $clientes->all();
        return view('incidencias.create', compact('provincias', 'empleados', 'clientes'));
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
        // dd($incidencia);
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
        $clientes = new Clientes;
        $clientes = $clientes->all();
        return view('incidencias.edit', compact('incidencia', 'provincias', 'empleados', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidencias $incidencia)
    {
        //
        $request->validate([
            "cif_cliente" => "required",
            "persona_contacto" => "required",
            "telefono_contacto" => "required|numeric|digits:10",
            "descripcion" => "required",
            "correo" => "required|email",
            "direccion" => "required",
            "poblacion" => "required",
            "codigo_postal" => "required",
            "provincia" => "required",
            "estado" => "required",
            "fecha_creacion" => "required",
            "dni_empleado" => "required",
            "fecha_realizacion" => "required",
            "anotaciones_anteriores" => "required",
            "anotaciones_posteriores" => "Anotaciones posteriores 1",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidencias $incidencia)
    {
        //
    }
}
