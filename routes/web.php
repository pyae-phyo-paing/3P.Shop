<?php

use GuzzleHttp\Middleware;
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

Route::resource('user-profile',App\Http\Controllers\ProfileController::class);



Route::group(['middleware'=>['auth','role:Super Admin|Admin|Staff'],'prefix'=>'backend','as'=>'backend.'],function(){
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('category',App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('brand',App\Http\Controllers\Admin\BrandController::class);
    Route::resource('product',App\Http\Controllers\Admin\ProductController::class);
    Route::resource('user', App\Http\Controllers\Admin\UserController::class)->middleware('role:Super Admin');
    Route::get('payments',[App\Http\Controllers\Admin\PaymentController::class, 'payments'])->name('payments');
    Route::get('paid-payments',[App\Http\Controllers\Admin\PaymentController::class, 'paidPayments'])->name('paid-payments');
    Route::get('payments/{voucher}',[App\Http\Controllers\Admin\PaymentController::class, 'detailPayment'])->name('payment-detial');
    Route::put('payments/{voucher}',[App\Http\Controllers\Admin\PaymentController::class, 'paymentStatus'])->name('payment-status');
    Route::get('payments/print/{voucher}',[App\Http\Controllers\Admin\PaymentController::class, 'printPaidPayment'])->name('print-payment');
    Route::get('orders',[App\Http\Controllers\Admin\OrderController::class, 'orders'])->name('orders');
    Route::get('order-shipping',[App\Http\Controllers\Admin\OrderController::class, 'orderShipping'])->name('order-shipping');
    Route::get('order-complete',[App\Http\Controllers\Admin\OrderController::class, 'orderComplete'])->name('order-complete');
    Route::get('orders/{voucher}',[App\Http\Controllers\Admin\OrderController::class, 'detailOrder'])->name('order-detail');
    Route::put('orders/{voucher}',[App\Http\Controllers\Admin\OrderController::class, 'orderStatus'])->name('order-status');
    Route::get('order-list', [App\Http\Controllers\Admin\DashboardController::class, 'orderList'])->name('order-list');
    Route::get('payment-list', [App\Http\Controllers\Admin\DashboardController::class, 'paymentList'])->name('payment-list');
    Route::get('instock-list', [App\Http\Controllers\Admin\DashboardController::class, 'instockList'])->name('instock-list');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
