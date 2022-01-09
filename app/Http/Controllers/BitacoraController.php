<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function index(){
        // return "Bitacora Index";
        return view('seguridad.bitacora.index');
    }
}
