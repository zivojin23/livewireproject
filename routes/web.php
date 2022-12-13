<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ProjectForm;
use App\Mail\WelcomeMail;
use App\Http\Controllers\ListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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
// ->middleware('isLoggedIn')
// ->middleware('auth')
// ->middleware('alreadyLoggedIn')
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/material', function () {
    return view('material');
});
Route::get('/receiver', function () {
    return view('receiver');
});
Route::get('/supplier', function () {
    return view('supplier');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/myprojects', [HomeController::class, 'list'])->name('list');

Route::get('/login', function () { return view('auth.login'); });
Route::get('/register', function () { return view('auth.register'); });

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route::get('/list', [ListController::class, 'list']);