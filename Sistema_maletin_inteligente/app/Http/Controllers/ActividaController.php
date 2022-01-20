<?php

namespace App\Http\Controllers;

use App\Models\activida;
use Illuminate\Http\Request;
use App\Models\anciano;
use App\Models\User;
use Illuminate\Support\Facades\View;
use DB;
class ActividaController extends Controller
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
        $datos['actividas']=activida::orderBy('id','DESC')->paginate(10);
        return view('actividad.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosUser['User']=User::all();
        $datosanciano['anciano']=anciano::all();
        return View::make('actividad.create' )->
        with($datosUser)->
        with($datosanciano);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'fecha'=>'required|string|max:100',
            'descripcion'=>'required',
            'id_an'=>'numeric|min:0|nullable',
            'id_us'=>'numeric|min:0|nullable',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];
        $this->validate($request, $campos, $mensaje);
        $input  = $request->all();
        //dd($input);
        try{
            DB::beginTransaction();
            $datosActividad = activida::create([
                "nombre" =>$input["nombre" ],
                "fecha" =>$input["fecha" ],
                "descripcion"=>$input["descripcion"],
                "id_an"=>$input["id_an"],
                "id_us"=>$input["id_us"],
            ]);

            DB::commit();
            return redirect("actividad")->with('status','1');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect("actividad")->with('status',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\activida  $activida
     * @return \Illuminate\Http\Response
     */
    public function show(activida $activida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\activida  $activida
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $actividad =activida::findOrFail($id);
        $anciano['anciano']=anciano::all();
        $datosUser['User']=User::all();
        return View::make('actividad.edit',compact('actividad'))->with($datosUser)->with($anciano);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\activida  $activida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Validación de datos
        $campos=[
            'nombre'=>'required|string|max:100',
            'fecha'=>'required|string|max:100',
            'descripcion'=>'required',
            'id_an'=>'numeric|min:0|nullable',
            'id_us'=>'numeric|min:0|nullable',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);

        $activida=activida::findOrFail($id);
        $input  = $request->all();
        try{
            DB::beginTransaction();
            $datos = activida::where('id','=', $activida->id)->update([
                "nombre" =>$input["nombre" ],
                "descripcion"=>$input["descripcion"],
                "fecha"=>$input["fecha"],
                "id_an"=>$input["id_an"],
                "id_us"=>$input["id_us"],
            ]);

        DB::commit();

        return redirect("actividad")->with('status','1');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect("actividad")->with('status',$e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\activida  $activida
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $activida=activida::findOrFail($id);
        activida::destroy($id);
        return redirect('actividad')->with('mensaje','Actividad eliminada');
    }
}
