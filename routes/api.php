<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ScreeningController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    // Movie API routes
    Route::get('/v1/movies', [MovieController::class, 'getAllMovies']);
    Route::get('/v1/movies/{id}', [MovieController::class, 'getMovieById']);
    Route::post('/v1/movies/create', [MovieController::class, 'newMovie']);
    Route::get('/v1/movies/delete/{id}', [MovieController::class, 'deleteMovie']);

    // Screening API routes
    Route::get('/v1/screenings', [ScreeningController::class, 'getAllScreenings']);
    Route::get('/v1/screenings/{id}', [ScreeningController::class, 'getScreeningById']);
    Route::post('/v1/screenings/create', [ScreeningController::class, 'newScreening']);
    Route::get('/v1/screenings/delete/{id}', [ScreeningController::class, 'deleteScreening']);
});
