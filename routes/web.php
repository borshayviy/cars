<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(\App\Http\Controllers\CarsController::class)
    ->prefix('cars')
    ->name('cars.')
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('show/{id}', 'show')->name('show');

        Route::middleware(\App\Http\Middleware\AuthRule::class)->group(function () {
            Route::get('create', 'create');
            Route::post('store', 'store');
            Route::get('update/{name}', 'update');
            Route::get('update-store/{name}', 'updateStore');
            Route::get('destroy', 'destroy');
        });


});

Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [ArticlesController::class, 'index']) ->name('index');
    Route::get('/show/{slug}', [ArticlesController::class, 'show']) ->name('show');

    Route::get('/create', [ArticlesController::class, 'create']) ->name('create');
    Route::post('/store', [ArticlesController::class, 'store']) ->name('store');
});

    Route::name('auth')->group(function () {
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/authenticate', [LoginController::class, 'index'])->name('authenticate');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
