<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Estudiante;
use App\Models\Reservacion;
use App\Models\Autorizacion;
use DB;

class ReservacionController extends Controller
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
        return view('reservaciones.index',compact ('libros',$libros)  );
    }

    public function pendientes()
    {
        $pendientes=Reservacion::orderBy('id', 'desc')->where('proceso', 'SOLICITUD')->orWhere('proceso', 'APROBADO')-> paginate();
             //   dd($libros);
        return view('reservaciones.pendientes',compact('pendientes',$pendientes));
    }


    public function autorizacion(Request $request)
    {
        $accion=$request->accion;
        $idpendiente=$request->idpendiente;

        if($accion==''){

            $autorizar = new Autorizacion();
            $autorizar->estado = 'AUTORIZADO';
            $autorizar->secretaria_id=auth()->id();
            $autorizar->reservacion_id = $idpendiente;


            $libro=Reservacion::find($idpendiente);
            $libro->proceso="APROBADO";
            $autorizar->save();
            $libro->save();
            return redirect()->route('reservaciones.pendientes')->with('mensaje', 'autorizado');

        }
        elseif($accion=='devolver'){
            $libro=Reservacion::find($idpendiente);
            $idlibro=$libro->libro_id;
            $libro->proceso="DEVUELTO";
            $libro->save();

            $libro=Libro::find($idlibro);
            $cantidad = $libro->stock;
            $newCantidad = $cantidad+1;
            if($newCantidad>0){
                $libro->estado='disponible';
            }
            $libro->stock=$newCantidad;
            $libro->save();

            return redirect()->route('reservaciones.pendientes')->with('mensaje', 'devuelto');
        }







    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $idlibro=$request->idlibro;
        $reservacion = new Reservacion();
        $reservacion->proceso = 'SOLICITUD';
        $reservacion->libro_id = $idlibro;
        $reservacion->estudiante_id=auth()->id();
        $reservacion->save();

        $libro=Libro::find($idlibro);
        $cantidad = $libro->stock;
        $newCantidad = $cantidad-1;
        if($newCantidad<=0){
            $libro->estado='reservado';
        }
        $libro->stock=$newCantidad;
        $libro->save();



        return redirect()->route('reservaciones.index')->with('mensaje', 'agregado');


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
