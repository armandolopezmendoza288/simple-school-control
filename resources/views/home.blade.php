@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container home">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        {{-- <a href="{{route('grupos.usuario',  1 )}}"> --}}
                        <a href="#">
                            <header>
                                <img src="{{ asset('img/grupo-de-trabajo.png') }}" alt="">
                            </header>
                            <section>
                                <h2>Grupos</h2>
                                <h4>Crear, eliminar, editar, visualizar registro de grupos</h4>
                            </section>
                            <footer>
                                <p>Coded By Teacheck</p>
                            </footer>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
