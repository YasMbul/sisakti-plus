<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::view('/login', 'login')->name('home');
Route::view('/dashboard', 'dashboard')->name('dashboard');
