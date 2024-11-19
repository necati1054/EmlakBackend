<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArsaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\KonutController;
use App\Http\Controllers\IsYeriController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
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
Route::post('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'register']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);
Route::post('new-password/{token}', [AuthController::class, 'newPassword']);
Route::post('user-update/{id}', [UserController::class, 'userUpdate']);
Route::post('user-password-update/{id}', [UserController::class, 'userPasswordUpdate']); //FIXME - Neden kullanıldığına bak ve ileride düzelt

Route::get('user/{id}/ilans', [UserController::class, 'getUserIlans']);
Route::post('/search', [SearchController::class, 'search']);

//NOTE - IsYeri ROUTES
Route::get('isyeri', [IsYeriController::class, 'index']);
Route::post('is_yeri', [IsYeriController::class, 'store']);
Route::get('isyeri/{id}', [IsYeriController::class, 'show']);
Route::post('is_yeri/{id}', [IsYeriController::class, 'update']);
Route::delete('is_yeri/{id}', [IsYeriController::class, 'destroy']);
Route::put('is_yeri/{id}/ap', [IsYeriController::class, 'activePassive']);


//NOTE - Arsa ROUTES
Route::get('arsa', [ArsaController::class, 'index']);
Route::post('arsa', [ArsaController::class, 'store']);
Route::get('arsa/{id}', [ArsaController::class, 'show']);
Route::post('arsa/{id}', [ArsaController::class, 'update']);
Route::delete('arsa/{id}', [ArsaController::class, 'destroy']);
Route::put('arsa/{id}/ap', [ArsaController::class, 'activePassive']);


//NOTE - Konut ROUTES
Route::get('konut', [KonutController::class, 'index']);
Route::post('konut', [KonutController::class, 'store']);
Route::get('konut/{id}', [KonutController::class, 'show']);
Route::post('konut/{id}', [KonutController::class, 'update']);
Route::delete('konut/{id}', [KonutController::class, 'destroy']);
Route::put('konut/{id}/ap', [KonutController::class, 'activePassive']);

//NOTE - SETTINGS ROUTES
Route::get('settings', [SettingController::class, 'index']);
Route::post('save-settings', [SettingController::class, 'store']);

//NOTE - Dashboard ROUTES
Route::get('admin-dashboard', [DashboardController::class, 'adminDashboard']);
Route::get('user-dashboard/{id}', [DashboardController::class, 'userDashboard']);

//NOTE - HomePageRoutes
Route::get('home-page', [HomePageController::class, 'homePage']);
