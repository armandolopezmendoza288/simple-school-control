@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Alumno</div>
                            <p class="card-category">Vista detallada del alumno {{ $alumno->name }}</p>
                        </div>
                        <!--body-->
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">
                                <!--Start third-->
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>ID</th>
                                                        <td>{{ $alumno->id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>{{ $alumno->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Apellido(s)</th>
                                                        <td>{{ $alumno->lastname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Grupo</th>
                                                        <td>{{ $alumno->grupo_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created at</th>
                                                        <td><a href="#" target="_blank">{{ $alumno->created_at }}</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('alumno.index') }}" class="btn btn-sm btn-success mr-3">
                                                    Volver </a>
                                                <a href="{{route('alumno.edit', $alumno->id)}}"
                                                    class="btn btn-sm btn-twitter"> Editar </a>
                                            </div>
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
