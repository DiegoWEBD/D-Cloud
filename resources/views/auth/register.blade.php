@extends('layouts.app')
@section('title', 'Register')

@section('content')

    <div class="row justify-content-start w-75 mt-5 border shadow-lg">
        <div class="col d-flex justify-content-center">
            <img src="{{ asset('storage\img\logo-login.png') }}">
        </div>

        <div class="col">
            <form action="{{ route('register.register_user') }}" method="POST" class="m-4">
                @csrf

                <div class="mb-4">                  
                    <input type="name" class="form-control" name="name" placeholder="Nombre">
                </div>

                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

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

                <div class="mb-4">
                    <input type="password" class="form-control" name="confirmation_password" placeholder="Confirmar contraseña">
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
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>

@endsection