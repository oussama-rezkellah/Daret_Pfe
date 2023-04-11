<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaretController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\DemandeController;
use  App\Models\User;
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

////
Route::get('/cree', [DaretController::class, 'create'])->name('creer_daret')->middleware('auth');
Route::post('/create', [DaretController::class, 'store'])->name('store')->middleware('auth');
Route::get('/myDarets', [DaretController::class, 'daret'])->name('my_daret')->middleware('auth');

Route::get('/', [DaretController::class, 'index'])->name('_daret')->middleware('auth');


Route::get('/myDarets/{membre}', [MembreController::class, 'show'])->name('show')->middleware('auth');

///
Route::post('/myDarets/add/{daret}',  [InvitationController::class, 'create'])->name('adduser')->middleware('auth');

////
Route::get('/{daret}', [DemandeController::class, 'create'])->name('joindaret')->middleware('auth');
///
Route::get('/myDaret/{daret}', [DemandeController::class, 'index'])->name('indexdemand')->middleware('auth');

route::get('/home/invitation', [InvitationController::class, 'index'])->name('indexinvit')->middleware('auth');

///action invit
route::get('/home/invitation/accept/{invitation}', [InvitationController::class, 'accept'])->name('acceptinvit')->middleware('auth');
route::get('/home/invitation/destroy/{invitation}', [InvitationController::class, 'destroy'])->name('destroyinvit')->middleware('auth');

///action demand
route::get('/myDaret/acc/{daret}/{user}', [DemandeController::class, 'accept'])->name('acceptdemand')->middleware('auth');
route::get('/myDaret/des/{demande}', [DemandeController::class, 'destroy'])->name('destroydemand')->middleware('auth');
