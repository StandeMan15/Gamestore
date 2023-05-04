<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductCommentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ShippingDetailsController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', [ProductsController::class, 'index'])->name('home');

Route::get('admin', [SessionsController::class, 'index']);

Route::get('betalen',[CheckoutController::class, 'preparePayment'])->name('mollie.payment');
Route::get('payment-succes', [CheckoutController::class, 'handleWebhookNotification'])->name('payment.success');

Route::prefix('/admin')->group(function()
{
    
    Route::get('/active', [ProductsController::class, 'filterActive' ])->name('filterActive');
    Route::get('/inactive', [ProductsController::class, 'filterInactive'])->name('filterInactive');

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

    Route::controller(AdminOrderController::class)
        ->prefix('/orders')
        ->group(function()
        {   // URL::admin/orders
            Route::get('', 'show')->name('showOrdersAdmin');
            Route::get('/read/{id}', 'read')->name('readOrdersAdmin');
            Route::get('/create', 'create')->name('createOrdersAdmin');
            Route::get('/edit/{id}', 'edit')->name('editOrdersAdmin');
            Route::post('/update/{id}', 'update')->name('updateOrdersAdmin');
            Route::post('/store', 'store')->name('storeAdminOrder');
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
        });

    Route::controller(StatusController::class)
        ->prefix('/status')
        ->group(function () 
        {   // URL::admin/status
        Route::get('/', 'show')->name('showStatusCodes');
        Route::get('/create', 'create')->name('createStatus');
        Route::post('/store', 'store')->name('storeStatus');
        Route::get('/edit/{id}', 'edit')->name('editStatus');
        Route::post('/update/{id}', 'update')->name('updateStatus');
        Route::delete('/destroy/{id}', 'destroy')->name('destroyStatus');
        });

    Route::controller(UserAdminController::class)
        ->prefix('/users')
        ->group(function()
        {   // URL::admin/users
            Route::get('/', 'showadmin')->name('showUsers');
            Route::get('/read/{id}', 'readUser')->name('readUser');
            Route::get('/activity/{id}', 'activity')->name('statusUser');
            Route::get('/edit/{id}', 'edit')->name('editUser');
            Route::post('/update/{id}','update')->name('updateUser');
            Route::get('/create', 'create')->name('createUser');
            Route::post('/store', 'store')->name('storeUser');
        });


});


// Auth
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Order 

Route::prefix('/order')->group(function () {
    Route::controller(OrderController::class)
        ->group(function () {
            Route::get('cart', 'cart')->name('cart');
            Route::get('add-to-cart/{id}', 'addtocart')->name('addtocart');
            Route::patch('update-cart', 'update')->name('updatecart');
            Route::delete('remove-from-cart', 'remove')->name('remomefromcart');
            Route::get('bevestig-bestelling', 'store')->name('storeorder');
            Route::get('cart-forbidden', 'deny')->name('orderdenied');
        });
    Route::controller(CheckoutController::class)
        ->group(function () {
            Route::get('{id}', 'confirm')->name('orderconfirm');
        });
    Route::controller(ShippingDetailsController::class)
        ->group(function () {
            Route::post('bevestig-bezorgadres/{id}', 'store')->name('storeShippingDetails');
        });
});

Route::prefix('')->group(function () {
    Route::controller(UserController::class)
        ->group(function () {
            Route::get('my-profile', 'show')->name('showuser');
            Route::get('edit-my-profile', 'edit')->name('edituser');
            Route::post('edit-my-profile/{id}', 'update')->name('updateuser');
    });
});


// Product handling
Route::get('{product:slug}', [ProductsController::class, 'showProduct'])->name('showProduct');
Route::get('{categories:slug}/{product:slug}', [ProductsController::class, 'show']);

Route::post('products/{product:slug}/comments', [ProductCommentsController::class, 'store']);



Route::get('{categories:slug}', [CategoryController::class, 'show'])->name('showcategory');