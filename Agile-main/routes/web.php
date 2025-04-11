<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\SinhVienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('classes', ClassRoomController::class);
    Route::post('/classes/{class}/add-student', [ClassRoomController::class, 'addStudent'])->name('classes.add-student');
    Route::delete('/classes/{class}/remove-student/{student}', [ClassRoomController::class, 'removeStudent'])->name('classes.remove-student');
});

require __DIR__.'/auth.php';
Route::resource('sinhvien' , SinhVienController::class);