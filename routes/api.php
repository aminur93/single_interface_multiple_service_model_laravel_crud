<?php

use App\Http\Controllers\CategoryController; // Import the CategoryController class
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController; // Import the BrandController class
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('user', [UserController::class, 'index']);
Route::post('user/store', [UserController::class, 'store'])->name('user.store');
Route::get('user/edit/{id}', [UserController::class, 'edit']);
Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('user/destroy/{id}', [UserController::class, 'destroy']);

/*Category route start*/
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}', [CategoryController::class, 'edit']);
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
/*Category route end*/

/*Brand route start*/
Route::get('/brand', [BrandController::class, 'index']);
Route::post('/brand', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/{id}', [BrandController::class, 'edit']);
Route::put('/brand/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/{id}', [BrandController::class, 'destroy']);
/*Brand route end*/

/*Product route start*/
Route::get('/product', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy']);
/*Product route end*/
