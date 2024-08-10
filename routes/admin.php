<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AvailableAppointmentController;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, "login"]);
    Route::middleware("auth:admin")->group(function (){
        Route::post('logout', [AuthController::class, "logout"]);
        Route::get('me', [AuthController::class, "me"]);
        Route::post('refresh', [AuthController::class, "refresh"]);
    });
});
Route::middleware('auth:admin')->group(function () {
    Route::group(["prefix" => "available-appointments"], function (){
        Route::get('/', [AvailableAppointmentController::class, "index"]);
        Route::post('/', [AvailableAppointmentController::class, "store"]);
        Route::get('/{availableAppointment}', [AvailableAppointmentController::class, "show"]);
        Route::delete('/{availableAppointment}', [AvailableAppointmentController::class, "delete"]);
    });
});
