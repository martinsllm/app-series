<?php

use App\Http\Controllers\EpisodesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;

Route::get('/', function () {
    return redirect()->route('series.index');
});

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
    ->name('seasons.index');

Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index');

Route::post('/seasons/{season}/episodes',  [EpisodesController::class, 'update'])->name('episodes.update');