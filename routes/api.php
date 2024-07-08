<?php

use Illuminate\Support\Facades\Route;


Route::prefix('cars')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\v1\CarsController::class, 'index']);
});
