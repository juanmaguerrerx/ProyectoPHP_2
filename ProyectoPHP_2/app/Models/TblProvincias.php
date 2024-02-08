<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblProvincias extends Model
{
    use HasFactory;

    public function getProvincia($cod)
    {
        $provincia = TblProvincias::where('cod', $cod)->value('nombre');
        return $provincia;
    }
}
