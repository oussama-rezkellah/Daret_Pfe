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

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/setting', [UserController::class, 'settingform'])->middleware('auth');

Route::put('/setting', [UserController::class, 'settingupdate'])->middleware('auth');

Route::get('/setting/contact', [UserController::class, 'contactform'])->middleware('auth');

Route::get('/setting/password', [UserController::class, 'passwordform'])->middleware('auth');

Route::put('/setting/password', [UserController::class, 'passwordupdate'])->middleware('auth');

Route::put('/setting/contact', [UserController::class, 'contactupdate'])->middleware('auth');

Route::post('/profileupdate', [UserController::class, 'imageupdate'])->middleware('auth');


Route::get('/check-username', [UserController::class, 'checkUsername']);

Route::get('/checkemail', [UserController::class, 'checkemail']);

Route::get('/', function () {
    return view('home');
})->middleware('auth');;
