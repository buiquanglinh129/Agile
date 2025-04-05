<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/search', [UserSearchController::class, 'search'])->name('users.search');

require __DIR__.'/auth.php';
