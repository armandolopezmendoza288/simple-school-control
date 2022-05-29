@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('grupo.update', $grupo->id) }}" method="post" class="form-horizontal">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Grupos</h4>
                                <p class="card-category">Editar Grupo</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label mt-3">Nombre</label>
                                    <div class="col-sm-7 mt-3">
                                        <input type="text" class="form-control"
                                            placeholder="Ingrese su nombre" name="name" value="{{ old('name', $grupo->name) }}" autofocus >
                                        @if ($errors->has('name'))
                                            <span class="error text-danger"
                                                for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
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
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
