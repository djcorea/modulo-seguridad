<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class ObjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objetos=Objeto::all();
        // dd($objetos);
        return view('seguridad.objetos.index',compact('objetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seguridad.objetos.create');
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

            'objeto'        =>  "required|unique:objetos|min:1|max:255",
            'descripcion'   =>  "required|max:255"
        ]);
        
        $data=[
            'objeto'        =>  $request->objeto,
            'descripcion'   =>  $request->descripcion,
            'Creado_Por' => Auth()->user()->id,
        ];

        Objeto::create($data);

        $permisos=[
            'VER_'.$request->objeto,
            'INSERTAR_'.$request->objeto,
            'EDITAR_'.$request->objeto,
            'ELIMINAR_'.$request->objeto,
        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name'=>$permiso,'guard_name'=>'web']);
        }

        return redirect()->route('objetos.index')->with('info', 'Objeto creado.');
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
        $objeto=Objeto::find($id);
        return view('seguridad.objetos.edit')->with('objeto',$objeto);
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
        $request->validate([
            
            'objeto'        => "required|unique:objetos,objeto,{$id}",
            'descripcion'   => "required",
        ]);
        

        $objeto  = Objeto::find($id);

        $objeto->update($request->all());
        return redirect()->route('objetos.index')->with('info', 'Objeto actualizado.');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objeto = Objeto::find($id);

        $objeto->delete();

        return redirect()->route('objetos.index')->with('info', 'Objeto Eliminado.');
       
    }
}
