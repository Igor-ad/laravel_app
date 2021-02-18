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

Route::get('/categories', [CategoryController::class, 'index'])
    ->middleware(['auth'])->name('categories');
Route::get('/categories/create', [CategoryController::class, 'create'])
    ->middleware(['auth'])->name('category.create');
Route::get('/categories/delete/{category}', [CategoryController::class, 'delete'])
    ->middleware(['auth'])->name('category.delete');
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])
    ->middleware(['auth'])->name('category.edit');
Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->middleware(['auth'])->name('category.show');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
Route::post('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');

Route::get('/products', [ProductController::class, 'index'])
    ->middleware(['auth'])->name('products');
Route::get('/products/create', [ProductController::class, 'create'])
    ->middleware(['auth'])->name('product.create');
Route::get('/products/delete/{product}', [ProductController::class, 'delete'])
    ->middleware(['auth'])->name('product.delete');
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])
    ->middleware(['auth'])->name('product.edit');
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->middleware(['auth'])->name('product.show');
Route::post('/products', [ProductController::class, 'store'])->name('product.store');
Route::post('/products/{product}', [ProductController::class, 'update'])->name('product.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
