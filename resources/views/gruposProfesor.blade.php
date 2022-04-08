@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Grupos</h4>
                                <p class="card-category">Pase de lista</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary text-center">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Cantidad de alumnos</th>
                                            <th class="text-center">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($grupos as $grupo)
                                                <tr class="text-center">
                                                    <td style="max-width: 175px;">{{ $grupo->id }}</td>
                                                    <td style="max-width: 175px;">{{ $grupo->name }}</td>
                                                    <td style="max-width: 175px;">30</td>
                                                    {{-- <td style="max-width: 175px;">{{ $grupo->user_id }}</td> --}}
                                                    <td class="text-center">
                                                        <a href="{{route('listado.show', $grupo->id)}}" class="btn" style="background: rgb(63, 191, 53) !important" type="button">
                                                            <i class="text-white fas fa-clipboard-list"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
