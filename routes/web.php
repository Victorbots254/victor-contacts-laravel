<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;

Route::get('/', function () {
    return redirect()->route('contacts.index');
});

Route::resource('contacts', ContactController::class);
Route::resource('groups', GroupController::class);
