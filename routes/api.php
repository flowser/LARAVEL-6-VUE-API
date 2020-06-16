<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::post('/login/password/resetlink', [AuthController::class, 'resetlink']);
Route::post('/login/password/reset', [AuthController::class, 'reset']);

Route::post('/login/password/resetlink', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');





Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/refreshtoken', [AuthController::class, 'refreshtoken']);

// Route::get('/unauthorized', [AuthController::class,'unauthorized']);
Route::middleware('auth:api')->group(function() {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'user']);
});
