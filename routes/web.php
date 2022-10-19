<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ProjectForm;
use App\Mail\WelcomeMail;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\HomeController;


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
// ->middleware('auth')
// ->middleware('alreadyLoggedIn')
// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('isLoggedIn');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->middleware('alreadyLoggedIn');

Route::post('/registerUser', [AuthController::class, 'registerUser'])->name('registerUser');
Route::post('/loginUser', [AuthController::class, 'loginUser'])->name('loginUser');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/list', [ListController::class, 'list']);