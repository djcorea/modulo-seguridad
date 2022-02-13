<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{

    function __constructor(){
        $this->middleware('permission:VER_ROLES|EDITAR_ROLES',['only'=>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('seguridad.roles.index')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objetos    = Objeto::all();
        return view('seguridad.roles.create')->with('objetos',$objetos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'rol'          =>  "required|unique:roles,name|min:3|max:30",
            'permisos'   =>  "required"
        ]);
        // dd($request);


        $data=[
            'name' => $request->rol,
        ];

        $permisos = Permission::whereIn('name', $request->permisos)->pluck('id');
        $rolCreado=Role::create($data);
        $rolCreado->permissions()->sync($permisos);
        return redirect()->route('roles.index')->with('info','Rol creado con éxito');
    
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
    public function edit($id)
    {
        $rol = Role::find($id);
        $objetos    = Objeto::all();
        $permisos = DB::table('role_has_permissions')->where('role_id', $id)->pluck('permission_id');
        $nombres = Permission::whereIn('id', $permisos)->pluck('name');
        return view('seguridad.roles.edit')->with('rol',$rol)
            ->with('objetos',$objetos)->with('nombres',$nombres);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rol=Role::find($id);
        $rol->update($request->all());
        $permisos = Permission::whereIn('name', $request->permisos)->pluck('id');
        $rol->permissions()->sync($permisos);
        return redirect()->route('roles.index')->with('info','Rol editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
