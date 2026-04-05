<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\PublisherController;

Route::prefix('v1')->group(function () {
    Route::apiResource('games', GameController::class);

    Route::apiResource('genres', GenreController::class);

    Route::apiResource('platforms', PlatformController::class);

    Route::apiResource('publishers', PublisherController::class);
});