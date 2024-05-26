<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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
    return view('login');
});


Route::get('/auth/google',[UserController::class,'redirectGoogle'])->name('login.google');
Route::get('/auth/google/callback',[UserController::class,'callbackGoogle']);

Route::get('/auth/github',[UserController::class,'redirectGithub'])->name('login.github');
Route::get('/auth/github/callback',[UserController::class,'callbackGithub']);

Route::get('/auth/facebook',[UserController::class,'redirectFacebook'])->name('login.facebook');
Route::get('/auth/facebook/callback',[UserController::class,'callbackFacebook']);


Route::get('/dashboard',[DashboardController::class,'show']);