<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/', function () {
//     return view('auth-form.login');
// });

Route::get('/', [AuthController::class, 'index']);



Route::get('/signup', function () {
    return view('auth-form. Registration');
})->name('signup');


Route::post('/register', [AuthController::class, 'register'])->name('register-form');

Route::post('/login', [AuthController::class, 'login'])->name('admin.login');




Route::get('/admin', [HomeController::class, 'index'])->name('admin.');


Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');


