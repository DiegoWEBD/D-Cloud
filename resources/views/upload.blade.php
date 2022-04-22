@extends('layouts.app')
@section('title', 'Upload')

@section('content')

    <div class="row w-75 border shadow-lg">
        <div class="col-lg-5 bg-success">
            <div class="d-flex">
                <p class="px-3 pt-3 text-dark">Nombre:</p>
                <p class="px-3 pt-3 text-light">{{ auth()->user()->name }}</p>
            </div>
            
            <div class="d-flex">
                <p class="px-3 pt-3 text-dark">Email:</p>
                <p class="px-3 pt-3 text-light">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <div class="col-lg p-3">
            <div class="card">
                <div class="card-header">Subir un archivo</div>
                
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-sucess" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="name" class="form-control mb-4" name="name" placeholder="Nombre para el archivo">

                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <input type="file" class="form-control mb-4" name="file">

                        @error('file')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        @error('message')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <button type="submit" class="btn btn-primary">Subir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection