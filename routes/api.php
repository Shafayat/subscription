<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/websites', [WebsiteController::class, 'create']);
Route::post('/subscribe', [SubscriberController::class, 'subscribe']);
Route::post('/posts', [PostController::class, 'create']);
Route::post('/send-emails', [PostController::class, 'sendEmails']);


Route::get('/websites', [WebsiteController::class, 'index']); // New GET route
