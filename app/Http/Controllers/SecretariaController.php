<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secretaria;

class SecretariaController extends Controller
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
        $secretarias=Secretaria::orderBy('id', 'desc')->paginate();
             //   dd($Secretarias);
        return view('secretarias.index',compact ('secretarias',$secretarias)  );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretarias.create');
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
            'nombreSe'=>'required',
            'correo'=>'required',
            'telefono'=>'required',
            'fechaNac'=>'required'
        ]);
        $Secretaria = new Secretaria();

        $Secretaria->nombreSe = $request->nombreSe;
        $Secretaria->correo = $request->correo;
        $Secretaria->telefono = $request->telefono;
        $Secretaria->fechaNac = $request->fechaNac;

        $Secretaria->save();
        return redirect()->route('secretarias.index')
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
    public function edit(Secretaria $secretaria)
    {

        return view('secretarias.edit', compact('secretaria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Secretaria $Secretaria)
    {
        $Secretaria->nombreSe = $request->nombreSe;
        $Secretaria->correo = $request->correo;
        $Secretaria->telefono = $request->telefono;
        $Secretaria->fechaNac = $request->fechaNac;
        $Secretaria->save();


        return redirect()->route('secretarias.index')->with('mensaje', 'actualizar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $Secretaria=Secretaria::find($id);
         $Secretaria->delete();

        return redirect()->route('secretarias.index')->with('mensaje', 'eliminar');

    }
}
