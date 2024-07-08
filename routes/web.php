<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('cart')->name('cart.')->group(function () {
   Route::get('/', [CartController::class, 'index'])->name('index');
   Route::post('/store', [CartController::class, 'store'])->name('store');
   Route::get('/remove/{id}', [CartController::class, 'remove'])->name('remove');
   Route::post('send', [CartController::class, 'send'])->name('send');
});

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
    Route::get('/', [ArticlesController::class, 'index'])->name('index');
    Route::get('/show/{slug}', [ArticlesController::class, 'show'])->name('show');

    Route::get('/create', [ArticlesController::class, 'create'])->name('create');
    Route::post('/store', [ArticlesController::class, 'store'])->name('store');
});

Route::name('comment.')->middleware('auth')->group(function () {
    Route::post('comment/store', [CommentsController::class, 'store'])->name('store');
});

Route::name('auth.')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginController::class, 'index'])->name('authenticate');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('user')->middleware('auth')->name('user.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\UserControllers::class, 'dashboard'])->name('dashboard');
});
