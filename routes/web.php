<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//API Routes

Route::post('/user-registration',[UserController::class,'registration']);
Route::post('/user-login',[UserController::class,'Login']);
Route::post('/send-OTP',[UserController::class,'sendOTP']);
Route::post('/verify-OTP',[UserController::class,'verifyOtp']);
Route::post('/reset-password',[UserController::class,'resetPassword'])->middleware([TokenVerificationMiddleware::class]);
