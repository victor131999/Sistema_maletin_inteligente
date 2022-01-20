<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $NumUsuarios = DB::table('Users')->count();
        $NumAncianos = DB::table('ancianos')->count();
        $NumActividades = DB::table('actividas')->count();
        return View::make('inicio.index',compact("NumAncianos","NumActividades","NumUsuarios") );
    }
}
