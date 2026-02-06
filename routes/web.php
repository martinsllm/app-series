<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/', function () {
        return redirect()->route('series.index');
    });

    Route::get('/series/{series}/remove-cover', [SeriesController::class, 'deleteCover'])->name('series.removeCover');

    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
        ->name('seasons.index');

    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])
        ->name('episodes.index');

    Route::post('/seasons/{season}/episodes',  [EpisodesController::class, 'update'])->name('episodes.update');
}); 

require __DIR__.'/auth.php';
