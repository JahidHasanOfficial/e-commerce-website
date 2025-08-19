<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Route::get('/dashboard', [AdminAdminController::class, 'index'])->name('admin.dashboard');

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');

    //Category Routes
    Route::resource('categories', CategoryController::class, [
        'names' => [
            'index' => 'categories.index',
            'create' => 'categories.create',
            'store' => 'categories.store',
            'edit' => 'categories.edit',
            'update' => 'categories.update',
            'destroy' => 'categories.destroy',
        ]
    ]);

    //SubCategory Routes
    Route::resource('subcategories', SubCategoryController::class, [
        'names' => [
            'index' => 'subcategories.index',
            'create' => 'subcategories.create',
            'store' => 'subcategories.store',
            'edit' => 'subcategories.edit',
            'update' => 'subcategories.update',
            'destroy' => 'subcategories.destroy',
        ]
        ]);
});



//======================================Frontend Section======================================


Route::get('/product-details', [HomeController::class, 'productDetails'])->name('product.details');
Route::get('/shops', [HomeController::class, 'product'])->name('product');
Route::get('/contacts', [HomeController::class, 'contact'])->name('contact');
Route::get('/abouts', [HomeController::class, 'about'])->name('frontend.about');
Route::get('/contacts', [HomeController::class, 'contact'])->name('contact');
Route::get('/faqs', [HomeController::class, 'faq'])->name('frontend.faq');
Route::get('/helps', [HomeController::class, 'help'])->name('frontend.help');