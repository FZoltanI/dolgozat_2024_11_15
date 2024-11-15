<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new-genre', [GenreController::class,'create'])->name('create_genre');
Route::post('/new-genre', [GenreController::class,'store'])->name('store_genre');

Route::get('/new-film', [FilmController::class,'create'])->name('create_film');
Route::post('/new-film', [FilmController::class,'store'])->name('store_film');

Route::get('/films', [FilmController::class,'index'])->name('index_film');
Route::get('/films/{id}', [FilmController::class,'show'])->name('show_film');
Route::delete('/films/{id}', [FilmController::class,'destroy'])->name('delete_film');
Route::post('/films/{id}', [RentController::class,'store'])->name('create_rent');

Route::get('/rented', [RentController::class,'index1'])->name('index_rented');
Route::put('/rented', [RentController::class,'update'])->name('rented_back');

Route::get('/rentals', [RentController::class,'index2'])->name('index_rentals');