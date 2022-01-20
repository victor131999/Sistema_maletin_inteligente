<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function __construct(){
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create');
        $this->middleware('can:users.edit')->only('edit');
        $this->middleware('can:users.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles= Role::all();
        return view('users.create',compact('roles'));
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
        $request ->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required',

        ]);
        $request->request->add([
            'password' => Hash::make($request->input('password'))
        ]);
        $user=User::create($request->all());
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index',$user)->with('info','El usuario se creo con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles= Role::all();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index',$user)->with('info','Se asignó los roles correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user-> delete();
        return redirect()->route('users.index')->with('info','El usuario se eliminó con éxito');
    }
}
