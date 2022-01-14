<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\User;

use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Group;

class AlumnoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('onlyuser', ['only' => ['index']]);
    }
    /* public function index()
    {
        $alumnos = Alumno::paginate(5);
        $grupos = Grupo::all();
        return view('alumnos.index', compact('alumnos','grupos'));
    } */
    public function index()
    {
        $alumnos = Alumno::paginate(5);
        $grupos = Grupo::all();
        return view('alumnos.index', compact('alumnos','grupos'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:25',
            'lastname' => 'required|min:2|max:25',
            'grupo_id' => 'required',
        ]);

        $alumno = Alumno::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'grupo_id' => $request->grupo_id,

        ]);
        return redirect()->route('alumno.index')->with('success', 'Alumno creado correctamente');
    }
    public function show($id)
    {
        $alumno = Alumno::find($id);
        //dd($user);
        return view('alumnos.show', compact('alumno'));
    }
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2|max:25',
            'lastname' => 'required|min:2|max:25',
            'grupo_id' => 'required',
        ]);

        $alumno=Alumno::findOrFail($id);
        $data = $request->only('name', 'lastname', 'grupo_id');
        $alumno->update($data);
        return redirect()->route('alumno.index')->with('success','Alumno actualizado correctamente');
    }
    function destroy(Alumno $Alumno)
    {
        $Alumno->delete();
        return back()->with('success', 'Alumno eliminado');
    }
}
