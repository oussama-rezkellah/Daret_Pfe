<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

Route::get('/forget', [UserController::class, 'forgetform'])->middleware('guest');

Route::post('/users/forget', [UserController::class, 'forget'])->middleware('guest');

Route::get('/register', [UserController::class, 'register'])->middleware('guest');

Route::post('/users', [UserController::class, 'store'])->middleware('guest');

Route::post('/users/auth', [UserController::class, 'auth'])->middleware('guest');

Route::get('/user/verify', [UserController::class, 'verify'])->middleware('guest');

Route::get('/reset', [UserController::class, 'resetform'])->middleware('guest');

Route::post('/users/reset', [UserController::class, 'reset'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/', function () {
    return view('home');
})->middleware('auth');;
