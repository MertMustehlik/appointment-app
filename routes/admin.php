<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AvailableAppointmentController;

Route::prefix('auth')->group(function () {
    Route::middleware("guest:admin")->post('login', [AuthController::class, "login"]);
    Route::middleware("auth:admin")->group(function () {
        Route::post('logout', [AuthController::class, "logout"]);
        Route::get('me', [AuthController::class, "me"]);
        Route::post('refresh', [AuthController::class, "refresh"]);
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::group(["prefix" => "available-appointments"], function () {
        Route::middleware("permission:view available appointments,admin")->get('/', [AvailableAppointmentController::class, "index"]);
        Route::middleware("permission:add available appointment,admin")->post('/', [AvailableAppointmentController::class, "store"]);
        Route::middleware("permission:view available appointments,admin")->get('/{availableAppointment}', [AvailableAppointmentController::class, "show"]);
        Route::middleware("permission:delete available appointment,admin")->delete('/{availableAppointment}', [AvailableAppointmentController::class, "delete"]);
    });
});
