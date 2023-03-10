<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductCommentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', [ProductsController::class, 'index'])->name('home');

Route::get('admin', [SessionsController::class, 'index']);

Route::prefix('/admin')->group(function()
{
    Route::controller(CategoryController::class)
        ->prefix('/categories')
        ->group(function()
        {   // URL::admin/categories
            Route::get('', 'showAdmin')->name('showAdminCategories');
            Route::get('/read/{id}', 'read')->name('readCategory');
            Route::get('/create', 'create')->name('createCategory');
            Route::get('/activity/{id}', 'activity')->name('statusCategory');
            Route::get('/edit/{id}', 'edit')->name('editCategory');
            Route::post('/update/{id}', 'update')->name('updateCategory');
            Route::post('/store', 'store')->name('storeCategory');
            Route::delete('/destroy/{id}', 'destroy')->name('destroyCategory');
        });

    Route::controller(OrderController::class)
        ->prefix('/orders')
        ->group(function()
        {   // URL::admin/orders
            Route::get('', 'show')->name('showOrders');

        });

    Route::controller(ProductsController::class)
        ->prefix('/product')
        ->group(function()
        {   // URL::admin/product
            Route::get('/read/{id}', 'read')->name('readProduct');
            Route::get('/activity/{id}', 'activity')->name('statusProduct');
            Route::get('/edit/{id}', 'edit')->name('editProduct');
            Route::post('/update/{id}','update')->name('updateProduct');
            Route::get('/create', 'create')->name('createProduct');
            Route::post('/store', 'store')->name('storeProduct');
            Route::delete('/destroy/{id}', 'destroy')->name('destroyProduct');
        });

    Route::controller(UserController::class)
        ->prefix('/users')
        ->group(function()
        {   // URL::admin/users
            Route::get('/', 'show')->name('showUsers');
            Route::get('/read/{id}', 'readUser')->name('readUser');
            Route::get('/activity/{id}', 'activity')->name('statusUser');
            Route::get('/edit/{id}', 'edit')->name('editUser');
            Route::post('/update/{id}','update')->name('updateUser');
            Route::get('/create', 'create')->name('createUser');
            Route::post('/store', 'store')->name('storeUser');
            Route::delete('/destroy/{id}', 'destroy')->name('destroyUser');
        });


});

//Route::get('', [OrderController::class, 'store'])

//Category Handling
Route::get('categories/{categories:slug}', [CategoryController::class, 'show'])->name('showCategories');

// Auth
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Product handling
Route::get('{categories:slug}/{product:slug}', [ProductsController::class, 'show']);
Route::post('products/{product:slug}/comments', [ProductCommentsController::class, 'store']);