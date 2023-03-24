<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Article\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;


Route::namespace('Auth')->group(function () {
    Route::post('register', [RegisterController::class, '__invoke']);
    Route::post('login', [LoginController::class, '__invoke']);
    Route::post('logout', [LogoutController::class, '__invoke']);

});

Route::middleware('auth:api')->group(function () {
    Route::post('create-article', [ArticleController::class, 'store']);
    Route::patch('edit-article/{article}', [ArticleController::class, 'update']);
    Route::delete('delete-article/{article}', [ArticleController::class, 'destroy']);
});


Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{article}', [ArticleController::class, 'show']);
Route::get('user', [UserController::class, '__invoke']);
