<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// show login form (root page)
Route::get('/', [PageController::class, 'show_login'])->name('login');

// show login form
Route::get('/login', [PageController::class, 'show_login']);

// show signup form
Route::get('/signup', [PageController::class, 'show_signup']);

// sign user up
Route::post('/signup', [UserController::class, 'signup'])->name('user.signup');

// log user in
Route::post('/login', [UserController::class, 'login'])->name('user.login');

// log user out
Route::get('/logout', [UserController::class, 'logout']);

// Show words page
Route::get('/words', [PageController::class, 'show_words']);