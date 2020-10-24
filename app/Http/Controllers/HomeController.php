<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservacion;

use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

            return view('welcome');

    }

    public function reporte()
    {
        $cantidad= DB::table('reservaciones')
        ->join('libros', 'reservaciones.libro_id', '=', 'libros.id')
        ->select('reservaciones.libro_id as y', 'libros.titulo as name', 'reservaciones.created_at as date')
        ->where('reservaciones.proceso', 'SOLICITUD')
        ->get();
        //$cantidad=Reservacion::select('proceso as name', 'libro_id as y')->get();

        // $cantidad=Reservacion::all()->count();


        return view('reporte', compact('cantidad'));
    }


}
