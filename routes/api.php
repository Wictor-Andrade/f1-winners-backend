<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->middleware('web');
Route::post('/register', [AuthController::class, 'register'])->middleware('web');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('web');

Route::post('/email/verify/{id}/{hash}', [AuthController::class, 'emailVerify'])->name('verification.verify');
Route::post('/resend-email-verify', [AuthController::class, 'resendEmailVerificationMail'])->middleware('web');

Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('web');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('web')->name('password.reset');


Route::middleware('web')->group(function () {
    Route::apiResource('teams', TeamController::class);
});


Route::middleware('web')->group(function () {
    Route::apiResource('countries', CountryController::class);
});
