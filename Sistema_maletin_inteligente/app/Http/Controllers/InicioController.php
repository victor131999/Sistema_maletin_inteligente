<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class InicioController extends Controller
{
    //
        //Colocamos el middleware
        public function __construct()
        {
            $this->middleware('auth');
        }
    public function index()
    {
        $detalles="hola";
        return View::make('inicio.index',compact("detalles") );
    }
}
