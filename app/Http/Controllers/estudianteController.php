<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class estudianteController extends Controller
{
    // funcion estatica para llamar a la vista
    public function index(){
        $estudiantes = Estudiante::all();
        return $estudiantes;
    }
}
