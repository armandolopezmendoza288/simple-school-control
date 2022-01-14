@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container home">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ url('/users') }}">
                            <header>
                                <img src="{{ asset('img/maestro.png') }}" alt="">
                            </header>
                            <section>
                                <h2>Profesores</h2>
                                <h4>Crear, eliminar, editar, visualizar registro de profesores</h4>
                            </section>
                            <footer>
                                <p>Coded By Teacheck</p>
                            </footer>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ url('/alumnos') }}">
                        <header>
                            <img src="{{ asset('img/alumno.png') }}" alt="">
                        </header>
                        <section>
                            <h2>Alumnos</h2>
                            <h4>Crear, eliminar, editar, visualizar registro de alumnos</h4>
                        </section>
                        <footer>
                            <p>Coded By Teacheck</p>
                        </footer>
                    </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ url('/grupos') }}">
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
                <div class="col-md-3">
                    <div class="card">
                        <a href="#">
                        <header>
                            <img src="{{ asset('img/educacion.png') }}" alt="">
                        </header>
                        <section>
                            <h2>Materias</h2>
                            <h4>Crear, eliminar, editar, visualizar registro de materias</h4>
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
