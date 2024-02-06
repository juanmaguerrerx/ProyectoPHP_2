<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class Paises extends Model
{
    use HasFactory;

    public function getPaises()
    {
        $paises = Paises::orderBy('nombre')->get();
        return $paises;
    }

    public function getNombrePais($id){
        $nombre = Paises::where('id',$id)->value('nombre');
    }
}
