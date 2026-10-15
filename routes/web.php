<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Search
Route::get('/search', [SearchController::class, 'search'])
    ->name('search');

// Movie Detail
Route::get('/movie/{id}', [MovieController::class, 'show'])
    ->name('movie.show');

// Person Detail (Actor, Director, Producer)
Route::get('/person/{type}/{id}', [PersonController::class, 'show'])
    ->name('person.show')
    ->where('type', 'actor|director|producer');
