<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;

    public function getEmpleado($dni)
    {
        $empleado = Empleados::where('dni', $dni)->value('nombre_empleado');
        return $empleado;
    }


    public function getEmpleadoDni($email){
        $empleado = Empleados::where('correo', $email)->value('dni');
        return $empleado;
    }
}
