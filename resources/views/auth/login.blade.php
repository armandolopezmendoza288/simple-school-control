<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-image: url('{{ asset('img/classroom-g05b4a5b2c_1920.jpg')}}');">
    <div class="container">
        {{-- <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header loginHeader">{{ __('Iniciar sesion') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <button type="submit" class="btn btn-primary loginButton">
                                            {{ __('Ingresar') }}
                                        </button>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
        <div class="container-login">
            <div class="col-md-4 mt-5 ">
            </div>
            <div class="col-md-4 mt-1">
                <p class="logo mb-0">Teacheck</p>
                <p class="logoMini mb-4">(Pase de lista)</p>
                <div class="card tablaPlanes text-center">
                    <div class="card-header headerform">
                        Iniciar sesión
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div style="text-align: justify">
                                <div class="form-group row">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Correo electrónico">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row mt-4">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Contraseña">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <hr class="mt-5">
                            </div>
                            <button type="submit" class="btn btn-primary loginButton">
                                {{ __('Entrar') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</body>
</html>

