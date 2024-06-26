@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container home">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{route('grupos.usuario',  Auth::user()->id )}}">
                            <header>
                                <img class="img-fluid" src="{{ asset('img/grupo-de-trabajo.png') }}" alt="">
                            </header>
                            <section>
                                <h2 class="pt-3">Grupos</h2>
                                <h4 class="pb-3">Registro de grupos para pase de lista</h4>
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
