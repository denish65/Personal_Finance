<?php 

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;



Route::get('/messages', [ChatController::class, 'fetchMessages']); // Fetch messages
Route::post('/messages', [ChatController::class, 'sendMessage']); // Send a message

Route::middleware(['auth:sanctum'])->prefix('api')->group(function () {
    Route::get('/messages', [ChatController::class, 'fetchMessages']); // Fetch messages
    Route::post('/messages', [ChatController::class, 'sendMessage']); // Send a message
});