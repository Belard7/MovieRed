<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class BienvenidaController extends Controller
{
    public function mostrar()
{
    return view('bienvenida');
    
}

}
