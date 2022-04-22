<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;

Route::get('/', function() {
    return view('welcome');
})->middleware('guest')
  ->name('welcome');

Route::get('/menu', function() {
    return view('menu');
})->middleware('auth')
  ->name('menu');

Route::get('/login', function() {
    return view('auth/login');
})->middleware('guest')
  ->name('login.index');

Route::get('/register', function() {
    return view('auth/register');
})->middleware('guest')
  ->name('register.index');

Route::get('/upload', function() {
    return view('upload');
})->middleware('auth')
  ->name('upload');

Route::post('/login', [UserController::class, 'login'])
    ->name('login.login_user');

Route::get('/logout', [UserController::class, 'logout'])
    ->middleware('auth')
    ->name('login.destroy');

Route::post('/register', [UserController::class, 'register'])
    ->name('register.register_user');

Route::post('/files', [FileController::class, 'store'])
    ->name('files.store');

Route::get('/files', [FileController::class, 'index'])
    ->middleware('auth')
    ->name('files.index');

Route::get('/files/{file_id}', [FileController::class, 'download'])
    ->middleware('auth')
    ->name('file.download');