<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('appointments', ApiController::class);

Route::prefix('v1')->group(function () {
    Route::apiResource('users', UserController::class);
});

Route::post('/login-retrofit', [AuthenticatedSessionController::class, 'loginRetrofit']);
Route::post('/register-retrofit', [RegisteredUserController::class, 'registerRetrofit']);
Route::post('/forgotpassword-retrofit', [PasswordResetLinkController::class, 'sendPasswordResetLink']);

