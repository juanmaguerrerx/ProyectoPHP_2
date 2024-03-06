<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    public function getCliente($cif)
    {

        $cliente = Clientes::where('cif', $cif)->first();
        
        return $cliente;
    }
}
