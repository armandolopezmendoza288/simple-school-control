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
                                    <h4 class="card-title">Grupos</h4>
                                    <p class="card-category">Grupos registrados</p>
                                </div>
                                <div class="card-body">
                                    {{-- @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif --}}
                                   {{--  <div class="row mb-3">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">Añadir
                                                Usuario
                                            </a>
                                        </div>
                                    </div> --}}
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Profesor</th>
                                                <th>Created_at</th>
                                                <th class="text-center">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($grupos as $grupo)
                                                    <tr>
                                                        <td style="max-width: 175px;">{{ $grupo->id }}</td>
                                                        <td style="max-width: 175px;">{{ $grupo->name }}</td>
                                                        {{-- <td style="max-width: 175px;">{{ $grupo->user_id }}</td> --}}
                                                        <td style="max-width: 175px;">{{ $grupo->find($grupo->id)->user->name }}</td>
                                                        <td style="max-width: 175px;">{{ $grupo->created_at }}</td>
                                                        <td class="text-center">
                                                            <a href="{{route('grupo.show', $grupo->id)}}" class="btn btn-info" type="button">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                            <a href="{{route('grupo.edit', $grupo->id)}}" class="btn btn-warning" type="button">
                                                                <i class="fas fa-user-edit"></i>
                                                            </a>
                                                            <form action="{{route('grupo.delete', $grupo->id)}}" method="post" style="display: inline-block;"
                                                                onsubmit="return confirm('Estas seguro que quieres eliminar este grupo?')">
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
                                    {{ $grupos->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('grupo.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Grupo</h4>
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
                                {{-- <div class="row">
                                    <label for="user_id" class="col-sm-3 col-form-label mt-3">Profesor id</label>
                                    <div class="col-sm-8 mt-3">
                                        <input type="text" class="form-control" value=""
                                            placeholder="Ingrese su nombre de usuario" name="user_id">
                                        @if ($errors->has('user_id'))
                                            <span class="error text-danger"
                                                for="input-name"></span>
                                        @endif
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <label for="user_id" class="col-sm-3 col-form-label mt-3">Profesor a cargo</label>
                                    <div class="col-sm-8 mt-3">
                                        <select class="form-control" id="exampleFormControlSelect1" name="user_id"  value="{{ old('user_id') }}">
                                            @foreach ($users as $user)
                                            {{-- <option>{{$user->id}}</option> --}}
                                            <option value='{{ $user->id }}'>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('user_id'))
                                            <span class="error text-danger" for="input-name">{{ $errors->first('user_id') }}
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
