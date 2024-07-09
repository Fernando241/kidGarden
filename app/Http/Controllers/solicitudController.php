<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class solicitudController extends Controller
{
    public function solicitud(){
        return view('solicitud');
    }
}
