<?php

use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new-genre', [GenreController::class,'create'])->name('create_genre');