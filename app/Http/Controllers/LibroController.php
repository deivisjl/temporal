<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Input;

class LibroController extends Controller
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
        $libros=Libro::orderBy('id', 'desc')->paginate();
             //   dd($libros);
        return view('libros.index',compact ('libros',$libros)  );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
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
            'titulo'=>'required',
            'editorial'=>'required',
            'autor'=>'required',
            'stock'=>'required'
        ]);
        $libro = new Libro();

        $libro->titulo = $request->titulo;
        $libro->editorial = $request->editorial;
        $libro->autor = $request->autor;
        $libro->stock = $request->stock;
        if ($request->hasFile('imagen')){
            $file= $request->file("imagen");
           // dd($file);
            //$nombrearchivo  = str_slug($request->slug).".".$file->getClientOriginalExtension();
            $nombrearchivo  = time().$file->getClientOriginalName();
            //dd($nombrearchivo);
            $file->move(public_path("img/libros/"),$nombrearchivo);
            $libro->imagenLibro = $nombrearchivo;
        }
       //$user->save();
       $libro->estado='disponible';
       $libro->save();
        return redirect()->route('libros.index')
        ->with('mensaje', 'agregar');
       // $libro->imagenLibro = "prueba 3";
       // $libro->save();

      //  return redirect()->route('libros.index');



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
    public function edit(Libro $libro)
    {

        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $libro->titulo=$request->titulo;
        $libro->editorial=$request->editorial;
        $libro->autor=$request->autor;
        $libro->stock=$request->stock;
        if ($request->hasFile('imagen')){
            $file= $request->file("imagen");
            $nombrearchivo  = time().$file->getClientOriginalName();
            $file->move(public_path("img/libros/"),$nombrearchivo);
            $libro->imagenLibro = $nombrearchivo;
        }
        $libro->save();


        return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $libro=Libro::find($id);
         $libro->delete();

        return redirect()->route('libros.index')->with('mensaje', 'eliminar');

    }
}
