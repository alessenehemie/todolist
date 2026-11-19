<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [UserController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');

Route::get('/login', [UserController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::resource('tasks', TaskController::class)->middleware('auth');