<?php

use Illuminate\Support\Facades\Route;
use LaravelScaffold\Controllers\FilesController;
use LaravelScaffold\Controllers\LoginController;
use LaravelScaffold\Controllers\UsersController;
use LaravelScaffold\Controllers\RegisterController;

Route::group(['prefix' => 'api/v1'], function () {
    // Auth Routes
    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', [RegisterController::class, 'handle'])
            ->name('auth.register');

        Route::post('login', [LoginController::class, 'handle'])
            ->name('auth.login');
    });

    // Authorized-only Routes
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('/user', [UsersController::class, 'loggedin'])
            ->name('users.loggedin');

        Route::get('/upload', [FilesController::class, 'handle'])
            ->name('files.upload');

        // 
    });
});
