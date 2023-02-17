<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductCommentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductsController::class, 'index'])->name('home');

Route::get('products/{product:slug}', [ProductsController::class, 'show']);
Route::post('products/{product:slug}/comments', [ProductCommentsController::class, 'store']);

Route::get('admin', [SessionsController::class, 'isAdmin']);

//CRUD admin/categories
Route::get('admin/categories', [AdminController::class, 'show']);
Route::post('admin/categories/activity/{{ $categories->id }}', [AdminController::class, 'activity']);
Route::get('admin/categories/edit/{id}', [AdminController::class, 'edit']);
Route::post('admin/categories/update/{id}', [AdminController::class, 'update']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');