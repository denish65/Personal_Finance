<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ChatController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->prefix('api')->group(function () {
    Route::get('/messages', [ChatController::class, 'fetchMessages']);
    Route::post('/messages', [ChatController::class, 'sendMessage']);
});