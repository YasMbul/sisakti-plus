<?php

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SkpController;
use App\Http\Controllers\SkpDetailController;
use App\Http\Controllers\UnsurController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::resource('faculties', FacultyController::class);
Route::resource('majors', MajorController::class);
Route::resource('semesters', SemesterController::class);
Route::resource('unsurs', UnsurController::class);
Route::resource('skp-details', SkpDetailController::class);
Route::resource('skps', SkpController::class);
Route::resource('files', FileController::class);
Route::resource('users', UserController::class);
Route::view('/login', 'login')->name('home');
