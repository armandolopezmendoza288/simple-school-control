@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('users.update', $user->id) }}" method="post" class="form-horizontal">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Usuario</h4>
                                <p class="card-category">Editar datos</p>
                            </div>
                            <div class="card-body">
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label mt-3">Nombre</label>
                                    <div class="col-sm-7 mt-3">
                                        <input type="text" class="form-control"
                                            placeholder="Ingrese su nombre" name="name" value="{{ old('name', $user->name) }}" autofocus >
                                        @if ($errors->has('name'))
                                            <span class="error text-danger"
                                                for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="username" class="col-sm-2 col-form-label mt-3">Nombre de usuario</label>
                                    <div class="col-sm-7 mt-3">
                                        <input type="text" class="form-control" value="{{ old('username', $user->username) }}"
                                            placeholder="Ingrese su nombre de usuario" name="username">
                                        @if ($errors->has('username'))
                                            <span class="error text-danger"
                                                for="input-name">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="tipo" class="col-sm-2 col-form-label mt-3">Tipo de usuario</label>
                                    <div class="col-sm-7 mt-3">
                                        <select class="form-control" id="exampleFormControlSelect1" name="tipo"  value="{{ $user->tipo }}">
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
                                    <label for="email" class="col-sm-2 col-form-label mt-3">Correo</label>
                                    <div class="col-sm-7 mt-3">
                                        <input type="email" class="form-control" value="{{ old('email', $user->email) }}"
                                            placeholder="Ingrese su correo" name="email">
                                        @if ($errors->has('email'))
                                            <span class="error text-danger" for="input-name">{{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="password" class="col-sm-2 col-form-label mt-3">Contraseña</label>
                                    <div class="col-sm-7 mt-3">
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
                                <button type="submit" class="btn btn-primary">Actualizar    </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
