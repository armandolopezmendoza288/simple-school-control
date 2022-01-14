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
    public function grupos($id)
    {
        $id = Auth::user()->id;
        $grupos = DB::table('grupos')
            /* ->select('alumnos.*', 'grupos.id') */
            ->select('id', 'name')
            ->where('user_id', '=', $id)
            ->get();
        dd($grupos);
        return view('home', compact('grupos', 'id'));
    }
}
