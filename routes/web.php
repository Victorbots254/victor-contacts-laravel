<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Api\ContactController as ApiContactController;
use App\Http\Controllers\Api\GroupController as ApiGroupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('contacts.index');
});

// Web routes (Blade views)
Route::resource('contacts', ContactController::class);
Route::resource('groups', GroupController::class);

// API routes (JSON)
Route::prefix('api')->group(function () {
    Route::apiResource('contacts', ApiContactController::class);
    Route::apiResource('groups', ApiGroupController::class);
});

