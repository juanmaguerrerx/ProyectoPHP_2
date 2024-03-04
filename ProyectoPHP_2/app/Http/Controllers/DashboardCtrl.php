<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCtrl extends Controller
{
    function mostrarDash()
    {
        $this->middleware('auth');
        return view('inicio');
    }
}
