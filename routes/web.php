<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(\App\Http\Controllers\CarsController::class)
    ->prefix('cars')
    ->name('cars.')
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('show/{id}', 'show')->name('show');
        Route::get('create', 'create');
        Route::post('store', 'store');
        Route::get('update/{id}', 'update');
        Route::get('update-store/{id}', 'updateStore');
        Route::get('destroy', 'destroy');
});

Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [ArticlesController::class, 'index']) ->name('index');
    Route::get('/create', [ArticlesController::class, 'create']) ->name('create');
    Route::post('/store', [ArticlesController::class, 'store']) ->name('store');
    Route::get('/show/{slug}', [ArticlesController::class, 'show']) ->name('show');
});