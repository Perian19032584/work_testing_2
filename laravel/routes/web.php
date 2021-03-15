<?php

use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

//Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::match(['get', 'post'],'/login', [HomeController::class, 'auth_admin'])->name('auth_admin');
Route::get('/write_bd', [HomeController::class, 'add_recording'])->name('write_bd');
