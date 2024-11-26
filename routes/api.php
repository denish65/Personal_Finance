<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ChatController;
use App\Http\Controllers\admin\LibraryConttoller;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::middleware(['auth:sanctum'])->prefix('api')->group(function () {
    Route::get('/messages', [ChatController::class, 'fetchMessages']);
    Route::post('/messages', [ChatController::class, 'sendMessage']);
    


Route::get('/books', [LibraryConttoller::class, 'show']);
Route::post('/books', [LibraryConttoller::class, 'store']);
Route::get('/books/{book}', [LibraryConttoller::class, 'download']);
Route::post('/books/{book}/toggle-visibility', [LibraryConttoller::class, 'toggleVisibility']);

// Route::middleware([App\Http\Middleware\CheckAdminSession::class])->group(function () {

//     Route::get('/messages', [ChatController::class, 'fetchMessages']);
//     Route::post('/messages', [ChatController::class, 'sendMessage']);
// });