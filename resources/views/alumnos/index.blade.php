@extends('layouts.app')
@section('content')
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Alumnos</h4>
                                    <p class="card-category">Alumnos registrados</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Grupo</th>
                                                <th>Created_at</th>
                                                <th class="text-center">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($alumnos as $alumno)
                                                    <tr>
                                                        <td style="max-width: 175px;">{{ $alumno->id }}</td>
                                                        <td style="max-width: 175px;">{{ $alumno->name }}</td>
                                                        <td style="max-width: 175px;">{{ $alumno->lastname }}</td>
                                                        <td style="max-width: 175px;">{{ $alumno->find($alumno->id)->grupo->name }}</td>
                                                        <td style="max-width: 175px;">{{ $alumno->created_at }}</td>
                                                        <td class="text-center">
                                                            <a href="{{route('alumno.show', $alumno->id)}}" class="btn btn-info" type="button">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                            <a href="{{route('alumno.edit', $alumno->id)}}" class="btn btn-warning" type="button">
                                                                <i class="fas fa-user-edit"></i>
                                                            </a>
                                                            <form action="{{route('alumno.delete', $alumno->id)}}" method="post" style="display: inline-block;"
                                                                onsubmit="return confirm('Estas seguro que quieres eliminar este Alumno?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" type="submit">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer mr-auto">
                                    {{ $alumnos->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('alumno.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Alumno</h4>
                                <p class="card-category">Ingresar datos</p>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label mt-3">Nombre</label>
                                    <div class="col-sm-8 mt-3">
                                        <input type="text" class="form-control" value="{{ old('name') }}"
                                            placeholder="Ingrese su nombre" name="name" autofocus >
                                        @if ($errors->has('name'))
                                            <span class="error text-danger"
                                                for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="lastname" class="col-sm-3 col-form-label mt-3">Apellidos</label>
                                    <div class="col-sm-8 mt-3">
                                        <input type="text" class="form-control" value="{{ old('lastname') }}"
                                            placeholder="Ingrese su nombre de usuario" name="lastname">
                                        @if ($errors->has('lastname'))
                                            <span class="error text-danger"
                                                for="input-name">{{ $errors->first('lastname') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="grupo_id" class="col-sm-3 col-form-label mt-3">Grupo</label>
                                    <div class="col-sm-8 mt-3">
                                        <select class="form-control" id="exampleFormControlSelect1" name="grupo_id"  value="{{ old('grupo_id') }}">
                                            @foreach ($grupos as $grupo)
                                            {{-- <option>{{$grupo->id = $grupo->name}}</option> --}}
                                            <option value='{{ $grupo->id }}'>{{ $grupo->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('grupo_id'))
                                            <span class="error text-danger" for="input-name">{{ $errors->first('grupo_id') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
