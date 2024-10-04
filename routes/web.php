<?php

use App\Http\Controllers\Frontend\{GalleryController, HomeController, ProductController};
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{category:slug}', [ProductController::class, 'getCategory'])->name('category');
// Route::get('/details/{product:slug}', [ProductController::class, 'getCategoryProduct'])->name('product.details');
Route::get('/{category:slug}/{product:slug}', [ProductController::class, 'getCategoryProduct'])->name('product.details');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/search',[]);
Route::get('/foo', function () {
    Artisan::call('storage:link');
});
