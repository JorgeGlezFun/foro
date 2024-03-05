<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ImagenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// Se usa parameters para que no se ralle y no coja los singulares que le sale de la polla
Route::resource('publicaciones', PublicacionController::class)->parameters(['publicaciones'=>'publicacion']);
Route::resource('imagenes', ImagenController::class)->parameters(['imagenes'=>'imagen']);
Route::resource('comentarios', ComentarioController::class)->parameters(['comentarios'=>'comentario']);
