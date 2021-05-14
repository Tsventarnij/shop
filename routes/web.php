<?php

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
*/

Route::get('/', [\App\Http\Controllers\Product::class, 'index']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/company/create', [App\Http\Controllers\Company::class, 'create']);
    Route::post('/company/create', [App\Http\Controllers\Company::class, 'store'])->name('companyCreate');
    Route::get('/company/edit', [App\Http\Controllers\Company::class, 'edit']);
    Route::post('/company/edit', [App\Http\Controllers\Company::class, 'update'])->name('companyUpdate');
    Route::get('/product/create', [App\Http\Controllers\Product::class, 'create']);
    Route::post('/product/create', [App\Http\Controllers\Product::class, 'store'])->name('productCreate');
    Route::get('/product/edit/{id}', [App\Http\Controllers\Product::class, 'edit']);
    Route::post('/product/edit/{id}', [App\Http\Controllers\Product::class, 'update'])->name('productUpdate');
    Route::get('/product/delete/{id}', [App\Http\Controllers\Product::class, 'destroy'])->name('productDelete');
    Route::get('/product_media/delete/{id}', [App\Http\Controllers\ProductMedia::class, 'destroy'])->name('mediaDelete');
    Route::get('/my_products', [App\Http\Controllers\Product::class, 'displayMy'])->name('showMyProducts');
    Route::get('/category/create', [App\Http\Controllers\Category::class, 'create']);
    Route::post('/category/create', [App\Http\Controllers\Category::class, 'store'])->name('categoryCreate');
    Route::get('/category/edit', [App\Http\Controllers\Category::class, 'edit']);
    Route::post('/category/edit', [App\Http\Controllers\Category::class, 'update'])->name('categoryUpdate');
    Route::get('/category/removeType/{id}', [App\Http\Controllers\Category::class, 'removeType'])->name('defaultTypeDelete');
});

Route::get('/home', [App\Http\Controllers\Product::class, 'index'])->name('home');
Route::get('/category/{id}', [App\Http\Controllers\Product::class, 'index']);
Route::get('/product/{id}', [App\Http\Controllers\Product::class, 'show']);
Route::get('/company/{id}', [App\Http\Controllers\Company::class, 'show'])->name('companyShow');
