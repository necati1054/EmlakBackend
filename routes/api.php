<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


//NOTE - AUTH ROUTES
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [authController::class, 'logout']);
Route::post('register', [authController::class, 'register']);
Route::post('reset-password', [authController::class, 'resetPassword']);
Route::post('new-password/{token}', [authController::class, 'newPassword']);
Route::post('user-update/{id}', [userController::class, 'userUpdate']);
Route::post('user-password-update/{id}', [userController::class, 'userPasswordUpdate']); //FIXME - Neden kullanıldığına bak ve ileride düzelt
