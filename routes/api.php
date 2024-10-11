<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ArsaController;
use App\Http\Controllers\KonutController;
use App\Http\Controllers\IsYeriController;
use App\Http\Controllers\SearchController;
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

Route::get('user/{id}/ilans', [UserController::class, 'getUserIlans']);
Route::get('/search', [SearchController::class, 'search']);

//NOTE - IsYeri ROUTES
Route::get('is_yeri', [IsYeriController::class, 'index']);
Route::post('is_yeri', [IsYeriController::class, 'store']);
Route::get('is_yeri/{id}', [IsYeriController::class, 'show']);
Route::post('is_yeri/{id}', [IsYeriController::class, 'update']);
Route::delete('is_yeri/{id}', [IsYeriController::class, 'destroy']);

//NOTE - Arsa ROUTES
Route::get('arsa', [ArsaController::class, 'index']);
Route::post('arsa', [ArsaController::class, 'store']);
Route::get('arsa/{id}', [ArsaController::class, 'show']);
Route::post('arsa/{id}', [ArsaController::class, 'update']);
Route::delete('arsa/{id}', [ArsaController::class, 'destroy']);

//NOTE - Konut ROUTES
Route::get('konut', [KonutController::class, 'index']);
Route::post('konut', [KonutController::class, 'store']);
Route::get('konut/{id}', [KonutController::class, 'show']);
Route::post('konut/{id}', [KonutController::class, 'update']);
Route::delete('konut/{id}', [KonutController::class, 'destroy']);
