<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
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
        $Estudiantes=Estudiante::orderBy('id', 'desc')->paginate();
             //   dd($Estudiantes);
        return view('estudiantes.index',compact ('Estudiantes',$Estudiantes)  );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiantes.create');
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
            'nombreEs'=>'required',
            'carrera'=>'required',
            'carnet'=>'required',
            'correo'=>'required'
        ]);
        $Estudiante = new Estudiante();

        $Estudiante->nombreEs = $request->nombreEs;
        $Estudiante->carrera = $request->carrera;
        $Estudiante->carnet = $request->carnet;
        $Estudiante->correo = $request->correo;

        $Estudiante->save();
        return redirect()->route('estudiantes.index')
        ->with('mensaje', 'agregar');
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
    public function edit(Estudiante $estudiante)
    {

        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $Estudiante)
    {
        $Estudiante->nombreEs = $request->nombreEs;
        $Estudiante->carrera = $request->carrera;
        $Estudiante->carnet = $request->carnet;
        $Estudiante->correo = $request->correo;
        $Estudiante->save();


        return redirect()->route('estudiantes.index')->with('mensaje', 'actualizar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $Estudiante=Estudiante::find($id);
         $Estudiante->delete();

        return redirect()->route('estudiantes.index')->with('mensaje', 'eliminar');

    }
}
