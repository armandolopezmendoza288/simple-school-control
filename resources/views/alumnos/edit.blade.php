@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('alumno.update', $alumno->id) }}" method="post" class="form-horizontal">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Alumno</h4>
                                <p class="card-category">Editar Alumno</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label mt-3">Nombre</label>
                                    <div class="col-sm-7 mt-3">
                                        <input type="text" class="form-control"
                                            placeholder="Ingrese su nombre" name="name" value="{{ old('name', $alumno->name) }}" >
                                        @if ($errors->has('name'))
                                            <span class="error text-danger"
                                                for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="lastname" class="col-sm-2 col-form-label mt-3">Apellidos</label>
                                    <div class="col-sm-7 mt-3">
                                        <input type="text" class="form-control"
                                            placeholder="Ingrese su nombre" name="lastname" value="{{ old('lastname', $alumno->lastname) }}"  >
                                        @if ($errors->has('lastname'))
                                            <span class="error text-danger"
                                                for="input-name">{{ $errors->first('lastname') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="grupo_id" class="col-sm-2 col-form-label mt-3">Grupo</label>
                                    <div class="col-sm-7 mt-3">
                                        <input type="text" class="form-control"
                                            placeholder="Ingrese su nombre" name="grupo_id" value="{{ old('grupo_id', $alumno->grupo_id) }}"  >
                                        @if ($errors->has('grupo_id'))
                                            <span class="error text-danger"
                                                for="input-name">{{ $errors->first('grupo_id') }}</span>
                                        @endif
                                    </div>
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
