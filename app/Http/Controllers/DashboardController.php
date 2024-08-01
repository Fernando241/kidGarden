<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('superAdmin')) {
            return view('dashboards.superAdmin');
        } elseif ($user->hasRole('Admin')) {
            return view('dashboards.admin');
        } elseif ($user->hasRole('Docente')) {
            return view('dashboards.docente');
        } elseif ($user->hasRole('Estudiante')) {
            return view('dashboards.estudiante');
        } else {
            // Redirigir a una vista por defecto o mostrar un mensaje de error
            return view('home');
        }
    }
}
