<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')
    ->namespace('App\Http\Controllers\API\V1')
    ->middleware('auth:sanctum')
    ->group(function (){
        Route::prefix('settings/')->group(function (){
            Route::post('change', [SettingController::class, 'change']);
        });
    });
