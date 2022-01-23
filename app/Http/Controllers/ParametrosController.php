<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use Illuminate\Http\Request;

class ParametrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametros = Parametro::all();
        return view('seguridad.parametros.index')->with('parametros',$parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seguridad.parametros.create');
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
            'parametro' => 'required|unique:parametros',
            'valor' => 'required',
        ]);
        
        $data = [
            'parametro' => $request->parametro,
            'valor' => $request->valor,
            'Creado_Por' => Auth()->user()->id,
        ];
        Parametro::create($data);

        return redirect()->route('parametros.index')->with('info', 'Parametro creado.');
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
        $parametro  =   Parametro::find($id);
        return view('seguridad.parametros.edit')->with('parametro',$parametro);
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

            'parametro' => "required|unique:parametros,parametro,{$id}",
            'valor'     => "required",
        ]);

        $parametro  = Parametro::find($id);

        $parametro->update($request->all());

        return redirect()->route('parametros.index')->with('info', 'Parametro actualizado.');
       
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
