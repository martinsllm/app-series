<?php

use App\Http\Middleware\Authenticator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return redirect()->route('series.index');
})->middleware(Authenticator::class);

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
    ->name('seasons.index');

Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index');

Route::post('/seasons/{season}/episodes',  [EpisodesController::class, 'update'])->name('episodes.update');

Route::get('/login', [LoginController::class,'index'])->name('login.index');
Route::post('/login', [LoginController::class,'login'])->name('login');

Route::get('/register', [UsersController::class,'create'])->name('users.create');
Route::post('/register', [UsersController::class,'store'])->name('users.store');  