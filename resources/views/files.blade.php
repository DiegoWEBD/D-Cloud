@extends('layouts.app')
@section('title', 'Archivos')

@section('content')

    <div class="border rounded shadow p-4">
        <p class="h3 mb-4">Archivos subidos</p>

        <table class="table table-bordered table-responsive">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Subido el</th>
                    <th scope="col">Descargar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($files as $file)
                <tr>
                  <th scope="row">{{ $file->name }}</th>
                  <td>{{ $file->created_at }}</td>
                  <td>
                    <a href="{{ route('file.download', $file->name) }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-download-alt"></span> Descargar
                    </a>
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection