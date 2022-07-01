@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <h1 class="text-center">Attendance report</h1>
            </div>
            <div class="col-12 mt-4">
                <form action="{{ route('reportDate.show', $idGrupo) }}" method="post" class="form-inline mb-2">
                    @csrf
                    <label for="start">Start:&nbsp;</label>
                    <input required id="start" type="date" name="start" value="{{ $start }}"
                        class="form-control mr-2">
                    <label for="end">End:&nbsp;</label>
                    <input required id="end" type="date" name="end" value="{{ $end }}"
                        class="form-control">
                    <button class="btn btn-success ml-2">Filter</button>
                </form>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre del Alumno</th>
                                <th>Cantidad de asistencias</th>
                                <th>Canidad de faltas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumnos as $alumno)
                                <tr>
                                    <td>
                                        {{ $alumno->alumnos_id }}
                                    </td>
                                    <td>
                                        {{$alumno->name}}
                                    </td>
                                    <td>
                                        {{$alumno->presence_count}}
                                    </td>
                                    <td>
                                        {{$alumno->absence_count}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
