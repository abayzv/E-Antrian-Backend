<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\ProfileInformationController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', AuthUserController::class);
});

Route::get('profile/{user:username}', ProfileInformationController::class);
