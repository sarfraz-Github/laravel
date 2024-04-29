<?php

use App\Http\Controllers\UserController;
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

// Login Page
Route::GET('login', [UserController::class, 'loginFormPage'])->name('auth.loginFormPage');
Route::POST('login', [UserController::class, 'loginFormProcess'])->name('auth.loginFormProcess');

// Register Page - Create an account
Route::GET('create_account', [UserController::class, 'createAccountForm'])->name('auth.registerForm');
Route::POST('create_account', [UserController::class, 'saveUser'])->name('auth.registerProcess');

//Admin dashboard Page
Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
})->name('admin.dashboard');

Route::get('forget_password', function () {
    return view('forget_password');
});
