<?php

namespace App\Http\Controllers;

use App\Models\anciano;
use Illuminate\Http\Request;

class AncianoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ancianos=anciano::orderBy('id','DESC')->paginate(10);
        return view('anciano.index',compact('ancianos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('anciano.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'nombre'=>'required|string|max:100',
            'cedula'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'contacto'=>'required|string|max:100',
            'num_secuencia'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        $anciano = request()->except('_token');
        anciano::insert($anciano);
        return redirect('anciano')->with('mensaje','Guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\anciano  $anciano
     * @return \Illuminate\Http\Response
     */
    public function show(anciano $anciano)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\anciano  $anciano
     * @return \Illuminate\Http\Response
     */
    public function edit(anciano $anciano)
    {
        //
        return view('anciano.edit',compact('anciano'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\anciano  $anciano
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anciano $anciano)
    {
        //
        $campos=[
            'nombre'=>'required|string|max:100',
            'cedula'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'contacto'=>'required|string|max:100',
            'num_secuencia'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        $ancianoDatos = request()->except(['_token','_method']);
        $anciano->update($ancianoDatos);
        return redirect('anciano')->with('mensaje','Modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\anciano  $anciano
     * @return \Illuminate\Http\Response
     */
    public function destroy(anciano $anciano)
    {
        //
        $anciano->delete();
        return back();
    }
}
