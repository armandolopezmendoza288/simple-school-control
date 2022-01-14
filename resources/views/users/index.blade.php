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
                                    <h4 class="card-title">Usuarios/Profesores</h4>
                                    <p class="card-category">Usuarios/Profesores registrados</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
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
                                                <th>Correo</th>
                                                <th>Username</th>
                                                <th>Tipo</th>
                                                <th>Created_at</th>
                                                <th class="text-center">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td style="max-width: 175px;">{{ $user->id }}</td>
                                                        <td style="max-width: 175px;">{{ $user->name }}</td>
                                                        <td style="max-width: 175px;">{{ $user->email }}</td>
                                                        <td style="max-width: 175px;">{{ $user->username }}</td>
                                                        <td style="max-width: 175px;">{{ $user->tipo }}</td>
                                                        <td style="max-width: 175px;">{{ $user->created_at }}</td>
                                                        <td class="text-center">
                                                            <a href="{{route('users.show', $user->id)}}" class="btn btn-info" type="button">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning" type="button">
                                                                <i class="fas fa-user-edit"></i>
                                                            </a>
                                                            <form action="{{route('users.delete', $user->id)}}" method="post" style="display: inline-block;" onsubmit="return confirm('Estas seguro que quieres eliminar este usuario?')">
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
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('users.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Usuario/Profesor</h4>
                                <p class="card-category">Ingresar datos</p>
                            </div>
                            <div class="card-body">
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
                                    <label for="username" class="col-sm-3 col-form-label mt-3">Nombre de usuario</label>
                                    <div class="col-sm-8 mt-3">
                                        <input type="text" class="form-control" value="{{ old('username') }}"
                                            placeholder="Ingrese su nombre de usuario" name="username">
                                        @if ($errors->has('username'))
                                            <span class="error text-danger"
                                                for="input-name">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="tipo" class="col-sm-3 col-form-label mt-3">Tipo de usuario</label>
                                    <div class="col-sm-8 mt-3">
                                        <select class="form-control" id="exampleFormControlSelect1" name="tipo"  value="{{ old('tipo') }}">
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                        {{-- <input type="text" class="form-control" value="{{ old('tipo') }}"
                                            placeholder="Tipo de usuario" name="tipo"> --}}
                                        @if ($errors->has('tipo'))
                                            <span class="error text-danger" for="input-name">{{ $errors->first('tipo') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="email" class="col-sm-3 col-form-label mt-3">Correo</label>
                                    <div class="col-sm-8 mt-3">
                                        <input type="email" class="form-control" value="{{ old('email') }}"
                                            placeholder="Ingrese su correo" name="email">
                                        @if ($errors->has('email'))
                                            <span class="error text-danger" for="input-name">{{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="password" class="col-sm-3 col-form-label mt-3">Contraseña</label>
                                    <div class="col-sm-8 mt-3">
                                        <input type="password" class="form-control" placeholder="Ingrese su contraseña"
                                            name="password">
                                        @if ($errors->has('password'))
                                            <span class="error text-danger" for="input-name">{{ $errors->first('password') }}
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
