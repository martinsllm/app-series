<?php

use App\Http\Controllers\Api\EpisodesController;
use App\Http\Controllers\Api\SeasonsController;
use App\Http\Controllers\Api\SeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('series', SeriesController::class)->names('api.series');

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('api.seasons.index');

Route::get('/series/{series}/episodes', [EpisodesController::class, 'index'])->name('api.episodes.index');

Route::put('/episodes/{episode}/watched', [EpisodesController::class, 'watched'])->name('api.episodes.watched');