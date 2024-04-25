<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\SettingController;

Route::prefix('v1')->group(function () {
    // Регистрация и авторизация
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Защищенные маршруты
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('settings')->group(function () {
            Route::post('change', [SettingController::class, 'change']);
            Route::post('confirm', [SettingController::class, 'confirm']);
        });
    });
});
