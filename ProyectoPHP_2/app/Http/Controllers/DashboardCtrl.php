<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardCtrl extends Controller
{
    function mostrarDash()
    {
        return view('inicio');
    }
}
