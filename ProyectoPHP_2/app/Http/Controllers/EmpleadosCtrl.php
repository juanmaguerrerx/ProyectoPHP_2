<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use App\Rules\DNIValidation;

class EmpleadosCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleados::paginate(5);
        // dd($empleados);
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'dni' => ['required', new DNIValidation],
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|numeric|digits:9',
            'fecha_alta' => 'required|date|before_or_equal:' . now()->format('d-m-Y'),
            'direccion' => 'required',
        ]);

        // Si la validación pasa, crear un nuevo cliente
        $empleado = new Empleados();
        $empleado->dni = $request->dni;
        $empleado->nombre_empleado = $request->nombre;
        $empleado->telefono = $request->telefono;
        $empleado->correo = $request->correo;
        $empleado->direccion = $request->direccion;
        $empleado->fecha_alta = $request->fecha_alta;
        $empleado->admin = $request->rol;

        // Guardar el cliente en la base de datos
        $empleado->save();


        return redirect()->route('empleados.index')->with('success', 'Empleado añadido correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleados $empleado)
    {
        //
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleados $empleado)
    {
        //
        // dd($request);

        $request->validate([
            'dni' => ['required', new DNIValidation],
            'nombre_empleado' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|numeric|digits:9',
            'fecha_alta' => 'required|date|before_or_equal:' . now()->format('d-m-Y'),
            'direccion' => 'required',
        ]);

        // Si la validación pasa, crear un nuevo cliente    
        $empleado->dni = $request->dni;
        $empleado->nombre_empleado = $request->nombre_empleado;
        $empleado->telefono = $request->telefono;
        $empleado->correo = $request->correo;
        $empleado->direccion = $request->direccion;
        $empleado->fecha_alta = $request->fecha_alta;
        $empleado->admin = $request->rol;

        // Guardar el cliente en la base de datos
        $empleado->save();

        return redirect()->route('empleados.index')->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleados $empleados)
    {
        //
    }
}
