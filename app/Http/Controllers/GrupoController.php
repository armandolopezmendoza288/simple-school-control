<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('onlyuser', ['only' => ['index']]);
    }
    public function index()
    {
        $grupos = Grupo::paginate(5);
        $users = User::all();
        return view('grupos.index', compact('grupos','users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:grupos|min:2|max:3',
            'user_id' => 'required',
        ]);

        $grupo = Grupo::create([
            'name' => $request->name,
            'user_id' => $request->user_id,

        ]);
        return redirect()->route('grupo.index')->with('success', 'Grupo creado correctamente');
    }
    public function show($id)
    {
        $grupo = Grupo::find($id);
        $profesores = DB::table('users');
        $alumnos = DB::table('alumnos')
            /* ->select('alumnos.*', 'grupos.id') */
            ->select('alumnos.id', 'alumnos.name', 'alumnos.lastname', 'alumnos.grupo_id')
            ->join('grupos', 'grupos.id', '=', 'alumnos.grupo_id')
            ->where('grupos.id', '=', $id)
            ->get();
        /* dd($alumnos); */
        return view('grupos.show', compact('grupo','alumnos'));
    }
    public function edit(Grupo $grupo)
    {
        $users = User::all();

        return view('grupos.edit', compact('grupo','users'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:grupos|min:2|max:3',
            'user_id' => 'required',
        ]);

        $grupo=Grupo::findOrFail($id);
        $data = $request->only('name', 'user_id');
        $grupo->update($data);
        return redirect()->route('grupo.index')->with('success','Usuario actualizado correctamente');
    }
    function destroy(Grupo $grupo)
    {
        $grupo->delete();
        return back()->with('success', 'Grupo eliminado');
    }

}
