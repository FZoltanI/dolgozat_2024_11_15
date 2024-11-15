<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new-genre', [GenreController::class,'create'])->name('create_genre');
Route::post('/new-genre', [GenreController::class,'store'])->name('store_genre');

Route::get('/new-film', [FilmController::class,'create'])->name('create_film');
Route::post('/new-film', [FilmController::class,'store'])->name('store_film');

Route::get('/films', [FilmController::class,'index'])->name('index_film');
Route::post('/films', [FilmController::class,'index'])->name('index_film_filter');