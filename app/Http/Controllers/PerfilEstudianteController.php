<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //necesario para la funcion  'representado' que le va ha permitir a un acudiente ver su hijo 
use App\Models\Acudiente;
use App\Models\Estudiante;

class PerfilEstudianteController extends Controller
{
    //función para el el acudiente vea los datos de su hijo o representado
    public function PerfilEstudiante()
    {
        $acudiente = Auth::user()->acudiente; // Obtener el acudiente actual
        $estudiante = $acudiente->estudiante; // Obtener el estudiante relacionado
        
        return view('estudiantes.estudiante', compact('estudiante'));

    }
}
