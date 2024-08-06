<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;

Route::resource('autores', AutorController::class);
Route::resource('libros', LibroController::class);

Route::get('/', function () {
    return view('layout');
});

// Rutas para gestionar autores
Route::resource('autores', AutorController::class);

// Rutas para gestionar libros
Route::resource('libros', LibroController::class);