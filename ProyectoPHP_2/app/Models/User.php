<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;

class User extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function isAdmin()
    {

        $empleados = new Empleados();
        $empleados = $empleados::where('correo', $this->email)->value('admin');
        $this->is_admin = $empleados;
        return $this->is_admin;
    }

    public function isIn()
    {
        $empleados = new Empleados;
        $empleado = $empleados::where('correo', $this->email)->get();
        if($empleado){
            return true;
        }else return false;
    }
}
