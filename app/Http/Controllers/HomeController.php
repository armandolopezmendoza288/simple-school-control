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
        $this->middleware('onlyadmin', ['only' => ['index']]);
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

        $grupos = DB::table('grupos')
            ->select('grupos.*')
            ->where('user_id', '=', $id)
            ->get();

        $cantAlumnos = DB::table('grupos')
            ->select('alumnos.grupo_id', DB::raw('count(*) as cant'))
            ->groupBy('alumnos.grupo_id')
            ->join('alumnos', 'grupos.id', '=', 'alumnos.grupo_id')
            ->where('user_id', '=', $id)
            ->get();

        /* dd($cantAlumnos); */

        return view('gruposProfesor', compact('id', 'grupos', 'cantAlumnos'));
    }
    public function show($id)
    {
        $grupo = Grupo::find($id);
        /* dd($grupo); */
        $idUser = Auth::user()->name;
        $alumnos = DB::table('alumnos')
            /* ->select('alumnos.*', 'grupos.id') */
            ->select('alumnos.id', 'alumnos.name', 'alumnos.lastname', 'alumnos.grupo_id')
            ->join('grupos', 'grupos.id', '=', 'alumnos.grupo_id')
            ->where('grupos.id', '=', $id)
            ->where('grupos.user_id', '=', Auth::user()->id)
            ->get();
        if ($grupo == null) {
            return back();
        } else {
            return view('listadoAlumnos', compact('alumnos', 'grupo', 'idUser'));
        }
    }
    public function showList($id)
    {
        $idGrupo = Grupo::find($id);

        $alumnos = DB::table('alumnos')
            /* ->select('alumnos.*', 'grupos.id') */
            ->select('alumnos.id', 'alumnos.name', 'alumnos.lastname', 'alumnos.grupo_id')
            ->join('grupos', 'grupos.id', '=', 'alumnos.grupo_id')
            ->where('grupos.id', '=', $id)
            ->where('grupos.user_id', '=', Auth::user()->id)
            ->get();
        return $alumnos;
    }
    public function showListAlumnos($id)
    {
        $idGrupo = Grupo::find($id);
        /* dd($idGrupo->user_id); */
        $id = Auth::user()->id;
        /* dd($id); */

        if ($idGrupo == null or $idGrupo->user_id != $id) {
            return back();
        } else {
            return view('listadoAlumnos', compact('idGrupo'));
        }
    }

    public function saveAttendance(Request $request)
    {
        $date = $request->date;
        $alumnos = json_decode($request->alumnos);

        /* self::deleteAttendanceDataByDate($date); */

        foreach ($alumnos as $alumno) {
            DB::table('alumnos_asistencia')
                ->where('fecha', $date)->where('alumnos_id', $alumno->id)->delete();
        }

        foreach ($alumnos as $alumno) {
            DB::table('alumnos_asistencia')->insert([
                'alumnos_id' => $alumno->id,
                'fecha' => $date,
                'estado' => $alumno->status,
            ]);
        }
        /* dd($date); */
        return 'Ok';
    }
    public function showReportListAlumnos($id)
    {
        $idGrupo = Grupo::find($id);
        $id = Auth::user()->id;

        $start = date("Y-m-d");
        $end = date("Y-m-d");
        /* dd($start); */

        if ($idGrupo == null or $idGrupo->user_id != $id) {
            return back();
        } else {
            $alumnos = DB::table('alumnos')
                ->selectRaw("name, lastname, alumnos_asistencia.alumnos_id, sum(case when alumnos_asistencia.estado = 'presence' then 1 else 0 end) as presence_count, sum(case when alumnos_asistencia.estado = 'absence' then 1 else 0 end) as absence_count ")
                ->groupBy('alumnos_asistencia.alumnos_id')
                ->groupBy('name')
                ->groupBy('lastname')
                ->join('alumnos_asistencia', 'alumnos.id', '=', 'alumnos_asistencia.alumnos_id')
                ->where('fecha', '>=', $start)
                ->where('fecha', '<=', $end)
                ->where('alumnos.grupo_id', '=', $idGrupo->id)
                ->get();
            /* dd($alumnos); */
            return view('reporteAsistencias', compact('idGrupo', 'start', 'end', 'alumnos'));
        }
    }
    public function showReportListAlumnosDate(Request $request, $id)
    {
        $idGrupo = Grupo::find($id);
        $id = Auth::user()->id;

        $start = $request->start;
        $end = $request->end;
        /* dd($end); */

        if ($idGrupo == null or $idGrupo->user_id != $id) {
            return back();
        } else {
            $alumnos = DB::table('alumnos')
                ->selectRaw("name, lastname, alumnos_asistencia.alumnos_id, sum(case when alumnos_asistencia.estado = 'presence' then 1 else 0 end) as presence_count, sum(case when alumnos_asistencia.estado = 'absence' then 1 else 0 end) as absence_count ")
                ->groupBy('alumnos_asistencia.alumnos_id')
                ->groupBy('name')
                ->groupBy('lastname')
                ->join('alumnos_asistencia', 'alumnos.id', '=', 'alumnos_asistencia.alumnos_id')
                ->where('fecha', '>=', $start)
                ->where('fecha', '<=', $end)
                ->where('alumnos.grupo_id', '=', $idGrupo->id)
                ->get();
            /* dd($alumnos); */
            return view('reporteAsistencias', compact('idGrupo', 'start', 'end', 'alumnos'));
        }
    }
}
