@extends('layouts.app')
@section('title', 'Login')

@section('content')

    <div class="row justify-content-start w-75 mt-5 border shadow-lg">
        <div class="col d-flex justify-content-center">
            <img src="{{ asset('storage\img\logo-login.png') }}">
        </div>

        <div class="col">
            <form action="{{ route('login.login_user') }}" method="POST" class="mt-5 mx-4">
                @csrf

                <div class="mb-4">
                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico">
                </div>

                @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-4">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                </div>

                @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                @error('message')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>

                <div class="my-3">
                    <span>¿Aún no tienes cuenta? <a href="{{ route('register.index') }}">Regístrate</a></span>
                </div>
            </form>
        </div>
    </div>


@endsection