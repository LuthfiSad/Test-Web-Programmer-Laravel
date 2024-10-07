<?php

use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StdWithExtraController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('students', StudentController::class)->middleware(['auth', 'verified']);
Route::resource('extracurriculars', ExtracurricularController::class)->middleware(['auth', 'verified']);
Route::resource('std_with_extras', StdWithExtraController::class)->middleware(['auth', 'verified']);
Route::patch('/profile-update', [ProfileController::class, 'update'])->name('profile.update');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
