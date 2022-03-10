<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function grupos($grupoId)
    {
        $id = Auth::user()->id;

        $grupos = DB::table('grupos')
            /* ->select('alumnos.*', 'grupos.id') */
            ->select('id', 'name')
            ->where('user_id', '=', $id)
            ->get();
        /* dd($grupos); */
        $alumnos = DB::table('alumnos')
            /* ->select('alumnos.*', 'grupos.id') */
            ->select('alumnos.id', 'alumnos.name', 'alumnos.lastname', 'alumnos.grupo_id')
            ->join('grupos', 'grupos.id', '=', 'alumnos.grupo_id')
            ->where('grupos.id', '=',  $grupoId)
            ->get();
        dd($alumnos);
        return view('gruposProfesor', compact('grupos', 'id', 'alumnos'));
    }
}
