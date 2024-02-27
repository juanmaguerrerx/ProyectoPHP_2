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
        // dd($request);
        $request->validate([
            "cif_cliente" => "required",
            "descripcion" => "required",
            "direccion" => "required",
            "poblacion" => "required",
            "codigo_postal" => "required",
            "provincia" => "required",
            "estado" => "required",
            "fecha_creacion" => "required",
            "dni_empleado" => "required",
            "fecha_realizacion" => "nullable|date|between:" . now()->format('d-m-Y') . $request->fecha_creacion,
            "anotaciones_anteriores" => "required",
        ]);


        $incidencia = new Incidencias;
        $incidencia->cif_cliente = $request->cif_cliente;
        $incidencia->descripcion = $request->descripcion;
        $incidencia->direccion = $request->direccion;
        $incidencia->poblacion = $request->poblacion;
        $incidencia->codigo_postal = $request->codigo_postal;
        $incidencia->provincia = $request->provincia;
        $incidencia->estado = $request->estado;
        $incidencia->fecha_creacion = $request->fecha_creacion;
        $incidencia->dni_empleado = $request->dni_empleado;
        $incidencia->fecha_realizacion = $request->fecha_realizacion;
        $incidencia->anotaciones_anteriores = $request->anotaciones_anteriores;


        $incidencia->save();

        return redirect()->route('incidencias.index')->with('success', 'Incidencia creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidencias $incidencia)
    {

        $empleados = new Empleados;
        $incidencia['dni_empleado'] = $empleados->getEmpleado($incidencia['dni_empleado']);
        $provincias = new TblProvincias;
        $incidenia['provincia'] = $provincias->getProvincia($incidencia['id']);
        $clientes = new Clientes;
        $incidencia['persona_contacto'] = $clientes->getCliente($incidencia['cif_cliente'])->nombre;
        $incidencia['correo'] = $clientes->getCliente($incidencia['cif_cliente'])->correo;
        $incidencia['telefono_contacto'] = $clientes->getCliente($incidencia['cif_cliente'])->telefono;
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
            "descripcion" => "required",
            "direccion" => "required",
            "poblacion" => "required",
            "codigo_postal" => "required", //COD VALIDATION
            "provincia" => "required", //PROVINCIA VALIDATION
            "estado" => "required",
            "fecha_creacion" => 'required|date|before_or_equal:' . now()->format('d-m-Y'),
            "dni_empleado" => "required",
            "fecha_realizacion" => "nullable|date|after_or_equal:".$request->fecha_creacion,
            "anotaciones_anteriores" => "required"
        ]);


        if($request->estado == 'P'){
            $fecha = null;
        }else $fecha = $request->fecha_realizacion;

        $incidencia->cif_cliente = $request->cif_cliente;
        $incidencia->descripcion = $request->descripcion;
        $incidencia->direccion = $request->direccion;
        $incidencia->poblacion = $request->poblacion;
        $incidencia->codigo_postal = $request->codigo_postal;
        $incidencia->provincia = $request->provincia;
        $incidencia->estado = $request->estado;
        $incidencia->fecha_creacion = $request->fecha_creacion;
        $incidencia->dni_empleado = $request->dni_empleado;
        $incidencia->fecha_realizacion = $fecha;
        $incidencia->anotaciones_anteriores = $request->anotaciones_anteriores;

        $incidencia->save();

        return redirect()->route('incidencias.index')->with('success', 'Incidencia creada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidencias $incidencia)
    {
        //
    }
}
