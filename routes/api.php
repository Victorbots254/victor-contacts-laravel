<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\GroupController;
use Illuminate\Support\Facades\Route;

Route::apiResource('contacts', ContactController::class);
Route::apiResource('groups', GroupController::class);
