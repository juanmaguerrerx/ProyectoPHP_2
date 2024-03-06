<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardCtrl extends Controller
{
    function mostrarDash()
    {
        $user = new User;
        if ($user->isIn()){
        return view('inicio');
        }else return redirect()->route('login');
    }
}
