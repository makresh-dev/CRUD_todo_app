<?php

use App\Http\Controllers\TaskManager;
use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;



Route::get('login', [AuthManager::class, 'login'])->name('login');
Route::post('login', [AuthManager::class,'loginPost'])->name('login.post');

Route::get('register', [AuthManager::class, 'register'])->name('register');
Route::post('register', [AuthManager::class,'registerPost'])->name('register.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
    return view('welcome');
})->name('home');
    Route::get('tasks/add', [TaskManager::class, 'addTask'])->name('tasks.add');
    Route::post('tasks/add', [TaskManager::class, 'addTaskPost'])->name('tasks.add.post');
});