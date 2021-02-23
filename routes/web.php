<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/categories/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/products/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
Route::post('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');

Route::post('/products', [ProductController::class, 'store'])->name('product.store');
Route::post('/products/{product}', [ProductController::class, 'update'])->name('product.update');

require __DIR__ . '/auth.php';
