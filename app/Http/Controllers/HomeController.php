<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Grupo;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('onlyadmin',['only'=> ['index']]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function grupos()
    {
        $id = Auth::user()->id;
        /* dd($id); */
        /* $grupos = DB::table('grupos')
            ->select('id', 'name')
            ->where('user_id', '=', $id)
            ->get();
        dd($grupos); */

        /* $gruposP = DB::table('grupos')
        ->select('id', 'name')
        ->where('user_id', '=', $id)
        ->get(); */
        /* dd($gruposP); */

        $grupos = DB::table('grupos')
            ->select('grupos.*')
            ->where('user_id', '=', $id)
            ->get();
        /* dd($alumnos);
 */

        /* $alumnos = DB::table('alumnos')
            ->select('alumnos.id', 'alumnos.name', 'alumnos.lastname', 'alumnos.grupo_id')
            ->join('grupos', 'grupos.id', '=', 'alumnos.grupo_id')
            ->where('grupos.id', '=', 4)
            ->get(); */
       /*  dd($alumnos); */
        return view('gruposProfesor', compact('id', 'grupos'));
    }
    public function show($id)
    {
        /* dd($id); */
        $grupo = Grupo::find($id);
        $profesores = DB::table('users');
        $alumnos = DB::table('alumnos')
            /* ->select('alumnos.*', 'grupos.id') */
            ->select('alumnos.id', 'alumnos.name', 'alumnos.lastname', 'alumnos.grupo_id')
            ->join('grupos', 'grupos.id', '=', 'alumnos.grupo_id')
            ->where('grupos.id', '=', $id)
            ->get();
        /* dd($alumnos); */
        return view('listadoAlumnos', compact('alumnos', 'grupo'));
    }
}
