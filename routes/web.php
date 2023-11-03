<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('Info', [AboutController::class, 'index'])->name('info');
Route::get('Trainers', [TrainerController::class, 'index'])->name('trainers');

