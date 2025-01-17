<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontController::class, 'shopHome'])->name('shop-home');

Route::get('shops', [App\Http\Controllers\FrontController::class, 'shops'])->name('shops');

Route::get('about', [App\Http\Controllers\FrontController::class, 'about'])->name('about');

Route::get('contact', [App\Http\Controllers\FrontController::class, 'contact'])->name('contact');

Route::get('/shop-single/{id}', [App\Http\Controllers\FrontController::class, 'shopSingle'])->name('shop-single');

Route::group(['prefix'=>'backend','as'=>'backend.'],function(){
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('category',App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('brand',App\Http\Controllers\Admin\BrandController::class);
    Route::resource('product',App\Http\Controllers\Admin\ProductController::class);
    Route::resource('payment',App\Http\Controllers\Admin\PaymentController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
