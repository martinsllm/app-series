<?php

use App\Http\Controllers\Api\ApiSeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/series', [ApiSeriesController::class, 'index']);
Route::get('/series/{id}', [ApiSeriesController::class, 'show']);
