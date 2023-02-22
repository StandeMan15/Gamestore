<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductCommentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', [ProductsController::class, 'index'])->name('home');

// Product handling
Route::get('{category:slug}/{product:slug}', [ProductsController::class, 'show']);
Route::post('products/{product:slug}/comments', [ProductCommentsController::class, 'store']);

Route::get('admin', [SessionsController::class, 'isAdmin']);

//CRUD admin/categories
Route::get('admin/categories', [AdminController::class, 'show'])->name('adminCategories');
Route::get('admin/categories/activity/{id}', [AdminController::class, 'activity'])->name('statusCategory');
Route::get('admin/categories/edit/{id}', [AdminController::class, 'edit'])->name('editCategory');
Route::post('admin/categories/update/{id}', [AdminController::class, 'update'])->name('updateCategory');

//CRUD admin/products
Route::get('admin/product/read/{id}', [ProductsController::class, 'readAdmin'])->name('readProduct');
Route::get('admin/product/activity/{id}', [ProductsController::class, 'activity'])->name('statusProduct');
Route::get('admin/product/edit/{id}', [ProductsController::class, 'edit'])->name('editProduct');
Route::post('admin/product/update/{id}', [ProductsController::class, 'update'])->name('updateProduct');
Route::get('admin/product/create', [ProductsController::class, 'create'])->name('createProduct');
Route::post('admin/product/store', [ProductsController::class, 'store'])->name('storeProduct');

//CRUD admin/users
Route::get('admin/users', [UserController::class, 'show'])->name('adminUsers');

// Auth
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');