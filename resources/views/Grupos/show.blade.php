@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Grupo</div>
                            <p class="card-category">Vista detallada del Grupo {{ $grupo->name }}</p>
                        </div>
                        <!--body-->
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row"> --}}
                                <!--Start third-->
                                {{-- <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>ID</th>
                                                        <td>{{ $grupo->id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>{{ $grupo->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Profesor a cargo</th>
                                                        <td>{{ $grupo->user_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created at</th>
                                                        <td><a href="#" target="_blank">{{ $grupo->created_at }}</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('grupo.index') }}" class="btn btn-sm btn-success mr-3">
                                                    Volver </a>
                                                <a href="{{ route('grupo.edit', $grupo->id) }}"
                                                    class="btn btn-sm btn-twitter"> Editar </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!--end third-->
                   {{--          </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title font-weight-bolder">Pase de lista</div>
                            <p class="card-category">Alumnos del Grupo <strong>{{ $grupo->name }}</strong></p>
                            <p class="card-category">Profesor asignado: <strong>{{ $grupo->find($grupo->id)->user->name }}</strong></p>
                        </div>
                        <!--body-->
                        <div class="card-body">
                            <div class="row">
                                <!--Start third-->
                                <div class="col-md-12">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <table class="table">
                                                <thead class="text-primary">
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th>Grupo</th>
                                                    <th>Asistencia</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alumnos as $alumno)
                                                        <tr>
                                                            <td style="max-width: 175px;">{{ $alumno->id }}</td>
                                                            <td style="max-width: 175px;">{{ $alumno->name }}</td>
                                                            <td style="max-width: 175px;">{{ $alumno->lastname }}</td>
                                                            <td style="max-width: 175px;">{{ $grupo->name }}</td>
                                                            <td style="max-width: 175px;"><label><input type="checkbox" id="cbox1" value="first_checkbox"></label><br>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            {{-- <div class="button-container">
                                                <a href="#" class="btn btn-sm btn-success mr-3">
                                                    Imprimir
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <!--end third-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
