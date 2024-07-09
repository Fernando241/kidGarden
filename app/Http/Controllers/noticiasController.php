<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class noticiasController extends Controller
{
    public function noticias(){
        return view('noticias');
    }
}
