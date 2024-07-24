<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function pagos(){
        return view('recursosAdmin.pagos');
    }

    public function bancos(){
        return view('recursosAdmin.bancos');
    }

    public function agregarAdmin(){
        return view('recursosAdmin.agregarAdmin');
    }
}
