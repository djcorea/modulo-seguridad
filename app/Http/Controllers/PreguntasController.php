<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::all();
        return view('seguridad.preguntas.index')->with('preguntas',$preguntas);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seguridad.preguntas.create');
        
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
            'pregunta' => 'required|unique:preguntas|min:5|max:255'
        ]);

        $data   =   [
            'pregunta'      =>  $request->pregunta,
            'Creado_Por'    =>  Auth()->user()->id,
        ];

        Pregunta::create($data);

        return redirect()->route('preguntas.index')->with('info','Pregunta creada con éxito.');
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
        $pregunta = Pregunta::find($id);
        return view('seguridad.preguntas.edit')->with('pregunta',$pregunta);
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
            'pregunta' => "required|unique:preguntas,pregunta,{$id}|min:5|max:255"
        ]);

        $data   =   [
            'pregunta'      =>  $request->pregunta,
            'Creado_Por'    =>  Auth()->user()->id,
        ];

        $pregunta   =   Pregunta::find($id);
        $pregunta->update($data);

        return redirect()->route('preguntas.index')->with('info','Pregunta actualizada con éxito.');

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
