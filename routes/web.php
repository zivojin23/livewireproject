<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Livewire\ProjectForm;
use App\Mail\WelcomeMail;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;


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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/register', [AuthController::class, 'register'])->middleware('alreadyLoggedIn');

Route::post('/registerUser', [AuthController::class, 'registerUser'])->name('registerUser');
Route::post('/loginUser', [AuthController::class, 'loginUser'])->name('loginUser');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/list', [ListController::class, 'list']);