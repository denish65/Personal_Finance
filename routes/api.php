<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ChatController;
use App\Http\Controllers\admin\LibraryConttoller;
use App\Http\Controllers\admin\AddExpenseControllers;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::middleware(['auth:sanctum'])->prefix('api')->group(function () {
    Route::get('/messages', [ChatController::class, 'fetchMessages']);
    Route::post('/messages', [ChatController::class, 'sendMessage']);
    


Route::get('/admin/expense', [AddExpenseControllers::class, 'index'])->name('admin.expense.api');
Route::post('/admin/addexpense', [AddExpenseControllers::class, 'AddExpense'])->name('admin.addexpense.api');
Route::get('/admin/expense/show', [AddExpenseControllers::class, 'show'])->name('admin.expense.show.api');
Route::post('/admin/deleteExpense/{id}', [AddExpenseControllers::class, 'deleteExpense'])->name('admin.deleteExpense.api');
Route::get('/admin/editExpense/{id}', [AddExpenseControllers::class, 'editExpense'])->name('admin.editExpense.api');
Route::post('/admin/updateExpense/{id}', [AddExpenseControllers::class, 'updateExpense'])->name('admin.updateExpense.api');





Route::get('/library', [LibraryConttoller::class, 'show']);
Route::post('/library', [LibraryConttoller::class, 'store']);
Route::post('/library/apistore', [LibraryConttoller::class, 'apistore']);
Route::put('/library/{book}/toggle-visibility', [LibraryConttoller::class, 'toggleVisibility']);
Route::get('/library/{book}/download', [LibraryConttoller::class, 'download']);
