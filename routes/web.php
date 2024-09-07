<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{category:slug}', [ProductController::class, 'getCategory'])->name('category');

// Route::get('/details/{product:slug}', [ProductController::class, 'getCategoryProduct'])->name('product.details');

Route::get('/{category:slug}/{product:slug}', [ProductController::class, 'getCategoryProduct'])->name('product.details');

Route::get('/search',[]);
