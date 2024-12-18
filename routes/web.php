<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\AddExpenseControllers;
use App\Http\Controllers\admin\ChatController;
use App\Http\Controllers\admin\LibraryConttoller;





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

Route::get('/admin/logout', [AuthController::class, 'adminlogout'])->name('admin.logout');



// Route::get('/admin', [HomeController::class, 'index'])->name('admin.');


// Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');


Route::middleware([App\Http\Middleware\CheckAdminSession::class])->group(function () {
    // Admin routes that require the 'admin' session
    // Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/expense', [AddExpenseControllers::class, 'index'])->name('admin.expense');
Route::post('/admin/addexpense', [AddExpenseControllers::class, 'AddExpense'])->name('admin.addexpense');
Route::get('/admin/expense/show', [AddExpenseControllers::class, 'show'])->name('admin.expense.show');
Route::post('/admin/deleteExpense/{id}', [AddExpenseControllers::class, 'deleteExpense'])->name('admin.deleteExpense');
Route::get('/admin/editExpense/{id}', [AddExpenseControllers::class, 'editExpense'])->name('admin.editExpense');
Route::post('/admin/editExpense/{id}', [AddExpenseControllers::class, 'updateExpense'])->name('admin.updateExpense');



Route::get('/admin/chatRoom', [ChatController::class, 'index'])->name("chat.room"); // Fetch messages


Route::get('/admin/library', [LibraryConttoller::class, 'index'])->name("admin.library"); // Fetch messages

Route::post('/admin/library/add', [LibraryConttoller::class, 'store'])->name("admin.library.add"); // Fetch messages
Route::get('/admin/library/show', [LibraryConttoller::class, 'show'])->name("admin.library.show"); // Fetch messages











    // Other admin routes
});

