<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return redirect()->route('series.index');
});

Route::resource('/series', SeriesController::class)
    ->only(['index', 'create', 'store', 'destroy']);

