@extends('layouts.app')
@section('content')
    <div id="app">
        <listado-component :grupo="{{ $idGrupo->id }}">
        </listado-component>
    </div>
@endsection
