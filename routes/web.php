<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontController::class, 'shopHome'])->name('shop-home');

Route::get('shops', [App\Http\Controllers\FrontController::class, 'shops'])->name('shops');

Route::get('about', [App\Http\Controllers\FrontController::class, 'about'])->name('about');

Route::get('contact', [App\Http\Controllers\FrontController::class, 'contact'])->name('contact');

Route::get('brandlist/{brandId}', [App\Http\Controllers\FrontController::class, 'brandlist'])->name('brand-list');

Route::get('/shop-single/{id}', [App\Http\Controllers\FrontController::class, 'shopSingle'])->name('shop-single');

Route::get('/brand/{brandName}', [App\Http\Controllers\FrontController::class, 'showProductByBrand'])->name('showProductByBrand');

Route::get('/brands', [App\Http\Controllers\FrontController::class, 'getBrandsWithCategory']);

Route::get('/{category}/{brandname}/products', [App\Http\Controllers\FrontController::class, 'getProductsByCategoryAndBrand']);

Route::get('/category/{categoryName}', [App\Http\Controllers\FrontController::class, 'getProductsByCategory'])->name('getProductsByCategory');

Route::get('/buyingcart', [App\Http\Controllers\FrontController::class, 'buyingcart'])->name('buying-cart');

Route::post('/check-stock', [App\Http\Controllers\FrontController::class, 'checkStock'])->name('check-stock');

Route::get('/payment-info', [App\Http\Controllers\FrontController::class, 'paymentInfo'])->name('payment-info');

Route::post('payment-submit', [App\Http\Controllers\FrontController::class, 'paymentSubmit'])->name('payment-submit');




Route::group(['middleware'=>['auth','role:Super Admin|Admin|Staff'],'prefix'=>'backend','as'=>'backend.'],function(){
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('category',App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('brand',App\Http\Controllers\Admin\BrandController::class);
    Route::resource('product',App\Http\Controllers\Admin\ProductController::class);
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::get('payments',[App\Http\Controllers\Admin\PaymentController::class, 'payments'])->name('payments');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
