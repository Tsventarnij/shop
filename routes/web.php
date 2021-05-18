<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{
    Company,
    Product,
    ProductMedia,
    Category
};

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

Route::get('/', [Product::class, 'index']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/company/create', [Company::class, 'create']);
    Route::post('/company/create', [Company::class, 'store'])->name('companyCreate');
    Route::get('/company/edit', [Company::class, 'edit']);
    Route::post('/company/edit', [Company::class, 'update'])->name('companyUpdate');
    Route::get('/product/create', [Product::class, 'create']);
    Route::post('/product/create', [Product::class, 'store'])->name('productCreate');
    Route::get('/product/edit/{id}', [Product::class, 'edit']);
    Route::post('/product/edit/{id}', [Product::class, 'update'])->name('productUpdate');
    Route::get('/product/delete/{id}', [Product::class, 'destroy'])->name('productDelete');
    Route::get('/product_media/delete/{id}', [ProductMedia::class, 'destroy'])->name('mediaDelete');
    Route::get('/my_products', [Product::class, 'displayMy'])->name('showMyProducts');
    Route::get('/category/create', [Category::class, 'create']);
    Route::post('/category/create', [Category::class, 'store'])->name('categoryCreate');
    Route::get('/category/edit/{id}', [Category::class, 'edit']);
    Route::post('/category/edit/{id}', [Category::class, 'update'])->name('categoryUpdate');
    Route::get('/category/list', [Category::class, 'index'])->name('categoryList');
    Route::get('/category/delete/{id}', [Category::class, 'destroy'])->name('categoryDelete');
    Route::get('/category/removeType/{id}', [Category::class, 'removeType'])->name('defaultTypeDelete');
});

Route::get('/home', [Product::class, 'index'])->name('home');
Route::get('/category/{id}', [Product::class, 'index']);
Route::get('/product/{id}', [Product::class, 'show']);
Route::get('/company/{id}', [Company::class, 'show'])->name('companyShow');
