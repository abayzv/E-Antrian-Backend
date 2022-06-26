<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VehicleController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', AuthUserController::class);
    Route::apiResource('customer', CustomerController::class);
    Route::post('status', [QueueController::class, 'setStatus']);
    Route::apiResource('queue', QueueController::class);
    Route::apiResource('service', ServiceController::class);
    Route::apiResource('vehicle', VehicleController::class);
});
Route::apiResource('mechanic', MechanicController::class);
Route::get('profile/{user:username}', ProfileInformationController::class);
Route::get('admin', [AdminController::class, 'index']);
